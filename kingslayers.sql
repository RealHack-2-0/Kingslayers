-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 01:01 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingslayers`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answers`
--

CREATE TABLE `tbl_answers` (
  `ans_id` int(11) NOT NULL,
  `qn_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answers`
--

INSERT INTO `tbl_answers` (`ans_id`, `qn_id`, `answer`, `user_id`, `time`, `status`) VALUES
(43, 5, 'fddfvfv', 'USER1573140499', '2019-11-07 22:26:40', 1),
(44, 5, 'abccccc', 'USER1573140499', '2019-11-07 22:26:40', 1),
(45, 5, 'fvdfvfdvfd', 'USER1573140499', '2019-11-07 22:26:40', 1),
(46, 5, 'fv', 'USER1573140499', '2019-11-07 23:40:30', 1),
(47, 5, 'dfg', 'USER1573140499', '2019-11-07 23:59:57', 1),
(48, 5, 'dsfgvdfs', 'USER1573140499', '2019-11-08 00:13:09', 1),
(49, 5, 'fvdddddd', 'USER1573140499', '2019-11-07 22:26:40', 1),
(50, 5, 'dfv', 'USER1573140499', '2019-11-08 00:40:58', 1),
(51, 6, 'dfsv', 'USER1573140499', '2019-11-08 00:41:30', 1),
(52, 6, 'dfbg', 'USER1573140499', '2019-11-08 01:13:18', 1),
(53, 6, 'dsv', 'USER1573140499', '2019-11-08 01:14:16', 0),
(55, 13, 'dfvdfbdfb', 'USER1573140499', '2019-11-08 04:36:11', 0),
(56, 13, 'fddf', 'USER1573140499', '2019-11-08 04:41:17', 0),
(57, 13, 'df', 'USER1573140499', '2019-11-08 04:59:29', 0),
(58, 13, 'dfsgvdfgfd', 'USER1573140499', '2019-11-08 04:59:42', 0),
(59, 13, 'dsgfdsgdsds', 'USER1573140499', '2019-11-08 05:00:12', 0),
(60, 13, 'dsfdsgds', 'USER1573140499', '2019-11-08 05:03:43', 0),
(61, 13, 'fdgf', 'USER1573140499', '2019-11-08 05:04:31', 0),
(62, 13, 'dfbgfdb', 'USER1573140499', '2019-11-08 05:05:11', 0),
(63, 13, 'fdbdfbgfdbfdbdsf', 'USER1573140499', '2019-11-08 05:06:38', 0),
(64, 13, 'dsvvdfs', 'USER1573140499', '2019-11-08 05:10:25', 0),
(65, 13, 'dsfdsv', 'USER1573140499', '2019-11-08 05:12:09', 0),
(66, 13, 'dsv', 'USER1573140499', '2019-11-08 05:13:19', 0),
(67, 13, 'fvdfdv', 'USER1573140499', '2019-11-08 05:17:36', 0),
(68, 13, 'dfvddddsd', 'USER1573140499', '2019-11-08 05:18:01', 0),
(69, 13, 'dsfcdsf', 'USER1573140499', '2019-11-08 05:18:16', 0),
(70, 13, 'vdsdfsv', 'USER1573140499', '2019-11-08 05:20:48', 0),
(71, 13, 'sdvdsvds', 'USER1573140499', '2019-11-08 05:23:15', 0),
(72, 13, 'dsv', 'USER1573140499', '2019-11-08 05:24:58', 0),
(73, 13, 'dsvsdv', 'USER1573140499', '2019-11-08 05:25:08', 0),
(74, 13, 'dsfv', 'USER1573140499', '2019-11-08 05:25:58', 0),
(75, 13, 'fddfvdfvdfvfdvdfvffdfdvfdvfdvfdfvfdvdf', 'USER1573140499', '2019-11-08 05:26:12', 0),
(76, 13, 'dssdvdsvdsvdsvdsvdsdsvsddsvdsvdsvdsvdsdsvds', 'USER1573140499', '2019-11-08 05:26:23', 0),
(77, 13, 'dsvdsvdsvdsvdsvdsvdsvdsvdsdsvdsvdsdsvds', 'USER1573140499', '2019-11-08 05:26:55', 0),
(78, 13, 'dsvdsvdsvdsvdsvdsvdsvds', 'USER1573140499', '2019-11-08 05:27:19', 0),
(79, 13, 'dfbv', 'USER1573140499', '2019-11-08 05:27:44', 0),
(80, 13, 'vdfvfd', 'USER1573161653', '2019-11-08 05:29:07', 0),
(81, 13, 'dfvfdvdfvdfvdfvfdgbdfbfdbfdbdfbfddsfbvfdsbvfdbgfbgfbdsvdsv', 'USER1573140499', '2019-11-08 05:30:02', 0),
(82, 13, 'dfbdfb', 'USER1573161653', '2019-11-08 05:30:13', 0),
(83, 13, 'dfgdfbfdbfdbfdbfdgfbdf', 'USER1573140499', '2019-11-08 05:30:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marked_questions`
--

CREATE TABLE `tbl_marked_questions` (
  `voted_id` int(11) NOT NULL,
  `qn_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `vote` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marked_questions`
--

INSERT INTO `tbl_marked_questions` (`voted_id`, `qn_id`, `user_id`, `vote`) VALUES
(1, 13, 'USER1573140499', 'up'),
(2, 12, 'USER1573140499', 'down');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `qn_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `marked` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`qn_id`, `user_id`, `heading`, `content`, `upvote`, `downvote`, `marked`, `time`) VALUES
(5, 'USER1573140499', 'Heading', 'nadfksnfkdnosiafjldnl', 0, 0, 1, '2019-11-07 20:58:35'),
(6, 'USER1573140499', 'dfh', 'dfdfgdfg', 0, 1, 1, '2019-11-07 23:11:51'),
(7, 'USER1573140499', 'dsvgdsf', 'bitch sdgfdsgfds', 2, 0, 1, '2019-11-08 01:31:34'),
(8, 'USER1573140499', 'dsf', 'lespe\r\n', 1, 1, 1, '2019-11-08 01:32:48'),
(10, 'USER1573140499', 'headfds', 'dsfgvdsg', 0, 2, 0, '2019-11-08 02:11:37'),
(11, 'USER1573140499', 'aa', 'aaaaa', 2, 0, 1, '2019-11-08 02:11:51'),
(12, 'USER1573159348', 'dsgvdsf', 'hiii how are u\r\n', 5, 17, 1, '2019-11-08 02:55:24'),
(13, 'USER1573159348', 'vdsv', 'dsfvsd', 22, 29, 0, '2019-11-08 03:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`, `register_date`) VALUES
('USER1573140499', 'thuvarahan97', 'thuvarahan97@gmail.com', 'b75ec0d4f5234f39b4a40f3c83484faf', '2019-11-07 20:58:19'),
('USER1573159348', 'thuvarahan', 'thenusan1997@gmail.com', 'accc9105df5383111407fd5b41255e23', '2019-11-08 02:12:28'),
('USER1573161653', 'thu', 'thu@gmail.com', 'accc9105df5383111407fd5b41255e23', '2019-11-08 02:50:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tbl_marked_questions`
--
ALTER TABLE `tbl_marked_questions`
  ADD PRIMARY KEY (`voted_id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`qn_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_marked_questions`
--
ALTER TABLE `tbl_marked_questions`
  MODIFY `voted_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `qn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
