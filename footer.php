<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div>
                    <h4>Address</h4>
                    <p>
                        <?php
                        $setting = mysqli_query($mysqli, "SELECT * FROM tb_setting WHERE id='1'");
                        $data = mysqli_fetch_array($setting);
                        $alamat1 = $data['alamat1'];
                        $alamat2 = $data['alamat2'];
                        echo $alamat1 . "<br>";
                        echo $alamat2 . "<br>";
                        ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-telephone icon"></i>
                <div>
                    <h4>Reservations</h4>
                    <p>
                        <strong>Phone:</strong>
                        <?php echo $data['telpon']; ?><br>
                        <strong>Email:</strong>
                        <?php echo $data['email']; ?><br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-clock icon"></i>
                <div>
                    <h4>Opening Hours</h4>
                    <p>
                        <strong>
                            <?php echo $data['open_operasional']; ?>
                        </strong> </br>
                        <?php echo $data['close_operasional']; ?><br>

                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Follow Us</h4>
                <div class="social-links d-flex">
                    <a href="<?php echo $data['link_twetter']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="<?php echo $data['link_facebook']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo $data['link_instagram']; ?>" class="instagram"><i
                            class="bi bi-instagram"></i></a>
                    <a href="<?php echo $data['link_linkedin']; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        &copy; Copyright 2023<strong><span>
                <?php echo $data['nama_perusahaan']; ?>
            </span></strong>. All Rights Reserved
    </div>
    <div class="container">
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->