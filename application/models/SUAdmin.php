<?php
class SUAdmin extends CI_Model
{
    public $table_user = 'user';
    public $table_menu = 'menu';
    public $table_berita = 'berita';
    public $table_kategori = 'kategori';

    function tambah_user($data)
    {
        return $this->db->insert($this->table_user, $data);
    }

    public function ambil_data_user()
    {
        return $this->db->get($this->table_user)->result();
    }

    public function aktifkan_user($data, $id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update($this->table_user, $data);
    }
    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete($this->table_user);
    }

    public function ambil_data_user_id($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get($this->table_user)->row();
    }

    public function edit_user($data)
    {
        $id = array('id_user' => $this->input->post('id_user'));
        return $this->db->update($this->table_user, $data, $id);
    }

    public function ambil_data_menu()
    {
        return $this->db->get($this->table_menu)->result();
    }

    public function ambil_data_menu_id($id)
    {
        $this->db->where('id_menu', $id);
        return $this->db->get($this->table_menu)->row();
    }
    public function edit_menu($data)
    {
        $id = array('id_menu' => $this->input->post('id_menu'));
        return $this->db->update($this->table_menu, $data, $id);
    }
    public function ambil_data_berita($keyword, $limit, $start)
    {
        if ($keyword == "") {
            $this->db->select("*");
            $this->db->from($this->table_berita);
            $this->db->order_by("id_berita", "desc");
            $this->db->limit($limit, $start);
            $datas = $this->db->get();
            return $datas->result();
        } else {
            $this->db->select("*");
            $this->db->from($this->table_berita);
            $this->db->like('judul_berita', $keyword);
            $this->db->or_like('user', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->order_by("id_berita", "desc");
            $this->db->limit($limit, $start);
            $datas = $this->db->get();
            return $datas->result();
        }
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
    public function ambil_data_kategori()
    {
        return $this->db->get($this->table_kategori)->result();
    }
    public function ambil_data_kategori_id($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get($this->table_kategori)->row();
    }
}
