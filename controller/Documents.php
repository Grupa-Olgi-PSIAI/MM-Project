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
