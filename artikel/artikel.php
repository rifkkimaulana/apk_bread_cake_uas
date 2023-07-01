<?php

include "../config/config.php";
// Mendapatkan ID artikel dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data artikel berdasarkan ID
$query = "SELECT a.*, k.kategori_artikel
          FROM tb_artikel a
          INNER JOIN tb_kategori_artikel k ON a.id_kategori = k.id
          WHERE a.id = $id";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($result);

// Memastikan artikel dengan ID yang valid ditemukan
if (!$row) {
    // Jika artikel tidak ditemukan, bisa diarahkan ke halaman 404 atau halaman lainnya
    // header("Location: not-found.php");
    exit;
}

// Mengambil data artikel
$id = $row['id'];
$judul = $row['judul_artikel'];
$konten = $row['content_artikel'];
$kategori = $row['kategori_artikel'];
$cover = $row['cover'];
$created_time = $row['created_time'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Artikel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <style>
        .article img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
        }
    </style>

    <!-- =======================================================
  * Template Name: Yummy
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
                    <li><a href="../#hero">Home</a></li>
                    <li><a href="../#menu">Menu</a></li>
                    <li><a href="../#about">About</a></li>
                    <li><a href="../#gallery">Gallery</a></li>
                    <li><a href="index.php">Artikel</a></li>
                    <li><a href="../#contact">Contact</a></li>
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
                <h2>
                    <?php echo $judul; ?>
                </h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="portfolio-details-container">
                    <div class="portfolio-description">

                        <div class="article">
                            <?php if ($cover): ?>
                                <img src="../admin/artikel/image/<?php echo $cover; ?>" alt="Cover Gambar Artikel">
                            <?php endif; ?>
                            <h2>
                                <?php echo $judul; ?>
                            </h2>
                            <p>
                                <?php echo $konten; ?>
                            </p>
                        </div>

                    </div>
                    <div class="portfolio-info">
                        <h3>Informasi Artikel</h3>
                        <ul>
                            <li><strong>Kategori:</strong>
                                <?php echo $kategori; ?>
                            </li>
                            <li><strong>Waktu Pembuatan:</strong>
                                <?php echo $created_time; ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section><!-- End Portfolio Details Section -->
    </main><!-- End #main -->

    <?php include '../footer.php'; ?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>