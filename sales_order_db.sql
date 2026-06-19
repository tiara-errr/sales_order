-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2026 pada 14.59
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
-- Database: `sales_order_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail`, `id_order`, `id_produk`, `qty`, `harga`, `subtotal`) VALUES
(1, 2, 5, 3, '5250000.00', '15750000.00'),
(2, 3, 7, 2, '850000.00', '1700000.00'),
(3, 4, 4, 1, '3800000.00', '3800000.00'),
(4, 5, 6, 3, '4100000.00', '12300000.00'),
(5, 6, 8, 1, '1000000.00', '1000000.00'),
(6, 7, 3, 1, '4500000.00', '4500000.00'),
(7, 8, 4, 2, '3800000.00', '7600000.00'),
(8, 9, 9, 1, '800000.00', '800000.00'),
(9, 10, 6, 1, '4100000.00', '4100000.00'),
(10, 11, 9, 1, '800000.00', '800000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`) VALUES
(2, 'PT Sinar Elektronik', 'Jl. Merdeka No. 15, Jakarta', '0878789805431'),
(3, 'Eka Indah Jaya', 'Mawar Sari Indonesia', '087856433422'),
(4, 'Annisa Azizah', 'Jl. Raya Ciputat Jakarta Barat', '082132884552'),
(5, 'PT Jaya Kusuma', 'Jl Kembangan Jakarta Utara', '089659004118');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `harga` decimal(12,0) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kode`, `harga`, `stok`) VALUES
(3, 'Kulkas Sharp 2 Pintu', 'KS001', '4500000', 5),
(4, 'Mesin Cuci LG 1 Tabung', 'MC002', '3800000', 8),
(5, 'Smart TV Samsung 43 Inch', 'ST003', '5250000', 10),
(6, 'AC Panasonic 2 PK', 'AP004', '4100000', 5),
(7, 'Dispenser Miyako Hot & Cold', 'DM005', '850000', 6),
(8, 'Kipas Angin Miyako', 'KA808', '1000000', 5),
(9, 'Printer Epson A32', 'PE832', '800000', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `sales_id` varchar(10) NOT NULL,
  `nama_sales` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id_sales`, `sales_id`, `nama_sales`) VALUES
(1, 'SLS001', 'Rina Mussa N'),
(2, 'SLS002', 'Afifah Riyad Y'),
(3, 'SLS003', 'Indra Septian'),
(4, 'SLS004', 'Jonathan C'),
(6, 'SLS005', 'Canva Mahendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order`
--

CREATE TABLE `sales_order` (
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `total_harga` decimal(12,2) DEFAULT 0.00,
  `status` enum('draft','dikirim','selesai','dibatalkan') NOT NULL DEFAULT 'draft',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sales_order`
--

INSERT INTO `sales_order` (`id_order`, `kode_order`, `id_pelanggan`, `id_sales`, `tanggal_order`, `total_harga`, `status`, `user_id`) VALUES
(1, 'ORD-6a24e3648eb3e', 2, 1, '2026-06-03', '0.00', 'draft', 1),
(2, 'ORD-6a24ebfd02045', 2, 1, '2026-06-05', '15750000.00', 'dikirim', 1),
(3, 'ORD-6a24f0ef4164b', 3, 1, '2026-06-02', '1700000.00', 'selesai', 1),
(4, 'ORD-6a24f10537005', 3, 1, '2026-06-03', '3800000.00', 'dikirim', 1),
(5, 'ORD-6a2503247d562', 3, 3, '2026-06-07', '12300000.00', 'dibatalkan', 1),
(6, 'ORD-6a25165075e4d', 4, 4, '2026-06-07', '1000000.00', 'selesai', 1),
(7, 'ORD-6a251a315bf11', 4, 4, '2026-06-04', '4500000.00', 'dibatalkan', 1),
(8, 'ORD-6a2520d19420c', 2, 2, '2026-06-07', '7600000.00', 'selesai', 1),
(9, 'ORD-6a3529f887c1a', 5, 6, '2026-06-19', '800000.00', 'selesai', 1),
(10, 'ORD-6a352a577262d', 5, 6, '2026-06-19', '4100000.00', 'draft', 2),
(11, 'ORD-6a3530de528b7', 4, 6, '2026-06-19', '800000.00', 'dibatalkan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','sales','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'adm1', 'admin'),
(2, 'sales', 'sal1', 'sales'),
(3, 'manager', 'man1', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indeks untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
