-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 24 juil. 2019 à 08:44
-- Version du serveur :  5.7.21-log
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gustocoffee`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
CREATE TABLE IF NOT EXISTS `accueil` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accueil`
--

INSERT INTO `accueil` (`id`, `title`, `description`, `image`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n              ', 'photo_presentation.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` tinyint(3) UNSIGNED DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `identifiant`, `mot_de_passe`, `nom`, `prenom`, `email`, `role`, `date_creation`, `date_modification`) VALUES
(1, 'abonia', '$2y$10$UTbQylHWvMiCL5YplYZESOyI5RwtiVNy1T7.RPcH9zzXGxelTwEbq', 'Sojasingarayar', 'Abonia', 'abonia@aboinfo.com', 9, '2017-11-24 12:09:14', '2017-11-24 12:09:14');

-- --------------------------------------------------------

--
-- Structure de la table `admin_authentication`
--

DROP TABLE IF EXISTS `admin_authentication`;
CREATE TABLE IF NOT EXISTS `admin_authentication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_admin_id` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_authentication`
--

INSERT INTO `admin_authentication` (`id`, `admin_id`, `token`, `expired_at`, `created_at`, `updated_at`) VALUES
(18, 1, '$1$S3mIwTpd$Dv7sqpXpUgYs.PzemzDu40', '2019-06-27 00:49:56', '2019-06-26 12:49:56', '2019-06-26 12:49:56'),
(19, 1, '$1$wCXOadvn$5tSBaYV9RIJ.lcac9xozo.', '2019-06-27 02:36:25', '2019-06-26 14:36:25', '2019-06-26 14:36:25'),
(20, 1, '$1$KwdtJmtV$0iGBN4iEZ9Z.4jDlfr8Af.', '2019-06-27 21:52:54', '2019-06-27 09:52:54', '2019-06-27 09:52:54'),
(21, 1, '$1$VK4y84f6$z4w.EacpH31m24F/S/MpV1', '2019-06-28 01:55:15', '2019-06-27 13:55:15', '2019-06-27 13:55:15'),
(22, 1, '$1$pPuaMwUZ$DISCJ/MQkfWGd5nF7cFOM0', '2019-06-29 23:57:03', '2019-06-29 11:57:03', '2019-06-29 11:57:03'),
(23, 1, '$1$4iuU0Mg2$L3e1WFmFO.6W2k2pDUTT9/', '2019-07-20 03:33:43', '2019-07-19 15:33:43', '2019-07-19 15:33:43'),
(24, 1, '$1$RZ9jw3Xg$huGa7wIwpCy/BrqzxqJq/1', '2019-07-20 23:32:51', '2019-07-20 11:32:51', '2019-07-20 11:32:51'),
(25, 1, 'eWZKfcSUvh9k6g', '2019-07-20 23:40:42', '2019-07-20 11:40:42', '2019-07-20 11:40:42'),
(26, 1, 'bHf0XbT9En02Fg', '2019-07-20 23:43:28', '2019-07-20 11:43:28', '2019-07-20 11:43:28'),
(27, 1, 'lhNBP0KCUd99YQ', '2019-07-20 23:49:02', '2019-07-20 11:49:02', '2019-07-20 11:49:02'),
(28, 1, 'f3Jp1i36mlrEg', '2019-07-21 00:12:37', '2019-07-20 12:12:37', '2019-07-20 12:12:37'),
(29, 1, 'NTu1eOYomuOA', '2019-07-21 00:13:33', '2019-07-20 12:13:33', '2019-07-20 12:13:33'),
(30, 1, 'RoCk0PK39qcJOg', '2019-07-21 03:20:53', '2019-07-20 15:20:53', '2019-07-20 15:20:53'),
(31, 1, '61n20eN+w3GstA', '2019-07-21 03:52:54', '2019-07-20 15:52:54', '2019-07-20 15:52:54');

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `pays` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `adresse`, `complement`, `code_postal`, `ville`, `pays`) VALUES
(1, '11 rue de paris', '', '75687', 'Paris', 'France'),
(29, '12 rue de Carbo', '', '75666', 'Paris', 'France'),
(30, '11 rue de balzac', '', '93240', 'Bobigny', 'France'),
(31, '34 rue de paris', '', '98000', 'paris', 'France'),
(32, '23 rue de la paris', '', '95000', 'Paris', 'France'),
(33, '27 rue de paris', '', '75000', 'Paris', 'France'),
(34, '30 rue de paris', '', '76000', 'Paris', 'France'),
(35, '1 rue d&#039;inde', '', '23000', 'paris', 'France'),
(36, '1 rue de carbp', '', '35365', 'Paris', 'France'),
(37, '23 rue de carbo', '', '23456', 'bobigny', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `beverages`
--

DROP TABLE IF EXISTS `beverages`;
CREATE TABLE IF NOT EXISTS `beverages` (
  `b_id` int(255) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(255) NOT NULL DEFAULT '',
  `product` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `price` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `beverages`
--

INSERT INTO `beverages` (`b_id`, `menu_type`, `product`, `image`, `price`) VALUES
(2, '1', 'VANILLA CAPPUCCINO', 'b1.PNG', '4'),
(3, '1', 'CAPPUCCINO', 'b2.PNG', '5'),
(4, '1', 'CAFE MOCHA', 'b3.PNG', '3'),
(5, '1', 'MACCHIA TO', 'b4.PNG', '4'),
(6, '2', 'DEVIS OWN', 'b5.PNG', '6'),
(7, '2', 'ICED ESKIMO', 'b6.PNG', '7'),
(8, '2', 'KAPPI NIRVANA', 'b7.PNG', '2'),
(9, '2', 'VEGAN SHAKE', 'b8.PNG', '13'),
(10, '3', 'CRUNCHY VANILLA FRAPE', 'b9.PNG', '18'),
(11, '3', 'CRUNCHY FRAPPE', 'b10.PNG', '16'),
(12, '3', 'BLUSHBERRY FRAPPE', 'b11.PNG', '19'),
(13, '3', 'CHOCO FRAPPE', 'b12.PNG', '22'),
(14, '4', 'PROMEGRANATE LEMON', 'b13.PNG', '13'),
(16, '2', 'CHOCOLATE FANTASY CAKE( 30)', '', ''),
(17, '2', 'ICED ESKIMO', 'b6.PNG', '20'),
(18, '2', 'test', 'b1.PNG', '25'),
(19, '1', 'test', 'b1.PNG', '25');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `civilite` set('Mr','Mme','Mlle') NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `adresse` mediumint(9) NOT NULL,
  `adresse_autre` mediumint(9) DEFAULT NULL,
  `mot_de_passe` varchar(60) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `civilite`, `prenom`, `nom`, `email`, `telephone`, `mobile`, `adresse`, `adresse_autre`, `mot_de_passe`, `statut`, `date_creation`, `date_modification`) VALUES
(1, 'Mme', 'Abonia', 'Abonia', 'test@gmail.com', '0987654321', '', 29, NULL, '$2y$10$Q59zSIxHaqdBfQIAJFxlJufllmcSXiAj4vET5eWLM6m.P5/q/LMWe', 1, '2019-06-22 20:28:43', '2019-06-22 20:28:43'),
(2, 'Mr', 'test2', 'test2', 'test2@gmail.com', '', '', 30, NULL, '$2y$10$fwSy6Ms7JyMUYqPXsYgpUec8hwjFzs0Cx1qwcQo/qxOSCcw6R3g6u', 1, '2019-06-26 08:40:54', '2019-06-26 08:40:54'),
(3, 'Mr', 'test3', 'test3', 'test3@gmail.com', '', '', 31, NULL, '$2y$10$EPC92WXN.dwOrAy/HrM0cueoH0DrrH.oqkqKXg5vvL7inSB8pQ.Jy', 1, '2019-06-27 12:15:16', '2019-06-27 12:15:16'),
(4, 'Mr', 'test5', 'test5', 'test5@gmail.com', '', '', 32, NULL, '$2y$10$yZRyiL/S6jI7I1/IsgggXe.P5pYnIrHyyY3gdNojSBpqx6gTlIerq', 1, '2019-07-22 14:35:16', '2019-07-22 14:35:16'),
(5, 'Mr', 'david', 'david', 'david@gmail.com', '', '', 33, NULL, '$2y$10$D1MtrftnzRUF9Xv/.qj6t.0gXsT9H9rIzml5E/4Hl3Xuov8kQ7o/2', 1, '2019-07-22 14:38:51', '2019-07-22 14:38:51'),
(6, 'Mr', 'test6', 'test6', 'test6@gmail.com', '', '', 34, NULL, '$2y$10$TherPs8.mpc4Va9o3iF.SuQv5ZLtxWg98ZUmvPIEvtGv19vdyw/Pa', 1, '2019-07-22 14:50:09', '2019-07-22 14:50:09'),
(7, 'Mr', 'test7', 'test7', 'test7@gmail.com', '', '', 35, NULL, '$2y$10$nMPDKoIm.Mhgli1DHYtYruEB1xXKriA0nxPM6vam4GVYAntFbbYJy', 1, '2019-07-23 08:16:16', '2019-07-23 08:16:16'),
(8, 'Mr', 'test8', 'test8', 'test8@gmail.com', '', '', 36, NULL, '$2y$10$IQn8EoHKb8FoXNrl2Iz/yeq3NET3AGzQc.VXsKxNXcKaWREpJsXUO', 1, '2019-07-23 08:19:53', '2019-07-23 08:19:53'),
(9, 'Mr', 'ben', 'ben', 'ben@gmail.com', '', '', 37, NULL, '$2y$10$lHjTQbjVF4uaVuz3oKI6Zu769jDmMA8Wpy9iT9wWNE.opE8flCXs.', 1, '2019-07-23 08:21:32', '2019-07-23 08:21:32');

-- --------------------------------------------------------

--
-- Structure de la table `client_authentication`
--

DROP TABLE IF EXISTS `client_authentication`;
CREATE TABLE IF NOT EXISTS `client_authentication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_client_id` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client_authentication`
--

INSERT INTO `client_authentication` (`id`, `client_id`, `token`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, '$1$6fjNSBRR$7lx.mxo/q1LbNO7f5.7w8.', '2015-12-27 23:28:00', '2015-12-27 11:28:00', '2015-12-27 11:28:00'),
(3, 1, '$1$HbmItoTB$rv0s/j8jpszhhGXE0UMjW1', '2019-06-26 08:41:58', '2019-06-25 15:41:58', '2019-06-25 15:41:58'),
(4, 1, '$1$reuLAc4P$0t/hstD/4pyHJGATebudq0', '2019-06-26 08:43:57', '2019-06-25 15:43:57', '2019-06-25 15:43:57'),
(5, 1, '$1$FQZMBGu7$3h/09lAG0fx.Zuynu5s./1', '2019-06-26 08:44:18', '2019-06-25 15:44:18', '2019-06-25 15:44:18'),
(6, 1, '$1$042Wxds0$YCXjU2E5zC5xZDSxUmvah.', '2019-06-26 08:48:03', '2019-06-25 15:48:03', '2019-06-25 15:48:03'),
(7, 1, '$1$FTR3BR9R$zXlkwjcCp3mNEUcouoI7f/', '2019-06-26 08:48:25', '2019-06-25 15:48:25', '2019-06-25 15:48:25'),
(8, 1, '$1$1xvS3RjV$P4NMrxXNVcNBfFTkHpDf0/', '2019-06-26 08:49:22', '2019-06-25 15:49:22', '2019-06-25 15:49:22'),
(9, 1, '$1$XBDP5LNY$sqFmZt7cgjEKFQwt9scjp0', '2019-06-26 08:54:06', '2019-06-25 15:54:06', '2019-06-25 15:54:06'),
(10, 1, '$1$NEpHzwvI$.Cr1tszBa.nhOn/xaEWiG/', '2019-06-26 08:55:26', '2019-06-25 15:55:26', '2019-06-25 15:55:26'),
(11, 1, '$1$znGuYVeA$vFexj5OxCaUNonBU2/nQ0/', '2019-06-26 02:49:07', '2019-06-25 16:49:07', '2019-06-25 16:49:07'),
(18, 1, '$1$MKVv1Rsq$HQgCsNyxmeZ76oaqr7.tS/', '2019-06-27 22:24:40', '2019-06-27 10:24:10', '2019-06-27 10:24:40'),
(46, 1, '20pW0EVsSm1ZA', '2019-07-20 07:23:25', '2019-07-19 19:23:25', '2019-07-19 19:23:25'),
(45, 1, '3S2dGz9B+RVhHg', '2019-07-20 07:21:56', '2019-07-19 19:21:56', '2019-07-19 19:21:56'),
(44, 1, 'AgYfSIJKCpuBTg', '2019-07-20 07:21:00', '2019-07-19 19:21:00', '2019-07-19 19:21:00'),
(43, 1, 'UxJYATlcMRAbDA', '2019-07-20 07:20:02', '2019-07-19 19:20:02', '2019-07-19 19:20:02'),
(42, 1, 'kKIZVMQUJKPBhg', '2019-07-20 07:19:57', '2019-07-19 19:19:57', '2019-07-19 19:19:57'),
(41, 1, '9p5Js8YIW6i3w', '2019-07-20 07:18:27', '2019-07-19 19:18:27', '2019-07-19 19:18:27'),
(40, 1, 'lCyxaTbwZGdNjA', '2019-07-20 07:14:17', '2019-07-19 19:14:17', '2019-07-19 19:14:17'),
(39, 1, 'mfa0HnJRwHSXAg', '2019-07-20 04:39:04', '2019-07-19 16:39:04', '2019-07-19 16:39:04'),
(38, 1, 'kuY9YCDWRUtHzQ', '2019-07-20 04:38:17', '2019-07-19 16:38:17', '2019-07-19 16:38:17'),
(37, 1, 'Qb5scytuMIMyNg', '2019-07-20 04:35:37', '2019-07-19 16:35:37', '2019-07-19 16:35:37'),
(36, 1, '1yEp4MSi4w7S6w', '2019-07-20 04:34:29', '2019-07-19 16:34:29', '2019-07-19 16:34:29'),
(35, 1, '$1$ewe78oM2$O21QyL08Q0vXcXkkXlLrc1', '2019-07-20 04:17:18', '2019-07-19 16:17:18', '2019-07-19 16:17:18'),
(32, 1, '$1$UIuLW1T2$b3elwatJUmmnb9s6V8gjG1', '2019-07-20 01:51:21', '2019-07-19 13:51:21', '2019-07-19 13:51:21'),
(33, 1, '$1$j6IEbFeh$yZXajhg7eXsm4OiLTJ1J.1', '2019-07-20 12:44:36', '2019-07-19 13:59:21', '2019-07-20 00:44:36'),
(34, 1, '$1$tTWG2c2D$5j3OWbRLWYAiol9.ggWVm1', '2019-07-20 02:00:53', '2019-07-19 14:00:53', '2019-07-19 14:00:53'),
(47, 1, 'QzUJXf8kRxW6EQ', '2019-07-20 07:24:28', '2019-07-19 19:24:28', '2019-07-19 19:24:28'),
(48, 1, 'y+v8fsxl9OX3Tw', '2019-07-20 07:30:15', '2019-07-19 19:30:15', '2019-07-19 19:30:15'),
(49, 1, 'HJtWyTaI9i1KKQ', '2019-07-20 07:32:20', '2019-07-19 19:32:20', '2019-07-19 19:32:20'),
(50, 1, 'xjn8X2klPfQlEg', '2019-07-20 07:41:45', '2019-07-19 19:41:45', '2019-07-19 19:41:45'),
(51, 1, 'TNiTLXQWnU1Hwg', '2019-07-20 10:18:35', '2019-07-19 22:18:35', '2019-07-19 22:18:35'),
(52, 1, 'lgwzHhmhC4IU+A', '2019-07-20 10:30:51', '2019-07-19 22:30:51', '2019-07-19 22:30:51'),
(53, 1, '9UjZv+FxufaBeA', '2019-07-20 10:34:10', '2019-07-19 22:34:10', '2019-07-19 22:34:10'),
(54, 1, '4RDZwKRq48iWUQ', '2019-07-20 10:44:48', '2019-07-19 22:44:48', '2019-07-19 22:44:48'),
(55, 1, 'FMjZg4uAZsR9eg', '2019-07-20 10:46:01', '2019-07-19 22:46:01', '2019-07-19 22:46:01'),
(56, 1, 'j3PK7JxqWUw5nw', '2019-07-20 10:46:43', '2019-07-19 22:46:43', '2019-07-19 22:46:43'),
(57, 1, 'YD6bwohdBO9Ibw', '2019-07-20 10:47:19', '2019-07-19 22:47:19', '2019-07-19 22:47:19'),
(58, 1, 'XNZXh6SYFRO2mw', '2019-07-21 04:00:49', '2019-07-19 22:47:39', '2019-07-20 16:00:49'),
(59, 1, 'j3nzipFW4Xe4oA', '2019-07-20 10:48:19', '2019-07-19 22:48:19', '2019-07-19 22:48:19'),
(60, 1, 'qho3THMjcyUYA', '2019-07-20 10:55:38', '2019-07-19 22:48:23', '2019-07-19 22:55:38'),
(61, 1, 'j995xb2mlxVVg', '2019-07-20 10:59:00', '2019-07-19 22:57:27', '2019-07-19 22:59:00'),
(62, 1, 'b+cgAvMtnseNgw', '2019-07-21 05:12:15', '2019-07-20 16:10:20', '2019-07-20 17:12:15'),
(63, 1, 'FSsCYT40STaWgg', '2019-07-23 00:00:12', '2019-07-22 11:59:11', '2019-07-22 12:00:12'),
(64, 1, 'wWZWqO+pF9AZyA', '2019-07-23 00:00:34', '2019-07-22 12:00:34', '2019-07-22 12:00:34');

-- --------------------------------------------------------

--
-- Structure de la table `combo`
--

DROP TABLE IF EXISTS `combo`;
CREATE TABLE IF NOT EXISTS `combo` (
  `c_id` int(255) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(255) NOT NULL DEFAULT '',
  `product` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `price` int(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `combo`
--

INSERT INTO `combo` (`c_id`, `menu_type`, `product`, `image`, `price`) VALUES
(2, '1', 'COMBO-CHOCO DONUT', 'c51.PNG', 35),
(3, '1', 'COMBO-EGG WRAP', 'c52.PNG', 40),
(4, '1', 'COMBOCHILLI CHESE TOASTIZZA', 'c53.PNG', 25),
(5, '1', 'CUP SLICE COMBO', 'c54.PNG', 38),
(6, '1', 'CLASSIC VEG', 'c55.PNG', 29),
(7, '1', 'CHILLER VEG', 'c56.PNG', 32),
(8, '1', 'combowrap', '50.PNG', 400);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `mail` varchar(255) NOT NULL DEFAULT '',
  `phn` varchar(255) NOT NULL DEFAULT '',
  `msg` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `mail`, `phn`, `msg`) VALUES
(1, 'abo', '01723214', '14343', '0'),
(2, 'david', '01723214', '14343', '0'),
(3, 'benjamin', '01723214', '14343', '0'),
(4, 'root', '01723214', '14343', '0');

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(255) NOT NULL DEFAULT '',
  `product` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`f_id`, `menu_type`, `product`, `image`, `price`) VALUES
(32, '1', 'EGG WRAP', 'c14.PNG', 100),
(33, '1', 'FRENCH CROISSANT', 'c15.PNG', 45),
(34, '1', 'CREAMY CHOCO DONUT', 'c15.PNG', 65),
(35, '1', 'CHILLI CHEESE TOASTIZZA', 'c18.PNG', 150),
(36, '1', 'VEG SAMOSA', 'c19.PNG', 30),
(37, '1', 'HOT \"N\" SPICY VEG PUFF', 'c20.PNG', 35),
(38, '2', 'CHESSY VEG CROISSANT', 'c26.PNG', 100),
(40, '2', 'SMOKED CHICKEN SANDWIH', 'c28.PNG', 70),
(41, '2', 'CHICKEN 65 SANDWICH', 'c24.PNG', 65),
(42, '2', 'TANDOORI CHICKEN SANDWICH', 'c29.PNG', 80),
(44, '2', 'TEX-MEX- VEG CHESSE SANDWICH', 'c31.PNG', 65),
(45, '3', 'CHOC-HOLA', 'c38.PNG', 150),
(46, '3', 'DARK PASSION', 'c39.PNG', 130),
(48, '3', 'VANILLA ICE CREAM', 'c41.PNG', 120),
(49, '3', 'CHOCOLATE ICE CREAM', 'c44.PNG', 135),
(50, '3', 'SIZZLE DAZZLE BROWNIE', 'c40.PNG', 200),
(51, '4', 'CHOCOLATE FANTASY CAKE', 'c45.PNG', 300),
(52, '4', 'HEZELNUT KARAT CELEBRATION CAKE', 'c46.PNG', 450),
(53, '4', 'CHOCO INDULGENCE CELBRATION CAKE', 'c47.PNG', 500),
(54, '5', 'MANGO SHOT', 'C48.PNG', 250),
(55, '5', 'BELGIAN CHOCO SHOT', 'C49.PNG', 250),
(56, '1', 'chicken', '', 0),
(57, '1', 'CHOCOLATE FANTASY CAKE( 300)', '', 500),
(60, '1', 'veg samosa', 'c19.PNG', 30);

-- --------------------------------------------------------

--
-- Structure de la table `mention`
--

DROP TABLE IF EXISTS `mention`;
CREATE TABLE IF NOT EXISTS `mention` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `sociéte` varchar(60) NOT NULL,
  `responsable` varchar(60) NOT NULL,
  `rcs` varchar(60) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `pays` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mention`
--

INSERT INTO `mention` (`id`, `sociéte`, `responsable`, `rcs`, `telephone`, `adresse`, `code_postal`, `ville`, `pays`) VALUES
(1, 'GustoCoffee', 'M. Jackson', '790 971 000', '0987654321', '1 Rue de Paris', 75224, 'Paris', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client` smallint(5) UNSIGNED NOT NULL,
  `total` decimal(6,2) NOT NULL DEFAULT '0.00',
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `client`, `total`, `date_create`, `date_update`) VALUES
(1, 1, '24.00', '2019-07-02 00:00:00', '2019-07-10 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `panier_produit`
--

DROP TABLE IF EXISTS `panier_produit`;
CREATE TABLE IF NOT EXISTS `panier_produit` (
  `panier` smallint(5) UNSIGNED NOT NULL,
  `produit` tinyint(3) UNSIGNED NOT NULL,
  `quantite` tinyint(3) UNSIGNED NOT NULL,
  `prix` decimal(4,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier_produit`
--

INSERT INTO `panier_produit` (`panier`, `produit`, `quantite`, `prix`) VALUES
(1, 2, 2, '24.00');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` int(3) NOT NULL,
  `alpha2` varchar(2) NOT NULL,
  `alpha3` varchar(3) NOT NULL,
  `nom_en_gb` varchar(45) NOT NULL,
  `nom_fr_fr` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alpha2` (`alpha2`),
  UNIQUE KEY `alpha3` (`alpha3`),
  UNIQUE KEY `code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `alpha2`, `alpha3`, `nom_en_gb`, `nom_fr_fr`) VALUES
(1, 4, 'AF', 'AFG', 'Afghanistan', 'Afghanistan'),
(2, 8, 'AL', 'ALB', 'Albania', 'Albanie'),
(3, 10, 'AQ', 'ATA', 'Antarctica', 'Antarctique'),
(4, 12, 'DZ', 'DZA', 'Algeria', 'Algérie'),
(5, 16, 'AS', 'ASM', 'American Samoa', 'Samoa Américaines'),
(6, 20, 'AD', 'AND', 'Andorra', 'Andorre'),
(7, 24, 'AO', 'AGO', 'Angola', 'Angola'),
(8, 28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan'),
(10, 32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(11, 36, 'AU', 'AUS', 'Australia', 'Australie'),
(12, 40, 'AT', 'AUT', 'Austria', 'Autriche'),
(13, 44, 'BS', 'BHS', 'Bahamas', 'Bahamas'),
(14, 48, 'BH', 'BHR', 'Bahrain', 'Bahreïn'),
(15, 50, 'BD', 'BGD', 'Bangladesh', 'Bangladesh'),
(16, 51, 'AM', 'ARM', 'Armenia', 'Arménie'),
(17, 52, 'BB', 'BRB', 'Barbados', 'Barbade'),
(18, 56, 'BE', 'BEL', 'Belgium', 'Belgique'),
(19, 60, 'BM', 'BMU', 'Bermuda', 'Bermudes'),
(20, 64, 'BT', 'BTN', 'Bhutan', 'Bhoutan'),
(21, 68, 'BO', 'BOL', 'Bolivia', 'Bolivie'),
(22, 70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 72, 'BW', 'BWA', 'Botswana', 'Botswana'),
(24, 74, 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet'),
(25, 76, 'BR', 'BRA', 'Brazil', 'Brésil'),
(26, 84, 'BZ', 'BLZ', 'Belize', 'Belize'),
(27, 86, 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l\'Océan Indien'),
(28, 90, 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon'),
(29, 92, 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 96, 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 100, 'BG', 'BGR', 'Bulgaria', 'Bulgarie'),
(32, 104, 'MM', 'MMR', 'Myanmar', 'Myanmar'),
(33, 108, 'BI', 'BDI', 'Burundi', 'Burundi'),
(34, 112, 'BY', 'BLR', 'Belarus', 'Bélarus'),
(35, 116, 'KH', 'KHM', 'Cambodia', 'Cambodge'),
(36, 120, 'CM', 'CMR', 'Cameroon', 'Cameroun'),
(37, 124, 'CA', 'CAN', 'Canada', 'Canada'),
(38, 132, 'CV', 'CPV', 'Cape Verde', 'Cap-vert'),
(39, 136, 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes'),
(40, 140, 'CF', 'CAF', 'Central African', 'République Centrafricaine'),
(41, 144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka'),
(42, 148, 'TD', 'TCD', 'Chad', 'Tchad'),
(43, 152, 'CL', 'CHL', 'Chile', 'Chili'),
(44, 156, 'CN', 'CHN', 'China', 'Chine'),
(45, 158, 'TW', 'TWN', 'Taiwan', 'Taïwan'),
(46, 162, 'CX', 'CXR', 'Christmas Island', 'Île Christmas'),
(47, 166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 170, 'CO', 'COL', 'Colombia', 'Colombie'),
(49, 174, 'KM', 'COM', 'Comoros', 'Comores'),
(50, 175, 'YT', 'MYT', 'Mayotte', 'Mayotte'),
(51, 178, 'CG', 'COG', 'Republic of the Congo', 'République du Congo'),
(52, 180, 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 184, 'CK', 'COK', 'Cook Islands', 'Îles Cook'),
(54, 188, 'CR', 'CRI', 'Costa Rica', 'Costa Rica'),
(55, 191, 'HR', 'HRV', 'Croatia', 'Croatie'),
(56, 192, 'CU', 'CUB', 'Cuba', 'Cuba'),
(57, 196, 'CY', 'CYP', 'Cyprus', 'Chypre'),
(58, 203, 'CZ', 'CZE', 'Czech Republic', 'République Tchèque'),
(59, 204, 'BJ', 'BEN', 'Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', 'Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', 'Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', 'Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', 'El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', 'Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', 'Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', 'Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', 'Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', 'Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', 'Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', 'France', 'France'),
(76, 254, 'GF', 'GUF', 'French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', 'French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', 'Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', 'Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', 'Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', 'Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', 'Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', 'Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', 'Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', 'Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', 'Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', 'Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', 'Guam', 'Guam'),
(93, 320, 'GT', 'GTM', 'Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', 'Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', 'Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', 'Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', 'Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', 'Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', 'Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', 'Iceland', 'Islande'),
(103, 356, 'IN', 'IND', 'India', 'Inde'),
(104, 360, 'ID', 'IDN', 'Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d\'Iran'),
(106, 368, 'IQ', 'IRQ', 'Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', 'Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', 'Israel', 'Israël'),
(109, 380, 'IT', 'ITA', 'Italy', 'Italie'),
(110, 384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Côte d\'Ivoire'),
(111, 388, 'JM', 'JAM', 'Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', 'Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', 'Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', 'Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', 'Democratic People\'s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', 'Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', 'Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', 'Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', 'Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', 'Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', 'Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', 'Macao', 'Macao'),
(130, 450, 'MG', 'MDG', 'Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', 'Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', 'Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', 'Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', 'Mali', 'Mali'),
(135, 470, 'MT', 'MLT', 'Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', 'Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', 'Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', 'Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', 'Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', 'Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', 'Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', 'Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', 'Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', 'Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', 'Oman', 'Oman'),
(147, 516, 'NA', 'NAM', 'Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', 'Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', 'Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', 'Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', 'Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', 'Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', 'Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', 'Niger', 'Niger'),
(158, 566, 'NG', 'NGA', 'Nigeria', 'Nigéria'),
(159, 570, 'NU', 'NIU', 'Niue', 'Niué'),
(160, 574, 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk'),
(161, 578, 'NO', 'NOR', 'Norway', 'Norvège'),
(162, 580, 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 583, 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 584, 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall'),
(166, 585, 'PW', 'PLW', 'Palau', 'Palaos'),
(167, 586, 'PK', 'PAK', 'Pakistan', 'Pakistan'),
(168, 591, 'PA', 'PAN', 'Panama', 'Panama'),
(169, 598, 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 600, 'PY', 'PRY', 'Paraguay', 'Paraguay'),
(171, 604, 'PE', 'PER', 'Peru', 'Pérou'),
(172, 608, 'PH', 'PHL', 'Philippines', 'Philippines'),
(173, 612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn'),
(174, 616, 'PL', 'POL', 'Poland', 'Pologne'),
(175, 620, 'PT', 'PRT', 'Portugal', 'Portugal'),
(176, 624, 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 626, 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste'),
(178, 630, 'PR', 'PRI', 'Puerto Rico', 'Porto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar', 'Qatar'),
(180, 638, 'RE', 'REU', 'Réunion', 'Réunion'),
(181, 642, 'RO', 'ROU', 'Romania', 'Roumanie'),
(182, 643, 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie'),
(183, 646, 'RW', 'RWA', 'Rwanda', 'Rwanda'),
(184, 654, 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène'),
(185, 659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 660, 'AI', 'AIA', 'Anguilla', 'Anguilla'),
(187, 662, 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie'),
(188, 666, 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 674, 'SM', 'SMR', 'San Marino', 'Saint-Marin'),
(191, 678, 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 682, 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite'),
(193, 686, 'SN', 'SEN', 'Senegal', 'Sénégal'),
(194, 690, 'SC', 'SYC', 'Seychelles', 'Seychelles'),
(195, 694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone'),
(196, 702, 'SG', 'SGP', 'Singapore', 'Singapour'),
(197, 703, 'SK', 'SVK', 'Slovakia', 'Slovaquie'),
(198, 704, 'VN', 'VNM', 'Vietnam', 'Viet Nam'),
(199, 705, 'SI', 'SVN', 'Slovenia', 'Slovénie'),
(200, 706, 'SO', 'SOM', 'Somalia', 'Somalie'),
(201, 710, 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud'),
(202, 716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe'),
(203, 724, 'ES', 'ESP', 'Spain', 'Espagne'),
(204, 732, 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental'),
(205, 736, 'SD', 'SDN', 'Sudan', 'Soudan'),
(206, 740, 'SR', 'SUR', 'Suriname', 'Suriname'),
(207, 744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 748, 'SZ', 'SWZ', 'Swaziland', 'Swaziland'),
(209, 752, 'SE', 'SWE', 'Sweden', 'Suède'),
(210, 756, 'CH', 'CHE', 'Switzerland', 'Suisse'),
(211, 760, 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 762, 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan'),
(213, 764, 'TH', 'THA', 'Thailand', 'Thaïlande'),
(214, 768, 'TG', 'TGO', 'Togo', 'Togo'),
(215, 772, 'TK', 'TKL', 'Tokelau', 'Tokelau'),
(216, 776, 'TO', 'TON', 'Tonga', 'Tonga'),
(217, 780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 784, 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 788, 'TN', 'TUN', 'Tunisia', 'Tunisie'),
(220, 792, 'TR', 'TUR', 'Turkey', 'Turquie'),
(221, 795, 'TM', 'TKM', 'Turkmenistan', 'Turkménistan'),
(222, 796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 798, 'TV', 'TUV', 'Tuvalu', 'Tuvalu'),
(224, 800, 'UG', 'UGA', 'Uganda', 'Ouganda'),
(225, 804, 'UA', 'UKR', 'Ukraine', 'Ukraine'),
(226, 807, 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L\'ex-République Yougoslave de Macédoine'),
(227, 818, 'EG', 'EGY', 'Egypt', 'Égypte'),
(228, 826, 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni'),
(229, 833, 'IM', 'IMN', 'Isle of Man', 'Île de Man'),
(230, 834, 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 840, 'US', 'USA', 'United States', 'États-Unis'),
(232, 850, 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 854, 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso'),
(234, 858, 'UY', 'URY', 'Uruguay', 'Uruguay'),
(235, 860, 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan'),
(236, 862, 'VE', 'VEN', 'Venezuela', 'Venezuela'),
(237, 876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 882, 'WS', 'WSM', 'Samoa', 'Samoa'),
(239, 887, 'YE', 'YEM', 'Yemen', 'Yémen'),
(240, 891, 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 894, 'ZM', 'ZMB', 'Zambia', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description_courte` varchar(255) DEFAULT NULL,
  `description_longue` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description_courte`, `description_longue`, `image`) VALUES
(1, 'Nourritures', 'Check out', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'service_1.png'),
(2, 'Boissons', 'Check out', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'service_2.png'),
(3, 'Menus', 'Check out', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'service_3.png'),
(4, 'Bureautique', 'Check out', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'service_4.png');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `duree` int(255) NOT NULL DEFAULT '1',
  `quantity` int(10) DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT '1',
  `tbnumber` int(255) DEFAULT NULL,
  `c_id` int(10) NOT NULL,
  `c_status` int(255) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `colab` tinyint(1) NOT NULL DEFAULT '0',
  `duration` varchar(255) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `fk_c_id` (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `date`, `time`, `duree`, `quantity`, `status`, `tbnumber`, `c_id`, `c_status`, `payment`, `colab`, `duration`) VALUES
(27, '23-07-2019', '07:00', 2, 2, 0, 9, 1, 0, 10, 0, ''),
(26, '23-07-2019', '11:00', 2, 2, 0, 1, 1, 0, 10, 0, ''),
(25, '23-07-2019', '08:00', 2, 2, 0, 2, 1, 0, 10, 1, ''),
(24, '23-07-2019', '08:00', 2, 2, 0, 2, 1, 0, 10, 1, ''),
(23, '23-07-2019', '07:00', 2, 2, 0, 1, 1, 0, 10, 1, ''),
(22, '23-07-2019', '07:00', 2, 2, 0, 1, 1, 0, 10, 1, ''),
(8, '2019-07-18', '20:00', 1, 1, 0, 2, 1, 0, 12, 0, ''),
(9, '2019-12-12', '12:00', 1, 1, 0, 1, 1, 0, 20, 0, ''),
(10, '2019-12-11', '11:00', 2, 1, 0, 1, 1, 0, 20, 0, ''),
(14, '22-07-2019', '10:00', 2, 2, 0, 1, 1, 0, 10, 0, ''),
(15, '24-07-2019', '08:00', 5, 3, 0, 1, 1, 0, 38, 1, ''),
(16, '2019-07-26', '11:00', 1, 2, 0, 1, 1, 0, 3, 0, ''),
(17, '24-07-2019', '08:00', 5, 3, 0, 1, 1, 0, 38, 1, ''),
(18, '24-07-2019', '07:00', 2, 2, 0, 1, 1, 0, 10, 1, ''),
(19, '25-07-2019', '09:00', 4, 2, 0, 1, 1, 0, 20, 1, ''),
(20, '25-07-2019', '09:00', 4, 2, 0, 1, 1, 0, 20, 1, ''),
(21, '23-07-2019', '09:00', 2, 2, 0, 1, 1, 0, 10, 1, ''),
(28, '23-07-2019', '07:00', 2, 2, 0, 9, 1, 0, 10, 0, ''),
(29, '23-07-2019', '07:00', 2, 2, 0, 4, 1, 0, 10, 1, ''),
(30, '24-07-2019', '08:00', 2, 2, 0, 1, 1, 0, 10, 1, ''),
(31, '24-07-2019', '10:00', 3, 2, 0, 1, 1, 0, 15, 1, '10:00-11:00-12:00-'),
(32, '25-07-2019', '10:00', 2, 2, 0, 1, 1, 0, 10, 1, '10:00-11:00-'),
(33, '26-07-2019', '07:00', 12, 5, 0, 13, 1, 0, 138, 1, '07:00-08:00-09:00-10:00-11:00-12:00-13:00-14:00-15:00-16:00-17:00-18:00-');

-- --------------------------------------------------------

--
-- Structure de la table `seat`
--

DROP TABLE IF EXISTS `seat`;
CREATE TABLE IF NOT EXISTS `seat` (
  `seat_id` int(11) NOT NULL AUTO_INCREMENT,
  `seat_availability` tinyint(1) NOT NULL DEFAULT '0',
  `seat_image` varchar(255) NOT NULL,
  PRIMARY KEY (`seat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_availability`, `seat_image`) VALUES
(1, 1, 'img/table/1.png'),
(2, 1, 'img/table/2.png'),
(3, 1, 'img/table/3.png'),
(4, 0, 'img/table/4.png'),
(5, 0, 'img/table/5.png'),
(6, 0, 'img/table/6.png'),
(7, 0, 'img/table/7.png'),
(8, 0, 'img/table/8.png'),
(9, 0, 'img/table/9.png'),
(10, 0, 'img/table/10.png'),
(11, 0, 'img/table/11.png'),
(12, 0, 'img/table/12.png'),
(13, 0, 'img/table/13.png'),
(14, 0, 'img/table/14.png'),
(15, 0, 'img/table/15.png'),
(16, 0, 'img/table/16.png'),
(17, 0, 'img/table/17.png'),
(18, 0, 'img/table/18.png'),
(19, 0, 'img/table/19.png'),
(20, 0, 'img/table/20.png'),
(21, 0, 'img/table/21.png'),
(22, 0, 'img/table/22.png');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(255) NOT NULL AUTO_INCREMENT,
  `service_type_id` int(255) NOT NULL,
  `service_nom` varchar(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_prix` int(255) NOT NULL,
  PRIMARY KEY (`service_id`),
  KEY `service_type_id` (`service_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`service_id`, `service_type_id`, `service_nom`, `service_image`, `service_prix`) VALUES
(2, 2, 'CAPPUCCINO VANILLE', 'b1.PNG', 4),
(3, 2, 'CAPPUCCINO', 'b2.PNG', 5),
(4, 2, 'CAFE MOCHA', 'b3.PNG', 3),
(5, 2, 'MACCHIA TO', 'b4.PNG', 4),
(6, 2, 'DEVIS OWN', 'b5.PNG', 6),
(7, 2, 'ESKIMO GLACE', 'b6.PNG', 7),
(8, 2, 'KAPPI NIRVANA', 'b7.PNG', 2),
(9, 2, 'SHAKE VEGETARIEN', 'b8.PNG', 7),
(10, 2, 'FRAPPE CRUNCHY VANILLE', 'b9.PNG', 5),
(11, 2, 'FRAPPE CRUNCHY', 'b10.PNG', 5),
(12, 2, 'FRAPPE MYRTILLE', 'b11.PNG', 5),
(13, 2, 'FRAPPE CHOCOLAT', 'b12.PNG', 4),
(14, 2, 'PROMEGRANATE CITRON', 'b13.PNG', 8),
(15, 2, 'COMCOMBRE CITRON', 'b14.PNG', 6),
(16, 2, 'FANTAISIE AU CHOCOLAT', 'b15.PNG', 7),
(18, 1, 'OEUF WRAPPE', 'c14.PNG', 4),
(19, 1, 'CROISSANT', 'c15.PNG', 2),
(20, 1, 'PAIN AU CHOCOLAT', 'c15.PNG', 3),
(21, 1, 'CHILLI CHEESE TOASTIZZA', 'c18.PNG', 4),
(22, 1, 'VEG SAMOSA', 'c19.PNG', 3),
(23, 1, 'HOT \"N\" SPICY VEG PUFF', 'c21.PNG', 4),
(24, 1, 'CHESSY VEG CROISSANT', 'c26.PNG', 4),
(25, 1, 'SMOKED POULET SANDWICH', 'c28.png', 6),
(26, 1, 'POULET 65 SANDWICH', 'c30.PNG', 6),
(27, 1, 'TANDOORI POULET SANDWICH', 'c29.PNG', 6),
(28, 1, 'TANDOORI PANEER SANDWICH', 'c28.PNG', 6),
(29, 1, 'TEX-MEX VEG CHESSE SANDWICH', 'c31.PNG', 6),
(30, 1, 'CHOC-HOLA', 'c38.PNG', 3),
(31, 1, 'DARK PASSION', 'c39.PNG', 4),
(32, 1, 'SIZZLE DAZZLE BROWNIE', 'c40.PNG', 3),
(33, 1, 'CREME GLACE VANILLE', 'c41.PNG', 2),
(34, 1, 'CREME GLACE CHOCOLAT', 'c44.PNG', 2),
(35, 1, 'GATEAU FANTAISIE CHOCOLAT', 'c45.PNG', 10),
(36, 1, 'HEZELNUT KARAT CELEBRATION', 'C46.PNG', 10),
(37, 1, 'CHOCO INDULGENCE CELEBRATION', 'c47.PNG', 10),
(38, 1, 'MANGO SHOT', 'c48.PNG', 4),
(39, 1, 'CHOCO SHOT BELGE', 'c49.PNG', 4),
(40, 3, 'PETIT DEJEUNER', 'm1.png', 4),
(41, 3, 'DEJEUNER', 'm2.png', 8),
(42, 4, 'Espace de stockage en ligne (1Gb)', 's1.png', 5),
(43, 4, 'Espace de stockage en ligne (10Gb)', 's2.png', 10),
(44, 4, 'Cle USB (32Gb)', 's3.png', 20),
(45, 4, 'Impression illimite', 's4.png', 3),
(46, 1, 'Crêpes', 'C49.PNG', 0),
(47, 2, 'Café simple', 'cafe-simple.png', 0),
(53, 1, 'alert&#40;\"hello\"&#41;', 'b6', 11);

-- --------------------------------------------------------

--
-- Structure de la table `services_type`
--

DROP TABLE IF EXISTS `services_type`;
CREATE TABLE IF NOT EXISTS `services_type` (
  `s_type_id` int(255) NOT NULL AUTO_INCREMENT,
  `s_nom` varchar(255) NOT NULL,
  `s_image` varchar(255) NOT NULL,
  PRIMARY KEY (`s_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `services_type`
--

INSERT INTO `services_type` (`s_type_id`, `s_nom`, `s_image`) VALUES
(1, 'Nourritures', 'service_1.png'),
(2, 'Boissons', 'service_2.png'),
(3, 'Menus', 'service_3.png'),
(4, 'Bureautique', 'service_4.png');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(255) NOT NULL,
  `product` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `menu_type`, `product`, `price`, `image`) VALUES
(1, '1', 'EGG WRAP', 100, 'c14.PNG'),
(2, '1', 'FRENCH CROISSANT', 45, 'c15.PNG'),
(3, '1', 'CREAMY CHOCO DONUT', 65, 'c15.PNG'),
(4, '1', 'CHILLI CHEESE TOASTIZZA', 150, 'c18.PNG'),
(5, '1', 'VEG SAMOSA', 30, 'c19.PNG'),
(6, '1', 'HOT \"N\" SPICY VEG PUFF', 35, 'c20.PNG'),
(7, '2', 'CHESSY VEG CROISSANT', 100, 'c26.PNG'),
(8, '2', 'SMOKED CHICKEN SANDWIH', 70, 'c28.PNG'),
(9, '2', 'CHICKEN 65 SANDWICH', 65, 'c24.PNG'),
(10, '2', 'TANDOORI CHICKEN SANDWICH', 80, 'c29.PNG'),
(11, '2', 'TEX-MEX- VEG CHESSE SANDWICH', 65, 'c31.PNG'),
(12, '3', 'CHOC-HOLA', 150, 'c38.PNG'),
(13, '3', 'DARK PASSION', 130, 'c39.PNG'),
(14, '3', 'VANILLA ICE CREAM', 120, 'c41.PNG'),
(15, '3', 'CHOCOLATE ICE CREAM', 135, 'c44.PNG'),
(16, '3', 'SIZZLE DAZZLE BROWNIE', 200, 'c40.PNG'),
(17, '4', 'CHOCOLATE FANTASY CAKE', 300, 'c45.PNG'),
(18, '4', 'HEZELNUT KARAT CELEBRATION CAKE', 450, 'c46.PNG'),
(19, '4', 'CHOCO INDULGENCE CELBRATION CAKE', 500, 'c47.PNG'),
(20, '5', 'BELGIAN CHOCO SHOT', 250, 'C49.PNG'),
(21, '6', 'VANILLA CAPPUCCINO', 4, 'b1.PNG'),
(22, '6', 'CAPPUCCINO', 5, 'b2.PNG'),
(23, '6', 'CAFE MOCHA', 3, 'b3.PNG'),
(24, '6', 'MACCHIA TO', 4, 'b4.PNG'),
(25, '7', 'DEVIS OWN', 6, 'b5.PNG'),
(26, '7', 'ICED ESKIMO', 7, 'b6.PNG'),
(27, '7', 'KAPPI NIRVANA', 2, 'b7.PNG'),
(28, '7', 'VEGAN SHAKE', 13, 'b8.PNG'),
(29, '8', 'CRUNCHY VANILLA FRAPE', 18, 'b9.PNG'),
(30, '8', 'CRUNCHY FRAPPE', 16, 'b10.PNG'),
(31, '8', 'BLUSHBERRY FRAPPE', 19, 'b11.PNG'),
(32, '8', 'CHOCO FRAPPE', 22, 'b12.PNG'),
(33, '7', 'PROMEGRANATE LEMON', 13, 'b13.PNG'),
(34, '7', 'CHOCOLATE FANTASY CAKE( 30)', 14, 'b13.PNG'),
(35, '7', 'ICED ESKIMO', 20, 'b6.PNG'),
(36, '7', 'test', 25, 'b1.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `user`, `pwd`) VALUES
(1, 'abonia', 'a@gmail.com', 'adc'),
(2, 'david', 'david@gmail.com', 'adc'),
(3, 'ben', 'ben@gmail.com', 'adc'),
(4, 'root', 'root@gmail.com', 'adc'),
(5, 'agi', 'agi@gmail.com', 'adc'),
(6, 'girl', 'girl@gmail.com', 'adc'),
(7, 'man', 'man@gmail.com', '555'),
(8, 'neha', 'asda', 'adc');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
