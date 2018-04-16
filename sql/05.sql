--
-- Struktura tabeli dla tabeli `contractors`
--

DROP TABLE IF EXISTS `contractors`;
CREATE TABLE `contractors`(
    `id`            int(11)                               NOT NULL,
    `version`       int(11)                               NOT NULL,
    `date_created`  timestamp                             NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_updated`  timestamp                             NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    `name`          varchar(255)  COLLATE utf8_unicode_ci NOT NULL,
    `vat_id`        varchar(20)   COLLATE utf8_unicode_ci NOT NULL
) 
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8 
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Indeksy dla tabeli `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);


--
-- Struktura tabeli dla tabeli `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id`                  int(11)                             NOT NULL,
  `version`             int(11)                             NOT NULL,
  `date_created`        timestamp                           NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated`        timestamp                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `number`              varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_date`        timestamp                           NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount_net`          float                               NOT NULL,
  `amount_gross`        float                               NOT NULL,
  `amount_tax`          float                               NOT NULL,
  `currency`            varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `amount_net_currency` float                               NOT NULL,
  `contractor_id`       int(11)                             NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;


--
-- Indeksy dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_contractor_id_fkey` (`contractor_id`),
  ADD CONSTRAINT `invoices_contractor_id_fkey` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);


--
-- Struktura tabeli dla tabeli `documents`
--
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id`                  int(11)                               NOT NULL,
  `version`             int(11)                               NOT NULL,
  `date_created`        timestamp                             NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated`        timestamp                             NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   `id_internal`        varchar(100) COLLATE utf8_unicode_ci  NOT NULL,
  `description`         varchar(255) COLLATE utf8_unicode_ci  NOT NULL,
  `contractor_id`       int(11)                               NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

--
-- Indeksy dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_contractor_id_fkey` (`contractor_id`),
  ADD CONSTRAINT `documents_contractor_id_fkey` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);
  

--
-- Zapis wersji
--
DELETE FROM `versions` WHERE `id` IN (5);
INSERT INTO `versions` (`id`, `file`) VALUES (5, '05.sql');

