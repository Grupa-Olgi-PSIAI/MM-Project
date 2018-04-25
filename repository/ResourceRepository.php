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

    /**
     * @param string $name of resource
     * @return Resource
     */
    public function findByName($name): Resource
    {
        return parent::findOne(["name = ?"], [$name]);
    }
}
