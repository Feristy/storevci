-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 07:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `nama` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `nama`) VALUES
(3, 'slide1.jpg'),
(4, 'slide2.jpg'),
(5, 'slide3.jpg'),
(6, 'product-01.jpg'),
(7, 'product-02.jpg'),
(8, 'product-03.jpg'),
(9, 'product-04.jpg'),
(10, 'product-05.jpg'),
(11, 'product-06.jpg'),
(12, 'product-07.jpg'),
(13, 'product-08.jpg'),
(14, 'product-09.jpg'),
(15, 'product-10.jpg'),
(16, 'product-11.jpg'),
(17, 'product-12.jpg'),
(18, 'product-13.jpg'),
(19, 'product-14.jpg'),
(20, 'product-15.jpg'),
(21, 'product-16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(220) NOT NULL,
  `slug` text NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`, `position`) VALUES
(1, 'Elektronik', 'Elektronik', 1),
(2, 'Fashion', 'Fashion', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` varchar(200) NOT NULL,
  `jasa_pengiriman` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(220) NOT NULL,
  `harga` varchar(220) NOT NULL,
  `berat` varchar(220) NOT NULL,
  `ukuran` varchar(200) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `stok` varchar(220) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `kategori` varchar(220) NOT NULL,
  `diskon` varchar(220) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `berat`, `ukuran`, `warna`, `stok`, `gambar`, `kategori`, `diskon`, `deskripsi`) VALUES
(3, 'Produk', '200000', '1', '', '', '20', '6', 'Fashion', '', 'Produk ini adalah produk yang sangat berkualitas super berkualitas yang sangat bagus untuk anda.'),
(4, 'Produk1', '200000', '1', '', '', '20', '7', 'Fashion', '', 'Produk ini adalah produk yang sangat berkualitas untuk anda.'),
(5, 'Produk2', '20000', '20', '', '', '20', '8', 'Fashion', '', 'Produk ini adalah produk yang sangat berkualitas untuk anda.');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `title` varchar(20) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `btn_text` varchar(200) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `img`, `title`, `sub_title`, `btn_text`, `position`) VALUES
(1, 'slide1.jpg', 'Fashion', 'Apapun Fashion Yang Anda Butuhkan Kami Sediakan', 'View Collection', 0),
(2, 'slide2.jpg', 'Fashion', 'Apapun Fashion Yang Anda Butuhkan Kami Sediakan', 'View Collection', 0),
(3, 'slide3.jpg', 'Fashion', 'Apapun Fashion Yang Anda Butuhkan Kami Sediakan', 'View Collection', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `gambar` text NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `address`, `gender`, `about`, `gambar`, `role`) VALUES
(1, 'alis', '$2y$10$BPBDfvCrm7.T2PrYZHcVY.Z3KYYVgCaoIcEbH5lCkb102H4ZfctCa', 'alis_alisa@alis.com', '', '', 'Perempuan', '', 'download.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
