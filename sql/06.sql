ALTER TABLE `documents`
  CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT,
  CHANGE `date_created` `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CHANGE `last_updated` `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CHANGE `description` `description` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  DROP FOREIGN KEY `documents_contractor_id_fkey`,
  DROP INDEX `documents_contractor_id_fkey`;

ALTER TABLE `invoices`
  CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT,
  CHANGE `date_created` `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CHANGE `last_updated` `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  DROP FOREIGN KEY `invoices_contractor_id_fkey`,
  DROP INDEX `invoices_contractor_id_fkey`;

ALTER TABLE `contractors` CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT;
ALTER TABLE `documents` CHANGE `contractor_id` `contractor_id` BIGINT NULL;
ALTER TABLE `invoices` CHANGE `contractor_id` `contractor_id` BIGINT NULL;

ALTER TABLE `documents`
  ADD KEY `documents_contractor_id_fkey` (`contractor_id`),
  ADD CONSTRAINT `documents_contractor_id_fkey` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);

ALTER TABLE `invoices`
  ADD KEY `invoices_contractor_id_fkey` (`contractor_id`),
  ADD CONSTRAINT `invoices_contractor_id_fkey` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);


ALTER TABLE `attendances`
  CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT,
  CHANGE `date_created` `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CHANGE `last_updated` `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  DROP `delay`,
  DROP `present`,
  DROP FOREIGN KEY `attendances_explorer_user_id_fkey`,
  DROP INDEX `attendances_explorer_user_id_fkey`,
  DROP `explorer_user_id`,
  DROP FOREIGN KEY `attendances_user_id_fkey`,
  DROP INDEX `attendances_user_id_fkey`,
  CHANGE `user_id` `user_id` BIGINT NOT NULL,
  ADD `time_in` TIMESTAMP NOT NULL,
  ADD `time_out` TIMESTAMP NOT NULL,
  ADD `notes` TEXT NULL;


ALTER TABLE `equipments`
  CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT,
  CHANGE `date_created` `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CHANGE `last_updated` `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  DROP `description`,
  DROP `brand`,
  DROP `model`,
  DROP `serial`,
  DROP FOREIGN KEY `equipments_licence_id_fkey`,
  DROP INDEX `equipments_licence_id_fkey`,
  DROP `licence_id`,
  DROP FOREIGN KEY `equipments_user_id_fkey`,
  DROP INDEX `equipments_user_id_fkey`,
  CHANGE `user_id` `user_id` BIGINT NOT NULL,
  ADD `invoice_id` BIGINT NULL,
  ADD KEY `equipments_invoice_id_fkey` (`invoice_id`),
  ADD CONSTRAINT `equipments_invoice_id_fkey` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD `inventary_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  ADD `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  ADD `serial_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  ADD `validation_date` TIMESTAMP NOT NULL,
  ADD `purchase_date` TIMESTAMP NULL,
  ADD `price_net` float NOT NULL,
  ADD `notes` TEXT NULL;


ALTER TABLE `licences`
  CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT,
  CHANGE `date_created` `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CHANGE `last_updated` `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  DROP `title`,
  DROP `description`,
  DROP `organization`,
  DROP `start_date`,
  DROP `end_date`,
  DROP `licence_key`,
  DROP FOREIGN KEY `licences_user_id_fkey`,
  DROP INDEX `licences_user_id_fkey`,
  CHANGE `user_id` `user_id` BIGINT NOT NULL,
  ADD `inventary_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  ADD `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  ADD `serial_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  ADD `validation_date` TIMESTAMP NOT NULL,
  ADD `tech_support_end_date` TIMESTAMP NULL,
  ADD `purchase_date` TIMESTAMP NULL,
  ADD `price_net` float  NULL,
  ADD `notes` TEXT NULL;

ALTER TABLE `user_role`
  DROP FOREIGN KEY `user_role_role_id_fkey`,
  DROP INDEX `user_role_role_id_fkey`,
  DROP FOREIGN KEY `user_role_user_id_fkey`,
  DROP INDEX `user_role_user_id_fkey`,
  CHANGE `role_id` `role_id` TINYINT(20) NOT NULL,
  CHANGE `user_id` `user_id` BIGINT NOT NULL;


ALTER TABLE `users`
  CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT;
ALTER TABLE `roles`
  CHANGE `id` `id` TINYINT(20) NOT NULL AUTO_INCREMENT;


ALTER TABLE `attendances`
  ADD KEY `attendances_user_id_fkey` (`user_id`),
  ADD CONSTRAINT `attendances_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `equipments`
  ADD KEY `equipments_user_id_fkey` (`user_id`),
  ADD CONSTRAINT `equipments_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `licences`
  ADD KEY `licence_user_id_fkey` (`user_id`),
  ADD CONSTRAINT `licence_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `user_role`
  ADD KEY `user_role_role_id_fkey` (`role_id`),
  ADD KEY `user_role_user_id_fkey` (`user_id`),
  ADD CONSTRAINT `user_role_role_id_fkey` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_role_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

DELETE FROM `versions` WHERE `id` IN (6);
INSERT INTO `versions` (`id`, `file`) VALUES (6, '06.sql');
