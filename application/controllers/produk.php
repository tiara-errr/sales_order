<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['produk'] = $this->produk_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->tambah();

        } else {

            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'kode'        => $this->input->post('kode'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            ];

            $this->produk_model->insert($data);

            redirect('produk');
        }
    }

    public function hapus($id)
    {
        $this->produk_model->delete($id);
        redirect('produk');
    }

    public function edit($id)
    {
        $data['produk'] = $this->produk_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->edit($id);

        } else {

            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'kode'        => $this->input->post('kode'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            ];

            $this->produk_model->update($id, $data);

            redirect('produk');
        }
    }
}