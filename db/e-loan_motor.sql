-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 09:27 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-loan_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(4, 'Kwizera', '08bf9a6ad17dcf2d523f8d51bf42b98d');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `identity` varchar(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthyear` varchar(30) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`identity`, `fname`, `lname`, `tel`, `email`, `birthyear`, `username`, `password`) VALUES
('11920993993838', 'Niyonzima', 'Felix', '0730000999', 'felixniyo@gmail.com', '1920', 'Felix', '08bf9a6ad17dcf2d523f8d51bf42b98d'),
('11929883993003', 'Emmizo', 'Kwizera', '078118383', 'emmizokwizera@gmail.com', '1991', 'Emmizo', '08bf9a6ad17dcf2d523f8d51bf42b98d'),
('1196804949885833', 'Uwacu', 'Yves', '07809404994', 'yvesuwacu@gmail.com', '1996', 'Yves', 'a9d13af9ab68f8e72cd864d749bf30de'),
('11968049498858345', 'Rugwiro', 'Edmond', '0780983838', 'rugwiroedmond@gmail.com', '2000', 'Kwizera', '3176bcac8149759657ef655f8903576e');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insuranceID` int(10) NOT NULL,
  `insurance` varchar(40) NOT NULL,
  `percentage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insuranceID`, `insurance`, `percentage`) VALUES
(1, 'SORASI', '15'),
(2, 'BK', '18'),
(14, 'Radiant', '12');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id` int(10) NOT NULL,
  `VIN` varchar(70) NOT NULL,
  `model` varchar(40) NOT NULL,
  `value` int(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id`, `VIN`, `model`, `value`, `status`) VALUES
(1, '09094KT', 'TVS', 2000000, 'Available'),
(2, '09090W4KT', 'BMW', 2360000, 'Taken'),
(3, '455445KLM', 'BMW', 2240000, 'Taken'),
(4, 'K849DKF', 'TVS', 2000000, 'Available'),
(5, '2099KM', 'TVS', 2000000, 'Taken');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `identity2` varchar(20) NOT NULL,
  `VIN2` varchar(70) DEFAULT NULL,
  `payID2` int(10) NOT NULL,
  `insuranceID2` int(10) NOT NULL,
  `paidMoney` double NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `identity2`, `VIN2`, `payID2`, `insuranceID2`, `paidMoney`, `status`) VALUES
(164, '11920993993838', '2099KM', 7, 14, 1999999.9999999998, 'Payment Progress'),
(165, '11920993993838', 'K849DKF', 8, 14, 2333331, 'Paid'),
(194, '11929883993003', '455445KLM', 8, 14, 1300000, 'Payment Progress');

-- --------------------------------------------------------

--
-- Table structure for table `paystarategy`
--

CREATE TABLE `paystarategy` (
  `payID` int(10) NOT NULL,
  `payPeriod` varchar(40) NOT NULL,
  `payValue` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paystarategy`
--

INSERT INTO `paystarategy` (`payID`, `payPeriod`, `payValue`) VALUES
(5, 'Weekly', 104),
(7, 'Monthly', 24),
(8, 'Quarter', 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL,
  `identity2` varchar(30) NOT NULL,
  `VIN2` varchar(30) NOT NULL,
  `transaction_time` varchar(40) NOT NULL,
  `paidMoney` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `identity2`, `VIN2`, `transaction_time`, `paidMoney`) VALUES
(291, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:40', '433333.3333333333'),
(292, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:46', '433333.3333333333'),
(293, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:48', '433333.3333333333'),
(294, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:50', '433333.3333333333'),
(295, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:00', '433333.3333333333'),
(296, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:21', '433333.3333333333'),
(297, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:24', '433333.3333333333'),
(298, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:27', '433333.3333333333'),
(299, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:34', '433333'),
(300, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:38', '433333'),
(301, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:16', '433333'),
(302, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:22', '333333'),
(303, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:30', '333333'),
(304, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:31', '333333'),
(305, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:32', '333333'),
(306, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:33', '333333'),
(307, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:37', '333333'),
(308, '11920993993838', 'K849DKF', 'Tuesday, 2019-07-30, 17:07:06', '333333'),
(309, '11920993993838', 'K849DKF', 'Wednesday, 2019-07-31, 08:07:56', '333333'),
(310, '11920993993838', 'K849DKF', 'Wednesday, 2019-07-31, 08:07:39', '333333'),
(311, '11920993993838', 'K849DKF', 'Wednesday, 2019-07-31, 08:07:43', '333333'),
(312, '11920993993838', 'K849DKF', 'Wednesday, 2019-07-31, 08:07:47', '333333'),
(313, '11920993993838', 'K849DKF', 'Wednesday, 2019-07-31, 08:07:50', '333333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`identity`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insuranceID`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `VIN` (`VIN`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identity2` (`identity2`),
  ADD KEY `identity2_2` (`identity2`),
  ADD KEY `insuranceID2` (`insuranceID2`),
  ADD KEY `payID2` (`payID2`),
  ADD KEY `motorID2` (`VIN2`);

--
-- Indexes for table `paystarategy`
--
ALTER TABLE `paystarategy`
  ADD PRIMARY KEY (`payID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identity2` (`identity2`),
  ADD KEY `VIN2` (`VIN2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insuranceID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `paystarategy`
--
ALTER TABLE `paystarategy`
  MODIFY `payID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`identity2`) REFERENCES `client` (`identity`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`insuranceID2`) REFERENCES `insurance` (`insuranceID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`payID2`) REFERENCES `paystarategy` (`payID`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`VIN2`) REFERENCES `motor` (`VIN`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`identity2`) REFERENCES `client` (`identity`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`VIN2`) REFERENCES `motor` (`VIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
