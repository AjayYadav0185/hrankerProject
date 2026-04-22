-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2026 at 11:42 AM
-- Server version: 8.4.7
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
CREATE TABLE IF NOT EXISTS `order_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `order_amount` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_product_id` (`product_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `product_id`, `user_id`, `order_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 500, '2026-04-01 10:00:00', '2026-04-22 17:05:50'),
(2, 2, 2, 1200, '2026-04-02 11:30:00', '2026-04-22 17:05:50'),
(3, 3, 3, 750, '2026-04-03 09:15:00', '2026-04-22 17:05:50'),
(4, 1, 2, 300, '2026-04-04 14:20:00', '2026-04-22 17:05:50'),
(5, 2, 1, 950, '2026-04-05 16:45:00', '2026-04-22 17:05:50'),
(6, 3, 2, 1100, '2026-04-06 12:10:00', '2026-04-22 17:05:50'),
(7, 1, 3, 450, '2026-04-07 13:25:00', '2026-04-22 17:05:50'),
(8, 2, 1, 800, '2026-04-08 17:40:00', '2026-04-22 17:05:50'),
(9, 3, 2, 670, '2026-04-09 18:00:00', '2026-04-22 17:05:50'),
(10, 1, 1, 999, '2026-04-10 19:30:00', '2026-04-22 17:05:50'),
(11, 2, 3, 1500, '2026-04-11 10:10:00', '2026-04-22 17:05:50'),
(12, 3, 1, 2200, '2026-04-12 11:50:00', '2026-04-22 17:05:50'),
(13, 1, 2, 1300, '2026-04-13 15:00:00', '2026-04-22 17:05:50'),
(14, 2, 3, 1750, '2026-04-14 16:20:00', '2026-04-22 17:05:50'),
(15, 3, 1, 2100, '2026-04-15 17:35:00', '2026-04-22 17:05:50'),
(16, 2, 5, 20000, '2026-04-22 17:11:48', '2026-04-22 17:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 50000, '2026-04-22 17:05:27', '2026-04-22 17:05:27'),
(2, 'Mobile Phone', 20000, '2026-04-22 17:05:27', '2026-04-22 17:05:27'),
(3, 'Headphones', 1500, '2026-04-22 17:05:27', '2026-04-22 17:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  `role_type` varchar(50) DEFAULT 'admin',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Ajay Yadav', 'ajay@gmail.com', '$2y$10$627EdgkpdjhaXb2zf4pBDuDFZ07IpC93uWDg5wFSsgc6Vnb2Rmuda', 8802929823, 'admin', '2026-04-22 17:05:46', '2026-04-22 17:09:07'),
(2, 'Ravi Kumar', 'ravi@gmail.com', '$2y$10$627EdgkpdjhaXb2zf4pBDuDFZ07IpC93uWDg5wFSsgc6Vnb2Rmuda', 8029298823, 'employee', '2026-04-22 17:05:46', '2026-04-22 17:09:02'),
(3, 'Neha Sharma', 'neha@gmail.com', '$2y$10$627EdgkpdjhaXb2zf4pBDuDFZ07IpC93uWDg5wFSsgc6Vnb2Rmuda', 8802929882, 'employee', '2026-04-22 17:05:46', '2026-04-22 17:08:51'),
(4, 'Ajay Yadav', 'ajayretro1@gmail.com', '$2y$10$627EdgkpdjhaXb2zf4pBDuDFZ07IpC93uWDg5wFSsgc6Vnb2Rmuda', 8802929885, 'admin', '2026-04-22 17:08:10', '2026-04-22 17:09:12'),
(5, 'Ajay Yadav', 'ajayretro2@gmail.com', '$2y$10$W7RyA859yGKUN1VYq9I14uavfNtCkzkvQAVOyJaMvgwi/9tPIMvb2', 8802982992, 'employee', '2026-04-22 17:11:31', '2026-04-22 17:11:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
