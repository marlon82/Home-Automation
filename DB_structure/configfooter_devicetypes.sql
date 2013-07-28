-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 28. Jul 2013 um 15:40
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `configFooter`
--

CREATE TABLE IF NOT EXISTS `configFooter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `visible` varchar(3) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `codename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `configFooter`
--

INSERT INTO `configFooter` (`id`, `name`, `visible`, `sortOrder`, `icon`, `codename`) VALUES
(1, 'Timer', 'Yes', 7, 'watch', 'timer'),
(2, 'Gruppen', 'Yes', 6, 'group', 'group'),
(3, 'Multimedia', 'No', 3, 'tv', 'multimedia'),
(4, 'Sensoren', 'No', 8, 'sensor', 'sensoren'),
(5, 'Dreambox', 'No', 1, 'tv', 'dreambox'),
(6, 'Einstellungen', 'Yes', 9, 'settings', 'settings'),
(7, 'Raspberry', 'Yes', 5, 'raspberry', 'raspberry'),
(8, 'Dashboard', 'Yes', 2, 'dashboard1', 'dashboard'),
(9, 'Räume', 'Yes', 4, 'haus', 'room'),
(10, 'Log Viewer', 'Yes', 10, 'logviewer', 'logviewer'),
(11, 'Television', 'Yes', 11, 'television', 'television');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `deviceTypes`
--

CREATE TABLE IF NOT EXISTS `deviceTypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` varchar(255) DEFAULT NULL,
  `devtype` varchar(255) DEFAULT NULL,
  `devtypename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

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
