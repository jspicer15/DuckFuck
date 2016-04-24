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
                    <li><a href="index.php">Sign In</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>

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
