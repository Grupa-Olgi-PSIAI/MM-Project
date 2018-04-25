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
    private static $showErrors;
    private static $logErrors;
    private static $filesLocation;
    private static $maxFileSize;

    /**
     * @throws \Exception
     */
    public static function loadConfig()
    {
        $path = dirname(__DIR__) . '/' . self::CONFIG_FILE;
        if (file_exists($path)) {
            self::$config = parse_ini_file($path);
            self::$showErrors = self::readOrDefault('showErrors', false);
            self::$logErrors = self::readOrDefault('logErrors', false);
            self::$dbHost = self::read('host');
            self::$dbName = self::read('dbname');
            self::$dbUser = self::read('user');
            self::$dbPassword = self::read('password');
            self::$filesLocation = dirname(__DIR__) . '/' . self::read('filesLocation') . '/';
            self::$maxFileSize = self::read('maxFileSizeBytes');
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
    public static function getDbHost(): string
    {
        return self::$dbHost;
    }

    /**
     * @return string
     */
    public static function getDbName(): string
    {
        return self::$dbName;
    }

    /**
     * @return string
     */
    public static function getDbUser(): string
    {
        return self::$dbUser;
    }

    /**
     * @return string
     */
    public static function getDbPassword(): string
    {
        return self::$dbPassword;
    }

    /**
     * @return bool
     */
    public static function showErrors(): bool
    {
        return self::$showErrors;
    }

    /**
     * @return bool
     */
    public static function logErrors(): bool
    {
        return self::$logErrors;
    }

    /**
     * @return string
     */
    public static function getFilesLocation(): string
    {
        return self::$filesLocation;
    }

    /**
     * @return int
     */
    public static function getMaxFileSize(): int
    {
        return self::$maxFileSize;
    }

    /**
     * Reads value from config
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    private static function read(string $name)
    {
        if (isset(self::$config[$name])) {
            return self::$config[$name];
        } else {
            throw new \Exception("Value '$name' is missing in config file");
        }
    }

    /**
     * Reads value from config, if missing returns default value
     * @param string $name
     * @param $default
     * @return mixed
     */
    private static function readOrDefault(string $name, $default)
    {
        if (isset(self::$config[$name])) {
            return self::$config[$name];
        } else {
            return $default;
        }
    }
}
