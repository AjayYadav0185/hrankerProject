-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2026 at 10:19 AM
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `product_id`, `user_id`, `order_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 500, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(2, 2, 1, 1200, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(3, 3, 1, 750, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(4, 1, 1, 300, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(5, 2, 1, 950, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(6, 3, 1, 1100, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(7, 1, 1, 450, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(8, 2, 1, 800, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(9, 3, 1, 670, '2026-04-22 09:03:07', '2026-04-22 09:03:07'),
(10, 1, 1, 999, '2026-04-22 09:03:07', '2026-04-22 09:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 50000, '2026-04-22 09:03:12', '2026-04-22 09:03:12'),
(2, 'Mobile Phone', 20000, '2026-04-22 09:03:12', '2026-04-22 09:03:12'),
(3, 'Headphones', 1500, '2026-04-22 09:03:12', '2026-04-22 09:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int NOT NULL,
  `role_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Ajay Yadav', 'ajayretro1@gmail.com', '$2y$10$DdVykdNwP2BgEnY4dihRLeuLNeD7X7aj3QavlsInonWj79i5kLisy', 2147483647, 'admin', '2026-04-22 08:47:51', '2026-04-22 08:47:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
