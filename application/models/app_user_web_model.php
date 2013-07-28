<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_web_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function cekUserLogin($data)
	{
		$cek['username'] 	= $data['username'];
		$cek['password'] 	= $data['password'];
		
		$q_cek_login = $this->db->get_where('dlmbg_user', $cek);
		if($q_cek_login->num_rows()>0)
		{
			foreach($q_cek_login->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['username'] = $qad->username;
				$sess_data['nama_user'] = $qad->nama_user;
				$sess_data['id_user'] = $qad->id_user;
				
				$this->session->set_userdata($sess_data);
				
				$_SESSION['ADMIN_SRIKANDI_AQUARIUM_KCFINDER']=array();
				$_SESSION['ADMIN_SRIKANDI_AQUARIUM_KCFINDER']['disabled'] = false;
				$_SESSION['ADMIN_SRIKANDI_AQUARIUM_KCFINDER']['uploadURL'] = "../../content_upload";
				$_SESSION['ADMIN_SRIKANDI_AQUARIUM_KCFINDER']['uploadDir'] = "";
			}
			redirect("superadmin");
		}
		else
		{
			$this->session->set_flashdata("result","Combine of Username and Password is not correct...!!!");
			redirect("auth/user_login");
		}
		
	}
}