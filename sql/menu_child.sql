-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 06:38 AM
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
-- Table structure for table `menu_child`
--

CREATE TABLE `menu_child` (
  `child_menu_id` int(11) NOT NULL,
  `child_menu_name` varchar(255) NOT NULL,
  `child_menu_url` varchar(255) NOT NULL,
  `fk_parent_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_child`
--

INSERT INTO `menu_child` (`child_menu_id`, `child_menu_name`, `child_menu_url`, `fk_parent_menu_id`) VALUES
(1, 'Add New Patient', 'dashboard/new_admission', 2),
(2, 'View Admitted Patients', 'dashboard/view_patients', 2),
(3, 'History and Plan Chart', 'dashboard/patient_chart', 2),
(4, 'New OT Booking', 'dashboard/operation_theatre', 3),
(5, 'Discharge Patient', 'dashboard/discharge_patients', 2),
(6, 'Operation List', 'dashboard/view_operationlist', 3),
(7, 'Ward/ Beds List', 'dashboard/bedslist', 5),
(11, 'Re-Admit Patient', 'dashboard/patient_revisit', 2),
(15, 'Add Expenses', 'dashboard/add_expense', 7),
(16, 'View Expenses', 'dashboard/view_expense', 7),
(17, 'Patient Account', '', 6),
(18, 'Hospital Expense', '', 6),
(19, 'Pharmacy', '', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_child`
--
ALTER TABLE `menu_child`
  ADD PRIMARY KEY (`child_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `child_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
