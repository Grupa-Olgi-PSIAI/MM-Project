<?php


namespace repository;


use core\Repository;
use model\File;

class FileRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("files", File::class);
    }
}
