<?php
include_once("../config/config.php");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Gallery</h3>
                        <div class="card-tools">
                            <a href='gallery/create.php?page=gallery' class="btn btn-info"><i class="fas fa-plus"></i>Tambah Gallery</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_gallery ORDER BY id DESC");
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $data['keterangan'] ?>
                                        </td>
                                        <td><img src="about/image/<?= $data['image'] ?>" width="100"></td>
                                        <td class="text-center">
                                            <a class="btn btn-success" href='gallery/update.php?id=<?= $data['id'] ?>&page=gallery'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='gallery/delete.php?id=<?= $data['id'] ?>&page=gallery'>Hapus</a>
                                        </td>
                                    <?php } ?>
                                    </td>
                                    </tr>
                                </tbody>
                                <?php ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>