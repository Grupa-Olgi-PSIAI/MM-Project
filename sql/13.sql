DELETE FROM `resources`
WHERE `name` = 'attendance';
INSERT INTO `resources` (`name`) VALUES ('attendance');
SET @`resource_id` = LAST_INSERT_ID();

SELECT `id`
FROM `roles`
WHERE `authority` = 'PRACOWNIK'
INTO @`role_id`;

DELETE FROM `permissions`
WHERE `resource_id` = @`resource_id` AND `role_id` = @`role_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`resource_id`, @`role_id`, 'create,read,update,delete', NULL, NULL);

SELECT `id`
FROM `roles`
WHERE `authority` = 'WŁAŚCICIEL'
INTO @`role_id`;

DELETE FROM `permissions`
WHERE `resource_id` = @`resource_id` AND `role_id` = @`role_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`resource_id`, @`role_id`, 'create,read,update,delete', 'create,read,update,delete', 'create,read,update,delete');

SELECT `id`
FROM `roles`
WHERE `authority` = 'AUDYTOR'
INTO @`role_id`;

DELETE FROM `permissions`
WHERE `resource_id` = @`resource_id` AND `role_id` = @`role_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`resource_id`, @`role_id`, 'read', 'read', 'read');

DELETE FROM `versions`
WHERE `id` = 13;
INSERT INTO `versions` (`id`, `file`) VALUES (13, '13.sql');
