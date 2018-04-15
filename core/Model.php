<?php


namespace core;


abstract class Model
{
    private $id;

    /**
     * Get fields for database
     * @return array with all class fields and their values
     */
    abstract public function getFields(): array;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}
