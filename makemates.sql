-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 02:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makemates`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_followers`
--

CREATE TABLE `add_followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_followers`
--

INSERT INTO `add_followers` (`id`, `user_id`, `follower_user_id`) VALUES
(2, 1, 6),
(3, 1, 4),
(4, 5, 4),
(5, 5, 2),
(13, 1, 1),
(14, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES
(11, '476d03e735145580ba870765facab1c7676a6fbc', 2),
(23, 'f29f4590577ba057f66478d3b3b6a8fae8d9b5e5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE `profilepic` (
  `id` int(11) NOT NULL,
  `profilePicName` varchar(64) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`id`, `profilePicName`, `user_id`, `date`) VALUES
(1, '1546792594.png', 1, '2019-01-06 16:36:34'),
(2, '1546793967.png', 5, '2019-01-06 16:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `textpost`
--

CREATE TABLE `textpost` (
  `id` int(11) NOT NULL,
  `textpost` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textpost`
--

INSERT INTO `textpost` (`id`, `textpost`, `user_id`, `date`) VALUES
(1, 'Happy New year', 1, '2019-01-01 08:06:29'),
(2, 'Hello Arush', 1, '2019-01-01 08:07:10'),
(3, 'hggg', 1, '2019-01-06 20:25:07'),
(4, 'Hello', 5, '2019-01-06 23:27:33'),
(5, 'Everything goes fine but Not what i expected......', 1, '2019-01-07 15:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fn` varchar(32) DEFAULT NULL,
  `un` varchar(20) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fn`, `un`, `email`, `password`) VALUES
(1, 'Arush Sharma', 'rogueModer', 'arush3339@makemates.com', '$2y$10$9IfPsP/cKHiD1nkE076ad.2wEbMIu1UIWL88Z5X6KB.FRE4wkMm0O'),
(2, 'Aryan Yadav', 'aryanYadav', 'aryanYadav@makemates.com', '$2y$10$Dwjl8OgD/wc7hMWo.wZRCeJfrpEGHoECwDxgi5FaGJjiKHivEk1/y'),
(3, 'Vijeta Sharma', 'vijetaSharma', 'vijeta@makemates.com', '$2y$10$NGBxjf.ip3rBC24i/p3Bj.pM8OelJIqDlkEE/X4v2osNYfBwD22ii'),
(4, 'Aryan Yadav', 'aryanhata', 'aryan111@gmail.com', '$2y$10$nz1OIuV1rVuUK1mybzjYUuLs2ucTkI0quTo4QzyYPriKz/33KwWlG'),
(5, 'Arvind Sharma', 'arvindsharma.jpss', 'arvindsharma.jpss@gmail.com', '$2y$10$WBCfqdYgkNQCDIZxSuB.qe8/uSE7hxTCu8IRlsoJeWdS.v1Y3y6S.'),
(6, 'Seema Sharma', 'seemaSharma', 'seemaSharma@gmail.com', '$2y$10$K2c7IyXHPG/e0s10H27aG.U6mrNTJy5etoDRkx31c.5yUpRQSBf4K'),
(7, 'Shubham Sharma', 'shubhamSharma', 'shubhamSharma@gmail.com', '$2y$10$QP62Celut9UyXjZftdzLQeUUbv.K8JlAQX7iN2Py9CsHzvkbf9yuy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_followers`
--
ALTER TABLE `add_followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textpost`
--
ALTER TABLE `textpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_followers`
--
ALTER TABLE `add_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `textpost`
--
ALTER TABLE `textpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
