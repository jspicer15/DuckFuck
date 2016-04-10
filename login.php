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

  $email = $_POST['email'];
  $password = $_POST['password'];


///////////////////////////////////////////CHECK PASSWORD HASH/////////////////////////////////////////

  $sth = $dbh->prepare('
    SELECT
      hash
    FROM users
    WHERE
      email = :email
    LIMIT 1
    ');

  $sth->bindParam(':email', $email);

  $sth->execute();

  $user = $sth->fetch(PDO::FETCH_OBJ);

  // Check if hash is equal
  if ( hash_equals($user->hash, crypt($password, $user->hash)) ) {
    // User is now logged in. Redirect etc.
  }

?>
