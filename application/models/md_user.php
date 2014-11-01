<?php
class md_user extends CI_Controller
{
	public function info(){
		$query = $this->db->query("SELECT `ip_address`,`namelname`,`email`,`username`,`registration_time` FROM `users` WHERE `username`='".mysql_real_escape_string($this->session->userdata('username'))."' AND `status`!=1 ");
		if($query->num_rows() > 0){
			$out = $query->row();
		}else{
			$out = "";
		}
		return $out;
	}
}
?>