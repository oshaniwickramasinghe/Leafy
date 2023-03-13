-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 01:11 PM
-- Server version: 8.0.31
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
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `rate` int DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agriculturalist`
--

INSERT INTO `agriculturalist` (`address1`, `address2`, `district`, `lat`, `lng`, `rate`, `user_id`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL, 1),
(NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `agriculturalist_course`
--

CREATE TABLE `agriculturalist_course` (
  `date_enrolled` date NOT NULL,
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `available_item`
--

CREATE TABLE `available_item` (
  `item_id` int NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `item_image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `available_item`
--

INSERT INTO `available_item` (`item_id`, `item_name`, `category`, `item_image`) VALUES
(1, 'c', '', 'Ac6972023_03_08 14_28 Office Lens (2).jpg'),
(2, '', '', ''),
(3, 'aa', '', 'Aaa1172023_03_08 14_28 Office Lens (2).jpg'),
(4, 'kjh', 'kjh', 'Akjh797unnamed.png'),
(5, 't', 'asd', 'At588IMG_20230222_144539.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `content1` text,
  `image1` varchar(100) DEFAULT NULL,
  `user_id` int NOT NULL,
  `topic` text,
  `Verified` tinyint DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `date`, `time`, `content1`, `image1`, `user_id`, `topic`, `Verified`, `description`) VALUES
(1, 'blog 1', '2023-01-03', '00:00:00', NULL, NULL, 7, NULL, 1, NULL),
(2, 'blog 2', '2023-02-11', '00:00:00', NULL, NULL, 6, NULL, 1, NULL),
(3, 'blog 3', '2023-02-14', '00:00:00', NULL, NULL, 8, NULL, 1, NULL),
(4, 'blog 4', '2023-02-16', '00:00:00', NULL, NULL, 8, NULL, 0, NULL),
(5, 'blog 5', '2023-01-11', '00:00:00', NULL, NULL, 7, NULL, 0, NULL),
(8, 'blog 8', '2023-04-14', '00:00:00', NULL, NULL, 7, NULL, 1, NULL),
(10, 'blog 10', '2023-08-23', '00:00:00', NULL, NULL, 7, NULL, 0, NULL),
(11, 'blog 11', '2023-08-10', '00:00:00', NULL, NULL, 9, NULL, 0, NULL),
(12, 'blog 12', '2023-09-20', '00:00:00', NULL, NULL, 2, NULL, 0, NULL),
(13, 'blog 13', '2023-10-19', '00:00:00', NULL, NULL, 9, NULL, 0, NULL),
(14, 'blog 14', '2023-10-25', '00:00:00', NULL, NULL, 6, NULL, 0, NULL),
(15, 'blog 15', '2023-11-09', '00:00:00', NULL, NULL, 10, NULL, 0, NULL),
(16, 'blog 16', '2023-12-22', '00:00:00', NULL, NULL, 8, NULL, 0, NULL),
(20, 'blog 20', '2023-03-17', '00:00:00', NULL, NULL, 3, NULL, 0, NULL),
(22, 'blog 6', '2023-05-19', '00:00:00', NULL, NULL, 10, NULL, 0, NULL),
(23, 'blog 21', '2023-05-25', '00:00:00', NULL, NULL, 8, NULL, 0, NULL),
(25, 'blog 9 ', '2023-07-20', '00:00:00', NULL, NULL, 10, NULL, 0, NULL),
(42, 'blog 8', '2023-06-15', '00:00:00', NULL, NULL, 7, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_agriculturalist`
--

CREATE TABLE `blog_agriculturalist` (
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `blog_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_customer`
--

CREATE TABLE `blog_customer` (
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `blog_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `orderId` int NOT NULL,
  `date` date NOT NULL,
  `agriculturalist_id` int DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`orderId`, `date`, `agriculturalist_id`, `status`) VALUES
(1, '2023-02-24', 21, 0),
(2, '2023-02-24', 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  `verified` tinyint NOT NULL,
  `description` text,
  `Topic` varchar(45) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `steps` int DEFAULT NULL,
  `date` date NOT NULL,
  `submit` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `duration`, `user_id`, `verified`, `description`, `Topic`, `status`, `image`, `steps`, `date`, `submit`) VALUES
(1, 'Course 1', '1 month', 8, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(2, 'Course 2', '2 months', 8, 1, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(3, 'Course 2', '2 months', 6, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(4, 'Course 4', '4 months', 10, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(5, 'Course 5', '5 months', 9, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(6, 'Course 4', '4 months', 3, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `create_post`
--

CREATE TABLE `create_post` (
  `post_id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `agriculturalist_name` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `minimum_quantity` varchar(11) NOT NULL,
  `unit_price` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `created_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `category` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `create_post`
--

INSERT INTO `create_post` (`post_id`, `item_name`, `agriculturalist_name`, `district`, `location`, `quantity`, `minimum_quantity`, `unit_price`, `contact_no`, `created_date`, `expire_date`, `category`, `image`, `user_id`) VALUES
(3, 'Cabbage', 'Mr.Amaranayake', 'Kurunegala', 'kurunegala                                   ', '200', '50         ', '100', '712345123', '2023-01-23', '2023-02-23', 'Vegetable', 'A6448WhatsApp Image 2023-01-21 at 10.54.06 AM.jpeg', 1),
(23, 'Big onion', '', '', 'kurunegala                    ', '1000', '100        ', '100', '', '0000-00-00', '2023-02-17', 'Vegetable', 'A6333WhatsApp Image 2023-01-21 at 10.54.06 AM (1).jpeg', 6),
(24, 'Cabbage', '', '', 'kurunegala', '500', '50', '150', '', '0000-00-00', '2023-02-17', 'Vegetable', 'A6343WhatsApp Image 2023-01-21 at 10.54.06 AM.jpeg', 6),
(26, 'potatoes', '', '', 'kohuwala', '100', '10', '185', '', '0000-00-00', '2023-02-18', 'Vegetable', 'A642WhatsApp Image 2023-01-21 at 10.54.07 AM (1).jpeg', 6),
(27, 'snake gourd', '', '', 'padeniya', '200', '50', '260', '', '0000-00-00', '2023-02-25', 'Vegetable', 'A6269WhatsApp Image 2023-01-21 at 10.54.08 AM.jpeg', 6),
(28, 'snake gourd', '', '', 'Kurunegala                                   ', '40', '5          ', '620', '', '0000-00-00', '2023-02-13', 'Vegetable', 'A13764WhatsApp Image 2023-01-21 at 10.54.08.jpeg', 13),
(38, 'Cabbage', 'suuuuresh', '', 'kohuwala', '150', '10', '150', '', '0000-00-00', '2023-02-27', 'Vegetable', 'A13437cabbage.jpeg', 13),
(39, 'Cabbage', 'suresh', '', 'kurunegala', '150', '10', '150', '', '0000-00-00', '2023-02-27', 'Vegetable', 'A13905cabbage.jpeg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `contact_no` int DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `district` varchar(200) DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`contact_no`, `lat`, `lon`, `address1`, `address2`, `district`, `user_id`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer_course`
--

CREATE TABLE `customer_course` (
  `date_enrolled` int NOT NULL,
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `Date` date NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `delivery` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `total_cost` int NOT NULL,
  `quantity` int NOT NULL,
  `agriculturalist_id` int DEFAULT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`order_id`, `customer_id`, `Date`, `payment_method`, `delivery`, `item_name`, `total_cost`, `quantity`, `agriculturalist_id`, `post_id`) VALUES
(1, 7, '2023-02-24', 'cash', 1, ' carrot', 510, 1, 21, 38);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agent`
--

CREATE TABLE `delivery_agent` (
  `location` varchar(45) NOT NULL,
  `license_no` varchar(45) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agent_area`
--

CREATE TABLE `delivery_agent_area` (
  `Area` varchar(45) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agent_timeslot`
--

CREATE TABLE `delivery_agent_timeslot` (
  `Timeslot` time NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `Delivery_agent_id` int NOT NULL,
  `order_id` int NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`Delivery_agent_id`, `order_id`, `status`) VALUES
(6, 1, 0),
(6, 2, 0),
(6, 1, 0),
(6, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_vehicle`
--

CREATE TABLE `delivery_vehicle` (
  `reg_no` int NOT NULL,
  `vehicle_no` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `fuel_type` varchar(45) NOT NULL,
  `capacity` varchar(45) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int NOT NULL,
  `parent_comment` varchar(500) NOT NULL,
  `customer` varchar(1000) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `parent_comment`, `customer`, `post`, `date`) VALUES
(1, '0', 'Govi', 'What climate is needed for Mediterranean agriculture?\n\n', '2023-02-27 22:36:15'),
(2, '1', 'nadeesha', 'The Mediterranean climate is the climate that is needed for Mediterranean agriculture.\r\n \r\n', '2023-02-27 22:38:44'),
(3, '0', 'Suresh', 'what are the factors that influence crop yield?', '2023-02-27 22:56:17'),
(4, '3', 'Nadeesha', 'soil fertility, availability of water, climate, and diseases or pests.', '2023-02-27 22:56:47'),
(26, '', 'govi', 'f', '2023-03-02 23:33:03'),
(27, '26', 'govi', 'h', '2023-03-02 23:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `duplicate_user_count`
--

CREATE TABLE `duplicate_user_count` (
  `role` varchar(20) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `duplicate_user_count`
--

INSERT INTO `duplicate_user_count` (`role`, `count`) VALUES
('customer', 4),
('agriculturalist', 5),
('instructor', 6),
('delivery_person', 7);

-- --------------------------------------------------------

--
-- Table structure for table `fruit_vegetable_post`
--

CREATE TABLE `fruit_vegetable_post` (
  `expiry_date` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `occupation` varchar(45) NOT NULL,
  `education_level` varchar(45) NOT NULL,
  `specialized_area` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  `contact_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int NOT NULL,
  `n_sub` varchar(250) NOT NULL,
  `n_msg` text NOT NULL,
  `Date` date NOT NULL,
  `time` time DEFAULT NULL,
  `customer_id` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`n_id`, `n_sub`, `n_msg`, `Date`, `time`, `customer_id`, `status`) VALUES
(1, 'Your Order is complete', 'Your orde is complete.\r\nPlease click below link to rate our service.\r\n\r\n\r\nThank you.', '2023-02-05', '11:30:36', 1, 1),
(2, 'your order is complete.', 'please click on below link to rate our\r\nservice', '2023-02-05', '11:32:00', 1, 1),
(3, 'Your order ', 'please click on below link to rate our\r\nservice', '2023-02-20', '00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notify_id` int NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `delivery` int NOT NULL,
  `agriculturalist_id` int DEFAULT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `Date`, `payment_method`, `delivery`, `agriculturalist_id`, `post_id`) VALUES
(1, 1, '2023-02-04', 'cash', 1, 1, 5),
(2, 6, '2023-02-17', 'cash', 1, 7, 1),
(3, 1, '2023-02-04', 'card', 0, 2, 7),
(6, 7, '2022-04-01', 'cash', 0, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_rate`
--

CREATE TABLE `order_rate` (
  `rate` int NOT NULL,
  `user_id` int NOT NULL,
  `order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `amount` varchar(45) NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `Paymentcol` varchar(45) DEFAULT NULL,
  `u_id_customer` int NOT NULL,
  `u_id_delivery_agent` int NOT NULL,
  `u_id_agriculturalist` int NOT NULL,
  `order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `agriculturalist_name` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `minimum_quantity` int DEFAULT NULL,
  `unit_price` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `created_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int NOT NULL,
  `content` varchar(500) NOT NULL,
  `usei_id` int NOT NULL,
  `approved` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `content`, `usei_id`, `approved`) VALUES
(1, 'What climate is needed for Mediterranean agriculture?', 1, 2),
(2, 'What is the best climate to grow pineapple?', 2, 0),
(3, 'is it?', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_instructor`
--

CREATE TABLE `question_instructor` (
  `reply` varchar(500) NOT NULL,
  `question_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `post_id` int DEFAULT NULL,
  `customer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_product_details`
--

CREATE TABLE `shopping_cart_product_details` (
  `item_name` int NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `total` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `approved` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `password`, `role`, `code`, `image`, `approved`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'Admin123@', 'admin', '', '', 0),
(2, 'tharindu', 'dananjaya', 'tharindu@gmail.com', '123tharindu@', 'customer', '', '', 2),
(3, 'pawandi', 'wijegunawardana', 'pawandi@gmail.com', '123pawandi@', 'agriculturalist', '', '', 1),
(6, 'govi', 'sahas', 'govi@gmail.com', '$2y$10$s8PF4o/C/K8NH8L/tcSol.WqcFooX9iYc24xPEIYJl7oG1FwQe4YC', 'customer', 'd048e149aa4bf84203decc3d7cd33e704ff7c161', '', 2),
(7, 'Dasuni', 'Galahiiyawa', 'dasuni@gmail.com', '$2y$10$WWjQCoNw1UTYsgoxa.NnbewvtxTwCawW6h/lL1uSYJePA9LTyrn/6', 'customer', '8ceb01b9c157c72bdc4f56f3110c37639d0c84a9', '', 1),
(8, 'Hirushi', 'Gunasekara', 'hirushi@gmail.com', '$2y$10$d76BGqo5XUhTM65yPc2Yg.VUdGE8/rE2Yc0kIToOxggN4quQAP1Su', 'Agriculturalist', '0e97835400357e4281944496c97a8e303ddf8401', '', 1),
(9, 'Navodi ', 'samarasinghe', 'navodi@gmail.com', '$2y$10$2eNveeTJWLUFJspfk/48secg/dNVchnVM03aulkvNiejuiOhAvwOy', 'Instructor', '5ef32e0398d2739f28dccca47cc6806240b97795', '', 2),
(10, 'Lihini', 'sewwandi', 'lihini@gmail.com', '$2y$10$DmHiHC0BvBvTCKzjkU8RSOckhVHf0UM11DtWd/i4q17qZ9C7TDzZa', 'Delivery Agent', 'ad20ffb899a83f7f0a8f383f4b33b1ed683eb9d6', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `user_id` int NOT NULL,
  `contact_number` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_count`
--

CREATE TABLE `user_count` (
  `role` varchar(20) NOT NULL,
  `count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_count`
--

INSERT INTO `user_count` (`role`, `count`) VALUES
('agriculturalist', 1),
('customer', 3),
('delivery agent', 0),
('instructor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `idWishlist` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `date` date NOT NULL,
  `post_id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`orderId`,`date`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk9_idx` (`user_id`);

--
-- Indexes for table `create_post`
--
ALTER TABLE `create_post`
  ADD PRIMARY KEY (`post_id`);

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
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`order_id`,`item_name`) USING BTREE,
  ADD KEY `agriculturalist_id` (`agriculturalist_id`),
  ADD KEY `post_id` (`post_id`);

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
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `agriculturalist_id` (`agriculturalist_id`),
  ADD KEY `post_id` (`post_id`);

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
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `shopping_cart_product_details`
--
ALTER TABLE `shopping_cart_product_details`
  ADD PRIMARY KEY (`item_name`);

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
  ADD PRIMARY KEY (`post_id`,`user_id`),
  ADD KEY `fk35_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_item`
--
ALTER TABLE `available_item`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `orderId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `create_post`
--
ALTER TABLE `create_post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notify_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `idWishlist` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD CONSTRAINT `fk34` FOREIGN KEY (`post_id`) REFERENCES `available_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk35` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
