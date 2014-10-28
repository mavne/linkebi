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
						<div class="user-info"><strong>მომხმარებლის სახელი:</strong> გიორგი გვაზავა</div>
						<div class="user-info"><strong>ელ-ფოსტა:</strong> giorgigvazava87@gmail.com</div>
						<div class="user-info"><a href="/account_settings">რედაქტირება</a> | <a href="/registration">გასვლა</a></div>
					</div>
				</div>
				<div class="links-navigation-userarea">
					<ul class="nav nav-pills nav-stacked">
	  					<li class="active"><a href="#">ვებ გვერდის დამატება</a></li>
	  					<li><a href="#">ჩემი დამატებულები</a></li>
	  					<li><a href="#">ფავორიტები</a></li>
	  					<li><a href="#">ანგარიშის რედაქტირება</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 registration">
				

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
			




		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>