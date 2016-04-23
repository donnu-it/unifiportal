#!/bin/bash
set -e

if [[ -d "settings" && "$(ls -A settings)" ]]; then
    echo >&2 "Settings was found in $(pwd)/settings"
        else
        echo >&2 "Settings not found in $(pwd)/settings - copying now..."
        cp -R /templates/* /var/www/html/settings
        chown -R www-data:www-data settings
        ln settings/settings.php application/settings/config.php
        ln settings/simplesamlphp/config.php simplesamlphp/config/config.php
        ln settings/simplesamlphp/saml20-idp-remote.php simplesamlphp/metadata/saml20-idp-remote.php
        ln settings/simplesamlphp/cert/web1.key simplesamlphp/cert/web1.key
        ln settings/simplesamlphp/cert/web1.pem simplesamlphp/cert/web1.pem
        echo >&2 "Coping was finished."
fi

set_config(){
    key="$1"
    value="$2"
    sed -ri "s/$key/$value/g" settings/settings.php
}
set_new_portal(){
    key="$1"
    value="$2"
}
set_new_vip_user(){
    key="$1"
    value="$2"
}

set_config 'azure_connection_string' "$AZURE_CONNECTION_STRING"
set_config 'azure_connection_table_name' "$AZURE_CONNECTION_TABLE_NAME"

portal_count=0

while [ $portal_count -le 5 ]; do

    eval unique_value=\$PORTAL_NAME_$portal_count

    echo >&2 "$unique_value"

    let portal_count=portal_count+1

done




exec "$@"