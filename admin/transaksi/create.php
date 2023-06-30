<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config/config.php");
include('session.php');

//membuat no faktur
$query_last_transaksi = "SELECT no_faktur FROM tb_penjualan ORDER BY id_penjualan DESC LIMIT 1";
$result_last_transaksi = mysqli_query($mysqli, $query_last_transaksi);

if ($result_last_transaksi === false) {
    echo "Error: " . mysqli_error($mysqli);
} else {
    if (mysqli_num_rows($result_last_transaksi) > 0) {
        $row_last_transaksi = mysqli_fetch_assoc($result_last_transaksi);
        $last_transaksi_number = $row_last_transaksi['no_faktur'];
        $prefix_length = strlen('TRX-');
        $last_number = (int) substr($last_transaksi_number, $prefix_length);
        $next_number = $last_number + 1;
        $next_transaksi_number = 'TRX-' . sprintf('%04d', $next_number);
    } else {
        $next_transaksi_number = 'TRX-0001';
    }
}

// Inisialisasi keranjang belanja menggunakan session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Dapatkan keranjang belanja dari session
$cart = $_SESSION['cart'];

// Proses penambahan produk ke keranjang belanja
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_produk']) && isset($_POST['jumlah_beli'])) {
        $product_id = $_POST['id_produk'];
        $jumlah_beli = $_POST['jumlah_beli'];

        // Dapatkan data produk berdasarkan ID
        $query = "SELECT * FROM tb_produk WHERE id = $product_id";
        $result = mysqli_query($mysqli, $query);
        $product = mysqli_fetch_assoc($result);

        // Tambahkan produk ke dalam keranjang belanja
        $cartItem = [
            'id' => $product_id,
            'nama_produk' => $product['nama_produk'],
            'jumlah_beli' => $jumlah_beli,
            'harga' => $product['harga'],
        ];

        array_push($cart, $cartItem);
        // Simpan kembali keranjang belanja ke dalam session
        $_SESSION['cart'] = $cart;
    }
}
// Hitung total pembelian
$total_pembelian = 0;
foreach ($cart as $item) {
    $subtotal = $item['jumlah_beli'] * $item['harga'];
    $total_pembelian += $subtotal;
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
        <!--start navbar sidebar-->
        <?php include('../halaman/navbar.php');
        include('../halaman/sidebar.php');
        ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tambah Penjualan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Penjualan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <?php include 'form.php'; ?>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('../halaman/footer.php'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

    <?php include 'fungsi.php'; ?>
</body>

</html>