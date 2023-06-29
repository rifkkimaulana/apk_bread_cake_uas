<?php
session_start();

// Dapatkan keranjang belanja dari session
$cart = $_SESSION['cart'];

// Menghapus item dari keranjang belanja berdasarkan ID produk yang dikirimkan
if (isset($_POST['id_produk'])) {
    $product_id = $_POST['id_produk'];
    foreach ($cart as $key => $item) {
        if ($item['id'] === $product_id) {
            unset($cart[$key]);
            break;
        }
    }

    // Simpan kembali keranjang belanja ke dalam session
    $_SESSION['cart'] = $cart;

    // Kirim kembali data keranjang belanja dalam format JSON
    echo json_encode($cart);
    exit();
}

?>