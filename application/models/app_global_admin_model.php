<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_user");

		$config['base_url'] = base_url() . 'admin/user/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_user",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Superadmin Name</th>
					<th>Username</th>
					<th>Level</th>
					<th width='160'><a href='".base_url()."admin/user/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_user."</td>
					<td>".$h->username."</td>
					<td>".$h->level."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/user/edit/".$h->kode_user."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/user/hapus/".$h->kode_user."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kunjungan_hotel($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->select("*")->join("dlmbg_hotel","dlmbg_kunjungan.id_hotel=dlmbg_hotel.id_hotel")->get("dlmbg_kunjungan");

		$config['base_url'] = base_url() . 'admin/kunjungan_hotel/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("dlmbg_hotel","dlmbg_kunjungan.id_hotel=dlmbg_hotel.id_hotel")->get("dlmbg_kunjungan",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Hotel</th>
					<th>Tanggal Kunjungan</th>
					<th>Asal</th>
					<th width='160'><a href='".base_url()."admin/kunjungan_hotel/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_hotel."</td>
					<td>".$h->tanggal."</td>
					<td>".$h->asal."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/kunjungan_hotel/edit/".$h->id_kunjungan."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/kunjungan_hotel/hapus/".$h->id_kunjungan."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sanggar($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->select("*")->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_sanggar.id_kelurahan")->get("dlmbg_sanggar");

		$config['base_url'] = base_url() . 'admin/sanggar/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_sanggar.id_kelurahan")->get("dlmbg_sanggar",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kelurahan</th>
					<th>Nama Sanggar</th>
					<th>Alamat</th>
					<th width='160'><a href='".base_url()."admin/sanggar/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->kelurahan."</td>
					<td>".$h->nama_sanggar."</td>
					<td>".$h->alamat."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/sanggar/edit/".$h->id_sanggar."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/sanggar/hapus/".$h->id_sanggar."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_peta_online($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->select("*")->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_peta_online.id_kelurahan")->get("dlmbg_peta_online");

		$config['base_url'] = base_url() . 'admin/peta_online/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_peta_online.id_kelurahan")->get("dlmbg_peta_online",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kelurahan</th>
					<th>Judul</th>
					<th>Jenis</th>
					<th>Keterangan</th>
					<th width='160'><a href='".base_url()."admin/peta_online/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->kelurahan."</td>
					<td>".$h->judul."</td>
					<td>".$h->jenis."</td>
					<td>".$h->keterangan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/peta_online/edit/".$h->id_peta_online."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/peta_online/hapus/".$h->id_peta_online."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_objek_wisata($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->select("*")->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_objek_wisata.id_kelurahan")->get("dlmbg_objek_wisata");

		$config['base_url'] = base_url() . 'admin/objek_wisata/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("dlmbg_kelurahan","dlmbg_kelurahan.id_kelurahan=dlmbg_objek_wisata.id_kelurahan")->get("dlmbg_objek_wisata",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kelurahan</th>
					<th>Nama Objek Wisata</th>
					<th>Jenis</th>
					<th>Alamat</th>
					<th width='160'><a href='".base_url()."admin/objek_wisata/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->kelurahan."</td>
					<td>".$h->nama_objek_wisata."</td>
					<td>".$h->jenis."</td>
					<td>".$h->alamat."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/objek_wisata/edit/".$h->id_objek_wisata."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/objek_wisata/hapus/".$h->id_objek_wisata."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_polling($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_polling");

		$config['base_url'] = base_url() . 'admin/polling/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_polling",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Pertanyaan</th>
					<th>Aktif</th>
					<th width='220'><a href='".base_url()."admin/polling/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->soal."</td>
					<td>".$h->aktif."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/soal/detail/".$h->id_polling."' class='btn btn-small btn-info'><i class='icon-edit'></i> Jawaban</a> ";
			$hasil .= "<a href='".base_url()."admin/polling/edit/".$h->id_polling."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/polling/hapus/".$h->id_polling."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_soal($id_param)
	{
		$hasil="";
		$where['id_polling'] = $id_param;

		$w = $this->db->get_where("dlmbg_jawaban_polling",$where);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Jawaban</th>
					<th>Hit</th>
					<th width='160'><a href='".base_url()."admin/soal/tambah/".$id_param."' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = 1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->jawaban_polling."</td>
					<td>".$h->hit."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/soal/edit/".$h->id_jawaban_polling."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/soal/hapus/".$h->id_jawaban_polling."/".$h->id_polling."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'admin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/sistem/edit/".$h->id_setting."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_menu($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_menu");

		$config['base_url'] = base_url() . 'admin/routing_pages/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_menu",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td width='30'><b>No.</b></td>
				<td><b>Menu</b></td>
				<td><b>URL Route</b></td>
				<td width='150'><a href='".base_url()."admin/routing_pages/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></td>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->menu." </td><td>".$h->url_route." </td>
			<td><a href='".base_url()."admin/routing_pages/edit/".$h->id_menu."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/routing_pages/hapus/".$h->id_menu."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_galeri($id_param)
	{
		$i = 1;
		$where['id_album'] = $id_param;
		$w = $this->db->get_where("dlmbg_galeri",$where);
		
		$hasil = "";
		
		$hasil = "<p><a href='".base_url()."admin/galeri/tambah/".$id_param."' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></p>
		<div class='row-fluid'>";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			if($i==0)
			{
				$hasil .= '</ul>';
				$hasil .= '<ul class="thumbnails m-media-container">';
			}
			$hasil .= "<li class='span2'><a href='#' class='thumbnail'>
			<img src='".base_url()."asset/galeri/".$h->gambar."'></a>
			<div class='m-media-action'>
			<a href='".base_url()."admin/galeri/hapus/".$h->id_galeri."/".$h->id_album."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i></a></div></li>";
			
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
	 
	public function generate_index_kecamatan($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_kecamatan");

		$config['base_url'] = base_url() . 'admin/kecamatan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_kecamatan",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kecamatan</th>
					<th width='160'><a href='".base_url()."admin/kecamatan/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_kecamatan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/kecamatan/edit/".$h->id_kecamatan."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/kecamatan/hapus/".$h->id_kecamatan."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_album($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_album");

		$config['base_url'] = base_url() . 'admin/album/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_album",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Album</th>
					<th width='260'><a href='".base_url()."admin/album/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->album."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/galeri/detail/".$h->id_album."' class='btn btn-small btn-info'><i class='icon-edit'></i> Galeri</a> ";
			$hasil .= "<a href='".base_url()."admin/album/edit/".$h->id_album."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/album/hapus/".$h->id_album."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kelurahan($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_kelurahan");

		$config['base_url'] = base_url() . 'admin/kelurahan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_kelurahan",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kelurahan</th>
					<th width='160'><a href='".base_url()."admin/kelurahan/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->kelurahan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/kelurahan/edit/".$h->id_kelurahan."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/kelurahan/hapus/".$h->id_kelurahan."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	 
	public function generate_index_transportasi($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_transportasi");

		$config['base_url'] = base_url() . 'admin/transportasi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_transportasi",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Jenis</th>
					<th>Tujuan</th>
					<th>Jam Berangkat</th>
					<th width='160'><a href='".base_url()."admin/transportasi/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->jenis."</td>
					<td>".$h->tujuan."</td>
					<td>".$h->jam_berangkat."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/transportasi/edit/".$h->id_transportasi."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/transportasi/hapus/".$h->id_transportasi."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	 
	public function generate_index_biro($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_biro_wisata");

		$config['base_url'] = base_url() . 'admin/biro/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_biro_wisata",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama biro</th>
					<th>Telepon</th>
					<th>Alamat</th>
					<th width='160'><a href='".base_url()."admin/biro/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_biro."</td>
					<td>".$h->telepon."</td>
					<td>".$h->alamat."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/biro/edit/".$h->id_biro."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/biro/hapus/".$h->id_biro."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	 
	public function generate_index_toko($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_toko_cinderamata");

		$config['base_url'] = base_url() . 'admin/toko/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_toko_cinderamata",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama toko</th>
					<th>Alamat</th>
					<th width='160'><a href='".base_url()."admin/toko/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_toko."</td>
					<td>".$h->alamat."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/toko/edit/".$h->id_toko."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/toko/hapus/".$h->id_toko."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	 
	public function generate_index_instansi($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_instansi");

		$config['base_url'] = base_url() . 'admin/instansi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_instansi",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama instansi</th>
					<th>Alamat</th>
					<th width='160'><a href='".base_url()."admin/instansi/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_instansi."</td>
					<td>".$h->alamat."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/instansi/edit/".$h->id_instansi."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/instansi/hapus/".$h->id_instansi."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	 
	public function generate_index_makanan($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_makanan");

		$config['base_url'] = base_url() . 'admin/makanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_makanan",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama makanan</th>
					<th>keterangan</th>
					<th width='160'><a href='".base_url()."admin/makanan/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->keterangan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/makanan/edit/".$h->id_makanan."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/makanan/hapus/".$h->id_makanan."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}


	 
	public function generate_index_restoran($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_restoran");

		$config['base_url'] = base_url() . 'admin/restoran/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_restoran",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama restoran</th>
					<th>alamat</th>
					<th width='160'><a href='".base_url()."admin/restoran/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->alamat."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/restoran/edit/".$h->id_restoran."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/restoran/hapus/".$h->id_restoran."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_hotel($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_hotel");

		$config['base_url'] = base_url() . 'admin/hotel/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_hotel",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Hotel</th>
					<th>Telepon</th>
					<th>Jumlah Kamar</th>
					<th width='160'><a href='".base_url()."admin/hotel/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_hotel."</td>
					<td>".$h->telepon."</td>
					<td>".$h->jml_kamar."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/hotel/edit/".$h->id_hotel."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/hotel/hapus/".$h->id_hotel."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kategori_forum($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_kategori");

		$config['base_url'] = base_url() . 'admin/kategori_forum/index/';
		$config['base_url'] = base_url() . 'admin/user/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_kategori",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kategori</th>
					<th width='160'><a href='".base_url()."admin/kategori_forum/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_kategori."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/kategori_forum/edit/".$h->id_kategori."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/kategori_forum/hapus/".$h->id_kategori."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_berita($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_berita");

		$config['base_url'] = base_url() . 'admin/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_berita",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th width='160'><a href='".base_url()."admin/berita/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/berita/edit/".$h->id_berita."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/berita/hapus/".$h->id_berita."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_contact($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_contact");

		$config['base_url'] = base_url() . 'admin/contact/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_contact",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Asal</th>
					<th width='160'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->email."</td>
					<td>".$h->asal."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/contact/edit/".$h->id_contact."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/contact/hapus/".$h->id_contact."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_buku_tamu($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_buku_tamu");

		$config['base_url'] = base_url() . 'admin/buku_tamu/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_buku_tamu",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Asal</th>
					<th width='260'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$txt = "Unapprove";
			$param = 0;
			if($h->stts==0){$txt="Approve"; $param=1;}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->jk."</td>
					<td>".$h->asal."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/buku_tamu/approve/".$h->id_buku_tamu."/".$param."' class='btn btn-small btn-info'><i class='icon-edit'></i> ".$txt."</a> ";
			$hasil .= "<a href='".base_url()."admin/buku_tamu/edit/".$h->id_buku_tamu."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/buku_tamu/hapus/".$h->id_buku_tamu."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pengumuman($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_pengumuman");

		$config['base_url'] = base_url() . 'admin/pengumuman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_pengumuman",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th width='160'><a href='".base_url()."admin/pengumuman/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/pengumuman/edit/".$h->id_pengumuman."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/pengumuman/hapus/".$h->id_pengumuman."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_thread_forum($limit,$offset)
	{
		$tot_hal = $this->db->get("dlmbg_thread_forum");

		$config['base_url'] = base_url() . 'forum/my_thread/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select d.nama_kategori, a.id_forum,a.isi,a.hitung,post_date,a.judul,b.username,count(c.id_reply_forum) as hit, a.last_date from dlmbg_thread_forum as a left join (select username,kode_user from dlmbg_user) as b on a.id_anggota=b.kode_user left join dlmbg_reply_forum as c on a.id_forum=c.id_forum left join dlmbg_kategori d on a.id_kategori=d.id_kategori group by a.id_forum DESC order by a.last_date DESC LIMIT ".$offset.",".$limit." ");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
						<tr>
						  <td width="450">
						  <span class="date-txt2">';
			$pecah = explode("-",substr($h->post_date,0,10)); 
			$hasil .= 'Kategori : '.$h->nama_kategori.'</span>
						  <div class="cleaner_h0"></div>
						  <strong><span class="h1-black"><a href="'.base_url().'forum/forum/detail/'.$h->id_forum.'" title="'.$h->judul.'">
						  '.substr($h->judul,0,50).'...</a></span></strong>
						  <div class="cleaner_h0"></div>
						  </td>
						  <td align="right" width="60">'.$h->hitung.' views</td>
						  <td align="right">'.$h->last_date.'</td>';

			$hasil .= "<td align='right'><a href='".base_url()."admin/thread_forum/hapus/".$h->id_forum."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
						</tr>
		      		</table>";
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_reply_forum($limit,$offset)
	{
		$tot_hal = $this->db->get("dlmbg_reply_forum");

		$config['base_url'] = base_url() . 'forum/my_reply/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select b.kode_user, c.judul as judul_post, a.id_forum,a.id_reply_forum,a.isi,c.last_date,a.tanggal,a.waktu,a.judul,b.nama_user,b.username from dlmbg_reply_forum as a inner join (select nama_user,kode_user,gbr,level,username from dlmbg_user) as b on a.id_anggota=b.kode_user inner join dlmbg_thread_forum c on a.id_forum=c.id_forum order by a.tanggal,a.waktu ASC LIMIT ".$offset.",".$limit." ");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="5" class="alert alert-success" bgcolor="#cbe6ff">
						<tr>
						  <td width="450">
						  <span class="date-txt2">';
			$hasil .= '<div class="cleaner_h0"></div>
						  <strong><span class="h1-black"><a href="'.base_url().'forum/forum/detail/'.$h->id_forum.'" title="'.$h->judul.'">
						  '.substr($h->judul,0,50).'...</a></span></strong>
						  <div class="cleaner_h0"></div>
						  '.strip_tags(substr($h->isi,0,100)).'...
						  </td>
						  <td align="right"><span class="label">'.$h->last_date.'</span><br><span class="label label-info">'.$h->nama_user.'</span></td>';


			$hasil .= "<td align='right'><a href='".base_url()."admin/reply_forum/hapus/".$h->id_reply_forum."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
						</tr>";
			$hasil .= '<tr>
						  <td align="left"><span class="label label-important">Forum : '.$h->judul_post.'</span></td>
						</tr>
						<tr>
		      		</table>';
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
}
