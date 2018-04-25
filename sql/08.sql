DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`
(
  `id`   BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `type` VARCHAR(255)       NOT NULL,
  `size` INT,
  `mime` VARCHAR(128),
  `path` VARCHAR(255)       NOT NULL
);

DELETE FROM `versions`
WHERE `id` = 8;
INSERT INTO `versions` (`id`, `file`) VALUES (8, '08.sql');
