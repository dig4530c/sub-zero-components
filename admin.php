<?php 
$page_title = "Sub Zero Components - Admin";
include ('is/header.php'); 
?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space">
				<div class="row">
					<div class="fourcol">
					</div>
					<div class="threecol ">
						<div class='space'></div>
						<div class='space'></div>
						<div class="title">
							<h2>Administrator Login</h2>
						</div>
						<div id='alogin'>
							<form>
								<label for="name">Username</label>
								<input type="text" id="username" required />
								<label for="name">Password</label>
								<input type="text" id="pass" required />
								<input type="submit" value="Login &rarr;">
							</form>
						</div>
					</div>
					<div class="fivecol last">
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>