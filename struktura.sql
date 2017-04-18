-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Kwi 2017, 15:20
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `codeskills`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakty`
--

CREATE TABLE `kontakty` (
  `id_kontakt` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nazwisko` varchar(80) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(80) COLLATE utf8_polish_ci NOT NULL,
  `miejscowosc` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `nr_domu` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `nr_mieszkania` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod_pocztowy` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `poczta` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `mail` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kontakty`
--

INSERT INTO `kontakty` (`id_kontakt`, `id_user`, `nazwisko`, `imie`, `miejscowosc`, `ulica`, `nr_domu`, `nr_mieszkania`, `kod_pocztowy`, `poczta`, `mail`, `data`) VALUES
(5, 1, 'Nowak', 'Zbigniew', 'Krak&oacute;w', 'ulica', '46', '3a', '32-200', 'Krak&oacute;w', 'ww@poi.pl', '2017-04-03'),
(6, 1, 'Kania', 'Piotr', 'Miech&oacute;w', 'Sienkiewicza', '54', '7d', '32-200', 'Miech&oacute;w', 'eee@onet.pl', '2017-04-03'),
(8, 4, 'Kliszko', 'Milena', 'Å&oacute;dÅº ', 'Pacanowskiej', '7', '55', '91-439', 'Å&oacute;dÅº', 'milenka3@gmail.com', '2017-04-06'),
(9, 4, 'Stawowski', 'MichaÅ‚', 'GrudziÄ…dz', 'Wielkich ludzi', '3', '', '00-999', 'GrudziÄ…dz', 'staw@op.pl', '2017-04-07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `mail` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `aktywne` tinyint(1) NOT NULL,
  `security` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `data_dodania` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `mail`, `is_admin`, `aktywne`, `security`, `data_dodania`) VALUES
(1, 'pkania', 'a74d41be49e933836818f577170b75d957c3389f', 'we@wp.pl', 0, 1, '', '2017-03-30'),
(2, 'tomek', 'pkania', 'we1@wp.pl', 0, 1, '', '2017-03-30'),
(3, 'jasko', 'pkania', 'wew@wp.pl', 0, 1, '', '2017-03-30'),
(4, 'Artur', '1fae5d702eedd503cdfa7030d8112a0ccf097309', 'art.kacprza@gmail.com', 0, 1, '08991c9098c9f42c5fe3782b6d49d449228f97ee', '2017-04-04'),
(5, 'Artur2', '1fae5d702eedd503cdfa7030d8112a0ccf097309', 'art.kacprza2@gmail.com', 0, 1, '59811ad309423d3f2e7d9e3e369264defed35581', '2017-04-04'),
(6, 'Adam', '99319ce3bd80970c32078880a82d5a7f414434fa', 'adam@interia.pl', 0, 1, 'be02f43c27cf3c10a841e520b5da7c028f66af0f', '2017-04-06'),
(7, 'Adam4', '99319ce3bd80970c32078880a82d5a7f414434fa', 'adam4@interia.pl', 0, 1, '2e0c82fb0f1db397d6d5b96eb436761c0d04f916', '2017-04-06');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`id_kontakt`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  MODIFY `id_kontakt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
