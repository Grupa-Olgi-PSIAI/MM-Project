<?php


namespace repository;


use core\Database;
use model\internal\UserPermissions;
use PDO;

class UserPermissionsRepository
{
    private $db;

    /**
     * UserPermissionsRepository constructor.
     */
    public function __construct()
    {
        $this->db = Database::getInstance()->getDb();
    }

    /**
     * Find list of permissions for user
     * @param int $userId id of user
     * @return UserPermissions[] array of user permissions
     */
    public function findForUser(int $userId): array
    {
        $sql = "SELECT
                  `res`.`name`,
                  `p`.`own_perms`,
                  `p`.`group_perms`,
                  `p`.`other_perms`
                FROM `permissions` `p`
                  INNER JOIN `roles` ON `p`.`role_id` = `roles`.`id`
                  INNER JOIN `user_role` `u` ON `roles`.`id` = `u`.`role_id`
                  INNER JOIN `resources` `res` ON `p`.`resource_id` = `res`.`id`
                WHERE `u`.`user_id` = ?";

        return $this->query($sql, [$userId]);
    }

    /**
     * @param string $sql query
     * @param array $params array of parameters to query
     * @return UserPermissions[] array of user permissions
     */
    private function query(string $sql, array $params): array
    {
        $statement = $this->db->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll(PDO::FETCH_CLASS, UserPermissions::class);
    }
}
