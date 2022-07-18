-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2022 at 04:08 PM
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
-- Table structure for table `edudata`
--

DROP TABLE IF EXISTS `edudata`;
CREATE TABLE IF NOT EXISTS `edudata` (
  `cname` text NOT NULL,
  `sname` text NOT NULL,
  `score` text NOT NULL,
  `year` text NOT NULL,
  `detail` text NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edudata`
--

INSERT INTO `edudata` (`cname`, `sname`, `score`, `year`, `detail`, `username`) VALUES
('New course', 'RCOEM', '12.12', '2023', 'good work', 'admin'),
('New course', 'RCOEM', '12.12', '2023', 'good work', 'admin'),
('New course', 'RCOEM', '12.12', '2023', 'good work', 'admin'),
('New course', 'RCOEM', '12.12', '2023', 'good work', 'new');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
