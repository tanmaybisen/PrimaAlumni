-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2022 at 04:07 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

DROP TABLE IF EXISTS `alumni`;
CREATE TABLE IF NOT EXISTS `alumni` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `yop` varchar(50) DEFAULT NULL,
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`username`, `password`, `fullname`, `email`, `qualification`, `dob`, `yop`) VALUES
('admin2', '$2y$10$x1rkfhHkFN4BPlWBks20W.asi9gqEaRj.bG0IZxti08uWEtMGO5ZO', 'Tanmay Pawan Bisen', 'bisentp@rknec.edu', 'be', '2001-11-14', '2023'),
('admin', '$2y$10$X62N3sgG7QCx4iyT/OCiZuWeqekzkUxXwShWz7TmBb.m7tXPrvko.', 'Tanmay Pawan Bisen', 'bisentp@rknec.edu', 'be', '2001-11-14', '2023'),
('rashmi', '$2y$10$VPZ60OIVVUlswLrM11s6rePzdzOkJbDl3Yz3KYDRPEsNEgQpieFHW', 'Rashmi Bisen', 'rashu@rknec.edu', 'B.E.', '2001-11-14', '2023'),
('Sameer', '$2y$10$tLf7WLtCmYEyQCH21AQkYeKl7f9w4630izr5KEews2RLKrejwRiE2', 'Tanmay Pawan Bisen', 'bisentp@rknec.edu', 'be', '2001-11-14', '1111'),
('Mayank', '$2y$10$zc9Kl7cLvFVIhyo/eMxJvOL9UWEf0lBkvuaPNKHTCdObpl5tnjBGK', 'Tanmay Pawan Bisen', 'bisentp@rknec.edu', 'B.E.', '2001-11-14', '2023'),
('new', '$2y$10$2pLTtOE88/LODPfgHs5wwusUFyaTG.v5lHrnOZ7yLT.98ZLn4PbEu', 'Tanmay Pawan Bisen', 'bisentp@rknec.edu', 'be', '2001-11-14', '2023'),
('admin50', '$2y$10$wIqEf90VHwo.bykgsFW.Yu5yETEiEyA497B64DBsk1Knzwjai5Fa6', 'Tanmay Pawan Bisen', 'bisentp@rknec.edu', 'B.E.', '2001-11-14', '2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
