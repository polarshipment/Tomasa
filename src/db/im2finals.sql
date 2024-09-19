-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 04:47 PM
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
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `resID` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `adults` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `date_in` varchar(50) NOT NULL,
  `date_out` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`resID`, `user_id`, `customer`, `contact`, `adults`, `kids`, `room_type`, `date_in`, `date_out`, `status`) VALUES
(16, 4, 'xerxess', 192312, 5, 3, 'Deluxe', '2023-05-12', '2023-05-13', 'Checked out: 2023-05-17 16:27:37'),
(17, 4, 'Magabs', 995817308, 8, 3, 'Deluxe', '2023-05-19', '2023-05-20', 'Checked out: 2023-05-17 16:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `resID` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `adults` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `date_in` varchar(50) NOT NULL,
  `date_out` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`resID`, `user_id`, `customer`, `contact`, `adults`, `kids`, `room_type`, `date_in`, `date_out`, `status`, `email`) VALUES
(19, 4, 'JC', 123, 3, 3, 'Group', '2023-05-18', '2023-05-19', 'Pending', 'xerxes.cu@gmail.com');

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
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$10$hakPTPEI7FrTjgkAZar4gO3R.c9hSP9.EuBO5bCiCGfQtJXXY8M1C', '2022-12-22 14:25:37', 'admin'),
(4, 'Xerxes', 'Cuyos', 'xerxes.cu@gmail.com', '$2y$10$gBLnqhGkKv0c7ZY7Jpy7Rea24WK4cd.TVRUZ.MKa7UZLPWfOf.G3u', '2023-05-16 06:17:45', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD KEY `testt` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`resID`),
  ADD KEY `test` (`user_id`);

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
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `testt` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `test` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
