<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('Admin');
    }

    public function index()
    {

        $this->load->view('index/index');
        $this->load->view('index/footer');
    }

    public function dataguru()
    {
        $data = $this->Admin->ambil_data_guru();
        $arrayData = array(
            'datas' => $data
        );

        $this->load->view('index/dataguru', $arrayData);
        $this->load->view('index/footer');
    }

    public function datasiswa()
    {
        $data = $this->Admin->ambil_data_siswa();
        $arrayData = array(
            'datas' => $data
        );

        $this->load->view('index/datasiswa', $arrayData);
        $this->load->view('index/footer');
    }

    public function berita()
    {

        $this->load->view('index/berita');
        $this->load->view('index/footer');
    }
    public function index_login()
    {
        $this->load->view('index/view_login');
    }

    public function proses_login()
    {
        $user = $this->input->post('user');
        $password = $this->input->post('password');
        $cekdb = $this->db->get_where('user', ['user' => $user])->row_array();

        if (($user != '') && ($password != '')) {
            if ($cekdb) {
                if (password_verify($password, $cekdb['password'])) {
                    $data = array(
                        'id_user' => $cekdb['id_user'],
                        'user' => $cekdb['user'],
                        'password' => $cekdb['password'],
                        'nama_pengguna' => $cekdb['nama_pengguna'],
                        'is_aktif' => $cekdb['is_aktif'],
                        'peran' => $cekdb['peran']
                    );
                    // var_dump($data);
                    // die;
                    $this->session->set_userdata($data);
                    $is_aktif = $this->session->userdata('is_aktif');
                    if ($is_aktif == 1) {
                        if ($this->session->userdata('peran') == 1) {
                            redirect('Zone_SUAdmin/welcome');
                        } else {
                            redirect('Zone_Admin/welcome');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Akun belum aktif
                       </div>');
                        redirect('Login/index_login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Password Salah
              </div>');
                    redirect('Login/index_login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               User Tidak ditemukan
              </div>');
                redirect('Login/index_login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Semua form wajib diisi
              </div>');
            redirect('Login/index_login');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login/index_login');
    }
}
