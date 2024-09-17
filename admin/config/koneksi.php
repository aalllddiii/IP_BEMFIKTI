<?php

$host="localhost"; //host server
$user="oprecvol_useripbem"; //user login
$pass ="42g*^6o3q0F%"; //password
$db ="oprecvol_ipbem"; //name database
$conn = mysqli_connect($host, $user, $pass, $db) or die ("ERROR");

// if (mysqli_connect_errno()) {
// 	echo mysqli_connect_errno();
// }

// if ($_SERVER["HTTPS"] != "on") {
// 	header("Location:https://" .
// 		$_SERVER["HTTP_HOST"] .
// 		$_SERVER["REQUEST_URI"]);
// 	exit();
// }
