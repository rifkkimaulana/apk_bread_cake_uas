<?php
session_start();

if (isset($_GET['id']) && isset($_GET['nama']) && isset($_GET['harga']) && isset($_GET['jumlah_beli'])) {
    $id = $_GET['id'];
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $jumlah_beli = $_GET['jumlah_beli'];

    // Create a new item array
    $item = array(
        'id' => $id,
        'nama_produk' => $nama,
        'harga_satuan' => $harga,
        'jumlah_beli' => $jumlah_beli,
        'jumlah' => $harga
    );

    // Check if the shopping cart session exists
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = array();
    }

    // Check if the item is already in the shopping cart
    $index = -1;
    foreach ($_SESSION['keranjang'] as $key => $value) {
        if ($value['id'] == $id) {
            $index = $key;
            break;
        }
    }

    // Add the item to the shopping cart or update the quantity
    if ($index === -1) {
        array_push($_SESSION['keranjang'], $item);
    } else {
        $_SESSION['keranjang'][$index]['jumlah_beli']++;
        $_SESSION['keranjang'][$index]['jumlah'] = $_SESSION['keranjang'][$index]['jumlah_beli'] * $_SESSION['keranjang'][$index]['harga_satuan'];
    }
}
?>