-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2021 pada 09.54
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Ciputat'),
(2, 'Ciputat Timur'),
(3, 'Pamulang'),
(4, 'Pondok Aren'),
(5, 'Serpong'),
(6, 'Serpong Utara'),
(7, 'Setu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `kelurahan`, `id_kecamatan`) VALUES
(1, 'Ciputat', 1),
(2, 'Cipayung', 1),
(3, 'Serua', 1),
(4, 'Sawah Lama', 1),
(5, 'Sawah Baru', 1),
(6, 'Serua Indah', 1),
(7, 'Jombang', 1),
(8, 'Rengas', 2),
(9, 'Rempoa', 2),
(10, 'Cireundeu', 2),
(11, 'Pondok Ranji', 2),
(12, 'Cempaka Putih', 2),
(13, 'Pisangan', 2),
(14, 'Pondok Benda', 3),
(15, 'Benda Baru', 3),
(16, 'Bambu Apus', 3),
(17, 'Kedaung', 3),
(18, 'Pamulang Barat', 3),
(19, 'Pamulang Timur', 3),
(20, 'Pondok Cabe Udik', 3),
(21, 'Pondok Cabe Ilir', 3),
(22, 'Jurang Mangu Barat', 4),
(23, 'Jurang Mangu Timur', 4),
(24, 'Pondok Kacang Timur', 4),
(25, 'Pondok Kacang Barat', 4),
(26, 'Perigi Lama', 4),
(27, 'Perigi Baru', 4),
(28, 'Pondok Aren', 4),
(29, 'Pondok Karya', 4),
(30, 'Pondok Jaya', 4),
(31, 'Pondok Betung', 4),
(32, 'Pondok Pucung', 4),
(33, 'Buaran', 5),
(34, 'Ciater', 5),
(35, 'Cilenggang', 5),
(36, 'Lengkong Gudang', 5),
(37, 'Lengkong Gudang Timur', 5),
(38, 'Lengkong Wetan', 5),
(39, 'Rawa Buntu', 5),
(40, 'Rawa Mekar Jaya', 5),
(41, 'Serpong', 5),
(42, 'Jelupang', 6),
(43, 'Lengkong Karya', 6),
(44, 'Pakualam', 6),
(45, 'Pakulonan', 6),
(46, 'Paku Jaya', 6),
(47, 'Pondok Jagung', 6),
(48, 'Pondok Jagung Timur', 6),
(49, 'Setu', 7),
(50, 'Keranggan', 7),
(51, 'Muncul', 7),
(52, 'Babakan', 7),
(53, 'Bakti Jaya', 7),
(54, 'Kademangan', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `alamat`) VALUES
('21312313123', 'tes2323', 'asd', '$2y$10$1Vd87nOV4PP/7FgK3EE7gOCJw90hrNzD6SGwsHcD//mbdQ1aY1mum', '2132323', 'asdasd2'),
('3670000000000000', 'tesasd', 'tes123', '$2y$10$sIc2m/nSDBzVYyqGmMaCJONJSUMt3wmhr9CfSDAfAeCS318TNoz8e', '0812345678922', 'tes alamatsad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('proses','selesai') NOT NULL,
  `id_kelurahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `id_kelurahan`) VALUES
(1, '2021-02-10', '3670000000000000', 'asd', '7a4a66cc2e2c65d633ffb00b05e8f87d.jpg', 'selesai', 1),
(2, '2021-02-10', '3670000000000000', 'asd', '1.PNG', 'selesai', 2),
(9, '2021-02-09', '3670000000000000', 'asd', '1.PNG', 'selesai', 3),
(10, '2021-02-16', '3670000000000000', 'asdasd', 'c2b21bf1-6b36-45f0-81fc-95e30e208889.jpg', 'proses', 0),
(15, '2021-02-16', '21312313123', 'saddsadasd', 'c2b21bf1-6b36-45f0-81fc-95e30e208889.jpg', 'proses', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin', 'admin', '$2y$10$sIc2m/nSDBzVYyqGmMaCJONJSUMt3wmhr9CfSDAfAeCS318TNoz8e', '0812345678229', 'admin'),
(3, 'Andri Firman Saputra', 'andri123', '$2y$10$66nugRlHWpboGYjMT9uk8OUvYdrjTYDZuU5.iaVX2ZQSUDDIeuEOi', '087808675313', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 1, '2021-02-10', 'tes', 1),
(2, 2, '2021-02-10', 'tes', 1),
(5, 0, '2021-02-09', 'asdasdasdad', 3),
(6, 0, '2021-02-09', 'asdasdasdasd', 3),
(7, 0, '2021-02-09', 'asdasd', 3),
(10, 9, '2021-02-09', 'asdasdasd', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
