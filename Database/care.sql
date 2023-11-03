-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 10:37 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `Aname` varchar(255) NOT NULL,
  `Aemail` varchar(255) NOT NULL,
  `Apassword` varchar(255) NOT NULL,
  `AImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Aname`, `Aemail`, `Apassword`, `AImage`) VALUES
(1, 'Ifra', 'ifra@gmail.com', '$2y$10$5l3lAjcaopgu8v7qEUsnn.UpS5xNkCXQcmVCXsGC9oY4O9iGrEqmO', 'barbie 1.jpeg');

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
(4, 'Ifra', 'ifra@gmail.com', 9, 'General physician', 'monday , Wednesday , Friday', '2pm to 7pm', 1),
(5, 'Subhan', 'ifra@gmail.com', 9, 'General physician', 'monday , Wednesday , Friday', '2pm to 7pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `bid` int(11) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bdescription` varchar(255) NOT NULL,
  `btime` time(3) NOT NULL,
  `bdate` date NOT NULL,
  `bimage` varchar(255) NOT NULL,
  `bstatus` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`bid`, `bname`, `bdescription`, `btime`, `bdate`, `bimage`, `bstatus`) VALUES
(1, 'medical', 'Health and science', '05:33:00.000', '2023-11-15', 'IMG-20200227-WA0001.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cid` int(11) NOT NULL,
  `Cities` varchar(255) NOT NULL,
  `Cstatus` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cid`, `Cities`, `Cstatus`) VALUES
(5, 'Karachi', 1),
(6, 'Sukkur', 1),
(7, 'Lahore', 1),
(8, 'Hyderabad', 1),
(9, 'Gujranwala', 1),
(10, 'NawabShah', 1),
(11, 'Islamabad', 1),
(12, 'Gotki', 1),
(13, 'Rawalpindi', 1);

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
  `Dcity` int(11) NOT NULL,
  `Days` varchar(255) NOT NULL,
  `Dtime` text NOT NULL,
  `dstatus` tinyint(255) NOT NULL DEFAULT 1,
  `Dimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `Dusername`, `Demail`, `Dpassword`, `specialization`, `Dcity`, `Days`, `Dtime`, `dstatus`, `Dimage`) VALUES
(9, 'Dr Sarfraz', 'sarfrazahmed@gmail.com', '$2y$10$5zUBsw9ZhoqaJiN5MIvOMeR8asec5MiNZlUPFyVrTUu1gPnH5qmzS', 'General physician', 5, 'monday , Wednesday , Friday', '2pm to 7pm', 1, 'IMG-20220521-WA0145.jpg');

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
  `PImage` varchar(255) NOT NULL,
  `pstatus` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `password`, `phone`, `PImage`, `pstatus`) VALUES
(1, 'Ifra', 'ifra@gmail.com', '$2y$10$qKy5YRCmbawI.B4dAJYBOe9r4zllnSsF8iZUecVQehHaJ.jmAh6mm', '0318 2776688', 'random.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk` (`pdoctor`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tt` (`Dcity`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk` FOREIGN KEY (`pdoctor`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `tt` FOREIGN KEY (`Dcity`) REFERENCES `cities` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
