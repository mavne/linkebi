<?php
@include('application/views/parts/header.php');
@include('application/views/parts/top.php');
?>
<section class="link-content">
	<div class="container link-webkit-shadow">
		<div class="row">
			<div class="clearer"></div>
			<?php echo $breadcrups; ?>
			<div class="clearer"></div>
			


			<div class="col-lg-12 registration">					
				
					<?php 
					if(isset($form_message["rec_message_done"]) && $form_message["rec_message_done"]){
						echo '<div class="alert alert-success links-margin-top-10" role="alert">'.$form_message["rec_message_done"].'</div>';
					}else if(isset($form_message["rec_message"]) && $form_message["rec_message"]){
						echo '<div class="alert alert-danger links-margin-top-10" role="alert">'.$form_message["rec_message"].'</div>';
					}
					?>					
					<div class="clearer"></div>
					<?php
					if($em)
					{
					?>
					<form action="/passwordrecovery" method="post" class="navbar-form navbar-left" id="registration">
						<input type="hidden" name="form_type" value="rec_password" />
						<div class="form-group">
						<label for="email">ელ-ფოსტა: <font color="red">*</font></label>
						<input type="text" class="form-control" id="email" name="email" value="" />
						</div>
						<div class="clearer"></div>
					<?php
					}else
					{
						//echo $code; 
						if(!$codechecker){
							echo '<div class="alert alert-danger links-margin-top-10" role="alert">მოხდა შეცდომა !</div>';
						}else{
					?>

					<form action="passwordrecovery/code/<?php echo $urlcode; ?>" method="post" class="navbar-form navbar-left" id="registration">
					<?php
					if(isset($form_message["change_message_done"]) && $form_message["change_message_done"]){
						echo '<div class="alert alert-success links-margin-top-10" role="alert">'.$form_message["change_message_done"].'</div>';
					}else if(isset($form_message["change_message"]) && $form_message["change_message"]){
						echo '<div class="alert alert-danger links-margin-top-10" role="alert">'.$form_message["change_message"].'</div>';
					}
					?>	
							<input type="hidden" name="form_type" value="change_password" />
							<div class="form-group">
								<label for="new">ახალი პაროლი: <font color="red">*</font></label>
								<input type="password" class="form-control" id="new" name="new" value="" />
							</div>
							<div class="clearer"></div>
										
							<div class="form-group">
								<label for="comfirm">პაროლის დადასტურება: <font color="red">*</font></label>
								<input type="password" class="form-control" id="comfirm" name="comfirm" value="" />
							</div>
							<div class="clearer"></div>
							
					<?php
						}
					}
					?><button type="submit" class="btn btn-default" id="submit_reg">გაგზავნა</button>
				</form>
			</div>
			




		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>