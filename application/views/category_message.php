<?php
@include('application/views/parts/header.php');
@include('application/views/parts/top.php');
?>
<section class="link-content">
	<div class="container link-webkit-shadow">
		<div class="row">
			<div class="span12">

              <div id="owl-example" class="owl-carousel">
               <?php
              	foreach($commerce as $row)
              	{
              	?>
	                <div class="item darkCyan">
	                  <img src="<?php echo $row->{"img"}; ?>" width="100%" alt="404.ge" />
	                    <h3><?php echo $row->{"title"}; ?></h3>
	                    <h4><a href="<?php echo $row->{"url"}; ?>" target="_blank"><?php echo $row->{"url"}; ?></a></h4>
	                </div>
                <?php
            	}
                ?>
            </div>


            </div>
          
			<div class="clearer"></div>
			<?php echo $breadcrups; ?>
			<div class="clearer"></div>

			<?php
			if($categories){
				foreach($categories as $row)
				{
					$star_class = ($row->{"w_favourite"}) ? ' active' : '';
				?>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 links-column" data-goto="<?php echo $row->{"w_url"}; ?>" data-wi="<?php echo $row->{"w_id"};?>">
						<div class="thumbnail links-position-relative" title="<?php echo $row->{"w_name"}; ?>">
							<div class="star<?php echo $star_class; ?>" data-addfavourite="<?php echo $row->{"w_id"};?>" data-tokenHash=""><i class="fa fa-star"></i></div>
							<div class="website-logo">
								<img src="<?php echo $row->{"w_img"}; ?>" alt="<?php echo $row->{"w_name"}; ?>" />
							</div>
							<div class="datas">
								<p class="info">
									<a href="javascript:void(0)">
										<?php 
										$find_array = array(
											"http://",
											"https://",
											"/",
											"www."
											);
										echo str_replace($find_array, "", strtolower($row->{"w_url"}) ); 
										?>
									</a>
									
								</p> <!-- -->
								<p class="views">ნახვა: <?php echo $row->{"w_clicks"}; ?></p>
							</div>
						</div>
					</div>		
				<?php
				}
			}
			else
			{
				echo '<div class="col-lg-12 links-margin-top-10"><div class="alert alert-danger" role="alert">ჩანაწერი ვერ მოიძებნა !</div></div>';
			}
			?>




		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>