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
        $data = $this->Admin->ambil_data_guru();
        $arrayData = array(
            'datas' => $data
        );

        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/guru', $arrayData);
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

        if (($nama_guru != '') && ($nip != '') && ($alamat != '') && ($email != '')) {
            $sql = $this->db->query("SELECT nip FROM guru where nip = '$nip'");
            $tes_duplikat_nip = $sql->num_rows();
            if ($tes_duplikat_nip) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                NIP sudah ada
              </div>');
                redirect('Zone_Admin/tambah_guru');
            } else {
                $data = [
                    'nama_guru' => $nama_guru,
                    'nip' => $nip,
                    'alamat' => $alamat,
                    'email' => $email
                ];
                $this->Admin->tambah_guru($data);
                redirect('Zone_Admin/guru');
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
                'email' => $ambilData->email
            );
        }
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/guru_edit', $data);
        $this->load->view('SUadmin/Nav/footer');
    }

    public function proses_edit_guru()
    {
        $nama_guru = $this->input->post('nama_guru');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');

        if (($nama_guru != '') && ($nip != '') && ($alamat != '') && ($email != '')) {
            $sql = $this->db->query("SELECT nip FROM guru where nip = '$nip'");
            $tes_duplikat_nip = $sql->num_rows();
            if ($tes_duplikat_nip) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                NIP sudah ada
                </div>');
                redirect('Zone_Admin/edit_guru');
            } else {
                $data = [
                    'nama_guru' => $nama_guru,
                    'nip' => $nip,
                    'alamat' => $alamat,
                    'email' => $email
                ];
                $this->Admin->edit_guru($data);
                redirect('Zone_Admin/guru');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form harus diisi
            </div>');
            redirect('Zone_Admin/edit_guru');
        }
    }

    public function hapus_guru($id)
    {
        $this->Admin->delete_guru($id);
        redirect('Zone_Admin/guru');
    }


    public function siswa()
    {
        $data = $this->Admin->ambil_data_siswa();
        $arrayData = array(
            'datas' => $data
        );
        $this->load->view('SUadmin/Nav/header2');
        $this->load->view('SUadmin/Nav/sidebar');
        $this->load->view('admin/siswa', $arrayData);
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

        if (($nama_siswa != '') && ($alamat != '') && ($prestasi != '') && ($tahun_masuk != '')) {
            $sql = $this->db->query("SELECT nama_siswa FROM siswa where nama_siswa = '$nama_siswa'");
            $tes_duplikat_nama = $sql->num_rows();
            if ($tes_duplikat_nama) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Nama sudah ada
                </div>');
                redirect('Zone_Admin/edit_guru');
            } else {
                $data = [
                    'nama_siswa' => $nama_siswa,
                    'alamat' => $alamat,
                    'prestasi' => $prestasi,
                    'tahun_masuk' => $tahun_masuk
                ];
                $this->Admin->tambah_siswa($data);
                redirect('Zone_Admin/siswa');
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
                'tahun_masuk' => $ambilData->tahun_masuk
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

        if (($nama_siswa != '') && ($alamat != '') && ($prestasi != '') && ($tahun_masuk != '')) {
            $sql = $this->db->query("SELECT nama_siswa FROM siswa where nama_siswa = '$nama_siswa'");
            $tes_duplikat_nama = $sql->num_rows();
            if ($tes_duplikat_nama) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Nama sudah ada
                </div>');
                redirect('Zone_Admin/edit_guru');
            } else {
                $data = [
                    'nama_siswa' => $nama_siswa,
                    'alamat' => $alamat,
                    'prestasi' => $prestasi,
                    'tahun_masuk' => $tahun_masuk
                ];
                $this->Admin->edit_siswa($data);
                redirect('Zone_Admin/siswa');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semua form harus diisi
            </div>');
            redirect('Zone_Admin/tambah_siswa');
        }
    }

    public function hapus_siswa($id)
    {
        $this->Admin->delete_siswa($id);
        redirect('Zone_Admin/siswa');
    }
}
