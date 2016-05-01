<?php
session_start();
 
//SQL CONNECTION
$servername = "";
$username = "";
$password = "";
$dbname = "";
 
mysql_connect($servername, $username, $password) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>
