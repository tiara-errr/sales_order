<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk_model extends CI_Model {

    private $table = 'produk';

    // Ambil semua data produk
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil data produk berdasarkan id
    public function get_by_id($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->get($this->table)->row();
    }

    // Insert data produk
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update data produk
    public function update($id, $data)
    {
        $this->db->where('id_produk', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete data produk
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_produk' => $id]);
    }
}