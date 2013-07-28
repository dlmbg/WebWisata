<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class instansi extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_instansi($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("instansi/bg_home");
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
			$d['nama_instansi'] = "";
			$d['alamat'] = "";
			$d['keterangan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("instansi/bg_input");
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
			$where['id_instansi'] = $id_param;
			$get = $this->db->get_where("dlmbg_instansi",$where)->row();
			
			$d['nama_instansi'] = $get->nama_instansi;
			$d['alamat'] = $get->alamat;
			$d['keterangan'] = $get->keterangan;
			
			$d['id_param'] = $get->id_instansi;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("instansi/bg_input");
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
			$id['id_instansi'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_instansi'] = $this->input->post("nama_instansi");
				$in['alamat'] = $this->input->post("alamat");	
				$in['keterangan'] = $this->input->post("keterangan");	
				$this->db->insert("dlmbg_instansi",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['nama_instansi'] = $this->input->post("nama_instansi");
				$in['alamat'] = $this->input->post("alamat");	
				$in['keterangan'] = $this->input->post("keterangan");
				$this->db->update("dlmbg_instansi",$in,$id);
			}
			
			redirect("admin/instansi");
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
			$where['id_instansi'] = $id_param;
			$this->db->delete("dlmbg_instansi",$where);
			redirect("admin/instansi");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
