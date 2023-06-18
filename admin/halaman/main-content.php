<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'users':
                    include "users/index.php";
                    break;
                case 'artikel':
                    include "artikel/index.php";
                    break;
                case 'kategori':
                    include "kategori/index.php";
                    break;
                case 'kategori_berita':
                    include "kategori_berita/index.php";
                    break;
                case 'menu':
                    include "menu/index.php";
                    break;
                case 'dashboard':
                    include "dashboard/index.php";
                    break;
                case 'berita':
                    include "berita/index.php";
                    break;
                case 'about_content':
                    include "about_content/index.php";
                    break;
                default:
                    echo "<center><h3>Maaf. Halaman tidak ditemukan!</h3></center>";
                    break;
            }
        } else {
            include "dashboard/index.php";
        }
        ?>
    </div>
</div>