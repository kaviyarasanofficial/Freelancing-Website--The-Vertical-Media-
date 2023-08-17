-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 07:38 PM
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
-- Database: `free`
--

-- --------------------------------------------------------

--
-- Table structure for table `betproject`
--

CREATE TABLE `betproject` (
  `bid_id` int(40) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `projtitle` varchar(500) NOT NULL,
  `projselleremail` varchar(20) NOT NULL,
  `sellamount` varchar(20) NOT NULL,
  `projdate` varchar(10) NOT NULL,
  `freelancername` varchar(50) NOT NULL,
  `freelanceremail` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `bidamount` varchar(20) NOT NULL,
  `deliverdayscount` varchar(10) NOT NULL,
  `proposal` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `betproject`
--

INSERT INTO `betproject` (`bid_id`, `proj_id`, `projtitle`, `projselleremail`, `sellamount`, `projdate`, `freelancername`, `freelanceremail`, `country`, `bidamount`, `deliverdayscount`, `proposal`, `status`) VALUES
(26, 20, 'Dropshipping plateform', 'klscse6@gmail.com', '33', '2023-08-16', 'Kaviyarasan M', 'klscse6@gmail.com', 'India', '2', '2', 'hhh', 'Approved'),
(27, 20, 'Dropshipping plateform', 'klscse6@gmail.com', '33', '2023-08-16', 'vertical', 'verticalmedia@gmail.com', 'india', '3', '5', '\r\nsss', 'Declined'),
(28, 19, 'new', 'klscse6@gmail.com', '1', '2023-08-16', 'Kaviyarasan M', 'klscse6@gmail.com', 'India', '2', '3', '\r\nddd', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `catagorie`
--

CREATE TABLE `catagorie` (
  `id` int(11) NOT NULL,
  `Catagorie_Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagorie`
--

INSERT INTO `catagorie` (`id`, `Catagorie_Name`) VALUES
(3, 'Mobile Apps'),
(4, 'Website Design'),
(5, 'Mobile Apps'),
(6, 'Android Apps'),
(7, 'iPhone Apps'),
(8, 'Software Architecture'),
(9, 'Graphic Design'),
(10, 'Logo Design'),
(11, 'Public Relations'),
(12, 'Logistics'),
(13, 'Proofreading'),
(14, 'Translation'),
(15, 'Research'),
(16, 'Research Writing'),
(17, 'Article Writing'),
(18, 'Web Scraping'),
(19, 'HTML'),
(20, 'CSS'),
(21, 'HTML 5'),
(22, 'Javascript'),
(23, 'Data Processing'),
(24, 'Python'),
(25, 'Wordpress'),
(26, 'Web Search'),
(27, 'Finance'),
(28, 'Legal'),
(29, 'Linux'),
(30, 'Manufacturing'),
(31, 'Amazon Web Services'),
(32, 'Content Writing'),
(33, 'Marketing'),
(34, 'Excel'),
(35, 'Ghostwriting'),
(36, 'Copywriting'),
(37, 'Accounting'),
(38, 'MySQL'),
(39, 'Banner Design'),
(40, 'Illustration'),
(41, 'Software Development'),
(42, 'PHP'),
(43, '3D Modelling'),
(44, 'Photoshop'),
(45, 'Technical Writing'),
(46, 'Blogging'),
(47, 'Internet Marketing'),
(48, 'eCommerce'),
(49, 'Data Entry'),
(50, 'Link Building'),
(51, 'C++ Programming'),
(52, 'Website Design');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Subjects` varchar(20) NOT NULL,
  `Message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newproj`
--

CREATE TABLE `newproj` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `catagories` varchar(255) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newproj`
--

INSERT INTO `newproj` (`id`, `Name`, `Description`, `thumbnail_url`, `skills`, `payment_method`, `catagories`, `budget`, `date`, `email`) VALUES
(18, 'aa', 'aaa', 'thumbnails/b9_thumb.jpg', 'aa', 'Rupee', 'Mobile Apps', 2.00, '2023-08-16', 'klscse6@gmail.com'),
(19, 'new', 'wwww', 'thumbnails/dec_thumb.png', 'wwwwww', 'Dollers', 'Web Scraping', 1.00, '2023-08-16', 'klscse6@gmail.com'),
(20, 'Dropshipping plateform', 'I am looking for an experienced WooCommerce/web developer to help me create a dropshipping platform for my physical products.\r\n\r\nPlatform: WooCommerce/django\r\n- The ideal candidate should have expertise in developing and customizing WooCommerce websites to ensure a seamless dropshipping experience.\r\n\r\nProduct Type: Physical Products\r\n- I will be selling physical products, so the developer should be familiar with setting up product catalogs, inventory management, and order fulfillment.\r\n\r\nMultiple User Accounts\r\n- Import Products from supplier site directly into your store.\r\n- Product Customization\r\n- Edit your products as you wish: change titles, descriptions, images, etc\r\n- Inventory and Price Auto-Updates\r\n- Know that your inventory and prices are always up to date.\r\n- Pricing Automations\r\n- Create pricing rules, and price your products in bulk.\r\n- Fulfill Orders\r\n- Fulfill Orders Automatically\r\n- Track Your Sales\r\n- Shipment Tracking\r\n- Know where your orders are at all times with integrated order tracking.\r\n- Follow your store earnings in a convenient sales and costs dashboard.\r\n- dropshipper can know the shippping time\r\n- Have your orders shipped directly to your customers in just a few clicks.\r\n- CD/CI with deployment to AWS\r\n\r\nAdditional Skills:\r\n- Knowledge of dropshipping best practices and strategies.\r\n- Familiarity with shipping and fulfillment processes.\r\n- Ability to integrate payment gateways and manage customer transactions.\r\n- Experience in optimizing the website for SEO and improving conversion rates.\r\n\r\nIf you have the skills and experience required for this project, please submit your proposal.', 'thumbnails/b10_thumb.jpg', 'PHP ,Website Design ,WordPress ,Django ,eCommerce', 'Rupee', 'Article Writing', 33.00, '2023-08-16', 'klscse6@gmail.com'),
(21, 'vertical', 'fff', 'thumbnails/b2_thumb.jpg', 'git', 'Rupee', 'Mobile Apps', 2.00, '2023-08-16', 'verticalmedia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `dashboard_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `date` int(20) NOT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `ZIP` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`dashboard_id`, `email`, `password`, `name`, `Country`, `Street`, `date`, `City`, `State`, `ZIP`) VALUES
(3, 'klscse6@gmail.com', '$2y$10$MrxkpKkxbDvMeQ8KBZua2e3qsCSj9HMIIOwBpGT/aqnqCx6wslZOe', 'Kaviyarasan M', 'India', '133/Perumal Malai, RN Pudur', 0, 'Erode', 'Tamilnadu', '638005'),
(4, 'verticalmedia@gmail.com', '$2y$10$.JsnMJqupgiIhEF3V3G5MeHzqwUk1UJhJPGMgY3c7xvQopNwQeoeO', 'vertical', 'india', NULL, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `betproject`
--
ALTER TABLE `betproject`
  ADD UNIQUE KEY `bid_id` (`bid_id`);

--
-- Indexes for table `catagorie`
--
ALTER TABLE `catagorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newproj`
--
ALTER TABLE `newproj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `dashboard_id` (`dashboard_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `betproject`
--
ALTER TABLE `betproject`
  MODIFY `bid_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `catagorie`
--
ALTER TABLE `catagorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newproj`
--
ALTER TABLE `newproj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `dashboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
