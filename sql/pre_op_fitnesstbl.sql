-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 06:41 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pre_op_fitnesstbl`
--

CREATE TABLE `pre_op_fitnesstbl` (
  `preOpFNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `anesthetistRemarks` text NOT NULL,
  `anesthetistAdvice` text NOT NULL,
  `anesthetistName` varchar(256) NOT NULL,
  `physicianRemarks` text NOT NULL,
  `physicianAdvice` text NOT NULL,
  `physicianName` varchar(256) NOT NULL,
  `anyOther` text NOT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_op_fitnesstbl`
--

INSERT INTO `pre_op_fitnesstbl` (`preOpFNo`, `regNo`, `otBookingNo`, `anesthetistRemarks`, `anesthetistAdvice`, `anesthetistName`, `physicianRemarks`, `physicianAdvice`, `physicianName`, `anyOther`, `isSave`) VALUES
(1, 10048, 2, 'gsdjgfjsgdkfgsjgugjhsgjgsj', 'jjhwrrwfwf', 'gjhg', 'jhgjkljljlkj', 'gjhgjkhjhjh', 'khjkhjkhkj', 'bbhjbhbsssssssssssss', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pre_op_fitnesstbl`
--
ALTER TABLE `pre_op_fitnesstbl`
  ADD PRIMARY KEY (`preOpFNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pre_op_fitnesstbl`
--
ALTER TABLE `pre_op_fitnesstbl`
  MODIFY `preOpFNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
