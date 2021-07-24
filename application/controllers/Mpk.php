<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('area_model');
        $this->load->model('pelanggan_model');
        $this->load->model('mpk_model');
    }

    public function data()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';

        $data['mpks'] = $this->mpk_model->get();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('mpk/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('script/modalUraian');
    }

    public function konfirm()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';

        $data['mpks'] = $this->mpk_model->getKonfirmasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('mpk/konfirm', $data);
        $this->load->view('templates/footer');
        $this->load->view('script/modalUraian');
    }

    public function input()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Input MPK';
        $data['urlSubmit'] = 'mpk/input';
        $data['areas'] = $this->area_model->get();
        $data['pelanggans'] = $this->pelanggan_model->get();

        $this->form_validation->set_rules('kodeArea', 'Pelanggan', 'required|trim', ['required' => 'Area Harus diisi !']);
        $this->form_validation->set_rules('kodePelanggan', 'kodePelanggan', 'required|trim', ['required' => 'Pelanggan Harus diisi !']);
        $this->form_validation->set_rules('date', 'date', 'required|trim', ['required' => 'Tanggal Harus diisi !']);
        $this->form_validation->set_rules('uraian', 'uraian', 'required|trim', ['required' => 'Uraian Harus diisi !']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('mpk/input', $data);
            $this->load->view('templates/footer');
            $this->load->view('script/datePicker', $data);
        } else {
            $this->mpk_model->add();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk berhasil ditambahkan</div>');
            redirect('mpk/data');
        }
    }

    public function editMpk($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit MPK';
        $data['urlSubmit'] = 'mpk/editMpk/' . $id;
        $data['areas'] = $this->area_model->get();
        $data['pelanggans'] = $this->pelanggan_model->get();
        $data['mpks'] = $this->mpk_model->getById($id);

        $this->form_validation->set_rules('kodeArea', 'area', 'required|trim', ['required' => 'Area Harus diisi !']);
        $this->form_validation->set_rules('kodePelanggan', 'kodePelanggan', 'required|trim', ['required' => 'Pelanggan Harus diisi !']);
        $this->form_validation->set_rules('date', 'date', 'required|trim', ['required' => 'Tanggal Harus diisi !']);
        $this->form_validation->set_rules('uraian', 'uraian', 'required|trim', ['required' => 'Uraian Harus diisi !']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('mpk/input', $data);
            $this->load->view('templates/footer');
            $this->load->view('script/datePicker', $data);
        } else {
            $this->mpk_model->edit($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk berhasil diedit</div>');
            redirect('mpk/data');
        }
    }

    public function deleteMpk($id)
    {
        $this->mpk_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mpk berhasil dihapus</div>');
        redirect('mpk/data');
    }

    public function cetak($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar MPK';

        $data['mpk'] = $this->mpk_model->getById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mpk/cetak', $data);
    }
}
