
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    // ==========================
    // LAPORAN PRODUK
    // ==========================


public function produk()
{
    $id_produk = $this->input->get('id_produk');

    $this->db->select('
        produk.*,
        IFNULL(SUM(detail_order.qty),0) as terjual
    ');

    $this->db->from('produk');

    $this->db->join(
        'detail_order',
        'detail_order.id_produk = produk.id_produk',
        'left'
    );

    $this->db->join(
        'sales_order',
        'sales_order.id_order = detail_order.id_order',
        'left'
    );

    $this->db->group_start();
    $this->db->where('sales_order.status IS NULL');
    $this->db->or_where('sales_order.status !=', 'dibatalkan');
    $this->db->group_end();

    if($id_produk){
        $this->db->where('produk.id_produk', $id_produk);
    }

    $this->db->group_by('produk.id_produk');

    $data['data'] = $this->db->get()->result();

    $data['produk'] = $this->db->get('produk')->result();
    $data['id_produk'] = $id_produk;

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan/produk', $data);
    $this->load->view('templates/footer');
}


public function cetak_produk()
{
    $id_produk = $this->input->get('id_produk');

    $this->db->select('
        produk.*,
        IFNULL(SUM(detail_order.qty),0) as terjual
    ');

    $this->db->from('produk');

    $this->db->join(
        'detail_order',
        'detail_order.id_produk = produk.id_produk',
        'left'
    );

    $this->db->join(
        'sales_order',
        'sales_order.id_order = detail_order.id_order',
        'left'
    );

    $this->db->group_start();
    $this->db->where('sales_order.status IS NULL');
    $this->db->or_where('sales_order.status !=', 'dibatalkan');
    $this->db->group_end();

    if($id_produk){
        $this->db->where('produk.id_produk', $id_produk);
    }

    $this->db->group_by('produk.id_produk');

    $data['data'] = $this->db->get()->result();

    $this->load->view('laporan/cetak_produk', $data);
}


    // ==========================
    // LAPORAN SALES
    // ==========================
   
public function sales()
{
    $id_sales = $this->input->get('id_sales');

    $this->db->select('
        sales_order.*,
        sales.nama_sales,
        pelanggan.nama_pelanggan
    ');

    $this->db->from('sales_order');
    $this->db->join(
        'sales',
        'sales.id_sales = sales_order.id_sales'
    );
    $this->db->join(
        'pelanggan',
        'pelanggan.id_pelanggan = sales_order.id_pelanggan'
    );

    if($id_sales){
        $this->db->where('sales_order.id_sales', $id_sales);
    }

    $data['data'] = $this->db->get()->result();

    $data['sales'] = $this->db->get('sales')->result();
    $data['id_sales'] = $id_sales;

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan/sales', $data);
    $this->load->view('templates/footer');
}

    
public function cetak_sales()
{
    $id_sales = $this->input->get('id_sales');

    $this->db->select('
        sales_order.*,
        sales.nama_sales,
        pelanggan.nama_pelanggan
    ');

    $this->db->from('sales_order');
    $this->db->join(
        'sales',
        'sales.id_sales = sales_order.id_sales'
    );
    $this->db->join(
        'pelanggan',
        'pelanggan.id_pelanggan = sales_order.id_pelanggan'
    );

    if($id_sales){
        $this->db->where('sales_order.id_sales', $id_sales);
    }

    $data['data'] = $this->db->get()->result();

    $this->load->view('laporan/cetak_sales', $data);
}

    // ==========================
    // LAPORAN PERIODE
    // ==========================
    public function periode()
    {
        $tanggal_awal  = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        $this->db->select('
            sales_order.*,
            sales.nama_sales,
            pelanggan.nama_pelanggan
        ');

        $this->db->from('sales_order');
        $this->db->join('sales',
            'sales.id_sales = sales_order.id_sales');
        $this->db->join('pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan');

        if($tanggal_awal && $tanggal_akhir){
            $this->db->where('tanggal_order >=', $tanggal_awal);
            $this->db->where('tanggal_order <=', $tanggal_akhir);
        }

        $data['data'] = $this->db->get()->result();
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/periode', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_periode()
    {
        $tanggal_awal  = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        $this->db->select('
            sales_order.*,
            sales.nama_sales,
            pelanggan.nama_pelanggan
        ');

        $this->db->from('sales_order');
        $this->db->join('sales',
            'sales.id_sales = sales_order.id_sales');
        $this->db->join('pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan');

        if($tanggal_awal && $tanggal_akhir){
            $this->db->where('tanggal_order >=', $tanggal_awal);
            $this->db->where('tanggal_order <=', $tanggal_akhir);
        }

        $data['data'] = $this->db->get()->result();
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        $this->load->view('laporan/cetak_periode', $data);
    }
}

