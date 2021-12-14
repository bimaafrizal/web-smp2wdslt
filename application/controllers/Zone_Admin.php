<?php
class Zone_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin');
    }

    public function welcome()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/welcome');
        $this->load->view('SUadmin/Nav/footer');
    }

    public function kategori()
    {
        $data = $this->Admin->ambil_data_kategori();
        $arrayData = array(
            'datas' => $data
        );

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/kategori', $arrayData);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function tambah_kategori()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/kategori_tambah');
        $this->load->view('SUadmin/Nav/footer');
    }
    public function proses_tambah_kategori()
    {
        $nama_kategori = $this->input->post('namaKategori');

        if ($nama_kategori != '') {
            $sql = $this->db->query("SELECT nama_kategori FROM kategori where nama_kategori = '$nama_kategori'");
            $tes_duplikat = $sql->num_rows();

            if ($tes_duplikat > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                KATEGORI SUDAH ADA
                </div>');
                redirect('Zone_Admin/tambah_kategori');
            } else {
                $data = [
                    'nama_kategori' => $nama_kategori
                ];
                // var_dump($data);
                // die;
                $this->Admin->tambah_kategori($data);
                redirect('Zone_Admin/kategori');
            }
        }
    }
    public function edit_kategori($id)
    {
        $ambilData = $this->Admin->ambil_data_kategori_id($id);

        if ($ambilData) {
            $data = array(
                'id_kategori' => $ambilData->id_kategori,
                'nama_kategori' => $ambilData->nama_kategori
            );
        }
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/kategori_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }
    public function proses_edit_kategori()
    {
        $nama_kategori = $this->input->post('namaKategori');

        if ($nama_kategori != '') {
            $sql = $this->db->query("SELECT nama_kategori FROM kategori where nama_kategori = '$nama_kategori'");
            $tes_duplikat = $sql->num_rows();

            if ($tes_duplikat > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Kategori sudah ada
              </div>');
                redirect('Zone_Admin/edit_kategori');
            } else {
                $data = [
                    'nama_kategori' => $nama_kategori
                ];
                $this->Admin->edit_kategori($data);
                redirect('Zone_Admin/kategori');
            }
        }
    }

    function hapus_kategori($id)
    {
        $this->Admin->delete_kategori($id);
        redirect('Zone_Admin/kategori');
    }

    public function berita()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Nav/footer');
    }

    public function guru()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Nav/footer');
    }
    public function siswa()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Nav/footer');
    }
}
