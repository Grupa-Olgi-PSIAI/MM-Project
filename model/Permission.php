<?php


namespace model;


use core\Model;

class Permission extends Model
{
    private $id;
    private $resource_id;
    private $role_id;
    private $own_perms;
    private $group_perms;
    private $other_perms;

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
     * @return Permission
     */
    public function setId($id): Permission
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getResourceId(): int
    {
        return $this->resource_id;
    }

    /**
     * @param int $resource_id
     * @return Permission
     */
    public function setResourceId($resource_id): Permission
    {
        $this->resource_id = $resource_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->role_id;
    }

    /**
     * @param int $role_id
     * @return Permission
     */
    public function setRoleId($role_id): Permission
    {
        $this->role_id = $role_id;
        return $this;
    }

    /**
     * @return string in format 'create,read,update,delete'
     */
    public function getOwnPerms(): string
    {
        return $this->own_perms;
    }

    /**
     * @param string $own_perms in format 'create,read,update,delete'
     * @return Permission
     */
    public function setOwnPerms($own_perms): Permission
    {
        $this->own_perms = $own_perms;
        return $this;
    }

    /**
     * @return string in format 'create,read,update,delete'
     */
    public function getGroupPerms(): string
    {
        return $this->group_perms;
    }

    /**
     * @param string $group_perms in format 'create,read,update,delete'
     * @return Permission
     */
    public function setGroupPerms($group_perms): Permission
    {
        $this->group_perms = $group_perms;
        return $this;
    }

    /**
     * @return string in format 'create,read,update,delete'
     */
    public function getOtherPerms(): string
    {
        return $this->other_perms;
    }

    /**
     * @param string $other_perms in format 'create,read,update,delete'
     * @return Permission
     */
    public function setOtherPerms($other_perms): Permission
    {
        $this->other_perms = $other_perms;
        return $this;
    }
}
