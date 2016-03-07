<?php

Class UnifiController
{
    private $id;
    private $config;

    public function __construct($id)
    {
        $this->id = $id;
        $this->config = Config::get();
    }

    public function sendAuthorization()
    {
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
        curl_setopt($ch, CURLOPT_URL, $this->config['unifi']['unifiServer']."/api/login");
        $data = json_encode(array("username" => $this->config['unifi']['unifiUser'],"password" => $this->config['unifi']['unifiPass']));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_exec($ch);

        // Send user to authorize and the time allowed
        $data = json_encode(array(
            'cmd'=>'authorize-guest',
            'mac'=>$this->id,
            'minutes'=>$this->config['clientParam']['sessionTime'],
            'up'=>$this->config['clientParam']['up'],
            'down'=>$this->config['clientParam']['down']
        ));

        // Make the API Call
        curl_setopt($ch, CURLOPT_URL, $this->config['unifi']['unifiServer'].'/api/s/'.$this->config['unifi']['unifiPortal'].'/cmd/stamgr');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'json='.$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_exec ($ch);

        // Logout of the connection
        curl_setopt($ch, CURLOPT_URL, $this->config['unifi']['unifiServer'].'/logout');
        curl_exec ($ch);
        curl_close ($ch);
    }
}