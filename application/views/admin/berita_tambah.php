<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<div class="content-wrapper">
    <?php if ($this->session->userdata('peran') == 1) {
        redirect(base_url('Zone_SUAdmin/welcome'));
    }
    if (empty($this->session->userdata('peran'))) {
        redirect(base_url('login/index_login'));
    }
    if ($this->session->userdata('peran') == 2) { ?>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Berita</h1>
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
                    <?php echo form_open_multipart('Zone_Admin/proses_tambah_berita') ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Berita">
                        </div>
                        <label for="image"> Upload Cover Foto </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" size="20">
                            <label class="custom-file-label" for="image">Choose file</label>
                            <p>Gunakan format JPG, JPEG, atau PNG</p>
                        </div>
                        <div class="form-group mt-3">
                            <label for="isi_berita">Isi Berita</label>
                            <textarea class="form-control" placeholder="Isi berita" id="isi_berita" name="isi_berita" style="height: 500px"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori"> Kategori Berita:</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <?php
                                foreach ($kategoris as $kategori) :
                                ?>
                                    <option value="<?php echo $kategori->nama_kategori ?>"><?php echo $kategori->nama_kategori ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <?php echo $this->session->flashdata('message');
                        unset($_SESSION['message']) ?>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
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
<script text="text/javascript">
    CKEDITOR.replace('isi_berita', {
        height: 600,
        filebrowserImageBrowseUrl: "<?= base_url('Upload/upload_img'); ?>"
    });
</script>

<!-- <script>
    $(document).ready(function() {
        $('#isi_berita').summernote({
            height: "300px",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo site_url('Zone_Admin/upload_gambar_summernote') ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#isi_berita').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?php echo site_url('Zone_Admin/delete_img_summernote') ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

    });
</script> -->

<?php } else {
        redirect(base_url('login/index_login'));
    }
?>
<!-- Content Header (Page header) -->