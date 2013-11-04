<?php
$page_title = "Sub Zero Components - Catalog - Liquid Cooling";
include ('is/header.php');
?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space">
				<div class="row">
			
					<div class="threecol "><!--sidebar col-->
						<div id="sidebar">
							<div><h3>Cooling Supplies</h3></div>
							<div>
								<ul>
									<a href='case_fans.php'><li>Case Fans</li></a>
									<a href='heatsinks.php'><li>Heatsinks</li></a>
									<a href='laptop_cooling.php'><li>Laptop Cooling</li></a>
									<a href='liquid_cooling.php'><li>Liquid Cooling</li></a>
								</ul>
							</div>
						</div>
					</div>
					<div class="ninecol last"> <!--products col-->
						<div>
							<?php include ('is/liquid_cooling_listing.php'); ?>
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>
