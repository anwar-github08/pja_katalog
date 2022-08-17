-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Agu 2022 pada 09.44
-- Versi server: 10.3.35-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indonusa_pakis_katalog`
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
  `nama_dealer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dealer`
--

INSERT INTO `dealer` (`id_dealer`, `nama_dealer`) VALUES
(1, 'SINAR GENERAL INDUSTRIES, PT'),
(2, 'SAPROTAN UTAMA, CV'),
(3, 'EXCEL MEG INDO, PT'),
(13, 'DANKEN INDONESIA, PT'),
(14, 'UNI AGRO CHEMICA, CV'),
(15, 'AGRO MULIA, CV'),
(17, 'SARI KRESNA KIMIA, PT'),
(18, 'IMTA SUKSES ABADI, PT'),
(20, 'ETONG CHEMICAL INDONESIA, PT'),
(21, 'SARANA TANI MAKMUR, CV'),
(22, 'SANTANI AGRO SEMARANG, PT'),
(24, 'SURABAYA AGRO CHEMINDO, CV'),
(25, 'AGRICULTURE CONTRUCTION INDONESIA, PT'),
(26, 'CITRA BASINDO ABADI, PT'),
(27, 'CITRA NUSA NIAGA, CV'),
(28, 'DALZON CHEMICALS INDONESIA, PT'),
(30, 'JAWA AGRINDO INTERNASIONAL, PT'),
(31, 'LABEZAR UTAMA INDONESIA, PT');

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
(8, 'PUPUK'),
(9, 'RODENTISIDA'),
(10, 'PEREKAT'),
(11, 'ALAT-ALAT');

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
(44, 5, '500 ML', 1),
(45, 5, '250 ML', 2),
(46, 6, '50KG', 1),
(47, 6, '20KG', 2),
(64, 3, '25 KG', 1),
(70, 8, '500 GR', 10),
(72, 10, '2 LT', 5),
(73, 11, '1 KG', 10),
(74, 12, '500 GR', 20),
(75, 12, '100 GR', 50),
(76, 13, '1 LT', 20),
(77, 13, '20 LT', 1),
(78, 13, '5 LT', 4),
(79, 13, '4 LT', 6),
(82, 14, '100 GR', 100),
(85, 1, '100 ML', 10),
(86, 1, '50 ML', 20),
(87, 15, '50 ML', 100),
(88, 15, '250 ML', 20),
(89, 15, '100 ML', 50),
(90, 16, '250 ML', 20),
(91, 16, '100 ML', 50),
(92, 17, '250 ML', 40),
(93, 7, '500 GR', 10),
(94, 18, '250 ML', 40),
(95, 19, '500 ML', 20),
(96, 19, '200 ML', 30),
(97, 20, '1 LT', 15),
(98, 20, '500 ML', 20),
(99, 21, '100 GR', 50),
(100, 22, '25 GR', 200),
(101, 22, '100 GR', 50),
(102, 23, '100 GR', 100),
(103, 24, '400 ML', 20),
(104, 24, '250 ML', 40),
(105, 25, '100 ML', 50),
(106, 25, '250 ML', 40),
(107, 26, '1 LT', 10),
(108, 26, '500 ML', 25),
(109, 26, '250 ML', 50),
(110, 27, '1 LT', 10),
(111, 27, '400 GR', 25),
(112, 27, '100 GR', 50),
(113, 28, '1 LT', 10),
(114, 28, '500 ML', 25),
(115, 29, '100 ML', 50),
(116, 30, '10 GR', 2000),
(117, 30, '1 KG', 10),
(118, 30, '100 GR', 100),
(124, 34, '2 KG', 10),
(125, 34, '1 KG', 20),
(126, 35, '20 LT', 1),
(127, 35, '1 LT', 16),
(128, 35, '5 LT', 4),
(129, 36, '1 KG', 20),
(130, 36, '100', 200),
(132, 38, '100 GR', 100),
(133, 38, '50 GR', 200),
(136, 41, '100 GR', 50),
(137, 42, '20 LT', 1),
(138, 42, '400 ML', 20),
(139, 42, '200 ML', 40),
(140, 37, '100 GR', 100),
(141, 43, '800 ML', 12),
(142, 43, '500 ML', 24),
(143, 43, '250 ML', 40),
(144, 43, '100 ML', 50),
(145, 31, '100 GR', 100),
(146, 31, '400 GR', 25),
(147, 31, '800 GR', 25),
(148, 31, '200 GR', 50),
(149, 31, '15 GR', 500),
(150, 4, '300 ML', 20),
(151, 4, '500 ML', 20),
(152, 44, '12 V', 1),
(153, 45, '1 LT', 1),
(154, 45, '2 LT', 1),
(155, 46, '5 LT', 1),
(156, 46, '8 LT', 1),
(158, 48, '10 MATA', 1),
(160, 49, '20 LT', 1),
(161, 50, '20 LT', 1),
(162, 51, '16 LT', 1),
(163, 52, '16 LT', 1),
(167, 47, '1 MATA', 1),
(168, 39, '16 LT', 1),
(169, 40, '16 LT', 1),
(170, 53, '16 LT', 1),
(171, 54, '16 LT', 1),
(172, 2, '100 ML', 10),
(173, 2, '250 ML', 5),
(174, 55, '1 KG', 10),
(175, 55, '400 GR', 25),
(176, 55, '100 GR', 50),
(177, 56, '1 KG', 10),
(178, 57, '250 ML', 20),
(179, 57, '1 LT', 6),
(180, 57, '500 ML', 10),
(181, 58, '100 ML', 50),
(182, 58, '200 ML', 40),
(183, 58, '500 ML', 20),
(184, 59, '20 LT', 1),
(185, 59, '1 LT', 20),
(186, 59, '5 LT', 4),
(187, 60, '500 GR', 20),
(188, 61, '1 LT', 20),
(189, 61, '400 ML', 25),
(190, 62, '1 L', 20),
(191, 62, '20 L', 1),
(192, 62, '5 LT', 4),
(193, 63, '1 LT', 10),
(194, 63, '500 ML', 20),
(195, 63, '200 ML', 30),
(196, 64, '500 ML', 20),
(197, 64, '250 ML', 40),
(198, 64, '100 ML', 50),
(200, 66, '1 LT', 20),
(201, 66, '20 LT ', 1),
(202, 66, '500 ML', 25),
(203, 66, '5 LT', 4),
(204, 66, '250 ML', 40),
(205, 67, '20 LT', 1),
(206, 67, '1 LT', 20),
(207, 67, '5 LT', 4),
(208, 65, '400 ML', 20),
(209, 65, '80 ML', 50),
(210, 68, '500 GR', 20),
(211, 69, '100 ML', 100),
(212, 69, '1 LT', 20),
(213, 69, '400 ML', 25),
(214, 69, '200 ML', 40),
(215, 70, '25 KG', 1),
(216, 71, '500 ML', 20),
(217, 71, '100 ML', 50),
(218, 72, '500 ML', 20),
(219, 72, '250 ML', 40),
(220, 73, '250 ML', 40),
(221, 73, '5 L', 4),
(222, 73, '500 ML', 20),
(223, 73, '1 LT', 20),
(224, 73, '20 LT', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `img_produk` varchar(100) NOT NULL,
  `bahan_aktif` varchar(200) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_dealer`, `id_jenis_produk`, `nama_produk`, `img_produk`, `bahan_aktif`, `deskripsi_produk`) VALUES
(1, 13, 3, 'DK DUOPRO', '62c632dad69d2.jpg', 'PROCHLORAZ+PROPIKONAZOL', 'Fungisida Untuk Mengendalikan Penyakit yang di sebabkan oleh cendawan pada tanaman Padi,Bawang Merah,Mangga.'),
(2, 13, 1, 'DK FENZO', '62c63639a8221.jpg', 'KLORFENAPIR+EMAMECTIN ', 'Insektisida dengan racun kontak dan lambung untuk mengendalikan hama\r\nBentuk & Warna : Pekatan suspensi cair berwarna putih'),
(3, 2, 8, 'MKP', '62c638183b469.jpg', 'PHOSPHATE+POTASSIUM OXIDE', 'MKP merupakan pupuk Mono Potassium Phosphate berbentuk kristal yang mudah larut dalam air. Sehingga sangat mudah diaplikasikan dengan cara semprot maupun dikocorkan. Dapat diaplikasikan lewat tanah, daun atau sistem hidroponik.'),
(4, 14, 1, 'DIMETION', '62c63b07ad02a.jpg', 'DIMETOAT ', 'Insektisida racun kontak dan lambung berbentuk pekatan yang dapat diemulsikan untuk mengendalikan hama kutu-kutuan dan serangga pada tanaman cabai dan padi'),
(5, 1, 1, 'ATHENZ', '62c63cc99b29c.jpg', 'EMAMEKTIN BENZOATE', 'Merupakan insektisida yang biasa digunakan untuk mengendalikan ulat grayak pada bawang merah, jagung, padi dll'),
(6, 2, 8, 'SAPRODAP', '62dba05d65ed6.jpg', 'PHOSPHATE', 'SAPRODAP merupakan pupuk majemuk yang mengandung Nitrogen dan Phosphate serta Sulfur. Mempunyai kelarutan 85% sehingga cepat terserap oleh tanaman.'),
(7, 20, 2, 'ET PRORICE', '62f32691eb8f4.jpg', 'NATRIUM BISPIRIBAK', 'Herbisida selektif sistemik purna tumbuh berbentuk pekatan  suspensi berwarna putih untuk mengendalikan gulma pada budidaya tanaman padi. ET-Prorice dapat mengendalikan gulma berdaun lebar, gulma golongan rumput dan teki'),
(8, 15, 1, 'METROMIL', '62f3271571539.jpg', 'METOMIL ', 'Insektisida racun kontak dan lambung berbentuk tepung yang dapat larut dalam air .Insektisida ini sangat efektif untuk mengendalikan hama ulat pada berbagai tanaman seperti, cabai, tomat, padi, jagung, dll.\r\n\r\n\r\n\r\n'),
(10, 17, 1, 'LASER', '62f3312cd376d.jpg', 'PERMETRIN ', 'Laser 300 EC merupakan insektisida racun kontak dan lambung berbentuk pekatan yang dapat diemulsikan untuk mengendalikan hama trips dan kutu daun pada tanaman kentang.'),
(11, 25, 2, 'ABRE', '62f45b27a5af7.jpg', 'ATRAZIN ', 'Herbisida Abre 80 Wp, Adalah Herbisida Pra Tumbuh Yang Bisa Dikombinasikan Paraquat Yang Diaplikan Sehari Setelah Tanam Jagung Dan Juga Bisa Dikombinasikan Dengan Paraquat Dan 2.4D Untuk Aplikasi Penyiangan Pada Saat Gulma Pada Lahan Dijumpai 5-7 Daun Dan Benefitnya Adalah Pengendalian Gulma Menjadi Lama Dan Tanaman Tumbuh Optimal'),
(12, 25, 1, 'PLUSH WP', '62f45bea4204c.jpg', 'IMIDAKLOPRID+MONOSULTAP ', 'Nsektisida racun kontak, lambung dan sistemik berbentuk tepung berwarna hijau yang dapat dilarutkan dalam air untuk mengendalikan penggerek batang Scirpophaga incertulas, wereng Nilaparvata lugens pada tanaman padi sawah'),
(13, 26, 2, 'PATANIQUAT ', '62f45dfdd9d10.jpg', 'PARAKUAT DIKLORIDA', 'Herbisida Kontak Purna Tumbuh Berbentuk Larutan Dalam Air Untuk Mengendalikan Gulma Berdaun Lebar Dan Gulma Golongan Rumput Pada Tanaman Karet (Tmb). Gulma Sehari Mati Kering'),
(14, 13, 1, ' DK AUREVA WP', '62f45f4567b48.jpg', 'NITENPIRAM+BUPROFEZIN', 'Insektisida Anti Wereng , Kutu -Kutuan Kepik Juga Tuntas\r\n'),
(15, 20, 3, 'ADORE ', '62f4609c024a9.jpg', 'PIRAKLOSTROBIN+EPOKSIKONAZOL', 'Fungisida yang bersifat proktektif dan kuratif berbentuk pekatan suspensi untuk mengendalikan penyakit pada tanaman padi.'),
(16, 20, 1, 'EMARVEL', '62f46233f1efc.jpg', 'INDOKSAKARB+EMAMECTIN BENZOAT ', 'Insektisida racun Kontak Dan lambung berwarna Putih,untuk mengendalikan hama pada tanaman Padi\r\n'),
(17, 20, 8, 'ET TRAZOL ', '62f4633d5ca3f.jpg', 'PAKLOBUTRAZOL ', 'Zat pengatur tumbuh tanaman berbentuk pekatan suspensi, untuk mempercepat waktu berbunga, meningkatkan jumlah cabang berbunga dan bobot buah pada tanaman mangga'),
(18, 20, 2, 'ET PROMAIZE ', '62f464a186a4b.jpg', 'ATRAZIN+NICOSULFURON+MESOTRION ', 'Herbisida selektif jagung purna tumbuh berbentuk larutan dalam minyak berwarna putih untuk mengendalikan gulma berdaun lebar dan gulma berdaun sempit pada pertanaman jagung.'),
(19, 20, 2, 'ET PRORISO', '62f4657f56bc0.jpg', 'PENOKSULAM+BUTIL SIHALOTOP', 'Herbisida Selektif purna tumbuh untuk gulma berdaun lebar, gulma golongan rumput dan teki pada pertanaman padi sawah'),
(20, 27, 10, 'STICKPOL', '62f46764341d1.jpg', 'SURFECTAN+SELULOSA+ADDITIVE+NATRASOL+ABS+TEEPOL ', 'Meningkatkan Effektifitas Pestisida atau pupuk daun pada tanaman saat musim hujan\r\nMeningkatkan Effektifitas Pestisida pada hama, Juga mengoptimalkan pestisida dan pupuk daun sebagai Perekat, Pembasah, Perata, Penembus.'),
(21, 20, 1, 'KING BOSS', '62f4684737909.jpg', 'DINOTEFURON ', 'Insektisida racun kontak dan lambung berbentuk butiran yang dapat didispersikan, berwarna coklat muda, untuk mengendalikan hama wereng coklat pada tanaman padi. '),
(22, 20, 1, 'TRAVERSA', '62f4695d20bae.jpg', 'NITEMPIRAM+PIMETROZIN', 'Insektisida sistemik pembasmi kontak dan lambung berbentuk butiran yang dapat didispersikan dalam air untuk mengendalikan hama wereng coklat pada pertanaman padi sawah.'),
(23, 28, 3, 'EQUITY WP', '62f46a543b870.jpg', 'TRISIKLAZOL ', 'Fungisida protektif berbentuk tepung berwarna coklat kemerahan yang dapat disuspensikan dalam air, untuk mengendalikan penyakit blast pada tanaman padi\r\n'),
(24, 28, 1, 'SALSA ', '62f46ad93afe8.jpg', 'SIPERMETRIN+KLORPIRIFOS', 'Nsektisida racun kontak, lambung dan pernafasan berbentukpekatan berwarna kuning kecoklatan yang dapat diemulsikan, untuk mengendalikan ulat grayak ( Spodoptera Litura ) pada tanaman.'),
(25, 3, 1, 'ABASTAR ', '62f46badaf40b.jpg', 'ABAMEKTIN +KLORFENAPIR', 'Insektisida Racun kontak dan Samsung berbentuk pekatan suspensi berwarna putih,\r\nuntuk mengendalikan hama pada tanaman kacang panjang.'),
(26, 3, 3, 'DUSTER ', '62f46c5705c5d.jpg', 'TRISIKAZOL ', 'Merupakan fungisida yang bersifat sitemik berbentuk pekatan suspensi berwarana merah kecoklatan yang cepat diserap oleh akar dan daun, untuk mengendalikan bercak ungu pada tanaman bawang merah, atau blast daun pada tanaman padi.'),
(27, 3, 1, 'JOKER ', '62f46cdfc7f50.jpg', 'ASEFAT ', 'Insektisida racun kontak dan lambung berbentuk tepung yang dapat larut didalam air, berwarna putih, untuk mengendalikan ulat grayak (Spodoptera litura) pada tanaman cabe, Ulat penggerek buah (Helicoverpa Armigera) pada tanaman tomat, dan Ulat kantong (Metisa Plana), Ulat api (Thosea asigna) pada tanaman kelapa sawit.'),
(28, 3, 1, 'MEGAFOS ', '62f46d8e7dcc4.jpg', 'KLORPIRIFOS ', 'Insektisida racun kontak dan lambung berbentuk pekatan yang dapat diemulsikan.\r\n'),
(29, 3, 1, 'OJO 20 SG', '62f46e755fc0d.jpg', 'DINOTEFURAN', 'Insektisida racun kontak dan lambung berbentuk butiran yang dapat didispersikan, berwarna butiran putih, untuk mengendalikan hama wereng coklat (Nilaparvata lugens) pada tanaman padi sawah'),
(30, 3, 9, 'RATCELL ', '62f46f77946ec.jpg', 'SENG FOSFIDA', 'Rondentisida Racun saraf dan Pernapasan Berbentuk Tepung Untuk Mengendalikan Tikus.'),
(31, 30, 1, 'NEXUS ', '62f487cadbedb.jpg', 'METOMIL ', 'Insektisida racun kontak dan lambung untuk mengendalikan hama pada tanaman\r\nSasaran:\r\nUlat grayak,Telur ulat , walang sangit, keper, Penggorok batang, Penggorok daun,.Hama trips, dan lain-lain'),
(33, 17, 1, 'BENTO ', '62f488f7d1eda.png', 'SIPERMETRIN', 'Insektisida racun kontak dan lambung, berbentuk pekatan berwarna kuning yang dapat membentuk emulsi dalam air untuk mengendalikan ulat grayak '),
(34, 17, 1, 'GEMAFUR ', '62f489bcc8e63.jpg', 'KARBOFURAN ', 'Sektisida / Nematisida sistemik, berbentuk butiran warna ungu, untuk mengendalikan hama pada tanaman cabai, kedelai, padi, dan lain-lain.'),
(35, 17, 2, 'GROUNDUP PLUS', '62f48ab58ec55.png', 'IPA GLIFOSAT', 'Herbisida purna tumbuh sistemik berbentuk larutan dalam air, berwarna kuning kemasan untuk mengendalikan gulma berdaun lebar dan sempit pada tanaman kelapa sawit.'),
(36, 17, 9, 'KRESNAKUM ', '62f5a49909246.jpg', 'BRODIFAKUM ', 'Rodentisida antikoagulan siap pakai berbentuk blok/kotak kubus berwarna kebiruan, digunakan untuk mengendalikan hama tikus (Rattus rattus diardii) hama tikus belukar (Rattus tiomanicus) pada bangunan bukan perumahan.'),
(37, 17, 3, 'KRESNAVIN ', '62f5a5ece6243.jpg', 'KARBENDAZIM ', 'Fungisida sistemik yang bersifat proaktif dan kuratif berbentuk tepung yang dapat disuspensi untuk mengembangkan peyakit hawar upih Daun  rhizcotoni solani pada tanaman padi dan penyakit bintang sadap ceratocytis fimbriata pada tanaman karet '),
(38, 17, 4, 'KRESNOID ', '62f5a6aedcafe.jpg', 'FENTIN ASETAT', 'Racun keong padi sawah, 1bungkus untuk 4-6 tengki jika disemprot,jika dicampur pupuk 1 bungkus untuk 5 ember pupuk'),
(39, 17, 11, 'SPRAYER ELEKTRIK KRESNA', '62f5a840c4758.jpg', 'PLASTIK ABS', 'Spesifikasi :\r\nPump system : Diaphagm\r\nTipe batrai : 12 V 9AH\r\nBaterai : AC 100-240 V, 50-60Hz, Output DC 12V 1,0A\r\nArus listrik : 1,8 2,2 A\r\nSpray pressure : 0,25 0,4 MPA\r\nTekanan maksimum : 0,6 MPA'),
(40, 17, 11, 'SPRAYER MANUAL KRESNA', '62f5aacf0c151.jpg', 'PLASTIK ABS', 'Tanki Manual dengan kapasitas 16 liter produksi dari PT Sari Kresna Kimia\r\n\r\n'),
(41, 17, 4, 'TIN ACET WP ', '62f5abbdf34f7.jpg', 'FENTIN ASETAT', 'Racun keong bersifat protektif dan kuratif berbentuk tepung yang dapat diemulsikan untuk mengendalikan hama siput pada tanaman padi. Sudah terbukti dosis 1 bungkus untuk 5 rante'),
(42, 17, 2, 'TMA', '62f5ac62e6456.png', '2,4 D DIMETILAMINA', 'Herbisida sistemik purnah tumbuh larutan dalam air berwarna cokelat, dapat digunakan untuk mengendalikan gulma pada tanaman padi sawah dan tebuh.'),
(43, 31, 1, 'NEO POWER', '62f5aed2a68bd.jpg', 'EMAMEKTIN BENZOAT', 'Insektisida racun kontak, perut dan pemafasan berwarna kuning kecoklatan berbentuk pekatan yang dapat di emulasikan untuk mengendalikan hama spodopetra exigua pada tanaman bawang, serta hama ulat pada tanaman jagung'),
(44, 18, 11, 'BOOSTER IMATRON BMX-BT08', '62f602ff3f8e7.jpg', 'PLASTIK ABS', 'ALAT SEMPROT SUPER KABUT\r\nTeknologi semakin maju, petani kini dimudahkan dalam bekerja sehingga lebih cepat dan efektif. Salah satunya dalam hal menyemprot hama. Dengan alat semprot terbaru ini Anda bisa menyemprot dengan rata karena sangat kabut. Jangkauannya pun luas bisa 6-8 meter. Pekerjaan jadi makin cepat dan Anda bisa menghemat waktu untuk yang lainnya.'),
(45, 18, 11, 'HAND SPRAYER HOKITA', '62f603fb356ab.jpg', 'PLASTIK ABS', 'Sprayer tanaman Hokita terbuat dari bahan plastik berkualitas yang tahan dari macam-macam bahan kimia, memiliki tangki dengan kapasitas semprot sebesar 2 liter.\r\nSprayer Hokita juga dilengkapi dengan pompa manual bertekanan tinggi sehingga memudahkan proses penyemprotan pada tanaman, sprayer hokita juga dilengkapi teknologi nozzle spuyer yang berfungsi untuk mengatur besar kecil semprotan (kabut/jauh), selain itu juga dilengkapi karet cadangan apabila karet utama hilang atau rusak.Sprayer ini sangat cocok digunakan untuk perkebunan skala kecil/ rumahan karena praktis, kuat, dan aman digunakan untuk menampung pupuk/pestisida.\r\n'),
(46, 18, 11, 'HAND SPRAYER HOKITA ', '62f604a10c499.jpg', 'PLASTIK ABAS', 'Kapasitas Tangki : 8 Liter\r\nBerat Bersih : 2 Kg\r\nCara pakai : Dislempang / Gendong / Pundak\r\nCara kerja : Menggunakan Pompa manual (bagian atas)'),
(47, 18, 11, 'ALAT TANAM BENIH/JAGUNG TAJU', '62f6062deb2ec.jpg', 'PLASTIK ABS', 'IMTAGRO merupakan alat tanam jagung yang dapat memudahkan para petani dalam menanam jagung. Selain untuk jagung, alat tanam manual ini juga dapat digunakan untuk menanam benih seperti kacang hijau, kedelai dan jenis kacang-kacangan lainnya. \r\nDengan menggunakan imtagro pekerjaan semakin ringan. Mudah di operasionalkan, secara otomatis benih langsung keluar sendiri dan akan langsung terkubur dalam setiap lubang, sehingga para petani tidak perlu lagi bekerja dua kali dengan membuat lubang dan meletakkan benih tersebut secara manual pada tiap lubang.\r\nCara Kerja:\r\nAlat ini bekerja dengan prinsip melubang, meletakan benih dan menutup lubang tanam. Cukup menekan alat yang nantinya benih otomatis langsung keluar satu butir dan terkubur dalam setiap lubang.'),
(48, 18, 11, 'ALAT TANAM BENIH/ JAGUNG DORONG ', '62f608a3d1a06.jpg', 'PLASTIK ABS', 'Alat tanam jagung dorong.\r\n10 mata stainless\r\nmemudahkan menanam biji-bijian\r\nMesin Juga bisa digunakan untuk menanam :\r\n- kedelai\r\n- jagung\r\n- kacang tanah'),
(49, 18, 11, 'ALAT KOCOR PUPUK CAIR IMTAGRO LQ35 ', '62f609cca2e05.jpg', 'PLASTIK ABAS', 'Alat memudahkan pengocoran pupuk cair, dilengkapi 3 nozle dengan kapasitas 20 Liter.\r\nbahan tebal, produksi pabrik.\r\nlengkap dengan gendongan.\r\n'),
(50, 18, 11, 'ALAT KOCOR PUPUK PADAT IMTAGRO AP12', '62f60a73851fa.jpg', 'PLASTIK ABS', 'Alat ini digunakan untuk kocor pupuk padat / granul, sangat memudahkan petani dalam Pemupukan. tidak perlu membungkuk lagi. kapasitas 25 liter. Dipakai seperti ransel '),
(51, 18, 11, 'SPRAYER GEIKA ELEKTRIK ', '62f60b3e1a98b.jpg', 'PLASTIK ABS', 'Alat Semprot Elektrik Merk Geika Kapasitas Tanki 16 Liter dengan  Panjang : 39 cm  Lebar: 21 cm Tinggi : 47 cm Berat : 7000 gr'),
(52, 18, 11, 'SPRAYER MANUAL HOKITA ', '62f60c37934d6.jpg', 'PLASTIK ABS', 'Alat Semprot Panggul Bertekanan Tinggi dengan tangkai nosel stainless steel\r\nMaterial : Plastik tebal berkualitas, jadi lebih ringan untuk digendong\r\nKapasitas 16Liter '),
(53, 18, 11, 'SPRAYER ELEKTRIK MAXTRAL ', '62f6107e8284c.jpg', 'PLASTIK ABS', 'Tangki semprot pertanian kini sudah jadi alat pertanian yang sangat dibutuhkan oleh petani. Dengan perkembangan alat semprot pertanian modern maka terlahirlah produk alat semprot pertanian elektrik atau sprayer elektrik. Keunggulan sprayer elektrik  yaitu : Ringan dan mudah dibawa, Tidak mudah berkarat dan pecah, Kapasitas yang besar (16 Liter), Mudah dipasang dan dilepas, Bisa dicharge kembali karena dilengkapi dengan baterai'),
(54, 18, 11, 'SPRAYER ELEKTRIK SAKTI', '62f6117e41d7b.jpg', 'PLASTIK ABS', 'Bahan bodi tangki dari biji plastik murni sehingga tidak mudah pecah, tidak berkarat, & ringan sehingga mudah di bawa tidak bikin sakit pundak dan punggung. Kapasitas tangki 16 L dengan kemampuan pemakaian sekitar +- 18x isi atau setara dengan 288 L kebutuhan utk lahan 1 ha sekitar 16x atau setara 256 L charge pertama kali 8 jam selanjutnya sesuaikan dengan kebutuhan. Tank capacity :16 lt,  Presure : 0.15 - 0.4 Mpa, Battery : 12v/8Ah, Flow: 1.2-2.5l/menit'),
(55, 1, 1, 'ACE ONE', '62fc3a0f93e08.jpg', 'ASEFAT 75%', 'Insektisida racun kontak dan lambung berbentuk tepung yang dapat larut dalam air berwarna kuning muda untuk mengendalikan hama ulat daun dan ulat krop pada tanaman sawi dan kubis.'),
(56, 1, 3, 'AGRITHANE WP', '62fc3ba01e06b.jpg', 'MANKOZEB 80%', 'Dapat mengobati penyakit pada tanaman antara lain:\r\n Bawang merah: Penyakit bercak ungu Alternaria porii \r\nKentang: Penyakit hawar daun Pythophthora infestans \r\nKrisan: Penyakit karat Puccinia chrysanthemi \r\nPisang: Penyakit bercak daun Cercospora musicola\r\ndan tanaman lain-lainnya serta dapat juga diaplikasikan dalam tanaman buah-buahan'),
(57, 1, 2, 'EXTRA ONE', '62fc3d6b03340.jpg', 'MEZOTRIN + ATRAZIN', 'Herbisida Jagung EXTRA-ONE 680 SC\r\nBahan aktif Atrazin 600g/L dan Mesotrion 80g/l'),
(58, 1, 1, 'FLORIC 340 EC', '62fc3e359114e.jpg', 'KLORPIRIFOS 300 + ABEMEKTIN 40', 'Insektisida racun kontak dan lambung berbentuk pekatan yang dapat diemulsikan untuk mengendalikan hama pada tanaman Cabai'),
(59, 1, 2, 'FORMAT 360/120 SL', '62fc3f231d1f3.jpg', 'GLIFOSAT 360 G/L | 2.4-D DIMETIL AMINA 120 G/L', 'Herbisida sistemik purna tumbuh untuk mengendalikan gulma pada persiapan tanam padi sawah.\r\nSasaran gulma:\r\nGulma berdaun lebar: ludwigia octovalvis, monochoria vaginalis, alternanthera sessilis.\r\nGulma berdaun sempit: echinochloa crusgalli dan teki cyperus difformis.'),
(60, 1, 3, 'FUTSANIL 50 WP', '62fc3fba16eba.jpg', 'CYMOXANIL 50%', 'Bentuk Fungisida: WP/Wet Powder (Tepung berwarna putih)\r\nKomoditas: Semua jenis tanaman budidaya\r\nPengobatan: Hawar daun (Phytophthora infestans) dan jenis penyakit hawar lainnya\r\nDosis: 6 - 9 g/l'),
(61, 1, 1, 'GOBANG 110EC', '62fc404696900.jpg', 'FENOBUCARB 110G/L', 'Insektisida racun kontak dan lambung pekatan yang dapat diemulsikan berwarna kuning untuk mengendalikan hama pada tanaman bawang merah, cabai, kakao, semangka, tembakau, tomat'),
(62, 1, 2, 'GRIND UP 240 SL', '62fc417d69ccc.jpg', 'GLYFOSAT 240', 'Herbisida sistemik purna tumbuh berbahan aktif IPA glifosat 240 g/ l dengan formula khusus spesialis air asam yang sangat efektif mengendalikan gulam berdaun sempit dan berdaun lebar pada perkebunan kelapa sawit di lahan rawa dan gambut yang rata-rata kemasaman tanahnya tinggi. '),
(63, 1, 1, 'HYPOTEXT', '62fc421a4abfb.jpg', 'DIMEHYPO 500SL', 'HYPOTEXT adalah insektisida racun kontan dan lambung berbentuk pekatan yang dapat diemulaikan untuk mengendalikan hama pada tanaman padi , cabai, kakao dll'),
(64, 1, 1, 'LOGAMATE 440 EC', '62fc42ec87acb.jpeg', 'DIMETOAT 440 EC', 'Insektisida racun kontak dan Lambung berbentuk pekatan yang dapat diemulsikan untuk hama THRIPS, KUTU DAUN DAN LALAT BUAH.'),
(65, 24, 1, ' AKOCYTHRIN', '62fc47f127238.jpeg', 'LAMDA SIHALOTHRIN', 'Akocythrin 50EC merupakan insektisida racun kontak dan lambung berbentuk pekatan yang dapat diemulsikan berwarna kuning jerami jernih,untuk mengendalikan hama Spodoptera litura pada tanaman cabai.'),
(66, 1, 2, 'MANDOXONE', '62fc48776a790.jpg', 'PARAQUAT 276 ', 'Herbisida purna tumbuh yang bersifat kontak, berbentuk larutan dalam air berwarna hijau tua, untuk mengendalikan anakan sawit liar, gulma berdaun lebar dan sempit serta teki di lahan tanpa tanaman, Hutan Tanaman industri, cengkeh, jarak pagar, kakao, kapas, karet, kelapa hibrida, kelapa sawit. Keunggulan dari herbisida bersifat kontak adalah proses kematian gulma lebih cepat.'),
(67, 1, 2, 'MANTAPXONE', '62fc49ab46e24.jpg', 'PARAKUAT 135', 'Herbisida purna tumbuh yang bersifat kontak berbentuk larutan dalam air, berwarna hijau tua untuk mengendalikan gulma berdaun lebar dan berdaun sempit'),
(68, 1, 3, 'MERKURY 75 WP', '62fc4a9c31280.jpg', 'KLOROTALONIL 75%', 'Fungisida protektif berbentuk tepung yang dapat di suspensikan berwarna putih ke abu-abuan untuk mengendalikan segala macam penyakit pada tanaman, terutama penyakit hawar daun phytopthora infastans.'),
(69, 1, 1, 'METACHLOR 650 EC', '62fc4b5e2b5ce.jpg', 'KLORPIRIFOS 550 + SIPERMETRIN 100', 'Insektisida racun kontak dan lambung yg berbentuk pekatan yg dapat diemulasikan untuk mengendalikan hama penggerek polong pada tanaman kedelai.'),
(70, 1, 8, 'NPK 15-15-15 MULTIERA', '62fc4d58bf016.jpg', 'NITROGEN (N) FOSFOR (P) DAN KALIUM (K)', 'Pupuk NPK adalah pupuk yang memilik kandungan tiga unsur hara makro, yaitu Nitrogen (N) Fosfor (P) dan Kalium (K). Manfaat pupuk NPK secara umum adalah membantu pertumbuhan tanaman agar berkembang secara maksimal. Setiap unsur hara didalam pupuk NPK memiliki peran yang berbeda dalam membantu pertumbuhan tanaman. Ketiganya merupakan unsur hara makro primer karena paling banyak dibutuhkan oleh tanaman.'),
(71, 24, 1, 'BANTREK', '62fc4dba280b4.jpg', 'KLORPILIFOS', 'Pembasmi rayap kayu kering / rayap tanah ( coptotermes curvignathus ) pada kayu gergajian / fondasi bangunan'),
(72, 1, 1, 'ONE STAR 275 EC', '62fc4e58ee0a4.jpg', 'OXADIOZON 260 + ETIL PIRAZOSULFURON 15', 'Insektisida sistemik berbentuk suspensi berwarna putih berdaya racun kontak dan lambung untuk mengendalikan hama pada tanaman cabai dan padi'),
(73, 1, 2, 'REAKTIF 480 SL', '62fc502a67520.jpg', 'GLYPOSAT 480', 'Herbisida kontak purna tumbuh berbentuk larutan dalam air untuk mengendalikan gulma berdaun sempit dan semak/ berkayu pada kelapa sawit (TBM) ');

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
  MODIFY `id_dealer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kemasan`
--
ALTER TABLE `kemasan`
  MODIFY `id_kemasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
