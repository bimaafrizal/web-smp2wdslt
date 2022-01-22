<?php
class LoginModel extends CI_Model
{
    public $user = 'user';
    public $menu = 'menu';
    public $table_guru = 'guru';
    public $table_siswa = 'siswa';


    public function ambil_data_guru()
    {
        return $this->db->get($this->table_guru)->result();
    }
    public function ambil_data_siswa()
    {
        return $this->db->get($this->table_siswa)->result();
    }
}
