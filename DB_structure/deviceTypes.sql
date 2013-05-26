-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 26. Mai 2013 um 16:57
-- Server Version: 5.5.28
-- PHP-Version: 5.4.4-14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cd_home_automation`
--

--
-- Daten für Tabelle `deviceTypes`
--

INSERT INTO `deviceTypes` (`id`, `device`, `devtype`, `devtypename`) VALUES
(1, 'aktor', 'schalter', 'Schalter'),
(2, 'aktor', 'rolladen', 'Rolladen'),
(3, 'aktor', 'dimmer', 'Dimmer'),
(4, 'aktor', 'virtuell', 'Virtuell'),
(5, 'device', 'Fernseher', 'Fernseher'),
(6, 'device', 'Gefrierschrank', 'Gefrierschrank'),
(7, 'device', 'Kaffeemaschine', 'Kaffeemaschine'),
(8, 'device', 'Kühlschrank', 'Kühlschrank'),
(9, 'device', 'Leuchte', 'Leuchte'),
(10, 'device', 'Pumpe', 'Pumpe'),
(11, 'device', 'Receiver', 'Receiver'),
(12, 'device', 'Trocker', 'Trocker'),
(14, 'device', 'Waschmaschine', 'Waschmaschine'),
(15, 'sensor', 'temperatur', 'Temperatur'),
(16, 'sensor', 'luftfeuchtigkeit', 'Luftfeuchtigkeit');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
