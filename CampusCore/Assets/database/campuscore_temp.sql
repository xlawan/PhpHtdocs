-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 05:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campuscore_temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvedfiles`
--

CREATE TABLE `approvedfiles` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `version` varchar(50) DEFAULT NULL,
  `dateUploaded` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `status`, `version`, `dateUploaded`) VALUES
(65, 'OJT-004-Practicum-eval.-2019-1_05-08-2023-23-16-13.pdf', NULL, NULL, '05-08-2023-23-16-13'),
(66, 'Alixander Lawan OJT-004-Practicum-eval.-2019-1_05-08-2023-23-16-18.pdf', NULL, NULL, '05-08-2023-23-16-18'),
(68, 'OJT-004-Practicum-eval.-2019-1_05-09-2023-13-56-33.pdf', NULL, NULL, '05-09-2023-13-56-33'),
(69, 'Alixander Lawan OJT-004-Practicum-eval.-2019-1_05-11-2023-10-16-13.pdf', NULL, NULL, '05-11-2023-10-16-13'),
(70, 'OJT-004-Practicum-eval.-2019-1_05-11-2023-15-52-23.pdf', NULL, NULL, '05-11-2023-15-52-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userType`) VALUES
(1, 'admin', 'user', 'admin'),
(2, 'student', 'student', 'student'),
(3, 'dean', 'dean', 'dean');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvedfiles`
--
ALTER TABLE `approvedfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvedfiles`
--
ALTER TABLE `approvedfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
