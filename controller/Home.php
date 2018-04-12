<?php

namespace controller;


use core\View;

class Home
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        View::render('index.html');
    }
}
