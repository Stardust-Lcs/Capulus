-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 04:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capulusdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafes`
--

CREATE TABLE `cafes` (
  `cafe_id` char(36) CHARACTER SET utf8 NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `photo` text CHARACTER SET utf8 NOT NULL,
  `user_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafes`
--

INSERT INTO `cafes` (`cafe_id`, `name`, `address`, `photo`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('c74d3752-48fa-4d3d-999c-cc27d1ef1897', 'New Cafe', 'Babarsari, Sleman, Yogyakarta', 'https://unsplash.com/photos/tKN1WXrzQ3s', 'c74d3752-48fa-4d3d-999c-cc27d1ef4162', '2021-01-09 02:25:57', '2021-01-09 02:25:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` char(36) CHARACTER SET utf8 NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` char(36) CHARACTER SET utf8 NOT NULL,
  `cafe_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `user_id`, `cafe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('d74d3752-48fa-4d3d-999c-cc27d1ef1897', '2021-01-09 02:56:41', 'c74d3752-48fa-4d3d-999c-cc27d1ef4162', 'c74d3752-48fa-4d3d-999c-cc27d1ef1897', '2021-01-09 02:45:30', '2021-01-09 02:56:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` char(36) CHARACTER SET utf8 NOT NULL,
  `quantity` int(5) NOT NULL,
  `order_id` char(36) CHARACTER SET utf8 NOT NULL,
  `table_id` char(36) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` char(36) CHARACTER SET utf8 NOT NULL,
  `table_name` varchar(20) NOT NULL,
  `table_available` tinyint(1) NOT NULL,
  `cafe_id` char(36) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` char(36) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `is_cafe_owner` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `password`, `fullname`, `phone`, `is_cafe_owner`, `created_at`, `updated_at`, `deleted_at`) VALUES
('c74d3752-48fa-4d3d-999c-cc27d1ef4162', 'example@mail.com', 'test', 'test', 'Test', '08123456789', 1, '2021-01-07 02:49:34', '2021-01-09 03:26:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafes`
--
ALTER TABLE `cafes`
  ADD PRIMARY KEY (`cafe_id`),
  ADD KEY `cafes_user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ordesr_cafe_id` (`cafe_id`),
  ADD KEY `orders_user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `orderItems_order_id` (`order_id`),
  ADD KEY `orderItems_table_id` (`table_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`),
  ADD KEY `tables_cafe_id` (`cafe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_users_username` (`username`),
  ADD UNIQUE KEY `unique_users_email` (`email`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cafes`
--
ALTER TABLE `cafes`
  ADD CONSTRAINT `cafes_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ordesr_cafe_id` FOREIGN KEY (`cafe_id`) REFERENCES `cafes` (`cafe_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `orderItems_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderItems_table_id` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_cafe_id` FOREIGN KEY (`cafe_id`) REFERENCES `cafes` (`cafe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
