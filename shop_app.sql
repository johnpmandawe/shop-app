-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 08:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pword`) VALUES
(1, 'admin', 'nimda321');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quant` int(11) NOT NULL,
  `total` float NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkbtn`
--

CREATE TABLE `checkbtn` (
  `check_id` int(11) NOT NULL,
  `check_name` varchar(255) NOT NULL,
  `checked` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkbtn`
--

INSERT INTO `checkbtn` (`check_id`, `check_name`, `checked`) VALUES
(1, 'Group By Shops\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cont` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `blocked` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `trans_code` int(50) NOT NULL,
  `size` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `quant` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `img`, `name`, `size`, `stock`, `price`, `seller_id`) VALUES
(19, '1651475491img4.jpg', 'BB T-Shirt Black', 'Extra Small, Small, Medium, Large, Extra Large\n', 11, 1400, 5562),
(20, '1651478984img5.jpg', 'BB T-Shirt White', 'Extra Small, Small, Medium, Large, Extra Large', 15, 1500, 5562),
(21, '1651479270img1.jpg', 'IP Tshirt White', 'Extra Small, Small, Medium, Large, Extra Large\n', 15, 700, 1033),
(22, '1651479494img5.jpg', 'IP Tshirt Black', 'Extra Small, Small, Medium, Large, Extra Large\n', 15, 600, 1033),
(23, '1651479568img1.jpg', 'MH Tshirt White', 'Extra Small, Small, Medium, Large, Extra Large\n', 15, 650, 9856),
(24, '1651479622img5.jpg', 'MH Tshirt Black', 'Extra Small, Small, Medium, Large, Extra Large\n', 15, 500, 9856),
(25, '1651479665img1.jpg', 'EC Tshirt White', 'Extra Small, Small, Medium, Large, Extra Large\n', 15, 700, 6530),
(26, '1651479696img4.jpg', 'EC Tshirt Black', 'Extra Small, Small, Medium, Large, Extra Large\n', 15, 800, 6530);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `seller_logo` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cont` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `blocked` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `seller_logo`, `fname`, `mname`, `lname`, `gender`, `email`, `cont`, `address`, `uname`, `pword`, `blocked`) VALUES
(1033, '1651411381logo.jpg', 'Ilonggo Pride', 'IP', 'IP', 'Male', 'ip@gmail.com', '09786555432', 'Iloilo City', 'ipbusiness', 'ipbusiness1234', '0'),
(5562, '1651412342img2.jpg', 'Bones and Bandanas', 'BB', 'BB', 'Male', 'bb@gmail.com', '09075333532', 'Iloilo City', 'bbbusiness', 'bbbusiness1234', '0'),
(6530, '1651411306logo.jpg', 'Enzo Co. ', 'EC', 'EC', 'Male', 'ec@gmail.com', '09569946511', 'Iloilo City', 'ecbusiness', 'ecbusiness1234', '0'),
(8752, 'logo.png', 'Seller', 'Seller', 'Seller', 'Male', 'seller@gmail.com', '09898788877', 'San Miguel', 'seller', 'seller1234', '1'),
(9856, '1651411427Logo.jpg', 'Money Haze', 'MH', 'MH', 'Male', 'mh@gmail.com', '09569946511', 'Iloilo City', 'mhbusiness', 'mhbusiness1234', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `checkbtn`
--
ALTER TABLE `checkbtn`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `seller_id_2` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `checkbtn`
--
ALTER TABLE `checkbtn`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
