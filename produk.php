<?php
include "config/config.php";

// Mendapatkan ID produk dari parameter URL
$idProduk = $_GET['id'];

// Query untuk mendapatkan detail produk berdasarkan ID
$queryProduk = "SELECT * FROM tb_produk WHERE id = '$idProduk'";
$resultProduk = mysqli_query($mysqli, $queryProduk);
$rowProduk = mysqli_fetch_assoc($resultProduk);

// Mendapatkan ID kategori produk
$idKategori = $rowProduk['id_kategori'];

// Query untuk mendapatkan nama kategori produk
$queryKategori = "SELECT kategori_produk FROM tb_kategori_produk WHERE id = '$idKategori'";
$resultKategori = mysqli_query($mysqli, $queryKategori);
$rowKategori = mysqli_fetch_assoc($resultKategori);
$namaKategori = $rowKategori['kategori_produk'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Produk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        .product img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>BNC<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php#hero">Home</a></li>
                    <li><a href="index.php#menu">Menu</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#gallery">Gallery</a></li>
                    <li><a href="artikel/index.php">Artikel</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                    <li class="nav-item">
                        <form action="search.php" method="GET" class="search-form">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </li>
                </ul>

            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="../#book-a-table">Order</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Detail Produk
                </h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row">
                    <h1>
                        <?php echo $rowProduk['nama_produk']; ?>
                    </h1>
                    <p>Kategori:
                        <?php echo $namaKategori; ?>
                    </p>
                    <p>Deskripsi:
                        <?php echo $rowProduk['deskripsi']; ?>
                    </p>
                    <p>Harga:
                        <?php echo $rowProduk['harga']; ?>
                    </p>
                    <p>Stok:
                        <?php echo $rowProduk['stok']; ?>
                    </p>
                    <?php if ($rowProduk['image']): ?>
                        <img src="admin/produk/image/<?php echo $rowProduk['image']; ?>" alt="Produk Image">
                    <?php endif; ?>
                </div>

            </div>
        </section><!-- End Portfolio Section -->
    </main><!-- End #main -->

    <?php include 'footer.php'; ?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>