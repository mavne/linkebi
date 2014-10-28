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
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 registration">
				<form action="/registration" method="post" class="navbar-form navbar-left" id="registration">
					<h3>რეგისტრაცია</h3>
					<input type="hidden" name="form_type" value="registration" />
					<?php 
					if(isset($form_message["done_message"]) && $form_message["done_message"]){
						echo '<div class="alert alert-success" role="alert">'.$form_message["done_message"].'</div>';
					}else if(isset($form_message["error_message"]) && $form_message["error_message"]){
						echo '<div class="alert alert-danger" role="alert">'.$form_message["error_message"].'</div>';
					}
					?>					
					<div class="clearer"></div>
					<div class="form-group">
						<label for="namelname">სახელი და გვარი: <font color="red">*</font></label>
						<input type="text" class="form-control" id="namelname" name="namelname" value="" />
					</div>
					<div class="clearer"></div>

					<div class="form-group">
						<label for="email">ელ-ფოსტა: <font color="red">*</font></label>
						<input type="text" class="form-control" id="email"name="email" value="" />
					</div>
					<div class="clearer"></div>

					<div class="form-group">
						<label for="username">მომხმარებლის სახელი: <font color="red">*</font></label>
						<input type="text" class="form-control" id="username" name="username" value="" />
					</div>
					<div class="clearer"></div>
					
					<div class="form-group">
						<label for="password">პაროლი: <font color="red">*</font></label>
						<input type="password" class="form-control" id="password" name="password" value="" />
					</div>
					<div class="clearer"></div>	

					<div class="form-group">
						<label for="re-password">პაროლის დადასტურება: <font color="red">*</font></label>
						<input type="password" class="form-control" id="re-password" name="re-password" value="" />
					</div>
					<div class="clearer"></div>					

					<button type="submit" class="btn btn-default" id="submit_reg">რეგისტრაცია</button>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 registration">
				<form action="/registration" method="post" class="navbar-form navbar-left" id="authorition">
					<h3>ავტორიზაცია</h3>			
					<input type="hidden" name="form_type" value="authorition" />

					<?php
					if(isset($form_message["error_message_auth"]) && $form_message["error_message_auth"]){
						echo '<div class="alert alert-danger" role="alert">'.$form_message["error_message_auth"].'</div>';
					}
					?>
					<div class="clearer"></div>
					<div class="form-group">
						<label for="auth_username">მომხმარებლის სახელი: <font color="red">*</font></label>
						<input type="text" class="form-control" id="auth_username" name="auth_username" value="" />
					</div>
					<div class="clearer"></div>
					
					<div class="form-group">
						<label for="auth_username">პაროლი: <font color="red">*</font></label>
						<input type="password" class="form-control" id="auth_password" name="auth_password" value="" />
					</div>
					<div class="clearer"></div>					

					<button type="submit" class="btn btn-default" id="submit_auth">ავტორიზაცია</button>
				</form>
			</div>

			<div class="clearer"></div>




		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>