-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 28, 2022 at 06:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- First create separate Database: `summershop`
-- create database summershop;
--

-- --------------------------------------------------------

use summershop;


--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Peppa', 'peppa@gmail.com', '123456'),
(2, 'Sussi', 'sussi@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `qty`, `status`) VALUES
(1, 1, 2, 1, 'Added to cart');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(2, 'Shawl', 'Light colorful shall. A lot more stylish than a thick towel!', '35.00'),
(3, 'Parasol', 'Want to stay at the beach all day? Sunscreen might not be enough!', '111.32'),
(4, 'Sunglasses', 'Protect your eyes from the sun in style!', '350.00'),
(5, 'Sandals', 'Perfect for when you don&#039;t feel like wearing socks', '15.99'),
(6, 'Beach Chair', 'The easy going chair! Easy to unfold, easy to carry and easy to stash away for the next beach day.', '65.00'),
(7, 'Floating Flamengo', 'It&#039;s pink, it floats and it&#039;s a flamengo. What more can you ask for?', '13.99'),
(8, 'BeachBall', 'Light and small, perfect for silly games at the beach.', '15.00'),
(9, 'Volley Ball Net', 'Easy to setup, play volley ball with your friends!', '85.99'),
(10, 'Sand Castle Mold', 'The kids will love it!', '19.99'),
(11, 'Surf Board', 'Starter surf board. The best way to feel energized by the ocean.', '299.00'),
(12, 'Climbing Rope', 'It&#039;s pretty AND it&#039;s there to save your life. Thank it as you buy it!', '60.00'),
(13, 'Climbing Belay', 'A necessary piece of equipment for every lead climber.', '25.00'),
(14, 'Climbing Harness', 'It keeps you on a wall and keeps your worries at bay with straightfoward cinching system.', '55.00'),
(15, 'Climbing Clip', 'What good is a rope without clips we ask? You should get a few!', '21.99'),
(16, 'Tent For Two', 'It&#039;s big enough for two average adults!', '244.99'),
(17, 'Tent for One', 'It&#039;s comfortable, but only for one person!', '199.99'),
(18, 'Tent For Four', 'This one is big enough for four people or very spacious for three!', '499.99'),
(19, 'Hiking Backpack', '65L of modular space with all the bells and whistles expected for a day pack!', '89.99'),
(20, 'Light Sleeping Bag', 'It&#039;s perfect for summer and fall hiking!', '56.88'),
(21, 'Fancy Sleeping Bag', 'This sleeping bag is perfect for cold weather camping. It&#039;s 1000G Thinsulate material will keep you warm in the middle of winter!', '119.99'),
(22, 'Water Bottle', 'Stay Hydrated!', '34.99');
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `status`) VALUES
(1, 'John Smith', 'johnsmith@gmail.com', '123456', '25 Green street, Montreal', '123456789', 'unblocked');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
