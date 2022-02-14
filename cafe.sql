-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 03:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(5) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_password` varchar(255) NOT NULL,
  `acc_email` varchar(255) NOT NULL,
  `acc_address` varchar(255) NOT NULL,
  `acc_phone` varchar(255) NOT NULL,
  `acc_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_name`, `acc_password`, `acc_email`, `acc_address`, `acc_phone`, `acc_status`) VALUES
(1, 'ADMIN', '1234', 'asd@asd.com', 'no detail', 'no detail', 'admin'),
(2, 'เจมส์ จริงนะ', '1234', '123@123.com', 'sohojfgjrgopijwrgjworjgwrg\r\n', '1234123123', 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_name` text NOT NULL,
  `order_address` text NOT NULL,
  `order_email` text NOT NULL,
  `order_tal` text NOT NULL,
  `order_key` text NOT NULL,
  `status` text NOT NULL,
  `order_track` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `detail_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(5) NOT NULL,
  `pay_date` datetime NOT NULL,
  `pay_name` text NOT NULL,
  `pay_bank` text NOT NULL,
  `order_key` text NOT NULL,
  `pay_status` text NOT NULL,
  `pay_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(5) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_price` text NOT NULL,
  `pro_size` text NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_image` text NOT NULL,
  `pro_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_size`, `pro_detail`, `pro_image`, `pro_type`) VALUES
(1, 'asdasd', '2222', '', ' 32322323 ', ' dist/img/product/4032bdaeb4ce1b3e684c9e9447311a3e.jpg', 'เครื่องดื่ม');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
