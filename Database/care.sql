-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 12:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `pspecialization` varchar(255) NOT NULL,
  `pday` text NOT NULL,
  `ptime` text NOT NULL,
  `pstatus` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`pid`, `pname`, `pemail`, `pdoctor`, `pspecialization`, `pday`, `ptime`, `pstatus`) VALUES
(1, 'ifra', 'ifra-1@gmail.com', 2, 'Gynecologist', 'Wednesday & Friday', '3pm to 8pm', 1),
(2, 'ifra', 'ifra-1@gmail.com', 2, 'Gynecologist', 'Wednesday & Friday', '3pm to 8pm', 1),
(3, 'ifra', 'ifra-1@gmail.com', 1, 'General physician', 'monday , Wednesday , Friday', '11am to 3pm', 1);

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
  `Days` varchar(255) NOT NULL,
  `Dtime` text NOT NULL,
  `dstatus` tinyint(255) NOT NULL DEFAULT 1,
  `Dimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `Dusername`, `Demail`, `Dpassword`, `specialization`, `Dcity`, `Days`, `Dtime`, `dstatus`, `Dimage`) VALUES
(1, 'Dr Sarfraz', 'sarfrazahmed@gmail.com', '$2y$10$SGoyGMls1U99dsgGbzSKfeOd1Y5QD0likdxevLON.Mq7yY4rlWsPi', 'General physician', 'Karachi', 'monday , Wednesday , Friday', '11am to 3pm', 1, ''),
(2, 'Dr Kiran', 'kiran@gmail.com', '$2y$10$nTpInJHs1fFB1uk05dHOR.oW8gFND5q2ZOObx9A.zz24Vc7LvCfPa', '', 'Karachi', '', '3pm to 8pm', 1, 'i.webp');

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
(7, 'Zain', 'zainsarfraz82@gmail.com', '$2y$10$DdOm4UYodR7F/i210.HL7.S4YPZBnJuBAIyTnKPAE0HyoVsAOL/W2', '03172667345', 'mine pic.jpg'),
(8, 'sir ebad', 'ebad@aptechnorth.edu.pk', '$2y$10$VC66PMbTF2k4.lqTbyqFue6NHNMfMq7fxh2L23JjlzVdMFNRzwNTW', '03123456789', 'ebad.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk` (`pdoctor`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk` FOREIGN KEY (`pdoctor`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
