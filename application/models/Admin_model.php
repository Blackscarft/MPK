<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function insert(){
		$data = [
			'roles' => htmlspecialchars($this->input->post('role',true))
		];
		return $this->db->insert('users_roles',$data);
	}

	public function getid($id){
		return $this->db->get_where('users_roles',['id' => $id])->row_array();
	}

	public function delete($id){
		$this->db->delete('users_roles',['id' => $id]);
	}

	public function edit(){
		$data = [
			'roles' => htmlspecialchars($this->input->post('role',true))
		];

		$this->db->where('id',$this->input->post('id'));
		$this->db->update('users_roles',$data);

	}
}