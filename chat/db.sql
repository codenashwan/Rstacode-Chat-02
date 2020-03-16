-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 12:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `meseege`
--

CREATE TABLE `meseege` (
  `messege_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `messege_content` text NOT NULL,
  `date_of_send` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meseege`
--

INSERT INTO `meseege` (`messege_id`, `send_id`, `receive_id`, `messege_content`, `date_of_send`) VALUES
(1, 3, 4, 'slaw chonit kak ahmad', '2020-03-16 17:57:53'),
(2, 4, 3, 'slaw chonit kak nashwan', '2020-03-16 17:58:07'),
(5, 4, 6, 'ex1', '2020-03-16 17:58:07'),
(6, 3, 7, 'ex2', '2020-03-16 17:58:07'),
(22, 3, 4, 'slaw', '2020-03-16 23:19:40'),
(23, 3, 4, 'slaw chonit kak ahmad', '2020-03-16 23:20:19'),
(24, 4, 3, 'Slaw kak nashwan farmw', '2020-03-16 23:20:27'),
(25, 3, 5, 'chonit hanasa', '2020-03-16 23:21:04'),
(26, 5, 3, 'Choni baqurban', '2020-03-16 23:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `send_request`
--

CREATE TABLE `send_request` (
  `iid` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `response_id` int(11) NOT NULL,
  `is_accept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send_request`
--

INSERT INTO `send_request` (`iid`, `request_id`, `response_id`, `is_accept`) VALUES
(5, 3, 4, 1),
(6, 5, 3, 1),
(7, 6, 3, 1),
(22, 10, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `age`, `gender`) VALUES
(3, 'nashwan', 'nashwan.via.ps3@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 22, 1),
(4, 'ahmad', 'ahmad@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 22, 1),
(5, 'dlakam', 'dlakam@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 18, 2),
(6, 'jihad', 'jihad@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 18, 1),
(10, 'raviar', 'raviar@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 18, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meseege`
--
ALTER TABLE `meseege`
  ADD PRIMARY KEY (`messege_id`);

--
-- Indexes for table `send_request`
--
ALTER TABLE `send_request`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meseege`
--
ALTER TABLE `meseege`
  MODIFY `messege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `send_request`
--
ALTER TABLE `send_request`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
