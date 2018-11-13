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
-- Table structure for table `vitals_sheettbl`
--

CREATE TABLE `vitals_sheettbl` (
  `vital_id` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `vital_timestamp` varchar(255) NOT NULL,
  `vital_bp` varchar(255) NOT NULL,
  `vital_pulse` varchar(255) NOT NULL,
  `vital_temp` varchar(255) NOT NULL,
  `vital_resp_rate` varchar(255) NOT NULL,
  `vital_height` varchar(255) NOT NULL,
  `vital_weight` varchar(255) NOT NULL,
  `vital_bmi` varchar(255) NOT NULL,
  `vital_pain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vitals_sheettbl`
--

INSERT INTO `vitals_sheettbl` (`vital_id`, `regNo`, `vital_timestamp`, `vital_bp`, `vital_pulse`, `vital_temp`, `vital_resp_rate`, `vital_height`, `vital_weight`, `vital_bmi`, `vital_pain`) VALUES
(2, 10048, '24-3-2018 03:25 PM', 'SYS: 140 - DIA: 80', '60', '98', '50', '5 feet 11 inches', '89 kg', '45', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vitals_sheettbl`
--
ALTER TABLE `vitals_sheettbl`
  ADD PRIMARY KEY (`vital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vitals_sheettbl`
--
ALTER TABLE `vitals_sheettbl`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
