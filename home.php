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
        <header>
            
            <nav>
                <ul>
                    <li id="heading"><a href="index.php" id="headertext">DuckFuck</a></li>
                    <li><a href="index.php">Sign In</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
				

		<?php
		header('Refresh: 5; URL=matching.php');
		echo '<p Redirecting to Matches in 10 seconds> </p></p> </html>';
	}
	
	else
	{
		     header( 'Location: index.php' ) ; 
	}
?>
