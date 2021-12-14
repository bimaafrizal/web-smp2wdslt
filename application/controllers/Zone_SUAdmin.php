<?php
class Zone_SUAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SUAdmin');
    }
    public function welcome()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/welcome');
        $this->load->view('SUadmin/Nav/footer');
    }
    public function user()
    {

        $data = $this->SUAdmin->ambil_data_user();
        $arrayData = array(
            'datas' => $data
        );

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/user', $arrayData);
        $this->load->view('SUadmin/Nav/footer');
    }
    public function registrasi()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/user_tambah');
        $this->load->view('SUadmin/Nav/footer');
    }

    public function proses_registrasi()
    {
        $user = $this->input->post('user');
        $namaPengguna = $this->input->post('namaPengguna');
        $peran = $this->input->post('peran');
        $is_aktif = "0";
        $pass = $this->input->post('password');
        $konfirmPass = $this->input->post('konfirmPassword');

        if (($user != '') && ($namaPengguna != '') && ($peran != '') && ($pass != '') && ($konfirmPass)) {
            $sql = $this->db->query("SELECT user FROM user where user='$user'");
            $tes_duplikat = $sql->num_rows();
            if ($tes_duplikat > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email sudah digunakan
              </div>');
                redirect('Zone_SUAdmin/registrasi');
            } else {
                if ($pass == $konfirmPass) {
                    $data = [
                        'user' => $user,
                        'password' => password_hash($pass, PASSWORD_DEFAULT),
                        'nama_pengguna' =>  $namaPengguna,
                        'is_aktif' => $is_aktif,
                        'peran' => $peran
                    ];

                    $this->SUAdmin->tambah_user($data);
                    redirect('Zone_SUAdmin/user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password dan Konfrirmasi password harus sama
              </div>');
                    redirect('Zone_SUAdmin/registrasi');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Semua form wajib diisi
              </div>');
            redirect('Zone_SUAdmin/registrasi');
        }
    }

    public function aktifkan($id)
    {
        $is_aktif = "1";

        $data = [
            'is_aktif' => $is_aktif
        ];
        $this->SUAdmin->aktifkan_user($data, $id);
        redirect('Zone_SUAdmin/user');
    }
    public function nonAktifkan($id)
    {
        $is_aktif = "0";

        $data = [
            'is_aktif' => $is_aktif
        ];
        $this->SUAdmin->aktifkan_user($data, $id);
        redirect('Zone_SUAdmin/user');
    }

    public function hapus_user($id)
    {
        $this->SUAdmin->delete_user($id);
        redirect('Zone_SUAdmin/user');
    }

    public function edit_user($id)
    {
        $ambilData = $this->SUAdmin->ambil_data_user_id($id);

        if ($ambilData) {
            $data = array(
                'id_user' => $ambilData->id_user,
                'user' => $ambilData->user,
                'nama_pengguna' => $ambilData->nama_pengguna,
                'password' => $ambilData->password,
                'peran' => $ambilData->peran
            );
        }
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/user_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function proses_edit_user()
    {
        $user = $this->input->post('user');
        $namaPengguna = $this->input->post('namaPengguna');
        $peran = $this->input->post('peran');
        $pass = $this->input->post('password');
        $pass2 = $this->session->userdata('password');
        $is_aktif = $this->session->userdata('is_aktif');
        // var_dump($pass2);
        // die;

        if (($user != '') and ($namaPengguna != '') and ($peran != '')) {
            $sql = $this->db->query("SELECT user FROM user where user='$user'");
            $tes_duplikat = $sql->num_rows();
            if ($tes_duplikat > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email sudah digunakan
              </div>');
                redirect('Zone_SUAdmin/edit_user');
            } else {
                if ($pass == '') {
                    $data = [
                        'user' => $user,
                        'password' => $pass2,
                        'nama_pengguna' =>  $namaPengguna,
                        'is_aktif' => $is_aktif,
                        'peran' => $peran
                    ];

                    $this->SUAdmin->edit_user($data);
                    // var_dump($data);
                    // die;
                    redirect('Zone_SUAdmin/user');
                } else {
                    $data = [
                        'user' => $user,
                        'password' => password_hash($pass, PASSWORD_DEFAULT),
                        'nama_pengguna' =>  $namaPengguna,
                        'is_aktif' => $is_aktif,
                        'peran' => $peran
                    ];
                    // var_dump($data);
                    // die;
                    $this->SUAdmin->edit_user($data);
                    redirect('Zone_SUAdmin/user');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Semua form wajib diisi(kecuali password)
              </div>');
            redirect('Zone_SUAdmin/edit_user');
        }
    }

    public function menu()
    {
        $data = $this->SUAdmin->ambil_data_menu();
        $arrayData = array(
            'datas' => $data
        );

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/menu', $arrayData);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function edit_menu($id)
    {
        $ambilData = $this->SUAdmin->ambil_data_menu_id($id);

        if ($ambilData) {
            $data = array(
                'id_menu' => $ambilData->id_menu,
                'nama_menu' => $ambilData->nama_menu,
                'url' => $ambilData->url,
                'icon' => $ambilData->icon,
                'peran' => $ambilData->peran
            );
        }

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/menu_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }
    public function proses_edit_menu()
    {
        $nama_menu = $this->input->post('nama_menu');
        $icon = $this->input->post('icon');

        if (($nama_menu != '') && ($icon != '')) {
            $sql = $this->db->query("SELECT nama_menu FROM menu where nama_menu='$nama_menu'");
            $tes_duplikat = $sql->num_rows();
            if ($tes_duplikat > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Nama menu sudah digunakan
              </div>');
                redirect('Zone_SUAdmin/edit_menu');
            } else {
                $data = [
                    'nama_menu' => $nama_menu,
                    'icon' => $icon
                ];
                // var_dump($data);
                // die;
                $this->SUAdmin->edit_menu($data);
                redirect('Zone_SUAdmin/menu');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form wajib diisi
          </div>');
            redirect('Zone_SUAdmin/edit_menu');
        }
    }
}
