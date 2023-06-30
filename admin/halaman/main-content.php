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
                case 'profil_toko':
                    include "profil_toko/index.php";
                    break;
                case 'gallery':
                    include "gallery/index.php";
                    break;
                case 'about':
                    include "about/index.php";
                    break;
                case 'kategori_artikel':
                    include "kategori_artikel/index.php";
                    break;
                case 'artikel':
                    include "artikel/index.php";
                    break;
                case 'setting':
                    include "setting/index.php";
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