<?php
class md_website_lists extends CI_Model
{
	public function getall($columns = "*", $allowed = 1, $path = '/', $itemsPerPage = 10, $page = 1,$orderby = "ORDER BY `id` DESC")
	{
		$this->load->model("md_pagination");
		$sql = 'SELECT '.$columns.' FROM `websites` WHERE `allowed`='.$allowed.' AND `status`!=1 '.$orderby;
		$outarray = $this->md_pagination->pagination($sql,$path,$itemsPerPage,$page);

		$query = $this->db->query($outarray[0]);
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