<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getIdmenu($id)
	{
		return $this->db->get_where('users_menu',['id' => $id])->row_array();
	}

	public function insert(){
		$this->db->insert('users_menu',['menu' => $this->input->post('menu')]);
	}

	public function edit(){
		$data = [
			'menu' => htmlspecialchars($this->input->post('menu',true))
		];
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('users_menu',$data);
	}

	public function delete($id){
		$this->db->delete('users_menu',['id' => $id]);
	}

	public function getSubmenu(){
		$query = "SELECT `users_sub_menu`.*,`users_menu`.`menu` 
							FROM `users_sub_menu` JOIN `users_menu`
							ON `users_sub_menu`.`menu_id` = `users_menu`.`id`
						";
		return $this->db->query($query)->result_array();
	}

	public function getIdSubmenu($id){
		return $this->db->get_where('users_sub_menu',['id' => $id])->row_array();
	}

	public function insertSubmenu(){
		$data = [
			'title' => htmlspecialchars($this->input->post('title',true)),
			'menu_id' => htmlspecialchars($this->input->post('menu_id',true)),
			'url' => htmlspecialchars($this->input->post('url',true)),
			'icon' => htmlspecialchars($this->input->post('icon',true)),
			'is_active' => htmlspecialchars($this->input->post('is_active',true))
		];

		$this->db->insert('users_sub_menu',$data);
	}

	public function editsubmenu(){
		$data = [
			'menu_id' => htmlspecialchars($this->input->post('menu_id',true)),
			'title' => htmlspecialchars( $this->input->post('title',true)),
			'url' => htmlspecialchars($this->input->post('url',true)),
			'icon' => htmlspecialchars($this->input->post('icon',true)),
			'is_active' => htmlspecialchars($this->input->post('is_active',true))
		];

		$this->db->where('id',$this->input->post('id'));
		$this->db->update('users_sub_menu',$data);
	}

	public function deletesubmenu($id){
		$this->db->delete('users_sub_menu',['id' => $id]);
	}
}