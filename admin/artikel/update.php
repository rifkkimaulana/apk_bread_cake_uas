<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config/config.php");
include('session.php');

if (isset($_POST['update'])) {
    $judul_artikel = @$_POST['judul_artikel'];
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul_artikel"])));
    $created_time = date("Y-m-d H:i:s");
    $user_id = $_SESSION['id'];
    $kategori = @$_POST['kategori'];
    $content_artikel = @$_POST['content_artikel'];

    // Memeriksa apakah ada file gambar yang diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];
        $id_kategori = isset($_POST['id_kategori']) ? $_POST['id_kategori'] : $data['id_kategori'];

        // Memeriksa tipe file
        $allowedTypes = array('image/jpeg', 'image/png');
        $fileType = $file['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file yang diunggah tidak didukung. Harap unggah file JPG atau PNG.";
            exit;
        }

        // Mengambil informasi file yang diunggah
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // Menggunakan direktori tujuan penyimpanan file
        $uploadDir = 'image/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Memindahkan file ke direktori tujuan
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueFileName = 'upload_' . date('YmdHis') . '_';
        $upload = ($uniqueFileName . $fileName);
        $uploaddb = ($uniqueFileName . $fileName);
        if (move_uploaded_file($fileTmpName, $uploadDir . $upload)) {
            // Melakukan query UPDATE setelah file berhasil diunggah
            // Menghapus gambar lama jika ada
            $query_artikel = mysqli_query($mysqli, "SELECT * FROM tb_artikel WHERE id='$artikel_id'");
            $data = mysqli_fetch_array($query_artikel);
            $row_gambar = $data['image'];

            if (!empty($fileName) && $fileName !== $row_gambar) {
                $oldImagePath = $uploadDir . $row_gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($mysqli, "UPDATE tb_artikel SET judul_artikel='$judul_artikel', content_artikel='$content_artikel', id_kategori='$kategori', user_id='$user_id', created_time='$created_time', image='$uploaddb' WHERE id='$artikel_id'");

            if ($result) {
                echo "<script>window.location.href = '../../admin/dashboard.php?page=artikel';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal mengubah artikel!');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        // Tidak ada file gambar yang diunggah, hanya mengubah data produk
        $result = mysqli_query($mysqli, "UPDATE tb_produk SET judul_artikel='$judul_artikel', content_artikel='$content_artikel', id_kategori='$kategori', user_id='$user_id', created_time='$created_time' WHERE id='$artikel_id'");

        if ($result) {
            echo "<script>alert('Artikel berhasil diubah!');</script>";
            echo "<script>window.location.href = '../../admin/dashboard.php?page=artikel';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal mengubah Artikel!');</script>";
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PANEL ADMIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../halaman/navbar.php'); ?>
        <?php include('../halaman/sidebar.php'); ?>

        <div class="content-wrapper">
            <?php include('content-header.php'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Artikel</h3>
                                    <div class="card-tools">
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=artikel" class="btn btn-info">Kembali</a>
                                    </div>
                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <?php
                                        $artikel_id = $_GET['id'];
                                        $artikel = mysqli_query($mysqli, "SELECT * FROM tb_artikel WHERE id='$artikel_id'");
                                        $data = mysqli_fetch_array($artikel);
                                        ?>

                                        <input type="hidden" name="id_artikel" value="<?= $data['id'] ?>">

                                        <div class="form-group" enctype="multipart/form-data">
                                            <label for="judul_artikel">Judul Artikel</label>
                                            <input type="text" class="form-control" name="judul_artikel" required autofocus>
                                        </div>

                                        <div class="form-group" enctype="multipart/form-data">
                                            <label for="content_artikel">Content</label>
                                            <textarea type="text" class="form-control" name="content_artikel" required></textarea>
                                        </div>

                                        <div class="form-group" enctype="multipart/form-data">
                                            <label for="image">Gambar</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select class="form-control" name="kategori" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php
                                                $query = mysqli_query($mysqli, "SELECT * FROM tb_kategori_artikel ORDER BY id DESC");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    echo "<option value='" . $data['id'] . "'>" . $data['kategori_artikel'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit" name="update">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../halaman/footer.php'); ?>

    </div>
</body>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>

</html>