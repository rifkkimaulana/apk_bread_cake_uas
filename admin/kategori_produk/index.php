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
                        <h3 class="card-title">Data Kategori</h3>
                        <div class="card-tools">
                            <a href='kategori_produk/create.php?page=kategori_produk' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah kategori</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_kategori_produk ORDER BY id DESC");

                            while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $data['kategori_produk'] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success"
                                            href='kategori_produk/update.php?id=<?= $data['id'] ?>&page=kategori_produk'>Edit</a>
                                        <a class="btn btn-danger" onclick='return confirmDelete()'
                                            href='kategori_produk/delete.php?id=<?= $data['id'] ?>&page=kategori_produk'>Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>