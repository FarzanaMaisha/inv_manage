-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 09:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`code`, `name`, `unit`, `price`, `total`) VALUES
(1001, 'asus zenbook 1020', 2, 70000, 140000),
(1002, 'Corsair HS50 pro', 1, 4500, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `hsb15`
--

CREATE TABLE `hsb15` (
  `customer_name` varchar(20) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `unit` varchar(8) NOT NULL,
  `sellingprice` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL,
  `sellingdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maisha98`
--

CREATE TABLE `maisha98` (
  `customer_name` varchar(20) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `unit` varchar(8) NOT NULL,
  `sellingprice` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL,
  `sellingdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productinformation`
--

CREATE TABLE `productinformation` (
  `code` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `costprice` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `sellingprice` int(11) NOT NULL,
  `purchasedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productinformation`
--

INSERT INTO `productinformation` (`code`, `model`, `brand`, `costprice`, `unit`, `sellingprice`, `purchasedate`) VALUES
('1001', 'zenbook 1020', 'asus', 65000, 20, 70000, '2021-09-07'),
('1002', 'HS50 pro', 'Corsair', 4000, 200, 4500, '2021-06-17'),
('1003', 'viper mini', 'Razer', 2000, 150, 2200, '2021-12-08'),
('1004', '32 inch tv', 'Walton', 30000, 6, 45000, '2021-08-27'),
('1006', 'X7', 'Firebase', 4000, 10, 4500, '2021-11-24'),
('1007', 'v500pro', 'Rapoo', 3000, 2, 3500, '2021-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `username`, `password`, `email`, `address`, `mobile`, `date_of_birth`, `gender`) VALUES
('Hardware', 'Sentinels', 'hsb15', 'hardSenti18', 'hardwaresentinels@gmail.com', '220 East Goran, Khilgoan', '+8801615782292', '1996-10-16', 'Male'),
('Maisha', 'Farzana', 'maisha98', 'Maisha98', 'fmaisha98@gmail.com', '31, 31/A New Eskaton, Biam Road, Flat B2, Rashid V', '+8801777165546', '1998-01-12', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `productinformation`
--
ALTER TABLE `productinformation`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`,`email`,`mobile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
