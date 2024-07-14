-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 03:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_info`
--
CREATE DATABASE IF NOT EXISTS `admin_info` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `admin_info`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(15) NOT NULL,
  `admin_name` varchar(50) NOT NULL CHECK (octet_length(`admin_name`) > 0),
  `password` varchar(20) NOT NULL CHECK (octet_length(`password`) >= 8),
  `gmail` varchar(50) NOT NULL CHECK (octet_length(`gmail`) > 10),
  `phone_no` varchar(10) NOT NULL,
  `alt_phone_no` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL CHECK (`gender` in ('Male','Female','Other')),
  `blood_grp` varchar(3) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `user_type` char(9) NOT NULL CHECK (`user_type` in ('sup_admin','admin'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `password`, `gmail`, `phone_no`, `alt_phone_no`, `gender`, `blood_grp`, `address`, `dob`, `user_type`) VALUES
('admin1', 'Vaibhav', 'password', 'vaibhav@gmail.com', '9109863175', '8109863175', 'Male', 'B+', 'Mall road, Opposite Police Station, Morar, Gwalior', '2000-01-01', 'sup_admin'),
('admin2', 'Sivam', 'password', 'sivam@gmail.com', '9109863132', '9109863182', 'Male', 'A-', 'Mall road, Opposite Police Station, Morar, Gwalior', '2001-02-03', 'sup_admin'),
('admin3', 'Keshav', 'password', 'keshav3@gmail.com', '8109864578', '9109863155', 'Male', 'B-', 'Mall road, Opposite Police Station, Morar, Gwalior', '2001-05-12', 'sup_admin');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `subject`, `year`, `sub_code`, `file`, `uploaded_on`) VALUES
(1, 'Information Technology', 2017, '6377', 'F_2017_6377.pdf', '2024-07-14 13:36:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gmail` (`gmail`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `alt_phone_no` (`alt_phone_no`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file` (`file`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `college`
--
CREATE DATABASE IF NOT EXISTS `college` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `college`;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`) VALUES
(1, 'C.S.E'),
(3, 'E.E'),
(2, 'I.T');

-- --------------------------------------------------------

--
-- Table structure for table `clg_session`
--

CREATE TABLE `clg_session` (
  `id` int(11) NOT NULL,
  `session_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clg_session`
--

INSERT INTO `clg_session` (`id`, `session_name`) VALUES
(1, '2021-2024'),
(2, '2022-2025'),
(3, '2023-2026');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` varchar(15) NOT NULL,
  `faculty_name` varchar(50) NOT NULL CHECK (octet_length(`faculty_name`) > 0),
  `password` varchar(20) NOT NULL CHECK (octet_length(`password`) >= 8),
  `gmail` varchar(50) NOT NULL CHECK (octet_length(`gmail`) > 10),
  `phone_no` varchar(10) NOT NULL,
  `alt_phone_no` varchar(10) NOT NULL,
  `gender_id` char(1) NOT NULL CHECK (`gender_id` in ('M','F','O')),
  `blood_grp` varchar(3) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `branch_id` int(11) NOT NULL CHECK (`branch_id` > 0),
  `user_id` char(1) NOT NULL DEFAULT 'F' CHECK (`user_id` = 'F')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_name`, `password`, `gmail`, `phone_no`, `alt_phone_no`, `gender_id`, `blood_grp`, `address`, `dob`, `branch_id`, `user_id`) VALUES
('faculty1', 'name1', 'password', 'faculty1@gmail.com', '9109863175', '8109863175', 'M', 'B+', 'Mall road, Opposite Police Station, Morar, Gwalior', '2000-01-01', 1, 'F'),
('faculty2', 'name2', 'password', 'faculty2@gmail.com', '9109863132', '9109863182', 'M', 'A-', 'Mall road, Opposite Police Station, Morar, Gwalior', '2001-02-03', 1, 'F'),
('faculty3', 'name3', 'password', 'faculty3@gmail.com', '8109864578', '9109863155', 'F', 'B-', 'Mall road, Opposite Police Station, Morar, Gwalior', '2001-05-12', 1, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` char(1) NOT NULL CHECK (`id` in ('M','F','O')),
  `gender` varchar(10) NOT NULL CHECK (`gender` in ('Male','Female','Other'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
('F', 'Female'),
('M', 'Male'),
('O', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(15) NOT NULL,
  `std_name` varchar(50) NOT NULL CHECK (octet_length(`std_name`) > 0),
  `guardian_name` varchar(50) NOT NULL CHECK (octet_length(`guardian_name`) > 0),
  `gmail` varchar(50) NOT NULL CHECK (octet_length(`gmail`) > 10),
  `phone_no` varchar(10) NOT NULL,
  `guardian_phone_no` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender_id` char(1) NOT NULL CHECK (`gender_id` in ('M','F','O')),
  `password` varchar(20) NOT NULL CHECK (octet_length(`password`) >= 8),
  `blood_grp` varchar(3) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `branch_id` int(11) NOT NULL CHECK (`branch_id` > 0),
  `session_id` int(11) NOT NULL CHECK (`session_id` > 0),
  `user_id` char(1) NOT NULL DEFAULT 'S' CHECK (`user_id` = 'S')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_name`, `guardian_name`, `gmail`, `phone_no`, `guardian_phone_no`, `dob`, `gender_id`, `password`, `blood_grp`, `address`, `branch_id`, `session_id`, `user_id`) VALUES
('22017C04001', 'Raj Shivhare', 'guardian1', 'student1@gmail.com', '7894561231', '7894561241', '2006-01-03', 'M', 'password', 'B+', 'Mall road, Opposite Police Station, Morar, Gwalior', 1, 2, 'S'),
('22017C04002', 'Sivam', 'guardian2', 'student2@gmail.com', '7894561232', '7894561242', '2006-01-03', 'M', 'password', 'B+', 'Mall road, Opposite Police Station, Morar, Gwalior', 1, 2, 'S'),
('22017C04003', 'Keshav Rajpoot', 'guardian3', 'student3@gmail.com', '7894561233', '7894561243', '2006-01-03', 'M', 'password', 'B+', 'Mall road, Opposite Police Station, Morar, Gwalior', 1, 1, 'S'),
('22017C04004', 'Aman', 'guardian4', 'student4@gmail.com', '7894561234', '7894561244', '2006-01-03', 'M', 'password', 'B+', 'Mall road, Opposite Police Station, Morar, Gwalior', 1, 1, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(1) NOT NULL CHECK (`id` in ('S','F')),
  `user` char(7) NOT NULL CHECK (`user` in ('Student','Faculty'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`) VALUES
('F', 'Faculty'),
('S', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_name` (`branch_name`);

--
-- Indexes for table `clg_session`
--
ALTER TABLE `clg_session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_name` (`session_name`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gmail` (`gmail`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `alt_phone_no` (`alt_phone_no`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gender` (`gender`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gmail` (`gmail`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `guardian_phone_no` (`guardian_phone_no`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clg_session`
--
ALTER TABLE `clg_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `faculty_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `clg_session` (`id`),
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
