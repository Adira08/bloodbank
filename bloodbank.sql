-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 07:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int NOT NULL,
  `hospital` text NOT NULL,
  `category` text NOT NULL,
  `stock` text NOT NULL,
  `hospitalid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `hospital`, `category`, `stock`, `hospitalid`) VALUES
(1, 'NRS Medical College & Hospital Blood Centre, 138 AJC BOSE ROAD , KOLKATA, KOLKATA, Kolkata, West Bengal', 'govt ', ' B+Ve:2,<br> O+Ve:8,<br> A+Ve:1, <br> O- : 9', 1),
(2, 'B.M. Birla Heart Research Centre Blood Bank\r\n1st floor,1 National Library Avenue, KOLKATA, Kolkata, West Bengal', 'Private', 'Not Available ', 2),
(3, 'Best hospital Ever, In the world', 'Privet', ' B+Ve:2,<br> O+Ve:8,<br> A+Ve:1, <br> O- : 9', 1),
(4, 'Best hospital Ever, In the world', 'Privet', ' B+Ve:2,<br> O+Ve:8,<br> A+Ve:1, <br> O- : 9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donationreg`
--

CREATE TABLE `donationreg` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `bloodgroup` text NOT NULL,
  `address` longtext NOT NULL,
  `aadhar` int(11) NOT NULL,
  `camp` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donationreg`
--

INSERT INTO `donationreg` (`id`, `name`, `email`, `phone`, `bloodgroup`, `address`, `aadhar`, `camp`, `userid`) VALUES
(1, 'ADITYA KUMAR RAJ', 'adiraj8696@gmail.com', '7250027333', 'O+', 'QT.NO. 2A-7, OFFICER COLONY, JARANGDIH, BERMO.', 2147483647, 0, 0),
(2, 'NITU PRIYA', 'nitupriyamandal095@gmail.com', '6200239047', 'will check at center', 'QT.NO. 2A-7, OFFICES COLONY, JARANGDIH, BERMO.', 2147483647, 0, 0),
(3, 'ADITYA KUMAR RAJ', 'adiraj8696@gmail.com', '7250027333', 'will check at center', 'QT.NO. 2A-7, OFFICERS COLONY, JARANGDIH, BERMO.', 2147483647, 0, 0),
(4, 'ADITYA KUMAR RAJ', 'adiraj8696@gmail.com', '7250027333', 'will check at center', 'QT.NO. 2A-7, OFFICERS COLONY, JARANGDIH, BERMO.', 2147483647, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation_camp`
--

CREATE TABLE `donation_camp` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `address` text NOT NULL,
  `state` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_camp`
--

INSERT INTO `donation_camp` (`id`, `date`, `time`, `address`, `state`, `contact`) VALUES
(1, '0000-00-00', '10:00 a.m - 4p.m', 'Health Care Center, Kestopure, Kolkata, Pin-700102.', 'West Bengal', '797XXX7521'),
(2, '0000-00-00', '10:00a.m - 4:00 p.m', 'Bokaro public school,Sector 2, Bokaro Pin- 829113', 'Jharkhand', '797XXXX521'),
(3, '0000-00-00', '10:00 a.m - 4:00 p.m', 'Techno India University, EM-4, EM Block, Sector V, Bidhannagar, Kolkata, Pin-700091\r\n', 'West Bengal', '797XXXX21');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `hospital` text NOT NULL,
  `district` text NOT NULL,
  `state` text NOT NULL,
  `idnumber` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `phone`, `hospital`, `district`, `state`, `idnumber`, `password`) VALUES
(1, 'Hospital Wala', 'hospital@gmail.com', '', 'Name Of Hospital', '', '', '12587', 'hospitalpass'),
(2, 'ADITYA KUMAR RAJ', 'adiraj8696@gmail.com', '7250027333', 'Internshala Hospital', 'Bokaro', 'Jharkhand', '1587694', '123654');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `bloodgroup` text NOT NULL,
  `location` text NOT NULL,
  `userid` text NOT NULL,
  `hospitalid` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `email`, `phone`, `bloodgroup`, `location`, `userid`, `hospitalid`, `status`) VALUES
(1, 'adiraj8696@gmail.com', 'adiraj8696@gmail.com', '7250027333', 'AB+', 'kestopure, kolkata', '', 2, ''),
(2, 'adiraj8696@gmail.com', 'adiraj8696@gmail.com', '7250027333', 'O-', 'Kestopur Kolkata', '1', 1, ''),
(3, 'NITU PRIYA', 'nitupriyamandal095@gmail.com', '6200239047', 'O+', 'Bokaro, jharkhand', '1', 2, ''),
(4, 'Aditya Raj', 'aditya01@gmail.com', '79XXXX5656', 'B+', 'mera ghar k bagal wala hospital', '1', 1, ''),
(5, 'Aditya Raj', 'aditya01@gmail.com', '79XXXX7521', 'O+', 'sdfsafgafs', '1', 2, ''),
(6, 'Aditya Raj', 'aditya01@gmail.com', '79XXXX7521', 'AB+', 'sxdfgbhjnkml', '1', 1, ''),
(7, 'Aditya Raj', 'aditya01@gmail.com', '79XXXX7521', 'O+', 'asdfghjkmmnbcvghfg', '1', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `bloodGroup` text NOT NULL,
  `address` text NOT NULL,
  `district` text NOT NULL,
  `state` text NOT NULL,
  `aadhar` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `bloodGroup`, `address`, `district`, `state`, `aadhar`, `password`) VALUES
(1, 'Aditya Raj', 'aditya01@gmail.com', '79XXXX7521', '', '', '', '', 0, '123456'),
(2, 'ADITYA KUMAR RAJ', 'adiraj8696@gmail.com', '', '', 'QT.NO. 2A-7, OFFICER COLONY, JARANGDIH, BERMO.', 'Bokaro', 'Jharkhand', 2147483647, '123654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donationreg`
--
ALTER TABLE `donationreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_camp`
--
ALTER TABLE `donation_camp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donationreg`
--
ALTER TABLE `donationreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation_camp`
--
ALTER TABLE `donation_camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
