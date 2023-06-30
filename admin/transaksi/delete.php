<?php
include_once("../../config/config.php");
include('session.php');

$no_faktur = @$_GET['no_faktur'];

// Hapus data detail penjualan
$result_detail = mysqli_query($mysqli, "DELETE FROM tb_detail_penjualan WHERE no_faktur='$no_faktur'");

// Hapus data pembayaran
$result_pembayaran = mysqli_query($mysqli, "DELETE FROM tb_pembayaran WHERE no_faktur='$no_faktur'");

// Hapus data penjualan
$result_penjualan = mysqli_query($mysqli, "DELETE FROM tb_penjualan WHERE no_faktur='$no_faktur'");

if ($result_detail && $result_pembayaran && $result_penjualan) {
    // Redirect ke halaman dashboard
    header("Location:../dashboard.php?page=transaksi");
} else {
    // Handle kesalahan jika gagal menghapus data
    echo "Error: " . mysqli_error($mysqli);
    exit();
}
?>