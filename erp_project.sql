-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 07:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customers` int(11) NOT NULL,
  `name` varchar(180) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addres` varchar(180) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customers`, `name`, `phone`, `addres`) VALUES
(2, 'حمزة خالد الترامسي', '01556070001', 'شصةيلاصواشي'),
(3, 'hamzabkmh', '4565', 'ملوي بلد البشاوات');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `type_products` varchar(110) NOT NULL,
  `contaty` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `purchasing_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `id_stor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `name`, `type_products`, `contaty`, `id_supplier`, `purchasing_price`, `selling_price`, `id_stor`) VALUES
(10, 'yyy', 'yyyyyy', 29, 7, 19, 20, 1),
(11, 'تونة', 'معلبات', 16, 7, 15, 20, 2),
(12, 'تونة', 'معلبات', 36, 7, 20, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_sala`
--

CREATE TABLE `products_sala` (
  `id_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id_purchases` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `datee` date NOT NULL,
  `madfo` int(11) NOT NULL,
  `baky` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `contty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id_purchases`, `id_supplier`, `datee`, `madfo`, `baky`, `id_products`, `contty`) VALUES
(2, 7, '2022-04-17', 20, 0, 10, 50),
(3, 7, '2022-04-17', 15, 15, 11, 30),
(4, 7, '2022-04-17', 15, 15, 12, 50);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id_receipt` int(11) NOT NULL,
  `receipt_date` date NOT NULL,
  `receipt_Values` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `id_usar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id_receipt`, `receipt_date`, `receipt_Values`, `id_customers`, `id_usar`) VALUES
(4, '2022-04-17', 40, 2, 8),
(5, '2022-04-17', 40, 2, 8),
(6, '2022-04-17', 40, 0, 8),
(7, '2022-04-17', 40, 0, 8),
(8, '2022-04-17', 40, 2, 8),
(9, '2022-04-17', 40, 2, 8),
(10, '2022-04-17', 450, 2, 8),
(11, '2022-04-17', 360, 2, 8),
(12, '2022-04-17', 320, 2, 8),
(13, '2022-04-18', 40, 2, 0),
(14, '2022-04-18', 40, 2, 0),
(15, '2022-04-18', 65, 2, 0),
(16, '2022-04-18', 45, 2, 0),
(17, '2022-04-18', 65, 2, 0),
(18, '2022-04-18', 65, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_products`
--

CREATE TABLE `receipt_products` (
  `id_receipt` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `contty` int(11) NOT NULL,
  `egmaly_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt_products`
--

INSERT INTO `receipt_products` (`id_receipt`, `id_products`, `contty`, `egmaly_price`) VALUES
(17, 10, 1, 25),
(17, 11, 1, 20),
(17, 12, 1, 20),
(18, 10, 1, 25),
(18, 11, 1, 20),
(18, 12, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id_stores` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id_stores`, `name`) VALUES
(1, 'معلبات'),
(2, 'سمهان'),
(3, 'سمهان');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_Suppliers` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `Addresses` varchar(180) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_Suppliers`, `name`, `Addresses`, `phone`) VALUES
(7, 'hamzabkmh', 'ملوي بلد البشاوات', '01556070001'),
(6, 'تونة', 'ملوي بلد البشاوات', '01556070001');

-- --------------------------------------------------------

--
-- Table structure for table `usar`
--

CREATE TABLE `usar` (
  `id_usar` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `addres` varchar(180) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `postoin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usar`
--

INSERT INTO `usar` (`id_usar`, `name`, `phone`, `addres`, `pass`, `email`, `postoin`) VALUES
(8, 'حمزة خالد الترامسي', '01556070001', 'ملوي بلد البشاوات', '01556070001', 'hamzaaltaramsi@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Indexes for table `products_sala`
--
ALTER TABLE `products_sala`
  ADD PRIMARY KEY (`id_products`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchases`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id_receipt`);

--
-- Indexes for table `receipt_products`
--
ALTER TABLE `receipt_products`
  ADD PRIMARY KEY (`id_receipt`,`id_products`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id_stores`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_Suppliers`);

--
-- Indexes for table `usar`
--
ALTER TABLE `usar`
  ADD PRIMARY KEY (`id_usar`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchases` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_receipt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id_stores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_Suppliers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usar`
--
ALTER TABLE `usar`
  MODIFY `id_usar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
