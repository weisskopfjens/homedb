-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 07. Apr 2019 um 09:45
-- Server-Version: 5.7.24-0ubuntu0.18.04.1
-- PHP-Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `homedb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_table` int(11) NOT NULL,
  `ordernr` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lable` varchar(255) NOT NULL,
  `defaultvalue` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `readonly` tinyint(4) DEFAULT '0',
  `disabled` tinyint(4) DEFAULT '0',
  `multiple` tinyint(4) DEFAULT '0',
  `required` tinyint(4) DEFAULT '0',
  `size` int(11) DEFAULT NULL,
  `maxlength` int(11) DEFAULT NULL,
  `autocomplete` varchar(5) DEFAULT NULL,
  `min` varchar(255) DEFAULT NULL,
  `max` varchar(255) DEFAULT NULL,
  `validation` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `readgroup` varchar(255) DEFAULT 'admin',
  `editgroup` varchar(255) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fields`
--

INSERT INTO `fields` (`id`, `id_table`, `ordernr`, `name`, `lable`, `defaultvalue`, `type`, `readonly`, `disabled`, `multiple`, `required`, `size`, `maxlength`, `autocomplete`, `min`, `max`, `validation`, `pattern`, `placeholder`, `readgroup`, `editgroup`) VALUES
(1, 1, 1, 'name', 'Name', 'null', 'text', 0, 0, 0, 0, 0, 255, 'null', 'null', 'null', 'null', 'null', 'null', 'admin', 'admin'),
(2, 1, 2, 'title', 'Title', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(3, 1, 3, 'description', 'Description', NULL, 'textarea', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(4, 1, 4, 'readonly', 'Readonly', NULL, 'checkbox', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(5, 1, 5, 'disable', 'Disable', NULL, 'checkbox', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(6, 1, 6, 'readgroup', 'Readgroup', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(7, 1, 7, 'editgroup', 'Editgroup', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(8, 2, 1, 'id_table', 'ID_Table', NULL, 'number', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(9, 2, 2, 'ordernr', 'Ordernr', NULL, 'number', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(10, 2, 3, 'name', 'Name', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(11, 2, 4, 'lable', 'Lable', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(12, 2, 5, 'defaultvalue', 'Defaultvalue', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(13, 2, 6, 'type', 'Type', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(14, 2, 7, 'readonly', 'Readonly', NULL, 'checkbox', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(15, 2, 8, 'disabled', 'Disabled', NULL, 'checkbox', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(16, 2, 9, 'multiple', 'Multiple', NULL, 'checkbox', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(17, 2, 10, 'required', 'Required', NULL, 'checkbox', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(18, 2, 11, 'size', 'Size', NULL, 'number', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(19, 2, 12, 'maxlength', 'Maxlength', NULL, 'number', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(20, 2, 13, 'autocomplete', 'Autocomplete', NULL, 'text', 0, 0, 0, 0, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(21, 2, 14, 'min', 'Min', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(22, 2, 15, 'max', 'Max', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(23, 2, 16, 'validation', 'Validation', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(24, 2, 17, 'pattern', 'Pattern', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(25, 2, 18, 'placeholder', 'Placeholder', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(26, 2, 19, 'readgroup', 'Readgroup', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(27, 2, 20, 'editgroup', 'Editgroup', NULL, 'text', 0, 0, 0, 0, NULL, 255, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `readonly` tinyint(4) DEFAULT '0',
  `disable` tinyint(4) DEFAULT '0',
  `readgroup` varchar(255) DEFAULT 'admin',
  `editgroup` varchar(255) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tables`
--

INSERT INTO `tables` (`id`, `name`, `title`, `description`, `readonly`, `disable`, `readgroup`, `editgroup`) VALUES
(1, 'tables', 'tables', NULL, 0, 0, 'admin', 'admin'),
(2, 'fields', 'fields', NULL, 0, 0, 'admin', 'admin'),
(3, 'contacts', 'contacts', NULL, 0, 0, 'user', 'user');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$82WLnt9ygiDsDNQsjk9ZZOzw8IyzrmtgF9CRPDVtR7yQZua5w2BDi', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1551712530, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'jens@familieweisskopf.de', '$2y$12$vaukvOZjf9TommGu4Zbz.u0E1VgMM3ukl/US12TDamDIc7IBGUSkq', 'jens@familieweisskopf.de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1551594724, 1554617834, 1, 'Jens', 'Weißkopf', 'WH', '017990099272');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 1),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addresses`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zipcode` int(10) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'NULL',
  `phone` varchar(255) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indizes für die Tabelle `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
