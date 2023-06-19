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
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT tb_produk.*, tb_kategori_produk.kategori_produk
                                    FROM tb_produk
                                    INNER JOIN tb_kategori_produk ON tb_produk.kategori_id = tb_kategori_produk.id
                                    ORDER BY id DESC");
                            while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_produk'] ?>
                                    </td>
                                    <td>
                                        <?= $data['kategori_produk'] ?>
                                    </td>
                                    <td>
                                        <?= $data['deskripsi'] ?>
                                    </td>
                                    <td>
                                        <?= $data['harga'] ?>
                                    </td>
                                    <td>
                                        <?= $data['stok'] ?>
                                    </td>
                                    <td>
                                        <?= $data['Gambar'] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success"
                                            href='produk/update.php?id=<?= $data['id'] ?>&page=produk'>Edit</a>
                                        <a class="btn btn-danger" onclick='return confirmDelete()'
                                            href='produk/delete.php?id=<?= $data['id'] ?>&page=produk'>Hapus</a>
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