-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 10:10 AM
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

INSERT INTO `about` VALUES(1, 'Rogue Moder', '2000-05-12', 20, '+91 7234979654', 'I am Repsonsible for what is said not for what you understand.', 'Bachelor', 'a:2:{s:6:\"scName\";s:35:\"Christuraja School, Hata Kushinagar\";s:6:\"scPsYr\";s:4:\"2018\";}', 'a:2:{s:5:\"workN\";s:10:\"Programmer\";s:5:\"workD\";s:16:\"I am Programmer.\";}', 'a:3:{s:4:\"add1\";s:4:\"Hata\";s:4:\"add2\";s:10:\"Kushinagar\";s:4:\"add3\";s:6:\"274203\";}');
INSERT INTO `about` VALUES(2, 'Chotu Sharma', '2002-05-18', 17, '2147483647', 'Nothing', 'Single', NULL, NULL, NULL);
INSERT INTO `about` VALUES(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `about` VALUES(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

INSERT INTO `add_followers` VALUES(3, 1, 2);

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

INSERT INTO `login_tokens` VALUES(3, '32e273085925ee7780b5933e41211b8cf28400e7', 1);
INSERT INTO `login_tokens` VALUES(7, '29977aa50c02e50e99d633aaa242da965c968eb3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `un` varchar(64) DEFAULT NULL,
  `textPost` varchar(200) DEFAULT NULL,
  `photoPost` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` VALUES(1, 1, 'Array', 'Helllo', NULL, '2019-02-13');
INSERT INTO `post` VALUES(2, 1, 'rogueModer', 'Hello', NULL, '2019-02-13');
INSERT INTO `post` VALUES(3, 1, 'rogueModer', 'hello How are you', NULL, '2019-02-13');
INSERT INTO `post` VALUES(4, 1, 'rogueModer', NULL, '1550026207.jpeg', '2019-02-13');
INSERT INTO `post` VALUES(5, 1, 'rogueModer', NULL, NULL, '2019-02-13');
INSERT INTO `post` VALUES(6, 1, 'rogueModer', NULL, NULL, '2019-02-13');
INSERT INTO `post` VALUES(7, 1, 'rogueModer', 'This is me...', '1550026576.jpeg', '2019-02-13');
INSERT INTO `post` VALUES(8, 1, 'rogueModer', 'Hello', NULL, '2019-02-13');
INSERT INTO `post` VALUES(9, 1, 'rogueModer', 'Hello', NULL, '2019-02-13');
INSERT INTO `post` VALUES(10, 1, 'rogueModer', 'Hello', NULL, '2019-02-13');
INSERT INTO `post` VALUES(11, 1, 'rogueModer', NULL, '1550027193.jpeg', '2019-02-13');
INSERT INTO `post` VALUES(12, 1, 'rogueModer', NULL, '1550027481.jpg', '2019-02-13');
INSERT INTO `post` VALUES(13, 1, 'rogueModer', 'This is my frnd', '1550027587.jpeg', '2019-02-13');
INSERT INTO `post` VALUES(14, 1, 'rogueModer', 'hello', NULL, '2019-02-13');
INSERT INTO `post` VALUES(15, 1, 'rogueModer', 'sdsdd', NULL, '2019-02-13');
INSERT INTO `post` VALUES(16, 1, 'rogueModer', 'Hello', NULL, '2019-02-13');
INSERT INTO `post` VALUES(17, 1, 'rogueModer', 'Hi', '1550028131.jpeg', '2019-02-13');
INSERT INTO `post` VALUES(18, 1, 'rogueModer', 'Hello', '1550106650.jpeg', '2019-02-14');
INSERT INTO `post` VALUES(19, 1, 'rogueModer', 'This my new Pic during exm....', '1550112619.jpeg', '2019-02-14');
INSERT INTO `post` VALUES(20, 1, 'rogueModer', 'Hello This is arush....', '1550112903.jpeg', '2019-02-14');
INSERT INTO `post` VALUES(21, 1, 'rogueModer', 'Hello', NULL, '2019-02-14');
INSERT INTO `post` VALUES(22, 1, 'rogueModer', 'We are fndzzz.....', NULL, '2019-02-14');
INSERT INTO `post` VALUES(23, 1, 'rogueModer', 'We all are together..........ALWAYS', '1550154905.jpeg', '2019-02-14');
INSERT INTO `post` VALUES(24, 1, 'rogueModer', 'Hello dude...', '1550221200.jpeg', '2019-02-15');
INSERT INTO `post` VALUES(25, 1, 'rogueModer', 'this is my mom', '1550221648.jpeg', '2019-02-15');

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

INSERT INTO `profilepic` VALUES(1, '1548826649.png', 1, '2019-01-30 05:37:29');
INSERT INTO `profilepic` VALUES(2, '1548826893.png', 2, '2019-01-30 05:41:33');
INSERT INTO `profilepic` VALUES(3, '1550216860.png', 10, '2019-02-15 07:47:40');

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

INSERT INTO `textpost` VALUES(1, 'hello how are you', 1, '2019-01-30 10:32:56');
INSERT INTO `textpost` VALUES(2, 'This is new one', 1, '2019-01-30 10:33:03');
INSERT INTO `textpost` VALUES(3, 'Ir Refreshes this time\n', 1, '2019-01-30 10:33:14');
INSERT INTO `textpost` VALUES(4, 'A', 1, '2019-01-30 10:33:18');
INSERT INTO `textpost` VALUES(5, 'b`', 1, '2019-01-30 10:33:21');
INSERT INTO `textpost` VALUES(6, 'sdfsdf', 1, '2019-01-30 10:33:25');
INSERT INTO `textpost` VALUES(7, 'dfdsf', 1, '2019-01-30 10:33:26');
INSERT INTO `textpost` VALUES(8, 'fdsadf', 1, '2019-01-30 10:33:28');
INSERT INTO `textpost` VALUES(9, 'sdfsf', 1, '2019-01-30 10:33:30');
INSERT INTO `textpost` VALUES(10, 'sdsaef', 1, '2019-01-30 10:33:31');
INSERT INTO `textpost` VALUES(11, 'dfsdfsf', 1, '2019-01-30 10:33:34');
INSERT INTO `textpost` VALUES(12, 'asfsadf', 1, '2019-01-30 10:33:35');
INSERT INTO `textpost` VALUES(13, 'This is shubham sharma', 2, '2019-01-30 11:11:45');
INSERT INTO `textpost` VALUES(14, 'Hello Everybody Good Night', 1, '2019-01-31 22:38:39');
INSERT INTO `textpost` VALUES(15, 'adfadadadad', 1, '2019-02-12 15:16:34');
INSERT INTO `textpost` VALUES(16, 'H', 1, '2019-02-12 15:20:45');
INSERT INTO `textpost` VALUES(17, 'Hello', 1, '2019-02-12 15:21:29');
INSERT INTO `textpost` VALUES(18, 'asdad', 1, '2019-02-12 15:21:58');
INSERT INTO `textpost` VALUES(19, 'dsdd', 1, '2019-02-12 15:24:33');

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

INSERT INTO `users` VALUES(1, 'Arush Sharma', 'rogueModer', 'arush3339@gmail.com', '$2y$10$68Q3c/ygu2orJu3qZEZ/3uJv82iEtGnPJHMSwG9LEycqes1.qBR9O');
INSERT INTO `users` VALUES(2, 'Shubham Sharma', 'shubhamsharma', 'shubhamsharma.jpss@gmail.com', '$2y$10$8g7nFXzQllVHrj4b1biYluSSfuSBJbDWWIm68DRZIivrDu4zuGRH.');
INSERT INTO `users` VALUES(3, 'John Doe', 'johndoe', 'johndoe@gmail.com', '$2y$10$ArMzqGQ.oBvlyGUm7vfdYuGI5okvu/ARvC708BLXrvLrPNb7SrwHa');
INSERT INTO `users` VALUES(4, 'Tony Stark', 'tonystarch', 'tony@gmail.com', '$2y$10$1LUuqOzL67zhkwlhWY1OK.s.ETFy281xk8YhC7hdhoN3ttIJjHwhS');
INSERT INTO `users` VALUES(5, 'David Malan', 'davidmalan', 'davidmalan@gmail.com', '$2y$10$9KJW6/Oxib3V30aF7tRboe3WQbJWPZVUK86Jm8cud0RcAjHJw0msK');
INSERT INTO `users` VALUES(6, 'Abhishek Yadav', 'abhishekYadav', 'abhishekyadav@gmail.com', '$2y$10$b.VI5DsSC/z9.3h3quT0XeJpsPF3QyNOi5Wr6v.Up.2eapYd2QVkW');
INSERT INTO `users` VALUES(7, 'Rahul Ojha', 'rahulOjha', 'rahulOjha@gmail.com', '$2y$10$vU3L5lzvvVUUNj6fEOfTTuGVMR9Xy8OwJKC1AQZDlAvCutnNEMOe6');
INSERT INTO `users` VALUES(8, 'Rahul Ojha', 'rahulOjha', 'rahulOjha@gmail.com', '$2y$10$VfZrWApASGKgmLb1wFVFT.dB6FriHyExJr2TkOUXeap8KX82.a4yi');
INSERT INTO `users` VALUES(9, 'Tony Stark', 'tonyStark', 'tonystark@gmail.com', '$2y$10$oekL4YS/qD3u9MT/93M9SuKcFnIOEVzk7o0F2I6/WuuPmnpVsvKxm');
INSERT INTO `users` VALUES(10, 'Narendra Modi', 'narendraModi', 'narendraModi@gmail.com', '$2y$10$8sBFy8XqHaAHTjG0sFDHWe3EPhJ4tO4OSsLm6A4GmrRnEYgoEztIm');

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
-- Indexes for table `post`
--
ALTER TABLE `post`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `textpost`
--
ALTER TABLE `textpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
