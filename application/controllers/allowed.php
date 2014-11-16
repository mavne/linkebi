<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class allowed extends CI_Controller
{
	public function change_permition()
	{
		echo "test";
		if(isset($_POST["idx"]))
		{
			echo "isseted";
			$change = ($_POST["allowed"]=="false") ? "0" : "1";
			$data = array(
               'allowed' => $change
            );

			$this->db->where('id',$_POST["idx"]);
			$this->db->update('websites', $data); 
		}
	}
}
?>