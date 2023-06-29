<?php
session_start();
// Hapus semua item dari keranjang belanja
$_SESSION['cart'] = [];

// Kembalikan keranjang belanja kosong ke client
echo json_encode($_SESSION['cart']);
?>