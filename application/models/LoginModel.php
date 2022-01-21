<?php
class LoginModel extends CI_Model
{
    public $user = 'user';
    public $menu = 'menu';
    public $table_guru = 'guru';


    public function ambil_data_guru()
    {
        return $this->db->get($this->table_guru)->result_array();
    }
}
