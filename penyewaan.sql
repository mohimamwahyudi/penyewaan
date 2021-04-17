-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2021 pada 18.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyewaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `18132_mobil`
--

CREATE TABLE `18132_mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_polisi` varchar(8) NOT NULL,
  `harga_sewa` decimal(10,0) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `18132_mobil`
--

INSERT INTO `18132_mobil` (`id_mobil`, `nama`, `no_polisi`, `harga_sewa`, `gambar`, `keterangan`) VALUES
(1, 'Honda CRV', 'M 2300 M', '300000', 'HondaCRV.JPG', 'tersedia'),
(2, 'Honda HRV', 'L 7676 A', '400000', 'HondaHRV.jpg', 'tersedia'),
(4, 'Toyota Avanza', 'M 4411 N', '200000', 'ToyotaAvanza.jpg', 'tersedia'),
(6, 'Toyota Fortuner', 'L 7689 H', '400000', 'default.jpg', 'tersedia'),
(8, 'Daihatsu Sigra', 'M 1232 U', '245000', 'DaihatsuSigra.jpg', 'tersedia'),
(9, 'Daihatsu Terios', 'M  4444 ', '157000', 'DaihatsuTerios.jpg', 'tersedia'),
(10, 'Datsun GO+', 'M 3262 N', '185000', 'DatsunGO+.jpg', 'tersedia'),
(11, 'Honda Civic 2018', 'L 5543 Z', '555000', 'HondaCivic2018.jpg', 'tersedia'),
(12, 'Honda Civic 2019', 'M 2132 H', '555000', 'HondaCivic2019.jpg', 'tersedia'),
(13, 'Honda Civic TypeR 2021', 'M 6556 Y', '555000', 'HondaCivicTypeR2021.jpg', 'tersedia'),
(14, 'Honda Mobilio', 'S 8634 K', '305000', 'HondaMobilio.jpg', 'tersedia'),
(15, 'Mitsubishi Pajero Sport', 'L 8932 J', '600000', 'MitsubishiPajeroSport.jpg', 'tersedia'),
(16, 'Mitsubishi Xpander', 'L 8778 X', '500000', 'MitsubishiXpander.jpg', 'tersedia'),
(17, 'Nissan Livina', 'L 3322 M', '455000', 'NissanLivina.jpg', 'tersedia'),
(18, 'Suzuki Ertiga', 'S 1020 E', '300000', 'SuzukiErtiga.jpg', 'tersedia'),
(19, 'Toyota Alphard', 'L 7690 T', '700000', 'ToyotaAlphard.jpg', 'tersedia'),
(20, 'Toyota Innova Venturer', 'L 5654 V', '160000', 'ToyotaInnovaVenturer.jpg', 'tersedia'),
(26, 'Yariz', 'M 8796 V', '325000', 'default.jpg', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `18132_mpenyewaan`
--

CREATE TABLE `18132_mpenyewaan` (
  `id_sewa` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_sewa` datetime DEFAULT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `lama_sewa` int(11) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `status` enum('disewa','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `18132_mpenyewaan`
--

INSERT INTO `18132_mpenyewaan` (`id_sewa`, `id_user`, `tgl_sewa`, `tgl_kembali`, `lama_sewa`, `id_mobil`, `status`) VALUES
(29, 1, '2021-01-09 14:22:00', '2021-01-12 14:22:00', 3, 1, 'selesai'),
(32, 5, '2021-01-14 19:31:00', '2021-01-16 19:31:00', 2, 4, 'selesai'),
(33, 6, '2021-01-11 21:04:00', '2021-01-13 21:04:00', 2, 1, 'selesai'),
(34, 5, '2021-01-11 14:21:00', '2021-01-13 14:21:00', 2, 6, 'selesai'),
(35, 7, '2021-01-11 14:24:00', '2021-01-13 14:24:00', 2, 6, 'selesai'),
(36, 7, '2021-01-28 22:32:00', '2021-01-29 22:32:00', 1, 18, 'selesai'),
(37, 7, '2021-01-21 22:50:00', '2021-01-23 22:50:00', 2, 4, 'selesai'),
(38, 7, '2021-01-11 08:42:00', '2021-01-13 08:42:00', 2, 1, 'selesai'),
(39, 8, '2021-01-12 04:56:00', '2021-01-19 04:56:00', 7, 14, 'selesai'),
(40, 8, '2021-01-12 11:58:00', '2021-01-15 11:58:00', 3, 1, 'selesai'),
(45, 1, '2020-11-01 22:00:12', '2020-11-02 22:00:12', 1, 26, 'selesai'),
(46, 8, '2020-11-03 22:00:12', '2020-11-04 22:00:12', 1, 20, 'selesai'),
(47, 7, '2020-11-04 22:02:17', '2020-11-06 22:02:17', 2, 18, 'selesai'),
(48, 5, '2020-11-04 22:02:17', '2021-01-07 22:02:17', 3, 17, 'selesai'),
(49, 6, '2020-11-06 22:03:32', '2020-11-11 22:03:32', 5, 14, 'selesai'),
(50, 5, '2020-11-09 22:03:32', '2020-11-11 22:03:32', 2, 6, 'selesai'),
(51, 1, '2020-11-08 22:05:16', '2021-01-10 22:05:16', 2, 12, 'selesai'),
(52, 5, '2021-01-14 22:05:16', '2021-01-16 22:05:16', 2, 13, 'selesai'),
(53, 8, '2021-01-17 22:06:22', '2021-01-20 22:06:22', 3, 10, 'selesai'),
(54, 6, '2020-11-17 22:06:22', '2020-11-20 22:06:22', 3, 4, 'selesai'),
(55, 5, '2020-11-20 22:08:00', '2020-11-22 22:08:00', 2, 8, 'selesai'),
(56, 7, '2020-11-21 22:08:00', '2020-11-22 22:08:00', 1, 1, 'selesai'),
(57, 7, '2020-11-22 22:09:51', '2020-11-24 22:09:51', 2, 17, 'selesai'),
(58, 5, '2020-11-23 22:09:51', '2020-11-24 22:09:51', 1, 15, 'selesai'),
(59, 6, '2020-11-24 22:11:34', '2021-01-28 22:11:34', 4, 10, 'selesai'),
(60, 1, '2020-11-25 22:11:34', '2020-11-27 22:11:34', 2, 26, 'selesai'),
(61, 8, '2020-11-28 22:12:42', '2020-11-30 22:12:42', 2, 2, 'selesai'),
(62, 8, '2021-01-28 22:12:42', '2020-11-30 22:12:42', 2, 1, 'selesai'),
(63, 8, '2020-11-28 22:15:03', '2020-11-30 22:15:03', 2, 4, 'selesai'),
(64, 8, '2020-11-28 22:15:03', '2020-11-30 22:15:03', 2, 6, 'selesai'),
(65, 8, '2020-11-28 22:15:03', '2020-11-30 22:15:03', 2, 8, 'selesai'),
(66, 8, '2020-11-28 22:15:03', '2020-11-30 22:15:03', 2, 9, 'selesai'),
(67, 8, '2020-11-28 22:15:03', '2020-11-30 22:15:03', 2, 10, 'selesai'),
(68, 8, '2020-11-28 22:15:03', '2020-11-30 22:15:03', 2, 11, 'selesai'),
(69, 8, '2020-11-28 22:15:03', '2020-11-30 22:15:03', 2, 12, 'selesai'),
(70, 8, '2020-11-28 22:20:14', '2020-11-30 22:20:14', 2, 13, 'selesai'),
(71, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 8, 'selesai'),
(72, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 9, 'selesai'),
(73, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 10, 'selesai'),
(74, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 11, 'selesai'),
(75, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 12, 'selesai'),
(76, 7, '2020-12-01 22:49:50', '2020-12-01 22:49:50', 1, 13, 'selesai'),
(77, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 1, 'selesai'),
(78, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 2, 'selesai'),
(79, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 14, 'selesai'),
(80, 7, '2020-12-01 22:49:50', '2020-12-02 22:49:50', 1, 15, 'selesai'),
(81, 1, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 26, 'selesai'),
(82, 1, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 20, 'selesai'),
(83, 1, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 6, 'selesai'),
(84, 1, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 4, 'selesai'),
(85, 5, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 19, 'selesai'),
(86, 1, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 18, 'selesai'),
(87, 5, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 17, 'selesai'),
(88, 5, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 16, 'selesai'),
(89, 6, '2020-12-10 23:07:07', '2020-12-12 23:07:07', 2, 15, 'selesai'),
(90, 1, '2020-12-17 23:07:07', '2020-12-19 23:07:07', 2, 26, 'selesai'),
(91, 1, '2020-12-17 23:07:07', '2020-12-19 23:07:07', 2, 15, 'selesai'),
(92, 8, '2020-12-17 23:07:07', '2020-12-19 23:07:07', 2, 19, 'selesai'),
(93, 5, '2020-12-17 23:07:07', '2020-12-19 23:07:07', 2, 1, 'selesai'),
(94, 8, '2020-12-20 23:07:07', '2020-12-22 23:07:07', 2, 10, 'selesai'),
(95, 7, '2020-12-23 23:07:07', '2020-12-24 23:07:07', 1, 9, 'selesai'),
(96, 8, '2020-12-30 23:07:07', '2020-12-31 23:07:07', 1, 19, 'selesai'),
(97, 5, '2020-12-29 23:17:18', '2020-12-31 23:17:18', 2, 26, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `18132_pembayaran`
--

CREATE TABLE `18132_pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `jml_uang` decimal(10,0) NOT NULL,
  `total_bayar` decimal(10,0) NOT NULL,
  `kembalian` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `18132_pembayaran`
--

INSERT INTO `18132_pembayaran` (`id_bayar`, `id_sewa`, `tgl_bayar`, `jml_uang`, `total_bayar`, `kembalian`) VALUES
(2, 29, '2021-01-09 15:48:34', '1000000', '900000', '100000'),
(3, 32, '2021-01-09 19:33:26', '400000', '400000', '0'),
(4, 33, '2021-01-09 21:07:35', '602500', '600000', '2500'),
(5, 34, '2021-01-10 14:34:17', '820000', '800000', '20000'),
(6, 35, '2021-01-10 14:34:54', '950000', '800000', '150000'),
(7, 36, '2021-01-10 22:40:00', '1000000', '300000', '700000'),
(8, 37, '2021-01-10 22:51:33', '980000', '400000', '580000'),
(9, 38, '2021-01-11 05:18:54', '640000', '600000', '40000'),
(10, 39, '2021-01-11 10:35:33', '2200000', '2135000', '65000'),
(11, 40, '2021-01-11 11:28:22', '920000', '900000', '20000'),
(12, 59, '2021-01-12 22:27:05', '1000000', '740000', '260000'),
(13, 45, '2021-01-12 22:28:54', '400000', '325000', '75000'),
(14, 51, '2021-01-12 22:29:13', '1200000', '1110000', '90000'),
(15, 48, '2021-01-12 22:29:23', '1400000', '1365000', '35000'),
(16, 50, '2021-01-12 22:29:34', '800000', '800000', '0'),
(17, 52, '2021-01-12 22:29:45', '1200000', '1110000', '90000'),
(18, 55, '2021-01-12 22:29:54', '500000', '490000', '10000'),
(19, 58, '2021-01-12 22:30:08', '615000', '600000', '15000'),
(20, 49, '2021-01-12 22:30:17', '1600000', '1525000', '75000'),
(21, 54, '2021-01-12 22:30:26', '620000', '600000', '20000'),
(22, 47, '2021-01-12 22:30:43', '602500', '600000', '2500'),
(23, 56, '2021-01-12 22:30:52', '310000', '300000', '10000'),
(24, 57, '2021-01-12 22:31:04', '915000', '910000', '5000'),
(25, 46, '2021-01-12 22:31:18', '1600000', '160000', '1440000'),
(26, 53, '2021-01-12 22:31:26', '600000', '555000', '45000'),
(27, 71, '2021-01-12 22:56:01', '300000', '245000', '55000'),
(28, 72, '2021-01-12 22:56:09', '200000', '157000', '43000'),
(29, 73, '2021-01-12 22:56:15', '200000', '185000', '15000'),
(30, 74, '2021-01-12 22:56:22', '600000', '555000', '45000'),
(31, 75, '2021-01-12 22:56:29', '600000', '555000', '45000'),
(32, 76, '2021-01-12 22:56:37', '600000', '555000', '45000'),
(33, 77, '2021-01-12 22:56:48', '300000', '300000', '0'),
(34, 78, '2021-01-12 22:56:57', '400000', '400000', '0'),
(35, 79, '2021-01-12 22:57:05', '310000', '305000', '5000'),
(36, 80, '2021-01-12 22:57:15', '615000', '600000', '15000'),
(37, 95, '2021-01-12 23:18:20', '200000', '157000', '43000'),
(38, 92, '2021-01-12 23:18:27', '1500000', '1400000', '100000'),
(39, 94, '2021-01-12 23:20:51', '400000', '370000', '30000'),
(40, 96, '2021-01-12 23:21:03', '712000', '700000', '12000'),
(41, 85, '2021-01-12 23:21:10', '1600000', '1400000', '200000'),
(42, 87, '2021-01-12 23:21:17', '1000000', '910000', '90000'),
(43, 88, '2021-01-12 23:21:27', '1200000', '1000000', '200000'),
(44, 93, '2021-01-12 23:21:35', '650000', '600000', '50000'),
(45, 97, '2021-01-12 23:21:41', '700000', '650000', '50000'),
(46, 81, '2021-01-12 23:21:48', '700000', '650000', '50000'),
(47, 82, '2021-01-12 23:21:54', '340000', '320000', '20000'),
(48, 83, '2021-01-12 23:22:01', '800000', '800000', '0'),
(49, 84, '2021-01-12 23:22:09', '800000', '400000', '400000'),
(50, 86, '2021-01-12 23:22:19', '650000', '600000', '50000'),
(51, 90, '2021-01-12 23:22:26', '5000000', '650000', '4350000'),
(52, 91, '2021-01-12 23:22:34', '1300000', '1200000', '100000'),
(53, 89, '2021-01-12 23:22:44', '1200000', '1200000', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `18132_user`
--

CREATE TABLE `18132_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','penyewa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `18132_user`
--

INSERT INTO `18132_user` (`id_user`, `nama`, `telp`, `alamat`, `username`, `password`, `role`) VALUES
(1, 'Farhan Hamid', '082334451445', 'sadfhamid', 'user1', '827ccb0eea8a706c4c34a16891f84e7b', 'penyewa'),
(4, 'admin', '082334451223', 'socah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(5, 'Dayat', '082334451665', 'Torjun', 'dayat', '1855c11f044cc8944e8cdac9cae5def8', 'penyewa'),
(6, 'user', '082334451440', 'Torjun', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'penyewa'),
(7, 'aldi', '082334451666', 'Omben', 'aldi', '5cf15fc7e77e85f5d525727358c0ffc9', 'penyewa'),
(8, 'amik', '082234567654', 'Kamal', 'amik', '30ac5e7fa0aae96bceb4c641ed3ae430', 'penyewa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `18132_mobil`
--
ALTER TABLE `18132_mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `nama_2` (`nama`),
  ADD KEY `nama_3` (`nama`),
  ADD KEY `nama_4` (`nama`),
  ADD KEY `nama_6` (`nama`);
ALTER TABLE `18132_mobil` ADD FULLTEXT KEY `nama_5` (`nama`);

--
-- Indeks untuk tabel `18132_mpenyewaan`
--
ALTER TABLE `18132_mpenyewaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indeks untuk tabel `18132_pembayaran`
--
ALTER TABLE `18132_pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indeks untuk tabel `18132_user`
--
ALTER TABLE `18132_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `18132_mobil`
--
ALTER TABLE `18132_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `18132_mpenyewaan`
--
ALTER TABLE `18132_mpenyewaan`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `18132_pembayaran`
--
ALTER TABLE `18132_pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `18132_user`
--
ALTER TABLE `18132_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `18132_mpenyewaan`
--
ALTER TABLE `18132_mpenyewaan`
  ADD CONSTRAINT `18132_mpenyewaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `18132_user` (`id_user`),
  ADD CONSTRAINT `18132_mpenyewaan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `18132_mobil` (`id_mobil`);

--
-- Ketidakleluasaan untuk tabel `18132_pembayaran`
--
ALTER TABLE `18132_pembayaran`
  ADD CONSTRAINT `18132_pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `18132_mpenyewaan` (`id_sewa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
