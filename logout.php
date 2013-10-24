<?php
require('./is/config.inc.php');
//redirect_invalid_user();
$_SESSION = array();
session_destroy();
setcookie(session_name(), '', time()-300);
$page_title = 'Logout';
include ('./is/header.php');
echo '
	<h3>Logged Out</h3>
	<p>Thank you for visiting. You are now logged out. Please come back soon!</p>
	';
require(MYSQL); //hmm, needs definition
include('./is/footer.php');
?>