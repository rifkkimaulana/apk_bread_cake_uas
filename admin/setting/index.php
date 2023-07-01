<?php
include_once("../config/config.php");
?>
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
                        <p class="text-muted">Nama Perusahaan: Isikan dengan nama lengkap perusahaan Anda.
                        </p>
                        <p class="text-muted">Alamat 1: Isikan dengan alamat utama perusahaan Anda.
                        </p>
                        <p class="text-muted"> Alamat 2: Isikan dengan alamat tambahan perusahaan Anda (jika ada).
                        </p>
                        <p class="text-muted">Link Alamat: Isikan dengan link atau URL yang mengarah ke peta atau lokasi
                            perusahaan Anda.
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">
                        </p>
                        <p class="text-muted">




                            Telpon: Isikan dengan nomor telepon yang dapat dihubungi perusahaan Anda.
                            Email: Isikan dengan alamat email perusahaan Anda.
                            Jam Buka: Isikan dengan jam operasional perusahaan pada saat buka.
                            Jam Tutup: Isikan dengan jam operasional perusahaan pada saat tutup.
                            Setelah mengisi semua informasi yang diperlukan, klik tombol "Submit" untuk menyimpan
                            perubahan.

                            Sementara itu, pada tab "Medsos", Anda dapat mengisi informasi berikut:

                            Twitter: Isikan dengan username atau alamat profil Twitter perusahaan Anda.
                            Facebook: Isikan dengan username atau alamat profil Facebook perusahaan Anda.
                            Instagram: Isikan dengan username atau alamat profil Instagram perusahaan Anda.
                            Linkedin: Isikan dengan username atau alamat profil LinkedIn perusahaan Anda.
                            Setelah mengisi informasi media sosial yang diperlukan, klik tombol "Submit" untuk menyimpan
                            perubahan.
                        </p>
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
                            <div class="active tab-pane" id="tab_setting">

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_setting">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="post_namaperusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat 1</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="post_alamat1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat 2</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="post_alamat2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Link Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="post_linkalamat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Telpon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="post_telpon">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="post_email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jam Buka</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="post_dateopen">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jam Tutup</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="post_dateclose">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_medsos">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Twitter</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_tw">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_fb">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_ig">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Linkedin</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_sd">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
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