-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2024 pada 12.17
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aquawatch`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_curah`
--

CREATE TABLE `tb_curah` (
  `id` int(5) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jam` varchar(11) NOT NULL,
  `menit` varchar(5) NOT NULL,
  `curah_menit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_curah`
--

INSERT INTO `tb_curah` (`id`, `latitude`, `longitude`, `tanggal`, `jam`, `menit`, `curah_menit`) VALUES
(1, 3.60527, 98.6261, '04-04-2024', '08', '10', 5),
(5, 3.60458, 98.6248, '04-04-2023', '05', '10', 15),
(6, 3.60527, 98.6261, '04-04-2023', '05', '02', 5),
(7, 3.60527, 98.6261, '04-04-2023', '05', '01', 3),
(8, 3.60458, 98.6248, '04-04-2023', '05', '03', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_curahjam`
--

CREATE TABLE `tb_curahjam` (
  `id` int(5) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `curah_jam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_curahjam`
--

INSERT INTO `tb_curahjam` (`id`, `latitude`, `longitude`, `tanggal`, `jam`, `curah_jam`) VALUES
(2, 3.60458, 98.6248, '04-04-2023', '05', 10),
(3, 3.60527, 98.6261, '04-04-2023', '6', 20),
(4, 3.60527, 98.6261, '04-04-2023', '07', 30),
(5, 3.60527, 98.6261, '04-04-2023', '04', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_curahrt`
--

CREATE TABLE `tb_curahrt` (
  `id` int(5) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `curah_menit` int(10) NOT NULL,
  `curah_jam` int(10) NOT NULL,
  `cuaca` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_curahrt`
--

INSERT INTO `tb_curahrt` (`id`, `longitude`, `latitude`, `curah_menit`, `curah_jam`, `cuaca`) VALUES
(1, 98.626077, 3.605272, 15, 10, 'Berawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ketinggian`
--

CREATE TABLE `tb_ketinggian` (
  `id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `ketinggian_air` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_ketinggian`
--

INSERT INTO `tb_ketinggian` (`id`, `latitude`, `longitude`, `tanggal`, `jam`, `ketinggian_air`) VALUES
(2, 3.6, 98.62, '18-03-2024', '07', 6),
(3, 3.60458, 98.6248, '04-04-2023', '05', 2),
(4, 3.60527, 98.6261, '04-04-2023', '06', 20),
(5, 3.60527, 98.6261, '04-04-2023', '07', 15),
(6, 3.60527, 98.6261, '04-04-2023', '04', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ketinggianrt`
--

CREATE TABLE `tb_ketinggianrt` (
  `id` int(10) NOT NULL,
  `latitude` float NOT NULL,
  `logitude` float NOT NULL,
  `ketinggian_air` int(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_ketinggianrt`
--

INSERT INTO `tb_ketinggianrt` (`id`, `latitude`, `logitude`, `ketinggian_air`, `status`) VALUES
(1, 3.60458, 98.6248, 2, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prediksi`
--

CREATE TABLE `tb_prediksi` (
  `id` int(5) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `prediksi_jam` int(10) NOT NULL,
  `prediksi_menit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_prediksi`
--

INSERT INTO `tb_prediksi` (`id`, `latitude`, `longitude`, `prediksi_jam`, `prediksi_menit`) VALUES
(1, 3.60527, 98.6261, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_curah`
--
ALTER TABLE `tb_curah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_curahjam`
--
ALTER TABLE `tb_curahjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_curahrt`
--
ALTER TABLE `tb_curahrt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ketinggian`
--
ALTER TABLE `tb_ketinggian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ketinggianrt`
--
ALTER TABLE `tb_ketinggianrt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_prediksi`
--
ALTER TABLE `tb_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_curah`
--
ALTER TABLE `tb_curah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_curahjam`
--
ALTER TABLE `tb_curahjam`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_curahrt`
--
ALTER TABLE `tb_curahrt`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_ketinggian`
--
ALTER TABLE `tb_ketinggian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_ketinggianrt`
--
ALTER TABLE `tb_ketinggianrt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_prediksi`
--
ALTER TABLE `tb_prediksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
