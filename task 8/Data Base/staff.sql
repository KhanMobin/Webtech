-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 08:23 AM
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
-- Database: `admin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `salary` int(10) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `username`, `password`, `gender`, `salary`, `dob`, `image`) VALUES
(8, 'Rahim', 'rahim', '$2y$12$ylv6hKWOT53xuBdH73yMueg', 'Male', 10000, '2023-03-24', 'Screenshot (1).png'),
(9, 'Araf', 'araf', '$2y$12$usmkKyd9XEMAo.o4QA0YZOr', 'Male', 10000, '2023-03-31', 'down1).jpeg'),
(11, 'AHMED', 'ahmed', '$2y$12$1r0BeQAy2KB1Qk5TwZKQb.6', 'Male', 120000, '2023-03-18', '1678761886.png'),
(12, 'Jamal', 'jamal', '$2y$12$0dYyrqJ9DKt3pyr8Hj/6Qet', 'Male', 20000, '2023-03-26', 'tree-736885__480.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
