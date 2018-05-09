<?php

namespace controller;


use core\Controller;
use core\View;
use model\Contractor;
use repository\ContractorRepository;
use util\AuthFlags;

class Contractors extends Controller
{
    private const RESOURCE_CONTRACTOR = "contractor";

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_CONTRACTOR, AuthFlags::OWN_CREATE);
        View::render('contractors/contractorsAdd.php');
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_CONTRACTOR, AuthFlags::OWN_CREATE);

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
            $contractor->setVersion(1);
            $contractor->setName($name);
            $contractor->setVatId($vat_id);

            $repository->add($contractor);

            $this->showAction();
            return;
        }

        View::render('contractors/contractorsAdd.php', [
            "error_contractor_name" => $error_contractor_name,
            "error_contractor_vat_id" => $error_contractor_vat_id,
            "error_contractor_vat_id_exists" => $error_contractor_vat_id_exists,
            "name" => $name,
            "vat_id" => $vat_id
        ]);
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_CONTRACTOR, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $repository = new ContractorRepository();
        $contractor = $repository->findById($id);
        View::render('contractors/contractorDetails.php', [
            "contractor" => $contractor,
            "title" => "Szczegóły kontrahenta"
        ]);
    }

}
