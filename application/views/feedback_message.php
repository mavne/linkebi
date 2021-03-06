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
			

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 registration margin-0-auto">
				<form action="/feedback" method="post" class="navbar-form navbar-left" id="feedback_form">
					<h3>საკონტაქტო ფორმა</h3>
					<input type="hidden" name="form_type" value="feedback" />
					<?php 
					if(isset($form_message["feedback_message_done"]) && $form_message["feedback_message_done"]){
						echo '<div class="alert alert-success" role="alert">'.$form_message["feedback_message_done"].'</div>';
					}else if(isset($form_message["feedback_message"]) && $form_message["feedback_message"]){
						echo '<div class="alert alert-danger" role="alert">'.$form_message["feedback_message"].'</div>';
					}
					?>
					<div class="clearer"></div>
					<div class="form-group">
						<label for="namelname">სახელი გვარი:</label>
						<input type="text" class="form-control" id="namelname" name="namelname" value="" />
					</div>

					<div class="form-group">
						<label for="email">ელ-ფოსტა:</label>
						<input type="text" class="form-control" id="email" name="email" value="" />
					</div>

					<div class="form-group">
						<label for="subject">სათაური:</label>
						<input type="text" class="form-control" id="subject" name="subject" value="" />
					</div>

					<div class="form-group">
						<label for="text">ტექსტი:</label>
						<textarea id="text" name="text"></textarea>
					</div>
							

					<button type="submit" class="btn btn-default" id="submit_feedback">გაგზავნა</button>
				</form>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 links-contact-info">
				<h3>საკონტაქტო ინფორმაცია</h3>
				<p><b>ელ-ფოსტა:</b> <a href="mailto:info@404.ge" target="_blank">info@404.ge</a></p>
				<p><b>მობ:</b> 599 62 35 55</p>
			</div>

			<div class="clearer"></div>





		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>