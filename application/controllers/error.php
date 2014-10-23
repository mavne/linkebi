<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		$this->load->view('error_page');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */