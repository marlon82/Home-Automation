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
-- Daten für Tabelle `config`
--

INSERT INTO `config` (`id`, `options`, `name`, `value`) VALUES
(1, 'XS1IP', 'XS1 IP Address', '192.168.1.242'),
(2, 'XS1User', 'XS1 Username', 'admin'),
(3, 'XS1Pass', 'XS1 Password', 'password'),
(4, 'DBIP', 'Dreambox IP', ''),
(5, 'SamsungIP', 'Samsung Receiver IP', '192.168.1.100'),
(6, 'TelevisionIP', 'Television IP', '192.168.1.101'),
(7, 'WetterWidget', ' Wetter Widget Link', '<iframe src="http://www.meteoblue.com/de_DE/wetter/vorhersage/widget/worth-am-rhein_de_163328?days=7&pictoicon=1&maxtemperature=1&mintemperature=1&windspeed=1&winddirection=1&uv=1&precipitation=1&precipitationprobability=1&v=2" height="327" width="376" frameborder="0" scrolling="NO"></iframe><div><a href="http://www.meteoblue.com/de_DE/wetter/vorhersage/woche/worth-am-rhein_de_163328?utm_source=weather_widget&utm_medium=linkus&utm_campaign=Weather%2BWidget" title="Wetter WÃ¶rth am Rhein - meteoblue" target="_blank">meteoblue.com</a></div>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
