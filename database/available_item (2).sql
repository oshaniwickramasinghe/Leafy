-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 03:08 PM
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
(1, 'CARROT', '', 'ACARROT307carrot.webp'),
(2, 'Beans', 'Vegetable', 'ABeans934beans.jpg'),
(3, 'Ball Radish', 'Vegetable', 'ABall Radish320BALL RADISH.jpg'),
(4, 'Beetroot', 'Vegetable', 'ABeetroot112BEETROOT.jpg'),
(5, 'Bitter gourd', 'Vegetable', 'ABitter gourd637BITTER GOURD.jpg'),
(6, 'Brinjal', 'Vegetable', 'ABrinjal867brinjal.jpg'),
(7, 'Cabbage', 'Vegetable', 'ACabbage489cabbage.jpg'),
(8, 'Cauliflower', 'Vegetable', 'ACauliflower779CAULIFLOWER.jpg'),
(9, 'Coconut', 'Vegetable', 'ACoconut495COCONUT.jpg'),
(10, 'Corn', 'Vegetable', 'ACorn522CORN.jpg'),
(11, 'Cucumber', 'Vegetable', 'ACucumber982cucumber.jpg'),
(12, 'Garlic', 'Vegetable', 'AGarlic360GARLIC.jpg'),
(13, 'Green Chilli', 'Vegetable', 'AGreen Chilli195GREEN CHILLI.webp'),
(14, 'Leeks', 'Vegetable', 'ALeeks820LEEKS.jpg'),
(15, 'Onion', 'Vegetable', 'AOnion47onion.jpg'),
(16, 'Potato', 'Vegetable', 'APotato607potato.jpg'),
(17, 'Pumpkin', 'Vegetable', 'APumpkin175pumpkin.jpg'),
(18, 'Apple', 'Fruit', 'AApple256APPLE.jpg'),
(19, 'Avocado', 'Fruit', 'AAvocado312AVOCADO.jpg'),
(20, 'Bael fruit', 'Fruit', 'ABael fruit136BAEL FRUIT.jpg'),
(21, 'Banana', 'Fruit', 'ABanana9BANANA.webp'),
(22, 'Grapes', 'Fruit', 'AGrapes345GRAPES.jpg'),
(23, 'Guava', 'Fruit', 'AGuava892GUAVA.jpg'),
(24, 'King coconut', 'Fruit', 'AKing coconut281king Coconut.webp'),
(25, 'Mango', 'Fruit', 'AMango564MANGO.jpg'),
(26, 'Nelli', 'Fruit', 'ANelli439NELLI.jpg'),
(27, 'Papaya', 'Fruit', 'APapaya442PAPAYA.jpg'),
(28, 'Passion Fruit', 'Fruit', 'APassion Fruit166PASSION FRUIT.jpg'),
(29, 'Pineapple', 'Fruit', 'APineapple871PINEAPPLE.webp'),
(30, 'Rose apple', 'Fruit', 'ARose apple121ROSE APPLE.webp'),
(31, 'Soursop', 'Fruit', 'ASoursop762SOURSOP.webp'),
(32, 'Veralu', 'Fruit', 'AVeralu76VERALU.jpg'),
(33, 'Watermelon', 'Fruit', 'AWatermelon159WATERMELON.webp'),
(35, 'Chilli', 'Vegetable', 'AChilli642download.jfif'),
(36, '', '', ''),
(38, 'Pumpkin seed', 'Seed', 'APumpkin seed342pumpkin.jpg'),
(39, 'Apricot Seeds', 'Seed', 'AApricot Seeds553Apricot-Seeds.jpg'),
(40, 'Buckwheat', 'Seed', 'ABuckwheat95buckwheat.png'),
(41, 'Chia seeds', 'Seed', 'AChia seeds435chia-seeds.png'),
(42, 'Double Beans', 'Seed', 'ADouble Beans406Double-Beans.jpg'),
(43, 'Melon Seeds', 'Seed', 'AMelon Seeds76Melon-Seeds.jpg'),
(44, 'Red Pinto Beans', 'Seed', 'ARed Pinto Beans265Red-Pinto-Beans.png'),
(45, 'Sunflower Seeds', 'Seed', 'ASunflower Seeds612Sunflower-Seeds-.jpg'),
(46, 'Ash Plantains', 'Vegetable', 'AAsh Plantains293ASH PLANTAINS.jpg'),
(47, 'Big Onion', 'Vegetable', 'ABig Onion680BIG ONION.jpg'),
(48, 'Dambala', 'Vegetable', 'ADambala270DAMBALA.jpg'),
(49, 'Long Beans', 'Vegetable', 'ALong Beans909LONG BEANS.jpg'),
(50, 'Ridge Gourd', 'Vegetable', 'ARidge Gourd580RIDGE GOURD.jpg'),
(51, 'Salad Leaves', 'Vegetable', 'ASalad Leaves267SALAD LEAVES.jpg'),
(52, 'Snake Gourd', 'Vegetable', 'ASnake Gourd389SNAKE GOURD.jpg'),
(53, 'Sweet Potato', 'Vegetable', 'ASweet Potato258SWEET POTATO.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_item`
--
ALTER TABLE `available_item`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_item`
--
ALTER TABLE `available_item`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
