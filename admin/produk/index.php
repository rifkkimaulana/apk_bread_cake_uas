<?php include_once("../config/config.php"); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Produk</h3>
                        <div class="card-tools">
                            <a href='produk/create.php?page=produk' class="btn btn-info">
                                <i class="fas fa-plus"></i> Tambah Produk
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT tb_produk.*, tb_kategori_produk.kategori_produk
                                              FROM tb_produk
                                              INNER JOIN tb_kategori_produk ON tb_produk.id_kategori = tb_kategori_produk.id
                                              ORDER BY tb_produk.id DESC";

                                    $result = mysqli_query($mysqli, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;

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
                                                <td>Rp
                                                    <?= number_format($data['harga'], 0, ',', '.') ?>
                                                </td>
                                                <td>
                                                    <?= $data['stok'] ?>
                                                </td>
                                                <td><img src="produk/image/<?= $data['image'] ?>" width="100"></td>
                                                <td>
                                                    <a class="btn btn-success"
                                                        href='produk/update.php?id=<?= $data['id'] ?>&page=produk'>Edit</a>
                                                    <a class="btn btn-danger" onclick='return confirmDelete()'
                                                        href='produk/delete.php?id=<?= $data['id'] ?>&page=produk'>Hapus</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                    <tr>
                                        <td colspan="8">Tidak ada data produk.</td>
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
</div>