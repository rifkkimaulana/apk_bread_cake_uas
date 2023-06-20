<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config/config.php");
include('session.php');

if (isset($_POST['submit'])) {
    // Mengambil nilai dari form
    $no_transaksi = $_POST['no_transaksi'];
    $id_customer = $_POST['id_customer'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $status_transaksi = $_POST['status_transaksi'];
    //$total_harga = $_POST['total_pembayaran'];

    // Query INSERT
    $query_insert = "INSERT INTO tb_transaksi (no_transaksi, id_customer, tanggal_transaksi, metode_pembayaran, status_transaksi) VALUES ('$no_transaksi', '$id_customer', '$tanggal_transaksi', '$metode_pembayaran', '$status_transaksi')";

    // Melakukan operasi INSERT
    if (mysqli_query($mysqli, $query_insert)) {
        echo "Data transaksi berhasil disimpan.";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }


    $produk = $_POST['produk'];

    echo "Nomor Transaksi: " . $no_transaksi . "<br>";
    echo "Tanggal Transaksi: " . $tanggal_transaksi . "<br>";
    echo "Produk: " . implode(", ", $produk) . "<br>";
    echo "Id Customer: " . $id_customer . "<br>";
    echo "Metode Pembayaran: " . $metode_pembayaran . "<br>";
    echo "Status Transaksi: " . $status_transaksi . "<br>"; ///
}


$query_last_transaksi = "SELECT no_transaksi FROM tb_transaksi ORDER BY id DESC LIMIT 1";
$result_last_transaksi = mysqli_query($mysqli, $query_last_transaksi);

if ($result_last_transaksi === false) {
    echo "Error: " . mysqli_error($mysqli);
} else {
    if (mysqli_num_rows($result_last_transaksi) > 0) {
        $row_last_transaksi = mysqli_fetch_assoc($result_last_transaksi);
        $last_transaksi_number = $row_last_transaksi['no_transaksi'];
        $last_number = (int) substr($last_transaksi_number, 4);
        $next_number = $last_number + 1;
        $next_transaksi_number = 'trx-' . sprintf('%04d', $next_number);
    } else {
        $next_transaksi_number = 'trx-0001';
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
                                    <h3 class="card-title">Data Transaksi</h3>
                                    <div class="card-tools">
                                        <a href="../dashboard.php?page=transaksi" class="btn btn-info">Kembali</a>
                                    </div>
                                </div>
                                <form method="POST">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="no_transaksi">Nomor Transaksi:</label>
                                            <input type="text" class="form-control" id="no_transaksi"
                                                name="no_transaksi" value="<?php echo $next_transaksi_number; ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                                            <?php
                                            $currentDateTime = date('Y-m-d H:i:s');
                                            $currentDate = date('Y-m-d');
                                            $currentTime = date('H:i:s');
                                            ?>
                                            <input type="text" class="form-control" id="tanggal_transaksi"
                                                name="tanggal_transaksi"
                                                value="<?php echo $currentDate . ' ' . $currentTime; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="search">Cari Produk:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="search" name="search"
                                                    placeholder="Cari produk">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Produk</th>
                                                        <th>Harga</th>
                                                        <th>Pilih</th>
                                                        <th>Jumlah Beli</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Kode untuk mengambil data produk dari database
                                                    $query_produk = "SELECT * FROM tb_produk LIMIT 5";
                                                    $result_produk = mysqli_query($mysqli, $query_produk);
                                                    $count = 0;

                                                    // Membuat array untuk menyimpan data harga dan jumlah beli
                                                    

                                                    // Mengisi tabel dengan data produk
                                                    while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                                                        echo '<tr>';
                                                        echo '<td>' . $row_produk['nama_produk'] . '</td>';
                                                        echo '<td>Rp ' . $row_produk['harga'] . '</td>';
                                                        echo '<td><input type="number" name="jumlah_beli[]" min="1" max="50" value="1"></td>';
                                                        echo '<td><input type="checkbox" name="produk[]" value="' . $row_produk['id'] . '"></td>';
                                                        echo '</tr>';
                                                        $count++;
                                                    }



                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="form-group">
                                            <label for="id_customer">Nama Customer:</label>
                                            <select class="form-control" id="id_customer" name="id_customer">
                                                <?php
                                                // Kode untuk mengambil data customer dari database
                                                $query_customer = "SELECT * FROM tb_customer";
                                                $result_customer = mysqli_query($mysqli, $query_customer);

                                                // Mengisi dropdown dengan data customer
                                                while ($row_customer = mysqli_fetch_assoc($result_customer)) {
                                                    echo '<option value="' . $row_customer['id'] . '">' . $row_customer['nama'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="metode_pembayaran">Metode Pembayaran:</label>
                                            <select class="form-control" id="metode_pembayaran"
                                                name="metode_pembayaran">
                                                <option value="Cash">Cash</option>
                                                <option value="Transfer">Transfer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status_transaksi">Status Transaksi:</label>
                                            <select class="form-control" id="status_transaksi" name="status_transaksi">
                                                <option value="Lunas">Lunas</option>
                                                <option value="Belum Lunas">Belum Lunas</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Tambah
                                            Transaksi</button>
                                    </div>
                                </form>

                                <?php
                                // Kode untuk menampilkan halaman selanjutnya jika produk lebih dari 5
                                $query_count = "SELECT COUNT(*) as total FROM tb_produk";
                                $result_count = mysqli_query($mysqli, $query_count);
                                $row_count = mysqli_fetch_assoc($result_count);
                                $total_products = $row_count['total'];

                                if ($total_products > 5) {
                                    echo '<nav aria-label="Page navigation">';
                                    echo '<ul class="pagination">';
                                    $num_pages = ceil($total_products / 5); // Hitung jumlah halaman
                                    for ($i = 1; $i <= $num_pages; $i++) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                    }
                                    echo '</ul>';
                                    echo '</nav>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../halaman/footer.php'); ?>
    </div>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>


<!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</html>