<?php include "base.php"; 
//SQL CONNECTION
$servername = "####";
$username = "####";
$password = "####";
$dbname = "####";
 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno > 0)
{
	echo "Error connecting to DB";
	//die("Connection failed: " . $conn->connect_error;
}

//SQL CONNECTION
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css"></link>
        <link rel="icon" type="image/png" href="favicon.jpg">
        <link rel="stylesheet" type="text/css" href="jTinder-master/css/jTinder.css">

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

    <!-- start padding container -->
    <div class="wrap">
        <!-- start jtinder container -->
        <div id="tinderslide">
            <ul>
<?php
    
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
	{
		$email = $_SESSION['email'];

		if (!empty($_GET['user']))
		{
			$like = $_GET['like'];
			$user = $_GET['user'];
			

			if ($like == '1')
			{
				$likes = mysql_fetch_array(mysql_query("SELECT likes FROM users WHERE email = '$email'"))[0];
				$likes .= ",";
				$likes .= $user;
				$sql = "UPDATE users SET likes = '$likes' WHERE email = '$email'";
			}
			else
			{
				$dislikes = mysql_fetch_array(mysql_query("SELECT dislikes FROM users WHERE email = '$email'"))[0];
				$dislikes .= ",";
				$dislikes .= $user;
				$sql = "UPDATE users SET dislikes = '$dislikes' WHERE email = '$email'";
			}
			if ($conn->query($sql) === TRUE)
			{
				
			}
			else
			{
				echo "Error updating record: " . $conn->error;
			}

		}
		$liked = mysql_fetch_array(mysql_query("SELECT likes FROM users WHERE email = '$email'"))[0];
		$disliked = mysql_fetch_array(mysql_query("SELECT dislikes FROM users WHERE email = '$email'"))[0];
		$pref = mysql_fetch_array(mysql_query("SELECT preference FROM users WHERE email = '$email'"))[0];
		$seen = $liked . $disliked;
		$profiles = explode(",", $seen);
		$view = 1;
		$i = 0;
		/*if (empty($_GET['user']) && empty($_GET['like']))
		{*/
			if ($pref != "both")
			{
				$users = mysql_query("SELECT * FROM users WHERE active = '1' AND gender ='$pref'");
			}
			else
			{
				$users = mysql_query("SELECT * FROM users WHERE active = '1'");
			}
			while($rowData = mysql_fetch_array($users)) {
					$directory = "uploads/" . $rowData[2] . "/";
					$photos = glob($directory . "*");
					$main = $photos[0];
					/*for($i = 0; $i < count($photos); $i++)
					{
						$image = $photos[$i];
						
						print $image ."<br />";
						echo '<img src = "'.$image.'" alt = "User picture" />'."<br /><br />";
					}*/

				while ($i < count($profiles) + 1)
				{
					if ($profiles[$i] == $rowData[2])
					{
						$view = 0;
					}
					$i += 1;
				}
				
				if (($view == 1) && ($email != $rowData[2]))
				{
						echo'   <li class="" style = "background: url() no-repeat scroll center center; background-size: 100%; background-color: white">
								</li>
								
								<li class="'.$rowData[2].'" style = "background: url('.$main.') no-repeat scroll center center; background-size: 100%">
								<div class="img"></div>
								<div class="username">'.$rowData[0].' '.$rowData[1].'</div>
								<div class="like"></div>
								<div class="dislike"></div>
								</li>  
								
								<div class="username">'.$rowData[0].' '.$rowData[1].'</div>';
				}
				$i = 0;
				$view = 1;
			}
		//}
		/*else
		{
			$users = mysql_query("SELECT * FROM users WHERE active = '1'");
			while($rowData = mysql_fetch_array($users)) {
					$directory = "uploads/" . $rowData[2] . "/";
					$photos = glob($directory . "*");
					$main = $photos[0];
					/*for($i = 0; $i < count($photos); $i++)
					{
						$image = $photos[$i];
						
						print $image ."<br />";
						echo '<img src = "'.$image.'" alt = "User picture" />'."<br /><br />";
					}
				
				while ($i < count($profiles))
				{
					if (profiles[$i] == $rowData[2])
					{
						view = 0;
					}
					$i += 1;
				}
				
				if ($view)
				{
					echo'       <li class="'.$rowData[2].'" style = "background: url('.$main.'") ' /*no-repeat scroll center center; background-size: cover"> . '>
							<div class="img"></div>
							<div>'.$rowData[2].'</div>
							<div class="like"></div>
							<div class="dislike"></div>
							</li> ';
				}
			}
		}*/
	}
	else
	{
		header( 'Location: index.php' ) ; 
	}
?>

        </ul>
        </div>
        <!-- end jtinder container -->
    </div>
    <!-- end padding container -->

    <!-- jTinder trigger by buttons  -->
    <div class="actions">
        <a href="#" class="dislike"><i></i></a>
        <a href="#" class="like"><i></i></a>
    </div>

<!--
<script>
	("#tinderslide").jTinder({
		var url = 'matching.php?';
		onDislike: function (item) {
			var query = 'item=' + item + '&like=' + 0;
			
			window.location.href = url + query
		},
		onLike: function (item) {
			var query = 'item=' + item + '&like=' + 1;
			
			window.location.href = url + query    
		},
		animationRevertSpeed: 200,
		animationSpeed: 400,
		threshold: 1,
		likeSelector: '.like',
		dislikeSelector: '.dislike'
	});
</script>               
-->
    <!-- jTinder status text  -->
    <div id="status"></div>

    <!-- jQuery lib -->
    <script type="text/javascript" src="jTinder-master/js/jquery.min.js"></script>
    <!-- transform2d lib -->
    <script type="text/javascript" src="jTinder-master/js/jquery.transform2d.js"></script>
    <!-- jTinder lib -->
    <script type="text/javascript" src="jTinder-master/js/jquery.jTinder.js"></script>
    <!-- jTinder initialization script -->
    <script type="text/javascript" src="jTinder-master/js/main.js"></script>
</body>
</html>
