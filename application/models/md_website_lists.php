<?php
class md_website_lists extends CI_Model
{
	public function getall($columns = "*", $allowed = 1, $path = '/', $itemsPerPage = 10, $page = 1,$orderby = "ORDER BY `id` DESC")
	{
		$this->load->model("md_pagination");
		if($allowed!="x"){ $as = " `allowed`=".$allowed." AND "; }else{ $as = ""; }
		$sql = 'SELECT '.$columns.' FROM `websites` WHERE '.$as.' `status`!=1 '.$orderby;
		$outarray = $this->md_pagination->pagination($sql,$path,$itemsPerPage,$page);

		if($path == "/")
		{ 
			
			$query = $this->db->query($outarray[0]);
			if($query->num_rows() > 0)
			{
				$out = $query->result();
			}else{
				$out = "";
			}
		}else{
			if(!empty($outarray[0])){
				$q = $this->db->query($outarray[0]);
				$result = $q->result();
				$out[0] = $this->outwebsites($result);
			}
			if(!empty($outarray[1])){
				$out[1] = $outarray[1];
			}
			if(!empty($outarray[2])){
				$out[2] = $outarray[2];
			}
			if(!empty($outarray[3])){
				$out[3] = $outarray[3];
			}
		}
		return $out;
	}

	public function outwebsites($websites){
		$out = '<tbody>';        
        foreach($websites as $row)
        { 
        	$category_names = $this->catnames($row->{"cat_id"});
        	$nebartva = ($row->{"allowed"}) ? "<span class='label label-success'>ნებადართული</span>" : "<span class='label label-danger'>ნებართვის გარეშე</span>";
            $out .= '<tr>';
            $out .= '<td>'.$row->{"id"}.'</td>';
            $out .= '<td>'.$row->{"name"}.'</td>';
            $out .= '<td>'.implode(",",$category_names).'</td>';
            $out .= '<td>'.$row->{"clicks"}.'</td>';
            $out .= '<td><a href="'.$row->{"url"}.'" target="_blank">'.$row->{"url"}.'</a></td>';
            $out .= '<td>'.$nebartva.'</td>';
            $out .= '<td>&nbsp;</td>';
            $out .= '</tr>'; 
         }
        $out .= '</tbody>';
        return $out;
	}

	public function catnames($ids)
	{
		$outnames = array();
		//$i = explode(",",$ids);
		$query = $this->db->query("SELECT `name` FROM `categories` WHERE `id` IN (".$ids.")");
		$result = $query->result();
		foreach($result as $row)
		{
			$outnames[] = $row->{"name"};
		}
		return $outnames;
	}
}
?>