<?php
class LoginModel extends CI_Model
{
    public $user = 'user';
    public $menu = 'menu';
    public $table_guru = 'guru';
    public $table_siswa = 'siswa';
    public $table_berita = 'berita';


    public function ambil_data_guru()
    {

        return $this->db->get($this->table_guru)->result();
    }

    public function ambil_data_berita($limit, $start)
    {
        $this->db->select("*");
        $this->db->from($this->table_berita);
        $this->db->order_by("id_berita", "desc");
        $this->db->limit($limit, $start);
        $datas = $this->db->get();
        return $datas->result();
    }

    public function ambil_data_berita_id($id)
    {
        $this->db->where('id_berita', $id);
        return $this->db->get($this->table_berita)->row();
    }

    public function ambil_data_siswa($keyword)
    {
        if ($keyword == "") {

            $data = $this->db->get('siswa');
            $this->db->order_by('tahun_masuk');
            return $data->result();
        } else {
            $this->db->select('*');
            $this->db->from('siswa');
            $this->db->order_by('tahun_masuk');
            $this->db->like('nama_siswa', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('prestasi', $keyword);
            $this->db->or_like('tahun_masuk', $keyword);
            return $this->db->get()->result();
        }
    }


    public function search_siswa($keyword)
    {
        $this->db->select("*");
        $this->db->from($this->table_siswa);
        $this->db->like('nama_siswa', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('prestasi', $keyword);
        $this->db->or_like('alamat', $keyword);
        $datas = $this->db->get();
        return $datas->result();
    }

    public function ambil_data_berita_index($limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from($this->table_berita);
        $this->db->order_by("id_berita", "desc");
        $this->db->limit($limit, $start);
        $datas = $this->db->get();

        foreach ($datas->result() as $data) {


            $output .= '
        <div class="col-lg-4 col-md-6 col-12 mt-3" data-aos="fade-up" data-aos-delay="400">

                                <div class="class-thumb">
                                <img src="<?= base_url("/assets/imagesData/cover/") . $data->cover_berita ?>"

                                    <div class="class-info">
                                        <h3 class="mb-1"><?php echo $data->judul_berita; ?></h3>

                                        <span><strong>Oleh</strong> - <?php echo $data->user; ?></span>
                                        <p></p>
                                        <span><strong>Kategori</strong> - <?php echo $data->kategori; ?> </span>
                                        <p></p>
                                        <span><strong>Diedit pada :</strong> - <?php echo date("d F Y", $data->tanggal);  </span>
                                        <p></p>
                                        <!-- <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p> -->
                                        <a href="" class="btn btn-primary">Baca Selengkapnya</a>
                                    </div>
                                </div>
                    </div>';
        }
        return $output;
        // <!-- return $data->result(); -->
    }
}
