<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class toko extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_toko($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("toko/bg_home");
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
			$d['nama_toko'] = "";
			$d['alamat'] = "";
			$d['keterangan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("toko/bg_input");
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
			$where['id_toko'] = $id_param;
			$get = $this->db->get_where("dlmbg_toko_cinderamata",$where)->row();
			
			$d['nama_toko'] = $get->nama_toko;
			$d['alamat'] = $get->alamat;
			$d['keterangan'] = $get->keterangan;
			
			$d['id_param'] = $get->id_toko;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("toko/bg_input");
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
			$id['id_toko'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_toko'] = $this->input->post("nama_toko");
				$in['alamat'] = $this->input->post("alamat");	
				$in['keterangan'] = $this->input->post("keterangan");	
				$this->db->insert("dlmbg_toko_cinderamata",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['nama_toko'] = $this->input->post("nama_toko");
				$in['alamat'] = $this->input->post("alamat");	
				$in['keterangan'] = $this->input->post("keterangan");
				$this->db->update("dlmbg_toko_cinderamata",$in,$id);
			}
			
			redirect("admin/toko");
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
			$where['id_toko'] = $id_param;
			$this->db->delete("dlmbg_toko_cinderamata",$where);
			redirect("admin/toko");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
