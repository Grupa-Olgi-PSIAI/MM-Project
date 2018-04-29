<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 22:14
 */

namespace controller;

use core\Controller;
use core\View;
use model\Licenses;
use repository\LicenseRepository;

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
        $repository->update($_GET['id'], $license);
        $licenses = $repository->findAll();

        View::render('licenseList.php', ["licenses" => $licenses]);
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        $id = $_GET['id'];
        $repository = new LicenseRepository();

        $licence = $repository->findById($id);
        View::render('licenseEdit.php', ["license" => $licence]);
    }

    public function search()
    {

        $criterium = $_POST['criterium'];

        $con = array('id LIKE ?', 'version LIKE ?', 'user_id LIKE ?', 'inventary_number LIKE ?',
            'name LIKE ?', 'serial_key LIKE ?', 'notes LIKE ?', 'price_net LIKE ?', 'user_id IN (SELECT id FROM users WHERE last_name = ?)');

        $val = array($criterium, $criterium, $criterium, $criterium, "%" . $criterium . "%", $criterium, "%" . $criterium . "%", $criterium, $criterium);

        $repository = new LicenseRepository();
        $licenses = $repository->findOr($con, $val);
        View::render('licenseList.php', ["licenses" => $licenses]);
    }

    public function filterAction()
    {
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];
        $whichDate = $_POST['whichDate'];

        if ($whichDate == 'purchaseDate') {
            if ($dateTo == NULL) {
                $con = array('purchase_date >= ?');
                $val = array($dateFrom);
            } else if ($dateFrom == NULL) {
                $con = array('purchase_date <= ?');
                $val = array($dateTo);
            } else {
                $con = array('purchase_date >= ?', 'purchase_date <= ?');
                $val = array($dateFrom, $dateTo);
            }
        } else if ($whichDate == 'reviewDate') {
            if ($dateTo == NULL) {
                $con = array('tech_support_end_date >= ?');
                $val = array($dateFrom);
            } else if ($dateFrom == NULL) {
                $con = array('tech_support_end_date <= ?');
                $val = array($dateTo);
            } else {
                $con = array('tech_support_end_date >= ?', 'tech_support_end_date <= ?');
                $val = array($dateFrom, $dateTo);
            }
        } else {
            if ($dateTo == NULL) {
                $con = array('date_created >= ?');
                $val = array($dateFrom);
            } else if ($dateFrom == NULL) {
                $con = array('date_created <= ?');
                $val = array($dateTo);
            } else {
                $con = array('date_created >= ?', 'date_created <= ?');
                $val = array($dateFrom, $dateTo);
            }
        }

        $repository = new LicenseRepository();
        $licenses = $repository->find($con, $val);


        View::render('licenseList.php', ["licenses" => $licenses]);
    }

}
