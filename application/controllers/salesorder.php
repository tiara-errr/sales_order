<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class salesorder extends CI_Controller {

   
public function __construct()
{
    parent::__construct();

    if(!$this->session->userdata('login')){
        redirect('login');
    }

    $this->load->model('salesorder_model');

    // Sales wajib validasi dulu
    if(
        $this->session->userdata('role') == 'sales'
        &&
        !$this->session->userdata('id_sales_aktif')
    ){
        redirect('dashboard');
    }

}

    public function index()
    {
        $data['data'] = $this->salesorder_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('salesorder/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['produk'] = $this->db->get('produk')->result();
        $data['pelanggan'] = $this->db->get('pelanggan')->result();
        $data['sales']     = $this->db->get('sales')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('salesorder/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
{
    $id_produk = $this->input->post('id_produk');
    $qty       = $this->input->post('qty');

    // Ambil data produk
    $produk = $this->db
        ->get_where('produk', ['id_produk' => $id_produk])
        ->row();

    $harga = $produk->harga;
    $subtotal = $harga * $qty;

    // Simpan sales order
    $data = [
        'kode_order'    => uniqid('ORD-'),
        'id_pelanggan'  => $this->input->post('id_pelanggan'),
        
'id_sales' => (
    $this->session->userdata('role') == 'sales'
)
? $this->session->userdata('id_sales_aktif')
: $this->input->post('id_sales'),


        'tanggal_order' => $this->input->post('tanggal_order'),
        'total_harga'   => $subtotal,
        'status'        => $this->input->post('status'),
        'user_id'       => $this->session->userdata('id_user')
    ];

    $this->db->insert('sales_order', $data);

    $id_order = $this->db->insert_id();

    // Simpan detail order
    $this->db->insert('detail_order', [
        'id_order' => $id_order,
        'id_produk' => $id_produk,
        'qty' => $qty,
        'harga' => $harga,
        'subtotal' => $subtotal
    ]);

   
// Kurangi stok produk
$this->db->set('stok', 'stok - '.$qty, FALSE);
$this->db->where('id_produk', $id_produk);
$this->db->update('produk');

 

    redirect('salesorder');
}


public function edit_status($id)
{
    // Sales tidak boleh ubah status
    if($this->session->userdata('role') == 'sales'){
        redirect('salesorder');
    }

    $data['order'] = $this->salesorder_model->get_by_id($id);

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('salesorder/edit_status', $data);
    $this->load->view('templates/footer');
}

public function update_status($id)
{
    $status_baru = $this->input->post('status');

    $order = $this->salesorder_model->get_by_id($id);

    $detail = $this->db
        ->get_where(
            'detail_order',
            ['id_order' => $id]
        )
        ->row();

    if($detail){

        // Aktif -> Dibatalkan
        if(
            $order->status != 'dibatalkan' &&
            $status_baru == 'dibatalkan'
        ){

            $this->db->set(
                'stok',
                'stok + '.$detail->qty,
                FALSE
            );

            $this->db->where(
                'id_produk',
                $detail->id_produk
            );

            $this->db->update('produk');
        }

        // Dibatalkan -> Aktif lagi
        if(
            $order->status == 'dibatalkan' &&
            $status_baru != 'dibatalkan'
        ){

            $this->db->set(
                'stok',
                'stok - '.$detail->qty,
                FALSE
            );

            $this->db->where(
                'id_produk',
                $detail->id_produk
            );

            $this->db->update('produk');
        }
    }

    $this->salesorder_model->update($id, [
        'status' => $status_baru
    ]);

    redirect('salesorder');
}

public function cetak($id)
{
    $this->db->select('
        sales_order.*,
        pelanggan.nama_pelanggan,
        sales.nama_sales,
        produk.nama_produk,
        detail_order.qty,
        detail_order.harga,
        detail_order.subtotal
    ');

    $this->db->from('sales_order');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');
    $this->db->join('sales', 'sales.id_sales = sales_order.id_sales');
    $this->db->join('detail_order', 'detail_order.id_order = sales_order.id_order');
    $this->db->join('produk', 'produk.id_produk = detail_order.id_produk');

    $this->db->where('sales_order.id_order', $id);

    $data['order'] = $this->db->get()->row();

    $this->load->view('salesorder/cetak', $data);
}
    public function cetak_salesorder()
{
    $data['data'] = $this->salesorder_model->get_all();

    $this->load->view('laporan/cetak_salesorder', $data);
}
}