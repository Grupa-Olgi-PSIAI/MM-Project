DELETE FROM `resources`
WHERE `name` IN ('invoice');
INSERT INTO `resources` (`name`) VALUES ('invoice');
SET @`invoice_id` = LAST_INSERT_ID();

DELETE FROM `resources`
WHERE `name` IN ('invoice-file');
INSERT INTO `resources` (`name`) VALUES ('invoice-file');
SET @`invoice-file_id` = LAST_INSERT_ID();

UPDATE `resources`
SET `name` = 'document'
WHERE `name` = 'documents';
SELECT `id`
FROM `resources`
WHERE `name` = 'document'
INTO @`document_id`;

DELETE FROM `resources`
WHERE `name` IN ('document-file');
INSERT INTO `resources` (`name`) VALUES ('document-file');
SET @`document-file_id` = LAST_INSERT_ID();

SELECT `id`
FROM `resources`
WHERE `name` = 'contractor'
INTO @`contractor_id`;

DELETE FROM `resources`
WHERE `name` IN ('license');
INSERT INTO `resources` (`name`) VALUES ('license');
SET @`license_id` = LAST_INSERT_ID();

DELETE FROM `resources`
WHERE `name` IN ('license-file');
INSERT INTO `resources` (`name`) VALUES ('license-file');
SET @`license-file_id` = LAST_INSERT_ID();

DELETE FROM `resources`
WHERE `name` IN ('equipment');
INSERT INTO `resources` (`name`) VALUES ('equipment');
SET @`equipment_id` = LAST_INSERT_ID();

/* PERMISSIONS FOR ROLES */
/* WORKER */
SELECT `id`
FROM `roles`
WHERE `authority` = 'PRACOWNIK'
INTO @`worker_id`;

/* worker invoices */
DELETE FROM `permissions`
WHERE `resource_id` = @`invoice_id` AND `role_id` = @`worker_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`invoice_id`, @`worker_id`, 'create,read,update,delete', 'read,update,delete', 'read,update,delete');
DELETE FROM `permissions`
WHERE `resource_id` = @`invoice-file_id` AND `role_id` = @`worker_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`invoice-file_id`, @`worker_id`, 'create,read,update,delete', 'read,update,delete', 'read,update,delete');

/* worker documents */
UPDATE `permissions`
SET `own_perms` = 'create,read,update,delete', `group_perms` = 'read,update,delete',
  `other_perms` = 'read,update,delete'
WHERE `resource_id` = @`document_id` AND `role_id` = @`worker_id`;
DELETE FROM `permissions`
WHERE `resource_id` = @`document-file_id` AND `role_id` = @`worker_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`document-file_id`, @`worker_id`, 'create,read,update,delete', 'read,update,delete', 'read,update,delete');

/* worker contractor */
UPDATE `permissions`
SET `own_perms` = 'create,read,update,delete', `group_perms` = 'read,update,delete',
  `other_perms` = 'read,update,delete'
WHERE `resource_id` = @`contractor_id` AND `role_id` = @`worker_id`;

/* worker licenses */
DELETE FROM `permissions`
WHERE `resource_id` = @`license_id` AND `role_id` = @`worker_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`license_id`, @`worker_id`, 'create,read,update,delete', 'read,update,delete', 'read,update,delete');
DELETE FROM `permissions`
WHERE `resource_id` = @`license-file_id` AND `role_id` = @`worker_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`license-file_id`, @`worker_id`, 'create,read,update,delete', 'read,update,delete', 'read,update,delete');

/* worker equipment */
DELETE FROM `permissions`
WHERE `resource_id` = @`equipment_id` AND `role_id` = @`worker_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`equipment_id`, @`worker_id`, 'create,read,update,delete', 'read,update,delete', 'read,update,delete');

/* OWNER */
SELECT `id`
FROM `roles`
WHERE `authority` = 'WŁAŚCICIEL'
INTO @`owner_id`;

/* owner invoices */
DELETE FROM `permissions`
WHERE `resource_id` = @`invoice_id` AND `role_id` = @`owner_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`invoice_id`, @`owner_id`, 'create,read,update,delete', 'create,read,update,delete', 'create,read,update,delete');
DELETE FROM `permissions`
WHERE `resource_id` = @`invoice-file_id` AND `role_id` = @`owner_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`invoice-file_id`, @`owner_id`, 'create,read,update,delete', 'create,read,update,delete',
   'create,read,update,delete');

/* owner documents */
DELETE FROM `permissions`
WHERE `resource_id` = @`document-file_id` AND `role_id` = @`owner_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`document-file_id`, @`owner_id`, 'create,read,update,delete', 'create,read,update,delete',
   'create,read,update,delete');

/* owner licenses */
DELETE FROM `permissions`
WHERE `resource_id` = @`license_id` AND `role_id` = @`owner_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`license_id`, @`owner_id`, 'create,read,update,delete', 'create,read,update,delete', 'create,read,update,delete');
DELETE FROM `permissions`
WHERE `resource_id` = @`license-file_id` AND `role_id` = @`owner_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`license-file_id`, @`owner_id`, 'create,read,update,delete', 'create,read,update,delete',
   'create,read,update,delete');

/* owner equipment */
DELETE FROM `permissions`
WHERE `resource_id` = @`equipment_id` AND `role_id` = @`owner_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`equipment_id`, @`owner_id`, 'create,read,update,delete', 'create,read,update,delete', 'create,read,update,delete');

/* AUDITOR */
SELECT `id`
FROM `roles`
WHERE `authority` = 'AUDYTOR'
INTO @`auditor_id`;

/* auditor invoices */
DELETE FROM `permissions`
WHERE `resource_id` = @`invoice_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`invoice_id`, @`auditor_id`, 'read', 'read', 'read');
DELETE FROM `permissions`
WHERE `resource_id` = @`invoice-file_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`invoice-file_id`, @`auditor_id`, 'read', 'read', 'read');

/* auditor documents */
DELETE FROM `permissions`
WHERE `resource_id` = @`document_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`document_id`, @`auditor_id`, 'read', 'read', 'read');
DELETE FROM `permissions`
WHERE `resource_id` = @`document-file_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`document-file_id`, @`auditor_id`, 'read', 'read', 'read');

/* auditor contractor */
DELETE FROM `permissions`
WHERE `resource_id` = @`contractor_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`contractor_id`, @`auditor_id`, 'read', 'read', 'read');

/* auditor licenses */
DELETE FROM `permissions`
WHERE `resource_id` = @`license_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`license_id`, @`auditor_id`, 'read', 'read', 'read');
DELETE FROM `permissions`
WHERE `resource_id` = @`license-file_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`license-file_id`, @`auditor_id`, 'read', 'read', 'read');

DELETE FROM `permissions`
WHERE `resource_id` = @`equipment_id` AND `role_id` = @`auditor_id`;
INSERT INTO `permissions` (`resource_id`, `role_id`, `own_perms`, `group_perms`, `other_perms`) VALUES
  (@`equipment_id`, @`auditor_id`, 'read', 'read', 'read');

DELETE FROM `users`
WHERE `email` = 'auditor@mail.com';
INSERT INTO `users` (`version`, `date_created`, `last_updated`, `first_name`, `last_name`, `phone_number`,
                     `zipcode`, `address`, `street_with_no`, `country_code`, `city`, `password`, `status`, `email`)
VALUES (1, DEFAULT, DEFAULT, 'Audytor', 'Audytor', '123456789', '11-111', 'Żołnierska', '49', 'PL', 'Szczecin',
        '$2y$10$Gv5SrDIL57OXMYAikAAhhuFWdBAQ54KdWjgPLdMNpyjxomrCLBXDW', 'active', 'auditor@mail.com');
SET @`auditor_account_id` = LAST_INSERT_ID();

DELETE FROM `user_role`
WHERE `role_id` = @`auditor_id`;
INSERT INTO `user_role` (`role_id`, `user_id`) VALUES (@`auditor_id`, @`auditor_account_id`);

DELETE FROM `versions`
WHERE `id` = 12;
INSERT INTO `versions` (`id`, `file`) VALUES (12, '12.sql');
