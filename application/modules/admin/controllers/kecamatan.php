<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kecamatan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kecamatan($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kecamatan/bg_home");
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
			$where['id_kecamatan'] = $id_param;
			$get = $this->db->get_where("dlmbg_kecamatan",$where)->row();
			
			$d['nama_kecamatan'] = $get->nama_kecamatan;
			$d['id_param'] = $get->id_kecamatan;

			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kecamatan/bg_input");
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
			$d['nama_kecamatan'] = "";
			$d['id_param'] = "";

			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kecamatan/bg_input");
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
			$id['id_kecamatan'] = $this->input->post("id_param");
			if($tipe=="edit")
			{
				$in['nama_kecamatan'] = $this->input->post("nama_kecamatan");
				$this->db->update("dlmbg_kecamatan",$in,$id);
			}
			else if($tipe=="tambah")
			{
				$in['nama_kecamatan'] = $this->input->post("nama_kecamatan");
				$this->db->insert("dlmbg_kecamatan",$in);
			}
			redirect("admin/kecamatan");
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
			$where['id_kecamatan'] = $id_param;
			$this->db->delete("dlmbg_kecamatan",$where);
			redirect("admin/kecamatan");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
