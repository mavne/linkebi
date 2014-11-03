<?php
class md_generate extends CI_Model
{
	public function code($nu,$nl="numbers&letters")
	{
		if($nl=="numbers&letters"){
			$a = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		}else if($nl=="letters"){
			$a = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ";
		}else if($nl=="numbers"){
			$a = "0123456789";
		}
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($a) - 1; //put the length -1 in cache
		for ($i = 0; $i < $nu; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $a[$n];
		}
		return implode($pass); //turn the array into a string
	}
}
?>