<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Akun</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('Zone_SUAdmin/proses_edit_menu') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_menu">Nama Menu</label>
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Nama menu" value="<?= $nama_menu ?>">
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="url...." value="<?= $url ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" value="<?= $icon ?>">
                            <p>Icon bisa didapat di <a href="https://fontawesome.com/">Font Awesome</a> </p>
                        </div>
                        <div class="form-group" disabled>
                            <label for="peran">Peran: </label>
                            <input type="text" class="form-control" id="peran" name="peran" placeholder="peran" value="<?php if ($peran) {
                                                                                                                            echo "Super Admin";
                                                                                                                        } else {
                                                                                                                            echo "Admin";
                                                                                                                        } ?>" disabled>

                        </div>
                        <?php echo $this->session->flashdata('message'); ?>
                        <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" />
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->