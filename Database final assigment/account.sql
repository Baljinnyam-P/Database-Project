-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 08:04 PM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `role`, `username`, `password`, `name`, `surname`, `phone`, `email`, `created_at`) VALUES
(1, 'client', 'Marindushku', '$2y$10$Qb6.wjSxm4XQXL8Rfm.iW.bB9lCERaqtijc97wTnTyQssCdrcCRTe', 'Marin', 'Dushku', '8564440486', 'marindushku@mail.adelphi.edu', '2023-12-01 02:23:41'),
(2, 'client', 'MD', '$2y$10$wmwLZzTR4yQoOjY/efsZU.czhQAFC6.hmD.YVc4Ta0Hy4YEBmWp16', 'Marin', 'Dushku', '8564440486', 'asdas@u', '2023-12-01 02:26:04'),
(3, 'sitter', 'username', '$2y$10$/5E27N1v7PE1sflxaPyQV.6lhb.vvKOqBzj/Q6pnMEyFOvWpbNBda', '', '', '', '', '2023-12-01 02:27:48'),
(4, 'client', 'Dasha', '$2y$10$8Ew8MPHbrHH6xjyY6yawGuh/njahjH4A9lJD7DGejaEqqYoERTVaW', 'Dashniam', 'Putnagrosov', '888888888', 'Dasha@mail.com', '2023-12-01 18:54:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
