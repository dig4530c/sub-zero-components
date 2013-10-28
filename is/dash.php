<?php

//Sulley Environment 
//$mysqli = new mysqli("sulley.cah.ucf.edu", "Username ", " PW", "tablename");

//Edgardo's Local Environment
$mysqli = new mysqli("localhost", "root", "", "subzero");

//Check connection 
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//Set charset
mysqli_set_charset($mysqli, 'utf-8');

//Escape function
function escape_data($data){
	global $mysqli;
	if(get_magic_quotes_gpc()) 
		$data = stripslashes($data);
	return mysqli_real_escape_string(trim($data), $mysqli);
	} // End of the escape data function.

//Password hashing
function get_password_hash($password) {
	global $mysqli;
	return mysqli_real_escape_string ($mysqli, hash_hmac('sha256', $password, 'c#haRl891', true)); echo 'IT WORKS';
	}