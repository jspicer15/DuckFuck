<?php
	//SQL CONNECTION
	$servername = "sql201.freecluster.eu";
 	$username = "fceu_17834029";
  	$password = "duckfuck";
  	$dbname = "fceu_17834029_users";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_errno > 0)
	{
		echo "Error connecting to DB";
		//die("Connection failed: " . $conn->connect_error;
	}

  /////////////////////////////////////////SQL CONNECTION////////////////////////////////////////////////


  /////////////////////////////////////////FORM INFO SAVE///////////////////////////////////////////////
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];

  ///////////////////////////////////////HASH AND SALT PASSWORD/////////////////////////////////////////
  $cost = 10; //lower this if consumes too much cpu

  // Create salt
  $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

  // Prefix to verify later.
  // "$2a$" Blowfish algorithm. The following two digits are the cost parameter.
  $salt = sprintf("$2a$%02d$", $cost) . $salt;

  // Hash the password with the salt
  $hash = crypt($password, $salt);
	//////////////////////////////////////UPDATE SQL DATABASE//////////////////////////////////////////////
  $activation_hash = md5( rand(0,1000) );

	$sql = "INSERT INTO users (first, last, email, password, hash, active) VALUES ('$FirstName', '$LastName', '$email', '$password', $activation_hash, 0)";

	if ($conn->qury($sql) === TRUE)
	{

    $to = $email; // Send email to our user
    $subject = 'DuckFuck Account Activation'; // Give the email a subject
    $message = '

    Thanks for signing up for DuckFuck!
    Your account has been created, you can login after you have activated your account by pressing the url below.


    Please click this link to activate your account:
    http://www.duckfuck.whatever/verify_account.php?email='.$email.'&hash='.$hash.'

    ';

    $headers = 'From:noreply@duckfuck.whatever' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

		echo "Thank you for signing up. You will receive a confirmation email shortly with a link to activate your account. Thank you again! You will automatically be redirected. If your browser does not redirect <a href= http://www.carspotter.tk/submissions.html> Click Here </a>";
		sleep(2);
		echo '<script type="text/javascript">
		window.location = "http://www.duckfuck.whatever"
		</script>';
	}
	else
	{
		echo "Error updating record: " . $conn->error;
	}

	////////////////////////////////////////UPDATE SQL DATABASE//////////////////////////////////////////////

?>
