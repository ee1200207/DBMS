-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2014 at 02:27 PM
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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) NOT NULL,
  `rollno` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `course_id` varchar(100) DEFAULT NULL,
  `project_id` varchar(2000) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `dept` varchar(40) NOT NULL,
  `year` varchar(10) NOT NULL,
  `joining_year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `rollno`, `name`, `password`, `course_id`, `project_id`, `email`, `phone_no`, `dept`, `year`, `joining_year`) VALUES
(1, 1200108, 'Deeksha', 'abc', ';CS204;CS101', ';CS101_1_1', 'deepthithadi@yahoo.com', '835704498', 'CSE', '3rd', 2012),
(2, 1200207, 'Bharath', 'def', ';CS101', ';CS101_1_1', NULL, NULL, 'CSE', '3rd', 2012);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
