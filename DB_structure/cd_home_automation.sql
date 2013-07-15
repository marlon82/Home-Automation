-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jul 2013 um 09:02
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
-- Tabellenstruktur für Tabelle `aktor`
--

CREATE TABLE IF NOT EXISTS `aktor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `iName` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `logging` int(1) DEFAULT NULL,
  `verbrauch` int(11) DEFAULT NULL,
  `iid` int(3) DEFAULT NULL,
  `zeitEin` int(11) NOT NULL,
  `zeitHeute` int(11) NOT NULL,
  `verbrauchWatt` decimal(5,2) DEFAULT NULL,
  `func1` int(3) DEFAULT NULL,
  `func1desc` varchar(255) DEFAULT NULL,
  `func2` int(3) DEFAULT NULL,
  `func2desc` varchar(255) DEFAULT NULL,
  `func3` int(3) DEFAULT NULL,
  `func3desc` varchar(255) DEFAULT NULL,
  `func4` int(3) DEFAULT NULL,
  `func4desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `options` varchar(255) DEFAULT NULL,
  `value` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `devicemacro`
--

CREATE TABLE IF NOT EXISTS `devicemacro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DeviceID` int(11) DEFAULT NULL,
  `MacroID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `script` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `logging` int(1) DEFAULT NULL,
  `verbrauch` int(11) DEFAULT NULL,
  `iid` int(3) DEFAULT NULL,
  `zeitEin` int(11) NOT NULL,
  `zeitHeute` int(11) NOT NULL,
  `verbrauchWatt` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groupaktor`
--

CREATE TABLE IF NOT EXISTS `groupaktor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aktorID` int(11) DEFAULT NULL,
  `deviceID` int(11) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  `aktorValue` int(11) DEFAULT NULL,
  `macroID` int(11) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logsensoren`
--

CREATE TABLE IF NOT EXISTS `logsensoren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(4) NOT NULL,
  `value` varchar(20) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `zeit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logverbrauch`
--

CREATE TABLE IF NOT EXISTS `logverbrauch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(5) DEFAULT NULL,
  `kwh` varchar(11) CHARACTER SET utf8 NOT NULL,
  `typ` varchar(20) CHARACTER SET utf8 NOT NULL,
  `zeitEin` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sensoren`
--

CREATE TABLE IF NOT EXISTS `sensoren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(4) NOT NULL,
  `iName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `room` int(5) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `hcType` varchar(255) NOT NULL,
  `value` varchar(20) NOT NULL,
  `zeit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `timer`
--

CREATE TABLE IF NOT EXISTS `timer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `aktor` varchar(255) DEFAULT NULL,
  `value` int(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `hour` int(2) DEFAULT NULL,
  `minute` int(2) DEFAULT NULL,
  `enabled` varchar(255) DEFAULT NULL,
  `Monday` varchar(255) DEFAULT NULL,
  `Tuesday` varchar(255) DEFAULT NULL,
  `Wednesday` varchar(255) DEFAULT NULL,
  `Thursday` varchar(255) DEFAULT NULL,
  `Friday` varchar(255) DEFAULT NULL,
  `Saturday` varchar(255) DEFAULT NULL,
  `Sunday` varchar(255) DEFAULT NULL,
  `isGroup` varchar(255) DEFAULT NULL,
  `suninfo` varchar(11) NOT NULL,
  `SensorID` int(11) DEFAULT NULL,
  `SensorValue` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tvmacros`
--

CREATE TABLE IF NOT EXISTS `tvmacros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
