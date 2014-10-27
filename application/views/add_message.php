<?php
@include('application/views/parts/header.php');
@include('application/views/parts/top.php');
?>
<section class="link-content">
	<div class="container link-webkit-shadow">
		<div class="row">
			<div class="clearer"></div>
			<ol class="breadcrumb">
			  <li><a href="#">მთავარი</a></li>
			  <li class="active">ვებ საიტის დამატება</li>
			</ol>
			<div class="clearer"></div>
			

			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 registration">
				

				<form action="javascript:void(0)" method="post" class="navbar-form navbar-left">
					<h3>ვებ გვერდის დამატება</h3>
					<div class="alert alert-success" role="alert">ოპერაცია წარმატებით დასრულდა</div>
					<div class="alert alert-danger" role="alert">მოხდა შეცდომა</div>
					<div class="clearer"></div>
					<div class="form-group">
						<input type="text" class="form-control" id="namelname" name="namelname" placeholder="გვერდის სახელი" />
					</div>
					<div class="clearer"></div>

					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="ბმული" />
					</div>
					<div class="clearer"></div>

					<div class="form-group links-position-relative links-margin-bottom-15">
						
						<div class="row">

							<div class="col-lg-6 links-margin-top-10">
							    <div class="input-group links-width-100">
							      <span class="input-group-addon">
							        <input type="checkbox">
							      </span>
							      <input type="text" class="form-control" disabled="disabled" value="ფილმები" />
							    </div><!-- /input-group -->
						    </div>

						    <div class="col-lg-6 links-margin-top-10">
							    <div class="input-group links-width-100">
							      <span class="input-group-addon">
							        <input type="checkbox" class="links-checkbox">
							      </span>
							      <input type="text" class="form-control" class="links-checkbox" disabled="disabled" value="მუსიკა" />
							    </div><!-- /input-group -->
						    </div>

						    <div class="col-lg-6 links-margin-top-10">
							    <div class="input-group links-width-100">
							      <span class="input-group-addon">
							        <input type="checkbox">
							      </span>
							      <input type="text" class="form-control" disabled="disabled" value="ფილმები" />
							    </div><!-- /input-group -->
						    </div>

						    <div class="col-lg-6 links-margin-top-10">
							    <div class="input-group links-width-100">
							      <span class="input-group-addon">
							        <input type="checkbox" class="links-checkbox">
							      </span>
							      <input type="text" class="form-control" class="links-checkbox" disabled="disabled" value="მუსიკა" />
							    </div><!-- /input-group -->
						    </div>

						    <div class="col-lg-6 links-margin-top-10">
							    <div class="input-group links-width-100">
							      <span class="input-group-addon">
							        <input type="checkbox">
							      </span>
							      <input type="text" class="form-control" disabled="disabled" value="ფილმები" />
							    </div><!-- /input-group -->
						    </div>

						    <div class="col-lg-6 links-margin-top-10">
							    <div class="input-group links-width-100">
							      <span class="input-group-addon">
							        <input type="checkbox" class="links-checkbox">
							      </span>
							      <input type="text" class="form-control" class="links-checkbox" disabled="disabled" value="მუსიკა" />
							    </div><!-- /input-group -->
						    </div>

						</div>




					</div>
					<div class="clearer"></div>
					
					<div class="form-group">
						<input type="text" class="form-control" id="password" name="password" placeholder="პაროლი" />
					</div>
					
					<div class="form-group">
						<p>ვებ გვერდის ლოგო: (200x120; png,jpg,jpeg,gif)</p>
						<input type="file" name="file" id="file" value="" />
					</div>

					<div class="clearer"></div>					

					<button type="submit" class="btn btn-default">დამატება</button>
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