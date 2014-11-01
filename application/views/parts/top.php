<section class="links-top">
	<div class="container">
		<div class="links-mask">
			<div class="links-head">
				<div class="row">
					<div class="col-lg-6 links-float-left">
						<div class="links-logo">Links.404.ge</div>
					</div>
					<div class="col-lg-6 links-float-right">
						<nav class="link-navigation">
							<ul>	
								<?php
								if($username){
									echo '<li class="links-myspace"><a href="myspace">პირადი სივრცე</a></li>';
								}else{
									echo '<li class="links-myspace"><a href="registration">პირადი სივრცე</a></li>';
								}
								
								foreach($nav as $row)
								{
									echo '<li class="'.$row->{"icon"}.'"><a href="'.$row->{"url"}.'">'.$row->{"name"}.'</a></li>';
								}
								if($username){
									echo '<li class="link-signout"><a href="registration">გასვლა</a></li>';
								}
								?>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<div class="link-search">
				<h1 class="link-header links-hide-smartphone">მოიძიე სასურველი ვებ გვერდი</h1>
				<form action="javascript:void(0)" method="get" id="saerch_form">
					<input type="text" name="search-key" id="search-key" class="search-key" value="საკვანძო სიტყვა" />
						<div class="btn-group links-search-button">
						  <button type="button" class="btn btn-danger" id="saerch_submit">ძიება</button>
						</div>
				</form>
			</div>

		</div>
	</div>
</section>