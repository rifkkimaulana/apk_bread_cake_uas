<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config/config.php");
include('session.php');

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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Penjualan</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="POST" action="">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="product">Produk</label>
                                            <select class="form-control" id="product" name="id_produk">
                                                <?php
                                                $query_produk = "SELECT * FROM tb_produk";
                                                $result_produk = mysqli_query($mysqli, $query_produk);
                                                while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                                                    echo '<option value="' . $row_produk['id'] . '">' . $row_produk['nama_produk'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_beli">Jumlah Beli</label>
                                            <input type="number" class="form-control" id="jumlah_beli"
                                                name="jumlah_beli" value="1" min="1">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Tambah Produk</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-md-8">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Keranjang Belanja</h3>
                                    <button class="btn btn-danger btn-sm float-right" onclick="clearCart()">Hapus
                                        Semua</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php if (count($cart) === 0): ?>
                                        <p>Keranjang belanja kosong.</p>
                                    <?php else: ?>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Subtotal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cartTableBody">
                                                <?php foreach ($cart as $item): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $item['nama_produk']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($item['jumlah_beli'], 0, ',', '.'); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo 'IDR ' . number_format($item['harga'], 2, ',', '.'); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo 'IDR ' . number_format($item['jumlah_beli'] * $item['harga'], 2, ',', '.'); ?>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="removeCartItem(<?php echo $item['id']; ?>)">
                                                                Hapus
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Total Pembelian</th>
                                                    <th>
                                                        <?php echo 'IDR ' . number_format($total_pembelian, 2, ',', '.'); ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Jumlah Bayar</th>
                                                    <td>
                                                        <input type="number" class="form-control" id="jumlah_bayar"
                                                            name="jumlah_bayar" min="0" step="0.01" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Kembali</th>
                                                    <td>
                                                        <span id="kembali"></span>
                                                    </td>
                                                </tr>
                                            </tfoot>



                                        </table>
                                    <?php endif; ?>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" style="display: none;">
                                                <label for="no_faktur">No. Faktur</label>
                                                <input value="<?php echo $next_transaksi_number; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                                <select class="form-control" id="metode_pembayaran"
                                                    name="metode_pembayaran">
                                                    <option value="transfer">Transfer</option>
                                                    <option value="manual">Manual</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="customer">Pembeli</label>
                                                <select class="form-control" id="customer" name="id_customer">
                                                    <?php
                                                    $query_customer = "SELECT * FROM tb_customer";
                                                    $result_customer = mysqli_query($mysqli, $query_customer);
                                                    while ($row_customer = mysqli_fetch_assoc($result_customer)) {
                                                        echo '<option value="' . $row_customer['id'] . '">' . $row_customer['nama'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="proses_penjualan.php" class="btn btn-success float-right">Proses
                                        Penjualan</a>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
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

    <script>
        function removeCartItem(productId) {
            $.ajax({
                url: 'hapus_item.php',
                type: 'POST',
                data: { id_produk: productId },
                success: function (response) {
                    var cartItems = JSON.parse(response);
                    displayCartItems(cartItems);

                    // Refresh halaman setelah item dihapus
                    location.reload();
                },
                error: function () {
                    alert('Terjadi kesalahan saat menghapus item dari keranjang belanja.');
                }
            });
        }
        function clearCart() {
            // Kirim request AJAX ke server untuk menghapus semua item dari keranjang belanja
            $.ajax({
                url: 'hapus_semua_item.php',
                type: 'POST',
                success: function (response) {
                    // Parsing JSON respons dari server
                    var cartItems = JSON.parse(response);

                    // Tampilkan ulang item-item keranjang belanja
                    displayCartItems(cartItems);

                    // Refresh halaman setelah menghapus semua item
                    location.reload();
                },
                error: function () {
                    alert('Terjadi kesalahan saat menghapus semua item dari keranjang belanja.');
                }
            });
        }

        function displayCartItems(cartItems) {
            // Hapus semua item keranjang belanja dari tampilan
            var cartTableBody = document.getElementById('cartTableBody');
            cartTableBody.innerHTML = '';

            // Tambahkan kembali item-item keranjang belanja yang ada
            for (var i = 0; i < cartItems.length; i++) {
                var item = cartItems[i];

                // Buat baris tabel untuk item keranjang belanja
                var row = document.createElement('tr');

                // Tambahkan data produk ke dalam baris tabel
                var productNameCell = document.createElement('td');
                productNameCell.textContent = item.nama_produk;
                row.appendChild(productNameCell);

                var quantityCell = document.createElement('td');
                quantityCell.textContent = item.jumlah_beli;
                row.appendChild(quantityCell);

                var priceCell = document.createElement('td');
                priceCell.textContent = item.harga;
                row.appendChild(priceCell);

                var subtotalCell = document.createElement('td');
                subtotalCell.textContent = item.jumlah_beli * item.harga;
                row.appendChild(subtotalCell);

                // Tambahkan tombol "Hapus" ke dalam baris tabel
                var deleteButtonCell = document.createElement('td');
                var deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-danger btn-sm';
                deleteButton.textContent = 'Hapus';
                deleteButton.addEventListener('click', function () {
                    removeCartItem(item.id);
                });
                deleteButtonCell.appendChild(deleteButton);
                row.appendChild(deleteButtonCell);

                // Tambahkan baris tabel ke dalam tabel keranjang belanja
                cartTableBody.appendChild(row);
            }
        }

        // Fungsi untuk menghitung kembaliannya
        function hitungKembali() {
            var totalPembelian = <?php echo $total_pembelian; ?>;
            var jumlahBayar = parseFloat(document.getElementById('jumlah_bayar').value);
            var kembali = jumlahBayar - totalPembelian;

            // Tampilkan kembaliannya
            document.getElementById('kembali').textContent = formatCurrency(kembali);
        }

        // Panggil fungsi hitungKembali() ketika jumlah bayar berubah
        document.getElementById('jumlah_bayar').addEventListener('input', hitungKembali);

        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }

    </script>




</body>

</html>