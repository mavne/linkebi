<?php
class account_settings extends CI_Controller
{
	public function index()
	{
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');
		$data["username"] = $this->session->userdata('username');
		$data["namelname"] = $this->session->userdata('namelname');
		$data["email"] = $this->session->userdata('email');
		
		if($data["username"])
		{
			// load title
			$this->load->model("md_title");
			$data["title"] = $this->md_title->getTitle();
			// load breadcraps
			$this->load->model("md_breadcraps");
			$data["breadcrups"] = $this->md_breadcraps->bread();
			// load navigation 
			$this->load->model("md_navigation");
			$data["nav"] = $this->md_navigation->nav();

			// current url 
			$this->load->model("md_current_url");
			$data['cur_url'] = $this->md_current_url->getUrl();

			//if post
			if(isset($_POST["form_type"]) && $_POST["form_type"]=="account_settings")
			{
				$this->load->model("md_form");
				$data["form_message"] = $this->md_form->formValidation();
			}
			
			//load user info
			$this->load->model("md_user");
			$data["user"] = $this->md_user->info();

			// load view page
			$this->load->view('account_message', $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl('/home');
		}
	}

	public function passwordchange()
	{
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');
		$data["username"] = $this->session->userdata('username');
		$data["namelname"] = $this->session->userdata('namelname');
		$data["email"] = $this->session->userdata('email');
		
		if($data["username"])
		{
			// load title
			$this->load->model("md_title");
			$data["title"] = $this->md_title->getTitle();
			// load breadcraps
			$this->load->model("md_breadcraps");
			$data["breadcrups"] = $this->md_breadcraps->bread();
			// load navigation 
			$this->load->model("md_navigation");
			$data["nav"] = $this->md_navigation->nav();

			//if post
			if(isset($_POST["form_type"]) && $_POST["form_type"]=="recover_password")
			{
				$this->load->model("md_form");
				$data["form_message"] = $this->md_form->formValidation();
			}
			
			//load user info
			$this->load->model("md_user");
			$data["user"] = $this->md_user->info();

			// load view page
			$this->load->view('recover_message', $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl('/home');
		}
	}
}
?>