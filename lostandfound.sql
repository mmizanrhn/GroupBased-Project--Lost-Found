-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 09:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostandfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `item_pic` varchar(255) NOT NULL,
  `item_key` varchar(11) NOT NULL,
  `item_create_dt` date NOT NULL,
  `item_update_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `item_name`, `item_category`, `item_description`, `item_pic`, `item_key`, `item_create_dt`, `item_update_dt`) VALUES
(11, 2, 'S7 Edage', 'Business', 'fdsdsfsf', '11230978_461723750655742_4469170145402161215_n.png', 'eKNSTLp', '2017-02-09', '2017-02-21 03:07:06'),
(14, 5, 'Md. shojib', 'Animal', 'this is test image i need to upload ', '5.jpg', 'NydJkis', '2017-02-13', '2017-02-21 03:07:01'),
(15, 1, 'Shojin', 'Others', 'Shojib', '2.jpg', 'xNHD9Ib', '2017-02-13', '2017-02-21 03:06:58'),
(16, 8, 'Watch', 'Business', 'This is my fitness watch ..it really important for me . if any one found this please contact with me ..thanks ', 'lost & Found.png', 'xcDUPVW', '2017-02-07', '2017-02-21 03:06:51'),
(17, 51, 'My First Product ', 'Business', 'this is very import Product for me so i need to care this ...thanks ', 'report_lost.jpg', 'LMhdMjz', '2017-02-14', '2017-02-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_number` varchar(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_des` text NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_code` varchar(120) NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_name`, `user_pass`, `user_email`, `user_number`, `user_address`, `user_country`, `user_dob`, `user_des`, `user_img`, `user_code`, `user_status`) VALUES
(1, 'Md. Shoriful Islam Arman', '123456', 'mdarman780@gmail.com', '452157878', '326/Gulabgh Malibagh, Dhaka', 'Pakistan', '2017-02-14', '<p>\r\n	sfsdfsfsdfsddfsfds</p>\r\n', '111230978_461723750655742_4469170145402161215_n.png', '', 1),
(2, 'Md. Shoriful Islam Arman', '123456', 'admin@gmail.com', '01959180034', 'xyz@gmail.com', 'Borishal', '2017-02-20', 'Hi I am programmer ...please give me Hi Five ', '21.jpg', '', 0),
(51, 'Md shohan', '123456', '123456@gmail.com', '01959180030', '125/gulbagh Malibagh , Dhaka', 'Dhaka', '2017-02-22', 'Hi i am professional graphic designer please help me to get new item for my item....', '513.jpg', 'WoXmldEZeP', 0),
(52, 'Md shohan', '123456', '123456@gmail.com', '', '', '', '0000-00-00', '', '', 'WoXmldEZeP', 0),
(53, 'Md. Sumon ', '123456', 'hello@gmail.com', '01959180030', '326/Gulabgh Malibagh, Dhaka', 'Khulna', '2017-02-22', 'Hello How r u r you ok man ', '532.jpg', 'yKmAZKnBYJ', 0),
(54, 'Md. Sumon Ahammed', '123456', 'hello@gmail.com', '', '', '', '0000-00-00', '', '', 'yKmAZKnBYJ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
