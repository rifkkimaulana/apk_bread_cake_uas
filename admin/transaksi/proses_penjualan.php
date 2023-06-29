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

// Dapatkan keranjang belanja dari session
$cart = $_SESSION['cart'];

// Dapatkan data dari form
$no_faktur = $next_transaksi_number;
$jumlah_bayar = $_POST['jumlah_bayar'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$id_customer = $_POST['id_customer'];
$tanggal_penjualan = date('Y-m-d H:i:s');

// Lakukan proses penyimpanan data penjualan ke dalam tabel tb_penjualan
$query_insert_penjualan = "INSERT INTO tb_penjualan (no_faktur, tanggal_penjualan, id_customer, total_harga, metode_pembayaran) VALUES ('$no_faktur', '$tanggal_penjualan', $id_customer, 0, '$metode_pembayaran')";
$result_insert_penjualan = mysqli_query($mysqli, $query_insert_penjualan);

if ($result_insert_penjualan === false) {
    echo "Error: " . mysqli_error($mysqli);
    exit();
}

// Dapatkan ID penjualan yang baru saja disimpan
$id_penjualan = mysqli_insert_id($mysqli);

// Langkah 2: Simpan detail penjualan ke dalam tabel tb_detail_penjualan
$total_harga = 0;
foreach ($cart as $item) {
    $sku = $item['id_produk'];
    $jumlah_terjual = $item['jumlah_beli'];
    $harga_jual = $item['harga'];
    $total_harga_item = $jumlah_terjual * $harga_jual;

    // Tambahkan total harga dari semua item
    $total_harga += $total_harga_item;

    $query_insert_detail_penjualan = "INSERT INTO tb_detail_penjualan (no_faktur, sku, jumlah_terjual, harga_jual, total_harga) VALUES ('$no_faktur', '$sku', $jumlah_terjual, $harga_jual, $total_harga_item)";
    $result_insert_detail_penjualan = mysqli_query($mysqli, $query_insert_detail_penjualan);

    if ($result_insert_detail_penjualan === false) {
        echo "Error: " . mysqli_error($mysqli);
        exit();
    }
}

// Langkah 3: Update total harga pada tabel tb_penjualan
$query_update_penjualan = "UPDATE tb_penjualan SET total_harga = $total_harga WHERE no_faktur = '$no_faktur'";
$result_update_penjualan = mysqli_query($mysqli, $query_update_penjualan);

if ($result_update_penjualan === false) {
    echo "Error: " . mysqli_error($mysqli);
    exit();
}

// Langkah 4: Simpan data pembayaran ke dalam tabel tb_pembayaran
$query_insert_pembayaran = "INSERT INTO tb_pembayaran (no_faktur, tanggal_pembayaran, jumlah_bayar, metode_pembayaran) VALUES ('$no_faktur', '$tanggal_penjualan', $jumlah_bayar, '$metode_pembayaran')";
$result_insert_pembayaran = mysqli_query($mysqli, $query_insert_pembayaran);

if ($result_insert_pembayaran === false) {
    echo "Error: " . mysqli_error($mysqli);
    exit();
}

// Langkah 5: Hapus semua item dari keranjang belanja
unset($_SESSION['cart']);

// Redirect ke halaman sukses atau halaman lainnya
header('Location: index.php');
exit();
?>