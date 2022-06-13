-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 03:00 AM
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
-- Database: `eshoppingadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(7) NOT NULL,
  `parent_id` int(7) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `shown_name` varchar(256) NOT NULL,
  `visible` int(1) DEFAULT NULL,
  `path` text DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `title`, `shown_name`, `visible`, `path`, `icon`, `order`, `ts`) VALUES
(1, 0, 'main', '', 0, NULL, 'page.gif', 0, '2014-03-01 01:06:12'),
(2, 1, 'Dashboard', 'Dashboard', 1, '', NULL, 1, '2022-06-11 06:36:01'),
(3, 1, 'Products', 'Products', 1, '', NULL, 0, '2022-06-11 06:36:06'),
(4, 3, 'List', 'List', 1, 'products/index', NULL, 2, '2022-06-11 06:45:23'),
(5, 3, 'Add', 'Add', 1, 'products/add', NULL, 1, '2022-06-11 06:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `thename` varchar(256) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `image` text NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `thename`, `price`, `image`, `stock`) VALUES
(14, 'Blue Shoes 3', '1000.00', 'S1444.jpg', 2000),
(15, 'Flip Flops 3', '200.00', 'DSC01151.JPG', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_idx` (`parent_id`),
  ADD KEY `visible` (`visible`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
