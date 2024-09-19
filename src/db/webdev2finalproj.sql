-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 11:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev2finalproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `resID` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `adults` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `date_in` varchar(50) NOT NULL,
  `date_out` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`resID`, `customer`, `contact`, `adults`, `kids`, `room_type`, `date_in`, `date_out`, `status`, `email`) VALUES
(3, 'bobby', 123890, 2, 3, 'Deluxe', '0012-12-11', '2022-12-09', 'Approve', 'joseph@gmail.com'),
(4, 'i heard that', 123123, 2, 3, 'Deluxe', '2022-12-06', '2022-12-09', 'Approve', 'joseph@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `timemodified`, `role`) VALUES
(1, 'Joseph', 'Rafael', 'joseph@gmail.com', '$2y$10$6wNJBPCQlHoKqGg6.LiDpOr/N0N9QaXpEbd.qh2LmlONDHFZ96tFy', '2022-12-22 06:44:42', 'guest'),
(2, 'xerxes', 'cuyos', 'xerxes@gmail.com', '$2y$10$u9Yd9w94HhttRycx277fIO7gbWZtqPH2/kfKdoBkFPY69BEf2kzg2', '2022-12-22 06:50:53', 'guest'),
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$10$hakPTPEI7FrTjgkAZar4gO3R.c9hSP9.EuBO5bCiCGfQtJXXY8M1C', '2022-12-22 14:25:37', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`resID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
