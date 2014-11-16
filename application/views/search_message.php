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
				

			<div class="panel panel-default links-margin-top-10">
			<!-- Default panel contents -->
				<div class="panel-heading">ძიება</div>
				<div class="panel-body">
				<p>საკვანძო სიტყვა: <?php echo urldecode($url[5]); ?> (<?php echo count($searchResult); ?>)</p>
				</div>

				<table class="table">
					<thead>
						<tr>
						<th>#</th>
						<th>დასახელება</th>
						<th>ნახვა</th>
						<th>ბმული</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$c = 1;
						foreach($searchResult as $row)
						{
						?>
							<tr>
								<td><?php echo $c; ?></td>
								<td><?php echo $row->{"name"}; ?></td>
								<td><?php echo $row->{"clicks"}; ?></td>
								<td><a class="tr-goto" data-goto="<?php echo $row->{"url"}; ?>" data-wi="<?php echo $row->{"id"}; ?>">ნახვა</a></td>
							</tr>
						<?php
							$c++;
						}
						?>
					</tbody>
				</table>
			</div>


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