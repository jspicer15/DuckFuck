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
        <header>
            
            <nav>
                <ul>
                    <li id="heading"><a href="index.php" id="headertext">DuckFuck</a></li>
                    <?php
						if(empty($_SESSION['LoggedIn']) && empty($_SESSION['email']))
						{
							 ?>
							<li><a href="signup_form.php">Create an Account</a></li>
							<li><a href="index.php">Sign In</a></li>
							<?php
						}
						else
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



<?php
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
	{
		$username = $_SESSION['email'];
		$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE email = '$username' AND active = '1'"));
		$gender = $row[6];
		$major = $row[7];
		$preference = $row[8];
		$bio = $row[9];
		
	}

	else 
	{
		header( 'Location: index.php' ) ; 
	}
?>
 	 <div id="form">
		<form method="post" action="upload.php" enctype="multipart/form-data">
			<label class="field" for="photo">Select photo to upload:</label><input type="file" name="photo" id="photo">
				    <label class="field" for="gender">Gender (m/f):</label><input type="radio" name="gender" id="gender" value="male" required> Male<br>
				    <input type="radio" name="gender" id="gender" value="female">Female<br>
				    <input type="radio" name="gender" id="gender" value="other">Other<br>
					<label class="field" for="major">Major:</label><input type="text" name="major" id="major" value="<?php echo $major;?>">
				    <label class="field" for="preference">Preference (m/f):</label><input type="radio" name="preference" id="preference" value="male" required> Male<br>
				    <input type="radio" name="preference" id="preference" value="female"> Female<br>
				    <input type="radio" name="preference" id="preference" value="both"> Both<br>
				    <label class="field" for="bio">Short Bio:</label><input type="text" name="bio" id="bio" value="<?php echo $bio;?>">
		    <input type="submit" value="Update Profile" name="submit">

	    <script type="text/javascript">
	    document.getElementById('photo').onchange = uploadOnChange;

	    function uploadOnChange() {
		var filename = this.value;
		var lastIndex = filename.lastIndexOf("\\");
		if (lastIndex >= 0) {
		filename = filename.substring(lastIndex + 1);
		}
		document.getElementById('filename').value = filename;
	    }
	    </script>
	</div>

	</body>
	</html>
