<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		is_login();
		$this->load->model('menu_model');
	}

	public function index(){
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Menu Management';

		$data['menu'] = $this->db->get('users_menu')->result_array();

		$this->form_validation->set_rules('menu','Menu','required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->menu_model->insert();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New menu added</div>');
			redirect('menu');
		}	
	}
	public function delete($id){
		$this->menu_model->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Menu Deleted</div>');
		redirect('menu');
	}

	public function edit($id){
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Menu';

		$data['menu'] = $this->db->get('users_menu')->result_array();
		$data['getid'] = $this->menu_model->getIdmenu($id);

		$this->form_validation->set_rules('menu','Menu','required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('menu/edit', $data);
			$this->load->view('templates/footer');
		} else {
		 $this->menu_model->edit();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Menu has been edited</div>');
			redirect('menu');
		}	
	}

	public function submenu(){
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('users_menu')->result_array();
		$data['title'] = 'Submenu Management';

		$data['subMenu'] = $this->menu_model->getSubmenu();

		$this->form_validation->set_rules('url','Menu','required|trim');
		$this->form_validation->set_rules('title','Title','required|trim');
		$this->form_validation->set_rules('url','Url','required|trim');
		$this->form_validation->set_rules('icon','Icon','required|trim');


		if ($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');

		} else {
			$this->menu_model->insertSubmenu();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Submenu added</div>');
			redirect('menu/submenu');
		}
	}

	public function editsubmenu($id)
	{
			$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Menu';

		$data['menu'] = $this->db->get('users_menu')->result_array();
		$data['getidsubmenu'] = $this->menu_model->getIdSubmenu($id);

		$this->form_validation->set_rules('title','Title','required|trim');
		$this->form_validation->set_rules('menu_id','Menu','required|trim');
		$this->form_validation->set_rules('url','Url','required|trim');
		$this->form_validation->set_rules('icon','Icon','required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('menu/editsubmenu', $data);
			$this->load->view('templates/footer');
		} else {
		 $this->menu_model->editsubmenu();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu has been edited</div>');
			redirect('menu/submenu');
		}	
	}

	public function deletesubmenu($id){
		$this->menu_model->deletesubmenu($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu has been deleted</div>');
		redirect('menu/submenu');
	}


}