<?php


namespace util;


use repository\UserRepository;

class Authenticator
{
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
        return $this->session->exists(Session::USER_SESSION);
    }

    /**
     * Logs in user
     * @param string $email
     * @param string $password
     * @return bool true if login was successful
     */
    public function login(string $email, string $password): bool
    {
        if (empty($email) || empty($password)) {
            return false;
        }

        $repository = new UserRepository();
        $user = $repository->findByEmail($email);
        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->getPassword())) {
            $this->session->add(Session::USER_SESSION, $user->getId());
            return true;
        }

        return false;
    }

    public function logout()
    {
        $this->session->destroy();
    }
}
