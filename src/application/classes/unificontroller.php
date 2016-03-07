<?php

Class UnifiController
{
    private $config;

    public function __construct()
    {
        $this->config = Config::get();
    }

    public function sendAuthorization($id, $portalName, $userParam = null)
    {
        if($userParam == null){
           $userParam = $this->config[$portalName]['clientParam'];
        }
        // Start Curl for login
        $ch = curl_init();
        // We are posting data
        curl_setopt($ch, CURLOPT_POST, TRUE);
        // Set up cookies
        $cookie_file = "/tmp/unifi_cookie";
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        // Allow Self Signed Certs
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        // Login to the UniFi controller
        curl_setopt($ch, CURLOPT_URL, $this->config[$portalName]['unifi']['unifiServer']."/api/login");
        $data = json_encode(array("username" => $this->config[$portalName]['unifi']['unifiUser'],"password" => $this->config[$portalName]['unifi']['unifiPass']));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_exec($ch);

        // Send user to authorize and the time allowed
        $data = json_encode(array(
            'cmd'=>'authorize-guest',
            'mac'=>$id,
            'minutes'=>$userParam['sessionTime'],
            'up'=>$userParam['up'],
            'down'=>$userParam['down']
        ));

        // Make the API Call
        curl_setopt($ch, CURLOPT_URL, $this->config[$portalName]['unifi']['unifiServer'].'/api/s/'.$portalName.'/cmd/stamgr');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'json='.$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_exec ($ch);

        // Logout of the connection
        curl_setopt($ch, CURLOPT_URL, $this->config[$portalName]['unifi']['unifiServer'].'/logout');
        curl_exec ($ch);
        curl_close ($ch);
    }
}