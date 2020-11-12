-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 07:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `coverphotos`
--

CREATE TABLE `coverphotos` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends_req`
--

CREATE TABLE `friends_req` (
  `id` int(100) NOT NULL,
  `friend1` int(100) NOT NULL,
  `friend2` int(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends_tbl`
--

CREATE TABLE `friends_tbl` (
  `id` int(100) NOT NULL,
  `friend1` int(100) NOT NULL,
  `friend` int(100) NOT NULL,
  `friend_date` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `userid` varchar(100) NOT NULL,
  `timestamp` date NOT NULL,
  `action_performed` varchar(100) NOT NULL,
  `source_page_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeedtable`
--

CREATE TABLE `newsfeedtable` (
  `post_id` int(100) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `owner` varchar(25) NOT NULL,
  `news` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `likes` int(100) NOT NULL DEFAULT '0',
  `dislike` int(100) NOT NULL DEFAULT '0',
  `comment` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `options` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imgurl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `post_id` int(11) NOT NULL,
  `news` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `date` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `user` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profilephotos`
--

CREATE TABLE `profilephotos` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `date` int(50) NOT NULL,
  `img` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `post_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `uid` int(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(500) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `cover_pic` varchar(100) NOT NULL DEFAULT 'coverpic/default.jpg',
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`uid`, `first_name`, `last_name`, `email`, `gender`, `phone`, `password`, `dob`, `profile_pic`, `cover_pic`, `status`) VALUES
(1, 'ligin', 'Abraham', 'demo2@gmail.com', 'Male', '9496861291', 'e10adc3949ba59abbe56e057f20f883e', '2020-04-24', 'assets/profilepic/1-porsche-taycan-turbo-s-2020-fd-hero-front.jpg', 'coverpic/default.jpg', 1),
(2, 'Ligin', 'Abraham', 'demo3@gmail.com', 'Female', '54321', '827ccb0eea8a706c4c34a16891f84e7b', '2020-04-17', 'assets/profilepic/1587965416ef8030e97d8ed942d65a0436203f48f6.jpg', 'coverpic/default.jpg', 1),
(3, 'Fahad', 'Fasil', 'fahad@123', 'Male', '454545444', '202cb962ac59075b964b07152d234b70', '2018-12-08', 'assets/profilepic/1588057462Fahadhfaasil.jpg', 'coverpic/default.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coverphotos`
--
ALTER TABLE `coverphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends_tbl`
--
ALTER TABLE `friends_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeedtable`
--
ALTER TABLE `newsfeedtable`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `profilephotos`
--
ALTER TABLE `profilephotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coverphotos`
--
ALTER TABLE `coverphotos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends_tbl`
--
ALTER TABLE `friends_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsfeedtable`
--
ALTER TABLE `newsfeedtable`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilephotos`
--
ALTER TABLE `profilephotos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
