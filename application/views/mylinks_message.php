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
	  					<li class="active"><a href="/mylinks">ჩემი ბმულები</a></li>
	  					<li><a href="/account_settings">ანგარიშის რედაქტირება</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 registration">					
				
				<div class="btn-group links-margin-top-10 links-width-100 links-margin-top-0-767">
					<button type="button" class="btn btn-default links-font-14 links-float-left">ბმულის დამატება</button>
				</div>

				
				<!-- links -->
				<?php echo $mylinksOut; ?>


				<div class="links-empty-10"></div>

			</div>
			




		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>