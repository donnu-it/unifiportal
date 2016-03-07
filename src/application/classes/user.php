<?php

Class User
{
    private static $macId;
    private static $portalName;
    private static $config;

    public function __construct($macId, $portalName)
    {
        self::$macId = $macId;
        self::$portalName = $portalName;
        self::$config = Config::get();
    }

    public static function isVip()
    {
        $key = array_search(self::$macId, array_column(self::$config[self::$portalName]['vipUsers'], 'mac'));

        return $key;
    }
}