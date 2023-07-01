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
                        <h3 class="card-title">Data Kategori Artikel</h3>
                        <div class="card-tools">
                            <a href='kategori_artikel/create.php?page=kategori_artikel' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah kategori</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id='example2' class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Kategori</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_kategori_artikel ORDER BY id DESC");

                            while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $data['kategori_artikel'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href='kategori_artikel/update.php?id=<?= $data['id'] ?>&page=kategori_artikel'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()'
                                                href='kategori_artikel/delete.php?id=<?= $data['id'] ?>&page=kategori_artikel'>Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>