<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class thread_forum extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_thread_forum($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("thread_forum/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }

	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_forum'] = $id_param;
			$this->db->delete("dlmbg_thread_forum",$where);
			$this->db->delete("dlmbg_reply_forum",$where);
			redirect("admin/thread_forum");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
