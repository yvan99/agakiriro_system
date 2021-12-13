-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 09:10 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `fullnames` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullnames`, `email`, `phone`) VALUES
(11, 'mugisha emmy', 'mugishaemmanuel88@gmail.com', '0788505050'),
(15, 'irera gloire', 'ireragloire87@gmail.com', '0788505050');

-- --------------------------------------------------------

--
-- Table structure for table `agakiriro`
--

CREATE TABLE `agakiriro` (
  `aga_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `admin_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agakiriro`
--

INSERT INTO `agakiriro` (`aga_id`, `name`, `location`, `phone`, `admin_id`) VALUES
(1, 'gako', 'Ngoma', '0788303030', 0),
(2, 'remera', 'Bugesera', '0788404040', 11),
(7, 'karongi Heza', 'karongi', '0788505050', 15);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `comment_title` varchar(255) NOT NULL,
  `comment_body` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_title`, `comment_body`, `user_id`) VALUES
(1, 'Taxes', 'there is raising of taxes each and every day', 9);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `unit_price` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createdDate` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `quantity`, `unit_price`, `description`, `createdDate`, `user_id`) VALUES
(3, 'King', 2, 10, 150000, 'A king mattress is the widest mattress on the market at 76 inches wide and 80 inches long. This bed size is great for single sleepers who like to sprawl out or couples with kids and pets.', '2021-Nov-21', 9),
(4, 'Queen', 2, 34, 150000, 'The queen mattress is 60 inches wide and 80 inches long. It offers plenty of space for single sleepers and works best for couples. Queen-sized beds fit great in master bedrooms that are at least 10 x 10 feet.', '2021-Nov-Thu', 9),
(5, 'DeskTable', 5, 16, 40000, 'desktable has 60 inches wide and 40 inches long', '2021-Dec-Sun', 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`type_id`, `type_name`, `user_id`) VALUES
(2, 'Bed', 9),
(3, 'cabinet', 9),
(4, 'desk', 9),
(5, 'Table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `purchasetbl`
--

CREATE TABLE `purchasetbl` (
  `purchase_id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `trans_date` date NOT NULL,
  `purchase_qty` int(255) NOT NULL,
  `unit_price` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'super admin'),
(2, 'admin'),
(3, 'worker');

-- --------------------------------------------------------

--
-- Table structure for table `saletbl`
--

CREATE TABLE `saletbl` (
  `sale_id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `sale_qty` int(255) NOT NULL,
  `unit_price` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `trans_date` date NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transact_id` int(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `product` int(255) NOT NULL,
  `trans_date` date NOT NULL,
  `quantity` int(255) NOT NULL,
  `unit_price` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transact_id`, `type`, `product`, `trans_date`, `quantity`, `unit_price`, `total`, `user_id`) VALUES
(30, 'Purchase', 1, '2021-11-30', 2, 150000, 300000, 9),
(41, 'Purchase', 3, '2021-12-05', 1, 150000, 150000, 9),
(42, 'Purchase', 4, '2021-12-05', 2, 150000, 300000, 9),
(43, 'Purchase', 5, '2021-12-05', 1, 40000, 40000, 9),
(45, 'Sale', 3, '2021-12-05', 2, 150000, 300000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(255) NOT NULL,
  `role_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `role_id`, `email`, `password`, `status`) VALUES
(1, 2, 'admin@admin.com', 'admin', 'active'),
(2, 3, 'gcampk@gmail.com', '123', 'active'),
(4, 1, 'super@admin.com', 'super', 'active'),
(5, 2, 'mugishaemmanuel88@gmail.com ', '25489103', 'active'),
(8, 2, 'ireragloire87@gmail.com ', '09471625', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agakiriro_id` int(255) NOT NULL,
  `capital` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `idn0` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `names`, `phone`, `email`, `agakiriro_id`, `capital`, `gender`, `idn0`) VALUES
(9, 'mugisha emmanuel', '0784164225', 'gcampk@gmail.com', 2, 'MONEY', 'Male', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `worker_app`
--

CREATE TABLE `worker_app` (
  `id` int(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `idn0` varchar(16) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `agakiriro` int(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Capital` varchar(255) NOT NULL,
  `tin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_app`
--

INSERT INTO `worker_app` (`id`, `names`, `idn0`, `phone`, `agakiriro`, `gender`, `email`, `Capital`, `tin`) VALUES
(14, 'test', '11', '0788505050', 1, 'Male', 'angelbucura@gmail.com', 'MONEY', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agakiriro`
--
ALTER TABLE `agakiriro`
  ADD PRIMARY KEY (`aga_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `purchasetbl`
--
ALTER TABLE `purchasetbl`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `product` (`product`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `saletbl`
--
ALTER TABLE `saletbl`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `worker_app`
--
ALTER TABLE `worker_app`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `agakiriro`
--
ALTER TABLE `agakiriro`
  MODIFY `aga_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchasetbl`
--
ALTER TABLE `purchasetbl`
  MODIFY `purchase_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saletbl`
--
ALTER TABLE `saletbl`
  MODIFY `sale_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transact_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `worker_app`
--
ALTER TABLE `worker_app`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
