<?php
class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SUAdmin');
    }
    function upload_img()
    {
        if (isset($_FILES['upload']['name'])) {
            var_dump($_FILES);
            die;
            $file = $_FILES['upload']['tmp_name'];
            $file_name = $_FILES['upload']['name'];
            $file_name_array = explode(".", $file_name);
            $extension = end($file_name_array);
            $new_image_name = rand() . '.' . $extension;
            chmod('upload', 0777);
            $allowed_extension = array("jpg", "gif", "png", "jpeg");
            if (in_array($extension, $allowed_extension)) {
                move_uploaded_file($file, './assets/imagesData/berita/' . $new_image_name);
                $function_number = $_GET['CKEditorFuncNum'];
                $url = './assets/imagesData/berita/' . $new_image_name;
                $message = '';
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
            }
        }
    }
}
