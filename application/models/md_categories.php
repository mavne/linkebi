<?php
class md_categories extends CI_Model{
	public function cats($cat_slug = false, $usersname = false, $edit_id = false)
	{
		if(!$cat_slug){
			if($edit_id){ $sq = ' AND `categories`.`id`='.(int)$edit_id; }
			else{ $sq = ''; }
			//categories
			$query = $this->db->query("SELECT 
			`categories`.`id` AS cats,
			`categories`.`name` AS name,
			`categories`.`icon` AS icon,
			`categories`.`slug` AS slug 
			FROM `categories`
			WHERE `categories`.`status`!=1 $sq ORDER BY `categories`.`position` ASC");
			if($edit_id){
				$out = $query->row();
			}
			else{
				$out = $query->result();
			}
		}
		else 
		{
			if($usersname){ 
				//users website
				$query = $this->db->query("SELECT 
											`websites`.`id`,`websites`.`username`,`websites`.`name`,`websites`.`url`,`websites`.`img`,`websites`.`clicks`
											FROM 
											`websites` 
											WHERE 
											`websites`.`status`!=1 AND 
											`websites`.`allowed`!=0 AND 
											`websites`.`username`='".$usersname."' 
											ORDER BY `websites`.`clicks` DESC");
			}else{
				$user = $this->session->userdata('username');
				//websites by categories
				$query = $this->db->query("SELECT 
											`websites`.`id` AS w_id, 
											`websites`.`username` AS w_username, 
											`websites`.`name` AS w_name,
											`websites`.`url` AS w_url,
											`websites`.`img` AS w_img,
											`websites`.`clicks` AS w_clicks, 
											`favourites`.`id` AS w_favourite 
											FROM 
											`categories`,`websites` 
											LEFT JOIN `favourites` 
											ON `websites`.`id` = `favourites`.`web_id` AND `favourites`.`username`= '".mysql_real_escape_string($user)."'
											WHERE 
											`categories`.`slug`='".mysql_real_escape_string($cat_slug)."' AND 
											`categories`.`status`!=1  AND 
											FIND_IN_SET(`categories`.`id`,`websites`.`cat_id`) AND 
											`websites`.`status`!=1 AND 
											`websites`.`allowed`!=0
											ORDER BY `websites`.`clicks` DESC");
			}
			
			//$out = $query->result();
			$out = $query->result();
		}

		return $out;
	}
}
?>