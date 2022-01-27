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
                        <h1 class="m-0">Edit Data Siswa</h1>
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
                    <?php echo form_open_multipart('Zone_Admin/proses_edit_siswa') ?>
                    <!-- <form action="<?= base_url('Zone_Admin/proses_edit_siswa') ?>" method="post"> -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" value="<?= $nama_siswa ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $alamat ?>">
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input type="text" class="form-control" id="prestasi" name="prestasi" placeholder="Prestasi" value="<?= $prestasi ?>">
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk"> Tahun Masuk </label>
                            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun Masuk" value="<?= $tahun_masuk ?>">
                        </div>
                        <label for="image"> Upload foto </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" size="20">
                            <label class="custom-file-label" for="image">Choose file</label>
                            <p>Gunakan format JPG, JPEG, atau PNG</p>
                        </div>
                        <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" />
                        <?php echo $this->session->flashdata('message');
                        unset($_SESSION['message']) ?>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <!-- </form> -->
                    <?php echo form_close(); ?>
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