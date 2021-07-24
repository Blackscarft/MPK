<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_login();
    $this->load->model('pelanggan_model');
    $this->load->model('area_model');
  }

  // show data area
  public function area()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Daftar Area';

    $data['areas'] = $this->area_model->get();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('area/index', $data);
    $this->load->view('templates/footer');
  }

  // show input area
  public function addArea()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Tambah Data Area';
    $data['urlSubmit'] = 'Master/addArea';

    $this->form_validation->set_rules('kodeArea', 'Kode Area', 'required|trim', ['required' => 'Kode Area Harus diisi']);
    $this->form_validation->set_rules('namaArea', 'Nama Area', 'required|trim', ['required' => 'Nama Area Harus diisi']);


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('area/input', $data);
      $this->load->view('templates/footer');
    } else {
      $this->area_model->add();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Area berhasil ditambahkan</div>');
      redirect('master/area');
    }
  }

  // show edit area
  public function editArea($id)
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Data Area';
    $data['urlSubmit'] = "Master/editArea/$id";
    $data['detail'] = $this->area_model->getById($id);

    $this->form_validation->set_rules('kodeArea', 'Kode Area', 'required|trim', ['required' => 'Kode Area Harus diisi']);
    $this->form_validation->set_rules('namaArea', 'Nama Area', 'required|trim', ['required' => 'Nama Area Harus diisi']);


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('area/input', $data);
      $this->load->view('templates/footer');
    } else {
      $this->area_model->edit($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Area berhasil diedit</div>');
      redirect('master/area');
    }
  }

  // delete data area
  public function deleteArea($id)
  {
    $this->area_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Area berhasil dihapus</div>');
    redirect('master/area');
  }

  // ************************
  // * Pelanggan Controller *
  // ************************

  // show data pelanggan
  public function pelanggan()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Daftar Pelanggan';

    $data['pelanggans'] = $this->pelanggan_model->get();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('pelanggan/index', $data);
    $this->load->view('templates/footer');
  }

  // show input data pelanggan
  public function addPelanggan()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Input Pelanggan';
    $data['urlSubmit'] = 'master/addPelanggan';

    $this->form_validation->set_rules('nmPelanggan', 'Nama Pelanggan', 'required|trim', ['required' => 'Nama Pelanggan Harus diisi']);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('pelanggan/input', $data);
      $this->load->view('templates/footer');
    } else {
      $this->pelanggan_model->add();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pelanggan berhasil ditambahkan</div>');
      redirect('master/pelanggan');
    }
  }

  // show edit data pelanggan
  public function editPelanggan($id)
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Pelanggan';
    $data['urlSubmit'] = "master/editPelanggan/$id";

    $data['detail'] = $this->pelanggan_model->getById($id);


    $this->form_validation->set_rules('nmPelanggan', 'Nama Pelanggan', 'required|trim', ['required' => 'Nama Pelanggan Harus diisi']);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('pelanggan/input', $data);
      $this->load->view('templates/footer');
    } else {
      $this->pelanggan_model->edit($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pelanggan berhasil diedit</div>');
      redirect('master/pelanggan');
    }
  }

  // delete data pelanggan
  public function deletePelangan($id)
  {
    $this->pelanggan_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pelanggan berhasil dihapus</div>');
    redirect('master/pelanggan');
  }
}
