<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 20:19
 */

namespace controller;

use core\Controller;
use core\View;

use model\Document;
use repository\DocumentRepository;

class Documents extends Controller
{


    public function addAction()
    {
        $repository = new DocumentRepository();
        $documents = $repository->findAll();
        View::render('documentsAdd.php', ["documents" => $documents]);
    }

    public function showAction()
    {
        $repository = new DocumentRepository();
        $documents = $repository->findAll();

        View::render('documentsList.php', ["documents" => $documents]);
    }

    public function createAction()
    {
        unset($error);


        $version = $_POST['version'];
        $date_created = $_POST['date_created'];
        $last_updated = $_POST['last_updated'];
        $id_internal = $_POST['id_internal'];
        $description = $_POST['description'];
        $contractor_id = $_POST['contractor_id'];

        $document = new Document();



        $document->setVersion(1);
        $document->setDateCreated($date_created);
        $document->setLastUpdated($last_updated);
        $document->setIdInternal($id_internal);
        $document->setDescription($description);
        $document->setContractorId($contractor_id);

        $repository = new DocumentRepository();
        $repository->add($document);

        $documents = $repository->findAll();

        View::render('invoicesList.php', ["documents" => $documents]);
    }

}