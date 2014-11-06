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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `rollno` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id` int(10) NOT NULL,
  `course_id` varchar(10) DEFAULT '',
  `project_id` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `name`, `password`, `id`, `course_id`, `project_id`) VALUES
(1200206, 'bkc', 'bkc', 1200206, 'CS101', 'CS101_1200206_1'),
(1200206, 'bkc', 'bkc', 1200206, 'CS209', 'CS209_1200206_1'),
(1200207, 'Bharath Subramanyam', 'bharath', 1200207, 'CS101', 'CS101_1200207_1'),
(1200207, 'Bharath Subramanyam', 'bharath', 1200207, 'CS401', 'CS401_1200207_1'),
(1200207, 'Bharath Subramanyam', 'bharath', 1200207, 'CS101', 'CS101_1200207_2'),
(1200206, 'bkc', 'bkc', 1200206, 'CS101', 'CS101_1200206_2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
