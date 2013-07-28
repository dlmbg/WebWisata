<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_contact($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("contact/bg_home");
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
			$where['id_contact'] = $id_param;
			$get = $this->db->get_where("dlmbg_contact",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['email'] = $get->email;
			$d['asal'] = $get->asal;
			$d['no_telpon'] = $get->no_telpon;
			$d['pesan'] = $get->pesan;
			
			$d['id_param'] = $get->id_contact;
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("contact/bg_input");
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
			$id['id_contact'] = $this->input->post("id_param");
			
			$in['nama'] = $this->input->post("nama");
			$in['email'] = $this->input->post("email");
			$in['asal'] = $this->input->post("asal");
			$in['no_telpon'] = $this->input->post("no_telpon");
			$in['pesan'] = $this->input->post("pesan");
			
			$this->db->update("dlmbg_contact",$in,$id);
			
			redirect("admin/contact");
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
			$where['id_contact'] = $id_param;
			$this->db->delete("dlmbg_contact",$where);
			redirect("admin/contact");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
