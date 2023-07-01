-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Jul 2023 pada 10.37
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
(1, 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet', 'upload_20230628152059_about-1.jpg', 'https://youtu.be/6ClFRiu1Z9k');

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
(2, 'Sausage Diva', 'Bread with chicken sausage, mayonnaise, cheese, tomato sauce and parsley on top.', 'upload_20230701022149_produk-1.jpg', 5, '2023-07-01 02:21:49', 1, '');

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
(6, 'Xaviera Putri', 'Babakansari Bandung, RT/RW 02/06, Dusun Babakansari, Kec Kiaracondong', '081231638344', 'vieraxaputri@gmail.com', '2023-07-01 02:22:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `no_faktur` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`no_faktur`, `id_produk`, `jumlah_terjual`, `harga_jual`, `total_harga`) VALUES
('TRX-0001', 3, 2, 21000, 42000),
('TRX-0002', 6, 2, 30000, 60000),
('TRX-0003', 5, 1, 20000, 20000),
('TRX-0003', 6, 2, 30000, 60000),
('TRX-0004', 15, 2, 18000, 36000);

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
(10, 'upload_20230630125055_gallery-6.jpg'),
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
  `no_faktur` varchar(100) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`no_faktur`, `tanggal_pembayaran`, `jumlah_bayar`, `metode_pembayaran`) VALUES
('TRX-0001', '2023-06-30', 50000, 'transfer'),
('TRX-0002', '2023-06-30', 100000, 'manual'),
('TRX-0003', '2023-06-30', 100000, 'manual'),
('TRX-0004', '2023-06-30', 50000, 'manual');

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
(9, 'TRX-0001', '2023-06-30 09:41:13', 1, 42000, 'transfer'),
(10, 'TRX-0002', '2023-06-30 17:29:48', 3, 60000, 'manual'),
(11, 'TRX-0003', '2023-06-30 16:27:04', 3, 80000, 'manual'),
(12, 'TRX-0004', '2023-06-30 23:01:38', 4, 36000, 'manual');

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
(33, 'Beef Cheese Bun', 3, 'Soft bread topped with smoked beef, cheese slice and parsley.', 31000, 6, 'upload_20230701022628_produk-27.jpg');

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
(6, 'Soffiah Ai Nurjanah', 'Hai saya Soffiah Ai Nurjanah mahasiswa semester 4 informatika Universitas Sebelas April Sumedang', 'Mahasiswa', 'upload_20230701020952_soffi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL,
  `alamat1` varchar(100) NOT NULL,
  `alamat2` varchar(100) NOT NULL,
  `telpon` int(11) NOT NULL,
  `email` text NOT NULL,
  `open_operasional` varchar(100) NOT NULL,
  `close_operasional` varchar(100) NOT NULL,
  `link_twetter` text NOT NULL,
  `link_facebook` text NOT NULL,
  `link_instagram` text NOT NULL,
  `link_linkedin` text NOT NULL,
  `link_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 'David Setiadi', '@unsap', 'd15737b99acafc9cee7a3b12f9f5f555', 'xxx@unsap.ac.id');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
