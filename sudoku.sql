-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mai 2017 um 17:46
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.2

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
  `EchterName` varchar(30) COLLATE utf8_german2_ci DEFAULT NULL,
  `NutzerPW` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `Mail` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `verifiziert` tinyint(1) NOT NULL DEFAULT '0',
  `Geschlecht` enum('nicht festgelegt','männlich','weiblich') COLLATE utf8_german2_ci NOT NULL DEFAULT 'nicht festgelegt',
  `RegistriertSeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SpielerID` int(10) NOT NULL,
  `Status` text COLLATE utf8_german2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`NutzerID`, `Nutzername`, `EchterName`, `NutzerPW`, `Mail`, `verifiziert`, `Geschlecht`, `RegistriertSeit`, `SpielerID`, `Status`) VALUES
(1, 'admin', 'admin', '$2y$10$Jw1c/BqjfnHgbiTIvJ.bluddAno2BCwbgQMS0f2gFlmc3//I6oQ.C', 'admin@admin.de', 1, 'männlich', '2017-05-14 13:41:34', 1, '  BOSS'),
(2, 'peter', 'Peter', '$2y$10$2fQG6Ws7HbDUNKEI1i1XluUdBf0yB67Ps0wYhO7HHyNCs/DetGH06', 'peter@hsw.de', 1, 'männlich', '2017-05-14 14:35:30', 2, NULL),
(3, 'Hans', 'Hans', '$2y$10$yBNPfs6XI3FnE9MGWJWcC.tOJp0R7JnMoy.cm16krN3eShvY2qSWC', 'Hans@yo.de', 1, 'männlich', '2017-05-14 14:36:17', 3, NULL);

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
  `zeitLeicht` double DEFAULT '999999',
  `zeitMittel` double DEFAULT '999999',
  `zeitSchwer` double DEFAULT '999999',
  `zeitExtrem` double DEFAULT '999999',
  `Elo` int(5) NOT NULL DEFAULT '1000',
  `DuelleGew` int(6) DEFAULT '0',
  `DuelleGes` int(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `spiele`
--

INSERT INTO `spiele` (`SpielerID`, `gewSpiele`, `gewSpieleLeicht`, `gewSpieleMittel`, `gewSpieleSchwer`, `gewSpieleExtrem`, `zeitLeicht`, `zeitMittel`, `zeitSchwer`, `zeitExtrem`, `Elo`, `DuelleGew`, `DuelleGes`) VALUES
(1, 4, 1, 1, 1, 1, 9, 8, 8, 5, 1000, 0, 0),
(2, 4, 1, 1, 1, 1, 50, 50, 50, 50, 1000, 0, 0),
(3, 5, 2, 1, 1, 1, 30, 30, 30, 30, 1000, 0, 0);

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
