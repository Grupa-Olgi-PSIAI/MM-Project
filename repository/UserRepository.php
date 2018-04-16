<?php


namespace repository;


use core\Repository;
use model\User;

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("users", User::class);
    }


    public function findByEmail($email)
    {
        return parent::findOne(["email = ?"], [$email]);
    }
}
