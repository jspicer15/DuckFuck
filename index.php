<?php include "base.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css"></link>
        <link rel="icon" type="image/png" href="favicon.png">
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
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{
     ?>
 
     <h1>Member Area</h1>
     </html>
     <?php
}
elseif(!empty($_POST['email']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['email']);
    $password = $_POST['password'];

///////////////////////////////////////////CHECK PASSWORD HASH/////////////////////////////////////////
    $hash = mysql_fetch_array(mysql_query("SELECT password FROM users WHERE email = '$username' AND active = '1'"))[0];

    if(password_verify($password, $hash))
    {
    // User is now logged in. Redirect etc.  
        $_SESSION['email'] = $username;
        $_SESSION['LoggedIn'] = 1;
		header( 'Refresh: 1; URL= index.php' ) ; 

    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>    </html>";
    }

}
else
{
    ?>
    </body>
   <h1 id="memberLogin">Member Login</h1>

	<div id="form">
		<h2> Have an account? Log in here</h2>
    		<form method="post" action="index.php" >		        
		        <input type="text" id="email" name="email" autocomplete="off" maxlength="30" placeholder="email" pattern="[A-Za-z0-9._%+-]+@stevens+\.edu$" required><br/>

		        <input type="password" name ="password" id="password" minlength="8" placeholder="Password" required><br/>		       
		        <input type="submit" id="submit" value="Submit">
        	</form>
        	<a href = "signup_form.php" id="signupForm"> Don't have an account? Sign up here </a>
        </div>
   <?php
}
?>
 
</div>
</body>
</html>
