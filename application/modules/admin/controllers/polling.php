<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class polling extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_polling($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("polling/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
   
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_polling'] = $id_param;
			$get = $this->db->get_where("dlmbg_polling",$where)->row();
			
			$d['soal'] = $get->soal;
			$d['aktif'] = $get->aktif;
			$d['id_param'] = $get->id_polling;

			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("polling/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
   
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['soal'] = "";
			$d['aktif'] = "";
			$d['id_param'] = "";

			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("polling/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_polling'] = $this->input->post("id_param");
			if($tipe=="edit")
			{
				$in['soal'] = $this->input->post("soal");
				$in['aktif'] = $this->input->post("aktif");
				$this->db->update("dlmbg_polling",$in,$id);
			}
			else if($tipe=="tambah")
			{
				$in['soal'] = $this->input->post("soal");
				$in['aktif'] = $this->input->post("aktif");
				$this->db->insert("dlmbg_polling",$in);
			}
			redirect("admin/polling");
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
			$where['id_polling'] = $id_param;
			$this->db->delete("dlmbg_polling",$where);
			redirect("admin/polling");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
