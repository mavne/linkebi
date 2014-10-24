<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// load commerce
		$this->load->model('md_commerce');
		$data["commerce"] = $this->md_commerce->out();
		// load categories
		$this->load->model('md_categories');
		$data["categories"] = $this->md_categories->cats();

		// load view page
		$this->load->view('home_message', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */