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
	
	$text = $_POST['text'];
   
    if(!is_dir('logs/'. $_SESSION['email'] .$user.'/')) 
	{
		mkdir('logs/'. $_SESSION['email'] .$user.'/');
	}
	
	if(!is_dir('logs/'.$user. $_SESSION['email']. '/')) 
	{
		mkdir('logs/'.$user.$_SESSION['email'].'/');
	}
	
    $fp = fopen('logs/'. $_SESSION['email'] .$user.'/log.html', 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['email']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
    
    $fp2 = fopen('logs/'.$user.$_SESSION['email'].'/log.html', 'a');
    fwrite($fp2, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['email']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp2);

}
?>
