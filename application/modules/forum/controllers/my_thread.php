<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class my_thread extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

	function index($uri=0)
	{

		$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
		$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');


		$d['last_update'] = $this->app_global_forum->generate_index_last_update($GLOBALS['site_limit_medium']);
		$d['new_update'] = $this->app_global_forum->generate_index_new_update($GLOBALS['site_limit_medium']);

		$d["browser"] = $this->agent->browser().' '.$this->agent->version();
		$d["os"] = $this->agent->platform();

		$d["counter_pengunjung"] = $this->db->get("tbl_counter")->num_rows();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$d_in['tanggal'] = gmdate("d-M-Y H:i:s",time()+3600*9);
			$this->db->insert("tbl_counter",$d_in);
		}

		$d['kunjungan'] = $this->db->query("SELECT nama_hotel, id_hotel, (select count(id_hotel) as hasil from dlmbg_kunjungan where id_hotel=a.id_hotel) as hasil FROM `dlmbg_hotel` a order by hasil DESC LIMIT 5");
		


		$param = $this->session->userdata("kode_user");

		$d['detail'] = $this->app_global_forum->generate_index_forum_my_thread($param,$GLOBALS['site_limit_medium'],$uri);
		$d['nama'] = "My Thread : ".$this->session->userdata("nama_user_login");

		
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/forum/bg_my_thread');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
	}
}
