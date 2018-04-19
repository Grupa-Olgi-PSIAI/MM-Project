<?php


namespace util;


class Session
{
    private static $instance;

    private function __construct()
    {
    }

    /**
     * Returns singleton instance of session
     * creates one if non exists
     * @return Session
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return self::$instance;
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
    }

    public function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function exists($key)
    {
        return isset($_SESSION[$key]);
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    /**
     * Deletes value from session
     * @param $key
     * @return bool true if deletion was successful
     */
    public function delete($key)
    {
        if ($this->exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }

        return false;
    }
}
