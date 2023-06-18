<div class="content-header">
    <div class="container-fluid">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'users':
                    include "users/content-header.php";
                    break;
                case 'artikel':
                    include "artikel/content-header.php";
                    break;
                case 'kategori':
                    include "kategori/content-header.php";
                    break;
                case 'kategori_berita':
                    include "kategori_berita/content-header.php";
                    break;
                case 'menu':
                    include "menu/content-header.php";
                    break;
                case 'dashboard':
                    include "dashboard/content-header.php";
                    break;
                case 'berita':
                    include "berita/content-header.php";
                    break;
                case 'about_content':
                    include "about_content/content-header.php";
                    break;
                default:
                    echo "<center><h3>Maaf. Halaman tidak ditemukan!</h3></center>";
                    break;
            }
        } else {
            include "dashboard/content-header.php";
        }
        ?>
    </div>
</div>