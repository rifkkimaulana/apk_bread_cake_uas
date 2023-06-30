<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Penyusun Aplikasi</h2>
            <p>Tentang Kami</p>
        </div>
        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <?php
                // Sertakan file koneksi database Anda
                include 'config/config.php';

                // Query untuk mengambil data testimoni dari database
                $query = "SELECT * FROM tb_profil";
                $result = $mysqli->query($query);

                // Lakukan perulangan untuk setiap hasil yang ditemukan
                while ($row = $result->fetch_assoc()) {
                    $deskripsi = $row['deskripsi'];
                    $nama = $row['nama'];
                    $pekerjaan = $row['pekerjaan'];
                    $gambar = $row['image'];

                    // Tampilkan nilai-nilai testimoni menggunakan echo
                    echo '<div class="swiper-slide">';
                    echo '<div class="testimonial-item">';
                    echo '<div class="row gy-4 justify-content-center">';
                    echo '<div class="col-lg-6">';
                    echo '<div class="testimonial-content">';
                    echo '<p>';
                    echo '<i class="bi bi-quote quote-icon-left"></i>';
                    echo $deskripsi;
                    echo '<i class="bi bi-quote quote-icon-right"></i>';
                    echo '</p>';
                    echo '<h3>' . $nama . '</h3>';
                    echo '<h4>' . $pekerjaan . '</h4>';
                    echo '<div class="stars">';
                    echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-lg-2 text-center">';
                    echo '<img src="admin/profil_toko/image/' . $gambar . '" class="img-fluid testimonial-img square-image" alt="">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                // Jangan lupa untuk menutup koneksi ke database setelah selesai
                $mysqli->close();
                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section><!-- End Testimonials Section -->