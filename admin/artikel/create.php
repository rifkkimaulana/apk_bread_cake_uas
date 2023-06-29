<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config/config.php");
include('session.php');

if (isset($_POST['tambah'])) {
    $judul_artikel = @$_POST['judul_artikel'];
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul_artikel"])));
    $created_time = date("Y-m-d H:i:s");
    $user_id = $_SESSION['id'];
    $kategori = @$_POST['kategori'];
    $content_artikel = @$_POST['content_artikel'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['gambar'];

        $allowedTypes = array('image/jpeg', 'image/png');
        $fileType = $file['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file yang diunggah tidak didukung. Harap unggah file JPG atau PNG.";
            exit;
        }
        $uniqueFileName = 'upload_' . date('YmdHis') . '_';

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        $uploadDir = 'image/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $upload = ($uploadDir . $uniqueFileName . $fileName);
        $uploaddb = ($uniqueFileName . $fileName);

        if (move_uploaded_file($fileTmpName, $upload)) {

            $result = mysqli_query($mysqli, "INSERT INTO tb_artikel (judul_artikel, created_time, user_id, id_kategori, content_artikel, cover)
                VALUES ('$judul_artikel', '$created_time', '$user_id', '$kategori', '$content_artikel', '$uploaddb')");

            if ($result) {
                echo "<script>window.location.href = '../../admin/dashboard.php?page=artikel';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal menyimpan artikel!');</script>";
                echo "Error: " . mysqli_error($mysqli);
                exit;
            }
        } else {
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Tidak ada file yang diunggah!');</script>";
        exit;
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
                                        <div class="form-group">
                                            <label for="judul_artikel">Judul Artikel</label>
                                            <input type="text" class="form-control" name="judul_artikel" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="content_artikel">Content</label>
                                            <textarea type="text" class="form-control" name="content_artikel" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control" name="gambar">
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
                                        <button class="btn btn-primary" type="submit" name="tambah">Simpan</button>
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