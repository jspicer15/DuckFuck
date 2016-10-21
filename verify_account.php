<?php
  $servername = "####";
  $username = "####";
  $password = "####";
  $dbname = "####";
  $conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_errno > 0)
	{
		echo "Error connecting to DB";
		//die("Connection failed: " . $conn->connect_error;
	}

  mysql_select_db("users") or die(mysql_error()); // Select users database.

  if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
      // Verify data
      $email = mysql_escape_string($_GET['email']); // Set email variable
      $hash = mysql_escape_string($_GET['hash']); // Set hash variable

      $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
      $match  = mysql_num_rows($search);

      if($match > 0) {
          // We have a match, activate the account
          mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
          echo "Your account is now activated! You may now login.";
          sleep(2);
      		echo '<script type="text/javascript">
      		window.location = "http://www.duckfuck.whatever/login"
      		</script>';
      }
      else {
          // No match: invalid url or account has already been activated.
          echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
      }

  }else{
      // Error in URL
      echo '<div class="statusmsg">Error, please use the link that has been send to your email.</div>';
  }
?>
