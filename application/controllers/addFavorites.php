<?php
class addFavorites extends CI_Controller
{

	public function index()
	{
		$out = 0;
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');
		$data["username"] = $this->session->userdata('username');

		// current url 
		$this->load->model("md_current_url");
		$data['cur_url'] = $this->md_current_url->getUrl();

		if(!$this->session->userdata('username'))
		{// if not session go to front page
			$this->load->model("md_redir");
			$this->md_redir->gotourl("/home");
		}
		else
		{
			// post add website
			if(isset($_GET["form_type"]))
			{
				$this->load->model("md_form");
				$out = $this->md_form->formValidation();
			}
		}
		echo $out;

	}

}
?>