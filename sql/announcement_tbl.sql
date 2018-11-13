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
-- Table structure for table `announcement_tbl`
--

CREATE TABLE `announcement_tbl` (
  `anno_id` int(11) NOT NULL,
  `ann_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `docName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement_tbl`
--

INSERT INTO `announcement_tbl` (`anno_id`, `ann_text`, `timestamp`, `docName`) VALUES
(1, '1 Announcement', '2018-03-09 10:44:24', 'Dr. Gilfoyle'),
(2, '2 Announcement', '2018-03-09 11:27:35', 'Dr. Muhammad Arshad Ch'),
(3, '3 Announcement', '2018-03-09 11:28:36', 'Dr. Muhammad Arshad Ch'),
(4, '4 Announcement', '2018-03-09 11:30:02', 'Dr. Muhammad Arshad Ch'),
(5, '5 Announcement', '2018-03-09 11:33:19', 'Dr. Muhammad Arshad Ch'),
(6, '6 Announcement', '2018-03-09 11:33:30', 'Dr. Muhammad Arshad Ch'),
(7, '7 Announcement', '2018-03-09 11:33:49', 'Dr. Muhammad Arshad Ch'),
(8, '8 Announcement', '2018-03-09 11:37:34', 'Dr. Muhammad Arshad Ch'),
(9, '9 Announcement', '2018-03-09 11:39:53', 'Dr. Muhammad Arshad Ch'),
(10, '10 Announcement', '2018-03-09 11:48:05', 'Dr. Muhammad Arshad Ch'),
(11, '11 Announcement', '2018-03-09 11:48:23', 'Dr. Muhammad Arshad Ch'),
(12, '12 Announcement', '2018-03-09 11:50:05', 'Dr. Muhammad Arshad Ch'),
(13, '13 Announcement', '2018-03-09 11:51:13', 'Dr. Muhammad Arshad Ch'),
(14, '14 Announcement', '2018-03-09 11:51:16', 'Dr. Muhammad Arshad Ch'),
(15, 'Id maiores provident aut aut voluptas sed. Blanditiis incidunt reiciendis voluptate facere tempore voluptas omnis corrupti. In ipsam sit ipsum velit blanditiis. Minima reiciendis natus molestiae nostrum omnis.', '2018-03-09 12:12:23', 'Dr. Muhammad Arshad Ch'),
(16, 'Harum at incidunt soluta eius sunt adipisci asperiores sequi est. Vel sequi ullam animi qui explicabo dolores amet inventore. Eos quo odit maxime ipsa in esse accusantium ab. Nisi et illo ipsum dolores est eligendi blanditiis. Rerum ut natus sequi facere neque ea harum odio quo. Consectetur quis debitis et laboriosam.', '2018-03-09 12:12:32', 'Dr. Muhammad Arshad Ch'),
(17, 'A', '2018-03-12 13:16:45', 'Dr. Muhammad Arshad Ch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  ADD PRIMARY KEY (`anno_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  MODIFY `anno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
