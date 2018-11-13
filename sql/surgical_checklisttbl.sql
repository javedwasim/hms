-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 06:43 AM
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
-- Table structure for table `surgical_checklisttbl`
--

CREATE TABLE `surgical_checklisttbl` (
  `surgicalSCNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `dateString` varchar(256) NOT NULL,
  `checkbox1` varchar(256) NOT NULL,
  `checkbox2` varchar(256) NOT NULL,
  `checkbox3` varchar(256) NOT NULL,
  `radio4` varchar(256) NOT NULL,
  `radio5` varchar(256) NOT NULL,
  `radio6` varchar(256) NOT NULL,
  `checkbox7` varchar(256) NOT NULL,
  `checkbox8` varchar(256) NOT NULL,
  `checkbox9` varchar(256) NOT NULL,
  `checkbox10` varchar(256) NOT NULL,
  `checkbox11` varchar(256) NOT NULL,
  `checkbox12` varchar(256) NOT NULL,
  `checkbox13` varchar(256) NOT NULL,
  `checkbox14` varchar(256) NOT NULL,
  `checkbox15` varchar(256) NOT NULL,
  `checkbox16` varchar(256) NOT NULL,
  `checkbox17` varchar(256) NOT NULL,
  `checkbox18` varchar(256) NOT NULL,
  `checkbox19` varchar(256) NOT NULL,
  `checkbox20` varchar(256) NOT NULL,
  `checkbox21` varchar(256) NOT NULL,
  `checkbox22` varchar(256) NOT NULL,
  `checkbox23` varchar(256) NOT NULL,
  `checkbox24` varchar(256) NOT NULL,
  `checkbox25` varchar(256) NOT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgical_checklisttbl`
--

INSERT INTO `surgical_checklisttbl` (`surgicalSCNo`, `regNo`, `otBookingNo`, `dateString`, `checkbox1`, `checkbox2`, `checkbox3`, `radio4`, `radio5`, `radio6`, `checkbox7`, `checkbox8`, `checkbox9`, `checkbox10`, `checkbox11`, `checkbox12`, `checkbox13`, `checkbox14`, `checkbox15`, `checkbox16`, `checkbox17`, `checkbox18`, `checkbox19`, `checkbox20`, `checkbox21`, `checkbox22`, `checkbox23`, `checkbox24`, `checkbox25`, `isSave`) VALUES
(1, 10048, 2, '16-3-2018 10:25 AM', 'false', 'false', 'false', 'Yes', 'Yes', 'Yes', 'true', 'false', 'false', 'true', 'true', 'true', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surgical_checklisttbl`
--
ALTER TABLE `surgical_checklisttbl`
  ADD PRIMARY KEY (`surgicalSCNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surgical_checklisttbl`
--
ALTER TABLE `surgical_checklisttbl`
  MODIFY `surgicalSCNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
