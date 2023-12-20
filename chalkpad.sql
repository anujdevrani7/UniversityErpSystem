-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 05:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chalkpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `email`, `image`, `f_name`, `address`, `mobile`) VALUES
(2110992515, 'Kamal Thakur', 'anuj12', 'anujdevrani007@gmail.com', '../image/admin-images/2110992515.jpeg', 'Abhay Raag Singh Thakur', 'chandigarh', '8439660115');

-- --------------------------------------------------------

--
-- Table structure for table `admin_otp`
--

CREATE TABLE `admin_otp` (
  `otp` int(7) NOT NULL,
  `verify` int(5) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_otp`
--

INSERT INTO `admin_otp` (`otp`, `verify`, `uid`) VALUES
(479334, 1, 2110992515),
(791075, 0, 2110992515),
(598944, 0, 2110992515),
(867779, 0, 2110992515),
(134461, 0, 2110992515),
(557552, 0, 2110992515),
(697993, 0, 2110992515),
(616731, 0, 2110992515),
(716480, 0, 2110992515),
(118376, 0, 2110992515),
(255329, 0, 2110992515),
(115964, 0, 2110992515),
(671966, 0, 2110992515),
(144809, 1, 2110992515),
(885445, 1, 2110992515),
(606596, 1, 2110992515),
(838494, 1, 2110992515),
(130008, 1, 2110992515),
(163736, 1, 2110992515),
(277163, 1, 2110992515),
(760750, 1, 2110992515),
(439309, 1, 2110992515),
(223471, 1, 2110992515),
(770598, 1, 2110992515),
(551604, 1, 2110992515),
(446077, 1, 2110992515),
(389543, 1, 2110992515),
(798281, 1, 2110992515),
(726304, 1, 2110992515),
(825559, 1, 2110992515),
(742090, 1, 2110992515),
(859341, 1, 2110992515),
(880723, 1, 2110992515),
(519633, 1, 2110992515),
(564036, 1, 2110992515),
(548768, 1, 2110992515),
(861961, 1, 2110992515),
(200016, 1, 2110992515),
(686265, 1, 2110992515),
(837830, 1, 2110992515),
(865629, 1, 2110992515),
(566874, 1, 2110992515),
(237422, 1, 2110992515),
(530901, 1, 2110992515),
(923046, 1, 2110992515),
(739442, 1, 2110992515),
(575195, 1, 2110992515),
(503367, 1, 2110992515),
(426257, 0, 2110992515),
(298623, 1, 2110992515),
(241695, 0, 2110992515),
(275253, 1, 2110992515),
(443542, 1, 2110992515),
(456776, 1, 2110992515),
(590908, 1, 2110992515),
(908637, 1, 2110992515),
(661601, 1, 2110992515),
(111380, 1, 2110992515),
(215640, 1, 2110992515),
(514517, 1, 2110992515),
(518409, 0, 2110992515),
(268371, 1, 2110992515),
(858338, 0, 2110992515),
(313680, 1, 2110992515),
(665057, 0, 2110992515),
(494329, 1, 2110992515),
(395446, 1, 2110992515),
(905286, 1, 2110992515),
(240964, 0, 2110992515),
(319757, 1, 2110992515),
(424399, 1, 2110992515),
(655978, 1, 2110992515),
(283391, 1, 2110992515),
(144948, 1, 2110992515),
(255864, 0, 2110992515),
(258045, 1, 2110992515),
(631265, 1, 2110992515),
(323842, 1, 2110992515),
(287170, 1, 2110992515),
(648211, 1, 2110992515),
(386266, 1, 2110992515),
(907584, 1, 2110992515),
(131828, 1, 2110992515),
(157401, 1, 2110992515),
(806306, 1, 2110992515),
(462418, 0, 2110992515),
(625464, 1, 2110992515),
(785533, 0, 2110992515),
(724672, 1, 2110992515),
(983876, 0, 2110992515),
(221522, 1, 2110992515),
(712025, 1, 2110992515),
(411445, 1, 2110992515),
(138073, 1, 2110992515),
(581007, 0, 2110992515),
(911558, 0, 2110992515),
(170845, 1, 2110992515),
(268512, 1, 2110992515),
(507013, 1, 2110992515),
(686899, 1, 2110992515),
(722962, 1, 2110992515),
(844320, 1, 2110992515),
(171480, 1, 2110992515),
(799885, 1, 2110992515),
(697837, 1, 2110992515),
(802362, 1, 2110992515),
(860076, 0, 2110992515),
(601591, 1, 2110992515),
(171578, 1, 2110992515),
(547727, 1, 2110992515),
(722350, 1, 2110992515),
(247181, 1, 2110992515),
(713135, 1, 2110992515),
(898045, 1, 2110992515),
(491116, 1, 2110992515),
(960168, 1, 2110992515),
(685795, 1, 2110992515),
(461292, 1, 2110992515),
(678934, 1, 2110992515),
(500437, 0, 2110992515),
(965380, 0, 2110992515),
(167584, 1, 2110992515),
(621806, 1, 2110992515),
(463724, 1, 2110992515),
(842287, 0, 2110992515),
(598230, 1, 2110992515),
(674742, 1, 2110992515),
(644025, 1, 2110992515),
(261597, 1, 2110992515),
(268070, 1, 2110992515),
(598065, 1, 2110992515),
(956195, 1, 2110992515),
(721932, 1, 2110992515),
(732474, 1, 2110992515),
(126916, 1, 2110992515),
(197518, 0, 2110992515),
(291631, 1, 2110992515),
(589587, 1, 2110992515),
(700552, 1, 2110992515),
(939281, 0, 2110992515),
(373425, 1, 2110992515),
(214086, 1, 2110992515),
(679635, 1, 2110992515),
(866719, 1, 2110992515);

-- --------------------------------------------------------

--
-- Table structure for table `attandence_detail`
--

CREATE TABLE `attandence_detail` (
  `sid` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `subject_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attandence_detail`
--

INSERT INTO `attandence_detail` (`sid`, `department`, `semester`, `date`, `time`, `status`, `subject_name`) VALUES
('UESBCA112', 'BCA', '1', '22/10/23', '', 'absent', 'java'),
('UESBCA115', 'BCA', '1', '22/10/23', '', 'absent', 'java'),
('UESBCA116', 'BCA', '1', '22/10/23', '', 'absent', 'java'),
('UESBCA117', 'BCA', '1', '22/10/23', '', 'absent', 'java'),
('UESBCA118', 'BCA', '1', '22/10/23', '', 'absent', 'java'),
('UESBCA1110', 'BCA', '1', '22/10/23', '', 'absent', 'java'),
('UESBCA112', 'BCA', '1', '22/10/23', '', 'absent', 'data-structure'),
('UESBCA115', 'BCA', '1', '22/10/23', '', 'absent', 'data-structure'),
('UESBCA116', 'BCA', '1', '22/10/23', '', 'absent', 'data-structure'),
('UESBCA117', 'BCA', '1', '22/10/23', '', 'absent', 'data-structure'),
('UESBCA118', 'BCA', '1', '22/10/23', '', 'absent', 'data-structure'),
('UESBCA1110', 'BCA', '1', '22/10/23', '', 'absent', 'data-structure'),
('UESBCA112', 'BCA', '1', '22/10/23', '', 'present', 'java'),
('UESBCA115', 'BCA', '1', '22/10/23', '', 'present', 'java'),
('UESBCA116', 'BCA', '1', '22/10/23', '', 'present', 'java'),
('UESBCA117', 'BCA', '1', '22/10/23', '', 'present', 'java'),
('UESBCA118', 'BCA', '1', '22/10/23', '', 'present', 'java'),
('UESBCA1110', 'BCA', '1', '22/10/23', '', 'present', 'java'),
('UESBCA112', 'BCA', '1', '22/10/23', '', 'present', 'data-structure'),
('UESBCA115', 'BCA', '1', '22/10/23', '', 'present', 'data-structure'),
('UESBCA116', 'BCA', '1', '22/10/23', '', 'present', 'data-structure'),
('UESBCA117', 'BCA', '1', '22/10/23', '', 'present', 'data-structure'),
('UESBCA118', 'BCA', '1', '22/10/23', '', 'present', 'data-structure'),
('UESBCA1110', 'BCA', '1', '22/10/23', '', 'present', 'data-structure'),
('UESBCA112', 'BCA', '1', '22/10/23', '', 'present', 'cpp'),
('UESBCA115', 'BCA', '1', '22/10/23', '', 'present', 'cpp'),
('UESBCA116', 'BCA', '1', '22/10/23', '', 'present', 'cpp'),
('UESBCA117', 'BCA', '1', '22/10/23', '', 'present', 'cpp'),
('UESBCA118', 'BCA', '1', '22/10/23', '', 'present', 'cpp'),
('UESBCA1110', 'BCA', '1', '22/10/23', '', 'present', 'cpp'),
('UESBCA112', 'BCA', '1', '22/10/23', '', 'absent', 'cpp'),
('UESBCA115', 'BCA', '1', '22/10/23', '', 'absent', 'cpp'),
('UESBCA116', 'BCA', '1', '22/10/23', '', 'absent', 'cpp'),
('UESBCA117', 'BCA', '1', '22/10/23', '', 'absent', 'cpp'),
('UESBCA118', 'BCA', '1', '22/10/23', '', 'absent', 'cpp'),
('UESBCA1110', 'BCA', '1', '22/10/23', '', 'absent', 'cpp'),
('UESBCA112', 'BCA', '1', '23/10/23', '', 'present', 'data-structure'),
('UESBCA115', 'BCA', '1', '23/10/23', '', 'present', 'data-structure'),
('UESBCA116', 'BCA', '1', '23/10/23', '', 'present', 'data-structure'),
('UESBCA117', 'BCA', '1', '23/10/23', '', 'present', 'data-structure'),
('UESBCA118', 'BCA', '1', '23/10/23', '', 'present', 'data-structure'),
('UESBCA1110', 'BCA', '1', '23/10/23', '', 'present', 'data-structure'),
('UESBCA112', 'BCA', '1', '23/10/23', '', 'present', 'java'),
('UESBCA115', 'BCA', '1', '23/10/23', '', 'present', 'java'),
('UESBCA116', 'BCA', '1', '23/10/23', '', 'present', 'java'),
('UESBCA117', 'BCA', '1', '23/10/23', '', 'present', 'java'),
('UESBCA118', 'BCA', '1', '23/10/23', '', 'present', 'java'),
('UESBCA1110', 'BCA', '1', '23/10/23', '', 'present', 'java'),
('UESBCA112', 'BCA', '1', '26/10/23', '', 'absent', 'java'),
('UESBCA115', 'BCA', '1', '26/10/23', '', 'absent', 'java'),
('UESBCA116', 'BCA', '1', '26/10/23', '', 'absent', 'java'),
('UESBCA117', 'BCA', '1', '26/10/23', '', 'absent', 'java'),
('UESBCA118', 'BCA', '1', '26/10/23', '', 'absent', 'java'),
('UESBCA119', 'BCA', '1', '26/10/23', '', 'absent', 'java'),
('UESBCA1110', 'BCA', '1', '26/10/23', '', 'absent', 'java'),
('UESChoose...1114', 'BCA', '1', '26/10/23', '', 'present', 'java'),
('UESBCA112', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESBCA115', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESBCA116', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESBCA117', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESBCA118', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESBCA119', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESBCA1110', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESChoose...1114', 'BCA', '1', '29/10/23', '', 'absent', 'java'),
('UESBCA112', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESBCA115', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESBCA116', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESBCA117', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESBCA118', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESBCA119', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESBCA1110', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESChoose...1114', 'BCA', '1', '29/10/23', '', 'present', 'data-structure'),
('UESBCA112', 'BCA', '1', '21/11/23', '', 'present', 'data-structure'),
('UESBCA115', 'BCA', '1', '21/11/23', '', 'absent', 'data-structure'),
('UESBCA116', 'BCA', '1', '21/11/23', '', 'absent', 'data-structure'),
('UESBCA117', 'BCA', '1', '21/11/23', '', 'absent', 'data-structure'),
('UESBCA118', 'BCA', '1', '21/11/23', '', 'absent', 'data-structure'),
('UESBCA119', 'BCA', '1', '21/11/23', '', 'absent', 'data-structure'),
('UESBCA1110', 'BCA', '1', '21/11/23', '', 'present', 'data-structure'),
('UESChoose...1114', 'BCA', '1', '21/11/23', '', 'absent', 'data-structure'),
('UESBCA112', 'BCA', '1', '24/11/23', '', 'present', 'core-java'),
('UESBCA115', 'BCA', '1', '24/11/23', '', 'present', 'core-java'),
('UESBCA116', 'BCA', '1', '24/11/23', '', 'present', 'core-java'),
('UESBCA117', 'BCA', '1', '24/11/23', '', 'present', 'core-java'),
('UESBCA118', 'BCA', '1', '24/11/23', '', 'present', 'core-java'),
('UESBCA119', 'BCA', '1', '24/11/23', '', 'present', 'core-java'),
('UESBCA1110', 'BCA', '1', '24/11/23', '', 'present', 'core-java'),
('UESBCA112', 'BCA', '1', '2023-11-25', '', 'present', 'java'),
('UESBCA115', 'BCA', '1', '2023-11-25', '', 'present', 'java'),
('UESBCA116', 'BCA', '1', '2023-11-25', '', 'present', 'java'),
('UESBCA117', 'BCA', '1', '2023-11-25', '', 'present', 'java'),
('UESBCA118', 'BCA', '1', '2023-11-25', '', 'present', 'java'),
('UESBCA119', 'BCA', '1', '2023-11-25', '', 'present', 'java'),
('UESBCA1110', 'BCA', '1', '2023-11-25', '', 'present', 'java'),
('UESBCA112', 'BCA', '1', '2023-11-18', '', 'absent', 'java'),
('UESBCA115', 'BCA', '1', '2023-11-18', '', 'absent', 'java'),
('UESBCA116', 'BCA', '1', '2023-11-18', '', 'absent', 'java'),
('UESBCA117', 'BCA', '1', '2023-11-18', '', 'absent', 'java'),
('UESBCA118', 'BCA', '1', '2023-11-18', '', 'absent', 'java'),
('UESBCA119', 'BCA', '1', '2023-11-18', '', 'absent', 'java'),
('UESBCA1110', 'BCA', '1', '2023-11-18', '', 'absent', 'java');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `c_name` varchar(100) NOT NULL,
  `c_fee` int(100) NOT NULL,
  `total_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`c_name`, `c_fee`, `total_semester`) VALUES
('MCA', 80000, 4),
('BTECH-CSE', 120000, 8),
('BTECH-MAC', 120000, 8),
('BTECH-AI', 120000, 8),
('MBA', 80000, 4),
('BCA', 50000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `sno` int(11) NOT NULL,
  `fid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`sno`, `fid`, `password`, `name`, `dob`, `gender`, `email`, `mobile`, `father_name`, `department`, `age`, `address`, `pin`, `city`, `image`) VALUES
(35, 'UESBCA10235', 'AmanAman', 'Aman', '2023-09-04', 'male', 'fac_aman@gmail.com', '9076567667', 'Ghambir Singh ', 'BCA', ' 32 ', 'nandpur  kotdwara', '246149', 'Pauri Garhwal', '../image/faculty_images/UESBCA10235.jpg'),
(36, 'UESMCA10236', 'kartikkartik', 'kartik', '2023-02-17', 'male', 'fac_kartik@gamil.com', '9879878', '', 'MCA', ' 25 ', '', '', '', '../image/faculty_images/UESMCA10236.jpg'),
(37, 'UESBTECH-CSE10237', 'BalkiratBalkirat', 'Balkirat', '2023-09-15', 'male', 'fac_balkirat@gmail.com', '', '', 'BTECH-CSE', ' 25 ', '', '', '', '../image/faculty_images/UESBTECH-CSE10237.jpg'),
(38, 'UESBTECH-CSE10238', 'ArjunArjun', 'Arjun', '2023-09-07', 'male', 'anujdevrani007@gmail.com', '', '', 'BTECH-CSE', ' 30 ', '', '', '', '../image/faculty_images/UESBTECH-CSE10238.jpg'),
(40, 'UESBCA10240', 'GoldiGoldi', 'Goldi', '', 'male', 'fac_goldi@gmail.com', '85556544555', '', 'BCA', 'Choose...', '', '', '', '../image/faculty_images/UESBCA10240.jpg'),
(41, 'UESMCA10241', 'karankaran', 'karan', '2023-05-21', 'male', '', '93847239049245', '', 'MCA', ' 25 ', '', '', '', '../image/faculty_images/UESMCA10241.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `msgId` int(11) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `reciever` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`msgId`, `sender`, `reciever`, `message`, `date`, `time`) VALUES
(59, 'UESBCA1110', 'UESBCA115', 'check\n', '', ''),
(60, 'UESBCA115', 'UESBCA1110', 'Working ', '', ''),
(61, 'UESBCA1110', 'UESBCA115', 'fine', '', ''),
(62, 'UESBCA1110', 'UESBCA115', 'hello', '', ''),
(63, 'UESBCA1110', 'UESBCA119', 'Hlo', '', ''),
(64, 'UESBCA119', 'UESBCA1110', 'Hi', '', ''),
(67, 'UESBCA1110', 'UESBCA117', 'hi\n', '', ''),
(68, 'UESBCA1110', 'UESBCA112', 'hello\n', '', ''),
(69, 'UESBCA112', 'UESBCA1110', 'hy\n', '', ''),
(70, 'UESBCA1115', 'UESBCA112', 'hello', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `sid` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `totalmarks` varchar(200) NOT NULL,
  `obtained_marks` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `test_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`sid`, `subject`, `totalmarks`, `obtained_marks`, `semester`, `test_type`) VALUES
('UESBCA112', 'java', '30', '12', '1', 'st1'),
('UESBCA115', 'java', '30', '0', '1', 'st1'),
('UESBCA116', 'java', '30', '30', '1', 'st1'),
('UESBCA117', 'java', '30', '30', '1', 'st1'),
('UESBCA118', 'java', '30', '5', '1', 'st1'),
('UESBCA112', 'java', '40', '30', '1', 'st1'),
('UESBCA115', 'java', '40', '30', '1', 'st1'),
('UESBCA116', 'java', '40', '40', '1', 'st1'),
('UESBCA117', 'java', '40', '40', '1', 'st1'),
('UESBCA118', 'java', '40', '0', '1', 'st1'),
('UESBCA119', 'cpp', '40', '30', '3', 'st1'),
('UESBCA112', 'java', '20', '12', '1', 'st1'),
('UESBCA115', 'java', '20', '0', '1', 'st1'),
('UESBCA116', 'java', '20', '20', '1', 'st1'),
('UESBCA117', 'java', '20', '12', '1', 'st1'),
('UESBCA118', 'java', '20', '06', '1', 'st1'),
('UESBCA1110', 'java', '20', '7', '1', 'st1'),
('UESBCA112', 'Javas', '50', '49', '1', 'Thhh'),
('UESBCA115', 'Javas', '50', '40', '1', 'Thhh'),
('UESBCA116', 'Javas', '50', '42', '1', 'Thhh'),
('UESBCA117', 'Javas', '50', '44', '1', 'Thhh'),
('UESBCA118', 'Javas', '50', '50', '1', 'Thhh'),
('UESBCA1110', 'Javas', '50', '2', '1', 'Thhh'),
('UESBCA112', 'java', '40', '4', '1', 'St2'),
('UESBCA115', 'java', '40', '40', '1', 'St2'),
('UESBCA116', 'java', '40', '10', '1', 'St2'),
('UESBCA117', 'java', '40', '4', '1', 'St2'),
('UESBCA118', 'java', '40', '35', '1', 'St2'),
('UESBCA1110', 'java', '40', '40', '1', 'St2'),
('UESBCA112', 'java', '40', '12', '1', 'st2'),
('UESBCA115', 'java', '40', '40', '1', 'st2'),
('UESBCA116', 'java', '40', '2', '1', 'st2'),
('UESBCA117', 'java', '40', '30', '1', 'st2'),
('UESBCA118', 'java', '40', '40', '1', 'st2'),
('UESBCA1110', 'java', '40', '20', '1', 'st2'),
('UESBCA112', 'java', '100', '12', '1', 'html'),
('UESBCA115', 'java', '100', '23', '1', 'html'),
('UESBCA116', 'java', '100', '34', '1', 'html'),
('UESBCA117', 'java', '100', '45', '1', 'html'),
('UESBCA118', 'java', '100', '67', '1', 'html'),
('UESBCA119', 'java', '100', '89', '1', 'html'),
('UESBCA1110', 'java', '100', '89', '1', 'html'),
('UESChoose...1114', 'java', '100', '78', '1', 'html'),
('UESBCA112', 'data-structure', '30', '30', '1', 'st3'),
('UESBCA115', 'data-structure', '30', '12', '1', 'st3'),
('UESBCA116', 'data-structure', '30', '23', '1', 'st3'),
('UESBCA117', 'data-structure', '30', '12', '1', 'st3'),
('UESBCA118', 'data-structure', '30', '22', '1', 'st3'),
('UESBCA119', 'data-structure', '30', '30', '1', 'st3'),
('UESBCA1110', 'data-structure', '30', '12', '1', 'st3'),
('UESChoose...1114', 'data-structure', '30', '0', '1', 'st3'),
('UESBCA112', 'java', '40', '12', '1', 'st2'),
('UESBCA115', 'java', '40', '23', '1', 'st2'),
('UESBCA116', 'java', '40', '34', '1', 'st2'),
('UESBCA117', 'java', '40', '12', '1', 'st2'),
('UESBCA118', 'java', '40', '23', '1', 'st2'),
('UESBCA119', 'java', '40', '23', '1', 'st2'),
('UESBCA1110', 'java', '40', '34', '1', 'st2');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `sno` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `lesson_name` varchar(700) NOT NULL,
  `lesson_content` varchar(700) NOT NULL,
  `embed_link` varchar(700) NOT NULL,
  `files` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`sno`, `subject_name`, `course`, `semester`, `lesson_name`, `lesson_content`, `embed_link`, `files`) VALUES
(5, 'java', 'BCA', '1', 'for loop ', '../studymaterial/forloopjavaBCA.txt', 'https://www.youtube.com/watch?v=LILHZhIV9sM', ''),
(6, 'java', 'BCA', '1', 'jdk jre jvm', '../studymaterial/jdkjrejvmjavaBCA.txt', 'https://www.youtube.com/watch?v=qB1wWuczo90', ''),
(7, 'core-java', 'BCA', '1', 'exception handling ', '../studymaterial/exceptionhandlingcore-javaBCA.txt', 'https://www.youtube.com/watch?v=y-NlcLcxiKY&list=PLlhM4lkb2sEjaU-JAASDG4Tdwpf-JFARN', ''),
(8, 'core-java', 'BCA', '1', 'exception handling  in java', '../studymaterial/exceptionhandlinginjavacore-javaBCA.txt', 'https://www.youtube.com/embed/y-NlcLcxiKY?list=PLlhM4lkb2sEjaU-JAASDG4Tdwpf-JFARN', ''),
(9, 'java', 'BCA', '1', 'dsa', '../studymaterial/dsajavaBCA.txt', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pin` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `sid` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `first_name`, `last_name`, `dob`, `email`, `gender`, `address`, `pin`, `phone`, `father_name`, `department`, `semester`, `city`, `password`, `sid`, `image`) VALUES
(2, 'raman', 'singh', '', 'anujdevrani007@gmail.com', 'male', '', '', '23468324288347', '', 'BCA', '1', '', 'ramanraman', 'UESBCA112', '../image/students_images/UESBCA112.jpg'),
(5, 'akhil', '', '', 'anujdevrani007@gmail.com', 'male', '', '', '8958817782723', '', 'BCA', '1', '', 'akhilakhil', 'UESBCA115', ''),
(6, 'naman', 'goyal', '', 'anujdevrani007@gmail.com', 'male', '', '', '8927348924', '', 'BCA', '1', '', 'namannaman', 'UESBCA116', ''),
(7, 'kartik', '', '', 'anujdevrani007@gmail.com', 'male', '', '', '23123123', '', 'BCA', '1', '', 'kartikkartik', 'UESBCA117', '../image/students_images/UESBCA117.jpg'),
(8, 'karan', 'TIWARI', '', 'anujdevrani007@gmail.com', 'male', '', '', '893241832846812', '', 'BCA', '1', '', 'karankaran', 'UESBCA118', ''),
(10, 'rampal', '', '', 'anujdevrani007@gmail.com', 'male', '', '', '978793748723', '', 'BCA', '1', '', 'anuj', 'UESBCA1110', ''),
(11, 'anurag', '', '', 'anujdevrani007@gmail.com', 'male', '', '', '13254234234', '', 'BTECH-CSE', '1', '', 'anuraganurag', 'UESBTECH-CSE1111', ''),
(12, 'arpit', '', '2023-10-18', 'anujdevrani007@gmail.com', 'male', '', '', '456246356256', '', 'BTECH-CSE', '1', '', 'arpitarpit', 'UESBTECH-CSE1112', ''),
(15, 'Gagandeep ', 'Singh', '2022-09-15', 'gsingh2544.ca21@chitkara.edu.in', 'male', 'Hdnndine ', '147001', '9780793321', 'Surjit', 'BCA', '1', 'Patiala', 'Gagandeep Gagandeep ', 'UESBCA1115', '../image/students_images/UESBCA1115.jpg'),
(16, 'Kartik', 'Tiwari', '2023-11-29', 'ktiwari2570.ca21@chitkara.edu.in', 'male', '', '133001', '8950349049', 'Jagdish', 'BCA', '2', 'Ambala', 'KartikKartik', 'UESBCA1116', '../image/students_images/UESBCA1116.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `subjectteacher` varchar(200) NOT NULL,
  `total_lecture_count` int(11) NOT NULL,
  `fid` varchar(200) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `subject_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `subject_name`, `course_name`, `subjectteacher`, `total_lecture_count`, `fid`, `semester`, `subject_id`) VALUES
(31, 'java', 'BCA', 'UESBCA10234', 7, '', '1', 'java31'),
(32, 'cpp', 'BCA', 'UESBCA10235', 2, '', '1', 'cpp32'),
(34, 'data-structure', 'BCA', 'UESBCA10234', 5, '', '1', 'data-structure34'),
(35, 'core-java', 'BCA', 'UESBCA10234', 1, '', '1', 'core-java35'),
(36, 'digital marketing', 'MCA', 'UESMCA10241', 0, '', '2', 'digital marketing36'),
(37, 'digital marketing', 'BCA', 'UESBCA10240', 0, '', '4', 'digital marketing37'),
(38, 'business developement', 'BCA', 'UESBCA10235', 0, '', '1', 'business developement38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_details`
--
ALTER TABLE `faculty_details`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
