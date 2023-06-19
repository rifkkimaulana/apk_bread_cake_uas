<?php
include_once("../../config/config.php");
include('session.php');

$id = @$_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM tb_customer WHERE id=$id");
while ($user_data = mysqli_fetch_array($result)) {
    $row_nama = $user_data['nama'];
    $row_alamat = $user_data['alamat'];
    $row_telpon = $user_data['telpon'];
    $row_email = $user_data['email'];
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = @$_POST['nama'];
    $alamat = @$_POST['alamat'];
    $telpon = @$_POST['telpon'];
    $email = @$_POST['email'];
    $result = mysqli_query($mysqli, "UPDATE tb_customer SET nama='$nama',alamat='$alamat',telpon='$telpon', email='$email' WHERE id=$id");
    echo "<script>alert('Berhasil disimpan!'); window.location.href = '../../admin/dashboard.php?page=customer';</script>";
    header("Location:../dashboard.php?page=customer");
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
        <?php include_once('../halaman/navbar.php'); ?>
        <?php include_once('../halaman/sidebar.php'); ?>
        <div class="content-wrapper">
            <?php include_once('content-header.php'); ?>
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
                                <div class="card-body">
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" value="<?= $row_nama ?>" name="nama"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" value="<?= $row_alamat ?>"
                                                name="alamat" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="Telpon">Telpon</label>
                                            <input type="text" class="form-control" value="<?= $row_telpon ?>"
                                                name="telpon">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" value="<?= $row_email ?>"
                                                name="email" required autofocus>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="update">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('../halaman/footer.php'); ?>
    </div>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>