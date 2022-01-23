-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.byetcluster.com
-- Generation Time: Jun 20, 2021 at 05:53 AM
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
-- Database: `epiz_28929474_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_booking`
--

CREATE TABLE `admin_booking` (
  `username` varchar(30) NOT NULL,
  `bookingtype` tinytext NOT NULL,
  `bookingdate` date NOT NULL,
  `bookingtime` tinytext NOT NULL,
  `bookingcapacity` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_booking`
--

INSERT INTO `admin_booking` (`username`, `bookingtype`, `bookingdate`, `bookingtime`, `bookingcapacity`) VALUES
('meera', 'Bilik Santubong', '2021-06-23', '18:00', '40'),
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('Qeera', 'Bilik Santubong', '2021-06-16', '08:00', '30'),
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('Raisha', 'Bilik Serapi', '2021-06-17', '7.00pm-10pm', '50');

-- --------------------------------------------------------

--
-- Table structure for table `admin_transaction`
--

CREATE TABLE `admin_transaction` (
  `bookingid` int(30) NOT NULL,
  `transactiondate` date NOT NULL,
  `transactiontime` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_transaction`
--

INSERT INTO `admin_transaction` (`bookingid`, `transactiondate`, `transactiontime`) VALUES
(4568, '2021-06-22', '11.00'),
(3691, '2021-06-30', '12:00'),
(5428, '2021-06-30', '2.00pm-5.00pm'),
(9837, '2021-06-20', '3.00pm-5.00pm'),
(7896, '2021-07-06', '2.00pm-5.00pm');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `userID` int(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `icnumber` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` int(30) NOT NULL,
  `inpassword` varchar(255) NOT NULL,
  `confpassword` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`userID`, `username`, `firstname`, `lastname`, `icnumber`, `email`, `phonenumber`, `inpassword`, `confpassword`) VALUES
(1, '', 'Nur', 'Afiffa', 120132556, 'nurafiffa@gmail.com', 112542698, 'Cv32()', 'Cv32()'),
(13, '', 'Nur', 'Afiffa', 120132556, 'nurafiffa@gmail.com', 112542698, 'Cv32()', 'Cv32()'),
(19, '', 'Nur', 'Afiffa', 120132556, 'nurafiffa@gmail.com', 112542698, 'Cv32()', 'Cv32()'),
(20, '', 'Nur', 'Afiffa', 120132556, 'nurafiffa@gmail.com', 112542698, 'Cv32()', 'Cv32()'),
(22, 'Fara', 'Iman', 'Farah', 214131225, 'imfara@gmail.com', 124569875, 'Mn65()', 'Mn65()'),
(29, 'Afiq', 'Afiq', 'Zainudin', 210131226, 'zaifiq@gmail.com', 132523123, 'Yui78*', 'Yui78*'),
(30, 'Ikmal', 'Muhd', 'Ikmal', 120131226, 'muikmal@gmail.com', 132521232, '@#As12', '@#As12'),
(31, 'Bat', 'Nurain', 'Batrisyia', 210131246, 'nbatrisyia@gmail.com', 102772976, 'B@*b02', 'B@*b02'),
(33, 'Bet', 'Betsy', 'Pati', 512134556, 'betsypati@gmail.com', 189668426, 'Bh12()', 'Bh12()'),
(34, 'Anis', 'Anis', 'Shafiqah', 210136554, 'anishafiqah@gmail.com', 172265159, 'Asd32%', 'Asd32%'),
(35, 'Afiffa', 'Fiffa', 'Amry', 120132556, 'nurfiffa@gmail.com', 135683929, 'Bhu12.', 'Bhu12.');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `jan` varchar(255) NOT NULL,
  `feb` varchar(255) NOT NULL,
  `march` varchar(255) NOT NULL,
  `april` varchar(255) NOT NULL,
  `may` varchar(255) NOT NULL,
  `june` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`jan`, `feb`, `march`, `april`, `may`, `june`) VALUES
('75', '86', '98', '120', '98', '110'),
('170', '100', '118', '250', '210', '180'),
('280', '250', '190', '98', '116', '300'),
('350', '158', '210', '163', '284', '352'),
('147', '400', '398', '352', '126', '400'),
('400', '398', '358', '153', '246', '359'),
('321', '365', '258', '369', '247', '158'),
('400', '387', '341', '232', '378', '263'),
('354', '321', '259', '352', '356', '380'),
('285', '395', '367', '284', '269', '350');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `userID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
