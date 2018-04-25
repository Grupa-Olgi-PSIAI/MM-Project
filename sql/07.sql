DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `id`   INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255)    NOT NULL
);

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`
(
  `id`          BIGINT PRIMARY KEY                         NOT NULL AUTO_INCREMENT,
  `resource_id` INT                                        NOT NULL,
  `role_id`     TINYINT(20)                                NOT NULL,
  `own_perms`   SET ('create', 'read', 'update', 'delete'),
  `group_perms` SET ('create', 'read', 'update', 'delete'),
  `other_perms` SET ('create', 'read', 'update', 'delete'),
  CONSTRAINT `permissions_resources_id_fk` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`),
  CONSTRAINT `permissions_roles_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
);

CREATE UNIQUE INDEX `roles_authority_uindex`
  ON `roles` (`authority`);

CREATE UNIQUE INDEX `users_email_uindex`
  ON `users` (`email`);

DELETE FROM `roles`
WHERE `authority` IN ('WŁAŚCICIEL', 'PRACOWNIK', 'AUDYTOR');
INSERT INTO `roles` (`version`, `authority`) VALUES
  (1, 'WŁAŚCICIEL'),
  (1, 'PRACOWNIK'),
  (1, 'AUDYTOR');

SELECT `id`
FROM `users`
WHERE `email` = 'jan@mail.com'
INTO @`user_id`;

SELECT `id`
FROM `roles`
WHERE `authority` = 'PRACOWNIK'
INTO @`role_id`;

DELETE FROM `user_role`
WHERE `role_id` = @`role_id`;
INSERT INTO `user_role` (`role_id`, `user_id`) VALUES (@`role_id`, @`user_id`);

DELETE FROM `resources`
WHERE `name` IN ('contractor');
INSERT INTO `resources` (`name`) VALUES ('contractor');
SET @`resource_id` = LAST_INSERT_ID();

DELETE FROM `permissions`
WHERE `resource_id` = @`resource_id` AND `role_id` = @`role_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`resource_id`, @`role_id`, 'create,read,update,delete', NULL, NULL);

DELETE FROM `users`
WHERE `email` = 'admin@mail.com';
INSERT INTO `users` (`version`, `date_created`, `last_updated`, `first_name`, `last_name`, `phone_number`,
                     `zipcode`, `address`, `street_with_no`, `country_code`, `city`, `password`, `status`, `email`)
VALUES (1, DEFAULT, DEFAULT, 'Admin', 'Admin', '123456789', '11-111', 'Żołnierska', '49', 'PL', 'Szczecin',
        '$2y$10$Gv5SrDIL57OXMYAikAAhhuFWdBAQ54KdWjgPLdMNpyjxomrCLBXDW', 'active', 'admin@mail.com');
SET @`admin_id` = LAST_INSERT_ID();

SELECT `id`
FROM `roles`
WHERE `authority` = 'WŁAŚCICIEL'
INTO @`admin_role_id`;

DELETE FROM `user_role`
WHERE `role_id` = @`admin_role_id`;
INSERT INTO `user_role` (`role_id`, `user_id`) VALUES (@`admin_role_id`, @`admin_id`);

DELETE FROM `permissions`
WHERE `resource_id` = @`resource_id` AND `role_id` = @`admin_role_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`resource_id`, @`admin_role_id`, 'create,read,update,delete', 'create,read,update,delete',
   'create,read,update,delete');

DELETE FROM `versions`
WHERE `id` = 7;
INSERT INTO `versions` (`id`, `file`) VALUES (7, '07.sql');
