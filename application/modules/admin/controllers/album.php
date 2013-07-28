<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class album extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_album($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("album/bg_home");
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
			$where['id_album'] = $id_param;
			$get = $this->db->get_where("dlmbg_album",$where)->row();
			
			$d['album'] = $get->album;
			$d['id_param'] = $get->id_album;

			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("album/bg_input");
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
			$d['album'] = "";
			$d['id_param'] = "";

			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("album/bg_input");
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
			$id['id_album'] = $this->input->post("id_param");
			if($tipe=="edit")
			{
				$in['album'] = $this->input->post("album");
				$this->db->update("dlmbg_album",$in,$id);
			}
			else if($tipe=="tambah")
			{
				$in['album'] = $this->input->post("album");
				$this->db->insert("dlmbg_album",$in);
			}
			redirect("admin/album");
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
			$where['id_album'] = $id_param;
			$this->db->delete("dlmbg_album",$where);
			redirect("admin/album");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
