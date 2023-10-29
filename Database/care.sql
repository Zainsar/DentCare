-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 09:56 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'mosa', 'mosa@gmail.com', '$2y$10$QdlVjkO9zjALlQKvZzZL/u4X0oaBGhfLWlkpPKpGvjKZU4P1ud/Zq', ''),
(2, 'ifra', 'ifra@gmail.com', '$2y$10$jETxJPBLujXSfOBnQI2Kh.BCnIqjfkg4k2MgfK3YWq/msmOnnymrK', ''),
(3, 'hanzala', 'hanzala@gmail.com', '$2y$10$lTgZXl737WIvY/FWWT6ybeUqRbMjZ9ulaf2pF90sbmaCq9Rv9M/g6', ''),
(5, 'Abdul Moiz', 'thunder@gmail.com', '$2y$10$bWgC1w2.ix.yZZs.Rvw6deo/Atvl6OTeA0Remeg3SK.WsiN5Ek17a', ''),
(6, 'ifra', 'ifra-1@gmail.com', '$2y$10$8nd022fQAQeofoZSr.L3rem/aEjPrYU8eCSh51pu0OOjuGo00VFhq', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
