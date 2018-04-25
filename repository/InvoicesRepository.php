<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 17.04.2018
 * Time: 18:56
 */

namespace repository;


use core\Repository;
use model\Invoice;

class InvoicesRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("invoices", Invoice::class);
    }
}
