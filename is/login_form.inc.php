<?php
if (!isset($login_errors)){
	$login_errors = array();
	}
require_once('./is/form_functions.inc.php');
?>
<div class="title">
	<h3>Login</h3>
</div>
<form action="login.php" method="post" accept-charset="utf-8">
	<p>
	<?php 
	if (array_key_exists('login', $login_errors)){
		echo '<span class="error">'.$login_errors['login'].'</span><br />';
		}
	?>
	<label for="username"><strong>Username</strong></label><br /> <!--Style labels instead of using <br /> -->
	<?php create_form_input('username', 'text', $login_errors); ?><br />
	<label for="pass"><strong>Password</strong></label><br />
	<?php create_form_input('pass', 'password', $login_errors); ?>
	<a href="forgot_password.php">Forgot?</a><br />
	<input type="submit" value="Login &rarr;"></p>
</form>
	
