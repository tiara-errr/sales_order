
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['total_produk']    = $this->db->count_all('produk');
        $data['total_pelanggan'] = $this->db->count_all('pelanggan');
        $data['total_sales']     = $this->db->count_all('sales');
        $data['total_order']     = $this->db->count_all('sales_order');

        $data['sales_list'] = $this->db->get('sales')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function validasi_sales()
    {
        $id_sales = $this->input->post('id_sales');
        $sales_id = $this->input->post('sales_id');

        $sales = $this->db
            ->get_where('sales', [
                'id_sales' => $id_sales
            ])
            ->row();

        if($sales){

            if($sales->sales_id == $sales_id){

                $this->session->set_userdata([
                    'id_sales_aktif'   => $sales->id_sales,
                    'sales_id_aktif'   => $sales->sales_id,
                    'nama_sales_aktif' => $sales->nama_sales
                ]);

                redirect('salesorder');

            }else{

                $this->session->set_flashdata(
                    'error',
                    'ID Sales tidak sesuai!'
                );

                redirect('dashboard');
            }

        }else{

            $this->session->set_flashdata(
                'error',
                'Data Sales tidak ditemukan!'
            );

            redirect('dashboard');
        }
    }

    public function logout_sales()
    {
        $this->session->unset_userdata('id_sales_aktif');
        $this->session->unset_userdata('sales_id_aktif');
        $this->session->unset_userdata('nama_sales_aktif');

        redirect('dashboard');
    }
}

