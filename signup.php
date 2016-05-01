<?php
	require "db.php";

	$db = connectToDB();
	print_r($db);

	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];


  	$hash = password_hash($password, PASSWORD_DEFAULT);
  	$activation_hash = hash('sha256', rand(0,10000000000));

	$statement = $db->prepare('INSERT INTO users (first, last, email, password, activation) VALUES (?, ?, ?, ?, ?)');

	$statement->execute(array($FirstName, $LastName, $email, $hash, $activation_hash));
	//print_r($statement->errorInfo);

	//echo "Thank you for signing up. You will receive a confirmation email shortly with a link to activate your account. Thank you again! You will automatically be redirected. If your browser does not redirect <a href= http://www.duckfuck.cf> Click Here </a>";
	//echo '<script type="text/javascript">window.location = "http://www.duckfuck.cf"</script>';
	/*
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

	echo "Thank you for signing up. You will receive a confirmation email shortly with a link to activate your account. Thank you again! You will automatically be redirected. If your browser does not redirect <a href= http://www.duckfuck.cf> Click Here </a>";
	sleep(2000);
	echo '<script type="text/javascript">
	window.location = "http://www.duckfuck.cf"
	</script>';
	}
	else
	{
		echo "Error updating record: " . $conn->error;
	}

	*/

?>
