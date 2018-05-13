ALTER TABLE `equipments`
  CHANGE `inventary_number` `inventory_number` VARCHAR(50) NOT NULL;

DELETE FROM `versions`
WHERE `id` = 14;
INSERT INTO `versions` (`id`, `file`) VALUES (14, '14.sql');
