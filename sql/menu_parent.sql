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
-- Table structure for table `menu_parent`
--

CREATE TABLE `menu_parent` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_icon` varchar(255) NOT NULL,
  `menu_collapser_id` varchar(255) NOT NULL,
  `parent_menu_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_parent`
--

INSERT INTO `menu_parent` (`menu_id`, `menu_name`, `menu_icon`, `menu_collapser_id`, `parent_menu_link`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', '', 'dashboard/'),
(2, 'Admission', 'fa fa-hospital-o', 'adm-minimaximizer', ''),
(3, 'OT Booking', 'fa fa-address-book-o', 'otb-minimaximizer', ''),
(4, 'Radiology/ Lab Reports', 'fa fa-flask', 'otp-minimaximizer', 'dashboard/patient_reports/'),
(5, 'Ward/ Room List', 'fa fa-file-text', 'wrl-minimaximizer', ''),
(6, 'Financial Activities', 'fa fa-dollar', 'acc-minimaximizer', ''),
(8, 'Inventory', 'fa fa-shopping-cart', '', ''),
(9, 'Statistics', 'fa fa-bar-chart', '', 'dashboard/statistics/'),
(10, 'Announcements', 'fa fa-bullhorn', '', 'dashboard/announcements/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_parent`
--
ALTER TABLE `menu_parent`
  ADD PRIMARY KEY (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_parent`
--
ALTER TABLE `menu_parent`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
