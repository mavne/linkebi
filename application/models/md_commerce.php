<?php
class Md_commerce extends CI_Model{

	public function out($right = false){
		if($right=="right"){
			$type = "right";
		}else{
			$type = "top";
		}
		$query = $this->db->query('SELECT `img`,`title`,`url` FROM `commerce` WHERE `status`!=1 AND `type`="'.$type.'" ORDER BY `position` ASC ');
		$out = $query->result();
		return $out;
	}

}