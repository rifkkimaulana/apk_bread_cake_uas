<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config/config.php");
include('session.php');

if (isset($_POST['submit'])) {
    $nama_kategori = @$_POST['kategori_produk'];
    $sql = "SELECT * FROM tb_kategori_produk WHERE kategori_produk='$nama_kategori'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Nama Kategori sudah ada. Silahkan coba lagi!')</script>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO tb_kategori_produk(kategori_produk) VALUES('$nama_kategori')");
        echo "<script>window.location.href = '../../admin/dashboard.php?page=kategori_produk';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

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
                                    <h3 class="card-title">Data Transaksi
                                    </h3>
                                    <div class="card-tools">
                                        <a href="../dashboard.php?page=transaksi" class="btn btn-info">Kembali</a>
                                    </div>
                                </div>
                                <form method="POST" action="proses_tambah_transaksi.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal:</label>
                                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pelanggan">Pelanggan:</label>
                                            <input type="text" id="pelanggan" name="pelanggan" class="form-control"
                                                required>
                                        </div>

                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Produk</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="search">Cari Produk:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="search"
                                                            name="search" placeholder="Cari produk">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-search"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <?php
                                                            $keyword = ''; // Deklarasi variabel $keyword dengan nilai awal string kosong
                                                            
                                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                                $keyword = $_POST['search'];
                                                            }

                                                            // Membuat query berdasarkan kata kunci pencarian
                                                            $query = "SELECT * FROM tb_produk WHERE nama_produk LIKE '%$keyword%'";
                                                            $produk = mysqli_query($mysqli, $query);

                                                            $count = 0;
                                                            while ($row_produk = mysqli_fetch_assoc($produk)) {
                                                                if ($count % 5 == 0) {
                                                                    if ($count != 0) {
                                                                        echo '</tr>';
                                                                    }
                                                                    echo '<tr>';
                                                                }
                                                                echo '<td>';
                                                                echo '<div class="form-check">';
                                                                echo '<input class="form-check-input" type="checkbox" name="produk[]" value="' . $row_produk['id'] . '" id="produk' . $row_produk['id'] . '">';
                                                                echo '<label class="form-check-label" for="produk' . $row_produk['id'] . '">' . $row_produk['nama_produk'] . ' - Rp' . $row_produk['harga'] . '</label>';
                                                                echo '</div>';
                                                                echo '</td>';
                                                                $count++;
                                                            }
                                                            // Menutup baris tabel yang terakhir jika tidak memenuhi 5 produk
                                                            while ($count % 5 != 0) {
                                                                echo '<td></td>';
                                                                $count++;
                                                            }
                                                            echo '</tr>';
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="jumlah">Jumlah:</label>
                                            <input type="number" id="jumlah" name="jumlah[]" class="form-control"
                                                min="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga:</label>
                                            <input type="number" id="harga" name="harga[]" class="form-control" min="0"
                                                step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
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

<!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>

</html>