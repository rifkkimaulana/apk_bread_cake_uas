<?php
include_once("../config/config.php");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data About</h3>
                        <div class="card-tools">
                            <a href='about/create.php?page=about' class="btn btn-info"><i class="fas fa-plus"></i>Tambah About</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Isi Pertama</th>
                                    <th>Isi Kedua</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_about ORDER BY id DESC");
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $data['isi1'] ?>
                                        </td>
                                        <td>
                                            <?= $data['isi2'] ?>
                                        </td>
                                        <td><img src="about/image/<?= $data['image'] ?>" width="100"></td>
                                        <td class="text-center">
                                            <a class="btn btn-success" href='about/update.php?id=<?= $data['id'] ?>&page=about'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='about/delete.php?id=<?= $data['id'] ?>&page=about'>Hapus</a>
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