<?php
include_once("../config/config.php");

$pesan = '';


// Fetch data from tb_setting
$settingId = 1; // Change the ID according to your needs
$settingResult = $mysqli->query("SELECT * FROM tb_setting WHERE id = $settingId");
$settingData = $settingResult->fetch_assoc();

// Handle form submission for tab "Setting"
if (isset($_POST['submit_setting'])) {
    // Extract values from the form
    $namaPerusahaan = $_POST['post_namaperusahaan'];
    $alamat1 = $_POST['post_alamat1'];
    $alamat2 = $_POST['post_alamat2'];
    $linkAlamat = $_POST['post_linkalamat'];
    $telpon = $_POST['post_telpon'];
    $email = $_POST['post_email'];
    $jamBuka = $_POST['post_dateopen'];
    $jamTutup = $_POST['post_dateclose'];

    // Perform update query for tab "Setting"
    $updateSettingQuery = "UPDATE tb_setting SET
        nama_perusahaan = '$namaPerusahaan',
        alamat1 = '$alamat1',
        alamat2 = '$alamat2',
        link_alamat = '$linkAlamat',
        telpon = '$telpon',
        email = '$email',
        open_operasional = '$jamBuka',
        close_operasional = '$jamTutup'
        WHERE id = $settingId";
    $mysqli->query($updateSettingQuery);

    $pesan = 'Data berhasil disimpan!';

}

// Handle form submission for tab "Medsos"
if (isset($_POST['submit_medsos'])) {
    // Extract values from the form
    $twitter = $_POST['post_tw'];
    $facebook = $_POST['post_fb'];
    $instagram = $_POST['post_ig'];
    $linkedin = $_POST['post_sd'];

    // Perform update query for tab "Medsos"
    $updateMedsosQuery = "UPDATE tb_setting SET
        link_twetter = '$twitter',
        link_facebook = '$facebook',
        link_instagram = '$instagram',
        link_linkedin = '$linkedin'
        WHERE id = $settingId";
    $mysqli->query($updateMedsosQuery);

    $pesan = 'Data berhasil disimpan!';
}
?>
<?php if (!empty($pesan)): ?>
    <div id="notification" class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $pesan; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        // Menghilangkan notifikasi setelah 1 detik
        setTimeout(function () {
            document.getElementById('notification').style.display = 'none';
        }, 2000);
    </script>
<?php endif; ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ketentuan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Ketentuan</strong>
                        <hr>
                        <p>Silahkan ubah tab di atas untuk mengubah link sosmed.</p>
                        <hr>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#tab_setting"
                                    data-toggle="tab">Setting</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_medsos" data-toggle="tab">Medsos</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_setting">
                                <form method="post" class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_namaperusahaan"
                                                value="<?php echo $settingData['nama_perusahaan']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat 1</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_alamat1"
                                                value="<?php echo $settingData['alamat1']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat 2</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_alamat2"
                                                value="<?php echo $settingData['alamat2']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Link Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_linkalamat"
                                                value="<?php echo $settingData['link_alamat']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Telpon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_telpon"
                                                value="<?php echo $settingData['telpon']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="post_email"
                                                value="<?php echo $settingData['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jam Buka</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_dateopen"
                                                value="<?php echo $settingData['open_operasional']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jam Tutup</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_dateclose"
                                                value="<?php echo $settingData['close_operasional']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" name="submit_setting"
                                                class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_medsos">
                                <form method="post" class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Twitter</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_tw"
                                                value="<?php echo $settingData['link_twetter']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_fb"
                                                value="<?php echo $settingData['link_facebook']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_ig"
                                                value="<?php echo $settingData['link_instagram']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Linkedin</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_sd"
                                                value="<?php echo $settingData['link_linkedin']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" name="submit_medsos"
                                                class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</body>

</html>