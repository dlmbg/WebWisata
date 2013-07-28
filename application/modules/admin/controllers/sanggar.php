<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sanggar extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_sanggar($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("sanggar/bg_home");
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
			$d['kelurahan'] = $this->db->get("dlmbg_kelurahan");
			$d['id_kelurahan'] = "";
			$d['nama_sanggar'] = "";
			$d['alamat'] = "";
			$d['keterangan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("sanggar/bg_input");
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
			$where['id_sanggar'] = $id_param;
			$d['kelurahan'] = $this->db->get("dlmbg_kelurahan");
			$get = $this->db->get_where("dlmbg_sanggar",$where)->row();
			
			$d['id_kelurahan'] = $get->id_kelurahan;
			$d['nama_sanggar'] = $get->nama_sanggar;
			$d['alamat'] = $get->alamat;
			$d['keterangan'] = $get->keterangan;
			
			$d['id_param'] = $get->id_sanggar;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("sanggar/bg_input");
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
			$id['id_sanggar'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_kelurahan'] = $this->input->post("id_kelurahan");
				$in['nama_sanggar'] = $this->input->post("nama_sanggar");
				$in['alamat'] = $this->input->post("alamat");
				$in['keterangan'] = $this->input->post("keterangan");
				$this->db->insert("dlmbg_sanggar",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['id_kelurahan'] = $this->input->post("id_kelurahan");
				$in['nama_sanggar'] = $this->input->post("nama_sanggar");
				$in['alamat'] = $this->input->post("alamat");
				$in['keterangan'] = $this->input->post("keterangan");
				$this->db->update("dlmbg_sanggar",$in,$id);
			}
			
			redirect("admin/sanggar");
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
			$where['id_sanggar'] = $id_param;
			$this->db->delete("dlmbg_sanggar",$where);
			redirect("admin/sanggar");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
