<?php

//Sulley Environment 
$mysqli = new mysqli("sulley.cah.ucf.edu", "Username ", " PW", "tablename");

//Edgardo's Local Environment
//$mysqli = new mysqli("localhost", "root", "", "subzero");

//check connection 
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


?>