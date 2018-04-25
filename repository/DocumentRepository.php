<?php


namespace repository;


use core\Repository;
use model\Document;

class DocumentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("documents", Document::class);
    }

    public function findByContractorId($contractorId)
    {
        return parent::find(["contractor_id"], [$contractorId]);
    }

    public function findByContractorName($contractorName)
    {
        $contractorRepo = new ContractorRepository();
        $id = $contractorRepo->findByName($contractorName);
        return parent::find(["contractor_id"], [$id]);
    }
}
