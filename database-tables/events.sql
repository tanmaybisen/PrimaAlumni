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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `Ename` varchar(80) NOT NULL,
  `Organiser` varchar(100) NOT NULL,
  `Venue` varchar(50) NOT NULL,
  `Date` text NOT NULL,
  `Time` text NOT NULL,
  PRIMARY KEY (`Ename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Ename`, `Organiser`, `Venue`, `Date`, `Time`) VALUES
('Python Workshop', 'Tanmay Bisen', 'ASDF', '14-11-2001', '17.23'),
('Mental Health Management ', 'Miss Rashi Joshi', 'GR Hall, Chandigarh', '2022-01-23', '12:00:00'),
('Placement Preparation Seminar', 'Mr. Parth Patel', 'MG Conference, Delhi', '2022-01-20', '10:00:00'),
('Green Energy Seminar', 'Mr. Sanjay Jadhav', 'VNIT,Nagpur', '2022-01-12', '13:00:00'),
('Machine Learning Workshop', 'IIT Guwahati', 'IIT Guwahati', '22-01-2022', '12:00:00'),
('AddEvent', 'ASDF', 'asdf;jaksdf', '2022-01-05', '17.23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
