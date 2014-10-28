<?php
class md_breadcraps extends CI_Model
{
	public function bread()
	{
		$bread = '<ol class="breadcrumb">';
		$this->load->model("md_current_url");
		$url = $this->md_current_url->getUrl();

		if($url[3]=="home"){
			$bread .= '<li><a href="/home">მთავარი</a></li>';
		}else if($url[3]=="registration"){
			$bread .= '<li><a href="/home">მთავარი</a></li>';
			$bread .= '<li><a class="active">რეგისტრაცია</a></li>';
		}else if($url[3]=="myspace"){
			$bread .= '<li><a href="/home">მთავარი</a></li>';
			$bread .= '<li><a class="active">პირადი სივრცე</a></li>';
		}else if($url[3]=="addwebsite"){
			$bread .= '<li><a href="/home">მთავარი</a></li>';
			$bread .= '<li><a class="active">ვებ საიტის დამატება</a></li>';
		}else if($url[3]=="feedback"){
			$bread .= '<li><a href="/home">მთავარი</a></li>';
			$bread .= '<li><a class="active">კონტაქტი</a></li>';
		}else if($url[3]=="error"){
			$bread .= '<li><a href="/home">მთავარი</a></li>';
			$bread .= '<li><a class="active">მოხდა შეცდომა</a></li>';
		}else if($url[3]=="counter"){
			$bread .= '<li><a href="/home">მთავარი</a></li>';
			$bread .= '<li><a class="active">მიმდინარეობს ვებ საიტზე გადასვლა</a></li>';
		}else if($url[3]=="categories"){
			$query  = $this->db->query("SELECT `name` FROM `categories` WHERE `slug`='".mysql_real_escape_string($url[4])."' AND `status`!=1 ");
			if($query->num_rows() > 0){
				$result = $query->row();
				$catName = $result->name;
			}else{
				$catName = "";
			}
			$bread .= '<li><a href="/home">მთავარი</li>';
			$bread .= '<li><a class="active">'.$catName.'</li>';
		}
		$bread .= '</ol>';
		return $bread;
	}
}
?>