-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 04:05 PM
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
(113, 188, 'Philippine Heart Center', 0, '2022-04-21 12:44:43'),
(114, 189, 'Metro North Medical Center Hospital', 0, '2022-04-21 13:17:42'),
(115, 190, 'Metro Iloilo Hospital and Medical Center, Inc.', 0, '2022-04-21 13:26:12'),
(116, 191, 'Makati Medical Center', 0, '2022-04-21 13:27:26'),
(117, 192, 'Pacific Global Medical Center', 0, '2022-04-23 07:00:20');

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
  `severity` varchar(255) NOT NULL,
  `specifyconcern` varchar(255) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `reservationtype` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completedreservations`
--

INSERT INTO `completedreservations` (`ID`, `reservation_code`, `user_id`, `listing_id`, `remarks`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `concern`, `severity`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`) VALUES
(90, 'SCPHRES241629', 95, 8, 'Successful', 'Benjie', 'Castaneda', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:31:11', '2022-04-15 12:29:07'),
(91, 'SCPHRES860395', 95, 8, 'Successful', 'Lerma', 'Delarosa', '2022-04-14', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:31:35', '2022-04-15 12:31:31'),
(92, 'SCPHRES241629', 98, 8, 'Successful', 'Rubilyn', 'Gonzales', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:31:51', '2022-04-15 12:29:07'),
(111, 'SCPHRES396669', 98, 8, 'Unsuccessful', 'Amor', 'Dela Cruz', '2022-04-23', '09:00', '09123456789', 'nior3210@gmail.com', 'Non-Covid', '', 'for referral', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-24 04:36:15', '2022-04-16 10:00:05'),
(112, 'SCPHRES296516', 98, 8, '', 'Marife ', 'Mercado', '2022-04-23', '09:00', '09123456789', 'nior3210@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-24 04:26:23', '2022-04-16 21:15:06');

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
  `severity` varchar(255) NOT NULL,
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

INSERT INTO `expiredreservations` (`ID`, `user_id`, `listing_id`, `firstname`, `lastname`, `fullname`, `date`, `time`, `phonenumber`, `email`, `concern`, `severity`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`, `remarks`) VALUES
(1, 95, 8, 'Narding', 'Alcantara', '', '2022-04-14', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:36:33', '2022-04-15 13:42:46', 'expired'),
(2, 98, 8, 'Rizaldo', 'Castro', 'kyle Dimaguiba', '2022-04-14', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:36:43', '2022-04-15 13:42:46', 'expired'),
(4, 98, 8, 'Arvin', 'Santos', '', '2022-04-19', '09:00', '09123456789', 'nior3210@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:36:54', '2022-04-16 16:08:59', 'expired'),
(6, 98, 8, 'Joshua', 'Montreal', '', '2022-04-23', '09:00', '09123456789', 'nior3210@gmail.com', 'Non-Covid', '', 'Fractured Ribs', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-24 04:26:23', '2022-04-16 15:59:31', 'expired'),
(7, 98, 8, 'Nicole', 'Marquez', '', '2022-04-23', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-24 04:26:24', '2022-04-22 14:02:50', 'expired'),
(8, 98, 8, 'Nicole', 'Marquez', '', '2022-04-23', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Non-Covid', '', 'Mild tuberculosis', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-24 04:26:24', '2022-04-22 14:19:43', 'expired');

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
(14, 183, 'Amang Rodriguez Memorial Medical Center', 'nior3210@gmail.com', '$2y$10$12Sb7iOKDVIeJuW4Xi65J.8X3BMrTMT6lDO3IvfBQQ43sDPIPtB9u', 0),
(15, 184, 'Mount Banawe General Hospital', 'larryjr@gmail.com', '$2y$10$uLpmXXaAr9kuJolqxP9ycePJeJThlPaa.AQuDS0J9XnjcW8kD0FIi', 0),
(16, 185, 'Cebu Doctors University Hospital', 'hapatingajohnlerry@gmail.com', '$2y$10$PbStvm2lXfATVXFeF3ptCe0ETHQWvGei49mp2iglXnEdNUqggjYm.', 0),
(19, 188, 'Philippine Heart Center', 'larry.mabuti.jr@gmail.com', '$2y$10$QHedBLcLET7taFxc9d6HNuKyw1IKOsqlG2kDXbM0RumaP10n3EjIS', 0),
(20, 189, 'Metro North Medical Center Hospital', 'lerryhapatinga005@gmail.com', '$2y$10$GxHScBUUQpGCkvT7pMdcUeFmP/B2rNEDUSdzGi72WyDS1/QIoDNN6', 0),
(21, 190, 'Metro Iloilo Hospital and Medical Center, Inc.', 'heheeksdi420@gmail.com', '$2y$10$/QS2.uGrbRdmjsVDIFGAa.BG96M858RpTkARCbu9rrYygZ3.BDpbq', 0),
(22, 191, 'Makati Medical Center', 'jlerry005@gmail.com', '$2y$10$7bUnzi8HlejiPkNtB8EPVuGOVIWKi/fnugQ3cOR.z7G11Kx1iqvSK', 0),
(23, 192, 'Pacific Global Medical Center', 'pacific.global@gmail.com', '$2y$10$utywcV5jC2Zs1/.YAwJF5eLOJGTWs2Ar0iUmzqTEEfLT9dToRmYbe', 0);

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
(183, 'Private Hospital', 'Amang Rodriguez Memorial Medical Center', 'Sumulong Highway Sto. Nino, Marikina, 1800 Metro Manila', 'Juan Dela Cruz', 'John De leon', '+639886756677', 'Assistant', 'nior3210@gmail.com', '$2y$10$12Sb7iOKDVIeJuW4Xi65J.8X3BMrTMT6lDO3IvfBQQ43sDPIPtB9u', 0, '2022-04-20 02:29:53'),
(184, 'Public Hospital', 'Mount Banawe General Hospital', '448 Quezon Ave, Quiapo, Quezon City, 1200 Metro Manila', 'John Juan', 'Kiko Panganiban', '+638675586755', 'Supervisor', 'larryjr@gmail.com', '$2y$10$uLpmXXaAr9kuJolqxP9ycePJeJThlPaa.AQuDS0J9XnjcW8kD0FIi', 0, '2022-04-21 12:38:32'),
(185, 'Public Hospital', 'Cebu Doctors University Hospital', 'President Sergio Suico Osmeña Boulevard, Cebu City', 'Juanito dela Cruz', 'Kiko Panganiban', '+638675576866', 'Assistant', 'hapatingajohnlerry@gmail.com', '$2y$10$PbStvm2lXfATVXFeF3ptCe0ETHQWvGei49mp2iglXnEdNUqggjYm.', 0, '2022-03-30 11:31:48'),
(188, 'Public Hospital', 'Philippine Heart Center', 'East Ave, Diliman, Quezon City, Metro Manila', 'Jose Madrid', 'Jennifer Montreal', '+639123456789', 'Supervisor', 'larry.mabuti.jr@gmail.com', '$2y$10$QHedBLcLET7taFxc9d6HNuKyw1IKOsqlG2kDXbM0RumaP10n3EjIS', 0, '2022-04-21 12:44:42'),
(189, 'Private Hospital', 'Metro North Medical Center Hospital', '1001 Mindanao Avenue, Brgy, Quezon City, 1106 Metro Manila', 'Liwayway Lorenzo', 'Dr. Liezel Nelson', '+631513513513', 'Hospital administrator', 'lerryhapatinga005@gmail.com', '$2y$10$GxHScBUUQpGCkvT7pMdcUeFmP/B2rNEDUSdzGi72WyDS1/QIoDNN6', 0, '2022-04-21 13:17:42'),
(190, 'Private Hospital', 'Metro Iloilo Hospital and Medical Center, Inc.', ' Metropolis Ave, Jaro, Iloilo City, Iloilo', 'Julia Fiasco', 'jonathan Montefalco', '+639856758867', 'Assistant Supervisor', 'heheeksdi420@gmail.com', '$2y$10$/QS2.uGrbRdmjsVDIFGAa.BG96M858RpTkARCbu9rrYygZ3.BDpbq', 0, '2022-04-21 13:26:12'),
(191, 'Private Hospital', 'Makati Medical Center', '2 Amorsolo Street, Legazpi Village, Makati, 1229 Kalakhang Maynila', 'Marife Watson', 'Dr. Lerma Thompson', '+630897089156', 'Associate executive director', 'jlerry005@gmail.com', '$2y$10$7bUnzi8HlejiPkNtB8EPVuGOVIWKi/fnugQ3cOR.z7G11Kx1iqvSK', 0, '2022-04-21 13:27:26'),
(192, 'Private Hospital', 'Pacific Global Medical Center', 'Lot 21 Mindanao Avenue, Novaliches, Quezon City, 1116 Metro Manila', 'Edcel Fernando', 'Dr. Rizaldo Andres', '+639869567955', 'Hospital Administrator', 'pacific.global@gmail.com', '$2y$10$utywcV5jC2Zs1/.YAwJF5eLOJGTWs2Ar0iUmzqTEEfLT9dToRmYbe', 0, '2022-04-23 07:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `hospitallisting`
--

CREATE TABLE `hospitallisting` (
  `listing_id` int(11) NOT NULL,
  `hospitalID` int(20) NOT NULL,
  `hospital_location` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
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

INSERT INTO `hospitallisting` (`listing_id`, `hospitalID`, `hospital_location`, `lat`, `lng`, `hospital_city`, `hospital_name`, `hospital_description`, `hospital_type`, `room`, `room_slot`, `bed`, `bed_slot`, `additional_docs`, `website_link`, `hospital_phone`) VALUES
(8, 183, 'Amang Rodriguez Medical Center, Sumulong Highway Sto. Nino, Marikina, Metro Manila, Philippines', '14.6358837', '121.0982344', 'Marikina', 'Amang Rodriguez Memorial Medical Center', 'This is a sample description.', 'Private Hospital', '', 86, '', 49, 'Yes', 'amangrodriguezhospital.ph', '+639886756677'),
(9, 184, 'Mount Banawe General Hospital, Quezon Ave, Quiapo, Quezon City, Metro Manila, Philippines', '14.5981304', '120.9841946', 'Quezon', 'Mount Banawe General Hospital', 'Mt. Banawe General Hospital is located in Quezon City, Philippines. Company is working in Doctors and Clinics, Health Care business activities. Visit our company website for more information about us : http://www.philippinenursingdirectory.com', 'Public Hospital', '', 13, '', 13, 'Yes', 'http://www.philippinenursingdirectory.com', '+638675586755'),
(10, 185, 'Cebu City Sports Center, Osmeña Blvd, Cebu City, Cebu, Philippines', '', '', 'Cebu', 'Cebu Doctors University Hospital', 'Cebu Doctors\' University Hospital is a leading tertiary level hospital in the Southern Phillipines. It was founded in 1972 and today has 300 beds and 1200 employees, 326 of which are medical doctors. The hospital is also a comprehensive medical education ', 'Public Hospital', '', 94, '', 77, 'Yes', 'https://cebudocgroup.com.ph/', '+638675576866'),
(13, 188, 'Philippine Heart Center, East Ave, Diliman, Quezon City, Metro Manila, Philippines', '14.6440237', '121.0481304', 'Quezon', 'Philippine Heart Center', 'The Philippine Heart Center is a hospital in Central, Quezon City, Philippines, specializing in the treatment of heart ailments. It was established in 1975', 'Public Hospital', '', 9, '', 8, '', 'https://www.phc.gov.ph/', '+639123456789'),
(14, 189, '1001 Mindanao Avenue, Brgy, Quezon City, 1106 Metro Manila', '', '', '', 'Metro North Medical Center Hospital', '', 'Private Hospital', '', 60, '', 48, '', '0', '+631513513513'),
(15, 190, 'Metro Iloilo Hospital and Medical Center, Inc., Metropolis Avenue, Jaro, Iloilo City, Iloilo, Philippines', '10.762569', '122.5806212', 'Iloilo', 'Metro Iloilo Hospital and Medical Center, Inc.', 'MIHMCI PROVIDES THE HIGHEST QUALITY PATIENT-FOCUSED HEALTHCARE THROUGH A HOLISTIC, SCIENTIFIC, AND EVIDENCE-BASED APPROACH, AND DELIVERED BY COMPETENT, ETHICAL AND COMPASSIONATE HEALTHCARE PROFESSIONALS UTILIZING STATE-OF-THE-ART MEDICAL TECHNOLOGY, EQUIP', 'Private Hospital', '', 10, '', 20, '', 'https://www.metroiloilohospital.com', '+639856758867'),
(16, 191, '2 Amorsolo Street, Legazpi Village, Makati, Kalakhang Maynila, Philippines', '14.559025', '121.0146004', 'Makati', 'Makati Medical Center', 'Makati Medical Center, also known as Makati Med, is a tertiary hospital in Makati, Metro Manila, Philippines with more than 600 beds. The hospital was founded on May 31, 1969. ', 'Private Hospital', '', 44, '', 62, '', 'https://www.makatimed.net.ph/', '+630897089156'),
(17, 192, 'Pacific Global Medical Center, Mindanao Avenue, Novaliches, Quezon City, Metro Manila, Philippines', '14.6885243', '121.0298883', '', 'Pacific Global Medical Center', 'hospital, an institution that is built, staffed, and equipped for the diagnosis of disease; for the treatment, both medical and surgical, of the sick and the injured; and for their housing during this process. The modern hospital also often serves as a ce', 'Private Hospital', '', 56, '', 73, '', 'www.pacific-global.com', '+639869567955');

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
(629, 13, 'Philippine Heart Center 20160331', '../web/hospital-images/philippine-heart-center-20160331.jpg'),
(633, 14, 'Metro North Medical Center And Hospital Metro Manila 1460981885 5714d07d8f551', '../web/hospital-images/metro-north-medical-center-and-hospital-metro-manila-1460981885-5714d07d8f551.jpg'),
(634, 10, '73_big', '../web/hospital-images/73_big.jpg'),
(635, 10, '173878581_884437205710513_5710079603660695530_n', '../web/hospital-images/173878581_884437205710513_5710079603660695530_n.jpg'),
(636, 10, 'Bg3 (1)', '../web/hospital-images/bg3 (1).jpg'),
(637, 10, 'Metro North Medical Center And Hospital Metro Manila 1460981885 5714d07d8f551', '../web/hospital-images/metro-north-medical-center-and-hospital-metro-manila-1460981885-5714d07d8f551.jpg'),
(641, 16, 'Makati Medical Center', '../web/hospital-images/Makati-Medical-Center.jpg'),
(642, 16, '0ca9c6f80671b72', '../web/hospital-images/0ca9c6f80671b72.jpg'),
(643, 16, '1d399bfca8f1cca', '../web/hospital-images/1d399bfca8f1cca.jpg'),
(645, 8, 'Amang Rodriguez Memorial Medical Center_CNNPH', '../web/hospital-images/Amang-Rodriguez-Memorial-Medical-Center_CNNPH.jpg'),
(649, 9, 'Mountbanawe', '../web/hospital-images/mountbanawe.jpg'),
(650, 15, 'Metroiloilo', '../web/hospital-images/metroiloilo.jpg'),
(651, 17, 'Pacific Global Pic', '../web/hospital-images/pacific-global-pic.jpg');

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
(83, 83, 436696, '2022-04-17 03:49:08'),
(84, 84, 357572, '2022-04-17 03:50:52'),
(85, 85, 876658, '2022-04-17 04:39:35'),
(86, 86, 334259, '2022-04-17 04:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `patientdata`
--

CREATE TABLE `patientdata` (
  `ID` int(120) NOT NULL,
  `concernType` varchar(120) NOT NULL,
  `covidVariant` varchar(120) NOT NULL,
  `patientConcern` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdata`
--

INSERT INTO `patientdata` (`ID`, `concernType`, `covidVariant`, `patientConcern`) VALUES
(40, '', 'Delta Variant', 'Covid Variant'),
(41, '', 'Alpha Variant', 'Covid Variant'),
(42, '', 'Beta Variant', 'Covid Variant'),
(43, '', 'Omicron Variant', 'Covid Variant'),
(44, '', 'Theta Variant', 'Covid Variant'),
(48, 'Asymptomatic', '', 'Covid'),
(49, 'Mild-to-moderate', '', 'Covid'),
(51, 'Severe', '', 'Covid'),
(52, 'Critical', '', 'Covid'),
(53, 'Non - Covid', '', 'Non - Covid'),
(55, 'Non-Covid', '', 'Non-Covid');

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
(120, 234, 'Banner', '../web/referral-images/banner.jpg'),
(121, 234, 'Banner Img', '../web/referral-images/Banner-img.png'),
(122, 234, 'Banner Img 1', '../web/referral-images/Banner-img-1.png'),
(123, 234, 'Banner Login', '../web/referral-images/banner-login.png'),
(124, 234, 'Banner User Login', '../web/referral-images/banner-user-login.jpg'),
(125, 234, 'Swiftcare Ph Logo', '../web/referral-images/swiftcare-ph-logo.png'),
(126, 234, 'Swiftcare Ph Logo Bg', '../web/referral-images/swiftcare-ph-logo-bg.png'),
(127, 234, 'Your Health, Our Priority', '../web/referral-images/Your Health, Our Priority.png'),
(167, 251, 'Makati Medical Center', '../web/referral-images/Makati-Medical-Center.jpg'),
(170, 254, 'Bg3 (1)', '../web/referral-images/bg3 (1).jpg'),
(172, 256, 'Metro North Medical Center And Hospital Metro Manila 1460981885 5714d07d8f551', '../web/referral-images/metro-north-medical-center-and-hospital-metro-manila-1460981885-5714d07d8f551.jpg');

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

--
-- Dumping data for table `rejectedhospital`
--

INSERT INTO `rejectedhospital` (`ID`, `rejectedType`, `rejectedName`, `rejectedAddress`, `representativeName`, `rejectedSupervisor`, `rejectedphoneNumber`, `rejectedDesignation`, `rejectedEmail`, `rejectedPassword`, `registrationCode`, `rejectTimestamp`) VALUES
(54, 'Private Hospital', 'Dr. Montano Ramos General Hospital', '141 Mindanao Avenue, Project 8, Quezon City, Metro Manila', 'Igme Espinosa', 'Dr. Reynante Rosales', ' +639535135353', 'Admin', 'montano.ramos.general.hospital@gmail.com', 'Asdasd123', '', '2022-04-23 06:47:52'),
(55, 'Private Hospital', 'Pacific Global Medical Center', 'Lot 21 Mindanao Avenue, Novaliches, Quezon City, 1116 Metro Manila', 'Edcel Fernando', 'Dr. Rizaldo Andres', ' +639869567959', 'Hospital Administrator', 'pacificglobal@gmail.com', 'Asdasd123', '', '2022-04-23 06:59:35');

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
  `severity` varchar(255) NOT NULL,
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

INSERT INTO `rejectedreservations` (`ID`, `user_id`, `listing_id`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `concern`, `severity`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`, `remarks`) VALUES
(44, 96, 10, 'Lame', 'Prince', '2022-04-27', '09:04', '09125253535', ' hapatingajohnlerry@gmail.com', 'Covid', 'Severe', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-25 05:40:54', '2022-04-16 17:32:22', 'Rejected'),
(46, 98, 8, 'Makisig', 'Morales', '2022-04-30', '09:00', '09123456789', ' nior3210@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'room', '2022-04-21 12:32:46', '2022-04-16 10:35:29', 'Rejected'),
(50, 95, 8, 'Jose', 'Alvarez', '2022-04-23', '09:00', '09887868878', ' larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:32:59', '2022-04-15 13:16:50', ''),
(54, 96, 10, 'Robin', 'Hood', '2022-04-28', '00:00', '09125253535', ' hapatingajohnlerry@gmail.com', 'Covid', '', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-16 13:18:20', '2022-04-16 17:59:08', ''),
(55, 96, 10, 'Dalisay', 'Velasco', '2022-04-21', '06:00', '09125253535', ' hapatingajohnlerry@gmail.com', 'Covid', '', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-21 12:35:53', '2022-04-16 21:39:29', ''),
(56, 110, 8, 'Honesto', 'Rodriguez\n\n', '2022-04-20', '09:00', '09123456789', ' nior3210@gmail.com', 'Non-Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-25 05:40:15', '2022-04-17 16:02:31', ''),
(58, 99, 10, 'Sherwin', 'Legazpi', '2022-04-28', '09:00', '09123232323', ' hapatingajohnlerry@gmail.com', 'Covid', '', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-23 08:52:30', '2022-04-21 20:28:30', 'Rejected');

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
  `severity` varchar(255) NOT NULL,
  `specifyconcern` varchar(255) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `reservationtype` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcomingreservations`
--

INSERT INTO `upcomingreservations` (`ID`, `reservation_code`, `user_id`, `listing_id`, `firstname`, `lastname`, `fullname`, `date`, `time`, `phonenumber`, `email`, `concern`, `severity`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`) VALUES
(47, 'SCPHRES860395', 95, 8, 'Riza', 'Harris', 'Riza Harris', '2022-04-29', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-21 12:32:24', '2022-04-15 12:31:31'),
(51, 'SCPHRES400164', 96, 10, 'Flordeliza ', 'Rodrigues', 'Flordeliza Rodriguez', '2022-04-27', '09:00', '09125253535', 'hapatingajohnlerry@gmail.com', 'Covid', '', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-21 12:32:48', '2022-04-15 22:40:32'),
(56, 'SCPHRES666259', 99, 10, 'William', 'Morales', 'William Morales', '2022-04-30', '09:00', '09123513535', 'hapatingajohnlerry@gmail.com', 'Covid', '', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-23 08:49:56', '2022-04-22 14:05:30'),
(57, 'SCPHRES146709', 98, 13, 'Michael', 'magsaya', 'Michael magsaya', '2022-04-27', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', 'Severe', '', 'Philippine Heart Center', 'bed', '2022-04-25 03:57:55', '2022-04-25 11:27:18'),
(58, 'SCPHRES983501', 98, 13, 'Jona', 'Carbungco', 'Jona Carbungco', '2022-04-29', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', 'Asymptomatic', '', 'Philippine Heart Center', 'room', '2022-04-25 03:57:37', '2022-04-25 11:56:44'),
(59, 'SCPHRES263420', 99, 10, 'Spongebob', 'Squarepants', 'Spongebob Squarepants', '2022-05-06', '09:00', '09123513535', 'hapatingajohnlerry@gmail.com', 'Covid', 'Asymptomatic', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-25 05:39:26', '2022-04-25 13:21:31');

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
  `severity` varchar(255) NOT NULL,
  `patientSpecifyConcern` varchar(50) NOT NULL,
  `patientHospitalName` varchar(50) NOT NULL,
  `patientReservationType` varchar(50) NOT NULL,
  `bookingTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userbooking`
--

INSERT INTO `userbooking` (`ID`, `user_id`, `listing_id`, `patientFirstName`, `patientLastName`, `patientDate`, `patientTime`, `patientPhoneNumber`, `patientEmail`, `patientConcern`, `severity`, `patientSpecifyConcern`, `patientHospitalName`, `patientReservationType`, `bookingTimestamp`) VALUES
(214, 95, 9, 'Fermin', 'Pablo', '2022-04-21', '09:00', '09887868878', 'nior3210@gmail.com', 'Covid', '', '', 'Mount Banawe General Hospital', 'bed', '2022-04-21 12:27:17'),
(215, 95, 9, 'Rizaldo', 'Andres', '2022-04-21', '09:00', '09887868878', 'nior3210@gmail.com', 'Covid', '', '', 'Mount Banawe General Hospital', 'bed', '2022-04-21 12:27:40'),
(234, 96, 10, 'Restituto', 'Pena', '2022-04-30', '09:00', '09125253535', 'hapatingajohnlerry@gmail.com', 'Covid', 'Severe', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-25 05:19:45'),
(238, 96, 10, 'Igme', 'Lucas', '2022-04-30', '09:00', '09123232323', 'hapatingajohnlerry@gmail.com', 'Covid', '', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-21 12:28:18'),
(251, 99, 10, 'Spongebob', 'Squarepants', '2022-04-30', '09:00', '09123513535', 'hapatingajohnlerry@gmail.com', 'Asymptomatic', 'Covid', '', 'Cebu Doctors University Hospital', 'room', '2022-04-22 05:35:36'),
(254, 99, 10, 'Roger', 'Chua', '2022-04-30', '09:00', '09123513535', 'hapatingajohnlerry@gmail.com', 'Non - Covid', 'Non - Covid', 'Kapogian', 'Cebu Doctors University Hospital', 'bed', '2022-04-22 06:07:22'),
(256, 99, 10, 'Spongebob', 'Squarepants', '2022-04-30', '09:00', '09123513535', 'hapatingajohnlerry@gmail.com', 'Non-Covid', 'Non-Covid', 'Bone Fracture', 'Cebu Doctors University Hospital', 'bed', '2022-04-22 06:22:22'),
(258, 98, 13, 'mark', 'Tenejeros', '2022-04-29', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', 'Mild-to-moderate', '', 'Philippine Heart Center', 'bed', '2022-04-25 03:50:37');

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
(95, '', 'Larry ', 'Mabuti JR', 'jlerry005@gmail.com', '$2y$10$ailmzG09UMxzDmosuCLU8.KlkUbBUqa6925Q8jCF4FWg92hXlPv9O', '09663700835'),
(96, '', 'john lerry', 'hapatinga', 'hapatingajohnlerry@gmail.com', '$2y$10$9aGgVku1TuBHNRHqQ2NGU.f46tg73ujqUkWwPbVKgZhGPZm8MVKUm', '09455526133'),
(98, '', 'Juan', 'Dela cruz', 'nior3210@gmail.com', '$2y$10$TrTcQSA4d7pSLM.CVO/4r.PtnRdNrr/gUtqUhn2RVhQAXlhKeMWe2', '09663700812'),
(99, '', 'Lerry', 'Squarepants', 'lerryhapatinga005@gmail.com', '$2y$10$Sf2H.vFh/4stez1sHsQrZOt5.6Xhj3U8mwHW2AhprVZX91nw5i6Py', '09455526132'),
(110, '', 'Carlo', 'Goods', 'larry.mabuti.jr@gmail.com', '$2y$10$7cD9bfyDISKsp7zGa71byuQtgbHEdA9Ssqt.86KNqzPX0MXVvfuyK', '09663700855');

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
(83, '', 'Nior', 'Goods', 'larry.mabuti.jr@gmail.com', '$2y$10$Lonf0BxLeVyeq04fCf9Up.JkFawh9jaqOCcVRDQhlX9P3LZkPqs3C', '09663700856'),
(84, '', 'Nior', 'Goodshit', 'larry.mabuti.jr@gmail.com', '$2y$10$EJLiHK61RL2DHqi8E36qk.W/BxFdlqtUrUB6LDb6DeaZjlQWSFIjG', '09663700856'),
(85, '', 'Carlo', 'Mendez', 'larry.mabuti.jr@gmail.com', '$2y$10$FqMD2rXUHFsKuKGU8tIqAuqHao5XvPmKlfLJkcZZLzDKZSfJa43XC', '09663700856'),
(86, '', 'Carlo', 'Goods', 'larry.mabuti.jr@gmail.com', '$2y$10$R0TOkgtwStAPMkpe8StlWu1M24Ci4c.PhnkllzmhiCNgZx2URIu3G', '09663700855');

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
-- Indexes for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

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
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `expiredreservations`
--
ALTER TABLE `expiredreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospitalaccount`
--
ALTER TABLE `hospitalaccount`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hospitaldocuments`
--
ALTER TABLE `hospitaldocuments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `hospitalinformation`
--
ALTER TABLE `hospitalinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `hospitallisting`
--
ALTER TABLE `hospitallisting`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hospitalsignuphistory`
--
ALTER TABLE `hospitalsignuphistory`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `listingimages`
--
ALTER TABLE `listingimages`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT for table `otpstorage`
--
ALTER TABLE `otpstorage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `patientdata`
--
ALTER TABLE `patientdata`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pendingadminsignup`
--
ALTER TABLE `pendingadminsignup`
  MODIFY `pendingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `referralfiles`
--
ALTER TABLE `referralfiles`
  MODIFY `referral_id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `rejectedhospital`
--
ALTER TABLE `rejectedhospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `rejectedreservations`
--
ALTER TABLE `rejectedreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upcomingreservations`
--
ALTER TABLE `upcomingreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `userpatient`
--
ALTER TABLE `userpatient`
  MODIFY `patientUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `userpatienttemp`
--
ALTER TABLE `userpatienttemp`
  MODIFY `tempUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
