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
        $keyword = "";
        $config['base_url'] = site_url('Login/index/');
        $config['total_rows'] = $this->db->count_all('guru');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['datas'] = $this->LoginModel->ambil_data_berita($config['per_page'], $data['page'], $keyword);
        $data['pagination'] = $this->pagination->create_links();

        // $data = $this->LoginModel->ambil_data_berita();
        // $arrayData = array(
        //     'datas' => $data
        // );

        $this->load->view('index/index', $data);
        $this->load->view('index/footer');
    }


    public function dataguru()
    {
        $keyword = "";
        $keyword = $this->input->post('keyword');

        $config['base_url'] = site_url('Login/dataguru/');
        $config['total_rows'] = $this->db->count_all('guru');
        $config['per_page'] = 15;
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
        $data['datas'] = $this->LoginModel->ambil_data_guru($config['per_page'], $data['page'], $keyword);
        $data['pagination'] = $this->pagination->create_links();


        $this->load->view('index/dataguru', $data);
        $this->load->view('index/footer');
    }

    public function datasiswa()
    {
        $keyword = "";
        $keyword = $this->input->post('keyword');

        $config['base_url'] = site_url('Login/datasiswa/');
        $config['total_rows'] = $this->db->count_all('siswa');
        $config['per_page'] = 30;
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
        $data['datas'] = $this->LoginModel->ambil_data_siswa($config['per_page'], $data['page'], $keyword);
        $data['pagination'] = $this->pagination->create_links();
        //$data = $this->LoginModel->ambil_data_siswa($keyword);
        // $data2 = $data.count();
        // $arrayData = array(
        //     'datas' => $data
        // );

        $this->load->view('index/datasiswa', $data);
        $this->load->view('index/footer');
    }

    public function berita($id)
    {
        $id_decrypt = decrypt_url($id);
        $ambilData = $this->LoginModel->ambil_data_berita_id($id_decrypt);
        if ($ambilData) {
            $data = array(
                'id_berita' => $ambilData->id_berita,
                'judul_berita' => $ambilData->judul_berita,
                'isi_berita' => $ambilData->isi_berita,
                'cover_berita' => $ambilData->cover_berita,
                'user' => $ambilData->user,
                'tanggal' => $ambilData->tanggal,
                'tanggal_edit' => $ambilData->tanggal_edit,
                'kategori' => $ambilData->kategori
            );
        }
        $this->load->view('index/berita', $data);
        $this->load->view('index/footer');
    }
    public function tampil_semua_berita()
    {
        $keyword = "";
        $keyword = $this->input->post('keyword');

        $config['base_url'] = site_url('Login/tampil_semua_berita/');
        $config['total_rows'] = $this->db->count_all('berita');
        $config['per_page'] = 9;
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
        $data['datas'] = $this->LoginModel->ambil_data_berita($config['per_page'], $data['page'], $keyword);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('index/semua_berita', $data);
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
                        'peran' => $cekdb['peran'],
                        'status' => 'login'
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

    public function sendemail()
    {
        $email = $this->input->post('email');
        $email_saya = 'smpnwadaslintang2@gamil.com';
        $judul = $this->input->post('judul');
        $isi = $this->input->post('pesan');

        // $this->load->library('phpmailer');
        // $mail = $this->phpmailer->load();
        // $mail->isSMTP();
        // $mail->Host     = 'smtp.example.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'smpnwadaslintang2@gamil.com';
        // $mail->Password = '20306858';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port     = 465;

        // $mail->setFrom('smpnwadaslintang2@gamil.com', 'Mail');
        // $mail->addReplyTo('smpnwadaslintang2@gamil.com', 'Mail');
        // $mail->addAddress($email);
        // $mail->isHTML(true);

        // $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
        // <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";;
        // $mail->Body = $mailContent;


        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'localhost',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        // $email = $this->input->post('email');
        // $email_saya = 'smpnwadaslintang2@gamil.com';
        // $judul = $this->input->post('judul');
        // $isi = $this->input->post('pesan');

        //$this->load->library('email', $config);
        //$this->email->initialize($config);
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($email, 'user');
        $this->email->to($email_saya);
        $this->email->subject($judul);
        $this->email->message($isi);

        if (!$email->send()) {
            show_error($this->email->print_debugger());
        } else {
            echo 'Success to send email';
        }
    }
}
