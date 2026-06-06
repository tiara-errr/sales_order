<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->library('form_validation');
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelanggan_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/tambah');
        $this->load->view('templates/footer');
    }

    // =====================
    // SIMPAN
    // =====================
    public function simpan()
    {
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat'       => $this->input->post('alamat'),
            'telepon'      => $this->input->post('telepon'),
        ];

        $this->pelanggan_model->insert($data);
        redirect('pelanggan');
    }

    // =====================
    // HAPUS (PAKAI ID)
    // =====================
    public function hapus($id)
    {
        $this->pelanggan_model->delete($id);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('pelanggan');
    }

    // =====================
    // EDIT (PAKAI ID)
    // =====================
    public function edit($id)
    {
        $data['pelanggan'] = $this->pelanggan_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/edit', $data);
        $this->load->view('templates/footer');
    }

    // =====================
    // UPDATE (PAKAI ID)
    // =====================
    public function update($id)
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('pelanggan/edit/'.$id);
        } else {
            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'alamat'       => $this->input->post('alamat'),
                'telepon'      => $this->input->post('telepon'),
            ];

            $this->pelanggan_model->update($id, $data);

            $this->session->set_flashdata('success', "Data Berhasil Diupdate");
            redirect('pelanggan');
        }
    }
}