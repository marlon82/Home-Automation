-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jul 2013 um 09:03
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cd_home_automation`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `devicetypes`
--

CREATE TABLE IF NOT EXISTS `devicetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` varchar(255) DEFAULT NULL,
  `devtype` varchar(255) DEFAULT NULL,
  `devtypename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Daten für Tabelle `devicetypes`
--

INSERT INTO `devicetypes` (`id`, `device`, `devtype`, `devtypename`) VALUES
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
(12, 'device', 'Trockner', 'Trocker'),
(14, 'device', 'Waschmaschine', 'Waschmaschine'),
(15, 'sensor', 'temperatur', 'Temperatur'),
(16, 'sensor', 'luftfeuchtigkeit', 'Luftfeuchtigkeit'),
(17, 'device', 'switch', 'Switch'),
(18, 'device', 'router', 'Router'),
(19, 'device', 'samsungtv', 'Samsung TV'),
(20, 'device', 'samsungbluray', 'Samsung 3D Blu-Ray Player'),
(21, 'device', 'onkyoavrec', 'Onkyo AV Receiver'),
(22, 'device', 'enigma2', 'Dreambox (enigma2)'),
(23, 'sensor', 'energiezaehler', 'Energiezaehler'),
(24, 'aktor', 'infrarot', 'Infrarot');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
