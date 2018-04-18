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
        View::render('invoicesAdd.php');
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
        $invoice->setInvoiceDate($invoice_date);
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
}