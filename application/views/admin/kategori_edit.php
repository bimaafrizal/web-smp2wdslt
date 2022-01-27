<?php if ($this->session->userdata('peran') == 1) {
    redirect(base_url('Zone_SUAdmin/welcome'));
}
if (empty($this->session->userdata('peran'))) {
    redirect(base_url('login/index_login'));
}
if ($this->session->userdata('peran') == 2) { ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Kategori</h1>
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
                    <form action="<?= base_url('Zone_Admin/proses_edit_kategori/' . $id_kategori) ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaKategori">Nama Kategori Berita</label>
                                <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Kategori Berita" value="<?= $nama_kategori ?>">
                            </div>
                            <?php echo $this->session->flashdata('message');
                            unset($_SESSION['message']) ?>
                            <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" />
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

<?php } else {
    redirect(base_url('login/index_login'));
}
?>