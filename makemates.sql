-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 03:42 AM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `user_id` int(11) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `relStatus` varchar(20) DEFAULT NULL,
  `scDetails` varchar(150) DEFAULT NULL,
  `workDetails` varchar(200) DEFAULT NULL,
  `ltDetails` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`user_id`, `nickname`, `dob`, `age`, `contactNo`, `status`, `relStatus`, `scDetails`, `workDetails`, `ltDetails`) VALUES
(1, 'Rogue Moder', '2000-05-12', 20, '+91 7234979654', 'I am Repsonsible for what is said not for what you understand.', 'Bachelor', 'a:2:{s:6:\"scName\";s:35:\"Christuraja School, Hata Kushinagar\";s:6:\"scPsYr\";s:4:\"2018\";}', 'a:2:{s:5:\"workN\";s:10:\"Programmer\";s:5:\"workD\";s:16:\"I am Programmer.\";}', 'a:3:{s:4:\"add1\";s:4:\"Hata\";s:4:\"add2\";s:10:\"Kushinagar\";s:4:\"add3\";s:6:\"274203\";}'),
(2, 'Chotu Sharma', '2002-05-18', 17, '2147483647', 'Nothing', 'Single', NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 2, 1),
(3, 1, 2);

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
(1, '15f6db6ddf85a78f67ba687eca563b09a598c1dd', 1),
(3, '2e32f24c2ad19db70e124ac27f3d30d62156143e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photopost`
--

CREATE TABLE `photopost` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photoPath` varchar(40) DEFAULT NULL,
  `photoText` varchar(60) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '1548826649.png', 1, '2019-01-30 05:37:29'),
(2, '1548826893.png', 2, '2019-01-30 05:41:33');

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
(1, 'hello how are you', 1, '2019-01-30 10:32:56'),
(2, 'This is new one', 1, '2019-01-30 10:33:03'),
(3, 'Ir Refreshes this time\n', 1, '2019-01-30 10:33:14'),
(4, 'A', 1, '2019-01-30 10:33:18'),
(5, 'b`', 1, '2019-01-30 10:33:21'),
(6, 'sdfsdf', 1, '2019-01-30 10:33:25'),
(7, 'dfdsf', 1, '2019-01-30 10:33:26'),
(8, 'fdsadf', 1, '2019-01-30 10:33:28'),
(9, 'sdfsf', 1, '2019-01-30 10:33:30'),
(10, 'sdsaef', 1, '2019-01-30 10:33:31'),
(11, 'dfsdfsf', 1, '2019-01-30 10:33:34'),
(12, 'asfsadf', 1, '2019-01-30 10:33:35'),
(13, 'This is shubham sharma', 2, '2019-01-30 11:11:45'),
(14, 'Hello Everybody Good Night', 1, '2019-01-31 22:38:39');

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
(1, 'Arush Sharma', 'rogueModer', 'arush3339@gmail.com', '$2y$10$68Q3c/ygu2orJu3qZEZ/3uJv82iEtGnPJHMSwG9LEycqes1.qBR9O'),
(2, 'Shubham Sharma', 'shubhamsharma', 'shubhamsharma.jpss@gmail.com', '$2y$10$8g7nFXzQllVHrj4b1biYluSSfuSBJbDWWIm68DRZIivrDu4zuGRH.'),
(3, 'John Doe', 'johndoe', 'johndoe@gmail.com', '$2y$10$ArMzqGQ.oBvlyGUm7vfdYuGI5okvu/ARvC708BLXrvLrPNb7SrwHa'),
(4, 'Tony Stark', 'tonystarch', 'tony@gmail.com', '$2y$10$1LUuqOzL67zhkwlhWY1OK.s.ETFy281xk8YhC7hdhoN3ttIJjHwhS'),
(5, 'David Malan', 'davidmalan', 'davidmalan@gmail.com', '$2y$10$9KJW6/Oxib3V30aF7tRboe3WQbJWPZVUK86Jm8cud0RcAjHJw0msK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`user_id`);

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
-- Indexes for table `photopost`
--
ALTER TABLE `photopost`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `add_followers`
--
ALTER TABLE `add_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photopost`
--
ALTER TABLE `photopost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `textpost`
--
ALTER TABLE `textpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
