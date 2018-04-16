<?php

namespace controller;


use core\Controller;
use core\View;

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

        $name = $_POST['contractor_name'];
        $vat_id = $_POST['contractor_vat_id'];

        $error_contractor_name = ($name == '');
        $error_contractor_vat_id = ($vat_id == '');

        if (!$error_contractor_vat_id && !$error_contractor_name) {
           $this->show();
        } else {
            View::render('addContractor.php', [
                "error_contractor_name" => $error_contractor_name,
                "error_contractor_vat_id" => $error_contractor_vat_id
            ]);
        }
    }
}
