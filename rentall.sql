-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2020 at 10:48 PM
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
  `rekening` varchar(28) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_profile`
--

INSERT INTO `bank_profile` (`id`, `id_user`, `bank`, `an`, `rekening`) VALUES
(9, 10, 'BRI', 'Surya Saputra', '123123');

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
  `stock` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deposit` int(11) DEFAULT NULL,
  `kondisi` int(11) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `antar` int(11) NOT NULL,
  `item_img` varchar(128) NOT NULL,
  `id_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_item`, `nama`, `deskripsi`, `harga`, `stock`, `id_kategori`, `status`, `deposit`, `kondisi`, `merk`, `antar`, `item_img`, `id_vendor`) VALUES
(1, 'Acer E5-475G', 'Laptop yang cocok untuk melakukan tugasnya', 50000, 2, 9, 1, 500000, 2, 'Acer', 1, '1.jpeg', 10),
(20, 'Macbook Pro 2016', 'Laptop gahar dengan desain maksimal', 100000, 1, 9, 1, 1000000, 2, 'Apple', 0, '20.jpeg', 10),
(21, 'Playstation 4', 'Playstation 4 cocok untuk bermain saat WFH', 40000, 5, 15, 1, 500000, 4, 'Playstation', 1, '21.jpeg', 11),
(23, 'Avanza Facelift', 'Cocok untuk berpergian dengan keluarga tersayang', 250000, 2, 6, 1, 1000000, 1, 'Toyota', 1, '23.jpeg', 13),
(24, 'Agya Turbo', 'Mobil agya dengan turbo yang super ngebut sangat', 200000, 1, 6, 1, 1000000, 1, 'Toyota', 1, '24.jpeg', 11),
(25, 'Sony A6000', 'Saatnya mengabadikan setiap momen berharga', 100000, 2, 17, 1, 500000, 2, 'Sony', 0, '25.jpeg', 11),
(26, 'Canon DSLR 3D', 'Pemula akan merasa menjadi Profesional saat menggunakan ini', 200000, 2, 17, 1, 0, 2, 'Canon', 1, '26.jpeg', 13),
(31, 'Kipas Angin Maspion', 'Kipas ini sangat dingin', 50000, 2, 10, 1, 1000000, 2, 'Maspion', 0, '27_10.jpeg', 10);

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
-- Table structure for table `k_elektronik`
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
-- Dumping data for table `k_elektronik`
--

INSERT INTO `k_elektronik` (`id`, `os`, `layar`, `memori`, `harddisk`, `resolusi`, `id_item`) VALUES
(5, 'Windows 10', '14 inch', '8 GB', '1 TB', '1360 x 768', 1),
(6, 'macOS Catalina 10.14.6', '16 Inch', '8 GB', '1 TB', '1360 x 768', 20),
(10, '', '', '', '', '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `k_games`
--

CREATE TABLE `k_games` (
  `id` int(11) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_games`
--

INSERT INTO `k_games` (`id`, `berat`, `ukuran`, `gender`, `id_item`) VALUES
(2, '1 KG', '1 M2', 1, 21);

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
  `mesin` varchar(25) NOT NULL,
  `km` int(11) NOT NULL,
  `ac` int(1) NOT NULL,
  `usb` int(1) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_otomotif`
--

INSERT INTO `k_otomotif` (`id`, `bahan_bakar`, `tahun_terbit`, `kapasitas`, `warna`, `transmisi`, `mesin`, `km`, `ac`, `usb`, `id_item`) VALUES
(2, 'Bensin', 2019, 1, 'Silver', 'Matic', '1500', 260, 1, 2, 23),
(3, 'Bensin', 2019, 6, 'Silver', 'Matic', '1600', 12, 1, 4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `k_photography`
--

CREATE TABLE `k_photography` (
  `id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `material` varchar(30) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_photography`
--

INSERT INTO `k_photography` (`id`, `berat`, `material`, `ukuran`, `id_item`) VALUES
(2, 1, 'Kulit', 15, 25),
(3, 2, 'Metal', 14, 26);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` varchar(20) NOT NULL,
  `id_item` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `qty` int(11) NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_item`, `tgl_sewa`, `tgl_kembali`, `qty`, `durasi_sewa`, `total_harga`) VALUES
('RN02976KAOK10', 25, '2020-07-04', '2020-07-08', 1, 4, 400000),
('RN02157ROIM5', 24, '2020-07-08', '2020-07-16', 1, 8, 1600000),
('RN02793LAQN6', 23, '2020-07-09', '2020-07-17', 2, 8, 4000000),
('RN02863EHJC7', 25, '2020-07-09', '2020-07-17', 2, 8, 1600000);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id_order` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_sewa` int(11) NOT NULL,
  `antar` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id_order`, `id_user`, `id_vendor`, `tanggal_order`, `status_sewa`, `antar`, `id_pembayaran`) VALUES
('RN02157ROIM5', 11, 11, '2020-07-02 13:38:08', 3, 1, 1),
('RN02793LAQN6', 11, 13, '2020-07-02 14:54:31', 0, 1, 2),
('RN02863EHJC7', 10, 11, '2020-07-02 15:13:23', 3, 0, 1),
('RN02976KAOK10', 11, 11, '2020-07-02 13:00:23', 3, 0, 1);

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
  `foto` varchar(128) NOT NULL DEFAULT 'default.png',
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter_profile`
--

INSERT INTO `renter_profile` (`id_user`, `nama`, `alamat`, `no_hp`, `foto`, `email`) VALUES
(10, 'Surya Saputra 1', 'Purwodadi 1', '082323939888 1', '10.jpeg', 'surya.saputra030090@gmail.com 1'),
(11, 'Yahya AA', 'Pulutan', '08588012874', 'default.png', 'yahya@gmail.com'),
(12, 'Nisha Meilina', 'Plamongan', '098777654678', 'default.png', 'nisha@gmail.com'),
(13, 'Noor Faizin', 'Kudus', '08877373999', 'default.png', 'pintas@gmail.com'),
(14, NULL, NULL, NULL, 'default.png', 'surya.saputra030090@gmail.com');

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
  `verif` int(11) NOT NULL COMMENT '0: belum \r\n1: verif \r\n2: menunggu',
  `token` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `level`, `email`, `password`, `status`, `verif`, `token`) VALUES
(10, 'abraham', 3, 'surya.saputra030090@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 2, 1, 0),
(11, 'Yahya', 3, 'yahya@gmail.com', 'c41e401185692add66fb9fc2292e5965', 2, 0, 1),
(12, 'nisha', 1, 'nisha@gmail.com', '54c9ed0c893e9f5ff3cf8ddf90c4fb9f', 2, 0, 0),
(13, 'Pintas', 1, 'pintas@gmail.com', '38f364caced40fdc9c36dc68daf10fbe', 2, 0, 0),
(14, 'a221802635', 1, 'surya.saputra030090@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 1, 0, 0);

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
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(128) DEFAULT NULL,
  `deskripsi_vendor` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `foto` varchar(128) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_profile`
--

INSERT INTO `vendor_profile` (`id_vendor`, `nama_vendor`, `deskripsi_vendor`, `alamat`, `foto`) VALUES
(10, 'SUNDA EMPIRE 1', 'Penyewaan Barang Jasa Uhuy 1', 'Purwodadi 1', '10.jpeg'),
(11, 'VendorKu', 'Sewa Barang Jadi Gampang', 'Karanggede', 'default.jpg'),
(12, 'BeautyVen', 'Sekali Putaran Setengah Putaran', 'Plamongan', 'default.jpg'),
(13, 'PintasID', 'Pintasin aja dong yaa', 'Semarang', 'default.jpg');

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
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD UNIQUE KEY `id_order` (`id_order`);

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
  ADD PRIMARY KEY (`id_vendor`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `k_elektronik`
--
ALTER TABLE `k_elektronik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
