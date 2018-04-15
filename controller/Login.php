<?php

namespace controller;


use core\Controller;
use core\View;

class Login extends Controller
{
    /**
     * @throws \Exception
     */
    public function login()
    {
        View::renderWithoutMenu('login.html');
    }
}
