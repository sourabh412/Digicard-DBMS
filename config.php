<?php

//start session on web page
session_start();

// connecting to db
$server = "localhost";
$username = "root";
$password = "";
$db = "4thsemdbms";

$con = mysqli_connect($server, $username, $password, $db);

?> 