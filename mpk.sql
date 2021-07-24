-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 10.55
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`id`, `kode`, `nama`) VALUES
(1, 'O', 'outdoor'),
(2, 'P', 'printa'),
(3, 'F', 'forza');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mpk`
--

CREATE TABLE `mpk` (
  `id` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `uraian` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mpk`
--

INSERT INTO `mpk` (`id`, `area`, `pelanggan`, `mulai`, `selesai`, `uraian`, `status`) VALUES
(2, 1, 1, '2021-07-15', '2021-07-24', 'test test', 5),
(3, 2, 4, '2021-12-01', '2022-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris laoreet tortor vel nunc eleifend, non laoreet magna dignissim. In convallis massa dictum varius iaculis. Aenean congue in orci eu pellentesque. Mauris et nisl dignissim urna blandit ultricies nec at ex. Aenean sit amet libero in ligula iaculis posuere. Quisque suscipit tortor sed leo ultrices commodo. Nulla quis justo sit amet nisl pellentesque placerat blandit ac orci. In feugiat efficitur mi, sed posuere nibh vulputate at. Vestibulum non tincidunt diam. Donec at molestie nisi.', 4),
(4, 3, 4, '2021-07-17', '2021-08-15', 'test test test', 4),
(5, 2, 4, '2021-07-24', '2021-07-31', 'as', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`) VALUES
(1, 'agus'),
(4, 'agus test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `roles_id`, `is_active`, `date_created`) VALUES
(4, 'Agus', '123agusnugroho123@gmail.com', 'default.png', '$2y$10$O3AXe0M.ZEU/D8aPVZgZrOEnAyPStM7AmTginJp4ly7goZYJRDDYC', 1, 1, 1552397218),
(5, 'Agus Nugroho', 'agus@gmail.com', 'default.png', '$2y$10$7MmcqsQJf8WqTPPr6z85GOYiZnW445C.HIeD8ciwbVQnhOE3F9IgS', 2, 1, 1552562363);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_access_menu`
--

INSERT INTO `users_access_menu` (`id`, `roles_id`, `menu_id`) VALUES
(1, 1, 1),
(20, 1, 3),
(21, 1, 7),
(22, 1, 8),
(23, 1, 9),
(24, 1, 10),
(26, 1, 11),
(27, 1, 12),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_menu`
--

CREATE TABLE `users_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_menu`
--

INSERT INTO `users_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(6, 'master'),
(7, 'mpk'),
(8, 'keuangan'),
(9, 'operasional'),
(10, 'printing'),
(11, 'supervisor'),
(12, 'laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_roles`
--

INSERT INTO `users_roles` (`id`, `roles`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_sub_menu`
--

CREATE TABLE `users_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_sub_menu`
--

INSERT INTO `users_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-alt', 1),
(3, 3, 'Menu Management', 'menu', 'fas fa-fw fa-list', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-indent', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-users-cog', 1),
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(18, 6, 'Daftar Area', 'master/area', 'fas fa-fw fa-warehouse', 1),
(19, 6, 'Daftar Pelanggan', 'master/pelanggan', 'fas fa-fw fa-users', 1),
(20, 7, 'Data Mpk', 'mpk/data', 'fas fa-fw fa-list-alt', 1),
(21, 7, 'Input Mpk', 'mpk/input', 'fas fa-fw fa-clipboard-list', 1),
(22, 8, 'Konfirmasi Keuangan', 'keuangan/mpk', 'fas fa-fw fa-list-alt', 1),
(23, 9, 'Konfirmasi Operasional', 'operasional/mpk', 'fas fa-fw fa-list-alt', 1),
(24, 10, 'Konfirmasi Printing', 'printing/mpk', 'fas fa-fw fa-list-alt', 1),
(26, 7, 'Cetak Mpk', 'mpk/konfirm', 'fas fa-fw fa-print', 1),
(27, 11, 'Konfirmasi Supervisor', 'supervisor/mpk', 'fas fa-fw fa-list-alt', 1),
(28, 12, 'Laporan', 'laporan', 'fas fa-fw fa-book-open', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mpk`
--
ALTER TABLE `mpk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Indeks untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mpk`
--
ALTER TABLE `mpk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `users_roles` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD CONSTRAINT `users_access_menu_ibfk_3` FOREIGN KEY (`roles_id`) REFERENCES `users_roles` (`id`),
  ADD CONSTRAINT `users_access_menu_ibfk_4` FOREIGN KEY (`menu_id`) REFERENCES `users_menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD CONSTRAINT `users_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `users_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
