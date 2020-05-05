-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2020 at 07:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
-- Table structure for table `bank_profile`
--

CREATE TABLE `bank_profile` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bank` varchar(128) DEFAULT NULL,
  `an` varchar(128) DEFAULT NULL,
  `rekening` int(28) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `harga_spesial` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `antar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_item`, `nama`, `deskripsi`, `harga`, `id_kategori`, `status`, `harga_spesial`, `deposit`, `kondisi`, `merk`, `antar`) VALUES
(1, 'Barang 1', 'Deskripsi', 20000, 1, 1, 0, 500000, 1, 'Adidas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `sub_kat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `sub_kat`) VALUES
(1, 'Sepatu', 'Merk Adidas'),
(2, 'Sepatu', 'Merk Nike');

-- --------------------------------------------------------

--
-- Table structure for table `k_elektronik`
--

CREATE TABLE `k_elektronik` (
  `id` int(11) NOT NULL,
  `voltase` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `k_gadget`
--

CREATE TABLE `k_gadget` (
  `id` int(11) NOT NULL,
  `os` varchar(128) NOT NULL,
  `layar` int(11) NOT NULL,
  `memori` int(11) NOT NULL,
  `harddisk` int(11) NOT NULL,
  `resolusi` varchar(128) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_gadget`
--

INSERT INTO `k_gadget` (`id`, `os`, `layar`, `memori`, `harddisk`, `resolusi`, `id_item`) VALUES
(1, 'Android', 120, 2, 240, '2000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `k_games`
--

CREATE TABLE `k_games` (
  `id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `k_otomotif`
--

CREATE TABLE `k_otomotif` (
  `id` int(11) NOT NULL,
  `bahan_bakar` varchar(11) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `kapasitas` int(2) NOT NULL,
  `warna` varchar(128) NOT NULL,
  `transmisi` varchar(8) NOT NULL,
  `mesin` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `ac` int(1) NOT NULL,
  `usb` int(1) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `k_photography`
--

CREATE TABLE `k_photography` (
  `id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `material` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_od` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_sewa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `jenis_pembayaran` varchar(128) NOT NULL,
  `rekening` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_kembali` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `renter_profile`
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
-- Dumping data for table `renter_profile`
--

INSERT INTO `renter_profile` (`id_user`, `nama`, `alamat`, `no_hp`, `foto`, `email`) VALUES
(10, 'Surya Saputra 1', 'Purwodadi 1', '082323939888 1', '10.jpeg', 'surya.saputra030090@gmail.com 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `level` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` int(11) NOT NULL,
  `verif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `level`, `email`, `password`, `status`, `verif`) VALUES
(10, 'abraham', 1, 'surya.saputra030090@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 2, 1);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `add_user` AFTER INSERT ON `user` FOR EACH ROW BEGIN
INSERT INTO renter_profile (id_user, email) VALUES (new.id_user, new.email);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_profile`
--

CREATE TABLE `vendor_profile` (
  `id_user` int(11) NOT NULL,
  `nama_vendor` varchar(128) DEFAULT NULL,
  `deskripsi_vendor` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `foto` varchar(128) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_profile`
--

INSERT INTO `vendor_profile` (`id_user`, `nama_vendor`, `deskripsi_vendor`, `alamat`, `foto`) VALUES
(10, 'SUNDA EMPIRE 1', 'Penyewaan Barang Jasa Uhuy 1', 'Purwodadi 1', '10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `verif_identity`
--

CREATE TABLE `verif_identity` (
  `id_user` int(11) NOT NULL,
  `no_identitas` int(28) DEFAULT 0,
  `nama_identitas` varchar(128) DEFAULT NULL,
  `foto1` varchar(128) DEFAULT NULL,
  `foto2` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verif_identity`
--

INSERT INTO `verif_identity` (`id_user`, `no_identitas`, `nama_identitas`, `foto1`, `foto2`) VALUES
(10, 123123, 'Surya Saputra', '10_1.jpeg', '10_2.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_profile`
--
ALTER TABLE `bank_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `k_elektronik`
--
ALTER TABLE `k_elektronik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_gadget`
--
ALTER TABLE `k_gadget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_games`
--
ALTER TABLE `k_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_otomotif`
--
ALTER TABLE `k_otomotif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_photography`
--
ALTER TABLE `k_photography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_od`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `renter_profile`
--
ALTER TABLE `renter_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vendor_profile`
--
ALTER TABLE `vendor_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `verif_identity`
--
ALTER TABLE `verif_identity`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_profile`
--
ALTER TABLE `bank_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `k_elektronik`
--
ALTER TABLE `k_elektronik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `k_gadget`
--
ALTER TABLE `k_gadget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `k_games`
--
ALTER TABLE `k_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `k_otomotif`
--
ALTER TABLE `k_otomotif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `k_photography`
--
ALTER TABLE `k_photography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_od` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
