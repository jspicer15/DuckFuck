<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css"></link>
        <link rel="icon" type="image/png" href="favicon.jpg">
        <title>Sign Up - DuckFuck</title>
    </head>

    <body>
        <div id="header">
            <h1 id="headertext">DuckFuck</h1>
            <input type="submit" id="signin" value="Sign In" onclick="location.href='index.php';">
	    <input type="submit" id="logout" value="Log Out" onclick="location.href = 'logout.php';">
        </div>

        <h1>Create your DuckFuck Account </h1>
    	<div id="about">
            <img id="ducklogo" src="logo/DF-logo.png" alt="DuckFuck" />
            <p>A dating website <i>for</i> Stevens students, <i>by</i> Stevens students. Creating an account is <strong>free</strong>, no strings attached.</p>
        </div>

        <script>
            var password = document.getElementById("password")
            , confirm_password = document.getElementById("ConfirmPassword");

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

        <div id="form">
    		<form action="signup.php" method="post">
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
