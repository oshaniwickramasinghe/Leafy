-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 06:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `createpost`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginuser`
--

CREATE TABLE `loginuser` (
  `userID` int(10) NOT NULL,
  `uname` text NOT NULL,
  `passw` varchar(20) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginuser`
--

INSERT INTO `loginuser` (`userID`, `uname`, `passw`, `fname`, `lname`, `usertype`) VALUES
(8, 'suresh111@gmail.com', '12345', '', '', ''),
(9, 'sureshsri@gmail.com', '12345', 'Suresh', 'Dasanayaka', '');

-- --------------------------------------------------------

--
-- Table structure for table `postcreate`
--

CREATE TABLE `postcreate` (
  `itemID` int(10) NOT NULL,
  `category` text NOT NULL,
  `fname` text NOT NULL,
  `flocation` text NOT NULL,
  `quantity` int(8) NOT NULL,
  `miniquantity` text NOT NULL,
  `exdate` date NOT NULL,
  `price` int(15) NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postcreate`
--

INSERT INTO `postcreate` (`itemID`, `category`, `fname`, `flocation`, `quantity`, `miniquantity`, `exdate`, `price`, `img`) VALUES
(22, '', 'brinjal', 'kurunegala', 253, '5', '2022-11-30', 100, 0),
(23, '', 'brinjal', 'kurunegala', 253, '5', '2022-11-30', 100, 0),
(24, 'user', 'brinjal', 'kurunegala', 253, '5', '2022-11-30', 100, 0),
(25, 'user', 'brinjal', 'kurunegala', 253, '5', '2022-11-30', 100, 0),
(26, 'Fruit', 'Suresh', 'kurunegala', 253, '5', '2022-11-28', 100, 0),
(27, 'Fruit', 'Suresh', 'kurunegala', 253, '5', '2022-11-28', 100, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginuser`
--
ALTER TABLE `loginuser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `postcreate`
--
ALTER TABLE `postcreate`
  ADD PRIMARY KEY (`itemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginuser`
--
ALTER TABLE `loginuser`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `postcreate`
--
ALTER TABLE `postcreate`
  MODIFY `itemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
