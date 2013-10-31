<?php
require('./is/config.inc.php');
//redirect_invalid_user();
$_SESSION = array();
session_destroy();
setcookie(session_name(), '', time()-300);
$_POST['logout'] = "You are now logged out.";
require(MYSQL);
header("Location: ./home.php");
exit();





$page_title = 'Sub Zero Components - Logout';
include ('./is/header.php');
?>

<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="twelvecol user-registration">
				<h3>Logged Out</h3>
				<p>Thank you for visiting. You are now logged out. Please come back soon!</p>
			</div>
		</div>
	</div>
</div>

<?php
include('./is/footer.php');
?>