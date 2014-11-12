<?php
class Md_redir extends CI_Model
{
	public function gotourl($url,$min = 0)
	{
		if($url){
			echo '<meta http-equiv="refresh" content="'.$min.'; url='.$url.'" />';
			exit();
		}else{
			echo '<meta http-equiv="refresh" content="'.$min.'" />';
		}
	}
}
?>