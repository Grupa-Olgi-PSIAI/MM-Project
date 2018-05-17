<?php


namespace controller;

use core\View;
use model\Contractor;
use repository\ContractorRepository;
use util\AuthFlags;
use core\Controller;
use model\EquipmentDB;
use model\EquipmentView;
use model\Invoice;
use model\User;
use repository\EquipmentRepository;
use repository\InvoicesRepository;
use repository\UserRepository;
use util\DateUtils;
use util\Redirect;

class Equipment extends Controller
{
    private const RESOURCE_EQUIPMENT = "equipment";

    /**
     * @var EquipmentRepository
     */
    private $equipmentRepository;

    /**
     * @var InvoicesRepository
     */
    private $invoiceRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var ContractorRepository
     */
    private $contractorRepository;

    /**
     * @var UserRepository
     */

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->equipmentRepository = new EquipmentRepository();
        $this->invoiceRepository = new InvoicesRepository();
        $this->userRepository = new UserRepository();
        $this->contractorRepository = new ContractorRepository();
        $this->userRepository = new UserRepository();
    }

    private function mapToView(EquipmentDB $equipment): EquipmentView
    {
        if ($equipment->getInvoiceId() !== null) {
            /** @var Invoice $invoice */
            $invoice = $this->invoiceRepository->findById($equipment->getInvoiceId());
        }

        /** @var User $user */
        $user = $this->userRepository->findById($equipment->getUserId());

        $equipmentView = new EquipmentView();
        $equipmentView->setId($equipment->getId())
            ->setValidationDate($equipment->getValidationDate()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setUserName($user->getFirstName() . ' ' . $user->getLastName())
            ->setUserId($equipment->getUserId())
            ->setPurchaseDate($equipment->getPurchaseDate()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setPriceNet($equipment->getPriceNet())
            ->setNotes($equipment->getNotes())
            ->setInventoryNumber($equipment->getInventoryNumber())
            ->setName($equipment->getName())
            ->setDateCreated($equipment->getDateCreated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setLastUpdated($equipment->getLastUpdated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setSerialNumber($equipment->getSerialNumber())
            ->setInvoiceId($equipment->getInvoiceId());

        if (isset($invoice)) {
            $equipmentView->setInvoiceNumber($invoice->getNumber());
        }
        return $equipmentView;
    }

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::ALL_READ);

        $equipments = $this->equipmentRepository->findAll();
        $equipmentViews = [];
        foreach ($equipments as $equipment) {
            $equipmentViews[] = $this->mapToView($equipment);
        }
        View::render('equipment/equipmentList.php', [
            "equipments" => $equipmentViews,
            "title" => "Lista sprzętu",
            "filter" => "#filter_popup",
            "add" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_ADD,
            "search" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_SEARCH
        ]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::OWN_CREATE);

        $contractors = $this->contractorRepository->findAll();
        $invoices = $this->invoiceRepository->findAll();
        $users = $this->userRepository->findAll();

        View::render('equipment/equipmentAdd.php', ["contractors" => $contractors, "invoices" => $invoices, "users" => $users,  "title" => "Dodaj sprzęt"]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::OWN_CREATE);

        $user_id = $_POST['user_id'];
        $invoice_id = $_POST['invoice_id'];
        $inventory_number = $_POST['inventory_number'];
        $name = $_POST['name'];
        $serial_number = $_POST['serial_number'];
        $validation_date = $_POST['validation_date'];
        $purchase_date = $_POST['purchase_date'];
        $price_net = $_POST['price_net'];
        $notes = $_POST['notes'];

        $equipment = new EquipmentDB();
        $equipment->setVersion(1);
        $equipment->setUserId($user_id);
        $equipment->setInventoryNumber($inventory_number);
        $equipment->setName($name);
        $equipment->setValidationDate($validation_date);
        $equipment->setPurchaseDate($purchase_date);
        $equipment->setNotes($notes);
        $equipment->setInvoiceId($invoice_id);
        $equipment->setSerialNumber($serial_number);
        $equipment->setPriceNet($price_net);

        $file = $_FILES['file'];
        if (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE) {
            $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::OWN_CREATE);
            $fileStorage = FileStorage::getInstance();
            $fileId = $fileStorage->store($file, 'equipment');
            $equipment->setFileId($fileId);
        }

        $this->equipmentRepository->add($equipment);
        Redirect::to('/' . ROUTE_EQUIPMENT . '/' . ACTION_SHOW);
    }

    public function searchAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::ALL_READ);

        $criterium = $_POST['criterium'];

        $con = array('id LIKE ?', 'version LIKE ?', 'user_id LIKE ?', 'invoice_id LIKE ?',
            'inventory_number LIKE ?', 'name LIKE ?', 'notes LIKE ?', 'user_id IN (SELECT id FROM users WHERE last_name = ?)'
            ,'price_net LIKE ?');

        $val = array($criterium, $criterium, $criterium, $criterium, $criterium ,"%" . $criterium . "%",
             "%" . $criterium . "%", $criterium, $criterium);

        $equipments = $this->equipmentRepository->findOr($con, $val);
        $equipmentViews = [];
        foreach ($equipments as $equipment) {
            $equipmentViews[] = $this->mapToView($equipment);
        }

        View::render('equipment/equipmentList.php', [
            "equipments" => $equipmentViews,
            "title" => "Lista sprzętu",
            "filter" => "#filter_popup",
            "add" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_ADD,
            "search" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_SEARCH
        ]);
    }
    public function filterAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::ALL_READ);

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
        } else if ($whichDate == 'validationDate') {
            if ($dateTo == NULL) {
                $con = array('validation_date >= ?');
                $val = array($dateFrom);
            } else if ($dateFrom == NULL) {
                $con = array('validation_date <= ?');
                $val = array($dateTo);
            } else {
                $con = array('validation_date >= ?', 'validation_date <= ?');
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

        $licenses = $this->equipmentRepository->find($con, $val);
        $equipmentViews = [];
        foreach ($licenses as $equipment) {
            $equipmentViews[] = $this->mapToView($equipment);
        }

        View::render('equipment/equipmentList.php', [
            "equipments" => $equipmentViews,
            "title" => "Lista sprzętu",
            "filter" => "#filter_popup",
            "add" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_ADD,
            "search" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_SEARCH
        ]);
    }

    public function editAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::ALL_UPDATE);

        $id = $this->route_params['id'];
        /** @var EquipmentDB $equipment */
        $equipment = $this->equipmentRepository->findById($id);
        $invoices = $this->invoiceRepository->findAll();
        $users = $this->userRepository->findAll();
        View::render('equipment/equipmentEdit.php', [
            "equipment" => $equipment,
            "invoices" => $invoices,
            "users" => $users,
            "title" => "Edytuj sprzęt " . $equipment->getInventoryNumber()
        ]);
    }
    public function updateAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::ALL_UPDATE);

        $name = $_POST['name'];
        $purchase_date = $_POST['purchase_date'];
        $priceNet = $_POST['price_net'];
        $inventory_number = $_POST['inventory_number'];
        $serial_number = $_POST['serial_number'];
        $validation_date = $_POST['validation_date'];
        $notes = $_POST['notes'];
        $user_id = $_POST['user_id'];
        $invoiceId = $_POST['invoice_id'];


        $equipment = new EquipmentDB();
        $equipment->setName($name);
        $equipment->setPurchaseDate($purchase_date);
        $equipment->setVersion(1);
        $equipment->setPriceNet($priceNet);
        $equipment->setInventoryNumber($inventory_number);
        $equipment->setSerialNumber($serial_number);
        $equipment->setValidationDate($validation_date);
        $equipment->setNotes($notes);
        $equipment->setUserId($user_id);
        $equipment->setInvoiceId($invoiceId);

        $id = $this->route_params['id'];
        $this->equipmentRepository->update($id, $equipment);

        Redirect::to('/' . ROUTE_EQUIPMENT . '/' . ACTION_SHOW);
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $equipment = $this->equipmentRepository->findById($id);
        $equipmentView = $this->mapToView($equipment);
        View::render('equipment/equipmentDetails.php', ["equipment" => $equipmentView,
            "title" => "Szczegóły sprzętu " . $equipmentView->getName()]);
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_EQUIPMENT, AuthFlags::ALL_DELETE);

        $id = $this->route_params['id'];
        $this->equipmentRepository->delete($id);

        Redirect::to('/' . ROUTE_EQUIPMENT . '/' . ACTION_SHOW);
    }
}


