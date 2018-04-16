DELETE FROM `users`
WHERE `id` = 1;
INSERT INTO `users` (`id`, `version`, `date_created`, `last_updated`, `first_name`, `last_name`, `phone_number`,
                     `zipcode`, `address`, `street_with_no`, `country_code`, `city`, `password`, `status`, `email`)
VALUES (1, 1, DEFAULT, DEFAULT, 'Jan', 'Kowalski', '123456789', '00-001', 'Żołnierska', '49', 'PL', 'Szczecin',
        '$2y$10$Gv5SrDIL57OXMYAikAAhhuFWdBAQ54KdWjgPLdMNpyjxomrCLBXDW', 'active', 'jan@mail.com');

DELETE FROM `versions`
WHERE `id` = 4;
INSERT INTO `versions` (`id`, `file`) VALUES (4, '04.sql');
