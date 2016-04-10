<?php
	//SQL CONNECTION
	$servername = "duckfuck";
	$username = "root";
	$password = "duckfuckstevens";
	$dbname = "users";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_errno > 0)
	{
		echo "Error connecting to DB";
		//die("Connection failed: " . $conn->connect_error;
	}

  /////////////////////////////////////////SQL CONNECTION////////////////////////////////////////////////


  /////////////////////////////////////////FORM INFO SAVE///////////////////////////////////////////////
	$FirstName = $_GET['FirstName'];
	$LastName = $_GET['LastName'];
	$email = $_GET['email'];
	$password = $_GET['password'];

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

	$sql = "INSERT INTO users (first, last, email, password) VALUES ('$FirstName', '$LastName', '$email', '$password')";

	if ($conn->qury($sql) === TRUE)
	{
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
