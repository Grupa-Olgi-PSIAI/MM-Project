<?php


namespace controller;


use core\Controller;
use core\View;
use model\Document;
use repository\ContractorRepository;
use repository\DocumentRepository;
use util\AuthFlags;
use util\Redirect;

class Documents extends Controller
{
    private const RESOURCE = "documents";

    /**
     * @var DocumentRepository
     */
    private $repository;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->repository = new DocumentRepository();
    }

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_READ);
        $documents = $this->repository->findAll();
        View::render('documentsList.php', ["documents" => $documents]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_CREATE);

        $documents = $this->repository->findAll();
        View::render('documentsAdd.php', ["documents" => $documents]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_CREATE);

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

        $this->repository->add($document);

        $documents = $this->repository->findAll();

        View::render('documentsList.php', ["documents" => $documents]);
    }

    public function filterAction()
    {
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];
        if($dateTo == NULL){
            $con = array('date_created >= ?');
            $val = array($dateFrom);
        }
        else if($dateFrom == NULL){
            $con = array('date_created <= ?');
            $val = array($dateTo);
        }
        else{
            $con = array('date_created >= ?', 'date_created <= ?');
            $val = array($dateFrom, $dateTo);
        }

        $repository = new DocumentRepository();
        $documents = $repository->find($con, $val);

        View::render('documentsList.php', ["documents" => $documents]);
    }

    /**
     * @throws \Exception
     */

    public function search()
    {

        $criterium = $_POST['criterium'];

        $con = array('id LIKE ?', 'version LIKE ?', 'id_internal LIKE ?', 'description LIKE ?',
            'contractor_id IN (SELECT id FROM contractors WHERE name = ?)');


        $val = array($criterium, $criterium, $criterium, "%" . $criterium . "%", $criterium);
        //"%" . $criterium . "%",

        $repository = new DocumentRepository();
        $documents = $repository->findOr($con, $val);
        View::render('documentsList.php', ["documents" => $documents]);
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_READ);

        $id = $this->route_params['id'];
        /** @var Document $document */
        $document = $this->repository->findById($id);
        $contractorRepo = new ContractorRepository();
        $contractor = $contractorRepo->findById($document->getContractorId());

        View::render('documentDetails.php', ['document' => $document, 'contractor' => $contractor]);
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_DELETE);

        $id = $this->route_params['id'];
        $this->repository->delete($id);

        Redirect::to('/documents/show');
    }

    /**
     * @throws \Exception
     */
    public function edit() {
        $id = $_GET['id'];
        $repository = new DocumentRepository();

        $contractorRepository = new ContractorRepository();
        $contractors = $contractorRepository->findAll();

        $document = $repository->findById($id);
        View::render('documentsEdit.php', ["document" => $document, "contractors" => $contractors]);
    }

    public function updateAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_CREATE);

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
        $repository->update($_GET['id'],$document);
        $documents = $repository->findAll();

        View::render('documentsList.php', ["documents" => $documents]);
    }
}
