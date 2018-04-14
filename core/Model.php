<?php

namespace core;


use PDO;

abstract class Model
{
    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . Config::getDbHost() . ';dbname=' . Config::getDbName() . ';charset=utf8';
            $db = new PDO($dsn, Config::getDbUser(), Config::getDbPassword());
            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }
}
