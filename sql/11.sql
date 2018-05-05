ALTER TABLE `documents`
  ADD `file_id` BIGINT NULL;
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_files_id_fk`
FOREIGN KEY (`file_id`) REFERENCES `files` (`id`);

ALTER TABLE `licences`
  ADD `file_id` BIGINT NULL;
ALTER TABLE `licences`
  ADD CONSTRAINT `licences_files_id_fk`
FOREIGN KEY (`file_id`) REFERENCES `files` (`id`);

DELETE FROM `versions`
WHERE `id` = 11;
INSERT INTO `versions` (`id`, `file`) VALUES (11, '11.sql');
