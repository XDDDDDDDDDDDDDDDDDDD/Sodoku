-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Mai 2017 um 11:13
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
  `durchZeitLeicht` double DEFAULT NULL,
  `durchZeitMittel` double DEFAULT NULL,
  `durchZeitSchwer` double DEFAULT NULL,
  `durchZeitExtrem` double DEFAULT NULL,
  `durchZeitAllgemein` double DEFAULT NULL,
  `Elo` int(5) NOT NULL DEFAULT '1000',
  `DuelleGew` int(6) DEFAULT '0',
  `DuelleGes` int(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

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
  MODIFY `NutzerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT für Tabelle `spiele`
--
ALTER TABLE `spiele`
  MODIFY `SpielerID` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
