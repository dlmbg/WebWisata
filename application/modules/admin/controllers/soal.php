<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class soal extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function detail($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_soal($id_param);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("soal/bg_home");
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
			$where['id_jawaban_polling'] = $id_param;
			$get = $this->db->get_where("dlmbg_jawaban_polling",$where)->row();
			
			$d['id_polling'] = $get->id_polling;
			$d['jawaban_polling'] = $get->jawaban_polling;
			$d['hit'] = $get->hit;
			$d['id_param'] = $get->id_jawaban_polling;

			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("soal/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
   
   public function tambah($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['id_polling'] = $id_param;
			$d['jawaban_polling'] = "";
			$d['hit'] = "";
			$d['id_param'] = "";

			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("soal/bg_input");
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
			$id['id_jawaban_polling'] = $this->input->post("id_param");
			if($tipe=="edit")
			{
				$in['id_polling'] = $this->input->post("id_polling");
				$in['jawaban_polling'] = $this->input->post("jawaban_polling");
				$in['hit'] = $this->input->post("hit");
				$this->db->update("dlmbg_jawaban_polling",$in,$id);
			}
			else if($tipe=="tambah")
			{
				$in['id_polling'] = $this->input->post("id_polling");
				$in['jawaban_polling'] = $this->input->post("jawaban_polling");
				$in['hit'] = $this->input->post("hit");
				$this->db->insert("dlmbg_jawaban_polling",$in);
			}
			redirect("admin/soal/detail/".$in['id_polling']." ");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param,$id_polling)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_jawaban_polling'] = $id_param;
			$this->db->delete("dlmbg_jawaban_polling",$where);
			redirect("admin/soal/detail/".$id_polling." ");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
