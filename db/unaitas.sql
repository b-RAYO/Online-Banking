-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 10:26 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unaitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_no` int(10) UNSIGNED NOT NULL,
  `account_bal` decimal(10,2) NOT NULL,
  `min_bal` decimal(10,2) NOT NULL,
  `date_opened` datetime NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_no`, `account_bal`, `min_bal`, `date_opened`, `customer_id`, `branch_id`) VALUES
(1, '49000.00', '500.00', '2020-10-19 20:14:25', 1, 1),
(2, '50500.00', '500.00', '2020-10-19 21:41:35', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `address` int(10) UNSIGNED NOT NULL,
  `zip` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `date_opened` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `address`, `zip`, `city`, `date_opened`) VALUES
(1, 'Nyeri', 246, 12145, 'Nyeri', '2020-10-19'),
(2, 'Nairobi', 456, 15762, 'Nairobi', '2020-10-19'),
(3, 'Muranga', 1454, 10013, 'Muranga', '2020-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `emailverified` enum('VERIFIED','PENDING') NOT NULL,
  `phoneverified` enum('VERIFIED','PENDING') NOT NULL,
  `acc_status` enum('ACTIVE','PENDING','DISABLED','REJECTED','CLOSED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `dob`, `email`, `phone_no`, `address`, `zip`, `city`, `gender`, `password`, `token`, `emailverified`, `phoneverified`, `acc_status`) VALUES
(1, 'Brian Mwangi James', '2001-12-07', 'brianjames@gmail.com', '0723505027', 246, 10201, 'Kahuro', '', '827ccb0eea8a706c4c34a16891f84e7b', '006943f5e354880473bb28b8870a9baac39404862180c8424974ec434688e48ad434d55b29749ab47f018361e63b939bec04', 'VERIFIED', 'VERIFIED', 'ACTIVE'),
(2, 'Kevin Junior', '2001-12-06', 'gbrian@gmail.com', '0743488461', 154, 45907, 'Muranga', '', '827ccb0eea8a706c4c34a16891f84e7b', '943d4b79f1ea0023f8db2b9b620998c5767850d8e2a5b4506e1b41bfab0d000aa043e238305d7838e92dfba4dafb75155778', 'VERIFIED', 'VERIFIED', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `role` enum('ADMIN','REGULAR') NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` int(10) UNSIGNED NOT NULL,
  `zip` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER') NOT NULL,
  `date_employed` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `full_name`, `dob`, `role`, `phone_no`, `address`, `zip`, `city`, `gender`, `date_employed`, `password`, `branch_id`) VALUES
(1, 'Brian Mwangi ', '1984-10-13', 'ADMIN', '0703505038', 123, 10100, 'Nairobi', 'MALE', '2010-05-05', '202cb962ac59075b964b07152d234b70', 1),
(2, 'John Doe', '1993-06-16', 'REGULAR', '0769508059', 246, 15795, 'Nairobi', 'MALE', '2020-10-19', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(10) UNSIGNED NOT NULL,
  `s_acc` int(10) UNSIGNED NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `r_acc` int(10) UNSIGNED NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `dateadded` datetime NOT NULL,
  `status` enum('APPROVED','PENDING','REJECTED') NOT NULL,
  `dateapproved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `s_acc`, `s_name`, `r_acc`, `r_name`, `dateadded`, `status`, `dateapproved`) VALUES
(1, 1, 'Brian Mwangi James', 2, 'Kevin Junior', '2020-10-19 21:47:07', 'APPROVED', '2020-10-19 21:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_expires` datetime NOT NULL,
  `used` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`email`, `password`, `last_login`, `token`, `token_expires`, `used`) VALUES
('brianjames585@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-10-19 21:14:12', 'b8310898b26ff545580aa4fcd7f6d132714b80e6404e6761c93304c4b6c4af3f4f92d8d83eadcb4df9dd8ad11f1087300b6b', '2020-10-19 22:18:02', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `account_no` int(10) UNSIGNED NOT NULL,
  `account_bal` decimal(10,2) NOT NULL,
  `date_opened` datetime NOT NULL,
  `target_amount` decimal(10,2) NOT NULL,
  `end_date` datetime NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `main_acc` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` enum('PENDING','APPROVED','REJECTED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`account_no`, `account_bal`, `date_opened`, `target_amount`, `end_date`, `branch_id`, `main_acc`, `customer_id`, `status`) VALUES
(1, '0.00', '2020-10-19 00:00:00', '50000.00', '2022-10-19 00:00:00', 1, 1, 1, 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `savings_transcations`
--

CREATE TABLE `savings_transcations` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `acc_no` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savings_transcations`
--

INSERT INTO `savings_transcations` (`id`, `date`, `description`, `debit`, `credit`, `balance`, `acc_no`) VALUES
(2, '2020-10-19 22:11:34', 'Account Opened', '0.00', '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transcations`
--

CREATE TABLE `transcations` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `account_no` int(10) UNSIGNED NOT NULL,
  `account_bal` decimal(10,2) NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transcations`
--

INSERT INTO `transcations` (`id`, `date`, `description`, `credit`, `debit`, `account_no`, `account_bal`, `branch_id`) VALUES
(1, '2020-10-19 21:34:31', 'WITHDRAWN TO 703505029', '0.00', '500.00', 1, '49500.00', 1),
(2, '2020-10-19 21:46:24', 'TO Kevin Junior', '0.00', '500.00', 1, '49000.00', 3),
(3, '2020-10-19 21:46:24', 'FROM Brian Mwangi James', '500.00', '0.00', 2, '50500.00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `savings_transcations`
--
ALTER TABLE `savings_transcations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcations`
--
ALTER TABLE `transcations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `account_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savings_transcations`
--
ALTER TABLE `savings_transcations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transcations`
--
ALTER TABLE `transcations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
