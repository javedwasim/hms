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
-- Table structure for table `prescription_descriptiontbl`
--

CREATE TABLE `prescription_descriptiontbl` (
  `rxDesNo` int(11) NOT NULL,
  `rxNo` int(11) NOT NULL,
  `productNo` int(11) NOT NULL,
  `productCode` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productFormulation` varchar(255) NOT NULL,
  `productMg` varchar(255) NOT NULL,
  `productSaleQty` int(11) NOT NULL,
  `productSalePrice` varchar(255) NOT NULL,
  `productTotalAmount` varchar(255) NOT NULL,
  `productReturnQty` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_descriptiontbl`
--

INSERT INTO `prescription_descriptiontbl` (`rxDesNo`, `rxNo`, `productNo`, `productCode`, `productName`, `productFormulation`, `productMg`, `productSaleQty`, `productSalePrice`, `productTotalAmount`, `productReturnQty`) VALUES
(24, 881012, 5, 200016, 'Panadol Extra', '', '765', 1, '658.88', '658.88', 2),
(25, 881012, 3, 200014, 'Gablin', '', '765', 2, '799', '1598.00', 1),
(26, 881013, 5, 200016, 'Panadol Extra', '', '765', 1, '658.88', '658.88', 0),
(27, 881013, 3, 200014, 'Gablin', '', '765', 1, '799', '799.00', 1),
(28, 881014, 5, 200016, 'Panadol Extra', '', '765', 4, '658.88', '2635.52', 2),
(29, 881014, 3, 200014, 'Gablin', '', '765', 1, '799', '799.00', 2),
(30, 881015, 5, 200016, 'Panadol Extra', '', '765', 4, '658.88', '2635.52', 0),
(31, 881015, 3, 200014, 'Gablin', '', '765', 4, '799', '3196.00', 0),
(32, 881023, 6, 200019, 'Kordel', '', ' ', 111, '15', '1665.00', 0),
(33, 881038, 6, 200019, 'Kordel', '', 'null', 1, '15', ' 15.00', 0),
(34, 881039, 6, 200019, 'Kordel', '', ' ', 1, '15', ' 15.00', 0),
(35, 881040, 5, 200016, 'Panadol Extra', '', '765', 3, '658.88', '1976.64', 0),
(36, 881040, 3, 200014, 'Gablin', '', '765', 4, '799', '3196.00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prescription_descriptiontbl`
--
ALTER TABLE `prescription_descriptiontbl`
  ADD PRIMARY KEY (`rxDesNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prescription_descriptiontbl`
--
ALTER TABLE `prescription_descriptiontbl`
  MODIFY `rxDesNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
