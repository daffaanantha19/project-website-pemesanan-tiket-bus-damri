-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 07.36
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `harga`) VALUES
(1, 'Ekonomi', 60000),
(2, 'Bisnis', 70000),
(3, 'Eksekutif', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_tiket`
--

CREATE TABLE `pesan_tiket` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `jadwal` date NOT NULL,
  `penumpang_muda` int(11) NOT NULL,
  `penumpang_lansia` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan_tiket`
--

INSERT INTO `pesan_tiket` (`id`, `nama`, `no_ktp`, `no_hp`, `id_kelas`, `jadwal`, `penumpang_muda`, `penumpang_lansia`, `total`) VALUES
(16, 'Daffa Anantha', '197006516007', '089686871854', 1, '2023-07-23', 1, 2, 72000),
(17, 'Budi Utomo', '197006516027', '082195742653', 2, '2023-07-24', 2, 1, 147000),
(18, 'Aditya Pratama', '197006511028', '087752641874', 3, '2023-07-25', 3, 2, 288000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD CONSTRAINT `pesan_tiket_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
