-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 23, 2018 alle 19:39
-- Versione del server: 10.1.34-MariaDB
-- Versione PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spese`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `pagamenti`
--

CREATE TABLE `pagamenti` (
  `idPagamento` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `budget` double NOT NULL,
  `numTransazioni` int(11) NOT NULL,
  `imgPath` varchar(255) NOT NULL,
  `red` int(3) NOT NULL,
  `green` int(3) NOT NULL,
  `blue` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pagamenti`
--

INSERT INTO `pagamenti` (`idPagamento`, `tipo`, `budget`, `numTransazioni`, `imgPath`, `red`, `green`, `blue`) VALUES
(1, 'Bancomat', 599, 1, 'assets\\img\\pagamenti\\bancomat.svg', 145, 186, 225),
(2, 'PostePay', 0, 0, 'assets\\img\\pagamenti\\postepay.svg', 249, 234, 176),
(3, 'Prepagata', 0, 0, 'assets\\img\\pagamenti\\prepagata_banca.svg', 73, 134, 121),
(4, 'Contanti', 45.5, 2, 'assets\\img\\pagamenti\\contanti.svg', 59, 181, 74);

-- --------------------------------------------------------

--
-- Struttura della tabella `transazioni`
--

CREATE TABLE `transazioni` (
  `idTransazione` int(11) NOT NULL,
  `cifra` double NOT NULL,
  `data` date NOT NULL,
  `causale` text NOT NULL,
  `titolo` varchar(50) NOT NULL,
  `idPagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `transazioni`
--

INSERT INTO `transazioni` (`idTransazione`, `cifra`, `data`, `causale`, `titolo`, `idPagamento`) VALUES
(26, -20, '2018-07-13', 'Primo prelievo bancomat atm', 'Primo prelievo Bancomat', 1),
(29, -5, '2018-07-14', 'Pizza da pit', 'Pizza d\'asporto', 4),
(30, 10, '2018-07-21', 'Mancia del sabato', 'Mancia', 4);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `pagamenti`
--
ALTER TABLE `pagamenti`
  ADD PRIMARY KEY (`idPagamento`);

--
-- Indici per le tabelle `transazioni`
--
ALTER TABLE `transazioni`
  ADD PRIMARY KEY (`idTransazione`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `pagamenti`
--
ALTER TABLE `pagamenti`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `transazioni`
--
ALTER TABLE `transazioni`
  MODIFY `idTransazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
