<?php

namespace core;


final class Config
{
    private const CONFIG_FILE = "config.ini";

    private static $config = [];
    private static $dbHost;
    private static $dbName;
    private static $dbUser;
    private static $dbPassword;

    /**
     * @throws \Exception
     */
    public static function loadConfig()
    {
        $path = dirname(__DIR__) . '/' . self::CONFIG_FILE;
        if (file_exists($path)) {
            self::$config = parse_ini_file($path);
            self::$dbHost = self::$config['host'];
            self::$dbName = self::$config['dbname'];
            self::$dbUser = self::$config['user'];
            self::$dbPassword = self::$config['password'];
        } else {
            throw new \Exception("Config file not found - add " . self::CONFIG_FILE . " file to root directory");
        }
    }

    /**
     * @return array
     */
    public static function getConfig(): array
    {
        return self::$config;
    }

    /**
     * @return string
     */
    public static function getDbHost()
    {
        return self::$dbHost;
    }

    /**
     * @return string
     */
    public static function getDbName()
    {
        return self::$dbName;
    }

    /**
     * @return string
     */
    public static function getDbUser()
    {
        return self::$dbUser;
    }

    /**
     * @return string
     */
    public static function getDbPassword()
    {
        return self::$dbPassword;
    }
}
