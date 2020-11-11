-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2020 at 10:32 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WCF`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(250) NOT NULL,
  `chat_sender` varchar(250) NOT NULL,
  `chat_receiver` varchar(250) NOT NULL,
  `chat_content` longtext NOT NULL,
  `chat_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chat_status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_sender`, `chat_receiver`, `chat_content`, `chat_timestamp`, `chat_status`) VALUES
(20, 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', '6a6a6798ff5ea6f8fdc1c4b80eb2db1549c08e61', 'hello?', '2020-11-11 08:49:47', 0),
(21, 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', '1c1fa3259932310c0f3355512bcf629700f75b3a', 'hello?', '2020-11-11 08:49:59', 0),
(22, 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', '9129d9208d5ee58235a74be75d2ef0f9cbb2f48d', 'hello?', '2020-11-11 08:50:17', 0),
(23, 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', '6a6a6798ff5ea6f8fdc1c4b80eb2db1549c08e61', 'Good morning ?', '2020-11-11 08:51:56', 0),
(24, '6a6a6798ff5ea6f8fdc1c4b80eb2db1549c08e61', 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', 'hello?', '2020-11-11 08:52:39', 0),
(25, '6a6a6798ff5ea6f8fdc1c4b80eb2db1549c08e61', 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', 'hello?', '2020-11-11 09:09:42', 0),
(26, 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', '6a6a6798ff5ea6f8fdc1c4b80eb2db1549c08e61', 'nice lunch?', '2020-11-11 09:23:55', 0),
(27, 'b8ef9962eddbd65f211a07ceeff5cac61f19eb40', '6a6a6798ff5ea6f8fdc1c4b80eb2db1549c08e61', 'uko ajje?', '2020-11-11 09:24:09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
