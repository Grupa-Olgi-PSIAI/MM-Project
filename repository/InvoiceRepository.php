<?php


namespace repository;


use core\Repository;
use model\Invoice;

class InvoiceRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("invoices", Invoice::class);
    }

}
