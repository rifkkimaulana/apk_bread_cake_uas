<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config/config.php");
include('session.php');

// Dapatkan keranjang belanja dari session
$cart = $_SESSION['cart'];

// Dapatkan data dari form
$no_faktur = $_POST['no_faktur'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$id_customer = $_POST['id_customer'];
$tanggal_penjualan = date('Y-m-d H:i:s');

echo $no_faktur;
echo $jumlah_bayar;
echo $metode_pembayaran;
echo $id_customer;
echo $tanggal_penjualan;

// Hitung total harga berdasarkan item-item dalam keranjang belanja
$total_harga = 0;
foreach ($cart as $item) {
    $subtotal = $item['jumlah_beli'] * $item['harga'];
    $total_harga += $subtotal;
}

// Lakukan proses penyimpanan data penjualan ke dalam tabel tb_penjualan
$query_insert_penjualan = "INSERT INTO tb_penjualan (no_faktur, tanggal_penjualan, id_customer, total_harga, metode_pembayaran)
    VALUES ('$no_faktur', '$tanggal_penjualan', $id_customer, $total_harga, '$metode_pembayaran')";
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
    $id_produk = $item['id'];
    $jumlah_terjual = $item['jumlah_beli'];
    $harga_jual = $item['harga'];
    $total_harga_item = $jumlah_terjual * $harga_jual;

    // Tambahkan total harga dari semua item
    $total_harga += $total_harga_item;

    $query_insert_detail_penjualan = "INSERT INTO tb_detail_penjualan (no_faktur, id_produk, jumlah_terjual, harga_jual, total_harga)
        VALUES ('$no_faktur', '$id_produk', $jumlah_terjual, $harga_jual, $total_harga_item)";
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
$query_insert_pembayaran = "INSERT INTO tb_pembayaran (no_faktur, tanggal_pembayaran, jumlah_bayar, metode_pembayaran)
    VALUES ('$no_faktur', '$tanggal_penjualan', $jumlah_bayar, '$metode_pembayaran')";
$result_insert_pembayaran = mysqli_query($mysqli, $query_insert_pembayaran);

if ($result_insert_pembayaran === false) {
    echo "Error: " . mysqli_error($mysqli);
    exit();
}

// Langkah 5: Hapus semua item dari keranjang belanja
unset($_SESSION['cart']);
header("Location:../dashboard.php?page=transaksi");
?>