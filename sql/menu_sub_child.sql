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
-- Table structure for table `menu_sub_child`
--

CREATE TABLE `menu_sub_child` (
  `subchildId` int(11) NOT NULL,
  `subchildName` varchar(255) NOT NULL,
  `subchild_url` varchar(255) NOT NULL,
  `subchildfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_sub_child`
--

INSERT INTO `menu_sub_child` (`subchildId`, `subchildName`, `subchild_url`, `subchildfk`) VALUES
(1, 'Generate Invoice', 'dashboard/generate_invoice', 17),
(2, 'Search Invoice', 'dashboard/search_invoice', 17),
(3, 'Account Details', 'dashboard/patient_account_details', 17),
(4, 'Refunds', 'dashboard/refunds', 17),
(5, 'Outstanding Patients', 'dashboard/outstanding_patients', 17),
(6, 'Add Expenses', 'dashboard/add_expense', 18),
(7, 'View Expenses', 'dashboard/view_expense', 18),
(8, 'Prescription', 'dashboard/view_prescription/', 19),
(9, 'Products', 'dashboard/view_products/', 19),
(10, 'Return', 'dashboard/return_prescription/', 19),
(11, 'Product Stock Alert', 'dashboard/products_stock_alert/', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_sub_child`
--
ALTER TABLE `menu_sub_child`
  ADD PRIMARY KEY (`subchildId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_sub_child`
--
ALTER TABLE `menu_sub_child`
  MODIFY `subchildId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
