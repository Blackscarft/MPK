<?php 

function is_login()
{
	$ci = get_instance(); // unutuk memanggil library CI pada file ini
	if(!$ci->session->userdata('email')){
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata('roles_id');
		$menu = $ci->uri->segment(1); // untuk mengambil url setelah index.php segment 1

		$querymenu = $ci->db->get_where('users_menu',['menu' => $menu])->row_array();
		$menu_id = $querymenu['id'];

		$userAccess = $ci->db->get_where('users_access_menu',['roles_id' => $role_id, 'menu_id' => $menu_id]);

		if($userAccess->num_rows() < 1){
			redirect('auth/blocked');
		}
	}
}