<?php


namespace repository;


use core\Repository;
use model\Contractor;

class ContractorRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("contractors", Contractor::class);
    }

    public function findByName($name)
    {
        return parent::findOne(["name = ?"], [$name]);
    }

    public function findByVatId($vat_id)
    {
        return parent::findOne(["vat_id = ?"], [$vat_id]);
    }
}
