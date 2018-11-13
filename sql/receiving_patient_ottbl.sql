-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 06:42 AM
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
-- Table structure for table `receiving_patient_ottbl`
--

CREATE TABLE `receiving_patient_ottbl` (
  `recPatOtNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `dateString` varchar(256) NOT NULL,
  `houseOfficerId` varchar(255) NOT NULL,
  `nurseId` int(11) NOT NULL,
  `documentsReceived` varchar(256) NOT NULL,
  `patientCategory` varchar(256) NOT NULL,
  `patientAlertness` varchar(256) NOT NULL,
  `pulseDoctor` varchar(256) NOT NULL,
  `bpDoctor` varchar(256) NOT NULL,
  `tempDoctor` varchar(256) NOT NULL,
  `rrDoctor` varchar(256) NOT NULL,
  `gcsDoctor` varchar(256) NOT NULL,
  `cvpDoctor` varchar(256) NOT NULL,
  `pulseNurse` varchar(256) NOT NULL,
  `bpNurse` varchar(256) NOT NULL,
  `tempNurse` varchar(256) NOT NULL,
  `rrNurse` varchar(256) NOT NULL,
  `gcsNurse` varchar(256) NOT NULL,
  `cvpNurse` varchar(256) NOT NULL,
  `statusOfDrains` varchar(256) NOT NULL,
  `biopsySpecimen` varchar(256) NOT NULL,
  `biopsySpecimenReason` varchar(256) NOT NULL,
  `dressing` varchar(256) NOT NULL,
  `bloodTransfusion` varchar(256) NOT NULL,
  `operationNotesOrdersChecked` varchar(256) NOT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiving_patient_ottbl`
--

INSERT INTO `receiving_patient_ottbl` (`recPatOtNo`, `regNo`, `otBookingNo`, `dateString`, `houseOfficerId`, `nurseId`, `documentsReceived`, `patientCategory`, `patientAlertness`, `pulseDoctor`, `bpDoctor`, `tempDoctor`, `rrDoctor`, `gcsDoctor`, `cvpDoctor`, `pulseNurse`, `bpNurse`, `tempNurse`, `rrNurse`, `gcsNurse`, `cvpNurse`, `statusOfDrains`, `biopsySpecimen`, `biopsySpecimenReason`, `dressing`, `bloodTransfusion`, `operationNotesOrdersChecked`, `isSave`) VALUES
(1, 10048, 2, '17-3-2018 12:38 PM', 'Hamza', 62, 'No', 'Side Room', 'U', '11', '11', '1111', '11', '11', '111', '11', '111', '11', '11', '11', '11', 'Suction drains', 'Not Sent', 'none11', 'Not Soaked', 'Needed', 'Yes', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receiving_patient_ottbl`
--
ALTER TABLE `receiving_patient_ottbl`
  ADD PRIMARY KEY (`recPatOtNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receiving_patient_ottbl`
--
ALTER TABLE `receiving_patient_ottbl`
  MODIFY `recPatOtNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
