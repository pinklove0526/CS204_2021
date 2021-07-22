-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 22, 2021 at 03:33 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalreview2021_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `ID` int(11) NOT NULL,
  `task_text` varchar(255) NOT NULL,
  `task_user_id` int(11) NOT NULL,
  `task_status` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_completed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`ID`, `task_text`, `task_user_id`, `task_status`, `date_created`, `date_completed`) VALUES
(1, 'This is a test task', 1, 0, '2021-07-22 22:29:02', NULL),
(2, 'This is a test task Spencere', 2, 1, '2021-07-22 22:29:25', NULL),
(3, 'Does this work~~', 2, 0, '2021-07-22 22:29:45', NULL),
(4, 'Teach kids Scratch to make Xwing vs Tie Fighter', 1, 1, '2021-07-22 22:30:19', NULL),
(5, 'Another thing', 1, 1, '2021-07-22 22:30:38', NULL),
(6, 'test 100000', 1, 1, '2021-07-22 22:30:53', NULL),
(7, 'Teach kids Scratch to make Xwing vs Tie Fighter', 2, 1, '2021-07-22 22:31:25', NULL),
(8, 'htrhtrhtrh', 2, 0, '2021-07-22 22:31:36', NULL);

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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `user_email`, `user_hash`, `user_role`, `date_created`) VALUES
(1, 'admin', 'sam@gmail.com', '$2y$10$QCPxeIfCuUYa4KtRjQeFA.owcdCSXuqiVu/GKgDM2N.xkHEjwcCVu', 1, '2021-07-22 22:32:32'),
(2, 'Spencer', 'austinma@hawaii.edu', '$2y$10$jZEV8XLZKj2KEczEG4iWROuzRDdtq13XgKTAK99XnuG.gKMx1zZia', 2, '2021-07-22 22:32:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
