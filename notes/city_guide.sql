-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jun 2015 um 18:52
-- Server Version: 5.6.17
-- PHP-Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `city_guide`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guide`
--

CREATE TABLE IF NOT EXISTS `guide` (
  `GuideID` int(11) NOT NULL AUTO_INCREMENT,
  `Titel` varchar(50) DEFAULT NULL,
  `Streetname` varchar(50) DEFAULT NULL,
  `Bus_stop` varchar(30) DEFAULT NULL,
  `Google_Maps` varchar(100) DEFAULT NULL,
  `Abstract` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`GuideID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `guide`
--

INSERT INTO `guide` (`GuideID`, `Titel`, `Streetname`, `Bus_stop`, `Google_Maps`, `Abstract`) VALUES
(1, 'Little Tokyo', 'Immermann Str.', 'Immermann Str.', 'not', 'Die Immermannstraße ist die Hauptschlagader der japanischen Community in Düsseldorf. \r\nHier befinden sich nicht nur das Japan-Center mit dem Generalkonsulat und Nikko-Hotel. \r\nAuf der Immermannstraße und ihren Seitenstraßen befinden sich auch zahlreiche \r'),
(2, 'Königsallee', 'Königsallee', 'Steinstrasse, Königsallee', 'not', 'Die Königsallee, liebevoll kurz "KÖ" genannt, \r\nist anregendes Shoppingparadies und aufregende Ausgehmeile in einem, \r\nLaufsteg der Modemutigen und Rastplatz für Genießer. \r\nDie unnachahmliche Kombination aus schwelgerischem Luxus und rheinischer \r\nLebens'),
(3, 'Altstadt', 'Keine genauen Angaben möglich', 'Heinrich-Heine Allee', 'not', 'Ein wunderschöner Platz im Herzen der Altstadt. \r\nEin Highlight ist die "Düsseldorfer Treppe", \r\neine Art Panorama-Tribüne mit Blick auf den Rhein. \r\nHier gibt es häufig Street-Art, Straßenmusiker, Akrobaten etc. zu bestaunen. \r\nJede Menge Gastronomie gib'),
(4, 'Burgplatz', 'Heinrich-Heine Allee', 'Heinrich-Heine Allee', 'not', 'Der Burgplatz ist so etwas wie die gute Stube und ein Dreh- und Angelpunkt der Stadt. \r\nHier ist immer etwas los.Im Frühsommer die Jazzralley, \r\nOpen-Air-Kino, um den 14. Juni erobern französische Oldtimer den Platz am Frankreich-Tag, \r\nAltstadt-Herbst, J'),
(5, 'Rheinuferpromenade', '-', '-', 'not', 'Die Rheinuferpromenade verbindet die traditionsreiche Altstadt mit dem modernen \r\nMedienHafen und wird gesäumt von Cafés und Bars. Von hier aus lassen sich die vorbei \r\nziehenden Rheinschiffe entspannt beobachten. '),
(6, 'Hauptbahnhof', '-', 'Düsseldorf Hbf', 'not', 'Der Düsseldorfer Düsseldorfer gehört mit ca. 250.000 Reisenden pro Tag \r\nzur Top Ten der meistfrequentierten Bahnhöfe Deutschlands. \r\nMan kommt schnell mit der Bahn zum jeden Ort\r\nDüsseldorfs.'),
(7, 'Hofgarten', '-', 'Janwellenplatz', 'not', 'Die grüne Lunge mitten in der dichtbebauten City. \r\nWegen seiner Vielfältigkeit ist der Hofgarten ein beliebtes Ziel für einen \r\nerholsamen Spaziergang. Die Vielfältigkeit verdankt der Park den unterschiedlichen \r\nAuffassungen über Gartenbaukunst, die in '),
(8, 'Flughafen', '-', 'Flughafen: Terminal A,B,C', 'not', 'Der Düsseldorf Airport ist der drittgrößte Flughafen Deutschlands und wichtigste \r\ninternationale Drehkreuz des Landes Nordrhein-Westfalen.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stichwort`
--

CREATE TABLE IF NOT EXISTS `stichwort` (
  `StichwortID` int(11) NOT NULL AUTO_INCREMENT,
  `Keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`StichwortID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Daten für Tabelle `stichwort`
--

INSERT INTO `stichwort` (`StichwortID`, `Keywords`) VALUES
(1, 'Rheinuferpromenade'),
(2, 'Altstadt'),
(3, 'Medienhafen'),
(4, 'Caffees'),
(5, 'Bars'),
(6, 'Rheinschiffe'),
(7, 'Bahn'),
(8, 'Zug'),
(9, 'Hofgarten'),
(10, 'Park'),
(11, 'Airport'),
(12, 'Flughafen'),
(13, 'Burgplatz'),
(14, 'Angelpunkt'),
(15, 'Jazz-Ralley'),
(16, 'Panorama'),
(17, 'Rhein'),
(18, 'Street-Art'),
(19, 'Königsallee'),
(20, 'Shopping'),
(21, 'Luxus'),
(22, 'Japan-Center'),
(23, 'Immermannstraße'),
(24, 'Generalkonsultat'),
(25, 'Restaurants'),
(26, 'Gastronomie');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `suche`
--

CREATE TABLE IF NOT EXISTS `suche` (
  `GuideID` int(11) NOT NULL,
  `StichwortID` int(11) NOT NULL,
  PRIMARY KEY (`StichwortID`,`GuideID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `suche`
--

INSERT INTO `suche` (`GuideID`, `StichwortID`) VALUES
(5, 1),
(3, 2),
(5, 3),
(3, 4),
(5, 4),
(3, 5),
(5, 5),
(5, 6),
(6, 7),
(6, 8),
(7, 9),
(7, 10),
(8, 11),
(8, 12),
(4, 13),
(4, 14),
(4, 15),
(3, 16),
(5, 16),
(3, 17),
(5, 17),
(3, 18),
(2, 19),
(2, 20),
(2, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(3, 25),
(1, 26),
(3, 26),
(5, 26);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
