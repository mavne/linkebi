<?php
class md_count_data extends CI_Model
{
	public function cou($data)
	{
		switch($data)
		{
			case "category":
			$table = "categories";
			$where = " WHERE `status`!=1";
			break;
			case "website":
			$table = "websites";
			$where = " WHERE `allowed`=1 AND `status`!=1";
			break;
			case "websitenot":
			$table = "websites";
			$where = " WHERE `allowed`=0 AND `status`!=1";
			break;
			case "users":
			$table = "users";
			$where = " WHERE `status`!=1";
			break;
		}
		$query = $this->db->query("SELECT `id` FROM `".$table."` ".$where." ");
		$count = $query->num_rows();
		return $count;
	}
}
?>