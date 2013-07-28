<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_forum extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

	public function generate_index_last_update($limit)
	{
		$w = $this->db->query("select d.nama_kategori, a.id_forum,a.isi,a.hitung,post_date,a.judul,b.username,count(c.id_reply_forum) as hit, a.last_date from dlmbg_thread_forum as a left join (select username,kode_user from dlmbg_user) as b on a.id_anggota=b.kode_user left join dlmbg_reply_forum as c on a.id_forum=c.id_forum left join dlmbg_kategori d on a.id_kategori=d.id_kategori group by a.id_forum DESC order by a.last_date DESC LIMIT ".$limit." ");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="8">
						<tr>
						  <td width="450">
						  <span class="date-txt2">';
			$pecah = explode("-",substr($h->post_date,0,10)); 
			$hasil .= 'Kategori : '.$h->nama_kategori.' <div class="cleaner_h0"></div> Posted on : '.$h->last_date.'</span>
						  <div class="cleaner_h0"></div>
						  <strong><a href="'.base_url().'forum/forum/detail/'.$h->id_forum.'" title="'.$h->judul.'">
						  '.substr($h->judul,0,50).'...</a></strong>
						  </td>
						  <td align="right" width="60">'.$h->hitung.' views</td>
						</tr>
					</table>';
		
		}
		return $hasil;
	}


	public function generate_index_new_update($limit)
	{
		$w = $this->db->query("select d.nama_kategori, a.id_forum,a.isi,a.hitung,post_date,a.judul,b.username,count(c.id_reply_forum) as hit, a.last_date from dlmbg_thread_forum as a left join (select username,kode_user from dlmbg_user) as b on a.id_anggota=b.kode_user left join dlmbg_reply_forum as c on a.id_forum=c.id_forum left join dlmbg_kategori d on a.id_kategori=d.id_kategori group by a.id_forum DESC order by a.id_forum DESC LIMIT ".$limit."");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="8">
						<tr>
						  <td width="450">
						  <span class="date-txt2">';
			$pecah = explode("-",substr($h->post_date,0,10)); 
			$hasil .= 'Kategori : '.$h->nama_kategori.' <div class="cleaner_h0"></div> Posted on : '.$h->last_date.'</span>
						  <div class="cleaner_h0"></div>
						  <strong><a href="'.base_url().'forum/forum/detail/'.$h->id_forum.'" title="'.$h->judul.'">
						  '.substr($h->judul,0,50).'...</a></strong>
						  </td>
						  <td align="right" width="60">'.$h->hitung.' views</td>
						</tr>
					</table>';
		
		}
		return $hasil;
	}


	public function generate_detail_forum($param,$limit,$offset)
	{
		$w = $this->db->query("select d.nama_kategori, b.kode_user, b.gbr, a.id_forum,a.isi,b.level,post_date,a.judul,b.nama_user,b.username, a.last_date from dlmbg_thread_forum as a left join (select nama_user,kode_user,gbr,level,username from dlmbg_user) as b on a.id_anggota=b.kode_user left join dlmbg_reply_forum as c on a.id_forum=c.id_forum left join dlmbg_kategori d on a.id_kategori=d.id_kategori where a.id_forum='".$param."' group by id_forum");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="1" cellpadding="10" bgcolor="#D4E5A1">
        <tr>
          <td class="bg-gowesip" colspan="2"><span class="tittle-forum3">'.$h->judul.'</span>
		  <div class="cleaner_h0"></div>
		  <span class="date-txt3">Posted on : ';
		  $pecah = explode("-",substr($h->post_date,0,10)); 
		  $hasil .= nama_hari($pecah[2],$pecah[1],$pecah[0]).' '; 
		  $hasil .= tgl_indo($h->post_date).' - '.substr($h->post_date,10,10).' WITA</span>
		  </td>
        </tr>
        <tr>
          <td bgcolor="#cbe6ff" width="110" align="center" valign="top">
		  <span class="date-txt3"><strong><a href="#">'.$h->nama_user.'</a></strong></span>
		  <div class="cleaner_h0"></div>
		 <div class="border-photo-profil2"><div class="hide-photo-profil-medium2"><img src="'.tampil_gravatar($h->gbr).'" width="60" /></div></div>
		  <div class="cleaner_h0"></div>
		  <span class="date-txt2">Username : <b>'.$h->username.'</b></span>
		  <div class="cleaner_h0"></div>
		  <span class="date-txt2">Privilages : <b>'.$h->level.'</b></span>
		  <div class="cleaner_h0"></div>
		  </td>
          <td bgcolor="#cbe6ff" valign="top" align="left">'.$h->isi.'</td>
        </tr>
		<tr>
		<td colspan="2" bgcolor="#cbe6ff" align="right">';
		
		if($this->session->userdata('kode_user')==$h->kode_user)
		{
		$hasil .= '<a href="'.base_url().'forum/forum/edit_post_thread/'.$h->id_forum.'"><span class="btn-reply">EDIT</span>
		</a>
		<a href="'.base_url().'forum/forum/hapus_post_thread/'.$h->id_forum.'"><span class="btn-reply">HAPUS</span></a>';
		
			}
		$hasil .= '<a href="'.base_url().'forum/forum/reply/'.$h->id_forum.'/"><span class="btn-reply">REPLY</span></a></td>
	</table>';
		
		}

		$where['id_forum'] = $param;
		$tot_hal = $this->db->get_where("dlmbg_reply_forum",$where);

		$config['base_url'] = base_url() . 'forum/forum/detail/'.$param.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select b.kode_user, b.gbr, a.id_forum,a.id_reply_forum,a.isi,b.level,a.tanggal,a.waktu,a.judul,b.nama_user,b.username from dlmbg_reply_forum as a left join (select nama_user,kode_user,gbr,level,username from dlmbg_user) as b on a.id_anggota=b.kode_user where id_forum='".$param."' order by a.tanggal,a.waktu ASC LIMIT ".$offset.",".$limit." ");
		
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="1" cellpadding="10" bgcolor="#D4E5A1">
        <tr>
          <td class="bg-gowesip" colspan="2"><span class="tittle-forum3">'.$h->judul.'</span>
		  <div class="cleaner_h0"></div>
		  <span class="date-txt3">Posted on : ';
		  $pecah = explode("-",substr($h->tanggal,0,10)); 
		  $hasil .= nama_hari($pecah[2],$pecah[1],$pecah[0]).' '; 
		  $hasil .= tgl_indo($h->tanggal).' - '.$h->waktu.' WITA</span>
		  </td>
        </tr>
        <tr>
          <td bgcolor="#cbe6ff" width="110" align="center" valign="top">
		  <span class="date-txt3"><strong><a href="#">'.$h->nama_user.'</a></strong></span>
		  <div class="cleaner_h0"></div>
		 <div class="border-photo-profil2"><div class="hide-photo-profil-medium2"><img src="'.tampil_gravatar($h->gbr).'" width="60" /></div></div>
		  <div class="cleaner_h0"></div>
		  <span class="date-txt2">Username : <b>'.$h->username.'</b></span>
		  <div class="cleaner_h0"></div>
		  <span class="date-txt2">Privilages : <b>'.$h->level.'</b></span>
		  <div class="cleaner_h0"></div>
		  </td>
          <td bgcolor="#cbe6ff" valign="top" align="left">'.$h->isi.'</td>
        </tr>
		<tr>
		<td colspan="2" bgcolor="#cbe6ff" align="right">';
		
		if($this->session->userdata('kode_user')==$h->kode_user)
		{
		$hasil .= '<a href="'.base_url().'forum/forum/edit_post_reply/'.$h->id_reply_forum.'/'.$h->id_forum.'"><span class="btn-reply">EDIT</span>
		</a>
		<a href="'.base_url().'forum/forum/hapus_post_reply/'.$h->id_reply_forum.'/'.$h->id_forum.'"><span class="btn-reply">HAPUS</span></a>';
		
			}
		$hasil .= '<a href="'.base_url().'forum/forum/reply/'.$h->id_forum.'/"><span class="btn-reply">REPLY</span></a></td>
	</table>';
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_forum_thread_kategori($param=0,$limit,$offset)
	{

		$where['id_kategori'] = $param;
		$tot_hal = $this->db->get_where("dlmbg_thread_forum",$where);

		$config['base_url'] = base_url() . 'forum/kategori/set/'.$param.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select d.nama_kategori, a.id_forum,a.isi,a.hitung,post_date,a.judul,b.username,count(c.id_reply_forum) as hit, a.last_date from dlmbg_thread_forum as a left join (select username,kode_user from dlmbg_user) as b on a.id_anggota=b.kode_user left join dlmbg_reply_forum as c on a.id_forum=c.id_forum left join dlmbg_kategori d on a.id_kategori=d.id_kategori where a.id_kategori='".$param."' group by a.id_forum DESC order by a.last_date DESC LIMIT ".$offset.",".$limit." ");
		
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
						  <td align="right" width="60"><span class="date-txt3">'.$h->hitung.' views</span></td>
						  <td align="right"><span class="date-txt3">'.$h->last_date.'</span></td>
						</tr>
						<tr>
		      		</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#cbe6ff">
						<td>
		            		<div class="line-grey"></div>
						</td>
						</tr>
					</table>';
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_forum_my_thread($param=0,$limit,$offset)
	{

		$where['id_anggota'] = $param;
		$tot_hal = $this->db->get_where("dlmbg_thread_forum",$where);

		$config['base_url'] = base_url() . 'forum/my_thread/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select d.nama_kategori, a.id_forum,a.isi,a.hitung,post_date,a.judul,b.username,count(c.id_reply_forum) as hit, a.last_date from dlmbg_thread_forum as a left join (select username,kode_user from dlmbg_user) as b on a.id_anggota=b.kode_user left join dlmbg_reply_forum as c on a.id_forum=c.id_forum left join dlmbg_kategori d on a.id_kategori=d.id_kategori where a.id_anggota='".$param."' group by a.id_forum DESC order by a.last_date DESC LIMIT ".$offset.",".$limit." ");
		
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
						  <td align="right" width="60"><span class="date-txt3">'.$h->hitung.' views</span></td>
						  <td align="right"><span class="date-txt3">'.$h->last_date.'</span></td>
						</tr>
						<tr>
		      		</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#cbe6ff">
						<td>
		            		<div class="line-grey"></div>
						</td>
						</tr>
					</table>';
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_forum_my_reply($param=0,$limit,$offset)
	{

		$where['id_anggota'] = $param;
		$tot_hal = $this->db->get_where("dlmbg_reply_forum",$where);

		$config['base_url'] = base_url() . 'forum/my_reply/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select b.kode_user, c.judul as judul_post, a.id_forum,a.id_reply_forum,a.isi,c.last_date,a.tanggal,a.waktu,a.judul,b.nama_user,b.username from dlmbg_reply_forum as a inner join (select nama_user,kode_user,gbr,level,username from dlmbg_user) as b on a.id_anggota=b.kode_user inner join dlmbg_thread_forum c on a.id_forum=c.id_forum where a.id_anggota='".$param."' order by a.tanggal,a.waktu ASC LIMIT ".$offset.",".$limit." ");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
						<tr>
						  <td width="450">
						  <span class="date-txt2">';
			$hasil .= '<div class="cleaner_h0"></div>
						  <strong><span class="h1-black"><a href="'.base_url().'forum/forum/detail/'.$h->id_forum.'" title="'.$h->judul.'">
						  '.substr($h->judul,0,50).'...</a></span></strong>
						  <div class="cleaner_h0"></div>
						  '.strip_tags(substr($h->isi,0,100)).'...
						  <div class="cleaner_h0"></div>
						  </td>
						  <td align="right"><span class="date-txt3">'.$h->last_date.'</span></td>
						</tr>
						<tr>
						  <td align="left"><span class="date-txt3">Forum : '.$h->judul_post.'</span></td>
						</tr>
						<tr>
		      		</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#cbe6ff">
						<td>
		            		<div class="line-grey"></div>
						</td>
						</tr>
					</table>';
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

}
