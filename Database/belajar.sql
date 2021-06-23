-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 03:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`) VALUES
(1, 'Holi Sinaga', 'admin', 'admin123'),
(3, 'Holi Sinaga', 'admin1', 'admin123'),
(4, 'nama', 'admin3', '$2y$10$xdFTJhRoLHOKXvBHwDlP9.FqxeawSFdySxpKBbpagcFH9SSpbX12K');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `spesialis`, `username`, `email`, `password`, `status`) VALUES
(1, 'dr. Nalom A. Sinaga', 'Sp.A', 'drnalom', 'drnalom@rs.com', '$2y$10$EIsavytRoETQB8ABo/2T7ODF7v5ajuSzM4y7deNnfOzhQl4DKboC2', 0),
(2, 'dr. Satria Adi Nugraha', 'Sp.JP', 'drsatria', 'drsatria@rs.com', '$2y$10$tZWqSWQiAMhd87JAqI5/pOZgt4FZvzJWB8ZJamRaAP0Mn7TGjC4lK', 0),
(3, 'dr. Hansen Gunawan S', 'Sp.OG', 'drhansen', 'drhansen@rs.com', '$2y$10$46aaTDBQek7xns5.cv10Weuc5dI2XVBs.RuHk/BFlnkx/nLLYJrIW', 0),
(4, 'dr. Gilbert A. Leuw', 'Sp.KK', 'dribe', 'dribe@rs.com', '$2y$10$7zz89zSmbelVmkdyxLFvkewRH36Jlshqrf4VkVNIDlRbD/RbyNiNi', 0),
(5, 'dr. Kaerelyn Sean Annora', 'Psikiater', 'drkeren', 'christytyty@rs.com', '$2y$10$sFY0DY0DwtY6287bLNaBIePqNohOiSUWfzaN8XVJTxai9OoLPZ8W6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drschedule`
--

CREATE TABLE `drschedule` (
  `id` int(255) NOT NULL,
  `drId` int(255) NOT NULL,
  `drname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drschedule`
--

INSERT INTO `drschedule` (`id`, `drId`, `drname`, `date`, `startTime`, `endTime`, `status`) VALUES
(1, 1, 'dr. Nalom A. Sinaga, Sp.A', '2021-06-23', '14:14:00', '15:14:00', 1),
(2, 1, 'dr. Nalom A. Sinaga, Sp.A', '2021-06-23', '14:32:00', '15:32:00', 1),
(3, 1, 'dr. Nalom A. Sinaga, Sp.A', '2021-06-30', '22:50:00', '23:50:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `dob`) VALUES
(1, 'holisinaga', 'holi@pasien.com', '$2y$10$QAnLZofMQf5dkDuU4SD0lOyvyR0uwijPIvaDNYJiuSgdLKMHdHryC', 'Nalom Aholiab Sinaga', '2000-06-09'),
(2, 'ibebebe', 'gilbert@pasien.com', '$2y$10$cARErvqwP10Kl4XoG2U2Y./8zSpdzwWrfeFKhWPWZCr0RYkD4PxWG', 'Gilbert A. Leuw', '2000-08-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `drschedule`
--
ALTER TABLE `drschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drschedule`
--
ALTER TABLE `drschedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
