-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 06:29 AM
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
(2, 'เจมส์ จริงนะ', '1234', '123@123.com', 'sohojfgjrgopijwrgjworjgwrg\r\n', '1234123123', 'delivery'),
(3, 'ทาอิน ทาอิน', 'ๅ/-ภ', 'bank@bank.com', 'กรุณาเพิ่มที่อยู่', '1234123123', 'member'),
(5, '123', '1234', '222@222.com', 'กรุณาเพิ่มที่อยู่', '123', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `order_key` text NOT NULL,
  `delivery_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `order_id`, `order_key`, `delivery_name`) VALUES
(1, 1, 'E1msk3nIeKfqJc5', 'เจมส์ จริงนะ'),
(2, 2, '03ys6N7QXhI8KE4', 'เจมส์ จริงนะ'),
(3, 6, 'jlI8UQbrf6stTop', 'เจมส์ จริงนะ');

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
  `order_track` text NOT NULL,
  `order_shiping` text NOT NULL,
  `order_rider` text NOT NULL,
  `order_rider_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_name`, `order_address`, `order_email`, `order_tal`, `order_key`, `status`, `order_track`, `order_shiping`, `order_rider`, `order_rider_id`) VALUES
(1, '2022-03-03 04:53:15', 'เจมส์ จริงนะ', 'sohojfgjrgopijwrgjworjgwrg\r\n', '123@123.com', '1234123123', 'E1msk3nIeKfqJc5', 'สำเร็จแล้ว', '', 'เดลิเวอรี้', 'เจมส์ จริงนะ', 2),
(2, '2022-03-03 07:47:59', 'เจมส์ จริงนะ', 'sohojfgjrgopijwrgjworjgwrg\r\n', '123@123.com', '1234123123', '03ys6N7QXhI8KE4', 'สำเร็จแล้ว', '', 'เดลิเวอรี้', 'เจมส์ จริงนะ', 2),
(3, '2022-03-05 03:52:43', 'ADMIN', 'no detail', 'asd@asd.com', 'no detail', 'EgNYBJ2AW03RlaK', 'สำเร็จ', '333', 'บริษัทขนส่ง', '', 0),
(4, '2022-03-05 07:21:24', 'ทาอิน ทาอิน', '16/2', 'bank@bank.com', '1234123123', 'DAgzaTLlxIVfcmP', 'รอชำระเงิน', '', 'บริษัทขนส่ง', '', 0),
(5, '2022-03-05 07:31:27', 'ADMIN', 'no detail', 'asd@asd.com', 'no detail', 'wtQMsCnBHVP13qJ', 'สำเร็จ', 'ภภภภ', 'บริษัทขนส่ง', '', 0),
(6, '2022-03-05 07:41:14', 'ADMIN', 'no detail', 'asd@asd.com', 'no detail', 'jlI8UQbrf6stTop', 'พนักงานรับออเดอร์แล้ว', '', 'เดลิเวอรี้', 'เจมส์ จริงนะ', 2),
(7, '2022-03-05 11:39:38', 'เจมส์ จริงนะ', 'sohojfgjrgopijwrgjworjgwrg\r\n', '123@123.com', '1234123123', 'k0TprF9XNq5xOwn', 'รอชำระเงิน', '', 'บริษัทขนส่ง', '', 0);

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

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`detail_id`, `order_id`, `pro_id`, `qty`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 2, 1),
(7, 7, 2, 1);

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

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_date`, `pay_name`, `pay_bank`, `order_key`, `pay_status`, `pay_img`) VALUES
(1, '2022-03-05 09:53:00', 'd23234234234', '2', 'EgNYBJ2AW03RlaK', 'สำเร็จ', 'payment/temp/87b92d0916e6fd9b920cec6e3435d9e0.png'),
(2, '2022-03-05 13:33:00', 'Theerapong', 'กรุงไทย', 'wtQMsCnBHVP13qJ', 'สำเร็จ', 'payment/temp/f100c8bb6f808f14f4aec2d1b5c03d5b.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(5) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_price` text NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_image` text NOT NULL,
  `pro_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_detail`, `pro_image`, `pro_type`) VALUES
(1, 'กาแฟสด', '100', '  ', ' dist/img/product/ce07d2636ed31ec9295ab78ca5962083.png', 'เครื่องดื่ม'),
(2, 'เมล็ดกาแฟ', '350', ' เมล็ดกาแฟจากภาคเหนือ ', ' dist/img/product/c13aadcfd4f9354bef81573627e76ed1.png', 'เมล็ดกาแฟ'),
(3, 'แก้วกาแฟ Yeti', '650', ' Yeti ', ' dist/img/product/cfba4dce8d6862c7d13b8f56597efaa8.jpg', 'แก้วกาแฟ');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `pro_id` int(5) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_detail` longtext NOT NULL,
  `pro_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pro_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`pro_id`, `pro_name`, `pro_detail`, `pro_date`, `pro_img`) VALUES
(5, 'fadfadfadsfadfadfasdfas', ' dfasdfasdfasdfasdfasdfsdf ', '2022-03-03 02:33:42', ' promotion/img/59314ba327252867698a35e4f7f5c3e5.jpg'),
(6, 'sadfadfsfas', ' dfadsfasfasdfasdf ', '2022-03-03 02:33:51', ' promotion/img/6c1a1ba3f856e7ed054094fb780f3913.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
