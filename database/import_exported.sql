-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 06:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `description`) VALUES
(1, 'supplement', 'powders');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cemail` varchar(30) NOT NULL,
  `cphone` varchar(10) NOT NULL,
  `mes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `cname`, `cemail`, `cphone`, `mes`) VALUES
(2, 'ravi', 'ravi@gmail.com', '1023265645', 'adasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `membertype` varchar(50) NOT NULL,
  `cardno` varchar(50) NOT NULL,
  `expdate` varchar(10) NOT NULL,
  `cvv` int(5) NOT NULL,
  `trainer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `userid`, `username`, `membertype`, `cardno`, `expdate`, `cvv`, `trainer`) VALUES
(12, 5, 'virat', 'membersilver', '12345678999', '2022-08', 123, 'ravi'),
(13, 4, 'sathish', 'membergold', '1234567899957', '2022-08', 123, 'sathish');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pdesc` varchar(30) NOT NULL,
  `price` int(15) NOT NULL,
  `cardnumber` int(15) NOT NULL,
  `expirydate` varchar(20) NOT NULL,
  `cvvnumber` int(10) NOT NULL,
  `deliveryaddress` varchar(50) NOT NULL,
  `pstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `pid`, `userid`, `pname`, `pdesc`, `price`, `cardnumber`, `expirydate`, `cvvnumber`, `deliveryaddress`, `pstatus`) VALUES
(13, 1, 2, 'whey protien', 'asdsadsa', 899, 2147483647, '2022-07', 123, 'asd', 'canceled'),
(14, 2, 2, 'asd', 'fgdfgd', 133, 2147483647, '2022-12', 123, 'asd', 'canceled'),
(15, 2, 2, 'asd', 'fgdfgd', 133, 2147483647, '2022-07', 123, 'asd', 'canceled'),
(16, 2, 5, 'asd', 'fgdfgd', 133, 1235465789, '2024-06', 123, 'delhi', 'delivered'),
(17, 1, 2, 'whey protien', 'asdsadsa', 899, 2147483647, '2026-05', 123, 'asd', 'shipped'),
(18, 1, 2, 'whey protien', 'asdsadsa', 899, 2147483647, '2022-06', 123, 'asd', 'shipped'),
(19, 1, 2, 'whey protien', 'asdsadsa', 899, 2147483647, '2022-10', 123, 'asd', 'shipped'),
(20, 1, 2, 'whey protien', 'asdsadsa', 899, 2147483647, '2022-08', 123, 'asd', 'shipped'),
(21, 2, 2, 'asd', 'fgdfgd', 133, 2147483647, '2024-02', 123, 'asd', 'shipped'),
(22, 2, 2, 'asd', 'fgdfgd', 133, 54589787, '2022-07', 123, 'asd', 'shipped'),
(23, 2, 2, 'asd', 'fgdfgd', 133, 2147483647, '2022-07', 123, 'asd', 'shipped'),
(24, 1, 2, 'whey protien', 'asdsadsa', 899, 2147483647, '2022-08', 123, 'asd', 'shipped'),
(25, 2, 2, 'asd', 'fgdfgd', 133, 879846541, '2022-08', 123, 'asd', 'shipped');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `disc` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `price`, `qty`, `category`, `disc`, `images`) VALUES
(1, 'whey protien', 899, 21, 'supplement', 'asdsadsa', '../product_images_uploaded/Screenshot (253).png'),
(2, 'asd', 133, 58, 'supplement', 'fgdfgd', '../product_images_uploaded/ravi_photo_300px.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `trainerid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `dob`, `phone`, `address`, `pass`, `usertype`, `trainerid`) VALUES
(1, 'admin', 'admin@gmail.com', '09/08/2001', '1234567890', 'madurai', 'admin', 'admin', NULL),
(2, 'ravi', 'ravi@gmail.com', '2022-05-19', '1234567890', 'asd', 'asd', 'user', NULL),
(3, 'ravi', 'ra@gmail.com', '2022-06-01', '1234568799', 'asdasd', 'asd', 'trainer', 1),
(4, 'sathish', 'sathish@gmail.com', '2022-06-10', '1234567890', 'asdasd', 'asd', 'user', NULL),
(5, 'virat', 'virat@gmail.com', '2022-06-02', '8015823119', 'delhi', 'asd', 'user', NULL),
(6, 'sathish', 'sat@gmail.com', '2022-06-07', '1234568799', 'madurai', 'asd', 'trainer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `qty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `pid`, `pname`, `qty`) VALUES
(1, 1, 'whey protien', 3),
(2, 2, 'asd', 4);

-- --------------------------------------------------------

--
-- Table structure for table `trackcalories`
--

CREATE TABLE `trackcalories` (
  `id` int(10) NOT NULL,
  `foodname` varchar(50) NOT NULL,
  `calories` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trackcalories`
--

INSERT INTO `trackcalories` (`id`, `foodname`, `calories`) VALUES
(1, 'idly', 8),
(2, 'dosa', 10),
(3, 'pongal', 5),
(4, 'vadai', 13);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(10) NOT NULL,
  `tname` varchar(30) NOT NULL,
  `tage` int(100) NOT NULL,
  `tmobile` varchar(15) NOT NULL,
  `temail` varchar(30) NOT NULL,
  `taddress` varchar(50) NOT NULL,
  `texp` int(30) NOT NULL,
  `tpass` varchar(30) NOT NULL,
  `trainertype` varchar(20) NOT NULL,
  `salary` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `tname`, `tage`, `tmobile`, `temail`, `taddress`, `texp`, `tpass`, `trainertype`, `salary`) VALUES
(1, 'ravi', 25, '1234568799', 'ra@gmail.com', 'asdasd', 2, 'asd', 'trainer', 3000),
(2, 'sathish', 25, '1234568799', 'sat@gmail.com', 'madurai', 3, 'asd', 'trainer', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `trackcalories`
--
ALTER TABLE `trackcalories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trackcalories`
--
ALTER TABLE `trackcalories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
