-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 05. čen 2020, 13:05
-- Verze serveru: 10.4.11-MariaDB
-- Verze PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `telefony`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `ab_users`
--

CREATE TABLE `ab_users` (
  `user_id` int(11) NOT NULL,
  `domain_id` int(9) UNSIGNED NOT NULL DEFAULT 0,
  `username` char(128) NOT NULL,
  `md5_pass` char(128) NOT NULL,
  `password_hint` varchar(255) NOT NULL DEFAULT '',
  `sso_facebook_uid` varchar(255) DEFAULT NULL,
  `sso_google_uid` varchar(255) DEFAULT NULL,
  `sso_live_uid` varchar(255) DEFAULT NULL,
  `sso_yahoo_uid` varchar(255) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address1` varchar(100) NOT NULL DEFAULT '',
  `address2` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(80) NOT NULL DEFAULT '',
  `state` varchar(20) NOT NULL DEFAULT '',
  `zip` varchar(20) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  `master_code` char(128) NOT NULL,
  `confirmation_code` char(128) DEFAULT NULL,
  `pass_reset_code` char(128) DEFAULT NULL,
  `status` char(128) NOT NULL DEFAULT 'NEW' COMMENT 'New, Ready, Blocked',
  `trials` int(11) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deprecated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `ab_users`
--

INSERT INTO `ab_users` (`user_id`, `domain_id`, `username`, `md5_pass`, `password_hint`, `sso_facebook_uid`, `sso_google_uid`, `sso_live_uid`, `sso_yahoo_uid`, `lastname`, `firstname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `master_code`, `confirmation_code`, `pass_reset_code`, `status`, `trials`, `created`, `modified`, `deprecated`) VALUES
(1, 0, 'teladmin', '3ca136b97a2ec09858e8b38c1d0bb6ad', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'NEW', 0, NULL, NULL, NULL);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `ab_users`
--
ALTER TABLE `ab_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `ab_users`
--
ALTER TABLE `ab_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
