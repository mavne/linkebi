<?php
class md_navigation extends CI_Model
{
	public function nav()
	{
		$query = $this->db->query("SELECT `id`,`name`,`icon`,`url` FROM `menu` WHERE `status`!=1");
		$result = $query->result();
		return $result;
	}
}
?>