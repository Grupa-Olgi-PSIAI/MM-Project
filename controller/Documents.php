<?php


namespace controller;


use core\Controller;
use core\View;
use model\Document;
use repository\ContractorRepository;
use repository\DocumentRepository;
use util\AuthFlags;
use util\FileStorage;
use util\Redirect;

class Documents extends Controller
{
    private const RESOURCE_DOCUMENTS = "document";
    private const RESOURCE_DOCUMENTS_FILE = "document-file";

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
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_READ);
        $documents = $this->repository->findAll();
        View::render('documents/documentsList.php', ["documents" => $documents]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::OWN_CREATE);

        $contractorRepository = new ContractorRepository();
        $contractors = $contractorRepository->findAll();
        View::render('documents/documentsAdd.php', ["contractors" => $contractors]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::OWN_CREATE);

        $id_internal = $_POST['id_internal'];
        $description = $_POST['description'];
        $contractor_id = $_POST['contractor_id'];

        $document = new Document();
        $document->setVersion(1);
        $document->setIdInternal($id_internal);
        $document->setDescription($description);
        $document->setContractorId($contractor_id);

        $file = $_FILES['file'];
        if (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE) {
            $this->checkPermissions(self::RESOURCE_DOCUMENTS_FILE, AuthFlags::OWN_CREATE);

            $fileStorage = FileStorage::getInstance();
            $fileId = $fileStorage->store($file, 'document');
            $document->setFileId($fileId);
        }

        $this->repository->add($document);
        Redirect::to("/documents/show");
    }

    public function filterAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_READ);

        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];
        if ($dateTo == NULL) {
            $con = array('date_created >= ?');
            $val = array($dateFrom);
        } else if ($dateFrom == NULL) {
            $con = array('date_created <= ?');
            $val = array($dateTo);
        } else {
            $con = array('date_created >= ?', 'date_created <= ?');
            $val = array($dateFrom, $dateTo);
        }

        $repository = new DocumentRepository();
        $documents = $repository->find($con, $val);

        View::render('documents/documentsList.php', ["documents" => $documents]);
    }

    public function searchAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_READ);

        $criterium = $_POST['criterium'];

        $con = array('id LIKE ?', 'version LIKE ?', 'id_internal LIKE ?', 'description LIKE ?',
            'contractor_id IN (SELECT id FROM contractors WHERE name = ?)');


        $val = array($criterium, $criterium, $criterium, "%" . $criterium . "%", $criterium);
        //"%" . $criterium . "%",

        $repository = new DocumentRepository();
        $documents = $repository->findOr($con, $val);
        View::render('documents/documentsList.php', ["documents" => $documents]);
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        /** @var Document $document */
        $document = $this->repository->findById($id);
        $contractorRepo = new ContractorRepository();
        $contractor = $contractorRepo->findById($document->getContractorId());

        View::render('documents/documentDetails.php', ['document' => $document, 'contractor' => $contractor]);
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_DELETE);

        $id = $this->route_params['id'];
        /** @var Document $document */
        $document = $this->repository->findById($id);
        $this->repository->delete($id);

        $fileStorage = FileStorage::getInstance();
        $fileId = $document->getFileId();
        if (is_numeric($fileId)) {
            $this->checkPermissions(self::RESOURCE_DOCUMENTS_FILE, AuthFlags::ALL_DELETE);
            $fileStorage->delete($fileId);
        }

        Redirect::to('/documents/show');
    }

    public function editAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_UPDATE);

        $id = $_GET['id'];
        $repository = new DocumentRepository();

        $contractorRepository = new ContractorRepository();
        $contractors = $contractorRepository->findAll();

        $document = $repository->findById($id);
        View::render('documents/documentsEdit.php', ["document" => $document, "contractors" => $contractors]);
    }

    public function updateAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_UPDATE);

        $id_internal = $_POST['id_internal'];
        $description = $_POST['description'];
        $contractor_id = $_POST['contractor_id'];

        $document = new Document();
        $document->setVersion(1);
        $document->setIdInternal($id_internal);
        $document->setDescription($description);
        $document->setContractorId($contractor_id);

        $repository = new DocumentRepository();
        $repository->update($_GET['id'], $document);

        Redirect::to('/documents/show');
    }

    public function downloadAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS_FILE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $fileStorage = FileStorage::getInstance();
        $fileStorage->download($id);
    }
}
