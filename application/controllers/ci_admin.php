<?php
class ci_admin extends CI_Controller
{
	public function index()
	{
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');

		//unset sessions
		$array_unset = array('cms_username'=>'');
		$this->session->unset_userdata($array_unset);
	
		if(isset($_POST["form_type"]))
		{
			// load post
			$this->load->model("md_form");
			$data["out"] = $this->md_form->formValidation();
		}

		//load css
		$data["css"] = $this->getcss();
		// load ie js
		$data["iejs"] = $this->getiejs();
		//load js
		$data["getjs"] = $this->getjs();
		// load view page
		$this->load->view('ciadmin_message', $data);
	}

	public function welcome()
	{
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');

		if($this->session->userdata('cms_username'))
		{
			// user
			$data["cms_username"] = $this->session->userdata('cms_username');
			// current url 
			$this->load->model("md_current_url");
			$data['cur_url'] = $this->md_current_url->getUrl();
			//load css
			$data["css"] = $this->getcss(true);
			//load js
			$data["getjs"] = $this->getjs(true);

			// load view page
			$this->load->view('ciadmin_homepage', $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl("/ci_admin");
		}
	}

	public function getcss($user = false)
	{
		$out = '';
		if(!$user) 
		{
			$out .= '';
		}else{
			$out .= '';
			
		}
		return $out;
	}

	public function getiejs($user = false)
	{
		$out = '';
		if(!$user) 
		{
			$out .= '';
		}else{
			$out .= '';
		}
	}

	public function getjs($user = false)
	{
		$out = '';
		if(!$user)
		{
			$out .= '';
		}else{
			$out .= '';
		}
		return $out;
	}
}
?>