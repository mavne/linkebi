<?php
class Md_redir extends CI_Model
{
	public function gotourl($url)
	{
		echo '<meta http-equiv="refresh" content="0; url='.$url.'" />';
		exit();
	}
}
?>