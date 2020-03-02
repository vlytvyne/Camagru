-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2020 at 03:19 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_id`, `photo_id`, `comment`) VALUES
(2, 12, 'New Comment'),
(2, 12, 'Cool'),
(2, 12, 'KKK'),
(2, 12, 'adsad'),
(2, 12, 'dsad'),
(2, 13, 'Great dog!!!'),
(2, 13, 'ad'),
(2, 13, 'adwdq'),
(2, 13, 'New comment');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `photo_id`) VALUES
(1, 13),
(2, 11),
(1, 8),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `creation_timestamp` datetime NOT NULL,
  `user_likes` text NOT NULL,
  `comments` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `filename`, `creation_timestamp`, `user_likes`, `comments`, `user_id`) VALUES
(1, 'photo_1.jpeg', '2020-02-28 17:16:29', '', '', 1),
(2, 'photo_2.jpeg', '2020-02-28 17:16:29', '', '', 1),
(4, 'photo_3.png', '2020-02-28 17:17:18', '', '', 2),
(5, 'photo_5.png', '2020-02-28 17:18:06', '', '', 1),
(6, 'photo_6.jpeg', '2020-02-28 17:18:06', '', '', 1),
(7, 'photo_7.jpg', '2020-02-28 17:18:47', '', '', 1),
(8, 'photo_8.jpg', '2020-02-28 17:18:47', '', '', 2),
(9, 'photo_4.jpeg', '2020-02-28 17:17:19', '', '', 1),
(10, '5e593a61b4a85.png', '2020-02-28 18:05:53', '', '', 1),
(11, '5e5951b96adc5.png', '2020-02-28 19:45:29', '', '', 1),
(12, '5e5990dd18833.png', '2020-02-29 00:14:53', '', '', 1),
(13, '5e59935f2911d.png', '2020-02-29 00:25:35', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `receive_emails` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `activated`, `receive_emails`, `id`) VALUES
('vlytvyne', 'limit4453@gmail.com', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 1, 1, 1),
('gggggg', 'ggg@ggg.com', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 1, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filename` (`filename`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
