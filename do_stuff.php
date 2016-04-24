<?php include "base.php"; 
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{ ?>
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
	<div id="chatbox">
			<?php
				if(file_exists('logs/'. $_SESSION['email'] .'/log.html') && filesize('logs/'. $_SESSION['email'] .'/log.html') > 0)
				{
					$handle = fopen('logs/'. $_SESSION['email'] .'/log.html', 'r');
					$contents = fread($handle, filesize('logs/'. $_SESSION['email'] .'/log.html'));
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
<!--<script type="text/javascript">
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("update_stuff.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
	//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			<?php echo 'var user_email = '.json_encode($_SESSION['email']).';'; ?>
			var direct = "logs/";
			direct = direct.concat(user_email);
			direct = direct.concat("/log.html");
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
</script>-->
	</body>
	</html>

<?php

}

else
{
		header( 'Location: index.php' ) ; 
}

?>
