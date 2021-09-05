-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 05, 2021 at 04:07 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `classmates`
--

CREATE TABLE `classmates` (
  `ID` int(11) NOT NULL,
  `classmate_name` varchar(255) NOT NULL,
  `classmate_age` int(11) NOT NULL,
  `classmate_gender` varchar(255) NOT NULL,
  `classmate_major` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classmates`
--

INSERT INTO `classmates` (`ID`, `classmate_name`, `classmate_age`, `classmate_gender`, `classmate_major`, `date_created`) VALUES
(1, 'Shinosuke', 7, 'male', 'Ecchi Studies', '2021-09-05 23:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '2',
  `gender` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `user_email`, `user_hash`, `user_role`, `gender`, `date_created`) VALUES
(1, 'admin', 'sam@gmail.com', '$2y$10$QCPxeIfCuUYa4KtRjQeFA.owcdCSXuqiVu/GKgDM2N.xkHEjwcCVu', 1, 'male', '2021-09-05 23:06:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classmates`
--
ALTER TABLE `classmates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classmates`
--
ALTER TABLE `classmates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
