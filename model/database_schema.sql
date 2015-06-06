-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2015 at 03:17 PM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `safeasst_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `AGENT`
--

CREATE TABLE IF NOT EXISTS `AGENT` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `Dept` varchar(80) NOT NULL,
  `Policyname` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CONSUMER`
--

CREATE TABLE IF NOT EXISTS `CONSUMER` (
  `ID` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Safety` varchar(100) NOT NULL,
  `Medical_issue` varchar(225) NOT NULL,
  `Medical_require` varchar(225) NOT NULL,
  `Freetest` text NOT NULL,
  `Contact` varchar(225) NOT NULL,
  `Update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Interaction` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `ID` int(11) NOT NULL,
  `Oauth` varchar(40) NOT NULL,
  `Username` varchar(85) NOT NULL,
  `Password` varchar(85) NOT NULL,
  `Usertype` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
