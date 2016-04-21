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
		<div id="header">
		    <h1 id="headertext">DuckFuck</h1>
            		<input type="submit" id="signin" value="Sign In" onclick="location.href='index.php';">
	    		<input type="submit" id="logout" value="Log Out" onclick="location.href = 'logout.php';">
		</div>

<?php
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
	{
		$username = $_SESSION['email'];
		$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE email = '$username' AND active = '1'"));
		$gender = $row[6];
		$major = $row[7];
		$preference = $row[8];
		$bio = $row[9];
?>
 	 <div id="form">
		<form method="post" action="upload.php" enctype="multipart/form-data">
			<label class="field" for="photo">Select photo to upload:</label><input type="file" name="photo" id="photo">
				    <label class="field" for="filename">Filename:</label><input type="text" name="filename" id="filename" readonly>
				    <label class="field" for="gender">Gender (m/f):</label><input type="text" name="gender" id="gender" value="<?echo $gender;?>">
				    <label class="field" for="major">Major:</label><input type="text" name="major" id="major" value="<?php echo $major;?>">
				    <label class="field" for="preference">Preference (m/f):</label><input type="text" name="preference" id="preference" value="<?php echo $preference;?>">
				    <label class="field" for="bio">Short Bio:</label><input type="text" name="bio" id="bio" value="<?php echo $bio;?>">
		    <input type="submit" value="Update Profile" name="submit">";

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
<?php
	}

	else 
	{
		header( 'Location: index.php' ) ; 
	}

?>
