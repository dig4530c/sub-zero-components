<?php 
$page_title = "Sub Zero Components - Super User Login";
$page_type = "super";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include ('is/login.inc.php');
}
include ('is/header.php'); 
include ('is/dash.php'); 
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
				<div class="title login">
					<h2>Super User Login</h2>
				</div>
				<div id='login'>
					<?php
					include ('is/login_form.inc.php');
					?>
				</div>
			</div>
			<div class="fivecol last">
			</div>
		</div><!--end row-->
	</div>
</div>

<?php 
include ('is/footer.php'); 
exit();
?>