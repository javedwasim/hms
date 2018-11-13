-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 06:39 AM
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
-- Table structure for table `post_operative_instructionstbl`
--

CREATE TABLE `post_operative_instructionstbl` (
  `postOpINo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `dateString` varchar(256) NOT NULL,
  `forRecoveryArea` text NOT NULL,
  `fluids` text NOT NULL,
  `antibiotics` text NOT NULL,
  `analgesics` text NOT NULL,
  `specialInstructions` text NOT NULL,
  `instructionsForPathological` text NOT NULL,
  `doctorName` varchar(256) NOT NULL,
  `bloodLoss` varchar(256) NOT NULL,
  `bloodTransfusion` varchar(256) NOT NULL,
  `ivFluids` varchar(256) NOT NULL,
  `urineOutput` varchar(256) NOT NULL,
  `sawbOrInstruments` varchar(256) NOT NULL,
  `nurseName` varchar(256) NOT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_operative_instructionstbl`
--

INSERT INTO `post_operative_instructionstbl` (`postOpINo`, `regNo`, `otBookingNo`, `dateString`, `forRecoveryArea`, `fluids`, `antibiotics`, `analgesics`, `specialInstructions`, `instructionsForPathological`, `doctorName`, `bloodLoss`, `bloodTransfusion`, `ivFluids`, `urineOutput`, `sawbOrInstruments`, `nurseName`, `isSave`) VALUES
(1, 10048, 2, '16-3-2018 9:45 PM', 'fgsfgksfgjsgj44', 'dAASASF', 'fgsfgksfgjsgj44ASDDS', 'fgsfgksfgjsgj44sfhgfds', 'fgsfgksfgjsgj44SAFAF', 'fgsfgksfgjsgj44AFAFAFA', '4', '2', '2', '2', '2', 'No', '61', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_operative_instructionstbl`
--
ALTER TABLE `post_operative_instructionstbl`
  ADD PRIMARY KEY (`postOpINo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_operative_instructionstbl`
--
ALTER TABLE `post_operative_instructionstbl`
  MODIFY `postOpINo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
