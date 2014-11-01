<?php
class md_links extends CI_Model
{
	public function page($page)
	{
		$sql = "SELECT `id`,`title`,`desc`,`url` FROM `links` WHERE `username`='".mysql_real_escape_string($this->session->userdata('username'))."' ";
		$path = '/mylinks/page/';
		$itemsPerPage = 10;

		$this->load->model("md_pagination");
		$pagination = $this->md_pagination->pagination($sql,$path,$itemsPerPage,$page);
		$out = '';
		if($pagination[2] > 0)
		{//num rows
			$query = mysql_query($pagination[0]);			
			while($row = mysql_fetch_object($query))
			{
				$out .= '<div class="list-group links-margin-top-10 links-myurls links-font-14">';
				$out .= '<a href="'.$row->{"url"}.'" target="_blank" class="list-group-item">';
				$out .= '<h4 class="list-group-item-heading">'.$row->{"title"}.'</h4>';
				$out .= '<p class="list-group-item-text">'.$row->{"desc"}.'</p>';
				$out .= '<i class="fa fa-times remove" data-linkid="'.$row->{"id"}.'"></i>';
				$out .= '</a>';
				$out .= '</div>';
			}
			$out .= '<div class="clearer"></div>';
			$out .= $pagination[1];
		}else
		{
			$out .= '<div class="alert alert-danger links-margin-top-10" role="alert">ჩანაწერი ვერ მოიძებნა !</div>';
		}

		return $out;
	}
}
?>