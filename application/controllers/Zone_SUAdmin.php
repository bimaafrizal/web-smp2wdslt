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
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    User berhasil ditambah
                  </div>');
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
        $id_decrypt = decrypt_url($id);
        $is_aktif = "1";

        $data = [
            'is_aktif' => $is_aktif
        ];
        $this->SUAdmin->aktifkan_user($data, $id_decrypt);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        User berhasil diaktifkan
      </div>');
        redirect('Zone_SUAdmin/user');
    }
    public function nonAktifkan($id)
    {
        $id_decrypt = decrypt_url($id);
        $is_aktif = "0";

        $data = [
            'is_aktif' => $is_aktif
        ];
        $this->SUAdmin->aktifkan_user($data, $id_decrypt);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        User berhasil dinonaktifkan
      </div>');
        redirect('Zone_SUAdmin/user');
    }

    public function hapus_user($id)
    {
        $id_decrypt = decrypt_url($id);
        $this->SUAdmin->delete_user($id_decrypt);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        User berhasil dihapus
        </div>');
        redirect('Zone_SUAdmin/user');
    }

    public function edit_user($id)
    {
        $id_decrypt = decrypt_url($id);
        $ambilData = $this->SUAdmin->ambil_data_user_id($id_decrypt);
        // var_dump($ambilData);
        // die;
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

    public function proses_edit_user($id)
    {
        $id_encrypt = encrypt_url($id);
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
                redirect('Zone_SUAdmin/edit_user/' . $id_encrypt);
            } else {
                if ($pass == '') {
                    $data = [
                        'user' => $user,
                        'password' => $pass2,
                        'nama_pengguna' =>  $namaPengguna,
                        'is_aktif' => $is_aktif,
                        'peran' => $peran
                    ];
                    // var_dump($data);
                    // die;

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
            redirect('Zone_SUAdmin/edit_user/' . $id_encrypt);
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
        $id_decrypt = decrypt_url($id);
        $ambilData = $this->SUAdmin->ambil_data_menu_id($id_decrypt);

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
    public function proses_edit_menu($id)
    {
        $id_data = array('id_menu' => $id);
        $id_encrypt = encrypt_url($id);
        // $id_encrypt = encrypt_url($id);
        $nama_menu = $this->input->post('nama_menu');
        $icon = $this->input->post('icon');

        if (($nama_menu != '') && ($icon != '')) {
            $sql = $this->db->query("SELECT nama_menu FROM menu where nama_menu='$nama_menu'");
            $tes_duplikat = $sql->num_rows();
            if ($tes_duplikat > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Nama menu sudah digunakan
              </div>');
                redirect('Zone_SUAdmin/edit_menu/' . $id_encrypt);
            } else {
                $data = [
                    'nama_menu' => $nama_menu,
                    'icon' => $icon
                ];
                // var_dump($data);
                // die;
                $this->SUAdmin->edit_menu($data, $id_data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Menu berhasil diubah
              </div>');
                redirect('Zone_SUAdmin/menu');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form wajib diisi
          </div>');
            redirect('Zone_SUAdmin/edit_menu/' . $id_encrypt);
        }
    }

    public function berita()
    {
        $config['base_url'] = site_url('Zone_SUAdmin/berita/');
        $config['total_rows'] = $this->db->count_all('berita');
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';

        $config['first_tagl_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $keyword = "";
        $keyword = $this->input->post('keyword');
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['datas'] = $this->SUAdmin->ambil_data_berita($keyword, $config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        // $arrayData = array(
        //     'datas' => $data
        // );

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/berita', $data);
        $this->load->view('SUadmin/Nav/footer');
    }


    public function edit_berita($id)
    {
        $id_decrypt = decrypt_url($id);
        $ambilData = $this->SUAdmin->ambil_data_berita_id($id_decrypt);
        if ($ambilData) {
            $data = array(
                'id_berita' => $ambilData->id_berita,
                'judul_berita' => $ambilData->judul_berita,
                'isi_berita' => $ambilData->isi_berita,
                'cover_berita' => $ambilData->cover_berita,
                'kategoris' => $this->SUAdmin->ambil_data_kategori()
            );
        }

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('SUadmin/Main/berita_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }
    public function proses_edit_berita($id_berita)
    {
        $id_encrypt = encrypt_url($id_berita);
        $id = array('id_berita' => $id_berita);
        $judul = $this->input->post('judul');
        $isi_berita = $this->input->post('isi_berita');
        $kategori = $this->input->post('kategori');
        $cover = $_FILES['image']['name'];

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($judul != '' && $isi_berita != '' && $cover != '') {
            $config['upload_path'] = './assets/imagesData/cover/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 50000;
            $config['max_width']  = 51280;
            $config['max_height']  = 51280;
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload', $config);
            // var_dump($config);
            // die;
            if ($this->upload->do_upload('image') && $this->form_validation->run() == true) {
                $ambilData = $this->db->get_where('berita', ['id_berita' => $id_berita])->row_array();
                $old_image =  $ambilData['cover_berita'];

                // var_dump($old_image);
                // die;
                if ($old_image) {
                    unlink(FCPATH . './assets/imagesData/cover/' . $old_image);
                }
                // $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Data harus terisi dengan benar </div>');
                // redirect('Zone_Admin/edit_berita');
                $new_image = $this->upload->data('file_name');
                // $this->db->set('foto_guru', $new_image);

                //$uploadData = $this->upload->data();
                // $filename = $uploadData['file_name'];
                $data = [
                    'judul_berita' => $judul,
                    'isi_berita' => $isi_berita,
                    'tanggal_edit' => time(),
                    'user' => $this->session->userdata('nama_pengguna'),
                    'cover_berita' => $new_image,
                    'kategori' => $kategori
                ];
                $this->SUAdmin->edit_berita($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data berhasil diedit </div>');
                redirect('Zone_SUAdmin/berita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Data harus terisi dengan benar </div>');
                redirect('Zone_SUAdmin/edit_berita/' . $id_encrypt);
            }
        } else if ($judul != '' && $isi_berita != '' && $cover == '') {
            $ambilData = $this->db->get_where('berita', ['id_berita' => $id_berita])->row_array();
            $old_image =  $ambilData['cover_berita'];
            $data = [
                'judul_berita' => $judul,
                'isi_berita' => $isi_berita,
                'tanggal_edit' => time(),
                'user' => $this->session->userdata('nama_pengguna'),
                'cover_berita' => $old_image,
                'kategori' => $kategori
            ];
            $this->SUAdmin->edit_berita($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data berhasil diedit </div>');
            redirect('Zone_SUAdmin/berita');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form wajib diisi(kecuali gambar cover)
            </div>');
            redirect('Zone_SUAdmin/edit_berita/' . $id_encrypt);
        }
    }

    public function hapus_berita($id)
    {
        $id_decrypt = decrypt_url($id);
        $ambilData = $this->db->get_where('berita', ['id_berita' => $id_decrypt])->row_array();
        $old_image =  $ambilData['cover_berita'];
        if ($old_image) {
            unlink(FCPATH . './assets/imagesData/cover/' . $old_image);
        }
        $this->SUAdmin->delete_berita($id_decrypt);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data berhasil dihapus </div>');
        redirect('Zone_SUAdmin/berita');
    }
}
