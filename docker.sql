-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Waktu pembuatan: 25 Jul 2022 pada 00.10
-- Versi server: 8.0.29
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_menus`
--

CREATE TABLE `access_menus` (
  `id` int NOT NULL,
  `group_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `c` int NOT NULL,
  `r` int NOT NULL,
  `u` int NOT NULL,
  `d` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `access_menus`
--

INSERT INTO `access_menus` (`id`, `group_id`, `menu_id`, `c`, `r`, `u`, `d`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 2, 2, 1, 1, 1, 1),
(7, 2, 3, 1, 1, 1, 1),
(8, 2, 4, 1, 1, 1, 1),
(9, 2, 5, 1, 1, 1, 1),
(10, 3, 2, 1, 0, 0, 0),
(11, 3, 4, 1, 1, 1, 1),
(12, 4, 1, 1, 1, 1, 0),
(13, 3, 1, 0, 1, 0, 0),
(14, 1, 6, 1, 1, 1, 1),
(15, 1, 5, 1, 1, 1, 1),
(16, 1, 7, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `group_id` int NOT NULL,
  `group_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'super admin'),
(2, 'admin'),
(3, 'guest'),
(4, 'maintener');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_members`
--

CREATE TABLE `group_members` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `group_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `group_members`
--

INSERT INTO `group_members` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Logins`
--

CREATE TABLE `Logins` (
  `login_id` int UNSIGNED NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upass` text NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `Logins`
--

INSERT INTO `Logins` (`login_id`, `uname`, `upass`, `user_id`) VALUES
(1, 'fikri', '$2y$10$33SIhVBA4t87z3cLVyty6OvuVzanSW4J0W72AChWSR6WowLjf5wfy', 1),
(2, 'dian', '$2y$10$33SIhVBA4t87z3cLVyty6OvuVzanSW4J0W72AChWSR6WowLjf5wfy', 2),
(3, 'gafur', '$2y$10$33SIhVBA4t87z3cLVyty6OvuVzanSW4J0W72AChWSR6WowLjf5wfy', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Menus`
--

CREATE TABLE `Menus` (
  `menu_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `type` enum('single','parent','child','') NOT NULL DEFAULT 'single',
  `parent` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `Menus`
--

INSERT INTO `Menus` (`menu_id`, `name`, `link`, `icon`, `type`, `parent`) VALUES
(1, 'Dashboard', '/dashboard', 'menu-icon tf-icons bx bx-layout', 'single', 0),
(2, 'Layouts', '#', 'menu-icon tf-icons bx bx-layout', 'parent', 0),
(3, 'menu 1', '/menu1', '', 'child', 2),
(4, 'menu 2', '/menu2', '', 'child', 2),
(5, 'menu 3', '/menu3', '', 'child', 2),
(6, 'Settings', '#', 'bx bx-cog me-2', 'parent', 0),
(7, 'Menu', '/settings/menu', 'fa-solid fa-bars', 'child', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-07-03-032010', 'App\\Database\\Migrations\\Users', 'default', 'App', 1656830334, 1),
(2, '2022-07-03-050308', 'App\\Database\\Migrations\\Logins', 'default', 'App', 1656830334, 1),
(3, '2022-07-03-054435', 'App\\Database\\Migrations\\Groups', 'default', 'App', 1656830364, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Users`
--

CREATE TABLE `Users` (
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('L','P') CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `photo` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `NIK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `Users`
--

INSERT INTO `Users` (`user_id`, `name`, `phone`, `email`, `gender`, `photo`, `alamat`, `birthday`, `birthplace`, `NIK`) VALUES
(1, 'fikri', '0852', 'admin@localhost', 'L', 'uploads/photos/avatar/1l.png', '', '', '', ''),
(2, 'dian', '0852', 'admin@localhost', 'P', 'uploads/photos/avatar/1p.png', '', '', '', ''),
(3, 'gafur', '0852', 'admin@localhost', 'L', 'uploads/photos/avatar/2l.png', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_menus`
--
ALTER TABLE `access_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indeks untuk tabel `Logins`
--
ALTER TABLE `Logins`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `user_login` (`user_id`);

--
-- Indeks untuk tabel `Menus`
--
ALTER TABLE `Menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_menus`
--
ALTER TABLE `access_menus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `Logins`
--
ALTER TABLE `Logins`
  MODIFY `login_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `Menus`
--
ALTER TABLE `Menus`
  MODIFY `menu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `access_menus`
--
ALTER TABLE `access_menus`
  ADD CONSTRAINT `access_menus_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `access_menus_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `Menus` (`menu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `group_members_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `Logins`
--
ALTER TABLE `Logins`
  ADD CONSTRAINT `user_login` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
