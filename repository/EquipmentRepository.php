<?php


namespace repository;


use core\Repository;
use model\EquipmentDB;

class EquipmentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("equipments", EquipmentDB::class);
    }
}
