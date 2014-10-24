<?php
class md_categories extends CI_Model{
	public function cats($cat_slug = false)
	{
		if(!$cat_slug){
			$query = $this->db->query("SELECT `id`,`name`,`icon`,`slug` FROM `categories` WHERE `status`!=1 ORDER BY `position` ASC");
			$out = $query->result();
		}
		else 
		{
			$query = $this->db->query("SELECT 
											`websites`.`user_id` AS w_userid, 
											`websites`.`name` AS w_name,
											`websites`.`url` AS w_url,
											`websites`.`img` AS w_img,
											`websites`.`clicks` AS w_clicks 
											FROM 
											`categories`,`websites` 
											WHERE 
											`categories`.`slug`='".mysql_real_escape_string($cat_slug)."' AND 
											`categories`.`status`!=1  AND 
											`categories`.`id`=`websites`.`cat_id` AND 
											`websites`.`status`!=1 
											ORDER BY `clicks` DESC");
			$out = $query->result();
		}

		return $out;
	}
}
?>