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
				<form action="javascript:void(0)" method="post" class="navbar-form navbar-left">
					<h3>საკონტაქტო ფორმა</h3>
					<div class="alert alert-success" role="alert">ოპერაცია წარმატებით დასრულდა</div>
					<div class="alert alert-danger" role="alert">მოხდა შეცდომა</div>
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
							

					<button type="submit" class="btn btn-default">გაგზავნა</button>
				</form>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 links-contact-info">
				<h3>საკონტაქტო ინფორმაცია</h3>
				<p><b>ელ-ფოსტა:</b> <a href="mailto:info.404.ge">info.404.ge</a></p>
				<p><b>მობ:</b> 599 62 35 55</p>
			</div>

			<div class="clearer"></div>





		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>