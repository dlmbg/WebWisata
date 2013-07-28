<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inbox extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['menu'] = $this->app_global_web->generate_index_menu();
			$d['index_pesan'] = $this->app_global_message->generate_indexs_pesan($this->session->userdata("kode_user"),$GLOBALS['site_limit_medium'],$uri);

	 		$this->load->view($GLOBALS['site_theme']."/forum/bg_header",$d);
	 		$this->load->view($GLOBALS['site_theme']."/forum/bg_left");
	 		$this->load->view("inbox/bg_home");
	 		$this->load->view($GLOBALS['site_theme']."/forum/bg_footer");
		}
		else
		{
			redirect(base_url());
		}
	}

	function detail_pesan($param=0,$uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['menu'] = $this->app_global_web->generate_index_menu();
			$d['index_pesan'] = $this->app_global_message->generate_detail_pesan($param,$GLOBALS['site_limit_medium'],$uri);

	 		$this->load->view($GLOBALS['site_theme']."/forum/bg_header",$d);
	 		$this->load->view($GLOBALS['site_theme']."/forum/bg_left");
	 		$this->load->view("inbox/bg_home");
	 		$this->load->view($GLOBALS['site_theme']."/forum/bg_footer");
		}
		else
		{
			redirect(base_url());
		}
	}

	function pesan_baru($param=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			if($this->session->userdata("kode_user")==$param)
			{
				redirect("web");
			}
			$where['id_penerima'] = $param;
			$where['id_pengirim'] = $this->session->userdata("kode_user");

			$d['id_penerima'] = $param;

			$cek = $this->db->get_where("dlmbg_pesan",$where);
			if($cek->num_rows>0)
			{
				$ret_data = $cek->row();
				$id_sampul = $ret_data->id_sampul;
				redirect("global/inbox/detail_pesan/".$id_sampul."");
			}
			else
			{

				$d['menu'] = $this->app_global_web->generate_index_menu();


		 		$this->load->view($GLOBALS['site_theme']."/forum/bg_header",$d);
		 		$this->load->view($GLOBALS['site_theme']."/forum/bg_left");
		 		$this->load->view("inbox/bg_new");
		 		$this->load->view($GLOBALS['site_theme']."/forum/bg_footer");
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	function kirim_new()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$get_max = $this->db->query("select max(id_sampul)+1 as max from dlmbg_pesan")->row();
			$max_sampul = $get_max->max;

			$this->db->set('id_pesan',"REPLACE(UUID(),'-','')",FALSE); 
			$this->db->set("id_sampul",$max_sampul);
			$this->db->set("id_penerima",$this->input->post("id_penerima"));
			$this->db->set("id_pengirim",$this->session->userdata("kode_user"));
			$this->db->set("isi",$this->input->post("isi_pesan"));
			$this->db->set("waktu",gmdate("Y-m-d H:i:s",time()+3600*24*9));
			$this->db->insert("dlmbg_pesan");

			redirect("global/inbox/detail_pesan/".$max_sampul."");
		}
		else
		{
			redirect(base_url());
		}
	}

	function kirim()
	{
		if($this->session->userdata("logged_in")!="")
		{
			
			$this->db->set('id_pesan',"REPLACE(UUID(),'-','')",FALSE); 
			$this->db->set("id_sampul",$this->input->post("id_sampul"));
			$this->db->set("id_penerima",$this->input->post("id_penerima"));
			$this->db->set("id_pengirim",$this->session->userdata("kode_user"));
			$this->db->set("isi",$this->input->post("isi_pesan"));
			$this->db->set("waktu",gmdate("Y-m-d H:i:s",time()+3600*24*9));
			$this->db->insert("dlmbg_pesan");

			redirect("global/inbox/detail_pesan/".$this->input->post("id_sampul")."");
		}
		else
		{
			redirect(base_url());
		}
	}
}
