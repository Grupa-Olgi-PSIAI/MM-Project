<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 22:06
 */

namespace repository;


use model\License;
use core\Repository;


class LicenseRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("licences", License::class);
    }
}