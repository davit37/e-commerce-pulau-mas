-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. Januari 2018 jam 16:34
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
-- Struktur dari tabel `alamat_kirim`
--

CREATE TABLE IF NOT EXISTS `alamat_kirim` (
  `id_kirim` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `noinvoice` varchar(15) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kota_tujuan` varchar(25) NOT NULL,
  `jasa_pengiriman` varchar(15) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `biaya_ongkir` int(11) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id_kirim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `alamat_kirim`
--

INSERT INTO `alamat_kirim` (`id_kirim`, `tanggal`, `noinvoice`, `kota_asal`, `provinsi`, `kota_tujuan`, `jasa_pengiriman`, `kodepos`, `alamat`, `biaya_ongkir`, `total_belanja`, `total_transaksi`) VALUES
(1, '2018-01-22', 'T00001', '2', '17', '172', 'pos', '12312', 'lalu', 210000, 8500000, 8710000),
(2, '2018-01-23', 'T00002', '2', '13', '466', 'tiki', '9999999', 'b', 255000, 1750000, 2005000),
(3, '2018-01-22', 'T00003', '242', '33', '316', 'tiki', '32161', 'jl. daktau', 0, 1500000, 1500000),
(4, '2018-01-22', 'T00004', '3', '16', '450', 'tiki', '7667', 'dakjsacjgf', 0, 1800000, 1800000),
(6, '2018-01-23', 'T00009', '487', '13', '18', 'jne', '9898', 'mmm', 360000, 1450000, 1810000),
(8, '2018-01-23', 'T00011', 'Lubuk linggau', '10', '250', 'tiki', '755', 'mmm', 175000, 7500000, 7675000),
(9, '2018-01-24', 'T00012', 'Lubuk linggau', '4', '63', 'pos', '321213', 'jl.gvsgsvdc', 427500, 1980000, 2407500);

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
  `keterangan` varchar(250) NOT NULL,
  PRIMARY KEY (`idpembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`idpembayaran`, `tanggal`, `noinvoice`, `foto`, `keterangan`) VALUES
(1, '2018-01-22', 'T00001', 'Penguins.jpg', 'lunas');

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
('T00001', '2018-01-22 13:40:55', 5, 8500000, 0, NULL),
('T00002', '2018-01-22 14:03:08', 6, 1750000, 0, NULL),
('T00003', '2018-01-22 14:17:39', 10, 1500000, 0, NULL),
('T00004', '2018-01-22 14:32:55', 11, 1800000, 0, NULL),
('T00005', '2018-01-23 19:27:27', 6, 1400000, 0, NULL),
('T00006', '2018-01-23 19:36:26', 6, 1400000, 0, NULL),
('T00007', '2018-01-23 21:17:59', 6, 170000, 0, NULL),
('T00008', '2018-01-23 21:20:38', 6, 1450000, 0, NULL),
('T00009', '2018-01-23 21:34:04', 6, 1450000, 0, NULL),
('T00010', '2018-01-23 21:36:12', 6, 1450000, 0, NULL),
('T00011', '2018-01-23 23:00:14', 6, 7500000, 0, NULL),
('T00012', '2018-01-24 14:45:40', 6, 1980000, 0, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama`, `kelamin`, `email`, `alamat`, `kodepos`, `kota`, `telp`, `tanggal_daftar`, `password`, `status`, `level`) VALUES
(5, 'jaya', 'L', 'jay@gmail.com', '', '321345', 'llg', '809980', '2018-01-11', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(6, 'diana', 'P', 'diana@gmail.com', '', '4343', 'llh', '3252435', '2018-01-11', '202cb962ac59075b964b07152d234b70', 1, 'mitra_kerja'),
(7, 'ani', 'L', 'ani@gmail.com', 'lkjkljklj', '879789', 'llg', '0990908', '2018-01-11', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(8, 'deni', 'L', 'denni@gmail.com', 'lkjlkuhgjyft', '123213', 'llg', '098980980', '2018-01-14', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(9, 'ayu', 'P', 'ayu@gmail.com', 'dfhjlkkklyujyrghfc', '31617', 'llg', '12345678', '2018-01-18', '202cb962ac59075b964b07152d234b70', 1, 'pelanggan'),
(10, 'husnul', 'P', 'husnul@gmail.com', 'jl. kaliserayu no.46', '31262', 'lubuklinggau', '089877867566', '2018-01-22', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(11, 'Alviansyah', 'L', 'alviansyah@gmail.com', 'lubuklinggau no.11', '214235', 'lubuklinggau', '099808797', '2018-01-22', '202cb962ac59075b964b07152d234b70', 1, 'pelanggan');

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
  `berat_produk` int(11) NOT NULL,
  `idkategori` int(255) NOT NULL,
  `deskripsi` text,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `nama_produk`, `berat_produk`, `idkategori`, `deskripsi`, `foto`) VALUES
(20, 'Panasoni-25665', 10, 8, 'Tipe : P17K Daya : 80 Watt  Warna : Pink, Blue, Red White.								', '1.jpg'),
(21, 'LG-LED32E5200', 10, 8, 'Tipe : L18K Daya : 100 Watt Warna : Silver, Blue, Red, Pink.								', '2.jpg'),
(22, 'Samsung-SE12PPL', 5, 8, 'Tipe : SE12L Daya :80 Watt  Warna : Black, White.								', '7.jpg'),
(23, 'Panasoni-P65MW', 10, 9, 'Tipe : P16MW Daya : 350 Watt Kapasitas Muatan : 6.5 Kg.						', 'download (2).jpg'),
(24, 'LG-MS14K', 5, 9, 'Tipe : MS14K : Daya : 350 Watt Kapasitas Muatan : 14 Kg.								', 'download (5).jpg'),
(25, 'SHARP-MC95K', 5, 9, 'Tipe : MC95K Daya : 350 Watt Kapasitas Muatan : 9.5 Kg.							', 'download (1).jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`idretur`, `tanggal`, `noinvoice`, `foto`, `keterangan`) VALUES
(1, '2018-01-22', 'T00001', 'Hydrangeas.jpg', 'kempot body'),
(2, '2018-01-22', 'T00002', 'Tulips.jpg', 'Mati total'),
(3, '2018-01-22', 'T00003', 'Jellyfish.jpg', 'Tidak Dingin'),
(4, '2018-01-22', 'T00004', 'Penguins.jpg', 'Pecah Body Bawah');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`idstok`, `idproduk`, `harga_beli`, `harga_jual`, `harga_mitra`, `jumlah`) VALUES
(18, 20, 1200000, 1500000, 1400000, 48),
(19, 21, 1250000, 1550000, 1450000, 50),
(20, 22, 7000000, 8500000, 7500000, 5),
(21, 23, 1200000, 1400000, 1300000, 20),
(22, 24, 1700000, 1900000, 1750000, 15),
(23, 25, 1650000, 1800000, 170000, 10),
(24, 26, 1500000, 1700000, 1550000, 23),
(25, 27, 250000, 400000, 300000, 40),
(26, 28, 1600000, 1850000, 1650000, 30),
(27, 29, 1400000, 1800000, 1450000, 30),
(28, 30, 300000, 500000, 525000, 50),
(29, 31, 1400000, 1650000, 1450000, 25);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `noinvoice`, `idproduk`, `jumla`) VALUES
(1, 'T00001', 22, 1),
(2, 'T00002', 24, 1),
(3, 'T00003', 20, 1),
(4, 'T00004', 25, 1),
(5, 'T00005', 20, 1),
(6, 'T00006', 20, 1),
(7, 'T00007', 25, 1),
(8, 'T00008', 21, 1),
(9, 'T00009', 21, 1),
(10, 'T00010', 21, 1),
(11, 'T00011', 22, 1),
(12, 'T00012', 23, 1),
(13, 'T00012', 25, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
