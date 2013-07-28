<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_web_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	public function generate_captcha()
	{
		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'font_path' => './system/fonts/impact.ttf',
			'img_width' => '150',
			'img_height' => 40
			);
		$cap = create_captcha($vals);
		$datamasuk = array(
			'captcha_time' => $cap['time'],
			//'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);
		$expiration = time()-3600;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		$query = $this->db->insert_string('captcha', $datamasuk);
		$this->db->query($query);
		return $cap['image'];
	}
	 
	public function generate_menu($parent=0,$hasil,$custom_class="")
	{
		$where['id_parent']=$parent;
		$w = $this->db->get_where("dlmbg_menu",$where);
		$w_q = $this->db->get_where("dlmbg_menu",$where)->row();
		if(($w->num_rows())>0)
		{
			$hasil .= "<ul ".$custom_class.">";
		}
		foreach($w->result() as $h)
		{
			$where_sub['id_parent']=$h->id_menu;
			$w_sub = $this->db->get_where("dlmbg_menu",$where_sub);
			if(($w_sub->num_rows())>0)
			{
				$hasil .= "<li><a href='#'>".$h->menu." &raquo;</a>";
			}
			else
			{
				if($h->id_parent==0)
				{
					if($h->url_route=="login" && $this->session->userdata("logged_in")!="")
					{
						$hasil .= "<li><a href='".base_url()."login/login/logout'>Log Out</a>";
					}
					else
					{
						$hasil .= "<li><a href='".base_url()."web/web/pages/".$h->id_menu."/".url_title(strtolower($h->menu))."'>".$h->menu."</a>";
					}
				}
				else
				{
					$hasil .= "<li><a href='".base_url()."web/web/pages/".$h->id_menu."/".url_title(strtolower($h->menu))."'>&raquo; ".$h->menu."</a>";
				}
			}
			if($custom_class!="")
			{
				$hasil = $this->generate_menu($h->id_menu,$hasil);
			}
			$hasil .= "</li>";
		}
		if(($w->num_rows)>0)
		{
			$hasil .= "</ul>";
		}
		return $hasil;
	}
	 
	public function generate_kategori_wisata($jenis,$limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->query("select a.nama_objek_wisata, a.alamat, a.keterangan, b.kelurahan from dlmbg_objek_wisata a left join dlmbg_kelurahan b on a.id_kelurahan=b.id_kelurahan where a.jenis='".$jenis."'");
		$config['base_url'] = base_url() . 'web/wisata/set/'.$jenis.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->query("select a.nama_objek_wisata, a.alamat, a.keterangan, b.kelurahan from dlmbg_objek_wisata a left join dlmbg_kelurahan b on a.id_kelurahan=b.id_kelurahan where a.jenis='".$jenis."' limit ".$offset.",".$limit."");
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Objek Wisata</td>
				<td>:</td>
				<td>'.$h->nama_objek_wisata.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			<tr>
				<td>Kelurahan</td>
				<td>:</td>
				<td>'.$h->kelurahan.'</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td>'.$h->keterangan.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_berita($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_berita");
		$config['base_url'] = base_url() . 'web/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_berita",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td><a href="'.base_url().'web/berita/detail/'.$h->id_berita.'"><h3>'.$h->judul.'</h3></a></td>
			</tr>
			<tr>
				<td>'.strip_tags(substr($h->isi,0,100)).'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_detail_berita($param)
	{
		$hasil = "";

		$w = $this->db->get_where("dlmbg_berita",array("id_berita"=>$param));
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td><h3>'.$h->judul.'</h3></td>
			</tr>
			<tr>
				<td>'.$h->isi.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		return $hasil;
	}
	 
	public function generate_index_pengumuman($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_pengumuman");
		$config['base_url'] = base_url() . 'web/pengumuman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_pengumuman",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td><a href="'.base_url().'web/pengumuman/detail/'.$h->id_pengumuman.'"><h3>'.$h->judul.'</h3></a></td>
			</tr>
			<tr>
				<td>'.strip_tags(substr($h->isi,0,100)).'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_hotel($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_hotel");
		$config['base_url'] = base_url() . 'web/hotel/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_hotel",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama Hotel</td>
				<td>:</td>
				<td>'.$h->nama_hotel.'</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td>'.$h->telepon.'</td>
			</tr>
			<tr>
				<td>Jumlah Kamar</td>
				<td>:</td>
				<td>'.$h->jml_kamar.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td>'.$h->keterangan.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_restoran($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_restoran");
		$config['base_url'] = base_url() . 'web/restoran/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_restoran",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama Restoran</td>
				<td>:</td>
				<td>'.$h->nama.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_makanan($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_makanan");
		$config['base_url'] = base_url() . 'web/makanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_makanan",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama Makanan</td>
				<td>:</td>
				<td>'.$h->nama.'</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td>'.$h->keterangan.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_toko($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_toko_cinderamata");
		$config['base_url'] = base_url() . 'web/toko/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_toko_cinderamata",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama Toko</td>
				<td>:</td>
				<td>'.$h->nama_toko.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td>'.$h->keterangan.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_biro($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_biro_wisata");
		$config['base_url'] = base_url() . 'web/biro/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_biro_wisata",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama Biro</td>
				<td>:</td>
				<td>'.$h->nama_biro.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td>'.$h->telepon.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_instansi($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_instansi");
		$config['base_url'] = base_url() . 'web/instansi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_instansi",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama Instansi</td>
				<td>:</td>
				<td>'.$h->nama_instansi.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td>'.$h->keterangan.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_transportasi($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_transportasi");
		$config['base_url'] = base_url() . 'web/transportasi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_transportasi",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Jenis</td>
				<td>:</td>
				<td>'.$h->jenis.'</td>
			</tr>
			<tr>
				<td>Tujuan</td>
				<td>:</td>
				<td>'.$h->tujuan.'</td>
			</tr>
			<tr>
				<td>Jam Berangkat</td>
				<td>:</td>
				<td>'.$h->jam_berangkat.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sanggar($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$tot_hal = $this->db->select('*')->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_sanggar.id_kelurahan")->get("dlmbg_sanggar");
		$config['base_url'] = base_url() . 'web/sanggar/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->select('*')->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_sanggar.id_kelurahan")->get("dlmbg_sanggar",$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama Sanggar</td>
				<td>:</td>
				<td>'.$h->nama_sanggar.'</td>
			</tr>
			<tr>
				<td>Kelurahan</td>
				<td>:</td>
				<td>'.$h->kelurahan.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>'.$h->alamat.'</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td>'.$h->keterangan.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_detail_pengumuman($param)
	{
		$hasil = "";

		$w = $this->db->get_where("dlmbg_pengumuman",array("id_pengumuman"=>$param));
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td><h3>'.$h->judul.'</h3></td>
			</tr>
			<tr>
				<td>'.$h->isi.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		return $hasil;
	}

	public function generate_index_buku_tamu($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get_where("dlmbg_buku_tamu",array("stts"=>1));
		$config['base_url'] = base_url() . 'web/buku_tamu/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get_where("dlmbg_buku_tamu",array("stts"=>1),$limit,$offset);
		
		
		foreach($w->result() as $h)
		{	
			$hasil .= '<table cellpadding="5">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>'.$h->nama.'</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>'.$h->jk.'</td>
			</tr>
			<tr>
				<td>Asal</td>
				<td>:</td>
				<td>'.$h->asal.'</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>'.$h->email.'</td>
			</tr>
			<tr>
				<td>Pesan</td>
				<td>:</td>
				<td>'.$h->pesan.'</td>
			</tr>
			</table><div class="cleaner_h20"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_album($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->get("dlmbg_album");
		$config['base_url'] = base_url() . 'web/galeri/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_album",$limit,$offset);
		
		$hasil .= "<ol>";
		foreach($w->result() as $h)
		{	
			$hasil .= '<a href="'.base_url().'web/album/detail/'.$h->id_album.'"><li>'.$h->album.'</li></a>';
		}
		$hasil .= '</ol>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_galeri($id_param)
	{
		$i = 1;
		$where['id_album'] = $id_param;
		$w = $this->db->get_where("dlmbg_galeri",$where);
		
		$hasil = "";
		
		$hasil = "<div class='row-fluid'>";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			if($i==0)
			{
				$hasil .= '</ul>';
				$hasil .= '<ul class="thumbnails m-media-container">';
			}
			$hasil .= "<li class='span2'><a href='".base_url()."asset/galeri/".$h->gambar."' class='thumbnail' id='boxshow' title='".$h->judul."'>
			<img src='".base_url()."asset/galeri/".$h->gambar."' width='100' height='80'></a></li>";
			
			$i++;
			if($i>5)
			{
				$i=0;
			}
		}
		
		$hasil .= '</div>';
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
}

/* End of file app_global_model.php */