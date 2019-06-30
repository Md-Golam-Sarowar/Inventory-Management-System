-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 11:14 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `UserId` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`UserId`, `username`, `Password`, `datetime`) VALUES
(1, 'kamal', 'kamal', '2017-09-05 03:17:23'),
(2, 'admin', 'admin', '2017-09-05 03:22:44'),
(3, 'apu', 'apu', '2017-09-05 03:56:06'),
(4, 'appu', 'appu', '2017-09-05 04:02:45'),
(5, 'admin', 'admin', '2017-09-05 04:10:15'),
(6, 'gandu', 'gandu', '2017-09-05 04:11:17'),
(7, 'admin', 'admin', '2017-09-05 04:11:34'),
(8, 'admin', 'admin', '2017-09-05 04:13:53'),
(9, 'admin', 'admin', '2017-09-05 04:15:01'),
(10, 'admin', 'admin', '2017-09-05 04:15:29'),
(11, 'admin', 'admin', '2017-09-05 04:15:37'),
(12, 'admin', 'admin', '2017-09-05 04:16:27'),
(13, 'po', 'po', '2017-09-05 04:16:41'),
(14, 'admin', 'admin', '2017-09-05 04:19:10'),
(15, 'askme', 'askme', '2017-09-05 04:23:33'),
(16, 'admin', 'admin', '2017-09-05 04:25:20'),
(17, 'admin', 'admin', '2017-09-05 11:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_Id` int(11) NOT NULL,
  `Item_name` varchar(200) NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_price` int(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_Id`, `Item_name`, `item_description`, `item_price`, `date`) VALUES
(17, 'ssdlsad', 'sdsldas', 900, '2017-09-06 07:52:26'),
(18, 'earphone', '20 earphones only', 6789, '2017-09-06 07:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_Description` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_Description`, `user_email`) VALUES
(8, 'jcfgc', 'bvf', 'fcgfx'),
(9, 'zsz', 'eez9000', 'szesz9000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
