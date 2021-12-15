<?php
class Admin extends CI_Model
{
    public $table_user = 'user';
    public $table_menu = 'menu';
    public $table_kategori = 'kategori';
    public $table_guru = 'guru';


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
    public function edit_guru($data)
    {
        $id = array('id_guru' => $this->input->post('id_guru'));
        return $this->db->update($this->table_guru, $data, $id);
    }

    public function delete_guru($id)
    {
        $this->db->where('id_guru', $id);
        return $this->db->delete($this->table_guru);
    }
}
