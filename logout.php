<?php
require('./is/config.inc.php');
//redirect_invalid_user();
$_SESSION = array();
session_destroy();
setcookie(session_name(), '', time()-300);
$page_title = "Sub Zero Components - Logout";
include ('./is/header.php');
?>
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="twelvecol user logout">
				<h3>You have been logged out.</h3>
				<div>
					<h4>Keep track of our deals!</h4>
					<ul>
						<li><a href="#"><img src="./img/logout_facebook.png" alt="facebook" /></a></li>
						<li><a href="#"><img src="./img/logout_twitter.png" alt="twitter" /></a></li>
						<li><a href="#"><img src="./img/logout_linkedin.png" alt="linkedin" /></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require(MYSQL);
include ('./is/footer.php');
?>