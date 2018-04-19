<?php


namespace util;


use repository\UserRepository;

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
        if ($email == '' || $password == '') {
            return false;
        }

        $repository = new UserRepository();
        $user = $repository->findByEmail($email);
        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user->getPassword())) {
            return false;
        }

        $this->session->add(self::USER_SESSION, $user->getId());

        return true;
    }

    public function logout()
    {
        $this->session->destroy();
    }
}
