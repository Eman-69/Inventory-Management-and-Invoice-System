-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 09:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electra`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `pid` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `baseprice` float NOT NULL,
  `gst` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`pid`, `brand`, `model`, `category`, `quantity`, `baseprice`, `gst`) VALUES
('applemb1tb', 'Apple', 'Macbook', 'Laptop', 5, 128000, 28),
('hppav15i5', 'HP', 'Pavilion', 'Laptop', 20, 64000, 28),
('lenid15i5', 'Lenovo', 'Ideapad', 'Laptop', 11, 64000, 28),
('sonytv32hd', 'SONY', 'Bravia', 'Television', 48, 38400, 28),
('sonyxp4gb16gb', 'SONY', 'XPERIA', 'SMARTPHONE', 0, 11800, 18);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `slno` int(11) NOT NULL,
  `invno` int(11) NOT NULL,
  `invdate` date NOT NULL,
  `pid` varchar(256) NOT NULL,
  `distributorname` varchar(256) NOT NULL,
  `quantity` int(10) NOT NULL,
  `totalprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`slno`, `invno`, `invdate`, `pid`, `distributorname`, `quantity`, `totalprice`) VALUES
(41, 111, '2022-12-16', 'sonyxp4gb16gb', 'APPRIO Pvt Ltd', 10, 118000),
(42, 112, '2022-12-16', 'sonytv32hd', 'ASton TEch', 50, 1920000),
(43, 113, '2022-12-16', 'sonytv32hd', 'APPRIO Pvt Ltd', 8, 307200),
(44, 114, '2022-12-16', 'sonyxp4gb16gb', 'ASton TEch', 9, 106200),
(45, 115, '2022-12-16', 'sonyxp4gb16gb', 'APPRIO Pvt Ltd', 5, 59000),
(46, 116, '2022-12-16', 'sonyxp4gb16gb', 'APPRIO Pvt Ltd', 2, 23600),
(47, 120, '2022-12-17', 'hppav15i5', 'Chintan Pvt Ltd', 20, 1280000),
(48, 121, '2022-12-17', 'applemb1tb', 'Chintan Pvt Ltd', 5, 640000),
(49, 130, '2022-12-17', 'lenid15i5', 'AMogh Pvt LTd', 14, 896000),
(50, 1111, '2022-12-20', 'sonytv32hd', 'Apprio', 12, 184320);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `slno` int(11) NOT NULL,
  `invno` int(10) NOT NULL,
  `invdate` date NOT NULL,
  `customername` varchar(256) NOT NULL,
  `pid` varchar(256) NOT NULL,
  `quantity` int(10) NOT NULL,
  `mrp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`slno`, `invno`, `invdate`, `customername`, `pid`, `quantity`, `mrp`) VALUES
(1, 11111, '2022-12-17', 'ASton', 'sonytv32hd', 10, 491520),
(2, 11112, '2022-12-17', 'Tushar', 'sonytv32hd', 5, 245760),
(3, 11117, '2022-12-17', 'Chintan', 'sonytv32hd', 5, 245760),
(4, 11120, '2022-12-17', 'John', 'sonytv32hd', 2, 98304),
(5, 11131, '2022-12-17', 'Tushar', 'lenid15i5', 3, 245760);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(256) NOT NULL,
  `slno` int(11) NOT NULL,
  `position` int(10) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `slno`, `position`, `phone`, `email`, `password`) VALUES
('Emmanuel Joshy', 8, 2, 9900561034, 'emmanuelpoulose@gmail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD UNIQUE KEY `slno` (`slno`),
  ADD KEY `purchase_ibfk_1` (`pid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `sales_ibfk_1` (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `inventory` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `inventory` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
