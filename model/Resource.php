<?php


namespace model;


use core\Model;

class Resource extends Model
{
    private $id;
    private $name;

    /**
     * Get fields for database
     * @return array with all class fields and their values
     */
    public function getFields(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Resource
     */
    public function setId($id): Resource
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Resource
     */
    public function setName($name): Resource
    {
        $this->name = $name;
        return $this;
    }
}
