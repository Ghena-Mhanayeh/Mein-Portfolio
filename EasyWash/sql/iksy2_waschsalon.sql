-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 02. Jul 2025 um 20:43
-- Server-Version: 10.11.11-MariaDB
-- PHP-Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `iksy2_waschsalon`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Adresse`
--

CREATE TABLE `Adresse` (
  `adresse_id` int(11) NOT NULL,
  `kunde_id` int(11) DEFAULT NULL,
  `strasse` varchar(100) DEFAULT NULL,
  `plz` varchar(10) DEFAULT NULL,
  `stadt` varchar(50) DEFAULT NULL,
  `land` varchar(50) DEFAULT NULL,
  `adresszusatz` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Adresse`
--

INSERT INTO `Adresse` (`adresse_id`, `kunde_id`, `strasse`, `plz`, `stadt`, `land`, `adresszusatz`) VALUES
(3, 29, 'straße 23', '1234', 'Bochum', 'Deutschland', ''),
(4, 30, 'Clemensstr.2', '44789', 'Bochum', 'Deutschland', ''),
(5, 31, 'df', 'dsf', 'sdf', 'Deutschland', ''),
(6, 32, 'Bewerungestr. 28', '45276', 'Essen', 'Deutschland', ''),
(7, 35, 'street', '2323', 'town', 'Deutschland', ''),
(8, 36, 'dfg', 'dfs', 'sdfdsf', 'Deutschland', ''),
(9, 37, '123', '123', '123', 'Deutschland', '123'),
(10, 38, 'hhh.12', '4444', 'essen', 'Deutschland', ''),
(11, 39, 'Am Hochschulcampus 1', '44801', 'Bochum', 'Deutschland', ''),
(12, 40, 'dst 16', '4478', 'Bochum', 'Deutschland', ''),
(13, 45, 'Ehr 16', '44587', 'Bochum', 'Deutschland', ''),
(14, 46, 'ef 12', '55454', 'bochuk', 'Deutschland', ''),
(15, 47, 'hdhdge 3', '22345', 'dhdfhe', 'Deutschland', ''),
(16, 48, 'street', '3234', 'Bochum', 'Deutschland', ''),
(17, 49, 'Probestraße 1', '12342', 'Bochum', 'Deutschland', ''),
(18, 50, 'Probe 1', '12458', 'Bochum', 'Deutschland', ''),
(19, 51, 'Probe 2', '45789', 'Bochum', 'Deutschland', ''),
(20, 52, 'Str 12', '37366', 'viwhwd', 'Deutschland', ''),
(21, 53, 'Str 15', '23454', 'Bochum', 'Deutschland', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Bestellpositionen`
--

CREATE TABLE `Bestellpositionen` (
  `position_id` int(11) NOT NULL,
  `bestellung_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`)),
  `preis` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Bestellpositionen`
--

INSERT INTO `Bestellpositionen` (`position_id`, `bestellung_id`, `service_id`, `details`, `preis`) VALUES
(4, 5, 1, '{\"kg\":\"12\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 50.00),
(5, 6, 1, '{\"kg\":\"8\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 34.00),
(6, 7, 2, '{\"moebeltyp\":\"1\",\"anzahl\":12}', 180.00),
(7, 7, 2, '{\"moebeltyp\":\"1\",\"anzahl\":12}', 180.00),
(8, 8, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 10.00),
(9, 9, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 9.00),
(10, 10, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 10.00),
(11, 11, 2, '{\"moebeltyp\":\"Matratze\",\"anzahl\":2}', 30.00),
(12, 12, 1, '{\"kg\":\"12\",\"farbe\":\"Schwarz\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 49.00),
(13, 12, 2, '{\"moebeltyp\":\"Sessel\",\"anzahl\":2}', 20.00),
(14, 13, 3, '{\"breite\":\"0.3 m\",\"laenge\":\"0.3 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Nein\"}', 0.90),
(15, 13, 1, '{\"kg\":\"3\",\"farbe\":\"Schwarz\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 8.50),
(16, 13, 2, '{\"moebeltyp\":\"Matratze\",\"anzahl\":4}', 60.00),
(17, 13, 1, '{\"kg\":\"1\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 4.50),
(18, 13, 2, '{\"moebeltyp\":\"Sessel\",\"anzahl\":2}', 20.00),
(19, 14, 1, '{\"kg\":\"12\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 50.00),
(20, 14, 2, '{\"moebeltyp\":\"Matratze\",\"anzahl\":12}', 180.00),
(21, 14, 3, '{\"breite\":\"12 m\",\"laenge\":\"12 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Ja\"}', 1443.00),
(22, 15, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 6.00),
(23, 15, 3, '{\"breite\":\"2 m\",\"laenge\":\"0.2 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Nein\"}', 4.00),
(24, 16, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(25, 17, 1, '{\"kg\":\"1\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 4.50),
(26, 17, 2, '{\"moebeltyp\":\"Matratze\",\"anzahl\":2}', 30.00),
(27, 17, 3, '{\"breite\":\"2 m\",\"laenge\":\"2 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Nein\"}', 40.00),
(28, 18, 3, '{\"breite\":\"1 m\",\"laenge\":\"2 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Nein\"}', 20.00),
(29, 19, 1, '{\"kg\":\"12\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 32.00),
(30, 20, 1, '{\"kg\":\"1\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 4.50),
(31, 20, 1, '{\"kg\":\"1\",\"farbe\":\"Schwarz\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 3.50),
(32, 21, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(33, 22, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(34, 23, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(35, 24, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(36, 25, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(37, 26, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(38, 27, 1, '{\"kg\":\"12\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 54.90),
(39, 27, 2, '{\"moebeltyp\":\"Sessel\",\"anzahl\":12}', 120.00),
(40, 27, 3, '{\"breite\":\"12 m\",\"laenge\":\"12 m\",\"lieferung\":\"Ja\",\"tiefreinigung\":\"Ja\"}', 1449.00),
(41, 28, 1, '{\"kg\":\"1\",\"farbe\":\"Schwarz\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 3.50),
(42, 29, 1, '{\"kg\":\"12\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 50.00),
(43, 30, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 7.00),
(44, 31, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 6.00),
(45, 32, 1, '{\"kg\":\"12\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 32.00),
(46, 33, 1, '{\"kg\":\"12\",\"farbe\":\"Schwarz\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 31.00),
(47, 33, 2, '{\"moebeltyp\":\"Matratze\",\"anzahl\":2}', 30.00),
(48, 33, 3, '{\"breite\":\"10 m\",\"laenge\":\"9 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Nein\"}', 900.00),
(49, 34, 3, '{\"breite\":\"12 m\",\"laenge\":\"23 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Ja\"}', 2763.00),
(50, 34, 3, '{\"breite\":\"12 m\",\"laenge\":\"12 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Nein\"}', 1440.00),
(51, 35, 1, '{\"kg\":\"5\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 14.50),
(52, 36, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.90),
(53, 37, 3, '{\"breite\":\"2 m\",\"laenge\":\"2 m\",\"lieferung\":\"Ja\",\"tiefreinigung\":\"Ja\"}', 49.00),
(54, 38, 1, '{\"kg\":\"12\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 54.90),
(55, 38, 2, '{\"moebeltyp\":\"Matratze\",\"anzahl\":2}', 30.00),
(56, 38, 3, '{\"breite\":\"2 m\",\"laenge\":\"3 m\",\"lieferung\":\"Ja\",\"tiefreinigung\":\"Ja\"}', 69.00),
(57, 39, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.90),
(58, 40, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.90),
(59, 41, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Nein\",\"liefern\":\"Nein\"}', 6.00),
(60, 42, 1, '{\"kg\":\"2\",\"farbe\":\"Mix\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.40),
(61, 43, 1, '{\"kg\":\"12\",\"farbe\":\"Schwarz\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 53.90),
(62, 43, 1, '{\"kg\":\"3\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 18.90),
(63, 43, 2, '{\"moebeltyp\":\"Sessel\",\"anzahl\":2}', 20.00),
(64, 43, 3, '{\"breite\":\"2 m\",\"laenge\":\"3 m\",\"lieferung\":\"Ja\",\"tiefreinigung\":\"Ja\"}', 69.00),
(65, 44, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.90),
(66, 44, 2, '{\"moebeltyp\":\"Gardinen\",\"anzahl\":3}', 30.00),
(67, 44, 3, '{\"breite\":\"2 m\",\"laenge\":\"3 m\",\"lieferung\":\"Nein\",\"tiefreinigung\":\"Nein\"}', 60.00),
(68, 45, 2, '{\"moebeltyp\":\"Matratze\",\"anzahl\":2}', 30.00),
(69, 46, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 13.90),
(70, 47, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 13.90),
(71, 48, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 13.90),
(72, 49, 1, '{\"kg\":\"4\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Ja\"}', 16.90),
(73, 50, 1, '{\"kg\":\"4\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Nein\",\"liefern\":\"Ja\"}', 16.90),
(74, 51, 1, '{\"kg\":\"2\",\"farbe\":\"Schwarz\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 13.90),
(75, 53, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.90),
(76, 55, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(77, 56, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(78, 57, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.90),
(79, 57, 1, '{\"kg\":\"2\",\"farbe\":\"Mix\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.40),
(80, 58, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Ja\"}', 14.90),
(81, 59, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 10.00),
(82, 60, 1, '{\"kg\":\"2\",\"farbe\":\"Wei\\u00df\",\"bugeln\":\"Ja\",\"liefern\":\"Nein\"}', 10.00),
(83, 60, 3, '{\"breite\":\"2 m\",\"laenge\":\"2 m\",\"lieferung\":\"Ja\",\"tiefreinigung\":\"Ja\"}', 49.00),
(84, 61, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(85, 62, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(86, 63, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 7.00),
(87, 64, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Ja\"}', 11.90),
(88, 65, 1, '{\"Kg\":\"2\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.50),
(89, 66, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.00),
(90, 67, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(91, 68, 1, '{\"Kg\":\"3\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 17.90),
(92, 69, 1, '{\"Kg\":\"5\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 14.00),
(93, 69, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"4 m\",\"Lieferung\":\"Ja\",\"Tiefreinigung\":\"Ja\"}', 89.00),
(94, 70, 1, '{\"Kg\":\"5\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 14.00),
(95, 70, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"4 m\",\"Lieferung\":\"Ja\",\"Tiefreinigung\":\"Ja\"}', 89.00),
(96, 71, 1, '{\"Kg\":\"5\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 14.00),
(97, 71, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"4 m\",\"Lieferung\":\"Ja\",\"Tiefreinigung\":\"Ja\"}', 89.00),
(98, 72, 1, '{\"Kg\":\"12\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 54.90),
(99, 72, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":2}', 20.00),
(100, 72, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"3 m\",\"Lieferung\":\"Ja\",\"Tiefreinigung\":\"Ja\"}', 69.00),
(101, 73, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":4}', 40.00),
(102, 74, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":1}', 15.00),
(103, 74, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":5}', 75.00),
(104, 75, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(105, 76, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 14.00),
(106, 77, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 9.50),
(107, 78, 1, '{\"Kg\":\"12\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 54.90),
(108, 79, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 7.00),
(109, 80, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 14.00),
(110, 81, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 6.00),
(111, 82, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(112, 83, 1, '{\"Kg\":\"3\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 17.90),
(113, 84, 1, '{\"Kg\":\"20\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 81.50),
(114, 85, 1, '{\"Kg\":\"3\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 8.50),
(115, 86, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(116, 87, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(117, 88, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(118, 89, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 14.00),
(119, 90, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 14.00),
(120, 91, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 14.00),
(121, 92, 1, '{\"Kg\":\"4\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 18.00),
(122, 92, 3, '{\"Breite\":\"0.4 m\",\"L\\u00e4nge\":\"0.4 m\",\"Lieferung\":\"Ja\",\"Tiefreinigung\":\"Ja\"}', 10.60),
(123, 93, 1, '{\"Kg\":\"1\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 4.50),
(124, 94, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(125, 95, 1, '{\"Kg\":\"5\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 22.00),
(126, 96, 1, '{\"Kg\":\"5\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 22.00),
(127, 97, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(128, 98, 1, '{\"Kg\":\"12\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 54.90),
(129, 99, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(130, 100, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 18.90),
(131, 101, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(132, 102, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2}', 30.00),
(133, 102, 1, '{\"Kg\":\"1\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 10.90),
(134, 103, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(135, 104, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(136, 105, 1, '{\"Kg\":\"1\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 10.90),
(137, 106, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(138, 107, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(139, 108, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":1}', 15.00),
(140, 109, 1, '{\"Kg\":\"1\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 10.90),
(141, 110, 1, '{\"Kg\":\"12\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 49.00),
(142, 110, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2}', 30.00),
(143, 111, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2}', 30.00),
(144, 112, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(145, 113, 1, '{\"Kg\":\"1\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 10.40),
(146, 114, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":2,\"Lieferung\":\"Ja\"}', 20.00),
(147, 114, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(148, 115, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(149, 116, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(150, 117, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(151, 118, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(152, 119, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(153, 120, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 10.00),
(154, 121, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":2,\"Lieferung\":\"Ja\"}', 20.00),
(155, 122, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":1,\"Lieferung\":\"Ja\"}', 10.00),
(156, 123, 2, '{\"M\\u00f6beltyp\":\"Gardinen\",\"Anzahl\":2,\"Lieferung\":\"Ja\"}', 20.00),
(157, 124, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":2,\"Lieferung\":\"Ja\"}', 20.00),
(158, 125, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 10.00),
(159, 126, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.00),
(160, 127, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.00),
(161, 128, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.00),
(162, 129, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 10.00),
(163, 129, 2, '{\"M\\u00f6beltyp\":\"Gardinen\",\"Anzahl\":2,\"Lieferung\":\"Ja\"}', 20.00),
(164, 130, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(165, 131, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":1,\"Lieferung\":\"Ja\"}', 15.00),
(166, 132, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-30\",\"Wunschzeit\":\"09:00\"}', 30.00),
(167, 133, 1, '{\"Kg\":\"12\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 54.90),
(168, 134, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-30\",\"Wunschzeit\":\"09:00\"}', 10.00),
(169, 135, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-29\",\"Wunschzeit\":\"09:00\"}', 30.00),
(170, 136, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":12,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-29\",\"Wunschzeit\":\"16:00\"}', 120.00),
(171, 137, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(172, 137, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":3,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-30\",\"Wunschzeit\":\"09:00\"}', 45.00),
(173, 137, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(174, 138, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 10.00),
(175, 138, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-30\",\"Wunschzeit\":\"16:00\"}', 30.00),
(176, 139, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-01\",\"Wunschzeit\":\"09:00\"}', 20.00),
(177, 140, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-03\",\"Wunschzeit\":\"09:00\"}', 10.00),
(178, 141, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-03\",\"Wunschzeit\":\"09:00\"}', 10.00),
(179, 142, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-02\",\"Wunschzeit\":\"09:00\"}', 10.00),
(180, 142, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(181, 142, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(182, 143, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-02\",\"Wunschzeit\":\"09:00\"}', 10.00),
(183, 143, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(184, 143, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(185, 144, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-20\",\"Wunschzeit\":\"16:00\"}', 20.00),
(186, 144, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(187, 144, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(188, 145, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 18.90),
(189, 145, 3, '{\"Breite\":\"3 m\",\"L\\u00e4nge\":\"3 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 93.00),
(190, 146, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(191, 146, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(192, 147, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(193, 147, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(194, 148, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 18.90),
(195, 148, 1, '{\"Kg\":\"3\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 8.50),
(196, 149, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-05\",\"Wunschzeit\":\"09:00\"}', 30.00),
(197, 150, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(198, 151, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(199, 152, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(200, 153, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(201, 154, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(202, 154, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-05\",\"Wunschzeit\":\"16:00\"}', 30.00),
(203, 154, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(204, 155, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 14.90),
(205, 156, 1, '{\"Kg\":\"3\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 17.90),
(206, 157, 1, '{\"Kg\":\"3\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 13.00),
(207, 158, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.90),
(208, 159, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.00),
(209, 159, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-06-19\",\"Wunschzeit\":\"09:00\"}', 30.00),
(210, 159, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Ja\",\"Tiefreinigung\":\"Ja\"}', 49.00),
(211, 160, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Ja\"}', 10.90),
(212, 160, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-19\",\"Wunschzeit\":\"16:00\"}', 10.00),
(213, 161, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2005-05-05\",\"Wunschzeit\":\"09:00\"}', 15.00),
(214, 162, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2005-05-05\",\"Wunschzeit\":\"09:00\"}', 15.00),
(215, 163, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"1 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Nein\"}', 20.00),
(216, 164, 1, '{\"Kg\":\"3\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 9.00),
(217, 165, 1, '{\"Kg\":\"2\",\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 6.50),
(218, 166, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Ja\"}', 11.90),
(219, 167, 2, '{\"M\\u00f6beltyp\":\"Sessel\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-11\",\"Wunschzeit\":\"09:00\"}', 20.00),
(220, 168, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.40),
(221, 168, 2, '{\"M\\u00f6beltyp\":\"Ecksofa\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-14\",\"Wunschzeit\":\"09:00\"}', 50.00),
(222, 168, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 43.00),
(223, 169, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.50),
(224, 170, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.80),
(225, 171, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.40),
(226, 172, 1, '{\"Kg\":\"3\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 17.80),
(227, 173, 1, '{\"Kg\":\"1\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 5.90),
(228, 173, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-24\",\"Wunschzeit\":\"09:00\"}', 30.00),
(229, 174, 1, '{\"Kg\":\"4\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 1.00),
(230, 175, 1, '{\"Kg\":\"2\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 1.00),
(231, 176, 1, '{\"Kg\":\"1\",\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 1.00),
(232, 177, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 1.00),
(233, 178, 1, '{\"Kg\":\"2\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.40),
(234, 179, 1, '{\"Kg\":\"1\",\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 5.50),
(235, 180, 1, '{\"Kg\":1,\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 9.80),
(236, 181, 1, '{\"Kg\":1,\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 5.90),
(237, 182, 1, '{\"Kg\":1,\"Farbe\":\"Weiss\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 9.80),
(238, 183, 1, '{\"Kg\":1,\"Farbe\":\"Weiss\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 5.90),
(239, 184, 1, '{\"Kg\":1,\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Nein\",\"Liefern\":\"Nein\"}', 4.40),
(240, 185, 1, '{\"Kg\":1,\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 5.90),
(241, 186, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-04\",\"Wunschzeit\":\"09:00\"}', 15.00),
(242, 187, 1, '{\"Kg\":1,\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 5.90),
(243, 187, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":1,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-08\",\"Wunschzeit\":\"09:00\"}', 15.00),
(244, 188, 1, '{\"Kg\":2,\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 13.40),
(245, 189, 1, '{\"Kg\":3,\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Ja\"}', 17.80),
(246, 189, 2, '{\"M\\u00f6beltyp\":\"Matratze\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-15\",\"Wunschzeit\":\"09:00\"}', 30.00),
(247, 189, 3, '{\"Breite\":\"3 m\",\"L\\u00e4nge\":\"3 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 93.00),
(248, 190, 3, '{\"Breite\":\"0.3 m\",\"L\\u00e4nge\":\"0.4 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 4.20),
(249, 191, 3, '{\"Breite\":\"0.3 m\",\"L\\u00e4nge\":\"0.4 m\",\"Lieferung\":\"Nein\",\"Tiefreinigung\":\"Ja\"}', 4.20),
(250, 192, 1, '{\"Kg\":2,\"Farbe\":\"Schwarz\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.50),
(251, 193, 1, '{\"Kg\":2,\"Farbe\":\"Wei\\u00df\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.90),
(252, 194, 2, '{\"M\\u00f6beltyp\":\"Gardinen\",\"Anzahl\":2,\"Lieferung\":\"Ja\",\"Wunschtermin\":\"2025-07-02\",\"Wunschzeit\":\"16:00\"}', 20.00),
(253, 194, 1, '{\"Kg\":2,\"Farbe\":\"Mix\",\"B\\u00fcgeln\":\"Ja\",\"Liefern\":\"Nein\"}', 9.00),
(254, 194, 3, '{\"Breite\":\"2 m\",\"L\\u00e4nge\":\"2 m\",\"Lieferung\":\"Ja\",\"Tiefreinigung\":\"Nein\"}', 44.90);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Bestellungen`
--

CREATE TABLE `Bestellungen` (
  `bestellung_id` int(11) NOT NULL,
  `kunde_id` int(11) NOT NULL,
  `bestellt_am` datetime DEFAULT current_timestamp(),
  `wunschdatum` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'offen',
  `bezahlt` enum('Ja','Nein') DEFAULT 'Nein'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Bestellungen`
--

INSERT INTO `Bestellungen` (`bestellung_id`, `kunde_id`, `bestellt_am`, `wunschdatum`, `status`, `bezahlt`) VALUES
(5, 5, '2025-06-22 19:39:39', NULL, 'abgeschlossen', 'Ja'),
(6, 32, '2025-06-22 19:42:39', NULL, 'abgeschlossen', 'Nein'),
(7, 5, '2025-06-23 13:16:00', NULL, 'abgeschlossen', 'Ja'),
(8, 5, '2025-06-23 14:42:10', NULL, 'offen', 'Nein'),
(9, 5, '2025-06-23 14:43:25', NULL, 'offen', 'Nein'),
(10, 5, '2025-06-23 14:44:51', NULL, 'offen', 'Nein'),
(11, 5, '2025-06-23 14:45:37', NULL, 'offen', 'Nein'),
(12, 5, '2025-06-23 15:14:10', NULL, 'offen', 'Nein'),
(13, 11, '2025-06-23 15:17:00', NULL, 'offen', 'Nein'),
(14, 5, '2025-06-23 15:21:18', NULL, 'offen', 'Nein'),
(15, 11, '2025-06-23 15:21:33', NULL, 'offen', 'Nein'),
(16, 5, '2025-06-23 15:22:47', NULL, 'offen', 'Nein'),
(17, 5, '2025-06-23 15:28:06', NULL, 'offen', 'Nein'),
(18, 5, '2025-06-23 15:33:37', NULL, 'offen', 'Nein'),
(19, 5, '2025-06-23 15:38:56', NULL, 'offen', 'Nein'),
(20, 11, '2025-06-23 15:40:41', NULL, 'offen', 'Nein'),
(21, 5, '2025-06-23 16:29:05', NULL, 'offen', 'Nein'),
(22, 5, '2025-06-23 16:30:05', NULL, 'offen', 'Nein'),
(23, 5, '2025-06-23 16:33:36', NULL, 'offen', 'Nein'),
(24, 5, '2025-06-23 16:35:11', NULL, 'offen', 'Nein'),
(25, 5, '2025-06-23 16:35:38', NULL, 'offen', 'Nein'),
(26, 5, '2025-06-23 16:38:01', NULL, 'offen', 'Nein'),
(27, 32, '2025-06-23 16:51:55', NULL, 'offen', 'Nein'),
(28, 32, '2025-06-23 17:08:26', NULL, 'offen', 'Nein'),
(29, 32, '2025-06-23 17:09:40', NULL, 'offen', 'Nein'),
(30, 32, '2025-06-23 17:10:49', NULL, 'offen', 'Nein'),
(31, 32, '2025-06-23 17:11:46', NULL, 'offen', 'Nein'),
(32, 32, '2025-06-23 17:21:34', NULL, 'offen', 'Nein'),
(33, 32, '2025-06-23 18:35:07', NULL, 'offen', 'Nein'),
(34, 5, '2025-06-24 10:18:22', NULL, 'offen', 'Nein'),
(35, 29, '2025-06-24 10:39:47', NULL, 'offen', 'Nein'),
(36, 11, '2025-06-24 11:29:34', NULL, 'offen', 'Nein'),
(37, 11, '2025-06-24 11:31:06', NULL, 'offen', 'Nein'),
(38, 32, '2025-06-24 11:47:02', NULL, 'offen', 'Nein'),
(39, 32, '2025-06-24 11:52:01', NULL, 'offen', 'Nein'),
(40, 32, '2025-06-24 11:52:33', NULL, 'offen', 'Nein'),
(41, 32, '2025-06-24 11:53:54', NULL, 'offen', 'Nein'),
(42, 32, '2025-06-24 13:11:31', NULL, 'offen', 'Nein'),
(43, 5, '2025-06-24 13:44:26', NULL, 'offen', 'Nein'),
(44, 32, '2025-06-24 13:46:30', NULL, 'offen', 'Nein'),
(45, 37, '2025-06-24 13:52:45', NULL, 'offen', 'Nein'),
(46, 32, '2025-06-24 14:04:30', NULL, 'offen', 'Nein'),
(47, 11, '2025-06-24 14:11:15', NULL, 'offen', 'Nein'),
(48, 11, '2025-06-24 14:11:57', NULL, 'offen', 'Nein'),
(49, 29, '2025-06-24 14:22:01', NULL, 'offen', 'Nein'),
(50, 29, '2025-06-24 14:23:09', NULL, 'offen', 'Nein'),
(51, 11, '2025-06-24 14:59:34', NULL, 'offen', 'Nein'),
(52, 5, '2025-06-24 15:00:20', NULL, 'offen', 'Nein'),
(53, 11, '2025-06-24 15:01:57', NULL, 'offen', 'Nein'),
(54, 5, '2025-06-24 15:03:05', NULL, 'offen', 'Nein'),
(55, 32, '2025-06-24 15:03:31', NULL, 'offen', 'Nein'),
(56, 32, '2025-06-24 15:07:42', NULL, 'offen', 'Nein'),
(57, 11, '2025-06-24 16:08:06', NULL, 'offen', 'Nein'),
(58, 11, '2025-06-24 16:08:34', NULL, 'offen', 'Nein'),
(59, 11, '2025-06-24 16:28:53', NULL, 'offen', 'Nein'),
(60, 11, '2025-06-24 16:29:46', NULL, 'offen', 'Nein'),
(61, 32, '2025-06-24 16:35:48', NULL, 'offen', 'Nein'),
(62, 32, '2025-06-24 16:50:44', NULL, 'offen', 'Nein'),
(63, 32, '2025-06-24 16:54:43', NULL, 'offen', 'Nein'),
(64, 32, '2025-06-24 17:06:50', NULL, 'offen', 'Nein'),
(65, 32, '2025-06-24 18:10:30', NULL, 'offen', 'Nein'),
(66, 32, '2025-06-24 18:37:38', NULL, 'offen', 'Nein'),
(67, 11, '2025-06-24 18:54:03', NULL, 'offen', 'Nein'),
(68, 32, '2025-06-24 19:10:21', NULL, 'offen', 'Nein'),
(69, 9, '2025-06-25 09:32:22', NULL, 'offen', 'Nein'),
(70, 9, '2025-06-25 09:32:53', NULL, 'offen', 'Nein'),
(71, 9, '2025-06-25 09:33:06', NULL, 'offen', 'Nein'),
(72, 38, '2025-06-25 11:40:26', NULL, 'offen', 'Nein'),
(73, 31, '2025-06-25 15:00:19', NULL, 'offen', 'Nein'),
(74, 31, '2025-06-25 15:07:59', NULL, 'offen', 'Nein'),
(75, 11, '2025-06-25 16:16:09', NULL, 'abgeschlossen', 'Ja'),
(76, 32, '2025-06-25 18:16:58', NULL, 'offen', 'Nein'),
(77, 32, '2025-06-25 18:21:14', NULL, 'offen', 'Nein'),
(78, 32, '2025-06-25 18:24:49', NULL, 'offen', 'Nein'),
(79, 32, '2025-06-25 18:40:12', NULL, 'offen', 'Nein'),
(80, 32, '2025-06-25 18:48:43', NULL, 'offen', 'Nein'),
(81, 32, '2025-06-25 18:59:48', NULL, 'offen', 'Nein'),
(82, 32, '2025-06-25 19:01:23', NULL, 'offen', 'Nein'),
(83, 32, '2025-06-25 19:02:07', NULL, 'offen', 'Nein'),
(84, 5, '2025-06-25 19:05:55', NULL, 'offen', 'Nein'),
(85, 5, '2025-06-25 19:29:12', NULL, 'offen', 'Nein'),
(86, 5, '2025-06-25 19:42:09', NULL, 'offen', 'Nein'),
(87, 32, '2025-06-25 19:49:41', NULL, 'offen', 'Nein'),
(88, 32, '2025-06-25 19:53:06', NULL, 'offen', 'Nein'),
(89, 32, '2025-06-25 21:57:54', NULL, 'offen', 'Nein'),
(90, 32, '2025-06-26 08:47:04', NULL, 'offen', 'Nein'),
(91, 32, '2025-06-26 09:04:30', NULL, 'offen', 'Nein'),
(92, 29, '2025-06-26 10:08:31', NULL, 'offen', 'Nein'),
(93, 11, '2025-06-26 10:25:46', NULL, 'offen', 'Nein'),
(94, 40, '2025-06-26 13:01:52', NULL, 'offen', 'Nein'),
(95, 31, '2025-06-26 14:23:38', NULL, 'offen', 'Nein'),
(96, 31, '2025-06-26 14:23:56', NULL, 'offen', 'Nein'),
(97, 40, '2025-06-26 17:50:58', NULL, 'offen', 'Nein'),
(98, 32, '2025-06-26 22:31:34', NULL, 'offen', 'Nein'),
(99, 32, '2025-06-26 22:42:39', NULL, 'offen', 'Nein'),
(100, 32, '2025-06-26 22:47:43', NULL, 'offen', 'Nein'),
(101, 32, '2025-06-26 22:56:44', NULL, 'offen', 'Nein'),
(102, 32, '2025-06-26 23:08:36', NULL, 'offen', 'Nein'),
(103, 32, '2025-06-26 23:19:33', NULL, 'offen', 'Nein'),
(104, 32, '2025-06-26 23:26:32', NULL, 'offen', 'Nein'),
(105, 32, '2025-06-26 23:31:04', NULL, 'offen', 'Nein'),
(106, 32, '2025-06-26 23:33:55', NULL, 'offen', 'Nein'),
(107, 32, '2025-06-26 23:38:02', NULL, 'offen', 'Nein'),
(108, 32, '2025-06-26 23:49:10', NULL, 'offen', 'Nein'),
(109, 32, '2025-06-26 23:50:52', NULL, 'offen', 'Nein'),
(110, 32, '2025-06-26 23:52:44', NULL, 'offen', 'Nein'),
(111, 29, '2025-06-27 08:46:21', NULL, 'offen', 'Nein'),
(112, 40, '2025-06-27 13:09:48', NULL, 'offen', 'Ja'),
(113, 40, '2025-06-27 15:39:31', NULL, 'offen', 'Nein'),
(114, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(115, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(116, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(117, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(118, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(119, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(120, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(121, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(122, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(123, 45, '2025-06-27 00:00:00', NULL, 'offen', 'Nein'),
(124, 45, '2025-06-28 00:00:00', NULL, 'offen', 'Nein'),
(125, 45, '2025-06-28 00:00:00', NULL, 'offen', 'Nein'),
(126, 45, '2025-06-28 11:00:41', '2025-07-04', 'offen', 'Nein'),
(127, 45, '2025-06-28 11:06:17', '2025-07-06', 'offen', 'Nein'),
(128, 45, '2025-06-28 11:09:35', '2025-07-06', 'offen', 'Nein'),
(129, 45, '2025-06-28 11:14:53', NULL, 'offen', 'Nein'),
(130, 5, '2025-06-28 11:54:41', '2025-06-30', 'offen', 'Nein'),
(131, 32, '2025-06-28 13:03:30', NULL, 'offen', 'Nein'),
(132, 32, '2025-06-28 14:41:22', NULL, 'offen', 'Nein'),
(133, 32, '2025-06-28 14:43:08', '2025-07-06', 'offen', 'Nein'),
(134, 32, '2025-06-28 14:59:15', NULL, 'offen', 'Nein'),
(135, 32, '2025-06-28 15:27:32', NULL, 'offen', 'Nein'),
(136, 38, '2025-06-28 15:30:24', NULL, 'offen', 'Nein'),
(137, 32, '2025-06-28 16:22:40', '2025-06-30', 'offen', 'Nein'),
(138, 32, '2025-06-28 16:24:27', '2025-07-02', 'offen', 'Nein'),
(139, 32, '2025-06-28 16:42:23', NULL, 'offen', 'Nein'),
(140, 32, '2025-06-28 16:52:46', NULL, 'offen', 'Nein'),
(141, 32, '2025-06-28 16:53:44', NULL, 'offen', 'Nein'),
(142, 32, '2025-06-28 17:04:49', '2025-07-03', 'offen', 'Nein'),
(143, 32, '2025-06-28 17:05:58', '2025-07-03', 'offen', 'Nein'),
(144, 32, '2025-06-28 17:55:19', NULL, 'offen', 'Nein'),
(145, 32, '2025-06-28 17:57:23', NULL, 'offen', 'Nein'),
(146, 32, '2025-06-28 18:02:06', NULL, 'offen', 'Nein'),
(147, 32, '2025-06-28 18:06:15', NULL, 'offen', 'Nein'),
(148, 32, '2025-06-28 18:11:25', NULL, 'offen', 'Nein'),
(149, 32, '2025-06-29 00:12:19', NULL, 'offen', 'Nein'),
(150, 32, '2025-06-29 00:12:50', NULL, 'offen', 'Nein'),
(151, 32, '2025-06-29 00:25:20', NULL, 'offen', 'Nein'),
(152, 32, '2025-06-29 00:28:03', NULL, 'offen', 'Nein'),
(153, 32, '2025-06-29 00:33:14', '2025-06-24', 'offen', 'Nein'),
(154, 32, '2025-06-29 00:35:08', '2025-07-06', 'offen', 'Nein'),
(155, 32, '2025-06-29 00:37:59', '2025-06-25', 'offen', 'Nein'),
(156, 32, '2025-06-29 00:39:40', '2025-06-08', 'offen', 'Nein'),
(157, 32, '2025-06-29 00:40:39', '2025-06-20', 'offen', 'Nein'),
(158, 32, '2025-06-29 01:17:11', '2025-07-03', 'offen', 'Nein'),
(159, 32, '2025-06-29 01:19:00', '2025-07-03', 'offen', 'Nein'),
(160, 29, '2025-06-29 14:09:57', '2025-06-30', 'offen', 'Nein'),
(161, 9, '2025-06-30 11:55:15', NULL, 'offen', 'Nein'),
(162, 9, '2025-06-30 11:57:38', NULL, 'offen', 'Nein'),
(163, 9, '2025-06-30 12:07:21', '2023-04-02', 'offen', 'Nein'),
(164, 29, '2025-07-01 10:09:29', NULL, 'offen', 'Nein'),
(165, 40, '2025-07-01 10:53:37', '2025-07-09', 'offen', 'Nein'),
(166, 40, '2025-07-01 10:54:57', '2025-07-23', 'offen', 'Nein'),
(167, 40, '2025-07-01 10:58:11', '2025-07-23', 'offen', 'Nein'),
(168, 49, '2025-07-01 13:16:12', '2025-07-11', 'abgeschlossen', 'Ja'),
(169, 40, '2025-07-01 15:52:22', '2025-07-18', 'offen', 'Nein'),
(170, 50, '2025-07-01 16:57:59', '2025-07-10', 'offen', 'Nein'),
(171, 50, '2025-07-01 17:03:34', '2025-07-10', 'offen', 'Nein'),
(172, 29, '2025-07-01 19:07:05', NULL, 'offen', 'Nein'),
(173, 32, '2025-07-01 21:10:48', '2025-07-29', 'offen', 'Nein'),
(174, 32, '2025-07-01 22:25:03', '2025-07-01', 'offen', 'Nein'),
(175, 32, '2025-07-01 22:49:37', NULL, 'offen', 'Nein'),
(176, 32, '2025-07-01 22:54:05', NULL, 'offen', 'Nein'),
(177, 32, '2025-07-01 23:11:51', '2025-07-31', 'offen', 'Nein'),
(178, 32, '2025-07-01 23:15:30', '2025-07-19', 'offen', 'Nein'),
(179, 32, '2025-07-01 23:19:44', '2025-07-03', 'offen', 'Nein'),
(180, 32, '2025-07-01 23:36:14', NULL, 'offen', 'Nein'),
(181, 32, '2025-07-01 23:36:52', '2025-07-05', 'offen', 'Nein'),
(182, 32, '2025-07-01 23:48:11', '2025-07-12', 'offen', 'Nein'),
(183, 32, '2025-07-01 23:52:25', NULL, 'offen', 'Nein'),
(184, 32, '2025-07-01 23:53:58', NULL, 'offen', 'Nein'),
(185, 32, '2025-07-02 00:09:55', NULL, 'offen', 'Nein'),
(186, 32, '2025-07-02 00:14:28', NULL, 'offen', 'Nein'),
(187, 32, '2025-07-02 00:33:13', '2025-07-04', 'offen', 'Nein'),
(188, 52, '2025-07-02 10:24:17', '2025-07-11', 'offen', 'Nein'),
(189, 53, '2025-07-02 11:28:52', '2025-07-22', 'abgeschlossen', 'Nein'),
(190, 29, '2025-07-02 13:27:27', NULL, 'offen', 'Nein'),
(191, 29, '2025-07-02 13:27:59', NULL, 'offen', 'Nein'),
(192, 32, '2025-07-02 18:21:09', NULL, 'offen', 'Nein'),
(193, 32, '2025-07-02 18:37:51', '2025-07-12', 'offen', 'Nein'),
(194, 32, '2025-07-02 20:38:05', '2025-07-15', 'offen', 'Nein');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Farbe`
--

CREATE TABLE `Farbe` (
  `farbe_id` int(11) NOT NULL,
  `farbe_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Farbe`
--

INSERT INTO `Farbe` (`farbe_id`, `farbe_name`) VALUES
(1, 'Weiß'),
(2, 'Schwarz'),
(3, 'Mix');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kunde`
--

CREATE TABLE `Kunde` (
  `kunde_id` int(11) NOT NULL,
  `nachname` varchar(100) DEFAULT NULL,
  `vorname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passwort` varchar(255) DEFAULT NULL,
  `aktiv` tinyint(1) DEFAULT 0,
  `token` varchar(64) DEFAULT NULL,
  `ist_gesperrt` tinyint(1) DEFAULT 0,
  `ist_admin` tinyint(1) DEFAULT 0,
  `telefonnummer` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Kunde`
--

INSERT INTO `Kunde` (`kunde_id`, `nachname`, `vorname`, `email`, `passwort`, `aktiv`, `token`, `ist_gesperrt`, `ist_admin`, `telefonnummer`) VALUES
(1, 'kjhkj', 'zz', 'wiInf@jnkj', 'hbjh', 0, NULL, 0, 0, NULL),
(2, 'jnkjnjk', 'hhhh', 'wiInf@jjjnkj', 'jkll', 0, NULL, 0, 0, NULL),
(3, 'm', 'gh', 'wiInf@gmail', '$2y$10$J8qmmM8Ypeq42eP7Cy1RreMza38QK5MzT/XkMSdG8.r0/GMXwQtCC', 0, NULL, 0, 0, NULL),
(4, 'm', 'gh', 'probe@gmail.com', '$2y$10$nEf5LF0T7J1SXePkHTTi..ZJOkQP6aV0vSBqnKjZv8kT47fjKCT8e', 0, NULL, 0, 0, NULL),
(5, 'Tagmouti', 'Zineb', 'zinebtagmouti7@gmail.com', '$2y$10$9gOX6pi1F6IVkCeU2WYKROhK5QGWNtEa0PRZ3CX05zHtZZb1yl3Na', 0, NULL, 0, 0, NULL),
(7, 'tt', 'zz', 'zineb@gmail.com', '$2y$10$qtB99C/e.M1hJiOL0BtNfeFEbjAK6R0bv3oOJ/FVL793nnXtzFVaW', 0, NULL, 0, 0, NULL),
(8, 'Brockmann', 'Frank', 'frank.brockmann@hs-bochum.de', '$2y$10$Dy/l4ldZOBPjHnAB/x4dPeNiO90mECvl6tmfaG/aHdgvcYuZe6HPy', 0, NULL, 0, 0, NULL),
(9, 'Sche', 'Christoph', 'mtu_2qfg47wzxnqi@byom.de', '$2y$10$4/QHJAenjI4Ul.l6sIcwa.zCUaUqIXskIubrDQgCwDLBwvRzYAu.u', 0, NULL, 0, 0, NULL),
(11, 'Barr', 'Riham', 'riham.barrak@stud.hs-bochum.de', '$2y$10$SOVZBv05Bd1it7ZtENfy5OfGGc/K4VWg66gZ5xArAHDerm/AI7Ap2', 0, NULL, 0, 0, NULL),
(12, 'Barrak', 'Riham', 'wiInfriham.barrak@stud.hs-bochum.de', '$2y$10$RV2mbB/fAcC5ysUZA2fCXu1PYtV1MvHOgGuEPuCn4Ac8yHrBcxqZO', 0, NULL, 0, 0, NULL),
(13, 'Mhanayeh', 'Ghena', 'probe2@gmail.com', '$2y$10$TNIJvbIXgBUbukj.n1n8se8oHQKdxSplZLYb8gPTmd1IiXShBVMDa', 0, NULL, 0, 0, NULL),
(16, 'Mhanayeh', 'Ghena', 'probe3@gmail.com', '$2y$10$P54SgyHeWqhN1rU8ge0B6.L3Xm5rQa/HabSDcUJWDrBknBhnNgr/C', 0, NULL, 1, 0, NULL),
(18, 'Mhanayeh', 'Ghena', 'Probe4@gmail.com', '$2y$10$EpNSQqlvDEnkmwozEkhNze6u2CoR/57oWYKHGyE7ml0eGBnDI0d/2', 0, NULL, 1, 0, NULL),
(19, 'wef', 'wwedw', 'probe5@gmail.com', '$2y$10$jYUTYA8fkHLmZRqbCJfDLe/Z.hhvYgZM8y1BUcqjDRmH/Qz2wrxrG', 0, NULL, 1, 0, NULL),
(25, 'asd', 'asd', 'probev5@gmail.com', '$2y$10$zpeHPtvnYHExNrtoEJFGqeNePiRX5/T2qrRisAM5FlbLUyQjm5A/e', 1, NULL, 0, 0, NULL),
(29, 'Mhanayeh', 'Ghena', 'ghena@gmail.com', '$2y$10$jNoqlJErV0O53M9IQNAleOAJr9VeV0jDXgFEMHiDh06hkkD05eAu.', 1, NULL, 0, 0, NULL),
(30, 'El hitachi', 'Reda', 'reda@gmail.com', '$2y$10$GCnYOrv0wtl6abXoLO2GP.dyyyhFW2i/Fw8aLUqzcN/LeE95FDlf6', 1, NULL, 0, 0, NULL),
(31, 'Brockmann', 'Frank', 'fb1@byom.de', '$2y$10$Vhh8hW.uposRJ4VfsOG6HeEqT45.49D/FrhbS4F7rGOVZoKXSLGwG', 1, NULL, 0, 0, NULL),
(32, 'EL  Hitachi', 'Reda', 'redaelhitachi@gmail.com', '$2y$10$h2kDPmD3Wt0txvP4VNu8xujxwb1r2bGwNG83OxKimgTZwVOw./yhG', 1, NULL, 0, 0, '01234564466'),
(35, 'wefw', 'df', 'ghm@gmail.com', '$2y$10$E1NjHUnRkKIFH5xnVrObLO8dCY7ArkX05duP9FxnBOUhA5zpIaMnu', 1, NULL, 0, 0, NULL),
(36, 'sdf', 'sdf', 'sdf@123.de', '$2y$10$hQqLkvKydbwqTSYiewudue0mSbUgT0nHPUqnJWNAHKMHmYEqkMmkO', 1, NULL, 0, 0, NULL),
(37, 'FB', 'FB', 'fb@byom.de', '$2y$10$dSITTgrRBCT7V.ph7cgEY.8lrFQex2bf9sDpmNl07PxMvoO9j0iC2', 1, NULL, 0, 0, NULL),
(38, 'zz', 'rr', 'zz@gamil.com', '$2y$10$qJzU06rgWRCVBeBYdv90beZV01zLjV3nyNRXQfoml/RCJK3nlgdZO', 1, NULL, 0, 0, NULL),
(39, 'Übersicht', 'Admin', 'Admin@gmail.com', '$2y$10$ZP7POeeEMduVGgUTClg.8uTx9x86.0dEa7eeff9zBCb.Y3L3AMPWq', 1, NULL, 0, 1, NULL),
(40, 'Barra', 'Riham', 'riham.del2003@gmail.com', '$2y$10$T6ltKsW4m3YvG6XlTiRUru8twEG1zuk8TMq1TKAlnd7qs/6wkj0Wu', 1, NULL, 0, 0, '5555555555'),
(41, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, NULL),
(42, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, NULL),
(43, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, NULL),
(44, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, NULL),
(45, 'B1', 'R1', 'r1.del@gmail.com', '$2y$10$HMQnhTl814B/IpwI37qkO.niKvh9NmgnIuqHx20rYFfmB3hWuls4y', 0, '01f729f7e49be76e22e06b34735ce28f026ccd9b180fc3b6246f2e87a7bb95a1', 0, 0, '0124587541'),
(46, 'barrak1', 'riham1', 'riham1@gmail.com', '$2y$10$QRytPSDP1VurBrp795J.oOuLouQEbIXPYciKNbdDv/GA6oDkN7DaW', 1, NULL, 0, 0, '544444444444'),
(47, 'B', 'Rim', 'rim.del@gmail.com', '$2y$10$.scj8P3LHhaEfVKI7q7JAOVFcz6k6EVIrb.ghC1JeY0H/tMmFeUCG', 1, NULL, 0, 0, '23345567587'),
(48, 'mh', 'gh', 'ghmh@gmail.com', '$2y$10$96KtjUZO8UZ9EaaiPpYrQeCBK1No8RWfhMMbiknqsYgVoOcNWMeo.', 1, NULL, 0, 0, '123'),
(49, 'Probe2', 'Probe1', 'probe1@gmail.com', '$2y$10$akVRWBUJog0A9feVRmw3z.RuzGYRii9/ucVpxqvYSoReQ4C0BmNmS', 1, NULL, 0, 0, '54465321646545'),
(50, 'BarrakProbe1', 'RihamProbe1', 'Rihamprobe1@gmail.com', '$2y$10$b7gD7TDTLA/Qby7tvPSkpOftDJIPvvbX5LhVP70kfgY6uDSfZgAwO', 1, NULL, 0, 0, '124578945'),
(51, 'BarrakProbe2', 'RihamProbe2', 'Rihamprobe2@gmail.com', '$2y$10$pXv7mjIn2wV4rNIc/a0FU.CoSmx3Le/t4xEsrTP0gV8ymEJSM3OVO', 1, NULL, 0, 0, '45789654125'),
(52, 'gg', 'gg', 'gg@gmail.com', '$2y$10$fhs4oeCXUhWUthydlsoquuSKl03Zwu5.VW5rKWHWPTpvyBrS5mTEa', 1, NULL, 0, 0, '234786524'),
(53, 'Probe12', 'Iksy', 'iksy@gmail.com', '$2y$10$Q2nuJzTuDyMbHrRrUAGom.3rdPIinOKtZuuaKJT3Lta7M0z9Y5N7e', 1, NULL, 0, 0, '345474677234');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Moebel`
--

CREATE TABLE `Moebel` (
  `moebel_id` int(11) NOT NULL,
  `moebel_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Moebel`
--

INSERT INTO `Moebel` (`moebel_id`, `moebel_name`) VALUES
(1, 'Matratze'),
(2, 'Sessel'),
(3, 'Gardinen'),
(4, 'Ecksofa'),
(5, '2-Sitzer Sofa'),
(6, '3-Sitzer Sofa');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Service`
--

CREATE TABLE `Service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `einheit` varchar(20) DEFAULT NULL,
  `preis` decimal(10,2) DEFAULT NULL,
  `buegeln_aufschlag` decimal(10,2) DEFAULT 0.00,
  `lieferkosten` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Service`
--

INSERT INTO `Service` (`service_id`, `service_name`, `einheit`, `preis`, `buegeln_aufschlag`, `lieferkosten`) VALUES
(1, 'Kleidung', 'kg', 2.50, 1.00, 3.50);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Services`
--

CREATE TABLE `Services` (
  `service_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Services`
--

INSERT INTO `Services` (`service_id`, `name`) VALUES
(1, 'Kleidung'),
(2, 'Möbel'),
(3, 'Teppich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Termin`
--

CREATE TABLE `Termin` (
  `termin_id` int(11) NOT NULL,
  `kunde_id` int(11) NOT NULL,
  `bestellung_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `uhrzeit` enum('09:00','16:00') NOT NULL,
  `status` enum('reserviert','frei') DEFAULT 'reserviert',
  `erstellt_am` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Daten für Tabelle `Termin`
--

INSERT INTO `Termin` (`termin_id`, `kunde_id`, `bestellung_id`, `datum`, `uhrzeit`, `status`, `erstellt_am`) VALUES
(1, 32, 135, '2025-06-29', '09:00', 'frei', '2025-06-28 15:27:32'),
(2, 38, 136, '2025-06-29', '16:00', 'frei', '2025-06-28 15:30:24'),
(3, 32, 137, '2025-06-30', '09:00', 'reserviert', '2025-06-28 16:22:40'),
(4, 32, 138, '2025-06-30', '16:00', 'reserviert', '2025-06-28 16:24:28'),
(5, 32, 139, '2025-07-01', '09:00', 'reserviert', '2025-06-28 16:42:23'),
(6, 32, 140, '2025-07-03', '09:00', 'reserviert', '2025-06-28 16:52:46'),
(7, 32, 141, '2025-07-03', '09:00', 'reserviert', '2025-06-28 16:53:45'),
(8, 32, 142, '2025-07-02', '09:00', 'reserviert', '2025-06-28 17:04:49'),
(9, 32, 143, '2025-07-02', '09:00', 'reserviert', '2025-06-28 17:05:58'),
(10, 32, 144, '2025-06-20', '16:00', 'reserviert', '2025-06-28 17:55:20'),
(11, 32, 149, '2025-07-05', '09:00', 'reserviert', '2025-06-29 00:12:19'),
(12, 32, 154, '2025-07-05', '16:00', 'reserviert', '2025-06-29 00:35:08'),
(13, 32, 159, '2025-06-19', '09:00', 'reserviert', '2025-06-29 01:19:00'),
(14, 29, 160, '2025-07-19', '16:00', 'reserviert', '2025-06-29 14:09:57'),
(15, 9, 161, '2005-05-05', '09:00', 'reserviert', '2025-06-30 11:55:15'),
(16, 9, 162, '2005-05-05', '09:00', 'reserviert', '2025-06-30 11:57:38'),
(17, 40, 167, '2025-07-11', '09:00', 'reserviert', '2025-07-01 10:58:11'),
(18, 49, 168, '2025-07-14', '09:00', 'reserviert', '2025-07-01 13:16:12'),
(19, 32, 173, '2025-07-24', '09:00', 'reserviert', '2025-07-01 21:10:48'),
(20, 32, 186, '2025-07-04', '09:00', 'reserviert', '2025-07-02 00:14:28'),
(21, 32, 187, '2025-07-08', '09:00', 'reserviert', '2025-07-02 00:33:14'),
(22, 53, 189, '2025-07-15', '09:00', 'reserviert', '2025-07-02 11:28:52'),
(23, 32, 194, '2025-07-02', '16:00', 'reserviert', '2025-07-02 20:38:05');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Adresse`
--
ALTER TABLE `Adresse`
  ADD PRIMARY KEY (`adresse_id`),
  ADD KEY `kunde_id` (`kunde_id`) USING BTREE;

--
-- Indizes für die Tabelle `Bestellpositionen`
--
ALTER TABLE `Bestellpositionen`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `bestellung_id` (`bestellung_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indizes für die Tabelle `Bestellungen`
--
ALTER TABLE `Bestellungen`
  ADD PRIMARY KEY (`bestellung_id`),
  ADD KEY `kunde_id` (`kunde_id`);

--
-- Indizes für die Tabelle `Farbe`
--
ALTER TABLE `Farbe`
  ADD PRIMARY KEY (`farbe_id`);

--
-- Indizes für die Tabelle `Kunde`
--
ALTER TABLE `Kunde`
  ADD PRIMARY KEY (`kunde_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `Moebel`
--
ALTER TABLE `Moebel`
  ADD PRIMARY KEY (`moebel_id`);

--
-- Indizes für die Tabelle `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indizes für die Tabelle `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indizes für die Tabelle `Termin`
--
ALTER TABLE `Termin`
  ADD PRIMARY KEY (`termin_id`),
  ADD KEY `kunde_id` (`kunde_id`),
  ADD KEY `bestellung_id` (`bestellung_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Adresse`
--
ALTER TABLE `Adresse`
  MODIFY `adresse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `Bestellpositionen`
--
ALTER TABLE `Bestellpositionen`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT für Tabelle `Bestellungen`
--
ALTER TABLE `Bestellungen`
  MODIFY `bestellung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT für Tabelle `Farbe`
--
ALTER TABLE `Farbe`
  MODIFY `farbe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `Kunde`
--
ALTER TABLE `Kunde`
  MODIFY `kunde_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT für Tabelle `Moebel`
--
ALTER TABLE `Moebel`
  MODIFY `moebel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `Service`
--
ALTER TABLE `Service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `Services`
--
ALTER TABLE `Services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `Termin`
--
ALTER TABLE `Termin`
  MODIFY `termin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Adresse`
--
ALTER TABLE `Adresse`
  ADD CONSTRAINT `Adresse_ibfk_1` FOREIGN KEY (`kunde_id`) REFERENCES `Kunde` (`kunde_id`);

--
-- Constraints der Tabelle `Bestellpositionen`
--
ALTER TABLE `Bestellpositionen`
  ADD CONSTRAINT `Bestellpositionen_ibfk_1` FOREIGN KEY (`bestellung_id`) REFERENCES `Bestellungen` (`bestellung_id`),
  ADD CONSTRAINT `Bestellpositionen_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `Services` (`service_id`);

--
-- Constraints der Tabelle `Bestellungen`
--
ALTER TABLE `Bestellungen`
  ADD CONSTRAINT `Bestellungen_ibfk_1` FOREIGN KEY (`kunde_id`) REFERENCES `Kunde` (`kunde_id`);

--
-- Constraints der Tabelle `Termin`
--
ALTER TABLE `Termin`
  ADD CONSTRAINT `Termin_ibfk_1` FOREIGN KEY (`kunde_id`) REFERENCES `Kunde` (`kunde_id`),
  ADD CONSTRAINT `Termin_ibfk_2` FOREIGN KEY (`bestellung_id`) REFERENCES `Bestellungen` (`bestellung_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
