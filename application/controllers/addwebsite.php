<?php
class Addwebsite extends CI_Controller
{
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

		// load right commerce
		$this->load->model("md_commerce");
		$data["rt_commerce"] = $this->md_commerce->out("right");

		// load view page
		$this->load->view('add_message', $data); 
	}
}
?>