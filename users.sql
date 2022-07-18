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

-- --------------------------------------------------------

--
-- Table structure for table `jobdata`
--

DROP TABLE IF EXISTS `jobdata`;
CREATE TABLE IF NOT EXISTS `jobdata` (
  `CompanyName` text NOT NULL,
  `Description` text NOT NULL,
  `StartingDate` text NOT NULL,
  `EndingDate` text NOT NULL,
  `Details` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdata`
--

INSERT INTO `jobdata` (`CompanyName`, `Description`, `StartingDate`, `EndingDate`, `Details`) VALUES
('Cognizant', 'Senior Manager at Pune branch', '2016', 'till date', 'https://careers.cognizant.com/in/en'),
('Amazon', 'Program Analyst at Banglore branch', '2020', 'till date', 'https://www.indeed.com/jobs?q=amazon&msclkid=25ff9eb64f8a1d53a649ff6e382f120d&utm_source=bing&utm_medium=cpc&utm_campaign=company_campaign_20170730_0_(exact)_(en)&utm_term=amazon%20jobs&utm_content=amazon&vjk=c16d3a78fa3d7ac9'),
('Drucare', 'Java Developer at Hyderabad branch', '2018', '2021', 'https://www.mysaskill.com/jobs/drucare-pvt-ltd/'),
('CitiBank', 'Software Devloper at Pune branch', '2019', 'till date', 'https://www.indeed.com/jobs?q=citi&msclkid=4f3fa6ec822e16d8daa0c734fa2682e7&utm_source=bing&utm_medium=cpc&utm_campaign=company_campaign_20170730_0_(exact)_(en)&utm_term=citi%20careers&utm_content=citi&vjk=0d98ac6bdbc01ea6'),
('Accenture', 'UI/UX Designer at Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia branch', '2012', 'till date', 'https://www.accenture.com/in-en/careers?c=in_brandexpression_11801467&n=psbs_0121&src=inFY21pscbing&msclkid=0a75724194111b32be2d1399ec255b67&utm_source=bing&utm_medium=cpc&utm_campaign=IN_REM_CORP_NA_BREXAN_BRAND_EXCT_STND_EN_BREXATB_CMAC-BRND-TLNTBRND-NA_NA_NA&utm_term=accenture%20jobs&utm_content=CONS_CENT_NA_BREXAN_BREXATB_CMAC-BRND-TLNTBRND-NA_NA_Recruitment%20Marketing'),
('Morgan Stanly', 'Associate ACG at Mumbai branch', '2017', '2020', 'https://www.morganstanley.com/people?&cid=ppc-71700000088240180:700000002375624:58700007479782468:p67236730267&msclkid=fedd3fa8235610935cdf5e705b31d6f3&gclid=fedd3fa8235610935cdf5e705b31d6f3&gclsrc=3p.ds'),
('Accenture', 'UI/UX Designer at Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia branch', '2012', 'till date', 'https://www.accenture.com/in-en/careers?c=in_brandexpression_11801467&n=psbs_0121&src=inFY21pscbing&msclkid=0a75724194111b32be2d1399ec255b67&utm_source=bing&utm_medium=cpc&utm_campaign=IN_REM_CORP_NA_BREXAN_BRAND_EXCT_STND_EN_BREXATB_CMAC-BRND-TLNTBRND-NA_NA_NA&utm_term=accenture%20jobs&utm_content=CONS_CENT_NA_BREXAN_BREXATB_CMAC-BRND-TLNTBRND-NA_NA_Recruitment%20Marketing'),
('ABC', 'uuuu', 'uuu', 'iiii', 'pppp');

-- --------------------------------------------------------

--
-- Table structure for table `perdata`
--

DROP TABLE IF EXISTS `perdata`;
CREATE TABLE IF NOT EXISTS `perdata` (
  `fname` text,
  `lname` text,
  `email` text,
  `dob` text,
  `pno` text,
  `country` text,
  `state` text,
  `city` text,
  `username` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perdata`
--

INSERT INTO `perdata` (`fname`, `lname`, `email`, `dob`, `pno`, `country`, `state`, `city`, `username`) VALUES
('Sameer', 'Mishra', 'bisentp@rknec.edu', '2021-12-15', '94234109', 'India', 'Maharashtra', 'Nagpur', 'new'),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin50');

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
