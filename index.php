<?php include "base.php" ?>
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
            <input type="submit" id="signin" value="Sign In" onclick="location.href='www.duckfuck.cf/login';">
        </div>
</html>

<?php

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{
     ?>
 
     <h1>Member Area</h1>
     <p Thanks for logging in! You are <code><?=$_SESSION['email']?></code></p>

      
     <?php
}
elseif(!empty($_POST['email']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['email']);
    $password = $_POST['password'];

///////////////////////////////////////////CHECK PASSWORD HASH/////////////////////////////////////////
     
    $checklogin = mysql_query("SELECT * FROM users WHERE email = '".$username."' AND password = '".crypt($password, $username->password)."'");


    if(mysql_num_rows($checklogin) == 1)
    {
    // User is now logged in. Redirect etc.
  
        $row = mysql_fetch_array($checklogin);
        $email = $row['email'];
         
        $_SESSION['email'] = $email;
        $_SESSION['LoggedIn'] = 1;
         
        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='=2;index.php' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>

	<a href = "signup_form.html" > <h3> Don't have an account? Sign up here </h3> </a>
    </body>
   <h1>Member Login</h1>

	<div id="form">
		<h2> Have an account? Log in here</h2>
    		<form method="post" action="index.php" >		        
		        <input type="text" id="email" name="email" autocomplete="off" maxlength="30" placeholder="email" pattern="[A-Za-z0-9._%+-]+@stevens+\.edu$" required><br/>

		        <input type="password" name ="password" id="password" minlength="8" placeholder="Password" required><br/>		       
		        <input type="submit" id="submit" value="Submit">
        	</form>
        </div>
   <?php
}
?>
 
</div>
</body>
</html>
