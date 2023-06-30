<?php
include_once("../config/config.php");
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Transaksi</h3>
                        <div class="card-tools">
                            <a href='transaksi/create.php?page=transaksi' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah Transaksi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id='example2' class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Nama Customer</th>
                                    <th>Produk</th>
                                    <th>Total Bayar</th>
                                    <th>Metode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; // Inisialisasi variabel nomor
                                $query = "SELECT p.id_penjualan, p.no_faktur, p.tanggal_penjualan, c.nama, pr.nama_produk, p.total_harga, p.metode_pembayaran
              FROM tb_penjualan p
              JOIN tb_customer c ON p.id_customer = c.id
              JOIN tb_detail_penjualan dp ON p.no_faktur = dp.no_faktur
              JOIN tb_produk pr ON dp.id_produk = pr.id";
                                $result = mysqli_query($mysqli, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <tr>
                                            <td>
                                                <?php echo $no; ?> <!-- Menampilkan nomor -->
                                            </td>
                                            <td>
                                                <?php echo $row['no_faktur']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['tanggal_penjualan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nama_produk']; ?>
                                            </td>
                                            <td>
                                                <?php echo 'IDR ' . number_format($row['total_harga'], 2, ',', '.'); ?>
                                            </td>

                                            <td>
                                                <?php echo $row['metode_pembayaran']; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger" onclick='return confirmDelete()'
                                                    href='transaksi/delete.php?no_faktur=<?= $row['no_faktur'] ?>&page=transaksi'>Hapus</a>

                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                } else {
                                    ?>
                                <tr>
                                    <td colspan="7">Tidak ada data transaksi</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>