<?php 
class md_user_all extends CI_Model
{
	public function info(){
		$query = $this->db->query("SELECT `ip_address`,`namelname`,`email`,`username`,`registration_time` FROM `users` WHERE `status`!=1 ORDER BY `registration_time` DESC ");
		if($query->num_rows() > 0){
			$out = $query->result();			
		}else{
			$out = "";
		}
		return $out;
	}
}
?>