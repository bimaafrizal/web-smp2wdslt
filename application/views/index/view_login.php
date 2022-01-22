<!DOCTYPE html>
<html lang="en">
<?php session_destroy() ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/plugins/fontawesome-free/css/all.min.css') ?> ">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>  ">
    <!-- Theme style -->
    <link rel="stylesheet" href=" <?php echo base_url('assets/admin/dist/css/adminlte.min.css'); ?> ">
    <link rel="stylesheet" href=" <?= base_url('assets/css/tooplate-gymso-style.css') ?>">
    <link rel="icon" href="<?= base_url('assets/images/Logo.png') ?>">
</head>

<body class="hold-transition login-page">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.html">
                <img src=" <?= base_url('assets/images/Logo.png') ?> " alt="" width="55px" height="55px" class="d-inline-block align-text-top mt-10"> SPENDAWALI
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <div class="nav-item">
                        <a class="navbar-brand" href="#">

                        </a>
                    </div>
                    <li class="nav-item">
                        <a href=" <?= base_url('Login/index') ?>#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href=" <?= base_url('Login/index') ?>#about" class="nav-link smoothScroll">Visi Misi</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('Login/index') ?>#class" class="nav-link smoothScroll">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a href=" <?= base_url('Login/index') ?>#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Sekolah</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="<?= base_url('Login/dataguru'); ?>">Data Guru</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('Login/datasiswa'); ?>">Data Siswa</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Login/index_login') ?>" class="nav-link smoothScroll">LOGIN</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login untuk manajemen website</p>
                <?php echo $this->session->flashdata('message'); ?>

                <form action="<?= base_url('login/proses_login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="user" id="user" placeholder="Email">
                        <?php echo form_error('user', '<p>', '</p>') ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <?php echo form_error('password', '<p>', '</p>') ?>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src=" <?= base_url('assets/admin/plugins/jquery/jquery.min.js') ?> "></script>
    <!-- Bootstrap 4 -->
    <script src=" <?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>
    <!-- AdminLTE App -->
    <script src=" <?= base_url('assets/admin/dist/js/adminlte.min.js') ?> "></script>
</body>

</html>