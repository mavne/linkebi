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

}
?>