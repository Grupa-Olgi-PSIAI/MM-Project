<?php


namespace model\internal;


class UserPermissions
{
    /**
     * @var string
     */
    private $name;

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
     * @return string
     */
    public function getResourceName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string format: 'create,read,update,delete'
     */
    public function getOwnPermissions(): ?string
    {
        return $this->own_perms;
    }

    /**
     * @return null|string format: 'create,read,update,delete'
     */
    public function getGroupPermissions(): ?string
    {
        return $this->group_perms;
    }

    /**
     * @return null|string format: 'create,read,update,delete'
     */
    public function getOtherPermissions(): ?string
    {
        return $this->other_perms;
    }
}
