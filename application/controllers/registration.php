<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
		// load title
		$this->load->model("md_title");
		$data["title"] = $this->md_title->getTitle();
		// load breadcraps
		$this->load->model("md_breadcraps");
		$data["breadcrups"] = $this->md_breadcraps->bread();
		// load navigation 
		$this->load->model("md_navigation");
		$data["nav"] = $this->md_navigation->nav();
		
		//unset sessions
		$array_unset = array('ip_address'=>'', 'namelname'=>'', 'email'=>'', 'username'=>'', 'registration_time'=>'', 'last_login'=>'');
		$this->session->unset_userdata($array_unset);

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