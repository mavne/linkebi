<?php
class mylinks extends CI_Controller
{
	public function index()
	{
		return $this->page(1);
	}
	public function page($id)
	{
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');
		$data["username"] = $this->session->userdata('username');
		$data["namelname"] = $this->session->userdata('namelname');
		$data["email"] = $this->session->userdata('email');
		// current url 
		$this->load->model("md_current_url");
		$data['cur_url'] = $this->md_current_url->getUrl();
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

			// load user mylinks websites
			$this->load->model("md_links");
			$data["mylinksOut"] = $this->md_links->page($id);



			// load view page
			$this->load->view('mylinks_message', $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl('/home');
		}
	}

	public function add()
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
			// post add links
			if(isset($_POST["form_type"]))
			{
				$this->load->model("md_form");
				$data["form_message"] = $this->md_form->formValidation();
			}
			// load title
			$this->load->model("md_title");
			$data["title"] = $this->md_title->getTitle();
			// load breadcraps
			$this->load->model("md_breadcraps");
			$data["breadcrups"] = $this->md_breadcraps->bread();
			// load navigation 
			$this->load->model("md_navigation");
			$data["nav"] = $this->md_navigation->nav();

			// load view page
			$this->load->view('mylinks_add_message', $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl('/home');
		}
	}
}
?>