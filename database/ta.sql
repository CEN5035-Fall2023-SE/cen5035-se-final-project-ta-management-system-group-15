-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 04:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `number`, `password`) VALUES
(2, 'root', 'admin@gmail.com', '9515446080', '$2y$10$wn6lIruplI5FDYurzI2lUe3exk5bd5fMd7uCzi6qeewj9uMcPWzt6');

-- --------------------------------------------------------

--
-- Table structure for table `commitee`
--

CREATE TABLE `commitee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commitee`
--

INSERT INTO `commitee` (`id`, `name`, `number`, `email`, `password`) VALUES
(2, 'Commitee', '98765687678', 'com@gmail.com', '$2y$10$HJJPq/XcJzFmwGDGVZorrORt29Mwnsv2Jwjt6z/qrlb3DoJaUSfBC');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`) VALUES
(2, 'Science', 'This is the science subject');

-- --------------------------------------------------------

--
-- Table structure for table `department_staff`
--

CREATE TABLE `department_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_staff`
--

INSERT INTO `department_staff` (`id`, `name`, `number`, `email`, `password`) VALUES
(1, 'Navya', '9515446080', 'deprtment@gmail.com', '$2y$10$GvzVv64SwW3BxIZKdvohV.UNnabIe6IW/C/.4/EqtvSfc7qAbOyLe'),
(3, 'sai', '09494147790', 'dep@gmail.com', '$2y$10$6DmlVGCdyD1goPhupWWXS.cEVD5UbmLDVwvhJMbDmItp3T8lXfi66');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `name`, `number`, `email`, `password`) VALUES
(2, 'Vardhan', '98765687678', 'ins@gmail.com', '$2y$10$FXCaLCCzJ9NpCxXtjB.3Bu7P3t4ICmoh6yq5TgBoIUyvnxSO3HJlS');

-- --------------------------------------------------------

--
-- Table structure for table `question_papers`
--

CREATE TABLE `question_papers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question_paper_filename` varchar(255) NOT NULL,
  `answer_filename` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `submitting_time` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_papers`
--

INSERT INTO `question_papers` (`id`, `email`, `question_paper_filename`, `answer_filename`, `description`, `submitting_time`, `status`, `created_at`) VALUES
(3, 'fgg@gmail.com', 'Mount Zion.pdf', 'Mount Zion.pdf', 'Hello World Answer all these', 'next Monday ', 1, '2023-11-08 12:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assistance_applications`
--

CREATE TABLE `teacher_assistance_applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ta_at_north_university` tinyint(1) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `courses` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `score` varchar(30) NOT NULL,
  `exp` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `hall` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_assistance_applications`
--

INSERT INTO `teacher_assistance_applications` (`id`, `name`, `number`, `email`, `ta_at_north_university`, `resume`, `password`, `courses`, `status`, `score`, `exp`, `country`, `state`, `city`, `comment`, `hall`) VALUES
(1, 'Lokesh', '98765687678', 'loke@gmail.com', 0, 'resume/11062003 (1).pdf', '$2y$10$NWgiB7vtVyQLtKlQd0wpPuFdWktqOI69QyOY7u7h4MnMqxZVH2nVW', NULL, 0, '', NULL, NULL, NULL, NULL, 'Excellent', ''),
(3, 'Dileep kumar', '9515446080', 'fgg@gmail.com', 1, 'resume/Dileep kumarAccepting.pdf', '$2y$10$3dtq.8Z9boA9ZZMz2qPvlOzqYpJRI1akPvi0UOge37qsjnDRPGSr2', 'science, history', 2, '3', '2', 'india', 'ap', 'sklm', 'Above Average', ''),
(10, 'Dileep kumar', '9876545678', 'n190486@rguktn.ac.in', 0, 'resume/Dileep kumarOffer Letter for Developer.pdf', '$2y$10$lAP1WJZpiyrOBJFVZB7wcujQk/U8hILHe9Gjdzc6ajh/PS3zEAbU6', 'Maths', 0, '', NULL, NULL, NULL, NULL, '', ''),
(12, 'Lokesh', '9876545678', 'lokesh5552555@gmail.com', 0, 'resume/LokeshOffer Letter for Developer.pdf', '$2y$10$g/TTKq8KqFtV9JwN2J67g.2AP5aSGDG9SVWYpZEs68E5zoNhT3eki', 'Science, Maths', 0, '', NULL, NULL, NULL, NULL, '', ''),
(16, 'sai teja kanakam', '09494147790', 'sai924teja@gmail.com', 1, 'resume/sai teja kanakamSportsPlay.in logo cc.pdf', '$2y$10$cNWBRdZf0Locc7ISAvqRUeLRxyrJVogYsLbQdVdB25eAXfpVeBV/u', 'Science', 2, '', '3', 'india', 'AP', 'Ponduru', '', 'J28003646');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commitee`
--
ALTER TABLE `commitee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_staff`
--
ALTER TABLE `department_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_papers`
--
ALTER TABLE `question_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_assistance_applications`
--
ALTER TABLE `teacher_assistance_applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commitee`
--
ALTER TABLE `commitee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_staff`
--
ALTER TABLE `department_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_papers`
--
ALTER TABLE `question_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_assistance_applications`
--
ALTER TABLE `teacher_assistance_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
