<?php include "base.php";
	set_time_limit(0);
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
	{
		?>
		
		<!DOCTYPE html>
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
				<link rel="stylesheet" type="text/css" href="styles.css"></link>
				<link rel="icon" type="image/png" href="favicon.jpg">
				<title>DuckFuck</title>
			</head>
		   
			<body>
				<div id="header">
					<h1 id="headertext">DuckFuck</h1>
					<input type="submit" id="logout" value="Log Out" onclick="location.href = 'logout.php';">
					<ul>
						<li> <a href="profile.php">My Account</a></li>
						<li> <a href="matching.php">My Matches</a></li>
					</ul>
				</div>
				

		<?php
		header('Refresh: 5; URL=matching.php');
		echo '<p Redirecting to Matches in 10 seconds> </p></p> </html>';
	}
	
	else
	{
		     header( 'Location: index.php' ) ; 
	}
?>
