-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2022 pada 18.06
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kereta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `no` int(30) NOT NULL,
  `rute` varchar(100) NOT NULL,
  `IdKereta` int(10) NOT NULL,
  `tiba` varchar(30) NOT NULL,
  `berangkat` varchar(30) NOT NULL,
  `namakereta` enum('Jayabaya','Krakatau','Gajayana','Sembrani','Turangga','Malabar') NOT NULL,
  `expres` varchar(10) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`no`, `rute`, `IdKereta`, `tiba`, `berangkat`, `namakereta`, `expres`, `deskripsi`, `gambar`) VALUES
(48, 'Pemalang-Yogyakarta', 3, '09.00', '09.15', 'Malabar', 'Ya', 'wawawawawawawawawaw', '6malabar.jpg'),
(49, 'Pemalang-Surabaya', 2, '09.00', '09.15', 'Turangga', 'Ya', 'ini adalah kereta cepat yang eksklusif', '5turangga.jpg'),
(50, 'Klaten-Surabaya', 3, '06.00', '06.15', 'Sembrani', 'Tidak', 'ini adalah kreta eksklusif dari klaten, ea:v', '4sembrani.jpg'),
(52, 'Tegal-Klaten', 3, '09.00', '09.15', 'Jayabaya', 'Ya', 'kereta ini menuju ke klaten', '1jayabaya.jpg'),
(53, 'Pekalongan-Solo', 3, '09.00', '09.15', 'Krakatau', 'Ya', 'ini adalah kereta express', '2krakatau.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelaskereta`
--

CREATE TABLE `kelaskereta` (
  `IdKereta` int(30) NOT NULL,
  `kelaskereta` varchar(20) NOT NULL,
  `fasilitas` varchar(1000) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelaskereta`
--

INSERT INTO `kelaskereta` (`IdKereta`, `kelaskereta`, `fasilitas`, `harga`) VALUES
(1, 'Ekonomi', 'Kapasitas 80-106 penumpang, AC, Televisi, Stop Kontak, Rak Bagasi, dan Toilet.', 'Rp.20.000 - Rp.250.000'),
(2, 'Bisnis', 'AC, Televisi, rak bagasi, rotary seat, toilet, dan stop kontak. Kelas ini berkapasitas penumpang hingga 64 orang.', 'Rp.50.000,00 - Rp.500.000,00'),
(3, 'Eksekutif', 'AC, televisi, rak bagasi, meja makan, reclining seat, rotary seat atau bangku bisa diputar, toilet, dan stop kontak.', 'Rp.50.000 - Rp.1.000.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `contact`, `email`, `password`) VALUES
(7, 'Admin', '0890006000', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_penumpang` int(11) NOT NULL,
  `Tanggal` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `Ruteperjalanan` varchar(20) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `kelas_kereta` varchar(50) NOT NULL,
  `Nomor_kursi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`ID_penumpang`, `Tanggal`, `nama`, `Ruteperjalanan`, `kewarganegaraan`, `kelas_kereta`, `Nomor_kursi`) VALUES
(10, '2022-07-07', 'fakhri', '', '', '', '7'),
(11, '2022-07-07', 'fakhri', '', '', '', '4'),
(12, '2022-07-07', 'fakhri', '', '', '', '11'),
(13, '2022-07-07', 'fakhri', '', '', '', '4'),
(14, '2022-07-07', 'lala', '', '', '', '5'),
(15, '2022-07-07', 'gilank', '', '', '', '4'),
(16, '2022-07-07', 'gilank', '', '', '', '5'),
(17, '2022-07-10', 'Fakhri Azra Shafara', '', 'WNI', '', '12'),
(18, '2022-07-10', 'Fakhri Azra Shafara', '', 'WNI', '2', '12'),
(19, '2022-07-10', 'Fakhri Azra Shafara', 'Solo', 'WNI', '1', '18'),
(20, '2022-07-10', 'Fakhri Azra Shafara', 'Solo', 'WNI', '2', '7'),
(21, '2022-07-11', 'Fakhri Azra Shafara', 'Magetan-Jombang', 'WNI', '2', '14'),
(22, '2022-07-11', 'komar', 'Pemalang-Surabaya', 'WNI', '2', '20'),
(23, '2022-07-11', 'Fakhri Azra Shafara', 'Klaten-Surabaya', 'WNI', '2', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanantiket`
--

CREATE TABLE `pemesanantiket` (
  `id` int(11) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `ac` enum('ya','tidak') NOT NULL,
  `price` int(100) NOT NULL,
  `bonus` varchar(20) NOT NULL,
  `IdKereta` varchar(100) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanantiket`
--

INSERT INTO `pemesanantiket` (`id`, `asal`, `tujuan`, `ac`, `price`, `bonus`, `IdKereta`, `deskripsi`, `gambar`, `tanggal_upload`) VALUES
(83, 'pemalang', 'solo balapan', 'ya', 115000, 'Masker', '1', 'kereta ini memiliki tujuan stasiun solo balapan.', '1jayabaya.jpg', '2022-07-04 14:00:29'),
(85, 'pemalang', 'purwosari', 'ya', 75000, 'Masker', '1', 'qqqqq', '2krakatau.jpg', '2022-07-05 03:39:29'),
(87, '', '', '', 0, '', '', '', '1jayabaya.jpg', '2022-07-10 13:21:55'),
(88, '', '', '', 0, '', '', '', '6malabar.jpg', '2022-07-10 13:35:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `contact`, `email`, `password`) VALUES
(1, 'Kelompok_3', '082343234099', 'kelompok3@gmail.com', 'kelompok'),
(2, 'FakhriAzra', '089690736575', 'fakhrishafara@gmail.com', '12345678'),
(4, 'dewa', '08900000009', 'dewa@gmail.com', 'dewa'),
(5, 'gilank', '08900000001', 'gilank@gmail.com', '1234'),
(6, 'wijdan', '08900000002', 'wijdan@gmail.com', '1234'),
(7, 'lala', '08969073000', 'lala@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kelaskereta`
--
ALTER TABLE `kelaskereta`
  ADD PRIMARY KEY (`IdKereta`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_penumpang`);

--
-- Indeks untuk tabel `pemesanantiket`
--
ALTER TABLE `pemesanantiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `kelaskereta`
--
ALTER TABLE `kelaskereta`
  MODIFY `IdKereta` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pemesanantiket`
--
ALTER TABLE `pemesanantiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
