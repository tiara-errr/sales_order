<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sales_model');
        $this->load->library('form_validation');
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['sales'] = $this->sales_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/tambah');
        $this->load->view('templates/footer');
    }

    // =====================
    // SIMPAN
    // =====================
    
    public function simpan()
    {
    $data = [
        'sales_id'   => $this->input->post('sales_id'),
        'nama_sales' => $this->input->post('nama_sales')
    ];

    $this->sales_model->insert($data);
    redirect('sales');
    }

    // =====================
    // HAPUS (PAKAI ID)
    // =====================
    public function hapus($id)
    {
        $this->sales_model->delete($id);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('sales');
    }

    // =====================
    // EDIT (PAKAI ID)
    // =====================
    public function edit($id)
    {
        $data['sales'] = $this->sales_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/edit', $data);
        $this->load->view('templates/footer');
    }

    // =====================
    // UPDATE (PAKAI ID)
    // =====================
    public function update($id)
    {
    $this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required');

    if ($this->form_validation->run() == FALSE) {

        redirect('sales/edit/'.$id);

    } else {

        $data = [
            'sales_id'   => $this->input->post('sales_id'),
            'nama_sales' => $this->input->post('nama_sales')
        ];

        $this->sales_model->update($id, $data);

        redirect('sales');
    }
    }
}