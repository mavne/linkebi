<?php
class crone extends CI_Controller
{
	public function clear_recover_pass()
	{
		$time = time();
		$olddate = $time - 86400; // remove 1 day

		$this->db->query("DELETE FROM `recovery` where `date` < '".(int)$olddate."' ");
	}
}
?>