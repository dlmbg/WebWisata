<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cari extends CI_Controller {

	/**
	 * Controller peta_online
	 * by Gede Lumbung
	 * http://gedelumbung.com
	 */
	 
	function index($uri=0)
	{
		$this->load->model("app_global_cari_model");
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

		$set['cari'] = $_POST['cari'];
		$this->session->set_userdata($set);

		$limit=5;
		$offset=$uri;
		$d['wisata'] = $this->app_global_cari_model->generate_kategori_wisata($limit,$offset);
		$d['berita'] = $this->app_global_cari_model->generate_index_berita($limit,$offset);
		$d['pengumuman'] = $this->app_global_cari_model->generate_index_pengumuman($limit,$offset);
		$d['hotel'] = $this->app_global_cari_model->generate_index_hotel($limit,$offset);
		$d['restoran'] = $this->app_global_cari_model->generate_index_restoran($limit,$offset);
		$d['makanan'] = $this->app_global_cari_model->generate_index_makanan($limit,$offset);
		$d['toko'] = $this->app_global_cari_model->generate_index_toko($limit,$offset);
		$d['biro'] = $this->app_global_cari_model->generate_index_biro($limit,$offset);
		$d['instansi'] = $this->app_global_cari_model->generate_index_instansi($limit,$offset);
		$d['transportasi'] = $this->app_global_cari_model->generate_index_transportasi($limit,$offset);
		$d['sanggar'] = $this->app_global_cari_model->generate_index_sanggar($limit,$offset);
		
		
 		$this->load->view($GLOBALS['site_theme'].'/web/peta_online/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/web/cari/bg_home');
 		$this->load->view($GLOBALS['site_theme'].'/web/peta_online/bg_footer');
	}
}

/* End of file peta_online.php */
/* Location: ./application/controllers/peta_online.php */