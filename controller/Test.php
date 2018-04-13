<?php

namespace controller;


use core\Controller;
use core\View;

class Test extends Controller
{
    /**
     * @throws \Exception
     */
    public function show()
    {
        View::render('test.html');
    }
}
