<?php

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $isi1 = $_POST['isi1'];
    $isi2 = $_POST['isi2'];

    // Memeriksa apakah ada file gambar yang diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];

        // Memeriksa tipe file
        $allowedTypes = array('image/jpeg', 'image/png');
        $fileType = $file['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file yang diunggah tidak didukung. Harap unggah file JPG atau PNG.";
            exit;
        }

        // Mengambil informasi file yang diunggah
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // Menggunakan direktori tujuan penyimpanan file
        $uploadDir = 'about/image/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Memindahkan file ke direktori tujuan
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueFileName = 'upload_' . date('YmdHis') . '_';
        $upload = ($uniqueFileName . $fileName);
        $uploaddb = ($uniqueFileName . $fileName);
        if (move_uploaded_file($fileTmpName, $uploadDir . $upload)) {
            // Melakukan query UPDATE setelah file berhasil diunggah
            // Menghapus gambar lama jika ada
            $query_about = mysqli_query($mysqli, "SELECT * FROM tb_about WHERE id='$id'");
            $data = mysqli_fetch_array($query_about);
            $row_gambar = $data['image'];

            if (!empty($fileName) && $fileName !== $row_gambar) {
                $oldImagePath = $uploadDir . $row_gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($mysqli, "UPDATE tb_about SET isi1='$isi1', isi2='$isi2', image='$uploaddb' WHERE id='$id'");

            if ($result) {

            } else {
            }
        } else {
            echo "<script>alert('Gagal mengunggah file!');</script>";

        }
    } else {
        $result = mysqli_query($mysqli, "UPDATE tb_about SET isi1='$isi1', isi2='$isi2' WHERE id='$id'");

        if ($result) {

        } else {

        }
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data About</h3>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <?php
                        $id = 1; // ID yang diarahkan ke tb_about 1
                        $about = mysqli_query($mysqli, "SELECT * FROM tb_about WHERE id='$id'");
                        $data = mysqli_fetch_array($about);
                        ?>

                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <div class="form-group">
                            <label for="isi1">Isi Pertama</label>
                            <textarea type="text" class="form-control" name="isi1"
                                required><?= $data['isi1'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="isi2">Isi Kedua</label>
                            <textarea type="text" class="form-control" name="isi2"
                                required><?= $data['isi2'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <br>
                            <?php
                            $gambar = $data['image'];
                            if (!empty($gambar) && file_exists("about/image/" . $gambar)) {
                                echo "<img src='about/image/$gambar' alt='Gambar' style='max-width: 200px; max-height: 200px;'>";
                            } else {
                                echo "Gambar tidak tersedia";
                            }
                            ?>
                            <br>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" name="update">Simpan</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>