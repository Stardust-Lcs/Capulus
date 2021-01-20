-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 05:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
('07aa5c66-f26a-4a59-a12f-78466cf90a7a', 'Tropikal Coffee', 'Jl. Keputih Tegal Timur, Keputih, Kec. Sukolilo, Kota Surabaya.', 'http://localhost:8000/uploads/qBNbf259B7hxhIzuuueCGMaMAPOe2nm0.jpg', '13a52da0-4c50-4d96-9801-adce4b74be70', '2021-01-20 03:12:29', '2021-01-20 03:12:29', NULL),
('546cde2f-05a1-450c-9252-02e9cd3f86dc', 'Izakaya-Go Resto and Lounge', 'Jl. Raya Kertajaya Indah No.201, RT.000/RW.00, Manyar Sabrangan, Kec. Mulyorejo, Kota Surabaya.', 'http://localhost:8000/uploads/RRehawXLsJtohGUAp5nPjOJ0yXx8MS2U.jpg', 'b07dc073-1527-498a-a370-5a48147ea640', '2021-01-20 03:04:47', '2021-01-20 03:04:47', NULL),
('a3616180-506f-4dc6-9553-cb54c53f432d', 'TBRK Rumah Kopi', 'Jl. Manukan Dalam No.12, Manukan Kulon, Kec. Tandes, Kota Surabaya.', 'http://localhost:8000/uploads/TFQMcASab2vwpQh3BZxKC01HeMQRTFIZ.jpg', '91b9b5db-166f-4e88-bc79-cee37f9542ef', '2021-01-20 03:00:26', '2021-01-19 20:01:19', NULL),
('a6d73dac-22f9-4244-90f7-3b23f67d226e', 'Mama Noi', 'Jl. Puri Widya Kencana, Lidah Kulon, Kec. Lakarsantri, Kota Surabaya', 'http://localhost:8000/uploads/jhxbz9PV90UrBqqsm1bUST0JciHVgyHU.jpg', '8fa0003b-f47d-4bc2-ae54-68d477f70c8f', '2021-01-20 03:24:47', '2021-01-20 03:24:47', NULL),
('da1fe81a-0667-4f0b-9136-3e85d796cf1f', 'Carpentier Kitchen', 'Jl. Untung Suropati No.83, DR. Soetomo, Kec. Tegalsari, Kota Surabaya', 'http://localhost:8000/uploads/OirEAJNLhaCC8q3h48ZoEdp4QzJ6O8tw.jpg', 'c4972b60-35c8-471a-8ea4-887236997b49', '2021-01-20 03:28:46', '2021-01-20 03:28:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` char(36) CHARACTER SET utf8 NOT NULL,
  `order_date` text NOT NULL,
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
('8017167e-c571-4b1e-bffc-cbcff5f1b8f5', '2021-01-22', '95fbb99c-aae4-46ee-b470-49b9dabd1e86', 'da1fe81a-0667-4f0b-9136-3e85d796cf1f', '2021-01-20 03:32:58', '2021-01-20 03:32:58', NULL),
('d3141830-55de-4942-9912-5ffa113f2331', '2021-01-22', '95fbb99c-aae4-46ee-b470-49b9dabd1e86', 'da1fe81a-0667-4f0b-9136-3e85d796cf1f', '2021-01-20 03:40:33', '2021-01-20 03:40:33', NULL),
('d5fa4d99-1e0a-4921-a31c-ec1007ad71f5', '2021-01-22', '95fbb99c-aae4-46ee-b470-49b9dabd1e86', '546cde2f-05a1-450c-9252-02e9cd3f86dc', '2021-01-20 04:22:20', '2021-01-20 04:22:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` char(36) CHARACTER SET utf8 NOT NULL,
  `quantity` int(5) NOT NULL,
  `order_id` char(36) CHARACTER SET utf8 NOT NULL,
  `table_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `quantity`, `order_id`, `table_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('4b95276e-f237-4217-9983-2123eaa3f5f0', 1, 'd3141830-55de-4942-9912-5ffa113f2331', '4e04a054-6584-45fb-8f9b-d1d81d12c146', '2021-01-20 03:40:33', '2021-01-20 03:40:33', NULL),
('a1a8d00e-2157-446f-8580-edd8e13b8b84', 3, 'd5fa4d99-1e0a-4921-a31c-ec1007ad71f5', '72e6f842-010c-42c9-b9ea-97fd6d6c0812', '2021-01-20 04:22:20', '2021-01-20 04:22:20', NULL),
('b33d0fc1-d9eb-439e-ae86-21bd55ea9c44', 1, '8017167e-c571-4b1e-bffc-cbcff5f1b8f5', '4e04a054-6584-45fb-8f9b-d1d81d12c146', '2021-01-20 03:39:03', '2021-01-20 03:39:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` char(36) CHARACTER SET utf8 NOT NULL,
  `table_name` varchar(20) NOT NULL,
  `price` int(15) NOT NULL,
  `total_table` int(5) NOT NULL,
  `cafe_id` char(36) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`, `price`, `total_table`, `cafe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('09e96424-93d9-4bd9-a09c-d74b80478d50', 'Biasa', 40000, 20, '546cde2f-05a1-450c-9252-02e9cd3f86dc', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL),
('2d29470c-ac85-4e62-9fa5-1a30263c932e', '4', 20000, 8, 'a6d73dac-22f9-4244-90f7-3b23f67d226e', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL),
('2d4a992c-14f8-4a26-bc9b-582b6eb85236', 'Regular', 50000, 12, 'a3616180-506f-4dc6-9553-cb54c53f432d', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL),
('3f8d4a2a-981c-4514-8171-419ada6a7bf8', 'Conference', 80000, 5, 'a3616180-506f-4dc6-9553-cb54c53f432d', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL),
('4e04a054-6584-45fb-8f9b-d1d81d12c146', 'Reguler', 40000, 4, 'da1fe81a-0667-4f0b-9136-3e85d796cf1f', '2021-01-20 03:40:14', '2021-01-19 20:40:33', NULL),
('72e6f842-010c-42c9-b9ea-97fd6d6c0812', 'Co-Working Space', 20000, 5, '546cde2f-05a1-450c-9252-02e9cd3f86dc', '2021-01-20 03:40:14', '2021-01-19 21:22:20', NULL),
('928189ad-fb53-4130-b54e-aadaa4eecee7', 'Meja 1', 30000, 10, '07aa5c66-f26a-4a59-a12f-78466cf90a7a', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL),
('968a1703-570e-498c-a305-e507393c8a74', '8', 35000, 4, 'a6d73dac-22f9-4244-90f7-3b23f67d226e', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL),
('c6063b4f-5c30-4c69-94d4-33b0a0a396d0', 'Meja Panjang', 40000, 4, '07aa5c66-f26a-4a59-a12f-78466cf90a7a', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL),
('ccf6e420-1df1-45c9-b76d-1e1786feffcc', '2', 15000, 9, 'a6d73dac-22f9-4244-90f7-3b23f67d226e', '2021-01-20 03:40:14', '2021-01-20 03:40:14', NULL);

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
('13a52da0-4c50-4d96-9801-adce4b74be70', 'user@mail.com', 'user1', '$argon2id$v=19$m=65536,t=4,p=1$SHAyLnhaRlBGdzBETmlDMw$ZxTCN5s1Mo9P3xmqxcXU2LESZ5EPHFanWmjkddjtx18', 'User 1', '08888', 1, '2021-01-20 03:09:16', '2021-01-19 20:12:29', NULL),
('8fa0003b-f47d-4bc2-ae54-68d477f70c8f', 'user2@mail.com', 'user2', '$argon2id$v=19$m=65536,t=4,p=1$Ty9yZS85b0JsTjd3VHdaag$r5SzlqovDcZ5AP2jLycxrio0KpzxpiAVQn/JoB4yRKI', 'User 2', '08888', 1, '2021-01-20 03:23:45', '2021-01-19 20:24:47', NULL),
('91b9b5db-166f-4e88-bc79-cee37f9542ef', 'john@doe.com', 'john.doe', '$argon2id$v=19$m=65536,t=4,p=1$NERrVUVUdXhoaHVJTzFFTA$c8VS3t+PuQ1Ojj08p1ETLZeUfMIWhWMeXOtSxD5tIyo', 'John Doe', '085741379968', 1, '2021-01-17 08:24:40', '2021-01-19 20:00:26', NULL),
('95fbb99c-aae4-46ee-b470-49b9dabd1e86', 'hammam.afiq277@gmail.com', 'cloudenum', '$argon2id$v=19$m=65536,t=4,p=1$aUlZb1htUUtxbzhYeGFmdg$WroKXG6bEdNM/HsNoQe0deQN1DilaeAeC+ki1OLYnSo', 'Hammam Afiq Murtadho', '085741379968', 0, '2021-01-20 03:31:31', '2021-01-20 03:31:31', NULL),
('b07dc073-1527-498a-a370-5a48147ea640', 'jane_doe@gmail.com', 'jane_doe', '$argon2id$v=19$m=65536,t=4,p=1$Rm1nc2hCTEh3MUtXLlVCZQ$UiYZkodGhe0Wh5huTJY9zS6tIKEz51/m4Df13CgpZRs', 'Jane Doe', '085739440293', 1, '2021-01-17 10:48:51', '2021-01-19 20:04:47', NULL),
('c4972b60-35c8-471a-8ea4-887236997b49', 'user3@gmail.com', 'user3', '$argon2id$v=19$m=65536,t=4,p=1$M3VZcXMyNGdra29YWWdpRA$4mHmw4zOeS0LCBJqSJJQdCn1UfeoFjKpRc1qRO2EECM', 'User 3', '09992', 1, '2021-01-20 03:27:46', '2021-01-19 20:28:46', NULL);

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
