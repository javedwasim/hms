-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 08:00 AM
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
-- Table structure for table `admissiontbl`
--

CREATE TABLE `admissiontbl` (
  `regNo` int(11) NOT NULL,
  `patName` varchar(255) NOT NULL,
  `patNoKType` varchar(255) NOT NULL,
  `patNoK` varchar(255) NOT NULL,
  `patDoB` varchar(255) NOT NULL,
  `patAge` int(11) DEFAULT NULL,
  `patBldGrp` varchar(255) NOT NULL,
  `patDisease_id` int(11) NOT NULL,
  `patSex` varchar(255) NOT NULL,
  `patCNIC` varchar(255) NOT NULL,
  `patAddress` varchar(255) NOT NULL,
  `patOccupation` varchar(255) NOT NULL,
  `patPhone` int(11) NOT NULL,
  `patEntitled` varchar(255) NOT NULL,
  `patunit_Id` varchar(255) NOT NULL,
  `patShiftedFrom` varchar(255) NOT NULL,
  `patward_id` int(11) NOT NULL,
  `patbed_id` int(11) NOT NULL,
  `patAdmDate` varchar(255) NOT NULL,
  `patChart_id` int(11) NOT NULL,
  `patStatus` varchar(255) NOT NULL,
  `patient_pic_path` varchar(255) DEFAULT 'person.jpg',
  `FreeCarePatient` tinyint(1) NOT NULL,
  `admission_timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `previousRegno` varchar(255) DEFAULT NULL,
  `sideRoomDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admissiontbl`
--

INSERT INTO `admissiontbl` (`regNo`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patOccupation`, `patPhone`, `patEntitled`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patAdmDate`, `patChart_id`, `patStatus`, `patient_pic_path`, `FreeCarePatient`, `admission_timestamp`, `previousRegno`, `sideRoomDate`) VALUES
(10001, 'Ahmad', 'S/O', 'Hamaza', '07-11-2017', 0, 'B+VE', 1, 'Male', '88753-4657364-7', 'efsfdsdfdsf', 'sfdsdsfsdf', 2147483647, 'No', 'Emergency', 'kwrfsdjgsf', 3, 43, '4-4-2018 10:40 AM', 22, 'Under Treatment', 'person.jpg', 0, '2018-04-04 10:41:25', NULL, NULL);

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
(1, 1, 1, 'Available'),
(2, 2, 1, 'Available'),
(3, 3, 1, 'Available'),
(4, 4, 1, 'Available'),
(5, 5, 1, 'Available'),
(6, 6, 1, 'Available'),
(7, 7, 1, 'Available'),
(8, 8, 1, 'Available'),
(9, 9, 1, 'Available'),
(10, 10, 1, 'Available'),
(11, 11, 1, 'Available'),
(12, 12, 1, 'Available'),
(13, 13, 1, 'Available'),
(14, 14, 1, 'Available'),
(15, 15, 1, 'Available'),
(16, 16, 1, 'Available'),
(17, 17, 1, 'Available'),
(18, 18, 1, 'Available'),
(19, 19, 1, 'Available'),
(20, 20, 1, 'Available'),
(21, 1, 2, 'Available'),
(22, 2, 2, 'Available'),
(23, 3, 2, 'Available'),
(24, 4, 2, 'Available'),
(25, 5, 2, 'Available'),
(26, 6, 2, 'Available'),
(27, 7, 2, 'Available'),
(28, 8, 2, 'Available'),
(29, 9, 2, 'Available'),
(30, 10, 2, 'Available'),
(31, 11, 2, 'Available'),
(32, 12, 2, 'Available'),
(33, 13, 2, 'Available'),
(34, 14, 2, 'Available'),
(35, 15, 2, 'Available'),
(36, 16, 2, 'Available'),
(37, 17, 2, 'Available'),
(38, 18, 2, 'Available'),
(39, 19, 2, 'Available'),
(40, 20, 2, 'Available'),
(41, 1, 3, 'Available'),
(42, 2, 3, 'Available'),
(43, 3, 3, 'Occupied'),
(44, 4, 3, 'Available'),
(45, 5, 3, 'Available'),
(46, 6, 3, 'Available'),
(47, 7, 3, 'Available'),
(48, 8, 3, 'Available'),
(49, 9, 3, 'Available'),
(50, 10, 3, 'Available'),
(51, 11, 3, 'Available'),
(52, 12, 3, 'Available'),
(53, 13, 3, 'Available'),
(54, 14, 3, 'Available'),
(55, 15, 3, 'Available'),
(56, 16, 3, 'Available'),
(57, 17, 3, 'Available'),
(58, 18, 3, 'Available'),
(59, 19, 3, 'Available'),
(60, 20, 3, 'Available'),
(61, 1, 4, 'Available'),
(62, 2, 4, 'Available'),
(63, 3, 4, 'Available'),
(64, 4, 4, 'Available'),
(65, 5, 4, 'Available'),
(66, 6, 4, 'Available'),
(67, 7, 4, 'Available'),
(68, 8, 4, 'Available'),
(69, 9, 4, 'Available'),
(70, 10, 4, 'Available'),
(71, 1, 5, 'Available'),
(72, 2, 5, 'Available'),
(73, 3, 5, 'Available'),
(74, 4, 5, 'Available'),
(75, 5, 5, 'Available'),
(76, 6, 5, 'Available'),
(77, 7, 5, 'Available'),
(78, 8, 5, 'Available'),
(79, 1, 6, 'Available'),
(80, 2, 6, 'Available'),
(81, 3, 6, 'Available'),
(82, 4, 6, 'Available'),
(84, 5, 6, 'Available'),
(86, 6, 6, 'Available'),
(87, 7, 6, 'Available'),
(88, 8, 6, 'Available'),
(92, 22, 1, 'Extra Bed'),
(93, 21, 2, 'Extra Bed'),
(98, 22, 2, 'Extra Bed'),
(99, 23, 2, 'Extra Bed'),
(100, 24, 2, 'Extra Bed'),
(101, 25, 2, 'Extra Bed'),
(102, 26, 2, 'Extra Bed'),
(103, 27, 2, 'Extra Bed'),
(104, 28, 2, 'Extra Bed'),
(105, 29, 2, 'Extra Bed'),
(106, 30, 2, 'Extra Bed'),
(107, 31, 2, 'Extra Bed'),
(108, 32, 2, 'Extra Bed'),
(115, 33, 2, 'Extra Bed'),
(116, 34, 2, 'Extra Bed'),
(117, 35, 2, 'Extra Bed'),
(118, 36, 2, 'Extra Bed'),
(119, 37, 2, 'Extra Bed'),
(122, 23, 1, 'Extra Bed'),
(123, 24, 1, 'Extra Bed');

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
(10, 10051, 'Test', '', '', '2018-03-03 08:21:20', 'Dr. Muhammad Arshad Ch');

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

-- --------------------------------------------------------

--
-- Table structure for table `dischargetbl`
--

CREATE TABLE `dischargetbl` (
  `discharge_id` int(11) NOT NULL,
  `regNo` int(11) NOT NULL,
  `patName` varchar(255) NOT NULL,
  `patNoKType` varchar(255) NOT NULL,
  `patNoK` varchar(255) NOT NULL,
  `patDoB` date NOT NULL,
  `patAge` int(11) NOT NULL,
  `patBldGrp` varchar(255) NOT NULL,
  `patDisease_id` int(11) NOT NULL,
  `patSex` varchar(255) NOT NULL,
  `patCNIC` varchar(255) NOT NULL,
  `patAddress` varchar(255) NOT NULL,
  `patOccupation` varchar(255) NOT NULL,
  `patPhone` int(11) NOT NULL,
  `patEntitled` varchar(255) NOT NULL,
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
  `patient_pic_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dischargetbl`
--

INSERT INTO `dischargetbl` (`discharge_id`, `regNo`, `patName`, `patNoKType`, `patNoK`, `patDoB`, `patAge`, `patBldGrp`, `patDisease_id`, `patSex`, `patCNIC`, `patAddress`, `patOccupation`, `patPhone`, `patEntitled`, `patunit_Id`, `patShiftedFrom`, `patward_id`, `patbed_id`, `patAdmDate`, `patChart_id`, `patStatus`, `discharge_timestamp`, `discharge_advice`, `FreeCarePatient`, `previousRegno`, `patient_pic_path`) VALUES
(2, 10048, 'Ashir', 'S/O', 'Rehmat mashi', '0000-00-00', 25, 'A+VE', 8, 'Male', '31202- 029336-3', 'Railway station bwp', 'Labour', 2147483647, 'No', 'Emergency', 'Cod', 1, 1, '31/1/2018', 22, 'Discharged', '2018-03-22 11:29:06', 'gfgdgdg', 0, '', 'person.jpg'),
(3, 10051, 'Mehmood', 'S/O', 'Azeem khan', '0000-00-00', 96, 'A+VE', 7, 'Male', '36602-9911176-9', 'Vehari', 'Labour', 2147483647, 'No', 'Emergency', 'Cod', 1, 3, '21-2-2018 10:34 AM', 22, 'Discharged', '2018-03-31 13:41:32', 'sdfdfsdfsdf', 0, '', ''),
(4, 10050, 'Abu Bakar', 'S/O', 'Muneer Ahmad', '0000-00-00', 13, 'A+VE', 1, 'Male', '42201-1907548-9', 'Bahawalnagar', 'None', 2147483647, 'No', 'Emergency', 'Emergency', 1, 2, '22-2-2018 10:29 AM', 22, 'Discharged', '2018-04-02 14:44:57', 'jhdjkfhsdkjfhjkds', 0, '', ''),
(6, 10052, 'Ahmad', 'S/O', 'Danial', '0000-00-00', 0, 'B+VE', 2, 'Male', '87768-7686867-6', 'bwp', 'cvxvxv', 2147483647, 'No', 'OPD', 'opd', 1, 5, '2-4-2018 02:49 PM', 22, 'Discharged', '2018-04-02 15:06:12', 'loiweshkhkgjhdkjfhgkjd', 0, '', 'person.jpg'),
(7, 10053, 'Smith', 'S/O', 'fddfg', '0000-00-00', 0, 'B+VE', 1, 'Male', '54645-6546456-4', '75 Oakdale Ave S', 'dfgdfgdfg', 2147483647, 'No', 'OPD', 'dgdfg', 1, 3, '2-4-2018 03:08 PM', 22, 'Discharged', '2018-04-03 11:51:09', 'khkjhasjkhdjkh', 0, '', 'person.jpg'),
(10, 10054, 'Smith', 'S/O', 'Wynaba', '0000-00-00', 3, 'A-VE', 2, 'Male', '34687-2367856-7', '75 Oakdale Ave S', 'ieyriuyweiyri', 2147483647, 'No', 'OPD', 'serre', 4, 66, '3-4-2018 11:51 AM', 22, 'Discharged', '2018-04-03 12:11:33', 'fghfhfghfghfg', 0, '', 'person.jpg'),
(11, 10055, 'Salman', 'S/O', 'Ahmad', '0000-00-00', 0, 'B+VE', 1, 'Male', '78378-3457637-8', 'jghjhsdjvhjdgxj', 'fdgdfgdfgdfg635678346587', 2147483647, 'No', 'OPD', 'gfgh', 4, 65, '3-4-2018 12:16 PM', 22, 'Discharged', '2018-04-03 12:18:19', 'kdfjgjhdhv', 0, '', 'person.jpg'),
(12, 10056, 'Hassan', 'S/O', 'isufkhskjf', '0000-00-00', 7, 'A-VE', 2, 'Male', '75356-3465362-5', 'uyfhfjfj', 'hfjhghjgjh', 2147483647, 'No', 'OPD', 'gdfhg', 4, 62, '3-4-2018 12:49 PM', 22, 'Discharged', '2018-04-03 12:51:24', 'dgfhfgjfgjfjf', 0, '', 'person.jpg'),
(13, 10057, 'Ahmad ', 'S/O', 'Ali', '0000-00-00', 7, 'A-VE', 2, 'Male', '73762-3746827-3', 'jgjhgjhgjh', '7867gjghj', 2147483647, 'No', 'OPD', 'gsdgsdjfghj', 4, 64, '3-4-2018 01:05 PM', 22, 'Discharged', '2018-04-03 15:28:36', 'gdkbgbdf', 0, '', 'person.jpg'),
(14, 10058, 'jdvbhj', 'S/O', 'hjghjghjghj', '0000-00-00', 0, 'B+VE', 2, 'Male', '34332-5345345-3', 'fdfghgfdggfddfd', 'fdfdkhjkvbdfjk', 2147483647, 'No', 'OPD', 'sdfsd', 4, 63, '3-4-2018 03:33 PM', 22, 'Discharged', '2018-04-03 15:35:14', 'tetfersdesd', 1, '', 'person.jpg');

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
(47, 'Aneurysm');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categorytbl`
--

CREATE TABLE `expense_categorytbl` (
  `categoryNo` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'Ward/ Beds List', 'dashboard/bedslist', 5),
(11, 'Re-Admit Patient', 'dashboard/patient_revisit', 2),
(15, 'Add Expenses', 'dashboard/add_expense', 7),
(16, 'View Expenses', 'dashboard/view_expense', 7),
(17, 'Patient Account', '', 6),
(18, 'Hospital Expense', '', 6),
(19, 'Pharmacy', '', 8);

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
  `formatted_date_of_op` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `shifttbl`
--

INSERT INTO `shifttbl` (`shiftId`, `shiftFrom`, `shiftTo`, `shiftPatId`, `patOutcome`, `shiftBy`, `shiftedTime`) VALUES
(1, 'OPD', 'dsdfnbsdfh', 10055, 'Discharged', 'kjbmjbfxmv', '2018-04-03 12:18:19');

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
(1, 10048, 2, '16-3-2018 10:25 AM', 'false', 'false', 'false', 'Yes', 'Yes', 'Yes', 'true', 'false', 'false', 'true', 'true', 'true', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', '1');

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
(4, 'admin', 'test', 'Dr. Muhammad Arshad Ch', 'Professor, Head of Department', 'FCPS (Neurosurgery) Fellow of Spine Surgery (Singapore)', '03088886964', 'user2-160x160.jpg', 'Neurosurgery', 1, 1, 0),
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
(76, 'srehman', 'hems.hospital', 'Sehrish Rehman', 'Charge Nurse', 'MBBS', '00000000000', 'user2-160x160.jpg', NULL, 2, 1, 0);

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
(2, 2, 'Limited Access', 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0),
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
(2, 10048, '24-3-2018 03:25 PM', 'SYS: 140 - DIA: 80', '60', '98', '50', '5 feet 11 inches', '89 kg', '45', '5');

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
  MODIFY `regNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  MODIFY `anno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bedtbl`
--
ALTER TABLE `bedtbl`
  MODIFY `bedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `charttbl`
--
ALTER TABLE `charttbl`
  MODIFY `chartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `consent_operationtbl`
--
ALTER TABLE `consent_operationtbl`
  MODIFY `consentOpNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dischargetbl`
--
ALTER TABLE `dischargetbl`
  MODIFY `discharge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diseasetbl`
--
ALTER TABLE `diseasetbl`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `expense_categorytbl`
--
ALTER TABLE `expense_categorytbl`
  MODIFY `categoryNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_expensetbl`
--
ALTER TABLE `hospital_expensetbl`
  MODIFY `expNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicetbl`
--
ALTER TABLE `invoicetbl`
  MODIFY `invoiceNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_detailtbl`
--
ALTER TABLE `invoice_detailtbl`
  MODIFY `detailNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `child_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu_parent`
--
ALTER TABLE `menu_parent`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu_sub_child`
--
ALTER TABLE `menu_sub_child`
  MODIFY `subchildId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `operationtheatretbl`
--
ALTER TABLE `operationtheatretbl`
  MODIFY `otBookingNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otwardtbl`
--
ALTER TABLE `otwardtbl`
  MODIFY `otwardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients_accounttbl`
--
ALTER TABLE `patients_accounttbl`
  MODIFY `patientAccountNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients_expensetbl`
--
ALTER TABLE `patients_expensetbl`
  MODIFY `expenseNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients_paymenttbl`
--
ALTER TABLE `patients_paymenttbl`
  MODIFY `paymentNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_operative_instructionstbl`
--
ALTER TABLE `post_operative_instructionstbl`
  MODIFY `postOpINo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preoperative_ordertbl`
--
ALTER TABLE `preoperative_ordertbl`
  MODIFY `preOpONo` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `pre_op_fitnesstbl`
--
ALTER TABLE `pre_op_fitnesstbl`
  MODIFY `preOpFNo` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `recPatOtNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportstbl`
--
ALTER TABLE `reportstbl`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifttbl`
--
ALTER TABLE `shifttbl`
  MODIFY `shiftId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surgical_checklisttbl`
--
ALTER TABLE `surgical_checklisttbl`
  MODIFY `surgicalSCNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unittbl`
--
ALTER TABLE `unittbl`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `ug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vitals_sheettbl`
--
ALTER TABLE `vitals_sheettbl`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wardtbl`
--
ALTER TABLE `wardtbl`
  MODIFY `wardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
