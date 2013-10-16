<?php

$live = false;
$contact_email = 'szc.admin@subzerocomponents.com';

/* //DEFINE ('BASE_URI', 'home/students/sulleywhatever'); ***SET AFTER LIVE ADDRESS IS DECIDED***
DEFINE ('BASE_URI', 'localhost/subzero/'); // WAMP Testing
DEFINE ('BASE_URL', BASE_URI);
DEFINE ('MYSQL', BASE_URI.'is/dash.php'); */

session_start();
		
//Redirect function
function redirect_invalid_user($check = 'user_id', $destination = 'home.php', $protocol = 
	'http://'){
	if (!isset($_SESSION[$check])){
		$url = $protocol.BASE_URL.$destination;
		header("Location: $url");
		exit();
		}
	}