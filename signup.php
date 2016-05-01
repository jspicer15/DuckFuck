<?php
	require "db.php";

	$db = connectToDB();

	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];


  	$hash = password_hash($password, PASSWORD_DEFAULT);
  	$activation_hash = hash('sha256', rand(0,10000000000));

	$statement = $db->prepare('INSERT INTO users (first, last, email, password, activation) VALUES (?, ?, ?, ?, ?)');

	$statement->execute(array($FirstName, $LastName, $email, $hash, $activation_hash));
?>

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
                <li><a href="index.php"><img src="logo/df-logo.svg" alt="DuckFuck" id="headerlogo"></a></li>
                <li id="navtitle">Welcome to DuckFuck</li>
            </ul>
        </nav>
    </header>
    <p class="signedup">
    	Thank you for signing up! You will receive a confirmation email shortly with a link to activate your account.
    </p>
    <p class="signedup">
    	You may close this tab, as clicking the link in your email will open another one.
    </p>
</body>
</html>