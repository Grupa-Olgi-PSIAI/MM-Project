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
        $this->session->start();
        return $this->session->exists(self::USER_SESSION);
    }

    public function login($email, $password)
    {
        // TODO check credentials with db
        $this->session->start();
        $this->session->add(self::USER_SESSION, $email);

        return true;
    }

    public function logout()
    {
        $this->session->destroy();
    }
}
