-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2023 at 12:08 PM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `likes` int DEFAULT '0',
  `dislike` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `image`, `user_id`, `status`, `likes`, `dislike`) VALUES
(32, 'London', '/assets/images/3f65eb52c980d019f4da342e1eda2bb3.jpeg,/assets/images/ce9df382cf0d7eb171220fedd2211e83.jpeg,/assets/images/001cf9690c6e112627637f7c2ccc445d.jpeg', 1, 1, 1, 7),
(39, 'Germany', '/assets/images/b1c59aa57403bcbf60b7ed06dbf32df7.jpeg,/assets/images/2569acfb247a476d28f7d3c716195606.jpeg,/assets/images/2cbcf968317e6731fdc9875969758dbb.jpeg', 1, 1, 2, 18),
(42, 'Italy', '/assets/images/9c517825301d5da79fa4fc104a5430d9.jpeg,/assets/images/9d0e89478ab54abe464197b91bba1238.jpeg,/assets/images/d0975102905a65ae6ba814b944ce7c94.jpeg,/assets/images/f8ce5c459ffc9d29755238247ea4be40.jpeg', 1, 2, 0, 5),
(43, 'Australya', '/assets/images/2b5aa9aa0ef49f103b17df3014d15d25.jpeg,/assets/images/9ecf0d2dd84a0eda4ed987bdda0c7fed.jpeg,/assets/images/ca00f89f29caed76a0f8622a0303ac14.jpeg,/assets/images/287090e048e493be015ac20ddb50cb22.jpeg', 2, 1, 0, 0),
(48, 'Spain', '/assets/images/0f39369498d4665e4cb983849e9e3748.jpeg,/assets/images/ebe16f02783ad0a6751acc7621f98562.jpeg,/assets/images/ea2db08d908acc046d41f0a7f563ef4f.jpeg,/assets/images/048b89f6ff7c1e82bc58faedfe25a3d4.jpeg', 2, 1, 1, 4),
(49, 'Tirana', '/assets/images/91ac268533a4c48b2755d3edeb71224b.jpeg', 3, 1, 0, 0),
(50, 'New York', '/assets/images/622dbd30acd7ecc95696b2988afb3888.jpeg,/assets/images/2b26f2b28f5d7d44604cc11ab7e81dc1.jpeg,/assets/images/6e098bd739f636339a0cba00e47795d5.jpeg,/assets/images/f9f19032285427620fe98505a88c7667.jpeg', 8, 1, 3, 8),
(51, 'New York', '/assets/images/30598ad26cd88df6d0c0bb11f8d8727a.jpeg,/assets/images/f0a396f909cbc5e4aafe33a47d5c37d7.jpeg,/assets/images/5049bb5f54128b0c7b3eca543245d825.jpeg', 8, 2, 0, 0),
(93, 'Tirane', '/assets/images/76eade3b506b9afb2c401701d24bfd95.jpeg', 1, 2, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dislikes_album`
--

CREATE TABLE `dislikes_album` (
  `id` int NOT NULL,
  `user` varchar(255) NOT NULL,
  `album` int NOT NULL,
  `dislikes` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes_album`
--

CREATE TABLE `likes_album` (
  `id` int NOT NULL,
  `user` varchar(255) NOT NULL,
  `album` int NOT NULL,
  `likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes_album`
--

INSERT INTO `likes_album` (`id`, `user`, `album`, `likes`) VALUES
(14, 'Agim', 43, 1),
(17, 'Agim', 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `date`, `user_image`) VALUES
(1, 'Sadri', 'Pervana', 'sadripervana1@gmail.com', '$2y$10$sxvVCT5AYrcW0zQXCP6hrO9lqsL6TtN9ufRzSIDEA3p3mJOkEduTC', '2023-01-06 17:12:15', '/assets/images/107163bb957528b86ba6e336b648027c.jpeg'),
(2, 'Ana', 'Kanarina', 'anakanarina@gmail.com', '$2y$10$x7wqQD1DtCbzLFXVKjtucu6odkNAXM/WYY1mz3DApVZxzjmQmjrFq', '2023-01-06 17:13:16', '/assets/images/efcc410eda80c3e9acec44110f102fae.jpeg'),
(7, 'Sophie', 'Nikolas', 'sophie@gmail.com', '$2y$10$UzrINgp9CcyJxllbqnKWS.f032sEBiLVSdsqpgbi7h4nNftTnMEqq', '2023-01-06 17:14:16', '/assets/images/cc03aacc9a6e43360cf2250ca5d1ba2f.jpeg'),
(8, 'Aldion', 'Hoxha', 'aldion@gmail.com', '$2y$10$oExVpE8S8JTTmQ7CKAIKTO.PAiFYCIKC0GHFyRDpOa4V/AEPIKO1y', '2023-01-06 17:13:44', '/assets/images/9cc009117d68114a4463a1b13ed97b15.jpeg'),
(14, 'Arion', 'Bardhi', 'arion@gmail.com', '$2y$10$mByycyQD3BBcXNMYxDWvxuNDNcapYOnsFQTGEW9gWh/VDvjBxO/dG', '2023-01-06 17:16:46', '/assets/images/52622196731ea50b813d6ac57c1b16df.jpeg'),
(17, 'Agim', 'Zuna', 'agim@gmail.com', '$2y$10$WDFijgWy.8o/sRXTWsH6keYAEk7NSbKtpijPFK/R.fJwXhSc/qfAG', '2023-01-06 18:10:06', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes_album`
--
ALTER TABLE `dislikes_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes_album`
--
ALTER TABLE `likes_album`
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
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `dislikes_album`
--
ALTER TABLE `dislikes_album`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `likes_album`
--
ALTER TABLE `likes_album`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
