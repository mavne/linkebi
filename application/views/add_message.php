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
			

			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 registration">
				

				<form action="/addwebsite" method="post" class="navbar-form navbar-left" id="addwebsite_form" enctype="multipart/form-data">
					<h3>ვებ გვერდის დამატება</h3>
					<input type="hidden" name="form_type" value="addwebsite" />
					<?php 
					if(isset($form_message["addwebsite_message_done"]) && $form_message["addwebsite_message_done"]){
						echo '<div class="alert alert-success" role="alert">'.$form_message["addwebsite_message_done"].'</div>';
					}else if(isset($form_message["addwebsite_message"]) && $form_message["addwebsite_message"]){
						echo '<div class="alert alert-danger" role="alert">'.$form_message["addwebsite_message"].'</div>';
					}
					?>
					<div class="clearer"></div>
					<div class="form-group">
						<label for="name">დასახელება: <font color="red">*</font></label>
						<input type="text" class="form-control" id="name" name="name" value="" />
					</div>
					<div class="clearer"></div>

					<div class="form-group">
						<label for="url">ბმული: <font color="red">*</font></label>
						<input type="text" class="form-control" id="url" name="url" value="" />
					</div>
					<div class="clearer"></div>

					<div class="form-group links-position-relative links-margin-bottom-15">
						<label for="cat">აირჩიეთ კატეგორია: <font color="red">*</font></label>
						<div class="row">

							<?php
							foreach($categories as $row)
							{
							?>
								<div class="col-lg-6 links-margin-top-10">
								    <div class="input-group links-width-100">
								      <span class="input-group-addon">
								        <input type="checkbox" id="i-<?php echo $row->{"cats"}; ?>" name="cat[<?php echo $row->{"cats"}; ?>]" value="1">
								      </span>

								      <input type="text" class="form-control" disabled="disabled" value="<?php echo $row->{"name"}; ?>" />
								    </div><!-- /input-group -->
							    </div>
						    <?php
							}
						    ?>
						</div>




					</div>
					<div class="clearer"></div>
					
					<div class="form-group">
						<label for="file">ვებ გვერდის ლოგო: ( 200x120; png,jpg,jpeg,gif; <?php echo htmlentities("<")?>500KB ): <font color="red">*</font></label>
						<input type="file" name="file" id="file" value="" />
					</div>

					<div class="clearer"></div>					

					<button type="submit" class="btn btn-default" id="submit_addwebsite">დამატება</button>
				</form>


			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<?php
				foreach($rt_commerce as $row)
				{
				?>
					<div class="thumbnail add-website-thub cursor-pointer commerce-url" data-url="<?php echo $row->{"url"}; ?>">
						<div class="box">
							<img src="<?php echo $row->{"img"}?>" alt="<?php echo $row->{"title"}?>" title="<?php echo $row->{"title"}?>" />
						</div>
					</div>
				<?php
				}
				?>
			</div>





		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>