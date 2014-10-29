<?php
class md_edit_website extends CI_Model
{
	public function form($message = false)
	{
		//get current url
		$this->load->model("md_current_url");
		$url = $this->md_current_url->getUrl();
		$username = $this->session->userdata('username');

		// select old information
		$query = $this->db->query("SELECT `cat_id`,`name`,`url`,`img` FROM `websites` WHERE `id`='".(int)$url[5]."' AND `username`='".mysql_real_escape_string($username)."' AND `status`!=1 ");
		$out = '<form action="/website/edit/'.$url[5].'" method="post" class="navbar-form navbar-left" id="addwebsite_form" enctype="multipart/form-data">';
		$out .= '<h3>ვებ საიტის რედაქტირება</h3>';
		if($query->num_rows <= 0){
			$out .= '<div class="alert alert-danger" role="alert">თქვენ არ გაქვთ კონტენტის განახლების უფლება ან კონტენტი ელოდება დადასტურებას ადმინის მიერ !</div>';
		}else
		{
			if(isset($message["addwebsite_message_done"])){
				$out .= '<div class="alert alert-success" role="alert">'.$message["addwebsite_message_done"].'</div>';			
			}else if(isset($message["addwebsite_message"])){
				$out .= '<div class="alert alert-danger" role="alert">'.$message["addwebsite_message"].'</div>';
			}
			else{
				$out .= '<div class="alert alert-danger" role="alert">რედაქტირებისას თქვენ დამატებულ საიტს დასჭირდება ადმინის ხელახალი ნებართვა, კლიკის ათვლაც დაიწყება 0-იდან !</div>';
			}
			
			//get rows
			$result = $query->row();		
			// get categories
			$this->load->model("md_categories");
			$categories = $this->md_categories->cats(false, false);
			$cat_array = explode(",",$result->{"cat_id"});

			$out .= '<input type="hidden" name="form_type" value="editwebsite" />';
			// here alert
			$out .= '<div class="clearer"></div>';
			$out .= '<div class="form-group">';
			$out .= '<label for="name">დასახელება: <font color="red">*</font></label>';
			$out .= '<input type="text" class="form-control" id="name" name="name" value="'.$result->{"name"}.'" />';
			$out .= '</div>';
			$out .= '<div class="clearer"></div>';
			$out .= '<div class="form-group">';
			$out .= '<label for="url">ბმული: <font color="red">*</font></label>';
			$out .= '<input type="text" class="form-control" id="url" name="url" value="'.$result->{"url"}.'" />';
			$out .= '</div>';
			$out .= '<div class="clearer"></div>';
			$out .= '<div class="form-group links-position-relative links-margin-bottom-15">';
			$out .= '<label for="cat">აირჩიეთ კატეგორია: <font color="red">*</font></label>';
			$out .= '<div class="row">';
			// here categories
			foreach($categories as $row)
			{
				if(in_array($row->{"cats"}, $cat_array)){ $checked = 'checked="checked"'; }
				else{ $checked = ''; }
				$out .= '<div class="col-lg-6 links-margin-top-10">';
				$out .= '<div class="input-group links-width-100">';
				$out .= '<span class="input-group-addon">';
				$out .= '<input type="checkbox" id="i-'.$row->{"cats"}.'" name="cat['.$row->{"cats"}.']" value="1" '.$checked.' />';
				$out .= '</span>';
				$out .= '<input type="text" class="form-control" disabled="disabled" value="'.$row->{"name"}.'" />';
				$out .= '</div>';
				$out .= '</div>';
			}

			$out .= '</div>';
			$out .= '</div>';
			$out .= '<div class="clearer"></div>';
			$out .= '<div class="form-group">';
			$out .= '<img src="'.$result->{"img"}.'" width="200" height="120" alt="'.$result->{"name"}.'" title="'.$result->{"name"}.'" />';
			$out .= '</div>';
			$out .= '<div class="clearer"></div>';
			$out .= '<div class="form-group">';
			$out .= '<label for="file">ვებ გვერდის ლოგო: ( 200x120; png,jpg,jpeg,gif; '.htmlentities("<").'500KB ): <font color="red">*</font></label>';
			$out .= '<input type="file" name="file" id="file" value="" />';
			$out .= '</div>';
			$out .= '<div class="clearer"></div>';
			$out .= '<button type="submit" class="btn btn-default" id="submit_addwebsite">რედაქტირება</button>';
		}
		$out .= '</form>';
		return $out;
	}
}
?>