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