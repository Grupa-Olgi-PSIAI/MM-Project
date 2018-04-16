DROP TABLE IF EXISTS `versions`;
CREATE TABLE `versions`
(
  `id`   INT PRIMARY KEY                    NOT NULL,
  `date` DATETIME DEFAULT current_timestamp NOT NULL,
  `file` VARCHAR(45)                        NOT NULL
);

DELETE FROM `versions`
WHERE `id` IN (1, 2);
INSERT INTO `versions` (`id`, `file`) VALUES (1, '01_20180414.sql');
INSERT INTO `versions` (`id`, `file`) VALUES (2, '02.sql');
