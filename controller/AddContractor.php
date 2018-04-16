<?php

namespace controller;


use core\Controller;
use core\View;
use model\Contractor;
use repository\ContractorRepository;

class AddContractor extends Controller
{
    /**
     * @throws \Exception
     */
    public function show()
    {
        View::render('addContractor.php');
    }

    /**
     * @throws \Exception
     */
    public function addContractorAction()
    {
        unset($error_contractor_name);
        unset($error_contractor_vat_id);
        unset($error_contractor_vat_id_exists);

        $name = $_POST['contractor_name'];
        $vat_id = $_POST['contractor_vat_id'];

        $error_contractor_name = ($name == '');
        $error_contractor_vat_id = ($vat_id == '');

        $repository = new ContractorRepository();
        $contractorWithVat = $repository->findByVatId($vat_id);
        $error_contractor_vat_id_exists = $contractorWithVat != null;

        if (!$error_contractor_vat_id &&
            !$error_contractor_name &&
            !$error_contractor_vat_id_exists) {

            $contractor = new Contractor();
            $contractor->prepareInitialObject();
            $contractor->setName($name);
            $contractor->setVatId($vat_id);

            $repository->add($contractor);

            $this->show();
            return;
        }

        View::render('addContractor.php', [
            "error_contractor_name" => $error_contractor_name,
            "error_contractor_vat_id" => $error_contractor_vat_id,
            "error_contractor_vat_id_exists" => $error_contractor_vat_id_exists,
            "name" => $name,
            "vat_id" => $vat_id
        ]);
    }

}
