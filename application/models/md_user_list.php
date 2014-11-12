<?php
class md_user_list extends CI_Model
{
	public function lists($num = 10)
	{
		$out = '';
		$this->load->model("md_user_all");
		$lists = $this->md_user_all->info();
		$elapsed = $this->load->model("md_minutesago");
		$x = 1;
		foreach($lists as $list)
		{
			$minuteago = $this->md_minutesago->time_elapsed_string($list->{"registration_time"});
			$out .= '<a href="#" class="list-group-item">';
			$out .= '<span class="badge">'.$minuteago.'</span>';
			$out .= '<i class="fa fa-fw fa-user"></i> '.$list->{"namelname"};
			$out .= '</a>';
			if($x >= $num){ break; }
        }
        return $out;
	}
}
?>