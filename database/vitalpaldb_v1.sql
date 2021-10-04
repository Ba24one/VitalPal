-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 03:54 PM
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
  `a_password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_ID` int(4) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `PlaceofPractice` varchar(20) NOT NULL,
  `Specialization` varchar(10) NOT NULL,
  `MBBSno` varchar(10) NOT NULL,
  `d_Username` varchar(10) NOT NULL,
  `d_Password` varchar(20) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Hospital_ID` int(4) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_diary`
--

CREATE TABLE `hospital_diary` (
  `HDiaryID` int(4) NOT NULL,
  `WardNo` varchar(10) NOT NULL,
  `BedNo` int(3) NOT NULL,
  `PatentName` varchar(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Age` int(2) NOT NULL,
  `p_Condition` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Patient_ID` int(4) DEFAULT NULL,
  `PRID` int(4) DEFAULT NULL,
  `Doctor_ID` int(4) DEFAULT NULL,
  `Treatment_ID` int(4) DEFAULT NULL,
  `Hospital_ID` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mealplan`
--

CREATE TABLE `mealplan` (
  `Meal_ID` int(4) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Discription` varchar(50) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `News_ID` int(4) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Discription` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Picture` longblob NOT NULL,
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
  `gurdianName` varchar(20) DEFAULT NULL,
  `GurdianNo` int(10) DEFAULT NULL,
  `GurdianMail` varchar(30) DEFAULT NULL,
  `p_Username` varchar(10) NOT NULL,
  `p_Password` varchar(20) NOT NULL,
  `vac_type` varchar(20) DEFAULT NULL,
  `vac_dose` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_diary`
--

CREATE TABLE `patient_diary` (
  `PDiary_ID` int(4) NOT NULL,
  `p_condition` varchar(10) DEFAULT NULL,
  `Status` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Food` varchar(20) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_report`
--

CREATE TABLE `patient_report` (
  `PRID` int(4) NOT NULL,
  `ReportType` varchar(10) NOT NULL,
  `Discription` varchar(50) NOT NULL,
  `patient_id` int(4) DEFAULT NULL,
  `treatment_id` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `Treatment_ID` int(4) NOT NULL,
  `Dosage` varchar(20) NOT NULL,
  `Discription` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `Vaccine_ID` int(4) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Discription` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
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
  ADD PRIMARY KEY (`Doctor_ID`),
  ADD UNIQUE KEY `MBBSno` (`MBBSno`),
  ADD UNIQUE KEY `d_Username` (`d_Username`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Hospital_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `hospital_diary`
--
ALTER TABLE `hospital_diary`
  ADD PRIMARY KEY (`HDiaryID`),
  ADD KEY `Patient_ID` (`Patient_ID`),
  ADD KEY `PRID` (`PRID`),
  ADD KEY `Doctor_ID` (`Doctor_ID`),
  ADD KEY `Treatment_ID` (`Treatment_ID`),
  ADD KEY `Hospital_ID` (`Hospital_ID`);

--
-- Indexes for table `mealplan`
--
ALTER TABLE `mealplan`
  ADD PRIMARY KEY (`Meal_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `p_Username` (`p_Username`);

--
-- Indexes for table `patient_diary`
--
ALTER TABLE `patient_diary`
  ADD PRIMARY KEY (`PDiary_ID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `patient_report`
--
ALTER TABLE `patient_report`
  ADD PRIMARY KEY (`PRID`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `treatment_id` (`treatment_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`Treatment_ID`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`Vaccine_ID`),
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
