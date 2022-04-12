-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 04:03 PM
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
(111, 186, 'Sample hospital', 0, '2022-03-30 13:05:11');

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
(38, 'SCPHRES409316', 95, 8, 'Arrived', 'Joshua', 'Bravo', '2022-04-22', '09:00', '12312313131', 'asd@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 06:17:09', '2022-04-08 20:11:34'),
(39, 'SCPHRES297057', 95, 8, 'Did not Arrive', 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', 'asd@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 06:17:15', '2022-04-08 20:09:10'),
(40, 'SCPHRES792231', 95, 8, 'Successful', 'John ', 'Doe', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 07:55:16', '2022-04-12 12:46:55'),
(41, 'SCPHRES792231', 95, 8, 'Unsuccessful', 'John ', 'Doe', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 07:55:39', '2022-04-12 12:46:55'),
(42, 'SCPHRES487729', 95, 8, 'Unsuccessful', 'Johhny ', 'Bravo', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 07:54:12', '2022-04-12 12:47:50'),
(43, 'SCPHRES666420', 95, 8, 'Successful', 'Larry', 'Goods', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 12:08:47', '2022-04-12 12:47:50');

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
(17, 186, 'Sample hospital', 'larrymabutipogi@gmail.com', '$2y$10$tISWymisNJ55z/WaMYjvCe.353mO8gmse3.JoYXFNT7fF6YF0ObP2', 0);

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
(186, 'Public Hospital', 'Sample hospital', 'Caloocan, Metro manila', 'Larry Mabuti jr', 'John Lerry Hapatinga', '+639663700835', 'Assistant Manager', 'larrymabutipogi@gmail.com', '$2y$10$tISWymisNJ55z/WaMYjvCe.353mO8gmse3.JoYXFNT7fF6YF0ObP2', 0, '2022-03-30 13:05:11');

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
(8, 183, 'Sumulong Highway Sto. Nino, Marikina, 1800 Metro Manila', 'valenzuela', 'Amang Rodriguez Memorial Medical Center', 'This is a sample description.', 'Private Hospital', '', 95, '', 94, 'Yes', 'amangrodriguezhospital.ph', '+639886756677'),
(9, 184, '448 Quezon Ave, Quiapo, Quezon City, 1200 Metro Manila', 'valenzuela', 'Mount Banawe General Hospital', 'This is a sample paragraph.', 'Public Hospital', '', 0, '', 5, 'Yes', '', '+638675586755'),
(10, 185, 'Osmeña Blvd, Cebu City, 6000 Cebu', 'Cebu', 'Cebu Doctors University Hospital', 'Cebu Doctors\' University Hospital is a leading tertiary level hospital in the Southern Phillipines. It was founded in 1972 and today has 300 beds and 1200 employees, 326 of which are medical doctors. The hospital is also a comprehensive medical education ', 'Public Hospital', '', 98, '', 99, 'Yes', 'https://cebudocgroup.com.ph/', '+638675576866'),
(11, 186, '', '', 'Sample hospital', '', 'Public Hospital', 'no', 0, 'no', 0, 'no', '0', '+639663700835');

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
(621, 8, 'Ambulance2', '../web/hospital-images/ambulance2.jpg');

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
(69, 69, 138838, '2022-04-06 02:25:38');

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
(76, 192, 'Bb', '../web/referral-images/bb.jpg');

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
  `user_id` varchar(250) NOT NULL,
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
  `booking_timestamp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejectedreservations`
--

INSERT INTO `rejectedreservations` (`ID`, `user_id`, `listing_id`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `concern`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`) VALUES
(1, 'john lerry', 0, '2022-04-09', '09:00', '09125253535', ' ', 'Covid', '', 'Covid', 'bed', '2022-04-08 15:15:24', '96', '2022-04-08 11:55:35', '10'),
(2, '96', 10, 'john lerry', 'hapatinga', '2022-04-09', '09:00', '09125253535', ' ', 'Covid', '', 'Covid', 'bed', '2022-04-08 11:56:47', '2022-04-08 15:15:24'),
(3, '96', 10, 'Maria', 'Khalifa', '2022-04-19', '09:00', '09125253535', ' hapatinga@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 11:57:27', '2022-04-08 17:29:23'),
(4, '96', 10, 'Maria', 'Khalifa', '2022-04-19', '09:00', '09125253535', ' hapatinga@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:02:04', '2022-04-08 17:29:23'),
(5, '96', 10, 'john lerry', 'hapatinga', '2022-04-09', '09:00', '09125253535', ' hapatinga@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:04:13', '2022-04-08 20:03:50'),
(6, '95', 8, 'Juanito', 'Balagbag', '2022-04-23', '09:00', '12312313131', ' ', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:04:47', '2022-04-08 15:23:12'),
(7, '96', 10, 'awdawd', 'awdawd', '2022-04-14', '09:00', '09123232323', ' hapatinga@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:05:13', '2022-04-08 20:05:04'),
(8, '96', 10, 'john lerry', 'hapatinga', '2022-04-11', '09:00', '09123232323', ' sample@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:09:34', '2022-04-08 20:09:02'),
(9, '95', 8, 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', ' asd@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:11:53', '2022-04-08 20:09:10'),
(10, '96', 10, 'awdawd', 'hapatinga', '2022-04-16', '09:00', '09123232323', ' sample@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:12:48', '2022-04-08 20:09:13'),
(11, '95', 8, 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', ' asd@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:13:27', '2022-04-08 20:09:10'),
(12, '95', 8, 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', ' asd@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:13:27', '2022-04-08 20:09:10'),
(13, '95', 8, 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', ' asd@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:13:27', '2022-04-08 20:09:10'),
(14, '95', 8, 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', ' asd@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:13:53', '2022-04-08 20:09:10'),
(15, '95', 8, 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', ' asd@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:13:53', '2022-04-08 20:09:10'),
(16, '95', 8, 'Larry', 'Bird', '2022-04-15', '09:00', '12312312312', ' asd@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:13:53', '2022-04-08 20:09:10'),
(17, '', 0, '', '', '', '', '', ' ', '', '', '', '', '2022-04-08 12:13:59', ''),
(18, '96', 10, 'sss', 'sss', '2022-04-10', '09:00', '09125253535', ' hapatinga@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-08 12:58:24', '2022-04-08 20:57:01'),
(19, '96', 10, 'Maria', 'hapatinga', '2022-04-29', '09:00', '09123232323', ' hapatingajohnlerry@gmail.com', 'Covid', '', 'Covid', 'bed', '2022-04-12 12:24:55', '2022-04-12 19:56:23');

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

INSERT INTO `upcomingreservations` (`ID`, `reservation_code`, `user_id`, `listing_id`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `concern`, `specifyconcern`, `hospitalname`, `reservationtype`, `timestamp`, `booking_timestamp`) VALUES
(12, 'SCPHRES792231', 95, 8, 'John ', 'Doe', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 04:48:16', '2022-04-12 12:46:55'),
(13, 'SCPHRES487729', 95, 8, 'Johhny ', 'Bravo', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 04:48:20', '2022-04-12 12:47:50'),
(14, 'SCPHRES255371', 95, 8, 'Larry', 'Goods', '2022-04-15', '09:00', '09887868878', 'nior3210@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'room', '2022-04-12 08:30:25', '2022-04-12 12:55:57'),
(15, 'SCPHRES811203', 95, 8, 'asdasdas', 'qweqweqw', '2022-04-22', '09:00', '09887868878', 'nior3210@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 09:36:17', '2022-04-12 13:17:44'),
(16, 'SCPHRES744197', 95, 8, 'Jonathan', 'Studebaker', '2022-04-15', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Non-Covid', 'Cough', 'Amang Rodriguez Memorial Medical Center', 'room', '2022-04-12 11:31:29', '2022-04-12 16:14:52'),
(17, 'SCPHRES960494', 95, 8, 'Jonathan', 'Studebaker', '2022-04-15', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Non-Covid', 'Cough', 'Amang Rodriguez Memorial Medical Center', 'room', '2022-04-12 11:49:07', '2022-04-12 16:14:52'),
(18, 'SCPHRES786633', 96, 10, 'Maria', 'hapatinga', '2022-04-11', '09:00', '09123232323', 'hapatingajohnlerry@gmail.com', 'Covid', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-12 13:18:22', '2022-04-12 19:56:23'),
(19, 'SCPHRES946588', 96, 10, 'Maria', 'hapatinga', '2022-04-29', '09:00', '09123232323', 'hapatingajohnlerry@gmail.com', 'Covid', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-12 12:01:11', '2022-04-12 19:56:23'),
(20, 'SCPHRES953933', 96, 10, 'Maria', 'hapatinga', '2022-04-29', '09:00', '09123232323', 'hapatingajohnlerry@gmail.com', 'Covid', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-12 12:02:11', '2022-04-12 19:56:23'),
(21, 'SCPHRES854976', 95, 8, 'asdasdas', 'asdasdasd', '2022-04-20', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 13:51:02', '2022-04-12 13:24:17'),
(22, 'SCPHRES242554', 95, 8, 'asdasdas', 'qweqweqw', '2022-04-20', '09:00', '09887868878', 'nior3210@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'bed', '2022-04-12 13:53:59', '2022-04-12 13:44:38'),
(23, 'SCPHRES415263', 95, 8, 'Roniel', 'Bravo', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Covid', '', 'Amang Rodriguez Memorial Medical Center', 'room', '2022-04-12 13:55:39', '2022-04-12 21:55:16'),
(24, 'SCPHRES703136', 95, 8, 'asdwqewe', 'qwdewqdewq', '2022-04-13', '09:00', '09887868878', 'larry.mabuti.jr@gmail.com', 'Non-Covid', 'Sample Concern', 'Amang Rodriguez Memorial Medical Center', 'room', '2022-04-12 13:58:06', '2022-04-12 21:57:38');

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
(191, 96, 10, 'John Lerry ', 'Nuttela', '2022-04-13', '09:00', '09125253535', 'hapatingajohnlerry@gmail.com', 'Covid', '', 'Cebu Doctors University Hospital', 'bed', '2022-04-12 12:26:05'),
(192, 96, 10, 'John Lerry ', 'Duke', '2022-04-28', '09:00', '09125253535', 'hapatingajohnlerry@gmail.com', 'Covid', '', 'Cebu Doctors University Hospital', 'room', '2022-04-12 12:43:09');

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
(95, '', 'Larry ', 'Mabuti JR', 'jlerry005@gmail.com', '$2y$10$nTvq/YD2dJLw0OVQdw.hFucsIt.1YCy31q14nGRxOkdVHBYpo21e2', '09663700835'),
(96, '', 'john lerry', 'hapatinga', 'hapatingajohnlerry@gmail.com', '$2y$10$9rqyXpNdU1abN8Z/igwb9OC7KnO0TCFe60Hr6zKpjdBRPtxaUSIda', '09455526133');

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
(69, '', 'john lerry', 'hapatinga', 'hapatingajohnlerry@gmail.com', '$2y$10$xQzJjY2TGNqkJHNV.MdTWOXnnWQ7pZuV8BeQj2kdByVJjvZmUuV8W', '09455526133');

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
-- Indexes for table `completedreservations`
--
ALTER TABLE `completedreservations`
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
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `approved_hospital`
--
ALTER TABLE `approved_hospital`
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `completedreservations`
--
ALTER TABLE `completedreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `hospitalaccount`
--
ALTER TABLE `hospitalaccount`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hospitaldocuments`
--
ALTER TABLE `hospitaldocuments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `hospitalinformation`
--
ALTER TABLE `hospitalinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `hospitallisting`
--
ALTER TABLE `hospitallisting`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hospitalsignuphistory`
--
ALTER TABLE `hospitalsignuphistory`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `listingimages`
--
ALTER TABLE `listingimages`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622;

--
-- AUTO_INCREMENT for table `otpstorage`
--
ALTER TABLE `otpstorage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pendingadminsignup`
--
ALTER TABLE `pendingadminsignup`
  MODIFY `pendingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `referralfiles`
--
ALTER TABLE `referralfiles`
  MODIFY `referral_id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `rejectedhospital`
--
ALTER TABLE `rejectedhospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `rejectedreservations`
--
ALTER TABLE `rejectedreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upcomingreservations`
--
ALTER TABLE `upcomingreservations`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `userpatient`
--
ALTER TABLE `userpatient`
  MODIFY `patientUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `userpatienttemp`
--
ALTER TABLE `userpatienttemp`
  MODIFY `tempUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
