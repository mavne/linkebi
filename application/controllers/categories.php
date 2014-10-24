<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {


	public function index()
	{
		// load commerce
		$this->load->model('md_commerce');
		// commerce
		$data["commerce"] = $this->md_commerce->out();
		// load categories
		$this->load->model('md_categories');
		$data["categories"] = $this->md_categories->cats();

		// load view page
		$this->load->view('home_message', $data);
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

	public function show_view($cat)
	{
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