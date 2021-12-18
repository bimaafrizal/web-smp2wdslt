<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src=" <?= base_url('assets/images/Logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <?php
        if ($_SESSION['peran'] == 1) { ?>
            <span class="brand-text font-weight-light">SUPER ADMIN</span>
        <?php  } else { ?>
            <span class="brand-text font-weight-light">ADMIN</span>
        <?php  } ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src=" <?= base_url('assets/admin/dist/img/user2-160x160.jpg') ?> " class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?= $_SESSION['nama_pengguna'] ?> </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header"> Dashboard </li>
                <li class="nav-item">
                    <a href="<?= base_url('Zone_SUAdmin/welcome') ?>" class="nav-link">
                        <i class="fas fa-door-open"></i>
                        <p class="text">Welcome</p>
                    </a>
                </li>
                <?php $peran = $this->session->userdata('peran');
                $queryMenu = "SELECT * FROM `menu` WHERE `peran` = $peran";
                $menus = $this->db->query($queryMenu)->result_array();

                // var_dump($menus);
                // die;
                ?>

                <?php foreach ($menus as $menu) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url($menu['url']); ?>" class="nav-link">
                            <i class="<?= $menu['icon']; ?>"></i>
                            <p class="text"><?= $menu['nama_menu']; ?></p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?= base_url('Login/logout') ?>" class="nav-link" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                        <i class="fas fa-sign-in-alt"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>