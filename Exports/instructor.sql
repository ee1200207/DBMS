-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2014 at 12:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `Course_ID` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `password`, `name`, `Course_ID`) VALUES
(1, 'snd', 'Somnath Dey', 'CS101'),
(1, 'snd', 'Somnath Dey', 'CS204'),
(1, 'snd', 'Somnath Dey', 'CS305'),
(2, 'qwerty', 'Kapil', 'CS207'),
(2, 'qwerty', 'Kapil', 'CS307'),
(3, 'abc', 'abhishek', 'CS101'),
(4, 'hi', 'Anirban', 'CS209'),
(4, 'hi', 'Anirban', 'CS305'),
(5, 'abc', 'Tripti', 'CS305');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
