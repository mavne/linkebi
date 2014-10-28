<?php
class md_current_url extends CI_Model
{
	public function getUrl()
	{
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$explode = explode("/",$actual_link);
		return $explode;
	}
}
?>