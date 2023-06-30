<?php
include 'config/config.php';
?>

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Menu</h2>
            <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <!-- Generate the menu items dynamically based on the categories from tb_kategori_produk -->
            <?php
            // Fetch categories from the database
            $categories = $mysqli->query("SELECT * FROM tb_kategori_produk");
            $firstCategory = true;
            while ($category = $categories->fetch_assoc()) {
                $categoryId = $category['id'];
                $categoryName = $category['kategori_produk'];
                ?>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($firstCategory) ? 'active show' : ''; ?>" data-bs-toggle="tab"
                        data-bs-target="#menu-<?php echo $categoryId; ?>">
                        <h4>
                            <?php echo $categoryName; ?>
                        </h4>
                    </a>
                </li><!-- End tab nav item -->

                <?php
                $firstCategory = false;
            }
            ?>

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            <!-- Generate the menu content dynamically based on the products from tb_produk -->
            <?php
            // Fetch categories from the database
            $categories = $mysqli->query("SELECT * FROM tb_kategori_produk");
            $firstCategory = true;
            while ($category = $categories->fetch_assoc()) {
                $categoryId = $category['id'];
                $categoryName = $category['kategori_produk'];
                ?>

                <div class="tab-pane fade <?php echo ($firstCategory) ? 'active show' : ''; ?>"
                    id="menu-<?php echo $categoryId; ?>">
                    <div class="tab-header text-center">
                        <p>
                            <?php echo $categoryName; ?>
                        </p>
                        <h3>
                            <?php echo $categoryName; ?>
                        </h3>
                    </div>

                    <div class="row gy-5">
                        <?php
                        // Fetch products for the current category from the database
                        $products = $mysqli->query("SELECT * FROM tb_produk WHERE id_kategori = $categoryId");
                        while ($product = $products->fetch_assoc()) {
                            $productId = $product['id'];
                            $productName = $product['nama_produk'];
                            $productDescription = $product['deskripsi'];
                            $productPrice = $product['harga'];
                            $productImage = $product['image'];
                            ?>

                            <div class="col-lg-4 menu-item">
                                <a href="admin/produk/image/<?php echo $productImage; ?>" class="glightbox">
                                    <img src="admin/produk/image/<?php echo $productImage; ?>" class="menu-img img-fluid"
                                        alt="">
                                </a>
                                <h4>
                                    <?php echo $productName; ?>
                                </h4>
                                <p class="ingredients">
                                    <?php echo $productDescription; ?>
                                </p>
                                <p class="price">IDR
                                    <?php echo $productPrice; ?>
                                </p>
                            </div><!-- Menu Item -->

                            <?php
                        }
                        ?>

                    </div>
                </div><!-- End Menu Content -->

                <?php
                $firstCategory = false;
            }
            ?>

        </div>
    </div>
</section>