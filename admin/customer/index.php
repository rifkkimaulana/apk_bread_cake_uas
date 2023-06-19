<?php
include_once("../config/config.php");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Customer</h3>
                        <div class="card-tools">
                            <a href='customer/create.php?page=customer' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah
                                Customer</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Telpon</th>
                                <th>Email</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_customer ORDER BY id DESC");
                            if (mysqli_num_rows($result) > 0) {
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
                                            <?= $data['alamat'] ?>
                                        </td>
                                        <td>
                                            <?= $data['telpon'] ?>
                                        </td>
                                        <td>
                                            <?= $data['email'] ?>
                                        </td>
                                        <td>
                                            <?= $data['create_time'] ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href='users/update.php?id=<?= $data['id'] ?>&page=users'>Edit</a>
                                            <?php if ($data['username'] != 'admin') { ?>
                                                <a class="btn btn-danger" onclick='return confirmDelete()'
                                                    href='users/delete.php?id=<?= $data['id'] ?>&page=users'>Hapus</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr><td colspan='7'>Tidak ada data customer.</td></tr>";
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>