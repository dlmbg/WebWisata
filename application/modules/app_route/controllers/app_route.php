<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Route extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Controller untuk routing
	 **/
	 
	public function index()
	{
		$st = $this->session->userdata('level');
		if($st=="admin")
		{
			redirect($st);
		}
		else
		{
			redirect("web");
		}
	}
}

/* End of file app_route.php */
/* Location: ./application/controllers/app_route.php */