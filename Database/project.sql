-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 05:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `Id_` int(11) NOT NULL,
  `Name_` varchar(100) NOT NULL,
  `Description_` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`Id_`, `Name_`, `Description_`) VALUES
(1, 'Just got here', 'Play Game for first time.'),
(2, 'You did it!!!', 'Gesture Recognition Complete.'),
(3, 'Mamma Mia!', 'Play Game for first time in easy mode.'),
(4, 'Vagrant', 'Make 500 score in easy'),
(5, 'Mercenary', 'Make 1000 score in easy'),
(6, 'Zoomer', 'Play Game for first time in medium mode.'),
(7, 'Booster', 'Make 500 score in medium'),
(8, 'Wonder balls', 'Make 1000 score in medium'),
(9, 'Green Spot', 'Get 50 or more green balls in Medium'),
(10, 'The Crown', 'Play Game for first time in hard mode.'),
(11, 'Hunters Mark', 'Make 500 score in hard.'),
(12, ' Defender Of The Crown', 'Make 1000 score in hard'),
(13, 'Pro or what?', 'Complete without geting any red balls in hard mode.'),
(14, 'Hyper Driver', 'All three mods has played.'),
(15, 'How do you get here?', 'Complete all achievements.'),
(16, 'Master Sooner', 'In all mode score 900 or more.'),
(17, 'Crystal Ball', 'In all mode score 1700 or more.'),
(18, 'On Top', 'In top 3 in leaderboard.');

-- --------------------------------------------------------

--
-- Table structure for table `achievement_unlock`
--

CREATE TABLE `achievement_unlock` (
  `User_Name` varchar(255) NOT NULL,
  `Achievement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `high_score_easy`
--

CREATE TABLE `high_score_easy` (
  `User_Name` varchar(255) NOT NULL,
  `Score` int(10) NOT NULL,
  `Difficulty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `high_score_easy`
--

INSERT INTO `high_score_easy` (`User_Name`, `Score`, `Difficulty`) VALUES
('shoto', 390, 'Easy'),
('shoto', 245, 'Medium'),
('shoto', 380, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `User_Name` varchar(50) NOT NULL,
  `Hi_Score` int(11) NOT NULL,
  `Difficulty` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`User_Name`, `Hi_Score`, `Difficulty`) VALUES
('shoto', 20, 'Medimum');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(255) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `verifiy_code` int(11) NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `User_name`, `Email`, `Pass`, `verifiy_code`, `verified_at`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'test', 'devicharandasari123@gmail.com', 'charan123', 268110, '2024-02-06 11:22:50', '962fd8304d535b17e2edc37e4ae4ed61d4ef594409d3de69abce7564d5fd49a3', '2024-02-08 07:33:49'),
(6, 'shoto', 'smitrudakiya094@gmail.com', 'smit', 203637, '2024-02-29 21:20:26', NULL, NULL),
(7, 'zeel', 'mehta.zeal810@gmail.com', 'zeel@1234', 409932, '2024-03-02 11:09:09', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`Id_`);

--
-- Indexes for table `achievement_unlock`
--
ALTER TABLE `achievement_unlock`
  ADD PRIMARY KEY (`User_Name`,`Achievement`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`User_Name`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
