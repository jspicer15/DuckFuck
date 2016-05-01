<?php
	function connectToDB() {
		$servername = "localhost";
	 	$username = "root";
	  	$password = "";
	  	$dbname = "df";

	  	try {
	  		return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	  	} catch (PDOException $ex) {
	  		echo $ex->getMessage();
	  	}
	}
?>