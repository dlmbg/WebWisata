<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class objek_wisata extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_objek_wisata($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("objek_wisata/bg_home");
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
			$d['id_kelurahan'] = "";
			$d['nama_objek_wisata'] = "";
			$d['jenis'] = "";
			$d['alamat'] = "";
			$d['koordinat'] = "";
			$d['keterangan'] = "";
			$d['data_kelurahan'] = $this->db->get("dlmbg_kelurahan");
			$d['st'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("objek_wisata/bg_input");
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
			$where['id_objek_wisata'] = $id_param;
			$d['data_kelurahan'] = $this->db->get("dlmbg_kelurahan");
			$get = $this->db->get_where("dlmbg_objek_wisata",$where)->row();
			
			$d['id_kelurahan'] = $get->id_kelurahan;
			$d['nama_objek_wisata'] = $get->nama_objek_wisata;
			$d['jenis'] = $get->jenis;
			$d['alamat'] = $get->alamat;
			$d['koordinat'] = $get->koordinat;
			$d['keterangan'] = $get->keterangan;
			
			$d['id_param'] = $get->id_objek_wisata;
			$d['st'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("objek_wisata/bg_input");
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
			$tipe = $this->input->post("st-input");
			$id['id_objek_wisata'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_kelurahan'] = $this->input->post("id_kelurahan");
				$in['nama_objek_wisata'] = $this->input->post("nama_objek_wisata");
				$in['jenis'] = $this->input->post("jenis");
				$in['keterangan'] = $this->input->post("keterangan");
				$in['alamat'] = $this->input->post("alamat");
				$in['koordinat'] = $this->input->post("koordinat");
				$this->db->insert("dlmbg_objek_wisata",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['id_kelurahan'] = $this->input->post("id_kelurahan");
				$in['nama_objek_wisata'] = $this->input->post("nama_objek_wisata");
				$in['jenis'] = $this->input->post("jenis");
				$in['keterangan'] = $this->input->post("keterangan");
				$in['alamat'] = $this->input->post("alamat");
				$in['koordinat'] = $this->input->post("koordinat");
				$this->db->update("dlmbg_objek_wisata",$in,$id);
			}
			
			redirect("admin/objek_wisata");
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
			$where['id_objek_wisata'] = $id_param;
			$this->db->delete("dlmbg_objek_wisata",$where);
			redirect("admin/objek_wisata");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
