<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_login extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
		if($this->session->userdata("logged_in")=="")
		{
			$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
			$d['menu_kategori'] = $this->app_global_web_model->generate_menu_product($parent=0,$hasil=''," id='browser' class='filetree'");
			$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');
			
			$d['title'] = "Log In Superadmin";
			$d['dt_captcha'] = $this->app_global_web_model->generate_captcha();
			
			$this->breadcrumb->append_crumb('Home', base_url());
			$this->breadcrumb->append_crumb('Log In Superadmin', '/');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view($_SESSION['site_theme'].'/web/bg_header',$d);
				$this->load->view($_SESSION['site_theme'].'/web/bg_left');
				$this->load->view($_SESSION['site_theme'].'/web/user_login/bg_home');
				$this->load->view($_SESSION['site_theme'].'/web/bg_footer');
			}
			else
			{
				$expiration = time()-3600;
				$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
				
				$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND captcha_time > ?";
				$binds = array($_POST['captcha'], $expiration);
				$query = $this->db->query($sql, $binds);
				$row = $query->row();
				if ($row->count == 0)
				{
					$this->session->set_flashdata('result', '<p>Captcha code is not valid</p>');
					redirect("auth/user_login");
				}
				else
				{
					$where['username'] = mysql_real_escape_string($this->input->post("username"));
					$where['password'] = md5(mysql_real_escape_string($this->input->post("password").$this->config->item("key_login")));
					$this->app_user_web_model->cekUserLogin($where);
				}
			}
		}
		else
		{
			redirect("superadmin");
		}
   }
   
   function logout()
   {
		$this->session->sess_destroy();
		session_destroy();
		redirect("auth/user_login");
   }
}
 
/* End of file superadmin.php */
