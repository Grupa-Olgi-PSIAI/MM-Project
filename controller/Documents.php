<?php


namespace controller;


use core\Controller;
use repository\DocumentRepository;
use util\AuthFlags;

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
        // TODO load view
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

        $documents = $repository->findAll();

        View::render('invoicesList.php', ["documents" => $documents]);
    }

    public function showDetailsAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_READ);

        $id = $this->route_params['id'];
        $document = $this->repository->findById($id);

        // TODO load view
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE, AuthFlags::OWN_DELETE);

        $id = $this->route_params['id'];
        $this->repository->delete($id);
    }
}
