<?php if ($this->session->userdata('peran') == 2) {
    redirect(base_url('Zone_SUAdmin/welcome'));
}
if (empty($this->session->userdata('peran'))) {
    redirect(base_url('login/index_login'));
}
if ($this->session->userdata('peran') == 1) { ?>

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
                    <form action="<?= base_url('Zone_SUAdmin/proses_edit_user/' . $id_user) ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user">Username</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?= $user; ?>" placeholder="username(email anda)">
                            </div>
                            <div class="form-group">
                                <label for="namaPengguna">Nama Pengguna</label>
                                <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" value="<?= $nama_pengguna; ?>" placeholder="Nama anda">
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
                            <?php if ($this->session->flashdata('message')) {
                                echo $this->session->flashdata('message');
                                unset($_SESSION['message']);
                            } ?>
                        </div>
                        <!-- /.card-body -->
                        <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>" />
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