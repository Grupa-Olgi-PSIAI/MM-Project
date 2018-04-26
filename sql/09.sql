ALTER TABLE `invoices`
  ADD `file_id` BIGINT;
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_files_id_fk`
FOREIGN KEY (`file_id`) REFERENCES `files` (`id`);


DELETE FROM `versions`
WHERE `id` = 9;
INSERT INTO `versions` (`id`, `file`) VALUES (9, '09.sql');
