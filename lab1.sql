-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 12:27 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab1`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` text NOT NULL,
  `food_description` text NOT NULL,
  `food_price` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `status` text NOT NULL DEFAULT 'inorder'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_description`, `food_price`, `file_path`, `status`) VALUES
(1, 'Pilau Kuku', 'Kenyan Pilau and chicken', 130, 'https://i.ytimg.com/vi/M9sR298XFbc/maxresdefault.jpg', 'inorder'),
(2, 'Ugali Nyama', 'Kenyan Ugali and Meat', 300, 'https://www.ippmedia.com/sites/default/files/articles/2016/10/07/ugali-choma.jpg', 'inorder'),
(3, 'KFC 2Piece + Large Chips + 350ml Soda', 'KFC 2Piece Chicken + Large Chips + 350ml Soda(several flavors available)', 400, 'https://pbs.twimg.com/media/EUgmtYBXQAA-B_8.jpg', 'inorder'),
(4, '3 Chapatis + chicken', 'Kenyan chicken +  3 chapatis', 140, 'https://i.pinimg.com/originals/80/b7/88/80b78805c0ed4f3f3528a36c0418d5e6.jpg', 'inorder'),
(5, 'Rice Beans', 'A blend of Kenyan rice and Beans', 150, 'https://www.liveeatlearn.com/wp-content/uploads/2019/02/spanish-rice-beans-vert.jpg', 'inorder');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_no` int(11) NOT NULL,
  `product_array` text NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `status` text NOT NULL DEFAULT 'ordered',
  `shippedBy` text NOT NULL,
  `shippedOn` datetime NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_no`, `product_array`, `customer_id`, `status`, `shippedBy`, `shippedOn`, `date`) VALUES
(1, 'a:3:{i:0;a:5:{s:10:\"product_id\";s:1:\"7\";s:12:\"product_name\";s:10:\"Rice Beans\";s:13:\"product_price\";s:3:\"130\";s:16:\"product_quantity\";s:1:\"1\";s:11:\"description\";N;}i:1;a:5:{s:10:\"product_id\";s:1:\"6\";s:12:\"product_name\";s:17:\"Afia Juice 500 ML\";s:13:\"product_price\";s:3:\"120\";s:16:\"product_quantity\";s:1:\"1\";s:11:\"description\";N;}i:2;a:5:{s:10:\"product_id\";s:1:\"5\";s:12:\"product_name\";s:12:\"KFC 10 Piece\";s:13:\"product_price\";s:4:\"2400\";s:16:\"product_quantity\";s:1:\"3\";s:11:\"description\";N;}}', 'reesalumasa@gmail.com', 'Delivered', '', '2020-07-30 10:12:16', '2020-07-15 11:06:20'),
(2, 'a:2:{i:0;a:4:{s:10:\"product_id\";s:1:\"7\";s:12:\"product_name\";s:10:\"Rice Beans\";s:13:\"product_price\";s:3:\"130\";s:16:\"product_quantity\";s:1:\"1\";}i:1;a:5:{s:10:\"product_id\";s:1:\"6\";s:12:\"product_name\";s:17:\"Afia Juice 500 ML\";s:13:\"product_price\";s:3:\"120\";s:16:\"product_quantity\";s:1:\"1\";s:11:\"description\";N;}}', 'kim@gmail.com', 'Delivered', '', '2020-07-31 22:25:49', '2020-07-31 11:00:21'),
(7, 'a:1:{i:0;a:4:{s:10:\"product_id\";s:1:\"3\";s:12:\"product_name\";s:37:\"KFC 2Piece + Large Chips + 350ml Soda\";s:13:\"product_price\";s:3:\"400\";s:16:\"product_quantity\";s:1:\"1\";}}', 'reesalumasa@gmail.com', 'Placed', '', '0000-00-00 00:00:00', '2020-11-05 13:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_city` text NOT NULL,
  `user_image` text NOT NULL,
  `user_password` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_city`, `user_image`, `user_password`, `date_created`) VALUES
(1, 'Rees Alumasa', 'reesalumasa@gmail.com', 'Nairobi', '1602448427.jpeg', '$2y$10$CcjHht1gfe5JfSCi5xsHqeCKziEO3Eq.20qna9ArpeLMvwGYWldse', '2020-10-11 20:33:47'),
(2, 'Kimberly Kavetsa', 'kimberlykavetsa@gmail.com', 'Nairobi', '1602456648.jpg', '$2y$10$pCAxiY4eTqi.7ickfxMmJu.fPch1Z2Fw91FlQQZBo5S0VSS8G1sNi', '2020-10-11 22:50:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
