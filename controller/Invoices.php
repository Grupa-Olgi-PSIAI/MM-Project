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
    public function show()
    {
        View::render('invoicesList.php');
    }

    public function add()
    {
        View::render('invoicesAdd.php');
    }
    
    public function createAction() {


        unset($error);

        $id = $_POST['id'];
        $version  = $_POST['version'];
        $date_created  = $_POST['date_created'];
        $last_updated  = $_POST['last_updated'];
        $number  = $_POST['number'];
        $invoice_date  = $_POST['invoice_date'];
        $amount_net  = $_POST['amount_net'];
        $amount_gross  = $_POST['amount_gross'];
        $amount_tax  = $_POST['amount_tax'];
        $currency  = $_POST['currency'];
        $amount_net_currency  = $_POST['amount_net_currency'];
        $contractor_id  = $_POST['contractor_id'];

        $invoice = new Invoice();

        $invoice->setId($id);
        $invoice->setVersion($version);
        $invoice->setDateCreated($date_created);
        $invoice->setLastUpdated($last_updated);
        $invoice->setNumber($number);
        $invoice->setInvoiceDate($invoice_date);
        $invoice->setAmountNet($amount_net);
        $invoice->setAmountGross($amount_gross);
        $invoice->setAmountTax($amount_tax);
        $invoice->setCurrency($currency);
        $invoice->setAmountNetCurrency($amount_net_currency);
        $invoice->setContractorId($contractor_id);

        $test = $invoice->getId();




        $repository = new InvoicesRepository();
        $result = $repository->add($invoice);

        echo "<script>console.log($result);</script>";

        if ($repository->add($invoice)) {
            View::render('invoicesList.php');
        }

    }


}