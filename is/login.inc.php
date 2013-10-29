<?php //ONLY ACTIVATES IF ($_SERVER['REQUEST_METHOD'] == 'POST')
$login_errors = array();

//Validate Username
if (!empty($_POST['username'])){
	$u = mysqli_real_escape_string($mysqli, $_POST['username']);
	}
else {
	$login_errors['username'] = 'Please enter your username!';
	}
	
//Validate Password
if (!empty($_POST['pass'])){
	$p = mysqli_real_escape_string($mysqli, $_POST['pass']);
	}
else {
	$login_errors['pass'] = 'Please enter your password!';
	}
	
//If no errors exists, query the database
if (empty($login_errors)){
	$q = "SELECT id, username, user_type FROM users WHERE (username = '".$u."' AND pass='".get_password_hash($p)."');";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 1){
		$row = mysqli_fetch_array($r, MYSQLI_NUM);
		$_SESSION['user_id'] = $row[0];
		$_SESSION['username'] = $row[1];
		if ($row[2] == 'admin') $_SESSION['user_admin'] = true;
		elseif ($row[2] == 'super') $_SESSION['user_super'] = true;
		header("Location: ./home.php");
		exit();
		}
	else {
		$login_errors['login'] = 'The email address and password do not match those on file.';
		}
	} // End of $login_errors IF.