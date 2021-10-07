-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 03:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitalpaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nic` varchar(12) NOT NULL,
  `a_username` varchar(20) NOT NULL,
  `a_password` varchar(20) NOT NULL,
  `a_status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_ID` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `place_of_practice` varchar(20) NOT NULL,
  `specialization` varchar(10) NOT NULL,
  `mbbs_no` varchar(10) NOT NULL,
  `d_username` varchar(10) NOT NULL,
  `d_password` varchar(20) NOT NULL,
  `d_status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_ID` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_diary`
--

CREATE TABLE `hospital_diary` (
  `hosDiary_ID` int(4) NOT NULL,
  `wardNo` varchar(10) NOT NULL,
  `bedNo` int(3) NOT NULL,
  `patientName` varchar(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` int(2) NOT NULL,
  `p_Condition` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `patient_ID` int(4) DEFAULT NULL,
  `pr_ID` int(4) DEFAULT NULL,
  `doctor_ID` int(4) DEFAULT NULL,
  `treatment_ID` int(4) DEFAULT NULL,
  `hospital_ID` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mealplan`
--

CREATE TABLE `mealplan` (
  `meal_ID` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_ID` int(4) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `author` varchar(20) NOT NULL,
  `picture` longblob NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(4) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `p_dob` date NOT NULL,
  `nic` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `guardianName` varchar(20) DEFAULT NULL,
  `guardianNo` int(10) DEFAULT NULL,
  `guardianMail` varchar(30) DEFAULT NULL,
  `p_username` varchar(10) NOT NULL,
  `p_password` varchar(20) NOT NULL,
  `vac_type` varchar(20) DEFAULT NULL,
  `vac_dose` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_diary`
--

CREATE TABLE `patient_diary` (
  `patDiary_ID` int(4) NOT NULL,
  `p_condition` varchar(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `food` varchar(20) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_report`
--

CREATE TABLE `patient_report` (
  `pr_ID` int(4) NOT NULL,
  `reportType` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `patient_id` int(4) DEFAULT NULL,
  `treatment_id` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatment_ID` int(4) NOT NULL,
  `dosage` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `vaccine_ID` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `a_username` (`a_username`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_ID`),
  ADD UNIQUE KEY `MBBSno` (`mbbs_no`),
  ADD UNIQUE KEY `d_Username` (`d_username`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `hospital_diary`
--
ALTER TABLE `hospital_diary`
  ADD PRIMARY KEY (`hosDiary_ID`),
  ADD KEY `Patient_ID` (`patient_ID`),
  ADD KEY `PRID` (`pr_ID`),
  ADD KEY `Doctor_ID` (`doctor_ID`),
  ADD KEY `Treatment_ID` (`treatment_ID`),
  ADD KEY `Hospital_ID` (`hospital_ID`);

--
-- Indexes for table `mealplan`
--
ALTER TABLE `mealplan`
  ADD PRIMARY KEY (`meal_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `p_Username` (`p_username`);

--
-- Indexes for table `patient_diary`
--
ALTER TABLE `patient_diary`
  ADD PRIMARY KEY (`patDiary_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `patient_report`
--
ALTER TABLE `patient_report`
  ADD PRIMARY KEY (`pr_ID`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `treatment_id` (`treatment_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatment_ID`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccine_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
