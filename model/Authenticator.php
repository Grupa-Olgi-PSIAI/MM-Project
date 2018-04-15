<?php


namespace model;


class Authenticator
{
    private const USER_SESSION = "user";

    private $session;

    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    public function isAuthenticated()
    {
        return $this->session->exists(self::USER_SESSION);
    }

    public function login($email, $password)
    {
        if ($email === '' || $password === '') {
            return false;
        }

        // TODO check credentials with db
        $this->session->add(self::USER_SESSION, $email);

        return true;
    }

    public function logout()
    {
        $this->session->destroy();
    }
}
