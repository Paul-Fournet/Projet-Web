-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2024 at 08:40 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `requetes`
--

CREATE TABLE `requetes` (
  `Id` int(11) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `typereq` varchar(50) DEFAULT NULL,
  `horaire` date NOT NULL,
  `horaireheureminutes` varchar(10) NOT NULL,
  `messagetext` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requetes`
--

INSERT INTO `requetes` (`Id`, `IsAdmin`, `nom`, `prenom`, `typereq`, `horaire`, `horaireheureminutes`, `messagetext`) VALUES
(12, 0, 'Gaming', 'Ertinox', '2', '2024-04-24', '10h34', 'Je rencontre actuellement un problème'),
(13, 1, 'FOURNET', 'Paul', '1', '2024-04-24', '10h39', 'Bonjour, je suis un admin'),
(14, 0, 'Gaming', 'Ertinox', '1', '2024-04-24', '17h19', 'TEST Je suis un client'),
(17, 0, 'FOURNET', 'Paul', '2', '2024-04-24', '17h21', 'Bonjour');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requetes`
--
ALTER TABLE `requetes`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requetes`
--
ALTER TABLE `requetes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
