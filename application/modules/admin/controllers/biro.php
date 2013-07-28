<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class biro extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_biro($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("biro/bg_home");
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
			$d['nama_biro'] = "";
			$d['alamat'] = "";
			$d['telepon'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("biro/bg_input");
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
			$where['id_biro'] = $id_param;
			$get = $this->db->get_where("dlmbg_biro_wisata",$where)->row();
			
			$d['nama_biro'] = $get->nama_biro;
			$d['alamat'] = $get->alamat;
			$d['telepon'] = $get->telepon;
			
			$d['id_param'] = $get->id_biro;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("biro/bg_input");
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
			$id['id_biro'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_biro'] = $this->input->post("nama_biro");
				$in['alamat'] = $this->input->post("alamat");
				$in['telepon'] = $this->input->post("telepon");	
				$this->db->insert("dlmbg_biro_wisata",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['nama_biro'] = $this->input->post("nama_biro");
				$in['alamat'] = $this->input->post("alamat");	
				$in['telepon'] = $this->input->post("telepon");	
				$this->db->update("dlmbg_biro_wisata",$in,$id);
			}
			
			redirect("admin/biro");
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
			$where['id_biro'] = $id_param;
			$this->db->delete("dlmbg_biro_wisata",$where);
			redirect("admin/biro");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
