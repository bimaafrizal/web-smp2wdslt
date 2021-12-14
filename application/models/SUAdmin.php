<?php
class SUAdmin extends CI_Model
{
    public $table_user = 'user';
    public $table_menu = 'menu';

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
}
