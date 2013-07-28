<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class produk extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

	function index()
	{
		redirect(base_url());
	}
	
	public function kategori($id_param="",$title="",$uri=0)
	{
		$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
		$d['menu_kategori'] = $this->app_global_web_model->generate_menu_product($parent=0,$hasil=''," id='browser' class='filetree'");
		$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');
		
		if($id_param==""){redirect(base_url());}
		$where['id_menu'] = $id_param;
		$get = $this->db->get_where("dlmbg_menu",$where);
		if($get->num_rows()==0){redirect(base_url());}
		
		$get_retrieve = $get->row();
		
		$this->breadcrumb->append_crumb('Home', base_url());
		$this->breadcrumb->append_crumb('Product', base_url().'web/produk');
		$this->breadcrumb->append_crumb($get_retrieve->menu, '/');
		
		$d['title'] = $get_retrieve->menu;
		$d['dt_retrieve'] = $this->app_global_web_model->generate_produk_kategori($id_param,$this->config->item("limit_item_medium"),$uri,url_title(strtolower($get_retrieve->menu)));
		
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_left');
 		$this->load->view($GLOBALS['site_theme'].'/web/produk/bg_home');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
		
	}
	
	public function cari($uri=0)
	{
		$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
		$d['menu_kategori'] = $this->app_global_web_model->generate_menu_product($parent=0,$hasil=''," id='browser' class='filetree'");
		$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');
		
		$this->breadcrumb->append_crumb('Home', base_url());
		$this->breadcrumb->append_crumb('Search', base_url().'web/produk/cari');
		$this->breadcrumb->append_crumb(ucwords($this->session->userdata("search_product")), '/');
		
		$d['title'] = "Search Results";
		$d['dt_retrieve'] = $this->app_global_web_model->generate_search_produk($this->session->userdata("search_product"),$this->config->item("limit_item_medium"),$uri);
		
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_left');
 		$this->load->view($GLOBALS['site_theme'].'/web/produk/bg_home');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
		
	}
	
	public function detail($id_param="")
	{
		$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
		$d['menu_kategori'] = $this->app_global_web_model->generate_menu_product($parent=0,$hasil=''," id='browser' class='filetree'");
		$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');
		
		if($id_param==""){redirect(base_url());}
		$where['id_produk'] = $id_param;
		$get = $this->db->get_where("dlmbg_produk",$where);
		if($get->num_rows()==0){redirect(base_url());}
		
		$get_retrieve = $get->row();
		$where_menu['id_menu'] = $get_retrieve->id_menu;
		$get_retrieve_menu = $this->db->get_where("dlmbg_menu",$where_menu)->row();
		
		$this->breadcrumb->append_crumb('Home', base_url());
		$this->breadcrumb->append_crumb('Product', base_url().'web/produk');
		$this->breadcrumb->append_crumb($get_retrieve_menu->menu, base_url().'web/produk/kategori/'.$get_retrieve->id_menu.'/'.url_title(strtolower($get_retrieve_menu->menu)));
		$this->breadcrumb->append_crumb($get_retrieve->nama_produk, '/');
		
		$d['title'] = $get_retrieve->nama_produk;
		$d['dt_retrieve'] = $this->app_global_web_model->generate_produk_detail($id_param);
		
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_left');
 		$this->load->view($GLOBALS['site_theme'].'/web/produk/bg_detail');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
		
	}
	
	function set()
	{
		$sess['search_product'] = $this->input->post("cari");
		$this->session->set_userdata($sess);
		redirect(base_url().'web/produk/cari');
	}
}
