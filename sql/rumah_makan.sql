-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2020 pada 14.12
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_makan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kasir`
--

CREATE TABLE `data_kasir` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `m_pembayaran` varchar(100) NOT NULL,
  `m_pengiriman` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jumlah_pesanan` varchar(100) NOT NULL,
  `total_harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kasir`
--

INSERT INTO `data_kasir` (`id_pelanggan`, `nama_pelanggan`, `nama_makanan`, `alamat`, `m_pembayaran`, `m_pengiriman`, `status`, `jumlah_pesanan`, `total_harga`) VALUES
(30, 'Zamzam Saputra', 'Turkey Breast', 'Jln. KH Muchtar Tabrani', 'Cod', 'GrabFood', 'pending', '5', '350000'),
(31, 'Zamzam Saputra', 'Ayam Bakar', 'Jln. KH Muchtar Tabrani', 'Cod', 'GoFood', 'diterima', '10', '150000'),
(33, 'Zamzam Saputra', 'Ayam Bakar', 'Jln. KH Muchtar Tabrani', 'Cod', 'GrabFood', 'pending', '10', '150000'),
(35, 'Rangga Firmansyah', 'Ayam Bakar', 'Jln. Pesona Anggrek II ', 'Cod', 'GoFood', 'pending', '10', '150000'),
(36, 'Zamzam Saputra', 'Turkey Breast', 'Jln. KH Muchtar Tabrani', 'Cod', 'GrabFood', 'pending', '10', '700000'),
(37, 'Zamzam Saputra', 'Turkey Breast', 'Jln. KH Muchtar Tabrani', 'Cod', 'GrabFood', 'pending', '2', '140000'),
(38, 'Zamzam Saputra', 'Turkey Breast', 'Jln. KH Muchtar Tabrani', 'Cod', 'GrabFood', 'pending', '1', '70000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_menu`
--

CREATE TABLE `data_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `harga_pesanan` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_menu`
--

INSERT INTO `data_menu` (`id_menu`, `nama_menu`, `harga_pesanan`, `gambar`) VALUES
(1, 'Turkey Breast', 70000, 'turkey.jpg'),
(2, 'Ayam Bakar', 15000, 'ayam.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pesanan` varchar(150) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_pelanggan`, `nama_pesanan`, `nama_pelanggan`, `alamat`, `jumlah_pesanan`, `total_harga`) VALUES
(30, 'Turkey Breast', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 5, 350000),
(31, 'Ayam Bakar', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 10, 150000),
(32, 'Turkey Breast', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 5, 350000),
(33, 'Ayam Bakar', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 10, 150000),
(34, 'Ayam Bakar', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 10, 150000),
(35, 'Ayam Bakar', 'Rangga Firmansyah', 'Jln. Pesona Anggrek II ', 10, 150000),
(36, 'Ayam Bakar', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 10, 150000),
(37, 'Turkey Breast', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 10, 700000),
(38, 'Turkey Breast', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 2, 140000),
(39, 'Turkey Breast', 'Zamzam Saputra', 'Jln. KH Muchtar Tabrani', 1, 70000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kasir`
--
ALTER TABLE `data_kasir`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `data_menu`
--
ALTER TABLE `data_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kasir`
--
ALTER TABLE `data_kasir`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `data_menu`
--
ALTER TABLE `data_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
