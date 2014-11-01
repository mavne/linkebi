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
			

			<div class="col-lg-3 col-md-3 col-sm-3">
				<div class="row links-userarea-row">
					<div class="col-lg-12 links-user-information">
						<div class="user-info"><strong>მომხმარებლის სახელი:</strong> <?php echo $namelname; ?></div>
						<div class="user-info"><strong>ელ-ფოსტა:</strong> <?php echo $email; ?></div>
						<div class="user-info"><a href="/account_settings">რედაქტირება</a> | <a href="/registration">გასვლა</a></div>
					</div>
				</div>
				<div class="links-navigation-userarea">
					<ul class="nav nav-pills nav-stacked">
	  					<li><a href="/myspace">ჩემი დამატებულები</a></li>
	  					<li><a href="/favorites">ფავორიტები</a></li>
	  					<li class="active"><a href="/account_settings">ანგარიშის რედაქტირება</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 registration">					
				<form action="/account_settings/passwordchange" method="post" class="navbar-form navbar-left" id="registration">
					<input type="hidden" name="form_type" value="recover_password" />
					<?php 
					if(isset($form_message["password_message_done"]) && $form_message["password_message_done"]){
						echo '<div class="alert alert-success links-margin-top-10" role="alert">'.$form_message["password_message_done"].'</div>';
					}else if(isset($form_message["password_message"]) && $form_message["password_message"]){
						echo '<div class="alert alert-danger links-margin-top-10" role="alert">'.$form_message["password_message"].'</div>';
					}
					?>					
					<div class="clearer"></div>
					<div class="form-group">
						<label for="old">ძველი პაროლი: <font color="red">*</font></label>
						<input type="password" class="form-control" id="old" name="old" value="" />
					</div>
					<div class="clearer"></div>

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

					<button type="submit" class="btn btn-default" id="submit_reg">რედაქტირება</button>
				</form>
			</div>
			




		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>