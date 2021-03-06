<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class website extends CI_Controller
{
	public function edit()
	{
		// session
		$data["session_id"] = $this->session->userdata('session_id');
		$data["ip_address"] = $this->session->userdata('ip_address');
		$data["user_agent"] = $this->session->userdata('user_agent');
		$data["last_activity"] = $this->session->userdata('last_activity');
		$data["username"] = $this->session->userdata('username');
		// current url 
		$this->load->model("md_current_url");
		$data['cur_url'] = $this->md_current_url->getUrl();
		// post add website
		if(isset($_POST["form_type"]))
		{
			$this->load->model("md_form");
			$data["form_message"] = $this->md_form->formValidation();
		}else{ $data["form_message"]=""; }

		// load title
		$this->load->model("md_title");
		$data["title"] = $this->md_title->getTitle();
		// load breadcraps
		$this->load->model("md_breadcraps");
		$data["breadcrups"] = $this->md_breadcraps->bread();
		// load navigation 
		$this->load->model("md_navigation");
		$data["nav"] = $this->md_navigation->nav();

		// load right commerce
		$this->load->model("md_commerce");
		$data["rt_commerce"] = $this->md_commerce->out("right");

		// load categories
		$this->load->model("md_categories");
		$data["categories"] = $this->md_categories->cats(false);

		// load form
		$this->load->model("md_edit_website");
		$data["load_form"] = $this->md_edit_website->form($data["form_message"]);

		// load view page
		$this->load->view('edit_message', $data); 
	}

}
?>