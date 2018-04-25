<?php


namespace model;


use core\Model;

class Permission extends Model
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $resource_id;

    /**
     * @var int
     */
    private $role_id;

    /**
     * @var null|string format: 'create,read,update,delete'
     */
    private $own_perms;

    /**
     * @var null|string format: 'create,read,update,delete'
     */
    private $group_perms;

    /**
     * @var null|string format: 'create,read,update,delete'
     */
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
    public function setId(int $id): Permission
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
    public function setResourceId(int $resource_id): Permission
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
    public function setRoleId(int $role_id): Permission
    {
        $this->role_id = $role_id;
        return $this;
    }

    /**
     * @return null|string format: 'create,read,update,delete'
     */
    public function getOwnPerms(): ?string
    {
        return $this->own_perms;
    }

    /**
     * @param null|string $own_perms format: 'create,read,update,delete'
     * @return Permission
     */
    public function setOwnPerms(?string $own_perms): Permission
    {
        $this->own_perms = $own_perms;
        return $this;
    }

    /**
     * @return null|string format: 'create,read,update,delete'
     */
    public function getGroupPerms(): ?string
    {
        return $this->group_perms;
    }

    /**
     * @param null|string $group_perms format: 'create,read,update,delete'
     * @return Permission
     */
    public function setGroupPerms(?string $group_perms): Permission
    {
        $this->group_perms = $group_perms;
        return $this;
    }

    /**
     * @return null|string format: 'create,read,update,delete'
     */
    public function getOtherPerms(): ?string
    {
        return $this->other_perms;
    }

    /**
     * @param null|string $other_perms format: 'create,read,update,delete'
     * @return Permission
     */
    public function setOtherPerms(?string $other_perms): Permission
    {
        $this->other_perms = $other_perms;
        return $this;
    }
}
