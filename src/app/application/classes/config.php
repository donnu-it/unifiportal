<?php

Class Config
{
    private static $config;
    public  static function get()
    {
        if(!self::$config)
        {
            self::$config = include('../settings/config.php');
        }
        return self::$config;
    }
}