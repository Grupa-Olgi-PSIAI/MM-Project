<?php


namespace controller;


use core\Controller;
use core\View;
use util\Authenticator;
use util\Redirect;

class Login extends Controller
{
    private $authenticator;

    public function __construct($route_params)
    {
        parent::__construct($route_params);
        $this->authenticator = Authenticator::getInstance();
    }

    /**
     * @throws \Exception
     */
    public function showAction()
    {
        View::renderWithoutMenu("login.php");
    }

    /**
     * @throws \Exception
     */
    public function loginAction()
    {
        unset($error);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->authenticator->login($email, $password)) {
            Redirect::to("home");
        } else {
            View::renderWithoutMenu("login.php", ["error" => true]);
        }
    }

    public function logout()
    {
        $this->authenticator->logout();
        Redirect::to("home");
    }

    protected function before()
    {
        if ($this->authenticator->isAuthenticated()) {
            Redirect::to("home");
            return false;
        }

        return true;
    }
}
