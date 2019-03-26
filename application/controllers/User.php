<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{

		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'My Profile';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit(){
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Profile';

		$this->form_validation->set_rules('name','Full Name','required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');	
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			// jika upload gambar

			$upload_img = $_FILES['image']['name'];

			if($upload_img){
				// var_dump($upload_img);
				// die();
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profiles/';

				$this->load->library('upload', $config);
				$image = $this->input->post('image');

				if($this->upload->do_upload('image')){
					$new_img = $this->upload->data('file_name');
					$this->db->set('image', $new_img);
				} else {
					echo $this->upload->display_errors();
				}

			}

			$this->db->set('name', $name);
			$this->db->where('email',$email);
			$this->db->update('users');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your Profile Has been updated </div>');
			redirect('user');
		}
	}
}
