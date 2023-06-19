<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../../config/config.php");
include('session.php');

if (isset($_POST['update'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $kategori_id = $_POST['kategori_id'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $produk_id = $_POST['id_produk'];

    // Memeriksa apakah ada file gambar yang diunggah
    if (isset($_FILES['image']) && $_FILES['iamge']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];
        $kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : $data['kategori_id'];

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
            $query_produk = mysqli_query($mysqli, "SELECT * FROM tb_produk WHERE id='$produk_id'");
            $data = mysqli_fetch_array($query_produk);
            $row_gambar = $data['image'];

            if (!empty($fileName) && $fileName !== $row_gambar) {
                $oldImagePath = $uploadDir . $row_gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($mysqli, "UPDATE tb_produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', kategori_id='$kategori_id', harga='$harga', stok='$stok', image='$uploaddb' WHERE id='$produk_id'");

            if ($result) {
                // Berhasil mengubah data dan gambar
                echo "<script>window.location.href = '../../admin/dashboard.php?page=produk';</script>";
                exit;
            } else {
                // Gagal mengubah data dan gambar
                echo "<script>alert('Gagal mengubah produk!');</script>";
                exit;
            }
        } else {
            // Gagal memindahkan file ke direktori tujuan
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        // Tidak ada file gambar yang diunggah, hanya mengubah data produk
        $result = mysqli_query($mysqli, "UPDATE tb_produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', kategori_id='$kategori_id', harga='$harga', stok='$stok' WHERE id='$produk_id'");

        if ($result) {
            // Berhasil mengubah data produk
            echo "<script>alert('Produk berhasil diubah!');</script>";
            echo "<script>window.location.href = '../../admin/dashboard.php?page=produk';</script>";
            exit;
        } else {
            // Gagal mengubah data produk
            echo "<script>alert('Gagal mengubah produk!');</script>";
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                                    <h3 class="card-title">Data Produk</h3>
                                    <div class="card-tools">
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=produk"
                                            class="btn btn-info">Kembali</a>
                                    </div>
                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <?php
                                        $produk_id = $_GET['id'];
                                        $produk = mysqli_query($mysqli, "SELECT * FROM tb_produk WHERE id='$produk_id'");
                                        $data = mysqli_fetch_array($produk);
                                        ?>

                                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">

                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control" name="nama_produk" required
                                                autofocus value="<?= $data['nama_produk'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea type="text" class="form-control" name="deskripsi"
                                                required><?= $data['deskripsi'] ?></textarea>
                                        </div>

                                        <?php
                                        $kategori = mysqli_query($mysqli, "SELECT * FROM tb_kategori_produk ORDER BY id DESC");
                                        ?>

                                        <div class="form-group">
                                            <label for="kategori_id">Kategori</label>
                                            <select class="form-control" name="kategori_id">
                                                <option value="">Pilih Kategori</option>
                                                <?php
                                                $kategori = mysqli_query($mysqli, "SELECT * FROM tb_kategori_produk ORDER BY id DESC");
                                                while ($row = mysqli_fetch_array($kategori)) {
                                                    $selected = ($row['id'] == $data['kategori_id']) ? 'selected' : '';
                                                    echo "<option value='{$row['id']}' {$selected}>{$row['kategori_produk']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" class="form-control" name="harga" required
                                                value="<?= $data['harga'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="number" class="form-control" name="stok" required
                                                value="<?= $data['stok'] ?>">
                                        </div>

                                        <div class="form-group" enctype="multipart/form-data">
                                            <label for="image">Gambar</label>
                                            <input type="file" class="form-control" name="image">
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