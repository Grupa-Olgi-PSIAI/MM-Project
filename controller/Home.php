<?php

namespace controller;


use core\Controller;
use core\View;

class Home extends Controller
{
    /**
     * @throws \Exception
     */
    public function indexAction()
    {
        View::render('index.html');
    }
}
