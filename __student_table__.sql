-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2021 at 05:32 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `cnic` varchar(15) NOT NULL,
  `name` tinytext NOT NULL,
  `father` tinytext NOT NULL,
  `address` text NOT NULL,
  `gender` char(1) NOT NULL,
  `school_name` text NOT NULL,
  `school_roll` varchar(15) NOT NULL,
  `school_board` tinytext NOT NULL,
  `school_score` int(11) NOT NULL,
  `college_name` text NOT NULL,
  `college_roll` varchar(15) NOT NULL,
  `college_board` tinytext NOT NULL,
  `college_score` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `picture` longblob NOT NULL,
  PRIMARY KEY (`cnic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`cnic`, `name`, `father`, `address`, `gender`, `school_name`, `school_roll`, `school_board`, `school_score`, `college_name`, `college_roll`, `college_board`, `college_score`, `department`, `picture`) VALUES
('34603-8562277-0', 'Anum', 'Aamir', 'Harrar,Sialkot,Pakistan', 'F', 'Dar-e-Arqam', '18567', 'Gujranwala', 1001, 'Superior', '19034', 'Gujranwala', 972, 'Computer Science', 0x4d652e6a7067),
('34603-8562277-1', 'Iffat', 'Aamir', 'Dubai', 'F', 'TPNHS', '12345', 'Islamabad', 567, 'Pakistani Islamia', '09876', 'Gujranwala', 1022, 'Fine Arts', 0x416e697a612e6a7067);
