<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		// load title
		$this->load->model("md_title");
		$data["title"] = $this->md_title->getTitle();
		// current url 
		$this->load->model("md_current_url");
		$data['cur_url'] = $this->md_current_url->getUrl();
		// load breadcraps
		$this->load->model("md_breadcraps");
		$data["breadcrups"] = $this->md_breadcraps->bread();
		$this->load->view('error_page', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */