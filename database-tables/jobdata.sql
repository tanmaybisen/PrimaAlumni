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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
