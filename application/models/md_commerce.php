<?php
class Md_commerce extends CI_Model{

	public function out(){
		$query = $this->db->query('SELECT `img`,`title`,`url` FROM `commerce` WHERE `status`!=1 ORDER BY `position` ASC ');
		$out = $query->result();
		return $out;
	}

}