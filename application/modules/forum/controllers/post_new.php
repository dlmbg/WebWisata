<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class post_new extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index()
	{
		if($this->session->userdata("logged_in")!="")
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

			$d['kunjungan'] = $this->db->query("SELECT nama_hotel, id_hotel, (select count(id_hotel) as hasil from dlmbg_kunjungan where id_hotel=a.id_hotel) as hasil FROM `dlmbg_hotel` a order by hasil DESC LIMIT 5");
			
			
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_header',$d);
	 		$this->load->view($GLOBALS['site_theme'].'/forum/post_new');
	 		$this->load->view($GLOBALS['site_theme'].'/web/bg_footer');

		}
		else
		{
			redirect(base_url());
		}
	}

	function save()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id_gen = $this->db->query("SELECT REPLACE(UUID(),'-','') as hasil")->row();
			$this->db->set('id_forum',$id_gen->hasil); 
			$this->db->set("judul",$this->input->post('judul'));
			$this->db->set("isi",$this->input->post('isi'));
			$this->db->set("id_kategori",$this->input->post('id_kategori'));
			$this->db->set("id_anggota",$this->session->userdata('kode_user'));
			$this->db->set("post_date",gmdate('Y-m-d H:i:s',time()+60*60*9));
			$this->db->set("last_date",gmdate('Y-m-d H:i:s',time()+60*60*9));
			$this->db->set("hitung",1);

			$id = $id_gen->hasil; 
			
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
				$this->db->insert("dlmbg_thread_forum");
				redirect("forum/forum/detail/".$id."");
			}
		}
		else
		{
			redirect(base_url());
		}
	}
}
