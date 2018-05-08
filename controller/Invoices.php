<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 17.04.2018
 * Time: 19:37
 */

namespace controller;

use core\Controller;
use core\View;
use model\Contractor;
use model\Invoice;
use model\InvoiceView;
use repository\ContractorRepository;
use repository\InvoicesRepository;
use util\AuthFlags;
use util\DateUtils;
use util\FileStorage;
use util\Redirect;

class Invoices extends Controller
{
    private const RESOURCE_INVOICE = "invoice";
    private const RESOURCE_INVOICE_FILE = "invoice-file";

    /**
     * @var InvoicesRepository
     */
    private $invoiceRepository;

    /**
     * @var ContractorRepository
     */
    private $contractorRepository;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->invoiceRepository = new InvoicesRepository();
        $this->contractorRepository = new ContractorRepository();
    }

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_READ);

        $invoices = $this->invoiceRepository->findAll();
        $invoiceViews = [];
        foreach ($invoices as $invoice) {
            $invoiceViews[] = $this->mapInvoiceToView($invoice);
        }
        View::render('invoices/invoicesList.php', ["invoices" => $invoiceViews]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::OWN_CREATE);

        $contractors = $this->contractorRepository->findAll();
        View::render('invoices/invoicesAdd.php', ["contractors" => $contractors]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::OWN_CREATE);

        $number = $_POST['number'];
        $invoice_date = $_POST['invoice_date'];
        $amount_net = $_POST['amount_net'];
        $amount_gross = $_POST['amount_gross'];
        $amount_tax = $amount_gross - $amount_net;
        $currency = $_POST['currency'];
        $amount_net_currency = $amount_net;
        $contractor_id = $_POST['contractor_id'];

        $invoice = new Invoice();
        $invoice->setVersion(1);
        $invoice->setNumber($number);
        $invoice->setInvoiceDate($invoice_date);
        $invoice->setAmountNet($amount_net);
        $invoice->setAmountGross($amount_gross);
        $invoice->setAmountTax($amount_tax);
        $invoice->setCurrency($currency);
        $invoice->setAmountNetCurrency($amount_net_currency);
        $invoice->setContractorId($contractor_id);

        $file = $_FILES['file'];
        if (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE) {
            $this->checkPermissions(self::RESOURCE_INVOICE_FILE, AuthFlags::OWN_CREATE);

            $fileStorage = FileStorage::getInstance();
            $fileId = $fileStorage->store($file, 'invoice');
            $invoice->setFileId($fileId);
        }

        $this->invoiceRepository->add($invoice);

        Redirect::to("/invoices/show");
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_DELETE);

        $id = $this->route_params['id'];
        /** @var Invoice $invoice */
        $invoice = $this->invoiceRepository->findById($id);
        $this->invoiceRepository->delete($id);

        $fileStorage = FileStorage::getInstance();
        $fileId = $invoice->getFileId();
        if (is_numeric($fileId)) {
            $this->checkPermissions(self::RESOURCE_INVOICE_FILE, AuthFlags::ALL_DELETE);
            $fileStorage->delete($fileId);
        }

        Redirect::to("/invoices/show");
    }

    public function editAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_UPDATE);

        $contractors = $this->contractorRepository->findAll();
        $id = $this->route_params['id'];
        $invoice = $this->invoiceRepository->findById($id);
        View::render('invoices/invoicesEdit.php', ["invoice" => $invoice, "contractors" => $contractors]);
    }

    public function updateAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_UPDATE);

        $number = $_POST['number'];
        $invoice_date = $_POST['invoice_date'];
        $amount_net = $_POST['amount_net'];
        $amount_gross = $_POST['amount_gross'];
        $amount_tax = $amount_gross - $amount_net;
        $currency = $_POST['currency'];
        $amount_net_currency = $amount_net;
        $contractor_id = $_POST['contractor_id'];

        $invoice = new Invoice();
        $invoice->setVersion(1);
        $invoice->setNumber($number);
        $invoice->setInvoiceDate($invoice_date);
        $invoice->setAmountNet($amount_net);
        $invoice->setAmountGross($amount_gross);
        $invoice->setAmountTax($amount_tax);
        $invoice->setCurrency($currency);
        $invoice->setAmountNetCurrency($amount_net_currency);
        $invoice->setContractorId($contractor_id);

        $id = $this->route_params['id'];
        $this->invoiceRepository->update($id, $invoice);

        Redirect::to("/invoices/show");
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $invoice = $this->invoiceRepository->findById($id);
        $invoiceView = $this->mapInvoiceToView($invoice);
        View::render('invoices/invoicesDetails.php', ["invoice" => $invoiceView]);
    }

    public function searchAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_READ);

        $criterium = $_POST['criterium'];

        $con = array('number LIKE ?', 'amount_gross LIKE ?', 'amount_net LIKE ?', 'amount_tax LIKE ?',
            'currency LIKE ?', 'amount_net_currency LIKE ?',
            'contractor_id IN (SELECT id FROM contractors WHERE name = ?)');

        $val = array($criterium, $criterium, $criterium, $criterium, $criterium, $criterium, $criterium);
        //"%" . $criterium . "%",

        $invoices = $this->invoiceRepository->findOr($con, $val);
        $invoiceViews = [];
        foreach ($invoices as $invoice) {
            $invoiceViews[] = $this->mapInvoiceToView($invoice);
        }

        View::render('invoices/invoicesList.php', ["invoices" => $invoiceViews]);
    }

    public function filterAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_READ);

        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];

        if ($dateTo == NULL) {
            $con = array('invoice_date >= ?');
            $val = array($dateFrom);
        } else if ($dateFrom == NULL) {
            $con = array('invoice_date <= ?');
            $val = array($dateTo);
        } else {
            $con = array('invoice_date >= ?', 'invoice_date <= ?');
            $val = array($dateFrom, $dateTo);
        }

        $invoices = $this->invoiceRepository->find($con, $val);
        $invoiceViews = [];
        foreach ($invoices as $invoice) {
            $invoiceViews[] = $this->mapInvoiceToView($invoice);
        }

        View::render('invoices/invoicesList.php', ["invoices" => $invoiceViews]);
    }

    public function downloadAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE_FILE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $fileStorage = FileStorage::getInstance();
        $fileStorage->download($id);
    }

    private function mapInvoiceToView(Invoice $invoice): InvoiceView
    {
        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->findById($invoice->getContractorId());
        $invoiceView = new InvoiceView();
        $invoiceView->setId($invoice->getId())
            ->setAmountGross($invoice->getAmountGross())
            ->setAmountNet($invoice->getAmountNet())
            ->setAmountNetCurrency($invoice->getAmountNetCurrency())
            ->setAmountTax($invoice->getAmountTax())
            ->setContractor($contractor->getName())
            ->setCurrency($invoice->getCurrency())
            ->setDateCreated($invoice->getDateCreated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setInvoiceDate($invoice->getInvoiceDate()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setNumber($invoice->getNumber())
            ->setFileId($invoice->getFileId());

        return $invoiceView;
    }
}
