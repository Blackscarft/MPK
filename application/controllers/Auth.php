<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index() //login page view
	{
		// mencegah setelah login kembali ke auth
		if ($this->session->userdata('email')){
			redirect('auth');
		};
		
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() == false){
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login(); //methode login private
		}


	}

	public function registration() //Registration page
	{
		// mencegah setelah login kembali ke auth
		if ($this->session->userdata('email')){
			redirect('auth');
		};
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[users.email]',[
			'is_unique' => 'Email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]',[
			'matches'    => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false ){
			$data['title'] = 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else{
			$this->auth_model->registration();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please Login! </div>');
			redirect('auth');
		}
	}

	private function _login()
	{
		$email    = $this->input->post('email');
		$password = $this->input->post('password');
		
		$user     = $this->db->get_where('users',['email' => $email])->row_array();

		//if there is user
		if($user){
			//if user actived
			if($user['is_active'] == 1 ){
				//check password | if password verify same with users password
				if(password_verify($password, $user['password'])) {
					$data =[
						'email' => $user['email'],
						'roles_id' => $user['roles_id']
					];
					$this->session->set_userdata($data);
					//check roles id
					if($this->session->userdata('roles_id') == 1){
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password! </div>');
				redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This email has not been activated! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('roles_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been log out!</div>');
		redirect('auth');
	}

	public function blocked(){
		$this->load->view('auth/blocked');
	}

}
