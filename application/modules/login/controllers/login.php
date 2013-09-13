<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$this->load->view($GLOBALS['site_theme']."/login/login");
		}
		else
		{
			redirect("app_route");
		}
	}
 

	function register()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$this->load->view($GLOBALS['site_theme']."/login/register");
		}
		else
		{
			redirect("app_route");
		}
	}
	
	function act()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$dt['username'] = $_POST['username'];
 			$dt['password'] = $_POST['password'];
			$this->app_user_login_model->cekUserLogin($dt);
		}
		else
		{
			redirect("app_route");
		}
	}
	
	function act_register()
	{
		if($this->session->userdata("logged_in")=="")
		{
			$this->db->set('kode_user',"REPLACE(UUID(),'-','')",FALSE); 
			$this->db->set("username",$this->input->post("username"));
			$this->db->set("password",md5($this->input->post("password").$GLOBALS['key_login']));
			$this->db->set("nama_user",$this->input->post("nama_user"));
			$this->db->set("level","member");
			
			$this->db->insert("dlmbg_user");
			$this->session->set_flashdata("result_login","proses registrasi berhasil...");
			redirect("login");
		}
		else
		{
			redirect("app_route");
		}
	}
	
	function logout()
	{
		if($this->session->userdata("logged_in")!="")
		{
 			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
}
