<?php
$base_url = "http://localhost/apk_bread_cake_uas/admin";
$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= $base_url ?>/dashboard.php" class="brand-link">
        <span class="brand-text font-weight-light"><b>ADMIN DASHBOARD</b></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'GUEST'; ?>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=dashboard"
                        class="nav-link <?php echo ($page == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=users"
                        class="nav-link <?php echo ($page == 'users') ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=customer"
                        class="nav-link <?php echo ($page == 'customer') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=produk"
                        class="nav-link <?php echo ($page == 'produk') ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Data Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=kategori_produk"
                        class="nav-link <?php echo ($page == 'kategori_produk') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Kategori Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=transaksi"
                        class="nav-link <?php echo ($page == 'transaksi') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Data Transaksi
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview <?php echo ($page == 'profil_toko' || $page == 'booking' || $page == 'no_rekening' || $page == 'gallery' || $page == 'chefs' || $page == 'events' || $page == 'testimoni' || $page == 'about') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Pengaturan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=profil_toko"
                                class="nav-link <?php echo ($page == 'profil_toko') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil Toko</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=booking"
                                class="nav-link <?php echo ($page == 'booking') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=no_rekening"
                                class="nav-link <?php echo ($page == 'no_rekening') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>No. Rekening</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=gallery"
                                class="nav-link <?php echo ($page == 'gallery') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=chefs"
                                class="nav-link <?php echo ($page == 'chefs') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chefs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=events"
                                class="nav-link <?php echo ($page == 'events') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=testimoni"
                                class="nav-link <?php echo ($page == 'testimoni') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimoni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=about"
                                class="nav-link <?php echo ($page == 'about') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="<?= $base_url ?>/logout.php" class="nav-link"
                        onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>