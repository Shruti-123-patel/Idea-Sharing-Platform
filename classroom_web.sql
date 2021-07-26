-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 04:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_idea`
--

CREATE TABLE `all_idea` (
  `id` int(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_idea`
--

INSERT INTO `all_idea` (`id`, `title`, `section`, `user_id`, `description`) VALUES
(20, 'vg', 'Robotics', 9, 'vbchgf'),
(21, 'Robot army', 'Robotics', 10, 'we can make robot army '),
(22, 'girl_safety', 'Software', 11, 'We can make software like google map which will be on by pressing only one button that device will be on automatically and the location will be on sent to police. '),
(23, 'g_u', 'Robotics', 12, 'dsdytdy'),
(24, 'v', 'Lifestyle of human', 12, 'nhgg'),
(25, 'railway', 'Other', 10, 'gfhtrerqres hgewytrwbf hgdwety');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idea_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diya`
--

CREATE TABLE `diya` (
  `idea_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diya`
--

INSERT INTO `diya` (`idea_id`, `date_`) VALUES
(23, '2021-07-11 11:14:58'),
(24, '2021-07-11 15:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(6) NOT NULL,
  `token` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `name`, `email`, `password`, `token`, `photo`) VALUES
(12, 'Diya', 'diya@gmail.com', '$2y$10', '921a73f562384537863623880da9f1', 'WIN_20210605_15_41_54_Pro.jpg'),
(10, 'Unnu', 'shruti29032003@gmail.com', '$2y$10', '0b64bc1b9ac39d1367c9bda33ceabc', 'Screenshot (1).png'),
(11, 'Vaibhavi', 'shruti293003@gmail.com', '$2y$10', '4d9dfbbbabe625fdfe98a6e0ce47e7', 'Screenshot (1).png'),
(9, 'Shruti', 'shruti@gmail.com', '$2y$10', 'f3384cd4db8519f89b407dd9dff4b8', 'life.png');

-- --------------------------------------------------------

--
-- Table structure for table `shruti`
--

CREATE TABLE `shruti` (
  `idea_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shruti`
--

INSERT INTO `shruti` (`idea_id`, `date_`) VALUES
(20, '2021-07-11 00:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `unnu`
--

CREATE TABLE `unnu` (
  `idea_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unnu`
--

INSERT INTO `unnu` (`idea_id`, `date_`) VALUES
(21, '2021-07-11 03:25:25'),
(25, '2021-07-15 17:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `vaibhavi`
--

CREATE TABLE `vaibhavi` (
  `idea_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaibhavi`
--

INSERT INTO `vaibhavi` (`idea_id`, `date_`) VALUES
(22, '2021-07-11 07:40:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_idea`
--
ALTER TABLE `all_idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `all_idea_ibfk_1` (`user_id`);

--
-- Indexes for table `diya`
--
ALTER TABLE `diya`
  ADD KEY `idea_id` (`idea_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `shruti`
--
ALTER TABLE `shruti`
  ADD KEY `idea_id` (`idea_id`);

--
-- Indexes for table `unnu`
--
ALTER TABLE `unnu`
  ADD KEY `idea_id` (`idea_id`);

--
-- Indexes for table `vaibhavi`
--
ALTER TABLE `vaibhavi`
  ADD KEY `idea_id` (`idea_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_idea`
--
ALTER TABLE `all_idea`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `all_idea`
--
ALTER TABLE `all_idea`
  ADD CONSTRAINT `all_idea_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `persons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diya`
--
ALTER TABLE `diya`
  ADD CONSTRAINT `diya_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `all_idea` (`id`);

--
-- Constraints for table `shruti`
--
ALTER TABLE `shruti`
  ADD CONSTRAINT `shruti_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `all_idea` (`id`);

--
-- Constraints for table `unnu`
--
ALTER TABLE `unnu`
  ADD CONSTRAINT `unnu_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `all_idea` (`id`);

--
-- Constraints for table `vaibhavi`
--
ALTER TABLE `vaibhavi`
  ADD CONSTRAINT `vaibhavi_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `all_idea` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
