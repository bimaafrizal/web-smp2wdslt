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




        $this->form_validation->set_rules('namaKategori', ' Nama Kategori', 'required|is_unique[kategori.nama_kategori]');

        $this->form_validation->set_message('required', '%s Mohon diisi');
        $this->form_validation->set_message('is_unique', '%s Sudah terdaftar');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> ' . validation_errors() . '</div>');
            redirect('Zone_Admin/tambah_kategori');
        } else {
            $nama_kategori = $this->input->post('namaKategori');
            $data = [
                'nama_kategori' => $nama_kategori
            ];
            // var_dump($data);
            // die;
            $this->Admin->tambah_kategori($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Kategori berhasil ditambahkan</div>');
            redirect('Zone_Admin/kategori');
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
    public function proses_edit_kategori($id)
    {
        $nama_kategori = $this->input->post('namaKategori');


        $this->form_validation->set_rules('namaKategori', ' Nama Kategori', 'required|is_unique[kategori.nama_kategori]');

        $this->form_validation->set_message('required', '%s Mohon diisi');
        $this->form_validation->set_message('is_unique', '%s Sudah terdaftar');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> ' . validation_errors() . '</div>');
            redirect('Zone_Admin/edit_kategori/' . $id);
        } else {
            $data = [
                'nama_kategori' => $nama_kategori
            ];
            $this->Admin->edit_kategori($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Kategori berhasil diedit</div>');
            redirect('Zone_Admin/kategori');
        }
    }

    function hapus_kategori($id)
    {
        $this->Admin->delete_kategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Kategori berhasil dihapus</div>');
        redirect('Zone_Admin/kategori');
    }

    public function berita()
    {

        $config['base_url'] = site_url('Zone_Admin/berita/');
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
        $data['datas'] = $this->Admin->ambil_data_berita($keyword, $config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        // $arrayData = array(
        //     'datas' => $data
        // );

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/berita', $data);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function tambah_berita()
    {
        $data['kategoris'] = $this->Admin->ambil_data_kategori();
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/berita_tambah', $data);
        $this->load->view('SUadmin/Nav/footer');
    }
    public function proses_tambah_berita()
    {
        $judul = $this->input->post('judul');
        $isi_berita = $this->input->post('isi_berita');
        $kategori = $this->input->post('kategori');
        $cover = $_FILES['image']['name'];

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        $config['upload_path'] = './assets/imagesData/cover';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 50000;
        $config['max_width']  = 51280;
        $config['max_height']  = 51280;
        $config['file_name'] = $_FILES['image']['name'];
        // $this->load->library('upload', $config);
        $this->load->library('upload', $config);

        // var_dump($config);
        // die;
        if (!$this->upload->do_upload('image') && $this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Data harus terisi dengan benar </div>');
            redirect('Zone_Admin/tambah_berita');
        }
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];
        $data = [
            'judul_berita' => $judul,
            'isi_berita' => $isi_berita,
            'tanggal' => time(),
            'user' => $this->session->userdata('nama_pengguna'),
            'cover_berita' => $filename,
            'kategori' => $kategori
        ];

        $this->Admin->tambah_berita($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data berhasil ditambahkan </div>');
        redirect('Zone_Admin/berita');
    }
    public function edit_berita($id)
    {
        $ambilData = $this->Admin->ambil_data_berita_id($id);
        if ($ambilData) {
            $data = array(
                'id_berita' => $ambilData->id_berita,
                'judul_berita' => $ambilData->judul_berita,
                'isi_berita' => $ambilData->isi_berita,
                'cover_berita' => $ambilData->cover_berita,
                'kategoris' => $this->Admin->ambil_data_kategori()
            );
        }

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/berita_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }
    public function proses_edit_berita($id)
    {
        $id = array('id_berita' => $id);
        $judul = $this->input->post('judul');
        $isi_berita = $this->input->post('isi_berita');
        $kategori = $this->input->post('kategori');
        $cover = $_FILES['image']['name'];

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        $config['upload_path'] = './assets/imagesData/cover';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 50000;
        $config['max_width']  = 51280;
        $config['max_height']  = 51280;
        $config['file_name'] = $_FILES['image']['name'];
        // $this->load->library('upload', $config);
        $this->load->library('upload', $config);

        // var_dump($config);
        // die;
        if (!$this->upload->do_upload('image') && $this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Data harus terisi dengan benar </div>');
            redirect('Zone_Admin/tambah_berita');
        }
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];
        $data = [
            'judul_berita' => $judul,
            'isi_berita' => $isi_berita,
            'tanggal' => time(),
            'user' => $this->session->userdata('nama_pengguna'),
            'cover_berita' => $filename,
            'kategori' => $kategori
        ];

        $this->Admin->edit_berita($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data berhasil diedit </div>');
        redirect('Zone_Admin/berita');
    }
    public function hapus_berita($id)
    {
        $ambilData = $this->db->get_where('berita', ['id_berita' => $id])->row_array();
        $old_image =  $ambilData['cover_berita'];
        if ($old_image) {
            unlink(FCPATH . './assets/imagesData/cover/' . $old_image);
        }
        $this->Admin->delete_berita($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data berhasil dihapus </div>');
        redirect('Zone_Admin/berita');
    }

    public function guru()
    {
        $config['base_url'] = site_url('Zone_Admin/guru/');
        $config['total_rows'] = $this->db->count_all('guru');
        $config['per_page'] = 5;
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

        $data['datas'] = $this->Admin->ambil_data_guru($keyword, $config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        // $arrayData = array(
        //     'datas' => $data
        // );

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/guru', $data);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function tambah_guru()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/guru_tambah');
        $this->load->view('SUadmin/Nav/footer');
    }

    public function proses_tambah_guru()
    {
        $nama_guru = $this->input->post('nama_guru');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $gambar = $_FILES['image']['name'];

        if (($nama_guru != '') && ($nip != '') && ($alamat != '') && ($email != '') && ($gambar != '')) {
            $sql = $this->db->query("SELECT email FROM guru where email = '$email'");
            $tes_duplikat_email = $sql->num_rows();
            if ($tes_duplikat_email) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email sudah ada
              </div>');
                redirect('Zone_Admin/tambah_guru');
            } else {
                $config['upload_path'] = './assets/imagesData/fotoGuru';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 50000;
                $config['max_width']  = 51280;
                $config['max_height']  = 51280;
                $config['file_name'] = $_FILES['image']['name'];
                // $this->load->library('upload', $config);
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data = [
                        'nama_guru' => $nama_guru,
                        'nip' => $nip,
                        'alamat' => $alamat,
                        'email' => $email,
                        'foto_guru' => $filename
                    ];

                    $this->Admin->tambah_guru($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil ditambah
                  </div>');
                    redirect('Zone_Admin/guru');
                } else {
                    redirect('Zone_Admin/tambah_guru');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Semua form harus diisi
              </div>');
            redirect('Zone_Admin/tambah_guru');
        }
    }

    public function edit_guru($id)
    {
        $ambilData = $this->Admin->ambil_data_guru_id($id);

        if ($ambilData) {
            $data = array(
                'id_guru' => $ambilData->id_guru,
                'nama_guru' => $ambilData->nama_guru,
                'nip' => $ambilData->nip,
                'alamat' => $ambilData->alamat,
                'email' => $ambilData->email,
                'foto_guru' => $ambilData->foto_guru
            );
        }
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/guru_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function proses_edit_guru($id)
    {
        $id = array('id_guru' => $id);
        $nama_guru = $this->input->post('nama_guru');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $gambar = $_FILES['image']['name'];
        $id = $this->input->post('id_guru');

        if (($nama_guru != '') && ($nip != '') && ($alamat != '') && ($email != '') && ($gambar != '')) {
            $sql = $this->db->query("SELECT email FROM guru where email = '$email'");
            $tes_duplikat_email = $sql->num_rows();
            if ($tes_duplikat_email > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                NIP sudah ada
                </div>');
                redirect('Zone_Admin/edit_guru/' . $id);
            } else {
                $this->db->set('nama_guru', $nama_guru);
                $this->db->set('nip', $nip);
                $this->db->set('alamat', $alamat);
                $this->db->set('email', $email);

                $config['upload_path'] = './assets/imagesData/fotoGuru/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 50000;
                $config['max_width']  = 51280;
                $config['max_height']  = 51280;
                $config['file_name'] = $_FILES['image']['name'];
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $ambilData = $this->db->get_where('guru', ['id_guru' => $id])->row_array();
                    $old_image =  $ambilData['foto_guru'];

                    if ($old_image) {
                        unlink(FCPATH . './assets/imagesData/fotoGuru/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_guru', $new_image);

                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $this->db->set('foto_guru', $filename);
                }

                $this->db->where('id_guru', $id);
                $this->db->update('guru');
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diedit
                </div>');
                redirect('Zone_Admin/guru');
            }
        } else if (($nama_guru != '') && ($nip != '') && ($alamat != '') && ($email != '') && ($gambar == '')) {
            $ambilData = $this->db->get_where('guru', ['id_guru' => $id])->row_array();
            $old_image =  $ambilData['foto_guru'];
            $this->db->set('nama_guru', $nama_guru);
            $this->db->set('nip', $nip);
            $this->db->set('alamat', $alamat);
            $this->db->set('email', $email);
            $this->db->set('foto_guru', $old_image);
            $this->db->where('id_guru', $id);
            $this->db->update('guru');
            redirect('Zone_Admin/guru');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form harus diisi
            </div>');
            redirect('Zone_Admin/edit_guru/' . $id);
        }
    }

    public function hapus_guru($id)
    {
        $ambilData = $this->db->get_where('guru', ['id_guru' => $id])->row_array();
        $old_image =  $ambilData['foto_guru'];
        if ($old_image) {
            unlink(FCPATH . './assets/imagesData/fotoGuru/' . $old_image);
        }
        $this->Admin->delete_guru($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus
      </div>');
        redirect('Zone_Admin/guru');
    }


    public function siswa()
    {
        $config['base_url'] = site_url('Zone_Admin/siswa/');
        $config['total_rows'] = $this->db->count_all('siswa');
        $config['per_page'] = 5;
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


        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $keyword = "";
        $keyword = $this->input->post('keyword');
        $data['datas'] = $this->Admin->ambil_data_siswa($keyword, $config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        // $data = $this->Admin->ambil_data_siswa();
        // $arrayData = array(
        //     'datas' => $data
        // );
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/siswa', $data);
        $this->load->view('SUadmin/Nav/footer');
    }


    public function tambah_siswa()
    {
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/siswa_tambah');
        $this->load->view('SUadmin/Nav/footer');
    }
    public function proses_tambah_siswa()
    {
        $nama_siswa = $this->input->post('nama_siswa');
        $alamat = $this->input->post('alamat');
        $prestasi = $this->input->post('prestasi');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $gambar = $_FILES['image']['name'];

        if (($nama_siswa != '') && ($alamat != '') && ($prestasi != '') && ($tahun_masuk != '') && ($gambar != '')) {
            $config['upload_path'] = './assets/imagesData/fotoSiswa/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 50000;
            $config['max_width']  = 51280;
            $config['max_height']  = 51280;
            $config['file_name'] = $_FILES['image']['name'];
            // $this->load->library('upload', $config);
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data = [
                    'nama_siswa' => $nama_siswa,
                    'alamat' => $alamat,
                    'prestasi' => $prestasi,
                    'tahun_masuk' => $tahun_masuk,
                    'foto_siswa' => $filename
                ];
                $this->Admin->tambah_siswa($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambah
            </div>');
                redirect('Zone_Admin/siswa');
            } else {
                redirect('Zone_Admin/tambah_siswa');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form harus diisi
            </div>');
            redirect('Zone_Admin/tambah_siswa');
        }
    }

    public function edit_siswa($id)
    {
        $ambilData = $this->Admin->ambil_data_siswa_id($id);

        if ($ambilData) {
            $data = array(
                'id_siswa' => $ambilData->id_siswa,
                'nama_siswa' => $ambilData->nama_siswa,
                'alamat' => $ambilData->alamat,
                'prestasi' => $ambilData->prestasi,
                'tahun_masuk' => $ambilData->tahun_masuk,
                'foto_siswa' => $ambilData->foto_siswa
            );
        }
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/siswa_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function proses_edit_siswa()
    {
        $nama_siswa = $this->input->post('nama_siswa');
        $alamat = $this->input->post('alamat');
        $prestasi = $this->input->post('prestasi');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $gambar = $_FILES['image']['name'];
        $id = $this->input->post('id_siswa');

        if (($nama_siswa != '') && ($alamat != '') && ($prestasi != '') && ($tahun_masuk != '') && ($gambar != '')) {
            $this->db->set('nama_siswa', $nama_siswa);
            $this->db->set('alamat', $alamat);
            $this->db->set('prestasi', $prestasi);
            $this->db->set('tahun_masuk', $tahun_masuk);

            $config['upload_path'] = './assets/imagesData/fotoSiswa/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 50000;
            $config['max_width']  = 51280;
            $config['max_height']  = 51280;
            $config['file_name'] = $_FILES['image']['name'];
            // $this->load->library('upload', $config);
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $ambilData = $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
                $old_image =  $ambilData['foto_siswa'];
                // var_dump($old_image);
                // die;
                if ($old_image) {
                    unlink(FCPATH . './assets/imagesData/fotoSiswa/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_siswa', $new_image);

                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $this->db->set('foto_siswa', $filename);
            }
            $this->db->where('id_siswa', $id);
            $this->db->update('siswa');
            redirect('Zone_Admin/siswa');
        } else if (($nama_siswa != '') && ($alamat != '') && ($prestasi != '') && ($tahun_masuk != '') && ($gambar == '')) {
            $ambilData = $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
            $old_image =  $ambilData['foto_siswa'];

            $this->db->set('nama_siswa', $nama_siswa);
            $this->db->set('alamat', $alamat);
            $this->db->set('prestasi', $prestasi);
            $this->db->set('tahun_masuk', $tahun_masuk);
            $this->db->set('foto_siswa', $old_image);
            $this->db->where('id_siswa', $id);
            $this->db->update('siswa');
            redirect('Zone_Admin/siswa');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form harus diisi
            </div>');
            redirect('Zone_Admin/edit_siswa/' . $id);
        }
    }

    public function hapus_siswa($id)
    {
        $ambilData = $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
        $old_image =  $ambilData['foto_siswa'];
        if ($old_image) {
            unlink(FCPATH . './assets/imagesData/fotoSiswa/' . $old_image);
        }
        $this->Admin->delete_siswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Semua form harus diisi
        </div>');
        redirect('Zone_Admin/siswa');
    }
}
