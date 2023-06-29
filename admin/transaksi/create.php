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
    $query_insert = "INSERT INTO tb_transaksi (no_transaksi, id_customer, tanggal_transaksi, metode_pembayaran,
status_transaksi) VALUES ('$no_transaksi', '$id_customer', '$tanggal_transaksi', '$metode_pembayaran',
'$status_transaksi')";

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

                                        <div class="form-group" style="display: none;">
                                            <label for="no_transaksi">Nomor Transaksi:</label>
                                            <input type="text" class="form-control" id="no_transaksi"
                                                name="no_transaksi" value="<?php echo $next_transaksi_number; ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group" style="display: none;">
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">

                                                        <div class="form-group">
                                                            <label for="pilih_produk">Pilih Produk</label>
                                                            <div class="input-group">
                                                                <input type="search" id="searchInput"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Ketik Nama Produk yang ingin dibeli."
                                                                    aria-controls="example2">
                                                                <div class="input-group-append">
                                                                    <button id="searchButton"
                                                                        class="btn btn-primary btn-sm"
                                                                        type="button">Cari</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <table id="example2"
                                                                class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nama Produk</th>
                                                                        <th>Harga</th>
                                                                        <th>Stok</th>
                                                                        <th>Tambah</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    // Kode untuk mengambil data produk dari database
                                                                    $query_produk = "SELECT * FROM tb_produk";
                                                                    $result_produk = mysqli_query($mysqli, $query_produk);
                                                                    $count = 0;

                                                                    // Mengisi tabel dengan data produk
                                                                    while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                                                                        echo '<tr>';
                                                                        echo '<td>' . $row_produk['nama_produk'] . '</td>';
                                                                        echo '<td>Rp ' . $row_produk['harga'] . '</td>';
                                                                        echo '<td>' . $row_produk['stok'] . '</td>';
                                                                        echo '<td>';
                                                                        echo '<button class="btn btn-primary btn-pilih" data-id="' . $row_produk['id'] . '">Pilih</button>';
                                                                        echo '</td>';
                                                                        echo '</tr>';
                                                                        $count++;
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">

                                                    <div class="card-header">
                                                        <div class="form-group">
                                                            <label for="id_customer">Nama Customer:</label>
                                                            <select class="form-control" id="id_customer"
                                                                name="id_customer">
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
                                                            <label for="metode_pembayaran">Metode
                                                                Pembayaran:</label>
                                                            <select class="form-control" id="metode_pembayaran"
                                                                name="metode_pembayaran">
                                                                <option value="Cash">Cash</option>
                                                                <option value="Transfer">Transfer</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status_transaksi">Status
                                                                Transaksi:</label>
                                                            <select class="form-control" id="status_transaksi"
                                                                name="status_transaksi">
                                                                <option value="Lunas">Lunas</option>
                                                                <option value="Belum Lunas">Belum Lunas</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <div class="card">
                                            <div class="card-header">
                                                Keranjang Belanja
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Produk</th>
                                                            <th>Harga</th>
                                                            <th>Jumlah</th>
                                                            <th>Subtotal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Cek apakah keranjang belanja sudah ada di session
                                                        if (isset($_SESSION['keranjang'])) {
                                                            // Looping setiap produk di keranjang belanja
                                                            foreach ($_SESSION['keranjang'] as $idProduk => $jumlahBeli) {
                                                                // Kode untuk mengambil data produk dari database berdasarkan ID produk
                                                                $query_produk = "SELECT * FROM tb_produk WHERE id = $idProduk";
                                                                $result_produk = mysqli_query($mysqli, $query_produk);
                                                                $row_produk = mysqli_fetch_assoc($result_produk);
                                                                $namaProduk = $row_produk['nama_produk'];
                                                                $hargaProduk = $row_produk['harga'];

                                                                // Hitung subtotal harga produk
                                                                $subtotalHarga = $hargaProduk * $jumlahBeli;
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $namaProduk; ?>
                                                                    </td>
                                                                    <td>Rp
                                                                        <?php echo $hargaProduk; ?>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number"
                                                                            name="jumlah_produk[<?php echo $idProduk; ?>]"
                                                                            value="<?php echo $jumlahBeli; ?>">
                                                                        </input>
                                                                    </td>
                                                                    <td>Rp
                                                                        <?php echo $subtotalHarga; ?>
                                                                    </td>
                                                                    <td>
                                                                        <form action="hapus_produk.php" method="post">
                                                                            <input type="hidden" name="id_produk"
                                                                                value="<?php echo $idProduk; ?>">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm">Hapus</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="5">Keranjang belanja kosong</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3" class="text-right">Total Harga:
                                                            </td>
                                                            <td colspan="2">Rp

                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Tambah
                                            Transaksi</button>
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
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

    <!--Script untuk pencarian-->
    <script>
        $(document).ready(function () {
            $('#searchInput').on('input', function () {
                var searchText = $(this).val().toLowerCase();
                $('#example2 tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
                });
            });
        });
    </script>
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