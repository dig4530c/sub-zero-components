<?php 
$page_title = "Sub Zero Components - Home";
include ('is/dash.php');
/* if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	include ('./is/login.php');
	} */
include ('is/header.php'); 
?>

		<!-- stuff -->
		<div class="container homec "><!-- home container-->
		<div class="row ">
			<div class="row rcon">
		
				<div class="twelvecol last">
					<div id="recom">
						<!--<a href="#"><img src="img/archer.png" alt="archer" /></a>-->
						<div id="slides">
							<ul class='rslides '>
								<li><a href='#'><img src="http://lorempixel.com/600/200/technics" alt='placeholder' /></a></li>
								<li><a href='#'><img src="http://lorempixel.com/g/600/200/technics/2" alt='placeholder' /></a></li>
								<li><a href='#'><img src="http://lorempixel.com/600/200/technics/3" alt='placeholder' /></a></li>
								<li><a href='#'><img src="http://nicenicejpg.com/600/200" alt='placeholder' /></a></li>
								<li><a href='#'><img src="http://lorempixel.com/600/200/technics/4" alt='placeholder' /></a></li>
							</ul>
					  </div>
					</div>
				</div>
				
			</div><!--end slider row-->
			<div class="row space">
				
				<div class="twelvecol last">
					<div class="os"><h1>Featured Deal</h1>
					<br />
					</div>
					<div id="featured">
						
						<?php include ('is/featured.php'); ?>
					</div>
				</div>
			
			</div>
			<div class="row space clear"><!--daily row-->
				<div class="split"></div>
				<div class="os"><h1>Daily Deals</h1>
					<br />
					</div>
					<div class="fourcol"><div class="fcon">
						
						<?php include ('is/daily.php'); ?>
					</div></div>
					<div class="fourcol"><div class="fcon">
						
						<?php include ('is/daily.php'); ?>
					</div></div>
					<div class="fourcol last"><div class="fcon">
						
						<?php include ('is/daily.php'); ?>
					</div></div>
				
			</div><!--end daily row--> 
		</div>
		</div><!--end container class -->
<?php include ('is/footer.php'); ?>