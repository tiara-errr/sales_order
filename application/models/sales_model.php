<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales_model extends CI_Model {

    private $table = 'sales';

    // Ambil semua data
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil data berdasarkan id
    public function get_by_id($id)
    {
        $this->db->where('id_sales', $id);
        return $this->db->get($this->table)->row();
    }

    // Insert data
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Hapus data
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_sales' => $id]);
    }

    // Update data
    public function update($id, $data)
    {
        $this->db->where('id_sales', $id);
        return $this->db->update($this->table, $data);
    }
}