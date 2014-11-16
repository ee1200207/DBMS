-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2014 at 12:13 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

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
  `dept` varchar(10) NOT NULL,
  `Course_ID` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `password`, `name`, `dept`, `Course_ID`, `email`, `phone_no`) VALUES
(1, 'snd', 'Somnath Dey', 'CSE', ';CS209', NULL, NULL),
(2, 'qwerty', 'Kapil', 'CSE', ';CS209;CS101;CS207;CS105;CS105', NULL, NULL),
(3, 'hi', 'Anirban', 'CSE', ';CS209', NULL, NULL),
(4, 'ya', 'G.Banda', 'CSE', 'CS305;CS204', 'charita.vyshnavi@yahoo.com', '999999999'),
(5, 'asd', 'Tripti', 'EE', ';CS103', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
