-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 02:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_orbitz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins_login`
--

CREATE TABLE `admins_login` (
  `sno` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins_login`
--

INSERT INTO `admins_login` (`sno`, `email`, `password`) VALUES
(1, 'mishaqrajpoot0009@gmail.com', '$2y$10$QOlOtVMRt2CEocmpU62WOePkNEMJhhskyQ.btLEKUcwOvTZ/wtdva');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `organization` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL,
  `posted_date` date NOT NULL,
  `last_date` date NOT NULL,
  `province` varchar(128) NOT NULL,
  `requirements` varchar(128) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `organization`, `image`, `description`, `posted_date`, `last_date`, `province`, `requirements`, `department`) VALUES
(11, '', 'hello', '', '  sfdsd', '2022-11-26', '2022-12-14', 'Punjab', '  ewewe', 'pre-medical'),
(12, '', 'console.log(Hassaan) 1+1', '', '    WEWE    ', '2022-11-26', '2022-11-30', 'Punjab', '    SD    ', 'pre-medical'),
(13, '', 'Y2K@', '', '  sds  ', '2022-11-29', '2022-11-22', 'Balochistan', '  sdsd  ', 'pre-medical'),
(14, '', 'dsafkjhdsakdfsdsfh', '', 'fsdlkjhfsda', '2022-12-03', '2022-12-30', 'Sindh', 'fsdfd', 'pre-medical'),
(16, '', 'Islamia college', '', 'must be computer literate', '2022-12-06', '2022-12-31', 'Sindh', 'Intermediate', 'pre-medical'),
(20, '', 'Y@K', 'images1670333943.jpg', 'sdsd', '2022-12-06', '2022-12-31', 'Sindh', 'Intermediate', 'pre-medical'),
(21, '', 'Y@K', 'images1670334812.jpg', 'dshjf;ljdf', '2022-12-06', '2022-12-31', 'Punjab', 'Intermediate', 'pre-medical'),
(23, '', 'HELLOhujhjhjhj', 'images1670393362.jpg', '  sdsd  ', '2022-12-07', '2022-12-22', 'Balochistan', '  dddddd  ', 'pre-medical'),
(24, '', 'HELLO', 'images1672906564.jpg', 'sdg', '2023-01-05', '2023-01-11', 'Sindh', 'gfdg', ''),
(25, '', ';lkjfdsa', 'images1672906644.jpg', 'ffidkj', '2023-01-05', '2023-01-19', 'Punjab', 'Intermediate', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `id` int(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activation_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`id`, `name`, `email`, `password`, `activation_link`, `status`) VALUES
(1, 'Ishaq', 'mishaqrajpoot0009@gmail.com', '$2y$10$YayeutEHpi2.q4dd9Tw80OJq6uFqPxgQw8EaXtAQ.wobSq00MiiqC', '', 0),
(2, 'Muhammad Ishaq Rajpoot', 'mishaqrajpoot24@gmail.com', '$2y$10$I7.F3zS/aVMy.0jSPZfwKOQ.KIngATh7P4XJ1S2JruV2AcljXWdqC', '', 0),
(3, 'Abdul Ghani', 'abc@gmail.com', '$2y$10$uxtdIrZA5WZ/rlKucOfJme7LUkUsfK7hJEsItGrKDDr2kK4tYSDA6', '', 0),
(6, 'Imti', 'Imti@gmail.com', '$2y$10$AjO6dc9Ru.MncE4g9ZepJuYnNxTmvJbRp2bjaRaZYp7WYbowcLS62', '', 0),
(7, '', '', '$2y$10$bzRN6ldjYSpbDATWsYAvoOllXisgOk4lGqTxDAhbBMHmTVrBGFgAu', '', 0),
(8, 'Muhammad Ishaq Rajpoot', 'rjee5755@gmail.com', '$2y$10$xhG1mX0FhkMxZXom7zEwU.vrT91BdBLYdURSikaCL66RfRO.l5f7y', '', 0),
(9, 'Faheem', 'Faheem@gmail.com', '$2y$10$U9yXi3LJvcueB19h2vJxcuyqM9.3PrCqw5cNFPA1MT4KcfmLgZSnG', '', 0),
(10, 'Imti', 'Imti69@gmail.com', '$2y$10$Cvsb/OYXrWs2YwPPiUuS8uNL9y/SMLDqo8JHRHM7gUIuizvncmneu', '21dd3a2641991409fe2736c01e1906c4', 0),
(11, 'Muhammad Ishaq Rajpoot', 'irl@gmail.com', '$2y$10$LI0XHxifJ41vOUmoidMvle571CSrRyQhZD10QKnxSNyU9DBH3natK', '47e6ef3d8301524071a72ddcf368286a', 0),
(12, 'Muhammad Ishaq Rajpoot', 'ishaqr871@gmail.com', '$2y$10$qwnf1YL0OqCOOIrgyV0/jepx74WENj9uxA8G3XT6HELkMTpGPEGqS', 'd81302225708b93dbb98dafa845f2634', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins_login`
--
ALTER TABLE `admins_login`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins_login`
--
ALTER TABLE `admins_login`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
