-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2021 at 05:33 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_cat` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `name`) VALUES
(2, 'Pljeskavice'),
(3, 'Ćevapi'),
(4, 'Sendviči'),
(5, 'Salate'),
(6, 'Supe'),
(7, 'Čorbe'),
(8, 'Riblji Specijaliteti');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id_city` bigint(20) NOT NULL AUTO_INCREMENT,
  `name_city` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `name_city`) VALUES
(1, 'Beograd'),
(2, 'Subotica'),
(3, 'Novi Sad'),
(4, 'Smederevo'),
(5, 'Pozarevac'),
(6, 'Jagodina'),
(7, 'Kragujevac'),
(8, 'Krusevac'),
(9, 'Nis'),
(10, 'Kraljevo'),
(11, 'Zajecar'),
(12, 'Cuprija'),
(13, 'Paracin'),
(14, 'Sombor'),
(15, 'Vrsac'),
(16, 'Sremska Mitrovica'),
(17, 'Kikinda'),
(18, 'Zrenjanin'),
(19, 'Pancevo'),
(20, 'Sabac'),
(21, 'Loznica'),
(22, 'Valjevo'),
(23, 'Uzice'),
(24, 'Cacak'),
(25, 'Negotin'),
(26, 'Leskovac'),
(27, 'Vranje'),
(28, 'Novi Pazar'),
(29, 'Kosovska Mitrovica'),
(30, 'Becej'),
(31, 'Ivanjica'),
(32, 'Raska'),
(33, 'Bujanovac'),
(34, 'Presevo'),
(35, 'Surdulica'),
(36, 'Kladovo'),
(37, 'Trstenik'),
(38, 'Prokuplje'),
(39, 'Kursumlija'),
(40, 'Ruma');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `idFood` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cat` bigint(20) NOT NULL,
  PRIMARY KEY (`idFood`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`idFood`, `Name`, `Description`, `Price`, `photo`, `id_cat`) VALUES
(1, 'Mala pljeskavica', 'Pljeskavica od 120 grama. Prilozi po zelji. z', 180, 'img/pljeskavica.jpg', 2),
(2, 'Srednja pljeskavica', 'Pljeskavica od 200 grama.', 220, 'img/pljeskavica.jpg', 2),
(3, 'Velika pljeskavica', 'Pljeskavica od 250 grama.', 300, 'img/pljeskavica.jpg', 2),
(4, 'Mala porcija cevapa', 'Mala porcija cevapa od 160 grama.', 200, 'img/cevapi.jpg', 3),
(5, 'Velika porcija cevapa', 'Velika porcija cevapa od 250 grama.', 300, 'img/cevapi.jpg', 3),
(6, 'Mali sendvic', 'Sendvic od 100 grama. Prilozi po zelji', 120, 'img/sendvici.jpg', 4),
(7, 'Srednji sendvic', 'Sendvic od 140 grama. Prilozi po zelji', 140, 'img/sendvici.jpg', 4),
(8, 'Veliki sendvic', 'Sendvic od 180 grama. Prilozi po zelji', 220, 'img/sendvici.jpg', 4),
(9, 'MEGA sendvic', 'Mega sendvic - sendvic od 250 grama. Prilozi po zelji', 300, 'img/sendvici.jpg', 4),
(10, 'Mala salata', 'Salata sa povrcem - mala porcija.', 150, 'img/salate.jpg', 5),
(11, 'Velika salata', 'Salata sa povrcem - velika porcija.', 300, 'img/salate.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `idOrder` bigint(20) NOT NULL AUTO_INCREMENT,
  `orderDate` date NOT NULL,
  `Delivered` tinyint(4) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`idOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOrder`, `orderDate`, `Delivered`, `id_user`) VALUES
(1, '2019-03-16', 1, 5),
(2, '2019-04-23', 1, 4),
(3, '2020-08-15', 0, 5),
(4, '2020-09-13', 0, 4),
(5, '2020-10-11', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

DROP TABLE IF EXISTS `order_food`;
CREATE TABLE IF NOT EXISTS `order_food` (
  `idOrder` bigint(20) NOT NULL,
  `idFood` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`idOrder`, `idFood`, `amount`) VALUES
(1, 1, 8),
(4, 1, 7),
(3, 5, 2),
(3, 4, 4),
(1, 5, 4),
(2, 7, 3),
(2, 4, 6),
(4, 5, 5),
(4, 7, 3),
(5, 6, 2),
(5, 11, 2),
(5, 1, 4);


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passw` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joindate` datetime NOT NULL,
  `address` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  `isDeliver` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `lastname`, `username`, `passw`, `email`, `city`, `joindate`, `address`, `phone`, `isAdmin`, `isDeliver`, `active`) VALUES
(1, 'Veljko', 'Horvat', 'veljkohorvat', '$2y$10$ZrVSV2P4y1JBmTzqQrV7f.x9.dpYsyyTEd3472HMYXO2gcWywJiIK', 'veljko.horvat43@gmail.com', 'Subotica', '2016-04-13 11:43:25', 'Milosa Obilica 43', '0637618177', 1, 0, 0),
(2, 'Milan', 'Lukovic', 'lukara159', '$2y$10$iI5flPiAeqWkxlcqmyXfb.k.TDS9kMOREBKEgX./jQcRMbi6k0e.6', 'lukovicm@gmail.com', 'Sabac', '2019-11-21 16:33:45', '', '0648892003', 0, 1, 0),
(3, 'Bogdan', 'Jevtovic', 'bogdanj', '$2y$10$rtoNHPDIqLp1MOO8.Qf8VewKnOJWfEdMKVtdpmCjKXUs.Qp4u06Wa', 'bogdanj@gmail.com', 'Kraljevo', '2018-06-08 19:18:17', '', '0603088193', 0, 1, 0),
(4, 'Jelena', 'Lazovic', 'jeca111', '$2y$10$LbFBQ.UMOKIidKLznI7f/ehkP1Yij.zeKuORgBq4XVsDVwumH9evC', 'jeca1l@gmail.com', 'Pozarevac', '2018-01-22 09:57:44', '', '0646419203', 0, 0, 0),
(5, 'Valentina', 'Milivojevic', 'valemtinam', '$2y$10$ZJU7nPg2cVI3KdLq58mS.uiiNXmucRHZ3a6846ypWbR3tnnjoamzG', 'valentina.m@gmail.com', 'Nis', '2017-03-17 18:44:43', '', '0637319133', 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
