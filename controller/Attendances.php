<?php

namespace controller;


use core\Controller;
use core\View;

class Attendances extends Controller
{
    /**
     * @throws \Exception
     */
    public function showAction()
    {
        View::render('attendances.php');
    }

    /**
     * @throws \Exception
     */
    public function addRecord()
    {

    }

}
