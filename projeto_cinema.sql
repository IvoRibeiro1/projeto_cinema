-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 07:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Terror'),
(2, 'Drama'),
(3, 'Ação'),
(4, 'Aventura'),
(5, 'Romance'),
(6, 'Documentário');

-- --------------------------------------------------------

--
-- Table structure for table `community_posts`
--

CREATE TABLE `community_posts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `rating` decimal(4,2) NOT NULL,
  `notas` varchar(255) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_posts`
--

INSERT INTO `community_posts` (`id`, `username`, `movie_title`, `rating`, `notas`, `post_time`) VALUES
(1, 'teste', 'N', 0.00, '', '2023-12-08 18:17:52'),
(2, 'teste', 's', 0.00, '', '2023-12-08 18:18:39'),
(3, 'teste', '', 0.00, '', '2023-12-09 15:58:03'),
(4, 'teste', '', 0.00, '', '2023-12-09 15:58:14'),
(5, 'teste', '', 0.00, '', '2023-12-09 16:02:30'),
(6, 'teste', 'dwq', 0.00, '', '2023-12-09 16:03:24'),
(7, 'teste', 't trcc', 6.00, 'hj', '2023-12-09 18:57:31'),
(8, 'teste', 'teste delete', 3.00, 'sd', '2023-12-09 19:10:30'),
(9, 'teste', 'teste2', 7.00, 'ji', '2023-12-09 19:12:11'),
(10, 'teste', 'teste39', 9.00, 'hybj', '2023-12-09 19:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `nomefilme` varchar(100) NOT NULL,
  `rating` decimal(4,2) NOT NULL,
  `notas` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_categorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filmes`
--

INSERT INTO `filmes` (`id`, `nomefilme`, `rating`, `notas`, `id_user`, `id_categorias`) VALUES
(9, 'The Whale ', 2.99, 'bla bla bla', 1, 1),
(13, 'Don\'t Worry Darling', 8.60, 'Recomendo este filem', 1, 2),
(14, 'Jumanji', 5.40, 'Filme banal não muito excitante', 1, 3),
(15, 'Jurassic World', 7.40, 'Bom filme para ver com a familia', 1, 4),
(16, 'La La Land', 9.40, 'O meu filme favorito', 1, 5),
(17, 'Inspiration 4', 7.50, 'Interessante e revolucionador', 1, 6),
(18, 'Scream', 4.60, 'Filme cansativo e repetitivo', 1, 1),
(19, 'Casa Assombrada', 2.30, 'Bom filme de terror para ver com familia', 1, 1),
(20, 'Casa Assombrada 2', 6.60, 'Otima sequencia do primeiro filme', 1, 1),
(26, 'Us', 10.00, 'ola', 1, 1),
(27, 'Teste', 3.40, 'ghghg', 1, 6),
(28, 'defde', 3.40, 'dev', 1, 5),
(29, 'dwd', 4.50, 'fe', 1, 4),
(30, 'dwqd', 4.80, 'frfr', 1, 4),
(31, 'wddw', 4.00, 'ed', 1, 1),
(32, 'sw', 2.00, 'de', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'teste', 'teste'),
(15, 'ivo2', '$2y$10$X6.PdQZ39fRW.ZwMHHasY.L'),
(16, 'teste2', '$2y$10$gLffTdyIPyQc2mcgRGaxUuP'),
(17, 'ivo', '$2y$10$siPDg3PLoBESDny27w1MHOb'),
(18, 'ivo', 'ivo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_categorias` (`id_categorias`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `community_posts`
--
ALTER TABLE `community_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmes`
--
ALTER TABLE `filmes`
  ADD CONSTRAINT `filmes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `filmes_ibfk_2` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
