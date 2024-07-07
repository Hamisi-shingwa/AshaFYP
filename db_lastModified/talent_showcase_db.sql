-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 03:11 PM
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
  `audience` varchar(24) NOT NULL DEFAULT 'all',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(24) NOT NULL DEFAULT 0,
  `user_status` varchar(10) NOT NULL DEFAULT 'poster',
  `profile` varchar(255) NOT NULL DEFAULT 'NULL',
  `profile_type` varchar(24) NOT NULL DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `description`, `location`, `start_date`, `end_date`, `audience`, `created_at`, `user_id`, `user_status`, `profile`, `profile_type`) VALUES
(1, 'BSS', 'searched talents', 'Dar-es-salaam', '2024-07-09', '2024-07-04', 'Musician', '2024-07-02 12:42:22', 1, 'poster', '../../assets/server/6683f5ae7b738.jpg', 'image');

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

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follower_id`, `user_id`, `followered_id`, `followered_at`) VALUES
(1, 1, 1, '2024-07-02 12:05:03');

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
(1, 1, 'video', '../../assets/server/6683ead982c70.mp4', 'Thhis is my woork', '2024-07-02', 'false', 'Haleluya');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(24) NOT NULL,
  `system_name` varchar(45) NOT NULL DEFAULT 'NULL',
  `About_content` varchar(700) NOT NULL DEFAULT 'Null',
  `Address` varchar(90) NOT NULL DEFAULT 'NULL',
  `contact` varchar(12) NOT NULL DEFAULT 'NULL',
  `email` varchar(25) NOT NULL DEFAULT 'NULL',
  `theme` varchar(12) NOT NULL DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `system_name`, `About_content`, `Address`, `contact`, `email`, `theme`) VALUES
(1, 'Talent-Management Systme', 'This issystem for special', 'Kigoma', '0682828', 'zai@gmail.com', 'light');

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
(1, 'hamisi', 'yusufu@gmail.com', '$2y$10$lnm8BBdySyUvJPZARNL5hen2HkbpiISVNpE1dgIeAilwrw8QOuxCq', 'Hamisi Faraji Hamisi', '2024-05-29', 'Dar-es-salaam', '../../assets/server/16683ed1a930945.62695844.jpg', 'Chini ya mashamba ya kahawa', 'Musician', 'complete'),
(2, 'Amics', 'hamisifaraji369@gmail.com', '$2y$10$5ADKxfgxHQWT.wvhSbI57.Pk.sQG1.JqhnHaBYM.zFuScdIDLS1mS', 'Gerevas', '2024-06-11', 'samunge', '../../assets/server/166818181478408.59966983.jpg', 'Mwanza', 'Musician', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(24) NOT NULL,
  `media_id` int(24) NOT NULL,
  `event_id` int(24) NOT NULL DEFAULT 0,
  `user_id` int(24) NOT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`view_id`, `media_id`, `event_id`, `user_id`, `viewed_at`) VALUES
(1, 1, 0, 1, '2024-07-02 12:03:24'),
(2, 1, 0, 1, '2024-07-02 12:43:30'),
(3, 1, 0, 1, '2024-07-02 12:47:54'),
(4, 1, 0, 1, '2024-07-02 12:48:45'),
(5, 1, 0, 1, '2024-07-02 12:49:12'),
(6, 1, 0, 2, '2024-07-02 13:04:47');

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
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

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
  MODIFY `event_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follower_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `talents`
--
ALTER TABLE `talents`
  MODIFY `talent_id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
