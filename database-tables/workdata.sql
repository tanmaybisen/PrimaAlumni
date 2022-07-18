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
-- Table structure for table `workdata`
--

DROP TABLE IF EXISTS `workdata`;
CREATE TABLE IF NOT EXISTS `workdata` (
  `title` text NOT NULL,
  `comname` text NOT NULL,
  `description` text NOT NULL,
  `syear` int(11) NOT NULL,
  `eyear` int(11) NOT NULL,
  `username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workdata`
--

INSERT INTO `workdata` (`title`, `comname`, `description`, `syear`, `eyear`, `username`) VALUES
('anasfg', 'fasdfasdf', 'asdf', 2131, 1212, 'admin'),
('lkhl', 'weffqw', 'fasd', 252, 5555, 'new');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
