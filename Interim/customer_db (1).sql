-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 08:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_ID` int(10) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `content` text NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_ID`, `title`, `author`, `content`, `comment`, `date`) VALUES
(1, 'green', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23'),
(2, 'green', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23'),
(3, 'seeds', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23'),
(4, 'green house effect', 'Nadeesha', 'there are lot of country which haven\'t enough sun light, therefore these country\'s use this green houses which is created based on green house effect', '', '2022-11-25'),
(5, 'green house effect', 'Nadeesha', 'there are lot of country which haven\'t enough sun light, therefore these country\'s use this green houses which is created based on green house effect', '', '2022-11-25'),
(6, '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `user_ID` int(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `specialized_area` varchar(50) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`user_ID`, `first_name`, `last_name`, `email`, `contact_number`, `password`, `occupation`, `specialized_area`, `education_level`, `role`, `image`) VALUES
(3, 'sonali', 'edirisinghe', 'erandathi142@gmail.com', '0815686653', '202cb962ac59075b964b07152d234b70', 'ggit', 'wtetete', 'dudusufd', 'instructor', ''),
(4, 'Nadeesha', 'Rajapaksha', 'r.w.m.e.n.rajapaksha@gmail.com', '0782016953', '202cb962ac59075b964b07152d234b70', 'ggit', 'dsdf', 'dudusufd', 'instructor', '1.jpg'),
(5, 'Nadeesha', 'Rajapaksha', 'rajapksha', '0782016953', '202cb962ac59075b964b07152d234b70', 'ggit', 'wtetete', 'dudusufd', 'instructor', ''),
(6, 'saman', 'Rajapaksha', 'saman@123', '0815686653', '827ccb0eea8a706c4c34a16891f84e7b', 'hjvvv', 'dsdf', 'bbbb', 'instructor', ''),
(7, 'nimal', 'soysa', 'nimal@123', '0782016953', '827ccb0eea8a706c4c34a16891f84e7b', 'ggit', 'dsdf', 'bbbb', 'customer', ''),
(8, 'Govindani', 'Kulasekara', 'govindani@gmail.com', '0876543212', '81dc9bdb52d04dc20036dbd8313ed055', 'student', 'nothing', 'Uni', 'customer', ''),
(9, 'gg', 'ss', 'gg@gmail.com', '0712365478', '81dc9bdb52d04dc20036dbd8313ed055', 'q', 'a', 'd', 'customer', ''),
(10, 'dd', 'ss', 'sd@gmail.com', '0715647896', '81dc9bdb52d04dc20036dbd8313ed055', 's', 's', 'd', 'customer', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `image`, `name`, `location`, `quantity`, `price`) VALUES
(1, '1.jpg', 'Cabbage', 'Near Kurunegala', 10, 300),
(2, '2.jpg', 'Brinjal', 'Near Kurungela', 20, 280),
(3, '3.jpg', 'Carrot', 'Near Kandy', 30, 500),
(4, '4.jpg', 'Leeks', 'Near Kandy', 30, 380),
(5, '5.jpg', 'Beet Root', 'Near Kurunegala', 25, 310),
(6, '6.jpg', 'Papaya', 'Near Kandy', 10, 40);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `location`, `image`, `quantity`, `price`) VALUES
(1, 'Cabbage', 'Near Kurunegala', '1.jpg', 10, 300),
(2, 'Brinjal', 'Near Kurunegala', '2.jpg', 20, 280);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL DEFAULT 'customer',
  `verify_code` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `fname`, `lname`, `userType`, `verify_code`, `is_active`) VALUES
(15, '2020cs098@stu.ucsc.cmb.ac.lk', '1234', 'sahs', 'kk', 'user', '68a1e81ff522630bc5250f5d0e35b536c36cc237', 'false'),
(23, 'sahas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'gineth', 'ssgdud', 'user', '67dab42f1a0937cc51df489c7ade86ba7c49eea7', 'false'),
(24, 'abc@gmail.com', '6562c5c1f33db6e05a082a88cddab5ea', 'ads', 'assd', 'user', 'a86fd6620da5d4802d556f7267fe00d9f7b8ff23', 'false'),
(25, 'hi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'govi', 'hi', 'user', '1fefc80b3a8782f5e882be1f21b7aef5e183a0b7', 'false'),
(27, 'sahasrika85@gmail.com', '1234', 'sahas', 'Kulasekara', 'user', 'd9eca32dd106678193408e056bb53df1cffe541c', 'false'),
(31, 'sahasrika85@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sahasrika', 'kulasekara', 'user', '8e49a3dc92e37e5daffc16e5d7548afb4d765668', 'false'),
(38, 'leafy2022@outlook.com', 'fcea920f7412b5da7be0cf42b8c93759', 'hi', 'leafy', 'user', '287c3eb7a16e48af53d6fad27935b36fa1f6d48b', 'false'),
(40, 'Sahasrika2000@outlook.com', 'e34a8899ef6468b74f8a1048419ccc8b', 'govindani', 'kulasekara', 'user', '80419b96e5d59f8efb5db284d185fc38443c7968', 'false'),
(41, 'leafy2022project@outlook.com', '81b073de9370ea873f548e31b8adc081', 'gg', 'kk', 'user', '6eb1e94881b468648d64666fca38679fc2a9c666', 'false'),
(42, 'oshani@gmail.com', '46d045ff5190f6ea93739da6c0aa19bc', 'oshani', 'kk', 'user', '27345186210c6bc549ab6ab29d4704e3f678d9c9', 'false'),
(75, 'ggg@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'sd', 's', 'user', '55e552a6cfe1037e53c8a0dffea89bf429bfae2a', 'false'),
(76, 'jjj@gmail.com', '202cb962ac59075b964b07152d234b70', 'f', 'dgr', 'user', '2d5e5ab245d5008958b8dc5a48ddec3f08d32bc4', 'false'),
(78, 'gavishkak@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'gineth', 'gavishka', 'user', 'b20227d4a387fc60cf3afd90e127f86e91d7a8aa', 'false');

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
(10, 'dd@fgamail.com', '81dc9bdb52d04dc20036', 'd', 'dd', 'user'),
(11, 'govi@gmail.com', 'cdaeb1282d614772beb1', 'govi', 'sahas', 'user'),
(12, 'sahs@gmail.com', '81b073de9370ea873f54', 'gg', 'ss', 'user'),
(13, 'gg@gmail.com', 'qwer', 'ggg', 'gggg', 'user');

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
(0, 0, 'Vegetable', 'carrot', 'kurunegala', 20, '5', '2022-12-13', 300, 'A729The-Organic-Farming-Trend-Is-Catching-One-Are-You-With-It-1024x576.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `item_scientific_name` varchar(100) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_name`, `item_scientific_name`, `image`) VALUES
(3, 'Lime', 'sdsdv', 'ALime416limes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `passward` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `passward`, `role`) VALUES
(1, 'olinda', 'Dushantha', 'oli2000@gmail.com', '0719089012', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'Govindani', 'Sahasrika', 'govindani@gmail.com', '0715623165', 'd41d8cd98f00b204e9800998ecf8427e', 'customer'),
(3, 'gg', 'ss', 'govi@gmail.com', '0712365478', 'd41d8cd98f00b204e9800998ecf8427e', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `user_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `loginuser`
--
ALTER TABLE `loginuser`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
