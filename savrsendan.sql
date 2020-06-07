-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 03:53 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savrsendan`
--
CREATE DATABASE IF NOT EXISTS `savrsendan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `savrsendan`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(500) DEFAULT NULL,
  `adresa_grad` varchar(1000) DEFAULT NULL,
  `drzava` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime_prezime`, `adresa_grad`, `drzava`, `telefon`, `email`) VALUES
(1, 'Srdjan', 'ddada', 'affaf', '4242424', 'srdjan.nezic@gmail.com'),
(2, 'Srdjan', 'ddada', 'affaf', '4242424', 'srdjan.nezic@wollson.rs');

-- --------------------------------------------------------

--
-- Table structure for table `recepti`
--

CREATE TABLE `recepti` (
  `id` int(11) NOT NULL,
  `naziv` varchar(1000) NOT NULL,
  `sastojci` longtext,
  `slika` varchar(255) DEFAULT NULL,
  `vreme_pripreme` int(11) DEFAULT NULL,
  `vreme_trajanja` int(11) DEFAULT NULL,
  `nacin_pripreme` longtext,
  `proizvodi` longtext,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recepti`
--

INSERT INTO `recepti` (`id`, `naziv`, `sastojci`, `slika`, `vreme_pripreme`, `vreme_trajanja`, `nacin_pripreme`, `proizvodi`, `korisnik_id`) VALUES
(1, 'Test', '[\"tesss\",\"ff\",\"ccc\"]', '07-1-1.jpg', 2, NULL, '', 'on', 2),
(2, 'Test', '[\"tesss\",\"ff\",\"ccc\"]', '07-1-1.jpg', 2, NULL, '', 'on', 2),
(3, 'Test', '[\"tesss\",\"ff\",\"ccc\"]', '07-1-1.jpg', 2, 4, '', 'on', 2),
(4, 'Test', '[\"tesss\",\"ff\",\"tesssxxx\",\"sss\",\"ccc\",\"ffff\"]', '', 34, 22, 'ddddaaaaaaaaaaaaaaffafaaffafa', 'Perfect day Lan', 2),
(5, 'Test', '[\"tesss\",\"ff\",\"tesssxxx\",\"sss\",\"ccc\",\"ffff\"]', '', 34, 22, 'ddddaaaaaaaaaaaaaaffafaaffafa', 'Perfect day Lan', 2),
(6, 'Test', '[\"tesss\",\"ddd\"]', '', 319, 33, 'dddxx', '[\"Perfect day Kinoa\",\"Perfect day Kinoa bela\",\"Perfect day Sezam Mix\"]', 2),
(7, 'Testxx', '[\"tesss\",\"ddd\",\"xxx\"]', '_DSC5059_WEBRES.jpg', 33, 24, 'dddxx', '[\"Perfect day Kinoa bela\",\"Perfect day Bundeva\",\"Perfect day Sezam\"]', 2),
(8, 'Test', '[\"tesss\"]', '', 2, 2, 'hhh', '[\"Perfect day Kinoa\",\"Perfect day Kinoa bela\"]', 2),
(9, 'Test', '[\"tesss\"]', '07-1-1-940.jpg', 2, 2, 'vvv', '[\"Perfect day Kinoa bela\",\"Perfect day Bundeva\"]', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `recepti`
--
ALTER TABLE `recepti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_KorisnikRecepti` (`korisnik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recepti`
--
ALTER TABLE `recepti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recepti`
--
ALTER TABLE `recepti`
  ADD CONSTRAINT `FK_KorisnikRecepti` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
