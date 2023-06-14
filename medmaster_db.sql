-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 09:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medmaster_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kimmishjhgmailcom`
--

CREATE TABLE `kimmishjhgmailcom` (
  `med_id` int(11) NOT NULL,
  `Medication_name` varchar(100) DEFAULT NULL,
  `DOSAGE` varchar(10) DEFAULT NULL,
  `frequency` varchar(15) DEFAULT NULL,
  `begin_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `user_id` int(11) NOT NULL,
  `medication_name` varchar(100) NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`user_id`, `medication_name`, `dosage`, `frequency`, `begin_date`, `end_date`) VALUES
(2, 'panadol', '2capsules', 'twice', '2023-06-06', '2023-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwod` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `email`, `passwod`) VALUES
(2, 'manjohu', 'omwamijoshua913@gmail.com', 'joshua'),
(4, 'wepuhulu', '56wepu23hulu@gmail.com', '11111'),
(6, 'wonder', 'wonderj@gmail.com', '23451'),
(8, 'peter munywa', 'peter23munyua@gmail.com', '23456'),
(11, 'stella', 'stela2534@gmail.com', '23452'),
(13, 'kamau', 'kamau465@gmail.com', 'kamau'),
(14, 'kamenju', 'kamenjujoseph@gmail.com', '234567890'),
(17, 'rudiger', 'rudiger35477@gmail.com', '3456'),
(18, 'kimmich', 'kimmishjh@gmail.com', 'eeeee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kimmishjhgmailcom`
--
ALTER TABLE `kimmishjhgmailcom`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kimmishjhgmailcom`
--
ALTER TABLE `kimmishjhgmailcom`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medication`
--
ALTER TABLE `medication`
  ADD CONSTRAINT `adding_forkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
