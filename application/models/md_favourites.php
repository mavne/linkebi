<?php
class md_favourites extends CI_Model
{
	public function fav($username)
	{
		$query = $this->db->query("
			SELECT 
			`websites`.`id`,
			`websites`.`name`, 
			`websites`.`url`, 
			`websites`.`clicks`, 
			`websites`.`img` 
			FROM 
			`favourites`,`websites` 
			WHERE 
			`favourites`.`username`= '".mysql_real_escape_string($username)."' AND 
			`favourites`.`web_id`=`websites`.`id` AND 
			`websites`.`allowed`!=0 AND
			`websites`.`status`!=1 
			ORDER BY `websites`.`clicks` DESC 
			");

		if($query->num_rows() > 0)
		{
			$out = $query->result();
		}else{
			$out = "";
		}
		return $out;
	}
}
?>