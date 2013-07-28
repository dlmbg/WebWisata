<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transportasi extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_transportasi($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("transportasi/bg_home");
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
			$d['jenis'] = "";
			$d['tujuan'] = "";
			$d['jam_berangkat'] = "";
			$d['alamat'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("transportasi/bg_input");
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
			$where['id_transportasi'] = $id_param;
			$get = $this->db->get_where("dlmbg_transportasi",$where)->row();
			
			$d['jenis'] = $get->jenis;
			$d['tujuan'] = $get->tujuan;
			$d['jam_berangkat'] = $get->jam_berangkat;
			$d['alamat'] = $get->alamat;
			
			$d['id_param'] = $get->id_transportasi;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("transportasi/bg_input");
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
			$id['id_transportasi'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['jenis'] = $this->input->post("jenis");
				$in['tujuan'] = $this->input->post("tujuan");
				$in['jam_berangkat'] = $this->input->post("jam_berangkat");
				$in['alamat'] = $this->input->post("alamat");	
				$this->db->insert("dlmbg_transportasi",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['jenis'] = $this->input->post("jenis");
				$in['tujuan'] = $this->input->post("tujuan");
				$in['jam_berangkat'] = $this->input->post("jam_berangkat");
				$in['alamat'] = $this->input->post("alamat");	
				$this->db->update("dlmbg_transportasi",$in,$id);
			}
			
			redirect("admin/transportasi");
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
			$where['id_transportasi'] = $id_param;
			$this->db->delete("dlmbg_transportasi",$where);
			redirect("admin/transportasi");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
