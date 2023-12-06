-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2023 at 02:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `full_name`, `username`, `password`) VALUES
(1, 'Rohan Kumar', 'yeetpain', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Administrator', 'god_admin', 'e2fc714c4727ee9395f324cd2e7f331f'),
(4, 'Laiba Nadeem', 'laiba', 'e2fc714c4727ee9395f324cd2e7f331f'),
(5, 'admin', 'random', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `title`, `image_name`, `featured`, `active`) VALUES
(18, 'Chinese', 'FoodHouse_963.jpeg', 'No', 'Yes'),
(19, 'Desi BBQ', 'FoodHouse_852.jpg', 'No', 'Yes'),
(20, 'Beverages', 'FoodHouse_905.jpg', 'Yes', 'Yes'),
(21, 'Burgers', 'FoodHouse_842.jpg', 'Yes', 'Yes'),
(22, 'Pizzas', 'FoodHouse_162.jpg', 'Yes', 'Yes'),
(23, 'Dimsum', 'FoodHouse_812.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `res_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `cat_id`, `featured`, `active`, `res_id`) VALUES
(7, 'Babars Momos', 'Yeehaw', 1200, 'Food-Name-3435.jpg', 18, 'Yes', 'Yes', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants`
--

CREATE TABLE `tbl_restaurants` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Address` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_restaurants`
--

INSERT INTO `tbl_restaurants` (`ID`, `Name`, `Description`, `Address`, `username`, `password`, `image_name`) VALUES
(25, 'Cafe Premo', 'www are owned by xanders', 'zamzama commerical', 'premo', 'c93ccd78b2076528346216b3b2f701e6', NULL),
(32, 'Cafe Xanders', 'We make the best Pasta in Karachi!', 'Phase 5 Near Dolmen Mall', 'xanders', 'c93ccd78b2076528346216b3b2f701e6', NULL),
(33, 'Cafe Floc', 'we are boring and like every other cafe', 'zamzama phase 5 defence', 'floc', '25d55ad283aa400af464c76d713c07ad', NULL),
(34, 'Kabab Fries', 'We serve McDonalds fries', 'Sindhi Muslim', 'kbfries', '25d55ad283aa400af464c76d713c07ad', 'Restaurant_682.png'),
(35, 'Mcdonalds Gingy', 'We serve Gingerbread ', 'Cantt Station', 'gingy', 'c93ccd78b2076528346216b3b2f701e6', 'Restaurant_912.png'),
(36, 'KFC', 'We serve fried chicken', 'Sindhi Muslim', 'friedchicken', '25d55ad283aa400af464c76d713c07ad', 'Restaurant_458.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_registration`
--

CREATE TABLE `tbl_restaurant_registration` (
  `registration_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `registration_date` varchar(15) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_restaurant_registration`
--

INSERT INTO `tbl_restaurant_registration` (`registration_id`, `restaurant_id`, `registration_date`) VALUES
(6, 25, '2023-12-05'),
(7, 32, '2023-12-05'),
(8, 33, '2023-12-05'),
(9, 34, '2023-12-06'),
(10, 35, '2023-12-06'),
(11, 36, '2023-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `tr_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `amount` float UNSIGNED NOT NULL,
  `tr_date` date NOT NULL,
  `method` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `F_Name` varchar(100) NOT NULL,
  `L_Name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `F_Name`, `L_Name`, `username`, `email`, `password`, `phone_no`, `address`) VALUES
(2, 'Rohan', 'Kumar', 'yeetpain', 'rohankumar@gmail.com', '25d55ad283aa400af464c76d713c07ad', '03447241789', 'Cantt Station Habib Metro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_fk` (`cat_id`),
  ADD KEY `rest_fk` (`res_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `restaurant_fk` (`restaurant_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk` (`order_id`),
  ADD KEY `item_order_fk` (`item_id`);

--
-- Indexes for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_restaurant_registration`
--
ALTER TABLE `tbl_restaurant_registration`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `registration_fk` (`restaurant_id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `transaction_fk` (`order_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_restaurant_registration`
--
ALTER TABLE `tbl_restaurant_registration`
  MODIFY `registration_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `tr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD CONSTRAINT `food_fk` FOREIGN KEY (`cat_id`) REFERENCES `tbl_categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rest_fk` FOREIGN KEY (`res_id`) REFERENCES `tbl_restaurants` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `restaurant_fk` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `item_order_fk` FOREIGN KEY (`item_id`) REFERENCES `tbl_food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_fk` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_restaurant_registration`
--
ALTER TABLE `tbl_restaurant_registration`
  ADD CONSTRAINT `registration_fk` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD CONSTRAINT `transaction_fk` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
