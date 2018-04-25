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
    public function filterAction()
    {
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];
        $con = array('date_created >= ?','date_created <= ?');
        $val = array($dateFrom,$dateTo);

        $repository = new DocumentRepository();
        $documentsFilter = $repository->find($con,$val);
        echo "<script>console.log( 'Debug Objects: " . $dateFrom . "' );</script>";

        View::render('documentsList.php', ["documentsFilter" => $documentsFilter]);
    }

    /**
     * @throws \Exception
     */

    public function search() {

        $criterium = $_POST['criterium'];

        $con = array('id LIKE ?','version LIKE ?','id_internal LIKE ?','description LIKE ?',
            'contractor_id IN (SELECT id FROM contractors WHERE name = ?)');


        $val = array($criterium,$criterium,$criterium,"%" . $criterium . "%",$criterium);
        //"%" . $criterium . "%",

        $repository = new DocumentRepository();
        $documentsSearch = $repository->findOr($con,$val);
        View::render('documentsList.php', ["documentsSearch" => $documentsSearch]);
    }
}