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
    private $other_perm;

    /**
     * Get fields for database
     * @return array with all class fields and their values
     */
    public function getFields(): array
    {
        return get_object_vars($this);
    }

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

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resource_id;
    }

    /**
     * @param mixed $resource_id
     */
    public function setResourceId($resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * @param mixed $role_id
     */
    public function setRoleId($role_id): void
    {
        $this->role_id = $role_id;
    }

    /**
     * @return mixed
     */
    public function getOwnPerms()
    {
        return $this->own_perms;
    }

    /**
     * @param mixed $own_perms
     */
    public function setOwnPerms($own_perms): void
    {
        $this->own_perms = $own_perms;
    }

    /**
     * @return mixed
     */
    public function getGroupPerms()
    {
        return $this->group_perms;
    }

    /**
     * @param mixed $group_perms
     */
    public function setGroupPerms($group_perms): void
    {
        $this->group_perms = $group_perms;
    }

    /**
     * @return mixed
     */
    public function getOtherPerm()
    {
        return $this->other_perm;
    }

    /**
     * @param mixed $other_perm
     */
    public function setOtherPerm($other_perm): void
    {
        $this->other_perm = $other_perm;
    }
}
