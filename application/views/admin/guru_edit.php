<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Guru</h1>
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
                <?php echo form_open_multipart('Zone_Admin/proses_edit_guru/' . $id_guru) ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama Guru" value="<?= $nama_guru ?>">
                    </div>
                    <div class="form-group">
                        <label for="namaPengguna">NIP</label>
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="nip" value="<?= $nip ?>">
                        <p>Jika tidak punya NIP ketikan angka 0</p>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $alamat ?>">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Guru" value="<?= $email ?>">
                    </div>
                    <label for="image"> Upload foto </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" size="20">
                        <label class="custom-file-label" for="image">Choose file</label>
                        <p>Gunakan format JPG, JPEG, atau PNG</p>
                    </div>
                    <input type="hidden" name="id_guru" id="id_guru" value="<?php echo $id_guru; ?>" />
                    <?php echo $this->session->flashdata('message');
                    unset($_SESSION['message']) ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
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