<?php


namespace repository;


use core\Repository;
use model\Permission;

class PermissionRepository extends Repository
{

    /**
     * PermissionRepository constructor.
     */
    public function __construct()
    {
        parent::__construct("permissions", Permission::class);
    }

    public function findForUser($userId)
    {

    }
}
