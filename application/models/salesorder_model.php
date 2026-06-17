
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class salesorder_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('
            sales_order.*,
            pelanggan.nama_pelanggan,
            sales.nama_sales,
            produk.nama_produk,
            detail_order.qty,
            detail_order.harga
        ');

        $this->db->from('sales_order');

        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );

        $this->db->join(
            'sales',
            'sales.id_sales = sales_order.id_sales'
        );

        $this->db->join(
            'detail_order',
            'detail_order.id_order = sales_order.id_order'
        );

        $this->db->join(
            'produk',
            'produk.id_produk = detail_order.id_produk'
        );

        // Filter khusus role sales
        if(
            $this->session->userdata('role') == 'sales'
            &&
            $this->session->userdata('id_sales_aktif')
        ){
            $this->db->where(
                'sales_order.id_sales',
                $this->session->userdata('id_sales_aktif')
            );
        }

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('sales_order', $data);
    }

    public function get_by_id($id)
    {
        $this->db->where('id_order', $id);
        return $this->db->get('sales_order')->row();
    }

    public function delete($id)
    {
        return $this->db->delete('sales_order', [
            'id_order' => $id
        ]);
    }

    public function update($id, $data)
    {
        $this->db->where('id_order', $id);
        return $this->db->update('sales_order', $data);
    }
}

