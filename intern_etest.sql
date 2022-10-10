-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 03:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_etest`
--

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`) VALUES
(1, 'beginner'),
(2, 'intermediate');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg',
  `timeCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `full_name`, `tel`, `address`, `photo`, `timeCreated`) VALUES
(1, 6, 'Edema David ovie', '+2347069027', 'Abuja, NIgeria', 'img/profile/SuperAdmin-62c94e3072ddd.png', '2022-07-06 17:35:34'),
(2, 7, 'John Lee', '+234770880612', 'Abuja, Nigeria', 'img/profile/Teacher-62ce7ce8dfcf7.jpg', '2022-07-06 19:17:27'),
(3, 5, 'Edema David ovie', '1122334455', 'Abuja', 'img/profile/Student-62ce741c46f07.jpg', '2022-07-13 00:28:28'),
(4, 8, 'Chigozie', '105641316541', 'Jabi', 'img/profile/Student2-62ce758c66cbb.jpg', '2022-07-13 00:34:36'),
(5, 9, 'Josh', '08055668899', 'Gwarinpa', 'img/profile/Teacher2-62ce7d45c6e03.jpg', '2022-07-13 01:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` int(3) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `level_id` int(20) NOT NULL,
  `qid` int(2) DEFAULT NULL,
  `question` mediumtext NOT NULL,
  `opt_A` varchar(255) NOT NULL,
  `opt_B` varchar(255) NOT NULL,
  `opt_C` varchar(255) NOT NULL,
  `opt_D` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `author_id` int(10) NOT NULL,
  `timeCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `subject_id`, `level_id`, `qid`, `question`, `opt_A`, `opt_B`, `opt_C`, `opt_D`, `answer`, `author_id`, `timeCreated`) VALUES
(3, 9, 1, NULL, 'Who are you?', 'A Boss', 'A Boy', 'A Legend', 'None of the Above', 'a', 7, '2022-07-04 15:32:29'),
(4, 9, 1, NULL, 'Computer Question?', 'Com', 'Puter', 'Quest', 'Tion', 'b', 7, '2022-07-06 11:17:13'),
(5, 7, 1, NULL, 'What is Zero?', '1', '2', '3', '01', 'd', 9, '2022-07-09 06:29:06'),
(6, 4, 1, NULL, 'What is a Noun?', 'A name', 'A place', 'an animal', 'all of the above', 'd', 9, '2022-07-09 06:30:34'),
(7, 4, 1, NULL, 'What is a pronoun?', 'Used instead of a noun', 'Professional Noun', 'Wise Noun', 'None of the Above', 'a', 9, '2022-07-09 06:34:24'),
(8, 9, 2, NULL, 'How many bytes make a megabyte', '100', '200', '500', '1024', 'd', 7, '2022-07-14 02:36:53'),
(9, 4, 2, NULL, 'what da?', 'yes', 'no', 'any', 'none', 'd', 6, '2022-07-25 07:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `level_id` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `questionCount` int(10) NOT NULL,
  `timeCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `subject_id`, `level_id`, `score`, `questionCount`, `timeCreated`) VALUES
(1, 5, 9, 2, 1, 1, '2022-07-25 06:27:48'),
(2, 5, 9, 1, 2, 2, '2022-07-25 06:34:30'),
(3, 5, 9, 1, 1, 2, '2022-07-25 06:34:49'),
(4, 8, 9, 2, 1, 1, '2022-07-25 07:29:20'),
(5, 8, 9, 1, 1, 2, '2022-07-25 07:29:58'),
(6, 8, 9, 1, 1, 2, '2022-07-25 07:31:36'),
(7, 5, 4, 2, 1, 1, '2022-07-25 07:52:53'),
(8, 5, 4, 2, 0, 1, '2022-07-25 07:53:09'),
(9, 5, 9, 1, 0, 2, '2022-07-25 08:03:22'),
(10, 340, 4, 1, 2, 2, '2022-08-03 04:08:47'),
(11, 340, 4, 1, 2, 2, '2022-08-03 04:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `timeCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `timeCreated`) VALUES
(4, 'English', 0, '2022-06-21 14:25:34'),
(7, 'Maths', 0, '2022-07-01 13:37:34'),
(9, 'Computer', 0, '2022-07-01 13:41:02'),
(15, 'Agriculture', 0, '2022-07-25 07:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `full_name` varchar(50) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `timeProfileUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `timeCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `users_name`, `user_email`, `user_pwd`, `role_id`, `full_name`, `tel`, `address`, `photo`, `timeProfileUpdated`, `timeCreated`) VALUES
(5, 'Student', 'student@email.com', '$2y$10$erX/Xom9LY.JrBucov3VrOgA3wBqBnxpOJaGT0QkC0.fjSePz2Hyu', 3, 'Joshua', '+2340057489', 'Gwarinpa', NULL, '2022-07-27 00:53:05', '2022-06-22 17:08:57'),
(6, 'SuperAdmin', 'admin@email.com', '$2y$10$1VwsuxamxkDjNH8It6blVe7wXODW9I2Rk6oewgur4uZej/Pk9sRrC', 1, 'Edema David ovie', '+2347069027823', 'Abuja, Nigeria', 'img/profile/SuperAdmin-62c94e3072ddd.png', '2022-07-06 17:35:34', '2022-06-22 17:14:09'),
(7, 'Teacher', 'teacher@email.com', '$2y$10$cpS574XEEpR9Zd3h0okPQOgG1mq0tvg0.0l7eGAxUwnL5jfdw5w2q', 2, NULL, NULL, NULL, NULL, '2022-07-27 00:53:05', '2022-06-24 12:10:26'),
(8, 'Student2', 'student2@email.com', '$2y$10$Aei8qXGqBk4jG8m0jsk/ZujC3Bta.prxLyx87ygInUJDuEs6BL7Ce', 3, NULL, NULL, NULL, NULL, '2022-07-27 00:53:05', '2022-06-24 14:29:42'),
(9, 'Teacher2', 'teacher2@email.com', '$2y$10$dfL.cpjhuR/EYbYIlf14Kuk3zVBSbPr77wpleZYn5BE.nC82f/Rr2', 2, NULL, NULL, NULL, NULL, '2022-07-27 00:53:05', '2022-06-28 16:55:41'),
(339, 'Teacher3', 'teacher3@email.com', '$2y$10$cpS574XEEpR9Zd3h0okPQOgG1mq0tvg0.0l7eGAxUwnL5jfdw5w2q', 2, NULL, NULL, NULL, NULL, '2022-07-27 00:53:05', '2022-07-02 09:25:01'),
(340, 'DarkPayne', 'admin@gmail.com', '$2y$10$.ykz5Pxip3G2uXSn6AvI9.MP98isGZ/dSZkTf1QQNsm9CvntYt6AS', 3, NULL, NULL, NULL, NULL, '2022-08-03 04:07:55', '2022-08-03 04:07:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserProfileLink` (`user_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `UserProfileLink` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `quizes`
--
ALTER TABLE `quizes`
  ADD CONSTRAINT `quizes_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `quizes_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizes_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `quizes_ibfk_4` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `scores_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
