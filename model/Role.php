<?php


namespace model;


use core\Model;

class Role extends Model
{
    private $id;
    private $version;
    private $authority;

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
     * @return Role
     */
    public function setId($id): Role
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return Role
     */
    public function setVersion($version): Role
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthority(): string
    {
        return $this->authority;
    }

    /**
     * @param string $authority
     * @return Role
     */
    public function setAuthority($authority): Role
    {
        $this->authority = $authority;
        return $this;
    }
}
