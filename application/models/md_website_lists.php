<?php
class md_website_lists extends CI_Model
{
	public function getall($columns = "*", $allowed = 1, $path = '/', $itemsPerPage = 10, $page = 1,$orderby = "ORDER BY `id` DESC")
	{
		$out = "";
		$this->load->model("md_pagination");
		if($allowed!="x"){ $as = " `allowed`=".$allowed." AND "; }
		else{ $as = ""; }
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
				if($q->num_rows() > 0){
					$out[0] = $this->outwebsites($result);
				}else{
					$out[0] = "";
				}
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
        	$nebartva = ($row->{"allowed"}) ? "<span class='label label-success permitionx' onclick='changeper(0,".$row->{"id"}.")'>ნებადართული</span>" : "<span class='label label-danger permitionx' onclick='changeper(1,".$row->{"id"}.")'>ნებართვის გარეშე</span>";
            $out .= '<tr>';
            $out .= '<td>'.$row->{"id"}.'</td>';
            $out .= '<td>'.$row->{"name"}.'</td>';
            $out .= '<td>'.implode(",",$category_names).'</td>';
            $out .= '<td>'.$row->{"clicks"}.'</td>';
            $out .= '<td><a href="'.$row->{"url"}.'" target="_blank">'.$row->{"url"}.'</a></td>';
            $out .= '<td>'.$nebartva.'</td>';
            $out .= '<td><a href="/ci_admin/websites/edit/'.$row->{"id"}.'"><i class="fa fa-pencil-square-o"></i></a></td>';
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

	public function web($id){
		$query = $this->db->query("SELECT `ip_address`,`cat_id`,`name`,`url`,`img` FROM `websites` WHERE `id`='".(int)$id."' AND `status`!=1 ");
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}else{
			$row = "";
		}
		return $row;
	}
}
?>