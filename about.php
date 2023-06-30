<!-- <?php
include 'config/config.php';
?>
======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>About Us</h2>
            <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg);"
                data-aos="fade-up" data-aos-delay="150">
                <div class="call-us position-absolute">
                    <h4>Book a Table</h4>
                    <p>customer@breadcake.unsap.link</p>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                <div class="content ps-0 ps-lg-5">
                    <?php
                    $queryAbout = "SELECT * FROM tb_about LIMIT 1";
                    $resultAbout = $mysqli->query($queryAbout);
                    if ($resultAbout && $resultAbout->num_rows > 0) {
                        $rowAbout = $resultAbout->fetch_assoc();
                        $paragraph1 = $rowAbout['isi1'];
                        $paragraph2 = $rowAbout['isi2'];
                        $videoLink = $rowAbout['link_video'];
                        $image = $rowAbout['image'];
                        ?>
                        <p class="fst-italic">
                            <?php echo $paragraph1; ?>
                        </p>
                        <p>
                            <?php echo $paragraph2; ?>
                        </p>

                        <div class="position-relative mt-4">
                            <img src="admin/about/image/<?php echo $image; ?>" class="img-fluid" alt="">
                            <a href="<?php echo $videoLink; ?>" class="glightbox play-btn"></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>


    </div>
</section><!-- End About Section -->