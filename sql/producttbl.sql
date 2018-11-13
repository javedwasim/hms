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
-- Table structure for table `producttbl`
--

CREATE TABLE `producttbl` (
  `productNo` int(11) NOT NULL,
  `productCode` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productFormulation` varchar(255) NOT NULL,
  `productMg` varchar(255) DEFAULT 'NULL',
  `productPurchasePrice` double NOT NULL,
  `productSalePrice` double NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productUnit` varchar(255) NOT NULL,
  `productQty` int(11) NOT NULL,
  `productLocation` varchar(255) NOT NULL,
  `productBarcode` int(11) NOT NULL,
  `productSupplier` varchar(255) NOT NULL,
  `productManufacture` varchar(255) NOT NULL,
  `productReorderLevel` int(11) NOT NULL,
  `productExpireDate` date NOT NULL,
  `productStatus` varchar(2) NOT NULL DEFAULT '1',
  `isDeleted` varchar(2) NOT NULL DEFAULT '0',
  `productSoldQty` int(11) NOT NULL DEFAULT '0',
  `productOrderStatus` varchar(255) NOT NULL DEFAULT '0',
  `isDismiss` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttbl`
--

INSERT INTO `producttbl` (`productNo`, `productCode`, `productName`, `productFormulation`, `productMg`, `productPurchasePrice`, `productSalePrice`, `productCategory`, `productUnit`, `productQty`, `productLocation`, `productBarcode`, `productSupplier`, `productManufacture`, `productReorderLevel`, `productExpireDate`, `productStatus`, `isDeleted`, `productSoldQty`, `productOrderStatus`, `isDismiss`) VALUES
(1, 200012, 'Panadol', 'kjhgkjh', '', 12, 13, 1, 'Tablet', 0, '', 0, '', '', 12, '2018-06-20', '1', '1', 0, '0', '0'),
(2, 200013, 'Ten', 'jgjfhjjh', '75', 45.76, 6787, 1, 'Tablet', 0, '34534535345', 435343, 'fghfgngn', 'fghfgfg', 54, '2018-03-21', '1', '0', 12, '0', '1'),
(3, 200014, 'Gablin', 'jhgjhghjg', '765', 786, 799, 2, 'Tablet', 160, 'New Hartford', 2147483647, 'Asif', 'GSK', 12, '2018-03-19', '1', '0', 16, '0', '0'),
(4, 200015, 'Zest G', 'jgjgjhgjgj', 'jggjg', 87676, 76768, 2, 'Tablet', 24, '233dsfd', 244234, 'gdgdfg', 'tereg', 34, '2018-03-19', '0', '1', 0, '0', '0'),
(5, 200016, 'Panadol Extra', '6jhfhfhf', '765', 66.98, 658.88, 2, 'Case', 119, 'kjgjhghghjg', 2147483647, 'ghghj', 'jhghjghjghj', 75, '2018-03-21', '1', '0', 35, '1', '0'),
(6, 200019, 'Kordel', 'sfsdfsfs', ' ', 12.98, 15, 3, 'Tablet', 213, '', 0, '', '', 20, '2018-08-29', '1', '0', 113, '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttbl`
--
ALTER TABLE `producttbl`
  ADD PRIMARY KEY (`productNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producttbl`
--
ALTER TABLE `producttbl`
  MODIFY `productNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
