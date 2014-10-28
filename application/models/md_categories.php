<?php
class md_categories extends CI_Model{
	public function cats($cat_slug = false)
	{
		if(!$cat_slug){
			$query = $this->db->query("SELECT 
			`categories`.`id` AS cats,
			`categories`.`name` AS name,
			`categories`.`icon` AS icon,
			`categories`.`slug` AS slug 
			FROM `categories`
			WHERE `categories`.`status`!=1 ORDER BY `categories`.`position` ASC");
			$out = $query->result();
		}
		else 
		{
			$query = $this->db->query("SELECT 
											`websites`.`id` AS w_id, 
											`websites`.`username` AS w_username, 
											`websites`.`name` AS w_name,
											`websites`.`url` AS w_url,
											`websites`.`img` AS w_img,
											`websites`.`clicks` AS w_clicks 
											FROM 
											`categories`,`websites` 
											WHERE 
											`categories`.`slug`='".mysql_real_escape_string($cat_slug)."' AND 
											`categories`.`status`!=1  AND 
											FIND_IN_SET(`categories`.`id`,`websites`.`cat_id`) AND 
											`websites`.`status`!=1 AND 
											`websites`.`allowed`!=0
											ORDER BY `clicks` DESC");
			$out = $query->result();
		}

		return $out;
	}
}
?>