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
                <form action="<?= base_url('Zone_SUAdmin/proses_edit_user') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="username(email anda)" value="<?= $user ?>">
                        </div>
                        <div class="form-group">
                            <label for="namaPengguna">Nama Pengguna</label>
                            <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" placeholder="Nama anda" value="<?= $nama_pengguna ?>">
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
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" placeholder="keep your password">
                        </div>
                        <?php echo $this->session->flashdata('message'); ?>
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
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