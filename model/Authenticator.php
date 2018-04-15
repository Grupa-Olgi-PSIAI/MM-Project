<?php


namespace model;


class Authenticator
{
    private const USER_SESSION = "user";

    private static $instance;
    private $session;

    private function __construct()
    {
        $this->session = Session::getInstance();
    }

    /**
     * Returns singleton instance of Authenticator
     * creates one if non exists
     * @return Authenticator
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Check if user is authenticated
     * @return bool true if user is authenticated
     */
    public function isAuthenticated()
    {
        return $this->session->exists(self::USER_SESSION);
    }

    /**
     * Logs in user
     * @param $email
     * @param $password
     * @return bool true if login was successful
     */
    public function login($email, $password)
    {
        if ($email === '' || $password === '') {
            return false;
        }

        // TODO check credentials with db
        // ... if $email exists ...
        $userPassword = password_hash("123", PASSWORD_BCRYPT);
        if (!password_verify($password, $userPassword)) {
            return false;
        }

        $this->session->add(self::USER_SESSION, $email);

        return true;
    }

    public function logout()
    {
        $this->session->destroy();
    }
}
