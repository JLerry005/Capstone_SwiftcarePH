-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 05:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiftcare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvedadminsignup`
--

CREATE TABLE `approvedadminsignup` (
  `hospitalID` int(11) NOT NULL,
  `hospitalType` varchar(30) NOT NULL,
  `hospitalName` varchar(120) NOT NULL,
  `hospitalAddress` varchar(120) NOT NULL,
  `representativeName` varchar(80) NOT NULL,
  `supervisorName` varchar(80) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `designation` varchar(120) NOT NULL,
  `hospitalEmail` varchar(50) NOT NULL,
  `hospitalPassword` varchar(70) NOT NULL,
  `pendingTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pendingHospitalID` blob NOT NULL,
  `pendingPermit` blob NOT NULL,
  `pendingLicense` blob NOT NULL,
  `registrationCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `approvedhospital`
--

CREATE TABLE `approvedhospital` (
  `approvalID` int(11) NOT NULL,
  `hospitalID` int(11) NOT NULL,
  `hospitalName` varchar(120) NOT NULL,
  `registrationCode` int(20) NOT NULL,
  `approvalTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approvedhospital`
--

INSERT INTO `approvedhospital` (`approvalID`, `hospitalID`, `hospitalName`, `registrationCode`, `approvalTimestamp`) VALUES
(108, 183, 'Amang Rodriguez Memorial Medical Center', 0, '2022-03-30 11:22:55'),
(109, 184, 'Mount Banawe General Hospital', 0, '2022-03-30 11:23:25'),
(110, 185, 'Cebu Doctors University Hospital', 0, '2022-03-30 11:31:48'),
(111, 186, 'Sample hospital', 0, '2022-03-30 13:05:11'),
(112, 187, 'Cardinal Santos Medical Center', 0, '2022-04-15 11:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `approved_hospital`
--

CREATE TABLE `approved_hospital` (
  `approvalID` int(11) NOT NULL,
  `hospitalID` int(11) NOT NULL,
  `hospitalName` varchar(120) NOT NULL,
  `registrationCode` varchar(50) NOT NULL,
  `approvalTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `citydata`
--

CREATE TABLE `citydata` (
  `ID` int(120) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `island` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citydata`
--

INSERT INTO `citydata` (`ID`, `city`, `region`, `island`) VALUES
(35, 'Alaminos', 'Ilocos Region', 'luzon'),
(36, 'Batac', 'Ilocos Region', 'luzon'),
(37, 'Candon', 'Ilocos Region', 'luzon'),
(38, 'Laoag', 'Ilocos Region', 'luzon'),
(39, 'San Carlos', 'Ilocos Region', 'luzon'),
(40, 'San Fernando', 'Ilocos Region', 'luzon'),
(41, 'Urdaneta', 'Ilocos Region', 'luzon'),
(42, 'Vigan', 'Ilocos Region', 'luzon'),
(43, 'Dagupan', 'Ilocos Region', 'luzon'),
(44, 'Roxas', 'Western Visayas', 'visayas'),
(45, 'Bacolod', 'Western Visayas', 'visayas'),
(46, 'Escalante', 'Western Visayas', 'visayas'),
(47, 'Balanga', 'Central Luzon', 'luzon'),
(48, 'Malolos', 'Central Luzon', 'luzon'),
(49, 'La Carlota', 'Western Visayas', 'visayas'),
(50, 'Meycauayan', 'Central Luzon', 'luzon'),
(51, 'Silay', 'Western Visayas', 'visayas'),
(52, 'San Jose del Monte', 'Central Luzon', 'luzon'),
(53, 'Victorias', 'Western Visayas', 'visayas'),
(54, 'Cabanatuan', 'Central Luzon', 'luzon'),
(55, 'Gapan', 'Central Luzon', 'luzon'),
(56, 'Muñoz', 'Central Luzon', 'luzon'),
(57, 'Iloilo', 'Western Visayas', 'visayas'),
(58, 'Palayan', 'Central Luzon', 'luzon'),
(59, 'Bago', 'Western Visayas', 'visayas'),
(60, 'San Jose', 'Central Luzon', 'luzon'),
(61, 'Himamaylan', 'Western Visayas', 'visayas'),
(62, 'Angeles City', 'Central Luzon', 'luzon'),
(63, 'Sagay', 'Western Visayas', 'visayas'),
(64, 'Mabalacat', 'Central Luzon', 'luzon'),
(65, 'Sipalay', 'Western Visayas', 'visayas'),
(66, 'San Fernando', 'Central Luzon', 'luzon'),
(67, 'Passi', 'Western Visayas', 'visayas'),
(68, 'Tarlac', 'Central Luzon', 'luzon'),
(69, 'Cadiz', 'Western Visayas', 'visayas'),
(70, 'Olongapo', 'Central Luzon', 'luzon'),
(71, 'Kabankalan', 'Western Visayas', 'visayas'),
(72, 'San Carlos', 'Western Visayas', 'visayas'),
(73, 'Talisay', 'Western Visayas', 'visayas'),
(74, 'Legazpi', 'Bicol Region', 'luzon'),
(75, 'Naga', 'Bicol Region', 'luzon'),
(76, 'Iriga', 'Bicol Region', 'luzon'),
(77, 'Tagbilaran', 'Central Visayas', 'visayas'),
(78, 'Cebu', 'Central Visayas', 'visayas'),
(79, 'Mandaue', 'Central Visayas', 'visayas'),
(80, 'Tabaco', 'Bicol Region', 'luzon'),
(81, 'Bais', 'Central Visayas', 'visayas'),
(82, 'Dumaguete', 'Central Visayas', 'visayas'),
(83, 'Ligao', 'Bicol Region', 'luzon'),
(84, 'Toledo', 'Central Visayas', 'visayas'),
(85, 'Sorsogon', 'Bicol Region', 'luzon'),
(86, 'Masbate', 'Bicol Region', 'luzon'),
(87, 'Bogo', 'Central Visayas', 'visayas'),
(88, 'Danao', 'Central Visayas', 'visayas'),
(89, 'Naga', 'Central Visayas', 'visayas'),
(90, 'Bayawan', 'Central Visayas', 'visayas'),
(91, 'Guihulngan', 'Central Visayas', 'visayas'),
(92, 'Carcar', 'Central Visayas', 'visayas'),
(93, 'Baguio', 'Cordillera Administrative Region', 'luzon'),
(94, 'Lapu-Lapu', 'Central Visayas', 'visayas'),
(95, 'Tabuk', 'Cordillera Administrative Region', 'luzon'),
(96, 'Talisay', 'Central Visayas', 'visayas'),
(97, 'Canlaon', 'Central Visayas', 'visayas'),
(98, 'Tanjay', 'Central Visayas', 'visayas'),
(99, 'Borongan', 'Eastern Visayas', 'visayas'),
(100, 'Tacloban', 'Eastern Visayas', 'visayas'),
(101, 'Maasin', 'Eastern Visayas', 'visayas'),
(102, 'Baybay', 'Eastern Visayas', 'visayas'),
(103, 'Calbayog', 'Eastern Visayas', 'visayas'),
(104, 'Ormoc', 'Eastern Visayas', 'visayas'),
(105, 'Cauayan', 'Cagayan Valley', 'luzon'),
(106, 'Catbalogan', 'Eastern Visayas', 'visayas'),
(107, 'Ilagan', 'Cagayan Valley', 'luzon'),
(108, 'Santiago', 'Cagayan Valley', 'luzon'),
(109, 'Tuguegarao', 'Cagayan Valley', 'luzon'),
(110, 'Isabela', 'Zamboanga Peninsula', 'mindanao'),
(111, 'Antipolo', 'CALABARZON', 'luzon'),
(112, 'Bacoor', 'CALABARZON', 'luzon'),
(113, 'Pagadian', 'Zamboanga Peninsula', 'mindanao'),
(114, 'Batangas', 'CALABARZON', 'luzon'),
(115, 'Dapitan', 'Zamboanga Peninsula', 'mindanao'),
(116, 'Biñan', 'CALABARZON', 'luzon'),
(117, 'Zamboanga', 'Zamboanga Peninsula', 'mindanao'),
(118, 'Cabuyao', 'CALABARZON', 'luzon'),
(119, 'Dipolog', 'Zamboanga Peninsula', 'mindanao'),
(120, 'Calamba', 'CALABARZON', 'luzon'),
(121, 'Cavite', 'CALABARZON', 'luzon'),
(122, 'Dasmariñas', 'CALABARZON', 'luzon'),
(123, 'General Trias', 'CALABARZON', 'luzon'),
(124, 'Malaybalay', 'Northern Mindanao', 'mindanao'),
(125, 'Imus', 'CALABARZON', 'luzon'),
(126, 'Oroquieta', 'Northern Mindanao', 'mindanao'),
(127, 'Lipa', 'CALABARZON', 'luzon'),
(128, 'Lucena', 'CALABARZON', 'luzon'),
(129, 'Cagayan de Oro', 'Northern Mindanao', 'mindanao'),
(130, 'San Pablo', 'CALABARZON', 'luzon'),
(131, 'Valencia', 'Northern Mindanao', 'mindanao'),
(132, 'San Pedro', 'CALABARZON', 'luzon'),
(133, 'Ozamiz', 'Northern Mindanao', 'mindanao'),
(134, 'Santa Rosa', 'CALABARZON', 'luzon'),
(135, 'El Salvador', 'Northern Mindanao', 'mindanao'),
(136, 'Santo Tomas', 'CALABARZON', 'luzon'),
(137, 'Iligan', 'Northern Mindanao', 'mindanao'),
(138, 'Tagaytay', 'CALABARZON', 'luzon'),
(139, 'Tangub', 'Northern Mindanao', 'mindanao'),
(140, 'Tayabas', 'CALABARZON', 'luzon'),
(141, 'Gingoog', 'Northern Mindanao', 'mindanao'),
(142, 'Trece Martires', 'CALABARZON', 'luzon'),
(143, 'Panabo', 'Davao Region', 'mindanao'),
(144, 'Davao', 'Davao Region', 'mindanao'),
(145, 'Caloocan', 'Nation Capital Region', 'luzon'),
(146, 'Marikina', 'Nation Capital Region', 'luzon'),
(147, 'Makati', 'Nation Capital Region', 'luzon'),
(148, 'Samal', 'Davao Region', 'mindanao'),
(149, 'Mandaluyong', 'Nation Capital Region', 'luzon'),
(150, 'Digos', 'Davao Region', 'mindanao'),
(151, 'Muntinlupa', 'Nation Capital Region', 'luzon'),
(152, 'Tagum', 'Davao Region', 'mindanao'),
(153, 'Manila', 'Nation Capital Region', 'luzon'),
(154, 'Mati', 'Davao Region', 'mindanao'),
(155, 'Navotas', 'Nation Capital Region', 'luzon'),
(156, 'Malabon', 'Nation Capital Region', 'luzon'),
(157, 'Kidapawan', 'SOCCSKSARGEN', 'mindanao'),
(158, 'Tacurong', 'SOCCSKSARGEN', 'mindanao'),
(159, 'Valenzuela', 'Nation Capital Region', 'luzon'),
(160, 'Pasay', 'Nation Capital Region', 'luzon'),
(161, 'General Santos', 'SOCCSKSARGEN', 'mindanao'),
(162, 'Pasig', 'Nation Capital Region', 'luzon'),
(163, 'Koronadal', 'SOCCSKSARGEN', 'mindanao'),
(164, 'Parañaque', 'Nation Capital Region', 'luzon'),
(165, 'Quezon', 'Nation Capital Region', 'luzon'),
(166, 'San Juan', 'Nation Capital Region', 'luzon'),
(167, 'Las Piñas', 'Nation Capital Region', 'luzon'),
(168, 'Cotabato', 'Bangsamoro Autonomous Region in Muslim Mindanao', 'mindanao'),
(169, 'Taguig', 'Nation Capital Region', 'luzon'),
(170, 'Lamitan', 'Bangsamoro Autonomous Region in Muslim Mindanao', 'mindanao'),
(171, 'Marawi', 'Bangsamoro Autonomous Region in Muslim Mindanao', 'mindanao'),
(172, 'Butuan', 'Caraga', 'mindanao'),
(173, 'Surigao', 'Caraga', 'mindanao'),
(175, 'Cabadbaran', 'Caraga', 'mindanao'),
(177, 'Bislig', 'Caraga', 'mindanao'),
(179, 'Bayugan', 'Caraga', 'mindanao'),
(180, 'Tandag', 'Caraga', 'mindanao'),
(181, 'Calapan', 'MIMAROPA Region', 'luzon'),
(182, 'Puerto Princesa', 'MIMAROPA Region', 'luzon');

-- --------------------------------------------------------

--
-- Table structure for table `completedreservations`
--

CREATE TABLE `completedreservations` (
  `ID` int(120) NOT NULL,
  `reservation_code` varchar(255) NOT NULL,
  `user_id` int(120) NOT NULL,
  `listing_id` int(120) NOT NULL,
  `remarks` varchar(120) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `concern` varchar(255) NOT NULL,
  `specifyconcern` varchar(255) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `reservationtype` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completedreservations`
--

INSERT INTO `completedreservations` (`ID`, `reservation_code`, `user_id`, `listing_id`, `remarks`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `concern`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`) VALUES
(90, 'SCPHRES241629', 95, 8, 'Successful', 'Larry', 'Goods', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-15 04:50:26', '2022-04-15 12:29:07'),
(91, 'SCPHRES860395', 95, 8, '', 'john', 'Doe', '2022-04-14', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-15 04:57:07', '2022-04-15 12:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `expiredreservations`
--

CREATE TABLE `expiredreservations` (
  `ID` int(120) NOT NULL,
  `user_id` int(120) NOT NULL,
  `listing_id` int(120) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `date` varchar(120) NOT NULL,
  `time` varchar(120) NOT NULL,
  `phonenumber` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `concern` varchar(255) NOT NULL,
  `specifyconcern` varchar(255) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `reservationtype` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_timestamp` varchar(255) NOT NULL,
  `remarks` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expiredreservations`
--

INSERT INTO `expiredreservations` (`ID`, `user_id`, `listing_id`, `firstname`, `lastname`, `fullname`, `date`, `time`, `phonenumber`, `email`, `concern`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`, `remarks`) VALUES
(1, 95, 8, 'Larry', 'goods', '', '2022-04-14', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-15 05:43:54', '2022-04-15 13:42:46', 'expired');

-- --------------------------------------------------------

--
-- Table structure for table `hospitalaccount`
--

CREATE TABLE `hospitalaccount` (
  `hospitalID` int(11) NOT NULL,
  `infoID` int(11) NOT NULL,
  `hospitalName` varchar(120) NOT NULL,
  `hospitalEmail` varchar(70) NOT NULL,
  `hospitalPassword` varchar(120) NOT NULL,
  `hospitalPhoneNumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitalaccount`
--

INSERT INTO `hospitalaccount` (`hospitalID`, `infoID`, `hospitalName`, `hospitalEmail`, `hospitalPassword`, `hospitalPhoneNumber`) VALUES
(14, 183, 'Amang Rodriguez Memorial Medical Center', 'nior3210@gmail.com', '$2y$10$GBsZEmiRRdGpxb6FfS40T.xzRiif78VZ.XOuHnUX2qoDNY1tXU0rC', 0),
(15, 184, 'Mount Banawe General Hospital', 'larry.mabuti.jr@gmail.com', '$2y$10$uLpmXXaAr9kuJolqxP9ycePJeJThlPaa.AQuDS0J9XnjcW8kD0FIi', 0),
(16, 185, 'Cebu Doctors University Hospital', 'hapatingajohnlerry@gmail.com', '$2y$10$PbStvm2lXfATVXFeF3ptCe0ETHQWvGei49mp2iglXnEdNUqggjYm.', 0),
(17, 186, 'Sample hospital', 'larrymabutipogi@gmail.com', '$2y$10$tISWymisNJ55z/WaMYjvCe.353mO8gmse3.JoYXFNT7fF6YF0ObP2', 0),
(18, 187, 'Cardinal Santos Medical Center', 'lerryhapatinga005@gmail.com', '$2y$10$85B3T5c2ZRmqJw85W1YHpuialZZ8HjeDybnLr8APM/bH3sw0tOs1W', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hospitaldocuments`
--

CREATE TABLE `hospitaldocuments` (
  `ID` int(11) NOT NULL,
  `hospitalID` int(11) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `imageName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospitalinformation`
--

CREATE TABLE `hospitalinformation` (
  `ID` int(11) NOT NULL,
  `hospitalType` varchar(30) NOT NULL,
  `hospitalName` varchar(120) NOT NULL,
  `hospitalAddress` varchar(120) NOT NULL,
  `representativeName` varchar(80) NOT NULL,
  `supervisorName` varchar(80) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `designation` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hospitalPassword` varchar(70) NOT NULL,
  `registrationCode` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitalinformation`
--

INSERT INTO `hospitalinformation` (`ID`, `hospitalType`, `hospitalName`, `hospitalAddress`, `representativeName`, `supervisorName`, `phoneNumber`, `designation`, `email`, `hospitalPassword`, `registrationCode`, `timestamp`) VALUES
(183, 'Private Hospital', 'Amang Rodriguez Memorial Medical Center', 'Sumulong Highway Sto. Nino, Marikina, 1800 Metro Manila', 'Juan Dela Cruz', 'John De leon', '+639886756677', 'Assistant', 'nior3210@gmail.com', '$2y$10$GBsZEmiRRdGpxb6FfS40T.xzRiif78VZ.XOuHnUX2qoDNY1tXU0rC', 0, '2022-03-30 13:11:48'),
(184, 'Public Hospital', 'Mount Banawe General Hospital', '448 Quezon Ave, Quiapo, Quezon City, 1200 Metro Manila', 'John Juan', 'Kiko Panganiban', '+638675586755', 'Supervisor', 'larry.mabuti.jr@gmail.com', '$2y$10$uLpmXXaAr9kuJolqxP9ycePJeJThlPaa.AQuDS0J9XnjcW8kD0FIi', 0, '2022-03-30 11:51:11'),
(185, 'Public Hospital', 'Cebu Doctors University Hospital', 'President Sergio Suico Osmeña Boulevard, Cebu City', 'Juanito dela Cruz', 'Kiko Panganiban', '+638675576866', 'Assistant', 'hapatingajohnlerry@gmail.com', '$2y$10$PbStvm2lXfATVXFeF3ptCe0ETHQWvGei49mp2iglXnEdNUqggjYm.', 0, '2022-03-30 11:31:48'),
(186, 'Public Hospital', 'Sample hospital', 'Caloocan, Metro manila', 'Larry Mabuti jr', 'John Lerry Hapatinga', '+639663700835', 'Assistant Manager', 'larrymabutipogi@gmail.com', '$2y$10$tISWymisNJ55z/WaMYjvCe.353mO8gmse3.JoYXFNT7fF6YF0ObP2', 0, '2022-03-30 13:05:11'),
(187, 'Private Hospital', 'Cardinal Santos Medical Center', '10 Wilson, Greenhills West, San Juan, 1502 Metro Manila', 'Sr. Sasuke Uchiha ', 'Dr. Naruto Uzumaki', '+639024243453', 'Hokage', 'lerryhapatinga005@gmail.com', '$2y$10$85B3T5c2ZRmqJw85W1YHpuialZZ8HjeDybnLr8APM/bH3sw0tOs1W', 0, '2022-04-15 11:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `hospitallisting`
--

CREATE TABLE `hospitallisting` (
  `listing_id` int(11) NOT NULL,
  `hospitalID` int(20) NOT NULL,
  `hospital_location` varchar(255) NOT NULL,
  `hospital_city` varchar(250) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_description` varchar(255) NOT NULL,
  `hospital_type` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL DEFAULT 'no',
  `room_slot` int(20) DEFAULT 0,
  `bed` varchar(255) NOT NULL DEFAULT 'no',
  `bed_slot` int(20) DEFAULT 0,
  `additional_docs` varchar(120) NOT NULL DEFAULT 'no',
  `website_link` varchar(255) DEFAULT '0',
  `hospital_phone` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitallisting`
--

INSERT INTO `hospitallisting` (`listing_id`, `hospitalID`, `hospital_location`, `hospital_city`, `hospital_name`, `hospital_description`, `hospital_type`, `room`, `room_slot`, `bed`, `bed_slot`, `additional_docs`, `website_link`, `hospital_phone`) VALUES
(8, 183, 'Sumulong Highway Sto. Nino, Marikina, 1800 Metro Manila', 'Marikina', 'Amang Rodriguez Memorial Medical Center', 'This is a sample description.', 'Private Hospital', '', 90, '', 78, 'Yes', 'amangrodriguezhospital.ph', '+639886756677'),
(9, 184, '448 Quezon Ave, Quiapo, Quezon City, 1200 Metro Manila', 'valenzuela', 'Mount Banawe General Hospital', 'This is a sample paragraph.', 'Public Hospital', '', 0, '', 3, 'Yes', '', '+638675586755'),
(10, 185, 'Osmeña Blvd, Cebu City, 6000 Cebu', 'Cebu', 'Cebu Doctors University Hospital', 'Cebu Doctors\' University Hospital is a leading tertiary level hospital in the Southern Phillipines. It was founded in 1972 and today has 300 beds and 1200 employees, 326 of which are medical doctors. The hospital is also a comprehensive medical education ', 'Public Hospital', '', 96, '', 92, 'Yes', 'https://cebudocgroup.com.ph/', '+638675576866'),
(11, 186, '', '', 'Sample hospital', '', 'Public Hospital', 'no', 0, 'no', 0, 'no', '0', '+639663700835'),
(12, 187, '', '', 'Cardinal Santos Medical Center', '', 'Private Hospital', 'no', 0, 'no', 0, 'no', '0', '+639024243453');

-- --------------------------------------------------------

--
-- Table structure for table `hospitalsignuphistory`
--

CREATE TABLE `hospitalsignuphistory` (
  `historyID` int(11) NOT NULL,
  `hospitalName` varchar(120) NOT NULL,
  `representativeName` varchar(120) NOT NULL,
  `hospitalPhoneNumber` varchar(20) NOT NULL,
  `hospitalEmail` varchar(70) NOT NULL,
  `hospitalID` int(11) NOT NULL,
  `historyTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `listingimages`
--

CREATE TABLE `listingimages` (
  `image_id` int(20) NOT NULL,
  `listing_idFK` int(20) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listingimages`
--

INSERT INTO `listingimages` (`image_id`, `listing_idFK`, `image_name`, `image_dir`) VALUES
(607, 9, 'Tyler Lastovich HM08wZJBlK4 Unsplash', '../web/hospital-images/tyler-lastovich-hM08wZJBlK4-unsplash.jpg'),
(608, 10, 'Hall', '../web/hospital-images/hall.jpg'),
(609, 10, 'Hospital', '../web/hospital-images/hospital.jpg'),
(610, 10, 'School', '../web/hospital-images/school.jpg'),
(611, 9, 'Tyler Lastovich HM08wZJBlK4 Unsplash', '../web/hospital-images/tyler-lastovich-hM08wZJBlK4-unsplash.jpg'),
(612, 9, 'Tyler Lastovich Ybao6_A8RDI Unsplash', '../web/hospital-images/tyler-lastovich-Ybao6_A8RDI-unsplash.jpg'),
(618, 10, 'For Loop', '../web/hospital-images/for-loop.png'),
(619, 10, 'For Loop', '../web/hospital-images/for-loop.png'),
(621, 8, 'Ambulance2', '../web/hospital-images/ambulance2.jpg'),
(622, 8, 'Tyler Lastovich HM08wZJBlK4 Unsplash', '../web/hospital-images/tyler-lastovich-hM08wZJBlK4-unsplash.jpg'),
(623, 8, 'Tyler Lastovich Ybao6_A8RDI Unsplash', '../web/hospital-images/tyler-lastovich-Ybao6_A8RDI-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `otpstorage`
--

CREATE TABLE `otpstorage` (
  `ID` int(11) NOT NULL,
  `emailID` int(11) NOT NULL,
  `otp` int(120) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otpstorage`
--

INSERT INTO `otpstorage` (`ID`, `emailID`, `otp`, `timestamp`) VALUES
(66, 66, 843077, '2022-03-30 12:09:51'),
(67, 67, 732354, '2022-03-30 12:10:41'),
(68, 68, 658847, '2022-03-30 12:57:38'),
(69, 69, 138838, '2022-04-06 02:25:38'),
(70, 70, 250966, '2022-04-15 09:53:01'),
(71, 71, 871188, '2022-04-15 10:00:54'),
(72, 72, 200696, '2022-04-15 10:03:50'),
(73, 73, 859830, '2022-04-15 14:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `pendingadminsignup`
--

CREATE TABLE `pendingadminsignup` (
  `pendingID` int(11) NOT NULL,
  `registrationCode` varchar(120) DEFAULT NULL,
  `pendingType` varchar(30) NOT NULL,
  `pendingName` varchar(120) NOT NULL,
  `pendingAddress` varchar(120) NOT NULL,
  `pendingRepresentativeName` varchar(80) NOT NULL,
  `pendingSupervisorName` varchar(80) NOT NULL,
  `pendingPhoneNumber` varchar(20) NOT NULL,
  `pendingDesignation` varchar(120) NOT NULL,
  `pendingEmail` varchar(50) NOT NULL,
  `pendingPassword` varchar(70) NOT NULL,
  `pendingTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `referralfiles`
--

CREATE TABLE `referralfiles` (
  `referral_id` int(120) NOT NULL,
  `booking_id` int(120) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referralfiles`
--

INSERT INTO `referralfiles` (`referral_id`, `booking_id`, `file_name`, `file_dir`) VALUES
(92, 214, 'Leonardo Yip NcWnJmeVtcw Unsplash', '../web/referral-images/leonardo-yip-NcWnJmeVtcw-unsplash.jpg'),
(93, 215, 'Leonardo Yip NcWnJmeVtcw Unsplash', '../web/referral-images/leonardo-yip-NcWnJmeVtcw-unsplash.jpg'),
(96, 218, 'Brown', '../web/referral-images/brown.jpg'),
(102, 224, 'Tyler Lastovich Ybao6_A8RDI Unsplash', '../web/referral-images/tyler-lastovich-Ybao6_A8RDI-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedhospital`
--

CREATE TABLE `rejectedhospital` (
  `ID` int(11) NOT NULL,
  `rejectedType` varchar(30) NOT NULL,
  `rejectedName` varchar(120) NOT NULL,
  `rejectedAddress` varchar(120) NOT NULL,
  `representativeName` varchar(120) NOT NULL,
  `rejectedSupervisor` varchar(80) NOT NULL,
  `rejectedphoneNumber` varchar(20) NOT NULL,
  `rejectedDesignation` varchar(120) NOT NULL,
  `rejectedEmail` varchar(50) NOT NULL,
  `rejectedPassword` varchar(70) NOT NULL,
  `registrationCode` varchar(20) NOT NULL,
  `rejectTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rejectedreservations`
--

CREATE TABLE `rejectedreservations` (
  `ID` int(120) NOT NULL,
  `user_id` int(120) NOT NULL,
  `listing_id` int(120) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `phonenumber` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `concern` varchar(250) NOT NULL,
  `specifyconcern` varchar(250) NOT NULL,
  `hospitalname` varchar(250) NOT NULL,
  `reservationtype` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_timestamp` varchar(250) NOT NULL,
  `remarks` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejectedreservations`
--

INSERT INTO `rejectedreservations` (`ID`, `user_id`, `listing_id`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `concern`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`, `remarks`) VALUES
(22, 95, 8, 'asdasdasd', 'qweqweqw', '2022-04-23', '09:00', '09887868878', ' larry.mabuti.jr@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-15 06:41:39', '2022-04-15 13:16:50', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`ID`, `firstname`, `lastname`) VALUES
(1, 'larry', 'goods'),
(2, 'lerry', 'hapatinga');

-- --------------------------------------------------------

--
-- Table structure for table `upcomingreservations`
--

CREATE TABLE `upcomingreservations` (
  `ID` int(120) NOT NULL,
  `reservation_code` varchar(255) NOT NULL,
  `user_id` int(120) NOT NULL,
  `listing_id` int(120) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `concern` varchar(255) NOT NULL,
  `specifyconcern` varchar(255) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `reservationtype` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcomingreservations`
--

INSERT INTO `upcomingreservations` (`ID`, `reservation_code`, `user_id`, `listing_id`, `firstname`, `lastname`, `fullname`, `date`, `time`, `phonenumber`, `email`, `concern`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`) VALUES
(47, 'SCPHRES860395', 95, 8, 'Sample ', 'LAng', 'Sample  LAng', '2022-04-29', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-15 04:31:47', '2022-04-15 12:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `userbooking`
--

CREATE TABLE `userbooking` (
  `ID` int(11) NOT NULL,
  `user_id` int(120) NOT NULL,
  `listing_id` int(120) NOT NULL,
  `patientFirstName` varchar(50) NOT NULL,
  `patientLastName` varchar(50) NOT NULL,
  `patientDate` varchar(255) NOT NULL,
  `patientTime` varchar(255) NOT NULL,
  `patientPhoneNumber` varchar(55) NOT NULL,
  `patientEmail` varchar(100) NOT NULL,
  `patientConcern` varchar(50) NOT NULL,
  `patientSpecifyConcern` varchar(50) NOT NULL,
  `patientHospitalName` varchar(50) NOT NULL,
  `patientReservationType` varchar(50) NOT NULL,
  `bookingTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userbooking`
--

INSERT INTO `userbooking` (`ID`, `user_id`, `listing_id`, `patientFirstName`, `patientLastName`, `patientDate`, `patientTime`, `patientPhoneNumber`, `patientEmail`, `patientConcern`, `patientSpecifyConcern`, `patientHospitalName`, `patientReservationType`, `bookingTimestamp`) VALUES
(206, 96, 10, 'Justine', 'Brownlee', '2022-04-21', '00:00', '09123232323', 'hapatingajohnlerry@gmail.com', 'Non-Covid', 'Cough', 'Cebu Doctors University Hospital', 'room', '2022-04-13 11:09:59'),
(214, 95, 9, 'asdasd', 'asdasd', '2022-04-21', '09:00', '09887868878', 'nior3210@gmail.com', 'Covid', '', 'Mount Banawe General Hospital', 'bed', '2022-04-13 11:35:11'),
(215, 95, 9, 'qweqw', 'qwe', '2022-04-21', '09:00', '09887868878', 'nior3210@gmail.com', 'Covid', '', 'Mount Banawe General Hospital', 'bed', '2022-04-13 11:37:14'),
(218, 96, 10, 'John', 'Santos', '2022-04-30', '09:00', '09125253535', 'hapatingajohnlerry@gmail.com', 'Covid', '', 'Cebu Doctors University Hospital', 'room', '2022-04-15 14:39:04'),
(224, 95, 8, 'asdasdasd', 'qweqweqw', '2022-04-23', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-15 05:16:50'),
(226, 96, 10, 'Bruno', 'Juan', '2022-04-27', '09:00', '09125253535', 'hapatingajohnlerry@gmail.com', 'Covid', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-15 14:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `userpatient`
--

CREATE TABLE `userpatient` (
  `patientUserID` int(11) NOT NULL,
  `patientUsername` varchar(65) NOT NULL,
  `patientFirstname` varchar(50) NOT NULL,
  `patientLastname` varchar(50) NOT NULL,
  `patientEmail` varchar(65) NOT NULL,
  `patientPassword` varchar(128) NOT NULL,
  `patientPhoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpatient`
--

INSERT INTO `userpatient` (`patientUserID`, `patientUsername`, `patientFirstname`, `patientLastname`, `patientEmail`, `patientPassword`, `patientPhoneNumber`) VALUES
(93, '', 'larry jr.', 'Mabuti', 'nior3210@gmail.com', '$2y$10$gbfiybMWhIqBQpIFQyjW1ujplceVJKFhdWGkelysKIrqQdQ6J2sqq', '09445757766'),
(95, '', 'Larry ', 'Mabuti JR', 'jlerry005@gmail.com', '$2y$10$Y8edcsFnH/nBbh4SwISTz.BkJwUgmPcfBSLx0fLrJOwtmsheEyznm', '09663700835'),
(96, '', 'john lerry', 'hapatinga', 'hapatingajohnlerry@gmail.com', '$2y$10$.utA72BmUgvY4.hsp7L0PeiCr6K5jgJ0Kti1GKeQ4UeV3kDoXiFR.', '09455526133');

-- --------------------------------------------------------

--
-- Table structure for table `userpatienttemp`
--

CREATE TABLE `userpatienttemp` (
  `tempUserID` int(11) NOT NULL,
  `tempUsername` varchar(65) NOT NULL,
  `tempFirstname` varchar(50) NOT NULL,
  `tempLastname` varchar(50) NOT NULL,
  `tempUserEmail` varchar(65) NOT NULL,
  `tempUserpassword` varchar(128) NOT NULL,
  `tempUserPhoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpatienttemp`
--

INSERT INTO `userpatienttemp` (`tempUserID`, `tempUsername`, `tempFirstname`, `tempLastname`, `tempUserEmail`, `tempUserpassword`, `tempUserPhoneNumber`) VALUES
(64, '', 'larry jr.', 'Mabuti', 'nior3210@gmail.com', '$2y$10$HuglKBbJCp0VGNOZ2EUZHOLcjpyPoaRznYHeNg1639O.A3urAi2Wq', '09445757766'),
(65, '', 'John Lerry', 'Hapatinga', 'hapatingajohnlerry@gmail.com', '$2y$10$T8UoVOlXhLu4XjkH2gCpn.3MsgXJ69QhkTakFEa4QnXCOGd0WPaHe', '09513513513'),
(66, '', 'Juan', 'Delacruz', 'eksdi420@gmail.com', '$2y$10$FDF0cbP4E.c8lNvndO6iG.HtZd.HX0x2UcTFHxXO9QeRFD9Kle3ia', '09667574464'),
(67, '', 'Juan', 'dela Cruz', 'eksdi420@gmail.com', '$2y$10$wRzSqC1iG5DfURbMXEgINOEEq0jtdbMLj2LTsTbODIcGp1mMIHA9e', '09778858585'),
(68, '', 'Larry ', 'Mabuti JR', 'jlerry005@gmail.com', '$2y$10$tbLSSPYMgabE/kdWR9WBeekbySf9W85xI1jCndpxrjkyOuzhW4h8C', '09663700835'),
(69, '', 'john lerry', 'hapatinga', 'hapatingajohnlerry@gmail.com', '$2y$10$xQzJjY2TGNqkJHNV.MdTWOXnnWQ7pZuV8BeQj2kdByVJjvZmUuV8W', '09455526133'),
(70, '', 'John Lerry', 'Hapatinga', 'lerryhapatinga005@gmail.com', '$2y$10$RKpH.UaJ25fYN0NhmkVpmO9eiEHj/qgaZMonOb.Bg7Kth22H2glFe', '09455526135'),
(71, '', 'Sonic', 'Hedgehog', 'lerryhapatinga005@gmail.com', '$2y$10$kWONh2jeb6LYfi.bDtEPNur/X9lGtsouP86Vpx2/5oPHt.DuKus72', '09455526135'),
(72, '', 'Sonic', 'Hedgehog', 'lerryhapatinga005@gmail.com', '$2y$10$.E2C206g4bwcg8w.g8ARhud9n6eRigYeR/Gdo2X0Xb7r3Fn66vjAO', '09455526135'),
(73, '', 'larry', 'Delacruz', 'eksdi420@gmail.com', '$2y$10$yBSWXn4.M4CbkGjoSxEMUeLXYLyra9yraysEkQIHL6KUy1vxFAp/O', '09445757710');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvedadminsignup`
--
ALTER TABLE `approvedadminsignup`
  ADD PRIMARY KEY (`hospitalID`);

--
-- Indexes for table `approvedhospital`
--
ALTER TABLE `approvedhospital`
  ADD PRIMARY KEY (`approvalID`),
  ADD KEY `hospitalID` (`hospitalID`);

--
-- Indexes for table `approved_hospital`
--
ALTER TABLE `approved_hospital`
  ADD PRIMARY KEY (`approvalID`);

--
-- Indexes for table `citydata`
--
ALTER TABLE `citydata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `completedreservations`
--
ALTER TABLE `completedreservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `listing_id` (`listing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expiredreservations`
--
ALTER TABLE `expiredreservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `listing_id` (`listing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hospitalaccount`
--
ALTER TABLE `hospitalaccount`
  ADD PRIMARY KEY (`hospitalID`),
  ADD KEY `infoID` (`infoID`);

--
-- Indexes for table `hospitaldocuments`
--
ALTER TABLE `hospitaldocuments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hospital_id` (`hospitalID`);

--
-- Indexes for table `hospitalinformation`
--
ALTER TABLE `hospitalinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hospitallisting`
--
ALTER TABLE `hospitallisting`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `hospitalID` (`hospitalID`);

--
-- Indexes for table `hospitalsignuphistory`
--
ALTER TABLE `hospitalsignuphistory`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `hospitalID` (`hospitalID`);

--
-- Indexes for table `listingimages`
--
ALTER TABLE `listingimages`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `listing_id` (`listing_idFK`);

--
-- Indexes for table `otpstorage`
--
ALTER TABLE `otpstorage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `emailID` (`emailID`);

--
-- Indexes for table `pendingadminsignup`
--
ALTER TABLE `pendingadminsignup`
  ADD PRIMARY KEY (`pendingID`);

--
-- Indexes for table `referralfiles`
--
ALTER TABLE `referralfiles`
  ADD PRIMARY KEY (`referral_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `rejectedhospital`
--
ALTER TABLE `rejectedhospital`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rejectedreservations`
--
ALTER TABLE `rejectedreservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `listing_id` (`listing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upcomingreservations`
--
ALTER TABLE `upcomingreservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `listing_id` (`listing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `userbooking`
--
ALTER TABLE `userbooking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `listing_id` (`listing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `userpatient`
--
ALTER TABLE `userpatient`
  ADD PRIMARY KEY (`patientUserID`);

--
-- Indexes for table `userpatienttemp`
--
ALTER TABLE `userpatienttemp`
  ADD PRIMARY KEY (`tempUserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvedadminsignup`
--
ALTER TABLE `approvedadminsignup`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `approvedhospital`
--
ALTER TABLE `approvedhospital`
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `approved_hospital`
--
ALTER TABLE `approved_hospital`
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `citydata`
--
ALTER TABLE `citydata`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `completedreservations`
--
ALTER TABLE `completedreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `expiredreservations`
--
ALTER TABLE `expiredreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospitalaccount`
--
ALTER TABLE `hospitalaccount`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hospitaldocuments`
--
ALTER TABLE `hospitaldocuments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `hospitalinformation`
--
ALTER TABLE `hospitalinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `hospitallisting`
--
ALTER TABLE `hospitallisting`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hospitalsignuphistory`
--
ALTER TABLE `hospitalsignuphistory`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `listingimages`
--
ALTER TABLE `listingimages`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=624;

--
-- AUTO_INCREMENT for table `otpstorage`
--
ALTER TABLE `otpstorage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pendingadminsignup`
--
ALTER TABLE `pendingadminsignup`
  MODIFY `pendingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `referralfiles`
--
ALTER TABLE `referralfiles`
  MODIFY `referral_id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `rejectedhospital`
--
ALTER TABLE `rejectedhospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `rejectedreservations`
--
ALTER TABLE `rejectedreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upcomingreservations`
--
ALTER TABLE `upcomingreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `userpatient`
--
ALTER TABLE `userpatient`
  MODIFY `patientUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `userpatienttemp`
--
ALTER TABLE `userpatienttemp`
  MODIFY `tempUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvedhospital`
--
ALTER TABLE `approvedhospital`
  ADD CONSTRAINT `approvedhospital_ibfk_1` FOREIGN KEY (`hospitalID`) REFERENCES `hospitalinformation` (`ID`);

--
-- Constraints for table `completedreservations`
--
ALTER TABLE `completedreservations`
  ADD CONSTRAINT `completedreservations_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `hospitallisting` (`listing_id`),
  ADD CONSTRAINT `completedreservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userpatient` (`patientUserID`);

--
-- Constraints for table `expiredreservations`
--
ALTER TABLE `expiredreservations`
  ADD CONSTRAINT `expiredreservations_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `hospitallisting` (`listing_id`),
  ADD CONSTRAINT `expiredreservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userpatient` (`patientUserID`);

--
-- Constraints for table `hospitalaccount`
--
ALTER TABLE `hospitalaccount`
  ADD CONSTRAINT `hospitalaccount_ibfk_1` FOREIGN KEY (`infoID`) REFERENCES `hospitalinformation` (`ID`);

--
-- Constraints for table `hospitaldocuments`
--
ALTER TABLE `hospitaldocuments`
  ADD CONSTRAINT `hospitaldocuments_ibfk_1` FOREIGN KEY (`hospitalID`) REFERENCES `pendingadminsignup` (`pendingID`);

--
-- Constraints for table `hospitallisting`
--
ALTER TABLE `hospitallisting`
  ADD CONSTRAINT `hospitallisting_ibfk_1` FOREIGN KEY (`hospitalID`) REFERENCES `hospitalinformation` (`ID`);

--
-- Constraints for table `hospitalsignuphistory`
--
ALTER TABLE `hospitalsignuphistory`
  ADD CONSTRAINT `hospitalsignuphistory_ibfk_1` FOREIGN KEY (`hospitalID`) REFERENCES `approved_hospital` (`approvalID`),
  ADD CONSTRAINT `hospitalsignuphistory_ibfk_2` FOREIGN KEY (`hospitalID`) REFERENCES `rejectedhospital` (`ID`);

--
-- Constraints for table `listingimages`
--
ALTER TABLE `listingimages`
  ADD CONSTRAINT `listingimages_ibfk_1` FOREIGN KEY (`listing_idFK`) REFERENCES `hospitallisting` (`listing_id`);

--
-- Constraints for table `otpstorage`
--
ALTER TABLE `otpstorage`
  ADD CONSTRAINT `otpstorage_ibfk_1` FOREIGN KEY (`emailID`) REFERENCES `userpatienttemp` (`tempUserID`);

--
-- Constraints for table `referralfiles`
--
ALTER TABLE `referralfiles`
  ADD CONSTRAINT `referralfiles_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `userbooking` (`ID`);

--
-- Constraints for table `rejectedreservations`
--
ALTER TABLE `rejectedreservations`
  ADD CONSTRAINT `rejectedreservations_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `hospitallisting` (`listing_id`),
  ADD CONSTRAINT `rejectedreservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userpatient` (`patientUserID`);

--
-- Constraints for table `upcomingreservations`
--
ALTER TABLE `upcomingreservations`
  ADD CONSTRAINT `upcomingreservations_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `hospitallisting` (`listing_id`),
  ADD CONSTRAINT `upcomingreservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userpatient` (`patientUserID`);

--
-- Constraints for table `userbooking`
--
ALTER TABLE `userbooking`
  ADD CONSTRAINT `userbooking_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `hospitallisting` (`listing_id`),
  ADD CONSTRAINT `userbooking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userpatient` (`patientUserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
