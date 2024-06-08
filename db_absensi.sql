-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2024 pada 03.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absen_panitia`
--

CREATE TABLE `tbl_absen_panitia` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ttd` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absen_pengawas`
--

CREATE TABLE `tbl_absen_pengawas` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(2) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ttd` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(2) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `kode_guru`, `nama_lengkap`) VALUES
(0, '1', 'Eko Sukma Wijaya, S, Si'),
(2, '3', 'Isti Qomah, S.Pd'),
(4, '5', 'Asep Cahya Nugraha, ST'),
(5, '6', 'Reni Iriani, S.Sos'),
(6, '7', 'Zainal Musthofa, A.Md'),
(7, '9', 'Heri Triono Saputro'),
(8, '10', 'Alif Fajar Immanudin, A.Md'),
(9, '11', 'cahyono, S.Pd'),
(10, '12', 'Eliyusnayeti, S.Pd'),
(12, '14', 'Lia Kurniawati, S.Pd'),
(29, '17', 'Ai Nurhayati, S.Pd'),
(30, '18', 'Yulianti, S.E'),
(32, '20', 'Ade Ajie Ferizal'),
(33, '21', 'Linda Marantika Wulandari'),
(34, 'T1', 'Dedeh Kusmiati, S.Pd'),
(35, 'T2', 'Ayi Solihudin, S.Pd'),
(38, 'T5', 'Imas Supriatin'),
(39, 'T6', 'Sri Maryani, S.Pd'),
(43, 'T7', 'Abdullah Azzam Ramadhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '11 PPLG 1'),
(2, '11 PPLG 2'),
(3, '11 TJKT'),
(4, '11 MPLB'),
(6, '11 AKL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'PENDIDIKAN AGAMA ISLAM'),
(2, 'PENDIDIKAN KEWARGANEGARAAN'),
(3, 'BAHASA INDONESIA'),
(4, 'BAHASA INGGRIS'),
(5, 'KIMIA'),
(6, 'MATEMATIKA'),
(7, 'SEJARAH INDONESIA'),
(8, 'PJOK'),
(9, 'TAHFIDZ'),
(10, 'IPA'),
(11, 'PEMROGRAMAN WEB DAN PERANGKAT BEGERAK'),
(12, 'TEKNOLOGI PERKANTORAN'),
(13, 'PEMODELAN PERANGKAT LUNAK'),
(14, 'TEKNOLOGI JARINGAN BERBASIS LUAS'),
(15, 'OTOMATISASI TATA KELOLA HUMAS DAN PERKANTORAN'),
(16, 'SIMULASI DAN KOMUNIKASI DIGITAL'),
(17, 'KORESPONDENSI'),
(18, 'EKONOMI BISNIS'),
(19, 'FISIKA'),
(20, 'SISTEM KOMPUTER'),
(21, 'PEMROGRAMAN DASAR'),
(22, 'DASAR DESAIN GRAFIS'),
(23, 'BASIS DATA'),
(24, 'PEMROGRAMAN BERORIENTASI OBJEK'),
(25, 'PRODUK KREATIF DAN KEWIRAUSAHAAN'),
(26, 'ADMINISTRASI UMUM'),
(27, 'TEKNOLOGI PERKANTORAN'),
(28, 'KEARSIPAN'),
(29, 'OTOMATISASI TATA KELOLA KEPEGAWAIAN'),
(30, 'OTOMATISASI TATA KELOLA KEUANGAN'),
(31, 'OTOMATISASI TATA KELOLA SARANA DAN PRASARANA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `ttd` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `counter` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absen_panitia`
--
ALTER TABLE `tbl_absen_panitia`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_absen_pengawas`
--
ALTER TABLE `tbl_absen_pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absen_panitia`
--
ALTER TABLE `tbl_absen_panitia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_absen_pengawas`
--
ALTER TABLE `tbl_absen_pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
