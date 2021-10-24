-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 09:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `dt`) VALUES
(1, 'Mohammad Am', 'admin@gmail.com', '$2y$10$fSTleKuMhyM1evalDm7VXev45fW7RiyykM8Jqltia8KV6mYcLEWlW', '2021-10-24 19:05:38'),
(2, 'Amir', 'mohammadamir627@gmail.com', '$2y$10$Rm3brpZJ72cLWvYQ7BlTse0wDn/.4v/JsAWXT.y4WWH5M81iUn7qu', '2021-10-24 19:06:09'),
(3, 'User', 'User@mail.com', '$2y$10$4.o9rUa/Z0Kr9Y3/JA3Y8eKngR9s6QV4NLevhs1LYamwtCenylT1i', '2021-10-24 19:07:14'),
(4, 'jacob', 'jacob@mail.com', '$2y$10$Go0LU/3lgQoRk7M.TaVVruoAIzesL05TMGqyCw19j.b58q6oWgwzG', '2021-10-24 19:08:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
