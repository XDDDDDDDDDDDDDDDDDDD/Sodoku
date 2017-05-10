-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Mai 2017 um 12:02
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `sudoku`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `NutzerID` int(10) NOT NULL,
  `Nutzername` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `NutzerPW` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `EchterName` varchar(30) COLLATE utf8_german2_ci DEFAULT NULL,
  `Mail` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `Geschlecht` enum('nicht festgelegt','männlich','weiblich') COLLATE utf8_german2_ci NOT NULL DEFAULT 'nicht festgelegt',
  `RegistriertSeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SpielerID` int(10) NOT NULL,
  `Status` text COLLATE utf8_german2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`NutzerID`, `Nutzername`, `NutzerPW`, `EchterName`, `Mail`, `Geschlecht`, `RegistriertSeit`, `SpielerID`, `Status`) VALUES
(1, 'admin', '$2y$10$nK5t8tTeSDM/Z9KTqRo6fu7AfLpO.WxVRLjomr6wG5BBOyqNZbHuu', 'admin', 'admin@admin.de', 'männlich', '2017-05-10 07:59:45', 1, NULL),
(2, 'admin2', '$2y$10$bT1K5kmBKi0FoN7zHd39cOt08irMxT65qJYJTNXkVvGrGDqQ3ioQC', 'admin2', 'g@g.de', 'männlich', '2017-05-10 08:20:03', 2, NULL),
(3, 'fafa', '$2y$10$Zq7H8XieM1QCGgs9V8GG7eeG18mNCgnPqGEHElxb0ddxBIrnWyXMC', 'fafa', 'f@f.de', 'männlich', '2017-05-10 08:34:41', 3, NULL);

--
-- Trigger `nutzer`
--
DELIMITER $$
CREATE TRIGGER `spiele_erstellen` BEFORE INSERT ON `nutzer` FOR EACH ROW begin
      	SET @id=new.NutzerID;
        INSERT INTO spiele (SpielerID) VALUES (null);
        SET @id2=LAST_INSERT_ID();
        set new.SpielerID=@id2;

       
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiele`
--

CREATE TABLE `spiele` (
  `SpielerID` int(10) NOT NULL,
  `gewSpiele` int(6) DEFAULT '0',
  `gewSpieleLeicht` int(6) DEFAULT '0',
  `gewSpieleMittel` int(6) DEFAULT '0',
  `gewSpieleSchwer` int(6) DEFAULT '0',
  `gewSpieleExtrem` int(6) DEFAULT '0',
  `durchZeit` double DEFAULT '0',
  `durchZeitLeicht` double DEFAULT '0',
  `durchZeitMittel` double DEFAULT '0',
  `durchZeitSchwer` double DEFAULT '0',
  `durchZeitExtrem` double DEFAULT '0',
  `Elo` int(5) NOT NULL DEFAULT '1000',
  `DuelleGew` int(6) DEFAULT '0',
  `DuelleGes` int(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `spiele`
--

INSERT INTO `spiele` (`SpielerID`, `gewSpiele`, `gewSpieleLeicht`, `gewSpieleMittel`, `gewSpieleSchwer`, `gewSpieleExtrem`, `durchZeit`, `durchZeitLeicht`, `durchZeitMittel`, `durchZeitSchwer`, `durchZeitExtrem`, `Elo`, `DuelleGew`, `DuelleGes`) VALUES
(1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0),
(2, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0),
(3, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`NutzerID`);

--
-- Indizes für die Tabelle `spiele`
--
ALTER TABLE `spiele`
  ADD PRIMARY KEY (`SpielerID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `NutzerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `spiele`
--
ALTER TABLE `spiele`
  MODIFY `SpielerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
