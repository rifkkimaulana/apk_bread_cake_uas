<?php
include "config/config.php";

$searchKeyword = $_GET['search'];

$query = "SELECT * FROM tb_produk WHERE nama_produk LIKE '%$searchKeyword%'";
$result = mysqli_query($mysqli, $query);
$numResults = mysqli_num_rows($result);

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
                <h2>Search Results for "
                    <?php echo $searchKeyword; ?>"
                </h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row">
                    <?php
                    // Check if there are any search results
                    if ($numResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)):
                            ?>
                            <div class="col-lg-4 col-md-6 portfolio-item">
                                <div class="portfolio-wrap">
                                    <h4>
                                        <?php echo $row['nama_produk']; ?>
                                    </h4>

                                    <?php if ($row['image']): ?>
                                        <a href="produk.php?id=<?php echo $row['id']; ?>"><img
                                                src="admin/produk/image/<?php echo $row['image']; ?>" class="img-fluid" alt=""></a>
                                    <?php endif; ?>

                                    <div class="portfolio-info">
                                        <div class="portfolio-links">
                                            <a href="produk.php?id=<?php echo $row['id']; ?>" title="Read More">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    } else {
                        echo '<div class="col-12">No search results found.</div>';
                    }
                    ?>
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