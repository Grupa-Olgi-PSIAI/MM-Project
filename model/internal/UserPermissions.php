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
     * @return string
     */
    public function getOwnPermissions(): string
    {
        return $this->own_perms;
    }

    /**
     * @return string
     */
    public function getGroupPermissions(): string
    {
        return $this->group_perms;
    }

    /**
     * @return string
     */
    public function getOtherPermissions(): string
    {
        return $this->other_perms;
    }
}
