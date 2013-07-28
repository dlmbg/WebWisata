<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class restoran extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_restoran($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("restoran/bg_home");
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
			$d['nama'] = "";
			$d['alamat'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("restoran/bg_input");
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
			$where['id_restoran'] = $id_param;
			$get = $this->db->get_where("dlmbg_restoran",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['alamat'] = $get->alamat;
			
			$d['id_param'] = $get->id_restoran;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("restoran/bg_input");
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
			$id['id_restoran'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['alamat'] = $this->input->post("alamat");	
				$this->db->insert("dlmbg_restoran",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['alamat'] = $this->input->post("alamat");	
				$this->db->update("dlmbg_restoran",$in,$id);
			}
			
			redirect("admin/restoran");
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
			$where['id_restoran'] = $id_param;
			$this->db->delete("dlmbg_restoran",$where);
			redirect("admin/restoran");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
