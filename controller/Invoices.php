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

class Invoices extends Controller
{
    /**
     * @throws \Exception
     */
    public function showAction()
    {
        $repository = new InvoicesRepository();
        $invoices = $repository->findAll();

        View::render('invoicesList.php', ["invoices" => $invoices]);
    }


    /**
     * @throws \Exception
     */
    public function addAction()
    {
        $repository = new ContractorRepository();
        $contractors = $repository->findAll();
        View::render('invoicesAdd.php', ["contractors" => $contractors]);
    }

    /**
     * @throws \Exception
     */
    public function createAction()
    {
        unset($error);

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
        $repository->add($invoice);
        $invoices = $repository->findAll();

        View::render('invoicesList.php', ["invoices" => $invoices]);
    }

    public function delete() {

        $id = $_GET['id'];

        echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";

        $repository = new InvoicesRepository();
        $repository->delete($id);

        $invoices = $repository->findAll();
        View::render('invoicesList.php', ["invoices" => $invoices]);

    }

    /**
     * @throws \Exception
     */
    public function edit() {
        $id = $_GET['id'];
        $repository = new InvoicesRepository();

        $contractorRepository = new ContractorRepository();
        $contractors = $contractorRepository->findAll();

        $invoice = $repository->findById($id);
        View::render('invoicesEdit.php', ["invoice" => $invoice, "contractors" => $contractors]);
    }

    /**
     * @throws \Exception
     */
    public function details() {
        $id = $_GET['id'];
        $repository = new InvoicesRepository();

        $invoice = $repository->findById($id);
        View::render('invoicesDetails.php', ["invoice" => $invoice]);
    }

    public function search() {

        $id = $_POST['id'];

        echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";

        $repository = new InvoicesRepository();
        $invoice = $repository->findById($id);
        View::render('invoicesList.php', ["invoice" => $invoice]);
    }

    public function filterAction()
    {
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];
        $con = array('date_created > ?','date_created < ?');
        $val = array($dateFrom,$dateTo);

        echo "<script>console.log('chuuj=".$val[0]."');</script>";
        echo "<script>console.log( 'kondy " . $con[0] . "' );</script>";

        $repository = new InvoicesRepository();
        $invoiceFilter = $repository->find($con,$val);


        View::render('invoicesList.php', ["invoiceFilter" => $invoiceFilter]);
    }

    /**
     * @throws \Exception
     */
    public function updateAction()
    {
        unset($error);

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
        $repository->update($_GET['id'],$invoice);
        $invoices = $repository->findAll();

        View::render('invoicesList.php', ["invoices" => $invoices]);
    }
}