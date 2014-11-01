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
	  					<li class="active"><a href="/favorites">ფავორიტები</a></li>
	  					<li><a href="/account_settings">ანგარიშის რედაქტირება</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 registration">					
			<?php
			if(is_array($favourites)) {
				foreach ($favourites as $row) {
				?>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 links-column" data-goto="<?php echo $row->{"url"}; ?>" data-wi="<?php echo $row->{"id"}; ?>">
						<div class="thumbnail">
							<div class="website-logo">
								<img src="<?php echo $row->{"img"}; ?>" alt="<?php echo $row->{"name"}; ?>" title="<?php echo $row->{"name"}; ?>" />
							</div>
							<div class="datas">
								<p class="info"><a><?php echo $row->{"name"}; ?></a></p>
								<p class="views">ნახვა: <?php echo $row->{"clicks"}; ?></p>
							</div>
						</div>
					</div><div class="clearer"></div>	
				<?php
				}
			}else{
				echo '<div class="alert alert-danger links-margin-top-10" role="alert">ჩანაწერი ვერ მოიძებნა !</div>';
			}
			?>
			</div>
			




		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>