<?php


namespace core;


abstract class Model
{
    /**
     * Get fields for database
     * @return array with all class fields and their values
     */
    abstract public function getFields(): array;

    abstract public function getId();

    abstract public function setId($id);
}
