<?php if ($this->session->userdata('peran') == 2) {
    redirect(base_url('Zone_SUAdmin/welcome'));
}
if (empty($this->session->userdata('peran'))) {
    redirect(base_url('login/index_login'));
}
if ($this->session->userdata('peran') == 1) { ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">

        <link rel="canonical" href=" <?= base_url('https://getbootstrap.com/docs/5.1/examples/grid/')  ?>">
        <!-- Bootstrap core CSS -->
        <link href="<?= base_url('assets/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Required datatable js -->
        <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="<?= base_url('assets/css/grid.css') ?>" rel="stylesheet">
    </head>

    <body class="py-4">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md">
                            <h1>List Menu</h1>
                            <p class="lead">Ini adalah daftar menu yang tersedia.</p>
                            <p>Silakan lakukan manajemen menu yang ada dalam list di bawah ini</p>
                            <?php if ($this->session->flashdata('message')) {
                                echo $this->session->flashdata('message');
                                unset($_SESSION['message']);
                            } ?>
                            <div class="row mb-3">
                            </div>
                            <div class="row mb-3">
                                <div class="col-1 themed-grid-col">#</div>
                                <div class="col-3 themed-grid-col">Nama Menu</div>
                                <div class="col-3 themed-grid-col">url</div>
                                <div class="col-1 themed-grid-col">Icon</div>
                                <div class="col-1 themed-grid-col">Peran</div>
                                <div class="col-3 themed-grid-col">AKSI</div>
                            </div>
                            <?php
                            $i = 1;
                            foreach ($datas as $data) {
                            ?>
                                <div class="row mb-3">
                                    <div class="col-1 themed-grid-col"> <?php echo $i++; ?> </div>
                                    <div class="col-3 themed-grid-col text-wrap"> <?php echo $data->nama_menu; ?> </div>
                                    <div class="col-3 themed-grid-col text-wrap"> <?php echo $data->url; ?></div>
                                    <div class="col-1 themed-grid-col text-wrap"> <?php echo $data->icon ?> </div>
                                    <div class="col-1 themed-grid-col text-wrap"> <?php
                                                                                    if ($data->peran == 1) {
                                                                                        echo "Super Admin";
                                                                                    } else {
                                                                                        echo "Admin";
                                                                                    }
                                                                                    ?> </div>
                                    <div class="col-3 themed-grid-col">
                                        <a class="btn btn-warning" href="<?= base_url('Zone_SUAdmin/edit_menu/' . $data->id_menu) ?>" role="button">Edit</a>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </main>
    </body>

    </html>


<?php } else {
    redirect(base_url('login/index_login'));
}
?>