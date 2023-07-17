-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 03:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iskotogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_price` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `item_availability` tinyint(1) NOT NULL,
  `item_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `store_id`, `item_name`, `item_price`, `inventory`, `item_availability`, `item_image`) VALUES
(1, 2, 'burgir', 75, 10, 1, ''),
(2, 1, 'prech price', 55, 9, 1, ''),
(3, 1, 'spaghetti', 30, 10, 1, ''),
(4, 1, 'carbonara', 35, 8, 1, ''),
(5, 1, 'pansit', 40, 10, 1, ''),
(6, 1, 'chicken pesto', 69, 10, 1, ''),
(8, 2, 'coke', 10, 10, 1, ''),
(9, 2, 'pepsi', 12, 10, 1, ''),
(10, 2, 'root beer', 15, 10, 1, ''),
(11, 2, 'mountain dew', 17, 10, 1, ''),
(12, 2, 'sprite', 19, 10, 1, ''),
(13, 5, 'tokwa', 7, 10, 1, ''),
(14, 5, 'baboy', 5, 10, 1, ''),
(15, 5, 'lugaw', 12, 10, 1, ''),
(16, 5, 'goto', 15, 10, 1, ''),
(17, 5, 'lumpiang toge', 15, 10, 1, ''),
(18, 6, 'kikyam', 2, 10, 1, ''),
(19, 6, 'fish ball', 1, 10, 1, ''),
(20, 6, 'kwek-kwek', 16, 10, 1, ''),
(21, 6, 'isaw', 12, 10, 1, ''),
(22, 6, 'tokneneng', 12, 10, 1, ''),
(23, 7, 'banana q', 15, 10, 1, ''),
(24, 7, 'camote q', 15, 10, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `order_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `item_id`, `store_id`, `customer_id`, `quantity`, `date`, `order_status`) VALUES
(1, 2, 1, 4, 2, '2023-06-16 02:04:36', 1),
(2, 8, 2, 4, 1, '2023-06-16 02:04:36', 1),
(3, 13, 5, 12, 5, '2023-06-16 04:55:58', 1),
(4, 19, 6, 4, 7, '2023-06-16 04:59:08', 0),
(6, 4, 1, 6, 1, '2023-07-11 22:53:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stores`
--

CREATE TABLE `tbl_stores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Contact` varchar(100) DEFAULT NULL,
  `Likes` bigint(20) DEFAULT NULL,
  `store_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stores`
--

INSERT INTO `tbl_stores` (`id`, `user_id`, `store_name`, `Location`, `Contact`, `Likes`, `store_image`) VALUES
(1, 12, 'Jabee', 'PUP Main Lagoon', '', NULL, 'images/users/6-image.jpg'),
(2, 7, 'mackdo', 'PUP Main Lagoon', NULL, NULL, NULL),
(5, 6, 'FFC', 'PUP Main Bldg. Lagoon', NULL, NULL, NULL),
(6, 8, 'manang isaw', 'PUP Main Bldg. Lagoon', NULL, NULL, NULL),
(7, 4, 'bandoks', 'PUP Main Bldg. Lagoon', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Middle_name` varchar(30) DEFAULT NULL,
  `User_Name` varchar(30) NOT NULL,
  `student_id` varchar(15) DEFAULT NULL,
  `user_type` int(1) NOT NULL,
  `password` int(30) NOT NULL,
  `section` varchar(9) DEFAULT NULL,
  `user_profile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `Last_Name`, `First_Name`, `Middle_name`, `User_Name`, `student_id`, `user_type`, `password`, `section`, `user_profile`) VALUES
(4, 'Ledesma', 'Jeriel', 'Esquierdo', '2020-02417-MN-0', '2020-02417-MN-0', 2, 1234, NULL, 'images/users/4-image.jpg'),
(6, 'Capili', 'Mia Carryl', 'Valentino', '2020-02405-MN-0', '2020-02405-MN-0', 2, 1234, NULL, 'images/users/6-image.jpg'),
(7, 'Cruz', 'Marielle Nicole', 'Hayag', '2020-02278-MN-0', '2020-02278-MN-0', 2, 1234, NULL, NULL),
(8, 'Silva', 'Matthew Jericho', 'Pangilinan', '2020-01973-MN-0', '2020-01973-MN-0', 2, 1234, NULL, NULL),
(11, 'Doe', 'John', NULL, 'Admin', NULL, 1, 1111, NULL, NULL),
(12, 'Pontillas', 'Harvy', NULL, 'Developer', NULL, 1, 2222, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `user_type_num` int(5) NOT NULL,
  `user_type_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`user_type_num`, `user_type_category`) VALUES
(1, 'Vendor'),
(2, 'Customer'),
(3, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`,`store_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD KEY `user_type_num` (`user_type_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `tbl_menu_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `tbl_stores` (`id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_menu` (`id`),
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `tbl_stores` (`id`);

--
-- Constraints for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD CONSTRAINT `tbl_stores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `tbl_usertype` (`user_type_num`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
