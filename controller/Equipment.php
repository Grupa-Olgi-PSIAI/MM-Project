<?php


namespace controller;


use core\Controller;
use model\EquipmentDB;
use model\EquipmentView;
use model\Invoice;
use model\User;
use repository\EquipmentRepository;
use repository\InvoicesRepository;
use repository\UserRepository;
use util\DateUtils;

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

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->equipmentRepository = new EquipmentRepository();
        $this->invoiceRepository = new InvoicesRepository();
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
            ->setPurchaseDate($equipment->getPurchaseDate())
            ->setPriceNet($equipment->getPriceNet())
            ->setNotes($equipment->getNotes())
            ->setInventoryNumber($equipment->getInventoryNumber())
            ->setName($equipment->getName())
            ->setDateCreated($equipment->getDateCreated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setLastUpdated($equipment->getLastUpdated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setSerialNumber($equipment->getSerialNumber())
            ->setInvoiceId($equipment->getInvoiceId());

        if (isset($invoice)) {
            $equipmentView->setInventoryNumber($invoice->getNumber());
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
            "equipment" => $equipmentViews,
            "title" => "Sprzęt",
            "filter" => "#filter_popup",
            "add" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_ADD,
            "search" => '/' . ROUTE_EQUIPMENT . '/' . ACTION_SEARCH
        ]);
    }
}
