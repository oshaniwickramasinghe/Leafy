-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 07:04 PM
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
  `uid` int(10) NOT NULL,
  `uname` text NOT NULL,
  `passw` varchar(20) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginuser`
--

INSERT INTO `loginuser` (`uid`, `uname`, `passw`, `fname`, `lname`, `usertype`) VALUES
(8, 'suresh111@gmail.com', '12345', '', '', ''),
(9, 'sureshsri@gmail.com', '12345', 'Suresh', 'Dasanayaka', ''),
(10, 'sureshsri55@gmail.com', '123', ' ', ' ', 'user'),
(11, 'sureshsri999@gmail.com', '827ccb0eea8a706c4c34', 'Suresh', 'Dasanayaka', 'user'),
(12, 'sureshsri00@gmail.com', 'c6f057b86584942e4154', 'Suresh', 'Dasanayaka', 'user'),
(13, 'sureshsri123@gmail.com', '202cb962ac59075b964b', 'Suresh', 'Dasanayaka', 'admin'),
(14, 'suresh789@gmail.com', '68053af2923e00204c3c', 'Suresh', 'Dasanayaka', 'user'),
(15, 'sureshsri222@gmail.com', '222', 'Suresh', 'Dasanayaka', 'user'),
(16, 'lahiru111@gmail.com', '12345', 'lahiru', 'sanjana', 'user'),
(17, 'suresh999@gmail.com', '999', 'Suresh', 'Dasanayaka', 'user'),
(18, 'pasi123@gmail.com', '202cb962ac59075b964b', 'pasi', 'sada', 'user'),
(19, 'pasindu111@gmail.com', '698d51a19d8a121ce581', 'pasindu', 'sada', 'user'),
(20, 'nadee123@gmail.com', '202cb962ac59075b964b', 'nadeesha', 'oshani', 'user'),
(21, 'dasa123@gmail.com', '123', 'dasa', 'nayaka', 'user'),
(22, 'dasaya1129@gmail.com', '1129', 'sures', 'srinath', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `postcreate`
--

CREATE TABLE `postcreate` (
  `itemID` int(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `category` text NOT NULL,
  `fname` text NOT NULL,
  `flocation` text NOT NULL,
  `quantity` int(8) NOT NULL,
  `miniquantity` text NOT NULL,
  `exdate` date NOT NULL,
  `price` int(15) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postcreate`
--

INSERT INTO `postcreate` (`itemID`, `uid`, `category`, `fname`, `flocation`, `quantity`, `miniquantity`, `exdate`, `price`, `img`) VALUES
(61, 10, 'Vegetable', 'brinjal', 'ksds', 253, '5', '2022-12-31', 0, ''),
(62, 10, 'Vegetable', 'brinjal', 'ksds', 253, '5', '2022-12-31', 0, ''),
(63, 10, 'Vegetable', 'Suresh', 'ksds', 253, '5', '2022-12-17', 0, ''),
(64, 10, 'Vegetable', 'Suresh', 'ksds', 253, '5', '2022-12-17', 0, ''),
(65, 10, 'Vegetable', 'Suresh', 'ksds', 253, '5', '2022-12-17', 0, ''),
(66, 10, 'Vegetable', 'Suresh', 'kurunegala', 253, '5', '2022-12-31', 0, 'IMG_7994.JPG'),
(67, 10, 'Vegetable', 'Suresh', 'kurunegala', 253, '5', '2022-12-31', 2121, ''),
(68, 10, 'Vegetable', 'Suresh', 'kurunegala', 253, '5', '2022-12-31', 2121, 'A10772IMG_7994.JPG'),
(69, 10, 'Vegetable', 'Suresh', 'kurunegala', 253, '5', '2022-12-31', 2121, 'A104791668748120082852.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginuser`
--
ALTER TABLE `loginuser`
  ADD PRIMARY KEY (`uid`);

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
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `postcreate`
--
ALTER TABLE `postcreate`
  MODIFY `itemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
