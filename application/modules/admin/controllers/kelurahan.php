<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelurahan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kelurahan($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kelurahan/bg_home");
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
			$where['id_kelurahan'] = $id_param;
			$get = $this->db->get_where("dlmbg_kelurahan",$where)->row();
			
			$d['kecamatan'] = $this->db->get("dlmbg_kecamatan");
			$d['nama_kelurahan'] = $get->kelurahan;
			$d['id_kecamatan'] = $get->id_kecamatan;
			$d['id_param'] = $get->id_kelurahan;

			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kelurahan/bg_input");
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
			$d['kecamatan'] = $this->db->get("dlmbg_kecamatan");
			$d['nama_kelurahan'] = "";
			$d['id_kecamatan'] = "";
			$d['id_param'] = "";

			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kelurahan/bg_input");
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
			$id['id_kelurahan'] = $this->input->post("id_param");
			if($tipe=="edit")
			{
				$in['kelurahan'] = $this->input->post("nama_kelurahan");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				$this->db->update("dlmbg_kelurahan",$in,$id);
			}
			else if($tipe=="tambah")
			{
				$in['kelurahan'] = $this->input->post("nama_kelurahan");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				$this->db->insert("dlmbg_kelurahan",$in);
			}
			redirect("admin/kelurahan");
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
			$where['id_kelurahan'] = $id_param;
			$this->db->delete("dlmbg_kelurahan",$where);
			redirect("admin/kelurahan");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
