<?php
session_start();
 
//SQL CONNECTION
$servername = "sql201.freecluster.eu";
$username = "fceu_17834029";
$password = "duckfuck";
$dbname = "fceu_17834029_users";
 
mysql_connect($servername, $username, $password) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>
