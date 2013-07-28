<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function detail($id_param,$uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_galeri($id_param,$GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("galeri/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
   
   public function tambah($id_album=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['id_album'] = $id_album;
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("galeri/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			
			$config['upload_path'] = './asset/galeri/thumb/';
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '3000';
			$config['max_width']  	= '3000';
			$config['max_height']  	= '3000';
	 
			$this->load->library('upload', $config);

			if ($this->upload->do_upload("userfile")) {
				$data	 	= $this->upload->data();
	 
				/* PATH */
				$source             = "./asset/galeri/thumb/".$data['file_name'] ;
				$destination_thumb	= "./asset/galeri/" ;		 
				// Permission Configuration
				chmod($source, 0777) ;
	 
				/* Resizing Processing */
				// Configuration Of Image Manipulation :: Static
				$this->load->library('image_lib') ;
				$img['image_library'] = 'GD2';
				$img['create_thumb']  = TRUE;
				$img['maintain_ratio']= TRUE;
	 
				/// Limit Width Resize
				$limit_thumb    = 640 ;
	 
				// Size Image Limit was using (LIMIT TOP)
				$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
	 
				// Percentase Resize
				if ($limit_use > $limit_thumb) {
					$percent_thumb  = $limit_thumb/$limit_use ;
				}
	 
				//// Making THUMBNAIL ///////
				$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
				$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
	 
				// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_thumb ;
	 
				// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;
				
				if(!empty($_POST['id_tags']))
				{
					$tags = $_POST['id_tags'];
					$ic = 0;
					$tg = "";
					for($ic;$ic<count($tags);$ic++)
					{
						$tg .= $tags[$ic].',';
					}
					$in_data['id_tags'] = $tg;
				}
				
				$in_data['gambar'] = $data['file_name'];
				$in_data['judul'] = $this->input->post("judul");
				$in_data['id_album'] = $this->input->post("id_album");
				$this->db->insert("dlmbg_galeri",$in_data);
				unlink($source);
				redirect("admin/galeri/detail/".$in_data['id_album']."");
			}
			else 
			{
				echo $this->upload->display_errors('<p>','</p>');
			}
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param,$id_album)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_galeri'] = $id_param;
			$this->db->delete("dlmbg_galeri",$where);
			redirect("admin/galeri/detail/".$id_album."");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
