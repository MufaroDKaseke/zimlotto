-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 09:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zimlotto_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `draw_date` date NOT NULL,
  `num_1` int(11) NOT NULL,
  `num_2` int(11) NOT NULL,
  `num_3` int(11) NOT NULL,
  `num_4` int(11) NOT NULL,
  `num_5` int(11) NOT NULL,
  `num_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `draw_date`, `num_1`, `num_2`, `num_3`, `num_4`, `num_5`, `num_6`) VALUES
(0, '2025-02-11', 29, 35, 42, 13, 49, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `no` int(11) NOT NULL,
  `draw_date` date NOT NULL,
  `num_1` int(11) NOT NULL,
  `num_2` int(11) NOT NULL,
  `num_3` int(11) NOT NULL,
  `num_4` int(11) NOT NULL,
  `num_5` int(11) NOT NULL,
  `num_6` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchased_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`no`, `draw_date`, `num_1`, `num_2`, `num_3`, `num_4`, `num_5`, `num_6`, `price`, `status`, `user_id`, `purchased_on`) VALUES
(3056794, '2025-02-05', 12, 7, 7, 8, 11, 12, 0.10, 'won', 1, '2025-02-10 22:42:59'),
(18686833, '2025-01-02', 11, 15, 23, 22, 15, 12, 0.16, 'pending', 1, '2025-02-10 22:42:04'),
(19678164, '2025-02-11', 10, 18, 20, 6, 6, 5, 0.21, 'lost', 1, '2025-02-10 21:49:23'),
(29416172, '2025-01-02', 8, 19, 25, 1, 45, 9, 2.00, 'pending', 1, '2025-02-11 10:26:45'),
(79163104, '2025-02-05', 4, 9, 34, 8, 17, 23, 2.00, 'pending', 1, '2025-02-11 09:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `amount`, `method`, `user_id`, `transaction_date`) VALUES
(1, 'deposit', 20, 'Paypal', 1, '2025-02-10 23:30:49'),
(2, 'deposit', 32, 'Ecocahe', 1, '2025-02-10 23:30:49'),
(3, 'deposit', 4, 'Ecocash', 1, '2025-02-11 00:05:34'),
(4, 'withdraw', 3, 'Innbucks', 1, '2025-02-11 00:05:45'),
(5, 'deposit', 5, 'Bank Transfer', 1, '2025-02-11 06:40:25'),
(6, 'deposit', 10, 'Bank Transfer', 1, '2025-02-11 07:13:58'),
(7, 'withdraw', 10, 'Innbucks', 1, '2025-02-11 07:14:17'),
(8, 'deposit', 15, 'Zipit', 1, '2025-02-11 07:15:18'),
(9, 'deposit', 34, 'Ecocash', 1, '2025-02-11 07:16:40'),
(10, 'deposit', 20, 'Ecocash', 1, '2025-02-11 09:30:47'),
(11, 'withdraw', 10, 'Ecocash', 1, '2025-02-11 10:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `balance`, `fullname`, `age`, `created_on`) VALUES
(1, 'momo', 'momopassword', 'momo@momo.co.zw', 97, 'Mufaro D Kaseke', 18, '2025-02-10 20:47:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`,`draw_date`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
