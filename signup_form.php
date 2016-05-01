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
						if(empty($_SESSION['LoggedIn']) && empty($_SESSION['email'])) {
							?>
                                <li id="navtitle">Welcome to DuckFuck</li>
                            <?php
						} else
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



        <script>
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("ConfirmPassword");

            function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>

		<h1 id="createAccount">Create your DuckFuck Account </h1>
    	<div id="about">
            <img id="ducklogo" src=" DF-logo.png" alt="logo" />
            <p id="aboutText">A dating website <i>for</i> Stevens students, <i>by</i> Stevens students. Creating an account is <strong>free</strong>, no strings attached.</p>
        </div>
        
        <div id="form">
    		<form action="signup.php" method="POST">
                <input type="text" id="FirstName" name="FirstName" autocomplete="off" maxlength="15" placeholder="First Name" required><br/>
                <input type="text" id="LastName" name="LastName" autocomplete="off" maxlength="25" placeholder="Last Name" required><br/>
                
                <input type="text" id="email" name="email" autocomplete="off" maxlength="30" placeholder="email" pattern="[A-Za-z0-9._%+-]+@stevens+\.edu$" required><br/>

                <input type="password" name = "password" id="password" minlength="8" placeholder="Password" required><br/>
                <input type="password" name = "ConfirmPassword" id="ConfirmPassword" minlength="8" placeholder="Confirm Password" required><br/>
               
                <input type="submit" id="submit" value="Submit">
        	</form>
        </div>
    </body>

</html>
