<?php


namespace controller;


use core\Controller;
use core\View;
use model\Contractor;
use model\Document;
use model\DocumentView;
use repository\ContractorRepository;
use repository\DocumentRepository;
use util\AuthFlags;
use util\DateUtils;
use util\FileStorage;
use util\Redirect;

class Documents extends Controller
{
    private const RESOURCE_DOCUMENTS = "document";
    private const RESOURCE_DOCUMENTS_FILE = "document-file";

    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    /**
     * @var ContractorRepository
     */
    private $contractorRepository;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->documentRepository = new DocumentRepository();
        $this->contractorRepository = new ContractorRepository();
    }

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_READ);

        $documents = $this->documentRepository->findAll();
        $documentViews = [];
        foreach ($documents as $document) {
            $documentViews[] = $this->maptoView($document);
        }

        View::render('documents/documentsList.php', ["documents" => $documentViews,
            "title" => "Lista dokumentów",
            "filter" => "#filter_popup",
            "add" => "/documents/add",
            "search" => "/documents/search"]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::OWN_CREATE);

        $contractors = $this->contractorRepository->findAll();
        View::render('documents/documentsAdd.php', ["contractors" => $contractors, "title" => "Dodaj dokument"]);
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

        $this->documentRepository->add($document);
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

        $documents = $this->documentRepository->find($con, $val);
        $documentViews = [];
        foreach ($documents as $document) {
            $documentViews[] = $this->maptoView($document);
        }

        View::render('documents/documentsList.php', ["documents" => $documentViews,
            "title" => "Lista dokumentów",
            "filter" => "#filter_popup",
            "add" => "/documents/add",
            "search" => "/documents/search"]);
    }

    public function searchAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_READ);

        $criterium = $_POST['criterium'];

        $con = array('id LIKE ?', 'version LIKE ?', 'id_internal LIKE ?', 'description LIKE ?',
            'contractor_id IN (SELECT id FROM contractors WHERE name = ?)');


        $val = array($criterium, $criterium, $criterium, "%" . $criterium . "%", $criterium);
        //"%" . $criterium . "%",

        $documents = $this->documentRepository->findOr($con, $val);
        $documentViews = [];
        foreach ($documents as $document) {
            $documentViews[] = $this->maptoView($document);
        }

        View::render('documents/documentsList.php', ["documents" => $documentViews,
            "title" => "Lista dokumentów",
            "filter" => "#filter_popup",
            "add" => "/documents/add",
            "search" => "/documents/search"]);
    }

    public function detailsAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $document = $this->documentRepository->findById($id);
        $documentView = $this->maptoView($document);

        View::render('documents/documentDetails.php', ['document' => $documentView,
            "title" => "Szczegóły dokumentu o identyfikatorze: " . $documentView->getInternalId()]);
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS, AuthFlags::ALL_DELETE);

        $id = $this->route_params['id'];
        /** @var Document $document */
        $document = $this->documentRepository->findById($id);
        $this->documentRepository->delete($id);

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

        $id = $this->route_params['id'];
        /** @var Document $document */
        $document = $this->documentRepository->findById($id);
        $contractors = $this->contractorRepository->findAll();

        View::render('documents/documentsEdit.php', ["document" => $document,
            "contractors" => $contractors,
            "title" => "Edytuj dokument " . $document->getIdInternal()]);
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

        $id = $this->route_params['id'];
        $this->documentRepository->update($id, $document);

        Redirect::to('/documents/show');
    }

    public function downloadAction()
    {
        $this->checkPermissions(self::RESOURCE_DOCUMENTS_FILE, AuthFlags::ALL_READ);

        $id = $this->route_params['id'];
        $fileStorage = FileStorage::getInstance();
        $fileStorage->download($id);
    }

    private function maptoView(Document $document): DocumentView
    {
        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->findById($document->getContractorId());
        $documentView = new DocumentView();
        $documentView->setId($document->getId())
            ->setFileId($document->getFileId())
            ->setDateCreated($document->getDateCreated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setLastUpdated($document->getLastUpdated()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setContractor($contractor->getName())
            ->setDescription($document->getDescription())
            ->setInternalId($document->getIdInternal());

        return $documentView;
    }
}
