<?php
include 'config/config.php';

// Query untuk mengambil data testimoni dari database
$query = "SELECT * FROM tb_profile";
$result = $mysqli->query($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bread & Cakes</title>
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
  <style>
    .square-image {
      width: 200px;
      height: 200px;
      object-fit: cover;
    }
  </style>=

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

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
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Menu</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">Artikel</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="">Order</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div
          class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Nikmati Makanan Sehat<br> dan Lezat Kami</h2>
          <p data-aos="fade-up" data-aos-delay="100">Dapatkan kenikmatan dari makanan sehat dan lezat kami. Kami
            menyajikan berbagai pilihan kue dan kreasi dengan cita rasa yang menggugah selera. Setiap hidangan kami
            dibuat dengan cinta dan kualitas terbaik, untuk memastikan Anda mendapatkan pengalaman yang tak terlupakan.
          </p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#" class="btn-book-a-table">Book a Table</a>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
              class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                Video</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="500">
        </div>
      </div>
    </div>
  </section> <!-- End Hero Section -->

  <main id="main">
    <!-- ======= Mengapa Memilih Bread & Cakes? Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Mengapa Memilih Bread & Cakes?</h3>
              <p>
                Kami memberikan alasan yang kuat untuk memilih kami sebagai penyedia kue dan kreasi Anda. Dengan
                pengalaman bertahun-tahun dalam industri ini, kami mengutamakan kualitas, kelezatan, dan
                pelayanan yang terbaik. Setiap hidangan kami dibuat dengan cinta dan inovasi, memberikan
                pengalaman tak terlupakan bagi pelanggan kami.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Pilihan Menu Variatif</h4>
                  <p>Kami menyediakan beragam pilihan menu kue dan kreasi yang bisa Anda nikmati. Mulai dari
                    kue tradisional hingga kue modern dengan rasa yang menggoda selera Anda.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Kualitas Premium</h4>
                  <p>Kami hanya menggunakan bahan-bahan berkualitas terbaik untuk menghasilkan kue dan kreasi
                    yang lezat dan memuaskan. Kami menjaga standar kualitas tinggi untuk kepuasan pelanggan
                    kami.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Pelayanan Prima</h4>
                  <p>Kami berkomitmen untuk memberikan pelayanan yang ramah, responsif, dan profesional kepada
                    setiap pelanggan. Tim kami siap membantu Anda memilih kue dan kreasi yang tepat serta
                    memberikan pengalaman belanja yang menyenangkan.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Mengapa Memilih Bread & Cakes? Section -->
    <?php include 'counter.php'; ?>
    <?php include 'menu.php'; ?>
    <?php include 'testimoni.php'; ?>
    <?php include 'booking.php'; ?>
    <?php include 'gallery.php'; ?>
    <?php include 'kontak.php'; ?>
    <?php include 'about.php'; ?>

  </main> <!-- End #main -->
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