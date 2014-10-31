<?php
@include('application/views/parts/header.php');
if(isset($goto["goto"])){ $go = $goto["goto"];  }else{ $go = '/error'; }
echo '<meta http-equiv="refresh" content="0; url='.$go.'" />';
@include('application/views/parts/top.php');
?>
<section class="link-content">
	<div class="container link-webkit-shadow">
		<div class="row">
			<div class="clearer"></div>
			<?php echo $breadcrups; ?>
			<div class="clearer"></div>
			

			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 padding-top-20">
				
				<div class="alert alert-success" role="alert">სასურველი ვებ საიტი ჩაიტვირთება 2 წამში ...</div>

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