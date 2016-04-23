<?php

return array(
    'logData' => array(
                'connectionString' => 'azure_connection_string',
                'table' => 'azure_connection_table_name'
    ),
    'portal_name1' => array(
                'unifi' => array(
                    'unifiServer'  => "portal1_unifiServer_url",
                    'unifiUser'    => "portal1_unifiUser_name",
                    'unifiPass'    => "portal1_unifiPass"
                ),
                'clientParam' => array(
                    'up'            => "portal1_speed_up",
                    'down'          => "portal1_speed_down",
                    'sessionTime'   => "portal1_sessionTime"
                ),
                'ulrRedirect' => 'portal1_ulrRedirect',

                'vipUsers' => array(
                    array(
                        'mac'         => "portal1_vipUser1_mac_id",
                        'userName'    => "portal1_vipUser1_userName",
                        'up'          => "portal1_vipUser1_speed_up",
                        'down'        => "portal1_vipUser1_speed_down",
                        'sessionTime' => "portal1_vipUser1_sessionTime_sec",
                        'mail'        => "portal1_vipUser1_mail"
                    ),
                    array(
                        'mac'         => "portal1_vipUser1_mac_id",
                        'userName'    => "portal1_vipUser1_userName",
                        'up'          => "portal1_vipUser1_speed_up",
                        'down'        => "portal1_vipUser1_speed_down",
                        'sessionTime' => "portal1_vipUser1_sessionTime_sec",
                        'mail'        => "portal1_vipUser1_mail"
                    ),
                )
    )
);

