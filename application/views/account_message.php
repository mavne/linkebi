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
					<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 links-user-logo links-padding-0 links-position-relative">
						<div class="user-icon"></div>
					</div> -->
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
	  					<li><a href="/mylinks">ჩემი ბმულები</a></li>
	  					<li class="active"><a href="/account_settings">ანგარიშის რედაქტირება</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 registration">					
				<form action="/account_settings" method="post" class="navbar-form navbar-left" id="registration">
					<input type="hidden" name="form_type" value="account_settings" />
					<?php 
					if(isset($form_message["account_message_done"]) && $form_message["account_message_done"]){
						echo '<div class="alert alert-success links-margin-top-10" role="alert">'.$form_message["account_message_done"].'</div>';
					}else if(isset($form_message["account_message"]) && $form_message["account_message"]){
						echo '<div class="alert alert-danger links-margin-top-10" role="alert">'.$form_message["account_message"].'</div>';
					}
					?>					
					<div class="clearer"></div>
					<div class="form-group">
						<label for="namelname">სახელი და გვარი: <font color="red">*</font></label>
						<input type="text" class="form-control" id="namelname" name="namelname" value="<?php echo (isset($user->{"namelname"})) ? $user->{"namelname"} : ""; ?>" />
					</div>
					<div class="clearer"></div>

					<div class="form-group">
						<label for="email">ელ-ფოსტა: <font color="red">*</font></label>
						<input type="text" class="form-control" id="email"name="email" value="<?php echo (isset($user->{"email"})) ? $user->{"email"} : ""; ?>" />
					</div>
					<div class="clearer"></div>

					<div class="form-group">
						<label for="username">მომხმარებლის სახელი: <font color="red">*</font></label>
						<input type="text" class="form-control" id="username" name="username" readonly="readonly" value="<?php echo $username; ?>" />
					</div>
					<div class="clearer"></div>
					
					<div class="form-group">
						<a href="account_settings/passwordchange" class="links-links">პაროლის შეცვლა</a>
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