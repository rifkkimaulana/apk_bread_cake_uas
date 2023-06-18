<?php
$base_url = "http://localhost/apk_bread_cake_uas/admin";
$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="dashboard.php" class="brand-link">
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
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=menu"
                        class="nav-link <?php echo ($page == 'menu') ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Data Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=kategori"
                        class="nav-link <?php echo ($page == 'kategori') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Kategori Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=artikel"
                        class="nav-link <?php echo ($page == 'artikel') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Data Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=berita"
                        class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil Toko</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Booking</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>No. Rekening</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chefs</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Events</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimoni</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/dashboard.php?page=berita"
                                class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
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