<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hotel extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_hotel($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("hotel/bg_home");
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
			$d['nama_hotel'] = "";
			$d['telepon'] = "";
			$d['jml_kamar'] = "";
			$d['alamat'] = "";
			$d['keterangan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("hotel/bg_input");
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
			$where['id_hotel'] = $id_param;
			$get = $this->db->get_where("dlmbg_hotel",$where)->row();
			
			$d['nama_hotel'] = $get->nama_hotel;
			$d['telepon'] = $get->telepon;
			$d['jml_kamar'] = $get->jml_kamar;
			$d['alamat'] = $get->alamat;
			$d['keterangan'] = $get->keterangan;
			
			$d['id_param'] = $get->id_hotel;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("hotel/bg_input");
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
			$id['id_hotel'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_hotel'] = $this->input->post("nama_hotel");
				$in['telepon'] = $this->input->post("telepon");
				$in['jml_kamar'] = $this->input->post("jml_kamar");
				$in['alamat'] = $this->input->post("alamat");
				$in['keterangan'] = $this->input->post("keterangan");
				$this->db->insert("dlmbg_hotel",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['nama_hotel'] = $this->input->post("nama_hotel");
				$in['telepon'] = $this->input->post("telepon");
				$in['jml_kamar'] = $this->input->post("jml_kamar");
				$in['alamat'] = $this->input->post("alamat");
				$in['keterangan'] = $this->input->post("keterangan");
				$this->db->update("dlmbg_hotel",$in,$id);
			}
			
			redirect("admin/hotel");
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
			$where['id_hotel'] = $id_param;
			$this->db->delete("dlmbg_hotel",$where);
			redirect("admin/hotel");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
