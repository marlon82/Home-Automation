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
-- Tabellenstruktur für Tabelle `configfooter`
--

CREATE TABLE IF NOT EXISTS `configfooter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `visible` varchar(3) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `codename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `configfooter`
--

INSERT INTO `configfooter` (`id`, `name`, `visible`, `sortOrder`, `icon`, `codename`) VALUES
(1, 'Timer', 'Yes', 7, 'watch', 'timer'),
(2, 'Gruppen', 'Yes', 5, 'group', 'group'),
(3, 'Multimedia', 'Yes', 3, 'tv', 'multimedia'),
(4, 'Sensoren', 'No', 8, 'sensor', 'sensoren'),
(5, 'Dreambox', 'No', 1, 'tv', 'dreambox'),
(6, 'Einstellungen', 'Yes', 9, 'settings', 'settings'),
(7, 'Raspberry', 'No', 4, 'raspberry', 'raspberry'),
(8, 'Dashboard', 'Yes', 2, 'dashboard1', 'dashboard'),
(9, 'Räume', 'Yes', 6, 'haus', 'room');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
