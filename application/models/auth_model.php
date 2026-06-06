<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db->get_where('user', [
            'username' => $username,
            'password' => $password
        ])->row();
    }

}