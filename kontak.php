<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Contact</h2>
            <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
            <iframe style="border:0; width: 100%; height: 350px;" src="
            <?php
            $setting = mysqli_query($mysqli, "SELECT * FROM tb_setting WHERE id='1'");
            $data = mysqli_fetch_array($setting);
            echo $data['link_alamat']; ?>
            " frameborder="0" allowfullscreen>
            </iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-map flex-shrink-0"></i>
                    <div>
                        <h3>Our Address</h3>
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
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>
                            <?php echo $data['email']; ?><br>
                        </p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>
                            <?php echo $data['telpon']; ?><br>
                        </p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-share flex-shrink-0"></i>
                    <div>
                        <h3>Opening Hours</h3>
                        <p>
                            <strong>
                                <?php echo $data['open_operasional']; ?>
                            </strong> </br>
                            <?php echo $data['close_operasional']; ?><br>

                        </p>
                    </div>
                </div>
            </div><!-- End Info Item -->

        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
            <div class="row">
                <div class="col-xl-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-xl-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
        </form><!--End Contact Form -->



        <!-- Add the following PHP code to process the form submission -->

    </div>
</section><!-- End Contact Section -->