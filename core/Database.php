<?php


namespace core;


use PDO;

class Database
{
    private static $instance;
    private $db;

    private function __construct()
    {
        $dsn = 'mysql:host=' . Config::getDbHost() . ';dbname=' . Config::getDbName() . ';charset=utf8';
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $this->db = new PDO($dsn, Config::getDbUser(), Config::getDbPassword(), $opt);
    }

    /**
     * Returns singleton instance of Database
     * @return Database
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }
}
