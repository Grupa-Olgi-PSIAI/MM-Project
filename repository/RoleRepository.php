<?php


namespace repository;


use core\Repository;
use model\Role;

class RoleRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("roles", Role::class);
    }

    /**
     * @param string $authority name of authority
     * @return Role
     */
    public function findByAuthority($authority): Role
    {
        return parent::findOne(["authority = ?"], [$authority]);
    }
}
