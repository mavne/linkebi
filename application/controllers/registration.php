<?php
class registration extends CI_Controller
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

		if(isset($_POST["form_type"]))
		{
			$this->load->model("md_form");
			$data["form_message"] = $this->md_form->formValidation();
		}
		// load view page
		$this->load->view('registration_message', $data);
	}
}
?>