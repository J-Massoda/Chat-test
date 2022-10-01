-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message`, `user_id`, `date`) VALUES
(67, 'john is a handsome boy', 1, '2021-12-27 20:16:36'),
(68, ' i love my life', 5, '2021-12-30 22:48:19'),
(69, ' i love my life so much!!!', 5, '2021-12-30 07:23:19'),
(70, ' there\'s this gurl baby that makes me not to think straight and i don\'t like it at all when she\'s around she distract me but when not around i\'m distracted', 5, '2021-12-30 22:20:19'),
(71, 'i love more of how i am\r\n', 5, '2021-12-31 00:25:22'),
(72, 'kmxznklZM', 5, '2021-12-31 00:26:35'),
(73, 'two is a handsome boy', 7, '2022-01-02 00:53:46'),
(74, 'john jk.sdjk.as\r\n\r\n', 7, '2022-01-02 00:54:36'),
(75, '/.,ðŸ˜ðŸ¤·â€â™‚ï¸ðŸŽ‚âœ”ðŸ˜†ðŸ˜ŽðŸŽ¶ðŸ’– yo', 7, '2022-01-03 05:21:39'),
(76, 'web designing is becoming interesting', 9, '2022-01-03 05:29:51'),
(77, 'ðŸ˜ŠðŸ’–ðŸŽ¶ðŸ˜ŽðŸŽ‚ðŸ¤·â€â™‚ï¸ðŸ˜ðŸ˜œ i lo', 9, '2022-01-08 22:26:01'),
(78, 'dynamic web is excellent\r\n', 11, '2022-02-02 01:50:04'),
(79, 'i \r\nlove dynamic web', 11, '2022-02-02 01:46:27'),
(80, 'i love this course', 11, '2022-02-02 01:47:17'),
(81, 'dynamic is good course\r\n', 11, '2022-02-02 03:06:37'),
(82, 'my lappy is back\r\n', 11, '2022-02-02 11:45:17'),
(83, 'my lappy is back\r\n', 11, '2022-04-06 03:42:29'),
(84, 'second day of using my lappy', 11, '2022-04-06 19:37:24'),
(85, 'a messaging app\r\n', 11, '2022-04-08 04:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registration_date`) VALUES
(1, 'Dre', 'dregmail.com', '12345', '2021-12-27 14:08:53'),
(2, 'mike', 'mike@gmail.com', '123', '2021-12-27 14:08:53'),
(3, 'GG', 'doubleghotmail.com', '12345', '2021-12-27 14:39:41'),
(4, 'harry', 'harry@gmail.com', '12345', '2021-12-27 14:51:06'),
(5, 'Mel', 'Melplug@gmail.com', '1234', '2021-12-30 22:45:56'),
(6, 'girl', 'girl@gmail.com', '1234', '2022-01-03 05:26:47'),
(7, 'boy', 'boy@gmail.com', '1234', '2022-01-09 02:10:19'),
(8, 'junior@gmail.com', '1234', '2022-02-02 01:49:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
