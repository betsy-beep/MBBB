-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.byetcluster.com
-- Generation Time: Jun 20, 2021 at 05:52 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28929474_mbbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookID` int(30) NOT NULL,
  `matricNo` int(30) NOT NULL,
  `room` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `roomCapacity` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookID`, `matricNo`, `room`, `time`, `roomCapacity`, `date`) VALUES
(1, 72676, 'Bilik Rentap', '2pm-5pm', 'max 10', '2021-06-30'),
(2, 72676, 'Bilik Sejinjang', '8am-11am', 'max 20', '2021-06-27'),
(3, 72676, 'Bilik Serapi', '8am-11am', 'max 40', '2021-07-01'),
(4, 72676, 'Bilik Santubong', '8am-11am', 'max 10', '2021-06-23'),
(5, 72676, 'Bilik Rentap', '11am-2pm', 'max 10', '2021-06-29'),
(6, 72676, 'Bilik Sejinjang', '11am-2pm', 'max 20', '2021-06-24'),
(7, 72676, 'Bilik Sejinjang', '11am-2pm', 'max 30', '2021-06-23'),
(8, 72676, 'Bilik Sejinjang', '11am-2pm', 'max 30', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `guestID` int(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Room` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gbooking`
--

CREATE TABLE `gbooking` (
  `bookingID` int(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Room` varchar(50) NOT NULL,
  `guestID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gbooking`
--

INSERT INTO `gbooking` (`bookingID`, `FirstName`, `Time`, `Date`, `Room`, `guestID`) VALUES
(1, 'Nurain', '8am-11am', '2021-06-17', 'Bilik Sejinjang', 1),
(3, 'Anis', '11am-2pm', '2021-06-04', 'Bilik Rentap', 2),
(4, 'SITI HAMIZAH', '11am-2pm', '2021-06-23', 'Bilik Sejinjang', 3),
(5, '', '', '0000-00-00', '', 0),
(6, '', '', '0000-00-00', '', 0),
(7, 'Nurain', '11am-2pm', '2021-06-27', 'Bilik Sejinjang', 1),
(8, 'Siti', '8am-11am', '2021-06-30', 'Bilik Sejinjang', 4),
(9, 'Siti', '7pm-10pm', '2021-06-30', 'Bilik Serapi', 4),
(10, 'Siti', '8am-11am', '2021-06-15', 'Bilik Serapi', 4),
(11, 'Siti', '8am-11am', '2021-06-23', 'Bilik Rentap', 4);

-- --------------------------------------------------------

--
-- Table structure for table `guestregister`
--

CREATE TABLE `guestregister` (
  `guestID` int(255) NOT NULL,
  `ICNumber` varchar(50) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guestregister`
--

INSERT INTO `guestregister` (`guestID`, `ICNumber`, `FirstName`, `LastName`, `Email`, `Mobile`) VALUES
(1, '001116140166', 'Nurain', 'Batrisyia', 'nurainbatrisyia1611@gmail.com', '0102772976'),
(2, '001214140177', 'Anis', 'Shafiqah', 'anis@gmail.com', '0119992833'),
(4, '001127130684', 'Siti', 'Hamizah', 'sitihamizah2711@gmail.com', '0136320727'),
(5, '001223124567', 'Muhammad', 'Rayyan', 'muhammad@gmail.com', '0136320727');

-- --------------------------------------------------------

--
-- Table structure for table `internaluser`
--

CREATE TABLE `internaluser` (
  `userID` int(30) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` int(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `matricNo` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internaluser`
--

INSERT INTO `internaluser` (`userID`, `firstname`, `lastname`, `email`, `phoneNo`, `password`, `confirmPassword`, `matricNo`) VALUES
(1, 'SITI HAMIZAH', 'ZAINUL ABIDIN', 'siti@gmail.com', 136320727, 'Siti@27', 'Siti@27', 72676),
(2, 'Betsy', 'Canteq', 'betsypati30@gmail.com', 1112015009, 'Betsy306!', 'Betsy306!', 72149),
(3, 'Muhammad', 'Rayyan', 'muhammad@gmail.com', 135460786, 'Muhammad11!', 'Muhammad11!', 72333);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(255) NOT NULL,
  `card` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cardno` varchar(50) NOT NULL,
  `expiry` varchar(20) NOT NULL,
  `cvv` int(10) NOT NULL,
  `guestID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `card`, `name`, `cardno`, `expiry`, `cvv`, `guestID`) VALUES
(1, 'credit card', 'Nurain', '1111222233334444', '11/2/2020', 222, 1),
(2, 'paypal', 'Batrisyia', '2222333344445555', '11/2/2020', 123, 1),
(3, 'credit card', 'Anis', '1111222233334444', '11/2/2020', 222, 2),
(4, 'credit card', 'SITI HAMIZAH BINTI ZAINUL ABIDIN', '1111666633335555', '20/06/2020', 334, 3),
(5, 'credit card', 'Nurain', '1111222233334444', '11/02/2022', 345, 1),
(6, 'credit card', 'Siti', '1111222233335555', '12/12/2024', 678, 4),
(7, 'credit card', 'Siti', '1111555566663333', '12/12/2026', 456, 4),
(8, 'credit card', 'Siti', '1111222233334444', '12/12/2024', 456, 4),
(9, 'credit card', 'Siti', '1111222233334444', '12/12/2024', 456, 4);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `guestID` int(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Room` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`guestID`, `FirstName`, `Time`, `Date`, `Room`) VALUES
(4, 'Siti', '8am-11am', '2021-06-22', 'Bilik Rentap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `gbooking`
--
ALTER TABLE `gbooking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `guestregister`
--
ALTER TABLE `guestregister`
  ADD PRIMARY KEY (`guestID`);

--
-- Indexes for table `internaluser`
--
ALTER TABLE `internaluser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gbooking`
--
ALTER TABLE `gbooking`
  MODIFY `bookingID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `guestregister`
--
ALTER TABLE `guestregister`
  MODIFY `guestID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `internaluser`
--
ALTER TABLE `internaluser`
  MODIFY `userID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
