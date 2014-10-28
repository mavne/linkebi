<?php
class md_form extends CI_Model
{
	public function formValidation()
	{
		$out = "";
		if($_POST["form_type"]=="registration")
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
					$this->db->insert("users", 
						array(
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'namelname' => $_POST["namelname"],
							'email' => $_POST["email"],
							'username' => $_POST["username"],
							'password' => md5($_POST["password"]),
							'registration_time' => time()
						)
					);
					$out["done_message"] = "თქვენ წარმატებით გაიარეთ რეგისტრაცია !";
				}

			}
			else
			{
				$out["error_message"] = "გთხოვთ შეავსოთ სავალდებულო ველები !";
			}
		}
		else if($_POST["form_type"]=="authorition")
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
		else if($_POST["form_type"]=="addwebsite")
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
						$image_path = "http://img.404.ge/png/".$onlyname[0]."/180/73";
						$cat_ids = "";
						foreach($_POST["cat"] as $key => $value)
						{
							$cat_ids .= $key.",";
						}
						$cat_ids = rtrim($cat_ids, ",");
						//insert website
						$data = array(
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
		else if($_POST["form_type"]=="counter")
		{
			if($this->val_require($_POST["website_id"]))
			{
				$ip = $_SERVER["REMOTE_ADDR"];
				$website_id = (int)$_POST["website_id"];
				$query = $this->db->query("SELECT `id` FROM `views` WHERE `ip`='".mysql_real_escape_string($ip)."' AND `date`='".date("Y/m/d")."' AND `website_id`='".(int)$_POST["website_id"]."' ");
				$query2 = $this->db->query("SELECT `url`,`clicks` FROM `websites` WHERE `id`='".(int)$_POST["website_id"]."' ");
				
				if($query2->num_rows > 0)
				{
					$result = $query2->row();
					$out["goto"] = $result->url;
					if($query->num_rows <= 0)
					{// user already clicked the website today
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

}
?>