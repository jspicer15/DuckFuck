<?php include "base.php"; 
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{ 
	if (!empty($_GET['user']))
	{
		$user = $_GET['user'];
	}
	else
	{
		header( 'Location: index.php' ) ; 
	}
	
	header('Refresh: 15; url=do_stuff.php?user='.$user);

?>
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


	<div id="chatbox">
			<script type="text/javascript">var username = <?php echo json_encode($user); ?>;</script>
			<?php
			$direct = 'logs/'. $_SESSION['email'] .$user.'/log.html';
				if(file_exists('logs/'. $_SESSION['email'] .$user.'/log.html') && filesize('logs/'. $_SESSION['email'] .$user.'/log.html') > 0)
				{
					?>
					<script type="text/javascript">var direct = <?php echo json_encode($direct); ?>;</script>
					<?php
					$handle = fopen('logs/'. $_SESSION['email'] .$user.'/log.html', 'r');
					$contents = fread($handle, filesize('logs/'. $_SESSION['email'] .$user.'/log.html'));
					fclose($handle);
					 
					echo $contents;
				}
			?>
	</div>
		 
		<form name="message" action="">
			<input name="usermsg" type="text" id="usermsg" size="63" />
			<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
		</form>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		var sendHere = "update_stuff.php?user=";
		sendHere = sendHere.concat(username);
		console.log(sendHere);
		$.post(sendHere, {text: clientmsg});				
		$("#usermsg").attr("value", "");
		location.reload();
		return false;
	});
	//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: direct,
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
</script>
	</body>
	</html>

<?php

}

else
{
		header( 'Location: index.php' ) ; 
}

?>
