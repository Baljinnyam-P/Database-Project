-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 08:03 PM
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
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `petsittingrequests`
--

CREATE TABLE `petsittingrequests` (
  `id` int(11) NOT NULL,
  `petName` varchar(255) NOT NULL,
  `petType` varchar(100) NOT NULL,
  `breed` varchar(100) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `photoURL` varchar(255) DEFAULT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  `healthIssues` text DEFAULT NULL,
  `temperament` text NOT NULL,
  `foodType` varchar(255) NOT NULL,
  `feedingTimes` varchar(255) NOT NULL,
  `exerciseNeeds` varchar(255) NOT NULL,
  `favoriteToys` text DEFAULT NULL,
  `sittingDates` varchar(255) NOT NULL,
  `sittingTime` varchar(100) NOT NULL,
  `specialInstructions` text DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petsittingrequests`
--

INSERT INTO `petsittingrequests` (`id`, `petName`, `petType`, `breed`, `age`, `gender`, `photoURL`, `vaccinated`, `healthIssues`, `temperament`, `foodType`, `feedingTimes`, `exerciseNeeds`, `favoriteToys`, `sittingDates`, `sittingTime`, `specialInstructions`, `ipAddress`) VALUES
(7, 'Ted', 'Bear', 'Brown', 12, '', 'grizzlybearveronica.jpg', 1, 'No', 'No', 'Salmon', 'All Day', 'Job', 'All', '1 Jan - 2 Jan', 'Whenever', 'No', '::1'),
(8, 'Ted', 'Bear', 'Brown', 12, '', 'grizzlybearveronica.jpg', 1, 'No', 'No', 'Salmon', 'All Day', 'Job', 'All', '1 Jan - 2 Jan', 'Whenever', 'No', '::1'),
(9, 'Ted', 'Bear', 'Brown', 12, '', 'grizzlybearveronica.jpg', 1, 'qw', 'qw', 'Salmon', 'All Day', 'Job', 'sd', '1 Jan - 2 Jan', 'Whenever', 'qw', '::1'),
(10, 'Ted', 'Bear', 'Brown', 43, '', 'grizzlybearveronica.jpg', 1, 'assad', 'adad', 'Salmon', 'qwq', 'Job', 'swv', '1 Jan - 2 Jan', 'sda', 'wfqf', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petsittingrequests`
--
ALTER TABLE `petsittingrequests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petsittingrequests`
--
ALTER TABLE `petsittingrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
