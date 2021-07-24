<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('area_model');
        $this->load->model('pelanggan_model');
        $this->load->model('mpk_model');
        $this->load->model('laporan_model');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Laporan MPK';

        $data['pelanggans'] = $this->pelanggan_model->get();

        $data['mpks'] = $this->mpk_model->getKonfirmasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('laporan/script', $data);
    }

    public function getLaporan()
    {
        $mulai = date('Y-m-d', strtotime($this->input->post('mulai')));
        $selesai = date('Y-m-d', strtotime($this->input->post('selesai')));
        $pelanggan = $this->input->post('pelanggan');

        $data = $this->laporan_model->getLaporan($mulai, $selesai, $pelanggan);
        echo json_encode($data);
    }
}
