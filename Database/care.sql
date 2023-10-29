-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 01:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `pdoctor` int(255) NOT NULL,
  `pspecialization` int(255) NOT NULL,
  `pdate` date NOT NULL,
  `ptime` time NOT NULL,
  `pstatus` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`pid`, `pname`, `pemail`, `pdoctor`, `pspecialization`, `pdate`, `ptime`, `pstatus`) VALUES
(1, 'ifra', 'ifra-1@gmail.com', 2, 2, '2023-10-11', '01:00:00', 1),
(2, 'Moiz', 'moiz@gmail.com', 1, 1, '2023-10-25', '07:58:00', 1),
(3, 'Zain Sarfraz', 'zainsarfraz82@gmail.com', 1, 1, '2023-10-30', '19:14:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `Dusername` varchar(255) NOT NULL,
  `Demail` varchar(255) NOT NULL,
  `Dpassword` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `Dcity` varchar(255) NOT NULL,
  `Dtime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `dstatus` tinyint(255) NOT NULL DEFAULT 1,
  `Dimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `Dusername`, `Demail`, `Dpassword`, `specialization`, `Dcity`, `Dtime`, `dstatus`, `Dimage`) VALUES
(1, 'Dr Shahid', 'shahid@gmail.com', '12345', 'General physician', 'Karachi', '2023-10-27 14:43:54.000000', 1, ''),
(2, 'Dr Kiran', 'kiran@gmail.com', '123456', 'Gynecologist', 'Karachi', '2023-10-23 14:45:52.000000', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `PImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `password`, `phone`, `PImage`) VALUES
(1, 'mosa', 'mosa@gmail.com', '$2y$10$QdlVjkO9zjALlQKvZzZL/u4X0oaBGhfLWlkpPKpGvjKZU4P1ud/Zq', '0', ''),
(2, 'ifra', 'ifra@gmail.com', '$2y$10$jETxJPBLujXSfOBnQI2Kh.BCnIqjfkg4k2MgfK3YWq/msmOnnymrK', '0', ''),
(3, 'hanzala', 'hanzala@gmail.com', '$2y$10$lTgZXl737WIvY/FWWT6ybeUqRbMjZ9ulaf2pF90sbmaCq9Rv9M/g6', '0', ''),
(5, 'Abdul Moiz', 'thunder@gmail.com', '$2y$10$bWgC1w2.ix.yZZs.Rvw6deo/Atvl6OTeA0Remeg3SK.WsiN5Ek17a', '0', ''),
(6, 'ifra', 'ifra-1@gmail.com', '$2y$10$a7t.auGCpACqch5OVf.K6uQ.45.jmz/XpX5k0tHJLpyhVqv7kx94G', '03172667345', 'random.jpeg'),
(7, 'Zain', 'zainsarfraz82@gmail.com', '$2y$10$DdOm4UYodR7F/i210.HL7.S4YPZBnJuBAIyTnKPAE0HyoVsAOL/W2', '03172667345', 'mine pic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `foriegnkey` (`pdoctor`),
  ADD KEY `fk` (`pspecialization`),
  ADD KEY `us` (`pname`),
  ADD KEY `pp` (`pemail`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk` FOREIGN KEY (`pspecialization`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `foriegnkey` FOREIGN KEY (`pdoctor`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
