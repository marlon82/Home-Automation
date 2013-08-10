
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



--
-- Tabellenstruktur für Tabelle `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `options` varchar(255) DEFAULT NULL,
  `value` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `config`
--

INSERT INTO `config` (`id`, `options`, `value`) VALUES
(1, 'XS1IP', '192.168.1.242'),
(2, 'XS1User', ''),
(3, 'XS1Pass', ''),
(4, 'WetterWidget', ''),
(5, 'WetterWidgetAktiv', 'No'),
(6, 'ShowDayGraph', 'Yes'),
(7, 'ShowWeekGraph', 'Yes'),
(8, 'ShowMonthGraph', 'Yes'),
(9, 'GlobalEnergy', 'No'),
(10, 'EnergySensor', 'Energiesensor'),
(11, 'EnergyPrice', '0,25'),
(12, 'StandardRoom', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `configFooter`
--

INSERT INTO `configFooter` (`id`, `name`, `visible`, `sortOrder`, `icon`, `codename`) VALUES
(1, 'Timer', 'No', 7, 'watch', 'timer'),
(2, 'Gruppen', 'Yes', 6, 'group', 'group'),
(3, 'Multimedia', 'No', 4, 'tv', 'multimedia'),
(4, 'Sensoren', 'No', 8, 'sensor', 'sensoren'),
(5, 'Dreambox', 'Yes', 2, 'tv', 'dreambox'),
(6, 'Einstellungen', 'Yes', 10, 'settings', 'settings'),
(7, 'Raspberry', 'Yes', 5, 'raspberry', 'raspberry'),
(8, 'Dashboard', 'Yes', 1, 'dashboard1', 'dashboard'),
(9, 'Räume', 'Yes', 3, 'haus', 'room'),
(10, 'Log Viewer', 'Yes', 9, 'logviewer', 'logviewer'),
(11, 'Television', 'No', 11, 'television', 'television');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `devicemacro`
--

CREATE TABLE IF NOT EXISTS `devicemacro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DeviceID` int(11) DEFAULT NULL,
  `MacroID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` varchar(255) DEFAULT NULL,
  `tm` varchar(255) DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `function` varchar(30) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Tabellenstruktur für Tabelle `logVerbrauch`
--

CREATE TABLE IF NOT EXISTS `logVerbrauch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(5) DEFAULT NULL,
  `kwh` varchar(11) CHARACTER SET utf8 NOT NULL,
  `typ` varchar(20) CHARACTER SET utf8 NOT NULL,
  `zeitEin` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tvmacros`
--

CREATE TABLE IF NOT EXISTS `tvmacros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `isChannel` varchar(3) DEFAULT NULL,
  `ChannelIcon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

