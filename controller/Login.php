<?php


namespace controller;


use core\Controller;
use core\View;
use util\Authenticator;
use util\Authorization;
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
            Authorization::getInstance()->loadPermissions();
            Redirect::to("/" . ROUTE_HOME);
        } else {
            View::renderWithoutMenu("login.php", ["error" => true]);
        }
    }

    public function logout()
    {
        $this->authenticator->logout();
        Redirect::to("/" . ROUTE_HOME);
    }

    protected function before()
    {
        if ($this->authenticator->isAuthenticated()) {
            Redirect::to("/" . ROUTE_HOME);
            return false;
        }

        return true;
    }
}
