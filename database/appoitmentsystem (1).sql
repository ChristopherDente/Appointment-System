-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2026 at 10:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appoitmentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `attempt_count` int(11) NOT NULL DEFAULT 0,
  `last_attempt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientcasehistory`
--

CREATE TABLE `patientcasehistory` (
  `PK_patientcasehistory` int(11) NOT NULL,
  `caseNo` int(11) NOT NULL,
  `caseDate` date NOT NULL,
  `caseDischarge` date DEFAULT NULL,
  `FK_tblhospitalPlan` int(11) DEFAULT NULL COMMENT 'Selfpay or Type of Insurance',
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbclinicdays`
--

CREATE TABLE `tbclinicdays` (
  `PK_tblClinicDays` int(11) NOT NULL,
  `dayname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbclinicdays`
--

INSERT INTO `tbclinicdays` (`PK_tblClinicDays`, `dayname`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointments`
--

CREATE TABLE `tblappointments` (
  `PK_tblappointments` int(11) NOT NULL,
  `FK_tbldoctors` int(11) NOT NULL,
  `FK_doctorschedule` int(11) NOT NULL,
  `FK_tblservices` int(11) NOT NULL,
  `FK_tblpatient` int(11) NOT NULL,
  `FK_department` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` enum('Pending','Approved','Cancelled','Completed','No-Show') NOT NULL DEFAULT 'Pending',
  `reasonForVisit` varchar(2555) DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`PK_tblappointments`, `FK_tbldoctors`, `FK_doctorschedule`, `FK_tblservices`, `FK_tblpatient`, `FK_department`, `appointment_date`, `appointment_time`, `status`, `reasonForVisit`, `remarks`, `is_active`, `created_by`, `created_at`) VALUES
(26, 9, 44, 41, 1, 1, '2026-01-21', '08:00:00', 'Completed', 'Eye / Ophthalmology Consultation', 'N/A', 1, 'JIANEBIDAG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblaudittrial`
--

CREATE TABLE `tblaudittrial` (
  `PK_tblaudittrial` int(11) NOT NULL,
  `transactionDate` date NOT NULL,
  `transactionType` varchar(255) NOT NULL,
  `fields` varchar(255) DEFAULT NULL,
  `oldvalue` longtext DEFAULT NULL,
  `newvalue` longtext DEFAULT NULL,
  `FK_tbluser` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `remarks` longtext NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactmessages`
--

CREATE TABLE `tblcontactmessages` (
  `PK_tblcontactmessages` int(11) NOT NULL,
  `FK_tblpatient` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` enum('Pending','Read','Responded') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `PK_tblDepartment` int(11) NOT NULL,
  `deptCode` varchar(255) NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  `floorUnit` int(11) NOT NULL,
  `prim_localNumber` int(11) NOT NULL,
  `secon_localNumber` int(11) DEFAULT NULL,
  `third_localNumber` int(11) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `mobileNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`PK_tblDepartment`, `deptCode`, `departmentName`, `floorUnit`, `prim_localNumber`, `secon_localNumber`, `third_localNumber`, `update_by`, `updated_at`, `is_active`, `created_at`, `mobileNumber`) VALUES
(1, 'EYC', 'Eye Center', 2, 209, NULL, NULL, NULL, NULL, 1, '2026-01-16 05:10:52', '09127339200');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctors`
--

CREATE TABLE `tbldoctors` (
  `PK_tbldoctors` int(11) NOT NULL,
  `FK_tbluser` int(11) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldoctors`
--

INSERT INTO `tbldoctors` (`PK_tbldoctors`, `FK_tbluser`, `specialization`, `updated_by`, `updated_at`, `is_active`, `created_at`) VALUES
(9, 6, 'Opthalmology', NULL, NULL, 1, '2026-01-18 07:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctorschedule`
--

CREATE TABLE `tbldoctorschedule` (
  `PK_tbldoctorschedule` int(11) NOT NULL,
  `FK_tbldoctors` int(11) NOT NULL,
  `dateSched` date DEFAULT NULL,
  `FK_clinicdays` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `max_patients` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldoctorschedule`
--

INSERT INTO `tbldoctorschedule` (`PK_tbldoctorschedule`, `FK_tbldoctors`, `dateSched`, `FK_clinicdays`, `time_start`, `time_end`, `max_patients`, `is_available`, `updated_by`, `updated_at`, `is_active`, `created_at`) VALUES
(44, 9, '2026-01-18', 1, '08:00:00', '17:00:00', 100, 1, '', NULL, 1, '2026-01-18 07:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblhospitalplan`
--

CREATE TABLE `tblhospitalplan` (
  `PK_tblhospitalPlan` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `PK_tblpatient` int(11) NOT NULL,
  `FK_tbluser` int(11) NOT NULL,
  `pbirthday` date NOT NULL,
  `pAge` int(11) NOT NULL,
  `medicalInfo` longtext NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`PK_tblpatient`, `FK_tbluser`, `pbirthday`, `pAge`, `medicalInfo`, `is_active`, `created_at`) VALUES
(1, 4, '2002-01-21', 23, 'N/A', 1, '2026-01-18 06:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `PK_tblpayments` int(11) NOT NULL,
  `FK_tblpatient` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending',
  `payment_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`PK_tblpayments`, `FK_tblpatient`, `invoice_number`, `amount`, `payment_method`, `status`, `payment_date`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(7, 1, 'INV-2026-001', 50.00, 'Cash On Arrival', 'Pending', NULL, 1, NULL, '2026-01-18 08:32:04', NULL, '2026-01-18 09:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `PK_tblRole` int(11) NOT NULL,
  `rcode` varchar(255) NOT NULL,
  `rname` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`PK_tblRole`, `rcode`, `rname`, `is_active`, `created_at`) VALUES
(1, 'U', 'User', 1, '2026-01-16 05:09:53'),
(2, 'AD', 'Administrator', 1, '2026-01-16 05:09:53'),
(3, 'SAD', 'Super Administrator', 1, '2026-01-16 05:09:53'),
(4, 'DR', 'Doctor', 1, '2026-01-16 07:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `PK_tblservices` int(11) NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `servicefee` int(11) NOT NULL,
  `FK_tbldepartment` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`PK_tblservices`, `servicename`, `servicefee`, `FK_tbldepartment`, `is_active`, `created_at`) VALUES
(41, 'Eye Center service', 500, 1, 1, '2026-01-18 07:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `PK_tbluser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `csuffix` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cpnumber` varchar(255) DEFAULT NULL,
  `FK_tblRole` int(11) NOT NULL,
  `FK_tblDepartment` int(11) DEFAULT NULL,
  `is_Doctor` int(11) DEFAULT NULL,
  `is_Customer` int(11) DEFAULT NULL,
  `is_Staff` int(11) DEFAULT NULL,
  `is_login` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`PK_tbluser`, `username`, `password`, `fname`, `mname`, `lname`, `csuffix`, `email`, `address`, `cpnumber`, `FK_tblRole`, `FK_tblDepartment`, `is_Doctor`, `is_Customer`, `is_Staff`, `is_login`, `is_active`, `updated_at`, `created_at`, `update_by`) VALUES
(4, 'ejian', '$2y$10$dzR3MhxYSJ3mTnRCrn64Q.Rkqi2.dz0VdOdO34fN9LBaquabGZom.', 'Jian Laurence', 'Salvedea', 'Ebidag', NULL, 'jianlaurenceebidag@gmail.com', '#21 Luna St. New Banicain, Olongapo City', '09127339200', 1, NULL, NULL, 0, NULL, 1, 1, NULL, '2026-01-16 05:11:52', NULL),
(5, 'test1', '$2y$10$PRn2BgmXMr8/YFM7OGnEKuVZjjfvNjosHVYxO03hUZrc1mE2dfK4.', 'John', 'Middle', 'Doe', 'Jr.', 'test1@example.com', '123 Default Street', '09171234567', 2, 1, 0, 1, 0, 0, 1, '2026-01-16 07:57:37', '2026-01-16 15:57:37', 'System'),
(6, 'FDECASTRO', 'ASDASD', 'Felicisimo', 'Doloroso', 'De Castro', NULL, 'decastro@test.com', NULL, NULL, 4, 1, 1, NULL, NULL, 0, 1, NULL, '2026-01-18 07:03:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifier` (`identifier`),
  ADD KEY `last_attempt` (`last_attempt`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientcasehistory`
--
ALTER TABLE `patientcasehistory`
  ADD PRIMARY KEY (`PK_patientcasehistory`),
  ADD KEY `FK_tblhospitalPlan` (`FK_tblhospitalPlan`);

--
-- Indexes for table `tbclinicdays`
--
ALTER TABLE `tbclinicdays`
  ADD PRIMARY KEY (`PK_tblClinicDays`);

--
-- Indexes for table `tblappointments`
--
ALTER TABLE `tblappointments`
  ADD PRIMARY KEY (`PK_tblappointments`),
  ADD KEY `FK_department` (`FK_department`),
  ADD KEY `FK_doctorschedule` (`FK_doctorschedule`),
  ADD KEY `FK_tbldoctors` (`FK_tbldoctors`),
  ADD KEY `FK_tblservices` (`FK_tblservices`),
  ADD KEY `FK_tblpatient` (`FK_tblpatient`);

--
-- Indexes for table `tblaudittrial`
--
ALTER TABLE `tblaudittrial`
  ADD PRIMARY KEY (`PK_tblaudittrial`),
  ADD KEY `FK_tbluser` (`FK_tbluser`);

--
-- Indexes for table `tblcontactmessages`
--
ALTER TABLE `tblcontactmessages`
  ADD PRIMARY KEY (`PK_tblcontactmessages`),
  ADD KEY `FK_tblpatient` (`FK_tblpatient`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`PK_tblDepartment`);

--
-- Indexes for table `tbldoctors`
--
ALTER TABLE `tbldoctors`
  ADD PRIMARY KEY (`PK_tbldoctors`),
  ADD KEY `FK_tbluser` (`FK_tbluser`);

--
-- Indexes for table `tbldoctorschedule`
--
ALTER TABLE `tbldoctorschedule`
  ADD PRIMARY KEY (`PK_tbldoctorschedule`),
  ADD KEY `FK_clinicdays` (`FK_clinicdays`),
  ADD KEY `FK_tbldoctors` (`FK_tbldoctors`);

--
-- Indexes for table `tblhospitalplan`
--
ALTER TABLE `tblhospitalplan`
  ADD PRIMARY KEY (`PK_tblhospitalPlan`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`PK_tblpatient`),
  ADD KEY `FK_tbluser` (`FK_tbluser`);

--
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`PK_tblpayments`),
  ADD KEY `FK_tblpatient` (`FK_tblpatient`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`PK_tblRole`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`PK_tblservices`),
  ADD KEY `FK_tbldepartment` (`FK_tbldepartment`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`PK_tbluser`),
  ADD KEY `FK_tblDepartment` (`FK_tblDepartment`),
  ADD KEY `FK_tblRole` (`FK_tblRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientcasehistory`
--
ALTER TABLE `patientcasehistory`
  MODIFY `PK_patientcasehistory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbclinicdays`
--
ALTER TABLE `tbclinicdays`
  MODIFY `PK_tblClinicDays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblappointments`
--
ALTER TABLE `tblappointments`
  MODIFY `PK_tblappointments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblaudittrial`
--
ALTER TABLE `tblaudittrial`
  MODIFY `PK_tblaudittrial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcontactmessages`
--
ALTER TABLE `tblcontactmessages`
  MODIFY `PK_tblcontactmessages` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `PK_tblDepartment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldoctors`
--
ALTER TABLE `tbldoctors`
  MODIFY `PK_tbldoctors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbldoctorschedule`
--
ALTER TABLE `tbldoctorschedule`
  MODIFY `PK_tbldoctorschedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblhospitalplan`
--
ALTER TABLE `tblhospitalplan`
  MODIFY `PK_tblhospitalPlan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `PK_tblpatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `PK_tblpayments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblrole`
--
ALTER TABLE `tblrole`
  MODIFY `PK_tblRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `PK_tblservices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `PK_tbluser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patientcasehistory`
--
ALTER TABLE `patientcasehistory`
  ADD CONSTRAINT `patientcasehistory_ibfk_1` FOREIGN KEY (`FK_tblhospitalPlan`) REFERENCES `tblhospitalplan` (`PK_tblhospitalPlan`);

--
-- Constraints for table `tblappointments`
--
ALTER TABLE `tblappointments`
  ADD CONSTRAINT `tblappointments_ibfk_1` FOREIGN KEY (`FK_department`) REFERENCES `tbldepartment` (`PK_tblDepartment`),
  ADD CONSTRAINT `tblappointments_ibfk_2` FOREIGN KEY (`FK_doctorschedule`) REFERENCES `tbldoctorschedule` (`PK_tbldoctorschedule`),
  ADD CONSTRAINT `tblappointments_ibfk_3` FOREIGN KEY (`FK_tbldoctors`) REFERENCES `tbldoctors` (`PK_tbldoctors`),
  ADD CONSTRAINT `tblappointments_ibfk_4` FOREIGN KEY (`FK_tblservices`) REFERENCES `tblservices` (`PK_tblservices`),
  ADD CONSTRAINT `tblappointments_ibfk_5` FOREIGN KEY (`FK_tblpatient`) REFERENCES `tblpatient` (`PK_tblpatient`);

--
-- Constraints for table `tblaudittrial`
--
ALTER TABLE `tblaudittrial`
  ADD CONSTRAINT `tblaudittrial_ibfk_1` FOREIGN KEY (`FK_tbluser`) REFERENCES `tbluser` (`PK_tbluser`);

--
-- Constraints for table `tblcontactmessages`
--
ALTER TABLE `tblcontactmessages`
  ADD CONSTRAINT `tblcontactmessages_ibfk_1` FOREIGN KEY (`FK_tblpatient`) REFERENCES `tblpatient` (`PK_tblpatient`) ON DELETE SET NULL;

--
-- Constraints for table `tbldoctors`
--
ALTER TABLE `tbldoctors`
  ADD CONSTRAINT `tbldoctors_ibfk_1` FOREIGN KEY (`FK_tbluser`) REFERENCES `tbluser` (`PK_tbluser`);

--
-- Constraints for table `tbldoctorschedule`
--
ALTER TABLE `tbldoctorschedule`
  ADD CONSTRAINT `tbldoctorschedule_ibfk_1` FOREIGN KEY (`FK_clinicdays`) REFERENCES `tbclinicdays` (`PK_tblClinicDays`),
  ADD CONSTRAINT `tbldoctorschedule_ibfk_2` FOREIGN KEY (`FK_tbldoctors`) REFERENCES `tbldoctors` (`PK_tbldoctors`);

--
-- Constraints for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD CONSTRAINT `tblpatient_ibfk_1` FOREIGN KEY (`FK_tbluser`) REFERENCES `tbluser` (`PK_tbluser`);

--
-- Constraints for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD CONSTRAINT `tblpayments_ibfk_1` FOREIGN KEY (`FK_tblpatient`) REFERENCES `tblpatient` (`PK_tblpatient`);

--
-- Constraints for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD CONSTRAINT `tblservices_ibfk_1` FOREIGN KEY (`FK_tbldepartment`) REFERENCES `tbldepartment` (`PK_tblDepartment`);

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`FK_tblDepartment`) REFERENCES `tbldepartment` (`PK_tblDepartment`),
  ADD CONSTRAINT `tbluser_ibfk_2` FOREIGN KEY (`FK_tblRole`) REFERENCES `tblrole` (`PK_tblRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
