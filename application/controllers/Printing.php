<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Printing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('area_model');
        $this->load->model('pelanggan_model');
        $this->load->model('mpk_model');
        $this->load->model('printing_model');
    }

    public function mpk()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';
        $data['mpks'] = $this->printing_model->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('printing/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('script/modalUraian');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Konfirmasi MPK';
        $data['urlSubmit'] = 'printing/detail/' . $id;
        $data['areas'] = $this->area_model->get();
        $data['pelanggans'] = $this->pelanggan_model->get();
        $data['mpks'] = $this->mpk_model->getById($id);

        $this->form_validation->set_rules('area', 'area', 'required|trim', ['required' => 'Area Harus diisi !']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('printing/detail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->printing_model->konfirmasi($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk di konfirmasi</div>');
            redirect('printing/mpk');
        }
    }
}
