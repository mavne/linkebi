<?php
@include('application/views/parts/header.php');
@include('application/views/parts/top.php');
?>
<section class="link-content">
	<div class="container link-webkit-shadow">
			<!-- 
			##
			#	Commerce start
			##
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
			</div> 
			##
			#	Commerce end
			##
			-->
			
			<div class="row">
            <div class="clearer"></div>
			<?php echo $breadcrups; ?>
			<div class="clearer"></div>
			<?php
			foreach($categories as $row)
			{
			?>
				<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 links-column" data-slug="<?php echo $row->{"slug"}; ?>">
					<div class="thumbnail">
						<div class="icon">
							<i class="<?php echo $row->{"icon"}; ?>"></i>
						</div>
						<div class="datas">
							<p class="data"><?php echo $row->{"name"}; ?></p>
						</div>
						<div class="counter"><?php echo $count_array[$row->{"cats"}]?></div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
</section>
<?php
@include('application/views/parts/footer.php');
?>