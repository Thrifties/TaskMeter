-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 06:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `fname`, `lname`, `email`, `pass`) VALUES
('2020100987', 'Shin', 'Prof', 'shin@gmail.com', 'pasword');

-- --------------------------------------------------------

--
-- Table structure for table `groupings`
--

CREATE TABLE `groupings` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL DEFAULT 'Group',
  `faculty_id` varchar(20) DEFAULT 'Not Assigned',
  `activity_id` int(11) DEFAULT NULL,
  `stud_ID` varchar(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `taskP` int(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `file` blob NOT NULL,
  `status` enum('completed','assigned') DEFAULT 'assigned',
  `role` enum('member','leader') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupings`
--

INSERT INTO `groupings` (`group_id`, `group_name`, `faculty_id`, `activity_id`, `stud_ID`, `name`, `task`, `taskP`, `deadline`, `file`, `status`, `role`) VALUES
(274866, 'SAD', '2020100987', 532048, '2020101234', 'Jasmine salonga', 'Back-end coding', 40, '2022-12-21', '', 'assigned', 'member'),
(274866, 'SAD', '2020100987', 484675, '2020102003', 'alver manabat', 'Front-end Coding', 40, '2022-12-29', '', 'assigned', 'member'),
(274866, 'SAD', '2020100987', 335072, '2020104258', 'kenshin sayson', 'documentation', 20, '2022-12-31', 0x75706c6f6164732f36333962336238646465323434362e34363933343433312e706466, 'completed', 'leader'),
(313982, 'Group', 'Not Assigned', 443435, '2020104258', 'ken Shin', 'Magjogging', 60, '2022-12-24', 0x75706c6f6164732f36333962343761633435363835332e31343338333530312e706466, 'completed', 'leader'),
(313982, 'Group', 'Not Assigned', 840708, '2020101234', 'Jasmine salonga', 'tumalon', 20, '2022-12-24', '', 'assigned', 'member'),
(313982, 'Group', 'Not Assigned', 512579, '2020102003', 'alver manabat', 'hohoho', 20, '2022-12-18', '', 'assigned', 'member'),
(17640, 'Group', 'Not Assigned', 139789, '2020104258', 'ken Shin', 'hehehe', 50, '2022-12-24', '', 'assigned', 'leader'),
(17640, 'Group', 'Not Assigned', 549763, '2020101234', 'Jasmine salonga', 'asdfasdf', 20, '2022-12-27', '', 'assigned', 'member'),
(17640, 'Group', 'Not Assigned', 719896, '2020102003', 'alver manabat', 'fgcccxcx', 30, '2022-12-18', '', 'assigned', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `fname`, `lname`, `email`, `pass`) VALUES
('2020101234', 'Jasmine', 'salonga', 'jas@gmail.com', 'qwerty'),
('2020102003', 'alver', 'manabat', 'alver@gmail.com', 'password123'),
('2020104258', 'ken', 'Shin', 'kenshin@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `groupings`
--
ALTER TABLE `groupings`
  ADD KEY `group_id` (`activity_id`,`group_id`),
  ADD KEY `stud_id` (`stud_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groupings`
--
ALTER TABLE `groupings`
  ADD CONSTRAINT `stud_ID` FOREIGN KEY (`stud_ID`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
