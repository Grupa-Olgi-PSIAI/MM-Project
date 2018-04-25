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

    /**
     * @param int $roleId id of role
     * @return array of Permissions
     */
    public function findByRoleId(int $roleId): array
    {
        return parent::find(["role_id = ?"], [$roleId]);
    }
}
