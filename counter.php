<!-- ======= Stats Counter Section ======= -->
<section id="stats-counter" class="stats-counter">
    <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

            <div class="col-lg-4 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <?php
                    // Mengambil jumlah customer dari tb_customer
                    $queryCustomer = "SELECT COUNT(*) as totalCustomer FROM tb_customer";
                    $resultCustomer = $mysqli->query($queryCustomer);
                    $dataCustomer = $resultCustomer->fetch_assoc();
                    $totalCustomer = $dataCustomer['totalCustomer'];
                    ?>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo $totalCustomer; ?>"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Customer</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-4 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <?php
                    // Mengambil jumlah produk dari tb_produk
                    $queryProduk = "SELECT COUNT(*) as totalProduk FROM tb_produk";
                    $resultProduk = $mysqli->query($queryProduk);
                    $dataProduk = $resultProduk->fetch_assoc();
                    $totalProduk = $dataProduk['totalProduk'];
                    ?>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo $totalProduk; ?>"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Produk</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-4 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <?php
                    // Mengambil jumlah transaksi dari tb_penjualan
                    $queryTransaksi = "SELECT COUNT(*) as totalTransaksi FROM tb_penjualan";
                    $resultTransaksi = $mysqli->query($queryTransaksi);
                    $dataTransaksi = $resultTransaksi->fetch_assoc();
                    $totalTransaksi = $dataTransaksi['totalTransaksi'];
                    ?>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo $totalTransaksi; ?>"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Transaksi</p>
                </div>
            </div><!-- End Stats Item -->

        </div>

    </div>
</section><!-- End Stats Counter Section -->