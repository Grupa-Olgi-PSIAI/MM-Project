-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Czas generowania: 14 Kwi 2018, 13:23
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 5.5.9-1ubuntu4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lpiskadlo_grupa-olgi`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE `attendances` (
  `id`               int(11)    NOT NULL,
  `version`          int(11)    NOT NULL,
  `date_created`     timestamp  NOT NULL DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP,
  `last_updated`     timestamp  NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id`          int(11)    NOT NULL,
  `present`          tinyint(1) NOT NULL,
  `delay`            int(11)    NOT NULL,
  `explorer_user_id` int(11)    NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id`           int(11)                              NOT NULL,
  `version`      int(11)                              NOT NULL,
  `date_created` int(11)                              NOT NULL,
  `last_updated` int(11)                              NOT NULL,
  `title`        varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description`  varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id`      int(11)                              NOT NULL,
  `path`         varchar(255) COLLATE utf8_unicode_ci NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE `equipments` (
  `id`           int(11)                              NOT NULL,
  `version`      int(11)                              NOT NULL,
  `date_created` timestamp                            NOT NULL DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP,
  `last_updated` timestamp                            NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description`  varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand`        varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model`        varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial`       varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `licence_id`   int(11)                              NOT NULL,
  `user_id`      int(11)                              NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id`             int(11)                             NOT NULL,
  `version`        int(11)                             NOT NULL,
  `date_created`   timestamp                           NOT NULL DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP,
  `last_updated`   timestamp                           NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id`        int(11)                             NOT NULL,
  `number`         varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title`          varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_date`   timestamp                           NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status`         int(11)                             NOT NULL,
  `payment_date`   timestamp                           NOT NULL DEFAULT '0000-00-00 00:00:00',
  `amount`         decimal(10, 0)                      NOT NULL,
  `currency`       varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_type`   varchar(25) COLLATE utf8_unicode_ci NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licences`
--

DROP TABLE IF EXISTS `licences`;
CREATE TABLE `licences` (
  `id`           int(11)                              NOT NULL,
  `version`      int(11)                              NOT NULL,
  `date_created` timestamp                            NOT NULL DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP,
  `last_updated` timestamp                            NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title`        varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description`  varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date`   timestamp                            NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date`     timestamp                            NOT NULL DEFAULT '0000-00-00 00:00:00',
  `licence_key`  varchar(255) COLLATE utf8_unicode_ci          DEFAULT NULL,
  `user_id`      int(11)                              NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id`        int(11)                              NOT NULL,
  `version`   int(11)                              NOT NULL,
  `authority` varchar(255) COLLATE utf8_unicode_ci NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id`             int(11)                              NOT NULL,
  `version`        int(11)                              NOT NULL,
  `date_created`   timestamp                            NOT NULL DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP,
  `last_updated`   timestamp                            NOT NULL DEFAULT '0000-00-00 00:00:00',
  `first_name`     varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name`      varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number`   varchar(15) COLLATE utf8_unicode_ci  NOT NULL,
  `zipcode`        int(6)                               NOT NULL,
  `address`        int(255)                             NOT NULL,
  `street_with_no` int(255)                             NOT NULL,
  `country_code`   int(6)                               NOT NULL,
  `city`           int(50)                              NOT NULL,
  `password`       int(255)                             NOT NULL,
  `status`         int(11)                              NOT NULL,
  `email`          varchar(255) COLLATE utf8_unicode_ci NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_fkey` (`user_id`),
  ADD KEY `attendances_explorer_user_id_fkey` (`explorer_user_id`);

--
-- Indeksy dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_fkey` (`user_id`);

--
-- Indeksy dla tabeli `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipments_licence_id_fkey` (`licence_id`),
  ADD KEY `equipments_user_id_fkey` (`user_id`);

--
-- Indeksy dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_fkey` (`user_id`);

--
-- Indeksy dla tabeli `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licences_user_id_fkey` (`user_id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `user_role_role_id_fkey` (`role_id`),
  ADD KEY `user_role_user_id_fkey` (`user_id`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_explorer_user_id_fkey` FOREIGN KEY (`explorer_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `attendances_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_licence_id_fkey` FOREIGN KEY (`licence_id`) REFERENCES `licences` (`id`),
  ADD CONSTRAINT `equipments_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `licences`
--
ALTER TABLE `licences`
  ADD CONSTRAINT `licences_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_fkey` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_role_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
