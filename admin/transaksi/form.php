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
                        <label for="no_faktur">No. Faktur</label>
                        <input class="form-control" value="<?php echo $next_transaksi_number; ?>" readonly>
                    </div>
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
                        <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" value="1" min="1">
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
    <!-- /.col-md-4 -->
    <!--start /.col-md-8-->
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Keranjang Belanja</h3>
                <button class="btn btn-danger btn-sm float-right" onclick="clearCart()">Hapus
                    Semua</button>
            </div>
            <form role="form" method="POST" action="proses_penjualan.php">
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
                                        <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar"
                                            min="0" step="0.01" required>
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
                                <input name="no_faktur" class="form-control"
                                    value="<?php echo $next_transaksi_number; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
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
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success float-right">Proses
                            Penjualan</button>
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
</div>