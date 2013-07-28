<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buku_tamu extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_buku_tamu($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("buku_tamu/bg_home");
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
			$where['id_buku_tamu'] = $id_param;
			$get = $this->db->get_where("dlmbg_buku_tamu",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['email'] = $get->email;
			$d['asal'] = $get->asal;
			$d['jk'] = $get->jk;
			$d['pesan'] = $get->pesan;
			
			$d['id_param'] = $get->id_buku_tamu;
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("buku_tamu/bg_input");
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
			$id['id_buku_tamu'] = $this->input->post("id_param");
			
			$in['nama'] = $this->input->post("nama");
			$in['email'] = $this->input->post("email");
			$in['asal'] = $this->input->post("asal");
			$in['jk'] = $this->input->post("jk");
			$in['pesan'] = $this->input->post("pesan");
			
			$this->db->update("dlmbg_buku_tamu",$in,$id);
			
			redirect("admin/buku_tamu");
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
			$where['id_buku_tamu'] = $id_param;
			$this->db->delete("dlmbg_buku_tamu",$where);
			redirect("admin/buku_tamu");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function approve($id_param,$param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_buku_tamu'] = $id_param;
			$up['stts'] = $param;
			$this->db->update("dlmbg_buku_tamu",$up,$where);
			redirect("admin/buku_tamu");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
