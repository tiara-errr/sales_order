-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2026 pada 07.34
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `lokasi_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun`, `id_kategori`, `stok`, `lokasi_rak`) VALUES
(1, 'BN008', 'Laskar Pelangi', 'Andrea Hirata', 'Bintang Pustaka', 2005, 4, 10, '634.20'),
(3, 'BK117', 'Akuntansi Dasar', 'Faiz Zamzami', 'UGM Press', 2024, 10, 15, '122.65'),
(4, 'BB001', 'Bahasa Inggris 1', 'Arya Winata', 'Loveable', 2025, 14, 20, '297.77'),
(5, 'BKM012', 'Pemrograman Python', 'Sugeng Winardi', 'Deepublish', 2022, 8, 26, '190.31'),
(6, 'BKM110', 'Pemrograman Java', 'Vivian Margaret', 'Sparta Publishing', 2010, 8, 11, '870.11'),
(7, 'BC001', 'Hanya Imajinasi', 'Naomi Lesmana', 'Gramedia Pustaka Utama', 2018, 5, 29, '122.16'),
(26, 'BK011', 'Fiqih Ibadah', 'Ust. Yusuf', 'Mizan', 2018, 2, 6, 'A2'),
(27, 'BK012', 'Strategi Pendidikan Modern', 'Dr. Sari', 'Erlangga', 2020, 3, 5, 'B2'),
(28, 'BK013', 'Novel Dilan 1991', 'Pidi Baiq', 'Pastel Books', 2015, 4, 9, 'C3'),
(30, 'BK015', 'Biografi Soekarno', 'Benedict Anderson', 'Kompas', 2019, 6, 4, 'D3'),
(31, 'BK016', 'Matematika Terapan', 'Sukino Ar', 'Erlangga', 2022, 7, 10, 'D4'),
(32, 'BK017', 'Dasar-Dasar Akhlak', 'Ust. Hanan', 'Mizan', 2021, 2, 8, 'A3'),
(33, 'BK018', 'Metode Pembelajaran Efektif', 'Dr. Lestari', 'Gramedia', 2019, 3, 6, 'B3'),
(34, 'BK019', 'Novel Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 'Republika', 2004, 4, 10, 'C5'),
(35, 'BK020', 'Kumpulan Cerpen Inspiratif', 'Ayu Utami', 'Kepustakaan Populer', 2017, 5, 5, 'C6'),
(36, 'BK021', 'Biografi Albert Einstein', 'Walter Isaacson', 'Bentang', 2018, 6, 4, 'D5'),
(37, 'BK022', 'Statistika Dasar', 'Suhartono', 'Erlangga', 2022, 7, 9, 'D6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
