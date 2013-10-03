<?php

 
$mysqli = new mysqli("sulley.cah.ucf.edu", "Username ", " PW", "tablename");

//check connection 
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


?>