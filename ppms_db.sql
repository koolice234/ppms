-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 10:52 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hematology`
--

CREATE TABLE `hematology` (
  `hema_ID` int(5) NOT NULL,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `hema_date` date NOT NULL,
  `hema_hemoglobin` int(10) NOT NULL,
  `hema_hematocrit` int(10) NOT NULL,
  `hema_rbcCount` int(10) NOT NULL,
  `hema_wbcCount` int(10) NOT NULL,
  `hema_plateletCount` int(10) NOT NULL,
  `hema_neutropils` int(10) NOT NULL,
  `hema_eosinophils` int(10) NOT NULL,
  `hema_basophils` int(10) NOT NULL,
  `hema_totalDiffCount` int(10) NOT NULL,
  `hema_monocytes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pathology`
--

CREATE TABLE `pathology` (
  `pathology_ID` int(5) NOT NULL,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `pathology_date` date NOT NULL,
  `pathology_lca` varchar(11) NOT NULL,
  `pathology_plap` varchar(11) NOT NULL,
  `pathology_cytokeratin` varchar(11) NOT NULL,
  `pathology_nse` varchar(11) NOT NULL,
  `pathology_vimetin` varchar(11) NOT NULL,
  `pathology_chromogranin` varchar(11) NOT NULL,
  `pathology_hmb45` varchar(11) NOT NULL,
  `pathology_notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pathology`
--

INSERT INTO `pathology` (`pathology_ID`, `sched_ID`, `patient_ID`, `pathology_date`, `pathology_lca`, `pathology_plap`, `pathology_cytokeratin`, `pathology_nse`, `pathology_vimetin`, `pathology_chromogranin`, `pathology_hmb45`, `pathology_notes`) VALUES
(38, 33, 31, '2018-02-12', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_ID` int(5) NOT NULL,
  `patient_firstName` varchar(15) NOT NULL,
  `patient_lastName` varchar(15) NOT NULL,
  `patient_address` varchar(30) NOT NULL,
  `patient_contactNumber` varchar(15) NOT NULL,
  `patient_bloodType` varchar(5) NOT NULL,
  `patient_Age` int(5) NOT NULL,
  `patient_Name` varchar(30) NOT NULL,
  `patient_time` varchar(15) NOT NULL,
  `patient_LMP` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_ID`, `patient_firstName`, `patient_lastName`, `patient_address`, `patient_contactNumber`, `patient_bloodType`, `patient_Age`, `patient_Name`, `patient_time`, `patient_LMP`) VALUES
(9, 'Grace', 'Nessia', 'Prk. Kasilingan', '2147483647', 'O+', 40, 'Grace Nessia', '', '2017-10-15'),
(12, 'Miriam', 'Gayoba', 'hinigaran city', '2147483647', 'AB+', 30, 'Miriam Gayoba', '', '2018-01-04'),
(18, 'joseph', 'doromal', 'bacolod', '15551212', 'O+', 27, 'joseph doromal', '', '2018-02-04'),
(21, 'honey', 'villa', 'talisay', '991275352', 'B-', 20, 'honey villa', '', '2018-02-05'),
(22, 'Nina', 'Garcia', 'Hinigaran', '09123457890', 'A+', 22, 'Nina Garcia', '', '2017-12-04'),
(23, 'Nina Lynn', 'Sarrosa', 'Bacolod City', '09451597562', 'A+', 32, 'Nina Lynn Sarrosa', '', '2017-11-06'),
(24, 'Smergin', 'Sombilla', 'Handumanan', '09101234567', 'A+', 35, 'Smergin Sombilla', '', '2017-10-08'),
(25, 'anita', 'delapaz', 'silay', '0999382712', 'B+', 23, 'anita delapaz', '1:00 am', '2017-11-06'),
(26, 'vincenta', 'suyo', 'bago city', '0999387232', 'O-', 18, 'vincenta suyo', '1:00 am', '2017-11-20'),
(27, 'Myra Jill', 'Pabion', 'Brgy. Bato', '09167901591', 'A+', 0, 'Myra Jill Pabion', '1:00 am', '2018-01-01'),
(28, 'Myra Mae', 'Gayoba', 'Hinigaran', '09123457800', 'A+', 20, 'Myra Mae Gayoba', '1:00 am', '2018-01-09'),
(29, 'Maria Marie', 'Garcia', 'Bacolod', '0999223123', 'B+', 32, 'Maria Marie Garcia', '1:00 am', '2018-02-01'),
(30, 'Kathleen', 'Dinsay', 'Bacolod City', '09101234567', 'A+', 25, 'Kathleen Dinsay', '1:00 am', '2018-02-01'),
(31, 'Angelica', 'Jaranilla', 'Bacolod City', '09123456789', 'B+', 30, 'Angelica Jaranilla', '1:00 am', '2018-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `patientcheckup`
--

CREATE TABLE `patientcheckup` (
  `pc_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `sched_ID` int(5) NOT NULL,
  `pc_weight` int(5) NOT NULL,
  `pc_date` date NOT NULL,
  `pc_diagnosis` varchar(255) NOT NULL,
  `pc_bloodPressure` varchar(10) NOT NULL,
  `pc_problems` varchar(255) NOT NULL,
  `pc_month` varchar(10) NOT NULL,
  `pc_year` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientcheckup`
--

INSERT INTO `patientcheckup` (`pc_ID`, `patient_ID`, `sched_ID`, `pc_weight`, `pc_date`, `pc_diagnosis`, `pc_bloodPressure`, `pc_problems`, `pc_month`, `pc_year`) VALUES
(25, 9, 30, 50, '2018-02-12', 'Chronic Villus,Gestational Diabetes', '120/140', 'None', '', ''),
(26, 18, 32, 50, '2018-02-12', 'Chronic Villus,Gestational Diabetes', '120/90', 'None', '', ''),
(27, 31, 33, 45, '2018-02-12', 'Chronic Villus', '120/80', 'Chronic', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `presc_ID` int(5) NOT NULL,
  `pc_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `presc_medicines` varchar(30) NOT NULL,
  `presc_dosage` varchar(15) NOT NULL,
  `presc_frequency` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`presc_ID`, `pc_ID`, `patient_ID`, `presc_medicines`, `presc_dosage`, `presc_frequency`) VALUES
(6, 27, 31, 'Decolgen', '250', '2');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_ID` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `sched_Date` date NOT NULL,
  `sched_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_ID`, `patient_ID`, `sched_Date`, `sched_Time`) VALUES
(30, 9, '2018-02-12', '01:02:00'),
(31, 12, '2018-02-12', '01:05:00'),
(32, 18, '2018-02-12', '01:05:00'),
(33, 31, '2018-02-12', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` int(5) NOT NULL,
  `staff_fname` varchar(15) NOT NULL,
  `staff_lname` varchar(15) NOT NULL,
  `staff_contactNumber` int(12) NOT NULL,
  `staff_address` varchar(30) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `staff_bdate` date NOT NULL,
  `staff_position` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `staff_fname`, `staff_lname`, `staff_contactNumber`, `staff_address`, `staff_gender`, `staff_bdate`, `staff_position`) VALUES
(3, 'Brix  ', 'Nessia  ', 0, 'Prk. Kasilingan  ', '', '2018-02-01', 'Secretary'),
(4, 'Brix   ', 'Nessia   ', 0, 'Prk. Kasilingan   ', 'Female', '2018-02-01', 'Secretary'),
(5, 'Brix   ', 'Nessia   ', 0, 'Prk. Kasilingan   ', 'Female', '2018-02-01', 'Secretary'),
(6, 'Brix    ', 'Nessia    ', 0, 'Prk. Kasilingan    ', 'Female', '2018-02-01', 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `ultrasound`
--

CREATE TABLE `ultrasound` (
  `ultra_id` int(5) NOT NULL,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `ultra_date` date NOT NULL,
  `ultra_reason` varchar(255) NOT NULL,
  `ultra_biparietalDiameter` int(11) NOT NULL,
  `ultra_occiDiameter` int(11) NOT NULL,
  `ultra_abdominal` int(11) NOT NULL,
  `ultra_fetalHeart` int(11) NOT NULL,
  `ultra_distalFemoral` int(11) NOT NULL,
  `ultra_femoralLenght` int(11) NOT NULL,
  `ultra_headCircumference` int(11) NOT NULL,
  `ultra_headCircumferenceWeek` int(11) NOT NULL,
  `ultra_estimatedFetal` int(11) NOT NULL,
  `ultra_hadlock` int(11) NOT NULL,
  `ultra_warsof` int(11) NOT NULL,
  `ultra_amonioticFluid1` int(11) NOT NULL,
  `ultra_amonioticFluid2` int(11) NOT NULL,
  `ultra_amonioticFluid3` int(11) NOT NULL,
  `ultra_amonioticFluid4` int(11) NOT NULL,
  `ultra_cervical` int(11) NOT NULL,
  `ultra_cervicalDesc` varchar(255) NOT NULL,
  `ultra_fetalTone` int(11) NOT NULL,
  `ultra_fetalMovement` int(11) NOT NULL,
  `ultra_fetalBreathing` int(11) NOT NULL,
  `ultra_biophysicalProfile` int(11) NOT NULL,
  `ultra_other` varchar(255) NOT NULL,
  `ultra_remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `urinalysis`
--

CREATE TABLE `urinalysis` (
  `uri_ID` int(11) NOT NULL,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `uri_date` date NOT NULL,
  `uri_color` varchar(11) NOT NULL,
  `uri_transparency` varchar(11) NOT NULL,
  `uri_pH` int(11) NOT NULL,
  `uri_specificGravity` int(11) NOT NULL,
  `uri_sugar` int(11) NOT NULL,
  `uri_protein` int(11) NOT NULL,
  `uri_MICtransparency` varchar(11) NOT NULL,
  `uri_MICpH` int(11) NOT NULL,
  `uri_MICspecificGravity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(5) NOT NULL,
  `staff_ID` int(5) NOT NULL,
  `user_userName` varchar(15) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `staff_ID`, `user_userName`, `user_password`, `user_type`) VALUES
(4, 3, 'doctor', 'doctor', 'doctor'),
(5, 0, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `xray`
--

CREATE TABLE `xray` (
  `xray_ID` int(5) NOT NULL,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `xray_date` date NOT NULL,
  `xray_impression` varchar(255) NOT NULL,
  `xray_remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hematology`
--
ALTER TABLE `hematology`
  ADD PRIMARY KEY (`hema_ID`);

--
-- Indexes for table `pathology`
--
ALTER TABLE `pathology`
  ADD PRIMARY KEY (`pathology_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_ID`);

--
-- Indexes for table `patientcheckup`
--
ALTER TABLE `patientcheckup`
  ADD PRIMARY KEY (`pc_ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`presc_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`);

--
-- Indexes for table `ultrasound`
--
ALTER TABLE `ultrasound`
  ADD PRIMARY KEY (`ultra_id`);

--
-- Indexes for table `urinalysis`
--
ALTER TABLE `urinalysis`
  ADD PRIMARY KEY (`uri_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `xray`
--
ALTER TABLE `xray`
  ADD PRIMARY KEY (`xray_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hematology`
--
ALTER TABLE `hematology`
  MODIFY `hema_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pathology`
--
ALTER TABLE `pathology`
  MODIFY `pathology_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `patientcheckup`
--
ALTER TABLE `patientcheckup`
  MODIFY `pc_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `presc_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ultrasound`
--
ALTER TABLE `ultrasound`
  MODIFY `ultra_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `urinalysis`
--
ALTER TABLE `urinalysis`
  MODIFY `uri_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `xray`
--
ALTER TABLE `xray`
  MODIFY `xray_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
