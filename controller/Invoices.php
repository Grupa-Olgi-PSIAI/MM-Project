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
use model\Invoice;
use repository\ContractorRepository;
use repository\InvoicesRepository;
use util\AuthFlags;
use util\FileStorage;
use util\Redirect;

class Invoices extends Controller
{
    private const RESOURCE_INVOICE = "invoice";
    private const RESOURCE_INVOICE_FILE = "invoice-file";

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_READ);

        $repository = new InvoicesRepository();
        $invoices = $repository->findAll();
        View::render('invoices/invoicesList.php', ["invoices" => $invoices]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::OWN_CREATE);

        $repository = new ContractorRepository();
        $contractors = $repository->findAll();
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
        $invoice->setInvoiceDate(date_create($invoice_date)->format('Y-m-d h:m:s'));
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

        $repository = new InvoicesRepository();
        $repository->add($invoice);

        Redirect::to("/invoices/show");
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_DELETE);

        $id = $_GET['id'];
        $repository = new InvoicesRepository();

        /** @var Invoice $invoice */
        $invoice = $repository->findById($id);
        $repository->delete($id);

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

        $id = $_GET['id'];
        $repository = new InvoicesRepository();

        $contractorRepository = new ContractorRepository();
        $contractors = $contractorRepository->findAll();

        $invoice = $repository->findById($id);
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
        $invoice->setInvoiceDate(date_create($invoice_date)->format('Y-m-d h:m:s'));
        $invoice->setAmountNet($amount_net);
        $invoice->setAmountGross($amount_gross);
        $invoice->setAmountTax($amount_tax);
        $invoice->setCurrency($currency);
        $invoice->setAmountNetCurrency($amount_net_currency);
        $invoice->setContractorId($contractor_id);

        $repository = new InvoicesRepository();
        $repository->update($_GET['id'], $invoice);

        Redirect::to("/invoices/show");
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE, AuthFlags::ALL_READ);

        $id = $_GET['id'];
        $repository = new InvoicesRepository();

        $invoice = $repository->findById($id);
        View::render('invoices/invoicesDetails.php', ["invoice" => $invoice]);
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

        $repository = new InvoicesRepository();
        $invoices = $repository->findOr($con, $val);
        View::render('invoices/invoicesList.php', ["invoices" => $invoices]);
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

        $repository = new InvoicesRepository();
        $invoices = $repository->find($con, $val);

        View::render('invoices/invoicesList.php', ["invoices" => $invoices]);
    }

    public function downloadAction()
    {
        $this->checkPermissions(self::RESOURCE_INVOICE_FILE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $fileStorage = FileStorage::getInstance();
        $fileStorage->download($id);
    }
}
