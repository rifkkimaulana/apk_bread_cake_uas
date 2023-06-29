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
                                    <th>No Transaksi</th>
                                    <th>Customer</th>
                                    <th>Tanggal</th>
                                    <th>Total Bayar</th>
                                    <th>Metode</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT tb_transaksi.*, tb_customer.nama FROM tb_transaksi INNER JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id ORDER BY tb_transaksi.id DESC");

                            if (mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $data['no_transaksi'] ?>
                                            </td>
                                            <td>
                                                <?= $data['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $data['tanggal_transaksi'] ?>
                                            </td>
                                            <td>
                                                <?= $data['total_pembayaran'] ?>
                                            </td>
                                            <td>
                                                <?= $data['metode_pembayaran'] ?>
                                            </td>
                                            <td>
                                                <?= $data['status_transaksi'] ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success"
                                                    href='transaksi/update.php?id=<?= $data['id'] ?>&page=transaksi'>Edit</a>
                                                <a class="btn btn-danger" onclick='return confirmDelete()'
                                                    href='transaksi/delete.php?id=<?= $data['id'] ?>&page=transaksi'>Hapus</a>
                                                <a class="btn btn-primary"
                                                    href='transaksi/detail.php?id=<?= $data['id'] ?>&page=transaksi'>Detail</a>
                                            </td>
                                        </tr>
                                    <tbody>
                                    <?php }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8">Tidak ada data transaksi</td>
                                </tr>
                                <?php } ?>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>