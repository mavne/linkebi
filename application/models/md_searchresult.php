<?php
class md_searchresult extends CI_Model
{
	public function res($url)
	{
		$keyword = $url[5];
		$query = $this->db->query("SELECT `id`,`name`,`url`,`clicks` FROM `websites` WHERE (`name` LIKE '%".mysql_real_escape_string($keyword)."%' || `url` LIKE '%".mysql_real_escape_string($keyword)."%') AND `allowed`!=0 AND `status`!=1 ORDER BY `clicks` DESC ");
		$out = $query->result();
		return $out;
	}
}
?>