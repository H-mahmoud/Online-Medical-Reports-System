-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 09:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DoctorID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Specialization` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DoctorID`, `Name`, `Email`, `Password`, `Specialization`) VALUES
(1, 'Hassan', 'hassan@doc.com', '123456', 'noun'),
(3, 'hossam', 'hossam@doc.com', '123456', 'nady');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportID` int(11) NOT NULL,
  `ReportName` varchar(50) NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `BloodPresure` varchar(50) DEFAULT NULL,
  `Pulse` varchar(50) DEFAULT NULL,
  `Temperature` varchar(50) DEFAULT NULL,
  `Conclusion` varchar(500) DEFAULT NULL,
  `MedicalFacility` varchar(50) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportID`, `ReportName`, `PatientName`, `DOB`, `Age`, `Nationality`, `Gender`, `BloodPresure`, `Pulse`, `Temperature`, `Conclusion`, `MedicalFacility`, `Date`, `DoctorID`) VALUES
(2, 'voice', 'voice', 'voice', 9, 'Egypt', 'male', '100', '100', '100', 'finish', 'water', '2020-06-30 18:00:00', 1),
(3, 'writing', 'writing', 'writing', 11, 'writing', 'female', '120- 4', '0', '0', '\r\nss', 'writing', '2020-06-30 19:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reportpermission`
--

CREATE TABLE `reportpermission` (
  `ReportPermissionID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `ReportID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reportpermission`
--

INSERT INTO `reportpermission` (`ReportPermissionID`, `DoctorID`, `ReportID`) VALUES
(6, 3, 2),
(11, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DoctorID`),
  ADD UNIQUE KEY `UQ_Doctor` (`Email`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `FK_Report_Doctor` (`DoctorID`);

--
-- Indexes for table `reportpermission`
--
ALTER TABLE `reportpermission`
  ADD PRIMARY KEY (`ReportPermissionID`),
  ADD KEY `FK_ReportPermission_Doctor` (`DoctorID`),
  ADD KEY `FK_ReportPermission_Report` (`ReportID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reportpermission`
--
ALTER TABLE `reportpermission`
  MODIFY `ReportPermissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FK_Report_Doctor` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`);

--
-- Constraints for table `reportpermission`
--
ALTER TABLE `reportpermission`
  ADD CONSTRAINT `FK_ReportPermission_Doctor` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`),
  ADD CONSTRAINT `FK_ReportPermission_Report` FOREIGN KEY (`ReportID`) REFERENCES `report` (`ReportID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
