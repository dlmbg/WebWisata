<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_cari_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_kategori_wisata($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->db->query("select a.nama_objek_wisata, a.alamat, a.keterangan, b.kelurahan from dlmbg_objek_wisata a left join dlmbg_kelurahan b on a.id_kelurahan=b.id_kelurahan where a.nama_objek_wisata like '%".$this->session->userdata("cari")."%'");
		$config['base_url'] = base_url() . 'web/wisata/set/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->query("select a.nama_objek_wisata, a.alamat, a.keterangan, b.kelurahan from dlmbg_objek_wisata a left join dlmbg_kelurahan b on a.id_kelurahan=b.id_kelurahan where a.nama_objek_wisata like '%".$this->session->userdata("cari")."%' limit ".$offset.",".$limit."");
		
		
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
		
		$jd['judul'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_berita");
		$config['base_url'] = base_url() . 'web/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_berita",$limit,$offset);
		
		
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
	 
	public function generate_index_pengumuman($limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$jd['judul'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_pengumuman");
		$config['base_url'] = base_url() . 'web/pengumuman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_pengumuman",$limit,$offset);
		
		
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
		
		$jd['nama_hotel'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_hotel");
		$config['base_url'] = base_url() . 'web/hotel/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_hotel",$limit,$offset);
		
		
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
		
		$jd['nama'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_restoran");
		$config['base_url'] = base_url() . 'web/restoran/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_restoran",$limit,$offset);
		
		
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
		
		$jd['nama'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_makanan");
		$config['base_url'] = base_url() . 'web/makanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_makanan",$limit,$offset);
		
		
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
		
		$jd['nama_toko'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_toko_cinderamata");
		$config['base_url'] = base_url() . 'web/toko/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_toko_cinderamata",$limit,$offset);
		
		
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
		
		$jd['nama_biro'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_biro_wisata");
		$config['base_url'] = base_url() . 'web/biro/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_biro_wisata",$limit,$offset);
		
		
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
		
		$jd['nama_instansi'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_instansi");
		$config['base_url'] = base_url() . 'web/instansi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_instansi",$limit,$offset);
		
		
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
		
		$jd['jenis'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->get("dlmbg_transportasi");
		$config['base_url'] = base_url() . 'web/transportasi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->get("dlmbg_transportasi",$limit,$offset);
		
		
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

		$jd['nama_sanggar'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($jd)->select('*')->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_sanggar.id_kelurahan")->get("dlmbg_sanggar");
		$config['base_url'] = base_url() . 'web/sanggar/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->like($jd)->select('*')->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_sanggar.id_kelurahan")->get("dlmbg_sanggar",$limit,$offset);
		
		
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
	
}

/* End of file app_global_model.php */