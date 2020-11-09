-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 09, 2020 at 03:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

CREATE Database blog;

USE blog;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `image`) VALUES
(1, 'Corentin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'coco.jpg'),
(2, 'Gaël', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'sterv.jpg'),
(3, 'Daniel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'danou.jpg'),
(4, 'Kevin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'kev.jpg'),
(7, 'Sinan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'sinan.jpg'),
(8, 'Lucas', 'Actuel PDG du blog', 'lulu.jpg'),
(9, 'Nicolas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'nico.jpg'),
(10, 'Jules', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'jules.jpg'),
(11, 'Alex', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas.', 'Alex.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201009092742', '2020-10-09 09:28:16', 41),
('DoctrineMigrations\\Version20201016063231', '2020-10-16 06:33:38', 88),
('DoctrineMigrations\\Version20201016065053', '2020-10-16 06:51:01', 61),
('DoctrineMigrations\\Version20201016084858', '2020-10-16 08:49:11', 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`, `is_active`) VALUES
(29, 'lucasperez702@gmail.com', '{\"text\": \"ROLE_ADMIN\"}', '$2y$10$DJzJX4x.7v5jJ5dtXIROO.XS1eV5qJKgCqjkXHlZJ.EJjQrkk2A6a', 'lucas', 0),
(30, 'a@a.a', '{\"text\": \"ROLE_ADMIN\"}', '$2y$13$N1CnZ7lllFLnVkRl3FSiY.BbY0XRZd668tkxaqD.MK6dRrATy.qu.', 'a', 0),
(31, 'test@test.com', '{\"text\": \"ROLE_USER\"}', '$2y$13$T12fXB2kRiWMifoE4Ib5HOTiWC773VviWX9w94Z5h0GU5pnZEJq9O', 'test', 0),
(32, 'euh@euh.com', '{\"text\": \"ROLE_USER\"}', '$2y$10$MYzudy23zskNSx3vf2C2ze7n/QHQU6fBVECaGG55SP9TkL2uBgGD6', 'euh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
