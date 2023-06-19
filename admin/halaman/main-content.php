<div class="content">
    <div class="container-fluid">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'dashboard':
                    include "dashboard/index.php";
                    break;
                case 'users':
                    include "users/index.php";
                    break;
                case 'customer':
                    include "customer/index.php";
                    break;
                case 'produk':
                    include "produk/index.php";
                    break;
                case 'kategori_produk':
                    include "kategori_produk/index.php";
                    break;
                case 'transaksi':
                    include "transaksi/index.php";
                    break;
                default:
                    echo "<center><h3>Maaf. Halaman tidak ditemukan!</h3></center>";
                    break;
            }
        } else {
            include "../dashboard/index.php";
        }
        ?>
    </div>
</div>