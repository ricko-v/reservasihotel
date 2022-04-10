-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2022 pada 05.08
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasihotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `nmpelanggan` varchar(30) NOT NULL,
  `emailpelanggan` varchar(30) NOT NULL,
  `nohppelanggan` varchar(20) NOT NULL,
  `tglcheckin` date NOT NULL,
  `tglcheckout` date NOT NULL,
  `totalkamar` int(10) NOT NULL,
  `tipekamar` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `nmpelanggan`, `emailpelanggan`, `nohppelanggan`, `tglcheckin`, `tglcheckout`, `totalkamar`, `tipekamar`, `status`) VALUES
(1, 'Budi', 'budigeming@gmail.com', '085768456345', '2022-03-28', '2022-03-31', 5, 'normal', 'checkout'),
(2, 'Budi', 'budigeming@gmail.com', '085768456345', '2022-03-28', '2022-03-31', 5, 'normal', 'checkout'),
(3, 'joko', 'joko@gmail.com', '089234765827', '2022-03-28', '2022-04-04', 2, 'normal', 'checkout'),
(5, 'Ricko', 'ricko@gmail.com', '08353455345', '2022-03-28', '2022-03-31', 2, 'elite', 'checkout'),
(6, 'Rendi', 'redni@gmail.com', '089734681242', '2022-03-29', '2022-04-05', 1, 'normal', 'checkout'),
(7, 'Rendi', 'redni@gmail.com', '089734681242', '2022-03-29', '2022-04-05', 1, 'normal', 'checkout'),
(8, 'Ricko Veriyanto', 'ricko@gmail.com', '087523234234', '2022-04-10', '2022-04-24', 1, 'elite', 'null');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(10) NOT NULL,
  `nmfasilitas` varchar(30) NOT NULL,
  `thumb` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nmfasilitas`, `thumb`) VALUES
(1, 'Kolam Renang', 'kolam-renang.jpg'),
(3, 'Restoran', 'restoran.jpg'),
(4, 'Free Wifi', 'free-wifi.jpg'),
(6, 'Meeting Room', 'meeting-room.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(10) NOT NULL,
  `tipekamar` varchar(30) NOT NULL,
  `biayasewa` int(50) NOT NULL,
  `jumlahkamar` int(30) NOT NULL,
  `fasilitas` varchar(500) NOT NULL,
  `thumb` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `tipekamar`, `biayasewa`, `jumlahkamar`, `fasilitas`, `thumb`) VALUES
(1, 'normal', 250000, 200, '1 tempat tidur\r\nKamar mandi\r\nAC\r\nTV', 'normal.jpg'),
(3, 'elite', 400000, 40, '2 tempat tidur\r\nKamar mandi\r\nAC\r\nTV\r\nMini kulkas', 'elite.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'joko', '9ba0009aa81e794e628a04b51eaf7d7f', 'resepsionis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
