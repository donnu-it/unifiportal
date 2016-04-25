# Application settings

* <code>-e AZURE_CONNECTION_STRING=...</code> Azure connection string.
* <code>-e AZURE_CONNECTION_TABLE_NAME=...</code> Azure table name.
* <code>-e PORTAL_NAME_0=...</code> Portal name. Example <code>default</code>. <code>PORTAL_NAME_N=...</code> - <code>N</code> portals number 0 - 5.
* <code>-e PORTAL_UNIFISERVER_URL_0=...</code> UniFi server url. <code>PORTAL_UNIFISERVER_URL_N=...</code> - <code>N</code> portals number 0 - 5.
* <code>-e PORTAL_UNIFIUSER_NAME_0=...</code> UniFi server Admin account name <code>PORTAL_UNIFIUSER_NAME_N=...</code> - <code>N</code> portals number 0 - 5.
* <code>-e PORTAL_UNIFIPASS_0=...</code> UniFi server Admin account password
* <code>-e PORTAL_SPEED_UP_0=...</code> Guest connection speed upload.
* <code>-e PORTAL_SPEED_DOWN_0=...</code> Guest connection speed download.
* <code>-e PORTAL_SESSIONTIME_0=...</code> Guest connection session time.
* <code>-e PORTAL_URLREDIRECT_0=...</code> WebSite URL for redirect after authorization.
* <code>-e VIP_USER_MAC_ID_0_0=...</code>  MAC ID for guest without authentication. <code>VIP_USER_MAC_ID_N_U=...</code> - <code>N</code> portals number 0 - 5, <code>U</code> users number 0-5.
* <code>-e VIP_USER_NAME_0_0=...</code> Guests friendly name. 
* <code>-e VIP_USER_SPEED_UP_0_0=...</code> Guest connection speed upload.
* <code>-e VIP_USER_SPEED_DOWN_0_0=...</code> Guest connection speed download.
* <code>-e VIP_USER_SESSIONTIME_0_0=...</code> Guest connection session time.
* <code>-e VIP_USER_MAIL_0_0=...</code> Guest e-mail.
* <code>-e SAML_ENTITYID_URL=...</code> ADFS entity id
* <code>-e SAML_LOCATION_URL=...</code> ADFS url.
* <code>-e X509_KEY=...</code> X509 key.
* <code>-e X509_PEM=...</code> X509 pem.
* <code>-e SAML_TECHNICAL_NAME=...</code> Support name for e-mail. 
* <code>-e SAML_TECHNICAL_EMAIL=...</code> Support e-mail.
* <code>-e SAML_ADMIN_PASSWORD=...</code> Admin password for SimpleSAMLphp back-end. <b>Optional</b> It's generate automatically.
* <code>-e SAML_BASEURLPATH=...</code> The full url format is useful if SimpleSAMLphp setup is hosted behind a reverse proxy.
* <code>-e MEMCACHE_SERVER_HOST=...</code> Memcache server hostname. Default is <code>memcache</code>.
* <code>-e MYSQL_HOST=...</code> MySQL server hostname.
* <code>-e DATABASE_NAME=...</code> MySQL server database name.
* <code>-e DATABASE_USER=...</code> MySQL server database user name.
* <code>-e DATABASE_PASSWORD=...</code> MySQL server database password.