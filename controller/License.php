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
use model\Invoice;
use model\Licenses;
use model\LicenseView;
use model\User;
use repository\InvoicesRepository;
use repository\LicenseRepository;
use repository\UserRepository;
use util\AuthFlags;
use util\DateUtils;
use util\FileStorage;
use util\Redirect;

class License extends Controller
{
    private const RESOURCE_LICENSE = "license";
    private const RESOURCE_LICENSE_FILE = "license-file";

    /**
     * @var LicenseRepository
     */
    private $licenseRepository;

    /**
     * @var InvoicesRepository
     */
    private $invoiceRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->licenseRepository = new LicenseRepository();
        $this->invoiceRepository = new InvoicesRepository();
        $this->userRepository = new UserRepository();
    }

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_READ);

        $licenses = $this->licenseRepository->findAll();
        $licenseViews = [];
        foreach ($licenses as $license) {
            $licenseViews[] = $this->mapToView($license);
        }

        View::render('licenses/licenseList.php', [
            "licenses" => $licenseViews,
            "title" => "Lista licencji",
            "filter" => "#filter_popup",
            "add" => "/license/add",
            "search" => "/license/search"
        ]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::OWN_CREATE);

        $invoices = $this->invoiceRepository->findAll();
        $users = $this->userRepository->findAll();
        View::render('licenses/licenseAdd.php', [
            "invoices" => $invoices,
            "users" => $users,
            "title" => "Dodaj licencję"
        ]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::OWN_CREATE);

        $user_id = $_POST['user_id'];
        $inventory_number = $_POST['inventory_number'];
        $name = $_POST['name'];
        $serial_key = $_POST['serial_key'];
        $validation_date = $_POST['validation_date'];
        $tech_support_end_date = $_POST['tech_support_end_date'];
        $purchase_date = $_POST['purchase_date'];
        $notes = $_POST['notes'];
        $invoiceId = $_POST['invoice_id'];

        $license = new Licenses();
        $license->setVersion(1);
        $license->setUserId($user_id);
        $license->setInventoryNumber($inventory_number);
        $license->setName($name);
        $license->setSerialKey($serial_key);
        $license->setValidationDate($validation_date);
        $license->setTechSupportEndDate($tech_support_end_date);
        $license->setPurchaseDate($purchase_date);
        $license->setNotes($notes);
        $license->setInvoiceId($invoiceId);

        $file = $_FILES['file'];
        if (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE) {
            $this->checkPermissions(self::RESOURCE_LICENSE_FILE, AuthFlags::OWN_CREATE);
            $fileStorage = FileStorage::getInstance();
            $fileId = $fileStorage->store($file, 'license');
            $license->setFileId($fileId);
        }

        $this->licenseRepository->add($license);

        Redirect::to("/license/show");
    }

    public function updateAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_UPDATE);

        $user_id = $_POST['user_id'];
        $inventory_number = $_POST['inventory_number'];
        $name = $_POST['name'];
        $serial_key = $_POST['serial_key'];
        $validation_date = $_POST['validation_date'];
        $tech_support_end_date = $_POST['tech_support_end_date'];
        $purchase_date = $_POST['purchase_date'];
        $notes = $_POST['notes'];
        $invoiceId = $_POST['invoice_id'];

        $license = new Licenses();
        $license->setVersion(1);
        $license->setUserId($user_id);
        $license->setInventoryNumber($inventory_number);
        $license->setName($name);
        $license->setSerialKey($serial_key);
        $license->setValidationDate($validation_date);
        $license->setTechSupportEndDate($tech_support_end_date);
        $license->setPurchaseDate($purchase_date);
        $license->setNotes($notes);
        $license->setInvoiceId($invoiceId);

        $id = $this->route_params['id'];
        $this->licenseRepository->update($id, $license);

        Redirect::to("/license/show");
    }

    public function editAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_UPDATE);

        $id = $this->route_params['id'];
        /** @var Licenses $license */
        $license = $this->licenseRepository->findById($id);
        $invoices = $this->invoiceRepository->findAll();
        $users = $this->userRepository->findAll();
        View::render('licenses/licenseEdit.php', [
            "license" => $license,
            "invoices" => $invoices,
            "users" => $users,
            "title" => "Edytuj licencję " . $license->getInventoryNumber()
        ]);
    }

    public function searchAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_READ);

        $criterium = $_POST['criterium'];

        $con = array('id LIKE ?', 'version LIKE ?', 'user_id LIKE ?', 'inventory_number LIKE ?',
            'name LIKE ?', 'serial_key LIKE ?', 'notes LIKE ?', 'user_id IN (SELECT id FROM users WHERE last_name = ?)');

        $val = array($criterium, $criterium, $criterium, $criterium, "%" . $criterium . "%",
            $criterium, "%" . $criterium . "%", $criterium);

        $licenses = $this->licenseRepository->findOr($con, $val);
        $licenseViews = [];
        foreach ($licenses as $license) {
            $licenseViews[] = $this->mapToView($license);
        }

        View::render('licenses/licenseList.php', [
            "licenses" => $licenseViews,
            "title" => "Lista licencji",
            "filter" => "#filter_popup",
            "add" => "/license/add",
            "search" => "/license/search"
        ]);
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

        $licenses = $this->licenseRepository->find($con, $val);
        $licenseViews = [];
        foreach ($licenses as $license) {
            $licenseViews[] = $this->mapToView($license);
        }

        View::render('licenses/licenseList.php', [
            "licenses" => $licenseViews,
            "title" => "Lista licencji",
            "filter" => "#filter_popup",
            "add" => "/license/add",
            "search" => "/license/search"
        ]);
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        /** @var Licenses $license */
        $license = $this->licenseRepository->findById($id);
        $licenseView = $this->mapToView($license);

        View::render('licenses/licenseDetails.php', [
            'license' => $licenseView,
            "title" => "Szczegóły licencji " . $licenseView->getInventoryNumber()
        ]);
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_LICENSE, AuthFlags::ALL_DELETE);

        $id = $this->route_params['id'];
        /** @var Licenses $licenses */
        $licenses = $this->licenseRepository->findById($id);
        $this->licenseRepository->delete($id);

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

    private function mapToView(Licenses $license): LicenseView
    {
        /** @var Invoice $invoice */
        $invoice = $this->invoiceRepository->findById($license->getInvoiceId());
        /** @var User $user */
        $user = $this->userRepository->findById($license->getUserId());
        $licenseView = new LicenseView();
        $licenseView->setId($license->getId())
            ->setLastUpdated($license->getLastUpdated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setDateCreated($license->getDateCreated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setFileId($license->getFileId())
            ->setName($license->getName())
            ->setInventoryNumber($license->getInventoryNumber())
            ->setInvoiceId($license->getInvoiceId())
            ->setInvoiceNumber($invoice->getNumber())
            ->setNotes($license->getNotes())
            ->setPurchaseDate($license->getPurchaseDate()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setSerialKey($license->getSerialKey())
            ->setTechSupportEndDate($license->getTechSupportEndDate()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setUserId($license->getUserId())
            ->setUserName($user->getFirstName() . ' ' . $user->getLastName())
            ->setValidationDate($license->getValidationDate()->format(DateUtils::$PATTERN_DASHED_DATE));

        return $licenseView;
    }
}
