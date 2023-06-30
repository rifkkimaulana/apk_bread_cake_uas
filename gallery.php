<?php
include 'config/config.php';

// Query untuk mengambil data gambar dari tb_gallery
$queryGallery = "SELECT * FROM tb_gallery";
$resultGallery = $mysqli->query($queryGallery);

// Periksa apakah terdapat setidaknya satu gambar
if ($resultGallery->num_rows > 0) {
    ?>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Gallery</h2>
                <p>Check <span>Our Gallery</span></p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <?php
                    // Query untuk mengambil data gambar dari tb_gallery dan mengurutkannya berdasarkan ID
                    $queryGallery = "SELECT * FROM tb_gallery ORDER BY id ASC";
                    $resultGallery = $mysqli->query($queryGallery);

                    // Periksa apakah ada hasil yang ditemukan
                    if ($resultGallery->num_rows > 0) {
                        // Lakukan perulangan untuk setiap hasil yang ditemukan
                        while ($data = $resultGallery->fetch_assoc()) {

                            $image = $data['image'];
                            ?>
                            <div class="swiper-slide">

                                <a class="glightbox" data-gallery="images-gallery" href="admin/gallery/image/<?php echo $image; ?>">
                                    <img src="admin/gallery/image/<?php echo $image; ?>" class="img-fluid" alt="">
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>


        </div>

    </section><!-- End Gallery Section -->

    <?php
} // Akhir dari if ($resultGallery->num_rows > 0)
?>