<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class foto_profil extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['kode_user'] = $this->session->userdata("kode_user");	
			$d['gbr_profil'] = $this->session->userdata("gbr");	
			
 			$this->load->view("foto_profil/bg_home",$d);
		}
		else
		{
			redirect(base_url());
		}
   }
   
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$config['upload_path'] = './asset/gravatar-member/';
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '3000';
			$config['max_width']  	= '3000';
			$config['max_height']  	= '3000';
	 
			$this->load->library('upload', $config);

			if ($this->upload->do_upload("userfile")) 
			{
				$data	 	= $this->upload->data();
	 
				/* PATH */
				$source             = "./asset/gravatar-member/".$data['file_name'] ;
				$destination_thumb	= "./asset/gravatar-member/thumb/" ;			 
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

				$this->session->set_userdata("gbr",$data['file_name']);

				$id['kode_user'] = $this->input->post("kode_user");
				$up['gbr'] = $data['file_name'];
				$this->db->update("dlmbg_user",$up,$id);
			}
			else 
			{
				echo $this->upload->display_errors('<p>','</p>');
			}
			redirect("global/foto_profil");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
