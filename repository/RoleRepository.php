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

    public function findByAuthority($authority)
    {
        return parent::findOne(["authority = ?"], [$authority]);
    }
}
