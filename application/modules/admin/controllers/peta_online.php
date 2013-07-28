<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peta_online extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_peta_online($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("peta_online/bg_home");
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
			
			$d['id_param'] = "";
			$d['jenis'] = "";
			$d['id_kelurahan'] = "";
			$d['lat'] = "";
			$d['long'] = "";
			$d['judul'] = "";
			$d['keterangan'] = "";
			$d['data_kelurahan'] = $this->db->get("dlmbg_kelurahan");
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("peta_online/bg_input");
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
			$where['id_peta_online'] = $id_param;
			$d['data_kelurahan'] = $this->db->get("dlmbg_kelurahan");
			$get = $this->db->get_where("dlmbg_peta_online",$where)->row();
			
			$d['id_kelurahan'] = $get->id_kelurahan;
			$d['jenis'] = $get->jenis;
			$d['lat'] = $get->lat;
			$d['long'] = $get->lang;
			$d['judul'] = $get->judul;
			$d['lat'] = $get->lat;
			$d['keterangan'] = $get->keterangan;
			
			$d['id_param'] = $get->id_peta_online;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("peta_online/bg_input");
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
			$id['id_peta_online'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_kelurahan'] = $this->input->post("id_kelurahan");
				$in['judul'] = $this->input->post("judul");
				$in['jenis'] = $this->input->post("jenis");
				$in['keterangan'] = $this->input->post("keterangan");
				$in['lat'] = $this->input->post("lat");
				$in['lang'] = $this->input->post("long");
				$this->db->insert("dlmbg_peta_online",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['id_kelurahan'] = $this->input->post("id_kelurahan");
				$in['judul'] = $this->input->post("judul");
				$in['jenis'] = $this->input->post("jenis");
				$in['keterangan'] = $this->input->post("keterangan");
				$in['lat'] = $this->input->post("lat");
				$in['lang'] = $this->input->post("long");
				$this->db->update("dlmbg_peta_online",$in,$id);
			}
			
			redirect("admin/peta_online");
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
			$where['id_peta_online'] = $id_param;
			$this->db->delete("dlmbg_peta_online",$where);
			redirect("admin/peta_online");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
