-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 14. Januari 2018 jam 17:43
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pmi_ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `idberita` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`idberita`, `tanggal`, `judul`, `isi`, `aktif`, `gambar`) VALUES
(3, '2013-10-15 23:23:51', 'Promo Akhir Tahun', '', 1, 'promo.jpg'),
(4, '2013-10-15 23:24:05', 'Promo Lebaran', '', 1, 'promo_lebaran12_1.png'),
(5, '2018-01-11 01:43:12', 'klkjml', '<p>nhjjkhnkjun</p>', 1, 'aaa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayaran`
--

CREATE TABLE IF NOT EXISTS `bukti_pembayaran` (
  `idpembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `noinvoice` varchar(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  PRIMARY KEY (`idpembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`idpembayaran`, `tanggal`, `noinvoice`, `foto`, `kota`, `alamat`, `keterangan`) VALUES
(5, '2018-01-11', 'T00006', 'Lighthouse.jpg', 'kjhnjknh', 'lkjklj', 'jbnjbhjb'),
(6, '2018-01-11', 'T00006', 'Koala.jpg', 'cino', 'lolo', 'jilo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `noinvoice` varchar(6) NOT NULL,
  `tanggal` datetime NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `totalbayar` float NOT NULL,
  `transfer` tinyint(1) NOT NULL,
  `tglkirim` datetime DEFAULT NULL,
  PRIMARY KEY (`noinvoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`noinvoice`, `tanggal`, `idpelanggan`, `totalbayar`, `transfer`, `tglkirim`) VALUES
('T00001', '2013-10-15 22:52:17', 1, 209916, 1, '2013-10-15 22:56:52'),
('T00002', '2013-10-16 06:15:51', 3, 419832, 1, '2013-10-16 06:18:24'),
('T00004', '2017-10-12 21:08:18', 4, 209916, 1, '2017-10-12 23:16:16'),
('T00006', '2018-01-11 01:35:34', 5, 424878, 1, '2018-01-11 01:37:57'),
('T00007', '2018-01-11 19:53:03', 7, 28336600, 0, NULL),
('T00008', '2018-01-11 22:13:17', 5, 212439, 0, NULL),
('T00009', '2018-01-13 14:04:09', 5, 1800000, 0, NULL),
('T00010', '2018-01-13 14:06:37', 5, 17000000, 0, NULL),
('T00011', '2018-01-13 14:08:34', 5, 8500000, 0, NULL),
('T00012', '2018-01-13 14:10:50', 5, 1550000, 0, NULL),
('T00013', '2018-01-14 00:59:46', 8, 1550000, 0, NULL),
('T00014', '2018-01-14 01:01:17', 8, 3650000, 0, NULL),
('T00015', '2018-01-14 01:03:57', 8, 1400000, 0, NULL),
('T00016', '2018-01-14 01:04:32', 8, 2300000, 0, NULL),
('T00017', '2018-01-14 19:33:38', 5, 3800000, 0, NULL),
('T00018', '2018-01-14 19:36:50', 6, 340000, 0, NULL),
('T00019', '2018-01-14 19:39:55', 6, 340000, 0, NULL),
('T00020', '2018-01-14 19:40:47', 6, 1450000, 0, NULL),
('T00021', '2018-01-14 19:46:14', 6, 1750000, 0, NULL),
('T00022', '2018-01-14 21:43:16', 6, 1750000, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(40) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama_kategori`) VALUES
(8, 'KULKAS'),
(9, 'MESIN CUCI'),
(10, 'SOUNDBAR'),
(11, 'CCTV'),
(12, 'TV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(30) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `biaya_ongkir` int(11) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`, `id_kota`, `kodepos`, `biaya_ongkir`) VALUES
(1, 'Barat I', 1, 321362, 0),
(2, 'ULU I', 2, 32134, 10000),
(3, 'BENGKULU I', 3, 32145, 15000),
(4, 'CURUP UTARA', 4, 32145, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `kota` varchar(30) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `id_provinsi`) VALUES
(1, 'LUBUKLINGGAU', 1),
(2, 'PALEMBANG', 1),
(3, 'BENGKULU', 2),
(4, 'CURUP', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE IF NOT EXISTS `ongkir` (
  `idongkir` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(20) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(35) NOT NULL,
  `kodepos` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `biaya_ongkir` int(15) NOT NULL,
  PRIMARY KEY (`idongkir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `idpelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `kelamin` set('L','P') NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kodepos` varchar(6) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `telp` varchar(200) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`idpelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama`, `kelamin`, `email`, `alamat`, `kodepos`, `kota`, `telp`, `tanggal_daftar`, `password`, `status`, `level`) VALUES
(5, 'jaya', 'L', 'jay@gmail.com', '', '321345', 'llg', '809980', '2018-01-11', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(6, 'diana', 'P', 'diana@gmail.com', '', '4343', 'llh', '3252435', '2018-01-11', '202cb962ac59075b964b07152d234b70', 1, 'mitra_kerja'),
(7, 'ani', 'L', 'ani@gmail.com', 'lkjkljklj', '879789', 'llg', '0990908', '2018-01-11', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(8, 'deni', 'L', 'denni@gmail.com', 'lkjlkuhgjyft', '123213', 'llg', '098980980', '2018-01-14', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE IF NOT EXISTS `pengelola` (
  `idpengelola` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`idpengelola`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`idpengelola`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'indra jaya', 'indra', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `idproduk` int(10) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(200) NOT NULL,
  `idkategori` int(255) NOT NULL,
  `deskripsi` text,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `nama_produk`, `idkategori`, `deskripsi`, `foto`) VALUES
(20, 'Panasoni-25665', 8, 'Tipe : P17K Daya : 80 Watt  Warna : Pink, Blue, Red White.								', '1.jpg'),
(21, 'LG-LED32E5200', 8, 'Tipe : L18K Daya : 100 Watt Warna : Silver, Blue, Red, Pink.								', '2.jpg'),
(22, 'Samsung-SE12PPL', 8, 'Tipe : SE12L Daya :80 Watt  Warna : Black, White.								', '7.jpg'),
(23, 'Panasoni-P65MW', 9, 'Tipe : P16MW Daya : 350 Watt Kapasitas Muatan : 6.5 Kg.						', 'download (2).jpg'),
(24, 'LG-MS14K', 9, 'Tipe : MS14K : Daya : 350 Watt Kapasitas Muatan : 14 Kg.								', 'download (5).jpg'),
(25, 'SHARP-MC95K', 9, 'Tipe : MC95K Daya : 350 Watt Kapasitas Muatan : 9.5 Kg.							', 'download (1).jpg'),
(26, 'Panasoni-T3200S', 12, '					Tipe : T3200S Daya : 100 Watt Layar : 32 IN Kualitas Gambar : Full HD.				', 'NKJHG.jpg'),
(27, 'Hanna-H4K', 11, 'Tipe	: H4K Daya : DC-12v Size Image : 2 MB Kualitas : HD.					', 'images.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(25) NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'SUMSEL'),
(2, 'BENGKULU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `idretur` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `noinvoice` varchar(11) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  PRIMARY KEY (`idretur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`idretur`, `tanggal`, `noinvoice`, `foto`, `keterangan`) VALUES
(2, '2018-01-11', 'T00006', 'aaa.jpg', 'lkjkjiiljikj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `idstok` int(11) NOT NULL AUTO_INCREMENT,
  `idproduk` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_mitra` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`idstok`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`idstok`, `idproduk`, `harga_beli`, `harga_jual`, `harga_mitra`, `jumlah`) VALUES
(18, 20, 1200000, 1500000, 1400000, 50),
(19, 21, 1250000, 1550000, 1450000, 50),
(20, 22, 7000000, 8500000, 7500000, 5),
(21, 23, 1200000, 1400000, 1300000, 20),
(22, 24, 1700000, 1900000, 1750000, 15),
(23, 25, 1650000, 1800000, 170000, 10),
(24, 26, 1500000, 1700000, 1550000, 25),
(25, 27, 250000, 400000, 300000, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `noinvoice` varchar(6) NOT NULL,
  `idproduk` int(10) NOT NULL,
  `jumla` int(11) NOT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `noinvoice`, `idproduk`, `jumla`) VALUES
(1, 'T00001', 9, 1),
(2, 'T00002', 2, 2),
(4, 'T00004', 3, 1),
(5, 'T00006', 1, 2),
(6, 'T00007', 16, 4),
(7, 'T00008', 2, 1),
(8, 'T00009', 25, 1),
(9, 'T00010', 22, 2),
(10, 'T00011', 22, 1),
(11, 'T00012', 21, 1),
(12, 'T00013', 21, 1),
(13, 'T00014', 21, 1),
(14, 'T00014', 27, 1),
(15, 'T00014', 26, 1),
(16, 'T00015', 23, 1),
(17, 'T00016', 24, 1),
(18, 'T00016', 27, 1),
(19, 'T00017', 24, 2),
(20, 'T00018', 25, 2),
(21, 'T00019', 25, 2),
(22, 'T00020', 21, 1),
(23, 'T00021', 24, 1),
(24, 'T00022', 24, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
