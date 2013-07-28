<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class toko extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

	function index($uri=0)
	{
		$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
		$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');

		$d["browser"] = $this->agent->browser().' '.$this->agent->version();
		$d["os"] = $this->agent->platform();

		$d["counter_pengunjung"] = $this->db->get("tbl_counter")->num_rows();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$d_in['tanggal'] = gmdate("d-M-Y H:i:s",time()+3600*9);
			$this->db->insert("tbl_counter",$d_in);
		}
		
		$this->breadcrumb->append_crumb('Home', base_url());
		$this->breadcrumb->append_crumb('Hotel',  base_url());

		$d['kunjungan'] = $this->db->query("SELECT nama_hotel, id_hotel, (select count(id_hotel) as hasil from dlmbg_kunjungan where id_hotel=a.id_hotel) as hasil FROM `dlmbg_hotel` a order by hasil DESC LIMIT 5");

		$d['data_retrieve'] = $this->app_global_web_model->generate_index_toko($GLOBALS['site_limit_small'],$uri);
		
		
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_left');
 		$this->load->view($GLOBALS['site_theme'].'/web/toko/bg_home');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_right');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
	}
}
