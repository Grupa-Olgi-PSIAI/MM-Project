<?php


namespace repository;


use core\Repository;
use model\Attendance;

class AttendanceRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("attendances", Attendance::class);
    }

    public function findByUserId($user_id)
    {
        return parent::find(["user_id = ?"], [$user_id]);
    }
}
