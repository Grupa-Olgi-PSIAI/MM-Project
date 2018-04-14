<?php


namespace controller;


use core\Controller;
use core\View;
use model\Authenticator;

class Login extends Controller
{
    private $authenticator;

    public function __construct($route_params)
    {
        parent::__construct($route_params);
        $this->authenticator = new Authenticator();
    }

    /**
     * @throws \Exception
     */
    public function showAction()
    {
        View::renderWithoutMenu("index.html");
    }

    /**
     * @throws \Exception
     */
    public function loginAction()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->authenticator->login($email, $password)) {
            header("Location: /index.php");
            exit();
        } else {
            View::renderWithoutMenu("index.html", ["error" => true]);
        }
    }

    public function logout()
    {
        $this->authenticator->logout();
    }

    protected function before()
    {
        return !$this->authenticator->isAuthenticated();
    }
}
