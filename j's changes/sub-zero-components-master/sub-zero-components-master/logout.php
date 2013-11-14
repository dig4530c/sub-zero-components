<?php
require('./is/config.inc.php');
//redirect_invalid_user();
$_SESSION = array();
session_destroy();
setcookie(session_name(), '', time()-300);
$page_title = "Sub Zero Components - Logout";
include ('./is/header.php');
?>
<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="fourcol">
			</div>
			<div class="threecol">
				<div class='space'></div>
				<div class='space'></div>
				<div class="title logout">
				<h2>Logged out.</h2>
				<div>
					<h3>Keep track of our deals!</h3>
					<ul class="social">
						<li><a href="http://www.facebook.com"></a></li>
						<li><a href="http://www.twitter.com"></a></li>
						<li><a href="http://www.youtube.com"></a></li>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require(MYSQL);
include ('./is/footer.php');
?>