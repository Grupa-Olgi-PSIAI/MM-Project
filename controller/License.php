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
use repository\UserRepository;
use util\AuthFlags;
use util\FileStorage;
use util\Redirect;

class License extends Controller
{
    private const RESOURCE_LICENSE = "license";
    private const RESOURCE_LICENSE_FILE = "license-file";

    /**
     * @var LicenseRepository
     */
    private $repository;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->repository = new LicenseRepository();
    }

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_READ);

        $repository = new LicenseRepository();
        $licenses = $repository->findAll();
        View::render('licenseList.php', ["licenses" => $licenses]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::OWN_CREATE);

        $repository = new LicenseRepository();
        $licenses = $repository->findAll();
        View::render('licenseAdd.php', ["licenses" => $licenses]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::OWN_CREATE);

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

        $file = $_FILES['file'];
        if (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE) {
            $this->checkPermissions(self::RESOURCE_LICENSE_FILE, AuthFlags::OWN_CREATE);
            $fileStorage = FileStorage::getInstance();
            $fileId = $fileStorage->store($file, 'license');
            $license->setFileId($fileId);
        }

        $repository = new LicenseRepository();
        $repository->add($license);

        Redirect::to("/license/show");
    }

    public function updateAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_UPDATE);

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

        Redirect::to("/license/show");
    }

    public function editAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_UPDATE);

        $id = $_GET['id'];
        $repository = new LicenseRepository();

        $licence = $repository->findById($id);
        View::render('licenseEdit.php', ["license" => $licence]);
    }

    public function searchAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_READ);

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
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_READ);

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

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        /** @var Licenses $license */
        $license = $this->repository->findById($id);
        $userRepo = new UserRepository();
        $user = $userRepo->findById($license->getUserId());

        View::render('licenseDetails.php', ['license' => $license, 'user' => $user]);
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_DELETE);

        $id = $this->route_params['id'];
        /** @var Licenses $licenses */
        $licenses = $this->repository->findById($id);
        $this->repository->delete($id);

        $fileStorage = FileStorage::getInstance();
        $fileId = $licenses->getFileId();
        if (is_numeric($fileId)) {
            $this->checkPermissions(self::RESOURCE_LICENSE_FILE, AuthFlags::ALL_DELETE);
            $fileStorage->delete($fileId);
        }

        Redirect::to("/license/show");
    }

    public function downloadAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE_FILE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $fileStorage = FileStorage::getInstance();
        $fileStorage->download($id);
    }
}
