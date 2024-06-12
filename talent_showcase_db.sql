-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 12:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talent_showcase_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(24) NOT NULL,
  `event_name` varchar(45) NOT NULL DEFAULT 'NULL',
  `description` text NOT NULL DEFAULT 'NULL',
  `location` varchar(25) NOT NULL DEFAULT 'NULL',
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follower_id` int(24) NOT NULL,
  `user_id` int(24) NOT NULL,
  `followered_id` int(24) NOT NULL,
  `followered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(24) NOT NULL,
  `user_id` int(24) NOT NULL,
  `media_type` varchar(44) NOT NULL DEFAULT 'NULL',
  `media_url` varchar(255) NOT NULL DEFAULT 'NULL',
  `description` text NOT NULL DEFAULT 'NULL',
  `uploaded_at` date NOT NULL DEFAULT current_timestamp(),
  `ispublished` varchar(12) NOT NULL DEFAULT 'false',
  `media_title` varchar(24) NOT NULL DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `user_id`, `media_type`, `media_url`, `description`, `uploaded_at`, `ispublished`, `media_title`) VALUES
(1, 2, 'image', '../../assets/server/6669c1e8ef347.jpg', 'inmsm', '2024-06-12', 'false', 'Grapic work'),
(2, 2, 'video', '../../assets/server/6669c22ab6e73.mp4', 'something good', '2024-06-12', 'false', 'Located'),
(3, 2, 'audio', '../../assets/server/666a0c7411fa7.mp3', 'am sing my self', '2024-06-12', 'false', 'My usic');

-- --------------------------------------------------------

--
-- Table structure for table `talents`
--

CREATE TABLE `talents` (
  `talent_id` int(24) NOT NULL,
  `talent_name` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(24) NOT NULL,
  `username` varchar(24) DEFAULT 'NULL',
  `email` varchar(44) DEFAULT 'NULL',
  `password` varchar(255) NOT NULL DEFAULT 'NULL',
  `fullname` varchar(200) NOT NULL DEFAULT 'NULL',
  `date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `place_of_birth` varchar(400) NOT NULL DEFAULT 'NULL',
  `profile` varchar(255) NOT NULL DEFAULT 'NULL',
  `current_address` varchar(255) NOT NULL DEFAULT 'NULL',
  `type_of_talent` varchar(255) NOT NULL DEFAULT 'NULL',
  `status` varchar(24) NOT NULL DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `fullname`, `date_of_birth`, `place_of_birth`, `profile`, `current_address`, `type_of_talent`, `status`) VALUES
(1, 'NULL', 'hamisifaraji369@gmail.com', '$2y$10$RZqH/TaM2deBbWuDw83o4.PIR4KeMXSxPFSpGsf43Ga1V8UvFscmu', 'NULL', '2024-06-12', 'NULL', 'NULL', 'NULL', 'NULL', 'incomplete'),
(2, 'hhjjjj', 'yusufu@gmail.com', '$2y$10$FnB06TnOW92tAP5K7d9GueOdnI5ulSV.RdEKkgoMGtTMpW3yVjPIy', 'Hamisi Faraji Hamisi', '2024-06-04', 'samunge', '../../assets/server/16669aafb05cd31.39219004.jpeg', 'Kigoma', 'Musician', 'complete'),
(3, 'NULL', 'zai@gmail.com', '$2y$10$Zcw1ID86ri2qutcKCDzPouteNGJFmt8UHldY04Q5zW7EEFvp9TAYm', 'NULL', '2024-06-12', 'NULL', 'NULL', 'NULL', 'NULL', 'incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(24) NOT NULL,
  `media_id` int(24) NOT NULL,
  `user_id` int(24) NOT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follower_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `talents`
--
ALTER TABLE `talents`
  ADD PRIMARY KEY (`talent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follower_id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `talents`
--
ALTER TABLE `talents`
  MODIFY `talent_id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(24) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
