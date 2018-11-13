-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 06:01 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

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
-- Table structure for table `admissiontbl`
--

CREATE TABLE `admissiontbl` (
  `regNo` int(11) NOT NULL,
  `emergency_no` varchar(225) NOT NULL,
  `admi_no` varchar(255) NOT NULL,
  `patName` varchar(255) NOT NULL,
  `patNoKType` varchar(255) NOT NULL,
  `patNoK` varchar(255) NOT NULL,
  `patDoB` varchar(255) NOT NULL,
  `patAge` int(11) DEFAULT NULL,
  `patMonthAge` int(11) NOT NULL,
  `patDaysAge` int(11) NOT NULL,
  `patBldGrp` varchar(255) NOT NULL,
  `patDisease_id` int(11) NOT NULL,
  `patSex` varchar(255) NOT NULL,
  `patCNIC` varchar(255) NOT NULL,
  `patAddress` varchar(255) NOT NULL,
  `patcity` varchar(255) NOT NULL,
  `patOccupation` varchar(255) NOT NULL,
  `patPhone` varchar(255) NOT NULL,
  `patEntitled` varchar(255) NOT NULL,
  `patunit_Id` varchar(255) NOT NULL,
  `patShiftedFrom` varchar(255) NOT NULL,
  `patward_id` int(11) NOT NULL,
  `patbed_id` int(11) NOT NULL,
  `patChart_id` int(11) NOT NULL,
  `patStatus` varchar(255) NOT NULL,
  `patient_pic_path` varchar(255) DEFAULT 'person.jpg',
  `FreeCarePatient` tinyint(1) NOT NULL,
  `admission_timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `previousRegno` varchar(255) DEFAULT NULL,
  `sideRoomDate` date DEFAULT NULL,
  `patAdmDate` datetime NOT NULL,
  `garName` varchar(255) NOT NULL,
  `garCnic` varchar(255) NOT NULL,
  `garContact` varchar(255) NOT NULL,
  `garRelation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admissiontbl`
--

INSERT INTO `admissiontbl` (`regNo`, `emergency_no`, `admi_no`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patMonthAge`, `patDaysAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patcity`, `patOccupation`, `patPhone`, `patEntitled`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patChart_id`, `patStatus`, `patient_pic_path`, `FreeCarePatient`, `admission_timestamp`, `previousRegno`, `sideRoomDate`, `patAdmDate`, `garName`, `garCnic`, `garContact`, `garRelation`) VALUES
(10048, '123454123454', '123454123454', 'Ashir', 'S/O', 'Rehmat mashi', '', 25, 0, 0, 'A+VE', 10, 'Male', '31202- 029336-3', 'Railway station', '', 'Labour', '2147483647', 'No', 'Emergency', 'Cod', 1, 1, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '0000-00-00 00:00:00', 'azhar', '00000-0000000-0', '00000000000', ''),
(10060, '0', '0', 'Ashir', 'S/O', 'Rehmat Mashi', '21-02-1993', 25, 0, 0, 'A+VE', 1, 'Male', '31202-0293363-9', 'Railway Station Colony Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 4, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-08 12:03:00', '', '', '', ''),
(10061, '0', '0', 'Mashook Ali', 'S/O', 'Raheem Buksh', '', 45, 0, 0, 'B+VE', 8, 'Male', '36301-1016255-7', 'Jalalpur Pir Wala Multan', '', 'Private Job', '2147483647', 'No', 'Emergency', 'emergency', 1, 5, 22, 'Under Determined', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-02-20 12:15:00', '', '', '', ''),
(10062, '0', '0', 'Asif', 'S/O', 'Naik Muhammad', '', 30, 0, 0, '', 17, 'Male', '31301-8275678-3', 'KHAN PUR RAHIMYAR KHAN', '', 'Electrician', '2147483647', 'No', 'OPD', 'opd', 1, 7, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-02-08 00:56:00', '', '', '', ''),
(10063, '0', '0', 'Safdar', 'S/O', 'Jind Wada', '01-01-1982', 36, 0, 0, 'AB+VE', 8, 'Male', '31202-9939548-6', 'Chak no 15 DB BWP', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 8, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-10 09:13:00', '', '', '', ''),
(10064, '0', '0', 'Arshad', 'S/O', 'Muhammd ashiq', '', 21, 0, 0, 'A+VE', 8, 'Male', '31202-3616641-3', 'bati jhok bhawlpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 9, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-28 21:25:00', '', '', '', ''),
(10065, '0', '0', 'Raziq', 'S/O', ' Ellahi Ibaksh', '10-03-1965', 53, 0, 0, 'A-VE', 7, 'Male', '36203-7528834-9', 'Basti Sardar Wali Lodhran', '', 'Farmer', '2147483647', 'No', 'Emergency', 'emergency', 1, 10, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-02-07 10:56:00', '', '', '', ''),
(10066, '0', '0', 'Shahzad', 'S/O', 'M.Fayyaz', '10-06-2007', 10, 0, 0, 'A+VE', 1, 'Male', '31202-6985593-3', 'Head-Rajkun Yazman Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 11, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-02-28 21:15:00', '', '', '', ''),
(10067, '0', '0', 'Toreez', 'S/O', 'M.Hussain', '20-06-1983', 34, 0, 0, '', 8, 'Male', '31202-3944981-9', 'Basti Ghulam Karampur Khairpur Tamay Wali', '', 'Private Job', '2147483647', 'No', 'Emergency', 'emergency', 1, 12, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-02-20 22:05:00', '', '', '', ''),
(10068, '0', '0', 'malik asghr ali', 'S/O', 'gh qadir', '24-08-1978', 39, 0, 0, 'A+VE', 4, 'Male', '31203-2404956-5', 'chack no 43 bwp', '', 'Govt.Teachr', '2147483647', 'No', 'Emergency', 'emergency', 1, 13, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-09 08:50:00', '', '', '', ''),
(10069, '0', '0', 'M.Kaleem', 'S/O', 'Ali Mohammad', '12-09-1978', 40, 0, 0, 'A-VE', 43, 'Male', '31105-5377486-1', 'Minchanabad Bahawalnagar', '', 'Bus Stand Incharge', '2147483647', 'No', 'Emergency', 'emergency', 1, 14, 22, 'Diagnosed', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-02 11:36:00', '', '', '', ''),
(10070, '0', '0', 'Bashir Ahmed', 'S/O', 'M.Hussain', '15-06-1958', 60, 0, 0, 'B+VE', 8, 'Male', '31203-0580414-5', 'Chak no 57 Hasilpur Bahawalpur', '', 'Farmer', '2147483647', 'No', 'Emergency', 'emergency', 1, 16, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-08 11:43:00', '', '', '', ''),
(10071, '0', '0', 'Sahib Yar', 'S/O', 'Khuda Baksh', '23-05-1993', 24, 0, 0, 'B-VE', 6, 'Male', '31205-5079987-3', 'Khairpur Tamay Wali Bahawalpur', '', 'labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 17, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-10 23:06:00', '', '', '', ''),
(10072, '0', '0', 'khan muhammad', 'S/O', 'ghazi', '11-03-2018', 70, 0, 0, 'O+VE', 1, 'Male', '31101-4392976-7', 'marli garrh bhawal nagr', '', 'acred', '2147483647', 'No', 'Emergency', 'emergncy', 1, 18, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-10 22:15:00', '', '', '', ''),
(10073, '0', '0', 'Roshan', 'S/O', 'alam khan', '', 28, 0, 0, 'O+VE', 1, 'Male', '31103-5415320-3', 'fort abbas', '', 'acred', '2147483647', 'No', 'Emergency', 'emergncy', 1, 19, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-08 13:40:00', '', '', '', ''),
(10074, '0', '0', 'Muhammd irfan', 'S/O', 'Rasheed', '', 18, 0, 0, '', 1, 'Male', '31302-1896530-9', 'liaqt pur', '', 'student', '2147483647', 'No', 'Emergency', 'emergncy', 1, 20, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-10 20:00:00', '', '', '', ''),
(10075, '0', '0', 'Muhamad bilal', 'S/O', 'Muhamad shahbaz', '', 12, 0, 0, 'O-VE', 6, 'Male', '31202-3710522-4', 'teh bury wala dist vehari', '', 'student', '2147483647', 'No', 'Emergency', 'emergncy', 1, 92, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-09 22:10:00', '', '', '', ''),
(10076, '0', '0', 'Muhamad saleem', 'S/O', 'M haneef', '', 18, 0, 0, 'AB+VE', 1, 'Male', '36203-4360598-9', 'dunya pur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergncy', 1, 122, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-09 16:30:00', '', '', '', ''),
(10077, '0', '0', 'Rashid', 'S/O', 'Jind Wada', '12-04-1998', 19, 0, 0, 'A-VE', 1, 'Male', '36203-1761924-5', 'Cotton Factory Jhangi wali Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 123, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-13 01:00:00', '', '', '', ''),
(10078, '0', '0', 'Shehzad', 'S/O', 'Nawaz', '04-03-1989', 29, 0, 0, 'O+VE', 27, 'Male', '36304-3825066-1', 'Multan', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 139, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-04 18:30:00', '', '', '', ''),
(10079, '0', '0', 'Iman', 'S/O', 'Akram', '05-03-2005', 13, 0, 0, 'A+VE', 6, 'Male', '31104-1654695-9', 'Chak No 10/1 R Haroonabad Bahawalnagar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 140, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-08 13:45:00', '', '', '', ''),
(10080, '0', '0', 'Bilal', 'S/O', 'Shahbaz', '04-03-2006', 12, 0, 0, 'B+VE', 6, 'Male', '31202-3710522-4', 'Wahari', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 141, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-09 22:10:00', '', '', '', ''),
(10081, '0', '0', 'Noman', 'S/O', 'Zulfiqar', '06-03-2002', 16, 0, 0, 'B+VE', 1, 'Male', '36202-0922304-9', 'Kehror paka Lodhran', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 142, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-13 10:14:00', '', '', '', ''),
(10082, '0', '0', 'Parveen', 'W/O', 'Irshad Ahmed', '07-03-1993', 25, 0, 0, 'B+VE', 27, 'Female', '31304-6459390-9', 'Ahmedpur Sharkiya Bahawalpur', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 21, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-25 10:50:00', '', '', '', ''),
(10083, '0', '0', 'Haleema ', 'W/O', 'Abdulrehman', '26-02-1938', 80, 0, 0, 'O+VE', 27, 'Female', '31202-6368917-5', 'Tibah Badar Sher Bahawalpur', '', 'house wife', '2147483647', 'No', 'OPD', 'opd', 2, 22, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-02-28 10:28:00', '', '', '', ''),
(10084, '0', '0', 'Shareef', 'S/O', 'Kalo Khan', '12-03-1948', 70, 0, 0, 'B-VE', 8, 'Male', '31204-1018559-9', 'Moza Morata Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 143, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-11 17:00:00', '', '', '', ''),
(10085, '0', '0', 'Shahid', 'S/O', 'Allah Dita', '06-03-2008', 10, 0, 0, 'A+VE', 1, 'Male', '36301-1331238-5', 'Model Town B Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'Peads 2', 1, 144, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-13 11:35:00', '', '', '', ''),
(10087, '0', '0', 'muhmmad asgar', 'S/O', 'muhmmad afzal', '', 19, 0, 0, '', 6, 'Male', '31201-6557609', 'BASTI hateji bahawalpur', '', 'WORKER', '2147483647', 'Yes', 'Emergency', 'emergency', 1, 146, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-19 14:30:00', '', '', '', ''),
(10088, '0', '0', 'Naseem', 'W/O', 'Fareed', '06-03-1978', 40, 0, 0, 'B+VE', 7, 'Female', '03212-6754328-9', 'Islami Colony Bahawalpur', '', 'House Wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 23, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 15:00:00', '', '', '', ''),
(10089, '0', '0', 'Merab', 'D/O', 'Shabbir ', '06-03-2017', 1, 0, 0, 'B+VE', 43, 'Female', '03212-6754322-5', 'Chak no 53 Haroonabad', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 24, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 20:36:00', '', '', '', ''),
(10090, '0', '0', 'Noor Fatima', 'D/O', 'Ramzan', '13-03-2011', 7, 0, 0, 'B+VE', 7, 'Female', '03212-7654365-4', 'Bahawalnagar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 145, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-02 08:58:00', '', '', '', ''),
(10091, '0', '0', 'Kamo Mai', 'W/O', 'Nawaz', '27-03-1968', 50, 0, 0, 'AB+VE', 34, 'Female', '03212-5639756-7', 'Tehsil kehror paka Lodhran', '', 'house wife', '2147483647', 'No', 'OPD', 'COD', 2, 25, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-03 08:42:00', '', '', '', ''),
(10092, '0', '0', 'Tahira', 'D/O', 'Abdul Razaq', '07-03-1998', 20, 0, 0, 'B-VE', 8, 'Female', '03223-4245635-7', 'Chak no 41/DB Yazman Bahawalpur', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 26, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-03 08:53:00', '', '', '', ''),
(10093, '0', '0', 'Zareena Bibi', 'W/O', 'Allah Dita', '07-03-1973', 45, 0, 0, 'B-VE', 1, 'Female', '03212-6748374-6', 'Ahmedpur Bahawalpur', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 27, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-03 15:55:00', '', '', '', ''),
(10094, '0', '0', 'Kalsoom', 'W/O', 'Abdul Rasheed', '05-03-1978', 40, 0, 0, 'B-VE', 3, 'Female', '03212-6364986-5', 'Chak no 114 Bahawalnagar', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 29, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:07:00', '', '', '', ''),
(10095, '0', '0', 'Shamim', 'W/O', 'Naik Muhammad', '26-03-1968', 49, 0, 0, 'B-VE', 1, 'Female', '03214-5377678-8', 'Bhatta Colony Bahawalnagar', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 30, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:10:00', '', '', '', ''),
(10096, '0', '0', 'Khusheed Mai', 'W/O', 'Attah-ul-ah', '07-03-1988', 30, 0, 0, 'B-VE', 1, 'Female', '03213-1698469-8', 'Rajunpur', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 31, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:13:00', '', '', '', ''),
(10097, '0', '0', 'Attiya', 'D/O', 'Amir', '08-11-2017', 3, 0, 0, 'AB+VE', 43, 'Female', '03221-8985478-7', 'Khanpur Wahari', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 32, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:16:00', '', '', '', ''),
(10098, '0', '0', 'Maqsooda', 'W/O', 'Ramzan', '14-03-1948', 70, 0, 0, 'B+VE', 1, 'Female', '03212-6544399-5', 'Chak no 120/6R Bahawalnagar', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 33, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:19:00', '', '', '', ''),
(10099, '0', '0', 'Gulnaz', 'W/O', 'Shoukat', '21-03-1978', 40, 0, 0, 'B-VE', 1, 'Female', '03212-5674977-5', 'Muslim Town Bahawalpur', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 34, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:22:00', '', '', '', ''),
(10100, '0', '0', 'Irshad ', 'W/O', 'Riyaz', '06-03-1958', 60, 0, 0, 'AB-VE', 34, 'Female', '03213-6732768-6', 'Multan', '', 'house wife', '2147483647', 'No', 'OPD', 'OPD', 2, 35, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:28:00', '', '', '', ''),
(10101, '0', '0', 'Zareena', 'W/O', 'Nasir', '21-03-1978', 39, 0, 0, 'AB+VE', 1, 'Female', '03212-8783637-6', 'Chak no 24 Yazman Bahawalpur', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 36, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:30:00', '', '', '', ''),
(10102, '0', '0', 'Balqise', 'W/O', 'Abbas Ali', '14-03-1943', 75, 0, 0, '', 1, 'Female', '03214-5762768-8', 'Bahawalpur', '', 'house wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 37, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:33:00', '', '', '', ''),
(10103, '0', '0', 'Kineez', 'W/O', 'Afzal', '05-12-2017', 0, 0, 0, 'B+VE', 43, 'Female', '03212-5454576-7', 'Lodhran', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 38, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:35:00', '', '', '', ''),
(10104, '0', '0', 'Khundan ', 'W/O', 'Ramzan', '22-03-1963', 54, 0, 0, 'AB-VE', 1, 'Female', '03212-5565777-8', 'Ahmedpur Sharkiya Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 39, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-01 09:38:00', '', '', '', ''),
(10105, '0', '0', 'Anaraa Bibi', 'W/O', 'Jabar', '13-03-1968', 50, 0, 0, 'B+VE', 21, 'Female', '03213-3451667-6', 'Chak no12/WB Wahari', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 40, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-02 09:40:00', '', '', '', ''),
(10106, '0', '0', 'Safiya', 'W/O', 'Noor', '05-03-1970', 48, 0, 0, 'B-VE', 1, 'Female', '03212-4556772-2', 'Jhangiwala Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 93, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-02 09:48:00', '', '', '', ''),
(10107, '0', '0', 'Majeedun', 'W/O', 'Asghar Ali', '07-03-1968', 50, 0, 0, 'B-VE', 1, 'Female', '03212-5424253-6', 'Chak no 112/ED Laiya', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergncy', 2, 98, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-02 09:51:00', '', '', '', ''),
(10108, '0', '0', 'Asia', 'W/O', 'Saeed', '22-03-1988', 29, 0, 0, 'B-VE', 1, 'Female', '03212-5432553-6', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 99, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-02 09:58:00', '', '', '', ''),
(10109, '0', '0', 'Hafeeza', 'D/O', 'Abdul MAJEED', '06-03-1996', 22, 0, 0, 'AB+VE', 1, 'Female', '03213-4424552-6', 'Ward no 2 Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 100, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-03 10:03:00', '', '', '', ''),
(10110, '0', '0', 'Kousar', 'W/O', 'Irfan', '19-03-1993', 25, 0, 0, 'O+VE', 1, 'Female', '03212-1435156-7', 'Jalalpur Pir Wala Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 101, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-03 10:06:00', '', '', '', ''),
(10111, '0', '0', 'Hafsa', 'D/O', 'M.Jan', '21-03-2015', 3, 0, 0, 'B-VE', 43, 'Female', '03212-3345466-7', 'Raja pur Lodhran', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 102, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-03 10:10:00', '', '', '', ''),
(10112, '0', '0', 'Zaitoon', 'W/O', 'Azhar', '25-03-1983', 34, 0, 0, '', 1, 'Female', '03214-4256352-6', 'Chowk bahadurshah Muzafarghar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 103, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-03 10:13:00', '', '', '', ''),
(10113, '0', '0', 'Hadia', 'D/O', 'Abdulrehman', '14-03-2013', 5, 0, 0, 'B-VE', 1, 'Female', '03231-3445157-1', 'Lodhran', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 104, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-04 10:20:00', '', '', '', ''),
(10114, '0', '0', 'Sughran', 'W/O', 'Qadir', '13-03-1998', 20, 0, 0, 'B+VE', 1, 'Female', '03212-5457676-8', 'Ahmedpur Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 105, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-05 10:22:00', '', '', '', ''),
(10115, '0', '0', 'Nyab', 'D/O', 'Sameer', '16-08-2017', 0, 0, 0, 'B+VE', 43, 'Female', '03213-4255626-2', 'new sabzi mandi bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 106, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-05 10:27:00', '', '', '', ''),
(10116, '0', '0', 'rasheda', 'W/O', 'sarwar', '21-03-1990', 27, 0, 0, '', 8, 'Female', '03213-4255262-6', 'bahawalnagar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 107, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-05 10:29:00', '', '', '', ''),
(10117, '0', '0', 'hannan bibi', 'W/O', 'allah baksh', '06-03-1973', 45, 0, 0, 'B+VE', 1, 'Female', '03213-3143111-2', 'Ahmedpur east Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 108, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-05 10:31:00', '', '', '', ''),
(10118, '0', '0', 'Najiya', 'D/O', 'fate muhammad', '14-03-1980', 38, 0, 0, 'AB+VE', 1, 'Female', '03212-1445651-7', 'model town b bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 115, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-05 10:33:00', '', '', '', ''),
(10119, '0', '0', 'sarwari', 'W/O', 'hanif', '14-03-1975', 43, 0, 0, 'B+VE', 1, 'Female', '03212-5556655-4', 'ward no 10 bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 116, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-06 10:35:00', '', '', '', ''),
(10120, '0', '0', 'fiza', 'W/O', 'arif', '13-03-1978', 40, 0, 0, 'B-VE', 1, 'Female', '03212-5457897-9', 'sadiqe abad rahimyar khan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 117, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-06 10:38:00', '', '', '', ''),
(10121, '0', '0', 'zubaida', 'W/O', 'riyaz ahmed', '06-03-1983', 35, 0, 0, 'B-VE', 1, 'Female', '03213-1111234-5', 'Ahmedpur Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 118, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-06 10:40:00', '', '', '', ''),
(10122, '0', '0', 'tasleem', 'W/O', 'gh.abbas', '06-03-1960', 58, 0, 0, 'AB+VE', 1, 'Female', '03212-6543889-7', 'Jalalpur Pir Wala Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 119, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-07 10:42:00', '', '', '', ''),
(10123, '0', '0', 'mehnaz', 'W/O', 'mujahid', '07-03-1983', 35, 0, 0, 'B+VE', 1, 'Female', '03212-5487644-4', 'haider colony DG.KHAN', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 157, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 10:44:00', '', '', '', ''),
(10124, '0', '0', 'AMNA', 'W/O', 'zahid', '19-03-1970', 48, 0, 0, 'B+VE', 2, 'Female', '03212-4142612-6', 'Railway road bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 155, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 10:47:00', '', '', '', ''),
(10125, '0', '0', 'eman fatima', 'D/O', 'imtayaz', '07-02-2018', 1, 0, 0, 'A-VE', 22, 'Female', '03212-5637783-8', 'mohala gulshan bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 156, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 10:49:00', '', '', '', ''),
(10126, '0', '0', 'fatima', 'D/O', 'sajid ali', '19-12-2017', 20, 0, 0, 'B+VE', 22, 'Female', '03212-5262773-7', 'fatepur wahari', '', 'House wife', '2147483647', 'No', 'Emergency', 'peads 2', 2, 158, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 10:51:00', '', '', '', ''),
(10127, '0', '0', 'laiba', 'D/O', 'sajid', '15-03-2017', 1, 0, 0, 'B-VE', 1, 'Female', '03212-7654878-0', 'chak no 63/m multan', '', 'Nil', '2147483647', 'No', 'Emergency', 'peads 2', 2, 159, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 10:54:00', '', '', '', ''),
(10128, '0', '0', 'razia', 'W/O', 'zulfiqar', '06-03-1978', 40, 0, 0, 'B+VE', 19, 'Female', '03213-4551526-5', 'Ahmedpur Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 160, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 10:56:00', '', '', '', ''),
(10129, '0', '0', 'shazia', 'W/O', 'munir', '05-03-1986', 32, 0, 0, 'B+VE', 1, 'Female', '03212-6563768-3', 'khangah sharif bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 161, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 10:58:00', '', '', '', ''),
(10130, '0', '0', 'wazeer bibi', 'W/O', 'wahid', '22-03-1963', 54, 0, 0, 'B-VE', 1, 'Female', '03214-6627672-3', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 162, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 11:04:00', '', '', '', ''),
(10131, '0', '0', 'khadija', 'D/O', 'irshad', '', 25, 0, 0, 'A-VE', 1, 'Female', '36303-8258760-2', 'Jalalpur Pir Wala Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergncy', 2, 163, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 11:15:00', '', '', '', ''),
(10132, '0', '0', 'meena bb', 'D/O', 'imam bux', '', 50, 0, 0, 'A+VE', 1, 'Female', '12365-4780108-6', 'bury wala multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 164, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 11:18:00', '', '', '', ''),
(10133, '0', '0', 'tehmeena', 'D/O', 'mehmood', '', 22, 0, 0, 'B+VE', 1, 'Female', '12345-6784302-9', 'chaknmber11khany wal', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 165, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 11:20:00', '', '', '', ''),
(10134, '0', '0', 'amna', 'D/O', 'gh yaseen', '', 3, 0, 0, 'AB+VE', 1, 'Female', '56780-4321670-9', 'ali pur bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 166, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-08 11:23:00', '', '', '', ''),
(10135, '0', '0', 'shazia', 'W/O', 'shafique', '', 40, 0, 0, 'B-VE', 1, 'Female', '03212-2567467-3', 'bhatta no 1 bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 167, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-09 11:25:00', '', '', '', ''),
(10136, '0', '0', 'zahoor mai', 'W/O', 'ali', '', 75, 0, 0, 'B-VE', 1, 'Female', '03214-3455166-2', 'kherpur tamaywali bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 168, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-19 11:27:00', '', '', '', ''),
(10137, '0', '0', 'dua', 'D/O', 'mushtaq', '', 8, 0, 0, 'A-VE', 43, 'Female', '03213-2456677-6', 'islami nagri bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 169, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-09 11:29:00', '', '', '', ''),
(10138, '0', '0', 'sughran', 'W/O', 'sadique', '', 45, 0, 0, 'B-VE', 1, 'Female', '03212-5479854-3', 'wahari', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 170, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-09 11:31:00', '', '', '', ''),
(10139, '0', '0', 'allah bachai', 'W/O', 'Ramzan', '', 65, 0, 0, 'A-VE', 1, 'Female', '03213-5415267-6', 'Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 171, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-09 11:32:00', '', '', '', ''),
(10140, '0', '0', 'n00r-ul-nisa', 'W/O', 'nizam din', '', 95, 0, 0, 'B-VE', 1, 'Female', '03212-5167272-1', 'Bahawalnagar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 172, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-09 11:34:00', '', '', '', ''),
(10141, '0', '0', 'shamim', 'W/O', 'ahmed', '', 40, 0, 0, 'B-VE', 1, 'Female', '03212-5567282-7', 'Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 173, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-10 11:36:00', '', '', '', ''),
(10142, '0', '0', 'mukhtiyar ', 'W/O', 'ahmad buksh', '', 60, 0, 0, 'B+VE', 1, 'Female', '03213-4686797-0', 'abbasi town bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 174, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-10 11:37:00', '', '', '', ''),
(10143, '0', '0', 'sittori mai', 'W/O', 'munir', '', 25, 0, 0, 'B-VE', 1, 'Female', '03212-1556787-7', 'Bahawalnagar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 175, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-10 11:39:00', '', '', '', ''),
(10144, '0', '0', 'jameela', 'W/O', 'abdul shakeel', '', 36, 0, 0, 'A-VE', 1, 'Female', '03201-2445688-8', 'Jalalpur Pir Wala Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 176, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-10 11:40:00', '', '', '', ''),
(10145, '0', '0', 'iqra', 'D/O', 'tahir', '', 5, 0, 0, 'B+VE', 1, 'Female', '03214-4555677-7', 'Kehror paka Lodhran', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 177, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-10 11:42:00', '', '', '', ''),
(10146, '0', '0', 'shahnaz ', 'W/O', 'shakeel', '', 28, 0, 0, 'AB+VE', 1, 'Female', '03245-6768879-8', 'alipur muzafarghar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 178, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-11 11:43:00', '', '', '', ''),
(10147, '0', '0', 'rukaiya', 'D/O', 'tahseen', '', 6, 0, 0, 'AB+VE', 1, 'Female', '07276-4867588-5', 'Bahawalnagar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 179, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-11 11:44:00', '', '', '', ''),
(10148, '0', '0', 'barira', 'D/O', 'jameel', '', 13, 0, 0, 'B-VE', 1, 'Female', '05546-7437489-5', 'karachi', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 180, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-11 11:46:00', '', '', '', ''),
(10149, '0', '0', 'noreen', 'W/O', 'irfan', '', 33, 0, 0, 'B-VE', 1, 'Female', '04245-4325656-7', 'hasilpur bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 181, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-11 11:48:00', '', '', '', ''),
(10150, '0', '0', 'imtiaz bibi', 'D/O', 'nadir', '', 12, 0, 0, '', 1, 'Female', '08667-4432445-5', 'bahawalnagar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 182, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-12 11:49:00', '', '', '', ''),
(10151, '0', '0', 'zaniab', 'W/O', 'rasheed ahmed', '', 75, 0, 0, 'B+VE', 1, 'Female', '08276-3757445-5', 'Bahawalnagar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 183, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-12 11:51:00', '', '', '', ''),
(10152, '0', '0', 'ummahima', 'D/O', 'akbar', '', 4, 0, 0, 'B+VE', 1, 'Female', '09277-3873335-5', 'Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 184, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-12 11:53:00', '', '', '', ''),
(10153, '0', '0', 'samreen', 'W/O', 'imran', '', 25, 0, 0, 'B+VE', 1, 'Female', '09827-3673564-5', 'bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 185, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-12 12:03:00', '', '', '', ''),
(10154, '0', '0', 'shamim', 'D/O', 'gh.fareed', '', 23, 0, 0, 'B-VE', 1, 'Female', '08873-5646243-4', 'Jalalpur Pir Wala Multan', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 186, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-12 12:04:00', '', '', '', ''),
(10155, '0', '0', 'nasreen', 'W/O', 'Asghar Ali', '', 38, 0, 0, 'B-VE', 1, 'Female', '09982-9273827-3', 'yazman bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 187, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-12 12:07:00', '', '', '', ''),
(10156, '0', '0', 'amna', 'D/O', 'Abdul MAJEED', '', 17, 0, 0, 'AB+VE', 1, 'Female', '77828-7378378-9', 'chak no A/R Khanaywal', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 188, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-13 12:11:00', '', '', '', ''),
(10157, '0', '0', 'baby girl arshd', 'D/O', 'arsgad', '', 2, 0, 0, 'B+VE', 2, 'Female', '98978-7867657-7', 'alipur muzafharghr', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 189, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-13 12:14:00', '', '', '', ''),
(10158, '0', '0', 'zanib', 'D/O', 'nadeem', '', 4, 0, 0, 'B+VE', 43, 'Female', '00808-9786785-7', 'kousar colony bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 190, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-14 12:22:00', '', '', '', ''),
(10159, '0', '0', 'naseem', 'W/O', 'ahmad', '', 30, 0, 0, 'AB+VE', 1, 'Female', '75678-5343547-8', 'bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 191, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:24:00', '', '', '', ''),
(10160, '0', '0', 'Kousar', 'W/O', 'yaseen', '', 30, 0, 0, 'AB+VE', 1, 'Female', '99778-6564555-7', 'kherpur tamaywali bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 192, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:26:00', '', '', '', ''),
(10161, '0', '0', 'farwah', 'D/O', 'shahid', '', 1, 0, 0, 'B-VE', 1, 'Female', '97767-5654534-2', 'rahimyar khan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 193, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:28:00', '', '', '', ''),
(10162, '0', '0', 'tahira', 'W/O', 'mushtaq', '', 40, 0, 0, 'B-VE', 1, 'Female', '88654-5321670-0', 'Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 194, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:30:00', '', '', '', ''),
(10163, '0', '0', 'nasreen', 'W/O', 'Shoukat', '', 35, 0, 0, 'AB+VE', 1, 'Female', '78434-9300344-2', 'Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 195, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:32:00', '', '', '', ''),
(10164, '0', '0', 'sughran', 'W/O', 'abduljabar', '', 70, 0, 0, 'AB+VE', 1, 'Female', '88347-6384094-0', 'chistiyun', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 196, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:34:00', '', '', '', ''),
(10165, '0', '0', 'rasheedun', 'W/O', 'khan', '', 48, 0, 0, '', 1, 'Female', '98664-2312433-6', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'OPD', 'emergency', 2, 197, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:36:00', '', '', '', ''),
(10166, '0', '0', 'rasheedun', 'W/O', 'khan', '', 48, 0, 0, 'B+VE', 1, 'Female', '08877-5645354-2', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 198, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 12:37:00', '', '', '', ''),
(10167, '0', '0', 'zahra', 'W/O', 'gh.hussain', '', 38, 0, 0, 'AB-VE', 1, 'Female', '94790-4098098-0', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 199, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 13:08:00', '', '', '', ''),
(10168, '0', '0', 'shakeela', 'W/O', 'akram', '', 50, 0, 0, 'B+VE', 1, 'Female', '98487-9304039-4', 'mossa khail', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 200, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 13:16:00', '', '', '', ''),
(10169, '0', '0', 'beboo mai', 'W/O', 'kaloo khan', '', 50, 0, 0, 'B-VE', 1, 'Female', '88739-9803030-9', 'sahiwal', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 201, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-15 13:17:00', '', '', '', ''),
(10170, '0', '0', 'shamim', 'W/O', 'shabir', '', 50, 0, 0, 'B+VE', 1, 'Female', '08979-7864744-5', 'melshi', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 202, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-16 13:18:00', '', '', '', ''),
(10171, '0', '0', 'sadia', 'W/O', 'shahzad', '', 28, 0, 0, 'B+VE', 1, 'Female', '95667-2342674-9', 'yazman bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 203, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-16 13:19:00', '', '', '', ''),
(10172, '0', '0', 'amna', 'D/O', 'bilal', '', 1, 0, 0, 'B+VE', 1, 'Female', '08726-7537783-4', 'bahawalnagar', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 204, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-16 13:21:00', '', '', '', ''),
(10173, '0', '0', 'khursheed', 'W/O', 'tahir', '', 50, 0, 0, 'B-VE', 3, 'Female', '97604-8069065-4', 'kherpur tamaywali bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 205, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-16 13:22:00', '', '', '', ''),
(10174, '0', '0', 'rukiya', 'W/O', 'ilyas', '', 40, 0, 0, 'B-VE', 1, 'Female', '87900-9495908-5', 'sialkot', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 206, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-16 13:24:00', '', '', '', ''),
(10175, '0', '0', 'dua', 'D/O', 'afzal', '', 4, 0, 0, 'B-VE', 1, 'Female', '00987-3864864-6', 'wahari', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 207, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-16 13:26:00', '', '', '', ''),
(10176, '0', '0', 'shahzadi', 'W/O', 'arif', '', 25, 0, 0, 'AB+VE', 1, 'Female', '09373-7848939-5', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 208, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-16 13:28:00', '', '', '', ''),
(10177, '0', '0', 'zaiba ', 'D/O', 'salam', '', 3, 0, 0, 'B+VE', 1, 'Female', '98498-0394344-5', 'Kehror paka Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 209, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-17 13:41:00', '', '', '', ''),
(10178, '0', '0', 'hina', 'D/O', 'sajad', '', 2, 0, 0, 'B+VE', 1, 'Female', '99378-4675672-2', 'sadiqe abad rahimyar khan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 210, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 13:42:00', '', '', '', ''),
(10179, '0', '0', 'nasreen', 'W/O', 'noor elahi', '', 35, 0, 0, 'AB-VE', 2, 'Female', '08397-9564387-5', 'karachi mor bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 211, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 13:44:00', '', '', '', ''),
(10180, '0', '0', 'arshia', 'D/O', 'shahid', '', 12, 0, 0, 'B+VE', 1, 'Female', '09605-8986875-6', 'khan bazar bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 212, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 13:46:00', '', '', '', ''),
(10181, '0', '0', 'yasmeen', 'D/O', 'ramzan', '', 13, 0, 0, 'B+VE', 1, 'Female', '87589-4857486-7', 'alipur muzafarghar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 213, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:21:00', '', '', '', ''),
(10182, '0', '0', 'kanwal', 'D/O', 'zubair', '', 6, 0, 0, 'A-VE', 1, 'Female', '88365-6499345-6', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 214, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:23:00', '', '', '', ''),
(10183, '0', '0', 'baby girl ejaz', 'D/O', 'ejaz', '', 1, 0, 0, 'AB-VE', 1, 'Female', '09849-9758758-6', 'muzafharghar', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 215, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:24:00', '', '', '', ''),
(10184, '0', '0', 'shehnaz', 'W/O', 'akmal', '', 35, 0, 0, 'B-VE', 1, 'Female', '99478-3874983-7', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 216, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:26:00', '', '', '', ''),
(10185, '0', '0', 'zaniab bibi', 'D/O', 'muzamil', '', 5, 0, 0, 'A-VE', 1, 'Female', '97498-7389536-5', 'muzafahrghar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 217, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:27:00', '', '', '', ''),
(10186, '0', '0', 'shazia', 'D/O', 'rafique', '', 16, 0, 0, 'B-VE', 4, 'Female', '80589-3745934-7', 'wahari', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 218, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:29:00', '', '', '', ''),
(10187, '0', '0', 'ameer bib', 'W/O', 'allah ditta', '', 25, 0, 0, 'B+VE', 1, 'Female', '89749-3275097-3', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 219, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:30:00', '', '', '', ''),
(10188, '0', '0', 'rasoolun bibi', 'W/O', 'mushtaq', '', 55, 0, 0, 'B+VE', 1, 'Female', '09083-2490738-7', 'chak no 72/DB Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 220, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:32:00', '', '', '', ''),
(10189, '0', '0', 'manzoor bibi', 'W/O', 'abdul karim', '', 55, 0, 0, 'B-VE', 1, 'Female', '09503-4850976-8', 'sadiqe abad rahimyar khan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 221, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-18 08:33:00', '', '', '', ''),
(10190, '0', '0', 'sumera', 'W/O', 'waheed', '', 32, 0, 0, 'B+VE', 1, 'Female', '08348-0937489-6', 'chak no106 yazman bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 222, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-20 08:34:00', '', '', '', ''),
(10191, '0', '0', 'ashran', 'W/O', 'saeed ahmed', '', 45, 0, 0, 'B+VE', 1, 'Female', '09650-8096798-7', 'wahari', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 223, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-21 08:36:00', '', '', '', ''),
(10192, '0', '0', 'fozia', 'D/O', 'hussain', '', 14, 0, 0, 'B+VE', 1, 'Female', '89798-2749863-8', 'akramabad rahimyar khan', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 224, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-21 08:38:00', '', '', '', ''),
(10193, '0', '0', 'areeba', 'D/O', 'sadiqe', '', 7, 0, 0, 'B+VE', 1, 'Female', '98790-5740959-0', 'Ahmedpur east Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 225, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-21 08:39:00', '', '', '', ''),
(10194, '0', '0', 'rukhsana', 'W/O', 'zafar', '', 30, 0, 0, 'B-VE', 1, 'Female', '78974-8903705-7', 'Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 226, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-20 08:41:00', '', '', '', ''),
(10195, '0', '0', 'safiya', 'D/O', 'wazeer', '', 13, 0, 0, 'B-VE', 1, 'Female', '97490-7907097-9', 'Bahawalnagar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 227, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-22 08:43:00', '', '', '', ''),
(10196, '0', '0', 'sakoo mai', 'W/O', 'gh.muhammad', '', 60, 0, 0, 'A-VE', 1, 'Female', '90890-8509478-0', 'Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 228, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-22 08:53:00', '', '', '', ''),
(10197, '0', '0', 'baby girl rafique', 'D/O', 'rafique', '', 15, 0, 0, 'A-VE', 1, 'Female', '98759-0347609-7', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 229, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-22 08:55:00', '', '', '', ''),
(10198, '0', '0', 'taiba', 'D/O', 'niyaz', '', 2, 0, 0, 'AB+VE', 43, 'Female', '87797-0560866-7', 'Lodhran', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 230, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-22 08:56:00', '', '', '', ''),
(10199, '0', '0', 'ansar bibi', 'W/O', 'khuda baksh', '', 40, 0, 0, 'B-VE', 1, 'Female', '87596-3456346-4', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 231, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-22 08:58:00', '', '', '', ''),
(10200, '0', '0', 'fozia', 'W/O', 'sarwar', '', 45, 0, 0, 'A-VE', 1, 'Female', '96890-7748885-9', 'muzafharghar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 232, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-23 09:00:00', '', '', '', ''),
(10201, '0', '0', 'kaneez', 'W/O', 'ashraf', '', 50, 0, 0, 'B+VE', 1, 'Female', '89709-3278905-7', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 233, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-23 09:02:00', '', '', '', ''),
(10202, '0', '0', 'baby girl akhtar', 'D/O', 'akhtar', '', 1, 0, 0, 'B-VE', 43, 'Female', '98857-9327594-3', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'OPD', 2, 234, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-24 09:11:00', '', '', '', ''),
(10203, '0', '0', 'alina', 'D/O', 'rab nawaz', '', 1, 0, 0, 'A+VE', 43, 'Female', '31202-5563563-7', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 235, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-24 09:13:00', '', '', '', ''),
(10204, '0', '0', 'ruksana', 'W/O', 'azam', '', 40, 0, 0, 'A+VE', 1, 'Female', '31202-7687848-7', 'liaquatpur rahimyar khan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 236, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-25 09:15:00', '', '', '', ''),
(10205, '0', '0', 'haseeba', 'D/O', 'munir ahmed', '', 3, 0, 0, 'A+VE', 1, 'Female', '31202-8859776-4', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 237, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-25 09:19:00', '', '', '', ''),
(10206, '0', '0', 'parveen', 'W/O', 'arshsd ahmed', '', 25, 0, 0, 'B+VE', 8, 'Female', '31202-7768457-7', 'Ahmedpur Sharkiya Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 238, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-25 09:21:00', '', '', '', ''),
(10207, '0', '0', 'asiaa', 'W/O', 'Saeed', '', 30, 0, 0, 'AB+VE', 1, 'Female', '31202-7764757-8', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 239, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-25 09:23:00', '', '', '', ''),
(10208, '0', '0', 'sehla', 'D/O', 'bilal', '', 9, 0, 0, 'B+VE', 43, 'Female', '31202-7748487-8', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 240, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-25 09:24:00', '', '', '', ''),
(10209, '0', '0', 'rubina', 'W/O', 'haroon', '', 25, 0, 0, 'AB+VE', 1, 'Female', '31202-7767859-9', 'fote abbas', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 241, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-26 09:26:00', '', '', '', ''),
(10210, '0', '0', 'hajran bibi', 'D/O', 'mansaqh', '', 8, 0, 0, '', 1, 'Female', '31202-8877478-9', 'bahawalnagar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 242, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-26 09:28:00', '', '', '', ''),
(10211, '0', '0', 'naseem', 'W/O', 'Ramzan', '', 45, 0, 0, 'A+VE', 1, 'Female', '31202-7779949-4', 'Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 243, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-20 09:30:00', '', '', '', ''),
(10212, '0', '0', 'shazia', 'D/O', 'zaffar', '', 3, 0, 0, 'B+VE', 1, 'Female', '31202-8845764-4', 'Lodhran', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 244, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-27 09:31:00', '', '', '', ''),
(10213, '0', '0', 'amna', 'D/O', 'abdul jabar', '', 8, 0, 0, 'A+VE', 1, 'Female', '31202-7757656-7', 'wahari', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 245, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-01-27 09:32:00', '', '', '', ''),
(10214, '0', '0', 'M.Tayyab', 'S/O', 'Mukhtiar Hussain', '30-04-1992', 25, 0, 0, 'O+VE', 25, 'Male', '31102-7249370-9', 'Bahawalnagar', '', 'shop keeper', '2147483647', 'No', 'Emergency', 'Eye ward', 1, 147, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-01 13:15:00', '', '', '', ''),
(10216, '0', '0', 'M.Azhar', 'S/O', 'M.Afzal', '02-04-1999', 18, 0, 0, 'B+VE', 6, 'Male', '31201-6557609-1', 'Bahawalpur', '', 'Worker', '2147483647', 'No', 'Emergency', 'emergency', 1, 148, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-18 14:00:00', '', '', '', ''),
(10217, '0', '0', 'Abu Bakar', 'S/O', 'Ramzan', '05-03-2001', 17, 0, 0, 'A+VE', 6, 'Male', '03027-347051', 'Vehari', '', 'Acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 149, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-19 04:15:00', '', '', '', ''),
(10218, '0', '0', 'Imam Bux', 'S/O', 'Kareem Bux', '07-03-1948', 70, 0, 0, 'AB+VE', 1, 'Male', '31202-1236649-7', 'Bahawalpur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 150, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 09:19:00', '', '', '', ''),
(10219, '0', '0', 'Zafar Iqbal', 'S/O', 'Faiz Bux', '05-01-1979', 39, 0, 0, 'A+VE', 5, 'Male', '36602-6260756-1', 'Vehari', '', 'BUSINESS MAN', '2147483647', 'No', 'Emergency', 'EMERGENCY', 1, 151, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 10:20:00', '', '', '', ''),
(10220, '0', '0', 'Gh.Mustafa', 'S/O', 'Nawab', '04-01-1958', 60, 0, 0, 'O+VE', 8, 'Male', '31202-7034811-1', 'Chistian', '', 'fag', '2147483647', 'No', 'Emergency', 'emergency', 1, 152, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-19 10:31:00', '', '', '', '');
INSERT INTO `admissiontbl` (`regNo`, `emergency_no`, `admi_no`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patMonthAge`, `patDaysAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patcity`, `patOccupation`, `patPhone`, `patEntitled`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patChart_id`, `patStatus`, `patient_pic_path`, `FreeCarePatient`, `admission_timestamp`, `previousRegno`, `sideRoomDate`, `patAdmDate`, `garName`, `garCnic`, `garContact`, `garRelation`) VALUES
(10221, '0', '0', 'M. Iftikhar', 'S/O', 'Gh. Muhammad', '01-01-1955', 63, 0, 0, 'A+VE', 3, 'Male', '31202-0318630-9', 'Bwp', '', 'FAG', '2147483647', 'Yes', 'Emergency', 'emergency', 4, 68, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 10:42:00', '', '', '', ''),
(10222, '0', '0', 'M. Iftikhar', 'S/O', 'Gh. Muhammad', '01-01-1955', 63, 0, 0, 'A+VE', 3, 'Male', '31202-0318630-9', 'Bahawalpur', '', 'FAG', '2147483647', 'Yes', 'Emergency', 'emergency', 4, 67, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 10:54:00', '', '', '', ''),
(10223, '0', '0', 'Haleema', 'D/O', 'Waseem', '01-03-2017', 1, 0, 0, 'A+VE', 1, 'Female', '36203-8941961-5', 'Lodhran', '', 'DRIVER', '2147483647', 'No', 'Emergency', 'emergency', 2, 246, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 11:03:00', '', '', '', ''),
(10224, '0', '0', 'M.Yaseen', 'S/O', 'M.Zaffar', '12-03-1991', 27, 0, 0, 'A+VE', 6, 'Male', '36203-0332023-9', 'Lodhran', '', 'student', '2147483647', 'No', 'Emergency', 'emergency', 3, 41, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 11:38:00', '', '', '', ''),
(10225, '0', '0', 'M.Farooq', 'S/O', 'Zahoor', '01-03-1993', 25, 0, 0, 'A+VE', 1, 'Male', '31205-1297131-9', 'Yazman Bwp', '', 'sarvant', '2147483647', 'No', 'Emergency', 'emergency', 3, 42, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 11:48:00', '', '', '', ''),
(10226, '0', '0', 'Manzoor', 'S/O', 'Allah Bux ', '03-07-1953', 64, 0, 0, 'A+VE', 13, 'Male', '36602-1036668-3', 'MALSI Vehari', '', 'Mastri', '2147483647', 'No', 'Emergency', 'emergency', 3, 43, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-21 12:01:00', '', '', '', ''),
(10227, '0', '0', 'Abdul Rehman  ', 'S/O', 'M .Kashif ', '13-02-2013', 5, 0, 0, 'A+VE', 8, 'Male', '32301-8539771', 'Ali pur Mazafar ghar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 153, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-22 08:44:00', '', '', '', ''),
(10228, '0', '0', 'M.Asad ', 'S/O', 'M.Ashiq ', '12-02-2017', 1, 0, 0, 'A+VE', 43, 'Male', '31302-7950608', 'rahimyar khan', '', 'acred', '2147483647', 'No', 'OPD', 'emergency', 2, 247, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-22 12:56:00', '', '', '', ''),
(10229, '0', '0', 'Sajjad ', 'S/O', 'Faqeer HUSSAIN', '12-04-1977', 40, 0, 0, 'O+VE', 6, 'Male', '31203-5918729', 'Bahawalpur', '', 'FERTILIZER SHOP', '300', 'No', 'Emergency', 'emergency', 1, 154, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-22 13:11:00', '', '', '', ''),
(10230, '0', '0', 'M.Saifal', 'S/O', 'Mehboob Ahmad', '01-06-1996', 21, 0, 0, 'A+VE', 7, 'Male', '31202-4385366-6', 'Bahawalpur', '', 'MILL LINE MAN', '2147483647', 'No', 'Emergency', 'emergency', 1, 263, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-22 13:24:00', '', '', '', ''),
(10231, '0', '0', 'M.Shabir', 'S/O', 'M.Shafi', '26-08-1973', 44, 0, 0, 'A+VE', 8, 'Male', '31103-1152205-7', 'Fortaabbas Bahawal nagr', '', 'acred', '343587000', 'Yes', 'Emergency', 'emergency', 1, 264, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-20 12:31:00', '', '', '', ''),
(10232, '0', '0', 'Dilshad', 'S/O', 'M.Nawaz  ', '23-07-88', 29, 0, 0, 'AB+VE', 7, 'Male', '31205-0862532-9', 'Yazman Bwp', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 265, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-06 12:42:00', '', '', '', ''),
(10233, '0', '0', 'Gh.SADIQ', 'S/O', 'Gh. Hassan', '02-03-1958', 60, 0, 0, 'A+VE', 8, 'Male', '32302-0304796-3', 'muzafharghar', '', 'tracter work', '2147483647', 'No', 'Emergency', 'emergency', 1, 266, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-24 09:41:00', '', '', '', ''),
(10234, '0', '0', 'Halima', 'D/O', 'Gul Khan', '01-02-2017', 1, 0, 0, 'A+VE', 43, 'Female', '31202-3002742-5', 'Bwp', '', 'Gate Keeper', '2147483647', 'No', 'OPD', 'emergency', 2, 248, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-24 10:25:00', '', '', '', ''),
(10235, '0', '0', 'M.Shafique', 'S/O', 'M. Hanif', '03-04-1963', 54, 0, 0, 'A+VE', 10, 'Male', '31205-4827891-7', 'Bwp', '', 'Shop Keepr', '2147483647', 'Yes', 'Emergency', 'emergency', 1, 267, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-24 10:32:00', '', '', '', ''),
(10236, '0', '0', 'Danial', 'S/O', 'Khalid', '05-06-2006', 11, 0, 0, 'A+VE', 1, 'Male', '31102-5465186-1', 'chistian bwlngr', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 268, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-24 10:40:00', '', '', '', ''),
(10237, '0', '0', 'surayya   ', 'D/O', 'Hamid', '04-09-1996', 21, 0, 0, 'A+VE', 1, 'Female', '31202-6425774-9', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 249, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-24 11:06:00', '', '', '', ''),
(10238, '0', '0', 'Aiman', 'D/O', 'M.Shakeel', '03-01-2013', 5, 0, 0, 'A+VE', 1, 'Female', '31202-0235612-1', 'Bwp', '', 'pharmasit', '2147483647', 'No', 'Emergency', 'emergency', 2, 250, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-24 11:35:00', '', '', '', ''),
(10239, '0', '0', 'Kareem Bibi', 'W/O', 'M.Zafar', '02-05-1983', 34, 0, 0, 'A+VE', 13, 'Female', '31302-0582963-9', 'Liaqat Pur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 251, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-25 10:42:00', '', '', '', ''),
(10240, '0', '0', 'Imran ', 'S/O', 'M.Sharif', '10-03-1996', 22, 0, 0, 'A+VE', 8, 'Male', '31102-5026266-3', 'Bahawalnagar', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 275, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-25 11:27:00', '', '', '', ''),
(10241, '0', '0', 'Zainab', 'W/O', 'Mushtaq', '01-02-1973', 45, 0, 0, 'A+VE', 1, 'Female', '36203-6067094-9', 'Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 252, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-25 13:20:00', '', '', '', ''),
(10242, '0', '0', 'Abdul Majeed', 'S/O', 'Khuda Bux', '02-04-1953', 64, 0, 0, 'A+VE', 8, 'Male', '31203-5746196-1', 'Hasil Pur Bwp', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 269, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-25 13:30:00', '', '', '', ''),
(10243, '0', '0', 'M.Javeed', 'S/O', 'Pir Bux', '01-01-1990', 28, 0, 0, 'A+VE', 19, 'Male', '36203-0708147-7', 'Lodhran', '', 'Nill', '2147483647', 'No', 'OPD', 'emergency', 3, 44, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-26 09:35:00', '', '', '', ''),
(10244, '0', '0', 'Kalsoom', 'W/O', 'M.Majeed', '01-05-1983', 34, 0, 0, 'A+VE', 1, 'Female', '31202-1944317-7', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 253, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-26 11:13:00', '', '', '', ''),
(10245, '0', '0', 'Frukh Sultan', 'S/O', 'M Sharif', '13-05-1949', 68, 0, 0, 'AB+VE', 25, 'Male', '35202-1899492-3', 'Bahawalnagar', '', 'Retaired', '2147483647', 'No', 'OPD', 'emergency', 3, 45, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-26 12:33:00', '', '', '', ''),
(10246, '0', '0', 'Farzana', 'W/O', 'M.Iqbal', '19-06-1992', 25, 0, 0, 'A+VE', 23, 'Female', '36104-4178633-8', 'Khanewal', '', 'House wife', '2147483647', 'No', 'OPD', 'emergency', 2, 254, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-26 13:44:00', '', '', '', ''),
(10247, '0', '0', 'Amnan', 'S/O', 'M.Irfan', '01-02-2006', 12, 0, 0, 'O+VE', 1, 'Male', '31205-0720727-7', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 270, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-26 13:52:00', '', '', '', ''),
(10248, '0', '0', 'Safia   ', 'W/O', 'H.Gh.Rasool', '01-02-1948', 70, 0, 0, 'A+VE', 43, 'Female', '31302-2137688-5', 'rahimyar khan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 255, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 09:31:00', '', '', '', ''),
(10249, '0', '0', 'Ayesha', 'D/O', 'M.Qasim', '01 02 2012', 6, 0, 0, 'A+VE', 1, 'Female', '31205-5304425-1', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 256, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 10:08:00', '', '', '', ''),
(10250, '0', '0', 'M.Ishfaq', 'S/O', 'M.Mushtaq', '30-01-1987', 31, 0, 0, 'A+VE', 1, 'Male', '31201-0231139-1', 'Ahmedpur Bahawalpur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 271, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 10:11:00', '', '', '', ''),
(10251, '0', '0', 'Mubashir', 'S/O', 'Akmal', '04-02-1991', 27, 0, 0, 'A+VE', 19, 'Male', '31202-6263833-0', 'Bahawalpur', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 3, 46, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 11:21:00', '', '', '', ''),
(10252, '0', '0', 'Shela', 'D/O', 'Jind Wada', '02-01-2010', 8, 0, 0, 'A+VE', 1, 'Female', '31202-6142844-0', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 257, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 12:01:00', '', '', '', ''),
(10253, '0', '0', 'Gh.Mustafa', 'S/O', 'Siraj Khan', '02-05-1968', 49, 0, 0, 'A+VE', 10, 'Male', '36202-0950560-9', 'Bahawalpur', '', 'fag', '2147483647', 'No', 'Emergency', 'emergency', 3, 47, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 12:11:00', '', '', '', ''),
(10254, '0', '0', 'Imtiaz', 'S/O', 'Jan M.', '02-05-1982', 35, 0, 0, 'A+VE', 1, 'Male', '36602-6295558-1', 'Malsi Vehari', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 272, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 12:20:00', '', '', '', ''),
(10255, '0', '0', 'Qaddar bibi', 'W/O', 'Jumma Gull', '02-01-1958', 60, 0, 0, 'A+VE', 43, 'Female', '15602-0307420-0', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 258, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 12:27:00', '', '', '', ''),
(10257, '0', '0', 'shakeel', 'S/O', 'muhmmad ramzan', '', 25, 0, 0, '', 12, 'Male', '31302-1501820-1', 'jhok gulab dist rhimyarkhan', '', 'Labour', '2147483647', 'Yes', 'Emergency', 'emergency', 1, 274, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 23:30:00', '', '', '', ''),
(10258, '0', '0', 'gh mustafa', 'S/O', 'siraj khan', '', 49, 0, 0, '', 10, 'Male', '36202-0950560-9', 'bahawalpur', '', 'fag', '2147483647', 'Yes', 'Emergency', 'emergency', 1, 276, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-27 12:15:00', '', '', '', ''),
(10259, '0', '0', 'Abdul Ghafoor', 'S/O', 'M.Nawaz', '02-05-1983', 34, 0, 0, 'A+VE', 10, 'Male', '31203-4717144-9', 'Bahawalpur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 277, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-28 09:46:00', '', '', '', ''),
(10260, '0', '0', 'akbar', 'S/O', 'naveed', '02-03-2013', 5, 0, 0, 'A+VE', 1, 'Male', '31204-5892082-1', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 278, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 09:52:10', NULL, NULL, '2018-03-28 12:29:00', '', '', '', ''),
(10261, '0', '0', 'Ali Husnain', 'S/O', 'M.Ali', '01-02-1996', 22, 0, 0, 'B+VE', 4, 'Male', '36613-1634159', 'Bhuray Wala', '', 'Government apply in wapda', '2147483647', 'No', 'Emergency', 'emergency', 3, 48, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-28 12:36:00', '', '', '', ''),
(10262, '0', '0', 'M.Yar', 'S/O', 'Ahmad Din', '01-03-1957', 61, 0, 0, 'A+VE', 1, 'Male', '31102-3200445-3', 'Bahawalnagar', '', 'Fag', '2147483647', 'No', 'Emergency', 'emergency', 1, 279, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-28 13:21:00', '', '', '', ''),
(10263, '0', '0', 'M.Yar', 'S/O', 'Ahmad Din', '01-03-1957', 61, 0, 0, 'A+VE', 1, 'Male', '31102-3200445-3', 'Bahawalnagar', '', 'fag', '2147483647', 'No', 'Emergency', 'emergency', 1, 280, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 09:43:00', '', '', '', ''),
(10264, '0', '0', 'Zulfaqar', 'S/O', 'M.Aslam', '17-02-1992', 26, 0, 0, 'A+VE', 13, 'Male', '36602-8594272-1', 'Malsi Vehari', '', 'Islami Book SAle', '2147483647', 'No', 'Emergency', 'emergency', 1, 281, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 09:58:00', '', '', '', ''),
(10265, '0', '0', 'M.Shahid', 'S/O', 'Allah Ditta', '01-03-2006', 12, 0, 0, 'A+VE', 43, 'Male', '36301-1331238-5', 'Jalal Pur Peer Wala Multan', '', 'Student', '2147483647', 'No', 'OPD', 'emergency', 2, 259, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 10:26:00', '', '', '', ''),
(10266, '0', '0', 'Abdul Sattar', 'S/O', 'Faiz Bux', '01-03-1968', 50, 0, 0, 'A+VE', 1, 'Male', '31103-1357086-9', 'Bahawalnagar', '', 'acred', '2147483647', 'No', 'Emergency', 'medical 3', 3, 49, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 10:49:00', '', '', '', ''),
(10267, '0', '0', 'M Shafique', 'S/O', 'Gh.Nabi', '01-01-1982', 36, 0, 0, 'A+VE', 25, 'Male', '31201-6915024-7', 'Ahamd pur East Bwp', '', 'Acred', '2147483647', 'No', 'OPD', 'emergency', 3, 50, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 11:00:00', '', '', '', ''),
(10268, '0', '0', 'Haleem', 'S/O', 'M.Rafique', '01-02-2012', 6, 0, 0, 'A+VE', 7, 'Male', '31102-4684455-3', 'Bahawalnagar', '', 'Student', '2147483647', 'No', 'OPD', 'emergency', 2, 260, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 11:07:00', '', '', '', ''),
(10269, '0', '0', 'Shoukat', 'S/O', 'Khursheed', '01-12-1950', 67, 0, 0, 'B+VE', 34, 'Male', '31302-6609971-7', 'rahimyar khan', '', 'acred', '2147483647', 'No', 'OPD', 'emergency', 4, 65, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 11:11:00', '', '', '', ''),
(10270, '0', '0', 'Tahira', 'D/O', 'Imam Bux', '01-03-2001', 17, 0, 0, 'A+VE', 34, 'Female', '31201-1176891-8', 'Bwp', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 2, 261, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 11:23:00', '', '', '', ''),
(10271, '0', '0', 'Manzoor Ahmad', 'S/O', 'Raheem Bux', '15-05-1940', 77, 0, 0, 'A+VE', 34, 'Male', '32304-2256733-1', 'muzafharghar', '', 'acred', '2147483647', 'No', 'OPD', 'OPD', 3, 51, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 11:40:00', '', '', '', ''),
(10272, '0', '0', 'M.Akhter', 'S/O', 'Allah Bachaya', '01-02-1973', 45, 0, 0, 'A+VE', 34, 'Male', '36203-1464357-9', 'Lodhran', '', 'Tea Shop', '2147483647', 'No', 'OPD', 'OPD', 3, 52, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-03-29 11:56:00', '', '', '', ''),
(10273, '0', '0', 'Ali Asadullah', 'S/O', 'Nazeer Ahamed', '01-02-1996', 22, 0, 0, 'A+VE', 8, 'Male', '31203-2746037-5', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 282, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-04-01 20:36:00', '', '', '', ''),
(10274, '0', '0', 'Hameeda Bibi', 'W/O', 'Hameed', '01-02-1978', 40, 0, 0, 'A+VE', 18, 'Female', '31203-7700771-8', 'Hasil Pur Bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'Medical 2', 2, 262, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-02-23 23:27:00', '', '', '', ''),
(10275, '0', '0', 'M.Ameer', 'S/O', 'Atta Muhammad', '01-03-1978', 40, 0, 0, 'A+VE', 1, 'Male', '31203-4334124-7', 'Bahawalpur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 283, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-04-02 20:47:00', '', '', '', ''),
(10276, '0', '0', 'Zawar', 'S/O', 'Faiz Muhammad', '01-02-1988', 30, 0, 0, 'A+VE', 8, 'Male', '31203-1719330-7', 'Hasil Pur Bwp', '', 'Mobile Sarvice', '306981400', 'No', 'Emergency', 'emergency', 1, 284, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-04-02 23:06:00', '', '', '', ''),
(10277, '0', '0', 'shahid', 'S/O', 'Huq nawaz', '09-04-1983', 34, 0, 0, 'A+VE', 1, 'Male', '31204-4017986-4', 'kherpur tamaywali bwp', '', 'Acred', '2147483647', 'No', 'Emergency', 'emergncy', 1, 285, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 09:52:10', NULL, NULL, '2018-04-03 01:15:00', '', '', '', ''),
(10278, '0', '0', 'Asma', 'W/O', 'Murad', '', 30, 0, 0, '', 1, 'Female', '31203-7478903-5', 'Hasil Pur Bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 3, 53, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 10:07:24', NULL, NULL, '2018-04-04 10:05:00', '', '', '', ''),
(10281, '0', '0', 'Haseeb', 'S/O', 'M.Azam', '01-02-2014', 4, 0, 0, 'A+VE', 8, 'Male', '36304-8070064-3', 'Shujaabad Multan', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 273, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 20:54:58', NULL, NULL, '2018-04-04 20:47:00', '', '', '', ''),
(10282, '0', '0', 'Mavia', 'D/O', 'Shafiq Ahmad', '01-03-2016', 2, 0, 0, 'A+VE', 43, 'Female', '31201-9680471-1', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 286, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-04 22:53:34', NULL, NULL, '2018-04-04 21:47:00', '', '', '', ''),
(10283, '0', '0', 'Fozia', 'W/O', 'Abdul Rehman', '', 25, 0, 0, '', 8, 'Female', '03121-5545476-6', 'kherpur tamaywali bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 605, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 10:13:10', NULL, NULL, '2018-04-05 10:08:00', '', '', '', ''),
(10284, '0', '0', 'Arif', 'S/O', 'Hassan', '', 57, 0, 0, '', 8, 'Male', '31104-9655229-9', 'Haroonabad Bahawalnagar', '', 'Farmer', '2147483647', 'No', 'OPD', 'OPD', 1, 287, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 10:23:19', NULL, NULL, '2018-04-05 10:21:00', '', '', '', ''),
(10285, '0', '0', 'Abdul Hadi', 'S/O', 'Umer', '', 3, 0, 0, '', 1, 'Male', '03520-2579625-3', 'House no H-14 Lahore', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 606, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 10:26:53', NULL, NULL, '2018-04-05 10:24:00', '', '', '', ''),
(10286, '0', '0', 'amna', 'D/O', 'hyrthyt', '', 6, 0, 0, '', 1, 'Female', '56756-8679780-9', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 288, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 10:30:09', NULL, NULL, '2018-04-05 10:28:00', '', '', '', ''),
(10287, '0', '0', 'Shahbaz', 'S/O', 'Lal Muhammad', '', 8, 0, 0, '', 22, 'Male', '31202-9645172-7', 'Ahmedpur east Bahawalpur', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 1, 289, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 11:48:30', NULL, NULL, '2018-04-05 10:35:00', '', '', '', ''),
(10288, '0', '0', 'Rasheed', 'W/O', 'Abdul Wahad', '', 55, 0, 0, '', 34, 'Female', '36602-8588417-7', 'wahari', '', 'Farmer', '2147483647', 'No', 'OPD', 'OPD', 1, 290, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 11:54:24', NULL, NULL, '2018-04-05 11:51:00', '', '', '', ''),
(10289, '0', '0', 'Sarfaraz', 'W/O', 'Khizar Hayat', '', 18, 0, 0, '', 1, 'Female', '35302-3462119-3', 'okarah', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 291, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 11:57:42', NULL, NULL, '2018-04-05 11:54:00', '', '', '', ''),
(10290, '0', '0', 'Abdul razaq', 'D/O', 'Farooq Ahmed', '', 41, 0, 0, '', 1, 'Female', '36301-0709649-7', 'Jalalpur Pir Wala Multan', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 1, 292, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 12:03:09', NULL, NULL, '2018-04-05 23:58:00', '', '', '', ''),
(10291, '0', '0', 'Rehman ', 'W/O', 'gh rasool', '', 11, 0, 0, '', 1, 'Female', '31202-8832156-4', 'chak no 023 bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 293, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 12:08:22', NULL, NULL, '2018-04-05 12:04:00', '', '', '', ''),
(10292, '0', '0', 'mohsin', 'S/O', 'altaf', '', 20, 0, 0, '', 1, 'Male', '36301-5293110-3', 'Jalalpur Pir Wala Multan', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 1, 294, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 12:11:00', NULL, NULL, '2018-04-05 12:09:00', '', '', '', ''),
(10293, '0', '0', 'Shamim', 'W/O', 'naseem abbas', '', 35, 0, 0, '', 1, 'Female', '31202-3362189-1', 'Ahmedpur Bahawalpur', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 1, 295, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 12:13:28', NULL, NULL, '2018-04-05 12:11:00', '', '', '', ''),
(10294, '0', '0', 'irshad mai', 'W/O', 'tahir perviz', '', 28, 0, 0, '', 1, 'Female', '54564-5646556-6', 'moza mustafabad vihari', '', 'House wife', '2147483647', 'No', 'OPD', 'opd', 2, 610, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 12:20:36', NULL, NULL, '2018-04-05 12:14:00', '', '', '', ''),
(10295, '0', '0', 'M Hafeez', 'S/O', 'M Ramzan', '02-04-1996', 22, 0, 0, 'A+VE', 8, 'Male', '31205-1894051-9', 'Yazman Bwp', '', 'Acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 296, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-05 23:08:48', NULL, NULL, '2018-04-05 23:03:00', '', '', '', ''),
(10296, '0', '0', 'Hira', 'D/O', 'Gh.Mustafa', '01-02-2012', 6, 0, 0, 'A+VE', 6, 'Female', '31102-4684015-1', 'Bahawalnagar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 54, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-05 23:17:26', NULL, NULL, '2018-04-05 23:14:00', '', '', '', ''),
(10297, '0', '0', 'shabir ahmed', 'S/O', 'faiz baksh', '', 44, 0, 0, '', 9, 'Male', '31202-4535564-5', 'sadiq colony bwp', '', 'Labour', '2147483647', 'No', 'Emergency', 'COD', 1, 297, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-06 09:05:57', NULL, NULL, '2018-04-06 09:00:00', '', '', '', ''),
(10298, '0', '0', 'shabir ahmed', 'S/O', 'faiz baksh', '', 44, 0, 0, '', 9, 'Male', '31202-5602460-5', 'sadiq colony bwp', '', 'labour', '2147483647', 'No', 'Emergency', 'COD', 1, 298, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-06 09:12:36', NULL, NULL, '2018-04-06 09:10:00', '', '', '', ''),
(10299, '0', '0', 'khalida', 'W/O', 'rafaqat', '', 35, 0, 0, '', 1, 'Female', '31102-3934984-7', 'dera wala bahawanagar', '', 'house wife', '2147483647', 'No', 'Emergency', 'cod', 2, 607, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-06 10:47:19', NULL, NULL, '2018-04-06 10:44:00', '', '', '', ''),
(10300, '0', '0', 'nasir', 'S/O', 'nisar ahmad', '', 3, 0, 0, '', 17, 'Male', '31202-1635029-3', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 608, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-06 15:30:36', NULL, NULL, '2018-04-06 15:18:00', '', '', '', ''),
(10301, '0', '0', 'Abdul Rasheed', 'S/O', 'M.Bux', '01-03-1977', 41, 0, 0, 'A+VE', 18, 'Male', '31302-6412047-9', 'rahimyar khan', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 299, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-06 23:18:42', NULL, NULL, '2018-04-06 22:50:00', '', '', '', ''),
(10302, '0', '0', 'M.Ehtasham', 'S/O', 'Shehzad', '13-07-2017', 5, 0, 0, 'A+VE', 1, 'Male', '36101-7046413-7', 'Khanewal', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 300, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-06 23:30:29', NULL, NULL, '2018-04-06 23:27:00', '', '', '', ''),
(10303, '0', '0', 'Shehzad', 'S/O', 'M.Akmal', '01-02-2010', 8, 0, 0, 'A+VE', 1, 'Male', '31201-5977594-3', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 301, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-06 23:35:05', NULL, NULL, '2018-04-06 23:33:00', '', '', '', ''),
(10304, '0', '0', 'Nadir', 'S/O', 'Kareem Bux', '01-02-2006', 12, 0, 0, 'O+VE', 1, 'Male', '31201-5977594-3', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'OPD', 'emergency', 1, 302, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-06 23:38:51', NULL, NULL, '2018-04-06 23:35:00', '', '', '', ''),
(10305, '0', '0', 'M.Sharif', 'S/O', 'Risaal Muhammad', '01-02-1970', 48, 0, 0, 'A+VE', 1, 'Male', '36304-5604846-5', 'Shujaabad Multan', '', 'fag', '2147483647', 'No', 'Emergency', 'emergency', 1, 303, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-06 23:47:02', NULL, NULL, '2018-04-06 23:44:00', '', '', '', ''),
(10306, '0', '0', 'Shehnaz', 'D/O', 'M.Mursaleen', '01-02-2012', 6, 0, 0, 'A+VE', 1, 'Female', '31101-5699067-5', 'Bahawalnagar', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 55, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-07 01:56:16', NULL, NULL, '2018-04-07 01:53:00', '', '', '', ''),
(10307, '0', '0', 'Samiya', 'W/O', 'Sajjad', '01-02-1993', 25, 0, 0, 'A+VE', 1, 'Female', '31202-6143844-0', 'muzafharghar', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 609, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-07 05:08:52', NULL, NULL, '2018-04-06 22:33:00', '', '', '', ''),
(10308, '0', '0', 'Dur Muhammad', 'S/O', 'Noor Muhammad', '01-02-1963', 55, 0, 0, 'O+VE', 1, 'Male', '31204-2557929-3', 'Bahawalpur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 304, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-07 06:52:48', NULL, NULL, '2018-04-07 05:08:00', '', '', '', ''),
(10309, '0', '0', 'nazeeran bibi', 'W/O', 'M.ishaq', '', 45, 0, 0, '', 1, 'Female', '31203-2460680-7', 'Hasil Pur Bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 611, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-07 10:26:16', NULL, NULL, '2018-04-07 08:46:00', '', '', '', ''),
(10310, '0', '0', 'ZARINA BIBI', 'W/O', 'yaseen', '', 45, 0, 0, '', 1, 'Female', '36201-9446003-9', 'chak no 311 duniyapur lodhran', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 612, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-07 10:56:46', NULL, NULL, '2018-04-07 10:54:00', '', '', '', ''),
(10311, '0', '0', 'ajmal', 'S/O', 'gh ali', '', 18, 0, 0, '', 1, 'Male', '01201-7128509-9', 'Ahmedpur Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 305, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-07 11:04:55', NULL, NULL, '2018-04-07 11:01:00', '', '', '', ''),
(10312, '0', '0', 'Tehmeena', 'W/O', 'Shahid', '01-02-1996', 22, 0, 0, 'A+VE', 1, 'Female', '36602-1695099', 'Malsi Vehari', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 613, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-07 20:59:44', NULL, NULL, '2018-04-07 20:56:00', '', '', '', ''),
(10313, '0', '0', 'Saeed BIbi', 'W/O', 'Jalal Khan', '01-02-1973', 45, 0, 0, 'O+VE', 1, 'Female', '31202-6183855-0', 'sargodha', '', 'House wife', '0', 'No', 'Emergency', 'emergency', 3, 547, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-07 22:36:16', NULL, NULL, '2018-04-07 22:30:00', '', '', '', ''),
(10314, '0', '0', 'M.Dilshad', 'S/O', 'Malook Ahmad', '01-02-1994', 24, 0, 0, 'A+VE', 6, 'Male', '31202-1414694-9', 'Bahawalpur', '', 'mastri', '2147483647', 'No', 'Emergency', 'emergency', 1, 306, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-08 20:34:16', NULL, NULL, '2018-04-08 20:31:00', '', '', '', ''),
(10315, '0', '0', 'Syed M.Shah                         ', 'S/O', 'Syed Jandy Shah', '01-02-1948', 70, 0, 0, 'A+VE', 8, 'Male', '31202-6342833-0', 'Bahawalpur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 307, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-08 23:48:45', NULL, NULL, '2018-04-08 21:45:00', '', '', '', ''),
(10316, '0', '0', 'Rohan', 'S/O', 'Akbar', '01-01-2018', 3, 0, 0, 'A+VE', 1, 'Male', '31202-5446297-7', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 614, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-08 23:52:42', NULL, NULL, '2018-04-08 20:04:00', '', '', '', ''),
(10317, '0', '0', 'Aleena', 'D/O', 'Ashfaq', '01-02-2009', 9, 0, 0, 'A+VE', 8, 'Female', '33303-2040283-3', 'Shorcoat', '', 'Student', '2147483647', 'No', 'OPD', 'emergency', 3, 56, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-09 00:58:32', NULL, NULL, '2018-04-09 00:41:00', '', '', '', ''),
(10318, '0', '0', 'Safia', 'W/O', 'Ishfaq', '01-02-1978', 40, 0, 0, 'A+VE', 8, 'Female', '3330-32040283-3', 'Shorcoat', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 5, 71, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-09 01:24:22', NULL, NULL, '2018-04-09 00:58:00', '', '', '', ''),
(10319, '0', '0', 'saeed ', 'S/O', 'nasheer', '', 40, 0, 0, '', 1, 'Male', '31101-9906288-7', 'basti jawara wali dist bahawalnager', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 313, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-09 10:55:20', NULL, NULL, '2018-04-09 10:51:00', '', '', '', ''),
(10320, '0', '0', 'ayesha ', 'D/O', 'khadim hussain', '', 17, 0, 0, '', 1, 'Female', '31201-3811239-1', 'uch shareef dist bwp', '', 'student', '2147483647', 'No', 'Emergency', 'emergency', 2, 620, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-09 11:03:21', NULL, NULL, '2018-04-09 11:01:00', '', '', '', ''),
(10322, '0', '0', 'nazeera bibi ', 'W/O', 'm aslam ', '', 40, 0, 0, '', 1, 'Female', '36203-3607780-2', 'cham moor bwp', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 2, 621, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-09 12:31:34', NULL, NULL, '2018-04-09 12:28:00', '', '', '', ''),
(10323, '0', '0', 'wajid ali', 'S/O', 'm qaum', '', 3, 0, 0, '', 1, 'Male', '36201-1280076-3', 'chak 323 wb dist lodra ', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 308, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-09 12:35:13', NULL, NULL, '2018-04-09 12:32:00', '', '', '', ''),
(10324, '0', '0', 'ahsan', 'S/O', 'waris ali', '', 10, 0, 0, '', 1, 'Male', '31023-4455667-7', 'malay wali gall ibwp', '', 'nill', '2147483647', 'No', 'OPD', 'OPD', 6, 87, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-09 12:38:31', NULL, NULL, '2018-04-09 12:35:00', '', '', '', ''),
(10325, '0', '0', 'm rasid', 'S/O', 'ameer baksh', '', 17, 0, 0, '', 1, 'Male', '36301-5119059-9', 'moza sabra khuo tehsil jalalpur dist multan', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 315, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-09 12:48:41', NULL, NULL, '2018-04-09 12:44:00', '', '', '', ''),
(10327, '0', '0', 'Tariq', 'S/O', 'Ishaq', '01-01-2007', 11, 0, 0, 'O+VE', 6, 'Male', '31202-6144844-0', 'Bahawalpur', '', 'Student', '0', 'No', 'Emergency', 'emergency', 6, 88, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-11 01:35:38', NULL, NULL, '2018-04-10 21:45:00', '', '', '', ''),
(10328, '0', '0', 'Raiz', 'S/O', 'Saif UR Rehman', '01-02-1991', 27, 0, 0, 'A+VE', 6, 'Male', '31202-6144833-0', 'Bahawalpur', '', 'acred', '0', 'No', 'Emergency', 'emergency', 6, 80, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-11 01:46:28', NULL, NULL, '2018-04-10 21:45:00', '', '', '', ''),
(10329, '0', '0', 'sanwal', 'S/O', 'farooq', '', 17, 0, 0, '', 1, 'Male', '31202-1901498-1', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'COD', 1, 309, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-11 10:26:38', NULL, NULL, '2018-04-11 10:24:00', '', '', '', ''),
(10330, '0', '0', 'ghulam fareed', 'S/O', 'khuda bux', '', 85, 0, 0, '', 8, 'Male', '31202-7361507-1', 'basti dewan madol town b bwp', '', 'Nil', '2147483647', 'Yes', 'Emergency', 'emergency', 1, 310, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-11 17:44:57', NULL, NULL, '2018-04-11 17:15:00', '', '', '', ''),
(10331, '0', '0', 'jannat bibi', 'W/O', 'm ashraf', '', 70, 0, 0, '', 1, 'Female', '31102-0614207-5', 'bilal koot chishtia distt bwn', '', 'House wife', '2147483647', 'No', 'Emergency', 'mw1', 2, 748, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-12 12:05:33', NULL, NULL, '2018-04-12 12:01:00', '', '', '', ''),
(10332, '0', '0', 'Nadeem', 'S/O', 'M.Ashraf', '01-02-1996', 22, 0, 0, 'O+VE', 1, 'Male', '31101-1644247-1', 'Bahawalnagar', '', 'acred', '2147483647', 'No', 'Emergency', 'Medical 4', 6, 79, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-15 23:06:18', NULL, NULL, '2018-04-15 20:43:00', '', '', '', ''),
(10333, '0', '0', 'Bashir', 'S/O', 'Ghulam Farid', '01-02-1963', 55, 0, 0, 'A+VE', 1, 'Male', '36301-1607875-7', 'Jalal Pur Peer Wala Multan', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 311, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-15 23:36:10', NULL, NULL, '2018-04-15 23:33:00', '', '', '', ''),
(10334, '0', '0', 'rubina', 'W/O', 'azhar', '', 30, 0, 0, '', 1, 'Female', '36101-4755892-1', 'chak no 365 bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 615, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-17 12:07:54', NULL, NULL, '2018-04-16 22:05:00', '', '', '', ''),
(10335, '0', '0', 'majid', 'W/O', 'gh nazuk', '', 3, 0, 0, '', 1, 'Female', '06301-7950896-9', 'Jalalpur Pir Wala Multan', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 616, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-17 12:13:38', NULL, NULL, '2018-04-12 11:56:00', '', '', '', ''),
(10336, '0', '0', 'sughran', 'W/O', 'fazal hussain', '', 55, 0, 0, '', 1, 'Female', '36301-3964687-0', 'Jalalpur Pir Wala Multan', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 617, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-17 12:17:25', NULL, NULL, '2018-04-07 11:15:00', '', '', '', ''),
(10338, '0', '0', 'atta elahi', 'W/O', 'm.ameer', '', 50, 0, 0, '', 1, 'Female', '31203-0360957-7', 'hasilpur bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 624, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-17 12:39:18', NULL, NULL, '2018-04-09 12:35:00', '', '', '', ''),
(10339, '0', '0', 'Umair', 'S/O', 'Dilshad', '16-04-2017', 1, 0, 0, 'A+VE', 3, 'Male', '36203-1910984-3', 'Musafirkha', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergncy', 2, 619, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 08:01:54', NULL, NULL, '2018-04-18 22:00:00', '', '', '', ''),
(10340, '0', '0', 'yasmeen ', 'W/O', 'barkat ali', '', 60, 0, 0, '', 1, 'Female', '36603-1403660-8', 'chak no 53 vehari', '', 'house wife', '2147483647', 'No', 'OPD', 'OPD', 2, 625, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 09:03:59', NULL, NULL, '2018-04-18 09:01:00', '', '', '', ''),
(10341, '0', '0', 'yasmeen ', 'W/O', 'barkat ali', '', 60, 0, 0, '', 1, 'Female', '36603-1403660-9', 'chak n53 vehari', '', 'house wife', '2147483647', 'No', 'OPD', 'OPD', 2, 627, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 09:07:18', NULL, NULL, '2018-04-07 01:03:00', '', '', '', ''),
(10342, '0', '0', 'allah rakhi', 'W/O', 'm yousaf', '', 5, 0, 0, '', 43, 'Female', '31101-1629109-9', 'bahawalnagar', '', 'play child', '2147483647', 'No', 'Emergency', 'COD', 2, 629, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 09:12:11', NULL, NULL, '2018-04-18 09:08:00', '', '', '', ''),
(10343, '0', '0', 'robina bb', 'W/O', 'm tariq', '', 20, 0, 0, '', 1, 'Female', '36203-2609719-7', 'Lodhran', '', 'house wife', '2147483647', 'No', 'Emergency', 'COD', 2, 623, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 09:17:26', NULL, NULL, '2018-04-15 00:13:00', '', '', '', ''),
(10344, '0', '0', 'sabir hussain', 'S/O', 'm.bux', '', 35, 0, 0, '', 1, 'Male', '38104-1696411-5', 'chah gund pati balanda zilah bakhar', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 316, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 09:57:20', NULL, NULL, '2018-04-18 09:56:00', '', '', '', ''),
(10345, '0', '0', 'ramzan', 'S/O', 'ali muhammad', '', 35, 0, 0, '', 1, 'Male', '24325-4364765-7', 'basti kalo wali muradabad vehari', '', 'nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 312, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 10:47:34', NULL, NULL, '2018-04-18 10:45:00', '', '', '', ''),
(10346, '0', '0', 'm ashraf', 'S/O', 'm yousaf', '', 45, 0, 0, '', 1, 'Male', '42201-0656659-3', 'chk 11fw tshsil chshtian dist bwn', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 321, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 11:40:47', NULL, NULL, '2018-04-18 11:38:00', '', '', '', ''),
(10347, '0', '0', 'prema ram', 'S/O', 'mula ram', '', 32, 0, 0, '', 1, 'Male', '31205-1604517-9', 'chak num 75 d.n.b', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 317, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 12:39:15', NULL, NULL, '2018-04-18 12:35:00', '', '', '', ''),
(10348, '0', '0', 'AQSA', 'D/O', 'ISHFAQ', '', 19, 0, 0, '', 1, 'Female', '31202-6447806-9', 'BHTTA NO 2 BWP', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 622, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 13:28:30', NULL, NULL, '2018-04-18 13:26:00', '', '', '', ''),
(10349, '0', '0', 'ALI AKBER', 'S/O', 'M SHAN', '', 15, 0, 0, '', 1, 'Male', '36603-6723962-1', 'KAAT BOLAY WALA TEHSIL BWN DIST BWN', '', 'NIL', '2147483647', 'No', 'Emergency', 'emergency', 3, 58, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 13:34:45', NULL, NULL, '2018-04-18 13:32:00', '', '', '', ''),
(10350, '0', '0', 'GH.MOhammad', 'S/O', 'Ashiq.M', '03-04-1963', 55, 0, 0, 'A+VE', 1, 'Male', '36203-6932599-3', 'Basti darkhan dist lodhran', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 314, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-18 21:07:19', NULL, NULL, '2018-04-18 20:55:00', '', '', '', ''),
(10351, '0', '0', 'Shahid', 'S/O', 'M. Sultan', '10-04-1993', 25, 0, 0, 'A-VE', 1, 'Male', '31104-1706423-3', 'chak no 76 r po tehsil haroon abad didtrict bahawalnagar', '', 'agriculture', '2147483647', 'No', 'Emergency', 'emergency', 1, 318, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 07:04:42', NULL, NULL, '2018-04-19 06:59:00', '', '', '', ''),
(10352, '0', '0', 'sajdane', 'S/O', 'hassan ali', '', 2, 0, 0, '', 43, 'Male', '36602-3672470-2', 'wahari', '', 'Nil', '2147483647', 'No', 'OPD', 'COD', 1, 319, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 08:55:21', NULL, NULL, '2018-04-19 08:51:00', '', '', '', ''),
(10353, '0', '0', 'ahmed', 'S/O', 'manzoor ahmed', '', 27, 0, 0, '', 17, 'Male', '31202-1358820-4', 'central jail bwp', '', 'Student', '2147483647', 'No', 'OPD', 'COD', 3, 57, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 09:03:54', NULL, NULL, '2018-04-19 09:01:00', '', '', '', ''),
(10354, '0', '0', 'NAEEM', 'S/O', 'RIAZ', '', 13, 0, 0, '', 1, 'Male', '36301-4846216-9', 'Jalalpur Pir Wala Multan', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 320, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 09:11:47', NULL, NULL, '2018-04-19 09:08:00', '', '', '', ''),
(10355, '0', '0', 'LAREEB', 'D/O', 'ASHRAF', '', 18, 0, 0, '', 1, 'Female', '31202-7278843-3', 'MOHALA MUBARAKHPUR BWP', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 628, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 10:19:02', NULL, NULL, '2018-04-19 10:15:00', '', '', '', ''),
(10356, '0', '0', 'KHURSHEEED BIBI', 'W/O', 'ATTTA.ULLA', '', 30, 0, 0, '', 1, 'Female', '32402-2261787-5', 'JAMPUR PO RAJAN PUR RAJAN PUR', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 3, 537, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 10:40:42', NULL, NULL, '2018-04-19 10:37:00', '', '', '', ''),
(10357, '0', '0', 'JANNNAT BIBI', 'W/O', 'M USMAN', '', 45, 0, 0, '', 1, 'Female', '31101-5911102-7', 'MARI MEIA SAB TEHSIL DISTT BAHAWALNAGAR', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 6, 81, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 10:48:14', NULL, NULL, '2018-04-19 10:46:00', '', '', '', ''),
(10358, '0', '0', 'M HUSSAIN ', 'S/O', 'ALI M70', '', 70, 0, 0, '', 1, 'Male', '31230-7765484-2', 'MOZA SHERA ABAD BAHAWALNAGAR', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 325, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 11:08:12', NULL, NULL, '2018-04-19 11:02:00', '', '', '', ''),
(10359, '0', '0', 'FARAZ ALI', 'S/O', 'SADAM HUSAIN', '', 8, 0, 0, '', 1, 'Male', '32140-3318396-7', 'PEER BKHASH KHAS PO DIST RAJAN PUR', '', 'Student', '333870815', 'No', 'OPD', 'OPD', 3, 59, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 11:36:01', NULL, NULL, '2018-04-19 11:33:00', '', '', '', ''),
(10360, '0', '0', 'altaf bibi ', 'W/O', 'qayum nawaz', '', 40, 0, 0, '', 34, 'Female', '31203-4567896-5', 'medical colony bvh bahawalpur', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 6, 82, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 13:28:47', NULL, NULL, '2018-04-19 13:26:00', '', '', '', ''),
(10361, '0', '0', 'M.Ali', 'S/O', 'Allah Rakha', '24-04-2014', 3, 0, 0, 'A-VE', 1, 'Male', '0', 'hafiz town district bahawalnagar', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 322, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-19 23:15:44', NULL, NULL, '2018-04-19 23:10:00', '', '', '', ''),
(10362, '0', '0', 'khalil ahmad', 'S/O', 'ahmad bux', '03-04-1978', 40, 0, 0, 'A+VE', 7, 'Male', '31201-1738382-1', 'Ahmedpur Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 323, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 06:40:30', NULL, NULL, '2018-04-20 02:00:00', '', '', '', ''),
(10363, '0', '0', 'maryam naeem', 'D/O', 'naeem akhtar', '', 4, 0, 0, '', 1, 'Female', '31101-1651688-7', 'madani colony street no 13 bahawal nagaer', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 632, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-20 08:20:44', NULL, NULL, '2018-04-20 08:18:00', '', '', '', ''),
(10364, '0', '0', 'bilal ', 'S/O', 'rasheed', '', 27, 0, 0, '', 1, 'Male', '31202-6386914-3', 'model town c bahawal pur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 539, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-20 11:33:40', NULL, NULL, '2018-04-20 11:31:00', '', '', '', ''),
(10365, '0', '0', 'Baby Girl Hanif', 'D/O', 'M.Hanif', '20-04-2018', 0, 0, 0, 'A+VE', 22, 'Female', '31201-2884993-5', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 2, 626, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 20:51:58', NULL, NULL, '2018-04-20 20:47:00', '', '', '', ''),
(10366, '0', '0', 'Arham', 'D/O', 'Latif', '10-04-2015', 3, 0, 0, 'B+VE', 1, 'Female', '0', 'Bhatta number 4 bahawalpur', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 2, 630, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 21:02:44', NULL, NULL, '2018-04-20 20:59:00', '', '', '', ''),
(10367, '0', '0', 'Razia', 'W/O', 'Ramzan', '24-07-1977', 40, 0, 0, 'A+VE', 1, 'Female', '36203-1575416-5', 'cham mor bahawalpur', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 2, 631, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 21:14:03', NULL, NULL, '2018-04-20 21:10:00', '', '', '', ''),
(10368, '0', '0', 'Abdul Hameed', 'S/O', 'Jind Wada', '22-08-1970', 47, 0, 0, 'A+VE', 1, 'Male', '31202-5738887-1', '13 solag bahawalpur', '', 'agriculture', '2147483647', 'No', 'Emergency', 'emergency', 1, 324, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 21:22:10', NULL, NULL, '2018-04-20 21:19:00', '', '', '', ''),
(10369, '0', '0', 'Sajida bibi', 'W/O', 'M.Akram', '28-05-21968', -19950, 0, 0, 'A-VE', 1, 'Female', '31205-1265308-1', 'chak no 26 DNB tehsil yazman district bahawal pur', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 2, 633, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 21:28:45', NULL, NULL, '2018-04-20 21:25:00', '', '', '', ''),
(10370, '0', '0', 'Abdul Razzak', 'S/O', 'imam shah', '18-04-1967', 51, 0, 0, 'A+VE', 1, 'Male', '31202-1667608-5', 'chak sahoota burewala district wehari', '', 'agriculture', '300681938', 'No', 'Emergency', 'emergency', 1, 326, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 21:35:27', NULL, NULL, '2018-04-20 21:32:00', '', '', '', ''),
(10371, '0', '0', 'Mudasir', 'S/O', 'Gh.Nabi', '01-02-2011', 7, 0, 0, 'A+VE', 8, 'Male', '31202-7553411-5', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 533, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 23:52:31', NULL, NULL, '2018-04-20 23:49:00', '', '', '', ''),
(10372, '0', '0', 'Rashid', 'S/O', 'M.Zaffar', '01-02-2018', 0, 0, 0, 'A+VE', 1, 'Male', '31201-5531889-1', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 534, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 23:54:54', NULL, NULL, '2018-04-20 23:52:00', '', '', '', ''),
(10373, '0', '0', 'M.Shakeel', 'S/O', 'M.Bashir', '01-02-2002', 16, 0, 0, 'A+VE', 1, 'Male', '31202-6142844-2', 'Bahawalpur', '', 'tailor', '317069299', 'No', 'Emergency', 'emergency', 3, 535, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-20 23:59:06', NULL, NULL, '2018-04-20 23:54:00', '', '', '', ''),
(10374, '0', '0', 'Mahmood', 'S/O', 'Bodan khan', '26-04-1939', 78, 0, 0, 'A-VE', 1, 'Male', '36202-2108230-7', 'kehror pakka lodhran', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 327, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-21 00:56:53', NULL, NULL, '2018-04-21 00:53:00', '', '', '', ''),
(10375, '0', '0', 'MOHAMAD ADNAN', 'S/O', 'MOHAMMAD SARWAR', '15-05-1999', 18, 0, 0, 'A-VE', 1, 'Male', '36603-1124490-1', 'house number 51 street number 3 block E vehari', '', 'student', '2147483647', 'No', 'Emergency', 'emergency', 1, 328, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-21 01:09:40', NULL, NULL, '2018-04-21 01:05:00', '', '', '', ''),
(10376, '0', '0', 'murtaza', 'S/O', 'm nawaz', '', 22, 0, 0, '', 1, 'Male', '31104-9784113-1', 'chk no 104 tehsil haroon abad distt bahawal nager', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 334, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 10:15:55', NULL, NULL, '2018-04-21 10:13:00', '', '', '', ''),
(10377, '0', '0', 'mazahar', 'S/O', 'm afzal', '', 30, 0, 0, '', 1, 'Male', '36602-3258202-1', 'qasooor pura distt melsi', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 6, 84, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 10:31:11', NULL, NULL, '2018-04-21 10:29:00', '', '', '', ''),
(10378, '0', '0', 'baber', 'S/O', 'shaker', '', 4, 0, 0, '', 1, 'Male', '31202-6285621-7', 'jhook salan basti dist bhawal pur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 335, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 10:39:22', NULL, NULL, '2018-04-21 10:36:00', '', '', '', ''),
(10379, '0', '0', 'abdullha', 'S/O', 'm javeed', '', 20, 0, 0, '', 41, 'Male', '31201-4818167-5', 'moza channi ghot tehsil ahmadpur dist bahawalpur', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 543, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 10:54:56', NULL, NULL, '2018-04-21 10:51:00', '', '', '', ''),
(10380, '0', '0', 'zanib', 'D/O', 'm khalid', '', 3, 0, 0, '', 43, 'Female', '31102-6729989-1', 'hussain colony tehsil chishtia dist bahawalnagr', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 541, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 11:02:36', NULL, NULL, '2018-04-21 10:59:00', '', '', '', ''),
(10381, '0', '0', 'mehmood', 'S/O', 'rasool buksh', '', 60, 0, 0, '', 12, 'Male', '36203-8131893-5', 'moza dorata loodhran zilah loodhran', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 1, 332, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 13:00:12', NULL, NULL, '2018-04-21 12:53:00', '', '', '', ''),
(10382, '0', '0', 'hania abid', 'D/O', 'abid rahim', '', 4, 0, 0, '', 1, 'Female', '31202-0278558-5', 'house no 39 c.d foji basti bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 638, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 13:05:58', NULL, NULL, '2018-04-21 13:01:00', '', '', '', ''),
(10383, '0', '0', 'basheeran bibi ', 'W/O', 'abdul ghaffar', '', 40, 0, 0, '', 1, 'Female', '31201-0286274-3', 'house no 190 phase 2 cheema town bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 639, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 13:10:32', NULL, NULL, '2018-04-21 13:07:00', '', '', '', ''),
(10384, '0', '0', 'sakina mai ', 'W/O', 'allah rakha', '', 35, 0, 0, '', 34, 'Female', '31101-6663267-9', 'basti jodhika bahawal nagar', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 635, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 13:15:35', NULL, NULL, '2018-04-21 13:11:00', '', '', '', ''),
(10385, '0', '0', 'hassan ali ', 'S/O', 'RIAZ', '', 22, 0, 0, '', 34, 'Male', '31104-2412462-3', 'po khas chak no 035 3 haroonabad dis bahawalnagar pak', '', 'Nil', '334838732', 'No', 'Emergency', 'emergency', 1, 331, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 13:20:08', NULL, NULL, '2018-04-21 13:16:00', '', '', '', ''),
(10386, '0', '0', 'yousaf', 'S/O', 'karam ali', '', 40, 0, 0, '', 1, 'Male', '31202-7528225-7', 'moza kurpal tehsil n distt bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 544, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 13:55:11', NULL, NULL, '2018-04-21 13:52:00', '', '', '', ''),
(10387, '0', '0', 'Arfan Ali', 'S/O', 'Ahsan Ali', '10-10-1977', 40, 0, 0, 'B+VE', 35, 'Male', '31202-0465390-5', 'Islami Colony Bahawalpur', '', 'Advocate', '300', 'Yes', 'OPD', 'OPD', 1, 336, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 15:50:29', NULL, NULL, '2018-04-21 15:48:00', '', '', '', '');
INSERT INTO `admissiontbl` (`regNo`, `emergency_no`, `admi_no`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patMonthAge`, `patDaysAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patcity`, `patOccupation`, `patPhone`, `patEntitled`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patChart_id`, `patStatus`, `patient_pic_path`, `FreeCarePatient`, `admission_timestamp`, `previousRegno`, `sideRoomDate`, `patAdmDate`, `garName`, `garCnic`, `garContact`, `garRelation`) VALUES
(10388, '0', '0', 'fazal hussain', 'S/O', 'ghulam hussain', '01-01-1970', 48, 0, 0, '', 1, 'Male', '31201-0350580-1', 'basti mitra bwp', '', 'Farmer', '2147483647', 'Yes', 'Emergency', 'emergency', 1, 329, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-21 18:31:12', NULL, NULL, '2018-04-21 18:27:00', '', '', '', ''),
(10389, '0', '0', 'M.Din', 'S/O', 'Raheem Bux', '01-02-1973', 45, 0, 0, 'A+VE', 26, 'Male', '31204-5124147-1', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 536, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-22 06:03:17', NULL, NULL, '2018-04-22 02:18:00', '', '', '', ''),
(10390, '0', '0', 'ramzan', 'S/O', 'abdul razzaq', '', 43, 0, 0, '', 1, 'Male', '31103-0443113-1', 'chak no 329 hr zilah bahawalnagar', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 339, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-22 09:57:44', NULL, NULL, '2018-04-22 06:04:00', '', '', '', ''),
(10391, '0', '0', 'Sassi', 'D/O', 'Hazoor Bux', '01-02-2013', 5, 0, 0, 'O+VE', 1, 'Female', '31201-1704403-9', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 538, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-23 06:04:42', NULL, NULL, '2018-04-22 22:00:00', '', '', '', ''),
(10392, '0', '0', 'Nawaz', 'S/O', 'M.Sharif', '01-02-1988', 30, 0, 0, 'A+VE', 1, 'Male', '31202-6143233-0', 'Bahawalnagar', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 546, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-23 06:12:27', NULL, NULL, '2018-04-23 01:15:00', '', '', '', ''),
(10393, '0', '0', 'nafisa', 'D/O', 'yousaf', '', 15, 0, 0, '', 1, 'Female', '31101-5393921-5', 'Bahawalnagar', '', 'Student', '2147483647', 'No', 'OPD', 'OPD', 2, 634, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-23 09:43:17', NULL, NULL, '2018-04-23 09:40:00', '', '', '', ''),
(10394, '0', '0', 'musarrat', 'D/O', 'Abdul Rehman', '', 30, 0, 0, '', 1, 'Female', '31202-1818245-1', 'abbasnagar bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'COD', 2, 636, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-23 11:42:39', NULL, NULL, '2018-04-23 11:40:00', '', '', '', ''),
(10395, '0', '0', 'seraj bb ', 'W/O', 'm ramzan', '', 40, 0, 0, '', 1, 'Female', '36201-0522005-0', 'chak no 389wb dunia pur distt lodran', '', 'House wife', '2147483647', 'No', 'Emergency', 'mw2', 2, 644, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-23 11:54:40', NULL, NULL, '2018-04-23 11:50:00', '', '', '', ''),
(10396, '0', '0', 'mudasir', 'S/O', 'pappu', '', 2, 0, 0, '', 1, 'Male', '31202-5959332-3', 'chamb mor bwp', '', 'nill', '2147483647', 'No', 'Emergency', 'COD', 3, 540, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-23 11:57:43', NULL, NULL, '2018-04-23 11:55:00', '', '', '', ''),
(10397, '0', '0', 'zulfiqar', 'S/O', 'khuda yaar', '', 50, 0, 0, '', 1, 'Male', '31202-6032407-9', 'model town c bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 549, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-23 12:11:51', NULL, NULL, '2018-04-23 12:09:00', '', '', '', ''),
(10398, '0', '0', 'asma', 'D/O', ' ghulam abbas', '', 4, 0, 0, '', 1, 'Female', '45204-7807860-5', 'khan pur moza sheik abdul sattar dist raheem yar khan', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 552, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-23 12:14:44', NULL, NULL, '2018-04-23 12:12:00', '', '', '', ''),
(10399, '0', '0', 'ALLAH YAR', 'S/O', 'JIND WADA', '', 70, 0, 0, '', 1, 'Male', '31201-2719457-3', 'AHMED PUR BWP', '', 'labour', '2147483647', 'No', 'Emergency', 'cod', 1, 330, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-23 12:56:54', NULL, NULL, '2018-04-23 12:55:00', '', '', '', ''),
(10400, '0', '0', 'Shaer Mohammad', 'S/O', 'Sarwar', '10-04-1947', 71, 0, 0, 'A+VE', 1, 'Male', '36203-5057563', 'basti khanuwala moza pagalwari p/o qureshi wala tehsil district lodhran', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 333, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-23 21:27:50', NULL, NULL, '2018-04-23 20:59:00', '', '', '', ''),
(10401, '0', '0', 'Zain Abbas', 'S/O', 'Mohammad Ijaz', '16-04-2009', 9, 0, 0, 'A+VE', 1, 'Male', '36202-1694105-1', 'kehror pakka tehsil kehror paka district lodhran', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 337, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-24 00:37:57', NULL, NULL, '2018-04-23 22:48:00', '', '', '', ''),
(10402, '0', '0', 'Ikhlaq ', 'S/O', 'mohammad nazir', '23-04-1982', 36, 0, 0, 'A-VE', 1, 'Male', '31205-3845742-7', 'chak no 88 db p/o tehsil yazman district bahawalpur', '', 'agriculture', '2147483647', 'No', 'Emergency', 'emergency', 1, 338, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-24 01:27:26', NULL, NULL, '2018-04-24 00:44:00', '', '', '', ''),
(10403, '0', '0', 'Hazib    ', 'S/O', 'khalid Rashid', '10-04-1999', 19, 0, 0, 'A+VE', 1, 'Male', '31102-6435240-7', 'p/o chak no 40 fateh tehsil chishtiyan districxt bahawalnagar', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 340, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-24 01:40:58', NULL, NULL, '2018-04-24 01:36:00', '', '', '', ''),
(10404, '0', '0', 'Waqas', 'S/O', 'Munir', '02-04-1992', 26, 0, 0, 'A+VE', 1, 'Male', '31104-5931877-9', 'chak no 131/6r tehsil haroon abad disyrict bahawalnagar', '', 'agriculture', '2147483647', 'No', 'Emergency', 'emergency', 1, 341, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-24 04:40:20', NULL, NULL, '2018-04-24 04:26:00', '', '', '', ''),
(10405, '0', '0', 'm ramzan', 'S/O', 'noor muhammad', '', 34, 0, 0, '', 1, 'Male', '31205-1661884-5', 'po shahi wala tehsil ahmad pur distt bwp', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 3, 551, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-24 08:22:22', NULL, NULL, '2018-04-24 08:20:00', '', '', '', ''),
(10406, '0', '0', 'aslam', 'S/O', 'malik saeed', '', 40, 0, 0, '', 1, 'Male', '31202-9026646-9', 'nor por bwp', '', 'Labour', '300', 'No', 'Emergency', 'COD', 1, 342, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-24 09:22:15', NULL, NULL, '2018-04-24 09:20:00', '', '', '', ''),
(10407, '0', '0', 'awais', 'S/O', 'yousaf', '', 7, 0, 0, '', 1, 'Male', '31202-4567875-8', 'taranda muhaMAD PANAH', '', 'student', '2147483647', 'No', 'Emergency', 'cod', 1, 343, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-24 11:16:33', NULL, NULL, '2018-04-24 11:14:00', '', '', '', ''),
(10408, '0', '0', 'kashif', 'S/O', 'abdul raheem', '', 15, 0, 0, '', 1, 'Male', '31101-5393921-5', 'basti ghulam muhammad arain po bahawal nager distt bahawal nager', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 554, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-24 11:35:45', NULL, NULL, '2018-04-24 11:32:00', '', '', '', ''),
(10409, '0', '0', 'minahil fatima', 'D/O', 'm arshad', '', 3, 0, 0, '', 1, 'Female', '31302-4332207-5', 'po tranda muhammad panah tehsil liaqt pur distt raheem yar khan', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 645, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-24 11:45:52', NULL, NULL, '2018-04-24 11:43:00', '', '', '', ''),
(10410, '0', '0', 'rehan ', 'S/O', 'papu', '', 19, 0, 0, '', 1, 'Male', '31201-8051756-5', 'house no 273 nohala shikari ahmad pur dist bwpi', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 6, 819, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-24 12:17:43', NULL, NULL, '2018-04-24 12:14:00', '', '', '', ''),
(10411, '0', '0', 'Nazeer Ahmad', 'S/O', 'shameer bux', '18-04-1968', 50, 0, 0, 'A+VE', 1, 'Male', '36301-8837068-1', 'p/o jalal pur tehsil jalal pur district multan', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 344, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-24 23:24:11', NULL, NULL, '2018-04-24 23:20:00', '', '', '', ''),
(10412, '0', '0', 'Manzoor', 'S/O', 'Mohammad Ali', '08-04-1956', 62, 0, 0, 'A+VE', 1, 'Male', '36203-1894403-9', 'street munshi ibrahim wali kory wale lodhran', '', 'Nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 345, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-24 23:45:35', NULL, NULL, '2018-04-24 23:42:00', '', '', '', ''),
(10413, '0', '0', 'sharif', 'S/O', 'Gh. Muhammad', '', 60, 0, 0, '', 1, 'Male', '31205-6307062-9', 'chak no 138 dnb bwp', '', 'Labour', '2147483647', 'No', 'Emergency', 'COD', 1, 346, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-25 09:55:53', NULL, NULL, '2018-04-25 09:53:00', '', '', '', ''),
(10414, '0', '0', 'ashiq hussain', 'S/O', 'm haneef', '', 60, 0, 0, '', 1, 'Male', '31205-9868544-7', 'chak no67wb po chak no 117 wb tehsil yazmaan dist bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 553, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-25 11:57:51', NULL, NULL, '2018-04-25 11:55:00', '', '', '', ''),
(10415, '0', '0', 'rabia ', 'D/O', 'khalil ahmad', '', 8, 0, 0, '', 1, 'Female', '36301-5325284-3', 'chak no 64 m tehsil jalalpur dist multan', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 6, 822, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-25 13:44:02', NULL, NULL, '2018-04-25 13:41:00', '', '', '', ''),
(10416, '0', '0', 'safdar', 'S/O', 'M Akbar', '01-02-1973', 45, 0, 0, 'B+VE', 1, 'Male', '36401-0171416-3', 'chakARIF WALA DISTRCTPAKPATN m', '', 'LABOUR', '2147483647', 'No', 'Emergency', 'emergency', 1, 349, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-26 04:07:42', NULL, NULL, '2018-04-26 03:15:00', '', '', '', ''),
(10417, '0', '0', 'Safdar', 'S/O', 'M.Akbar', '07-04-1999', 19, 0, 0, 'A+VE', 1, 'Male', '36401-0174163-1', 'Arifwala dist pakptan', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 347, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-26 06:06:21', NULL, NULL, '2018-04-26 03:15:00', '', '', '', ''),
(10418, '0', '0', 'aliaan', 'S/O', 'afzal', '', 7, 0, 0, '', 1, 'Male', '31101-1906751-7', 'haroon abad', '', 'Student', '2147483647', 'No', 'Emergency', 'COD', 2, 637, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 09:10:52', NULL, NULL, '2018-04-26 09:08:00', '', '', '', ''),
(10419, '0', '0', 'arshad', 'S/O', 'aslam', '', 38, 0, 0, '', 2, 'Male', '36603-4313955-3', 'rasheed  colony vihari', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 3, 542, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 09:16:59', NULL, NULL, '2018-04-26 09:14:00', '', '', '', ''),
(10420, '0', '0', 'haneef', 'S/O', 'Ahmad Din', '', 63, 0, 0, '', 1, 'Male', '35301-1005695-6', 'hawali lakha tehsil dapalpur dist okara', '', 'Labour', '300', 'No', 'Emergency', 'emergency', 1, 354, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 09:53:53', NULL, NULL, '2018-04-26 09:50:00', '', '', '', ''),
(10421, '0', '0', 'm asad', 'S/O', 'zahi hussain', '', 16, 0, 0, '', 1, 'Male', '36202-0959003-1', 'masmana wala po kehrorpakka dist lodra', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 350, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 10:39:19', NULL, NULL, '2018-04-26 10:37:00', '', '', '', ''),
(10422, '0', '0', 'sami ulla ', 'S/O', 'm hanif tahir', '', 20, 0, 0, '', 39, 'Male', '33102-5163723-3', 'chak 233 street no 2 mohala tyyyb towm fasil aba', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 6, 823, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 10:50:30', NULL, NULL, '2018-04-26 10:46:00', '', '', '', ''),
(10423, '0', '0', 'maryam', 'D/O', 'abid', '', 4, 0, 0, '', 22, 'Female', '31201-4696713-3', 'Bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 640, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 11:16:10', NULL, NULL, '2018-04-26 11:14:00', '', '', '', ''),
(10424, '0', '0', 'shahid iqbal', 'S/O', 'shah muhammad', '', 39, 0, 0, '', 34, 'Male', '36202-3878061-3', 'ianat pur house no 258/6 mohala chsndi dist lora', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 557, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 11:56:08', NULL, NULL, '2018-04-26 11:53:00', '', '', '', ''),
(10425, '0', '0', 'ali hsanain', 'S/O', ' m adnan', '', 2, 0, 0, '', 43, 'Male', '31202-8652180-3', 'abbas colony bhttta no 1 bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 556, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 13:59:48', NULL, NULL, '2018-04-26 13:57:00', '', '', '', ''),
(10426, '0', '0', 'abida bb', 'W/O', 'talib hussain', '', 28, 0, 0, '', 13, 'Female', '31102-9945443-1', 'aliniya colony chishtian', '', 'house wife', '2147483647', 'Yes', 'Emergency', 'emergency', 3, 545, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 17:31:43', NULL, NULL, '2018-04-26 17:27:00', '', '', '', ''),
(10427, '0', '0', 'rab nawaz', 'S/O', 'muhmmad ghazi', '', 45, 0, 0, '', 13, 'Male', '31201-4577097-3', 'moza anayat pur uch shareef', '', 'Labour', '2147483647', 'Yes', 'Emergency', 'emergency', 3, 548, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 18:32:04', NULL, NULL, '2018-04-26 17:30:00', '', '', '', ''),
(10428, '0', '0', 'zainab', 'D/O', 'shakoor', '', 13, 0, 0, '', 43, 'Female', '31201-9927743-5', 'tibi hot mehra ahmadpr b dist bwp', '', 'Nil', '2147483647', 'Yes', 'OPD', 'OPD', 2, 641, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-26 18:48:57', NULL, NULL, '2018-04-26 13:00:00', '', '', '', ''),
(10429, '0', '0', 'Nazeer Ahmad', 'S/O', 'Ahmad Din', '18-04-1956', 62, 0, 0, 'A+VE', 1, 'Male', '31302-9354876-7', 'liaqat pur district rahimyar khan', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 348, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-27 06:20:51', NULL, NULL, '2018-04-27 06:16:00', '', '', '', ''),
(10430, '0', '0', 'M.Mursaleen', 'S/O', 'Giyas-ud-Din', '28-04-1972', 45, 0, 0, 'A+VE', 1, 'Male', '32301-1973973-8', 'Mohalla Farooqia ward NO.9 Alipur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 550, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-27 06:26:14', NULL, NULL, '2018-04-27 04:00:00', '', '', '', ''),
(10431, '0', '0', 'sadeeq', 'S/O', 'mulazim hussain', '', 50, 0, 0, '', 1, 'Male', '36201-6072085-7', 'chak no 345 w.b', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 351, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-27 08:24:49', NULL, NULL, '2018-04-27 08:21:00', '', '', '', ''),
(10433, '0', '0', 'irfan', 'S/O', 'azam', '', 18, 0, 0, '', 1, 'Male', '31202-0229484-3', 'moza nukrani bwp', '', 'Student', '300', 'No', 'Emergency', 'COD', 1, 353, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-27 10:04:09', NULL, NULL, '2018-04-27 10:02:00', '', '', '', ''),
(10434, '0', '0', 'haq nawaz', 'S/O', 'Khuda Bux', '', 60, 0, 0, '', 1, 'Male', '36602-3362274-7', 'melsi vihari', '', 'Labour', '2147483647', 'No', 'Emergency', 'COD', 1, 355, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-27 10:06:49', NULL, NULL, '2018-04-27 10:05:00', '', '', '', ''),
(10435, '0', '0', 'zahoor bibi', 'W/O', 'ghafor', '', 55, 0, 0, '', 22, 'Female', '31202-6259469-1', 'bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'ward m2', 2, 642, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-27 12:00:35', NULL, NULL, '2018-04-27 11:57:00', '', '', '', ''),
(10436, '0', '0', 'sumaira', 'D/O', 'razaq', '', 29, 0, 0, '', 43, 'Female', '36603-5764794-5', 'chak no 567 vehari', '', 'nil', '2147483647', 'Yes', 'Emergency', 'emergency', 2, 643, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-27 18:56:26', NULL, NULL, '2018-04-27 18:30:00', '', '', '', ''),
(10437, '0', '0', 'Manzoor', 'S/O', 'khuda BUX', '11-04-1973', 45, 0, 0, 'A+VE', 1, 'Male', '31103-4360785-3', 'CHAK NMBR 270Hr disrct bhwl nagr ', '', 'labour', '2147483647', 'No', 'Emergency', 'emergncy', 1, 356, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-28 00:13:47', NULL, NULL, '2018-04-28 00:06:00', '', '', '', ''),
(10438, '0', '0', 'Imran', 'S/O', 'Abdul Khaliq', '04-04-1996', 22, 0, 0, 'A+VE', 1, 'Male', '36301-1352507-8', 'moza khermani wala distrct Mltan', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 3, 562, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-28 01:25:34', NULL, NULL, '2018-04-28 01:20:00', '', '', '', ''),
(10439, '0', '0', 'mrs.saleem', 'W/O', 'saleem', '', 50, 0, 0, '', 22, 'Female', '31202-6128181-9', 'millat colony bwp', '', 'nil', '2147483647', 'No', 'OPD', 'OPD', 2, 646, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 09:46:22', NULL, NULL, '2018-04-28 09:44:00', '', '', '', ''),
(10440, '0', '0', 'kaneez fatima', 'W/O', 'aslam', '', 30, 0, 0, '', 34, 'Female', '36601-0486251-8', 'gulshancolony vihari', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 647, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 09:52:16', NULL, NULL, '2018-04-28 09:50:00', '', '', '', ''),
(10441, '0', '0', 'ishfaq', 'S/O', 'nazer', '', 38, 0, 0, '', 1, 'Male', '36201-2899520-3', 'chak 355 lodhran', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergncy', 1, 357, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 10:14:29', NULL, NULL, '2018-04-28 10:12:00', '', '', '', ''),
(10442, '0', '0', 'shabeer', 'S/O', 'nawaz', '', 43, 0, 0, '', 1, 'Male', '36201-2022185-7', 'chak 374lodhran', '', 'Labour', '2147483647', 'No', 'Emergency', 'cod', 1, 358, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 11:21:09', NULL, NULL, '2018-04-28 11:19:00', '', '', '', ''),
(10443, '0', '0', 'Qura-tu-lain', 'D/O', 'Ghulam Murtaza', '', 15, 0, 0, '', 1, 'Female', '36304-1366826-7', 'moaz darwaish muhammad jhangi wala bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 648, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 11:59:26', NULL, NULL, '2018-04-28 11:55:00', '', '', '', ''),
(10444, '0', '0', 'Amman ul ah', 'S/O', 'abdul razzaq', '', 20, 0, 0, '', 1, 'Male', '36601-0370574-5', 'chak no 521E/B Wahari', '', 'Student', '2147483647', 'No', 'OPD', 'OPD', 3, 555, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 12:07:13', NULL, NULL, '2018-04-28 12:03:00', '', '', '', ''),
(10445, '0', '0', 'usman ali', 'S/O', 'asgher ali', '', 1, 0, 0, '', 43, 'Male', '31203-9889320-5', 'riaz colony haroon abad dist bahawal nagher', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 563, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 12:19:09', NULL, NULL, '2018-04-28 12:15:00', '', '', '', ''),
(10446, '0', '0', 'aiza ', 'D/O', 'm abid', '', 5, 0, 0, '', 42, 'Female', '31202-8218337-0', 'majeeda abad colonyy bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 565, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 13:08:52', NULL, NULL, '2018-04-28 13:06:00', '', '', '', ''),
(10447, '0', '0', 'perveen bb', 'W/O', 'nasir', '', 35, 0, 0, '', 1, 'Female', '31302-1919050-4', 'basti saeda po jin pur tehsil liaqat pur dist raheem yaar khan', '', 'House wife', '300', 'No', 'OPD', 'OPD', 2, 652, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-28 13:27:29', NULL, NULL, '2018-04-28 13:24:00', '', '', '', ''),
(10448, '0', '0', 'Shamshad', 'W/O', 'Fida Hussain', '01-01-1983', 35, 0, 0, 'A+VE', 6, 'Female', '31302-8771670-5', 'Trunda M.Panha Liaqat Pur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 649, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-28 23:43:30', NULL, NULL, '2018-04-28 23:40:00', '', '', '', ''),
(10449, '0', '0', 'Saleem', 'S/O', 'M.Saddique', '01-02-1995', 23, 0, 0, 'A+VE', 1, 'Male', '36203-6157629-5', 'Lodhran', '', 'work in sodia arabia', '2147483647', 'No', 'Emergency', 'emergency', 1, 359, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-29 04:09:25', NULL, NULL, '2018-04-29 04:06:00', '', '', '', ''),
(10450, '0', '0', 'sultana bibi', 'D/O', 'gh rasool', '', 5, 0, 0, '', 1, 'Female', '31105-5715013', 'basti chack kayliar bwn', '', 'Nil', '2147483647', 'No', 'Emergency', 'COD', 2, 656, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-29 10:02:47', NULL, NULL, '2018-04-29 09:58:00', '', '', '', ''),
(10451, '0', '0', 'm saleem', 'S/O', 'abdul kareem', '', 30, 0, 0, '', 1, 'Male', '31202-3466677-9', 'basti mari gusayee ahmad pur sharkia dist bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 3, 564, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-29 10:59:46', NULL, NULL, '2018-04-29 10:57:00', '', '', '', ''),
(10452, '0', '0', 'munir', 'S/O', 'ghulam m', '', 50, 0, 0, '', 1, 'Male', '31205-5731331-9', 'chack no 44dnb yazaman bwp', '', 'nill', '2147483647', 'No', 'Emergency', 'COD', 1, 365, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-29 13:00:04', NULL, NULL, '2018-04-29 12:55:00', '', '', '', ''),
(10453, '0', '0', 'm maaz', 'S/O', 'kareem', '', 16, 0, 0, '', 1, 'Male', '31204-5325140-5', 'muhjair colony kachi abdi bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'COD', 1, 361, 22, 'Under Treatment', 'person.jpg', 0, '2018-04-29 13:18:28', NULL, NULL, '2018-04-29 13:14:00', '', '', '', ''),
(10454, '0', '0', 'Safia bibi', 'W/O', 'Barkat', '01-01-1948', 70, 0, 0, 'O+VE', 1, 'Female', '31203-6742778-9', 'hasil pur Bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 6, 816, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-29 23:26:44', NULL, NULL, '2018-04-29 23:23:00', '', '', '', ''),
(10455, '0', '0', 'Barkat ali', 'S/O', 'M. Ramzan', '10-04-1983', 35, 0, 0, 'A+VE', 1, 'Male', '33302-0260385-5', 'Teh kamalia disttoba teke singh', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 360, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-30 02:23:27', NULL, NULL, '2018-04-30 02:06:00', '', '', '', ''),
(10456, '0', '0', 'Sajid', 'S/O', 'Riaz Ahmad', '01-02-2010', 8, 0, 0, 'A+VE', 1, 'Male', '31203-1013921-5', 'Hasil Pur Bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 558, 22, 'Under Treatment', 'person.jpg', 1, '2018-04-30 21:12:18', NULL, NULL, '2018-04-30 21:09:00', '', '', '', ''),
(10457, '0', '0', 'Aziz mai ', 'W/O', 'Allah Bachaya', '01-01-1973', 45, 0, 0, 'O+VE', 1, 'Female', '36202-6087594-3', 'KHeror pacca Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 650, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-01 01:11:47', NULL, NULL, '2018-05-01 01:15:00', '', '', '', ''),
(10459, '0', '0', 'Rashid', 'S/O', 'Rasheed', '01-01-2017', 1, 0, 0, 'A+VE', 1, 'Male', '31101-3610674-9', 'Bahawalnagar', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 363, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-01 04:19:15', NULL, NULL, '2018-05-01 04:16:00', '', '', '', ''),
(10460, '0', '0', 'Khalid ', 'S/O', 'Gh.Rasool', '01-02-1963', 55, 0, 0, 'A+VE', 1, 'Male', '31202-6024701-3', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 364, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-01 16:34:26', NULL, NULL, '2018-05-01 16:32:00', '', '', '', ''),
(10461, '0', '0', 'Javed', 'S/O', 'Jameel', '07-05-2008', 9, 0, 0, 'A+VE', 1, 'Male', '36203-1817232-1', 'Lodhran', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 366, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-01 17:39:27', NULL, NULL, '2018-05-01 17:36:00', '', '', '', ''),
(10463, '0', '0', 'kaousar', 'W/O', 'mahar masih', '', 50, 0, 0, '', 1, 'Female', '31202-6547974-0', 'block no 02 islami colony bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 658, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-02 10:51:08', NULL, NULL, '2018-05-02 10:47:00', '', '', '', ''),
(10467, '0', '0', 'Shamim', 'W/O', 'Iqbal', '21-03-1990', 28, 0, 0, 'A+VE', 1, 'Female', '36401-8341901', 'district arif wala', '', 'housewife', '2147483647', 'No', 'Emergency', 'emergency', 2, 655, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-02 18:45:50', NULL, NULL, '2018-05-02 18:41:00', '', '', '', ''),
(10468, '0', '0', 'hamid', 'S/O', 'm shafeeq', '', 10, 0, 0, '', 1, 'Male', '31203-1544728-3', 'shah pur shareef hasil pur dist bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 660, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 08:23:40', NULL, NULL, '2018-05-03 08:21:00', '', '', '', ''),
(10469, '0', '0', 'hina rehan', 'W/O', 'rehan malik', '', 25, 0, 0, '', 38, 'Female', '31202-0228148-1', 'house no b.11 2791 bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 662, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 08:49:31', NULL, NULL, '2018-05-03 08:46:00', '', '', '', ''),
(10470, '0', '0', 'shazia perveen', 'W/O', 'ghulam yaseen', '', 30, 0, 0, '', 1, 'Female', '31101-8012480-7', 'basti rohana p/o khaas dist bahawal nager', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 654, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 10:07:13', NULL, NULL, '2018-05-03 10:04:00', '', '', '', ''),
(10472, '0', '0', 'saira', 'W/O', 'm bilal', '', 18, 0, 0, '', 35, 'Female', '31201-5846902-3', 'bast jhangra tehsil ahmad pur dist bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 664, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 10:24:10', NULL, NULL, '2018-05-03 10:21:00', '', '', '', ''),
(10473, '0', '0', 'shahid', 'S/O', 'allha ditta', '', 12, 0, 0, '', 43, 'Male', '36301-1331238-5', 'ubara p/o jalal pur peer wala dist multan', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 3, 567, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 10:31:17', NULL, NULL, '2018-05-03 10:28:00', '', '', '', ''),
(10475, '0', '0', 'abdulla ', 'S/O', 'amin', '', 11, 0, 0, '', 1, 'Male', '31204-0870965-1', 'jail road bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 659, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 11:08:11', NULL, NULL, '2018-05-03 11:06:00', '', '', '', ''),
(10476, '0', '0', 'Tiamoor ', 'S/O', 'Mansoor ahmed', '', 4, 0, 0, '', 1, 'Male', '31201-0647565-9', 'Dor kot po och bwp', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 3, 568, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 11:23:53', NULL, NULL, '2018-05-03 11:20:00', '', '', '', ''),
(10477, '0', '0', 'Sumaiya ', 'D/O', 'M.Ejaz', '', 20, 0, 0, '', 1, 'Female', '32103-4295899-1', 'Tonsa sharif D.G Khan', '', 'Student', '2147483647', 'No', 'Emergency', 'M 2', 2, 653, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 13:08:31', NULL, NULL, '2018-05-03 13:04:00', '', '', '', ''),
(10478, '0', '0', 'Noor Elahi ', 'S/O', 'Noor muhammad', '', 50, 0, 0, '', 1, 'Male', '31203-9521863-3', 'bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'M 2', 1, 367, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 13:12:30', NULL, NULL, '2018-05-03 13:10:00', '', '', '', ''),
(10479, '0', '0', 'sughra bb', 'W/O', 'm saeed', '', 45, 0, 0, '', 35, 'Female', '31202-1931796-9', 'muhammad abad tiba badar shaeer bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 3, 571, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 13:20:04', NULL, NULL, '2018-05-03 13:17:00', '', '', '', ''),
(10480, '0', '0', 'atta muhammad ', 'S/O', 'malik ahmad', '', 75, 0, 0, '', 27, 'Male', '36202-1041850-9', 'dhanoot p/o khaastehsil karor pakka dist lodra', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 667, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-03 13:23:48', NULL, NULL, '2018-05-03 13:21:00', '', '', '', ''),
(10482, '0', '0', 'Usman ', 'S/O', 'Abdul Ghafar', '01-02-2015', 3, 0, 0, 'A+VE', 1, 'Male', '32301-2036085-1', 'Muzafar Ghar', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 1, 369, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-03 15:50:33', NULL, NULL, '2018-05-03 14:44:00', '', '', '', ''),
(10483, '0', '0', 'Imaan fatima', 'D/O', 'Ryaz ahmad', '01-05-2015', 3, 0, 0, 'A+VE', 3, 'Female', '31201-5248737-5', 'Ahmedpur Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'peads 1', 2, 657, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-03 16:02:58', NULL, NULL, '2018-05-03 15:52:00', '', '', '', ''),
(10484, '0', '0', 'awais', 'S/O', 'muneer', '', 20, 0, 0, '', 1, 'Male', '31202-9014405', 'headrajka', '', 'Student', '2147483647', 'No', 'Emergency', 'COD', 1, 371, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-04 10:46:11', NULL, NULL, '2018-05-04 10:44:00', '', '', '', ''),
(10485, '0', '0', 'zeshan', 'S/O', 'riaz', '', 13, 0, 0, '', 1, 'Male', '31203-0135060-3', 'hasilpur bwp', '', 'student', '2147483647', 'No', 'Emergency', 'COD', 1, 372, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-04 10:51:56', NULL, NULL, '2018-05-04 10:50:00', '', '', '', ''),
(10486, '0', '0', 'shabir', 'S/O', 'imam bux', '', 70, 0, 0, '', 1, 'Male', '31302-4899975-5', 'rahimyar khan', '', 'Labour', '2147483647', 'No', 'Emergency', 'COD', 1, 374, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-04 11:39:48', NULL, NULL, '2018-05-04 11:38:00', '', '', '', ''),
(10487, '0', '0', 'M.Jumma', 'S/O', 'Allah Din', '01-02-1983', 35, 0, 0, 'A+VE', 1, 'Male', '03012-6142844-9', 'Malsi Vehari', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 375, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-04 15:06:04', NULL, NULL, '2018-05-04 14:30:00', '', '', '', ''),
(10488, '0', '0', 'Zain', 'S/O', 'M.shabir', '01-02-2014', 4, 0, 0, 'A+VE', 1, 'Male', '31104-3763923-3', 'haroon abad', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 376, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-04 16:10:00', NULL, NULL, '2018-05-04 15:06:00', '', '', '', ''),
(10489, '0', '0', 'Rafique', 'S/O', 'Nazeer Ahmad', '10-02-1990', 28, 0, 0, 'A+VE', 9, 'Male', '31205-7205886-8', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 377, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-04 18:55:15', NULL, NULL, '2018-05-04 18:30:00', '', '', '', ''),
(10490, '0', '0', 'Mujahid', 'S/O', 'Haq Nawaz', '01-02-1990', 28, 0, 0, 'A+VE', 1, 'Male', '36602-3317897-1', 'Malsi Vehari', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 378, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-04 19:15:22', NULL, NULL, '2018-05-04 18:30:00', '', '', '', ''),
(10491, '0', '0', 'asif', 'S/O', 'm.haji', '', 35, 0, 0, '', 1, 'Male', '31203-8726273-1', 'qutab pur jamal pur', '', 'labour', '2147483647', 'No', 'Emergency', 'COD', 1, 379, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 08:47:19', NULL, NULL, '2018-05-05 08:41:00', '', '', '', ''),
(10492, '0', '0', 'parveen bibi', 'W/O', 'm.irshad', '', 28, 0, 0, '', 2, 'Female', '36203-3445110-3', 'galywal lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'COD', 2, 661, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 10:15:15', NULL, NULL, '2018-05-05 10:13:00', '', '', '', ''),
(10493, '0', '0', 'asif', 'S/O', 'hameed', '', 26, 0, 0, '', 14, 'Male', '31202-3887760-1', 'janowala bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 559, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 10:35:30', NULL, NULL, '2018-05-05 10:33:00', '', '', '', ''),
(10494, '0', '0', 'arshad', 'S/O', 'ramzan', '', 30, 0, 0, '', 16, 'Male', '31202-9191389-9', 'muhajir colonybwp', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 3, 560, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 10:51:26', NULL, NULL, '2018-05-05 10:49:00', '', '', '', ''),
(10495, '0', '0', 'nasreen', 'W/O', 'Akram', '', 40, 0, 0, '', 1, 'Female', '31203-1647671-4', 'Mohala Gareeb,street no 8 house no 1055/56 hasilpur BWP', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 663, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 11:16:41', NULL, NULL, '2018-05-05 11:13:00', '', '', '', ''),
(10496, '0', '0', 'MUHAMMAD Iqbal ', 'S/O', 'Mhr din', '', 35, 0, 0, '', 12, 'Male', '36201-0566846-5', 'chq 267 dunia pur', '', 'education', '2147483647', 'No', 'OPD', 'OPD', 1, 382, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-05 11:27:03', NULL, NULL, '2018-05-05 11:22:00', '', '', '', ''),
(10497, '0', '0', 'Sair bibi', 'D/O', 'Ghulam shabeer ', '', 7, 0, 0, '', 43, 'Female', '36103-6930410-3', 'Lahor mor khaniwal', '', 'labour', '2147483647', 'No', 'OPD', 'OPD', 2, 669, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 13:01:06', NULL, NULL, '2018-05-05 12:55:00', '', '', '', ''),
(10498, '0', '0', 'M arbaz ', 'S/O', 'Mhaneef ', '', 15, 0, 0, '', 6, 'Male', '36202-6589465-7', 'khror pka lodhran', '', 'labour', '2147483647', 'No', 'Emergency', 'COD', 1, 384, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 13:07:30', NULL, NULL, '2018-05-05 13:04:00', '', '', '', ''),
(10499, '0', '0', 'Naveed ', 'S/O', 'Sardar muhammad ', '', 40, 0, 0, '', 20, 'Male', '31202-1654333-7', 'chq 13 \\Bc bwp', '', 'labur', '2147483647', 'No', 'Emergency', 'COD', 1, 386, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-05 13:16:06', NULL, NULL, '2018-05-05 13:12:00', '', '', '', ''),
(10500, '0', '0', 'Arif', 'S/O', 'Allah Wasaya', '01-02-2000', 18, 0, 0, 'A+VE', 1, 'Male', '31302-5227494-1', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 380, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-06 15:36:49', NULL, NULL, '2018-05-05 19:45:00', '', '', '', ''),
(10501, '0', '0', 'Uzma ', 'D/O', 'M.Altaf', '01-02-2011', 7, 0, 0, 'A+VE', 1, 'Female', '36202-3163616-7', 'Lodhran', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 665, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-06 18:28:53', NULL, NULL, '2018-05-06 18:31:00', '', '', '', ''),
(10502, '0', '0', 'Aziz', 'S/O', 'Nizamuddin', '01-01-1947', 71, 0, 0, 'A+VE', 7, 'Male', '36202-4291960-9', 'Lodhran', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 381, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-06 18:37:44', NULL, NULL, '2018-05-06 17:45:00', '', '', '', ''),
(10503, '0', '0', 'Liaqat', 'S/O', 'Rajab Ali', '01-01-2008', 10, 0, 0, 'A+VE', 1, 'Male', '31205-0546415-1', 'Yazman Bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 6, 817, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-06 20:00:53', NULL, NULL, '2018-05-06 17:30:00', '', '', '', ''),
(10504, '0', '0', 'alishba', 'D/O', 'khadim hussain', '', 8, 0, 0, '', 1, 'Female', '36201-0120409-3', 'duniya pur', '', 'Nil', '2147483647', 'No', 'Emergency', 'COD', 2, 666, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-07 08:33:48', NULL, NULL, '2018-05-07 08:31:00', '', '', '', ''),
(10505, '0', '0', 'irshad bibi', 'W/O', 'gh.rasool', '', 70, 0, 0, '', 1, 'Female', '31204-8327458-7', 'ghanipur bwp', '', 'nill', '2147483647', 'No', 'Emergency', 'COD', 2, 668, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-07 09:09:10', NULL, NULL, '2018-05-07 09:07:00', '', '', '', ''),
(10506, '0', '0', 'Mustqeem ', 'S/O', 'yaseen ', '', 10, 0, 0, '', 1, 'Male', '31302-7803546-5', 'liqat pur rahim yar', '', 'labour', '2147483647', 'No', 'Emergency', 'cod', 1, 389, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-07 10:41:56', NULL, NULL, '2018-05-07 10:39:00', '', '', '', ''),
(10507, '0', '0', 'Kalsoom bibi', 'W/O', 'm ameen', '', 39, 0, 0, '', 1, 'Female', '30110-1164799-0', 'bhawal ngr', '', 'labour', '2147483647', 'No', 'OPD', 'OPD', 2, 673, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-07 10:48:51', NULL, NULL, '2018-05-07 10:46:00', '', '', '', ''),
(10510, '0', '0', 'shabana', 'W/O', 'khursheed', '', 40, 0, 0, '', 2, 'Female', '36602-9078756-6', 'melsi vihari', '', 'nill', '2147483647', 'No', 'OPD', 'OPD', 2, 670, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-07 11:32:55', NULL, NULL, '2018-05-07 11:30:00', '', '', '', ''),
(10514, '0', '0', 'Saira Bibi', 'D/O', 'Sajid', '01-11-2017', 0, 0, 0, 'A+VE', 43, 'Female', '36301-6138548-5', 'Jalalpur Pir Wala Multan', '', 'Nil', '2147483647', 'No', 'OPD', 'emergency', 2, 672, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-10 15:40:16', NULL, NULL, '2018-05-10 15:19:00', '', '', '', ''),
(10515, '0', '0', 'Allah Ditta', 'S/O', 'Kareem Bux', '01-02-1973', 45, 0, 0, 'A+VE', 1, 'Male', '31204-4051238-7', 'Khair Pur Tame Wali', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 3, 572, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-10 17:59:38', NULL, NULL, '2018-05-10 18:41:00', '', '', '', ''),
(10516, '0', '0', 'sajjad', 'S/O', 'islam', '', 25, 0, 0, '', 1, 'Male', '36203-6993789-7', 'anwra lodhra', '', 'Nil', '2147483647', 'No', 'Emergency', 'COD', 3, 573, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-11 09:07:12', NULL, NULL, '2018-05-11 09:04:00', '', '', '', ''),
(10517, '0', '0', 'M.Irfan', 'S/O', 'Gh.Mustafa', '12-02-2011', 7, 0, 0, 'A+VE', 1, 'Male', '31202-0299831-3', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 385, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-12 14:38:46', NULL, NULL, '2018-05-12 14:35:00', '', '', '', ''),
(10518, '0', '0', 'Abid Hussain', 'S/O', 'Abdul Rehman', '', 37, 0, 0, '', 1, 'Male', '31102-4915016-1', 'Chak no 179 Chistiyun Bahawalnagar', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 3, 574, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-14 09:43:40', NULL, NULL, '2018-05-14 09:39:00', '', '', '', ''),
(10519, '0', '0', 'M.Khan', 'S/O', 'Haider', '01-02-1958', 60, 0, 0, 'A+VE', 19, 'Male', '36202-1313567-7', 'Lodhran', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 575, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-15 15:24:56', NULL, NULL, '2018-05-15 15:20:00', '', '', '', ''),
(10520, '0', '0', 'Imam Ali', 'S/O', 'Ismail', '01-01-1993', 25, 0, 0, 'A+VE', 1, 'Male', '31202-6134855-0', 'Bahawalpur', '', 'tailor', '0', 'No', 'Emergency', 'emergency', 5, 72, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-15 19:09:25', NULL, NULL, '2018-05-15 16:26:00', '', '', '', ''),
(10522, '0', '0', 'Ali', 'S/O', 'Botta', '01-01-2008', 10, 0, 0, 'A-VE', 1, 'Male', '31204-6907126-9', 'Khair Pur Tame Wali', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 577, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-15 19:17:26', NULL, NULL, '2018-05-15 19:13:00', '', '', '', ''),
(10523, '0', '0', 'Mumtaz', 'S/O', 'M.Sarwar', '01-02-1983', 35, 0, 0, 'A+VE', 1, 'Male', '36603-3851011-1', 'vehari', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 387, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-15 19:29:17', NULL, NULL, '2018-05-15 17:30:00', '', '', '', ''),
(10526, '0', '0', 'Ghulam Nabi', 'S/O', 'Ghulam Yaseen', '', 20, 0, 0, 'A+VE', 1, 'Male', '31202-5626772-8', 'Moza Jiwahiya Lar Rahimyarkhan', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 388, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-16 11:40:41', NULL, NULL, '2018-05-16 11:36:00', '', '', '', ''),
(10527, '0', '0', 'Anita BIbi ', 'D/O', 'Khalid', '', 20, 0, 0, '', 1, 'Female', '36401-5188701-7', 'Chak no 66E/B Arif wala Pakpatan', '', 'Student', '2147483647', 'No', 'OPD', 'OPD', 2, 676, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-16 11:48:42', NULL, NULL, '2018-05-16 11:41:00', '', '', '', ''),
(10528, '0', '0', 'alia bb', 'D/O', 'khuda bakhash', '', 15, 0, 0, '', 1, 'Female', '32304-2782176-1', 'chah soo wala po hasan wala muzafer gaer', '', 'Nil', '2147483647', 'No', 'Emergency', 'mw1', 6, 826, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-16 12:32:46', NULL, NULL, '2018-05-16 12:28:00', '', '', '', ''),
(10530, '0', '0', 'sadia bibi', 'D/O', 'abdul shakoor', '', 4, 0, 0, '', 43, 'Female', '36603-8498823-1', 'moza akber shah tehsil luddan dist vehari', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 6, 824, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-17 09:08:28', NULL, NULL, '2018-05-17 09:05:00', '', '', '', ''),
(10531, '0', '0', 'm mushtaq ', 'S/O', 'gul muhammad', '', 36, 0, 0, '', 15, 'Male', '31201-1380438-7', 'basti jaam nazer tehsil ahmadpur east dist bwp', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 6, 825, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-17 09:46:45', NULL, NULL, '2018-05-17 09:43:00', '', '', '', ''),
(10532, '0', '0', 'asooq', 'S/O', 'lakkha raam', '', 38, 0, 0, '', 12, 'Male', '31104-1689417-1', 'house no 431 gulshan vella dist bahawal nager', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 3, 583, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-17 09:50:06', NULL, NULL, '2018-05-17 09:46:00', '', '', '', ''),
(10533, '0', '0', 'Rafiya', 'W/O', 'M.Iqbal', '', 92, 0, 0, '', 1, 'Female', '31202-4818124-1', 'Gulsahn-din-m colony house no292 Bahawalpur', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 677, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-17 10:03:12', NULL, NULL, '2018-05-17 09:59:00', '', '', '', ''),
(10534, '0', '0', 'Bima', 'D/O', 'Rashid', '', 5, 0, 0, '', 1, 'Female', '31202-1535973-1', 'Ahmedpur east Bahawalpur', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 678, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-17 10:06:50', NULL, NULL, '2018-05-17 10:03:00', '', '', '', ''),
(10537, '0', '0', 'wazeera bibi ', 'W/O', 'bashir ahmad', '', 40, 0, 0, '', 35, 'Female', '31203-1692155-7', 'basti sabodia hasilpur dist bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 3, 586, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-17 12:48:59', NULL, NULL, '2018-05-17 12:45:00', '', '', '', ''),
(10538, '0', '0', 'Azra ', 'W/O', 'M.Farooq', '01-02-1982', 36, 0, 0, 'AB+VE', 1, 'Female', '36203-4137144-1', 'Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 679, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-17 14:45:41', NULL, NULL, '2018-05-17 14:42:00', '', '', '', ''),
(10539, '0', '0', 'Qasim', 'S/O', 'Gull M.', '01-02-1958', 60, 0, 0, 'A+VE', 1, 'Male', '31202-0341718-5', 'Bahawalpur', '', 'imam masjid', '2147483647', 'No', 'Emergency', 'emergency', 1, 390, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-18 15:42:21', NULL, NULL, '2018-05-18 15:38:00', '', '', '', ''),
(10540, '0', '0', 'Zahaida Parveen', 'W/O', 'Abdul  Majeed', '01-06-1969', 48, 0, 0, 'A+VE', 25, 'Female', '31201-0323298-2', 'Bahawalpur', '', 'LHW', '2147483647', 'No', 'OPD', 'OPD', 2, 680, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-19 14:42:52', NULL, NULL, '2018-05-19 14:38:00', '', '', '', ''),
(10541, '0', '0', 'Zain', 'S/O', 'Imtiaz Ahmad', '01-02-2013', 5, 0, 0, 'A+VE', 1, 'Male', '36203-0271870-3', 'Lodhran', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 391, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-19 18:16:07', NULL, NULL, '2018-05-19 18:13:00', '', '', '', ''),
(10542, '0', '0', 'Rafiya', 'W/O', 'Iqbal', '', 52, 0, 0, 'A+VE', 1, 'Female', '31202-5636763-7', 'block no 292 gulshan din colony Bwp', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 681, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-21 10:38:43', NULL, NULL, '2018-05-21 10:35:00', '', '', '', ''),
(10543, '0', '0', 'kaneez akhtar', 'W/O', 'khan muhammad', '', 60, 0, 0, '', 1, 'Female', '31202-0205815-5', 'setlite town bwp', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 685, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-21 10:48:54', NULL, NULL, '2018-05-21 10:45:00', '', '', '', ''),
(10545, '0', '0', 'hassan rasheed', 'S/O', 'abdul rasheed', '', 20, 0, 0, '', 1, 'Male', '31202-0340423-3', 'alnoor garden house no 28 bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 6, 830, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-21 11:57:17', NULL, NULL, '2018-05-21 11:54:00', '', '', '', ''),
(10546, '0', '0', 'Zakir', 'S/O', 'Nazar Hussain', '01-01-1982', 36, 0, 0, 'A+VE', 1, 'Male', '31203-3271972-9', 'Bahawalpur', '', 'acred', '2147483647', 'No', 'Emergency', 'emergency', 1, 393, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-21 15:33:06', NULL, NULL, '2018-05-21 15:44:00', '', '', '', ''),
(10547, '0', '0', 'Mushtaq Hussain', 'S/O', 'Gull Muhammad', '01-01-1958', 60, 0, 0, 'A+VE', 1, 'Male', '32301-9188876-5', 'Ali pur Mazafar ghar', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 394, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-21 18:32:50', NULL, NULL, '2018-05-21 18:00:00', '', '', '', ''),
(10548, '0', '0', 'M.Hussain', 'S/O', 'Jind WAda', '01-02-1963', 55, 0, 0, 'A+VE', 12, 'Male', '31201-6853512-7', 'Bahawalpur', '', 'nill', '2147483647', 'No', 'Emergency', 'emergency', 1, 395, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-21 18:41:29', NULL, NULL, '2018-05-21 18:32:00', '', '', '', ''),
(10550, '0', '0', 'parveen bibi', 'W/O', 'Rashid', '', 40, 0, 0, 'A+VE', 1, 'Female', '31102-3486547-9', 'chak no 13  chistiyun bahawalnagar', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 2, 682, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-22 10:58:34', NULL, NULL, '2018-05-22 10:55:00', '', '', '', ''),
(10551, '0', '0', 'saqib', 'S/O', 'irshad', '', 24, 0, 0, '', 15, 'Male', '31202-4354573-4', 'hasilpur dist bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 6, 818, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-23 09:14:48', NULL, NULL, '2018-05-23 09:11:00', '', '', '', ''),
(10553, '0', '0', 'Balqees', 'D/O', 'm.Akram', '01-02-2002', 16, 0, 0, 'A+VE', 27, 'Female', '31202-6144833-2', 'Hasil Pur Bwp', '', 'teacher of quran ', '2147483647', 'No', 'Emergency', 'emergency', 2, 683, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-23 15:50:05', NULL, NULL, '2018-05-23 15:46:00', '', '', '', ''),
(10554, '0', '0', 'Yasmeen', 'W/O', 'Abdul Majeed', '01-01-1973', 45, 0, 0, 'B+VE', 8, 'Female', '31202-9885572-5', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 684, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-24 14:35:02', NULL, NULL, '2018-05-24 14:31:00', '', '', '', ''),
(10555, '0', '0', 'asghar ali', 'S/O', 'bashir ', '', 28, 0, 0, '', 15, 'Male', '31234-7646777-6', 'boray wala dist vehari', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 6, 832, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-25 08:40:35', NULL, NULL, '2018-05-25 08:37:00', '', '', '', ''),
(10556, '0', '0', 'm shafeeq', 'S/O', 'ameer bakhash', '', 25, 0, 0, '', 1, 'Male', '31202-4148333-9', 'p/o noor pur noranga dist bwp', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergncy', 6, 820, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-25 08:56:51', NULL, NULL, '2018-05-25 08:53:00', '', '', '', ''),
(10558, '0', '0', 'm rashid', 'S/O', 'm riaz', '', 13, 0, 0, '', 1, 'Male', '31201-2122340-9', 'dain wala ahmadpur sharkia dist bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 6, 834, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-25 09:53:52', NULL, NULL, '2018-05-25 09:51:00', '', '', '', ''),
(10560, '0', '0', 'shafeeq ', 'S/O', 'nazeer ahmad', '', 25, 0, 0, '', 1, 'Male', '31201-9716965-3', 'musafer khna basti dhol bakh bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 1, 403, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-25 11:20:33', NULL, NULL, '2018-05-25 11:16:00', '', '', '', ''),
(10561, '0', '0', 'mohsin', 'S/O', 'ijaz husain', '', 6, 0, 0, '', 1, 'Male', '36301-9923874-7', 'ggazi pur tehsul jalalpur peer wala dist multal', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 3, 588, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-26 09:58:25', NULL, NULL, '2018-05-25 14:50:00', '', '', '', ''),
(10562, '0', '0', 'm safdar ', 'S/O', 'allah bachya', '', 28, 0, 0, '', 1, 'Male', '31233-4556798-8', 'kehror mor lodra', '', 'Nil', '2147483647', 'No', 'Emergency', 'emergency', 6, 836, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-26 10:01:17', NULL, NULL, '2018-05-26 09:58:00', '', '', '', ''),
(10564, '0', '0', 'ishfaq ahmad', 'S/O', 'nazeer ahmd', '', 22, 0, 0, '', 40, 'Male', '36301-9692200-1', 'chah jagan wala jalalpur peer wal dist multan', '', 'Student', '2043448389', 'No', 'OPD', 'opd', 6, 835, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-26 10:07:54', NULL, NULL, '2018-05-26 10:04:00', '', '', '', ''),
(10565, '0', '0', 'maryam ', 'W/O', 'm sadddeq', '', 40, 0, 0, '', 34, 'Female', '36201-2213741-7', 'chak no 17 dunia pur dist lodra', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 6, 840, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-26 10:11:49', NULL, NULL, '2018-05-26 10:08:00', '', '', '', ''),
(10568, '0', '0', 'asia ', 'W/O', 'maqbool ahmad', '', 40, 0, 0, '', 35, 'Female', '36402-9447743-5', 'mohala islam nager dist bahawal nager', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 3, 587, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-26 10:40:08', NULL, NULL, '2018-05-26 10:36:00', '', '', '', ''),
(10570, '0', '0', 'maqsod', 'S/O', 'akram', '', 60, 0, 0, '', 13, 'Male', '31302-1732499-1', 'maqbol colonybwp', '', 'Nil', '2147483647', 'Yes', 'OPD', 'OPD', 3, 580, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-26 11:10:49', NULL, NULL, '2018-05-26 11:07:00', '', '', '', ''),
(10571, '0', '0', 'ameer mai', 'W/O', 'm aslam', '', 34, 0, 0, '', 35, 'Female', '36602-5917420-7', 'mohala muhammad panah kehror pakka road dist vehari', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 693, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-26 12:54:08', NULL, NULL, '2018-05-26 12:50:00', '', '', '', ''),
(10572, '0', '0', 'khalida', 'W/O', 'm ashraf', '', 45, 0, 0, '', 12, 'Female', '32134-6757899-0', 'chak no 93 f hasil pur dist bwp ', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 691, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-28 09:49:17', NULL, NULL, '2018-05-28 09:46:00', '', '', '', ''),
(10573, '0', '0', 'nargis', 'W/O', 'rafeeq', '', 45, 0, 0, '', 1, 'Female', '31202-3153034-7', 'near s.e college bhagi khana bwp', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 3, 591, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-28 10:58:50', NULL, NULL, '2018-05-28 10:55:00', '', '', '', ''),
(10574, '0', '0', 'saira', 'D/O', 'm akber', '', 12, 0, 0, '', 1, 'Female', '31202-5375390-7', 'bakir pur bwp', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 2, 687, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-28 11:10:57', NULL, NULL, '2018-05-28 11:07:00', '', '', '', ''),
(10579, '0', '0', 'Amna Bibi', 'W/O', 'Faiz Bux', '01-02-1958', 60, 0, 0, 'A+VE', 1, 'Female', '31201-5349989-7', 'Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 686, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-29 15:52:23', NULL, NULL, '2018-05-29 15:49:00', '', '', '', ''),
(10580, '0', '0', 'khalid ', 'S/O', 'flak shair', '', 15, 0, 0, '', 1, 'Male', '31202-4445782-3', 'gulgusht colony bwp', '', 'LABOUR', '2147483647', 'No', 'Emergency', 'COD', 1, 400, 22, 'Under Treatment', 'person.jpg', 0, '2018-05-30 10:32:27', NULL, NULL, '2018-05-30 10:29:00', '', '', '', '');
INSERT INTO `admissiontbl` (`regNo`, `emergency_no`, `admi_no`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patMonthAge`, `patDaysAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patcity`, `patOccupation`, `patPhone`, `patEntitled`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patChart_id`, `patStatus`, `patient_pic_path`, `FreeCarePatient`, `admission_timestamp`, `previousRegno`, `sideRoomDate`, `patAdmDate`, `garName`, `garCnic`, `garContact`, `garRelation`) VALUES
(10583, '0', '0', 'M.Awais', 'S/O', 'Haseeb Ahmad', '01-02-1998', 20, 0, 0, 'A+VE', 7, 'Male', '31201-9428971-3', 'Bahawalpur', '', 'Student', '2147483647', 'No', 'Emergency', 'emergency', 6, 821, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-30 15:06:30', NULL, NULL, '2018-05-30 14:15:00', '', '', '', ''),
(10585, '0', '0', 'Hassano Mai', 'W/O', 'Ramzan', '01-02-1968', 50, 0, 0, 'A+VE', 1, 'Female', '03202-6142844-9', 'Shujaabad Multan', '', 'House wife', '2147483647', 'No', 'Emergency', 'emergency', 2, 694, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-30 18:57:36', NULL, NULL, '2018-05-30 18:55:00', '', '', '', ''),
(10586, '0', '0', 'M.Sajjad', 'S/O', 'M.Nawaz', '01-02-1983', 35, 0, 0, 'A+VE', 7, 'Male', '36203-2706005-7', 'Lodhran', '', 'Riksha Driver', '2147483647', 'No', 'Emergency', 'emergency', 6, 827, 22, 'Under Treatment', 'person.jpg', 1, '2018-05-31 15:29:47', NULL, NULL, '2018-05-31 14:45:00', '', '', '', ''),
(10587, '0', '0', 'Abdul Kareem', 'S/O', 'Muhammad Nawaz', '', 25, 0, 0, '', 1, 'Male', '36603-7037560-7', 'Chack no 33w/bDuniya pur', '', 'Labour', '2147483647', 'No', 'Emergency', 'emergency', 1, 398, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-02 08:55:35', NULL, NULL, '2018-06-02 08:51:00', '', '', '', ''),
(10588, '0', '0', 'Saif ur Rahman', 'S/O', 'Abdul GHafoor', '', 30, 0, 0, '', 1, 'Male', '31102-3516690-9', 'Thana City, Chishtian', '', 'Job', '2147483647', 'No', 'Emergency', 'Emergency', 1, 402, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-02 09:14:13', NULL, NULL, '2018-06-02 09:11:00', '', '', '', ''),
(10590, '0', '0', 'Khalil Ahmad', 'S/O', 'Rasool Bukhsh', '', 60, 0, 0, '', 18, 'Male', '32302-6425356-9', 'Jatoi, Muzaffar Garh', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 1, 405, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-02 09:55:35', NULL, NULL, '2018-06-02 09:45:00', '', '', '', ''),
(10594, '0', '0', 'Zubaida bibi', 'W/O', 'M Jameel', '', 60, 0, 0, '', 30, 'Female', '36602-2530132-7', 'Karam Pur, Melsi', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 2, 695, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-02 10:59:03', NULL, NULL, '2018-06-02 10:57:00', '', '', '', ''),
(10596, '0', '0', 'Eman Fatima', 'D/O', 'Abdul Ghaffar', '', 2, 0, 0, '', 43, 'Female', '36602-9841205-7', 'Tibba Sultan Pur, Melsi', '', 'Business', '2147483647', 'No', 'OPD', 'OPD', 2, 697, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-02 11:37:35', NULL, NULL, '2018-06-02 11:34:00', '', '', '', ''),
(10598, '0', '0', 'Maryam', 'W/O', 'Nawaz', '', 55, 0, 0, '', 1, 'Female', '31102-7231025-7', 'Chack no. 10/FW, Chishtian', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 698, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-02 12:05:47', NULL, NULL, '2018-06-02 11:45:00', '', '', '', ''),
(10599, '0', '0', 'Sajid', 'S/O', 'Nazir', '', 14, 0, 0, '', 18, 'Male', '36602-0933030-9', 'Chack No. 211 W/B, Vehari', '', 'Student', '2147483647', 'No', 'Emergency', 'Emergency', 1, 407, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 09:04:21', NULL, NULL, '2018-06-02 17:30:00', '', '', '', ''),
(10600, '0', '0', 'Khadim Hussain', 'S/O', 'Muhammad Rafique', '', 35, 0, 0, '', 36, 'Male', '36202-0952686-9', 'Gahi Mamman, Kahror Pakka, Lodhran', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 1, 408, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 09:23:05', NULL, NULL, '2018-06-02 20:16:00', '', '', '', ''),
(10601, '0', '0', 'Muhabat', 'S/O', 'Amaind Ali', '', 42, 0, 0, '', 1, 'Male', '31102-0613904-3', 'Chack No. 5/FW, Chishtian', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 409, 22, 'Diagnosed', 'person.jpg', 0, '2018-06-04 09:37:40', NULL, NULL, '2018-06-02 23:00:00', '', '', '', ''),
(10603, '0', '0', 'Sana Ali', 'S/O', 'Nawaz Muhammad', '', 20, 0, 0, '', 1, 'Male', '31101-3561334-7', 'Donga Bonga, Bahawal Nagar', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 411, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 09:56:57', NULL, NULL, '2018-06-04 09:55:00', '', '', '', ''),
(10606, '0', '0', 'Ghulam Rasool', 'S/O', 'Muhammad Bukhsh', '', 50, 0, 0, '', 1, 'Male', '36602-1924068-3', 'Garha Morr, Melsi', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 1, 404, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 10:25:35', NULL, NULL, '2018-06-04 10:19:00', '', '', '', ''),
(10610, '0', '0', 'Shamim Bibi', 'W/O', 'Bin Yameen', '', 35, 0, 0, '', 7, 'Female', '31105-7190041-1', 'Mari Sakota, Minchan Abad, Bahawalnagar', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 700, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 10:40:40', NULL, NULL, '2018-06-04 10:36:00', '', '', '', ''),
(10614, '0', '0', 'Hameeda Bibi', 'W/O', 'Qurat Ullah', '', 25, 0, 0, '', 1, 'Female', '31105-1604433-7', 'Basti Hassan Wala, Minchan Abad', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 699, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 11:02:40', NULL, NULL, '2018-06-03 06:00:00', '', '', '', ''),
(10616, '0', '0', 'Nazeeran bibi', 'W/O', 'shraft ali', '', 45, 0, 0, '', 36, 'Female', '36602-9352737-9', 'mfroza abad vehari', '', 'House wife', '2147483647', 'No', 'OPD', 'opd', 2, 703, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 11:26:30', NULL, NULL, '2018-06-04 11:22:00', '', '', '', ''),
(10618, '0', '0', 'Asia Bibi', 'D/O', 'Muhammad Ashraf', '', 16, 0, 0, '', 18, 'Female', '31205-2671369-1', 'Chack no. 20/wb, Vehari', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 2, 702, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 11:45:14', NULL, NULL, '2018-06-04 11:42:00', '', '', '', ''),
(10622, '0', '0', 'Abdullah', 'S/O', 'Muhammad Farooq', '', 2, 0, 0, '', 22, 'Male', '31202-4053400-6', 'Abbas Colony, Bahawalpur', '', 'N/A', '2147483647', 'No', 'Emergency', 'Emergency', 3, 581, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 12:11:43', NULL, NULL, '2018-06-03 21:30:00', '', '', '', ''),
(10624, '0', '0', 'Rakhshanda', 'W/O', 'Naeem Anjum', '', 54, 0, 0, '', 28, 'Female', '31202-0226725-2', 'Model Town A, Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 705, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-04 12:53:29', NULL, NULL, '2018-06-04 12:53:00', '', '', '', ''),
(10625, '0', '0', 'Allah Yar', 'S/O', 'Jind Wada', '', 60, 0, 0, '', 32, 'Male', '31202-3686011-1', 'Moza Ali Kharik, Ahmad pur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 404, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 08:49:05', NULL, NULL, '2018-06-04 22:20:00', '', '', '', ''),
(10627, '0', '0', 'Abdul Majeed', 'S/O', 'Muhammad Yaqoob', '', 40, 0, 0, '', 2, 'Male', '31103-1142512-7', 'Chack no. 335/HR, Fort Abbas', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 3, 584, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 09:28:21', NULL, NULL, '2018-06-04 13:30:00', '', '', '', ''),
(10629, '0', '0', 'Kalsoom', 'W/O', 'Muhammad Nawaz', '', 45, 0, 0, '', 9, 'Female', '42101-6692673-7', 'Mohalla Arfat Town, Nazim Abad, Karachi', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 706, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 09:44:31', NULL, NULL, '2018-06-05 09:42:00', '', '', '', ''),
(10630, '0', '0', 'Kashaf Fatima', 'D/O', 'Muhammad Boota', '', 4, 0, 0, '', 1, 'Female', '31103-8812813-9', 'Chack No. 204/9R, Fort Abbas', '', 'N/A', '2147483647', 'No', 'Emergency', 'Emergency', 2, 707, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 09:48:04', NULL, NULL, '2018-06-04 14:30:00', '', '', '', ''),
(10632, '0', '0', 'Inam ul Haq', 'S/O', 'Ghulam Qadir', '', 58, 0, 0, '', 1, 'Male', '36602-0626514-3', 'Mohalla Siddique Akbar, Melsi', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 1, 413, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 10:02:52', NULL, NULL, '2018-06-05 10:01:00', '', '', '', ''),
(10637, '0', '0', 'hasan shah ', 'S/O', 'mustfa shsh', '', 17, 0, 0, '', 1, 'Male', '31203-0244737-9', 'bsti qazi saeed hasil puyr', '', 'labur', '2147483647', 'No', 'Emergency', 'COD', 1, 417, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 11:46:38', NULL, NULL, '2018-06-05 11:43:00', '', '', '', ''),
(10641, '0', '0', 'Akbar Ali', 'S/O', 'Muhammad Siddique', '', 60, 0, 0, '', 22, 'Male', '31203-0959832-1', 'Chack no. 79/FW, Hasilpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Medical 4', 1, 397, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 13:08:15', NULL, NULL, '2018-06-05 12:35:00', '', '', '', ''),
(10643, '0', '0', 'Saira Bibi', 'W/O', 'Mehboob Hussain', '', 40, 0, 0, '', 7, 'Female', '36202-6457405-2', 'Mohalla Mumtaz Abad', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 696, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-05 13:13:32', NULL, NULL, '2018-06-05 13:11:00', '', '', '', ''),
(10645, '0', '0', 'Allah Wasai', 'W/O', 'Ghulam Qadir', '', 60, 0, 0, '', 8, 'Female', '00000-0000000-0', 'Jatoi, Muzaffar Garh', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 709, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-06 08:59:38', NULL, NULL, '2018-06-05 15:20:00', '', '', '', ''),
(10647, '0', '0', 'Shahid', 'S/O', 'Munir', '', 22, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Chack No. 56/KB, Ludan, Vehari', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 420, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-06 09:05:50', NULL, NULL, '2018-06-05 20:00:00', '', '', '', ''),
(10648, '0', '0', 'Ashraf', 'S/O', 'Hakim Ali', '', 55, 0, 0, '', 18, 'Male', '36601-1734945-5', 'Chack No, 447/EB, Bury Wala', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 421, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-06 09:08:12', NULL, NULL, '2018-06-05 22:30:00', '', '', '', ''),
(10649, '0', '0', 'Rasheed Ahmad', 'S/O', 'Kareem Bukhsh', '', 86, 0, 0, '', 1, 'Male', '00000-0000000-0', 'House No. 07, Model Town B, Bahawalpur', '', 'N/A', '2147483647', 'No', 'Emergency', 'Emergency', 1, 422, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-06 09:10:20', NULL, NULL, '2018-06-06 06:00:00', '', '', '', ''),
(10651, '0', '0', 'Aneela ', 'W/O', 'Umer Farooq', '', 32, 0, 0, '', 7, 'Female', '36603-9584307', 'chq477/wb vehari', '', 'Labour', '2147483647', 'No', 'OPD', 'm2', 2, 711, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-06 11:01:07', NULL, NULL, '2018-06-06 10:58:00', '', '', '', ''),
(10653, '0', '0', 'Faqeer Hussain', 'S/O', 'Chandan Deen', '', 50, 0, 0, '', 1, 'Male', '31102-6691130-7', 'Chack no 443 Fateh', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 414, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-06 11:43:55', NULL, NULL, '2018-06-06 11:42:00', '', '', '', ''),
(10655, '0', '0', 'Muhammad Ali', 'S/O', 'Dost Muhammad', '', 25, 0, 0, '', 12, 'Male', '32304-4173318-1', 'Kotla Chakar, Jalalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 416, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-06 12:05:50', NULL, NULL, '2018-06-06 12:04:00', '', '', '', ''),
(10658, '0', '0', 'Rizwan', 'S/O', 'Fayaz', '', 26, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Chack No.46/DB, Yazman', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 424, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 08:12:23', NULL, NULL, '2018-06-06 14:40:00', '', '', '', ''),
(10661, '0', '0', 'Sajjad', 'S/O', 'Khair', '', 30, 0, 0, '', 1, 'Male', '31103-7624907-3', 'Fort Abbas', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 427, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 08:20:11', NULL, NULL, '2018-06-06 17:30:00', '', '', '', ''),
(10663, '0', '0', 'Sheraz', 'S/O', 'Qaiser', '', 17, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Islami Colony Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 429, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 08:23:19', NULL, NULL, '2018-06-06 19:45:00', '', '', '', ''),
(10664, '0', '0', 'Irshad Mai', 'W/O', 'Mukhtiar', '', 25, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Chah Bhatta Wala, Shuja Abad', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 712, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 08:27:02', NULL, NULL, '2018-06-06 20:15:00', '', '', '', ''),
(10665, '0', '0', 'Daood', 'S/O', 'Khalid', '', 21, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Islami Colony Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 428, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 08:51:20', NULL, NULL, '2018-06-06 19:45:00', '', '', '', ''),
(10666, '0', '0', 'Amir', 'S/O', 'Bahadur', '', 48, 0, 0, '', 1, 'Male', '31205-9640036-5', 'Chack No 87/DB, Yazman', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 430, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 09:24:58', NULL, NULL, '2018-06-07 09:23:00', '', '', '', ''),
(10667, '0', '0', 'Manzoor', 'S/O', 'Dur Muhammad', '', 50, 0, 0, '', 10, 'Male', '31205-1652663-7', 'Chack No. 132/DNB, Yazman', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 431, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 09:27:52', NULL, NULL, '2018-06-07 09:25:00', '', '', '', ''),
(10670, '0', '0', 'Maryam Zia', 'D/O', 'Zia', '', 20, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Bahawalpur', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 689, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 11:20:42', NULL, NULL, '2018-06-07 11:19:00', '', '', '', ''),
(10672, '0', '0', 'Imran', 'S/O', 'Ramzan', '', 20, 0, 0, '', 8, 'Male', '31204-9396221-9', 'Israni, Khairpur Tame Wali', '', 'Labour', '2147483647', 'No', 'Emergency', 'Medical 4', 1, 412, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 12:05:45', NULL, NULL, '2018-06-07 12:03:00', '', '', '', ''),
(10673, '0', '0', 'Anees', 'S/O', 'M Arif', '', 50, 0, 0, '', 1, 'Male', '31102-0143102-5', 'Chack No. 50/BF, Chishtian', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 415, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-07 12:09:12', NULL, NULL, '2018-06-06 13:40:00', '', '', '', ''),
(10674, '0', '0', 'Rafique', 'S/O', 'Ghulam Rasool', '', 44, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Basti Malook, Multan', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 423, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 08:20:43', NULL, NULL, '2018-06-07 16:00:00', '', '', '', ''),
(10676, '0', '0', 'M Hassan', 'S/O', 'M Irfan', '', 6, 0, 0, '', 1, 'Male', '36202-2948333-7', 'Basti Mari, Kahror Pakka', '', 'N/A', '2147483647', 'No', 'Emergency', 'Emergency', 1, 432, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 08:24:56', NULL, NULL, '2018-06-08 00:40:00', '', '', '', ''),
(10679, '0', '0', 'Khalida', 'W/O', 'Ashiq', '', 45, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Chack No. 103/6R, Haroon Abad', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 713, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 08:33:50', NULL, NULL, '2018-06-07 21:00:00', '', '', '', ''),
(10680, '0', '0', 'Muhammad Khan', 'S/O', 'Ejaz Hussain', '', 26, 0, 0, '', 1, 'Male', '36602-7115452-9', 'Melsi, Vehari', '', 'Labour', '302762007', 'No', 'Emergency', 'Emergency', 1, 433, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 08:52:34', NULL, NULL, '2018-06-08 08:51:00', '', '', '', ''),
(10682, '0', '0', 'Sumaira Bibi', 'W/O', 'Haq Nawaz', '', 22, 0, 0, '', 20, 'Female', '31202-8678478-2', 'Canal Colony, Bahawalpur', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 714, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 08:57:37', NULL, NULL, '2018-06-08 08:55:00', '', '', '', ''),
(10687, '0', '0', 'Kosar', 'W/O', 'Ramesh', '', 50, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Islami Colony Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 651, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 09:27:18', NULL, NULL, '2018-05-02 10:26:00', '', '', '', ''),
(10688, '0', '0', 'Asma', 'D/O', 'Ghulam Murtaza', '', 7, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Galey Wal, Lodhran', '', 'Nil', '2147483647', 'No', 'Emergency', 'Emergency', 2, 715, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 09:31:03', NULL, NULL, '2018-05-02 19:29:00', '', '', '', ''),
(10690, '0', '0', 'Alina', 'D/O', 'Shafique', '', 10, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Sharif Abad, Hasil pur', '', 'Nil', '2147483647', 'No', 'Emergency', 'Emergency', 2, 717, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 09:35:54', NULL, NULL, '2018-05-03 08:30:00', '', '', '', ''),
(10691, '0', '0', 'Safia', 'W/O', 'M Yousaf', '', 65, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Chack No. 65/Murad, Hasilpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 718, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 09:42:31', NULL, NULL, '2018-05-03 11:00:00', '', '', '', ''),
(10692, '0', '0', 'Sughran Bibi', 'W/O', 'M Shafique', '', 40, 0, 0, '', 36, 'Female', '00000-0000000-0', 'Uch Sharif, Ahmad pur', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 719, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 09:46:33', NULL, NULL, '2018-05-03 12:42:00', '', '', '', ''),
(10693, '0', '0', 'Eman', 'D/O', 'Riaz', '', 3, 0, 0, '', 7, 'Female', '00000-0000000-0', 'Chani Goth, Ahmad Pur', '', 'Nil', '2147483647', 'No', 'Emergency', 'Emergency', 2, 720, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 09:48:40', NULL, NULL, '2018-05-03 16:30:00', '', '', '', ''),
(10697, '0', '0', 'Naeem', 'S/O', 'Ayaz', '', 34, 0, 0, '', 7, 'Male', '56302-3456022-3', 'Nasir Abad, Lora Lai, Balochistan', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 410, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-08 12:35:50', NULL, NULL, '2018-06-08 12:33:00', '', '', '', ''),
(10699, '0', '0', 'Danish', 'S/O', 'Munir Ahmad', '', 19, 0, 0, '', 1, 'Male', '36201-0431659-9', 'Chack No. 227/WB, Dunyapur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 425, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 08:12:29', NULL, NULL, '2018-06-08 21:00:00', '', '', '', ''),
(10701, '0', '0', 'Rashid', 'S/O', 'Rafique', '', 20, 0, 0, '', 1, 'Male', '31202-2513575-5', 'Mohalla Thalla Noor Jahanian, Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 435, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 08:17:45', NULL, NULL, '2018-06-08 22:45:00', '', '', '', ''),
(10703, '0', '0', 'Bakhto Mai', 'W/O', 'Ghulam Qadir', '', 70, 0, 0, '', 6, 'Female', '00000-0000000-0', 'Dera Bakha, Bahawalpur', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 688, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 08:23:11', NULL, NULL, '2018-06-08 16:45:00', '', '', '', ''),
(10704, '0', '0', 'Zahooran bb', 'W/O', 'm Anwar', '', 50, 0, 0, '', 1, 'Female', '24367-885343', 'chq 81 haronabad', '', 'House wife', '307461226', 'No', 'Emergency', 'COD', 2, 721, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 09:04:15', NULL, NULL, '2018-06-09 09:02:00', '', '', '', ''),
(10705, '0', '0', 'Allah Wasaya', 'S/O', 'Raheem Bukhsh', '', 68, 0, 0, '', 39, 'Male', '32304-6423836-5', 'Chack Mohsin Basti Arbi, Muzaffar Garh', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 383, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 09:24:22', NULL, NULL, '2018-06-09 09:21:00', '', '', '', ''),
(10712, '0', '0', 'Maimona Bibi', 'W/O', 'Abbas', '', 32, 0, 0, '', 6, 'Female', '31202-5030371-3', 'Moza Bodoh Wali', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 704, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 09:55:59', NULL, NULL, '2018-06-09 09:49:00', '', '', '', ''),
(10714, '0', '0', 'M Ali', 'S/O', 'Khalil Ahmad', '', 32, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Chack No.36/DNB, Yazman', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 406, 22, 'Diagnosed', 'person.jpg', 0, '2018-06-09 10:14:03', NULL, NULL, '2018-05-15 16:11:00', '', '', '', ''),
(10717, '0', '0', 'M Adil', 'S/O', 'M Ajmal', '', 25, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Dhare Saghi, Rahimyar Khan', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 419, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 10:24:49', NULL, NULL, '2018-05-12 05:30:00', '', '', '', ''),
(10723, '0', '0', 'Zareena', 'W/O', 'Akram', '', 40, 0, 0, '', 8, 'Female', '36603-1453643-7', 'Chack No. 77/WB, Vehari', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 701, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 10:52:15', NULL, NULL, '2018-05-09 11:40:00', '', '', '', ''),
(10725, '0', '0', 'Sajjad ', 'S/O', 'Ameer buksh', '', 30, 0, 0, '', 13, 'Male', '75475-8463899-2', 'dera msti bwp', '', 'Labour', '2147483647', 'No', 'Emergency', 'COD', 1, 438, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 11:12:47', NULL, NULL, '2018-06-09 11:11:00', '', '', '', ''),
(10726, '0', '0', 'Mazhar', 'S/O', 'Allah rakha', '', 30, 0, 0, '', 7, 'Male', '36202-9363181-7', 'bsti meran lodhran', '', 'labour', '2147483647', 'No', 'Emergency', 'COD', 1, 439, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 11:20:04', NULL, NULL, '2018-06-09 11:18:00', '', '', '', ''),
(10729, '0', '0', 'Neelam Bibi', 'D/O', 'Qadeer Ahmad', '', 20, 0, 0, '', 1, 'Female', '36603-6394692-3', 'Chack No. 220/WB, Vehari', '', 'Nil', '2147483647', 'No', 'OPD', 'OPD', 2, 710, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 11:37:23', NULL, NULL, '2018-05-12 11:15:00', '', '', '', ''),
(10737, '0', '0', 'Saleem', 'S/O', 'Ameer', '', 18, 0, 0, '', 1, 'Male', '31102-5189538-2', 'hussain colony tehsil chishtia dist bahawalnagr', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 434, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 12:08:05', NULL, NULL, '2018-05-14 10:10:00', '', '', '', ''),
(10739, '0', '0', 'Abdul Hakeem', 'S/O', 'M Hussain', '', 35, 0, 0, '', 1, 'Male', '31204-2062323-9', 'Khair Pur Tame Wali', '', 'Labour', '2147483647', 'No', 'OPD', 'OPD', 1, 437, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 12:12:38', NULL, NULL, '2018-05-22 11:30:00', '', '', '', ''),
(10742, '0', '0', 'Ameer', 'S/O', 'Qadir Bukhsh', '', 38, 0, 0, '', 1, 'Male', '36203-8563590-5', 'Moza Sagi Wala, Lodhran', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 440, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 12:18:55', NULL, NULL, '2018-05-13 13:10:00', '', '', '', ''),
(10743, '0', '0', 'Sughran Bibi', 'W/O', 'Nazir', '', 70, 0, 0, '', 18, 'Female', '31202-0342054-3', 'Noor Pur Noranga', '', 'House wife', '2147483647', 'No', 'Emergency', 'Medical 1', 2, 675, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 12:24:59', NULL, NULL, '2018-06-09 12:19:00', '', '', '', ''),
(10744, '0', '0', 'Ghulam Rasool', 'S/O', 'Bagh Ali', '', 80, 0, 0, '', 7, 'Male', '31105-5385598-9', 'Moza Tapda, MInchan Abad', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 441, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 12:28:06', NULL, NULL, '2018-05-04 14:10:00', '', '', '', ''),
(10747, '0', '0', 'Allah Yar', 'S/O', 'M Shafi', '', 45, 0, 0, '', 1, 'Male', '36304-7735584-9', 'Raja Ram, Shuja Abad', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 442, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 12:35:06', NULL, NULL, '2018-05-06 01:50:00', '', '', '', ''),
(10748, '0', '0', 'Shahid', 'S/O', 'M Nawaz', '', 17, 0, 0, '', 1, 'Male', '31203-8069195-7', 'Moza Sharaf, Khair pur Tame Wali', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 443, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 12:36:50', NULL, NULL, '2018-06-09 12:35:00', '', '', '', ''),
(10758, '0', '0', 'Siddiqa Bibi', 'W/O', 'M Iqbal', '', 53, 0, 0, '', 18, 'Female', '36603-7076716-1', 'Taimoor Shaheed Colony, Vehari', '', 'House wife', '2147483647', 'No', 'OPD', 'OPD', 2, 671, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-09 13:01:27', NULL, NULL, '2018-06-09 12:59:00', '', '', '', ''),
(10760, '0', '0', 'M arfan', 'S/O', 'Zafar iqbal', '', 6, 0, 0, '', 8, 'Male', '32301-0763698-7', 'moza nych ali pur', '', 'Student', '2147483647', 'No', 'Emergency', 'COD', 1, 446, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-10 09:26:43', NULL, NULL, '2018-06-10 09:24:00', '', '', '', ''),
(10761, '0', '0', 'm FARHAN ', 'S/O', 'Zafar iqbal', '', 6, 0, 0, '', 1, 'Male', '56890-0320754-4', 'MOZA NYCH ali pur', '', ' ', '333', 'No', 'OPD', 'COD', 1, 445, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-10 09:33:25', NULL, NULL, '2018-06-10 09:31:00', '', '', '', ''),
(10762, '0', '0', 'Fezan', 'S/O', 'Liaqat', '', 2, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Muslim Town, Fort Abbas', '', 'Nil', '2147483647', 'No', 'Emergency', 'Emergency', 1, 362, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 08:25:10', NULL, NULL, '2018-06-09 16:21:00', '', '', '', ''),
(10763, '0', '0', 'Mazhar', 'S/O', 'Ibraheem', '', 46, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Chack No. 194/EB, Vehari', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 444, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 08:26:53', NULL, NULL, '2018-06-09 19:55:00', '', '', '', ''),
(10765, '0', '0', 'Bilal', 'S/O', 'Lal Khan', '', 30, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Chack No. 104/DB, Yazman', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 448, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 08:31:08', NULL, NULL, '2018-06-09 23:30:00', '', '', '', ''),
(10766, '0', '0', 'Zahoor', 'S/O', 'Ghulam Qadir', '', 50, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 449, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 08:34:56', NULL, NULL, '2018-06-10 16:30:00', '', '', '', ''),
(10768, '0', '0', 'Aqsa', 'D/O', 'M Tariq', '', 9, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Goth Mehroo, Musafir Khana, Bahawalpur', '', 'Nil', '2147483647', 'No', 'Emergency', 'Emergency', 2, 674, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 08:47:00', NULL, NULL, '2018-06-10 14:40:00', '', '', '', ''),
(10774, '0', '0', 'Amna Bbi', 'W/O', 'Nazir Ahmad', '', 40, 0, 0, '', 18, 'Female', '00000-0000000-0', 'Moza Saran, Kahror Pakka', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 722, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 09:14:11', NULL, NULL, '2018-06-11 09:12:00', '', '', '', ''),
(10775, '0', '0', 'Azra Bibi', 'W/O', 'Javed', '', 20, 0, 0, '', 39, 'Female', '36203-7841582-7', 'Jewan Wala Chowk, Lodhran', '', 'House wife', '2147483647', 'No', 'Emergency', 'Emergency', 2, 723, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 09:16:23', NULL, NULL, '2018-06-11 09:14:00', '', '', '', ''),
(10796, '0', '0', 'Wazir', 'S/O', 'Allah Diwaya', '', 30, 0, 0, '', 1, 'Male', '31202-7142836-1', 'Shahdra, Bahawalpur', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 352, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 10:49:29', NULL, NULL, '2018-05-01 22:15:00', '', '', '', ''),
(10802, '0', '0', 'Mudassir Ali', 'S/O', 'M Razzaq', '', 22, 0, 0, '', 1, 'Male', '31205-6973323-5', 'Chack No. 43/DB, Yazman', '', 'Labour', '2147483647', 'No', 'Emergency', 'Emergency', 1, 368, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-11 11:11:47', NULL, NULL, '2018-05-10 02:00:00', '', '', '', ''),
(10803, '1', '1', 'zohaib', 'S/O', 'hamza', '', 23, 5, 0, 'A+VE', 2, 'Male', '00000-0000000-0', 'street 6', 'Bahawalpur', 'student', '0', 'No', 'OPD', 'ward', 3, 570, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-21 16:33:15', NULL, NULL, '2018-05-01 16:32:00', 'azhar', '00000-0000000-0', '03458465477', 'Father'),
(10804, '23', '34', 'zohaib', 'S/O', 'ali', '', 23, 5, 0, 'A+VE', 1, 'Male', '00000-0000000-0', 'street 6', 'Bahawalpur', 'student', '03423323443', 'No', 'OPD', 'ward', 3, 566, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-25 22:28:00', NULL, NULL, '2018-06-25 22:27:00', 'azhar', '00000-0000000-0', '03458465477', 'Father'),
(10805, '15', '115', 'rafiq', 'S/O', 'latif', '', 22, 2, 2, 'A-VE', 3, 'Male', '31202-9384949-4', 'XYZ STREET NO 321', '', 'student', '0345555666', 'No', '', 'home', 1, 392, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-26 10:33:54', NULL, NULL, '2018-06-26 10:31:00', 'latif', '31223-2454555-6', '03000445454', ''),
(10806, '1111', '1111', 'fawad', 'S/O', 'arif', '', 13, 2, 1, 'A+VE', 1, 'Male', '32122-1312 44-4', 'XYZ STREET NO 321', 'Bahawalpur', 'student', '03000454533', 'No', 'Private Clinic', 'hospital', 1, 370, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-26 10:48:50', NULL, NULL, '2018-05-14 23:30:00', 'arif', '33433-5456547-7', '03000454533', 'Father'),
(10807, '1111', '1111', 'ramzan', 'S/O', 'raheem', '', 44, 3, 5, 'A-VE', 1, 'Male', '32432-4243436-4', 'XYZ STREET NO 321 ', 'Chagai', 'BWP', '0345555666', 'No', 'Private Clinic', 'hospital', 1, 373, 22, 'Under Treatment', 'person.jpg', 0, '2018-06-26 10:59:32', NULL, NULL, '2018-01-01 11:00:00', 'ijaz', '65464-3543543-5', '03000445454', 'Uncle'),
(10808, '21', '12', 'aslam', 'S/O', 'mustafa', '', 70, 0, 0, '', 1, 'Male', '00000-0000000-0', 'street 6', 'Lodhran', 'nil', '03004525120', 'No', 'Emergency', 'ward', 1, 399, 22, 'Under Treatment', 'person.jpg', 1, '2018-06-26 13:48:21', NULL, NULL, '2018-06-20 13:45:00', 'abx', '00000-0000000-0', '03458465477', 'Nephew');

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
(1, 'Eid holidays', '2018-06-23 18:50:42', 'Dr. Muhammad Arshad Ch');

-- --------------------------------------------------------

--
-- Table structure for table `bedtbl`
--

CREATE TABLE `bedtbl` (
  `bedId` int(11) NOT NULL,
  `bedNo` int(11) NOT NULL,
  `wardId` int(11) NOT NULL,
  `bedStatus` enum('Available','Occupied','Blocked','Extra Bed','Occupied Extra Bed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bedtbl`
--

INSERT INTO `bedtbl` (`bedId`, `bedNo`, `wardId`, `bedStatus`) VALUES
(1, 1, 1, 'Occupied'),
(2, 2, 1, 'Available'),
(3, 3, 1, 'Available'),
(4, 4, 1, 'Occupied'),
(5, 5, 1, 'Occupied'),
(6, 6, 1, 'Available'),
(7, 7, 1, 'Occupied'),
(8, 8, 1, 'Occupied'),
(9, 9, 1, 'Occupied'),
(10, 10, 1, 'Occupied'),
(11, 11, 1, 'Occupied'),
(12, 12, 1, 'Occupied'),
(13, 13, 1, 'Occupied'),
(14, 14, 1, 'Occupied'),
(15, 15, 1, 'Available'),
(16, 16, 1, 'Occupied'),
(17, 17, 1, 'Occupied'),
(18, 18, 1, 'Occupied'),
(19, 19, 1, 'Occupied'),
(20, 20, 1, 'Occupied'),
(21, 1, 2, 'Occupied'),
(22, 2, 2, 'Occupied'),
(23, 3, 2, 'Occupied'),
(24, 4, 2, 'Occupied'),
(25, 5, 2, 'Occupied'),
(26, 6, 2, 'Occupied'),
(27, 7, 2, 'Occupied'),
(28, 8, 2, 'Available'),
(29, 9, 2, 'Occupied'),
(30, 10, 2, 'Occupied'),
(31, 11, 2, 'Occupied'),
(32, 12, 2, 'Occupied'),
(33, 13, 2, 'Occupied'),
(34, 14, 2, 'Occupied'),
(35, 15, 2, 'Occupied'),
(36, 16, 2, 'Occupied'),
(37, 17, 2, 'Occupied'),
(38, 18, 2, 'Occupied'),
(39, 19, 2, 'Occupied'),
(40, 20, 2, 'Occupied'),
(41, 1, 3, 'Occupied'),
(42, 2, 3, 'Occupied'),
(43, 3, 3, 'Occupied'),
(44, 4, 3, 'Occupied'),
(45, 5, 3, 'Occupied'),
(46, 6, 3, 'Occupied'),
(47, 7, 3, 'Occupied'),
(48, 8, 3, 'Occupied'),
(49, 9, 3, 'Occupied'),
(50, 10, 3, 'Occupied'),
(51, 11, 3, 'Occupied'),
(52, 12, 3, 'Occupied'),
(53, 13, 3, 'Occupied'),
(54, 14, 3, 'Occupied'),
(55, 15, 3, 'Occupied'),
(56, 16, 3, 'Occupied'),
(57, 17, 3, 'Occupied'),
(58, 18, 3, 'Occupied'),
(59, 19, 3, 'Occupied'),
(60, 20, 3, 'Available'),
(61, 1, 4, 'Available'),
(62, 2, 4, 'Available'),
(63, 3, 4, 'Available'),
(64, 4, 4, 'Available'),
(65, 5, 4, 'Occupied'),
(66, 6, 4, 'Available'),
(67, 7, 4, 'Occupied'),
(68, 8, 4, 'Occupied'),
(69, 9, 4, 'Available'),
(70, 10, 4, 'Available'),
(71, 1, 5, 'Occupied'),
(72, 2, 5, 'Occupied'),
(73, 3, 5, 'Available'),
(74, 4, 5, 'Available'),
(75, 5, 5, 'Available'),
(76, 6, 5, 'Available'),
(77, 7, 5, 'Available'),
(78, 8, 5, 'Available'),
(79, 1, 6, 'Occupied'),
(80, 2, 6, 'Occupied'),
(81, 3, 6, 'Occupied'),
(82, 4, 6, 'Occupied'),
(84, 5, 6, 'Occupied'),
(86, 6, 6, 'Available'),
(87, 7, 6, 'Occupied'),
(88, 8, 6, 'Occupied'),
(92, 22, 1, 'Occupied Extra Bed'),
(93, 21, 2, 'Occupied Extra Bed'),
(98, 22, 2, 'Occupied Extra Bed'),
(99, 23, 2, 'Occupied Extra Bed'),
(100, 24, 2, 'Occupied Extra Bed'),
(101, 25, 2, 'Occupied Extra Bed'),
(102, 26, 2, 'Occupied Extra Bed'),
(103, 27, 2, 'Occupied Extra Bed'),
(104, 28, 2, 'Occupied Extra Bed'),
(105, 29, 2, 'Occupied Extra Bed'),
(106, 30, 2, 'Occupied Extra Bed'),
(107, 31, 2, 'Occupied Extra Bed'),
(108, 32, 2, 'Occupied Extra Bed'),
(115, 33, 2, 'Occupied Extra Bed'),
(116, 34, 2, 'Occupied Extra Bed'),
(117, 35, 2, 'Occupied Extra Bed'),
(118, 36, 2, 'Occupied Extra Bed'),
(119, 37, 2, 'Occupied Extra Bed'),
(122, 23, 1, 'Occupied Extra Bed'),
(123, 24, 1, 'Occupied Extra Bed'),
(139, 25, 1, 'Occupied Extra Bed'),
(140, 26, 1, 'Occupied Extra Bed'),
(141, 27, 1, 'Occupied Extra Bed'),
(142, 28, 1, 'Occupied Extra Bed'),
(143, 29, 1, 'Occupied Extra Bed'),
(144, 30, 1, 'Occupied Extra Bed'),
(145, 31, 1, 'Occupied Extra Bed'),
(146, 32, 1, 'Occupied Extra Bed'),
(147, 33, 1, 'Occupied Extra Bed'),
(148, 34, 1, 'Occupied Extra Bed'),
(149, 35, 1, 'Occupied Extra Bed'),
(150, 36, 1, 'Occupied Extra Bed'),
(151, 37, 1, 'Occupied Extra Bed'),
(152, 38, 1, 'Occupied Extra Bed'),
(153, 39, 1, 'Occupied Extra Bed'),
(154, 40, 1, 'Occupied Extra Bed'),
(155, 38, 2, 'Occupied Extra Bed'),
(156, 39, 2, 'Occupied Extra Bed'),
(157, 40, 2, 'Occupied Extra Bed'),
(158, 41, 2, 'Occupied Extra Bed'),
(159, 42, 2, 'Occupied Extra Bed'),
(160, 43, 2, 'Occupied Extra Bed'),
(161, 44, 2, 'Occupied Extra Bed'),
(162, 45, 2, 'Occupied Extra Bed'),
(163, 46, 2, 'Occupied Extra Bed'),
(164, 47, 2, 'Occupied Extra Bed'),
(165, 48, 2, 'Occupied Extra Bed'),
(166, 49, 2, 'Occupied Extra Bed'),
(167, 50, 2, 'Occupied Extra Bed'),
(168, 51, 2, 'Occupied Extra Bed'),
(169, 52, 2, 'Occupied Extra Bed'),
(170, 53, 2, 'Occupied Extra Bed'),
(171, 54, 2, 'Occupied Extra Bed'),
(172, 55, 2, 'Occupied Extra Bed'),
(173, 56, 2, 'Occupied Extra Bed'),
(174, 57, 2, 'Occupied Extra Bed'),
(175, 58, 2, 'Occupied Extra Bed'),
(176, 59, 2, 'Occupied Extra Bed'),
(177, 60, 2, 'Occupied Extra Bed'),
(178, 61, 2, 'Occupied Extra Bed'),
(179, 62, 2, 'Occupied Extra Bed'),
(180, 63, 2, 'Occupied Extra Bed'),
(181, 64, 2, 'Occupied Extra Bed'),
(182, 65, 2, 'Occupied Extra Bed'),
(183, 66, 2, 'Occupied Extra Bed'),
(184, 67, 2, 'Occupied Extra Bed'),
(185, 68, 2, 'Occupied Extra Bed'),
(186, 69, 2, 'Occupied Extra Bed'),
(187, 70, 2, 'Occupied Extra Bed'),
(188, 71, 2, 'Occupied Extra Bed'),
(189, 72, 2, 'Occupied Extra Bed'),
(190, 73, 2, 'Occupied Extra Bed'),
(191, 74, 2, 'Occupied Extra Bed'),
(192, 75, 2, 'Occupied Extra Bed'),
(193, 76, 2, 'Occupied Extra Bed'),
(194, 77, 2, 'Occupied Extra Bed'),
(195, 78, 2, 'Occupied Extra Bed'),
(196, 79, 2, 'Occupied Extra Bed'),
(197, 80, 2, 'Occupied Extra Bed'),
(198, 81, 2, 'Occupied Extra Bed'),
(199, 82, 2, 'Occupied Extra Bed'),
(200, 83, 2, 'Occupied Extra Bed'),
(201, 84, 2, 'Occupied Extra Bed'),
(202, 85, 2, 'Occupied Extra Bed'),
(203, 86, 2, 'Occupied Extra Bed'),
(204, 87, 2, 'Occupied Extra Bed'),
(205, 88, 2, 'Occupied Extra Bed'),
(206, 89, 2, 'Occupied Extra Bed'),
(207, 90, 2, 'Occupied Extra Bed'),
(208, 91, 2, 'Occupied Extra Bed'),
(209, 92, 2, 'Occupied Extra Bed'),
(210, 93, 2, 'Occupied Extra Bed'),
(211, 94, 2, 'Occupied Extra Bed'),
(212, 95, 2, 'Occupied Extra Bed'),
(213, 96, 2, 'Occupied Extra Bed'),
(214, 97, 2, 'Occupied Extra Bed'),
(215, 98, 2, 'Occupied Extra Bed'),
(216, 99, 2, 'Occupied Extra Bed'),
(217, 100, 2, 'Occupied Extra Bed'),
(218, 101, 2, 'Occupied Extra Bed'),
(219, 102, 2, 'Occupied Extra Bed'),
(220, 103, 2, 'Occupied Extra Bed'),
(221, 104, 2, 'Occupied Extra Bed'),
(222, 105, 2, 'Occupied Extra Bed'),
(223, 106, 2, 'Occupied Extra Bed'),
(224, 107, 2, 'Occupied Extra Bed'),
(225, 108, 2, 'Occupied Extra Bed'),
(226, 109, 2, 'Occupied Extra Bed'),
(227, 110, 2, 'Occupied Extra Bed'),
(228, 111, 2, 'Occupied Extra Bed'),
(229, 112, 2, 'Occupied Extra Bed'),
(230, 113, 2, 'Occupied Extra Bed'),
(231, 114, 2, 'Occupied Extra Bed'),
(232, 115, 2, 'Occupied Extra Bed'),
(233, 116, 2, 'Occupied Extra Bed'),
(234, 117, 2, 'Occupied Extra Bed'),
(235, 118, 2, 'Occupied Extra Bed'),
(236, 119, 2, 'Occupied Extra Bed'),
(237, 120, 2, 'Occupied Extra Bed'),
(238, 121, 2, 'Occupied Extra Bed'),
(239, 122, 2, 'Occupied Extra Bed'),
(240, 123, 2, 'Occupied Extra Bed'),
(241, 124, 2, 'Occupied Extra Bed'),
(242, 125, 2, 'Occupied Extra Bed'),
(243, 126, 2, 'Occupied Extra Bed'),
(244, 127, 2, 'Occupied Extra Bed'),
(245, 128, 2, 'Occupied Extra Bed'),
(246, 129, 2, 'Occupied Extra Bed'),
(247, 130, 2, 'Occupied Extra Bed'),
(248, 131, 2, 'Occupied Extra Bed'),
(249, 132, 2, 'Occupied Extra Bed'),
(250, 133, 2, 'Occupied Extra Bed'),
(251, 134, 2, 'Occupied Extra Bed'),
(252, 135, 2, 'Occupied Extra Bed'),
(253, 136, 2, 'Occupied Extra Bed'),
(254, 137, 2, 'Occupied Extra Bed'),
(255, 138, 2, 'Occupied Extra Bed'),
(256, 139, 2, 'Occupied Extra Bed'),
(257, 140, 2, 'Occupied Extra Bed'),
(258, 141, 2, 'Occupied Extra Bed'),
(259, 142, 2, 'Occupied Extra Bed'),
(260, 143, 2, 'Occupied Extra Bed'),
(261, 144, 2, 'Occupied Extra Bed'),
(262, 145, 2, 'Occupied Extra Bed'),
(263, 41, 1, 'Occupied Extra Bed'),
(264, 42, 1, 'Occupied Extra Bed'),
(265, 43, 1, 'Occupied Extra Bed'),
(266, 44, 1, 'Occupied Extra Bed'),
(267, 45, 1, 'Occupied Extra Bed'),
(268, 46, 1, 'Occupied Extra Bed'),
(269, 47, 1, 'Occupied Extra Bed'),
(270, 48, 1, 'Occupied Extra Bed'),
(271, 49, 1, 'Occupied Extra Bed'),
(272, 50, 1, 'Occupied Extra Bed'),
(273, 51, 1, 'Occupied Extra Bed'),
(274, 52, 1, 'Occupied Extra Bed'),
(275, 53, 1, 'Occupied Extra Bed'),
(276, 54, 1, 'Occupied Extra Bed'),
(277, 55, 1, 'Occupied Extra Bed'),
(278, 56, 1, 'Occupied Extra Bed'),
(279, 57, 1, 'Occupied Extra Bed'),
(280, 58, 1, 'Occupied Extra Bed'),
(281, 59, 1, 'Occupied Extra Bed'),
(282, 60, 1, 'Occupied Extra Bed'),
(283, 61, 1, 'Occupied Extra Bed'),
(284, 62, 1, 'Occupied Extra Bed'),
(285, 63, 1, 'Occupied Extra Bed'),
(286, 64, 1, 'Occupied Extra Bed'),
(287, 65, 1, 'Occupied Extra Bed'),
(288, 66, 1, 'Occupied Extra Bed'),
(289, 67, 1, 'Occupied Extra Bed'),
(290, 68, 1, 'Occupied Extra Bed'),
(291, 69, 1, 'Occupied Extra Bed'),
(292, 70, 1, 'Occupied Extra Bed'),
(293, 70, 1, 'Occupied Extra Bed'),
(294, 71, 1, 'Occupied Extra Bed'),
(295, 72, 1, 'Occupied Extra Bed'),
(296, 73, 1, 'Occupied Extra Bed'),
(297, 74, 1, 'Occupied Extra Bed'),
(298, 75, 1, 'Occupied Extra Bed'),
(299, 76, 1, 'Occupied Extra Bed'),
(300, 77, 1, 'Occupied Extra Bed'),
(301, 78, 1, 'Occupied Extra Bed'),
(302, 79, 1, 'Occupied Extra Bed'),
(303, 80, 1, 'Occupied Extra Bed'),
(304, 81, 1, 'Occupied Extra Bed'),
(305, 82, 1, 'Occupied Extra Bed'),
(306, 84, 1, 'Occupied Extra Bed'),
(307, 83, 1, 'Occupied Extra Bed'),
(308, 85, 1, 'Occupied Extra Bed'),
(309, 86, 1, 'Occupied Extra Bed'),
(310, 87, 1, 'Occupied Extra Bed'),
(311, 88, 1, 'Occupied Extra Bed'),
(312, 89, 1, 'Occupied Extra Bed'),
(313, 90, 1, 'Occupied Extra Bed'),
(314, 90, 1, 'Occupied Extra Bed'),
(315, 91, 1, 'Occupied Extra Bed'),
(316, 92, 1, 'Occupied Extra Bed'),
(317, 93, 1, 'Occupied Extra Bed'),
(318, 94, 1, 'Occupied Extra Bed'),
(319, 95, 1, 'Occupied Extra Bed'),
(320, 96, 1, 'Occupied Extra Bed'),
(321, 97, 1, 'Occupied Extra Bed'),
(322, 98, 1, 'Occupied Extra Bed'),
(323, 99, 1, 'Occupied Extra Bed'),
(324, 100, 1, 'Occupied Extra Bed'),
(325, 101, 1, 'Occupied Extra Bed'),
(326, 102, 1, 'Occupied Extra Bed'),
(327, 103, 1, 'Occupied Extra Bed'),
(328, 104, 1, 'Occupied Extra Bed'),
(329, 105, 1, 'Occupied Extra Bed'),
(330, 106, 1, 'Occupied Extra Bed'),
(331, 107, 1, 'Occupied Extra Bed'),
(332, 108, 1, 'Occupied Extra Bed'),
(333, 109, 1, 'Occupied Extra Bed'),
(334, 110, 1, 'Occupied Extra Bed'),
(335, 111, 1, 'Occupied Extra Bed'),
(336, 112, 1, 'Occupied Extra Bed'),
(337, 113, 1, 'Occupied Extra Bed'),
(338, 114, 1, 'Occupied Extra Bed'),
(339, 115, 1, 'Occupied Extra Bed'),
(340, 116, 1, 'Occupied Extra Bed'),
(341, 117, 1, 'Occupied Extra Bed'),
(342, 118, 1, 'Occupied Extra Bed'),
(343, 119, 1, 'Occupied Extra Bed'),
(344, 120, 1, 'Occupied Extra Bed'),
(345, 121, 1, 'Occupied Extra Bed'),
(346, 122, 1, 'Occupied Extra Bed'),
(347, 123, 1, 'Occupied Extra Bed'),
(348, 124, 1, 'Occupied Extra Bed'),
(349, 125, 1, 'Occupied Extra Bed'),
(350, 126, 1, 'Occupied Extra Bed'),
(351, 127, 1, 'Occupied Extra Bed'),
(352, 128, 1, 'Occupied Extra Bed'),
(353, 129, 1, 'Occupied Extra Bed'),
(354, 130, 1, 'Occupied Extra Bed'),
(355, 131, 1, 'Occupied Extra Bed'),
(356, 132, 1, 'Occupied Extra Bed'),
(357, 133, 1, 'Occupied Extra Bed'),
(358, 134, 1, 'Occupied Extra Bed'),
(359, 135, 1, 'Occupied Extra Bed'),
(360, 136, 1, 'Occupied Extra Bed'),
(361, 137, 1, 'Occupied Extra Bed'),
(362, 138, 1, 'Occupied Extra Bed'),
(363, 139, 1, 'Occupied Extra Bed'),
(364, 140, 1, 'Occupied Extra Bed'),
(365, 141, 1, 'Occupied Extra Bed'),
(366, 142, 1, 'Occupied Extra Bed'),
(367, 143, 1, 'Occupied Extra Bed'),
(368, 144, 1, 'Occupied Extra Bed'),
(369, 145, 1, 'Occupied Extra Bed'),
(370, 146, 1, 'Occupied Extra Bed'),
(371, 147, 1, 'Occupied Extra Bed'),
(372, 148, 1, 'Occupied Extra Bed'),
(373, 149, 1, 'Occupied Extra Bed'),
(374, 150, 1, 'Occupied Extra Bed'),
(375, 151, 1, 'Occupied Extra Bed'),
(376, 152, 1, 'Occupied Extra Bed'),
(377, 153, 1, 'Occupied Extra Bed'),
(378, 154, 1, 'Occupied Extra Bed'),
(379, 155, 1, 'Occupied Extra Bed'),
(380, 156, 1, 'Occupied Extra Bed'),
(381, 157, 1, 'Occupied Extra Bed'),
(382, 158, 1, 'Occupied Extra Bed'),
(383, 159, 1, 'Occupied Extra Bed'),
(384, 160, 1, 'Occupied Extra Bed'),
(385, 161, 1, 'Occupied Extra Bed'),
(386, 162, 1, 'Occupied Extra Bed'),
(387, 163, 1, 'Occupied Extra Bed'),
(388, 164, 1, 'Occupied Extra Bed'),
(389, 165, 1, 'Occupied Extra Bed'),
(390, 166, 1, 'Occupied Extra Bed'),
(391, 167, 1, 'Occupied Extra Bed'),
(392, 168, 1, 'Occupied Extra Bed'),
(393, 169, 1, 'Occupied Extra Bed'),
(394, 170, 1, 'Occupied Extra Bed'),
(395, 171, 1, 'Occupied Extra Bed'),
(396, 172, 1, 'Extra Bed'),
(397, 173, 1, 'Occupied Extra Bed'),
(398, 174, 1, 'Occupied Extra Bed'),
(399, 175, 1, 'Occupied Extra Bed'),
(400, 176, 1, 'Occupied Extra Bed'),
(401, 177, 1, 'Extra Bed'),
(402, 178, 1, 'Occupied Extra Bed'),
(403, 179, 1, 'Occupied Extra Bed'),
(404, 180, 1, 'Occupied Extra Bed'),
(405, 181, 1, 'Occupied Extra Bed'),
(406, 182, 1, 'Occupied Extra Bed'),
(407, 183, 1, 'Occupied Extra Bed'),
(408, 184, 1, 'Occupied Extra Bed'),
(409, 185, 1, 'Occupied Extra Bed'),
(410, 186, 1, 'Occupied Extra Bed'),
(411, 187, 1, 'Occupied Extra Bed'),
(412, 188, 1, 'Occupied Extra Bed'),
(413, 189, 1, 'Occupied Extra Bed'),
(414, 190, 1, 'Occupied Extra Bed'),
(415, 191, 1, 'Occupied Extra Bed'),
(416, 192, 1, 'Occupied Extra Bed'),
(417, 193, 1, 'Occupied Extra Bed'),
(418, 194, 1, 'Extra Bed'),
(419, 195, 1, 'Occupied Extra Bed'),
(420, 196, 1, 'Occupied Extra Bed'),
(421, 197, 1, 'Occupied Extra Bed'),
(422, 198, 1, 'Occupied Extra Bed'),
(423, 199, 1, 'Occupied Extra Bed'),
(424, 200, 1, 'Occupied Extra Bed'),
(425, 201, 1, 'Occupied Extra Bed'),
(426, 202, 1, 'Extra Bed'),
(427, 203, 1, 'Occupied Extra Bed'),
(428, 204, 1, 'Occupied Extra Bed'),
(429, 205, 1, 'Occupied Extra Bed'),
(430, 206, 1, 'Occupied Extra Bed'),
(431, 207, 1, 'Occupied Extra Bed'),
(432, 208, 1, 'Occupied Extra Bed'),
(433, 209, 1, 'Occupied Extra Bed'),
(434, 210, 1, 'Occupied Extra Bed'),
(435, 211, 1, 'Occupied Extra Bed'),
(436, 212, 1, 'Available'),
(437, 213, 1, 'Occupied Extra Bed'),
(438, 214, 1, 'Occupied Extra Bed'),
(439, 215, 1, 'Occupied Extra Bed'),
(440, 216, 1, 'Occupied Extra Bed'),
(441, 217, 1, 'Occupied Extra Bed'),
(442, 218, 1, 'Occupied Extra Bed'),
(443, 219, 1, 'Occupied Extra Bed'),
(444, 220, 1, 'Occupied Extra Bed'),
(445, 221, 1, 'Occupied Extra Bed'),
(446, 222, 1, 'Occupied Extra Bed'),
(447, 223, 1, 'Extra Bed'),
(448, 224, 1, 'Occupied Extra Bed'),
(449, 224, 1, 'Occupied Extra Bed'),
(450, 225, 1, 'Extra Bed'),
(451, 226, 1, 'Extra Bed'),
(452, 227, 1, 'Extra Bed'),
(453, 228, 1, 'Extra Bed'),
(454, 229, 1, 'Extra Bed'),
(455, 230, 1, 'Extra Bed'),
(456, 231, 1, 'Extra Bed'),
(457, 232, 1, 'Extra Bed'),
(458, 233, 1, 'Extra Bed'),
(459, 234, 1, 'Extra Bed'),
(460, 235, 1, 'Extra Bed'),
(461, 236, 1, 'Extra Bed'),
(462, 237, 1, 'Extra Bed'),
(463, 238, 1, 'Extra Bed'),
(464, 239, 1, 'Extra Bed'),
(465, 240, 1, 'Extra Bed'),
(466, 241, 1, 'Extra Bed'),
(467, 242, 1, 'Extra Bed'),
(468, 243, 1, 'Extra Bed'),
(469, 244, 1, 'Extra Bed'),
(470, 245, 1, 'Extra Bed'),
(471, 246, 1, 'Extra Bed'),
(472, 247, 1, 'Extra Bed'),
(473, 248, 1, 'Extra Bed'),
(474, 249, 1, 'Extra Bed'),
(475, 250, 1, 'Extra Bed'),
(476, 251, 1, 'Extra Bed'),
(477, 252, 1, 'Extra Bed'),
(478, 253, 1, 'Extra Bed'),
(479, 254, 1, 'Extra Bed'),
(480, 255, 1, 'Extra Bed'),
(481, 256, 1, 'Extra Bed'),
(482, 257, 1, 'Extra Bed'),
(483, 258, 1, 'Extra Bed'),
(484, 259, 1, 'Extra Bed'),
(485, 260, 1, 'Extra Bed'),
(486, 261, 1, 'Extra Bed'),
(487, 262, 1, 'Extra Bed'),
(488, 263, 1, 'Extra Bed'),
(489, 264, 1, 'Extra Bed'),
(490, 265, 1, 'Extra Bed'),
(491, 266, 1, 'Extra Bed'),
(492, 267, 1, 'Extra Bed'),
(493, 268, 1, 'Extra Bed'),
(494, 269, 1, 'Extra Bed'),
(495, 270, 1, 'Extra Bed'),
(496, 271, 1, 'Extra Bed'),
(497, 272, 1, 'Extra Bed'),
(498, 273, 1, 'Extra Bed'),
(499, 274, 1, 'Extra Bed'),
(500, 274, 1, 'Extra Bed'),
(501, 275, 1, 'Extra Bed'),
(502, 276, 1, 'Extra Bed'),
(503, 277, 1, 'Extra Bed'),
(504, 278, 1, 'Extra Bed'),
(505, 279, 1, 'Extra Bed'),
(506, 280, 1, 'Extra Bed'),
(507, 281, 1, 'Extra Bed'),
(508, 282, 1, 'Extra Bed'),
(509, 283, 1, 'Extra Bed'),
(510, 284, 1, 'Extra Bed'),
(511, 285, 1, 'Extra Bed'),
(512, 286, 1, 'Extra Bed'),
(513, 287, 1, 'Extra Bed'),
(514, 288, 1, 'Extra Bed'),
(515, 289, 1, 'Extra Bed'),
(516, 290, 1, 'Extra Bed'),
(517, 291, 1, 'Extra Bed'),
(518, 292, 1, 'Extra Bed'),
(519, 293, 1, 'Extra Bed'),
(520, 294, 1, 'Extra Bed'),
(521, 295, 1, 'Extra Bed'),
(522, 296, 1, 'Extra Bed'),
(523, 297, 1, 'Extra Bed'),
(524, 298, 1, 'Extra Bed'),
(525, 299, 1, 'Extra Bed'),
(526, 300, 1, 'Extra Bed'),
(527, 301, 1, 'Extra Bed'),
(528, 302, 1, 'Extra Bed'),
(529, 303, 1, 'Extra Bed'),
(530, 304, 1, 'Extra Bed'),
(531, 305, 1, 'Extra Bed'),
(532, 306, 1, 'Extra Bed'),
(533, 21, 3, 'Occupied Extra Bed'),
(534, 22, 3, 'Occupied Extra Bed'),
(535, 23, 3, 'Occupied Extra Bed'),
(536, 24, 3, 'Occupied Extra Bed'),
(537, 25, 3, 'Occupied Extra Bed'),
(538, 26, 3, 'Occupied Extra Bed'),
(539, 27, 3, 'Occupied Extra Bed'),
(540, 28, 3, 'Occupied Extra Bed'),
(541, 29, 3, 'Occupied Extra Bed'),
(542, 30, 3, 'Occupied Extra Bed'),
(543, 31, 3, 'Occupied Extra Bed'),
(544, 32, 3, 'Occupied Extra Bed'),
(545, 33, 3, 'Occupied Extra Bed'),
(546, 34, 3, 'Occupied Extra Bed'),
(547, 35, 3, 'Occupied Extra Bed'),
(548, 36, 3, 'Occupied Extra Bed'),
(549, 37, 3, 'Occupied Extra Bed'),
(550, 38, 3, 'Occupied Extra Bed'),
(551, 39, 3, 'Occupied Extra Bed'),
(552, 40, 3, 'Occupied Extra Bed'),
(553, 41, 3, 'Occupied Extra Bed'),
(554, 42, 3, 'Occupied Extra Bed'),
(555, 43, 3, 'Occupied Extra Bed'),
(556, 44, 3, 'Occupied Extra Bed'),
(557, 45, 3, 'Occupied Extra Bed'),
(558, 46, 3, 'Occupied Extra Bed'),
(559, 47, 3, 'Occupied Extra Bed'),
(560, 48, 3, 'Occupied Extra Bed'),
(561, 49, 3, 'Extra Bed'),
(562, 50, 3, 'Occupied Extra Bed'),
(563, 51, 3, 'Occupied Extra Bed'),
(564, 52, 3, 'Occupied Extra Bed'),
(565, 53, 3, 'Occupied Extra Bed'),
(566, 54, 3, 'Occupied Extra Bed'),
(567, 55, 3, 'Occupied Extra Bed'),
(568, 56, 3, 'Occupied Extra Bed'),
(569, 57, 3, 'Extra Bed'),
(570, 58, 3, 'Occupied Extra Bed'),
(571, 59, 3, 'Occupied Extra Bed'),
(572, 60, 3, 'Occupied Extra Bed'),
(573, 61, 3, 'Occupied Extra Bed'),
(574, 62, 3, 'Occupied Extra Bed'),
(575, 63, 3, 'Occupied Extra Bed'),
(576, 64, 3, 'Extra Bed'),
(577, 65, 3, 'Occupied Extra Bed'),
(578, 66, 3, 'Extra Bed'),
(579, 67, 3, 'Extra Bed'),
(580, 68, 3, 'Occupied Extra Bed'),
(581, 69, 3, 'Occupied Extra Bed'),
(582, 70, 3, 'Extra Bed'),
(583, 71, 3, 'Occupied Extra Bed'),
(584, 72, 3, 'Occupied Extra Bed'),
(585, 73, 3, 'Extra Bed'),
(586, 74, 3, 'Occupied Extra Bed'),
(587, 75, 3, 'Occupied Extra Bed'),
(588, 76, 3, 'Occupied Extra Bed'),
(589, 77, 3, 'Extra Bed'),
(590, 78, 3, 'Extra Bed'),
(591, 79, 3, 'Occupied Extra Bed'),
(592, 80, 3, 'Extra Bed'),
(593, 81, 3, 'Extra Bed'),
(594, 82, 3, 'Extra Bed'),
(595, 83, 3, 'Extra Bed'),
(596, 84, 3, 'Extra Bed'),
(597, 85, 3, 'Extra Bed'),
(598, 86, 3, 'Extra Bed'),
(599, 87, 3, 'Extra Bed'),
(600, 88, 3, 'Extra Bed'),
(601, 89, 3, 'Extra Bed'),
(602, 90, 3, 'Extra Bed'),
(603, 91, 3, 'Extra Bed'),
(604, 92, 3, 'Extra Bed'),
(605, 146, 2, 'Occupied Extra Bed'),
(606, 147, 2, 'Occupied Extra Bed'),
(607, 148, 2, 'Occupied Extra Bed'),
(608, 149, 2, 'Occupied Extra Bed'),
(609, 150, 2, 'Occupied Extra Bed'),
(610, 151, 2, 'Occupied Extra Bed'),
(611, 152, 2, 'Occupied Extra Bed'),
(612, 153, 2, 'Occupied Extra Bed'),
(613, 154, 2, 'Occupied Extra Bed'),
(614, 155, 2, 'Occupied Extra Bed'),
(615, 156, 2, 'Occupied Extra Bed'),
(616, 157, 2, 'Occupied Extra Bed'),
(617, 158, 2, 'Occupied Extra Bed'),
(618, 159, 2, 'Extra Bed'),
(619, 160, 2, 'Occupied Extra Bed'),
(620, 161, 2, 'Occupied Extra Bed'),
(621, 162, 2, 'Occupied Extra Bed'),
(622, 163, 2, 'Occupied Extra Bed'),
(623, 164, 2, 'Occupied Extra Bed'),
(624, 165, 2, 'Occupied Extra Bed'),
(625, 166, 2, 'Occupied Extra Bed'),
(626, 167, 2, 'Occupied Extra Bed'),
(627, 168, 2, 'Occupied Extra Bed'),
(628, 169, 2, 'Occupied Extra Bed'),
(629, 170, 2, 'Occupied Extra Bed'),
(630, 171, 2, 'Occupied Extra Bed'),
(631, 172, 2, 'Occupied Extra Bed'),
(632, 173, 2, 'Occupied Extra Bed'),
(633, 174, 2, 'Occupied Extra Bed'),
(634, 175, 2, 'Occupied Extra Bed'),
(635, 176, 2, 'Occupied Extra Bed'),
(636, 177, 2, 'Occupied Extra Bed'),
(637, 178, 2, 'Occupied Extra Bed'),
(638, 179, 2, 'Occupied Extra Bed'),
(639, 180, 2, 'Occupied Extra Bed'),
(640, 181, 2, 'Occupied Extra Bed'),
(641, 182, 2, 'Occupied Extra Bed'),
(642, 183, 2, 'Occupied Extra Bed'),
(643, 184, 2, 'Occupied Extra Bed'),
(644, 185, 2, 'Occupied Extra Bed'),
(645, 186, 2, 'Occupied Extra Bed'),
(646, 187, 2, 'Occupied Extra Bed'),
(647, 188, 2, 'Occupied Extra Bed'),
(648, 189, 2, 'Occupied Extra Bed'),
(649, 190, 2, 'Occupied Extra Bed'),
(650, 191, 2, 'Occupied Extra Bed'),
(651, 192, 2, 'Occupied Extra Bed'),
(652, 193, 2, 'Occupied Extra Bed'),
(653, 194, 2, 'Occupied Extra Bed'),
(654, 195, 2, 'Occupied Extra Bed'),
(655, 196, 2, 'Occupied Extra Bed'),
(656, 197, 2, 'Occupied Extra Bed'),
(657, 198, 2, 'Occupied Extra Bed'),
(658, 199, 2, 'Occupied Extra Bed'),
(659, 200, 2, 'Occupied Extra Bed'),
(660, 201, 2, 'Occupied Extra Bed'),
(661, 202, 2, 'Occupied Extra Bed'),
(662, 203, 2, 'Occupied Extra Bed'),
(663, 204, 2, 'Occupied Extra Bed'),
(664, 205, 2, 'Occupied Extra Bed'),
(665, 206, 2, 'Occupied Extra Bed'),
(666, 207, 2, 'Occupied Extra Bed'),
(667, 208, 2, 'Occupied Extra Bed'),
(668, 209, 2, 'Occupied Extra Bed'),
(669, 210, 2, 'Occupied Extra Bed'),
(670, 211, 2, 'Occupied Extra Bed'),
(671, 212, 2, 'Occupied Extra Bed'),
(672, 213, 2, 'Occupied Extra Bed'),
(673, 214, 2, 'Occupied Extra Bed'),
(674, 215, 2, 'Occupied Extra Bed'),
(675, 216, 2, 'Occupied Extra Bed'),
(676, 217, 2, 'Occupied Extra Bed'),
(677, 218, 2, 'Occupied Extra Bed'),
(678, 219, 2, 'Occupied Extra Bed'),
(679, 220, 2, 'Occupied Extra Bed'),
(680, 221, 2, 'Occupied Extra Bed'),
(681, 222, 2, 'Occupied Extra Bed'),
(682, 222, 2, 'Occupied Extra Bed'),
(683, 223, 2, 'Occupied Extra Bed'),
(684, 224, 2, 'Occupied Extra Bed'),
(685, 225, 2, 'Occupied Extra Bed'),
(686, 226, 2, 'Occupied Extra Bed'),
(687, 227, 2, 'Occupied Extra Bed'),
(688, 228, 2, 'Occupied Extra Bed'),
(689, 229, 2, 'Occupied Extra Bed'),
(690, 230, 2, 'Extra Bed'),
(691, 231, 2, 'Occupied Extra Bed'),
(692, 232, 2, 'Extra Bed'),
(693, 233, 2, 'Occupied Extra Bed'),
(694, 234, 2, 'Occupied Extra Bed'),
(695, 235, 2, 'Occupied Extra Bed'),
(696, 236, 2, 'Occupied Extra Bed'),
(697, 237, 2, 'Occupied Extra Bed'),
(698, 238, 2, 'Occupied Extra Bed'),
(699, 239, 2, 'Occupied Extra Bed'),
(700, 239, 2, 'Occupied Extra Bed'),
(701, 240, 2, 'Occupied Extra Bed'),
(702, 241, 2, 'Occupied Extra Bed'),
(703, 242, 2, 'Occupied Extra Bed'),
(704, 243, 2, 'Occupied Extra Bed'),
(705, 244, 2, 'Occupied Extra Bed'),
(706, 245, 2, 'Occupied Extra Bed'),
(707, 246, 2, 'Occupied Extra Bed'),
(708, 247, 2, 'Extra Bed'),
(709, 248, 2, 'Occupied Extra Bed'),
(710, 249, 2, 'Occupied Extra Bed'),
(711, 250, 2, 'Occupied Extra Bed'),
(712, 251, 2, 'Occupied Extra Bed'),
(713, 252, 2, 'Occupied Extra Bed'),
(714, 253, 2, 'Occupied Extra Bed'),
(715, 254, 2, 'Occupied Extra Bed'),
(716, 255, 2, 'Extra Bed'),
(717, 256, 2, 'Occupied Extra Bed'),
(718, 257, 2, 'Occupied Extra Bed'),
(719, 258, 2, 'Occupied Extra Bed'),
(720, 259, 2, 'Occupied Extra Bed'),
(721, 260, 2, 'Occupied Extra Bed'),
(722, 261, 2, 'Occupied Extra Bed'),
(723, 262, 2, 'Occupied Extra Bed'),
(724, 263, 2, 'Extra Bed'),
(725, 264, 2, 'Extra Bed'),
(726, 265, 2, 'Extra Bed'),
(727, 266, 2, 'Extra Bed'),
(728, 267, 2, 'Extra Bed'),
(729, 268, 2, 'Extra Bed'),
(730, 269, 2, 'Extra Bed'),
(731, 270, 2, 'Extra Bed'),
(732, 271, 2, 'Extra Bed'),
(733, 272, 2, 'Extra Bed'),
(734, 272, 2, 'Extra Bed'),
(735, 273, 2, 'Extra Bed'),
(736, 274, 2, 'Extra Bed'),
(737, 275, 2, 'Extra Bed'),
(738, 276, 2, 'Extra Bed'),
(739, 277, 2, 'Extra Bed'),
(740, 278, 2, 'Extra Bed'),
(741, 279, 2, 'Extra Bed'),
(742, 280, 2, 'Extra Bed'),
(743, 281, 2, 'Extra Bed'),
(744, 282, 2, 'Extra Bed'),
(745, 283, 2, 'Extra Bed'),
(746, 284, 2, 'Extra Bed'),
(747, 285, 2, 'Extra Bed'),
(748, 286, 2, 'Occupied Extra Bed'),
(749, 307, 1, 'Extra Bed'),
(750, 308, 1, 'Extra Bed'),
(751, 309, 1, 'Extra Bed'),
(752, 310, 1, 'Extra Bed'),
(753, 311, 1, 'Extra Bed'),
(754, 312, 1, 'Extra Bed'),
(755, 313, 1, 'Extra Bed'),
(756, 314, 1, 'Extra Bed'),
(757, 315, 1, 'Extra Bed'),
(758, 316, 1, 'Extra Bed'),
(759, 317, 1, 'Extra Bed'),
(760, 318, 1, 'Extra Bed'),
(761, 318, 1, 'Extra Bed'),
(762, 319, 1, 'Extra Bed'),
(763, 320, 1, 'Extra Bed'),
(764, 321, 1, 'Extra Bed'),
(765, 322, 1, 'Extra Bed'),
(766, 323, 1, 'Extra Bed'),
(767, 324, 1, 'Extra Bed'),
(768, 325, 1, 'Extra Bed'),
(769, 326, 1, 'Extra Bed'),
(770, 327, 1, 'Extra Bed'),
(771, 328, 1, 'Extra Bed'),
(772, 329, 1, 'Extra Bed'),
(773, 330, 1, 'Extra Bed'),
(774, 331, 1, 'Extra Bed'),
(775, 332, 1, 'Extra Bed'),
(776, 333, 1, 'Extra Bed'),
(777, 334, 1, 'Extra Bed'),
(778, 335, 1, 'Extra Bed'),
(779, 336, 1, 'Extra Bed'),
(780, 337, 1, 'Extra Bed'),
(781, 338, 1, 'Extra Bed'),
(782, 339, 1, 'Extra Bed'),
(783, 340, 1, 'Extra Bed'),
(784, 341, 1, 'Extra Bed'),
(785, 342, 1, 'Extra Bed'),
(786, 343, 1, 'Extra Bed'),
(787, 344, 1, 'Extra Bed'),
(788, 345, 1, 'Extra Bed'),
(789, 346, 1, 'Extra Bed'),
(790, 347, 1, 'Extra Bed'),
(791, 287, 2, 'Extra Bed'),
(792, 288, 2, 'Extra Bed'),
(793, 289, 2, 'Extra Bed'),
(794, 290, 2, 'Extra Bed'),
(795, 291, 2, 'Extra Bed'),
(796, 292, 2, 'Extra Bed'),
(797, 293, 2, 'Extra Bed'),
(798, 294, 2, 'Extra Bed'),
(799, 295, 2, 'Extra Bed'),
(800, 296, 2, 'Extra Bed'),
(801, 297, 2, 'Extra Bed'),
(802, 298, 2, 'Extra Bed'),
(803, 299, 2, 'Extra Bed'),
(804, 300, 2, 'Extra Bed'),
(805, 301, 2, 'Extra Bed'),
(806, 302, 2, 'Extra Bed'),
(807, 303, 2, 'Extra Bed'),
(808, 304, 2, 'Extra Bed'),
(809, 305, 2, 'Extra Bed'),
(810, 306, 2, 'Extra Bed'),
(811, 307, 2, 'Extra Bed'),
(812, 308, 2, 'Extra Bed'),
(813, 309, 2, 'Extra Bed'),
(814, 310, 2, 'Extra Bed'),
(815, 311, 2, 'Extra Bed'),
(816, 9, 6, 'Occupied Extra Bed'),
(817, 10, 6, 'Occupied Extra Bed'),
(818, 11, 6, 'Occupied Extra Bed'),
(819, 12, 6, 'Occupied Extra Bed'),
(820, 13, 6, 'Occupied Extra Bed'),
(821, 14, 6, 'Occupied Extra Bed'),
(822, 15, 6, 'Occupied Extra Bed'),
(823, 16, 6, 'Occupied Extra Bed'),
(824, 17, 6, 'Occupied Extra Bed'),
(825, 18, 6, 'Occupied Extra Bed'),
(826, 19, 6, 'Occupied Extra Bed'),
(827, 20, 6, 'Occupied Extra Bed'),
(828, 21, 6, 'Extra Bed'),
(829, 22, 6, 'Extra Bed'),
(830, 23, 6, 'Occupied Extra Bed'),
(831, 24, 6, 'Extra Bed'),
(832, 25, 6, 'Occupied Extra Bed'),
(833, 26, 6, 'Extra Bed'),
(834, 27, 6, 'Occupied Extra Bed'),
(835, 28, 6, 'Occupied Extra Bed'),
(836, 29, 6, 'Occupied Extra Bed'),
(837, 30, 6, 'Extra Bed'),
(838, 31, 6, 'Extra Bed'),
(839, 32, 6, 'Extra Bed'),
(840, 33, 6, 'Occupied Extra Bed'),
(841, 34, 6, 'Extra Bed'),
(842, 35, 6, 'Extra Bed'),
(843, 36, 6, 'Extra Bed'),
(844, 37, 6, 'Extra Bed'),
(845, 38, 6, 'Extra Bed'),
(846, 39, 6, 'Extra Bed'),
(847, 40, 6, 'Extra Bed'),
(848, 41, 6, 'Extra Bed'),
(849, 42, 6, 'Extra Bed'),
(850, 43, 6, 'Extra Bed'),
(851, 44, 6, 'Extra Bed'),
(852, 45, 6, 'Extra Bed'),
(853, 46, 6, 'Extra Bed'),
(854, 47, 6, 'Extra Bed'),
(855, 48, 6, 'Extra Bed'),
(856, 49, 6, 'Extra Bed'),
(857, 50, 6, 'Extra Bed'),
(858, 51, 6, 'Extra Bed'),
(859, 52, 6, 'Extra Bed'),
(860, 53, 6, 'Extra Bed'),
(861, 54, 6, 'Extra Bed'),
(862, 11, 4, 'Extra Bed');

-- --------------------------------------------------------

--
-- Table structure for table `blood_sugartbl`
--

CREATE TABLE `blood_sugartbl` (
  `id` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `bs_date` date NOT NULL,
  `bs_bsf` varchar(255) NOT NULL,
  `bs_hrbsf` varchar(255) NOT NULL,
  `bs_pre_lunch` varchar(255) NOT NULL,
  `bs_post_lunch` varchar(255) NOT NULL,
  `bs_pre_dinner` varchar(255) NOT NULL,
  `bs_post_dinner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_sugartbl`
--

INSERT INTO `blood_sugartbl` (`id`, `regNo`, `bs_date`, `bs_bsf`, `bs_hrbsf`, `bs_pre_lunch`, `bs_post_lunch`, `bs_pre_dinner`, `bs_post_dinner`) VALUES
(7, 10048, '2018-07-09', '34', '34', '34', '23', '23', '23'),
(14, 10048, '2018-07-03', '23', '213', '23', '34', '34', '34'),
(15, 10050, '2018-07-05', 'sdf', '234', 'sdf', '45', 'df', '45'),
(16, 10050, '2018-07-05', 'sdf5', '45', '443', '45', '34', '34'),
(17, 10051, '2018-07-06', '23', '34', '45', '56', '67', '78'),
(18, 10051, '2018-07-02', '12', '13', '14', '35', '46', '57'),
(19, 10058, '2018-07-12', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `charttbl`
--

CREATE TABLE `charttbl` (
  `chartId` int(11) NOT NULL,
  `chartpatregNo` int(11) NOT NULL,
  `patHistory` varchar(255) DEFAULT NULL,
  `patInvestigation` varchar(255) NOT NULL,
  `patTreatPlan` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `docName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charttbl`
--

INSERT INTO `charttbl` (`chartId`, `chartpatregNo`, `patHistory`, `patInvestigation`, `patTreatPlan`, `timestamp`, `docName`) VALUES
(1, 10049, 'Testing', '', '', '2018-02-21 09:13:24', 'Dr. Muhammad Arshad Ch'),
(2, 10049, NULL, 'Testing', '', '2018-02-21 09:13:28', 'Dr. Muhammad Arshad Ch'),
(3, 10049, NULL, '', 'Again', '2018-02-21 09:13:31', 'Dr. Muhammad Arshad Ch'),
(4, 10048, 'Working', '', '', '2018-02-21 09:20:10', 'Dr. Muhammad Arshad Ch'),
(5, 10048, NULL, 'fine', '', '2018-02-21 09:20:15', 'Dr. Muhammad Arshad Ch'),
(6, 10048, NULL, '', 'Testing', '2018-02-21 09:20:19', 'Dr. Muhammad Arshad Ch'),
(7, 10047, 'Brief history goes here', '', '', '2018-02-24 11:35:01', 'Dr. Muhammad Arshad Ch'),
(8, 10047, NULL, 'Inverstgation Plan goes here', '', '2018-02-24 11:35:15', 'Dr. Muhammad Arshad Ch'),
(9, 10047, NULL, '', 'Treatment Plan goes here', '2018-02-24 11:35:23', 'Dr. Muhammad Arshad Ch'),
(10, 10051, 'Test', '', '', '2018-03-03 08:21:20', 'Dr. Muhammad Arshad Ch'),
(11, 10051, 'Test', '', '', '2018-03-06 06:10:51', 'Dr. Muhammad Arshad Ch'),
(12, 10587, NULL, '', '', '2018-06-02 04:37:48', 'Dr. Muhammad Arshad Ch'),
(13, 10589, 'H/O RTA 3 Hours (Head Injury)', '', '', '2018-06-02 04:47:15', 'Dr. Muhammad Arshad Ch'),
(14, 10589, 'Vaniting -ve', '', '', '2018-06-02 04:47:40', 'Dr. Muhammad Arshad Ch'),
(15, 10589, 'ENT Bleed +ve', '', '', '2018-06-02 04:47:51', 'Dr. Muhammad Arshad Ch'),
(16, 10589, 'Fits -ve', '', '', '2018-06-02 04:47:58', 'Dr. Muhammad Arshad Ch'),
(17, 10589, 'O/E', '', '', '2018-06-02 04:48:09', 'Dr. Muhammad Arshad Ch'),
(18, 10589, 'GCS 13/15', '', '', '2018-06-02 04:48:17', 'Dr. Muhammad Arshad Ch'),
(19, 10589, 'CVS, 51+52+0', '', '', '2018-06-02 04:48:48', 'Dr. Muhammad Arshad Ch'),
(20, 10589, 'Resp. NVB+O', '', '', '2018-06-02 04:49:07', 'Dr. Muhammad Arshad Ch'),
(21, 10589, 'Git Soft, Ninteder, NAD', '', '', '2018-06-02 04:49:26', 'Dr. Muhammad Arshad Ch'),
(22, 10589, '', '', '', '2018-06-02 04:49:34', 'Dr. Muhammad Arshad Ch'),
(23, 10589, '', '', '', '2018-06-02 04:49:37', 'Dr. Muhammad Arshad Ch'),
(24, 10589, NULL, 'CT- Brain', '', '2018-06-02 04:49:45', 'Dr. Muhammad Arshad Ch'),
(25, 10589, NULL, 'CBC e Platelets', '', '2018-06-02 04:50:00', 'Dr. Muhammad Arshad Ch'),
(26, 10589, NULL, 'LFT, RFT', '', '2018-06-02 04:50:06', 'Dr. Muhammad Arshad Ch'),
(27, 10589, NULL, 'PT, APTT, INR', '', '2018-06-02 04:50:16', 'Dr. Muhammad Arshad Ch'),
(28, 10589, NULL, '', 'Plan Observation', '2018-06-02 04:51:02', 'Dr. Muhammad Arshad Ch'),
(29, 10589, NULL, '', '', '2018-06-02 04:51:04', 'Dr. Muhammad Arshad Ch'),
(30, 10589, NULL, '', '', '2018-06-02 04:51:06', 'Dr. Muhammad Arshad Ch'),
(31, 10599, NULL, 'CBC', '', '2018-06-04 04:05:50', 'Dr. Muhammad Arshad Ch'),
(32, 10599, NULL, 'PT, APTT, INR', '', '2018-06-04 04:06:00', 'Dr. Muhammad Arshad Ch'),
(33, 10599, NULL, 'C.T Brain', '', '2018-06-04 04:06:16', 'Dr. Muhammad Arshad Ch'),
(34, 10599, NULL, 'MRI Brain', '', '2018-06-04 04:06:19', 'Dr. Muhammad Arshad Ch'),
(35, 10599, NULL, 'Sr. Profile', '', '2018-06-04 04:06:28', 'Dr. Muhammad Arshad Ch'),
(36, 10601, 'H/O of Trauma (Fall of Shuttering over him 6 hours ago) ENT Bleed +ve', '', '', '2018-06-04 04:39:04', 'Dr. Muhammad Arshad Ch'),
(37, 10601, 'H/O Vomiting, 3,4 Episodes', '', '', '2018-06-04 04:39:33', 'Dr. Muhammad Arshad Ch'),
(38, 10601, 'LOC +ve', '', '', '2018-06-04 04:39:40', 'Dr. Muhammad Arshad Ch'),
(39, 10601, 'O/E B/L Panda eye sign +ve', '', '', '2018-06-04 04:41:01', 'Dr. Muhammad Arshad Ch'),
(40, 10601, 'GCS :- 07/15', '', '', '2018-06-04 04:41:11', 'Dr. Muhammad Arshad Ch'),
(41, 10601, NULL, 'CBC', '', '2018-06-04 04:41:17', 'Dr. Muhammad Arshad Ch'),
(42, 10601, NULL, 'S/P', '', '2018-06-04 04:41:19', 'Dr. Muhammad Arshad Ch'),
(43, 10601, NULL, 'CT Brain', '', '2018-06-04 04:41:22', 'Dr. Muhammad Arshad Ch'),
(44, 10601, NULL, '', 'Depressed Skull', '2018-06-04 04:41:40', 'Dr. Muhammad Arshad Ch'),
(45, 10601, NULL, '', 'SDH', '2018-06-04 04:51:04', 'Dr. Muhammad Arshad Ch'),
(46, 10601, NULL, '', 'Preumocephlus', '2018-06-04 04:51:21', 'Dr. Muhammad Arshad Ch'),
(47, 10604, 'H/O Fall from roof on the floor.', '', '', '2018-06-04 05:03:03', 'Dr. Muhammad Arshad Ch'),
(48, 10604, 'LOC -ve', '', '', '2018-06-04 05:03:09', 'Dr. Muhammad Arshad Ch'),
(49, 10604, 'Vomiting +ve', '', '', '2018-06-04 05:03:16', 'Dr. Muhammad Arshad Ch'),
(50, 10604, 'Headache +ve', '', '', '2018-06-04 05:03:28', 'Dr. Muhammad Arshad Ch'),
(51, 10604, 'GCS 15/15', '', '', '2018-06-04 05:03:35', 'Dr. Muhammad Arshad Ch'),
(52, 10595, 'RTA', '', '', '2018-06-04 05:11:07', 'Dr. Muhammad Arshad Ch'),
(53, 10595, 'Vomiting +ve', '', '', '2018-06-04 05:11:13', 'Dr. Muhammad Arshad Ch'),
(54, 10595, 'ENT Bleed ve', '', '', '2018-06-04 05:11:20', 'Dr. Muhammad Arshad Ch'),
(55, 10595, 'LOC +ve', '', '', '2018-06-04 05:11:28', 'Dr. Muhammad Arshad Ch'),
(56, 10466, 'H/OFits since Birth', '', '', '2018-06-04 05:14:08', 'Dr. Muhammad Arshad Ch'),
(57, 10466, 'H/o Enlarge Head Size for 2 Months.', '', '', '2018-06-04 05:14:31', 'Dr. Muhammad Arshad Ch'),
(58, 10466, NULL, 'CBC', '', '2018-06-04 05:14:36', 'Dr. Muhammad Arshad Ch'),
(59, 10466, NULL, 'CXR', '', '2018-06-04 05:14:38', 'Dr. Muhammad Arshad Ch'),
(60, 10466, NULL, 'CT Brain', '', '2018-06-04 05:14:43', 'Dr. Muhammad Arshad Ch'),
(61, 10605, 'Pregnant 5 Months', '', '', '2018-06-04 05:20:27', 'Dr. Muhammad Arshad Ch'),
(62, 10605, 'H/O Fall from Bike 13 hrs', '', '', '2018-06-04 05:20:44', 'Dr. Muhammad Arshad Ch'),
(63, 10605, 'Vomiting +ve', '', '', '2018-06-04 05:20:49', 'Dr. Muhammad Arshad Ch'),
(64, 10605, 'ENT Bleed +ve', '', '', '2018-06-04 05:20:56', 'Dr. Muhammad Arshad Ch'),
(65, 10605, 'Fits -ve', '', '', '2018-06-04 05:21:12', 'Dr. Muhammad Arshad Ch'),
(66, 10605, 'O/E GCS = 15/15', '', '', '2018-06-04 05:21:24', 'Dr. Muhammad Arshad Ch'),
(67, 10605, NULL, 'CT Scan', '', '2018-06-04 05:26:47', 'Dr. Muhammad Arshad Ch'),
(68, 10605, NULL, 'CBC', '', '2018-06-04 05:26:50', 'Dr. Muhammad Arshad Ch'),
(69, 10605, NULL, 'LFT, RFT', '', '2018-06-04 05:26:56', 'Dr. Muhammad Arshad Ch'),
(70, 10605, NULL, 'S/E', '', '2018-06-04 05:27:01', 'Dr. Muhammad Arshad Ch'),
(71, 10605, NULL, 'V/M', '', '2018-06-04 05:27:03', 'Dr. Muhammad Arshad Ch'),
(72, 10605, NULL, 'PT, APTT, INR', '', '2018-06-04 05:27:14', 'Dr. Muhammad Arshad Ch'),
(73, 10607, NULL, 'CBC', '', '2018-06-04 05:29:45', 'Dr. Muhammad Arshad Ch'),
(74, 10607, NULL, 'CT Brain', '', '2018-06-04 05:29:51', 'Dr. Muhammad Arshad Ch'),
(75, 10607, NULL, 'Serum Suger', '', '2018-06-04 05:29:57', 'Dr. Muhammad Arshad Ch'),
(76, 10607, NULL, 'Serum Profile', '', '2018-06-04 05:30:04', 'Dr. Muhammad Arshad Ch'),
(77, 10608, NULL, 'CBC', '', '2018-06-04 05:41:43', 'Dr. Muhammad Arshad Ch'),
(78, 10608, NULL, 'PT, APTT, INR', '', '2018-06-04 05:41:51', 'Dr. Muhammad Arshad Ch'),
(79, 10608, NULL, 'S. Profile', '', '2018-06-04 05:41:58', 'Dr. Muhammad Arshad Ch'),
(80, 10608, NULL, 'V/M', '', '2018-06-04 05:42:04', 'Dr. Muhammad Arshad Ch'),
(81, 10608, NULL, 'BSR', '', '2018-06-04 05:42:07', 'Dr. Muhammad Arshad Ch'),
(82, 10608, NULL, 'RFT, LFT', '', '2018-06-04 05:42:12', 'Dr. Muhammad Arshad Ch'),
(83, 10633, 'H/O R. Sided Body Weeknen', '', '', '2018-06-05 05:36:05', 'Dr. Muhammad Arshad Ch'),
(84, 10633, '02 Mo.', '', '', '2018-06-05 05:36:14', 'Dr. Muhammad Arshad Ch'),
(85, 10633, 'H/O Inlability to Walk 1 mo', '', '', '2018-06-05 05:36:40', 'Dr. Muhammad Arshad Ch'),
(86, 10633, 'L/L Power 2/5', '', '', '2018-06-05 05:36:54', 'Dr. Muhammad Arshad Ch'),
(87, 10633, 'V/L 5/5', '', '', '2018-06-05 05:37:00', 'Dr. Muhammad Arshad Ch'),
(88, 10633, NULL, 'CBC', '', '2018-06-05 05:37:05', 'Dr. Muhammad Arshad Ch'),
(89, 10633, NULL, 'PT, APTT, INR', '', '2018-06-05 05:37:15', 'Dr. Muhammad Arshad Ch'),
(90, 10633, NULL, 'Sr. Profile', '', '2018-06-05 05:37:22', 'Dr. Muhammad Arshad Ch'),
(91, 10633, NULL, 'V/M', '', '2018-06-05 05:37:28', 'Dr. Muhammad Arshad Ch'),
(92, 10633, NULL, 'S/E', '', '2018-06-05 05:37:32', 'Dr. Muhammad Arshad Ch'),
(93, 10633, NULL, 'BSR', '', '2018-06-05 05:37:36', 'Dr. Muhammad Arshad Ch'),
(94, 10633, NULL, 'RFT, LFT', '', '2018-06-05 05:37:40', 'Dr. Muhammad Arshad Ch'),
(95, 10633, NULL, 'MRI', '', '2018-06-05 05:37:50', 'Dr. Muhammad Arshad Ch'),
(96, 10633, NULL, '', 'Cervial Trauma', '2018-06-05 05:38:37', 'Dr. Muhammad Arshad Ch'),
(97, 10633, NULL, '', 'Surgery', '2018-06-05 05:38:57', 'Dr. Muhammad Arshad Ch'),
(98, 10635, 'P/C, Pain in Right Leg and unable to walk 2 since years', '', '', '2018-06-05 06:03:48', 'Dr. Muhammad Arshad Ch'),
(99, 10635, NULL, 'CBC', '', '2018-06-05 06:03:54', 'Dr. Muhammad Arshad Ch'),
(100, 10635, NULL, 'Sr. Profile', '', '2018-06-05 06:03:58', 'Dr. Muhammad Arshad Ch'),
(101, 10635, NULL, 'V/M', '', '2018-06-05 06:04:03', 'Dr. Muhammad Arshad Ch'),
(102, 10635, NULL, 'PT, APTT, INR', '', '2018-06-05 06:04:09', 'Dr. Muhammad Arshad Ch'),
(103, 10635, NULL, 'ECG', '', '2018-06-05 06:04:14', 'Dr. Muhammad Arshad Ch'),
(104, 10635, NULL, 'CXR', '', '2018-06-05 06:04:16', 'Dr. Muhammad Arshad Ch'),
(105, 10635, NULL, '', 'Disc Bulqe L4-L5 and L5-S1', '2018-06-05 06:05:08', 'Dr. Muhammad Arshad Ch'),
(106, 10569, 'V.P Skull Placed', '', '', '2018-06-05 06:06:44', 'Dr. Muhammad Arshad Ch'),
(107, 10569, '05/01/2018', '', '', '2018-06-05 06:06:59', 'Dr. Muhammad Arshad Ch'),
(108, 10569, 'H/O Fever  Months', '', '', '2018-06-05 06:07:14', 'Dr. Muhammad Arshad Ch'),
(109, 10575, 'H/O RTA 03 Days', '', '', '2018-06-05 06:08:18', 'Dr. Muhammad Arshad Ch'),
(110, 10575, 'hit by Trolly', '', '', '2018-06-05 06:08:23', 'Dr. Muhammad Arshad Ch'),
(111, 10575, 'LOC +ve', '', '', '2018-06-05 06:08:36', 'Dr. Muhammad Arshad Ch'),
(112, 10575, 'Vomiting +ve', '', '', '2018-06-05 06:08:41', 'Dr. Muhammad Arshad Ch'),
(113, 10575, NULL, 'CT Scan', '', '2018-06-05 06:08:49', 'Dr. Muhammad Arshad Ch'),
(114, 10636, 'Neck Holding', '', '', '2018-06-05 06:12:06', 'Dr. Muhammad Arshad Ch'),
(115, 10636, 'Fever 02 Days', '', '', '2018-06-05 06:12:21', 'Dr. Muhammad Arshad Ch'),
(116, 10636, 'Febrile Fits', '', '', '2018-06-05 06:12:41', 'Dr. Muhammad Arshad Ch'),
(117, 10636, NULL, 'CT Scan', '', '2018-06-05 06:13:08', 'Dr. Muhammad Arshad Ch'),
(118, 10636, NULL, '', 'FUC of Partial C/S Injury', '2018-06-05 06:13:42', 'Dr. Muhammad Arshad Ch'),
(119, 10640, 'H/O Lt. Sided weekens 1.5 years', '', '', '2018-06-06 04:20:25', 'Dr. Muhammad Arshad Ch'),
(120, 10640, 'Headache 1 weak', '', '', '2018-06-06 04:20:36', 'Dr. Muhammad Arshad Ch'),
(121, 10640, 'Unable to Speak', '', '', '2018-06-06 04:20:57', 'Dr. Muhammad Arshad Ch'),
(122, 10640, 'swelling 1 weak', '', '', '2018-06-06 04:21:06', 'Dr. Muhammad Arshad Ch'),
(123, 10640, 'GCS 4/15', '', '', '2018-06-06 04:21:21', 'Dr. Muhammad Arshad Ch'),
(124, 10640, 'E3, V Airway M5', '', '', '2018-06-06 04:21:41', 'Dr. Muhammad Arshad Ch'),
(125, 10640, NULL, 'CBC', '', '2018-06-06 04:21:46', 'Dr. Muhammad Arshad Ch'),
(126, 10640, NULL, 'Sr. Profile', '', '2018-06-06 04:21:50', 'Dr. Muhammad Arshad Ch'),
(127, 10640, NULL, 'Clotting Prof.', '', '2018-06-06 04:22:01', 'Dr. Muhammad Arshad Ch'),
(128, 10640, NULL, 'CT Brain', '', '2018-06-06 04:22:08', 'Dr. Muhammad Arshad Ch'),
(129, 10640, NULL, 'MRI Brain', '', '2018-06-06 04:22:15', 'Dr. Muhammad Arshad Ch'),
(130, 10626, 'H/O 6 hours', '', '', '2018-06-06 04:23:35', 'Dr. Muhammad Arshad Ch'),
(131, 10626, 'LOC +ve', '', '', '2018-06-06 04:23:41', 'Dr. Muhammad Arshad Ch'),
(132, 10626, 'Vomiting +ve', '', '', '2018-06-06 04:23:47', 'Dr. Muhammad Arshad Ch'),
(133, 10626, 'ENT Bleed +ve', '', '', '2018-06-06 04:24:00', 'Dr. Muhammad Arshad Ch'),
(134, 10626, 'L. Eye Brusing.', '', '', '2018-06-06 04:24:23', 'Dr. Muhammad Arshad Ch'),
(135, 10626, 'GCS 13/15', '', '', '2018-06-06 04:24:31', 'Dr. Muhammad Arshad Ch'),
(136, 10626, 'GLT= Soft + Nontender', '', '', '2018-06-06 04:25:12', 'Dr. Muhammad Arshad Ch'),
(137, 10626, NULL, 'CT Brain', '', '2018-06-06 04:25:42', 'Dr. Muhammad Arshad Ch'),
(138, 10626, NULL, '', 'EDH', '2018-06-06 04:25:50', 'Dr. Muhammad Arshad Ch'),
(139, 10650, 'H/O R.T.A', '', '', '2018-06-06 04:37:00', 'Dr. Muhammad Arshad Ch'),
(140, 10650, 'LOC', '', '', '2018-06-06 04:37:02', 'Dr. Muhammad Arshad Ch'),
(141, 10650, 'ENT Bleed', '', '', '2018-06-06 04:37:09', 'Dr. Muhammad Arshad Ch'),
(142, 10650, 'GCS R= 6/5', '', '', '2018-06-06 04:37:21', 'Dr. Muhammad Arshad Ch'),
(143, 10650, NULL, 'CBC', '', '2018-06-06 04:37:28', 'Dr. Muhammad Arshad Ch'),
(144, 10650, NULL, 'Sr. Profile', '', '2018-06-06 04:37:33', 'Dr. Muhammad Arshad Ch'),
(145, 10650, NULL, 'CT Profile', '', '2018-06-06 04:37:42', 'Dr. Muhammad Arshad Ch'),
(146, 10650, NULL, 'CT Scan', '', '2018-06-06 04:37:46', 'Dr. Muhammad Arshad Ch'),
(147, 10650, NULL, '', 'Maintain Airway', '2018-06-06 04:38:11', 'Dr. Muhammad Arshad Ch'),
(148, 10650, NULL, '', 'IV Line', '2018-06-06 04:38:14', 'Dr. Muhammad Arshad Ch'),
(149, 10650, NULL, '', 'Pass ETT', '2018-06-06 04:38:22', 'Dr. Muhammad Arshad Ch'),
(150, 10619, 'H/O R.T.A 12 hours', '', '', '2018-06-06 04:39:33', 'Dr. Muhammad Arshad Ch'),
(151, 10619, 'LOC +ve', '', '', '2018-06-06 04:40:00', 'Dr. Muhammad Arshad Ch'),
(152, 10619, 'Vomiting +ve', '', '', '2018-06-06 04:40:08', 'Dr. Muhammad Arshad Ch'),
(153, 10619, 'ENT Bleed -ve', '', '', '2018-06-06 04:40:19', 'Dr. Muhammad Arshad Ch'),
(154, 10619, 'GCS 15/15', '', '', '2018-06-06 04:40:24', 'Dr. Muhammad Arshad Ch'),
(155, 10619, NULL, '', 'EDH', '2018-06-06 04:40:44', 'Dr. Muhammad Arshad Ch'),
(156, 10619, NULL, 'CT Dore', '', '2018-06-06 04:40:59', 'Dr. Muhammad Arshad Ch'),
(157, 10634, 'H/O Hit by Car 1 day', '', '', '2018-06-06 04:57:37', 'Dr. Muhammad Arshad Ch'),
(158, 10634, 'LOC +ve', '', '', '2018-06-06 04:57:40', 'Dr. Muhammad Arshad Ch'),
(159, 10634, 'Vomiting +ve', '', '', '2018-06-06 04:57:46', 'Dr. Muhammad Arshad Ch'),
(160, 10634, 'O/E GCS = 11/15', '', '', '2018-06-06 04:58:21', 'Dr. Muhammad Arshad Ch'),
(161, 10634, NULL, 'CBC', '', '2018-06-06 04:58:26', 'Dr. Muhammad Arshad Ch'),
(162, 10634, NULL, 'PT, APTT, INT', '', '2018-06-06 04:58:37', 'Dr. Muhammad Arshad Ch'),
(163, 10634, NULL, 'Sr. Profile', '', '2018-06-06 04:58:45', 'Dr. Muhammad Arshad Ch'),
(164, 10634, NULL, 'CT Scan', '', '2018-06-06 04:58:53', 'Dr. Muhammad Arshad Ch'),
(165, 10634, NULL, '', 'Brain Edena', '2018-06-06 04:59:09', 'Dr. Muhammad Arshad Ch'),
(166, 10654, 'H/O R.T.A', '', '', '2018-06-07 04:53:56', 'Dr. Muhammad Arshad Ch'),
(167, 10654, 'H/O LOC +ve', '', '', '2018-06-07 04:54:04', 'Dr. Muhammad Arshad Ch'),
(168, 10654, 'Vomiting +ve', '', '', '2018-06-07 04:54:16', 'Dr. Muhammad Arshad Ch'),
(169, 10654, 'Ear Bleed +ve', '', '', '2018-06-07 04:54:25', 'Dr. Muhammad Arshad Ch'),
(170, 10654, 'GCS = E4,V5,M6, 15/15', '', '', '2018-06-07 04:55:00', 'Dr. Muhammad Arshad Ch'),
(171, 10654, NULL, 'PT, APTT, INR', '', '2018-06-07 04:55:12', 'Dr. Muhammad Arshad Ch'),
(172, 10609, 'CP Child', '', '', '2018-06-07 05:28:24', 'Dr. Muhammad Arshad Ch'),
(173, 10609, 'H/O Fits', '', '', '2018-06-07 05:28:36', 'Dr. Muhammad Arshad Ch'),
(174, 10609, 'Fever', '', '', '2018-06-07 05:28:38', 'Dr. Muhammad Arshad Ch'),
(175, 10609, 'Aspiration Hydrocephlus', '', '', '2018-06-07 05:29:26', 'Dr. Muhammad Arshad Ch'),
(176, 10609, NULL, 'Baseline Investigation', '', '2018-06-07 05:29:44', 'Dr. Muhammad Arshad Ch'),
(177, 10656, 'Fall From Stairs', '', '', '2018-06-07 05:30:38', 'Dr. Muhammad Arshad Ch'),
(178, 10660, 'Fall From Wall', '', '', '2018-06-07 06:13:30', 'Dr. Muhammad Arshad Ch'),
(179, 10660, 'LOC +ve', '', '', '2018-06-07 06:13:38', 'Dr. Muhammad Arshad Ch'),
(180, 10660, 'Vomiting +ve', '', '', '2018-06-07 06:13:42', 'Dr. Muhammad Arshad Ch'),
(181, 10660, 'GCS 15/15', '', '', '2018-06-07 06:13:51', 'Dr. Muhammad Arshad Ch'),
(182, 10660, NULL, 'CT Brain', '', '2018-06-07 06:14:01', 'Dr. Muhammad Arshad Ch'),
(183, 10660, NULL, 'CBC E Platletts', '', '2018-06-07 06:14:10', 'Dr. Muhammad Arshad Ch'),
(184, 10657, 'R.T.A', '', '', '2018-06-07 06:15:09', 'Dr. Muhammad Arshad Ch'),
(185, 10657, 'Vomiting +ve', '', '', '2018-06-07 06:15:13', 'Dr. Muhammad Arshad Ch'),
(186, 10657, 'ENT Bleed +ve', '', '', '2018-06-07 06:15:23', 'Dr. Muhammad Arshad Ch'),
(187, 10657, 'GCS= 15/15', '', '', '2018-06-07 06:15:32', 'Dr. Muhammad Arshad Ch'),
(188, 10657, NULL, 'CT Brain', '', '2018-06-07 06:15:42', 'Dr. Muhammad Arshad Ch'),
(189, 10657, NULL, 'Base Line Profile', '', '2018-06-07 06:15:48', 'Dr. Muhammad Arshad Ch'),
(190, 10584, 'LOC +ve', '', '', '2018-06-07 06:22:31', 'Dr. Muhammad Arshad Ch'),
(191, 10584, 'Vomiting +ve', '', '', '2018-06-07 06:22:35', 'Dr. Muhammad Arshad Ch'),
(192, 10584, 'Fits +ve', '', '', '2018-06-07 06:22:40', 'Dr. Muhammad Arshad Ch'),
(193, 10671, 'H/O Fight', '', '', '2018-06-07 06:25:50', 'Dr. Muhammad Arshad Ch'),
(194, 10671, 'Injury by Axe in Head', '', '', '2018-06-07 06:26:05', 'Dr. Muhammad Arshad Ch'),
(195, 10671, 'Mild Brain Edema', '', '', '2018-06-07 06:26:22', 'Dr. Muhammad Arshad Ch'),
(196, 10644, 'Follow Up Case. C/o EDH', '', '', '2018-06-08 04:50:53', 'Dr. Muhammad Arshad Ch'),
(197, 10644, 'Now Presented Hematuria', '', '', '2018-06-08 04:51:10', 'Dr. Muhammad Arshad Ch'),
(198, 10644, NULL, 'CBC', '', '2018-06-08 04:51:15', 'Dr. Muhammad Arshad Ch'),
(199, 10644, NULL, 'Sr. Profile', '', '2018-06-08 04:51:19', 'Dr. Muhammad Arshad Ch'),
(200, 10644, NULL, '', 'Conservative', '2018-06-08 04:51:34', 'Dr. Muhammad Arshad Ch'),
(201, 10694, 'H/O, Pain in LB, 02 Months', '', '', '2018-06-08 04:57:47', 'Dr. Muhammad Arshad Ch'),
(202, 10694, NULL, 'MRI L/S', '', '2018-06-08 04:58:26', 'Dr. Muhammad Arshad Ch'),
(203, 10694, NULL, 'Spine', '', '2018-06-08 04:58:36', 'Dr. Muhammad Arshad Ch'),
(204, 10694, NULL, 'X-ray C/S Spine', '', '2018-06-08 04:59:04', 'Dr. Muhammad Arshad Ch'),
(205, 10695, 'RTA 6 Hours', '', '', '2018-06-08 05:16:44', 'Dr. Muhammad Arshad Ch'),
(206, 10695, 'LOC +ve', '', '', '2018-06-08 05:16:53', 'Dr. Muhammad Arshad Ch'),
(207, 10695, 'Vomiting +ve', '', '', '2018-06-08 05:16:58', 'Dr. Muhammad Arshad Ch'),
(208, 10695, 'Nosal Bleed +ve', '', '', '2018-06-08 05:17:06', 'Dr. Muhammad Arshad Ch'),
(209, 10695, 'Ear Bleed +ve', '', '', '2018-06-08 05:17:12', 'Dr. Muhammad Arshad Ch'),
(210, 10695, 'Both Eyes Panda', '', '', '2018-06-08 05:17:33', 'Dr. Muhammad Arshad Ch'),
(211, 10695, 'Panda Eye Sign +ve', '', '', '2018-06-08 05:18:13', 'Dr. Muhammad Arshad Ch'),
(212, 10695, 'GCS 11/15', '', '', '2018-06-08 05:18:21', 'Dr. Muhammad Arshad Ch'),
(213, 10695, 'Lt. Arm Fracture', '', '', '2018-06-08 05:18:33', 'Dr. Muhammad Arshad Ch'),
(214, 10695, NULL, 'CT Brain', '', '2018-06-08 05:18:45', 'Dr. Muhammad Arshad Ch'),
(215, 10695, NULL, 'Base Line Investigation', '', '2018-06-08 05:18:59', 'Dr. Muhammad Arshad Ch'),
(216, 10646, 'Fall from stairs 1day', '', '', '2018-06-08 05:20:21', 'Dr. Muhammad Arshad Ch'),
(217, 10646, 'LOC +ve', '', '', '2018-06-08 05:20:28', 'Dr. Muhammad Arshad Ch'),
(218, 10646, 'Vomiting +ve', '', '', '2018-06-08 05:20:40', 'Dr. Muhammad Arshad Ch'),
(219, 10646, 'Left Ear Bleed', '', '', '2018-06-08 05:20:52', 'Dr. Muhammad Arshad Ch'),
(220, 10646, 'GCS 15/15', '', '', '2018-06-08 05:20:57', 'Dr. Muhammad Arshad Ch'),
(221, 10646, NULL, 'CT Brain', '', '2018-06-08 05:21:07', 'Dr. Muhammad Arshad Ch'),
(222, 10646, NULL, 'Base Line Investigation', '', '2018-06-08 05:21:16', 'Dr. Muhammad Arshad Ch'),
(223, 10646, NULL, '', 'SAH + SDH', '2018-06-08 05:21:27', 'Dr. Muhammad Arshad Ch'),
(224, 10615, 'Headache 1 Month', '', '', '2018-06-08 05:22:10', 'Dr. Muhammad Arshad Ch'),
(225, 10615, 'Vertigo', '', '', '2018-06-08 05:22:19', 'Dr. Muhammad Arshad Ch'),
(226, 10615, 'K/C of HTN e Poor Compliance', '', '', '2018-06-08 05:22:51', 'Dr. Muhammad Arshad Ch'),
(227, 10615, NULL, 'CBC', '', '2018-06-08 05:22:57', 'Dr. Muhammad Arshad Ch'),
(228, 10615, NULL, 'PT, APTT, INR', '', '2018-06-08 05:23:01', 'Dr. Muhammad Arshad Ch'),
(229, 10615, NULL, 'Sr. Profile', '', '2018-06-08 05:23:06', 'Dr. Muhammad Arshad Ch'),
(230, 10576, 'Back Pain 2 years', '', '', '2018-06-08 05:24:08', 'Dr. Muhammad Arshad Ch'),
(231, 10576, NULL, 'CT Brain', '', '2018-06-08 05:24:13', 'Dr. Muhammad Arshad Ch'),
(232, 10576, NULL, 'MRI', '', '2018-06-08 05:24:17', 'Dr. Muhammad Arshad Ch'),
(233, 10576, NULL, 'CBC', '', '2018-06-08 05:24:18', 'Dr. Muhammad Arshad Ch'),
(234, 10576, NULL, 'Base Line Investigation', '', '2018-06-08 05:24:28', 'Dr. Muhammad Arshad Ch'),
(235, 10681, 'RTA 24 Hours', '', '', '2018-06-08 05:43:59', 'Dr. Muhammad Arshad Ch'),
(236, 10681, 'Vomiting +ve', '', '', '2018-06-08 05:44:06', 'Dr. Muhammad Arshad Ch'),
(237, 10681, 'Nosal Bleed +ve', '', '', '2018-06-08 05:44:16', 'Dr. Muhammad Arshad Ch'),
(238, 10681, 'LOC +ve', '', '', '2018-06-08 05:44:20', 'Dr. Muhammad Arshad Ch'),
(239, 10681, 'GCS 15/15', '', '', '2018-06-08 05:44:27', 'Dr. Muhammad Arshad Ch'),
(240, 10681, NULL, 'CT Scan Brain', '', '2018-06-08 05:44:38', 'Dr. Muhammad Arshad Ch'),
(241, 10681, NULL, 'Base Line Investigation', '', '2018-06-08 05:44:44', 'Dr. Muhammad Arshad Ch'),
(242, 10681, NULL, '', 'Maintain I/V Line', '2018-06-08 05:45:11', 'Dr. Muhammad Arshad Ch'),
(243, 10681, NULL, '', 'Fluids', '2018-06-08 05:45:19', 'Dr. Muhammad Arshad Ch'),
(244, 10681, NULL, '', 'Antiboitics', '2018-06-08 05:45:30', 'Dr. Muhammad Arshad Ch'),
(245, 10659, 'Fall from Hieght', '', '', '2018-06-08 05:46:14', 'Dr. Muhammad Arshad Ch'),
(246, 10659, 'ENT Bleed -ve', '', '', '2018-06-08 05:46:21', 'Dr. Muhammad Arshad Ch'),
(247, 10659, 'Vomiting -ve', '', '', '2018-06-08 05:46:28', 'Dr. Muhammad Arshad Ch'),
(248, 10659, 'LOC +ve', '', '', '2018-06-08 05:46:34', 'Dr. Muhammad Arshad Ch'),
(249, 10659, 'GCS 11/15', '', '', '2018-06-08 05:46:39', 'Dr. Muhammad Arshad Ch'),
(250, 10602, 'Fall in Well', '', '', '2018-06-08 05:47:36', 'Dr. Muhammad Arshad Ch'),
(251, 10602, 'No Neurological Defect', '', '', '2018-06-08 05:48:05', 'Dr. Muhammad Arshad Ch'),
(252, 10602, 'Power 4/5 ul', '', '', '2018-06-08 05:48:20', 'Dr. Muhammad Arshad Ch'),
(253, 10602, 'Sustain Intact', '', '', '2018-06-08 05:48:42', 'Dr. Muhammad Arshad Ch'),
(254, 10602, 'Reflexes Intact', '', '', '2018-06-08 05:48:56', 'Dr. Muhammad Arshad Ch'),
(255, 10602, NULL, '', 'Cervical Spine Injury', '2018-06-08 05:49:11', 'Dr. Muhammad Arshad Ch'),
(256, 10696, 'SOL Brain', '', '', '2018-06-08 05:52:29', 'Dr. Muhammad Arshad Ch'),
(257, 10696, 'LOC +ve', '', '', '2018-06-08 05:52:42', 'Dr. Muhammad Arshad Ch'),
(258, 10696, 'Fits +ve', '', '', '2018-06-08 05:52:47', 'Dr. Muhammad Arshad Ch'),
(259, 10696, 'GCS 15/15', '', '', '2018-06-08 05:52:58', 'Dr. Muhammad Arshad Ch'),
(260, 10696, NULL, 'CBC', '', '2018-06-08 05:53:08', 'Dr. Muhammad Arshad Ch'),
(261, 10696, NULL, 'Sr. Profile', '', '2018-06-08 05:53:16', 'Dr. Muhammad Arshad Ch'),
(262, 10696, NULL, 'CT Brain', '', '2018-06-08 05:53:24', 'Dr. Muhammad Arshad Ch'),
(263, 10696, NULL, 'V/M', '', '2018-06-08 05:53:32', 'Dr. Muhammad Arshad Ch'),
(264, 10696, NULL, 'Cloting profile', '', '2018-06-08 05:53:38', 'Dr. Muhammad Arshad Ch'),
(265, 10696, NULL, '', 'SOL Brain', '2018-06-08 05:53:45', 'Dr. Muhammad Arshad Ch'),
(266, 10677, 'RTA', '', '', '2018-06-08 05:54:54', 'Dr. Muhammad Arshad Ch'),
(267, 10677, 'LOC +ve', '', '', '2018-06-08 05:55:00', 'Dr. Muhammad Arshad Ch'),
(268, 10677, 'Vomiting +ve', '', '', '2018-06-08 05:55:07', 'Dr. Muhammad Arshad Ch'),
(269, 10677, 'ENT Bleed +ve', '', '', '2018-06-08 05:55:12', 'Dr. Muhammad Arshad Ch'),
(270, 10677, 'GCS 15/15', '', '', '2018-06-08 05:55:21', 'Dr. Muhammad Arshad Ch'),
(271, 10512, 'RTA', '', '', '2018-06-09 04:20:24', 'Dr. Muhammad Arshad Ch'),
(272, 10512, 'Vomiting +ve', '', '', '2018-06-09 04:20:31', 'Dr. Muhammad Arshad Ch'),
(273, 10512, 'LOC +ve', '', '', '2018-06-09 04:20:34', 'Dr. Muhammad Arshad Ch'),
(274, 10512, 'Ear Bleed +ve', '', '', '2018-06-09 04:20:41', 'Dr. Muhammad Arshad Ch'),
(275, 10512, NULL, 'CT Brain', '', '2018-06-09 04:20:52', 'Dr. Muhammad Arshad Ch'),
(276, 10706, 'RTA', '', '', '2018-06-09 04:27:25', 'Dr. Muhammad Arshad Ch'),
(277, 10706, 'LOC +ve', '', '', '2018-06-09 04:27:28', 'Dr. Muhammad Arshad Ch'),
(278, 10706, 'ENT Bleed +ve', '', '', '2018-06-09 04:27:37', 'Dr. Muhammad Arshad Ch'),
(279, 10706, 'Fits +ve', '', '', '2018-06-09 04:27:41', 'Dr. Muhammad Arshad Ch'),
(280, 10706, NULL, '', 'Brain Oedena', '2018-06-09 04:27:53', 'Dr. Muhammad Arshad Ch'),
(281, 10707, 'RTA, 3 Days Ago', '', '', '2018-06-09 04:32:09', 'Dr. Muhammad Arshad Ch'),
(282, 10707, 'Power, Upper Liubs 3/5', '', '', '2018-06-09 04:32:30', 'Dr. Muhammad Arshad Ch'),
(283, 10707, 'Lower Liubs 2/5', '', '', '2018-06-09 04:33:15', 'Dr. Muhammad Arshad Ch'),
(284, 10707, NULL, 'Base Line Investigation', '', '2018-06-09 04:33:25', 'Dr. Muhammad Arshad Ch'),
(285, 10707, NULL, 'MRI', '', '2018-06-09 04:33:28', 'Dr. Muhammad Arshad Ch'),
(286, 10707, NULL, '', 'Partial Cervical Spine Injury', '2018-06-09 04:33:43', 'Dr. Muhammad Arshad Ch'),
(287, 10708, 'RTA', '', '', '2018-06-09 04:36:22', 'Dr. Muhammad Arshad Ch'),
(288, 10708, 'Power, Upper Limbs 5/5', '', '', '2018-06-09 04:37:01', 'Dr. Muhammad Arshad Ch'),
(289, 10708, 'Lower Limbs 5/5', '', '', '2018-06-09 04:37:11', 'Dr. Muhammad Arshad Ch'),
(290, 10708, NULL, 'Base Line Investigation', '', '2018-06-09 04:37:33', 'Dr. Muhammad Arshad Ch'),
(291, 10708, NULL, 'X-Ray Cervical Spine', '', '2018-06-09 04:37:52', 'Dr. Muhammad Arshad Ch'),
(292, 10708, NULL, '', 'Partial Cervical Spine Injury', '2018-06-09 04:38:37', 'Dr. Muhammad Arshad Ch'),
(293, 10709, 'RTA', '', '', '2018-06-09 04:42:21', 'Dr. Muhammad Arshad Ch'),
(294, 10709, 'LOC +ve', '', '', '2018-06-09 04:42:27', 'Dr. Muhammad Arshad Ch'),
(295, 10709, 'Vomiting +ve', '', '', '2018-06-09 04:42:32', 'Dr. Muhammad Arshad Ch'),
(296, 10709, 'GCS 12/15', '', '', '2018-06-09 04:42:37', 'Dr. Muhammad Arshad Ch'),
(297, 10709, 'CVS S1+S2+0', '', '', '2018-06-09 04:43:04', 'Dr. Muhammad Arshad Ch'),
(298, 10709, 'Rerp. NVB+0', '', '', '2018-06-09 04:43:17', 'Dr. Muhammad Arshad Ch'),
(299, 10709, 'GIT. SOft Nature', '', '', '2018-06-09 04:43:28', 'Dr. Muhammad Arshad Ch'),
(300, 10709, NULL, 'Base Line Investigation', '', '2018-06-09 04:43:40', 'Dr. Muhammad Arshad Ch'),
(301, 10709, NULL, 'CT Brain', '', '2018-06-09 04:43:44', 'Dr. Muhammad Arshad Ch'),
(302, 10709, NULL, '', 'Depressed Skull Fracture', '2018-06-09 04:44:00', 'Dr. Muhammad Arshad Ch'),
(303, 10710, 'RTA 01 Day Back', '', '', '2018-06-09 04:46:33', 'Dr. Muhammad Arshad Ch'),
(304, 10710, 'Vomiting +ve', '', '', '2018-06-09 04:46:41', 'Dr. Muhammad Arshad Ch'),
(305, 10710, 'ENT Bleed +ve', '', '', '2018-06-09 04:46:49', 'Dr. Muhammad Arshad Ch'),
(306, 10710, 'GCS 15/15', '', '', '2018-06-09 04:46:54', 'Dr. Muhammad Arshad Ch'),
(307, 10710, NULL, '', 'Depressed Skull Fracture', '2018-06-09 04:47:09', 'Dr. Muhammad Arshad Ch'),
(308, 10711, 'Fall From Wall - 1 Day', '', '', '2018-06-09 04:50:09', 'Dr. Muhammad Arshad Ch'),
(309, 10711, 'LOC -ve', '', '', '2018-06-09 04:50:14', 'Dr. Muhammad Arshad Ch'),
(310, 10711, 'Vomiting +ve', '', '', '2018-06-09 04:50:22', 'Dr. Muhammad Arshad Ch'),
(311, 10711, 'Nose Bleed +ve', '', '', '2018-06-09 04:50:30', 'Dr. Muhammad Arshad Ch'),
(312, 10711, 'GCS 15/15', '', '', '2018-06-09 04:50:40', 'Dr. Muhammad Arshad Ch'),
(313, 10711, 'R. Panda Eye', '', '', '2018-06-09 04:50:52', 'Dr. Muhammad Arshad Ch'),
(314, 10711, 'GIT. Nature', '', '', '2018-06-09 04:51:14', 'Dr. Muhammad Arshad Ch'),
(315, 10711, 'CVS. S1+S2+0', '', '', '2018-06-09 04:51:25', 'Dr. Muhammad Arshad Ch'),
(316, 10711, 'Resp. NVB+0', '', '', '2018-06-09 04:51:41', 'Dr. Muhammad Arshad Ch'),
(317, 10711, NULL, 'CBC', '', '2018-06-09 04:51:47', 'Dr. Muhammad Arshad Ch'),
(318, 10711, NULL, 'PT, APTT, INR', '', '2018-06-09 04:51:54', 'Dr. Muhammad Arshad Ch'),
(319, 10711, NULL, 'Sr. Profile', '', '2018-06-09 04:52:01', 'Dr. Muhammad Arshad Ch'),
(320, 10711, NULL, 'CT Brain', '', '2018-06-09 04:52:05', 'Dr. Muhammad Arshad Ch'),
(321, 10698, 'RTA 1 Hour', '', '', '2018-06-09 04:53:19', 'Dr. Muhammad Arshad Ch'),
(322, 10698, 'LOC +ve', '', '', '2018-06-09 04:53:21', 'Dr. Muhammad Arshad Ch'),
(323, 10698, 'Vomiting +ve', '', '', '2018-06-09 04:53:29', 'Dr. Muhammad Arshad Ch'),
(324, 10698, 'ENT Bleed +ve', '', '', '2018-06-09 04:53:36', 'Dr. Muhammad Arshad Ch'),
(325, 10698, 'GCS 9/15', '', '', '2018-06-09 04:53:44', 'Dr. Muhammad Arshad Ch'),
(326, 10698, 'GIT. Natude', '', '', '2018-06-09 04:56:41', 'Dr. Muhammad Arshad Ch'),
(327, 10698, 'Resp. NVB+0', '', '', '2018-06-09 04:56:54', 'Dr. Muhammad Arshad Ch'),
(328, 10698, 'CVS. S1+S2+0', '', '', '2018-06-09 04:57:07', 'Dr. Muhammad Arshad Ch'),
(329, 10698, NULL, 'CT Brain', '', '2018-06-09 04:57:19', 'Dr. Muhammad Arshad Ch'),
(330, 10698, NULL, 'CBC', '', '2018-06-09 04:57:23', 'Dr. Muhammad Arshad Ch'),
(331, 10698, NULL, 'Cloting Profile', '', '2018-06-09 04:57:30', 'Dr. Muhammad Arshad Ch'),
(332, 10698, NULL, 'Sr. Profile', '', '2018-06-09 04:57:39', 'Dr. Muhammad Arshad Ch'),
(333, 10698, NULL, '', 'SAH', '2018-06-09 04:57:48', 'Dr. Muhammad Arshad Ch'),
(334, 10698, NULL, '', 'Brain Edema', '2018-06-09 04:57:55', 'Dr. Muhammad Arshad Ch'),
(335, 10597, 'Follow up case SDH', '', '', '2018-06-09 04:58:52', 'Dr. Muhammad Arshad Ch'),
(336, 10597, 'Aspirated on 08/5/18', '', '', '2018-06-09 04:59:12', 'Dr. Muhammad Arshad Ch'),
(337, 10597, 'through B/H Craneotoney', '', '', '2018-06-09 04:59:36', 'Dr. Muhammad Arshad Ch'),
(338, 10700, 'Fight - 10 Hours (Head Trauma)', '', '', '2018-06-09 05:02:54', 'Dr. Muhammad Arshad Ch'),
(339, 10700, 'Vomiting +ve', '', '', '2018-06-09 05:03:02', 'Dr. Muhammad Arshad Ch'),
(340, 10700, 'ENT Bleed -ve', '', '', '2018-06-09 05:03:12', 'Dr. Muhammad Arshad Ch'),
(341, 10700, 'Fits +ve', '', '', '2018-06-09 05:03:19', 'Dr. Muhammad Arshad Ch'),
(342, 10700, 'L. Panda Eye', '', '', '2018-06-09 05:03:30', 'Dr. Muhammad Arshad Ch'),
(343, 10700, 'GCS. 15/15', '', '', '2018-06-09 05:03:41', 'Dr. Muhammad Arshad Ch'),
(344, 10700, 'CVS. S1+S2+0', '', '', '2018-06-09 05:03:50', 'Dr. Muhammad Arshad Ch'),
(345, 10700, 'Resp. NVB+0', '', '', '2018-06-09 05:04:00', 'Dr. Muhammad Arshad Ch'),
(346, 10700, 'GIT. Soft Nontender, NAD', '', '', '2018-06-09 05:04:31', 'Dr. Muhammad Arshad Ch'),
(347, 10700, NULL, 'CT Scan', '', '2018-06-09 05:04:38', 'Dr. Muhammad Arshad Ch'),
(348, 10700, NULL, 'CBC', '', '2018-06-09 05:04:39', 'Dr. Muhammad Arshad Ch'),
(349, 10700, NULL, 'LFT, RFT, S/E', '', '2018-06-09 05:04:56', 'Dr. Muhammad Arshad Ch'),
(350, 10700, NULL, 'PT, APTT, INR', '', '2018-06-09 05:05:01', 'Dr. Muhammad Arshad Ch'),
(351, 10700, NULL, '', 'SAH', '2018-06-09 05:05:11', 'Dr. Muhammad Arshad Ch'),
(352, 10700, NULL, '', 'Brain Edena', '2018-06-09 05:05:20', 'Dr. Muhammad Arshad Ch'),
(353, 10713, 'RTA 01 Day', '', '', '2018-06-09 05:07:48', 'Dr. Muhammad Arshad Ch'),
(354, 10713, 'LOC +ve', '', '', '2018-06-09 05:07:52', 'Dr. Muhammad Arshad Ch'),
(355, 10713, 'Vomiting +ve', '', '', '2018-06-09 05:08:01', 'Dr. Muhammad Arshad Ch'),
(356, 10713, 'Nose Bleed +ve', '', '', '2018-06-09 05:08:06', 'Dr. Muhammad Arshad Ch'),
(357, 10713, 'GCS. 13/15', '', '', '2018-06-09 05:08:18', 'Dr. Muhammad Arshad Ch'),
(358, 10713, NULL, 'CBC', '', '2018-06-09 05:08:22', 'Dr. Muhammad Arshad Ch'),
(359, 10713, NULL, 'PT, APTT, INR', '', '2018-06-09 05:08:26', 'Dr. Muhammad Arshad Ch'),
(360, 10713, NULL, 'Sr. Profile', '', '2018-06-09 05:08:32', 'Dr. Muhammad Arshad Ch'),
(361, 10713, NULL, 'CT Brain', '', '2018-06-09 05:08:41', 'Dr. Muhammad Arshad Ch'),
(362, 10713, NULL, '', 'SAH', '2018-06-09 05:08:46', 'Dr. Muhammad Arshad Ch'),
(363, 10713, NULL, '', 'Skull Fracture', '2018-06-09 05:08:52', 'Dr. Muhammad Arshad Ch'),
(364, 10713, NULL, '', 'Brain Edema', '2018-06-09 05:08:58', 'Dr. Muhammad Arshad Ch'),
(365, 10321, 'Headache', '', '', '2018-06-09 05:10:07', 'Dr. Muhammad Arshad Ch'),
(366, 10714, 'RTA - 01 Month', '', '', '2018-06-09 05:14:50', 'Dr. Muhammad Arshad Ch'),
(367, 10714, 'Headache +ve', '', '', '2018-06-09 05:15:31', 'Dr. Muhammad Arshad Ch'),
(368, 10714, 'Vomiting +ve', '', '', '2018-06-09 05:15:36', 'Dr. Muhammad Arshad Ch'),
(369, 10714, NULL, 'CBC', '', '2018-06-09 05:15:42', 'Dr. Muhammad Arshad Ch'),
(370, 10714, NULL, 'Sr. Profile', '', '2018-06-09 05:15:45', 'Dr. Muhammad Arshad Ch'),
(371, 10714, NULL, 'Cloting Profile', '', '2018-06-09 05:15:52', 'Dr. Muhammad Arshad Ch'),
(372, 10714, NULL, 'CT Brain', '', '2018-06-09 05:15:56', 'Dr. Muhammad Arshad Ch'),
(373, 10714, NULL, '', 'SDH', '2018-06-09 05:16:02', 'Dr. Muhammad Arshad Ch'),
(374, 10716, 'RTA 9 Hours', '', '', '2018-06-09 05:21:39', 'Dr. Muhammad Arshad Ch'),
(375, 10716, 'LOC +ve', '', '', '2018-06-09 05:21:47', 'Dr. Muhammad Arshad Ch'),
(376, 10716, 'Vomiting +ve', '', '', '2018-06-09 05:21:55', 'Dr. Muhammad Arshad Ch'),
(377, 10716, 'ENT Bleed +ve', '', '', '2018-06-09 05:22:00', 'Dr. Muhammad Arshad Ch'),
(378, 10716, 'GCS. 15/15', '', '', '2018-06-09 05:22:10', 'Dr. Muhammad Arshad Ch'),
(379, 10716, 'Limbs moving Normally', '', '', '2018-06-09 05:22:18', 'Dr. Muhammad Arshad Ch'),
(380, 10716, NULL, 'CBC', '', '2018-06-09 05:22:22', 'Dr. Muhammad Arshad Ch'),
(381, 10716, NULL, 'Cloting Profile', '', '2018-06-09 05:22:27', 'Dr. Muhammad Arshad Ch'),
(382, 10716, NULL, 'CT Brain', '', '2018-06-09 05:22:32', 'Dr. Muhammad Arshad Ch'),
(383, 10716, NULL, '', 'SAH', '2018-06-09 05:22:40', 'Dr. Muhammad Arshad Ch'),
(384, 10716, NULL, '', 'Skul Fracture', '2018-06-09 05:22:44', 'Dr. Muhammad Arshad Ch'),
(385, 10718, 'Back Pain', '', '', '2018-06-09 05:28:49', 'Dr. Muhammad Arshad Ch'),
(386, 10718, NULL, 'CT', '', '2018-06-09 05:28:57', 'Dr. Muhammad Arshad Ch'),
(387, 10718, NULL, 'MRI', '', '2018-06-09 05:29:00', 'Dr. Muhammad Arshad Ch'),
(388, 10718, NULL, 'Base Line Investigation', '', '2018-06-09 05:29:07', 'Dr. Muhammad Arshad Ch'),
(389, 10719, 'RTA, Head Trauma, CHest Trauma', '', '', '2018-06-09 05:32:40', 'Dr. Muhammad Arshad Ch'),
(390, 10719, 'LOC +ve', '', '', '2018-06-09 05:32:43', 'Dr. Muhammad Arshad Ch'),
(391, 10719, 'Vomiting +ve', '', '', '2018-06-09 05:32:49', 'Dr. Muhammad Arshad Ch'),
(392, 10719, 'Fits +ve', '', '', '2018-06-09 05:32:55', 'Dr. Muhammad Arshad Ch'),
(393, 10719, 'Nosal Bleed +ve', '', '', '2018-06-09 05:33:07', 'Dr. Muhammad Arshad Ch'),
(394, 10719, 'Mouth Bleed +ve', '', '', '2018-06-09 05:33:14', 'Dr. Muhammad Arshad Ch'),
(395, 10719, NULL, 'CBC', '', '2018-06-09 05:33:33', 'Dr. Muhammad Arshad Ch'),
(396, 10719, NULL, 'CT Scan Brain', '', '2018-06-09 05:33:40', 'Dr. Muhammad Arshad Ch'),
(397, 10719, NULL, 'X-Ray Chest', '', '2018-06-09 05:33:51', 'Dr. Muhammad Arshad Ch'),
(398, 10719, NULL, 'Base Line Investigation', '', '2018-06-09 05:33:59', 'Dr. Muhammad Arshad Ch'),
(399, 10719, NULL, '', 'SAh', '2018-06-09 05:34:02', 'Dr. Muhammad Arshad Ch'),
(400, 10719, NULL, '', 'SDH', '2018-06-09 05:34:04', 'Dr. Muhammad Arshad Ch'),
(401, 10719, NULL, '', 'Brain Coutusions', '2018-06-09 05:34:25', 'Dr. Muhammad Arshad Ch'),
(402, 10720, 'Trauma', '', '', '2018-06-09 05:37:10', 'Dr. Muhammad Arshad Ch'),
(403, 10720, 'Vomiting +ve', '', '', '2018-06-09 05:37:14', 'Dr. Muhammad Arshad Ch'),
(404, 10720, 'LOC -ve', '', '', '2018-06-09 05:37:20', 'Dr. Muhammad Arshad Ch'),
(405, 10720, 'ENT -ve', '', '', '2018-06-09 05:37:28', 'Dr. Muhammad Arshad Ch'),
(406, 10720, 'GCS 15/15', '', '', '2018-06-09 05:37:34', 'Dr. Muhammad Arshad Ch'),
(407, 10720, NULL, 'CBC', '', '2018-06-09 05:37:38', 'Dr. Muhammad Arshad Ch'),
(408, 10720, NULL, 'PT. APTT, INR', '', '2018-06-09 05:37:45', 'Dr. Muhammad Arshad Ch'),
(409, 10720, NULL, 'Sr. Profile', '', '2018-06-09 05:37:54', 'Dr. Muhammad Arshad Ch'),
(410, 10720, NULL, 'CT Brain', '', '2018-06-09 05:37:59', 'Dr. Muhammad Arshad Ch'),
(411, 10720, NULL, '', 'Depressed Skull Fracture', '2018-06-09 05:38:09', 'Dr. Muhammad Arshad Ch'),
(412, 10721, 'RTA 6hours', '', '', '2018-06-09 05:41:43', 'Dr. Muhammad Arshad Ch'),
(413, 10721, 'LOC +ve', '', '', '2018-06-09 05:41:47', 'Dr. Muhammad Arshad Ch'),
(414, 10721, 'ENT Bleed +ve', '', '', '2018-06-09 05:41:56', 'Dr. Muhammad Arshad Ch'),
(415, 10721, 'GCS 10/15', '', '', '2018-06-09 05:42:01', 'Dr. Muhammad Arshad Ch'),
(416, 10721, NULL, 'CBC', '', '2018-06-09 05:42:05', 'Dr. Muhammad Arshad Ch'),
(417, 10721, NULL, 'CT Brain', '', '2018-06-09 05:42:10', 'Dr. Muhammad Arshad Ch'),
(418, 10721, NULL, 'Sr. Profile', '', '2018-06-09 05:42:18', 'Dr. Muhammad Arshad Ch'),
(419, 10721, NULL, '', 'Brain Oedema', '2018-06-09 05:42:34', 'Dr. Muhammad Arshad Ch'),
(420, 10721, NULL, '', 'Skull Fracture', '2018-06-09 05:42:47', 'Dr. Muhammad Arshad Ch'),
(421, 10722, 'Headache 05 Days', '', '', '2018-06-09 05:45:54', 'Dr. Muhammad Arshad Ch'),
(422, 10722, 'No H/O Trauma', '', '', '2018-06-09 05:46:28', 'Dr. Muhammad Arshad Ch'),
(423, 10722, 'No H/O HTN', '', '', '2018-06-09 05:46:34', 'Dr. Muhammad Arshad Ch'),
(424, 10722, 'No H/O DM', '', '', '2018-06-09 05:46:41', 'Dr. Muhammad Arshad Ch'),
(425, 10722, NULL, 'MRI Brain', '', '2018-06-09 05:47:10', 'Dr. Muhammad Arshad Ch'),
(426, 10722, NULL, 'Sr. Profile', '', '2018-06-09 05:48:05', 'Dr. Muhammad Arshad Ch'),
(427, 10722, NULL, 'CBC', '', '2018-06-09 05:48:09', 'Dr. Muhammad Arshad Ch'),
(428, 10722, NULL, 'PT, APTT, INR', '', '2018-06-09 05:48:17', 'Dr. Muhammad Arshad Ch'),
(429, 10724, 'LBP 8 Years', '', '', '2018-06-09 05:56:11', 'Dr. Muhammad Arshad Ch'),
(430, 10724, 'L. Leg - 03 Months', '', '', '2018-06-09 05:56:31', 'Dr. Muhammad Arshad Ch'),
(431, 10724, NULL, 'X-Ray L/S', '', '2018-06-09 05:57:07', 'Dr. Muhammad Arshad Ch'),
(432, 10724, NULL, 'MRI Spine L/S', '', '2018-06-09 05:57:25', 'Dr. Muhammad Arshad Ch'),
(433, 10623, 'RTA 4 Hours', '', '', '2018-06-11 04:37:59', 'Dr. Muhammad Arshad Ch'),
(434, 10623, 'Vomitiing +ve', '', '', '2018-06-11 04:38:10', 'Dr. Muhammad Arshad Ch'),
(435, 10623, 'ENT Bleed +ve', '', '', '2018-06-11 04:38:13', 'Dr. Muhammad Arshad Ch'),
(436, 10623, 'Fits -ve', '', '', '2018-06-11 04:38:16', 'Dr. Muhammad Arshad Ch'),
(437, 10623, 'O/E', '', '', '2018-06-11 04:38:25', 'Dr. Muhammad Arshad Ch'),
(438, 10623, 'Panda EYE L.', '', '', '2018-06-11 04:38:33', 'Dr. Muhammad Arshad Ch'),
(439, 10623, '', '', '', '2018-06-11 04:38:33', 'Dr. Muhammad Arshad Ch'),
(440, 10623, 'GCS 15/15', '', '', '2018-06-11 04:38:40', 'Dr. Muhammad Arshad Ch'),
(441, 10623, 'Resp. NVB+0', '', '', '2018-06-11 04:38:49', 'Dr. Muhammad Arshad Ch'),
(442, 10623, 'CVS. S1+S2+0', '', '', '2018-06-11 04:39:12', 'Dr. Muhammad Arshad Ch'),
(443, 10623, NULL, 'CT Brain', '', '2018-06-11 04:39:18', 'Dr. Muhammad Arshad Ch'),
(444, 10623, NULL, 'CBC', '', '2018-06-11 04:39:23', 'Dr. Muhammad Arshad Ch'),
(445, 10623, NULL, 'LFT, RFT, S/E', '', '2018-06-11 04:39:32', 'Dr. Muhammad Arshad Ch'),
(446, 10623, NULL, 'PT, APTT, INR', '', '2018-06-11 04:39:43', 'Dr. Muhammad Arshad Ch'),
(447, 10652, 'Fall in Lake', '', '', '2018-06-11 04:40:33', 'Dr. Muhammad Arshad Ch'),
(448, 10652, 'LOC +ve', '', '', '2018-06-11 04:40:38', 'Dr. Muhammad Arshad Ch'),
(449, 10652, 'Weeken of both limbs 2 days', '', '', '2018-06-11 04:41:04', 'Dr. Muhammad Arshad Ch'),
(450, 10652, 'O/E, GCS', '', '', '2018-06-11 04:41:17', 'Dr. Muhammad Arshad Ch'),
(451, 10652, 'GIT. Soft Nontender', '', '', '2018-06-11 04:41:34', 'Dr. Muhammad Arshad Ch'),
(452, 10652, 'CVS. S1+S2+0', '', '', '2018-06-11 04:41:43', 'Dr. Muhammad Arshad Ch'),
(453, 10652, 'Resp. NVB+0', '', '', '2018-06-11 04:41:50', 'Dr. Muhammad Arshad Ch'),
(454, 10652, NULL, 'Base Line Investigation', '', '2018-06-11 04:42:04', 'Dr. Muhammad Arshad Ch'),
(455, 10549, 'RTA 4 Hours', '', '', '2018-06-11 04:43:22', 'Dr. Muhammad Arshad Ch'),
(456, 10549, 'LOC +ve', '', '', '2018-06-11 04:43:29', 'Dr. Muhammad Arshad Ch'),
(457, 10549, 'ENT +ve', '', '', '2018-06-11 04:43:32', 'Dr. Muhammad Arshad Ch'),
(458, 10549, 'GCS 4/15', '', '', '2018-06-11 04:43:40', 'Dr. Muhammad Arshad Ch'),
(459, 10549, 'GIT. SOft Nontender', '', '', '2018-06-11 04:43:52', 'Dr. Muhammad Arshad Ch'),
(460, 10549, 'CVS. S1+S2+0', '', '', '2018-06-11 04:44:12', 'Dr. Muhammad Arshad Ch'),
(461, 10549, 'Resp. NVB', '', '', '2018-06-11 04:44:21', 'Dr. Muhammad Arshad Ch'),
(462, 10549, NULL, 'CT Scan', '', '2018-06-11 04:44:28', 'Dr. Muhammad Arshad Ch'),
(463, 10549, NULL, 'CBC', '', '2018-06-11 04:44:31', 'Dr. Muhammad Arshad Ch'),
(464, 10549, NULL, 'PT, APTT, INR', '', '2018-06-11 04:44:37', 'Dr. Muhammad Arshad Ch'),
(465, 10549, NULL, 'Sr. Profile', '', '2018-06-11 04:44:47', 'Dr. Muhammad Arshad Ch'),
(466, 10549, NULL, 'S/E, V/M, BSR', '', '2018-06-11 04:45:02', 'Dr. Muhammad Arshad Ch'),
(467, 10549, NULL, 'RFT, LFT', '', '2018-06-11 04:45:09', 'Dr. Muhammad Arshad Ch'),
(468, 10620, 'RTA', '', '', '2018-06-11 04:46:59', 'Dr. Muhammad Arshad Ch'),
(469, 10620, 'LOC +ve', '', '', '2018-06-11 04:47:04', 'Dr. Muhammad Arshad Ch'),
(470, 10620, 'Bleeding from Both Ear', '', '', '2018-06-11 04:47:16', 'Dr. Muhammad Arshad Ch'),
(471, 10620, 'GCS. 11/15', '', '', '2018-06-11 04:47:39', 'Dr. Muhammad Arshad Ch'),
(472, 10764, 'RTA 6 Hours', '', '', '2018-06-11 04:53:37', 'Dr. Muhammad Arshad Ch'),
(473, 10764, 'LOC -ve', '', '', '2018-06-11 04:53:43', 'Dr. Muhammad Arshad Ch'),
(474, 10764, 'Nose, Throat Bleed +ve', '', '', '2018-06-11 04:53:59', 'Dr. Muhammad Arshad Ch'),
(475, 10764, 'Vomiting +ve', '', '', '2018-06-11 04:54:06', 'Dr. Muhammad Arshad Ch'),
(476, 10764, 'GCS 15/15', '', '', '2018-06-11 04:54:11', 'Dr. Muhammad Arshad Ch'),
(477, 10764, 'Limbs Moving Normal', '', '', '2018-06-11 04:54:32', 'Dr. Muhammad Arshad Ch'),
(478, 10764, 'R. Panda Eye +ve', '', '', '2018-06-11 04:54:45', 'Dr. Muhammad Arshad Ch'),
(479, 10764, NULL, 'CBC', '', '2018-06-11 04:54:50', 'Dr. Muhammad Arshad Ch'),
(480, 10764, NULL, 'Sr. Profile', '', '2018-06-11 04:54:56', 'Dr. Muhammad Arshad Ch'),
(481, 10764, NULL, 'PT, APTT, INR', '', '2018-06-11 04:55:05', 'Dr. Muhammad Arshad Ch'),
(482, 10764, NULL, 'CT Brain', '', '2018-06-11 04:55:08', 'Dr. Muhammad Arshad Ch'),
(483, 10764, NULL, '', 'EDH', '2018-06-11 04:55:16', 'Dr. Muhammad Arshad Ch'),
(484, 10784, 'Fall From Bed', '', '', '2018-06-11 05:12:56', 'Dr. Muhammad Arshad Ch'),
(485, 10784, 'LOC +ve', '', '', '2018-06-11 05:13:01', 'Dr. Muhammad Arshad Ch'),
(486, 10784, 'ENT Bleed +ve', '', '', '2018-06-11 05:13:21', 'Dr. Muhammad Arshad Ch'),
(487, 10784, 'GCS 15/15', '', '', '2018-06-11 05:13:27', 'Dr. Muhammad Arshad Ch'),
(488, 10784, NULL, '', 'Br. Oedema', '2018-06-11 05:13:38', 'Dr. Muhammad Arshad Ch'),
(489, 10675, 'RTA', '', '', '2018-06-11 06:23:43', 'Dr. Muhammad Arshad Ch'),
(490, 10675, 'LOC +ve', '', '', '2018-06-11 06:23:46', 'Dr. Muhammad Arshad Ch'),
(491, 10675, 'Vomiting +ve', '', '', '2018-06-11 06:23:54', 'Dr. Muhammad Arshad Ch'),
(492, 10675, 'END Bleed +ve', '', '', '2018-06-11 06:24:01', 'Dr. Muhammad Arshad Ch'),
(493, 10675, 'GCS 15/15', '', '', '2018-06-11 06:24:08', 'Dr. Muhammad Arshad Ch'),
(494, 10675, NULL, '', 'Compound Skull Fracture', '2018-06-11 06:24:39', 'Dr. Muhammad Arshad Ch'),
(495, 10767, 'Fall From Height', '', '', '2018-06-11 06:25:47', 'Dr. Muhammad Arshad Ch'),
(496, 10767, 'Inability 8 Hours', '', '', '2018-06-11 06:26:01', 'Dr. Muhammad Arshad Ch'),
(497, 10767, 'Back Pain 8 Hours', '', '', '2018-06-11 06:26:06', 'Dr. Muhammad Arshad Ch'),
(498, 10767, 'GCS. 15/15', '', '', '2018-06-11 06:26:15', 'Dr. Muhammad Arshad Ch'),
(499, 10767, NULL, 'Base Line Investigation', '', '2018-06-11 06:26:22', 'Dr. Muhammad Arshad Ch'),
(500, 10767, NULL, 'X-Ray', '', '2018-06-11 06:26:29', 'Dr. Muhammad Arshad Ch'),
(501, 10702, 'H/O Fight 07 Days ago', '', '', '2018-06-11 06:27:48', 'Dr. Muhammad Arshad Ch'),
(502, 10702, 'LOC +ve', '', '', '2018-06-11 06:27:52', 'Dr. Muhammad Arshad Ch'),
(503, 10702, 'Vomiting +ve', '', '', '2018-06-11 06:27:59', 'Dr. Muhammad Arshad Ch'),
(504, 10702, 'GCS. 15/15', '', '', '2018-06-11 06:28:05', 'Dr. Muhammad Arshad Ch'),
(505, 10702, 'CT Scan', '', '', '2018-06-11 06:28:10', 'Dr. Muhammad Arshad Ch'),
(506, 10702, 'Base Line Investgation', '', '', '2018-06-11 06:28:20', 'Dr. Muhammad Arshad Ch'),
(507, 10702, NULL, 'CT Scan', '', '2018-06-11 06:28:29', 'Dr. Muhammad Arshad Ch'),
(508, 10702, NULL, '', '', '2018-06-11 06:28:35', 'Dr. Muhammad Arshad Ch'),
(509, 10702, NULL, 'Base Line Investgation', '', '2018-06-11 06:28:38', 'Dr. Muhammad Arshad Ch'),
(510, 10702, NULL, '', 'Maintain I/V Line', '2018-06-11 06:28:54', 'Dr. Muhammad Arshad Ch'),
(511, 10702, NULL, '', 'Fluids', '2018-06-11 06:29:01', 'Dr. Muhammad Arshad Ch'),
(512, 10702, NULL, '', 'Anti Biotics', '2018-06-11 06:29:07', 'Dr. Muhammad Arshad Ch'),
(513, 10809, 'head pain also diagnosed ', '', '', '2018-06-30 19:18:07', 'Dr. Muhammad Arshad Ch'),
(514, 10809, NULL, 'vascular', '', '2018-06-30 19:18:09', 'Dr. Muhammad Arshad Ch'),
(515, 10809, NULL, '', 'antibiotics ', '2018-06-30 19:18:10', 'Dr. Muhammad Arshad Ch'),
(516, 10069, 'in this option user ', '', '', '2018-07-02 19:57:46', 'Dr. Muhammad Arshad Ch'),
(517, 10069, NULL, 'fddfdfdfd', '', '2018-07-02 19:57:48', 'Dr. Muhammad Arshad Ch'),
(518, 10069, NULL, '', 'fdfdfdfd', '2018-07-02 19:57:50', 'Dr. Muhammad Arshad Ch'),
(519, 10608, 'head injuries', '', '', '2018-07-02 22:13:48', 'Dr. Muhammad Arshad Ch'),
(520, 10608, NULL, '', 'antibiotics', '2018-07-02 22:14:09', 'Dr. Muhammad Arshad Ch'),
(521, 10608, NULL, 'cbc', '', '2018-07-02 22:22:58', 'Dr. Muhammad Arshad Ch'),
(522, 10061, 'test', '', '', '2018-11-02 08:40:53', 'Dr. Muhammad Arshad Ch');

-- --------------------------------------------------------

--
-- Table structure for table `consent_operationtbl`
--

CREATE TABLE `consent_operationtbl` (
  `consentOpNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `dateString` varchar(255) NOT NULL,
  `isSave` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consent_operationtbl`
--

INSERT INTO `consent_operationtbl` (`consentOpNo`, `regNo`, `otBookingNo`, `dateString`, `isSave`) VALUES
(1, 10048, 1, '30-6-2018 2:29 PM', '1'),
(2, 10094, 2, '', ''),
(3, 10094, 3, '', ''),
(4, 10050, 4, '', ''),
(5, 10048, 5, '', ''),
(6, 10058, 7, '', ''),
(7, 10051, 8, '6-7-2018 10:51 AM', '1'),
(8, 10066, 9, '', ''),
(9, 10060, 14, '', ''),
(10, 10080, 6, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `daily_reporttbl`
--

CREATE TABLE `daily_reporttbl` (
  `drp_id` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `drp_date` date NOT NULL,
  `drp_time` time NOT NULL,
  `drp_doa` varchar(255) NOT NULL,
  `drp_co` varchar(255) NOT NULL,
  `drp_ac` varchar(255) NOT NULL,
  `drp_pulse` varchar(255) NOT NULL,
  `drp_bp` varchar(255) NOT NULL,
  `drp_rr` varchar(255) NOT NULL,
  `drp_temp` varchar(255) NOT NULL,
  `drp_wound` varchar(255) NOT NULL,
  `drp_dressing` varchar(255) NOT NULL,
  `drp_git` varchar(255) NOT NULL,
  `drp_cvs` varchar(255) NOT NULL,
  `drp_resp` varchar(255) NOT NULL,
  `drp_cns` varchar(255) NOT NULL,
  `drp_intake` varchar(255) NOT NULL,
  `drp_output` varchar(255) NOT NULL,
  `drp_pt_seen` varchar(255) NOT NULL,
  `drp_pgr` varchar(255) NOT NULL,
  `drp_plan` varchar(255) NOT NULL,
  `drp_consultant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_reporttbl`
--

INSERT INTO `daily_reporttbl` (`drp_id`, `regNo`, `drp_date`, `drp_time`, `drp_doa`, `drp_co`, `drp_ac`, `drp_pulse`, `drp_bp`, `drp_rr`, `drp_temp`, `drp_wound`, `drp_dressing`, `drp_git`, `drp_cvs`, `drp_resp`, `drp_cns`, `drp_intake`, `drp_output`, `drp_pt_seen`, `drp_pgr`, `drp_plan`, `drp_consultant`) VALUES
(1, 10058, '2018-07-18', '02:30:00', 'asdf', 'adf', 'sdf', 'sasfd', 'dfsgsd', 'sdfsadf', 'sdfsd', 'fdg', 'fsdfsdf', 'sdfsdf', 'sdf', 'sadfgd', 'gerter', 'asdfse', 'sdf', 'sdgrdfg', 'erter', 'fgbdfgb', 'erwaer'),
(2, 10058, '2018-07-12', '09:30:00', 'sdf', 'sdfsdf', 'sdfa', 'sdfgdfg', 'sdfsd', 'sadgfsd', 'werwer', 'dfgdgf', 'fsdfsfd', 'sdfsdf', 'asdfsdf', 'werwer', 'sdfsdf', 'sdfsdf', 'werwer', 'sdfsdgf', 'werwer', 'sdfsdf', 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `dischargetbl`
--

CREATE TABLE `dischargetbl` (
  `discharge_id` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `emergency_no` varchar(255) NOT NULL,
  `admi_no` varchar(255) NOT NULL,
  `patName` varchar(255) NOT NULL,
  `patNoKType` varchar(255) NOT NULL,
  `patNoK` varchar(255) NOT NULL,
  `patDoB` date NOT NULL,
  `patAge` int(11) NOT NULL,
  `patMonthAge` int(11) NOT NULL,
  `patDaysAge` int(11) NOT NULL,
  `patBldGrp` varchar(255) NOT NULL,
  `patDisease_id` int(11) NOT NULL,
  `patSex` varchar(255) NOT NULL,
  `patCNIC` varchar(255) NOT NULL,
  `patAddress` varchar(255) NOT NULL,
  `patOccupation` varchar(255) NOT NULL,
  `patPhone` int(11) NOT NULL,
  `patEntitled` varchar(255) NOT NULL,
  `garName` varchar(255) NOT NULL,
  `garCnic` varchar(255) NOT NULL,
  `garContact` varchar(255) NOT NULL,
  `garRelation` varchar(255) NOT NULL,
  `patunit_Id` varchar(255) NOT NULL,
  `patShiftedFrom` varchar(255) NOT NULL,
  `patward_id` int(11) NOT NULL,
  `patbed_id` int(11) NOT NULL,
  `patAdmDate` varchar(255) NOT NULL,
  `patChart_id` int(11) NOT NULL,
  `patStatus` varchar(255) NOT NULL,
  `discharge_timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `discharge_advice` text,
  `FreeCarePatient` tinyint(1) NOT NULL DEFAULT '0',
  `previousRegno` varchar(255) NOT NULL,
  `patient_pic_path` varchar(255) NOT NULL,
  `discharge_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dischargetbl`
--

INSERT INTO `dischargetbl` (`discharge_id`, `regNo`, `emergency_no`, `admi_no`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patMonthAge`, `patDaysAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patOccupation`, `patPhone`, `patEntitled`, `garName`, `garCnic`, `garContact`, `garRelation`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patAdmDate`, `patChart_id`, `patStatus`, `discharge_timestamp`, `discharge_advice`, `FreeCarePatient`, `previousRegno`, `patient_pic_path`, `discharge_date`) VALUES
(11, 10589, '', '', 'M Rafique', 'S/O', 'Abdul Hameed', '0000-00-00', 50, 0, 0, '', 1, 'Male', '31205-4898979-1', 'Chack no. 102/db, Yazman', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 404, '24-5-2018 10:00 PM', 22, 'Discharged', '2018-06-02 10:00:36', 'Advised by Prof. Dr. Muhammad Arshad CH.', 0, '', 'person.jpg', '2018-06-02'),
(12, 10589, '', '', 'M Rafique', 'S/O', 'Abdul Hameed', '0000-00-00', 50, 0, 0, '', 1, 'Male', '31205-4898979-1', 'Chack no. 102/db, Yazman', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 404, '24-5-2018 10:00 PM', 22, 'Discharged', '2018-06-02 10:05:51', 'Advised by Prof. Dr. Muhammad Arshad CH.', 0, '', 'person.jpg', '2018-06-02'),
(13, 10592, '', '', 'M Rashid', 'S/O', 'Ghulam Yaseen', '0000-00-00', 20, 0, 0, '', 1, 'Male', '31201-5709170-1', 'Ram Kali, Basti Kumhar Wali, Chani Goth, Ahmad pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 404, '2-6-2018 10:21 AM', 22, 'Discharged', '2018-06-02 10:26:05', 'N/A', 0, '', 'person.jpg', '2018-06-02'),
(14, 10593, '', '', 'Sultan Mehmood', 'S/O', 'Muhammad Shafiq', '0000-00-00', 20, 0, 0, '', 1, 'Male', '31102-0598977-9', 'Chack No 98, Chishtian', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 404, '26-5-2018 08:30 AM', 22, 'Discharged', '2018-06-02 10:31:03', 'N/A', 0, '', 'person.jpg', '2018-06-02'),
(15, 10604, '', '', 'Mehwish', 'D/O', 'Zahid', '0000-00-00', 6, 0, 0, '', 1, 'Female', '31000-0000000-0', 'Chandni Chowk Kahror Pakka', 'N/A', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 412, '31-5-2018 01:00 PM', 22, 'Discharged', '2018-06-04 10:09:59', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(16, 10595, '', '', 'Zulfiqar', 'S/O', 'Raheem Bukhsh', '0000-00-00', 50, 0, 0, '', 1, 'Male', '31201-9057126-1', 'Khurram Pur, UCh Sharif', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 404, '2-6-2018 11:02 AM', 22, 'Discharged', '2018-06-04 10:12:26', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(17, 10466, '', '', 'usama ', 'S/O', 'Ibrahim', '0000-00-00', 5, 0, 0, 'B+VE', 16, 'Male', '31202-4343149', 'district bahawal pur', 'nill', 2147483647, 'No', '', '', '', '', 'Emergency', 'COD', 3, 584, '2-5-2018 06:32 PM', 22, 'Discharged', '2018-06-04 10:16:03', 'Discharged', 1, '', 'person.jpg', '2018-06-04'),
(18, 10605, '', '', 'Shazia', 'W/O', 'Abdul GHani', '0000-00-00', 18, 0, 0, '', 1, 'Female', '36203-2036797-5', 'CHamb Kulyar, Lodhran', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 699, '31-5-2018 12:30 PM', 22, 'Discharged', '2018-06-04 10:27:30', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(19, 10607, '', '', 'Shamim Bibi', 'W/O', 'Muhammad Javed', '0000-00-00', 30, 0, 0, '', 1, 'Female', '36401-8341901-1', 'Mandi Sadiq, Bahawalnagar', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 699, '4-6-2018 10:27 AM', 22, 'Discharged', '2018-06-04 10:30:21', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(20, 10608, '', '', 'Naheed Akhtar', 'W/O', 'Sarfaraz', '0000-00-00', 35, 0, 0, '', 18, 'Female', '31000-0000000-0', 'Chack No. 567/EB, Vehari', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 699, '4-6-2018 10:30 AM', 22, 'Discharged', '2018-06-04 10:42:33', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(21, 10611, '', '', 'Shamim Bibi', 'W/O', 'Rab Nawaz', '0000-00-00', 45, 0, 0, '', 46, 'Female', '36102-9485435-7', 'Chungi No 05 Basti Seyyedan, Kabeer Wala, Khanewal', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 699, '4-6-2018 10:40 AM', 22, 'Discharged', '2018-06-04 10:46:30', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(22, 10432, '', '', 'rashid', 'S/O', 'nazar', '0000-00-00', 16, 0, 0, '', 1, 'Male', '31201-9928434-5', 'moza faiz pur ahmed pur', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'COD', 1, 352, '27-4-2018 09:06 AM', 22, 'Discharged', '2018-06-04 10:46:51', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(23, 10591, '', '', 'Abdul Sattar', 'S/O', 'Wali Muhammad', '0000-00-00', 40, 0, 0, '', 1, 'Male', '31203-2992671-9', 'Chack Islam Nagar, Chishtian', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 404, '2-6-2018 10:02 AM', 22, 'Discharged', '2018-06-04 10:47:23', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(24, 10544, '', '', 'munir ahmed', 'S/O', 'nabi baksh', '0000-00-00', 50, 0, 0, 'A+VE', 1, 'Male', '32402-7892507-5', 'gulshan colony rajun pur', 'Nil', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 392, '21-5-2018 10:49 AM', 22, 'Discharged', '2018-06-04 10:48:00', 'Discharged', 0, 'RID - 10544', 'person.jpg', '2018-06-04'),
(25, 10612, '', '', 'munir ahmed', 'S/O', 'nabi baksh', '0000-00-00', 50, 0, 0, 'A+VE', 1, 'Male', '32402-7892507-5', 'gulshan colony rajun pur', 'Nil', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 352, '4-6-2018 10:49 AM', 22, 'Discharged', '2018-06-04 10:49:59', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(26, 10613, '', '', 'Muhammad Younas', 'S/O', 'Muhammad Zahoor', '0000-00-00', 20, 0, 0, '', 2, 'Male', '36202-6494548-1', 'Kahror Pakka, Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '11-5-2018 11:00 AM', 22, 'Discharged', '2018-06-04 10:52:38', 'Discharged', 0, '', 'person.jpg', '2018-06-04'),
(27, 10633, '', '', 'Zeshan', 'S/O', 'Mazhar Abbas', '0000-00-00', 25, 0, 0, '', 2, 'Male', '32402-2592801-1', 'Mohalla Lal Parwana, Jampur, D.G Khan', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 414, '21-5-2018 12:31 PM', 22, 'Discharged', '2018-06-05 10:40:27', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(28, 10635, '', '', 'Perveen', 'W/O', 'Islam', '0000-00-00', 50, 0, 0, '', 43, 'Female', '36201-5005483-4', 'Chack No. 281/WB, Dunya pur', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 709, '19-5-2018 11:30 AM', 22, 'Discharged', '2018-06-05 11:05:50', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(29, 10569, '', '', 'm khan', 'S/O', 'walli khan', '0000-00-00', 8, 0, 0, '', 22, 'Male', '56401-7946343-1', 'p/o waah tehsil and dist moskhail', 'Nil', 333626111, 'No', '', '', '', '', 'OPD', 'OPD', 6, 839, '26-5-2018 10:43 AM', 22, 'Discharged', '2018-06-05 11:07:33', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(30, 10575, '', '', 'sonia ', 'D/O', 'm khalil', '0000-00-00', 6, 0, 0, '', 1, 'Female', '36203-1020903-3', 'chak no 97 m lodran', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 2, 696, '28-5-2018 11:27 AM', 22, 'Discharged', '2018-06-05 11:09:08', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(31, 10636, '', '', 'Mawra', 'D/O', 'Allah Ditta', '0000-00-00', 1, 0, 0, '', 6, 'Female', '00000-0000000-0', 'Moza Kamal pur, Lodhran', 'N/A', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 696, '31-5-2018 10:36 AM', 22, 'Discharged', '2018-06-05 11:13:56', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(32, 10628, '', '', 'Alen Pervaiz', 'S/O', 'Pervaiz', '0000-00-00', 15, 0, 0, '', 1, 'Male', '31202-9410764-9', 'Islami Colony Bahawalpur', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 3, 585, '5-6-2018 07:15 AM', 22, 'Discharged', '2018-06-05 11:52:01', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(33, 10638, '', '', 'Allah Ditta', 'S/O', 'Khan Muhammad', '0000-00-00', 45, 0, 0, '', 30, 'Male', '31204-1170040-1', 'Zor Kot, Khairpur Tamewali', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 416, '30-5-2018 01:45 PM', 22, 'Discharged', '2018-06-05 11:55:55', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(34, 10639, '', '', 'Kosar Bibi', 'W/O', 'Zahid', '0000-00-00', 25, 0, 0, '', 1, 'Female', '36603-6670081-3', 'Karam pur, Vehari', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 696, '27-5-2018 03:45 PM', 22, 'Discharged', '2018-06-05 11:58:02', 'Discharged', 0, '', 'person.jpg', '2018-06-05'),
(35, 10582, '', '', 'Akram', 'S/O', 'Ramzan', '0000-00-00', 20, 0, 0, 'A+VE', 26, 'Male', '36603-5523145-7', 'Karam PUr Vehari', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 397, '30-5-2018 02:52 PM', 22, 'LAMA', '2018-06-05 12:54:22', 'LAMA', 1, '', 'person.jpg', '2018-06-05'),
(36, 10640, '', '', 'Fida Hussain', 'S/O', 'Allah Bachaya', '0000-00-00', 60, 0, 0, '', 36, 'Male', '31201-4498502-9', 'P/O Sukhail, Ahmad Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Medical 1', 1, 416, '5-6-2018 12:31 PM', 22, 'Referred', '2018-06-06 09:22:39', 'Expired', 0, '', 'person.jpg', '2018-06-06'),
(37, 10626, '', '', 'aKRAM', 'S/O', 'wAHID UX', '0000-00-00', 30, 0, 0, '', 6, 'Male', '31201-2918688-3', 'Ahmedpur east Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'COD', 1, 415, '5-6-2018 08:58 AM', 22, 'Discharged', '2018-06-06 09:26:07', 'Discharged', 0, '', 'person.jpg', '2018-06-06'),
(38, 10650, '', '', 'Arif', 'S/O', 'Allah Wasaya', '0000-00-00', 18, 0, 0, '', 1, 'Male', '31302-5227494-1', 'Khanqa Sharif, Bahawalpur', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 415, '5-5-2018 07:40 PM', 22, 'Discharged', '2018-06-06 09:38:49', 'Discharged', 0, '', 'person.jpg', '2018-06-06'),
(39, 10619, '', '', 'Adnan', 'S/O', 'Basheer', '0000-00-00', 13, 0, 0, '', 1, 'Male', '31302-3103960-7', 'Khan Bela, Liaqat Pur', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '4-6-2018 11:45 AM', 22, 'Discharged', '2018-06-06 09:41:20', 'Discharged', 0, '', 'person.jpg', '2018-06-06'),
(40, 10634, '', '', 'Ali', 'S/O', 'Fayaz', '0000-00-00', 7, 0, 0, '', 1, 'Male', '36203-3647266-7', 'Galey Wal, Lodhran', 'N/A', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 414, '5-6-2018 10:50 AM', 22, 'Discharged', '2018-06-06 09:59:31', 'Discharged', 0, '', 'person.jpg', '2018-06-06'),
(41, 10567, '', '', 'nazeera bibi', 'W/O', 'abdul malik', '0000-00-00', 65, 0, 0, '', 34, 'Female', '31202-4259263-1', 'basti maseeta deera izzat bwp', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 689, '26-5-2018 10:15 AM', 22, 'Discharged', '2018-06-06 10:32:17', 'Discharged', 0, '', 'person.jpg', '2018-06-06'),
(42, 10654, '', '', 'Muhammad Khalid', 'S/O', 'Muhammad Panah', '0000-00-00', 22, 0, 0, '', 1, 'Male', '36203-1418301-3', 'Tibi Ghalwa', 'Lodhran', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 415, '6-6-2018 11:50 AM', 22, 'Discharged', '2018-06-07 09:55:36', 'Discharged', 0, '', 'person.jpg', '2018-06-07'),
(43, 10609, '', '', 'Musa Akhtar', 'S/O', 'Muhammad Akhtar', '0000-00-00', 6, 0, 0, '', 19, 'Male', '31202-3185005-9', 'Khanqa Sharif, Bahawalpur', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 412, '4-6-2018 10:34 AM', 22, 'Discharged', '2018-06-07 10:30:07', 'Discharged', 0, '', 'person.jpg', '2018-06-07'),
(44, 10656, '', '', 'Abdullah', 'S/O', 'Akmal Shahzad', '0000-00-00', 2, 0, 0, '', 1, 'Male', '36201-3940726-3', 'Chack No. 329/WB, Dunyapur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 689, '7-6-2018 08:06 AM', 22, 'Discharged', '2018-06-07 10:31:11', 'Discharged', 0, '', 'person.jpg', '2018-06-07'),
(45, 10660, '', '', 'Sultan Ali', 'S/O', 'Nazir', '0000-00-00', 8, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Chack No. 31, Ahmad pur', 'N/A', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 426, '6-6-2018 04:50 PM', 22, 'Discharged', '2018-06-07 11:14:38', 'Discharged', 0, '', 'person.jpg', '2018-06-07'),
(46, 10657, '', '', 'Mursaleen', 'S/O', 'Ashiq', '0000-00-00', 25, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Chack No 17,Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 423, '6-6-2018 01:20 PM', 22, 'Discharged', '2018-06-07 11:16:05', 'Discharged', 0, '', 'person.jpg', '2018-06-07'),
(47, 10584, '', '', 'Ramzan', 'S/O', 'Noor Muhammad', '0000-00-00', 6, 0, 0, 'A+VE', 1, 'Male', '36603-2281404-1', 'Vehari', 'Student', 304354526, 'No', '', '', '', '', 'Emergency', 'emergency', 2, 688, '30-5-2018 05:45 PM', 22, 'Discharged', '2018-06-07 11:23:01', 'Discharged', 1, '', 'person.jpg', '2018-06-07'),
(48, 10671, '', '', 'Waheed', 'S/O', 'Allah Ditta', '0000-00-00', 23, 0, 0, '', 1, 'Male', '31101-7666959-7', 'Jail Road Muslim COlony', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 412, '6-6-2018 09:00 PM', 22, 'Discharged', '2018-06-07 11:26:46', 'Discharged', 0, '', 'person.jpg', '2018-06-07'),
(49, 10337, '', '', 'muneera bibi', 'W/O', 'abdul satar ', '0000-00-00', 45, 0, 0, '', 1, 'Female', '31204-5403447-9', 'khairpur bwp', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 618, '12-4-2018 09:30 AM', 22, 'Discharged', '2018-06-08 09:18:33', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(50, 10683, '', '', 'Samina', 'W/O', 'M Qasim', '0000-00-00', 25, 0, 0, '', 1, 'Female', '31202-2028473-7', 'Basti Allah Diwaya, Bahawalpur', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 715, '1-5-2018 01:00 PM', 22, 'Discharged', '2018-06-08 09:18:50', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(51, 10462, '', '', 'Um-e-Rabia', 'D/O', 'M.Attar', '0000-00-00', 0, 0, 0, 'A+VE', 22, 'Female', '31202-4332141-5', 'Bahawalpur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 2, 651, '1-5-2018 05:40 PM', 22, 'Discharged', '2018-06-08 09:19:08', 'Discharged', 1, '', 'person.jpg', '2018-06-08'),
(52, 10684, '', '', 'Sumayya', 'W/O', 'M Kashif', '0000-00-00', 22, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Lal Garh, Minchan Abad', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 716, '1-5-2018 08:20 PM', 22, 'Discharged', '2018-06-08 09:19:24', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(53, 10685, '', '', 'Shehnaz', 'W/O', 'Siddique', '0000-00-00', 58, 0, 0, '', 20, 'Female', '00000-0000000-0', 'Lal Zar Colony, Vehari', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'COD', 2, 618, '1-5-2018 09:00 PM', 22, 'Discharged', '2018-06-08 09:23:34', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(54, 10644, '', '', 'Rashid', 'S/O', 'Ghulam Yaseen', '0000-00-00', 20, 0, 0, '', 1, 'Male', '31201-3145900-9', 'Chani Goth, Ahmad Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 419, '6-6-2018 08:44 AM', 22, 'Discharged', '2018-06-08 09:51:57', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(55, 10694, '', '', 'Allah Bachaya', 'S/O', 'Chan', '0000-00-00', 50, 0, 0, '', 43, 'Male', '31201-2276018-5', 'Chani Goth, Ahmad Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 419, '31-5-2018 10:53 AM', 22, 'Discharged', '2018-06-08 09:59:20', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(56, 10695, '', '', 'Nasreen', 'W/O', 'Maqbool', '0000-00-00', 50, 0, 0, '', 1, 'Female', '36601-3647394-7', 'Chack No. 15, Chishtian', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 721, '1-6-2018 12:25 PM', 22, 'Discharged', '2018-06-08 10:19:43', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(57, 10646, '', '', 'Rehana', 'W/O', 'Javed Iqbal', '0000-00-00', 36, 0, 0, '', 1, 'Female', '31203-3820650-9', 'Tahir Colony, Hasilpur', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 710, '6-6-2018 04:50 AM', 22, 'Discharged', '2018-06-08 10:21:39', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(58, 10615, '', '', 'Najma b b', 'W/O', 'm ramzan', '0000-00-00', 45, 0, 0, '', 7, 'Female', '36603-1463614-7', 'ch 42 vehari', 'LABOUR', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 704, '4-6-2018 11:02 AM', 22, 'Discharged', '2018-06-08 10:23:22', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(59, 10576, '', '', 'noor muhammad', 'S/O', 'ali muhammad', '0000-00-00', 70, 0, 0, '', 35, 'Male', '31257-6945778-8', 'basti mallok dist multan', 'nill', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 6, 842, '28-5-2018 11:31 AM', 22, 'Discharged', '2018-06-08 10:24:43', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(60, 10681, '', '', 'Muneer', 'S/O', 'Nazar Hussain', '0000-00-00', 40, 0, 0, '', 1, 'Male', '31203-3641809-7', 'Qaim pur, Hasilpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '8-6-2018 08:52 AM', 22, 'Discharged', '2018-06-08 10:45:41', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(61, 10659, '', '', 'Iqbal', 'S/O', 'Ghulam Muhammad', '0000-00-00', 55, 0, 0, '', 6, 'Male', '00000-0000000-0', 'Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 425, '6-6-2018 01:40 PM', 22, 'Discharged', '2018-06-08 10:47:01', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(62, 10602, '', '', 'Allah Ditta', 'S/O', 'Raheem Bukhsh', '0000-00-00', 30, 0, 0, '', 10, 'Male', '31000-0000000-0', 'Basti Daha Wali, Hasil Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 410, '4-6-2018 09:42 AM', 22, 'Discharged', '2018-06-08 10:49:27', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(63, 10696, '', '', 'Agha Bukhari', 'S/O', 'Riaz', '0000-00-00', 45, 0, 0, '', 8, 'Male', '00000-0000000-0', 'Sadat Colony, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 410, '17-5-2018 11:30 AM', 22, 'Discharged', '2018-06-08 10:53:59', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(64, 10677, '', '', 'Balqees Bibi', 'W/O', 'Sadeer Ahmad', '0000-00-00', 55, 0, 0, '', 2, 'Female', '31203-1697852-1', 'Chack No. 12/FW, Hasilpur', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 688, '7-6-2018 06:00 PM', 22, 'Discharged', '2018-06-08 10:55:42', 'Discharged', 0, '', 'person.jpg', '2018-06-08'),
(65, 10512, '', '', 'Asim', 'S/O', 'M.Ilyas', '0000-00-00', 4, 0, 0, 'A+VE', 1, 'Male', '31204-4519349-3', 'Lal Sohanran', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 383, '8-5-2018 07:58 PM', 22, 'Discharged', '2018-06-09 09:21:10', 'Discharged', 1, '', 'person.jpg', '2018-06-09'),
(66, 10706, '', '', 'M Adnan', 'S/O', 'Saeed Ahmad', '0000-00-00', 5, 0, 0, '', 1, 'Male', '36202-8946005-7', 'ALi Pur, Muzaffar Garh', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 437, '20-5-2018 09:25 AM', 22, 'Discharged', '2018-06-09 09:29:47', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(67, 10707, '', '', 'Abdul Islam', 'S/O', 'Razzaq', '0000-00-00', 28, 0, 0, '', 1, 'Male', '36601-2917252-7', 'Chack No. 451/EB, Bury Wala', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 437, '8-5-2018 10:00 PM', 22, 'Discharged', '2018-06-09 09:34:02', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(68, 10708, '', '', 'Mushtaq', 'S/O', 'Sadiq', '0000-00-00', 28, 0, 0, '', 13, 'Male', '36203-1690425-3', 'Gogran, Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 437, '15-5-2018 11:30 PM', 22, 'Discharged', '2018-06-09 09:38:48', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(69, 10709, '', '', 'Riaz', 'S/O', 'Lal Khan', '0000-00-00', 35, 0, 0, '', 4, 'Male', '00000-0000000-0', 'Israni, Khairpur Tame Wali', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 437, '13-5-2018 12:35 PM', 22, 'Discharged', '2018-06-09 09:44:12', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(70, 10710, '', '', 'Shamshair Ali', 'S/O', 'Bashir Ahmad', '0000-00-00', 50, 0, 0, '', 4, 'Male', '36203-8355558-5', 'Basti Kalu wala, Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 437, '16-5-2018 03:42 PM', 22, 'Discharged', '2018-06-09 09:47:23', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(71, 10711, '', '', 'Amir', 'S/O', 'Asghar', '0000-00-00', 8, 0, 0, '', 1, 'Male', '31205-9422947-9', 'Chack No.50/DB, Yazman', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 437, '15-5-2018 11:50 AM', 22, 'Discharged', '2018-06-09 09:52:23', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(72, 10698, '', '', 'Hassan', 'S/O', 'Fayaz', '0000-00-00', 11, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Asghar Colony, Bahawalpur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 419, '8-6-2018 05:00 PM', 22, 'Discharged', '2018-06-09 09:58:13', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(73, 10597, '', '', 'Ghulam Rasool', 'S/O', 'Bagh Ali', '0000-00-00', 80, 0, 0, '', 7, 'Male', '31105-5385598-9', 'Basti Tabqara, Minchan Abad', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 406, '2-6-2018 11:38 AM', 22, 'Discharged', '2018-06-09 10:00:09', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(74, 10700, '', '', 'Qamar', 'S/O', 'Zafar', '0000-00-00', 24, 0, 0, '', 1, 'Male', '31202-1767539-1', 'Chack No, 102/DB, Yazman', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '8-6-2018 10:10 PM', 22, 'Discharged', '2018-06-09 10:05:41', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(75, 10713, '', '', 'Asad', 'S/O', 'Ghulam Muhammad', '0000-00-00', 15, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Bury Wala, Vehari', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 406, '13-5-2018 01:02 PM', 22, 'Discharged', '2018-06-09 10:09:13', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(76, 10321, '', '', 'surya bb', 'W/O', 'm wasim', '0000-00-00', 68, 0, 0, '', 1, 'Female', '31203-1669175-8', 'chak no 187m hasilpur dist bwp', 'nill', 2066772322, 'No', '', '', '', '', 'OPD', 'OPD', 6, 86, '9-4-2018 11:10 AM', 22, 'Discharged', '2018-06-09 10:10:54', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(77, 10474, '', '', 'raheem bakhash', 'S/O', 'allaha bakhash', '0000-00-00', 40, 0, 0, '', 1, 'Male', '41504-0410714-6', 'chak no 083 wb tehsil n dist vehari', 'Nil', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 3, 569, '3-5-2018 11:01 AM', 22, 'Discharged', '2018-06-09 10:16:14', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(78, 10715, '', '', 'M Yasir', 'S/O', 'Ghulam Ali', '0000-00-00', 8, 0, 0, '', 19, 'Male', '36301-0928710-9', 'Wacha Sandheela, Jalalpur', 'N/A', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 419, '17-5-2018 11:30 AM', 22, 'Discharged', '2018-06-09 10:19:35', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(79, 10716, '', '', 'Faisal', 'S/O', 'M Shafi', '0000-00-00', 10, 0, 0, '', 1, 'Male', '31202-3065960-3', 'Chack no. 25/BC, Bahawalpur', 'N/A', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 419, '20-5-2018 09:15 AM', 22, 'Discharged', '2018-06-09 10:22:58', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(80, 10718, '', '', 'M Khan', 'S/O', 'Haider', '0000-00-00', 60, 0, 0, '', 20, 'Male', '36202-1315567-7', 'Massa Kota, Kehror Pakka', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '15-5-2018 03:00 PM', 22, 'Discharged', '2018-06-09 10:29:20', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(81, 10617, '', '', 'Zahra Fatima', 'D/O', 'Khalid', '0000-00-00', 1, 0, 0, '', 9, 'Female', '31101-1603708-3', 'Chack Dadu, DOnga Bonga, Bahawalnagar', 'Labor', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 701, '4-6-2018 11:37 AM', 22, 'Discharged', '2018-06-09 10:32:04', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(82, 10719, '', '', 'Yaseen Ahmad', 'S/O', 'Allah Wasaya', '0000-00-00', 45, 0, 0, '', 1, 'Male', '31202-2821391-7', 'Moza Rukan, Shuja Abad', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '8-5-2018 12:40 PM', 22, 'Discharged', '2018-06-09 10:34:48', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(83, 10720, '', '', 'Shahbaz Khan', 'S/O', 'M AShraf', '0000-00-00', 12, 0, 0, '', 1, 'Male', '31102-6627309-7', 'Chishtian', 'N/A', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '9-5-2018 09:00 AM', 22, 'Discharged', '2018-06-09 10:38:22', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(84, 10721, '', '', 'Fehmeeda Bibi', 'W/O', 'Junaid', '0000-00-00', 30, 0, 0, '', 1, 'Female', '31201-2751694-1', 'Musafir Khana', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 701, '12-5-2018 05:40 PM', 22, 'Discharged', '2018-06-09 10:42:57', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(85, 10722, '', '', 'Rahima', 'W/O', 'Ramzan', '0000-00-00', 50, 0, 0, '', 7, 'Female', '36203-8325665-5', 'Supper Chowk, Lodhran', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 701, '14-5-2018 12:30 PM', 22, 'Discharged', '2018-06-09 10:49:21', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(86, 10724, '', '', 'Bilal', 'S/O', 'Muhammad Hussain', '0000-00-00', 33, 0, 0, '', 1, 'Male', '31202-6948589-1', '13 Soling, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 434, '17-5-2018 07:35 AM', 22, 'Discharged', '2018-06-09 10:57:46', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(87, 10727, '', '', 'Maryam Bibi', 'D/O', 'Haq Nawaz', '0000-00-00', 1, 0, 0, '', 1, 'Female', '32103-3272187-7', 'Moza Kot Kaisrani, D.G Khan', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 710, '12-5-2018 04:20 PM', 22, 'Discharged', '2018-06-09 11:29:47', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(88, 10513, '', '', 'Sumaira', 'D/O', 'Manzoor Ahmad', '0000-00-00', 7, 0, 0, 'A+VE', 1, 'Female', '32301-0251179-7', 'muzafharghar', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 3, 570, '8-5-2018 08:04 PM', 22, 'Discharged', '2018-06-09 11:30:49', 'Discharged', 1, '', 'person.jpg', '2018-06-09'),
(89, 10728, '', '', 'Waqas', 'S/O', 'Zulfiqar', '0000-00-00', 28, 0, 0, '', 1, 'Male', '31302-7519493-0', 'College Road Ghalla Mandi, Liaqat Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '11-5-2018 10:28 PM', 22, 'Discharged', '2018-06-09 11:33:16', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(90, 10730, '', '', 'Husna', 'D/O', 'M Yousaf', '0000-00-00', 8, 0, 0, '', 1, 'Female', '36301-7278834-1', 'Jalalpur Pir Wala Multan', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 722, '15-5-2018 06:00 PM', 22, 'Discharged', '2018-06-09 11:39:12', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(91, 10525, '', '', 'Husna', 'D/O', 'M.Yousaf', '0000-00-00', 8, 0, 0, 'A+VE', 1, 'Female', '36301-7278834-1', 'Jalalpur Pir Wala Multan', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 2, 675, '15-5-2018 06:18 PM', 22, 'Discharged', '2018-06-09 11:39:23', 'Discharged', 1, '', 'person.jpg', '2018-06-09'),
(92, 10731, '', '', 'Hafeeza Bibi', 'D/O', 'Hanif', '0000-00-00', 15, 0, 0, '', 1, 'Female', '31202-6479092-3', 'Multan', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 675, '8-5-2018 12:00 PM', 22, 'Discharged', '2018-06-09 11:41:42', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(93, 10732, '', '', 'M Sami', 'S/O', 'Liaqat Hussain', '0000-00-00', 10, 0, 0, '', 1, 'Male', '36603-9627055-4', 'Luddan, Vehari', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '12-5-2018 07:00 PM', 22, 'Discharged', '2018-06-09 11:54:06', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(94, 10509, '', '', 'Rafique', 'S/O', 'nawab deen', '0000-00-00', 71, 0, 0, '', 2, 'Male', '36601-2419947-5', 'borewala vihari', 'nill', 2147483647, 'No', '', '', '', '', 'OPD', 'opd', 3, 566, '7-5-2018 11:20 AM', 22, 'Discharged', '2018-06-09 11:54:29', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(95, 10733, '', '', 'Ayesha', 'D/O', 'M Shahzad', '0000-00-00', 2, 0, 0, '', 1, 'Female', '31201-7857127-0', 'Ahmad Pur East Bwp', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 675, '20-5-2018 09:00 AM', 22, 'Discharged', '2018-06-09 11:59:53', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(96, 10734, '', '', 'Ali Raza', 'S/O', 'Ghulam Mustafa', '0000-00-00', 10, 0, 0, '', 1, 'Male', '31202-3065960-2', 'Chack No. 26/BC, Bahawalpur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '20-5-2018 09:10 AM', 22, 'Discharged', '2018-06-09 12:02:27', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(97, 10735, '', '', 'Farzand Ali', 'S/O', 'Abdul Aziz', '0000-00-00', 52, 0, 0, '', 1, 'Male', '36602-0963006-4', 'Moza Khan pur, Melsi', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '11-5-2018 01:00 PM', 22, 'Discharged', '2018-06-09 12:04:29', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(98, 10736, '', '', 'Habib', 'S/O', 'M. Islam', '0000-00-00', 25, 0, 0, '', 1, 'Male', '31105-8402491-9', 'Minchan Abad', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 434, '8-5-2018 10:00 PM', 22, 'Discharged', '2018-06-09 12:06:26', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(99, 10508, '', '', 'ali hussain', 'S/O', 'ali ahmad', '0000-00-00', 65, 0, 0, '', 8, 'Male', '31104-6353806-1', 'daranwala bwp', 'Nil', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 3, 561, '7-5-2018 11:12 AM', 22, 'Discharged', '2018-06-09 12:08:42', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(100, 10738, '', '', 'Mehboob', 'S/O', 'Ghulam Abbas', '0000-00-00', 4, 0, 0, '', 1, 'Male', '36203-5210302-3', 'Haweli Naseer Khan, Lodhran', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 437, '14-5-2018 09:00 AM', 22, 'Discharged', '2018-06-09 12:11:02', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(101, 10740, '', '', 'Ghulam Farid', 'S/O', 'M Hussain', '0000-00-00', 45, 0, 0, '', 7, 'Male', '33302-8346422-9', 'Chack No. 737, Kamaliya', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 440, '10-5-2018 01:00 PM', 22, 'Discharged', '2018-06-09 12:15:06', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(102, 10741, '', '', 'Rustam Khan', 'S/O', 'Jind Wada', '0000-00-00', 55, 0, 0, '', 7, 'Male', '31202-0271794-2', 'Sama Satta', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 440, '14-5-2018 12:00 AM', 22, 'Discharged', '2018-06-09 12:17:10', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(103, 10745, '', '', 'Imtiaz', 'S/O', 'Altaf Hussain', '0000-00-00', 7, 0, 0, '', 1, 'Male', '36203-3012787-7', 'Lodhran', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 442, '13-5-2018 09:30 PM', 22, 'Discharged', '2018-06-09 12:30:28', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(104, 10529, '', '', 'Jafir', 'S/O', 'Atah Muhammad', '0000-00-00', 22, 0, 0, '', 1, 'Male', '36202-7947102-9', 'Basti Raza-Abad Kehror Paka Lodhran', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 3, 578, '17-5-2018 08:41 AM', 22, 'Discharged', '2018-06-09 12:30:47', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(105, 10746, '', '', 'Munazza Bibi', 'W/O', 'Saleem', '0000-00-00', 50, 0, 0, '', 1, 'Female', '31203-1710046-3', 'Qaim pur, Hasilpur', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 722, '18-5-2018 10:10 AM', 22, 'Discharged', '2018-06-09 12:33:16', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(106, 10536, '', '', 'baset iqbal', 'S/O', 'm iqbal', '0000-00-00', 25, 0, 0, '', 12, 'Male', '31101-1737707-7', 'po bahawaalnager wazir pura bhawal nager', 'Nil', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 3, 579, '17-5-2018 11:02 AM', 22, 'Discharged', '2018-06-09 12:35:27', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(107, 10749, '', '', 'Zahida Bibi', 'W/O', 'Mumtaz', '0000-00-00', 35, 0, 0, '', 20, 'Female', '31053-8113404-0', 'Minchan Abad, Bahawalnagar', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 722, '7-5-2018 11:00 AM', 22, 'Discharged', '2018-06-09 12:40:09', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(108, 10524, '', '', 'Aqsa', 'D/O', 'Javeed', '0000-00-00', 5, 0, 0, 'A+VE', 1, 'Female', '31205-8422602-9', 'Bahawalpur', 'nill', 2147483647, 'No', '', '', '', '', 'OPD', 'emergency', 2, 674, '15-5-2018 05:13 PM', 22, 'Discharged', '2018-06-09 12:40:25', 'Discharged', 1, '', 'person.jpg', '2018-06-09'),
(109, 10511, '', '', 'Aman Bibi', 'W/O', 'Rasheed Ahmed', '0000-00-00', 50, 0, 0, '', 13, 'Female', '31202-7975887-8', 'Mohala Eid Gah BWP', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 671, '7-5-2018 12:21 PM', 22, 'Discharged', '2018-06-09 12:40:46', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(110, 10750, '', '', 'Saman Shahzadi', 'D/O', 'Tariq', '0000-00-00', 3, 0, 0, '', 1, 'Female', '31202-6041538-3', 'Badar Shair, Bahawalpur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 671, '17-5-2018 10:05 AM', 22, 'Discharged', '2018-06-09 12:43:08', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(111, 10535, '', '', 'ghulam hussain', 'S/O', 'khuda bakhash', '0000-00-00', 53, 0, 0, '', 12, 'Male', '31204-0186434-1', 'tahli po khas tehsil kpt dist bwp', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'COD', 6, 828, '17-5-2018 10:18 AM', 22, 'Discharged', '2018-06-09 12:43:27', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(112, 10751, '', '', 'Usman', 'S/O', 'Mubarak', '0000-00-00', 15, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Khan Garh, Alipur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 444, '19-5-2018 12:10 PM', 22, 'Discharged', '2018-06-09 12:45:42', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(113, 10458, '', '', 'Rasheed', 'S/O', 'M.Bashir', '0000-00-00', 35, 0, 0, 'A+VE', 1, 'Male', '31101-3610674-9', 'Bahawalnagar', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 362, '1-5-2018 04:15 AM', 22, 'Discharged', '2018-06-09 12:46:10', 'Discharged', 1, '', 'person.jpg', '2018-06-09'),
(114, 10752, '', '', 'Sughran Bibi', 'W/O', 'Manzoor Ahamad', '0000-00-00', 55, 0, 0, '', 1, 'Female', '36603-1037551-1', 'Basti Mian Hakim, Lodhran', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 671, '18-5-2018 10:20 AM', 22, 'Discharged', '2018-06-09 12:48:45', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(115, 10753, '', '', 'Urwa', 'D/O', 'Nazir Ahmad', '0000-00-00', 7, 0, 0, '', 1, 'Female', '31302-4224835-7', 'Basti Ata, Rahimyar Khan', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 671, '11-5-2018 01:00 PM', 22, 'Discharged', '2018-06-09 12:51:05', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(116, 10754, '', '', 'Allah Ditta', 'S/O', 'Noor Samad', '0000-00-00', 35, 0, 0, '', 1, 'Male', '31203-8188394-3', 'Basti Nirban, Hasilpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 362, '14-5-2018 10:30 AM', 22, 'Discharged', '2018-06-09 12:52:52', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(117, 10521, '', '', 'M.Ali', 'S/O', 'Khalil Ahmad', '0000-00-00', 32, 0, 0, 'A+VE', 7, 'Male', '31205-1648049-1', 'Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 3, 576, '15-5-2018 07:00 PM', 22, 'Discharged', '2018-06-09 12:53:14', 'Discharged', 1, '', 'person.jpg', '2018-06-09'),
(118, 10755, '', '', 'Sharf Elahi', 'W/O', 'Ghulam Farid', '0000-00-00', 60, 0, 0, '', 1, 'Female', '31102-2268834-4', 'Chishtian', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 671, '15-5-2018 07:35 AM', 22, 'Discharged', '2018-06-09 12:54:51', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(119, 10756, '', '', 'M Aqeel', 'S/O', 'M Anwar', '0000-00-00', 18, 0, 0, '', 1, 'Male', '31202-0335447-7', 'Chack No. 441/6R, Haroon Abad', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 362, '16-5-2018 02:15 PM', 22, 'Discharged', '2018-06-09 12:57:22', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(120, 10757, '', '', 'Bilal Ahmad', 'S/O', 'Abu Bakar', '0000-00-00', 35, 0, 0, '', 1, 'Male', '31201-8293963-5', 'Pipli Rajan, Ahmadpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 362, '16-5-2018 09:00 PM', 22, 'Discharged', '2018-06-09 12:59:14', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(121, 10759, '', '', 'Imran', 'S/O', 'Maqsood Ahmad', '0000-00-00', 23, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Thathi Sameja, Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 362, '5-5-2018 11:11 PM', 22, 'Discharged', '2018-06-09 13:04:06', 'Discharged', 0, '', 'person.jpg', '2018-06-09'),
(122, 10769, '', '', 'Abdul Ghaffar', 'S/O', 'M Jamal', '0000-00-00', 56, 0, 0, '', 1, 'Male', '31202-0230866-5', 'Badar Shair, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 451, '7-5-2018 12:30 PM', 22, 'Discharged', '2018-06-11 08:58:05', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(123, 10552, '', '', 'Imran', 'S/O', 'M.Deen', '0000-00-00', 30, 0, 0, 'A+VE', 1, 'Male', '31202-6719304-1', 'Bahawalnagar', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 396, '23-5-2018 03:20 PM', 22, 'Discharged', '2018-06-11 08:58:29', 'Discharged', 1, '', 'person.jpg', '2018-06-11'),
(124, 10770, '', '', 'Sagheer', 'S/O', 'Allah Bachaya', '0000-00-00', 14, 0, 0, '', 1, 'Male', '36201-3525585-1', 'Dunya Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 396, '24-5-2018 02:00 PM', 22, 'Discharged', '2018-06-11 09:01:08', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(125, 10771, '', '', 'M Rafique', 'S/O', 'Abdul Hameed', '0000-00-00', 50, 0, 0, '', 1, 'Male', '31205-4898979-1', 'Chack No. 102/DB, Yazman', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 396, '24-5-2018 10:00 PM', 22, 'Discharged', '2018-06-11 09:06:30', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(126, 10772, '', '', 'Sultan Mehmood', 'S/O', 'M Shafiq', '0000-00-00', 20, 0, 0, '', 1, 'Male', '31102-0598977-9', 'Chack No. 98, Chishtian', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 396, '26-5-2018 08:30 AM', 22, 'Discharged', '2018-06-11 09:10:01', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(127, 10773, '', '', 'Ghulam Zahar', 'W/O', 'M Shafiq', '0000-00-00', 65, 0, 0, '', 18, 'Female', '36201-3275526-0', 'Chack No. 344/WB, Dunya Pur', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'Emergency', 2, 722, '21-5-2018 10:40 AM', 22, 'Discharged', '2018-06-11 09:12:38', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(128, 10776, '', '', 'Qasim', 'S/O', 'M Shahzad', '0000-00-00', 3, 0, 0, '', 1, 'Male', '31205-8273345-9', 'Chack No. 101/DB, Yazman', 'Nil', 2147483647, 'No', '', '', '', '', 'OPD', 'Emergency', 1, 396, '29-5-2018 10:00 PM', 22, 'Discharged', '2018-06-11 09:37:06', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(129, 10623, '', '', 'Muhammad Irshad', 'S/O', 'Faiz Ahmad', '0000-00-00', 35, 0, 0, '', 1, 'Male', '31201-5390320-1', 'Uch Sharif, Ahmad pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 3, 582, '4-6-2018 12:11 AM', 22, 'Discharged', '2018-06-11 09:40:00', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(130, 10652, '', '', 'Shahbaz', 'S/O', 'Iqbal', '0000-00-00', 30, 0, 0, '', 36, 'Male', '36402-6249416-3', 'Badar Shair', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '6-6-2018 11:18 AM', 22, 'Discharged', '2018-06-11 09:42:20', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(131, 10549, '', '', 'amir ', 'S/O', 'allah ditta', '0000-00-00', 25, 0, 0, '', 1, 'Male', '31203-3623882-3', 'moza sandi wala tehsil and dist lodra', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 401, '22-5-2018 09:30 AM', 22, 'Discharged', '2018-06-11 09:45:24', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(132, 10620, '', '', 'Tariq Mujahid', 'S/O', 'Muhammad Saleem', '0000-00-00', 40, 0, 0, '', 1, 'Male', '31202-5988409-5', 'Chack no. 11/BC, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 392, '4-6-2018 11:50 AM', 22, 'Discharged', '2018-06-11 09:48:33', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(133, 10777, '', '', 'Hannan', 'S/O', 'Shafiq', '0000-00-00', 16, 0, 0, '', 8, 'Male', '31102-9781501-7', 'Chack No. 35/Fateh, Chishtian', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '12-5-2018 12:30 PM', 22, 'Discharged', '2018-06-11 09:51:12', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(134, 10778, '', '', 'M Akhtar', 'S/O', 'Abdul Khaliq', '0000-00-00', 45, 0, 0, '', 1, 'Male', '36203-7548890-5', 'Basti Abbas Pura, Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '14-5-2018 11:00 AM', 22, 'Discharged', '2018-06-11 09:53:03', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(135, 10764, '', '', 'Rashid', 'S/O', 'Sarwar', '0000-00-00', 25, 0, 0, '', 1, 'Male', '31203-4873191-5', 'Chack No. 20, Hasil pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 447, '9-6-2018 09:30 PM', 22, 'Discharged', '2018-06-11 09:55:39', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(136, 10557, '', '', 'm anees', 'S/O', 'murtaza', '0000-00-00', 3, 0, 0, '', 1, 'Male', '31202-1226857-7', 'chak no 28 bc bwp', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 2, 690, '25-5-2018 08:57 AM', 22, 'Discharged', '2018-06-11 09:56:45', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(137, 10779, '', '', 'Noor Jahan', 'W/O', 'Azmat', '0000-00-00', 45, 0, 0, '', 19, 'Female', '36602-0920447-2', 'Basti Ghareeb Abad, Kahror Pakka', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 690, '10-5-2018 09:40 AM', 22, 'Discharged', '2018-06-11 10:00:36', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(138, 10563, '', '', 'basir ahmad', 'S/O', 'm khan', '0000-00-00', 52, 0, 0, '', 1, 'Male', '31204-7835868-3', 'basti chandi pur tehsil kpt dist bwp', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 6, 838, '26-5-2018 10:00 AM', 22, 'Discharged', '2018-06-11 10:01:01', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(139, 10780, '', '', 'Ameen', 'S/O', 'Allah Bukhsh', '0000-00-00', 50, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Moza Musa Khokhar, Ahmar Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '22-5-2018 09:35 PM', 22, 'Discharged', '2018-06-11 10:03:07', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(140, 10781, '', '', 'Murtaza', 'S/O', 'Rasheed', '0000-00-00', 45, 0, 0, '', 1, 'Male', '31102-6651025-1', 'Chishtian', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '27-5-2018 06:50 AM', 22, 'Discharged', '2018-06-11 10:05:25', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(141, 10782, '', '', 'Farhan', 'S/O', 'M Abbas', '0000-00-00', 22, 0, 0, '', 1, 'Male', '31302-8467109-1', 'Thul Hamza, Liaqat pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '31-5-2018 02:35 AM', 22, 'Discharged', '2018-06-11 10:07:47', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(142, 10559, '', '', 'm hamid', 'S/O', 'javeed', '0000-00-00', 4, 0, 0, '', 1, 'Male', '36602-1039650-3', 'p/o jalha tehsil malsei dist bwp', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 6, 833, '25-5-2018 09:58 AM', 22, 'Discharged', '2018-06-11 10:08:16', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(143, 10578, '', '', 'irshad', 'S/O', 'ghulam shabir', '0000-00-00', 17, 0, 0, '', 1, 'Male', '31225-4654212-3', 'mohalla younas abad liaqat pur dist raheem yar khan', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 6, 829, '29-5-2018 11:40 AM', 22, 'Discharged', '2018-06-11 10:08:35', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(144, 10783, '', '', 'Dilshad', 'S/O', 'Faqeer Bukhsh', '0000-00-00', 20, 0, 0, '', 1, 'Male', '31202-9197568-3', 'Dilawar Colony, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '27-5-2018 09:00 AM', 22, 'Discharged', '2018-06-11 10:10:37', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(145, 10784, '', '', 'Zubaida Bibi', 'W/O', 'M Akram', '0000-00-00', 40, 0, 0, '', 40, 'Female', '31102-3798287-3', 'Chack No. 30, Chishtian', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 690, '9-6-2018 06:25 PM', 22, 'Discharged', '2018-06-11 10:13:50', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(146, 10577, '', '', 'rohan', 'S/O', 'm rizwan', '0000-00-00', 18, 0, 0, '', 43, 'Male', '31202-8663874-9', 'house no 184 deera izzat bwp', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 6, 841, '29-5-2018 10:58 AM', 22, 'Discharged', '2018-06-11 10:14:15', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(147, 10785, '', '', 'Abdul Majeed', 'S/O', 'Allah Ditta', '0000-00-00', 70, 0, 0, '', 8, 'Male', '36201-7530579-5', 'Chack No. 225/WB, Dunya pur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '27-5-2018 11:10 AM', 22, 'Discharged', '2018-06-11 10:16:16', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(148, 10581, '', '', 'jameel', 'S/O', 'ismail', '0000-00-00', 15, 0, 0, '', 1, 'Male', '36201-4012606-1', 'bsti srdar abas lodhran', 'LABOUR', 2147483647, 'No', '', '', '', '', 'Emergency', 'COD', 1, 399, '30-5-2018 10:48 AM', 22, 'Discharged', '2018-06-11 10:16:44', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(149, 10786, '', '', 'Siraj', 'S/O', 'Taj Muhammad', '0000-00-00', 40, 0, 0, '', 8, 'Male', '36201-8477411-9', 'Chack No. 388/WB, Dunya Pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '16-5-2018 05:00 PM', 22, 'Discharged', '2018-06-11 10:19:56', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(150, 10566, '', '', 'bashira bb ', 'W/O', 'm yaqub', '0000-00-00', 40, 0, 0, '', 13, 'Female', '31205-6681555-2', 'chak 55 db yazman diist bwp', 'House wife', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 2, 692, '26-5-2018 10:12 AM', 22, 'Discharged', '2018-06-11 10:20:28', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(151, 10787, '', '', 'Sibgha', 'D/O', 'Abdullah', '0000-00-00', 9, 0, 0, '', 6, 'Female', '31202-5152595-6', 'Abbas Nagar, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 690, '30-5-2018 09:00 PM', 22, 'Discharged', '2018-06-11 10:22:48', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(152, 10788, '', '', 'Naseer Ahmad', 'S/O', 'Waheed Bukhsh', '0000-00-00', 48, 0, 0, '', 1, 'Male', '00000-0000000-0', 'Hatheji, Ahmad pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '28-5-2018 11:30 PM', 22, 'Discharged', '2018-06-11 10:25:14', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(153, 10789, '', '', 'Sumaira', 'S/O', 'M Kashif', '0000-00-00', 22, 0, 0, '', 1, 'Male', '31105-1631060-1', 'Lal Garh, Minchan Abad', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 690, '1-5-2018 08:20 PM', 22, 'Discharged', '2018-06-11 10:28:09', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(154, 10790, '', '', 'Kareem Bukhsh', 'S/O', 'Qadir Bukhsh', '0000-00-00', 45, 0, 0, '', 8, 'Male', '36301-9591324-3', 'Jalalpur Pir Wala Multan', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '2-5-2018 09:00 PM', 22, 'Discharged', '2018-06-11 10:30:45', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(155, 10791, '', '', 'M Irfan', 'S/O', 'M. Azam', '0000-00-00', 29, 0, 0, '', 35, 'Male', '31202-0249029-9', 'Khalil Abad, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '1-5-2018 11:40 AM', 22, 'Discharged', '2018-06-11 10:33:21', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(156, 10792, '', '', 'Imran', 'S/O', 'Ramzan', '0000-00-00', 17, 0, 0, '', 1, 'Male', '31201-1698605-9', 'Near Darul Kabab, Bahawalpur', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '3-5-2018 10:10 PM', 22, 'Discharged', '2018-06-11 10:35:35', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(157, 10686, '', '', 'Anam', 'D/O', 'Manzoor', '0000-00-00', 3, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Khair Pur Tame Wali', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 618, '2-5-2018 09:23 AM', 22, 'Discharged', '2018-06-11 10:36:55', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(158, 10464, '', '', 'Ranjha', 'S/O', 'Wazeer ahmed', '0000-00-00', 12, 0, 0, '', 1, 'Male', '31202-5776887-7', '2basti jam pur BWP', 'school going', 2147483647, 'No', '', '', '', '', 'Emergency', 'COD', 1, 370, '2-5-2018 11:55 AM', 22, 'Discharged', '2018-06-11 10:37:19', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(159, 10793, '', '', 'Irfan', 'S/O', 'Abdul Rasheed', '0000-00-00', 17, 0, 0, '', 1, 'Male', '31302-9174255-5', 'Ameen Abad, Liaqatpur', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '3-5-2018 10:45 PM', 22, 'Discharged', '2018-06-11 10:39:53', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(160, 10481, '', '', 'Fourqan', 'S/O', 'Imam Bux', '0000-00-00', 2, 0, 0, 'A+VE', 1, 'Male', '36304-8710688-5', 'Shujaabad Multan', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 368, '3-5-2018 02:40 PM', 22, 'Discharged', '2018-06-11 10:40:45', 'Discharged', 1, '', 'person.jpg', '2018-06-11'),
(161, 10471, '', '', 'm umer ', 'S/O', 'm naseer', '0000-00-00', 8, 0, 0, '', 43, 'Male', '31302-4544443-3', 'chak no 30 tehsil liaqat pur dist reheem yar khan', 'Nil', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 373, '3-5-2018 10:12 AM', 22, 'Discharged', '2018-06-11 10:41:10', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(162, 10794, '', '', 'Samina Bibi', 'W/O', 'M Qasim', '0000-00-00', 25, 0, 0, '', 1, 'Female', '31202-2028473-7', 'Basti Allah Diwaya, P/O Sui Wihar, Bahawalpur', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 618, '1-5-2018 01:00 PM', 22, 'Discharged', '2018-06-11 10:43:59', 'Discharged', 0, '', 'person.jpg', '2018-06-11');
INSERT INTO `dischargetbl` (`discharge_id`, `regNo`, `emergency_no`, `admi_no`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patMonthAge`, `patDaysAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patOccupation`, `patPhone`, `patEntitled`, `garName`, `garCnic`, `garContact`, `garRelation`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patAdmDate`, `patChart_id`, `patStatus`, `discharge_timestamp`, `discharge_advice`, `FreeCarePatient`, `previousRegno`, `patient_pic_path`, `discharge_date`) VALUES
(163, 10465, '', '', 'sufyan', 'S/O', 'Akhtar', '0000-00-00', 6, 0, 0, 'AB+VE', 8, 'Male', '31204-3519273-5', 'KHYR PUR TAMYWALI', 'STUDENT', 2147483647, 'No', '', '', '', '', 'Emergency', 'OPD', 6, 837, '2-5-2018 05:54 PM', 22, 'Discharged', '2018-06-11 10:45:04', 'Discharged', 1, '', 'person.jpg', '2018-06-11'),
(164, 10795, '', '', 'Ghulam Abbas', 'S/O', 'M Ashiq', '0000-00-00', 30, 0, 0, '', 1, 'Male', '33301-5862110-5', 'Toba Taik Singh', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 352, '2-5-2018 08:30 AM', 22, 'Discharged', '2018-06-11 10:47:21', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(165, 10689, '', '', 'Anam', 'D/O', 'Yaseen', '0000-00-00', 3, 0, 0, '', 1, 'Female', '00000-0000000-0', 'Bahawalpur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 716, '2-5-2018 09:31 PM', 22, 'Discharged', '2018-06-11 10:50:32', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(166, 10797, '', '', 'Alishba', 'D/O', 'Mukhtiar', '0000-00-00', 10, 0, 0, '', 1, 'Female', '31203-1544728-3', 'Shah pur Sharif, Hasil pur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 618, '3-5-2018 08:30 AM', 22, 'Discharged', '2018-06-11 10:53:17', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(167, 10798, '', '', 'Qurban Ali', 'S/O', 'M Akram', '0000-00-00', 18, 0, 0, '', 1, 'Male', '31104-5163144-9', 'Shahi Chowk, Haroon Abad', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 368, '3-5-2018 10:15 PM', 22, 'Discharged', '2018-06-11 10:56:01', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(168, 10799, '', '', 'Luqman', 'S/O', 'Maqbool Hussain', '0000-00-00', 13, 0, 0, '', 1, 'Male', '36602-0568325-8', 'Basti Gamy Wali, Melsi', 'Student', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 368, '1-5-2018 08:30 PM', 22, 'Discharged', '2018-06-11 11:00:52', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(169, 10800, '', '', 'Ishaq', 'S/O', 'Haji Shair Muhammad', '0000-00-00', 38, 0, 0, '', 1, 'Male', '31201-3572417-3', 'Tahir Wali, Ahmad pur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 368, '10-5-2018 08:00 AM', 22, 'Discharged', '2018-06-11 11:04:38', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(170, 10801, '', '', 'M Ibraheem', 'S/O', 'Nizam Deen', '0000-00-00', 80, 0, 0, '', 7, 'Male', '31205-2057056-7', 'Chack No. 101, Ahmadpur', 'Nil', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 368, '7-5-2018 07:10 AM', 22, 'Discharged', '2018-06-11 11:09:49', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(171, 10086, '', '', 'sana', 'D/O', 'muhmmad iqbal', '0000-00-00', 0, 0, 0, 'A+VE', 1, 'Female', '31205-5810802-5', 'chistian bwlngr', 'student', 2147483647, 'No', '', '', '', '', 'Emergency', 'cod', 2, 28, '19-3-2018 02:42 AM', 22, 'Discharged', '2018-06-11 11:12:13', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(172, 10086, '', '', 'sana', 'D/O', 'muhmmad iqbal', '0000-00-00', 0, 0, 0, 'A+VE', 1, 'Female', '31205-5810802-5', 'chistian bwlngr', 'student', 2147483647, 'No', '', '', '', '', 'Emergency', 'cod', 2, 28, '19-3-2018 02:42 AM', 22, 'Discharged', '2018-06-11 11:12:35', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(173, 10803, '', '', 'Abdul Majeed', 'S/O', 'Faqeer Bukhsh', '0000-00-00', 50, 0, 0, '', 20, 'Male', '31302-9772906-5', 'Rahimyar khan', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 370, '7-5-2018 02:40 PM', 22, 'Discharged', '2018-06-11 11:15:59', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(174, 10642, '', '', 'Zaid Hussain', 'S/O', 'Haji Muhammad', '0000-00-00', 40, 0, 0, '', 1, 'Male', '36203-2863337-5', 'Gogran, Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 418, '5-6-2018 01:09 PM', 22, 'Discharged', '2018-06-11 11:16:50', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(175, 10804, '', '', 'Perveen', 'W/O', 'Allah Yar', '0000-00-00', 35, 0, 0, '', 20, 'Female', '31202-8152101-4', 'Saeed Abad Colony, Bahawalpur', 'House wife', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 28, '29-5-2018 12:00 PM', 22, 'Discharged', '2018-06-11 11:19:39', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(176, 10805, '', '', 'M Adnan', 'S/O', 'Abbas Khan', '0000-00-00', 23, 0, 0, '', 15, 'Male', '32304-6646707-9', 'Soney Wala, Muhammad Pur, Muzaffar Garh', 'Labour', 2147483647, 'No', '', '', '', '', 'OPD', 'OPD', 1, 370, '31-5-2018 01:40 PM', 22, 'Discharged', '2018-06-11 11:22:53', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(177, 10675, '', '', 'Abdullah', 'S/O', 'Bashir', '0000-00-00', 5, 0, 0, '', 1, 'Male', '31039-6242344-0', 'Fort Abbas', 'N/A', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 426, '7-6-2018 07:00 PM', 22, 'Discharged', '2018-06-11 11:24:48', 'Discharged', 0, '', 'person.jpg', '2018-06-11'),
(178, 10767, '', '', 'Dildar Ahmad', 'S/O', 'Ghulam Qadir', '0000-00-00', 17, 0, 0, '', 1, 'Male', '31301-0581399-5', 'Galy, Lodhran', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 450, '10-6-2018 05:00 PM', 22, 'Discharged', '2018-06-11 11:26:47', '8 Hours', 0, '', 'person.jpg', '2018-06-11'),
(179, 10702, '', '', 'Shabir', 'S/O', 'Abdullah', '0000-00-00', 26, 0, 0, '', 1, 'Male', '31104-1533615-3', 'Mohalla Baldia Colony, Haroon Abad', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 436, '9-6-2018 07:55 AM', 22, 'Discharged', '2018-06-11 11:29:59', 'Discharged.', 0, '', 'person.jpg', '2018-06-11'),
(180, 10806, '', '', 'Khalil Ahmad', 'S/O', 'Gulzar', '0000-00-00', 40, 0, 0, '', 1, 'Male', '31202-8455441-7', 'Chah Fateh Khan, Bahawalpur', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 370, '6-5-2018 09:40 PM', 22, 'Discharged', '2018-06-11 11:40:28', 'Discharged.', 0, '', 'person.jpg', '2018-06-11'),
(181, 10215, '', '', 'faiz Haider', 'S/O', 'Manzoor Ahamad', '1981-03-20', 37, 0, 0, 'O+VE', 23, 'Male', '31205-6083393-9', 'Bwp', 'fag', 321757659, 'No', '', '', '', '', 'OPD', 'emergency', 3, 60, '2018-03-20 12:44:00', 22, 'Discharged', '2018-06-26 11:14:05', 'discharged ', 0, '', 'person.jpg', '2018-06-26'),
(182, 10809, '', '', 'sohaib', 'S/O', 'ghuman', '1970-01-01', 22, 0, 0, 'B+VE', 1, 'Male', '31252-6363663-6', 'XYZ STREET NO 321', 'student', 345555666, 'No', '', '', '', '', 'OPD', 'home', 1, 401, '2018-06-29 15:29:00', 22, 'Cured', '2018-06-29 15:58:32', 'patient right now recovered', 1, '', 'person.jpg', '2018-06-29'),
(183, 10809, '', '', 'kazmi', 'S/O', 'sikander', '1970-01-01', 13, 0, 0, 'A+VE', 45, 'Male', '44312-1241112-1', 'XYZ STREET NO 321', 'student', 345555666, 'No', '', '', '', '', 'Private Clinic', 'hospital', 1, 436, '2018-06-30 11:58:00', 22, 'Cured', '2018-06-30 15:31:53', 'olx', 1, '', 'person.jpg', '2018-06-30'),
(184, 10809, '', '', 'kazmi', 'S/O', 'sikander', '1970-01-01', 13, 0, 0, 'A+VE', 45, 'Male', '44312-1241112-1', 'XYZ STREET NO 321', 'student', 345555666, 'No', '', '', '', '', 'Private Clinic', 'hospital', 1, 436, '2018-06-30 11:58:00', 22, 'Cured', '2018-06-30 15:32:38', 'olx', 1, '', 'person.jpg', '2018-06-30'),
(185, 10809, '', '', 'kazmi', 'S/O', 'sikander', '1970-01-01', 13, 0, 0, 'A+VE', 45, 'Male', '44312-1241112-1', 'XYZ STREET NO 321', 'student', 345555666, 'No', '', '', '', '', 'Private Clinic', 'hospital', 1, 436, '2018-06-30 11:58:00', 22, 'Cured', '2018-06-30 15:32:48', 'olx', 1, '', 'person.jpg', '2018-06-30'),
(186, 10809, '', '', 'kazmi', 'S/O', 'sikander', '1970-01-01', 13, 0, 0, 'A+VE', 45, 'Male', '44312-1241112-1', 'XYZ STREET NO 321', 'student', 345555666, 'No', '', '', '', '', 'Private Clinic', 'hospital', 1, 436, '2018-06-30 11:58:00', 22, 'Cured', '2018-06-30 15:33:13', 'olx', 1, '', 'person.jpg', '2018-06-30'),
(187, 10809, '', '', 'kazmi', 'S/O', 'sikander', '1970-01-01', 13, 0, 0, 'A+VE', 45, 'Male', '44312-1241112-1', 'XYZ STREET NO 321', 'student', 345555666, 'No', '', '', '', '', 'Private Clinic', 'hospital', 1, 436, '2018-06-30 11:58:00', 22, 'Cured', '2018-06-30 15:33:56', 'olx', 1, '', 'person.jpg', '2018-06-30'),
(188, 10050, '', '', 'Abu Bakar', 'S/O', 'Muneer Ahmad', '2004-03-14', 13, 0, 0, 'A+VE', 1, 'Male', '42201-1907548-9', 'Bahawalnagar', 'None', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 1, 2, '2018-02-22 10:29:00', 22, 'Cured', '2018-07-05 16:51:39', 'test', 0, '', 'person.jpg', '2018-07-05'),
(189, 10051, '', '', 'Mehmood', 'S/O', 'Azeem khan', '1922-02-01', 96, 0, 0, 'A+VE', 7, 'Male', '36602-9911176-9', 'Vehari', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Cod', 1, 3, '2018-02-21 10:34:00', 22, 'Cured', '2018-07-06 10:56:46', 'something', 0, '', 'person.jpg', '2018-07-06'),
(190, 10058, '', '', 'shahid', 'S/O', 'muhamd bux', '1970-01-01', 35, 0, 0, '', 6, 'Male', '31302-5995211-3', 'teh liaqt pur', 'labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 15, '2018-03-06 12:24:00', 22, 'Discharged', '2018-07-13 11:15:52', 'DISCHARGED', 0, '', 'person.jpg', '2018-07-12'),
(191, 10631, '', '', 'Shagufta Bibi', 'D/O', 'Aslam', '1970-01-01', 25, 0, 0, '', 7, 'Female', '36601-7127060-3', 'Chack No. 517/EB, Vehari', 'Labour', 2147483647, 'No', '', '', '', '', 'Emergency', 'Emergency', 2, 708, '2018-06-05 09:49:00', 22, 'Discharged', '2018-07-14 11:00:50', 'kjhbvkgkgkj', 0, '', 'person.jpg', '2018-07-14'),
(192, 10059, '', '', 'Shahbaz', 'S/O', 'Karim Baksh', '1970-01-01', 28, 0, 0, 'B+VE', 17, 'Male', '36202-9738125-3C', 'Kotla Niranjan Kehror paka Lodhran', 'carpenter', 2147483647, 'No', '', '', '', '', 'Emergency', 'emergency', 1, 6, '2018-01-28 11:27:00', 22, 'Discharged', '2018-07-19 10:16:33', 'cured', 0, '', 'person.jpg', '2018-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `diseasetbl`
--

CREATE TABLE `diseasetbl` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseasetbl`
--

INSERT INTO `diseasetbl` (`disease_id`, `disease_name`) VALUES
(1, 'Head Injury (Trauma)'),
(2, 'Scalp Wound (Trauma)'),
(3, 'Scalp Hematoma (Trauma)'),
(4, 'Simple Skull Fracture (Trauma)'),
(5, 'Compound Skull (Trauma)'),
(6, 'Extradural Hematoma (Trauma)'),
(7, 'Subdural Hematoma (Trauma)'),
(8, 'Brain Contusion (Trauma)'),
(9, 'Pneumocephalus (Trauma)'),
(10, 'Complete Cervical Spine Injury (Trauma)'),
(11, 'Complete Thoracial Spine Injury (Trauma)'),
(12, 'Complete Lumbosacral Spine Injury (Trauma)'),
(13, 'Incomplete Cervical Spine Injury (Trauma)'),
(14, 'Incomplete Thoracial Spine Injury (Trauma)'),
(15, 'Incomplete Lumbosacral Spine Injury (Trauma)'),
(16, 'Brain Fungal Growth (Infection)'),
(17, 'Pyogenic Brain Absess (Infection)'),
(18, 'Brain Tuberculosis'),
(19, 'Carrie Spine (Infection)'),
(20, 'Spinal Epiduaral Absess (Infection)'),
(21, 'Glioma (Brain Neuroplasty)'),
(22, 'Meningioma (Brain Neuroplasty)'),
(23, 'Astrocytoma (Brain Neuroplasty)'),
(24, 'Choroid Plexus Papilloma (Brain Neuroplasty)'),
(25, 'Sellar Suprasellar Lesion (Ventricle Tumor)'),
(26, 'Craniopharyngioma (Ventricle Tumor)'),
(27, 'Posterior Fossa Tumor (Ventricle Tumor)'),
(28, 'CP Angle Tumors (Ventricle Tumor)'),
(29, 'Orbital Tumors (Ventricle Tumor)'),
(30, 'Extra Dural Spinal Tumors (Spine Neuroplasty)'),
(31, 'Intradural Extramedullary Tumor'),
(32, 'Intramedullary Tumor'),
(34, 'Spinal Stenosis  (Degenerative Spinal Disease)'),
(35, 'Prolapsed Intervertebral Disc  (Degenerative Spinal Disease)'),
(36, 'Cervical Spondylosis (Degenerative Spinal Disease)'),
(37, 'Spondylolisthesis (Degenerative Spinal Disease)'),
(38, 'Prolapsed Thoracic Intervertebral Disc (Degenerative Spinal Disease)'),
(39, 'Prolapsed Lumbar Intervertebral Disc (Degenerative Spinal Disease)'),
(40, 'Prolapsed Cervical Intervertebral Disc (Degenerative Spinal Disease)'),
(41, 'Spina Bifida (Congenital)'),
(42, 'Occured Spinal Dysraphism (Congenital)'),
(43, 'Hydrocephalus (Congenital)'),
(44, 'Arnold Chiari Malformation (Congenital)'),
(45, 'Vascular'),
(46, 'AVM'),
(47, 'Aneurysm'),
(48, 'body pain');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categorytbl`
--

CREATE TABLE `expense_categorytbl` (
  `categoryNo` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_categorytbl`
--

INSERT INTO `expense_categorytbl` (`categoryNo`, `categoryName`) VALUES
(1, 'utility kits');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_expensetbl`
--

CREATE TABLE `hospital_expensetbl` (
  `expNo` int(11) NOT NULL,
  `expCategNo` int(11) NOT NULL,
  `expDateString` varchar(255) NOT NULL,
  `expTimeString` varchar(255) NOT NULL,
  `expDescription` varchar(255) NOT NULL,
  `expAmount` int(11) NOT NULL,
  `expAddBy` int(11) NOT NULL,
  `expDate` date NOT NULL,
  `expTime` time NOT NULL,
  `expIsPrint` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_expensetbl`
--

INSERT INTO `hospital_expensetbl` (`expNo`, `expCategNo`, `expDateString`, `expTimeString`, `expDescription`, `expAmount`, `expAddBy`, `expDate`, `expTime`, `expIsPrint`) VALUES
(1, 1, '07-06-2018', '12:00 PM', 'utility', 1000, 4, '2018-06-07', '12:00:00', 0),
(2, 1, '11-07-2018', '12:30 AM', 'trtet', 2147483647, 4, '2018-07-11', '00:30:00', 0),
(3, 1, '31-07-2018', '12:00 PM', '4324234', 2147483647, 4, '2018-07-31', '12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoicetbl`
--

CREATE TABLE `invoicetbl` (
  `invoiceNo` int(11) NOT NULL,
  `invoiceDateTime` varchar(255) NOT NULL,
  `invoiceDate` date NOT NULL,
  `accountNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `invoiceSubtotal` int(11) NOT NULL,
  `invoiceTax` int(11) NOT NULL,
  `invoiceDiscount` int(11) NOT NULL,
  `invoiceTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoicetbl`
--

INSERT INTO `invoicetbl` (`invoiceNo`, `invoiceDateTime`, `invoiceDate`, `accountNo`, `regNo`, `invoiceSubtotal`, `invoiceTax`, `invoiceDiscount`, `invoiceTotal`) VALUES
(1, '28-06-2018 09:42 PM', '2018-06-28', 4, 10215, 0, 0, 0, 0),
(2, '13-07-2018 11:19 AM', '2018-07-13', 5, 10050, 0, 0, 0, 0),
(3, '13-07-2018 11:19 AM', '2018-07-13', 5, 10050, 0, 0, 0, 0),
(4, '14-07-2018 10:52 AM', '2018-07-14', 6, 10604, 0, 0, 0, 0),
(5, '14-07-2018 10:52 AM', '2018-07-14', 6, 10604, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detailtbl`
--

CREATE TABLE `invoice_detailtbl` (
  `detailNo` int(11) NOT NULL,
  `detailDescription` varchar(255) NOT NULL,
  `detailQty` int(11) NOT NULL,
  `detailSubtotal` int(11) NOT NULL,
  `invoiceNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'Ward/ Beds List', 'dashboard/bedslist', 6),
(11, 'Re-Admit Patient', 'dashboard/patient_revisit', 2),
(15, 'Add Expenses', 'dashboard/add_expense', 9),
(16, 'View Expenses', 'dashboard/view_expense', 9),
(17, 'Patient Account', '', 7),
(18, 'Hospital Expense', '', 7),
(19, 'Pharmacy', '', 8),
(20, 'View Discharged History', 'dashboard/view_discharge_history', 2),
(21, 'Daily Report', 'dashboard/daily_reports', 5),
(22, 'Blood Sugar', 'dashboard/blood_sugar', 5),
(23, 'Vital Report', 'dashboard/patient_vitals_sheet', 5);

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
(5, 'Patient Reports', 'fa fa-clipboard', '', ''),
(6, 'Ward/ Room List', 'fa fa-list-alt', 'wrl-minimaximizer', ''),
(7, 'Financial Activities', 'fa fa-dollar', 'acc-minimaximizer', ''),
(9, 'Inventory', 'fa fa-shopping-cart', '', ''),
(10, 'Statistics', 'fa fa-bar-chart', '', 'dashboard/statistics/'),
(11, 'Announcements', 'fa fa-bullhorn', '', 'dashboard/announcements/');

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

-- --------------------------------------------------------

--
-- Table structure for table `operationtheatretbl`
--

CREATE TABLE `operationtheatretbl` (
  `otBookingNo` int(11) NOT NULL,
  `otPatNo` int(11) NOT NULL,
  `otWardNo` int(11) NOT NULL,
  `otOperationType` varchar(255) NOT NULL,
  `otPatientStatus` varchar(255) NOT NULL,
  `otBookingDate` varchar(255) NOT NULL,
  `otBookingTime` varchar(255) NOT NULL,
  `otBookedBy` int(11) NOT NULL,
  `otPatName` varchar(255) NOT NULL,
  `otBookingTime1` time NOT NULL,
  `otBookingDate1` date NOT NULL,
  `otSurgeon` int(11) NOT NULL,
  `otAnesthesia` varchar(255) DEFAULT NULL,
  `otOpFindingsProc` text,
  `otIsOperated` int(1) NOT NULL DEFAULT '0',
  `dateOfOperation` varchar(256) NOT NULL,
  `timeOfOperation` varchar(256) NOT NULL,
  `preOpDiagnosis` varchar(256) NOT NULL,
  `postOpDiagnosis` varchar(256) NOT NULL,
  `anesthesia` varchar(256) NOT NULL,
  `assistant` varchar(256) NOT NULL,
  `incision` varchar(256) NOT NULL,
  `durationOfProcedure` varchar(256) NOT NULL,
  `preOperativeFindings` text NOT NULL,
  `biopsy` text NOT NULL,
  `drains` text NOT NULL,
  `referring_consultent` varchar(255) NOT NULL,
  `vdoc_name` varchar(255) NOT NULL,
  `otVitalPulse` varchar(255) NOT NULL,
  `otVitalbp` varchar(255) NOT NULL,
  `otVitaltemp` varchar(255) NOT NULL,
  `otVitalrr` varchar(255) NOT NULL,
  `formatted_date_of_op` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operationtheatretbl`
--

INSERT INTO `operationtheatretbl` (`otBookingNo`, `otPatNo`, `otWardNo`, `otOperationType`, `otPatientStatus`, `otBookingDate`, `otBookingTime`, `otBookedBy`, `otPatName`, `otBookingTime1`, `otBookingDate1`, `otSurgeon`, `otAnesthesia`, `otOpFindingsProc`, `otIsOperated`, `dateOfOperation`, `timeOfOperation`, `preOpDiagnosis`, `postOpDiagnosis`, `anesthesia`, `assistant`, `incision`, `durationOfProcedure`, `preOperativeFindings`, `biopsy`, `drains`, `referring_consultent`, `vdoc_name`, `otVitalPulse`, `otVitalbp`, `otVitaltemp`, `otVitalrr`, `formatted_date_of_op`) VALUES
(1, 10048, 1, 'sergery', 'stable', '25-06-2018', '12:00 AM', 4, 'Ashir', '00:00:00', '2018-06-25', 5, 'ali kamal', 'something', 1, '28-06-2018', '10:01 AM', 'Stable', 'Stable', '5c', 'arsalan ', 'abc', '5 hours', 'nothing ', 'nothing', 'something ', '', '', '', '', '', '', '2018-06-28'),
(4, 10050, 2, 'operate', 'stable', '02-07-2018', '02:00 PM', 4, 'Abu Bakar', '14:00:00', '2018-07-02', 42, 'we', 'hjk', 1, '05-07-2018', '', 'abc', 'cba', 'qw', 'rt', 'ty', 'as', 'df', 'fg', 'ghh', 'sd', 'asd', 'as', 'df', 'as', 'df', '2018-07-05'),
(5, 10048, 1, 'mkjn', '.', '02-07-2018', '09:00 AM', 4, 'Ashir', '09:00:00', '2018-07-02', 5, 'sdj', 'ert', 1, '05-07-2018', '', 'abc', 'abc', 'abc', 'as', 'asd', 'asd', 'dfg', 'fgh', 'qwe', '', '', '', '', '', '', '2018-07-05'),
(6, 10080, 1, 'operate', 'stable', '05-07-2018', '02:15 PM', 4, 'Bilal', '14:15:00', '2018-07-05', 44, 'dsf', 'dfg', 1, '06-07-2018', '', 'as', 'qw', 'dfs', 'sdf', 'fg', 'fdg', 'dfg', 'dfg', 'fdg', 'dgf', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', '2018-07-06'),
(7, 10058, 3, 'operate', 'stable', '01-07-2018', '02:00 PM', 4, 'shahid', '14:00:00', '2018-07-01', 43, 'dfgfdgfdg', 'rdhfdhd', 1, '07-07-2018', '', 'gfgfdgfdg', 'fdgfdgfdgd', 'dfgdfgdfj', 'gfjfgjgfjgfj', 'fgjfgjfgjfg', 'jfgjf', 'fdgfd', 'ddfhjdsd', 'dsfdsfsd', 'jgfjfgjgf', 'gfdg', 'dgffdg', 'gfdfd', 'dfgdfgdf', 'gfdg', '2018-07-07'),
(8, 10051, 1, 'operate', 'stable', '08-07-2018', '02:00 PM', 4, 'Mehmood', '14:00:00', '2018-07-08', 40, 'something3', 'something11', 1, '06-07-2018', '', 'something', 'something1', 'something2', 'something4', 'something5', 'something6', 'something8', 'something9', 'something10', 'something7', 'something12', 'something13', 'something14', 'something15', 'something16', '2018-07-06'),
(9, 10066, 1, 'operate', 'stable', '01-07-2018', '01:00 PM', 4, 'Shahzad', '13:00:00', '2018-07-01', 43, 'kj', 'kj', 1, '21-07-2018', '', 'test', 'tresdt', 'jl', 'jl', 'kj', 'jkk', 'kj', 'lj', 'kjl', 'ljlj', 'lj', 'jl', 'jlkj', 'lj', 'kj', '2018-07-21'),
(10, 10059, 2, '435435435', '45454', '12-07-2018', '12:00 AM', 4, 'Shahbaz', '00:00:00', '2018-07-12', 5, 'dsfsdf', 'sdf', 1, '21-07-2018', '', 'sdfd', 'sdfsdf', 'dsfsdf', 'dfsdf', 'sdfsdf', 'sdfsdf', 'sdf', 'dsf', 'sdff', '', '', '', '', '', '', '2018-07-21'),
(11, 10060, 1, 'sdf', 'sdfsdf', '17-07-2018', '01:15 PM', 4, 'Ashir', '13:15:00', '2018-07-17', 5, 'dfsdf', 'sdfsd', 1, '21-07-2018', '', 'sdfdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'dsfsdf', 'dsfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'dsfsdf', 'dsfsdf', 'dsfsdf', 'sdfds', 'dsfsdf', 'sdfsdf', '2018-07-21'),
(12, 10063, 1, 'asd', 'asd', '24-07-2018', '02:45 AM', 4, 'Safdar', '02:45:00', '2018-07-24', 5, ';k', 'jg', 1, '21-07-2018', '', 'l;k', ';k;k', ';k', ';k;l', 'kl;k', ';lk;', 'kjkg', 'jg', 'jg', 'lklh', 'jgj', 'hgjhg', 'jhg', 'jg', 'jhg', '2018-07-21'),
(13, 10062, 1, 'asdad', 'sadasd', '24-07-2018', '12:00 AM', 4, 'Asif', '00:00:00', '2018-07-24', 40, 'jklj', 'lkjllkj', 1, '21-07-2018', '', 'dsfdf', 'jlkjn,mn', 'jlkj', 'ljkl', 'jklkj', 'klj', 'lkjlkljl', 'jlkjjlk', 'lkjjlkj', 'lj', 'lj', 'lj', 'jljl', 'lkjljl', 'lkjljl', '2018-07-21'),
(14, 10060, 1, 'dsfsd', 'fsdfsdf', '11-07-2018', '12:00 AM', 4, 'Ashir', '00:00:00', '2018-07-11', 5, 'lj', 'lkjl', 1, '21-07-2018', '', 'sdfsdfjl', 'jlkj', 'lj', 'ljlk', 'jlkj', 'lj', 'lkjlk', 'jlkj', 'lkj', 'lj', 'kjlk', 'jlkj', 'lj', 'lkjl', 'lkjljk', '2018-07-21'),
(15, 10062, 1, 'fsdf', 'dsfdsf', '24-07-2018', '12:00 AM', 4, 'Asif', '00:00:00', '2018-07-24', 40, 'lkjl', 'jlkjlkj', 1, '21-07-2018', '11:29 AM', '/lk;', 'ljlj', 'lj', 'kjlk', 'jlkj', 'ljk', 'ljlkj', 'ljllkj', 'jlljk', '', '', '', '', '', '', '2018-07-21'),
(16, 10064, 1, 'sdfsdf', 'sdfsdfsd', '17-07-2018', '02:00 AM', 4, 'Arshad', '02:00:00', '2018-07-17', 40, 'jlj', 'jlkj', 1, '21-07-2018', '11:28 AM', 'jl', 'jljk', 'ljl', 'lj', 'ljl', 'jlj', 'lj', 'ljl', 'jl', '', '', '', '', '', '', '2018-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `otwardtbl`
--

CREATE TABLE `otwardtbl` (
  `otwardId` int(11) NOT NULL,
  `otwardName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otwardtbl`
--

INSERT INTO `otwardtbl` (`otwardId`, `otwardName`) VALUES
(1, 'OT 1'),
(2, 'OT 2'),
(3, 'OT 3'),
(4, 'OT 4'),
(5, 'OT 5');

-- --------------------------------------------------------

--
-- Table structure for table `patients_accounttbl`
--

CREATE TABLE `patients_accounttbl` (
  `patientAccountNo` int(11) NOT NULL,
  `patientRegNo` int(11) NOT NULL,
  `totalDepositedAmount` int(11) NOT NULL,
  `runningBill` int(11) NOT NULL,
  `remainingAmount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `refundableAmount` int(11) NOT NULL,
  `freeStatus` int(1) NOT NULL,
  `isInvoiceGenerated` int(1) NOT NULL DEFAULT '0',
  `invoiceGeneratedDate` varchar(255) NOT NULL,
  `invoiceGeneratedDate1` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_accounttbl`
--

INSERT INTO `patients_accounttbl` (`patientAccountNo`, `patientRegNo`, `totalDepositedAmount`, `runningBill`, `remainingAmount`, `discount`, `refundableAmount`, `freeStatus`, `isInvoiceGenerated`, `invoiceGeneratedDate`, `invoiceGeneratedDate1`) VALUES
(1, 10058, 86000, 0, 86000, 0, 0, 0, 0, '', '0000-00-00'),
(2, 10070, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
(3, 10048, 1600, 0, 1600, 0, 0, 0, 0, '', '0000-00-00'),
(4, 10215, 0, 0, 0, 0, 0, 0, 1, '28-06-2018 09:42 PM', '2018-06-28'),
(5, 10050, 0, 0, 0, 0, 0, 0, 1, '13-07-2018 11:19 AM', '2018-07-13'),
(6, 10604, 1100, 0, 1100, 0, 0, 0, 1, '14-07-2018 10:52 AM', '2018-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `patients_expensetbl`
--

CREATE TABLE `patients_expensetbl` (
  `expenseNo` int(11) NOT NULL,
  `patientAccountNo` int(11) NOT NULL,
  `expenseDescription` varchar(255) NOT NULL,
  `expenseAmount` int(11) NOT NULL,
  `expenseDate` varchar(255) NOT NULL,
  `expenseTime` varchar(255) NOT NULL,
  `expenseDate1` date NOT NULL,
  `expenseTime1` time NOT NULL,
  `expense_tblName` varchar(255) NOT NULL,
  `expense_tblNameId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients_paymenttbl`
--

CREATE TABLE `patients_paymenttbl` (
  `paymentNo` int(11) NOT NULL,
  `patientAccountNo` int(11) NOT NULL,
  `paymentAmount` int(11) NOT NULL,
  `receivedBy` int(11) NOT NULL,
  `paymentDate` varchar(11) NOT NULL,
  `paymentTime` varchar(11) NOT NULL,
  `paymentDate1` date NOT NULL,
  `paymentTime1` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_paymenttbl`
--

INSERT INTO `patients_paymenttbl` (`paymentNo`, `patientAccountNo`, `paymentAmount`, `receivedBy`, `paymentDate`, `paymentTime`, `paymentDate1`, `paymentTime1`) VALUES
(1, 1, 80000, 4, '28-06-2018', '05:06 AM', '2018-06-28', '05:06:33'),
(2, 1, 6000, 4, '28-06-2018', '12:54 AM', '2018-06-28', '00:54:48'),
(3, 3, 800, 4, '14-07-2018', '10:50 AM', '2018-07-14', '10:50:01'),
(4, 3, 800, 4, '14-07-2018', '10:50 AM', '2018-07-14', '10:50:13'),
(5, 6, 800, 4, '14-07-2018', '10:51 AM', '2018-07-14', '10:51:50'),
(6, 6, 300, 4, '14-07-2018', '10:51 AM', '2018-07-14', '10:51:56');

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
(1, 10048, 1, '14-7-2018 10:17 AM', 'qwewqgfgqwewqgfgqwewqgfgqwewqgfg', 'rgergqwewqgfg', 'ereregqwewqgfg', 'weewsdsdqwewqgfg', 'sfssdqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfg', 'wetwerweqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfgqwewqgfg', '4', '', '', '', '', '', '', '1'),
(4, 10050, 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(5, 10048, 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(6, 10058, 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(7, 10051, 8, '6-7-2018 10:51 AM', 'something gose here', 'something gose here', 'something gose here', 'something gose here', 'something gose here', 'something gose here', '4', '', '', '', '', '', '', '1'),
(8, 10066, 9, '11-7-2018 11:42 PM', '', '', '', '', '', '', '4', '', '', '', '', '', '', '1'),
(9, 10060, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(10, 10080, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

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
(1, 10048, 1, '27-06-2018 04:00 AM', 'weqwqewq', 'weqweqweq', 'Left', '', 'true', 'false', 'false', 'ewq', '11:30 PM', 'wqewq', 'q4qr fs', 'dg ', '12:00 AM', 'qewqq', 'No', 'Yes', 'No', 'Yes', 'Yes', 4, '1'),
(4, 10050, 4, '03-07-2018 03:46 AM', 'none', 'none', 'Right', 'Yes', 'true', 'false', 'true', 'no', '01:00 AM', '3', 'not any', 'nothing', '02:00 AM', 'nope', 'Yes', 'Yes', 'No', 'No', 'Yes', 4, '1'),
(5, 10048, 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '0'),
(6, 10058, 7, '06-07-2018 11:40 PM', '', '', '', '', 'false', 'false', 'false', '', '', '', '', '', '', '', '', '', '', '', '', 4, '1'),
(7, 10051, 8, '06-07-2018 10:47 PM', 'tm', 'mt', 'Right', 'Yes', 'false', 'true', 'true', 'something gose here', '12:00 AM', 'something gose here', 'something gose here', 'something gose here', '01:00 AM', 'something gose here', 'Yes', 'No', 'Yes', 'No', 'Yes', 4, '1'),
(8, 10066, 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '0'),
(9, 10060, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '0'),
(10, 10080, 6, '21-07-2018 04:32 PM', 'sdfsdf', 'dsfsdf', 'Right', 'Yes', 'true', 'false', 'true', 'sdfsdf', '02:15 AM', 'dsfsdf', 'sdfsdf', 'sdfsdf', '02:15 AM', 'sdfsdf', 'Yes', 'No', 'Yes', 'No', 'Yes', 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptiontbl`
--

CREATE TABLE `prescriptiontbl` (
  `rxNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `patName` varchar(255) NOT NULL,
  `patNoKType` varchar(255) NOT NULL,
  `patNoK` varchar(255) NOT NULL,
  `rxDate` date NOT NULL,
  `rxTime` varchar(255) NOT NULL,
  `subTotal` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `returnedAmount` varchar(255) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `pre_op_checklist`
--

CREATE TABLE `pre_op_checklist` (
  `preOpCLid` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `filled_by_dr` varchar(255) NOT NULL,
  `operation_planned` varchar(255) NOT NULL,
  `checkList_date` date NOT NULL,
  `informed_consent` varchar(255) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `surgeon` varchar(255) NOT NULL,
  `checklist_bp` varchar(255) NOT NULL,
  `checklist_pulse` varchar(255) NOT NULL,
  `chehcklist_temp` varchar(255) NOT NULL,
  `checklist_rep_rate` varchar(255) NOT NULL,
  `checklist_npo` time NOT NULL,
  `givebath` varchar(255) NOT NULL,
  `hospital_dress` varchar(255) NOT NULL,
  `shave` varchar(255) NOT NULL,
  `checklist_hb` varchar(255) NOT NULL,
  `checklist_esr` varchar(255) NOT NULL,
  `checklist_sNa` varchar(255) NOT NULL,
  `check_sK` varchar(255) NOT NULL,
  `checklist_sCa` varchar(255) NOT NULL,
  `checklist_pt` varchar(255) NOT NULL,
  `checklist_aptt` varchar(255) NOT NULL,
  `checklist_tlc` varchar(255) NOT NULL,
  `checklist_rbs` varchar(255) NOT NULL,
  `checklist_HBsAg` varchar(255) NOT NULL,
  `anti_HCV` varchar(255) NOT NULL,
  `diabatic_status` varchar(255) NOT NULL,
  `hypertenstion_status` varchar(255) NOT NULL,
  `checklist_ECG` varchar(255) NOT NULL,
  `checklist_anyother` varchar(255) NOT NULL,
  `biopsy` varchar(255) NOT NULL,
  `lopogram` varchar(255) NOT NULL,
  `chalangiogram` varchar(255) NOT NULL,
  `checklist_ct_mri` varchar(255) NOT NULL,
  `checklist_fnac` varchar(255) NOT NULL,
  `chekclist_us` varchar(255) NOT NULL,
  `checklist_cxr` varchar(255) NOT NULL,
  `si_ivu` varchar(255) NOT NULL,
  `si_anyother` varchar(255) NOT NULL,
  `checklist_radio1` varchar(255) NOT NULL,
  `checklist_radio2` varchar(255) NOT NULL,
  `checklist_radio3` varchar(255) NOT NULL,
  `checklist_radio4` varchar(255) NOT NULL,
  `checklist_radio5` varchar(255) NOT NULL,
  `checklist_radio6` varchar(255) NOT NULL,
  `checklist_radio7` varchar(255) NOT NULL,
  `checklist_radio8` varchar(255) NOT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_op_checklist`
--

INSERT INTO `pre_op_checklist` (`preOpCLid`, `regNo`, `otBookingNo`, `filled_by_dr`, `operation_planned`, `checkList_date`, `informed_consent`, `diagnosis`, `surgeon`, `checklist_bp`, `checklist_pulse`, `chehcklist_temp`, `checklist_rep_rate`, `checklist_npo`, `givebath`, `hospital_dress`, `shave`, `checklist_hb`, `checklist_esr`, `checklist_sNa`, `check_sK`, `checklist_sCa`, `checklist_pt`, `checklist_aptt`, `checklist_tlc`, `checklist_rbs`, `checklist_HBsAg`, `anti_HCV`, `diabatic_status`, `hypertenstion_status`, `checklist_ECG`, `checklist_anyother`, `biopsy`, `lopogram`, `chalangiogram`, `checklist_ct_mri`, `checklist_fnac`, `chekclist_us`, `checklist_cxr`, `si_ivu`, `si_anyother`, `checklist_radio1`, `checklist_radio2`, `checklist_radio3`, `checklist_radio4`, `checklist_radio5`, `checklist_radio6`, `checklist_radio7`, `checklist_radio8`, `isSave`) VALUES
(1, 10050, 4, 'Ali', 'yes', '2018-07-18', 'no', 'no diagnosis', 'imran', '70', '50', '100', '70', '02:15:00', 'true', 'true', 'true', 'abcBNM', 'BM', 'BMN', 'bn', 'bn', 'jkllk', 'lkn,mn', 'b b kmnbn', 'jhjkl', 'kjklj', 'kjlj', 'jkljk', 'kjlj', 'lkjlj', 'lkjlj', 'kljlkj', 'kljljk', 'kljlj', 'lkjkljl', 'kjljl', 'ljljl', 'kjljlk', 'ljljlj', 'lkjljk', 'Yes', '', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', '1'),
(2, 10048, 1, '', '', '0000-00-00', '', '', '', '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(3, 10048, 5, '', '', '0000-00-00', '', '', '', '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(4, 10058, 7, '', '', '0000-00-00', '', '', '', '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(5, 10051, 8, 'shahid', 'something gose here', '2018-07-15', 'something gose here', 'something gose here', 'something gose here', '12', '32', '23', '34', '12:00:00', 'true', 'true', 'false', '23', '34', '23', '23', '324', '23', '23', '34', '23', '23', '32', '334', '3', '23', '23', '23', '43', '234', '32', '23', '23', '23', '34', '23', 'Yes', 'Uncount', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', '1'),
(6, 10066, 9, '', '', '0000-00-00', '', '', '', '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(7, 10060, 14, '', '', '0000-00-00', '', '', '', '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(8, 10080, 6, '', '', '0000-00-00', '', '', '', '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pre_op_fitnesstbl`
--

CREATE TABLE `pre_op_fitnesstbl` (
  `preOpFNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `anesthetistRemarks` text NOT NULL,
  `anesthetistAdvice` text NOT NULL,
  `anesthetistName` varchar(256) NOT NULL,
  `physicianRemarks` text NOT NULL,
  `physicianAdvice` text NOT NULL,
  `physicianName` varchar(256) NOT NULL,
  `anyOther` text NOT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_op_fitnesstbl`
--

INSERT INTO `pre_op_fitnesstbl` (`preOpFNo`, `regNo`, `otBookingNo`, `anesthetistRemarks`, `anesthetistAdvice`, `anesthetistName`, `physicianRemarks`, `physicianAdvice`, `physicianName`, `anyOther`, `isSave`) VALUES
(1, 10048, 1, 'qwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewq                                              ', '                                            wewqwqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewq                                      ', 'weqwqwqe', 'wqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewq', 'wqwqeqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewqqwewqewq', 'wqewqe', '                                                                                                                                                                                                                                                    weqewqeweq                                                                                                                                                                                                                                ', '1'),
(4, 10050, 4, 'nothing', 'none', 'ali', 'nothing else', 'nope', 'imran', '                                                        not specigic                                                                                                                                                                ', '1'),
(5, 10048, 5, '', '', '', '', '', '', '', '0'),
(6, 10058, 7, '', '', '', '', '', '', '', '0'),
(7, 10051, 8, 'something gose here', 'something gose here                                                                                                                                      ', 'ali', 'something gose here', 'something gose here', 'imran', 'something gose here                                                                                                            ', '1'),
(8, 10066, 9, '', '', '', '', '', '', '', '0'),
(9, 10060, 14, '', '', '', '', '', '', '', '0'),
(10, 10080, 6, 'kjsdflj', 'jlsdfjsdlkj                                                                                  ', 'kjsdfsjkd', 'jsdlkfjsldkj', 'kjsdlfkjsdl', 'kjdslfjsd', 'jdslfkjsld                                    ', '1');

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

-- --------------------------------------------------------

--
-- Table structure for table `product_categorytbl`
--

CREATE TABLE `product_categorytbl` (
  `categNo` int(11) NOT NULL,
  `categName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categorytbl`
--

INSERT INTO `product_categorytbl` (`categNo`, `categName`) VALUES
(1, 'Digest'),
(2, 'Surgery'),
(3, 'Antibiotic');

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
(1, 10048, 1, '29-6-2018 5:03 PM', 'gfhgfhf', 61, 'Yes', 'Ward', 'A', '1', '2', '34', '42', '1', '1', '1', '2', '3', '2', '3', '3', 'Suction drains', 'Sent', 'fsdafsa', 'Soaked', 'Needed', 'Yes', '1'),
(4, 10050, 4, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(5, 10048, 5, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(6, 10058, 7, '6-7-2018 10:20 AM', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(7, 10051, 8, '6-7-2018 10:52 AM', 'dsf', 61, 'No', 'Ward', 'V', '32', '32', '34', '23', '43', '32', '23', '34', '32', '324', '34', '34', 'Drain 1', 'Sent', '234', 'Not Soaked', 'Not Needed', 'Yes', '1'),
(8, 10066, 9, '13-7-2018 2:40 AM', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Suction drains', '', '', '', '', '', '1'),
(9, 10060, 14, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(10, 10080, 6, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `reportstbl`
--

CREATE TABLE `reportstbl` (
  `reportId` int(11) NOT NULL,
  `patregNo` int(11) NOT NULL,
  `reportName` varchar(255) NOT NULL,
  `reportType` varchar(255) NOT NULL,
  `reportComments` varchar(255) NOT NULL,
  `reportPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportstbl`
--

INSERT INTO `reportstbl` (`reportId`, `patregNo`, `reportName`, `reportType`, `reportComments`, `reportPath`) VALUES
(2, 10048, 'abc', 'sdf', 'DFS', '10048-sdf-2018-06-29-12-02-04am.png'),
(4, 10809, 'CBC', 'blood report', 'random', '10809-blood_report-2018-06-30-12-53-43am.png'),
(5, 10094, 'gfdgdf', 'gfdgdf', 'gdfgf', '10094-gfdgdf-2018-06-30-01-49-40am.png'),
(6, 10094, 'gfdgfdg', 'fdgfdgdfgd', 'fgfdgdfg', '10094-fdgfdgdfgd-2018-06-30-01-51-38am.JPG'),
(7, 10809, 'cbc ', 'blood test', 'random test', '10809-blood_test-2018-06-30-09-19-10pm.JPG'),
(8, 10048, 'sdfsdfdfskjhkh', 'jhkjhh', 'jkhjkhkhkjsdfhskdfhksdhfkshdfkshdfkhdhfsdhfhsdfhsdkfhkdhffkdhfkhsdkhfsdkfhfsdkhfkhdfkhsdkfhsdkhfdhfhdfkhdshfkdhfhsdfkhdskfhsdhfkdhfkdhsfkhdfkhsdkhfsdhfkhdfkhdskfhdkhfkdhfkhsdfhdkhfkdhsfkhsdkfhdkhfkdhfkhsdfkhdkfhdskhfksdh', '10048-jhkjhh-2018-07-14-07-12-05am.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `shifttbl`
--

CREATE TABLE `shifttbl` (
  `shiftId` int(11) NOT NULL,
  `shiftFrom` varchar(255) NOT NULL,
  `shiftTo` varchar(255) NOT NULL,
  `shiftPatId` int(11) NOT NULL,
  `patOutcome` varchar(255) NOT NULL,
  `shiftBy` varchar(255) NOT NULL,
  `shiftedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sideroomsrate`
--

CREATE TABLE `sideroomsrate` (
  `rateId` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sideroomsrate`
--

INSERT INTO `sideroomsrate` (`rateId`, `rate`) VALUES
(1, '500');

-- --------------------------------------------------------

--
-- Table structure for table `surgical_checklisttbl`
--

CREATE TABLE `surgical_checklisttbl` (
  `surgicalSCNo` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `otBookingNo` int(11) NOT NULL,
  `dateString` varchar(256) NOT NULL,
  `checkbox1` varchar(256) NOT NULL,
  `checkbox2` varchar(256) NOT NULL,
  `checkbox3` varchar(256) NOT NULL,
  `radio4` varchar(256) NOT NULL,
  `radio5` varchar(256) NOT NULL,
  `radio6` varchar(256) NOT NULL,
  `checkbox7` varchar(256) NOT NULL,
  `checkbox8` varchar(256) NOT NULL,
  `checkbox9` varchar(256) NOT NULL,
  `checkbox10` varchar(256) NOT NULL,
  `checkbox11` varchar(256) NOT NULL,
  `checkbox12` varchar(256) NOT NULL,
  `checkbox13` varchar(256) NOT NULL,
  `checkbox14` varchar(256) NOT NULL,
  `checkbox15` varchar(256) NOT NULL,
  `checkbox16` varchar(256) NOT NULL,
  `checkbox17` varchar(256) NOT NULL,
  `checkbox18` varchar(256) NOT NULL,
  `checkbox19` varchar(256) NOT NULL,
  `checkbox20` varchar(256) NOT NULL,
  `checkbox21` varchar(256) NOT NULL,
  `checkbox22` varchar(256) NOT NULL,
  `checkbox23` varchar(256) NOT NULL,
  `checkbox24` varchar(256) NOT NULL,
  `checkbox25` varchar(256) NOT NULL,
  `isSave` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgical_checklisttbl`
--

INSERT INTO `surgical_checklisttbl` (`surgicalSCNo`, `regNo`, `otBookingNo`, `dateString`, `checkbox1`, `checkbox2`, `checkbox3`, `radio4`, `radio5`, `radio6`, `checkbox7`, `checkbox8`, `checkbox9`, `checkbox10`, `checkbox11`, `checkbox12`, `checkbox13`, `checkbox14`, `checkbox15`, `checkbox16`, `checkbox17`, `checkbox18`, `checkbox19`, `checkbox20`, `checkbox21`, `checkbox22`, `checkbox23`, `checkbox24`, `checkbox25`, `isSave`) VALUES
(1, 10048, 1, '30-6-2018 11:54 AM', 'true', 'true', 'true', 'Yes', 'No', 'No', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', '1'),
(4, 10050, 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(5, 10048, 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(6, 10058, 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(7, 10051, 8, '6-7-2018 10:51 AM', 'true', 'false', 'true', 'Yes', 'No', 'Yes', 'false', 'true', 'false', 'true', 'false', 'false', 'false', 'true', 'false', 'false', 'false', 'false', 'true', 'false', 'false', 'true', 'false', 'true', 'false', '1'),
(8, 10066, 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(9, 10060, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(10, 10080, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `unittbl`
--

CREATE TABLE `unittbl` (
  `unitId` int(11) NOT NULL,
  `unitName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(32) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `desig` varchar(255) NOT NULL,
  `qualifications` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_pic_path` varchar(255) DEFAULT 'user2-160x160.jpg',
  `department` varchar(255) DEFAULT NULL,
  `priv` int(11) DEFAULT '3',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isSurgeon` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `desig`, `qualifications`, `phone`, `profile_pic_path`, `department`, `priv`, `isActive`, `isSurgeon`) VALUES
(4, 'admin', 'test', 'Dr. Muhammad Arshad Ch', 'Professor, Head of Department', 'FCPS (Neurosurgery) Fellow of Spine Surgery (Singapore)', '03088886964', 'avatar51.png', 'Neurosurgery', 1, 1, 0),
(5, 'marshad', 'marshad', 'Dr. Muhammad Arshad Ch', 'Professor, Head of Department', 'FCPS (Neuro Surgery) Fellow of Spine Surgery (Singapore)', '00000000000', 'user2-160x160.jpg', NULL, 1, 1, 1),
(40, 'ssamaija', 'hems.hospital', 'Dr. Shahid Samaija', 'Associate Profressor', 'FCPS (Neuro) FCPS (Surgery)', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 1),
(41, 'mhussain', 'hems.hospital', 'Dr. Mussadaque Hussain', 'Associate Professor', 'FCPS (Neuro Surgery)', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 1),
(42, 'mahmad', 'hems.hospital', 'Dr. Mumtaz Ahmad', 'Assistant Professor', 'FCPS (Neuro) FCPS (Surgery)', '03006827293', 'user2-160x160.jpg', NULL, 4, 1, 1),
(43, 'fabukhari', 'hems.hospital', 'Dr. Faisal Ali Bukhari', 'Senior Registrar Admin', 'MCPS - FCPS', '00000000000', 'user2-160x160.jpg', NULL, 4, 1, 1),
(44, 'akamran', 'hems.hospital', 'Dr. Asad Kamran', 'Senior Registrar Admin', 'FCPS', '00000000000', 'user2-160x160.jpg', NULL, 4, 1, 1),
(45, 'fnawaz', 'hems.hospital', 'Dr. Feroz Nawaz', 'Senior Registrar Admin', 'FCPS (Neuro surgery)', '00000000000', 'user2-160x160.jpg', NULL, 4, 1, 1),
(46, 'msajjad', 'hems.hospital', 'Dr. Muhammad Sajjad', 'Registrar Neuro ICU', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 4, 1, 1),
(47, 'tsiddique', 'hems.hospital', 'Dr. Tahir Siddique', 'Medical Officer Neuro ICU', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(48, 'alvena', 'hems.hospital', 'Dr. Alvena', 'Medical Officer Neuro ICU', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(49, 'zqurnain', 'hems.hospital', 'Dr. Zul Qurnain', 'Medical Officer NSW', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 1),
(50, 'amajeed', 'hems.hospital', 'Dr. Amir Majeed', 'Medical Officer NSW', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 1),
(51, 'aabbasi', 'hems.hospital', 'Dr. Amin Abbasi', 'Medical Officer NSW', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 1),
(52, 'sakhtar', 'hems.hospital', 'Dr. Shameen Akhtar', 'Medical Officer NSW', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(53, 'wrizwan', 'hems.hospital', 'Dr. Wasif Rizwan Malik', 'Medical Officer NSW', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(54, 'mimran', 'hems.hospital', 'Dr. Muhammad Imran', 'P.G.R (NSW)', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(55, 'msdasti', 'hems.hospital', 'Dr. Muhammad Sajjad Dasti', 'P.G.R (NSW)', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(56, 'zjamil', 'hems.hospital', 'Dr. Zeeshan Jamil', 'P.G.R (NSW)', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(57, 'gmustfa', 'hems.hospital', 'Dr. Ghulam Mustfa', 'P.G.R (NSW)', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(58, 'khizir', 'hems.hospital', 'Dr. Khizir', 'Medical Officers NSW', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(59, 'awais900', 'hashmi', 'Dr. Awais Ur Rehman', 'PGR', 'MBBS', '03336365278', 'user2-160x160.jpg', NULL, 3, 1, 0),
(60, 'khizar', 'hems.hospital', 'Dr. Khizar', 'PGR', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(61, 'kfatima', 'hems.hospital', 'Nurse Kaneez Fatima', 'Head Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0),
(62, 'shazia', 'hems.hospital', 'Nurse Shazia Ahmad', 'Head Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0),
(63, 'farzana', 'hems.hospital', 'Nurse Farzana Parveen', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0),
(64, 'farah', 'hems.hospital', 'Nurse Farah Adeba', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0),
(65, 'sasghar', 'hems.hospital', 'Nurse Shazia Asghar', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0),
(66, 'smushtaq', 'hems.hospital', 'Nurse Salma Mushtaq', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(67, 'smukhtar', 'hems.hospital', 'Nurse Sumaira Mukhtar', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0),
(68, 'sumaria', 'hems.hospital', 'Nurse Sumaria Bibi', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(69, 'rfirdous', 'hems.hospital', 'Nurse Rabia Firdous', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(70, 'arshia', 'hems.hospital', 'Nurse Arshia ', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(71, 'smaryam', 'hems.hospital', 'Nurse Roonia Maryam', 'Staff Nurse', '', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(72, 'qtahreem', 'hems.hospital', 'Pharmacist Qudsia Tahreem', 'Pharmacist', '', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(73, 'snaz', 'hems.hospital', 'Nurse Samina Naz', 'Staff Nurse', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(74, 'mnawaz', 'hems.hospital', 'Muhammad Nawaz Malik', 'Senior Pharmacy Technition ', 'MBBS', '00000000000', '20180128_100644.jpg', NULL, 3, 0, 0),
(76, 'srehman', 'hems.hospital', 'Sehrish Rehman', 'Charge Nurse', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0),
(77, 'salma.', '12345', 'salma mushtaq', 'charge nurse', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(78, 'salo.1234', 'salo.1234', 'salma', 'charge nurse', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(79, 'salma12345', '123456789', 'salma mushtaq', 'charge nurse', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 3, 1, 0),
(80, 'ahmad', 'abc123', 'Muhammad Ahmad', 'Computer Operator', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `ug_id` int(11) NOT NULL,
  `priv_id` int(11) NOT NULL,
  `ug_desc` varchar(255) NOT NULL,
  `allow_user_to_admit` tinyint(1) NOT NULL,
  `view_admitted_patients` tinyint(1) NOT NULL,
  `view_history_and_plan_chart` tinyint(1) NOT NULL,
  `discharge_patients` tinyint(1) NOT NULL,
  `can_book_ot` tinyint(1) NOT NULL,
  `can_view_ot_list` tinyint(1) NOT NULL,
  `view_radiology_section` tinyint(1) NOT NULL,
  `view_ward_bed_list` tinyint(1) NOT NULL,
  `view_statistics` tinyint(1) NOT NULL,
  `view_inventory` tinyint(1) NOT NULL,
  `view_accounts` tinyint(1) NOT NULL,
  `view_configurations` tinyint(1) NOT NULL,
  `view_master_list` tinyint(1) NOT NULL,
  `can_update_patient_record` tinyint(1) NOT NULL,
  `can_update_hp_chart` tinyint(1) NOT NULL,
  `can_revisit` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ug_id`, `priv_id`, `ug_desc`, `allow_user_to_admit`, `view_admitted_patients`, `view_history_and_plan_chart`, `discharge_patients`, `can_book_ot`, `can_view_ot_list`, `view_radiology_section`, `view_ward_bed_list`, `view_statistics`, `view_inventory`, `view_accounts`, `view_configurations`, `view_master_list`, `can_update_patient_record`, `can_update_hp_chart`, `can_revisit`) VALUES
(1, 1, 'Full Access', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 'Limited Access', 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0),
(3, 3, 'No Access', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 4, 'Doctors Access', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1);

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
(20, 10048, '26-6-2018 12:05 PM', '30 -  40', '50', '60', '70', '80', '90', '120', ''),
(22, 10048, '26-6-2018 3:13 PM', '10 - 20', '30', '40', '50', '60', '70', '100', ''),
(24, 10048, '28-6-2018 2:36 PM', '5 - 34', '34', '23', '3', '45', '5', '', ''),
(38, 10809, ' 12:00 AM', '110 - 90', '99', '89', '88', '6', '66', '778', ''),
(39, 10809, '30-6-2018 ', '120 - 79', '77', '65', '45', '5', '52', '25', ''),
(40, 10048, '5-7-2018 10:31 AM', '23 - 23', '34', '45', '56', '67', '67', '54', ''),
(41, 0, '5-7-2018 4:47 PM', '23 - 23', '34', '45', '56', '56', '56', '4', ''),
(42, 10050, '5-7-2018 4:50 PM', '23 - 12', '2', '23', '232', '12', '32', '23', ''),
(43, 10050, '5-7-2018 4:50 PM', '23 - 23', '23', '54', '3', '23', '23', '23', ''),
(45, 0, '6-7-2018 10:20 AM', '22 - 11', '22', '34', '43', '2', '3', '4', ''),
(46, 10051, '6-7-2018 10:21 AM', '21 - 34', '45', '56', '56', '67', '54', '54', ''),
(47, 10051, '6-7-2018 10:21 AM', '43 - 32', '45', '56', '67', '54', '5', '45', ''),
(48, 0, '12-7-2018 4:05 AM', '120 - 90', '25', '55', '55', '4', '55', '44', ''),
(49, 0, '12-7-2018 5:12 PM', '324 - 454', '221', '121', '31313', '213213121', '3213123131', '31313213', ''),
(50, 10060, '12-7-2018 5:13 PM', '121 - 121', '212121', '12121', '12121', '212121', '212121', '2121', ''),
(51, 10048, '13-7-2018 4:49 PM', '2 - 2', '2', '2', '2', '2', '2', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `wardtbl`
--

CREATE TABLE `wardtbl` (
  `wardId` int(11) NOT NULL,
  `wardName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wardtbl`
--

INSERT INTO `wardtbl` (`wardId`, `wardName`) VALUES
(1, 'Male Ward'),
(2, 'Female Ward'),
(3, 'Upper Male Ward'),
(4, 'Side Rooms'),
(5, 'ICU'),
(6, 'Hall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissiontbl`
--
ALTER TABLE `admissiontbl`
  ADD PRIMARY KEY (`regNo`);

--
-- Indexes for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  ADD PRIMARY KEY (`anno_id`);

--
-- Indexes for table `bedtbl`
--
ALTER TABLE `bedtbl`
  ADD PRIMARY KEY (`bedId`);

--
-- Indexes for table `blood_sugartbl`
--
ALTER TABLE `blood_sugartbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charttbl`
--
ALTER TABLE `charttbl`
  ADD PRIMARY KEY (`chartId`);

--
-- Indexes for table `consent_operationtbl`
--
ALTER TABLE `consent_operationtbl`
  ADD PRIMARY KEY (`consentOpNo`);

--
-- Indexes for table `daily_reporttbl`
--
ALTER TABLE `daily_reporttbl`
  ADD PRIMARY KEY (`drp_id`);

--
-- Indexes for table `dischargetbl`
--
ALTER TABLE `dischargetbl`
  ADD PRIMARY KEY (`discharge_id`);

--
-- Indexes for table `diseasetbl`
--
ALTER TABLE `diseasetbl`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `expense_categorytbl`
--
ALTER TABLE `expense_categorytbl`
  ADD PRIMARY KEY (`categoryNo`);

--
-- Indexes for table `hospital_expensetbl`
--
ALTER TABLE `hospital_expensetbl`
  ADD PRIMARY KEY (`expNo`);

--
-- Indexes for table `invoicetbl`
--
ALTER TABLE `invoicetbl`
  ADD PRIMARY KEY (`invoiceNo`);

--
-- Indexes for table `invoice_detailtbl`
--
ALTER TABLE `invoice_detailtbl`
  ADD PRIMARY KEY (`detailNo`);

--
-- Indexes for table `menu_child`
--
ALTER TABLE `menu_child`
  ADD PRIMARY KEY (`child_menu_id`);

--
-- Indexes for table `menu_parent`
--
ALTER TABLE `menu_parent`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_sub_child`
--
ALTER TABLE `menu_sub_child`
  ADD PRIMARY KEY (`subchildId`);

--
-- Indexes for table `operationtheatretbl`
--
ALTER TABLE `operationtheatretbl`
  ADD PRIMARY KEY (`otBookingNo`);

--
-- Indexes for table `otwardtbl`
--
ALTER TABLE `otwardtbl`
  ADD PRIMARY KEY (`otwardId`);

--
-- Indexes for table `patients_accounttbl`
--
ALTER TABLE `patients_accounttbl`
  ADD PRIMARY KEY (`patientAccountNo`);

--
-- Indexes for table `patients_expensetbl`
--
ALTER TABLE `patients_expensetbl`
  ADD PRIMARY KEY (`expenseNo`);

--
-- Indexes for table `patients_paymenttbl`
--
ALTER TABLE `patients_paymenttbl`
  ADD PRIMARY KEY (`paymentNo`);

--
-- Indexes for table `post_operative_instructionstbl`
--
ALTER TABLE `post_operative_instructionstbl`
  ADD PRIMARY KEY (`postOpINo`);

--
-- Indexes for table `preoperative_ordertbl`
--
ALTER TABLE `preoperative_ordertbl`
  ADD PRIMARY KEY (`preOpONo`);

--
-- Indexes for table `prescriptiontbl`
--
ALTER TABLE `prescriptiontbl`
  ADD PRIMARY KEY (`rxNo`);

--
-- Indexes for table `prescription_descriptiontbl`
--
ALTER TABLE `prescription_descriptiontbl`
  ADD PRIMARY KEY (`rxDesNo`);

--
-- Indexes for table `pre_op_checklist`
--
ALTER TABLE `pre_op_checklist`
  ADD PRIMARY KEY (`preOpCLid`);

--
-- Indexes for table `pre_op_fitnesstbl`
--
ALTER TABLE `pre_op_fitnesstbl`
  ADD PRIMARY KEY (`preOpFNo`);

--
-- Indexes for table `producttbl`
--
ALTER TABLE `producttbl`
  ADD PRIMARY KEY (`productNo`);

--
-- Indexes for table `product_categorytbl`
--
ALTER TABLE `product_categorytbl`
  ADD PRIMARY KEY (`categNo`);

--
-- Indexes for table `receiving_patient_ottbl`
--
ALTER TABLE `receiving_patient_ottbl`
  ADD PRIMARY KEY (`recPatOtNo`);

--
-- Indexes for table `reportstbl`
--
ALTER TABLE `reportstbl`
  ADD PRIMARY KEY (`reportId`);

--
-- Indexes for table `shifttbl`
--
ALTER TABLE `shifttbl`
  ADD PRIMARY KEY (`shiftId`);

--
-- Indexes for table `surgical_checklisttbl`
--
ALTER TABLE `surgical_checklisttbl`
  ADD PRIMARY KEY (`surgicalSCNo`);

--
-- Indexes for table `unittbl`
--
ALTER TABLE `unittbl`
  ADD PRIMARY KEY (`unitId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`ug_id`);

--
-- Indexes for table `vitals_sheettbl`
--
ALTER TABLE `vitals_sheettbl`
  ADD PRIMARY KEY (`vital_id`);

--
-- Indexes for table `wardtbl`
--
ALTER TABLE `wardtbl`
  ADD PRIMARY KEY (`wardId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissiontbl`
--
ALTER TABLE `admissiontbl`
  MODIFY `regNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10809;

--
-- AUTO_INCREMENT for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  MODIFY `anno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bedtbl`
--
ALTER TABLE `bedtbl`
  MODIFY `bedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=863;

--
-- AUTO_INCREMENT for table `blood_sugartbl`
--
ALTER TABLE `blood_sugartbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `charttbl`
--
ALTER TABLE `charttbl`
  MODIFY `chartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT for table `consent_operationtbl`
--
ALTER TABLE `consent_operationtbl`
  MODIFY `consentOpNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `daily_reporttbl`
--
ALTER TABLE `daily_reporttbl`
  MODIFY `drp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dischargetbl`
--
ALTER TABLE `dischargetbl`
  MODIFY `discharge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `diseasetbl`
--
ALTER TABLE `diseasetbl`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `expense_categorytbl`
--
ALTER TABLE `expense_categorytbl`
  MODIFY `categoryNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital_expensetbl`
--
ALTER TABLE `hospital_expensetbl`
  MODIFY `expNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoicetbl`
--
ALTER TABLE `invoicetbl`
  MODIFY `invoiceNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_detailtbl`
--
ALTER TABLE `invoice_detailtbl`
  MODIFY `detailNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `child_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu_parent`
--
ALTER TABLE `menu_parent`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_sub_child`
--
ALTER TABLE `menu_sub_child`
  MODIFY `subchildId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `operationtheatretbl`
--
ALTER TABLE `operationtheatretbl`
  MODIFY `otBookingNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `otwardtbl`
--
ALTER TABLE `otwardtbl`
  MODIFY `otwardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients_accounttbl`
--
ALTER TABLE `patients_accounttbl`
  MODIFY `patientAccountNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients_expensetbl`
--
ALTER TABLE `patients_expensetbl`
  MODIFY `expenseNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients_paymenttbl`
--
ALTER TABLE `patients_paymenttbl`
  MODIFY `paymentNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_operative_instructionstbl`
--
ALTER TABLE `post_operative_instructionstbl`
  MODIFY `postOpINo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `preoperative_ordertbl`
--
ALTER TABLE `preoperative_ordertbl`
  MODIFY `preOpONo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prescriptiontbl`
--
ALTER TABLE `prescriptiontbl`
  MODIFY `rxNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_descriptiontbl`
--
ALTER TABLE `prescription_descriptiontbl`
  MODIFY `rxDesNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_op_checklist`
--
ALTER TABLE `pre_op_checklist`
  MODIFY `preOpCLid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pre_op_fitnesstbl`
--
ALTER TABLE `pre_op_fitnesstbl`
  MODIFY `preOpFNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `producttbl`
--
ALTER TABLE `producttbl`
  MODIFY `productNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categorytbl`
--
ALTER TABLE `product_categorytbl`
  MODIFY `categNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receiving_patient_ottbl`
--
ALTER TABLE `receiving_patient_ottbl`
  MODIFY `recPatOtNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reportstbl`
--
ALTER TABLE `reportstbl`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shifttbl`
--
ALTER TABLE `shifttbl`
  MODIFY `shiftId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surgical_checklisttbl`
--
ALTER TABLE `surgical_checklisttbl`
  MODIFY `surgicalSCNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unittbl`
--
ALTER TABLE `unittbl`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `ug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vitals_sheettbl`
--
ALTER TABLE `vitals_sheettbl`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `wardtbl`
--
ALTER TABLE `wardtbl`
  MODIFY `wardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
