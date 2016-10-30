-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2016 at 09:53 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offer`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `BrandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(40) NOT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Token` varchar(50) NOT NULL,
  PRIMARY KEY (`BrandId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`BrandId`, `brandName`, `Latitude`, `Longitude`, `Token`) VALUES
(9, 'Nugegoda', 6.865108, 79.897849, '789'),
(8, 'Rawatawatta', 6.786683, 79.88473, '147'),
(7, 'Dehiwala', 6.833875, 79.875817, '258'),
(6, 'Kollupitiya', 6.912419, 79.850327, '123');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `offerId` int(11) NOT NULL AUTO_INCREMENT,
  `brandId` int(11) NOT NULL,
  `massege` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `offerStart` date DEFAULT NULL,
  `offerEnd` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`offerId`),
  KEY `brandId` (`brandId`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerId`, `brandId`, `massege`, `date`, `offerStart`, `offerEnd`, `status`) VALUES
(92, 6, 'To day Have Special Offers from pizzahut', '2016-10-29', '2016-10-14', '2016-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

DROP TABLE IF EXISTS `subscriber`;
CREATE TABLE IF NOT EXISTS `subscriber` (
  `phonenumber` varchar(100) NOT NULL,
  `subscriberId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`subscriberId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`phonenumber`, `subscriberId`) VALUES
('94771122445', 7),
('94771122456', 6),
('94771122336', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
