<?php include '../config/config.php'; ?>
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

        <div class="d-flex justify-content-between align-items-center">
          <h2>Artikel</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Artikel</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <?php
          // Query untuk mendapatkan data artikel
          $query = "SELECT a.*, k.kategori_artikel
                    FROM tb_artikel a
                    INNER JOIN tb_kategori_artikel k ON a.id_kategori = k.id
                    ORDER BY a.created_time DESC";

          $result = mysqli_query($mysqli, $query);

          // Loop melalui setiap artikel
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $judul = $row['judul_artikel'];
            $konten = $row['content_artikel'];
            $kategori = $row['kategori_artikel'];
            $cover = $row['cover'];
            $created_time = $row['created_time'];
            $slug = $row['slug'];
            ?>

            <div class="col-lg-6">
              <div class="card mb-4">
                <img src="../admin/artikel/image/<?php echo $cover; ?>" class="card-img-top" alt="Cover Image">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $judul; ?>
                  </h5>
                  <p class="card-text">
                    <?php echo substr($konten, 0, 150) . '...'; ?>
                  </p>
                  <a href="artikel.php?id=<?php echo $id; ?>" class="btn btn-primary">Read More</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">
                    <?php echo 'Kategori: ', $kategori; ?>
                  </small><br>
                  <small class="text-muted">
                    <?php echo 'Diposting pada: ', $created_time; ?>
                  </small>
                </div>
              </div>
            </div>

            <?php
          }
          ?>
        </div>

      </div>
    </section>


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