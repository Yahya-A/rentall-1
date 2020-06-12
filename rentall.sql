-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jun 2020 pada 06.40
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentall`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_profile`
--

CREATE TABLE `bank_profile` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bank` varchar(128) DEFAULT NULL,
  `an` varchar(128) DEFAULT NULL,
  `rekening` int(28) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_profile`
--

INSERT INTO `bank_profile` (`id`, `id_user`, `bank`, `an`, `rekening`) VALUES
(8, 15, 'BRI', 'Surya Saputra', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deposit` int(11) DEFAULT NULL,
  `kondisi` int(11) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `antar` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id_item`, `nama`, `deskripsi`, `harga`, `stock`, `id_kategori`, `status`, `deposit`, `kondisi`, `merk`, `antar`, `foto`, `id_user`) VALUES
(28, 'Macbook Pro 2016', 'Laptop siap tempur', 120000, 1, 9, 1, 500000, 2, 'Apple', 0, '1_15.jpeg', 15),
(29, 'Playstation 4', 'Console terepik', 50000, 5, 15, 1, 0, 3, 'Sony', 0, '29_15.jpeg', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `sub_kat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `sub_kat`) VALUES
(5, 'Otomotif', 'Motor'),
(6, 'Otomotif', 'Mobil'),
(7, 'Otomotif', 'Sepeda'),
(8, 'Elektronik & Gadgets', 'HP & Tablet'),
(9, 'Elektronik & Gadgets', 'Komputer'),
(10, 'Elektronik & Gadgets', 'Lain-Lain'),
(11, 'Elektronik & Gadgets', 'TV & Video'),
(12, 'Elektronik & Gadgets', 'Jaringan'),
(13, 'Elektronik & Gadgets', 'Drone'),
(14, 'Elektronik & Gadgets', 'Aksesoris'),
(15, 'Games & Toys', 'Elektronik'),
(16, 'Games & Toys', 'Papan Permainan'),
(17, 'Photography & Videography', 'Kamera Digital'),
(18, 'Photography & Videography', 'Kamera Film'),
(19, 'Photography & Videography', 'Video'),
(20, 'Photography & Videography', 'Aksesoris'),
(21, 'Photography & Videography', 'Penerangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_elektronik`
--

CREATE TABLE `k_elektronik` (
  `id` int(11) NOT NULL,
  `os` varchar(128) NOT NULL,
  `layar` varchar(11) NOT NULL,
  `memori` varchar(30) NOT NULL,
  `harddisk` varchar(30) NOT NULL,
  `resolusi` varchar(128) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `k_elektronik`
--

INSERT INTO `k_elektronik` (`id`, `os`, `layar`, `memori`, `harddisk`, `resolusi`, `id_item`) VALUES
(7, 'macOS Catalina 10.14.6', '14 inch', '8 GB', '1 TB', '1360 x 768', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_games`
--

CREATE TABLE `k_games` (
  `id` int(11) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `k_games`
--

INSERT INTO `k_games` (`id`, `berat`, `ukuran`, `gender`, `id_item`) VALUES
(4, '1 KG', '1 M2', 1, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_otomotif`
--

CREATE TABLE `k_otomotif` (
  `id` int(11) NOT NULL,
  `bahan_bakar` varchar(11) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `kapasitas` int(2) NOT NULL,
  `warna` varchar(128) NOT NULL,
  `transmisi` varchar(8) NOT NULL,
  `mesin` varchar(25) NOT NULL,
  `km` int(11) NOT NULL,
  `ac` int(1) NOT NULL,
  `usb` int(1) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_photography`
--

CREATE TABLE `k_photography` (
  `id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `material` varchar(30) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_od` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `qty` int(11) NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id_od`, `id_order`, `id_item`, `tgl_sewa`, `tgl_kembali`, `qty`, `durasi_sewa`, `total_harga`) VALUES
(1, 1, 28, '2020-06-11', '2020-06-20', 2, 9, 0),
(2, 1, 29, '2020-06-10', '2020-06-15', 1, 5, 0),
(7, 2, 28, '2020-06-11', '2020-06-18', 2, 7, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

CREATE TABLE `order_item` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `antar` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_item`
--

INSERT INTO `order_item` (`id_order`, `id_user`, `tanggal_order`, `status`, `antar`, `id_pembayaran`) VALUES
(1, 15, '2020-06-11 17:57:25', 0, 2, 1),
(2, 15, '2020-06-12 03:47:16', 0, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `jenis_pembayaran` varchar(128) NOT NULL,
  `rekening` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_kembali` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `renter_profile`
--

CREATE TABLE `renter_profile` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `foto` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `renter_profile`
--

INSERT INTO `renter_profile` (`id_user`, `nama`, `alamat`, `no_hp`, `foto`, `email`) VALUES
(11, NULL, NULL, NULL, 'default.jpg', 'surya.saputra41@rocketmail.com'),
(15, 'Surya Saputra', 'Lingkungan Sekaran', '082323939888', '15.jpeg', 'surya.saputra030090@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `level` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` int(11) NOT NULL,
  `verif` int(11) NOT NULL,
  `token` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `level`, `email`, `password`, `status`, `verif`, `token`) VALUES
(11, 'google', 1, 'surya.saputra41@rocketmail.com', '3dbe00a167653a1aaee01d93e77e730e', 1, 0, 0),
(15, 'abraham', 2, 'surya.saputra030090@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 2, 0, 1);

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `add_user` AFTER INSERT ON `user` FOR EACH ROW BEGIN
INSERT INTO renter_profile (id_user, email) VALUES (new.id_user, new.email);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_profile`
--

CREATE TABLE `vendor_profile` (
  `id_user` int(11) NOT NULL,
  `nama_vendor` varchar(128) DEFAULT NULL,
  `deskripsi_vendor` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `foto` varchar(128) DEFAULT 'default.jpg',
  `kota` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor_profile`
--

INSERT INTO `vendor_profile` (`id_user`, `nama_vendor`, `deskripsi_vendor`, `alamat`, `foto`, `kota`) VALUES
(15, 'Lokalan PRIDE', 'Menyewakan barang-barang buatan INDONESIA', 'Semarang Selatan', 'default.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verif_identity`
--

CREATE TABLE `verif_identity` (
  `id_user` int(11) NOT NULL,
  `no_identitas` int(28) DEFAULT 0,
  `nama_identitas` varchar(128) DEFAULT NULL,
  `foto1` varchar(128) DEFAULT NULL,
  `foto2` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_profile`
--
ALTER TABLE `bank_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `k_elektronik`
--
ALTER TABLE `k_elektronik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_games`
--
ALTER TABLE `k_games`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_otomotif`
--
ALTER TABLE `k_otomotif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_photography`
--
ALTER TABLE `k_photography`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_od`);

--
-- Indeks untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `renter_profile`
--
ALTER TABLE `renter_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vendor_profile`
--
ALTER TABLE `vendor_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `verif_identity`
--
ALTER TABLE `verif_identity`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank_profile`
--
ALTER TABLE `bank_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `k_elektronik`
--
ALTER TABLE `k_elektronik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `k_games`
--
ALTER TABLE `k_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `k_otomotif`
--
ALTER TABLE `k_otomotif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `k_photography`
--
ALTER TABLE `k_photography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_od` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
