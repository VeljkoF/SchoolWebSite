-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2015 at 12:40 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE IF NOT EXISTS `anketa` (
  `id_ankete` int(11) NOT NULL,
  `pitanje` text COLLATE utf8_unicode_ci NOT NULL,
  `aktivna` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_ankete`, `pitanje`, `aktivna`) VALUES
(1, 'Ocenite sajt: ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anketa_odgovori`
--

CREATE TABLE IF NOT EXISTS `anketa_odgovori` (
  `id_odgovora` int(11) NOT NULL,
  `id_ankete` int(11) NOT NULL,
  `odgovor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `glasovi` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa_odgovori`
--

INSERT INTO `anketa_odgovori` (`id_odgovora`, `id_ankete`, `odgovor`, `glasovi`) VALUES
(1, 1, 'Ocena 1', 0),
(2, 1, 'Ocena 2', 1),
(3, 1, 'Ocena 3', 0),
(4, 1, 'Ocena 4', 2),
(5, 1, 'Ocena 5', 6);

-- --------------------------------------------------------

--
-- Table structure for table `fajlovi_titlovi`
--

CREATE TABLE IF NOT EXISTS `fajlovi_titlovi` (
  `id_titla` int(11) NOT NULL,
  `naziv` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `putanja_title` text COLLATE utf8_unicode_ci NOT NULL,
  `putanja_slike` text COLLATE utf8_unicode_ci NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `glasova` int(11) NOT NULL,
  `rezultat` float NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fajlovi_titlovi`
--

INSERT INTO `fajlovi_titlovi` (`id_titla`, `naziv`, `opis`, `putanja_title`, `putanja_slike`, `id_korisnik`, `glasova`, `rezultat`) VALUES
(45, 'Lucy', 'Lucy', '../titlovi/Lucy.2014.720p.BluRay.x264.YIFY.srt', '../titlovi/slike/Lucy_08f0c659.jpg', 9, 13, 49),
(46, 'Now You See Me', 'Now You See Me', '../titlovi/Now You See Me.lat.srt', '../titlovi/slike/Now-You-See-Me.jpg', 9, 6, 22),
(47, 'Pain Gain', 'Pain Gain', '../titlovi/Pain and Gain 2013.lat.srt', '../titlovi/slike/Pain-Gain-ca714a87.jpg', 9, 8, 33),
(48, 'Ted', 'Ted', '../titlovi/Ted.2012.BrRip.srt', '../titlovi/slike/Ted-4eeac50e.jpg', 9, 6, 26),
(49, 'The Curious Case of Benjamin Button', 'The Curious Case of Benjamin Button', '../titlovi/devise-tccobb.srt', '../titlovi/slike/The-Curious-Case-of-Benjamin-Button.jpg', 9, 18, 64);

-- --------------------------------------------------------

--
-- Table structure for table `meni_tabel`
--

CREATE TABLE IF NOT EXISTS `meni_tabel` (
  `id_stavke` int(11) NOT NULL,
  `naziv` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `putanja_pocetna` text COLLATE utf8_unicode_ci NOT NULL,
  `putanja_strane` text COLLATE utf8_unicode_ci NOT NULL,
  `roditelj` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni_tabel`
--

INSERT INTO `meni_tabel` (`id_stavke`, `naziv`, `putanja_pocetna`, `putanja_strane`, `roditelj`) VALUES
(1, 'POČETNA', 'index.php', '../index.php', 0),
(2, 'MOJI TITLOVI', 'strane/moji_titlovi.php', 'moji_titlovi.php', 0),
(3, 'Dodaj novi', 'strane/novi.php', 'novi.php', 2),
(4, 'Obriši', 'strane/obrisi.php', 'obrisi.php', 2),
(5, 'GALERIJA', 'strane/galerija.php', 'galerija.php', 0),
(6, 'AUTOR', 'strane/autor.php', 'autor.php', 0),
(7, 'DOKUMENTACIJA', 'doc/dokumetacija.pdf', '../doc/dokumentacija.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_korisnici`
--

CREATE TABLE IF NOT EXISTS `tabel_korisnici` (
  `id_korisnik` int(11) NOT NULL,
  `korisnicko_ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pol` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `putanja_slike` text COLLATE utf8_unicode_ci NOT NULL,
  `uloga` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tabel_korisnici`
--

INSERT INTO `tabel_korisnici` (`id_korisnik`, `korisnicko_ime`, `lozinka`, `email`, `ime`, `prezime`, `pol`, `putanja_slike`, `uloga`) VALUES
(1, 'Veljko88', '429cfa81e92b3aacdcba7fc20f260c', 'veljko.fridl@gmail.com', 'Veljko', 'Fridl', 'muski', '../slike/korisnici/1.png', 'admin'),
(9, 'Jovana88', '429cfa81e92b3aacdcba7fc20f260c', 'jovana@gmail.com', 'Jovana', 'Jovanovic', 'zenski', '../slike/korisnici/Penguins.jpg', 'korisnik'),
(10, 'milena1', '1b52a583020088fad8cc06fd0e6791', 'milena@gmail.com', 'Milena', 'Vesic', 'zenski', '../slike/korisnici/Desert.jpg', 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_ankete`);

--
-- Indexes for table `anketa_odgovori`
--
ALTER TABLE `anketa_odgovori`
  ADD PRIMARY KEY (`id_odgovora`);

--
-- Indexes for table `fajlovi_titlovi`
--
ALTER TABLE `fajlovi_titlovi`
  ADD PRIMARY KEY (`id_titla`);

--
-- Indexes for table `meni_tabel`
--
ALTER TABLE `meni_tabel`
  ADD PRIMARY KEY (`id_stavke`);

--
-- Indexes for table `tabel_korisnici`
--
ALTER TABLE `tabel_korisnici`
  ADD PRIMARY KEY (`id_korisnik`), ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `korisnicko_ime_2` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_ankete` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `anketa_odgovori`
--
ALTER TABLE `anketa_odgovori`
  MODIFY `id_odgovora` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fajlovi_titlovi`
--
ALTER TABLE `fajlovi_titlovi`
  MODIFY `id_titla` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `meni_tabel`
--
ALTER TABLE `meni_tabel`
  MODIFY `id_stavke` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tabel_korisnici`
--
ALTER TABLE `tabel_korisnici`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
