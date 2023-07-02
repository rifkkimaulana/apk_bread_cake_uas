-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jul 2023 pada 10.16
-- Versi server: 10.5.20-MariaDB-cll-lve
-- Versi PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1588530_bnc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `isi1` text NOT NULL,
  `isi2` text NOT NULL,
  `image` text NOT NULL,
  `link_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`id`, `isi1`, `isi2`, `image`, `link_video`) VALUES
(1, 'Roti adalah makanan berbahan dasar utama tepung terigu dan air, yang difermentasikan dengan ragi, tetapi ada juga yang tidak menggunakan ragi. Namun dengan kemajuan teknologi, manusia membuat roti diolah dengan berbagai bahan seperti garam, minyak, mentega, ataupun telur untuk menambahkan kadar protein di dalamnya sehingga didapat tekstur dan rasa tertentu. Roti termasuk makanan pokok di banyak Negara Barat dan Timur Tengah.', 'Roti dibedakan atas roti tawar dan roti manis. Roti tawar terdiri dari roti putih dan roti gandum. Sedangkan roti manis memiliki ragam variasi isi, seperti selai kacang, strawberry, coklat, susu, daging, keju, pandan, dan lainnya.', 'upload_20230701115841_upload_20230628152059_about-1.jpg', 'https://youtu.be/6ClFRiu1Z9k');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `content_artikel` longtext NOT NULL,
  `cover` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `judul_artikel`, `content_artikel`, `cover`, `user_id`, `created_time`, `id_kategori`, `slug`) VALUES
(4, 'Bread / Roti', 'Roti adalah makanan berbahan dasar utama tepung terigu dan air, yang difermentasikan dengan ragi, tetapi ada juga yang tidak menggunakan ragi. Namun dengan kemajuan teknologi, manusia membuat roti diolah dengan berbagai bahan seperti garam, minyak, mentega, ataupun telur untuk menambahkan kadar protein di dalamnya sehingga didapat tekstur dan rasa tertentu. Roti termasuk makanan pokok di banyak Negara Barat dan Timur Tengah. Roti adalah bahan dasar pizza dan lapisan luar roti lapis. Roti biasanya dijual dalam bentuk sudah diiris, dan dalam kondisi segar yang dikemas rapi dalam plastik.\r\n\r\nDalam beberapa budaya, roti dipandang sangat penting sehingga menjadi bagian ritual keagamaan.', 'upload_20230701135622_produk-4.jpg', 5, '2023-07-01 13:56:22', 1, ''),
(5, 'Cake / Kue', 'Cake adalah penganan tepung yang dibuat dari tepung terigu , gula, dan bahan lainnya dan biasanya dipanggang . Dalam bentuknya yang paling tua, kue merupakan modifikasi dari roti , tetapi kue sekarang mencakup berbagai macam olahan yang bisa dibuat sederhana atau rumit dan memiliki fitur yang sama dengan makanan pencuci mulut seperti kue kering , meringue , custard , dan pai .\r\n\r\nBahan yang paling umum termasuk tepung, gula, telur, lemak (seperti mentega , minyak , atau margarin ), cairan, dan zat ragi , seperti baking soda atau baking powder . Bahan tambahan umum termasuk buah kering , manisan , atau segar, kacang-kacangan , kakao , dan ekstrak seperti vanila, dengan banyak pengganti bahan utama. Kue juga bisa diisi dengan selai buah , kacang-kacangan, atau saus pencuci mulut (seperti custard , jeli , buah matang ,krim kocok , atau sirup ), [1] dibekukan dengan krim mentega atau icing lainnya , dan dihias dengan marzipan , pinggiran pipa, atau manisan buah.\r\n\r\nKue sering disajikan sebagai hidangan perayaan pada acara-acara seremonial, seperti pernikahan, hari jadi , dan ulang tahun. Ada banyak sekali resep kue; ada yang seperti roti, ada yang kaya dan rumit, dan banyak yang berusia berabad-abad. Pembuatan kue bukan lagi prosedur yang rumit; sementara pada suatu waktu tenaga kerja yang cukup besar digunakan untuk membuat kue (terutama mengocok busa telur), peralatan dan petunjuk memanggang telah disederhanakan sehingga juru masak yang paling amatir pun dapat membuat kue.', 'upload_20230701140035_produk-16.jpg', 5, '2023-07-01 14:00:35', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `nama`, `alamat`, `telpon`, `email`, `create_time`) VALUES
(3, 'Ivan Gunawan', 'Pasir Koja, RT20/RW13, Dusun xxxx, Kecamatan xxxx', '0812312312312', 'ivan@null.null', '2023-06-30 17:24:59'),
(4, 'Tasya Farasya', 'Cibaduyut, RT01/RW10, Dusun xxxx, Kecamatan xxxx', '083696311111', 'Tasya12@null.null', '2023-06-30 17:20:01'),
(5, 'Dinda Hauw', 'Paseh, RT100/RW10, Dusun xxxx, Kecamatan xxxx', '085656232323', 'Dinda@null.null', '2023-06-30 17:22:35'),
(6, 'Xaviera Putri', 'Babakansari Bandung, RT/RW 02/06, Dusun Babakansari, Kec Kiaracondong', '081231638344', 'vieraxaputri@gmail.com', '2023-07-01 02:22:01'),
(7, 'Sera', 'Bekasi', '0821220324xxx', 'sera@gmail.com', '2023-07-01 13:06:36'),
(8, 'Soffi', 'Depok, Tanjungkerta', '082116xxxxxx', 'soffiah123@gmail.com', '2023-07-01 13:43:58'),
(9, 'Jimin', 'Sumedang', '081345xxxxxx', 'jimin13@null.null', '2023-07-01 13:49:45'),
(10, 'Suga', 'Sumedang', '083112xxxxxx', 'suga@null.null', '2023-07-01 14:05:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`id`, `no_faktur`, `id_produk`, `jumlah_terjual`, `harga_jual`, `total_harga`) VALUES
(6, 'TRX-0001', 23, 2, 25000, 50000),
(7, 'TRX-0001', 22, 1, 55000, 55000),
(8, 'TRX-0002', 22, 2, 55000, 110000),
(9, 'TRX-0004', 16, 1, 19000, 19000),
(10, 'TRX-0005', 14, 5, 15000, 75000),
(11, 'TRX-0006', 7, 7, 45000, 315000),
(12, 'TRX-0007', 19, 3, 33000, 99000),
(13, 'TRX-0008', 11, 2, 35000, 70000),
(14, 'TRX-0009', 23, 3, 25000, 75000),
(15, 'TRX-0010', 26, 2, 105000, 210000),
(16, 'TRX-0010', 7, 1, 45000, 45000),
(17, 'TRX-0010', 7, 1, 45000, 45000),
(18, 'TRX-0011', 18, 1, 28000, 28000),
(19, 'TRX-0013', 33, 1, 31000, 31000),
(20, 'TRX-0014', 18, 1, 28000, 28000),
(21, 'TRX-0015', 19, 1, 33000, 33000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `image`) VALUES
(3, 'upload_20230630113850_gallery-1.jpg'),
(6, 'upload_20230630125032_gallery-2.jpg'),
(7, 'upload_20230630125038_gallery-3.jpg'),
(8, 'upload_20230630125043_gallery-4.jpg'),
(9, 'upload_20230630125049_gallery-5.jpg'),
(11, 'upload_20230630125100_gallery-7.jpg'),
(12, 'upload_20230630125105_gallery-8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_artikel`
--

CREATE TABLE `tb_kategori_artikel` (
  `id` int(11) NOT NULL,
  `kategori_artikel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori_artikel`
--

INSERT INTO `tb_kategori_artikel` (`id`, `kategori_artikel`) VALUES
(1, 'Bread'),
(2, 'Cake');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_produk`
--

CREATE TABLE `tb_kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori_produk`
--

INSERT INTO `tb_kategori_produk` (`id`, `kategori_produk`) VALUES
(3, 'Bread'),
(4, 'Danish'),
(5, 'Toast'),
(6, 'Slice Cake'),
(7, 'Whole Cake'),
(8, 'Dry Cake'),
(9, 'Cookies');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `no_faktur`, `tanggal_pembayaran`, `jumlah_bayar`, `metode_pembayaran`) VALUES
(5, 'TRX-0001', '2023-07-01', 110000, 'manual'),
(6, 'TRX-0002', '2023-07-01', 200000, 'transfer'),
(7, 'TRX-0004', '2023-07-01', 20000, 'manual'),
(8, 'TRX-0005', '2023-07-01', 100000, 'transfer'),
(9, 'TRX-0006', '2023-07-01', 315000, 'transfer'),
(10, 'TRX-0007', '2023-07-01', 100000, 'manual'),
(11, 'TRX-0008', '2023-07-01', 100000, 'manual'),
(12, 'TRX-0009', '2023-07-01', 75000, 'transfer'),
(13, 'TRX-0010', '2023-07-01', 250000, 'manual'),
(14, 'TRX-0010', '2023-07-01', 110000, 'manual'),
(15, 'TRX-0011', '2023-07-01', 50000, 'manual'),
(16, 'TRX-0013', '2023-07-01', 50000, 'transfer'),
(17, 'TRX-0014', '2023-07-01', 30000, 'transfer'),
(18, 'TRX-0015', '2023-07-02', 50000, 'manual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `waktu_access` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`id_pengunjung`, `waktu_access`, `ip_address`, `user_agent`) VALUES
(1, '2023-07-02 01:24:14', '114.122.71.98', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36'),
(2, '2023-07-02 01:37:36', '2a02:4780:6:1::b', 'Go-http-client/2.0'),
(3, '2023-07-02 01:39:10', '2a01:4f8:c012:dd9a::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1'),
(4, '2023-07-02 01:40:09', '95.177.180.82', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1'),
(5, '2023-07-02 01:48:09', '45.90.60.98', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(6, '2023-07-02 01:51:04', '114.122.71.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'),
(7, '2023-07-02 01:51:04', '114.122.71.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'),
(8, '2023-07-02 02:03:15', '42.228.9.78', 'Mozilla/5.0 (Linux; Android 10; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Mobile Safari/537.36'),
(9, '2023-07-02 02:07:18', '2a02:4780:6:1::b', 'Go-http-client/2.0'),
(10, '2023-07-02 02:10:21', '114.122.71.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'),
(11, '2023-07-02 02:10:38', '114.122.71.98', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36'),
(12, '2023-07-02 02:16:42', '114.122.107.140', 'Mozilla/5.0 (Linux; Android 10; SM-M022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36'),
(13, '2023-07-02 02:18:14', '114.122.107.140', 'Mozilla/5.0 (Linux; Android 10; SM-M022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36'),
(14, '2023-07-02 02:32:26', '18.194.44.184', 'Mozilla/5.0 (Linux; Android 10; SM-M013F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36'),
(15, '2023-07-02 02:32:26', '94.46.220.95', 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-G770F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/21.0 Chrome/110.0.5481.154 Mobile Safari/537.36'),
(16, '2023-07-02 02:32:27', '205.185.223.4', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0'),
(17, '2023-07-02 02:33:48', '94.46.220.95', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30'),
(18, '2023-07-02 02:33:48', '18.194.44.184', 'Mozilla/5.0 (Linux; Android 10; SM-M013F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36'),
(19, '2023-07-02 02:33:49', '205.185.223.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36'),
(20, '2023-07-02 02:33:57', '154.47.30.166', 'Mozlila/5.0 (Linux; Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safari/537.36'),
(21, '2023-07-02 02:36:20', '176.9.150.124', 'BSbot 1.1 (monthly copyright check - html/js/css)'),
(22, '2023-07-02 02:37:02', '2a02:4780:6:1::b', 'Go-http-client/2.0'),
(23, '2023-07-02 02:39:31', '45.15.179.166', 'Mozilla/5.0 (Windows NT 5.1) Gecko/20100101 Firefox/9.0.1'),
(24, '2023-07-02 03:07:28', '2a02:4780:6:1::b', 'Go-http-client/2.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `id_customer` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `no_faktur`, `tanggal_penjualan`, `id_customer`, `total_harga`, `metode_pembayaran`) VALUES
(13, 'TRX-0001', '2023-07-01 05:51:18', 6, 105000, 'manual'),
(14, 'TRX-0002', '2023-07-01 05:58:38', 4, 110000, 'transfer'),
(15, 'TRX-0003', '2023-07-01 12:59:46', 5, 0, 'manual'),
(16, 'TRX-0004', '2023-07-01 13:01:50', 5, 19000, 'manual'),
(17, 'TRX-0005', '2023-07-01 13:07:17', 7, 75000, 'transfer'),
(18, 'TRX-0006', '2023-07-01 13:25:12', 3, 315000, 'transfer'),
(19, 'TRX-0007', '2023-07-01 13:43:31', 4, 99000, 'manual'),
(20, 'TRX-0008', '2023-07-01 13:44:20', 5, 70000, 'manual'),
(21, 'TRX-0009', '2023-07-01 13:44:59', 3, 75000, 'transfer'),
(22, 'TRX-0010', '2023-07-01 13:45:41', 8, 90000, 'manual'),
(23, 'TRX-0010', '2023-07-01 13:46:45', 8, 90000, 'manual'),
(24, 'TRX-0011', '2023-07-01 13:46:57', 7, 28000, 'manual'),
(25, 'TRX-0012', '2023-07-01 13:51:39', 9, 0, 'transfer'),
(26, 'TRX-0013', '2023-07-01 13:52:40', 9, 31000, 'transfer'),
(27, 'TRX-0014', '2023-07-01 14:07:54', 10, 28000, 'transfer'),
(28, 'TRX-0015', '2023-07-02 00:42:45', 9, 33000, 'manual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `nama_lengkap`, `email`, `subject`, `pesan`, `status`) VALUES
(17, 'asdf', 'asdfasdf@fnao.com', 'asd', 'asd', 'belum diba'),
(18, 'asdf', 'asdfasdf@fnao.com', 'asd', 'asd', 'belum diba'),
(19, 'Apong Siti Atijah', 'apongsitiatijah@gmai', 'asd', 'asd', 'belum diba'),
(20, 'Apong Siti Atijah', 'apongsitiatijah@gmai', 'asd', 'asd', 'belum diba'),
(21, 'Apong Siti Atijah', 'apongsitiatijah@gmai', 'asd', 'asd', 'belum diba'),
(22, 'asd', 'asdfasdf@fnao.com', 'asd', 'aw32134', 'belum diba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_produk`, `id_kategori`, `deskripsi`, `harga`, `stok`, `image`) VALUES
(7, 'Sausage Diva', 3, 'Bread with chicken sausage, mayonnaise, cheese, tomato sauce and parsley on top.', 45000, 10, 'upload_20230630165035_produk-1.jpg'),
(8, 'Spicy Floss', 3, 'Soft bread with spicy chicken floss and special mayonnaise.', 30000, 6, 'upload_20230630165140_produk-2.jpg'),
(9, 'Choco Meisis', 3, 'Sweet bread filled with chocolate ganache cream and chocolate meises on top.', 25000, 5, 'upload_20230630165318_produk-3.jpg'),
(10, 'Coffee Bun', 3, 'Bread with the aroma of coffee and filled with butter.', 40000, 6, 'upload_20230630165424_produk-4.jpg'),
(11, 'Binoq Spicy Floss', 3, 'Bread roll filled with chicken sausage, special mayonnaise, and spicy chicken floss on top.', 35000, 3, 'upload_20230630165528_produk-5.jpg'),
(12, 'Croissant Chocolate', 4, 'Croissant topped with chocolate.', 20000, 5, 'upload_20230630165644_produk-6.jpg'),
(13, 'Tuna Cheese Puff', 4, 'Puff filled with tuna, cheese and special mayonnaise with parsley.', 24000, 3, 'upload_20230630165747_produk-7.jpg'),
(14, 'Apple Pie', 4, 'Puff with cinnamon apple filling and sprinkled with sugar.', 15000, 2, 'upload_20230630165852_produk-8.jpg'),
(15, 'Spicy Beef Puff', 4, 'Puffs filled with minced meat and egg, covered in Korean spicy sauce, and sprinkled with sesame and parsley on top.', 18000, 7, 'upload_20230630165957_produk-9.jpg'),
(16, 'Croissant', 4, 'Plain croissant.', 19000, 4, 'upload_20230630170121_produk-10.jpg'),
(17, 'Raisin Toast', 5, 'Soft bread with raisins and cookie topping.', 33000, 2, 'upload_20230630170239_produk-11.jpg'),
(18, 'Cheese Swirl Toast', 5, 'Soft toast filled with cheese swirls and topped with melted cheddar cheese.', 28000, 3, 'upload_20230630170423_produk-12.jpg'),
(19, 'Raisin Choco', 5, 'Soft bread filled with raisins and choco chips and choco chip cookie topping.', 33000, 2, 'upload_20230630170527_produk-13.jpg'),
(20, 'Choco Cheese', 5, 'Soft bread filled with chocolate and cheese.', 26000, 2, 'upload_20230630170638_produk-14.jpg'),
(21, 'Unskin-Whole Meal', 5, 'Skinless whole meal toast made from selected wheat flour.', 19000, 1, 'upload_20230630170757_produk-15.jpg'),
(22, 'Red Velvet', 6, 'Soft cake with beetroot extract, filled with light cream cheese and crunchy cashew nuts on top.', 55000, 8, 'upload_20230630170920_produk-16.jpg'),
(23, 'Tiramisu Cup', 7, 'Cake filled with tiramisu cream, coffee-infused sponge cake, and chocolate powder on top.', 25000, 4, 'upload_20230630171043_produk-17.jpg'),
(24, 'Chantilly Blush Slice', 6, 'Light pink vanilla sponge cake with white cream and fruits, and filled with strawberry ganache.', 31000, 3, 'upload_20230630171226_produk-18.jpg'),
(25, 'Black Forest', 7, 'Chocolate sponge cake with rich cherry and chocolate cream filling, with chocolate shavings and dark cherries.', 99000, 1, 'upload_20230630171418_produk-19.jpg'),
(26, 'Red Berry Velvet Cake', 7, 'Soft cake with beetroot extract, filled with raspberry flavored cream cheese.', 105000, 2, 'upload_20230630171617_produk-20.jpg'),
(27, 'Blueberry Cheesecake Slice', 8, 'Creamy cheese cake with blueberry sauce.', 18000, 5, 'upload_20230630171738_produk-21.jpg'),
(28, 'Lapis Legit Original', 8, 'Soft, buttery, and moist layered cake with the aroma of traditional Indonesian spices.', 23000, 3, 'upload_20230630171906_produk-22.jpg'),
(29, 'Raisin Cream Cake', 8, 'Soft cake filled with vanilla cream and California raisins.', 17000, 1, 'upload_20230630172039_produk-23.jpg'),
(30, 'Kastengel', 9, 'Cheese cookies with grated cheese on top.', 35000, 7, 'upload_20230630172154_produk-24.jpg'),
(31, 'Nastar', 9, 'Special cookies filled with delicious pineapple jam.', 35000, 10, 'upload_20230630172249_produk-25.jpg'),
(32, 'Cheese Ball', 9, 'Cheese ball cookies with grated cheese on top.', 35000, 8, 'upload_20230630172459_produk-26.jpg'),
(33, 'Beef Cheese Bun', 3, 'Soft bread topped with smoked beef, cheese slice and parsley.', 31000, 6, 'upload_20230701022628_produk-27.jpg'),
(34, 'Cheese Croissant', 4, 'Croissaint topped with grated parmesan cheese.', 13000, 5, 'upload_20230701132336_produk-33.jpg'),
(35, 'White Toast', 5, 'White toast made from quality flour.', 13000, 10, 'upload_20230701133052_produk-35.jpg'),
(36, 'Black Forest Slice', 6, 'Chocolate sponge cake with rich cherry and chocolate cream filling, with chocolate shavings and dark cherries.', 35000, 3, 'upload_20230701133613_produk-36.jpg'),
(37, 'Chantilly Slice', 6, 'Vanilla sponge cake layered with fruits and chantilly cream, topped with white chocolate and fruits.', 32000, 2, 'upload_20230701133706_produk-38.jpg'),
(38, 'Oreo Cup', 6, 'Cake filled with oreo pieces, chocolate sponge cake, and oreo cream.', 21000, 4, 'upload_20230701133925_produk-39.jpg'),
(39, 'Rich Chocolate Slice', 6, 'Chocolate sponge cake filled with chocolate and vanilla cream, with dark and white chocolate rolls on top.', 23000, 5, 'upload_20230701134051_produk-37.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id`, `nama`, `deskripsi`, `pekerjaan`, `image`) VALUES
(2, 'Riska Rismaya', 'Hai saya Riska Rismaya mahasiswa semester 4  informatika Universitas Sebelas April Sumedang', 'Mahasiswa', 'upload_20230627181758_Riska Rismaya.jpg'),
(4, 'Finka Mambo ', 'Hai saya Finka Mambo mahasiswa semester 4 informatika Universitas Sebelas April Sumedang', 'Mahasiswa ', 'upload_20230630171309_Screenshot_20221209-094635_1.jpg'),
(5, 'Gefy Fitry Wijaya', 'Hai saya Gefy Fitri Wijaya mahasiswa semester 4 informatika Universitas Sebelas April Sumedang', 'Mahasiswa', 'upload_20230630173119_Gefy Fitry Wj.jpg'),
(6, 'Soffiah Ai Nurjanah', 'Hai saya Soffiah Ai Nurjanah mahasiswa semester 4 informatika Universitas Sebelas April Sumedang', 'Mahasiswa', 'upload_20230701020952_soffi.jpg'),
(7, 'Rifki Maulana', 'Hai saya Rifki Maulana mahasiswa semester 4 informatika Universitas Sebelas April Sumedang', 'Mahasiswa', 'upload_20230701133710_rifki.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat1` varchar(100) NOT NULL,
  `alamat2` varchar(100) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `open_operasional` varchar(100) NOT NULL,
  `close_operasional` varchar(100) NOT NULL,
  `link_twetter` text NOT NULL,
  `link_facebook` text NOT NULL,
  `link_instagram` text NOT NULL,
  `link_linkedin` text NOT NULL,
  `link_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `nama_perusahaan`, `alamat1`, `alamat2`, `telpon`, `email`, `open_operasional`, `close_operasional`, `link_twetter`, `link_facebook`, `link_instagram`, `link_linkedin`, `link_alamat`) VALUES
(1, 'BREAD AND CAKE', 'Jl. Angkrek Situ No.19, Situ, Kec. Sumedang Utara, Kabupaten Sumedang, Jawa Barat 45323', 'Indonesia', '628312356789', 'cs@breadncake.site', 'Mon-Sat: 11AM - 23PM', 'Sunday: Closed', 'https://twetter.com/', 'https://facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama_operator` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama_operator`, `username`, `password`, `email`) VALUES
(4, 'Rifki Maulana', 'admin', 'admin123', 'rifkkimaulana@gmail.com'),
(5, 'Riska Rismaya', 'admin', '25d55ad283aa400af464c76d713c07ad', 'riskarismaya028@gmail.com'),
(6, 'Gefy Fitry Wijaya', 'Gefy', '631381845eb44884e114ed861516457c', 'gefyfitry01@gmail.com'),
(7, 'Soffiah Ai Nurjanah', 'soffi', '5e8667a439c68f5145dd2fcbecf02209', 'soffiah123@gmail.com'),
(9, 'Finka Mambo', 'finka', '7fdf7f0632a5fa6b1fd50a2f9121e515', 'finka@gmail.com'),
(10, 'David Setiadi', '@unsap', 'd15737b99acafc9cee7a3b12f9f5f555', 'xxx@unsap.ac.id');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_artikel`
--
ALTER TABLE `tb_kategori_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_artikel`
--
ALTER TABLE `tb_kategori_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
