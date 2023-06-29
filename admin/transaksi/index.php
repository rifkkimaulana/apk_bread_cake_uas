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
                                    <th>No Faktur</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Customer</th>
                                    <th>Total Bayar</th>
                                    <th>Metode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $query = "SELECT p.no_faktur, p.tanggal_penjualan, c.nama_customer, p.total_bayar, p.metode
                                      FROM tb_penjualan p
                                      JOIN tb_customer c ON p.id_customer = c.id_customer";

                            $result = mysqli_query($mysqli, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['no_faktur']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['tanggal_penjualan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama_customer']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['total_bayar']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['metode']; ?>
                                        </td>
                                        <td><!-- Tambahkan aksi sesuai kebutuhan --></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <tr>
                                <td colspan="6">Tidak ada data transaksi</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>