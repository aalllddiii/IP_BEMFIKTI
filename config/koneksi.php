<?php

$host = 'localhost';
$user = 'oprecvol_useripbem';
$pass = '42g*^6o3q0F%';
$db   = 'oprecvol_ipbem';

// $con  = mysqli_connect('localhost', 'bemfikti_ehek', 'ehek123', 'bemfikti_absenkegiatan')or die("ERROR");
$con  = mysqli_connect($host, $user, $pass, $db) or die("ERROR");

//     if($_SERVER["HTTPS"] != "on")
// {
//     header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//     exit();
// }
