-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 06:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `message_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_id`, `from_id`, `content`, `created`, `modified`) VALUES
(1, 6, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(2, 2, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(3, 6, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(4, 3, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(5, 6, 5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(6, 3, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(7, 5, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(8, 6, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-04-16 03:26:46', '2019-04-16 03:26:46'),
(23, 6, 6, 'fadfasdfad', '2019-04-17 11:55:31', '2019-04-17 11:55:31'),
(24, 3, 6, 'fasdfasdfad', '2019-04-17 11:55:43', '2019-04-17 11:55:43'),
(26, 4, 6, 'dfsdafsdf', '2019-04-17 11:56:32', '2019-04-17 11:56:32'),
(27, 4, 6, 'dasdasd', '2019-04-18 15:41:07', '2019-04-18 15:41:07'),
(28, 4, 6, 'dasdasd', '2019-04-18 15:41:30', '2019-04-18 15:41:31'),
(29, 3, 6, 'data', '2019-04-18 15:42:26', '2019-04-18 15:42:26'),
(30, 3, 6, 'fadfad', '2019-04-18 15:43:08', '2019-04-18 15:43:08'),
(31, 1, 10, '', '2019-04-19 08:14:44', '2019-04-19 08:14:44'),
(32, 4, 10, 'the quick little brown fox jump over the back of the lazy dog. The quick little brown fox jump over the back of the lazy dog\r\n', '2019-04-19 08:16:00', '2019-04-19 08:16:00'),
(33, 1, 10, '', '2019-04-19 08:19:16', '2019-04-19 08:19:16'),
(34, 10, 4, 'dfaskjklfjsal dnfasdf\r\n', '2019-04-21 05:44:06', '2019-04-21 05:44:07'),
(35, 4, 10, 'dfadsfasdfad', '2019-04-21 05:44:17', '2019-04-21 05:44:17'),
(36, 4, 10, 'the quick little brown fox jump over the back of the lazy dog. the quick little brown fox jump over the back of the lazy dog. the quick little brown fox jump over the back of the lazy dog.', '2019-04-21 05:58:05', '2019-04-21 05:58:05'),
(37, 4, 10, 'fasdfd', '2019-04-21 06:19:29', '2019-04-21 06:19:29'),
(38, 4, 10, 'dfdf', '2019-04-21 06:19:38', '2019-04-21 06:19:38'),
(39, 4, 10, 'fasdfads', '2019-04-21 06:20:25', '2019-04-21 06:20:25'),
(40, 4, 10, 'kjdfoabdkfahsdf', '2019-04-21 06:20:32', '2019-04-21 06:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'The title', 'This is the post body.fdsafd', '2019-04-15 13:06:19', '2019-04-15 07:43:37'),
(2, 'A title once again', 'And the post body follows.', '2019-04-15 13:06:19', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2019-04-15 13:06:19', NULL),
(4, 'dinnes ', 'dfadfasd', '2019-04-15 07:40:35', '2019-04-15 07:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `hubby` text,
  `last_login_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_ip` varchar(20) NOT NULL,
  `modified_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `gender`, `birthdate`, `hubby`, `last_login_time`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(1, 'data', 'data@data', '12345678', 'userphoto/icon_user_2.png', NULL, NULL, NULL, '0000-00-00 00:00:00', '2019-04-16 03:31:46', '2019-04-16 03:31:46', '', ''),
(2, 'data', 'data@data45', '25d55ad283aa400af464c76d713c07ad', 'userphoto/icon_user_2.png', NULL, NULL, NULL, '0000-00-00 00:00:00', '2019-04-16 03:55:03', '2019-04-16 03:55:03', '::1', '::1'),
(3, 'dinnes', 'dinnes.apor@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'userphoto/icon_user_2.png', NULL, NULL, NULL, '0000-00-00 00:00:00', '2019-04-16 04:00:00', '2019-04-16 04:00:00', '::1', '::1'),
(4, 'Liandro Sanico', 'liandro@sanico.net', '25d55ad283aa400af464c76d713c07ad', 'userphoto/icon_user_2.png', NULL, NULL, NULL, '0000-00-00 00:00:00', '2019-04-16 04:02:09', '2019-04-16 04:02:09', '::1', '::1'),
(6, 'Dinnes Apor', 'dinnes.sanico@gamail.com', 'b64f1a77b1b317d347f5cb79332c86d2', '', '1', '1995-01-21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrasdf', '2019-04-19 07:11:54', '2019-04-16 04:22:06', '2019-04-19 07:11:54', '::1', '::1'),
(7, 'kokoy', 'kokoy.mail@gamail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2019-04-16 04:23:26', '2019-04-01 00:00:00', '::1', '::1'),
(8, 'czxczxczx', '', '', 'C:\\xampp\\htdocs\\projects\\PRO-001\\cakephp\\app\\webro', '1', '1995-01-21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0000-00-00 00:00:00', '2019-04-16 09:12:11', '2019-04-16 09:12:11', '', ''),
(9, 'dinne Apor', 'dinnes.apor@gamil.com', '25f9e794323b453885f5181f1b624d0b', 'userphoto/icon_user.png', '1', '2019-04-15', 'dfsdfasdfsd', '2019-04-17 11:34:19', '2019-04-17 11:34:03', '2019-04-17 11:34:54', '::1', '::1'),
(10, 'Dinnes Apor', 'dinnes.apor@gwion.net', '1f6135e503e3ae5654d39dc93a0a18ea', 'userphoto/pp_dinnes.png', '1', '1995-01-21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2019-04-21 05:42:57', '2019-04-19 08:12:10', '2019-04-21 05:42:57', '::1', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
