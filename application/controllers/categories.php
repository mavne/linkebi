<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {


	public function index()
	{
		$this->load->model("md_redir");
		$this->md_redir->gotourl("/error");
	}

	public function movies()
	{
		return $this->show_view("movies");
	}

	public function music()
	{		
		return $this->show_view("music");
	}

	public function games()
	{		
		return $this->show_view("games");
	}

	public function shops()
	{		
		return $this->show_view("shops");
	}

	public function heart()
	{		
		return $this->show_view("heart");
	}

	public function sport()
	{		
		return $this->show_view("sport");
	}

	public function news()
	{		
		return $this->show_view("news");
	}

	public function statements()
	{		
		return $this->show_view("statements");
	}

	public function gambling()
	{		
		return $this->show_view("gambling");
	}

	public function sale()
	{		
		return $this->show_view("sale");
	}

	public function education()
	{		
		return $this->show_view("education");
	}

	public function socnetworks()
	{		
		return $this->show_view("socnetworks");
	}

	public function webmaster()
	{		
		return $this->show_view("webmaster");
	}
	public function cars()
	{		
		return $this->show_view("cars");
	}
	public function finances()
	{		
		return $this->show_view("finances");
	}
	public function hunting()
	{		
		return $this->show_view("hunting");
	}
	public function forchild()
	{		
		return $this->show_view("forchild");
	}
	public function recipe()
	{		
		return $this->show_view("recipe");
	}	

	public function show_view($cat)
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
		// load commerce
		$this->load->model('md_commerce');
		// commerce
		$data["commerce"] = $this->md_commerce->out();
		// load categories
		$this->load->model('md_categories');
		$data["categories"] = $this->md_categories->cats($cat);

		// load view page
		$this->load->view('category_message', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */