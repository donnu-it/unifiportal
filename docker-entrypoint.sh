#!/bin/bash
set -e

if [[ -d "settings" && "$(ls -A settings)" ]]; then
    echo >&2 "Settings was found in $(pwd)/settings"
        else
        echo >&2 "Settings not found in $(pwd)/settings - copying now..."
        mkdir /var/www/html/settings
        cp -R /templates/* /var/www/html/settings
        chown -R www-data:www-data settings
#        ln settings/settings.php application/settings/config.php
#        ln settings/simplesamlphp/config.php simplesamlphp/config/config.php
#        ln settings/simplesamlphp/saml20-idp-remote.php simplesamlphp/metadata/saml20-idp-remote.php
#        ln settings/simplesamlphp/cert/web1.key simplesamlphp/cert/web1.key
#        ln settings/simplesamlphp/cert/web1.pem simplesamlphp/cert/web1.pem
        echo >&2 "Coping was finished."
fi

set_config(){
    key="$1"
    value="$2"
    file="$3"
    sed -ri "s#$key#$value#g" $file
}


############### WI-FI Portal Config #################

file_settings='settings/settings.php'

set_config 'azure_connection_string' "$AZURE_CONNECTION_STRING" "$file_settings"
set_config 'azure_connection_table_name' "$AZURE_CONNECTION_TABLE_NAME" "$file_settings"

portal_count=0
vip_user_count=0

#php -r 'phpinfo();' >> settings/settings.php

while [ $portal_count -le 5 ]; do

    eval portal_unique_value=\$PORTAL_NAME_$portal_count

    echo >&2 "$portal_unique_value"


    eval portal_name=\$PORTAL_NAME_$portal_count
    eval unifiServer=\$PORTAL_UNIFISERVER_URL_$portal_count
    eval unifiUser=\$PORTAL_UNIFIUSER_NAME_$portal_count
    eval unifiPass=\$PORTAL_UNIFIPASS_$portal_count

    eval up=\$PORTAL_SPEED_UP_$portal_count
    eval down=\$PORTAL_SPEED_DOWN_$portal_count
    eval sessionTime=\$PORTAL_SESSIONTIME_$portal_count

    eval ulrRedirect=\$PORTAL_URLREDIRECT_$portal_count

    set_config 'portal_name_'"$portal_count" "$portal_name" "$file_settings"
    set_config 'portal_unifiServer_url_'"$portal_count" "$unifiServer" "$file_settings"
    set_config 'portal_unifiUser_name_'"$portal_count" "$unifiUser" "$file_settings"
    set_config 'portal_unifiPass_'"$portal_count" "$unifiPass" "$file_settings"
    set_config 'portal_speed_up_'"$portal_count" "$up" "$file_settings"
    set_config 'portal_speed_down_'"$portal_count" "$down" "$file_settings"
    set_config 'portal_sessionTime_'"$portal_count" "$sessionTime" "$file_settings"
    set_config 'portal_ulrRedirect_'"$portal_count" "$ulrRedirect" "$file_settings"

    while [ $vip_user_count -le 5 ]; do

        eval vip_user_unique_value=\$VIP_USER_MAC_ID_$portal_count'_'$vip_user_count


        echo >&2 "$vip_user_unique_value"


        eval vip_user_mac_id=\$VIP_USER_MAC_ID_$portal_count'_'$vip_user_count
        eval vip_user_name=\$VIP_USER_NAME_$portal_count'_'$vip_user_count
        eval vip_user_speed_up=\$VIP_USER_SPEED_UP_$portal_count'_'$vip_user_count
        eval vip_user_speed_down=\$VIP_USER_SPEED_DOWN_$portal_count'_'$vip_user_count
        eval vip_user_sessionTime=\$VIP_USER_SESSIONTIME_$portal_count'_'$vip_user_count
        eval vip_user_mail=\$VIP_USER_MAIL_$portal_count'_'$vip_user_count

        set_config 'portal_vipUser_mac_id_'"$portal_count"'_'"$vip_user_count" "$vip_user_mac_id" "$file_settings"
        set_config 'portal_vipUser_userName_'"$portal_count"'_'"$vip_user_count" "$vip_user_name" "$file_settings"
        set_config 'portal_vipUser_speed_up_'"$portal_count"'_'"$vip_user_count" "$vip_user_speed_up" "$file_settings"
        set_config 'portal_vipUser_speed_down_'"$portal_count"'_'"$vip_user_count" "$vip_user_speed_down" "$file_settings"
        set_config 'portal_vipUser_sessionTime_sec_'"$portal_count"'_'"$vip_user_count" "$vip_user_sessionTime" "$file_settings"
        set_config 'portal_vipUser_mail_'"$portal_count"'_'"$vip_user_count" "$vip_user_mail" "$file_settings"


    let vip_user_count=vip_user_count+1
    done

    vip_user_count=0

    let portal_count=portal_count+1

done

############### SAML Config #################

file_settings='settings/simplesamlphp/saml20-idp-remote.php'

set_config 'saml_entityid_url' "$SAML_ENTITYID_URL" "$file_settings"
set_config 'saml_location_url' "$SAML_LOCATION_URL" "$file_settings"
set_config 'X509Certificate_key' "$X509_KEY" "$file_settings"
set_config 'X509Certificate_pem' "$X509_PEM" "$file_settings"

echo '-----BEGIN RSA PRIVATE KEY----- '"$X509_KEY"' -----END RSA PRIVATE KEY-----' >> settings/simplesamlphp/cert/web1.key
echo '-----BEGIN CERTIFICATE----- '"$X509_PEM"' -----END CERTIFICATE-----' >> settings/simplesamlphp/cert/web1.pem

############### SimpleSAML Config #################

file_settings='settings/simplesamlphp/config.php'
secretsalt=$(tr -c -d '0123456789abcdefghijklmnopqrstuvwxyz' </dev/urandom | dd bs=32 count=1 2>/dev/null;echo)

set_config 'technicalcontact_name_param' "$SAML_TECHNICAL_NAME" "$file_settings"
set_config 'technicalcontact_email_param' "$SAML_TECHNICAL_EMAIL" "$file_settings"
set_config 'defaultsecretsalt' "$secretsalt" "$file_settings"

if [ "$SAML_ADMIN_PASSWORD" ]; then
    set_config 'auth.adminpassword_param' "$SAML_ADMIN_PASSWORD" "$file_settings"
else
    set_config 'auth.adminpassword_param' "$(tr -c -d '0123456789abcdefghijklmnopqrstuvwxyz' </dev/urandom | dd bs=32 count=1 2>/dev/null;echo)" "$file_settings"
fi

if [ "$MEMCACHE_SERVER_HOST" ]; then
    set_config 'memcache' "$MEMCACHE_SERVER_HOST" "$file_settings"
fi

ln settings/settings.php application/settings/config.php
ln settings/simplesamlphp/config.php simplesamlphp/config/config.php
ln settings/simplesamlphp/saml20-idp-remote.php simplesamlphp/metadata/saml20-idp-remote.php
ln settings/simplesamlphp/cert/web1.key simplesamlphp/cert/web1.key
ln settings/simplesamlphp/cert/web1.pem simplesamlphp/cert/web1.pem

exec "$@"