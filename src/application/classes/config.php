<?php

Class Config
{
    private static $config;
    public  static function get()
    {
        if(!self::$config)
        {
            self::$config = include "$_SERVER[DOCUMENT_ROOT]/app/application/settings/config.php";
        }
        return self::$config;
    }
}