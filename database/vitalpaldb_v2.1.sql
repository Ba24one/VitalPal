-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2021 at 08:14 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nic` varchar(12) NOT NULL,
  `a_username` varchar(20) NOT NULL,
  `a_password` varchar(200) NOT NULL,
  `a_status` varchar(1) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `a_username` (`a_username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_ID` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `place_of_practice` varchar(20) NOT NULL,
  `specialization` varchar(10) NOT NULL,
  `mbbs_no` varchar(10) NOT NULL,
  `d_username` varchar(10) NOT NULL,
  `d_password` varchar(200) NOT NULL,
  `d_status` varchar(1) NOT NULL,
  PRIMARY KEY (`doctor_ID`),
  UNIQUE KEY `MBBSno` (`mbbs_no`),
  UNIQUE KEY `d_Username` (`d_username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `hospital_ID` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`hospital_ID`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_diary`
--

DROP TABLE IF EXISTS `hospital_diary`;
CREATE TABLE IF NOT EXISTS `hospital_diary` (
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
  `hospital_ID` int(4) DEFAULT NULL,
  PRIMARY KEY (`hosDiary_ID`),
  KEY `Patient_ID` (`patient_ID`),
  KEY `PRID` (`pr_ID`),
  KEY `Doctor_ID` (`doctor_ID`),
  KEY `Treatment_ID` (`treatment_ID`),
  KEY `Hospital_ID` (`hospital_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mealplan`
--

DROP TABLE IF EXISTS `mealplan`;
CREATE TABLE IF NOT EXISTS `mealplan` (
  `meal_ID` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`meal_ID`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_ID` int(4) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `author` varchar(20) NOT NULL,
  `picture` longblob NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`news_ID`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(4) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `p_dob` date NOT NULL,
  `nic` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `guardianName` varchar(20) DEFAULT NULL,
  `guardianNo` int(10) DEFAULT NULL,
  `guardianMail` varchar(30) DEFAULT NULL,
  `p_username` varchar(10) NOT NULL,
  `p_password` varchar(200) NOT NULL,
  `vac_type` varchar(20) DEFAULT NULL,
  `vac_dose` int(2) DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  UNIQUE KEY `p_Username` (`p_username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_diary`
--

DROP TABLE IF EXISTS `patient_diary`;
CREATE TABLE IF NOT EXISTS `patient_diary` (
  `patDiary_ID` int(4) NOT NULL,
  `p_condition` varchar(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `food` varchar(20) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`patDiary_ID`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_report`
--

DROP TABLE IF EXISTS `patient_report`;
CREATE TABLE IF NOT EXISTS `patient_report` (
  `pr_ID` int(4) NOT NULL,
  `reportType` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `patient_id` int(4) DEFAULT NULL,
  `treatment_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`pr_ID`),
  KEY `patient_id` (`patient_id`),
  KEY `treatment_id` (`treatment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `treatment_ID` int(4) NOT NULL,
  `dosage` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`treatment_ID`),
  KEY `patient_id` (`patient_id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

DROP TABLE IF EXISTS `vaccine`;
CREATE TABLE IF NOT EXISTS `vaccine` (
  `vaccine_ID` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vaccine_ID`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
