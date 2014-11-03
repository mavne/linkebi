<?php
class md_form extends CI_Model
{
	public function formValidation()
	{
		$out = "";
		if(isset($_POST["form_type"]) && $_POST["form_type"]=="registration")
		{
			if
			(
				$this->val_require($_POST["form_type"]) && 
				$this->val_require($_POST["namelname"]) && 
				$this->val_require($_POST["email"]) && 
				$this->val_require($_POST["username"]) && 
				$this->val_require($_POST["password"]) && 
				$this->val_require($_POST["re-password"]) 
			)
			{
				
				if(!$this->val_email($_POST["email"]))
				{// email is not valid
					$out["error_message"] = "ელ-ფოსტის ფორმატი არასწორია !";
				}
				else if(!$this->val_length($_POST["username"], array(6,12)))
				{
					$out["error_message"] = "მომხმარებლის სახელის ველი უნდა შედგებოდეს მინიმუმ 6 და მაქსიმუმ 12 სიმბოლოსგან !";
				}
				else if(!$this->val_length($_POST["password"], array(6,25)))
				{
					$out["error_message"] = "პაროლის ველი უნდა შედგებოდეს მინიმუმ 6 და მაქსიმუმ 25 სიმბოლოსგან !";
				}
				else if($_POST["password"] != $_POST["re-password"])
				{
					$out["error_message"] = "პაროლები არ ემთხვევა ერთმანეთს !";
				}
				else if(!$this->val_checkusername($_POST["username"]))
				{
					$out["error_message"] = "მომხმარებლის სახელი დაკავაბულია !";
				}
				else
				{// insert new user		
					$md5_pass = md5($_POST["password"]);			
					$this->db->insert("users", 
						array(
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'namelname' => $_POST["namelname"],
							'email' => $_POST["email"],
							'username' => $_POST["username"],
							'password' => $md5_pass,
							'registration_time' => time()
						)
					);
					$out["done_message"] = $this->val_auth($_POST["username"],$_POST["password"]); 
					//$out["done_message"] = "თქვენ წარმატებით გაიარეთ რეგისტრაცია !";
				}

			}
			else
			{
				$out["error_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		else if(isset($_POST["form_type"]) && $_POST["form_type"]=="authorition")
		{
			if
			(
				$this->val_require($_POST["auth_username"]) && 
				$this->val_require($_POST["auth_password"]) 
			)
			{
				if(!$this->val_auth($_POST["auth_username"],$_POST["auth_password"]))
				{
					$out["error_message_auth"] = "ავტორიზაციისას მოხდა შეცდომა !";
				}
			}
			else
			{
				$out["error_message_auth"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		else if(isset($_POST["form_type"]) && $_POST["form_type"]=="addwebsite")
		{
			if
			(
				$this->val_require($_POST["name"]) && 
				$this->val_require($_POST["url"])
			)
			{
				if(!isset($_POST["cat"]) || !$this->vat_array_empty($_POST["cat"]))
				{
					$out["addwebsite_message"] = "გთხოვთ მონიშნოთ მინიმუმ ერთი კატეგორია !";
				}
				else if(!$this->val_file_empty("file"))
				{
					$out["addwebsite_message"] = "გთხოვთ ატვირთოთ ვებ საიტის ლოგო !";
				}
				else if(!$this->val_file_type("file",array('png','jpg','jpeg','gif')))
				{
					$out["addwebsite_message"] = "ატვირთული ფოტოს ფორმატი არ შეესაბამება მოთხოვნილს !";
				}
				else if(!$this->val_file_size("file","500000"))
				{
					$out["addwebsite_message"] = "ატვირთული ფაილის ზომა აღემატება დასაშვებს !";
				}
				else
				{
					$newFileName = $this->upload_file_to("file","../public-images/img/");
					if($newFileName){
						$username = $this->session->userdata('username');
						$onlyname = explode(".",$newFileName);
						$image_path = "http://img.404.ge/".$onlyname[1]."/".$onlyname[0]."/180/73";
						$cat_ids = "";
						foreach($_POST["cat"] as $key => $value)
						{
							$cat_ids .= $key.",";
						}
						$cat_ids = rtrim($cat_ids, ",");
						//insert website
						$data = array(
						   'ip_address' => $_SERVER['REMOTE_ADDR'],
						   'cat_id' => $cat_ids,
						   'username' => $username,
						   'name' => $_POST["name"],
						   'url' => $_POST["url"], 
						   'img' => $image_path 
						);
						$insert = $this->db->insert('websites', $data); 
						if($insert){
							$out["addwebsite_message_done"] = "მადლობთ, ვებ საიტი წარმატებით დაემატა ! დასტურის მიცემის შემდგომ გამოჩნდება საიტზე";
						}else{
							$out["addwebsite_message"] = "მოხდა ფატალური შეცდომა !";
						}
						
					}else{
						$out["addwebsite_message"] = "ფაილის ატვირთვისას მოხდა შეცდომა !";
					}
				}
			}
			else
			{
				$out["addwebsite_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		else if(isset($_POST["form_type"]) && $_POST["form_type"]=="counter")
		{
			if($this->val_require($_POST["website_id"]))
			{
				$ip = $_SERVER["REMOTE_ADDR"];
				$website_id = (int)$_POST["website_id"];
				$query = $this->db->query("SELECT `id` FROM `views` WHERE `ip`='".mysql_real_escape_string($ip)."' AND `date`='".date("Y/m/d")."' AND `website_id`='".(int)$_POST["website_id"]."' ");
				$query2 = $this->db->query("SELECT `url`,`clicks` FROM `websites` WHERE `id`='".(int)$_POST["website_id"]."' ");
				
				if($query2->num_rows() > 0)
				{
					$result = $query2->row();
					$out["goto"] = $result->url;
					if($query->num_rows() <= 0)
					{// user not clicked the website today
						$data = array(
						   'date' => date("Y/m/d"),
						   'ip' => $ip,
						   'website_id' => $website_id
						);
						$this->db->insert('views', $data); 

						// update view count
						$data2 = array(
						'clicks' => ($result->clicks + 1)
						);
						$this->db->where('id', $website_id);
						$this->db->update('websites', $data2); 
					}
				}
				else{
					$out["goto"] = "/error";
				}

				
			}
			else
			{
				$out["goto"] = "/error";
			}
		}
		else if(isset($_POST["form_type"]) && $_POST["form_type"]=="editwebsite")
		{
			if
			(
				$this->val_require($_POST["name"]) && 
				$this->val_require($_POST["url"])
			)
			{
				if(!isset($_POST["cat"]) || !$this->vat_array_empty($_POST["cat"]))
				{
					$out["addwebsite_message"] = "გთხოვთ მონიშნოთ მინიმუმ ერთი კატეგორია !";
				}
				else
				{
					//categories
					$cat_ids = "";
					foreach($_POST["cat"] as $key => $value)
					{
						$cat_ids .= $key.",";
					}
					$cat_ids = rtrim($cat_ids, ",");
					//user name
					$username = $this->session->userdata('username');
					//load url
					$this->load->model("md_current_url");
					$url = $this->md_current_url->getUrl();

					// file upload
					if(!$this->val_file_type("file",array('png','jpg','jpeg','gif')))
					{
						$out["addwebsite_message"] = "ატვირთული ფოტოს ფორმატი არ შეესაბამება მოთხოვნილს !";
					}
					else if(!$this->val_file_size("file","500000"))
					{
						$out["addwebsite_message"] = "ატვირთული ფაილის ზომა აღემატება დასაშვებს !";
					}else{				
						$newFileName = $this->upload_file_to("file","../public-images/img/");
						$onlyname = explode(".",$newFileName);
					}

					if(isset($newFileName)){
						$image_path = "http://img.404.ge/".$onlyname[1]."/".$onlyname[0]."/180/73";
						//update website
						$data = array(
						   'cat_id' => $cat_ids,
						   'name' => $_POST["name"],
						   'url' => $_POST["url"], 
						   'img' => $image_path, 
						   'allowed' => 0, 
						   'clicks' => 0
						);
					}else{
						//update website
						$data = array(
						   'cat_id' => $cat_ids,
						   'name' => $_POST["name"],
						   'url' => $_POST["url"], 
						   'allowed' => 0, 
						   'clicks' => 0
						);
					}						
					$update = $this->db->update('websites', $data, array('id' => $url[5], 'status' => 0, 'username' => $username)); 

				
					if(isset($update)){
						$out["addwebsite_message_done"] = "ვებ საიტი წარმატებით დარედაქტირდა ! დასტურის მიცემის შემდგომ გამოჩნდება საიტზე";
					}else{
						$out["addwebsite_message"] = "მოხდა ფატალური შეცდომა !";
					}
					$out["addwebsite_message"] = "ფაილის ატვირთვისას მოხდა შეცდომა !";
					
				}
			}
			else
			{
				$out["addwebsite_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		else if(isset($_GET["form_type"]) && $_GET["form_type"]=="ajax_favourite")
		{// add favourite
			if($this->val_require($_GET["wid"]) && $this->val_require($this->session->userdata('username')))
			{// check posts
				if($this->val_checkfavourite($_GET["wid"], $this->session->userdata('username')))
				{// favourite exists
					$this->favourite($_GET["wid"], $this->session->userdata('username'),false);
					$out = "deleted";
				}
				else
				{// favourite not exists
					$out = $this->favourite($_GET["wid"], $this->session->userdata('username'),true);
					$out = "added";
				}
			}
		}
		else if(isset($_POST["form_type"]) && $_POST["form_type"]=="account_settings")
		{
			if
			(
				$this->val_require($_POST["namelname"]) && 
				$this->val_require($_POST["email"])
			)
			{	
				//user name
				$username = $this->session->userdata('username');
				//update website
				$data = array(
				   'namelname' => $_POST["namelname"],
				   'email' => $_POST["email"]
				);				
				$update = $this->db->update('users', $data, array('username' => $username)); 

				if(isset($update)){
					$out["account_message_done"] = "მონაცემები წარმატებით დარედაქტირდა !";
				}else{
					$out["account_message"] = "მოხდა ფატალური შეცდომა !";
				}
			}
			else
			{
				$out["account_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		else if(isset($_POST["form_type"]) && $_POST["form_type"]=="recover_password")
		{
			if($this->val_require($_POST["old"]) && $this->val_require($_POST["new"]) && $this->val_require($_POST["comfirm"]))
			{
				if($this->checkoldpass($_POST["old"],$this->session->userdata('username')))
				{//checked old pass is right
					if($this->val_equal($_POST["new"],$_POST["comfirm"]))
					{// new password equals
						$data = array(
						'password' => md5($_POST["comfirm"])
						);				
						$update = $this->db->update('users', $data, array('username' => $this->session->userdata('username'))); 
						if(isset($update)){
							$out["password_message_done"] = "მონაცემები წარმატებით დარედაქტირდა !";
						}else{
							$out["password_message"] = "მოხდა ფატალური შეცდომა !";
						}
					}
					else{
						$out["password_message"] = "პაროლები არ ემთხვევა ერთმანეთს !";
					}
				}
				else{
					$out["password_message"] = "ძველი პაროლი არასწორია !";
				}
			}
			else{
				$out["password_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		else if(isset($_POST["form_type"]) && $_POST["form_type"]=="feedback")
		{
			if($this->val_require($_POST["namelname"]) && $this->val_require($_POST["email"]) && $this->val_require($_POST["subject"]) && $this->val_require($_POST["text"]))
			{
				$ip_address = $_SERVER['REMOTE_ADDR'];
				if($this->val_email($_POST["email"]))
				{
					//load email function
					$this->load->model("md_sendemail");
					$this->md_sendemail->sendit("html",$_POST["email"],$_POST["namelname"],'giorgigvazava87@gmail.com',$_POST["subject"],$_POST["text"],false,false);

					//$this->email->print_debugger()
					$out["feedback_message_done"] = "შეტყობინება წარმატებით გაიგზავნა !";
				}
				else
				{
					$out["feedback_message"] = "ელ-ფოსტის ფორმატი არასწორია !";
				}
			}
			else
			{
				$out["feedback_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}else if(isset($_POST["form_type"]) && $_POST["form_type"]=="addlink")
		{
			if($this->val_require($_POST["name"]) && $this->val_require($_POST["desc"]) && $this->val_require($_POST["url"]))
			{
				$data = array(
				'ip_address' => $_SERVER['REMOTE_ADDR'],
				'username' => $this->session->userdata('username'),
				'title' => mysql_real_escape_string($_POST["name"]),
				'desc' => mysql_real_escape_string($_POST["desc"]), 
				'url' => mysql_real_escape_string($_POST["url"]) 
				);

				$this->db->insert('links', $data); 

				$out["linkadd_message_done"] = "ოპერაცია წარმატებით დასრულდა !";
			}else
			{
				$out["linkadd_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}else if(isset($_GET["form_type"]) && $_GET["form_type"]=="removeLinks")
		{
			$username = $this->session->userdata('username');
			$id = $_GET["linkid"];

			$this->db->delete('links', array('id' => $id, 'username'=> $username)); 
			$out = "done";
		}else if(isset($_POST["form_type"]) && $_POST["form_type"]=="rec_password")
		{
			if($this->val_require($_POST["email"]))
			{
				if($this->val_email($_POST["email"]))
				{	
					if($this->emailExists($_POST["email"]))
					{
						//load email function
						$this->load->model("md_sendemail");
						// GENERATE PASSWORD
						$this->load->model("md_generate");
						$generate = $this->md_generate->code(6);
						//insert passrecovery	
						$this->insertpassrec($generate,$_POST["email"]);
						//e-mail
						$texttype="html";
						$fromemail = 'recover@linkebi.ge';
						$emailname = 'პაროლის აღდგენა';
						$emailsubject = 'Links.404.ge';
						$text = 'პაროლის შესაცვლელად მიჰყევით ბმულს: <a href="http://links.404.ge/passwordrecovery/code/'.$generate.'">დაკლიკეთ აქ</a>';
						
						$debug = $this->md_sendemail->sendit($texttype,$fromemail,$emailname,$_POST["email"],$emailsubject,$text,false,false);
						
						$out["rec_message_done"] = "ოპერაცია წარმატებით დასრულდა ! ";
					}
					else
					{
						$out["rec_message"] = "აღნიშნული ელ-ფოსტა არ არის დარეგისტრირებული ჩვენს სისტემაში !";
					}
				}
				else
				{
					$out["rec_message"] = "ელ-ფოსტის ფორმატი არასწორია !";
				}				
			}else{
				$out["rec_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		return $out;
	}

	public function val_require($post)
	{
		if(!isset($post) || empty($post)){
			return false;
		}else{
			return true;
		}
	}

	public function val_email($email)
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))		{
			return false;
		}else{
			return true;
		}
	}

	public function val_length($string, $length)
	{
		if(mb_strlen($string) < $length[0] || mb_strlen($string) > $length[1]){
			return false;
		}
		else{
			return true;
		}
	}

	public function val_checkusername($username)
	{
		$query = $this->db->query("SELECT `id` FROM `users` WHERE `username`='".mysql_real_escape_string($username)."' AND `status`!=1 ");
		if ($query->num_rows() <= 0){
			return true;
		}else{
			return false;
		}
	}

	public function val_auth($user,$pass)
	{
		$query = $this->db->query("SELECT * FROM `users` WHERE `username`='".mysql_real_escape_string($user)."' AND `password`='".md5($pass)."' AND `status`!=1 ");
		if ($query->num_rows() > 0){
			$result = $query->result();
			foreach($result as $row)
			{
				$newdata["ip_address"] = $row->{"ip_address"};
				$newdata["namelname"] = $row->{"namelname"};
				$newdata["email"] = $row->{"email"};
				$newdata["username"] = $row->{"username"};
				$newdata["registration_time"] = $row->{"registration_time"};
				$newdata["last_login"] = $row->{"last_login"};
			}
			$this->session->set_userdata($newdata);
			$this->load->model("md_redir");
			$this->md_redir->gotourl("/myspace");
		}else{
			return false;
		}
	}

	public function vat_array_empty($post)
	{
		if(count($post))
		{
			return true;
		}else{
			return false;
		}
	}

	public function val_file_empty($name)
	{
		if(isset($_FILES[$name]["name"]) && !empty($_FILES[$name]["name"]))
		{
			return true;
		}else{
			return false;
		}
	}

	public function val_file_type($name, $file_type)
	{
		$ext = end(explode(".",$_FILES[$name]["name"]));
		if(in_array(strtolower($ext), $file_type)){
			return true;
		}else{
			return false;
		}
	}

	public function val_file_size($name,$size)
	{
		$s = $_FILES[$name]["size"];
		if($s > $size){
			return false;
		}else{
			return true;
		}
	}

	public function upload_file_to($name,$path)
	{
		//variables
		$filename = $_FILES[$name]["name"];
		$ext = end(explode(".",$filename));
		$newname = time().".".strtolower($ext);
		$dir = $path.$newname;
		//move
		$move = move_uploaded_file($_FILES[$name]["tmp_name"], $dir);
		if($move){
			return $newname;
		}else{
			return false;
		}

	}

	public function val_checkfavourite($wid,$username)
	{
		$query = $this->db->query("SELECT `id` FROM `favourites` WHERE `web_id`='".(int)$wid."' AND `username`='".$username."' ");
		if($query->num_rows() > 0)
		{
			return true;
		}else{
			return false;
		}
	}

	public function favourite($wid,$user,$add)
	{
		if($add)
		{// add favourite
			$data = array(
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'insert_date' => time(),
			'web_id' => mysql_real_escape_string($wid),
			'username' => mysql_real_escape_string($user) 
			);
			$this->db->insert('favourites', $data); 
		}
		else
		{//remove favourite
			$this->db->delete('favourites', array('web_id' => mysql_real_escape_string($wid), 'username' => mysql_real_escape_string($user) )); 
		}
	}

	public function checkoldpass($old,$username)
	{
		$query = $this->db->query("SELECT `id` FROM `users` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".md5($old)."' AND `status`!=1 "); 
		if($query->num_rows() > 0)
		{
			return true;
		}else{
			return false;
		}
	}

	public function val_equal($var,$var2){
		if($var == $var2){
			return true;
		}else{
			return false;
		}
	}

	public function emailExists($email)
	{
		$query = $this->db->query("SELECT `id` FROM `users` WHERE `email`='".mysql_real_escape_string($email)."' ");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function insertpassrec($code,$email)
	{
		$data = array(
		   '`ip_address`' => $_SERVER["REMOTE_ADDR"],
		   '`date`' => time(),
		   '`code`' => mysql_real_escape_string($code), 
		   '`email`' => mysql_real_escape_string($email)
		);

		$this->db->insert('recovery', $data); 
	}

}
?>