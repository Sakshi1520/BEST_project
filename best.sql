-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 03:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `best`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE `committee_members` (
  `com_id` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cmo_auth` int(11) NOT NULL DEFAULT 0,
  `role` varchar(20) NOT NULL DEFAULT 'committee'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_members`
--

INSERT INTO `committee_members` (`com_id`, `name`, `phone`, `password`, `email`, `cmo_auth`, `role`) VALUES
('98qwe', 'shailey', 9800998877, '12345', 'sh2123@2', 1, 'committee'),
('ch232', 'Anand Sadanand', 9324245066, '123', 'anandsadanand.sadanand@gmail.com', 1, 'committee'),
('ch2321', 'ramani', 9324245066, '545', 'anandsadanand.sadanand@gmail.com', 0, 'committee'),
('check12345', 'New staff', 9324245066, '123', 'staff@123', 0, 'committee'),
('CMO', 'Mr. CMO', 9809767890, '123', 'cmo@123', 1, 'CMO'),
('oxy', 'oxygen guy', 9159098909, '123', 'oxy@123', 1, 'oxygen'),
('sk12', 'Kadam', 9900987890, '1234', 'sk@12', 0, 'committee'),
('user1', 'user one', 1987656799, '1234', 'aishwaryaramani.anand@gmail.com', 1, 'committee');

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `regis_no` int(11) NOT NULL,
  `com_id` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `cheque_no` varchar(25) DEFAULT NULL,
  `mobile_no` bigint(12) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `depot` varchar(100) DEFAULT NULL,
  `addictions` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `comorbidity` varchar(100) DEFAULT NULL,
  `last_working` varchar(20) DEFAULT NULL,
  `travel_history` varchar(50) DEFAULT NULL,
  `exposure` varchar(100) DEFAULT NULL,
  `symptoms` varchar(100) DEFAULT NULL,
  `testing_date` varchar(20) DEFAULT NULL,
  `hospital` varchar(50) DEFAULT NULL,
  `admission_date` varchar(20) DEFAULT NULL,
  `oxygen` varchar(10) DEFAULT NULL,
  `discharge` varchar(10) DEFAULT NULL,
  `dis_date` varchar(10) DEFAULT NULL,
  `dis_no` varchar(20) DEFAULT NULL,
  `family` varchar(100) DEFAULT NULL,
  `followup` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`regis_no`, `com_id`, `name`, `age`, `sex`, `cheque_no`, `mobile_no`, `designation`, `department`, `depot`, `addictions`, `address`, `comorbidity`, `last_working`, `travel_history`, `exposure`, `symptoms`, `testing_date`, `hospital`, `admission_date`, `oxygen`, `discharge`, `dis_date`, `dis_no`, `family`, `followup`) VALUES
(1, 'user1', 'Aishwarya Anand', 22, 'Male', 'co23', 9800987890, 'collector', 'electric', 'Nerul', 'none', 'akshar', 'como', '2020-07-01', 'usa', 'none', 'headache', '2020-07-08', 'DY Patil', '2020-07-09', 'Yes', 'None', '2020-07-16', 'dis55', 'No', 'hypertension'),
(2, 'sak', 'Sakshi kadam', 22, 'Male', 'co68', 9988009988, 'officer', 'electrical', 'parel', 'addiction', 'palm heights', 'como', '0202kjnskvdj', 'lonavala', 'khjbkj,bjh', 'vomiting', '2020-07-03', 'BMCC hospital', '2020-06-10', 'No', 'Expire', '2020-07-29', 'dis03', 'Family', 'hypertension'),
(3, 'user1', 'prathamesh', 22, 'Male', 'co45', 9988009988, 'head', 'best', 'vashi', 'no', 'dhara complex', 'mortal', '2020-07-03', 'khandala', 'nothing', 'fever', '2020-07-22', 'Fortis vashi', '2020-07-18', 'No', 'Discharge', '2020-07-01', 'dis01', 'Corona', 'hypertension'),
(5, 'user1', 'Anand', 19, 'Female', 'co12', 9324245066, 'conductor', 'transport', 'Nerul', 'Smoking', 'E/18,Room no-5,om sagar darshan CHS,sec-48', 'Mortality', '2020-07-02', 'Travel History', 'Exposure', 'vomiting', '2020-07-01', 'Balasaheb Trauma Hospital (Jogeshwari)', '2020-07-03', 'No', 'Discharge', '2020-07-09', 'dis123', 'nothing as such yet', 'hypertension'),
(6, 'user1', 'Aayush', 17, 'Female', 'co75', 9324245066, 'collector', 'best', 'Nerul', 'Smoking', 'E/18,Room no-5,om sagar darshan CHS,sec-48', 'Mortality', '2020-07-02', 'Travel History', 'Exposure', 'fever', '2020-07-01', 'Balasaheb Trauma Hospital (Jogeshwari)', '2020-07-03', 'No', 'None', '2020-07-09', 'dis12', 'Family Details', 'hypertension'),
(7, 'user1', 'Smita', 18, 'Female', 'co25', 9324245066, 'conductor', 'transport', 'Nerul', 'none', 'E/18,Room no-5,om sagar darshan CHS,sec-48', 'Mortality', '2020-07-02', 'Travel History', 'none', 'headache', '2020-07-01', 'Balasaheb Trauma Hospital (Jogeshwari)', '2020-07-03', 'No', 'Expire', '2020-07-09', 'dis111', 'Family Details', 'hypertension'),
(8, 'user1', 'Ameya', 12, 'Female', 'co98', 9324245066, 'officier', 'electrical', 'Nerul', 'Smoking', 'E/18,Room no-5,om sagar darshan CHS,sec-48', 'Mortality', '2020-07-01', 'Travel History', 'Exposure', 'weakness', '2020-07-04', 'BTM Covid Center', '2020-07-08', 'No', 'Expire', '2020-07-13', 'dis99', 'Family Details', 'hypertension'),
(10, 'user1', 'Aishu', 19, 'Male', 'co24', 1234567890, 'Student', 'electric', 'nerul', 'nothing', 'E/18,Room no-5,om sagar darshan CHS,sec-48', 'Mortal', '2020-05-10', 'No travels', 'no exposure', 'headache and vomiting', '2020-06-16', 'BMCC', '2020-07-02', 'Yes', 'None', '2020-07-03', 'dis09', 'No corona', 'hypertension'),
(20, 'user1', 'aayush', 12, 'Male', '123', 9324245066, '', 'comps', 'Nerul', 'Smoking', 'E/18,Room no-5,om sagar darshan CHS,sec-48', 'Mortality', '2020-07-24', 'Travel History', 'Exposure', 'headache and vomiting', '2020-08-02', 'DY Patil Belapur', '2020-06-30', 'No', 'None', '2020-08-09', 'dis123', 'covid 19 positive', 'hypertension patient'),
(22, 'user1', 'demo patient', 12, 'Female', 'co99', 9324245066, 'desi', 'Medical', 'Nerul', 'Smoking', 'E/18,Room no-5,om sagar darshan CHS,sec-48', 'Mortal', '2020-07-15', 'Travel History', 'no exposure', 'headache and vomiting', '2020-07-09', 'DY Patil Belapur CBD', '2020-07-22', 'No', 'None', '', '', 'covid 19', 'hypertension patient');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `regis_no` varchar(20) NOT NULL,
  `com_id` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `daily` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`regis_no`, `com_id`, `date`, `daily`) VALUES
('1', 'user1', '2020-07-01', 'He is feeling better'),
('3', 'user1', '2020-07-02', 'He is feeling worse'),
('5', 'user1', '2020-07-04', 'Not normal'),
('1', 'user1', '2020-07-05', 'Temperature increase'),
('1', 'user1', '2020-07-06', 'Nausea'),
('1', 'user1', '2020-07-08', 'Weakness'),
('1', 'oxy', '2020-07-17', 'no requirement of oxygen'),
('11', 'user1', '2020-07-14', 'Feeling bad'),
('12', 'user1', '2020-07-16', 'he is not  feeling well'),
('1', 'user1', '2020-07-22', 'feeling good'),
('1', 'oxy', '2020-07-10', 'well'),
('1', 'oxy', '2020-07-22', 'feeling badd'),
('13', 'user1', '2020-07-16', 'not feeling well'),
('13', 'oxy', '2020-07-22', 'he is feeling better'),
('21', 'user1', '2020-07-11', 'death'),
('22', 'user1', '2020-07-22', 'feeling better'),
('1', 'oxy', '2020-07-23', 'good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`regis_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `regis_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
