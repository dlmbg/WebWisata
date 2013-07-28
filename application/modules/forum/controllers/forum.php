<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class forum extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/


	function index()
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
		
		
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/forum/bg_home');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
	}

	function detail($param=0,$uri=0)
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

		$d['detail'] = $this->app_global_forum->generate_detail_forum($param,$GLOBALS['site_limit_medium'],$uri);

		$this->db->query("update dlmbg_thread_forum set hitung=hitung+1 where id_forum='".$param."'");

		$d['kunjungan'] = $this->db->query("SELECT nama_hotel, id_hotel, (select count(id_hotel) as hasil from dlmbg_kunjungan where id_hotel=a.id_hotel) as hasil FROM `dlmbg_hotel` a order by hasil DESC LIMIT 5");
		
		
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
 		$this->load->view($GLOBALS['site_theme'].'/forum/bg_detail');
 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
	}

	function reply($param=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['param'] = $param;

			$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
			$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');
			
			$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'font_path' => './system/fonts/impact.ttf',
			'img_width' => '200',
			'img_height' => 60,
			'expiration' => 90
			);
			$cap = create_captcha($vals);
		 
			$datamasuk = array(
				'captcha_time' => $cap['time'],
				'word' => $cap['word']
				);
			$expiration = time()-900;
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			$query = $this->db->insert_string('captcha', $datamasuk);
			$this->db->query($query);
			$d['gbr_captcha'] = $cap['image'];

			
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
	 		$this->load->view($GLOBALS['site_theme'].'/forum/post_reply');
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
		}
		else
		{
			redirect(base_url());
		}
	}

	function hapus_post_reply($param=0,$redirect=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$where['id_reply_forum'] = $param;
			$this->db->delete("dlmbg_reply_forum",$where);
			redirect("forum/forum/detail/".$redirect."");
		}
		else
		{
			redirect(base_url());
		}
	}

	function hapus_post_thread($param=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$where['id_forum'] = $param;
			$this->db->delete("dlmbg_thread_forum",$where);

			$where_forum['id_forum'] = $param;
			$this->db->delete("dlmbg_reply_forum",$where_forum);

			redirect("forum/");
		}
		else
		{
			redirect(base_url());
		}
	}

	function save_reply()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id_gen = $this->db->query("SELECT REPLACE(UUID(),'-','') as hasil")->row();
			$this->db->set('id_reply_forum',$id_gen->hasil); 
			$this->db->set('id_forum',$this->input->post('id_forum')); 
			$this->db->set("judul",$this->input->post('judul'));
			$this->db->set("isi",$this->input->post('isi'));
			$this->db->set("id_anggota",$this->session->userdata('kode_user'));
			$this->db->set("tanggal",gmdate('Y-m-d',time()+60*60*9));
			$this->db->set("waktu",gmdate('H:i:s',time()+60*60*9));

			$this->db->query("update dlmbg_thread_forum set last_date='".gmdate('Y-m-d H:i:s',time()+60*60*9)."' where id_forum='".$this->input->post('id_forum')."'");
			
			$expiration = time()-900;
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND captcha_time > ?";
			$binds = array($_POST['captcha'],  $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();
			
			if ($row->count == 0)
			{
				?>
					<script>
						alert('Kode captcha salah...');
						javascript:history.go(-1);
					</script>
				<?php
			}
			else
			{
				$this->db->insert("dlmbg_reply_forum");
				redirect("forum/forum/detail/".$this->input->post('id_forum')."");
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	function save_edit_reply()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['id_reply_forum'] = $this->input->post('id_param'); 
			$up['judul'] = $this->input->post('judul');
			$up['isi'] = $this->input->post('isi');
			$this->db->update("dlmbg_reply_forum",$up,$id);
			redirect("forum/forum/detail/".$this->input->post('id_param_redirect')."");
		}
		else
		{
			redirect(base_url());
		}
	}

	function save_edit_thread()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['id_forum'] = $this->input->post('id_param'); 
			$up['judul'] = $this->input->post('judul');
			$up['isi'] = $this->input->post('isi');
			$up['id_kategori'] = $this->input->post('id_kategori');
			$this->db->update("dlmbg_thread_forum",$up,$id);
			redirect("forum/forum/detail/".$this->input->post('id_param')."");
		}
		else
		{
			redirect(base_url());
		}
	}

	function edit_post_reply($param=0,$redirect=0)
	{
		if($this->session->userdata("logged_in")!="")
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


			$d['param'] = $param;
			$get = $this->db->get_where("dlmbg_reply_forum",array("id_reply_forum" => $param))->row();

			$d['isi'] = $get->isi;
			$d['judul'] = $get->judul;
			$d['id_param'] = $get->id_reply_forum;
			$d['id_param_redirect'] = $get->id_forum;

			$d['kunjungan'] = $this->db->query("SELECT nama_hotel, id_hotel, (select count(id_hotel) as hasil from dlmbg_kunjungan where id_hotel=a.id_hotel) as hasil FROM `dlmbg_hotel` a order by hasil DESC LIMIT 5");
			
			
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
	 		$this->load->view($GLOBALS['site_theme'].'/forum/edit_post_reply');
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
		}
		else
		{
			redirect(base_url());
		}
	}

	function edit_post_thread($param=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['menu_top'] = $this->app_global_web_model->generate_menu($parent=0,$hasil=''," id='treemenu1'");
			$d['menu_bottom'] = $this->app_global_web_model->generate_menu($parent=0,$hasil='');

			$d["counter_pengunjung"] = $this->db->get("tbl_counter")->num_rows();
			setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
			if (!isset($_COOKIE["pengunjung"])) {
				$d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
				$d_in['tanggal'] = gmdate("d-M-Y H:i:s",time()+3600*9);
				$this->db->insert("tbl_counter",$d_in);
			}


			$d['param'] = $param;
			$get = $this->db->get_where("dlmbg_thread_forum",array("id_forum" => $param))->row();

			$d['isi'] = $get->isi;
			$d['judul'] = $get->judul;
			$d['id_param'] = $get->id_forum;
			$d['id_kategori'] = $get->id_kategori;

			$d['kunjungan'] = $this->db->query("SELECT nama_hotel, id_hotel, (select count(id_hotel) as hasil from dlmbg_kunjungan where id_hotel=a.id_hotel) as hasil FROM `dlmbg_hotel` a order by hasil DESC LIMIT 5");
			
			
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
	 		$this->load->view($GLOBALS['site_theme'].'/forum/edit_post_thread');
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');
		}
		else
		{
			redirect(base_url());
		}
	}
}
