<?php
include_once("../config/config.php");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Profil Toko</h3>
                        <div class="card-tools">
                            <a href="profil_toko/create.php?page=profil_toko" class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah Profil Toko</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Pekerjaan</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $result = mysqli_query($mysqli, "SELECT * FROM tb_profil ORDER BY id DESC");
                                    while ($data = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $data['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $data['deskripsi'] ?>
                                            </td>
                                            <td>
                                                <?= $data['pekerjaan'] ?>
                                            </td>
                                            <td class="text-center"><img src="profil_toko/image/<?= $data['image'] ?>"
                                                    width="100"></td>
                                            <td class="text-center">
                                                <a class="btn btn-success"
                                                    href="profil_toko/update.php?id=<?= $data['id'] ?>&page=profil_toko">Edit</a>
                                                <a class="btn btn-danger" onclick="return confirmDelete()"
                                                    href="profil_toko/delete.php?id=<?= $data['id'] ?>&page=profil_toko">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus?");
    }
</script>