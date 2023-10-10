-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 09:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_stm`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `sender`, `receiver`, `amount`, `date`) VALUES
(1, 'John Doe ( A/c No: 1001)', '1003', 2000, '28/09/23 08:42:54 AM'),
(2, 'Mark Otto ( A/c No: 1002)', '1001', 2000, '28/09/23 08:43:46 AM'),
(3, 'Kate Hunington ( A/c No: 1008)', '1010', 10000, '28/09/23 08:57:12 AM'),
(4, 'Kristi  ( A/c No: 1004)', '1003', 20000, '28/09/23 08:58:16 AM'),
(5, 'John Doe ( A/c No: 1001)', '1010', 4000, '30/09/23 01:18:17 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `acno` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `acno`, `name`, `mobile`, `email`, `balance`) VALUES
(1, 1001, 'John Doe', 1412165235, 'john@example.com', 12000),
(2, 1002, 'Mark Otto', 6622554411, 'mark@example.com', 56400),
(3, 1003, 'Jacob Thornton', 7447522514, 'jacob@example.com', 28800),
(4, 1004, 'Kristi ', 8855221144, 'Kristi@example.com', 436200),
(5, 1005, 'Mary Moe', 7799663322, 'mary@example.com', 96200),
(6, 1006, 'July Dooley', 5544332211, 'july@example.com', 75430),
(7, 1007, 'Alex Ray', 1144663322, 'alex.ray@gmail.com', 64500),
(8, 1008, 'Kate Hunington', 6644552200, 'kate.hunington@gmail.com', 95600),
(9, 1009, 'Anna Wintour', 2456212996, 'anna@example.com', 35620),
(10, 1010, 'Jerry Horwitz', 6432518290, 'jerry@gmail.com', 100600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
