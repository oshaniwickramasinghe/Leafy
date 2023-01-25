-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 06:51 AM
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
-- Database: `leafy`
--

-- --------------------------------------------------------

--
-- Table structure for table `agriculturalist`
--

CREATE TABLE `agriculturalist` (
  `location` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agriculturalist_course`
--

CREATE TABLE `agriculturalist_course` (
  `date_enrolled` date NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `available_item`
--

CREATE TABLE `available_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `item_image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_agriculturalist`
--

CREATE TABLE `blog_agriculturalist` (
  `rate` int(11) DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_customer`
--

CREATE TABLE `blog_customer` (
  `rate` int(11) DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `house_no` int(11) NOT NULL,
  `lane` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_course`
--

CREATE TABLE `customer_course` (
  `date_enrolled` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agent`
--

CREATE TABLE `delivery_agent` (
  `location` varchar(45) NOT NULL,
  `license_no` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agent_area`
--

CREATE TABLE `delivery_agent_area` (
  `Area` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agent_timeslot`
--

CREATE TABLE `delivery_agent_timeslot` (
  `Timeslot` time NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_vehicle`
--

CREATE TABLE `delivery_vehicle` (
  `reg_no` int(11) NOT NULL,
  `vehicle_no` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `fuel_type` varchar(45) NOT NULL,
  `capacity` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fruit_vegetable_post`
--

CREATE TABLE `fruit_vegetable_post` (
  `expiry_date` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `occupation` varchar(45) NOT NULL,
  `education_level` varchar(45) NOT NULL,
  `specialized_area` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `delivery_required` tinyint(1) DEFAULT NULL,
  `u_id_customer` int(11) NOT NULL,
  `u_id_delivery_agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_rate`
--

CREATE TABLE `order_rate` (
  `rate` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `Paymentcol` varchar(45) DEFAULT NULL,
  `u_id_customer` int(11) NOT NULL,
  `u_id_delivery_agent` int(11) NOT NULL,
  `u_id_agriculturalist` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `agriculturalist_name` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `unit_price` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `created_date` date NOT NULL,
  `category` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `item_name`, `agriculturalist_name`, `district`, `location`, `quantity`, `unit_price`, `contact_no`, `created_date`, `category`, `image`, `user_id`) VALUES
(3, 'Cabbage', 'Mr.Amaranayake', 'Kurunegala', 'Asswadduma,Kurunegala', '20', '80', '712345123', '2023-01-23', 'Vegetable', 'cabbage.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `usei_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question_instructor`
--

CREATE TABLE `question_instructor` (
  `reply` varchar(500) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `total_cost` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_product_details`
--

CREATE TABLE `shopping_cart_product_details` (
  `item_id` int(11) NOT NULL,
  `quantity` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `password`, `role`, `code`) VALUES
(1, 'govi', 'sahas', 'govi@gmail.com', '$2y$10$V1l8/czDdfNO9Ro9RZiRqeznjleyX/yBYLwrLnvgezv8eUD6eNPqa', 'customer', '53f5eace4a175f2443c9a7d81f538f961e0dadf7'),
(2, 'fname', 'lname', 'email', 'password', 'role', 'code'),
(3, 'govi', 'sahas', 'saha@gmail.com', '$2y$10$CWdQ1ICslQ2rKHzjZz8uo.tNxo6ya.r9MrUZmOjZah2OlnBnikOMm', 'customer', 'a3ecabbf85f547f7fdfac7a413f0b00258755402'),
(4, 'govi', 'sahas', 'ss@gmail.com', '$2y$10$1zKdCer0xC1.619CoTICT.rlRvMXItW2Utdw5KS3zRpQJg8nwYeW6', 'customer', '752aebe9b974f7a4d928705dd3768f4ea039d0fb'),
(5, 'ss', 'gg', 'gg@gmail.com', '$2y$10$2KqEqVxnD4klX631wmjUmOTQqEvWUuCOZRBytT3lUv1.VTaXnBQru', 'Agriculturalist', '258227c830a063c3a8e11e3cbeedfd01eae80c3e');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `user_id` int(11) NOT NULL,
  `contact_number` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `idWishlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agriculturalist`
--
ALTER TABLE `agriculturalist`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `agriculturalist_course`
--
ALTER TABLE `agriculturalist_course`
  ADD PRIMARY KEY (`user_id`,`course_id`),
  ADD KEY `course_id_idx` (`course_id`);

--
-- Indexes for table `available_item`
--
ALTER TABLE `available_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `fk4_idx` (`user_id`);

--
-- Indexes for table `blog_agriculturalist`
--
ALTER TABLE `blog_agriculturalist`
  ADD PRIMARY KEY (`blog_id`,`user_id`),
  ADD KEY `fk6_idx` (`user_id`);

--
-- Indexes for table `blog_customer`
--
ALTER TABLE `blog_customer`
  ADD PRIMARY KEY (`blog_id`,`user_id`),
  ADD KEY `fk8_idx` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk9_idx` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customer_course`
--
ALTER TABLE `customer_course`
  ADD PRIMARY KEY (`user_id`,`course_id`),
  ADD KEY `fk12_idx` (`course_id`);

--
-- Indexes for table `delivery_agent`
--
ALTER TABLE `delivery_agent`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `delivery_agent_area`
--
ALTER TABLE `delivery_agent_area`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `delivery_agent_timeslot`
--
ALTER TABLE `delivery_agent_timeslot`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `delivery_vehicle`
--
ALTER TABLE `delivery_vehicle`
  ADD PRIMARY KEY (`reg_no`,`vehicle_no`),
  ADD KEY `fk16_idx` (`user_id`);

--
-- Indexes for table `fruit_vegetable_post`
--
ALTER TABLE `fruit_vegetable_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk19_idx` (`u_id_customer`),
  ADD KEY `fk20_idx` (`u_id_delivery_agent`);

--
-- Indexes for table `order_rate`
--
ALTER TABLE `order_rate`
  ADD PRIMARY KEY (`user_id`,`order_id`),
  ADD KEY `fk22_idx` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk23_idx` (`u_id_customer`),
  ADD KEY `fk24_idx` (`u_id_delivery_agent`),
  ADD KEY `fk25_idx` (`u_id_agriculturalist`),
  ADD KEY `fk26_idx` (`order_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk27_idx` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fk28_idx` (`usei_id`);

--
-- Indexes for table `question_instructor`
--
ALTER TABLE `question_instructor`
  ADD PRIMARY KEY (`question_id`,`user_id`),
  ADD KEY `fk30_idx` (`user_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`user_id`,`order_id`),
  ADD KEY `fk32_idx` (`order_id`);

--
-- Indexes for table `shopping_cart_product_details`
--
ALTER TABLE `shopping_cart_product_details`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`user_id`,`contact_number`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`idWishlist`);

--
-- Indexes for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `fk35_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_item`
--
ALTER TABLE `available_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agriculturalist`
--
ALTER TABLE `agriculturalist`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_agriculturalist`
--
ALTER TABLE `blog_agriculturalist`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_customer`
--
ALTER TABLE `blog_customer`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk8` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk9` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_course`
--
ALTER TABLE `customer_course`
  ADD CONSTRAINT `fk11` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk12` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_agent`
--
ALTER TABLE `delivery_agent`
  ADD CONSTRAINT `fk13` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_agent_area`
--
ALTER TABLE `delivery_agent_area`
  ADD CONSTRAINT `fk14` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_agent_timeslot`
--
ALTER TABLE `delivery_agent_timeslot`
  ADD CONSTRAINT `fk15` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_vehicle`
--
ALTER TABLE `delivery_vehicle`
  ADD CONSTRAINT `fk16` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fruit_vegetable_post`
--
ALTER TABLE `fruit_vegetable_post`
  ADD CONSTRAINT `fk17` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk18` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk19` FOREIGN KEY (`u_id_customer`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk20` FOREIGN KEY (`u_id_delivery_agent`) REFERENCES `delivery_agent` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_rate`
--
ALTER TABLE `order_rate`
  ADD CONSTRAINT `fk21` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk22` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk23` FOREIGN KEY (`u_id_customer`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk24` FOREIGN KEY (`u_id_delivery_agent`) REFERENCES `delivery_agent` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk25` FOREIGN KEY (`u_id_agriculturalist`) REFERENCES `agriculturalist` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk26` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk27` FOREIGN KEY (`user_id`) REFERENCES `agriculturalist` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk28` FOREIGN KEY (`usei_id`) REFERENCES `agriculturalist` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_instructor`
--
ALTER TABLE `question_instructor`
  ADD CONSTRAINT `fk29` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk30` FOREIGN KEY (`user_id`) REFERENCES `instructor` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `fk31` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk32` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD CONSTRAINT `fk33` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD CONSTRAINT `fk34` FOREIGN KEY (`item_id`) REFERENCES `available_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk35` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
