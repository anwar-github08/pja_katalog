-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jul 2022 pada 08.25
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
-- Database: `pakis_katalog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Katalog', 'katalog', '$2y$10$weLCNBllykxh1k9okSa2AObf1hdxb8eiUFgIn0PdofrR9sHGebJBa', 'master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dealer`
--

CREATE TABLE `dealer` (
  `id_dealer` int(11) NOT NULL,
  `nama_dealer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dealer`
--

INSERT INTO `dealer` (`id_dealer`, `nama_dealer`) VALUES
(1, 'SGI'),
(2, 'SAPROTAN'),
(3, 'EXCEL MEG INDO'),
(13, 'DANKEN INDONESIA'),
(14, 'UNI AGRO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `jenis_produk`) VALUES
(1, 'INSEKTISIDA'),
(2, 'HERBISIDA'),
(3, 'FUNGISIDA'),
(4, 'MOLUKSIDA'),
(7, 'BIBIT'),
(8, 'PUPUK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kemasan`
--

CREATE TABLE `kemasan` (
  `id_kemasan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `volume` varchar(10) NOT NULL,
  `isi_per_box` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kemasan`
--

INSERT INTO `kemasan` (`id_kemasan`, `id_produk`, `volume`, `isi_per_box`) VALUES
(1, 1, '100 ML', 10),
(2, 1, '50 ML', 20),
(3, 2, '100 ML', 10),
(4, 2, '200 ML', 5),
(5, 3, '25 KG', 1),
(6, 4, '100 ML', 5),
(7, 4, '300 ML', 3),
(8, 5, '500 ML', 1),
(9, 5, '250 ML', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `img_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_dealer`, `id_jenis_produk`, `nama_produk`, `img_produk`, `deskripsi_produk`) VALUES
(1, 13, 3, 'DKDUOPRO', '62c632dad69d2.jpg', 'fungisida terbaik'),
(2, 13, 1, 'DKFENZO', '62c63639a8221.jpg', 'insektisida terbaik'),
(3, 2, 8, 'MKP', '62c638183b469.jpg', 'MKP merupakan pupuk Mono Potassium Phosphate berbentuk kristal yang mudah larut dalam air. Sehingga sangat mudah diaplikasikan dengan cara semprot maupun dikocorkan. Dapat diaplikasikan lewat tanah, daun atau sistem hidroponik.'),
(4, 14, 1, 'DIMETION', '62c63b07ad02a.jpg', 'KEUNGGULAN Insektisida racun kontak, berbahan aktif deltametrin 30 g'),
(5, 1, 1, 'ATHENZ', '62c63cc99b29c.jpg', 'Merupakan insektisida yang biasa digunakan untuk mengendalikan ulat grayak pada bawang merah, jagung, padi dll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_key`
--

CREATE TABLE `tbl_key` (
  `id_key` int(11) NOT NULL,
  `nama_key` varchar(11) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_key`
--

INSERT INTO `tbl_key` (`id_key`, `nama_key`, `slug`) VALUES
(1, '02914248811', '0214248811_slug');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_kemasan`
--

CREATE TABLE `tmp_kemasan` (
  `id_tmp_kemasan` int(11) NOT NULL,
  `volume` varchar(10) NOT NULL,
  `isi_per_box` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_email` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '-',
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id_dealer`);

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indeks untuk tabel `kemasan`
--
ALTER TABLE `kemasan`
  ADD PRIMARY KEY (`id_kemasan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_delaer` (`id_dealer`),
  ADD KEY `id_golongan_produk` (`id_jenis_produk`);

--
-- Indeks untuk tabel `tbl_key`
--
ALTER TABLE `tbl_key`
  ADD PRIMARY KEY (`id_key`);

--
-- Indeks untuk tabel `tmp_kemasan`
--
ALTER TABLE `tmp_kemasan`
  ADD PRIMARY KEY (`id_tmp_kemasan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id_dealer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kemasan`
--
ALTER TABLE `kemasan`
  MODIFY `id_kemasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_key`
--
ALTER TABLE `tbl_key`
  MODIFY `id_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tmp_kemasan`
--
ALTER TABLE `tmp_kemasan`
  MODIFY `id_tmp_kemasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
