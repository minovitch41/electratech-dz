-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 02:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin2023', 'admin@admin.co', '$2y$10$RFEMxFuJ0OSbQqovsmXub.P3HZVsaJ02sbO3DoGLJWa4j7.E1YPs6'),
(2, 'Admin20234', 'admin@admin.gg', '$2y$10$eFFp6bYRycizkYtQBrZsOOifFHKBJY1Z53fWvGKn.5nB/hCBA.tF2'),
(3, 'Admin20235', 'admin@admin.ggd', '$2y$10$wFCzW2T.6U0wDpC4YZ2VEe9mBVTefUMmDgAjhugom0LdY6z3VrCh.'),
(4, 'aaaa', 'admin@admin.ggdf', '$2y$10$cnvMZgWB9hXDHpLll685U.sqBqIJDsVXHLN6pMk25huZbQDZ7x0VG');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'YASSIR'),
(2, 'YALDINE'),
(3, 'DHL'),
(4, 'UPS'),
(5, 'EMS'),
(6, 'FEDEX');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'SmartPhones'),
(2, 'LapTops'),
(3, 'Tv\'s'),
(4, 'Tablets'),
(5, 'Desktop PC');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 2039503044, 3, 0, 'pending'),
(2, 1, 543727141, 6, 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date_added`, `status`) VALUES
(2, 'LENOVO Legion Y520 Gaming PC', '- Multi-task with ease thanks to Intel® i5 processor   - Prepare for battle with NVIDIA GeForce GTX graphics card   - VR ready for the next-generation of immersive gaming and entertainment  - Tool-less upgrade helps you personalise your system to your own', 'Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.', 5, 2, 'large-lenovo-legion-y520-gaming-pc.jpg', 'large-lenovo-legion-y520-gaming-pc.jpg', 'large-lenovo-legion-y520-gaming-pc.jpg', 178000, '2023-03-03 21:37:32', 'true'),
(3, 'Samsung Galaxy S9+ [128 GB]', 'The revolutionary camera that adapts like the human eye.  Capture stunning pictures in bright daylight and super low light.', 'Our category-defining Dual Aperture lens adapts like the human eye. It\'s able to automatically switch between various lighting conditions with ease—making your photos look great whether it\'s bright or dark, day or night.  *Dual Aperture supports F1.5 and ', 1, 1, 's9.jpg', 's9.jpg', 's9.jpg', 164000, '2023-03-03 21:36:52', 'true'),
(4, 'PC SPECIALIST Vortex Minerva XT-R Gaming PC', '- NVIDIA GeForce GTX graphics for stunning gaming visuals  - Made for eSports with a speedy 7th generation Intel® Core™ i5 processor  - GeForce technology lets you directly update drivers, record your gaming and more', 'The PC Specialist Vortex Minerva XT-R Gaming PC is part of our Gaming range, which offers the most powerful PCs available. Its high-performance graphics and processing are made to meet the needs of serious gamers.', 5, 2, 'large-pc-specialist-vortex-minerva-xt-r-gaming-pc.jpg', 'pc-specialist-vortex-minerva-xt-r-gaming-pc.jpg', 'pc-specialist-vortex-minerva-xt-r-gaming-pc.jpg', 260000, '2023-03-03 21:36:39', 'true'),
(6, 'DELL Inspiron 5675 Gaming PC - Recon Blue', 'All-new gaming desktop featuring powerful AMD Ryzen™ processors, graphics ready for VR, LED lighting and a meticulous design for optimal cooling.', 'DELL PC GAMER 5675 Recon Blue Inspiron', 5, 2, 'dell-inspiron-5675-gaming-pc-recon-blue.jpg', 'dell-inspiron-5675-gaming-pc-recon-blue.jpg', 'dell-inspiron-5675-gaming-pc-recon-blue.jpg', 143000, '2023-03-03 21:36:10', 'true'),
(8, 'DELL Inspiron 15 5000 15.6', 'Dell\'s 15.6-inch, midrange notebook is a bland, chunky block. It has long been the case that the Inspiron lineup lacks any sort of aesthetic muse, and the Inspiron 15 5000 follows this trend. It\'s a plastic, silver slab bearing Dell\'s logo in a mirror she', 'DELL LAPTOP GRAY ', 2, 3, 'dell-inspiron-15-5000-15-6.jpg', 'dell-inspiron-15-5000-15-6.jpg', 'dell-inspiron-15-5000-15-6.jpg', 129999, '2023-03-03 21:33:16', 'true'),
(9, 'STREAM TV 55 WEBOs UHD (4k) - FRAMELESS - Embedded Demo + Magic Remote', 'Stream System est une marque algérienne de produits électroniques fabriqués par BOMARE COMPANY, la marque a été déposée en 2003. TAILLE D\'ÉCRAN : 58\"(146.cm) RÉSOLUTION :3840*2160 WIFI : oui BLUETOOTH : oui PUISSANCE MAX DE FONCTIONNEMENT :150W QUALITÉ D\'', 'tv stream 4k algeria ', 3, 2, '1.jpg', '1.jpg', '1.jpg', 855000, '2023-03-03 21:49:30', 'true'),
(10, 'APPLE 9.7\" iPad - 32 GB, Gold', '9.7 inch Retina Display, 2048 x 1536 Resolution, Wide Color and True Tone Display  Apple iOS 9, A9X chip with 64bit architecture, M9 coprocessor  12 MP iSight Camera, True Tone Flash, Panorama (up to 63MP), Four-Speaker Audio  Up to 10 Hours of Battery Li', 'apple gold 32 gb ipad tablet ', 4, 1, 'large-apple-9-7-ipad-32-gb-gold.jpg', 'large-apple-9-7-ipad-32-gb-gold.jpg', 'large-apple-9-7-ipad-32-gb-gold.jpg', 78000, '2023-03-03 22:13:30', 'true'),
(12, 'AMAZON Fire HD 8 Tablet with Alexa (2017) - 16 GB, Black', 'Take your personal assistant with you wherever you go with this Amazon Fire HD 8 tablet featuring Alexa voice-activated cloud service. The slim design of the tablet is easy to handle, and the ample 8-inch screen is ideal for work or play. This Amazon Fire', 'amazon tablet black 2017 alexa ', 4, 1, 'amazon-fire-hd-8-tablet-alexa-2017-16-gb-black.jpg', 'amazon-fire-hd-8-tablet-alexa-2017-16-gb-black.jpg', 'amazon-fire-hd-8-tablet-alexa-2017-16-gb-black.jpg', 14200, '2023-03-03 22:15:00', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 361999, 1057891695, 3, '2023-04-03 23:04:06', 'complete'),
(2, 1, 129999, 816537505, 1, '2023-04-03 23:04:13', 'complete'),
(3, 1, 1014000, 1560855916, 2, '2023-04-03 23:04:18', 'complete'),
(4, 1, 342000, 1306185013, 2, '2023-04-03 23:04:31', 'complete'),
(5, 1, 164000, 2039503044, 1, '2023-04-05 18:03:03', 'complete'),
(6, 1, 143000, 543727141, 1, '2023-04-10 01:09:30', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 3, 1560855916, 1014000, 'BaridiMob', '2023-04-03 22:52:29'),
(2, 1, 1057891695, 361999, 'BaridiMob', '2023-04-03 22:54:47'),
(3, 1, 1057891695, 361999, 'Netbanking', '2023-04-03 22:55:35'),
(4, 2, 816537505, 129999, 'BaridiMob', '2023-04-03 23:02:03'),
(5, 1, 1057891695, 361999, 'BaridiMob', '2023-04-03 23:04:06'),
(6, 2, 816537505, 129999, 'BaridiMob', '2023-04-03 23:04:13'),
(7, 3, 1560855916, 1014000, 'BaridiMob', '2023-04-03 23:04:18'),
(8, 4, 1306185013, 342000, 'BaridiMob', '2023-04-03 23:04:31'),
(9, 5, 2039503044, 164000, 'Payoffline', '2023-04-05 18:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'Khemissi12', 'Khemissi@gm.co', '$2y$10$fmqw5V2GvLphx6pxbn4FXOCSCiy6bdi1UIKg/8BatXxZXXU0E6Cc6', 'palazzo-vernazza-visitare-lecce.jpg', '::1', 'alger', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
