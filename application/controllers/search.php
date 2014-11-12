<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller
{
	public function keyword($key = false)
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

		// load url
		$this->load->model("md_current_url");
		$data["url"] = $this->md_current_url->getUrl();

		//load search result
		$this->load->model("md_searchresult");
		$data["searchResult"] = $this->md_searchresult->res($data["url"]);

		// load view page
		$this->load->view('search_message', $data); 
	}
}
?>