<?php
class Admin extends CI_Model
{
    public $table_user = 'user';
    public $table_menu = 'menu';
    public $table_kategori = 'kategori';
    public $table_guru = 'guru';
    public $table_siswa = 'siswa';
    public $table_berita = 'berita';


    public function ambil_data_kategori()
    {
        return $this->db->get($this->table_kategori)->result();
    }
    public function tambah_kategori($data)
    {
        return $this->db->insert($this->table_kategori, $data);
    }
    public function ambil_data_kategori_id($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get($this->table_kategori)->row();
    }
    public function edit_kategori($data)
    {
        $id = array('id_kategori' => $this->input->post('id_kategori'));
        return $this->db->update($this->table_kategori, $data, $id);
    }

    public function delete_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete($this->table_kategori);
    }

    public function ambil_data_guru()
    {
        return $this->db->get($this->table_guru)->result();
    }

    public function tambah_guru($data)
    {
        return $this->db->insert($this->table_guru, $data);
    }

    public function ambil_data_guru_id($id)
    {
        $this->db->where('id_guru', $id);
        return $this->db->get($this->table_guru)->row();
    }
    public function edit_guru($id, $data)
    {
        $this->db->where($id);
        $this->db->update('guru', $data);
    }

    public function delete_guru($id)
    {
        $this->db->where('id_guru', $id);
        return $this->db->delete($this->table_guru);
    }

    public function ambil_data_siswa($keyword)
    {
        if ($keyword == "") {
            return $this->db->get('siswa')->result();
        } else {
            $this->db->select('*');
            $this->db->from('siswa');
            $this->db->like('nama_siswa', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('prestasi', $keyword);
            $this->db->or_like('tahun_masuk', $keyword);
            return $this->db->get()->result();
        }
    }
    public function tambah_siswa($data)
    {
        return $this->db->insert($this->table_siswa, $data);
    }
    public function ambil_data_siswa_id($id)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->get($this->table_siswa)->row();
    }
    public function edit_siswa($data)
    {
        $id = array('id_siswa' => $this->input->post('id_siswa'));
        return $this->db->update($this->table_siswa, $data, $id);
    }
    public function delete_siswa($id)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->delete($this->table_siswa);
    }

    public function tambah_berita($data)
    {
        return $this->db->insert($this->table_berita, $data);
    }
    public function ambil_data_berita()
    {
        return $this->db->get($this->table_berita)->result();
    }
    public function ambil_data_berita_id($id)
    {
        $this->db->where('id_berita', $id);
        return $this->db->get($this->table_berita)->row();
    }
    public function edit_berita($id, $data)
    {
        $this->db->where($id);
        $this->db->update('berita', $data);
    }
    public function delete_berita($id)
    {
        $this->db->where('id_berita', $id);
        return $this->db->delete($this->table_berita);
    }
}
