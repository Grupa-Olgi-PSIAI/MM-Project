<?php


namespace repository;


use core\Repository;
use model\Resource;

class ResourceRepository extends Repository
{

    /**
     * ResourceRepository constructor.
     */
    public function __construct()
    {
        parent::__construct("resources", Resource::class);
    }

    public function findByName($name)
    {
        return parent::findOne(["name = ?"], [$name]);
    }
}
