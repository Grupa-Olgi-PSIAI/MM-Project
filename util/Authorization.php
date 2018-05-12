<?php


namespace util;


use model\internal\UserPermissions;
use repository\UserPermissionsRepository;

class Authorization
{
    private const KEY_CREATE = 'create';
    private const KEY_READ = 'read';
    private const KEY_UPDATE = 'update';
    private const KEY_DELETE = 'delete';

    private static $instance;
    private $session;
    private $ownPermissionMap;
    private $groupPermissionMap;
    private $otherPermissionMap;

    private function __construct()
    {
        $this->session = Session::getInstance();
        $this->ownPermissionMap = [
            self::KEY_CREATE => AuthFlags::OWN_CREATE,
            self::KEY_READ => AuthFlags::OWN_READ,
            self::KEY_UPDATE => AuthFlags::OWN_UPDATE,
            self::KEY_DELETE => AuthFlags::OWN_DELETE,
        ];
        $this->groupPermissionMap = [
            self::KEY_CREATE => AuthFlags::GROUP_CREATE,
            self::KEY_READ => AuthFlags::GROUP_READ,
            self::KEY_UPDATE => AuthFlags::GROUP_UPDATE,
            self::KEY_DELETE => AuthFlags::GROUP_DELETE,
        ];
        $this->otherPermissionMap = [
            self::KEY_CREATE => AuthFlags::OTHER_CREATE,
            self::KEY_READ => AuthFlags::OTHER_READ,
            self::KEY_UPDATE => AuthFlags::OTHER_UPDATE,
            self::KEY_DELETE => AuthFlags::OTHER_DELETE,
        ];
    }

    /**
     * Returns singleton instance of Authorization
     * creates one if non exists
     * @return Authorization
     */
    public static function getInstance(): Authorization
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Loads user permissions from database and saves them to session
     */
    public function loadPermissions(): void
    {
        $userId = $this->session->get(Session::USER_SESSION);
        $repository = new UserPermissionsRepository();
        $permissions = $repository->findForUser($userId);
        $permissionArray = $this->process($permissions);
        $this->session->add(Session::PERMISSIONS, $permissionArray);
    }

    /**
     * Check it currently logged user has permission(s) of given type
     * for resource
     * @param string $resource name
     * @param int $mask AuthFlags constants, can be combined
     * e.g. AuthFlags::OWN_CREATE | AuthFlags::OTHER_READ
     * @return bool true if has permission
     */
    public function hasPermission(string $resource, int $mask): bool
    {
        $permissions = $this->session->get(Session::PERMISSIONS);
        return ($permissions[$resource] & $mask) === $mask;
    }

    /**
     * @param UserPermissions[] $permissions
     * @return array
     */
    private function process($permissions): array
    {
        $permissionArray = array();
        foreach ($permissions as $permission) {
            $resourceName = $permission->getResourceName();
            if (isset($permissionArray[$resourceName])) {
                $permissionArray[$resourceName] |= $this->parse($permission);
            } else {
                $permissionArray[$resourceName] = $this->parse($permission);
            }
        }
        return $permissionArray;
    }

    private function parse(UserPermissions $permissions): int
    {
        $binaryPermissions = 0;
        foreach ($this->ownPermissionMap as $key => $value) {
            if (strpos($permissions->getOwnPermissions(), $key) !== false) {
                $binaryPermissions |= $value;
            }
        }
        foreach ($this->groupPermissionMap as $key => $value) {
            if (strpos($permissions->getGroupPermissions(), $key) !== false) {
                $binaryPermissions |= $value;
            }
        }
        foreach ($this->otherPermissionMap as $key => $value) {
            if (strpos($permissions->getOtherPermissions(), $key) !== false) {
                $binaryPermissions |= $value;
            }
        }
        return $binaryPermissions;
    }
}
