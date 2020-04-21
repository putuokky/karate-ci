-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2020 pada 06.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karateka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dojo`
--

CREATE TABLE `dojo` (
  `id_dojo` int(11) NOT NULL,
  `nama_dojo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dojo`
--

INSERT INTO `dojo` (`id_dojo`, `nama_dojo`) VALUES
(1, 'SD Saraswati 4'),
(2, 'Kenyeri'),
(3, 'DCA'),
(4, 'Nirbana'),
(5, 'Pasopati'),
(6, 'Buana Indah'),
(7, 'GSD'),
(8, 'BC Pemedilan'),
(9, 'SD 4 Peguyangan'),
(10, 'SD 4 Tonja'),
(11, 'SD 5 Tonja'),
(12, 'SD 19 Pemecutan'),
(13, 'SD 26 Pemecutan'),
(14, 'SDK Harapan'),
(15, 'SD 22 Dauh Puri'),
(16, 'SD 1 Ubung'),
(17, 'Permata Bumi'),
(18, 'Santo Yoseph');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`, `is_active`, `date_user`) VALUES
(1, 'Okky Maheswara', 'okkymahes@gmail.com', '$2y$10$p7MPGe3IGqcWU5TIyEFCEuH/BqcPqlYnArP5YvFaAVJ6MMdptaz/a', 1, 1, 1585405006),
(2, 'admin', 'admin@gmail.com', '$2y$10$7.1knAbxrSPSzaTSv0pspOttoD/qfey53MAS7hJoDQ1ubfKlMB69C', 2, 1, 1585571523);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 6),
(2, 1, 4),
(4, 1, 3),
(5, 1, 2),
(6, 2, 6),
(7, 2, 4),
(8, 2, 2),
(9, 2, 8),
(10, 3, 6),
(11, 3, 4),
(12, 3, 2),
(14, 2, 9),
(15, 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL,
  `is_active_menu` int(1) NOT NULL,
  `urutan_user_menu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `is_active_menu`, `urutan_user_menu`) VALUES
(2, 'Add On', 1, 3),
(3, 'Master', 1, 6),
(4, 'Interface', 1, 2),
(6, 'Home', 1, 1),
(8, 'Settings', 1, 4),
(9, 'Notice', 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator'),
(3, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_user_sub_menu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `urutan_user_sub_menu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_user_sub_menu`, `menu_id`, `submenu`, `url`, `icon`, `is_active`, `urutan_user_sub_menu`) VALUES
(1, 2, 'Dojo', 'log/dojo', 'nav-icon fas fa-warehouse', 1, 1),
(2, 3, 'User', 'log/user', 'nav-icon fas fa-user', 1, 1),
(3, 4, 'Biodata', 'log/biodata', 'nav-icon fas fa-id-card-alt', 1, 1),
(4, 4, 'Karateka', 'log/karateka', 'nav-icon far fa-image', 1, 2),
(5, 4, 'Ujian', 'log/ujian', 'nav-icon fas fa-file-signature', 1, 3),
(6, 4, 'Ijasah', 'log/ijasah', 'nav-icon fas fa-file', 1, 4),
(7, 2, 'Sabuk', 'log/sabuk', 'nav-icon fas fa-child', 1, 2),
(8, 3, 'Role User', 'log/roleuser', 'nav-icon fas fa-users-cog', 1, 2),
(9, 3, 'Menu Management', 'log/menu', 'nav-icon fas fa-folder', 1, 3),
(10, 3, 'SubMenu Management', 'log/submenu', 'nav-icon fas fa-folder-open', 1, 4),
(11, 3, 'Configuration', 'log/config', 'nav-icon fas fa-cogs', 1, 5),
(13, 6, 'Dashboard', 'log/dashboard', 'nav-icon fas fa-tachometer-alt', 1, 1),
(14, 8, 'User', 'log/user', 'nav-icon fas fa-user', 1, 1),
(15, 9, 'Timeline', 'timeline', 'nav-icon far fa-image', 1, 1),
(16, 8, 'Configuration', 'log/config', 'nav-icon fas fa-cogs', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dojo`
--
ALTER TABLE `dojo`
  ADD PRIMARY KEY (`id_dojo`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_user_sub_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dojo`
--
ALTER TABLE `dojo`
  MODIFY `id_dojo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
