<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Welcome</title>

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
    <link rel="icon" href="<?= base_url('assets/images/Logo.png') ?>">
</head>

<body class="py-4">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <?php if ($_SESSION['peran'] == 1) { ?>
                        <h3 class="card-title">Selamat Datang Mode Super Admin</h3>
                    <?php } else { ?>
                        <h3 class="card-title">Selamat Datang Mode Admin</h3>
                    <?php } ?>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <?php if ($_SESSION['peran'] == 1) { ?>
                    <div class="card-body">
                        Ini adalah tempat manajemen website SMP Negeri 2 Wadaslintang
                        <br>
                        Silakan lakukan manajemen user dan website
                    </div>
                <?php } else { ?>
                    <div class="card-body">
                        Ini adalah tempat manajemen website SMP Negeri 2 Wadaslintang
                        <br>
                        Silakan lakukan manajemen berita dan data website sekolah
                    </div>
                <?php } ?>

                <!-- /.card-body -->
                <div class="card-footer">
                    <strong>Copyright &copy; 2021 SMP Negeri 2 Wadaslintang</strong>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
</body>

</html>