<?php
class md_codechecker extends CI_Model
{
	public function checker()
	{
		$this->load->model("md_current_url");
		$url = $this->md_current_url->getUrl();
		$query = $this->db->query("SELECT `id` FROM `recovery` WHERE `code`='".mysql_real_escape_string($url[5])."' ");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}
?>