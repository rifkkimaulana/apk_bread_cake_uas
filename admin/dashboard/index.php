<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../config/config.php");
include('session.php');

$kategori = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_kategori_produk');
$row_kategori = mysqli_fetch_assoc($kategori);

$produk = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_produk');
$row_produk = mysqli_fetch_assoc($produk);

$users = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_users');
$row_users = mysqli_fetch_assoc($users);

$customer = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_customer');
$row_customer = mysqli_fetch_assoc($customer);

$produk = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_produk');
$row_produk = mysqli_fetch_assoc($produk);

$transaksi = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_penjualan');
$row_transaksi = mysqli_fetch_assoc($transaksi);
?>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            <?= $row_users['jml'] ?>
                        </h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=users" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            <?= $row_customer['jml'] ?>
                        </h3>
                        <p>Customer</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=customer" class="small-box-footer">Selengkapnya
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            <?= $row_produk['jml'] ?><sup style="font-size: 20px"></sup>
                        </h3>
                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=produk" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>
                            <?= $row_kategori['jml'] ?>
                        </h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=kategori_produk" class="small-box-footer">Selengkapnya
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            <?= $row_produk['jml'] ?>
                        </h3>
                        <p>Data Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=produk" class="small-box-footer">Selengkapnya
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>
                            <?= $row_transaksi['jml'] ?>
                        </h3>
                        <p>Data Penjualan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=transaksi" class="small-box-footer">Selengkapnya
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>