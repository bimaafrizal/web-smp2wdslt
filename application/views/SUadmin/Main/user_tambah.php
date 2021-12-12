<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Akun</h1>
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
                <form action="<?= base_url('Zone_SUAdmin/proses_registrasi') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="username(email anda)">
                        </div>
                        <div class="form-group">
                            <label for="namaPengguna">Nama Pengguna</label>
                            <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" placeholder="Nama anda">
                        </div>
                        <div class="form-group">
                            <label for="peran">Peran: </label>
                            <select class="form-control" id="peran" name="peran">
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="input password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="konfirmPassword" name="konfirmPassword" placeholder="input konfrimasi password">
                        </div>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Register</button>
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