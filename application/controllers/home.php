<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');
		$data["username"] = $this->session->userdata('username');


		// load navigation 
		$this->load->model("md_navigation");
		$data["nav"] = $this->md_navigation->nav();
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