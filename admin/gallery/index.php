<?php
include_once("../config/config.php");

$result = mysqli_query($mysqli, "SELECT * FROM tb_gallery ORDER BY id DESC");
$numRows = mysqli_num_rows($result);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Gallery</h3>
                        <div class="card-tools">
                            <a href='gallery/create.php?page=gallery' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah Gallery</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($numRows > 0) {
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td class="text-center"><img src="gallery/image/<?= $data['image'] ?>" width="200">
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-success"
                                                    href='gallery/update.php?id=<?= $data['id'] ?>&page=gallery'>Edit</a>
                                                <a class="btn btn-danger" onclick='return confirmDelete()'
                                                    href='gallery/delete.php?id=<?= $data['id'] ?>&page=gallery'>Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No entries found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($numRows > 0): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>