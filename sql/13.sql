ALTER TABLE `licences`
  ADD `invoice_id` BIGINT NOT NULL;
ALTER TABLE `licences`
  ADD CONSTRAINT `licences_invoices_id_fk`
FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);
ALTER TABLE `licences`
  CHANGE `inventary_number` `inventory_number` VARCHAR(50) NOT NULL;
ALTER TABLE `licences`
  ALTER COLUMN `validation_date` DROP DEFAULT;
ALTER TABLE `licences`
  MODIFY `notes` VARCHAR(255);
ALTER TABLE `licences`
  DROP `price_net`;

DELETE FROM `versions`
WHERE `id` = 13;
INSERT INTO `versions` (`id`, `file`) VALUES (13, '13.sql');
