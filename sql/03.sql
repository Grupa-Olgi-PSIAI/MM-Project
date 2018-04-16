ALTER TABLE `users`
  MODIFY `zipcode` VARCHAR(6);
ALTER TABLE `users`
  MODIFY `address` VARCHAR(255);
ALTER TABLE `users`
  MODIFY `street_with_no` VARCHAR(255);
ALTER TABLE `users`
  MODIFY `country_code` VARCHAR(4);
ALTER TABLE `users`
  MODIFY `city` VARCHAR(45);
ALTER TABLE `users`
  MODIFY `password` VARCHAR(255) NOT NULL;
ALTER TABLE `users`
  MODIFY `status` VARCHAR(45);

DELETE FROM `versions`
WHERE `id` IN (3);
INSERT INTO `versions` (`id`, `file`) VALUES (3, '03.sql');
