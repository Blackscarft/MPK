<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('admin_model');
	}

	public function index()
	{

		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{

		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$data['roles'] = $this->db->get('users_roles')->result_array();


		$this->form_validation->set_rules('role','Role','required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$this->admin_model->insert();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New menu added</div>');
			redirect('admin/role');
		}	
	}

	public function delete($id){
		$this->admin_model->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deleted roles</div>');
		redirect('admin/role');
	}

	public function edit($id){

		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$data['getid'] = $this->admin_model->getid($id);

		$this->form_validation->set_rules('role','Role','required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('admin/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->admin_model->edit();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New menu added</div>');
			redirect('admin/role');
		}	
	}

	public function roleaccess($role_id){
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$data['getid'] = $this->admin_model->getid($role_id);

		$this->db->where('id !=',1);
		$data['menu'] = $this->db->get('users_menu')->result_array();

		$this->form_validation->set_rules('role','Role','required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('admin/role_access', $data);
			$this->load->view('templates/footer');
		} else {
			$this->admin_model->edit();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New menu added</div>');
			redirect('admin/role');
		}	
	}

	public function changeaccess(){
		$data = [
			'roles_id' => $this->input->post('roleid'), //post diambil dari data ajax
			'menu_id' => $this->input->post('menuid')
		];

		$result = $this->db->get_where('users_access_menu',$data);
		if($result->num_rows() < 1){
			$this->db->insert('users_access_menu',$data);
		} else {
			$this->db->delete('users_access_menu',$data);
		}
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Access change!</div>');
	}
}
