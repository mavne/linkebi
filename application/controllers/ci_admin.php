<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
			//load category count
			$this->load->model("md_count_data");
			$data["category_count"] = $this->md_count_data->cou("category");
			$data["category_website"] = $this->md_count_data->cou("website");
			$data["category_websitenot"] = $this->md_count_data->cou("websitenot");
			$data["category_users"] = $this->md_count_data->cou("users");
			//load user list
			$this->load->model("md_user_list");
			$data["user_list"] = $this->md_user_list->lists();
			// load 10 website
			$this->load->model("md_website_lists");
			$data["website_list"] = $this->md_website_lists->getall("*",1,'/',10,1);

			// load view page
			$this->load->view('ciadmin_homepage', $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl("/ci_admin");
		}
	}


	public function categories($type = "table")
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
			//post
			if(isset($_POST["form_type"]))
			{
				$this->load->model("md_form");
				$data["message"] = $this->md_form->formValidation();
			}
			// load redirect	
			$this->load->model("md_redir");	
			// load proper view
			switch($type)
			{
				case "table":
				$viewpage = "ciadmin_categories";
				break;
				case "add":
				$viewpage = "ciadmin_categories_add";
				break;
				case "up":
				$this->change_position("up");
				break;
				case "down":
				$this->change_position("down");
				break;
				case "delete":
				$this->delete_query();
				break;
				case "edit": 
				$edit_id = (!empty($data['cur_url'][6])) ? $data['cur_url'][6] : "";
				if(!$edit_id){
					$this->md_redir->gotourl("/error"); 
				}
				$this->load->model("md_categories");
				$data["category"] = $this->md_categories->cats(false,false,$edit_id);
				$viewpage = "ciadmin_categories_edit";
				break;
			}
			// load categories
			$this->load->model("md_categories");
			$data["categories"] = $this->md_categories->cats();
			// load view page
			$this->load->view($viewpage, $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl("/ci_admin");
		}
	}


	public function websites($type = "all")
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
			//post
			if(isset($_POST["form_type"]))
			{
				$this->load->model("md_form");
				$data["message"] = $this->md_form->formValidation();
			}
			// load redirect	
			$this->load->model("md_redir");	
			// load proper view
			switch($type)
			{
				case "all":
				$viewpage = "ciadmin_websites";
				$allowedx = "x";
				break;
				case "disallowed":
				$viewpage = "ciadmin_websites";
				$allowedx = "0";
				break;
				case "alloweds":
				$viewpage = "ciadmin_websites";
				$allowedx = "1";
				break;
				case "permition":
				//$this->delete_query();
				break;
				case "edit": 
				$edit_id = (!empty($data['cur_url'][6])) ? $data['cur_url'][6] : "";
				if(!$edit_id){
					$this->md_redir->gotourl("/error"); 
				}
				$viewpage = "ciadmin_websites_edit";
				break;
			}
			// load categories
			$pageForPagination = (!empty($data['cur_url'][7])) ? $data['cur_url'][7] : 1;
			$this->load->model("md_website_lists");
			$data["websites"] = $this->md_website_lists->getall("*", $allowedx,'/ci_admin/websites/'.$type.'/pn/',10,$pageForPagination,"ORDER BY `id` DESC");
			
			// load view page
			$this->load->view($viewpage, $data);
		}
		else
		{
			$this->load->model("md_redir");
			$this->md_redir->gotourl("/ci_admin");
		}
	}

	public function editWevsite($id)
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
		// edit website
		if(isset($_POST["form_type"])){
			$this->load->model("md_form");
			$data["message"] = $this->md_form->formValidation();
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
		// load website data
		$this->load->model("md_website_lists");
		$data["web"] = $this->md_website_lists->web($id);

		// get categories
		$this->load->model("md_categories");
		$data["categories"] = $this->md_categories->cats(false, false);

		// load view page
		$this->load->view('ci_edit_website', $data);
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

	public function change_position($type)
	{
		$this->load->model("md_current_url");
		$url = $this->md_current_url->getUrl();
		$query = $this->db->query("SELECT `position` FROM `categories` WHERE `id`='".(int)$url[6]."' ");
		if($query->num_rows() > 0){
			$row = $query->row();
			$position = $row->{"position"};
			if($type=="up"){
				$updata = array(
					'position'=>0,
					);
				$updata2 = array(
					'position'=>(int)($position-1),
					);
				$updata3 = array(
					'position'=>(int)$position,
					);
				$this->db->update('categories', $updata, array('`position`'=>(int)($position-1)) ); // 1 = 0
				if(!$this->db->_error_number()){
					$this->db->update('categories', $updata2, array('`position`'=>(int)($position)) ); // 2 = 1
					if(!$this->db->_error_number()){
						$this->db->update('categories', $updata3, array('`position`'=>0)); // 0 = 2
						$this->load->model("md_redir");
						$this->md_redir->gotourl("/ci_admin/categories");
					}
				}
			}else if($type == "down"){
				##
				#	5 = 6 | 	
				##
				$updata = array(
					'position'=>0,
					);
				$updata2 = array(
					'position'=>(int)($position+1),
					);
				$updata3 = array(
					'position'=>(int)$position,
					);
				$this->db->update('categories', $updata, array('`position`'=>(int)($position+1)) ); // 19 = 0
				if($this->db->affected_rows()){
					$this->db->update('categories', $updata2, array('`position`'=>(int)($position)) ); // 2 = 1
					if($this->db->affected_rows()){
						$this->db->update('categories', $updata3, array('`position`'=>0)); // 0 = 2
						$this->load->model("md_redir");
						$this->md_redir->gotourl("/ci_admin/categories");
					}else{
						$this->md_redir->gotourl("/ci_admin/categories");
					}
				}else{
					$this->md_redir->gotourl("/ci_admin/categories");
				}
			}
		}
	}

	public function delete_query()
	{
		//load url
		$this->load->model("md_current_url");
		$url = $this->md_current_url->getUrl();
		//select currecnt position
		$query = $this->db->query("SELECT `position` FROM `categories` WHERE `id`='".$url[6]."' ");
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$position = $row->{"position"};
			// delete current  position
			$this->db->delete('categories', array('id' => $url[6])); 
			// update others position

			$this->db->set('position', '(position-1)', false);
			$this->db->where("`position` > $position");
			$this->db->update('categories');

			// $data = array('position'=>'(position-1)');
			// $this->db->update('categories', $data, "`position` > $position");

			// go to category page
			$this->md_redir->gotourl("/ci_admin/categories");
		}
	}
}
?>