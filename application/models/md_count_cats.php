<?php
class md_count_cats extends CI_Model
{
	public function countThis()
	{
		$out = array();
		$query = $this->db->query("SELECT `id` FROM `categories` WHERE `status`!=1");
		if($query->num_rows() > 0)
		{
			$result = $query->result();
			foreach($result as $row)
			{
				$cat_id = $row->id;
				$query2 = $this->db->query("SELECT `id` FROM `websites` WHERE FIND_IN_SET('".$cat_id."', `cat_id`) AND `allowed`=1 AND `status`=0");
				$out[$cat_id] = $query2->num_rows();
			}
		}
		return $out;
	}
}
?>