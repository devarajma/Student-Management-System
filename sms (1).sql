-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2023 at 05:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(255) NOT NULL,
  `id` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `id`, `username`, `password`) VALUES
('admin', '11', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`userid`, `password`) VALUES
('admin', 'D00F5D5217896FB7FD601412CB890830');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `name` varchar(30) NOT NULL,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`name`, `id`) VALUES
('sem1', 11),
('sem2', 12),
('sem3', 13),
('sem4', 14),
('sem5', 15),
('sem6', 16);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `sub1` varchar(20) NOT NULL,
  `sub2` varchar(20) NOT NULL,
  `sub3` varchar(20) NOT NULL,
  `sub4` varchar(20) NOT NULL,
  `sub5` varchar(20) NOT NULL,
  `tot` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `rno`, `class_name`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `tot`, `grade`) VALUES
('john', 9, 'sem2', '19', '19', '17.95', '17', '17', '89.95', 'A'),
('fariz', 11, 'sem1', '14', '17.625', '', '', '', '31.625', 'Failed'),
('hari', 12, 'sem1', '15.625', '', '', '', '', '15.625', 'Failed'),
('annie', 13, 'sem2', '', '', '', '', '', '', ''),
('rani', 14, 'sem3', '', '', '', '', '', '0', 'Failed'),
('ram', 15, 'sem3', '', '', '', '', '16.5', '16.5', 'Failed'),
('kevin', 16, 'sem4', '', '', '', '', '', '', ''),
('siva', 17, 'sem4', '', '', '', '', '', '', ''),
('don', 18, 'sem5', '', '', '', '', '', '', ''),
('mera', 19, 'sem5', '', '', '', '', '', '', ''),
('fida', 21, 'sem6', '', '', '', '', '', '', ''),
('sonu', 22, 'sem6', '', '', '', '', '', '', ''),
('benja', 24, 'sem1', '17', '', '', '', '', '17', 'Failed'),
('divinit', 25, 'sem1', '19.75', '', '', '', '', '19.75', 'Failed'),
('aneena', 26, 'sem5', '17.275', '', '', '', '', '17.275', 'Failed'),
('ashu', 34, 'sem3', '', '', '', '', '', '', ''),
('jose', 55, 'sem6', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` varchar(20) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `teachers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `semester`, `subject`, `teachers`) VALUES
('11', 'sem1', 'C&PC', 'riya'),
('12', 'sem1', 'java', 'meena'),
('13', 'sem1', '1sub3', ''),
('14', 'sem1', '1sub4', 'Gincy'),
('15', 'sem1', '1sub5', ''),
('21', 'sem2', '2sub1', ''),
('22', 'sem2', '2sub2', 'riya'),
('23', 'sem2', '2sub3', ''),
('24', 'sem2', '2sub4', ''),
('25', 'sem2', '2sub5', ''),
('31', 'sem3', '3sub1', ''),
('32', 'sem3', '3sub2', ''),
('33', 'sem3', '3sub3', ''),
('34', 'sem3', '3sub4', ''),
('35', 'sem3', '3sub5', 'sona'),
('41', 'sem4', '4sub1', ''),
('42', 'sem4', '4sub2', ''),
('43', 'sem4', '4sub3', 'Gincy'),
('44', 'sem4', '4sub4', ''),
('45', 'sem4', '4sub5', ''),
('51', 'sem5', '5sub1', ''),
('52', 'sem5', '5sub2', ''),
('53', 'sem5', '5sub3', 'Gincy'),
('54', 'sem5', '5sub4', ''),
('55', 'sem5', '5sub5', ''),
('61', 'sem6', '6sub1', ''),
('62', 'sem6', '6sub2', ''),
('63', 'sem6', '6sub3', ''),
('64', 'sem6', '6sub4', ''),
('65', 'sem6', '6sub5', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `name` varchar(255) NOT NULL,
  `id` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`name`, `id`, `username`, `password`, `status`) VALUES
('riya', '1', 'riya', 'riya', 'Confirm'),
('Gincy Abraham', '123', 'Gincy', 'Abraham', 'Confirm'),
('dva', '124', 'dev', '123', 'Confirm'),
('meena', '2', 'meena', 'meena', 'Cofirm'),
('sona', '23', 'sona', 'sona', 'Confirm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rno`) USING BTREE,
  ADD UNIQUE KEY `rno` (`rno`),
  ADD KEY `class_name` (`class_name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `class` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
