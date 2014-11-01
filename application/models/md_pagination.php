<?php
class md_pagination extends CI_Model
{
	public function pagination($sql,$path,$itemsPerPage,$page)
	{
		$out = array();
		$select = mysql_query($sql);
		$nr = mysql_num_rows($select);
		if(isset($_GET['pn'])){	
			$pn = preg_replace('#[^0-9]#i','',$page);
		}
		else{
		$pn = 1;
		}	
		$lastPage = ceil($nr / $itemsPerPage);
		if($pn < 1){
			$pn = 1;
		}
		else if($pn > $lastPage){
			$pn = $lastPage;	
		}	
		$centerPages = '';
		$sub1 = $pn-1; // 0
		$sub2 = $pn-2; // -1
		$add1 = $pn+1; // 2
		$add2 = $pn+2; // 3	

		if($pn==1){
			$centerPages .= '<li><a href="javascript:void(0)" class="active">'.$pn.'</a></li>';
			$centerPages .= '<li><a href="'.$path.$add1.'">'.$add1.'</a></li>';
		}
		else if($pn == $lastPage){
			$centerPages .= '<li><a href="'.$path.$sub1.'">'.$sub1.'</a></li>';
			$centerPages .= '<li><a href="javascript:void(0)" class="active">'.$pn.'</a></li>';
		}
		else if($pn > 2 && $pn < ($lastPage-1)){
			$centerPages .= '<li><a href="'.$path.$sub2.'">'.$sub2.'</a></li>';
			$centerPages .= '<li><a href="'.$path.$sub1.'">'.$sub1.'</a></li>';
			$centerPages .= '<li><a href="javascript:void(0)" class="active">'.$pn.'</a></li>';
			$centerPages .= '<li><a href="'.$path.$add1.'">'.$add1.'</a></li>';
			$centerPages .= '<li><a href="'.$path.$add2.'">'.$add2.'</a></li>';
		}
		else if($pn > 1 && $pn < $lastPage){
			$centerPages .= '<li><a href="'.$path.$sub1.'">'.$sub1.'</a></li>';
			$centerPages .= '<li><a href="javascript:void(0)" class="active">'.$pn.'</a></li>';
			$centerPages .= '<li><a href="'.$path.$add1.'">'.$add1.'</a></li>';
		}
		$limit = 'LIMIT '.($pn-1)*$itemsPerPage.','.$itemsPerPage;
		if($nr > 0)
		{
			$out[0] = $sql." $limit";
		}
		$paginationDisplay = '<nav><ul class="pagination">';
		if($lastPage != 1){
		//$paginationDisplay1 = '<font id="texti">გვერდი: <strong>'.$pn.'</strong> სულ: '.$lastPage.' </font>';
		}
		if($pn != 1){
			$previous = $pn-1;
			$paginationDisplay .= '<li><a href="'.$path.'1">'.l("first_page").'</a></li>';
			$paginationDisplay .= '<li><a id="back" href="'.$path.$previous.'">'.l("back_page").'</a></li>';
		}
		$paginationDisplay .= $centerPages;
		if($pn != $lastPage){
			$nextPage = $pn+1;
			$paginationDisplay .= '<li><a id="next" href="'.$path.$nextPage.'">'.l("next_page").'</a></li>';
			$paginationDisplay .= '<li><a href="'.$path.$lastPage.'">'.l("last_page").'</a></li>';
		}
		$outputList = $paginationDisplay."</ul></nav>";
		if($nr <= $itemsPerPage)
		{
			$outputList = "";
		}
		$n=1;
		$out[1]=$outputList;
		$out[2]=$nr;
		return $out;
	}
}
?>