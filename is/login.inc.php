<?php 
$login_errors = array();

//Validate Email Address
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$e = mysqli_real_escape_string($mysqli, $_POST['email']);
	}
else {
	$login_errors['email'] = 'Please enter a valid email address!';
	}
	
//Validate Password
if (!empty($_POST['pass']){
	$p = mysqli_real_escape_string($mysqli, $_POST['pass']);
	}
else {
	$login_errors['pass'] = 'Please enter your password!';
	}
	
//If no errors exists, query the database
if (empty($login_errors)){
	$q = "SELECT id, username, user_type, IF(date_expires > NOW(), true, false) FROM users WHERE (email = '$e' AND pass='".
	 get_password_hash($p)."')";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 1){
		$row = mysqli_fetch_array($r, MYSQLI_NUM);
		$_SESSION['user_id'] = $row[0];
		$_SESSION['username'] = $row[1];
		if ($row[2] == 'admin') $_SESSION['user_admin'] = true;
		if ($row[3] == 1) $_SESSION['user_not_expired'] = true;
		}
	else {
		$login_errors['login'] = 'The email address and password do not match those on file.';
		}
	} // End of $login_errors IF.