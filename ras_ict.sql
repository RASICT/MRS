-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 10:01 AM
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
-- Database: `ras_ict`
--

-- --------------------------------------------------------

--
-- Table structure for table `problem_categories`
--

CREATE TABLE `problem_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problem_categories`
--

INSERT INTO `problem_categories` (`id`, `category_name`) VALUES
(1, 'Hardware issue'),
(2, 'Software issue'),
(3, 'Network issue');

-- --------------------------------------------------------

--
-- Table structure for table `problem_reports`
--

CREATE TABLE `problem_reports` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `problem_category` varchar(255) NOT NULL,
  `problem_description` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problem_reports`
--

INSERT INTO `problem_reports` (`id`, `staff_name`, `department`, `device_name`, `problem_category`, `problem_description`, `report_date`) VALUES
(1, 'yozam', 'ict', 'printer', 'Network issue', 'doesnt print', '2024-08-23 07:59:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `problem_categories`
--
ALTER TABLE `problem_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_reports`
--
ALTER TABLE `problem_reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `problem_categories`
--
ALTER TABLE `problem_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `problem_reports`
--
ALTER TABLE `problem_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
