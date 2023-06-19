<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../../config/config.php");
include('session.php');

if (isset($_POST['submit'])) {
    $nama = @$_POST['nama'];
    $alamat = @$_POST['alamat'];
    $telpon = md5(@$_POST['telpon']);
    $email = @$_POST['email'];
    $date_time = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM tb_customer WHERE nama='$nama'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah ada. Silahkan coba lagi!')</script>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO tb_customer(nama,alamat,telpon,email,create_time) VALUES('$nama','$alamat','$telpon','$email', '$date_time)");
        echo "<script> window.location.href = '../../admin/dashboard.php?page=customer';</script>";
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
                                    <h3 class="card-title">Data Customer</h3>
                                    <div class="card-tools">
                                        <a href="../../admin/dashboard.php?page=customer"
                                            class="btn btn-info">Kembali</a>
                                    </div>
                                </div>

                                <form method="post" name="form1">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telpon">No. Telpon</label>
                                            <input type="text" class="form-control" name="telpon" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
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

    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>