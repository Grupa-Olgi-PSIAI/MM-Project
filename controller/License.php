<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 22:14
 */

namespace controller;

use core\View;
use core\Controller;
use repository\LicenseRepository;
use model\Licenses;

class License extends Controller
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


    public function createAction()
    {
        unset($error);

        $version = $_POST['version'];
        $date_created = $_POST['date_created'];
        $last_updated = $_POST['last_updated'];
        $user_id = $_POST['user_id'];
        $inventary_number = $_POST['inventary_number'];
        $name = $_POST['name'];
        $serial_key = $_POST['serial_key'];
        $validation_date = $_POST['validation_date'];
        $tech_support_end_date = $_POST['tech_support_end_date'];
        $purchase_date = $_POST['purchase_date'];
        $price_net = $_POST['price_net'];
        $notes = $_POST['notes'];


        $license = new Licenses();

        $license->setVersion(1);
        $license->setDateCreated(date_create($date_created)->format('Y-m-d h:m:s'));
        $license->setLastUpdated(date_create($last_updated)->format('Y-m-d h:m:s'));
        $license->setUserId($user_id);
        $license->setInventaryNumber($inventary_number);
        $license->setName($name);
        $license->setSerialKey($serial_key);
        $license->setValidationDate(date_create($validation_date)->format('Y-m-d h:m:s'));
        $license->setTechSupportEndDate(date_create($tech_support_end_date)->format('Y-m-d h:m:s'));
        $license->setPurchaseDate(date_create($purchase_date)->format('Y-m-d h:m:s'));
        $license->setPriceNet($price_net);
        $license->setNotes($notes);

        $repository = new LicenseRepository();
        $repository->add($license);
        $licenses = $repository->findAll();

        View::render('licenseList.php', ["licenses" => $licenses]);
    }

    public function updateAction()
    {
        unset($error);

        $version = $_POST['version'];
        $date_created = $_POST['date_created'];
        $last_updated = $_POST['last_updated'];
        $user_id = $_POST['user_id'];
        $inventary_number = $_POST['inventary_number'];
        $name = $_POST['name'];
        $serial_key = $_POST['serial_key'];
        $validation_date = $_POST['validation_date'];
        $tech_support_end_date = $_POST['tech_support_end_date'];
        $purchase_date = $_POST['purchase_date'];
        $price_net = $_POST['price_net'];
        $notes = $_POST['notes'];


        $license = new Licenses();

        $license->setVersion(1);
        $license->setDateCreated(date_create($date_created)->format('Y-m-d h:m:s'));
        $license->setLastUpdated(date_create($last_updated)->format('Y-m-d h:m:s'));
        $license->setUserId($user_id);
        $license->setInventaryNumber($inventary_number);
        $license->setName($name);
        $license->setSerialKey($serial_key);
        $license->setValidationDate(date_create($validation_date)->format('Y-m-d h:m:s'));
        $license->setTechSupportEndDate(date_create($tech_support_end_date)->format('Y-m-d h:m:s'));
        $license->setPurchaseDate(date_create($purchase_date)->format('Y-m-d h:m:s'));
        $license->setPriceNet($price_net);
        $license->setNotes($notes);

        $repository = new LicenseRepository();
        $repository->update($_GET['id'],$license);
        $licenses = $repository->findAll();

        View::render('licenseList.php', ["licenses" => $licenses]);
    }

    /**
     * @throws \Exception
     */
    public function edit() {
        $id = $_GET['id'];
        $repository = new LicenseRepository();

        $licence = $repository->findById($id);
        View::render('licenseEdit.php', ["license" => $licence]);
    }

}