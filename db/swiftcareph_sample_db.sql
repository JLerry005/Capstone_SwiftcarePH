-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 03:07 PM
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
-- Database: `swiftcareph_sample_db`
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
(98, 173, 'Novaliches General Hospital', 0, '2022-03-13 11:54:45'),
(99, 174, 'Asd Hospital', 0, '2022-03-13 12:46:59'),
(100, 175, 'Sample Hospital 1', 0, '2022-03-13 12:57:29'),
(101, 176, 'BAN KANA HOSPITAL', 0, '2022-03-13 12:57:44'),
(102, 177, 'Adventist Medical Center Manila', 0, '2022-03-15 09:51:32'),
(104, 179, 'Caloocan Hospital', 0, '2022-03-15 09:51:52'),
(105, 180, 'Nior Hospital', 0, '2022-03-15 10:55:55');

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
(4, 173, 'Novaliches General Hospital', 'hapatingajohnlerry@gmail.com', '$2y$10$TD7zvieYUUS0pExzaN1IC.H2LI05mg3XBnw5cAh.biI3HSGzrGBeS', 2147483647),
(5, 174, 'Asd Hospital', 'larrymabutipogi@gmail.com', '$2y$10$hoKoYcvTj4zp8Q71uG7CtucWdNC7AmNmslejqMBABvL.0H57gGTJi', 2147483647),
(6, 175, 'Sample Hospital 1', 'r4gnar3210@gmail.com', '$2y$10$fFnASrB4R/24yhvaSuLVwuT14e5/YD.eMnf7.BOvLQA6IiHpmfnKC', 0),
(7, 176, 'BAN KANA HOSPITAL', 'jlerry005@gmail.com', '$2y$10$8RL.dTw9HVS3.YTvadVvUegY1FicoE9I5dwrocB4Q1wIIh1j5ve0.', 0),
(8, 177, 'Adventist Medical Center Manila', 'capstone692021@gmail.com', '$2y$10$Y/uEJ57EzVL3WPlIvN9mdOYQoTx/IVhk4JCxmHh8os8x/umo0ByK2', 0),
(10, 179, 'Caloocan Hospital', 'heheeksdi420@gmail.com', '$2y$10$E4jFNbYoYzeKNRzipGLOYeQyp7q4cKzXHZrZVgHo6H/UlKTKZHQua', 0),
(11, 180, 'Kanto ng Tinio hospital', 'nior3210@gmail.com', '$2y$10$/lTNSXixSqS7A6nIgG.9Ju294JJDUkn84R3X3EOwnhB9ZpaiNvGAm', 0);

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
(173, 'Public Hospital', 'Novaliches General Hospital', '793 Quirino Hwy, Novaliches, Quezon City, Metro Manila', 'Marites ', 'Juantoy', '+639051352623', 'Doctor', 'hapatingajohnlerry@gmail.com', '$2y$10$TD7zvieYUUS0pExzaN1IC.H2LI05mg3XBnw5cAh.biI3HSGzrGBeS', 0, '2022-03-13 11:54:44'),
(174, 'Public Hospital', 'Asd Hospital', 'Asd Hospital', 'Asd Hospital', 'Asd Hospital', '+638768879688', 'Asd Hospital', 'larrymabutipogi@gmail.com', '$2y$10$hoKoYcvTj4zp8Q71uG7CtucWdNC7AmNmslejqMBABvL.0H57gGTJi', 0, '2022-03-13 12:46:59'),
(175, 'Public Hospital', 'Sample Hospital 1', 'Caloocan', 'Nior', 'Sakalam', '+639857746577', 'CEO', 'r4gnar3210@gmail.com', '$2y$10$fFnASrB4R/24yhvaSuLVwuT14e5/YD.eMnf7.BOvLQA6IiHpmfnKC', 0, '2022-03-13 12:57:29'),
(176, 'Private Hospital', 'BAN KANA HOSPITAL', 'KANTO TINIO ST', 'Mang Juan Martis', 'Fud G Bar', '+639056139681', 'PUSONG MAMON', 'jlerry005@gmail.com', '$2y$10$8RL.dTw9HVS3.YTvadVvUegY1FicoE9I5dwrocB4Q1wIIh1j5ve0.', 0, '2022-03-13 12:57:44'),
(177, 'Public Hospital', 'Adventist Medical Center Manila', '1975 Corner Donada and, San Juan', 'LeBron James ', 'Kyrie Irving', '+639105030535', 'Sweet sweeper', 'capstone692021@gmail.com', '$2y$10$Y/uEJ57EzVL3WPlIvN9mdOYQoTx/IVhk4JCxmHh8os8x/umo0ByK2', 0, '2022-03-19 12:31:32'),
(179, 'Public Hospital', 'Caloocan Hospital', 'Metro Manila', 'Juan', 'Juanito', '+639096685486', 'CEO', 'heheeksdi420@gmail.com', '$2y$10$E4jFNbYoYzeKNRzipGLOYeQyp7q4cKzXHZrZVgHo6H/UlKTKZHQua', 0, '2022-03-15 09:51:52'),
(180, 'Public Hospital', 'Kanto Ng Tinio Hospital', 'Tinio St', 'Nior Cubes', 'Nior Cubes', '+638767787878', 'CEO', 'nior3210@gmail.com', '$2y$10$/lTNSXixSqS7A6nIgG.9Ju294JJDUkn84R3X3EOwnhB9ZpaiNvGAm', 0, '2022-03-19 04:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `hospitallisting`
--

CREATE TABLE `hospitallisting` (
  `listing_id` int(11) NOT NULL,
  `hospitalID` int(20) NOT NULL,
  `hospital_location` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_description` varchar(255) NOT NULL,
  `hospital_type` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL DEFAULT 'no',
  `room_slot` int(20) DEFAULT NULL,
  `bed` varchar(255) NOT NULL DEFAULT 'no',
  `bed_slot` int(20) DEFAULT NULL,
  `additional_docs` varchar(120) NOT NULL DEFAULT 'no',
  `website_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitallisting`
--

INSERT INTO `hospitallisting` (`listing_id`, `hospitalID`, `hospital_location`, `hospital_name`, `hospital_description`, `hospital_type`, `room`, `room_slot`, `bed`, `bed_slot`, `additional_docs`, `website_link`) VALUES
(2, 177, 'Makati City', 'Adventist Medical Center Manila', 'Sample Description lorem lorem lorem', 'Public Hospital', 'Room', 5, '', 0, 'Yes', 'www.mcuhopsita.com'),
(4, 179, 'Nag logout na ko lods', 'Caloocan Hospital', 'Nag logout na ko lods', 'Public Hospital', 'Room', 69, 'Bed', 69, 'yes', 'Nag logout na ko lods'),
(5, 180, '12', 'Nior Hospital', '33', 'Public Hospital', '', 33, 'Bed', 33, '', '33');

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
(237, 5, 'Nova Big', '../web/hospital-images/nova big.jpg'),
(238, 2, 'Aaa', '../web/hospital-images/aaa.jpg'),
(239, 2, 'Awdawd', '../web/hospital-images/awdawd.jpg'),
(240, 5, 'La La Fish Crackers', '../web/hospital-images/La La Fish Crackers.jpg'),
(241, 2, '155', '../web/hospital-images/155.jpg'),
(242, 5, 'Nissin Ramen Seafood', '../web/hospital-images/Nissin Ramen Seafood.jpg'),
(243, 2, '2022 02 25 (11)', '../web/hospital-images/2022-02-25 (11).png');

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
(1, 1, 175001, '2022-03-02 11:12:50'),
(2, 2, 274828, '2022-03-02 11:16:37'),
(3, 3, 736029, '2022-03-02 11:17:34'),
(4, 4, 298900, '2022-03-02 13:02:23'),
(5, 5, 224422, '2022-03-02 13:10:16'),
(6, 6, 432555, '2022-03-02 13:19:53'),
(7, 7, 412230, '2022-03-02 13:31:02'),
(8, 8, 968593, '2022-03-02 13:33:21'),
(9, 9, 151469, '2022-03-02 14:01:06'),
(10, 10, 268765, '2022-03-02 14:01:18'),
(11, 11, 781767, '2022-03-02 14:02:30'),
(12, 12, 541464, '2022-03-02 14:05:42'),
(13, 13, 795337, '2022-03-02 14:14:53'),
(14, 14, 657234, '2022-03-02 14:48:19'),
(16, 16, 542784, '2022-03-03 10:18:29'),
(17, 17, 142086, '2022-03-03 10:40:32'),
(18, 18, 455671, '2022-03-03 10:46:57'),
(19, 19, 146406, '2022-03-03 10:57:48'),
(20, 20, 109361, '2022-03-03 11:11:49'),
(21, 21, 127938, '2022-03-03 11:17:40'),
(22, 22, 253742, '2022-03-03 11:26:38'),
(23, 23, 205414, '2022-03-03 11:36:20'),
(24, 24, 527407, '2022-03-03 11:53:09'),
(25, 25, 401687, '2022-03-03 11:57:06'),
(26, 26, 606252, '2022-03-04 05:33:27'),
(27, 27, 313962, '2022-03-04 11:20:11'),
(28, 28, 882263, '2022-03-04 11:22:38'),
(29, 29, 613333, '2022-03-04 11:39:46'),
(30, 30, 639067, '2022-03-07 11:44:24'),
(31, 31, 562117, '2022-03-07 11:52:31'),
(32, 32, 900130, '2022-03-07 11:56:04'),
(33, 33, 607542, '2022-03-07 11:58:22'),
(34, 34, 222403, '2022-03-07 11:59:48'),
(35, 35, 759821, '2022-03-07 12:03:35'),
(36, 36, 631185, '2022-03-07 12:05:01'),
(37, 37, 278068, '2022-03-07 12:08:09'),
(38, 38, 299030, '2022-03-07 12:36:24'),
(39, 39, 111756, '2022-03-07 12:38:48'),
(40, 40, 184388, '2022-03-07 12:41:06'),
(41, 41, 461587, '2022-03-07 12:42:48'),
(42, 42, 176775, '2022-03-07 12:59:30'),
(43, 43, 169524, '2022-03-07 13:00:48'),
(44, 44, 308417, '2022-03-07 13:14:45'),
(45, 45, 874192, '2022-03-07 13:18:22'),
(46, 46, 978153, '2022-03-07 13:23:05'),
(47, 47, 996915, '2022-03-07 13:45:57'),
(48, 48, 819918, '2022-03-07 13:50:10'),
(49, 49, 291998, '2022-03-07 13:55:16'),
(50, 50, 883637, '2022-03-13 12:09:36'),
(51, 51, 640521, '2022-03-13 12:10:38'),
(52, 52, 792693, '2022-03-13 12:12:01'),
(53, 53, 105767, '2022-03-13 12:13:51'),
(54, 54, 551937, '2022-03-13 12:14:57'),
(55, 55, 536110, '2022-03-13 12:17:16'),
(56, 56, 484934, '2022-03-13 12:19:39'),
(57, 57, 128269, '2022-03-13 12:22:31'),
(58, 58, 246154, '2022-03-13 12:28:16');

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
(6, '', 'nior', 'goodshit', '', '$2y$10$Ke4wfTb8ieRcrk0jpsmh0ek6cJKJXjeLL.mCqiGCzeLYzUORP97zS', '0912345678'),
(7, '', 'lerry', 'hapatinga', '', '$2y$10$a3DadZKSLwmyaHs7Dorsw.JV/tQTmAfRPmiIPTV7NsnoayWNLWK6C', '09123456789'),
(9, '', 'John Michael', 'De Jesus', '', '$2y$10$VIIP/MJL.6Z1U2LaHfAHhepFg9RuHDxXEn4NPaiCO5ba866/J3xMW', '09123456778'),
(10, '', 'Juan', 'Dela Cruz', '', '$2y$10$AJTe0cVnrfks5JnyjKnYkOuTr/l9vzhUxDutLF4KElLIA6zb0TRzu', '09123453789'),
(11, '', 'Ler', 'Hapatinga', '', '$2y$10$zHW3.B3x2FGV9FvzoShVFOzY4UZJLt7eh6KQkRJ4mz4Nzy97TTwSC', '09123456123'),
(12, '', 'Reriii', 'Hapatinga', '', '$2y$10$84lgNSLku4/8WHpteGnqJefF3EK43jsu3FuBt9REeqWWiAloOz10i', '09123456456'),
(88, '', 'Nior ', 'Goods', 'larry.mabuti.jr@gmail.com', '$2y$10$PKxtmGkNcb0owb6x2mvNDeCWntKOoWl40bhQPURquLG8MdNpaOHGe', '09663700835'),
(89, '', 'Marites ', 'Tan', 'jlerry005@gmail.com', '$2y$10$7ok4I02til7K7wkx5HF/YeTdoZOUbpecBTsW3TPocvEczN2ArAB2u', '09765876543');

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
(1, '', 'Nior', 'Mabuti', 'nior3210@gmail.com', 'asdasdasd3210', '09123345678'),
(2, '', 'Nior', 'Mabuti', 'nior3210@gmail.com', 'asdasdasd', '09123345678'),
(3, '', 'Nior', 'Mabuti', 'nior3210@gmail.com', '$2y$10$V5wruyUk2rdsfNYmIDHDKOCTouN0RNDyxOxHxnpFimXSc7PDkmFhu', '09123345678'),
(4, '', 'Larry Jr.', 'Mabuti', 'nior3210@gmail.com', '$2y$10$VgyFBWvj1UOG0SNNigKJSuDbZdPVqtYjKAsPAzFI7zBGN80FwzIXS', '09123456677'),
(5, '', 'juan', 'dela cruz', 'nior3210@gmail.com', '$2y$10$pjSylkAYEiNhhFtxJ8nWqeECek4xJv.52pxnD4j71a0DSHsj/UgEG', '09993334455'),
(6, '', 'asdasd', 'asdasd', 'nior3210@gmail.com', '$2y$10$KlQHJfZ.0EKfJTK5EEZswO4QYdXc8EI/0BbMbuOjp6u9t5yks1AoO', '09123334455'),
(7, '', 'Testing', 'Testing', 'nior3210@gmail.com', '$2y$10$CfyJpFHDXajrncyd7jfxcOROTTd6PMHnb6zVjQdgJkcaHukuRynYi', '09123345678'),
(8, '', 'Nior', 'qwe', 'nior3210@gmail.com', '$2y$10$K3c5WfMXUAePpStngtrXxOShdSJh5NJgJcXntR3zoP9nRNZYqpObm', '09123345678'),
(9, '', 'Larry Jr.', 'asdasd', 'nior3210@gmail.com', '$2y$10$kbNudtr3K/3lr8JXrswIje68miSBLYwF7eiw43c1Qbv54Ign8Lisy', '09123456666'),
(10, '', 'Larry Jr.', 'asdasd', 'nior3210@gmail.com', '$2y$10$Pu7Zcup9sMp091EXUekfpulvPWKzUHfnFRtP/0kvvqzaBDwl46wQW', '09123456666'),
(11, '', 'nior', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$bsaG2nmESXUQ3P6FJc7jneSZiS5tIOZUBbSe8pJ.kP29vfsDeSiaq', '09663700835'),
(12, '', 'Nior', '09663700835', 'nior3210@gmail.com', '$2y$10$nx3gRhpz3grZOEHX7XclcekySkjYkve2gbgcx1zYDJDXFySuijbYm', '09123322233'),
(13, '', 'Juan', '09663700835', 'larry.mabuti.jr@gmail.com', '$2y$10$T7uKIjNsLr/y3I6PTVbf.OJPTk5Rvuq0/GFrSaWNe5/QK7ZBMUqy2', '09667775593'),
(14, '', 'Juan', '09663700835', 'larry.mabuti.jr@gmail.com', '$2y$10$mM13DoEtJtGrMxryE9PlKu8hHX1Vqx16dMRi8wLYemh574Go4naEC', '09887354657'),
(16, '', 'qweqweqwe', 'qweqweqwe', 'nior3210@gmail.com', '$2y$10$h3/k8Q5yRJzhLGRs.l2xKOBt9x4Jzsy4zgRyJeB/iABUi541sd/kC', '09663700835'),
(17, '', 'Nior', 'goodshit', 'nior3210@gmail.com', '$2y$10$BT6IVyMrvUPnNPBl4nQJ2e9VmZJeTcA5ZfSyGMGGI7/W2KkMCYOpy', '09124456677'),
(18, '', 'John Lerry ', 'Hapatinga', 'jlerry005@gmail.com', '$2y$10$YTz5E8geIZiv9X2vxXduceKjfEn9r7cMIfqr2I6xkMpB7DZwG5ziq', '09125354613'),
(19, '', 'nior', 'cubes', 'larry.mabuti.jr@gmail.com', '$2y$10$E4Qd71nDMrBm5p.mcVi6u.sdG6POXOrz3A2CCniZ3BWdxTXvjc4sG', '09663700835'),
(20, '', 'Level 500', 'Komorebi', 'larry.mabuti.jr@gmail.com', '$2y$10$jJva8Y2H8Y.SefubGEt5gOzGyD/bAj/wl5v9UFy9ECb4r/QYx.sqK', '09663700835'),
(21, '', 'Level One', 'R4nar', 'jlerry005@gmail.com', '$2y$10$bHfnBM1qnxpWLBQqizUClO/KSxsqpD9VsNlBYqShk45tw079NnaCe', '0953515351'),
(22, '', 'Level 500', 'Komorebi', 'hapatingajohnlerry@gmail.com', '$2y$10$TUvlU92fiGzdPP7LPiPgvef0bfR7mU6HDWKHGIEKaUbR4S5541I02', '09124245424'),
(23, '', 'level one', 'Komorebi', 'hapatingajohnlerry@gmail.com', '$2y$10$6Gy4hDY3D3wSwIviRAaRcu4bDr9v2FBUMtNwLXC0W4uwJ9pmtnXUK', '09341251251'),
(24, '', 'Fanboi', 'Discord', 'hapatingajohnlerry@gmail.com', '$2y$10$sowXLDCFzOha1nCwXaztVeBZXlSJfMDcs.jZMwcpeJNXoUZ.U.Np2', '09123456236'),
(25, '', 'John', 'Pagayunan', 'larry.mabuti.jr@gmail.com', '$2y$10$FY.dYbU1M.scG7Gfrz2cSep9j4LYaaPSwWokBzYhhQ12ucwRAd5Ku', '09124576633'),
(26, '', 'larry', 'mabuti', 'nior3210@gmail.com', '$2y$10$5DfZHRluUMt4i6TFZkjJMOiqwtJzRN9c3bwODCuSpv4mYo8U.PAXm', '09663700835'),
(27, '', 'Juan', 'Hapatinga', 'larry.mabuti.jr@gmail.com', '$2y$10$cRvLvXBFuUtGzAaO884Sg.zN2.0IJFt08k.4gZjc21HNFDPCb/4i6', '09885674855'),
(28, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$liFA0yMV/sYR9YXzv8lTUOT2gI5AlN0c1n0mQxmLf5b9urSOEjp3O', '09663700835'),
(29, '', 'qwe', 'asdasd', 'larry.mabuti.jr@gmail.com', '$2y$10$rSwjgEIqu7RMCwjnii9Oe.mwhF/PZ25yOQskuxphpvRY9/VPkWy02', '09675849955'),
(30, '', 'larry', 'goods', 'nior3210@gmail.com', '$2y$10$mnKm/3ENzzdS78l/LIz6eeeK9cIJxnhyWVQ6bGjHPkf8c26SX0nTa', '09885748856'),
(31, '', 'larry', 'goods', 'nior3210@gmail.com', '$2y$10$H8gOU7nFd2ILp1IBRjvpiuKBCBnLzbELcobJazGQketsVD84ows5e', '09885748856'),
(32, '', 'nior', 'goods', 'nior3210@gmail.com', '$2y$10$KzvCNgyufV2N4KPnK9/ad.fkNxRKJt6mqrtFWd9SKt8FzIpKDEGSi', '09663700765'),
(33, '', 'asd', 'asdasd', 'nior3210@gmail.com', '$2y$10$4qbjGAFKCVH0MBkBmkMSH.RFYFEf04ecWUoVgcv6W7s5GhQD7QjYO', '09663700654'),
(34, '', 'sdasdasdas', 'dasdasd', 'nior3210@gmail.com', '$2y$10$7FuHI5RTu3KL4hs0xx4buOaF/bvVjSpQa6QDukh9/kcQ7p/Cb6fNm', '09663700919'),
(35, '', 'asdasdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$aBM1O1jrvk0ZVeCDwrGGUOEdGA7KnVAM.YlKVrOrCEO.Zh5q0jzom', '09663700782'),
(36, '', 'qwe', 'asdasdasdas', 'nior3210@gmail.com', '$2y$10$8qznFMPCmROW7Q0hDfeXs.tGKJAKfBJvlUz3PV7xv7hqYhPo6GOtC', '09663700909'),
(37, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$K9R3IOogxiD/d6EWNECVTezRPKUBoaQq7VVJ1NwZpXTwTze9CBI0q', '09663700998'),
(38, '', 'asdasdasdas', 'dasdasd', 'nior3210@gmail.com', '$2y$10$SGzY0cArDDbwqTK7CkrPIOw3gYLwGvyZCx.36UBpFQmTkfUEnW3XO', '09663700009'),
(39, '', 'asdasdasdas', 'dasdasd', 'nior3210@gmail.com', '$2y$10$ysZfbN1QuBUR6pbDWd7Pq.27he6FM2.5nz6DkoGl0iCs6FZjUh8Uu', '09663700897'),
(40, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$ar9c23a54NRnHYtYf8BLWOaaKDm9pQHV1SyOTrBzuGQGh2287tjl2', '09663700675'),
(41, '', 'sdasdasdas', 'dasdasd', 'nior3210@gmail.com', '$2y$10$QTZkxraC3ND.nbt43oWFGeB9.Pqc78eJpIu8QEPnEfzAUD3RsTOke', '09663700843'),
(42, '', 'asdasdasda', 'sdasdasd', 'nior3210@gmail.com', '$2y$10$4YcLNuQcXADjOOxrU66bC.vwzm/sDW5D.zujQaRA2WfllhrDPo4Xm', '09663700876'),
(43, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$4BikOK4Pj5MeE.98MYINhuwl.UDqAOJtabDWPn5Q3zaGH6vM7OWGa', '09663700776'),
(44, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$ZEFPXFQZfG5a.UARcj0BJu3wcyYJyWu3IcCU4x0nBuXsgjyAlt5vW', '09663700677'),
(45, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$inP4fmlno2VT.21MtUMww.kU2AYLZOmEb8C81KcK7SrByBj8Yayha', '09663700123'),
(46, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$F/wcTc3YZEHNbOjI94a6oei8cZDRlZNfxQLnTm5hiRuNQDCvTJigK', '09663700123'),
(47, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$NeErBaiCB6vM1axH8J7V1uHsW1y5qQbcnQ66h6p7ktd.rnwQyad7y', '09663700666'),
(48, '', 'asdasdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$m1ladqcJUAlBn6XKBxdwsu83uHtB6F/9FPnKB51hS.M41E4S/u.ru', '09663700776'),
(49, '', 'asdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$JBMzDcpn8VKRYlJ5cjyiyu3NURfI8Qi5yyz5fiktCy0aXvDcpFj9u', '09663700111'),
(50, '', 'Nior ', 'Goods', 'larry.mabuti.jr@gmail.com', '$2y$10$n3RDNFKJQN9biZ8VK2R5LOjWl3EiUfM7ABcv.uco/6gmijB4c/IRa', '09663700835'),
(51, '', 'Marites ', 'Tan', 'jlerry005@gmail.com', '$2y$10$GIa5St5ZYzSJurKJ7N.oH.wo/iJUXPzDwS.sapfJkOY45ZZl97Snm', '09765876543'),
(52, '', 'qwedasd', 'qwaedasdasd', 'nior3210@gmail.com', '$2y$10$YTZ8qAR/2pGlClA6xwVwsOkrJ1pjO7ltZw.1rnFyFE80tXEbHrGY6', '09663700665'),
(53, '', 'qawedasd', 'qwedawdasd', 'nior3210@gmail.com', '$2y$10$bIpFlLm4nx7yXLdzkV2bGufUzYNNRB2k8b5iUNfJ2pVg69mrEax4y', '09663700541'),
(54, '', 'qweqweqwe', '12e12eqweqw', 'nior3210@gmail.com', '$2y$10$A4wiDnGEb.6rT2ryUEDO9Ou5YkmhGJuZ9XClGo9LtFN9gS7Z9Yux2', '09663700541'),
(55, '', 'qweqasd', 'qweqwedqw', 'nior3210@gmail.com', '$2y$10$Tqw2GeJNBmDOAUUOkN6ah.3UxyFLsLHCH9k9vJxEKLvvMc6CzTPPK', '09123345573'),
(56, '', 'qweqweqwe', 'qweqweqwe', 'nior3210@gmail.com', '$2y$10$x8iiedciiB4Yur6Kgl07PeTNYKZagvRlmC9O7c/i2BSSBYj6sFgwa', '0912334568'),
(57, '', '1231asdasd', 'asdasdasd', 'nior3210@gmail.com', '$2y$10$VjBgeuIZgCZS3vYcSvD/d.qK7WcQLEzrDUcYVMUjRQKQfbW1llvh2', '09663700887'),
(58, '', 'qasdasdasd', 'asdasdasdasd', 'nior3210@gmail.com', '$2y$10$Odngcw7HdD3GEwRPkC6OrOFL2EYk.itr6vJHZdumXjdUv79HEVi02', '09123345678');

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
-- Indexes for table `rejectedhospital`
--
ALTER TABLE `rejectedhospital`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `approved_hospital`
--
ALTER TABLE `approved_hospital`
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitalaccount`
--
ALTER TABLE `hospitalaccount`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hospitaldocuments`
--
ALTER TABLE `hospitaldocuments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `hospitalinformation`
--
ALTER TABLE `hospitalinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `hospitallisting`
--
ALTER TABLE `hospitallisting`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospitalsignuphistory`
--
ALTER TABLE `hospitalsignuphistory`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `listingimages`
--
ALTER TABLE `listingimages`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `otpstorage`
--
ALTER TABLE `otpstorage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pendingadminsignup`
--
ALTER TABLE `pendingadminsignup`
  MODIFY `pendingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `rejectedhospital`
--
ALTER TABLE `rejectedhospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userpatient`
--
ALTER TABLE `userpatient`
  MODIFY `patientUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `userpatienttemp`
--
ALTER TABLE `userpatienttemp`
  MODIFY `tempUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvedhospital`
--
ALTER TABLE `approvedhospital`
  ADD CONSTRAINT `approvedhospital_ibfk_1` FOREIGN KEY (`hospitalID`) REFERENCES `hospitalinformation` (`ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
