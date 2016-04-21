<?php include "base.php";


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

//SQL CONNECTION

/////////////////////////////////////////FILE UPLOADING///////////////////////////////////////////////

//Make directory for user if it does not already exist
if(!is_dir("uploads/". $_SESSION["email"] ."/")) {
    mkdir("uploads/". $_SESSION["email"] ."/");
}
$target_dir = "uploads/" . $_SESSION['email'] . "/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//Check if image file is an actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false)
    {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else 
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) 
{
    echo "Sorry, file already exists. Try renaming your file.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["photo"]["size"] > 500000) 
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
}
// if everything is ok, try to upload file
else 
{
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
    {
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}

/////////////////////////////////////////FILE UPLOADING///////////////////////////////////////////////



/////////////////////////////////////////FORM INFO SAVE///////////////////////////////////////////////

	$gender = $_POST['gender'];
	$major = $_POST['major'];
	$bio = $_POST['bio'];
	$preference = $_POST['preference'];
	$email = $_SESSION['email'];

	//UPDATE SQL DATABASE
	$sql = "UPDATE users SET gender = '$gender', major = '$major', bio = '$bio', preference = '$preference' WHERE email = '$email'";

	if ($conn->query($sql) === TRUE)
	{
       	 	$_SESSION['email'] = $email;
        	$_SESSION['LoggedIn'] = 1;
		echo "Successfully updated profile!";
		sleep(2);
		echo '<script type="text/javascript">
		window.location = "http://duckfuck.cf/index.php"
		</script>';
	}
	else
	{
		echo "Error updating record: " . $conn->error;
	}
	//UPDATE SQL DATABASE

?>
