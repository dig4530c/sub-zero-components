<?php
$page_title = "Sub Zero Components - Login";
include ('is/header.php'); 
include ('is/dash.php');
?>

<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="twelvecol user login">
				<?php
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					include ('is/login.inc.php');
					}
				include ('is/login_form.inc.php');
				?>
			</div>
		</div>
	</div>
</div>


<?php 
include ('is/footer.php');
exit();
?>