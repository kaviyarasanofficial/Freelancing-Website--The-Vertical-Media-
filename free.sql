-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 07:46 PM
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
(1, 'hi kavi ', 'w', 'thumbnails/64c3cc93ed4e36.35854372_thumb.png', 'aa', 'Dollers', 'Translation', 20.00, NULL, 'verticalmedia@gmail.com'),
(2, 's', 's', 'thumbnails/b2_thumb.jpg', 'gtt', 'Rupee', 'Research', 20.00, NULL, 'klscse6@gmail.com');

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
(2, 'verticalmedia@gmail.com', '$2y$10$fkkWYMSdLYJ8tNQE2s60.ezSr7Iug3hyOXkpDv88yO1m886cS7cIK', 'kavi', 'ddd', 'dd', 0, 'ddd', 'dd', 'ddd'),
(3, 'klscse6@gmail.com', '$2y$10$MrxkpKkxbDvMeQ8KBZua2e3qsCSj9HMIIOwBpGT/aqnqCx6wslZOe', '', NULL, NULL, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `catagorie`
--
ALTER TABLE `catagorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newproj`
--
ALTER TABLE `newproj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `dashboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
