<?php


namespace model\internal;


class UserPermissions
{
    private $name;
    private $own_perms;
    private $group_perms;
    private $other_perms;

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getOwnPermissions()
    {
        return $this->own_perms;
    }

    /**
     * @return string|null
     */
    public function getGroupPermissions()
    {
        return $this->group_perms;
    }

    /**
     * @return string|null
     */
    public function getOtherPermissions()
    {
        return $this->other_perms;
    }
}
