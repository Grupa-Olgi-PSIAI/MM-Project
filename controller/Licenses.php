<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 22:14
 */

namespace controller;


use repository\LicenseRepository;

class Licenses extends Controller
{
    public function addAction()
    {
        $repository = new LicenseRepository();
        $licenses = $repository->findAll();
        View::render('licenseAdd.php', ["licenses" => $licenses]);
    }

    public function showAction()
    {
        $repository = new LicenseRepository();
        $licenses = $repository->findAll();

        View::render('licenseList.php', ["licenses" => $licenses]);
    }
}