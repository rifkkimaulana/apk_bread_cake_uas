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
                        <h3 class="card-title">Data Produk</h3>
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='produk/create.php?page=produk' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah Produk</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                            </tr>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT tb_artikel.*,
                            tb_kategori.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_artikel
                            INNER JOIN tb_kategori ON tb_artikel.id_kategori = tb_kategori.id
                            INNER JOIN tb_users ON tb_artikel.user_id = tb_users.id
                            ORDER BY id DESC");
                            while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $data['Nama Produk'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_kategori'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_operator'] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success"
                                            href='artikel/edit.php?id=<?= $data['id'] ?>&page=artikel'>Edit</a>
                                        <a class="btn btn-danger" onclick='return confirmDelete()'
                                            href='artikel/delete.php?id=<?= $data['id'] ?>&page=artikel'>Hapus</a>
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