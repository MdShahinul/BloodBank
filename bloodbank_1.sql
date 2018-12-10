-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2018 at 06:57 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `blood_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`blood_id`, `name`) VALUES
(1, 'O+'),
(2, 'A+'),
(4, 'AB'),
(5, 'O-'),
(6, 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest` (
  `req_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bg_id` int(100) NOT NULL,
  `req_data` datetime NOT NULL,
  `details` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`req_id`, `name`, `gender`, `age`, `mobile`, `email`, `bg_id`, `req_data`, `details`) VALUES
(1, 'a', 'Female', '20', '23423423422', 'a@g', 2, '2011-08-23 00:00:00', 'Dhaka Medical Collage'),
(2, 'shahinul', 'Male', '20', '01737841019', 'shahinul8439@gmail.com', 1, '2017-12-31 00:00:00', 'Argent'),
(3, 'Md. Shahinul Islam', 'Male', '24', '01737841019', 'shahinul8439@gmail.com', 1, '2018-01-15 00:00:00', 'I Need a blood. Plz help me '),
(4, 'good ', 'Male', '20', '01737841019', 'shahinul8439@gmail.com', 2, '2018-02-10 00:00:00', '1235');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `name`, `mobile`, `email`, `comment`) VALUES
(1, 'shahin', '01737841019', 'shahinul8439@gmail.com', 'Information In need'),
(2, 'Md. Shahinul islam', '01737841019', 'shahinul8439@gmail.com', 'I am very Man'),
(3, 'ami', '01737841019', 'ami@gmail.com', '1230'),
(4, 'admin', '01737841019', 'ami@gmail.com', '1230');

-- --------------------------------------------------------

--
-- Table structure for table `donorregistration`
--

CREATE TABLE `donorregistration` (
  `donar_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `bg_id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donorregistration`
--

INSERT INTO `donorregistration` (`donar_id`, `name`, `gender`, `age`, `mobile`, `bg_id`, `email`, `pwd`, `pic`) VALUES
(5, 'shahinul', 'Male', '20', '01737841019', 4, 'shahin8439@yahoo.com', '123', '4cm_4cm (80kb).jpg'),
(6, 'Suza', 'Female', '20', '01732222222', 2, 'suza@gmail.com', '123', 'suza.jpg'),
(8, 'Abdur Rahman', 'Male', '25', '1234567890', 4, 'abdur@gmail.com', '123', 'abdur.jpg'),
(10, 'Md. Shahinul Islam', 'Male', '24', '01737841019', 1, 'shahinul8439@gmail.com', '123', '30KB1.jpg'),
(11, 'new', 'Male', '20', '01737841019', 5, 'new@gmail.com', '123', 'dddd.jpg'),
(12, 'a', 'Female', '20', '1236547896', 4, 'a@gmail.com', '123', '4R Shahinul.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `bg_id` (`bg_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `donorregistration`
--
ALTER TABLE `donorregistration`
  ADD PRIMARY KEY (`donar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `blood_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donorregistration`
--
ALTER TABLE `donorregistration`
  MODIFY `donar_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD CONSTRAINT `bloodrequest_ibfk_1` FOREIGN KEY (`bg_id`) REFERENCES `bloodgroup` (`blood_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
