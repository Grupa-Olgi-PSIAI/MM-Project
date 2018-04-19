<?php


namespace model\internal;


class UserPermissions
{
    private $userId;
    private $resource;
    private $role;
    private $ownPermissions;
    private $groupPermissions;
    private $otherPermissions;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param mixed $resource
     */
    public function setResource($resource): void
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getOwnPermissions()
    {
        return $this->ownPermissions;
    }

    /**
     * @param mixed $ownPermissions
     */
    public function setOwnPermissions($ownPermissions): void
    {
        $this->ownPermissions = $ownPermissions;
    }

    /**
     * @return mixed
     */
    public function getGroupPermissions()
    {
        return $this->groupPermissions;
    }

    /**
     * @param mixed $groupPermissions
     */
    public function setGroupPermissions($groupPermissions): void
    {
        $this->groupPermissions = $groupPermissions;
    }

    /**
     * @return mixed
     */
    public function getOtherPermissions()
    {
        return $this->otherPermissions;
    }

    /**
     * @param mixed $otherPermissions
     */
    public function setOtherPermissions($otherPermissions): void
    {
        $this->otherPermissions = $otherPermissions;
    }
}
