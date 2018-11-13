-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 06:40 AM
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
-- Table structure for table `preoperative_ordertbl`
--

CREATE TABLE `preoperative_ordertbl` (
  `preOpONo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `dateString` varchar(256) NOT NULL,
  `marksIdentification1` varchar(256) NOT NULL,
  `marksIdentification2` varchar(256) NOT NULL,
  `operationSite` varchar(256) NOT NULL,
  `operationSideMarked` varchar(256) NOT NULL,
  `giveBath` varchar(256) NOT NULL,
  `markOperationSite` varchar(256) NOT NULL,
  `provideHospitalDress` varchar(256) NOT NULL,
  `areaName` varchar(256) NOT NULL,
  `npoFormTime` varchar(256) NOT NULL,
  `arrangeBlood` varchar(256) NOT NULL,
  `sendFInvestigationOt` varchar(256) NOT NULL,
  `preMedication` text NOT NULL,
  `sendPatientOtTime` varchar(256) NOT NULL,
  `anyOtherOrder` text NOT NULL,
  `laproscopicUse` varchar(256) NOT NULL,
  `diathermyUse` varchar(256) NOT NULL,
  `tourniquetUse` varchar(256) NOT NULL,
  `xRayUse` varchar(256) NOT NULL,
  `laserUse` varchar(256) NOT NULL,
  `doctorName` int(11) DEFAULT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preoperative_ordertbl`
--

INSERT INTO `preoperative_ordertbl` (`preOpONo`, `regNo`, `otBookingNo`, `dateString`, `marksIdentification1`, `marksIdentification2`, `operationSite`, `operationSideMarked`, `giveBath`, `markOperationSite`, `provideHospitalDress`, `areaName`, `npoFormTime`, `arrangeBlood`, `sendFInvestigationOt`, `preMedication`, `sendPatientOtTime`, `anyOtherOrder`, `laproscopicUse`, `diathermyUse`, `tourniquetUse`, `xRayUse`, `laserUse`, `doctorName`, `isSave`) VALUES
(2, 10048, 2, '09-03-2018 09:52 PM', 'One', 'Two', 'Left', 'Yes', 'true', 'false', 'true', 'shave', '03:15 PM', 'lkjhlkj', 'inv', 'pre medication', '03:15 PM', 'other', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 4, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preoperative_ordertbl`
--
ALTER TABLE `preoperative_ordertbl`
  ADD PRIMARY KEY (`preOpONo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preoperative_ordertbl`
--
ALTER TABLE `preoperative_ordertbl`
  MODIFY `preOpONo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
