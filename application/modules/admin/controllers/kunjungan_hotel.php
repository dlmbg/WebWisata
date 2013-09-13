<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kunjungan_hotel extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kunjungan_hotel($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kunjungan_hotel/bg_home");
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
			$d['hotel'] = $this->db->get("dlmbg_hotel");
			$d['id_hotel'] = "";
			$d['bulan'] = "";
			$d['tahun'] = "";
			$d['pria'] = "";
			$d['wanita'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kunjungan_hotel/bg_input");
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
			$where['id_kunjungan'] = $id_param;
			$d['hotel'] = $this->db->get("dlmbg_hotel");
			$get = $this->db->get_where("dlmbg_kunjungan",$where)->row();
			
			$d['id_hotel'] = $get->id_hotel;
			$d['bulan'] = $get->bulan;
			$d['tahun'] = $get->tahun;
			$d['pria'] = $get->pria;
			$d['wanita'] = $get->wanita;
			
			$d['id_param'] = $get->id_kunjungan;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kunjungan_hotel/bg_input");
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
			$id['id_kunjungan'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_hotel'] = $this->input->post("id_hotel");
				$in['bulan'] = $this->input->post("bulan");
				$in['tahun'] = $this->input->post("tahun");
				$in['pria'] = $this->input->post("pria");
				$in['wanita'] = $this->input->post("wanita");
				$this->db->insert("dlmbg_kunjungan",$in);
				
			}
			else if($tipe=="edit")
			{
				$in['id_hotel'] = $this->input->post("id_hotel");
				$in['bulan'] = $this->input->post("bulan");
				$in['tahun'] = $this->input->post("tahun");
				$in['pria'] = $this->input->post("pria");
				$in['wanita'] = $this->input->post("wanita");
				$this->db->update("dlmbg_kunjungan",$in,$id);
			}
			
			redirect("admin/kunjungan_hotel");
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
			$where['id_kunjungan'] = $id_param;
			$this->db->delete("dlmbg_kunjungan",$where);
			redirect("admin/kunjungan_hotel");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
