<?php
class Md_title extends CI_Model
{

	public function getTitle()
	{
		$title = "";
		$this->load->model("md_current_url");
		$url = $this->md_current_url->getUrl();

		if($url[3]=="home"){
			$title = "მთავარი გვერდი - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="registration"){
			$title = "რეგისტრაცია / ავტორიზაცია - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="myspace"){
			$title = "პირადი სივრცე - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="addwebsite"){
			$title = "ვებ საიტის დამატება - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="feedback"){
			$title = "კონტაქტი - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="error"){
			$title = "მოხდა შეცდომა - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="counter"){
			$title = "მიმდინარეობს ვებ საიტზე გადასვლა - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="website" && $url[4]=="edit"){
			$title = "ვებ საიტის რედაქტირება - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="favorites"){
			$title = "ფავორიტები - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="account_settings"){
			$title = "ანგარიშის რედაქტირება - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="search"){
			$title = "ძიება - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="mylinks" && !isset($url[4])){
			$title = "ჩემი ბმულები - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="mylinks" && $url[4]=="add"){
			$title = "ბმულის დამატება - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="passwordrecovery"){
			$title = "პაროლის აღდგენა - ყველა ბმული ერთ საიტზე";
		}else if($url[3]=="categories"){
			$query  = $this->db->query("SELECT `name` FROM `categories` WHERE `slug`='".mysql_real_escape_string($url[4])."' AND `status`!=1 ");
			if($query->num_rows() > 0){
				$result = $query->row();
				$catName = $result->name;
			}else{
				$catName = "";
			}
			$title = $catName." - ყველა ბმული ერთ საიტზე";
		}
		return $title; //
	}

}
?>