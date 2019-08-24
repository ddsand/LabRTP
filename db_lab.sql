-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2018 pada 17.04
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblalat`
--

CREATE TABLE `tblalat` (
  `idalat` int(11) NOT NULL,
  `namaalat` varchar(100) NOT NULL,
  `tahun` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblalat`
--

INSERT INTO `tblalat` (`idalat`, `namaalat`, `tahun`, `jumlah`, `status`) VALUES
(1, 'Raspberry Pi 3', '2015-02-03', 12, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblartikel`
--

CREATE TABLE `tblartikel` (
  `idartikel` int(11) NOT NULL,
  `judulartikel` varchar(250) NOT NULL,
  `tglrilis` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblartikel`
--

INSERT INTO `tblartikel` (`idartikel`, `judulartikel`, `tglrilis`, `isi`, `gambar`) VALUES
(3, 'Judul Artikel', '04-Nov-2018', 'Bagian ini diisi dengan isi dari artikel sehinggaaa memudahkan anda mengisi konten berita terbaru', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpengaduan`
--

CREATE TABLE `tblpengaduan` (
  `idpengaduan` int(11) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `ketpengaduan` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `status` int(11) NOT NULL,
  `tglditerima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpengaduan`
--

INSERT INTO `tblpengaduan` (`idpengaduan`, `pengirim`, `ketpengaduan`, `isi`, `status`, `tglditerima`) VALUES
(1, 'Sandy', 'Alat', 'Alat Raspberry PI Rusak no 3', 1, '2018-11-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpinjamalat`
--

CREATE TABLE `tblpinjamalat` (
  `idpinjam` int(11) NOT NULL,
  `idalat` int(11) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `peminjam` varchar(100) NOT NULL,
  `tglpinjam` varchar(100) NOT NULL,
  `jmlpinjam` int(11) NOT NULL,
  `statuspinjam` int(11) NOT NULL,
  `tglkembali` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpinjamalat`
--

INSERT INTO `tblpinjamalat` (`idpinjam`, `idalat`, `kelas`, `peminjam`, `tglpinjam`, `jmlpinjam`, `statuspinjam`, `tglkembali`) VALUES
(1, 1, '3 D4 Teknik Komputer A', 'Rudy', '2018-11-19', 10, 0, '2018-11-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpinjamruang`
--

CREATE TABLE `tblpinjamruang` (
  `idpinjam` int(11) NOT NULL,
  `idruang` int(11) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `tglpinjam` varchar(100) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpinjamruang`
--

INSERT INTO `tblpinjamruang` (`idpinjam`, `idruang`, `kelas`, `tglpinjam`, `peminjam`, `status`) VALUES
(1, 1, '3 D4 Teknik Komputer A', '2018-11-10', 'Rudi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblruang`
--

CREATE TABLE `tblruang` (
  `idruang` int(11) NOT NULL,
  `namaruang` varchar(100) NOT NULL,
  `ketua` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblruang`
--

INSERT INTO `tblruang` (`idruang`, `namaruang`, `ketua`) VALUES
(1, 'Lab RTP 205', 'Adnan Rachmad Anom Besari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `user`, `password`) VALUES
(1, 'admin', 'YWRtaW5ydHA='),
(3, 'adminrtp', 'b2tl');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblalat`
--
ALTER TABLE `tblalat`
  ADD PRIMARY KEY (`idalat`);

--
-- Indeks untuk tabel `tblartikel`
--
ALTER TABLE `tblartikel`
  ADD PRIMARY KEY (`idartikel`);

--
-- Indeks untuk tabel `tblpengaduan`
--
ALTER TABLE `tblpengaduan`
  ADD PRIMARY KEY (`idpengaduan`);

--
-- Indeks untuk tabel `tblpinjamalat`
--
ALTER TABLE `tblpinjamalat`
  ADD PRIMARY KEY (`idpinjam`);

--
-- Indeks untuk tabel `tblpinjamruang`
--
ALTER TABLE `tblpinjamruang`
  ADD PRIMARY KEY (`idpinjam`);

--
-- Indeks untuk tabel `tblruang`
--
ALTER TABLE `tblruang`
  ADD PRIMARY KEY (`idruang`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblalat`
--
ALTER TABLE `tblalat`
  MODIFY `idalat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tblartikel`
--
ALTER TABLE `tblartikel`
  MODIFY `idartikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tblpengaduan`
--
ALTER TABLE `tblpengaduan`
  MODIFY `idpengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tblpinjamalat`
--
ALTER TABLE `tblpinjamalat`
  MODIFY `idpinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tblpinjamruang`
--
ALTER TABLE `tblpinjamruang`
  MODIFY `idpinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tblruang`
--
ALTER TABLE `tblruang`
  MODIFY `idruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
