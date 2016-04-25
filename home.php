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
                    <?php
						if(empty($_SESSION['LoggedIn']) && empty($_SESSION['email']))
						{
							 ?>
							<li><a href="signup_form.php">Create an Account</a></li>
							<li><a href="index.php">Sign In</a></li>
							<?php
						}
						else
						{
							?>
							<li><a href="profile.php">Edit Profile</a></li>
							<li><a href="matching.php">Find Matches</a></li>
							<li><a href="view_matches.php">View Your Matches</a></li>
							<li><a href="view_matches.php">Chat</a></li>
							<li><a href="logout.php">Log Out</a></li>
							<?php
						}
							?>
                </ul>
            </nav>
        </header>


		<?php
	}
	
	else
	{
		     header( 'Location: index.php' ) ; 
	}
?>
