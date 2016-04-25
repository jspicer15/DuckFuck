<?php include "base.php";
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{ 		
	$email = $_SESSION['email'];
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


			
			<div id="matches">
				<p>Here are your matches. You can chat with any of them!</p>
				<?php
					$liked = mysql_fetch_array(mysql_query("SELECT likes FROM users WHERE email = '$email'"))[0];
					$profiles = explode(",", $liked);
					$i = 0;
					$j = 0;
					
					while ($i < count($profiles) + 1)
					{
						$user_likes = mysql_fetch_array(mysql_query("SELECT likes FROM users WHERE email = '$profiles[$i]'"))[0];
						$users = explode(",", $user_likes);
						while ($j < count($users) + 1)
						{
							if ($email == $users[$j])
							{
								echo '<a href="do_stuff.php?user='.$profiles[$i].'">'.$profiles[$i].'</a>';
							}
							$j += 1;
						}
						$j = 0;
						$i += 1;
					}
				?>

			</div>
<?php
}

else
{
			header( 'Location: index.php' ) ; 
}
?>
