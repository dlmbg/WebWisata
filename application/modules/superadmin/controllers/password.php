<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class password extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
   public function index()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("User Password", '/');
			
			$d['aktif_slide_banner'] = "";
			$d['aktif_category'] = "";
			$d['aktif_product'] = "";
			
			$where['id_user'] = $this->session->userdata("id_user");
			$get = $this->db->get_where("dlmbg_user",$where)->row();
			
			$d['username'] = $get->username;
			
			$d['id_param'] = $get->id_user;
			
			$this->load->view('bg_header',$d);
			$this->load->view('password/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
			$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$id['id_user'] = $this->input->post("id_param");
				$id['username'] = $this->input->post("username");
				
				$password_lama = $this->input->post("password_lama");
				$password_baru = mysql_real_escape_string($this->input->post("password_baru"));
				$ulangi_password = mysql_real_escape_string($this->input->post("ulangi_password"));
				
				$encrypt = md5(mysql_real_escape_string($password_lama).$this->config->item("key_login"));
				$cek['username'] 	= $id['username'];
				$cek['password'] 	= $encrypt;
				$q_cek_login = $this->db->get_where('dlmbg_user', $cek);
				if(count($q_cek_login->result())>0)
				{
					if($password_baru!=$ulangi_password)
					{
						$this->session->set_flashdata("simpan_akun","Password baru tidak sama");
						redirect("superadmin/password");
					}
					else
					{
						$up['password'] = md5(mysql_real_escape_string($password_baru).$this->config->item("key_login"));
						$this->db->update("dlmbg_user",$up,$id);
						$this->session->set_flashdata("simpan_akun","Password berhasil diperbaharui");
						redirect("superadmin/password");
					}
				}
				else
				{
					$this->session->set_flashdata("simpan_akun","Password lama tidak cocok");
					redirect("superadmin/password");
				}
			
			}
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
}
 
/* End of file superadmin.php */
