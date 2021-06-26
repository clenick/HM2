-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 26, 2021 alle 18:37
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto`
--
CREATE DATABASE IF NOT EXISTS `progetto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `progetto`;

-- --------------------------------------------------------

--
-- Struttura della tabella `bambino`
--

DROP TABLE IF EXISTS `bambino`;
CREATE TABLE `bambino` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `Eta` int(11) DEFAULT NULL,
  `Indirizzo` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bambino`
--

INSERT INTO `bambino` (`Id`, `Nome`, `Cognome`, `Eta`, `Indirizzo`, `Username`, `Email`, `Password`, `created_at`, `updated_at`) VALUES
(21, 'dfdsg', 'gsdgds', 1, 'dfg', 'luca', 'email@gmail.com', '$2y$10$pAO9tDdxSf974j81iO.h5O6WyUc9Tr8CIs6J0vtACK9dUKYVvI.uO', '2021-06-12 21:00:59', '2021-06-12 21:02:05'),
(22, 'clara', 'grasso', 1, 'via', 'clara', 'email@gmail.com', '$2y$10$BHFtcl/TsQkP9TBspCVTfOO7DKaMKP2yrNNpRsmzV/5IFH0.C/k6a', '2021-06-12 21:00:59', '2021-06-12 21:02:05'),
(23, 'bambino', 'bambino', 1, 'via', 'user', 'email@gmail.com', '$2y$10$DlRm03Q2B8k0QJtAf5tlVOIIneAdMoW4jOEXcykeg/jNQYAjb.9by', '2021-06-12 21:00:59', '2021-06-12 21:02:05'),
(24, 'utente', 'utente', 1, 'via', 'utente', 'email', 'utente', '2021-06-12 21:00:59', '2021-06-12 21:02:05'),
(50, 'u', 'u', 1, 'u', 'u', 'email@gmail.com', 'Utente1234', '2021-06-21 13:50:27', '2021-06-21 13:50:27'),
(54, 'clelia', 'nicotra', 1, 'via', 'clelia', 'email@gmail.com', 'Clelia00', '2021-06-22 15:31:47', '2021-06-22 15:31:47'),
(55, 'b', 'r', 5, 'via', 'bruno', 'email@gmail.com', 'Bruno111', '2021-06-23 11:17:34', '2021-06-23 11:17:34'),
(56, 'alessio', 'm', 1, 'via', 'alessio', 'email@gmail.com', 'Alessio0000', '2021-06-25 13:53:49', '2021-06-25 13:53:49'),
(57, 'maria', 'l', 2, 'via', 'maria', 'email@gmail.com', 'Maria0000', '2021-06-26 05:16:07', '2021-06-26 05:16:07'),
(58, 'lidia', 'nic', 8, 'via', 'lidia', 'email@gmail.com', 'Lidia000', '2021-06-26 13:19:48', '2021-06-26 13:19:48');

-- --------------------------------------------------------

--
-- Struttura della tabella `canzone`
--

DROP TABLE IF EXISTS `canzone`;
CREATE TABLE `canzone` (
  `Codice` int(11) NOT NULL,
  `artista` varchar(255) DEFAULT NULL,
  `titolo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `playlist` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `canzone`
--

INSERT INTO `canzone` (`Codice`, `artista`, `titolo`, `url`, `playlist`, `created_at`, `updated_at`) VALUES
(27, 'Linkin Park', 'Runaway', 'https://www.last.fm/music/Linkin+Park/_/Runaway', 154, '2021-06-25 13:42:01', '2021-06-25 13:42:01'),
(29, 'Lady Gaga', 'Poker Face', 'https://www.last.fm/music/Lady+Gaga/_/Poker+Face', 155, '2021-06-25 15:53:51', '2021-06-25 15:53:51'),
(33, 'Linkin Park', 'Runaway', 'https://www.last.fm/music/Linkin+Park/_/Runaway', 160, '2021-06-26 06:43:05', '2021-06-26 06:43:05'),
(35, 'Arctic Monkeys', 'When the Sun Goes Down', 'https://www.last.fm/music/Arctic+Monkeys/_/When+the+Sun+Goes+Down', 154, '2021-06-26 07:29:50', '2021-06-26 07:29:50'),
(36, 'Linkin Park', 'Runaway', 'https://www.last.fm/music/Linkin+Park/_/Runaway', 164, '2021-06-26 11:36:02', '2021-06-26 11:36:02');

--
-- Trigger `canzone`
--
DROP TRIGGER IF EXISTS `aggiungi_canzone`;
DELIMITER $$
CREATE TRIGGER `aggiungi_canzone` AFTER INSERT ON `canzone` FOR EACH ROW begin 
if exists( select * from playlist where Id_numerico=new.playlist) then
update playlist
set Num_canzoni=Num_canzoni+1
where Id_numerico=new.playlist;
end if;
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `rimuovi_canzone`;
DELIMITER $$
CREATE TRIGGER `rimuovi_canzone` AFTER DELETE ON `canzone` FOR EACH ROW begin 
if exists( select * from playlist where Id_numerico=old.playlist) then
update playlist
set Num_canzoni=Num_canzoni-1
where Id_numerico=old.playlist;
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `giocattolo`
--

DROP TABLE IF EXISTS `giocattolo`;
CREATE TABLE `giocattolo` (
  `Codice` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Categoria` varchar(255) DEFAULT NULL,
  `Descrizione` varchar(255) DEFAULT NULL,
  `Immagine` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `giocattolo`
--

INSERT INTO `giocattolo` (`Codice`, `Nome`, `Categoria`, `Descrizione`, `Immagine`) VALUES
(65, 'Casetta', 'Costruzioni', 'Casetta colorata con ingresso e finestre, realizzata con materiali riciclabili.', 'img/gioco2.jpg'),
(66, 'Baby Yoda Lego', 'Costruzioni', 'Lego - Star Wars Baby Yoda modellino tratto dalla nuova serie The Mandalorian.', 'img/gioco1.jpg'),
(67, 'Robot', 'Scienza', 'NAO è un robot umanoide che si muove, riconosce persone e oggetti, ascolta e parla.', 'img/gioco3.jpg'),
(68, 'Bambolotto', 'Bambole', 'Bambola Nenuco dormi con me con baby monitor e con lettino a sponda da posizionare vicino al lettino.', 'img/gioco4.jpg'),
(69, 'Barbie', 'Bambole', 'Barbie aiuta i piccoli buongustai a divertirsi con la Cucina dei Sogni con luci, suoni, formine di cibi, plastilina in 5 colori e oltre 20 accessori.', 'img/gioco5.jpg'),
(70, 'Crea mania', 'Arte', 'Laboratorio di ceramica - Pottery Wheel, Laboratorio di Ceramica - Vasaio Elettrico per Modellare l\'Argilla.', 'img/gioco6.jpg'),
(71, 'Corpo umano', 'Scienza', 'Modellino corpo umano con parti smontabili per imparare l\'anatomia in modo sicuro e intelligente.', 'img/gioco7.jpg'),
(72, 'Biocosmesi', 'Scienza', 'Laboratorio di biocosmesi - E\' un vero laboratorio scientifico per creare una linea cosmetica bio completa.', 'img/gioco8.jpg'),
(73, 'Tavolozza acquarelli', 'Arte', 'Tavolozza da artista con 12 acquarelli e 1 pennello incluso.Con questo set potrai divertirti con i colori creando mille sfumature!', 'img/gioco10.jpg'),
(74, 'Creations', 'Arte', 'Set creativo che contiene tutto l’occorrente per creare i propri braccialetti personalizzati grazie alle perline, elastici e cordini colorati inclusi! ', 'img/gioco9.jpg'),
(75, 'FROZEN 2 ANNA', 'Bambole', 'L’epica avventura continua in Disney Frozen 2! Unisciti alla coraggiosa Anna nei panni della Regina di Arendelle. ', 'img/gioco11.jpg'),
(76, 'LEGO-Luigi ', 'Costruzioni', 'Questo set LEGO Super Mario contiene un personaggio LEGO Luigi che fornisce risposte espressive tramite uno schermo LCD e un altoparlante. ', 'img/gioco12.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `letterina`
--

DROP TABLE IF EXISTS `letterina`;
CREATE TABLE `letterina` (
  `Codice` int(11) NOT NULL,
  `Bambino` int(11) DEFAULT NULL,
  `Anno` year(4) DEFAULT NULL,
  `Testo` varchar(255) DEFAULT NULL,
  `Immagine` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `letterina`
--

INSERT INTO `letterina` (`Codice`, `Bambino`, `Anno`, `Testo`, `Immagine`, `created_at`, `updated_at`) VALUES
(58, 21, 2021, 'ciao', 'https://images.unsplash.com/photo-1513297887119-d46091b24bfa?crop=entropy', '2021-06-14 16:43:23', '2021-06-14 16:43:52'),
(59, 22, 2021, 'babbo natale', 'https://images.unsplash.com/photo-1482517967863-00e15c9b44be?crop=entropy', '2021-06-14 16:43:23', '2021-06-14 16:43:52'),
(61, 23, 2021, 'hey', 'https://images.unsplash.com/photo-1513297887119-d46091b24bfa?crop=entropy', '2021-06-14 16:43:23', '2021-06-14 16:43:52'),
(103, 50, 2021, 'ok', 'https://images.unsplash.com/photo-1604537372136-89b3dae196e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwyMjUyOTB8MXwxfHNlYXJjaHwxfHxjaHJpc3RtYXN8ZW58MXwwfHx8MTYyNDI5NTUyMw&ixlib=rb-1.2.1&q=80&w=400', '2021-06-21 19:08:25', '2021-06-21 19:08:25'),
(138, 56, 2021, 'ciao', 'https://images.unsplash.com/photo-1576919228236-a097c32a5cd4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwyMjUyOTB8MHwxfHNlYXJjaHw3fHxjaHJpc3RtYXN8ZW58MXwwfHx8MTYyNDU1ODUwNg&ixlib=rb-1.2.1&q=80&w=200', '2021-06-25 14:04:23', '2021-06-25 14:04:23'),
(141, 57, 2021, 'ciao', 'https://images.unsplash.com/photo-1512389142860-9c449e58a543?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwyMjUyOTB8MHwxfHNlYXJjaHwzfHxjaHJpc3RtYXN8ZW58MXwwfHx8MTYyNDY5MjMwOQ&ixlib=rb-1.2.1&q=80&w=200', '2021-06-26 05:32:01', '2021-06-26 05:32:01'),
(145, 55, 2021, 'ciao', 'https://images.unsplash.com/photo-1604537372136-89b3dae196e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwyMjUyOTB8MXwxfHNlYXJjaHwxfHxjaHJpc3RtYXN8ZW58MXwwfHx8MTYyNDY5MjMwOQ&ixlib=rb-1.2.1&q=80&w=200', '2021-06-26 11:35:06', '2021-06-26 11:35:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE `playlist` (
  `Id_numerico` int(11) NOT NULL,
  `Bambino` int(11) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Num_canzoni` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `playlist`
--

INSERT INTO `playlist` (`Id_numerico`, `Bambino`, `Nome`, `Num_canzoni`, `created_at`, `updated_at`) VALUES
(85, 23, 'prima', 0, '2021-06-14 16:41:09', '2021-06-14 16:42:38'),
(86, 21, 'prima', 0, '2021-06-14 16:41:09', '2021-06-14 16:42:38'),
(154, 24, 'nuova', 2, '2021-06-25 12:56:25', '2021-06-25 12:56:25'),
(155, 56, 'alessio', 1, '2021-06-25 14:06:25', '2021-06-25 14:06:25'),
(156, 56, 'prima', 0, '2021-06-25 14:17:05', '2021-06-25 14:17:05'),
(160, 57, 'seconda', 1, '2021-06-26 05:35:57', '2021-06-26 05:35:57'),
(164, 55, 'prima', 1, '2021-06-26 11:35:59', '2021-06-26 11:35:59'),
(165, 55, 'seconda', 0, '2021-06-26 11:36:21', '2021-06-26 11:36:21'),
(167, 58, 'prima', 0, '2021-06-26 13:30:50', '2021-06-26 13:30:50'),
(169, 58, 'clelia', 0, '2021-06-26 13:42:26', '2021-06-26 13:42:26');

-- --------------------------------------------------------

--
-- Struttura della tabella `richiesta`
--

DROP TABLE IF EXISTS `richiesta`;
CREATE TABLE `richiesta` (
  `Codice` int(11) NOT NULL,
  `Giocattolo` int(11) DEFAULT NULL,
  `Letterina` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `richiesta`
--

INSERT INTO `richiesta` (`Codice`, `Giocattolo`, `Letterina`, `created_at`, `updated_at`) VALUES
(16, 65, 58, '2021-06-16 17:38:08', '2021-06-16 17:38:37'),
(17, 65, 59, '2021-06-16 17:38:08', '2021-06-16 17:38:37'),
(18, 66, 61, '2021-06-16 17:38:08', '2021-06-16 17:38:37'),
(50, 65, 103, '2021-06-21 21:08:25', '2021-06-21 21:08:25'),
(101, 75, 138, '2021-06-25 16:04:24', '2021-06-25 16:04:24'),
(102, 76, 138, '2021-06-25 16:04:24', '2021-06-25 16:04:24'),
(103, 68, 141, '2021-06-26 07:32:01', '2021-06-26 07:32:01'),
(104, 69, 141, '2021-06-26 07:32:01', '2021-06-26 07:32:01'),
(111, 68, 145, '2021-06-26 13:35:07', '2021-06-26 13:35:07');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bambino`
--
ALTER TABLE `bambino`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `canzone`
--
ALTER TABLE `canzone`
  ADD PRIMARY KEY (`Codice`),
  ADD KEY `id_playlist` (`playlist`);

--
-- Indici per le tabelle `giocattolo`
--
ALTER TABLE `giocattolo`
  ADD PRIMARY KEY (`Codice`);

--
-- Indici per le tabelle `letterina`
--
ALTER TABLE `letterina`
  ADD PRIMARY KEY (`Codice`),
  ADD UNIQUE KEY `Bambino` (`Bambino`,`Anno`),
  ADD KEY `id_bambino` (`Bambino`);

--
-- Indici per le tabelle `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`Id_numerico`),
  ADD UNIQUE KEY `Bambino` (`Bambino`,`Id_numerico`),
  ADD KEY `idx_bamb` (`Bambino`);

--
-- Indici per le tabelle `richiesta`
--
ALTER TABLE `richiesta`
  ADD PRIMARY KEY (`Codice`),
  ADD UNIQUE KEY `Giocattolo` (`Giocattolo`,`Letterina`),
  ADD KEY `id_letterina` (`Letterina`),
  ADD KEY `id_gioca` (`Giocattolo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bambino`
--
ALTER TABLE `bambino`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT per la tabella `canzone`
--
ALTER TABLE `canzone`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT per la tabella `giocattolo`
--
ALTER TABLE `giocattolo`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT per la tabella `letterina`
--
ALTER TABLE `letterina`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT per la tabella `playlist`
--
ALTER TABLE `playlist`
  MODIFY `Id_numerico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT per la tabella `richiesta`
--
ALTER TABLE `richiesta`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `canzone`
--
ALTER TABLE `canzone`
  ADD CONSTRAINT `canzone_ibfk_1` FOREIGN KEY (`playlist`) REFERENCES `playlist` (`Id_numerico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `letterina`
--
ALTER TABLE `letterina`
  ADD CONSTRAINT `letterina_ibfk_1` FOREIGN KEY (`Bambino`) REFERENCES `bambino` (`Id`);

--
-- Limiti per la tabella `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`Bambino`) REFERENCES `bambino` (`Id`);

--
-- Limiti per la tabella `richiesta`
--
ALTER TABLE `richiesta`
  ADD CONSTRAINT `richiesta_ibfk_1` FOREIGN KEY (`Letterina`) REFERENCES `letterina` (`Codice`),
  ADD CONSTRAINT `richiesta_ibfk_2` FOREIGN KEY (`Giocattolo`) REFERENCES `giocattolo` (`Codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
