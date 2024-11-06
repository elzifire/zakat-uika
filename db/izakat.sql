-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2022 pada 09.28
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `izakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `password`, `email`, `foto`) VALUES
(2, 'Pandi Kurniawan', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'pandikurniawan8f@gmail.com', '../img/foto/pandi.jpg'),
(15, 'Pajar Padillah ', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'fadhilahf51@gmail.com', 'img/foto/Koala.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_artikel`
--

CREATE TABLE `komentar_artikel` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar_artikel`
--

INSERT INTO `komentar_artikel` (`id`, `id_artikel`, `nama_muzakki`, `isi_komentar`) VALUES
(4, 7, '2', '<p>ini komentar 1</p>'),
(5, 5, 'frans chaniago', '<p>ini komentar ke tiga</p>'),
(6, 5, 'defi', '<p>ini komentar defi</p>'),
(7, 7, 'defi', '<p>ini komentar defi</p>'),
(8, 5, 'frans chaniago', '<p>ini komentar ke empat frans&nbsp;<strong>tes</strong></p>'),
(9, 5, 'rian deni', '<p>alhamdulillah sangat bermanfaat</p>'),
(10, 12, 'frans chaniago', '<p>sangat bermanfaat</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mustahiq`
--

CREATE TABLE `mustahiq` (
  `id` int(11) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `nama_yayasan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_zakat` int(100) NOT NULL,
  `tgl_penyaluran` date NOT NULL,
  `nama_amil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mustahiq`
--

INSERT INTO `mustahiq` (`id`, `nama_penerima`, `nama_yayasan`, `alamat`, `jumlah_zakat`, `tgl_penyaluran`, `nama_amil`) VALUES
(16, 'Mayang Destrina Putri', 'Yayasan Al-Hikmah', 'Metro', 3400000, '2021-11-10', 'Pajar Padillah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `muzakki`
--

CREATE TABLE `muzakki` (
  `id_user` int(11) NOT NULL,
  `foto_profil` varchar(100) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` bigint(15) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `muzakki`
--

INSERT INTO `muzakki` (`id_user`, `foto_profil`, `namalengkap`, `email`, `password`, `alamat`, `no_tlp`, `tgl_daftar`) VALUES
(2, 'img/foto_profil/p.jpg', 'Pajar Padillah', 'fadhilahf51@gmail.com', 'c6d8aebe2067dde6f9e16510534f7ae5246fa64e', 'Palembang Lampung', 62898200221, '2021-11-14'),
(26, 'img/foto_profil/Koala.jpg', 'Pandi Kurniawan', 'pandikurniawan8f@gmail.com', '445508f5876616b767ede3f15c25e6dbdf33d08b', 'Pesawaran', 876543456, '2022-01-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `balasan_admin` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `id_user`, `nama_user`, `pesan`, `balasan_admin`, `status`) VALUES
(14, 0, 'Pajar Padillah', 'halo', 'hai', 1),
(15, 0, 'Pajar Padillah', 'tes', 'kenapa?', 1),
(16, 18, 'Pajar Padillah', 'es lagi', '', 0),
(17, 0, 'Pajar Padillah', 'tes', 'iya', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `jumlah_bayar` varchar(100) NOT NULL,
  `metode_bayar` varchar(70) NOT NULL,
  `no_rekening` int(25) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `jumlah_bayar_konfirmasi` int(100) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `no_transaksi`, `nama`, `jenis_transaksi`, `bukti_transfer`, `jumlah_bayar`, `metode_bayar`, `no_rekening`, `atas_nama`, `jumlah_bayar_konfirmasi`, `tgl_bayar`, `keterangan`, `status`) VALUES
(20, '18', '21112208293820', 'Pajar Padillah', 'Zakat Emas Perak', 'img/bukti_transfer/006.jpg', '150000000', 'bri', 2147483647, 'Pajar Padillah', 150000000, '2021-11-22', 'Semoga tersalurkan dengan jujur', 2),
(26, '2', '21112303590926', 'Pajar Padillah', 'Zakat Pertanian', 'img/bukti_transfer/Screenshot (586).png', '35000', 'cimb', 12121212, 'nur', 34000, '2021-11-23', '', 2),
(27, '2', '21112304013227', 'Pajar Padillah', 'Zakat Ternak', 'img/bukti_transfer/Screenshot (585).png', '50000', 'mandiri', 121212, 'pajar', 35000, '2021-11-23', '', 2),
(29, '26', '22010604115428', 'Pandi Kurniawan', 'Zakat Fitrah', 'img/bukti_transfer/Tulips.jpg', '20000', 'bri', 123456789, 'Pandi Kurniawan', 20000, '2022-01-08', 'zakat fitrah', 2),
(30, '26', '22010802180330', 'Pandi Kurniawan', 'Zakat Infak', 'img/bukti_transfer/Lighthouse.jpg', '10000', '0', 1234567890, 'Pandi Kurniawan', 10000, '2022-01-09', '-', 3),
(31, '26', '22010802251531', 'Pandi Kurniawan', 'Zakat Sedekah', 'img/bukti_transfer/Chrysanthemum.jpg', '30000', 'bri', 1234567890, 'Pandi Kurniawan', 30000, '2022-01-08', '-', 2),
(32, '26', '22011004334032', 'Pandi Kurniawan', 'Zakat Fitrah', 'img/bukti_transfer/Jellyfish.jpg', '12000', 'bri', 1234567890, 'Pandi Kurniawan', 12000, '2022-01-10', 'zakat fitrah', 2),
(43, '26', '22011009271333', 'Pandi Kurniawan', 'Zakat Infak', 'img/bukti_transfer/Koala.jpg', '2000', 'BANK SYARIAH MANDIRI (7091234569)', 12345678, 'Pandi Kurniawan', 2000, '2022-01-10', 'infak', 2),
(44, '26', '22011009304044', 'Pandi Kurniawan', 'Zakat Infak', '', '20000', 'BNI SYARIAH (0259304174)', 0, '', 0, '0000-00-00', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`nama_admin`);

--
-- Indeks untuk tabel `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mustahiq`
--
ALTER TABLE `mustahiq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_penerima` (`nama_penerima`);

--
-- Indeks untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `namalengkap` (`namalengkap`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mustahiq`
--
ALTER TABLE `mustahiq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;