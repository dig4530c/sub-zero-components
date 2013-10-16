<?php 
$page_title = "Sub Zero Components - Cart";
include ('is/header.php'); 
include ('is/dash.php');
?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space">
				<div class="row">
			
					<div class="ninecol "> <!--cart col-->
					<h1>Your Cart</h1>
						<div>
							 <?php include ('is/cartf.php'); ?>
						</div>
					</div>
					<div class="threecol last">
						<div id="checkout">
							<div id="total">
								<span>Your subtotal is:</span>
								<?php include ('is/total.php'); ?>
							</div>
							<div id="cbtn">
								<span><a href='checkout.php'>Proceed to checkout</a></span>
							</div>
						
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>