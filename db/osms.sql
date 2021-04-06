-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 06:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` bigint(20) NOT NULL,
  `a_name` varchar(150) NOT NULL,
  `a_email` varchar(190) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'sunny rajpoot', 'sunnyrajpoot7869@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_work`
--

CREATE TABLE `assigned_work` (
  `as_work_id` int(11) NOT NULL,
  `requist_id` int(11) NOT NULL,
  `requist_info` text NOT NULL,
  `requist_desc` text NOT NULL,
  `requister_name` varchar(150) NOT NULL,
  `requister_add1` varchar(120) NOT NULL,
  `requister_city` varchar(120) NOT NULL,
  `requister_state` varchar(120) NOT NULL,
  `requister_zip` bigint(20) NOT NULL,
  `requister_email` varchar(200) NOT NULL,
  `requister_mobile` bigint(20) NOT NULL,
  `assign_date` varchar(150) NOT NULL,
  `assign_tech` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_work`
--

INSERT INTO `assigned_work` (`as_work_id`, `requist_id`, `requist_info`, `requist_desc`, `requister_name`, `requister_add1`, `requister_city`, `requister_state`, `requister_zip`, `requister_email`, `requister_mobile`, `assign_date`, `assign_tech`) VALUES
(8, 7, 'my phone  is not working.', 'My phone is not working please help me. i am in trubble.', 'ghulam dastgir', 'okara', 'okara', 'lahore', 12345, 'ghulamdastgir@gmail.com', 3081482509, '2020-12-24', '2'),
(9, 8, 'My laptop is not working', 'My laptop is not working why i don\'t know please help me.', 'sunny rajpoot', 'shergarh', 'shergarh', 'depalpur', 12345, 'sunnyrajpoot@gmail.com', 3070458338, '2020-12-26', '2'),
(10, 6, 'My laptop is not working', 'My tab is not working i did not know.', 'sunny rajpoot', 'shergarh', 'shergarh', 'depalpur', 12345, 'sunnyrajpoot@gmail.com', 3070458338, '2020-12-26', '4'),
(11, 9, 'My tab is not working.', 'My tab is not working i did not know. I think battery issue is ocured.', 'fahad hassan', 'shergarh', 'okara', 'depalpur', 89674, 'fahadhassan@gmail.com', 3081189109, '2020-12-27', '2');

-- --------------------------------------------------------

--
-- Table structure for table `requist`
--

CREATE TABLE `requist` (
  `r_id` bigint(20) NOT NULL,
  `r_info` varchar(200) NOT NULL,
  `r_desc` varchar(200) NOT NULL,
  `r_name` varchar(150) NOT NULL,
  `r_address1` varchar(150) NOT NULL,
  `r_address2` varchar(150) NOT NULL,
  `r_city` varchar(100) NOT NULL,
  `r_state` varchar(100) NOT NULL,
  `r_zip` bigint(20) NOT NULL,
  `r_email` text NOT NULL,
  `r_mobile` varchar(100) NOT NULL,
  `r_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requist`
--

INSERT INTO `requist` (`r_id`, `r_info`, `r_desc`, `r_name`, `r_address1`, `r_address2`, `r_city`, `r_state`, `r_zip`, `r_email`, `r_mobile`, `r_date`) VALUES
(10, 'My phone charger is not working.', 'My phone charger is not working please service to me.', 'faisal gafoor', 'renala', 'okara', 'depalpur', 'hujra', 90675, 'faisalgafoor@gmail.com', '3016432342', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `requisters`
--

CREATE TABLE `requisters` (
  `requister_id` int(11) NOT NULL,
  `requister_name` varchar(150) NOT NULL,
  `requister_email` varchar(200) NOT NULL,
  `requister_password` varchar(210) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisters`
--

INSERT INTO `requisters` (`requister_id`, `requister_name`, `requister_email`, `requister_password`) VALUES
(5, 'ghulam dastgir', 'ghulamdastgir345@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(6, 'kamran bhati', 'kamran3456@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(7, 'fahad hassan', 'fahadhassan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(8, 'muzamil Hussain', 'muzamil980@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(9, 'noman ali', 'nomanali2357@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(10, 'haider ali', 'haiderali908@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(11, 'faisal gafoor', 'faisalgafoor@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `technition`
--

CREATE TABLE `technition` (
  `tech_id` int(11) NOT NULL,
  `tech_name` varchar(120) NOT NULL,
  `tech_email` varchar(160) NOT NULL,
  `tech_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technition`
--

INSERT INTO `technition` (`tech_id`, `tech_name`, `tech_email`, `tech_phone`) VALUES
(1, 'Haq nawaz', 'haqnawaz@gmail.com', '03459462753'),
(2, 'sirfraz ali', 'sirdrazali89@gmail.com', '03084983011'),
(4, 'Mohammad Akram', 'makram6745@gmail.com', '03064456445'),
(5, 'sunny rajpoot', 'sunnyrajpoot@gmail.com', '03081482509');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assigned_work`
--
ALTER TABLE `assigned_work`
  ADD PRIMARY KEY (`as_work_id`);

--
-- Indexes for table `requist`
--
ALTER TABLE `requist`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `requisters`
--
ALTER TABLE `requisters`
  ADD PRIMARY KEY (`requister_id`);

--
-- Indexes for table `technition`
--
ALTER TABLE `technition`
  ADD PRIMARY KEY (`tech_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_work`
--
ALTER TABLE `assigned_work`
  MODIFY `as_work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requist`
--
ALTER TABLE `requist`
  MODIFY `r_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requisters`
--
ALTER TABLE `requisters`
  MODIFY `requister_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `technition`
--
ALTER TABLE `technition`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
