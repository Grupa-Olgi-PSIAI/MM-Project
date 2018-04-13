<?php

namespace controller;


use core\Controller;
use core\View;

class Home extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        View::render('index.html');
    }
}
