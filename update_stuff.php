<?php include "base.php";
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{
   $text = $_POST['text'];
   
    if(!is_dir('logs/'. $_SESSION['email'] .'/')) 
	{
		mkdir('logs/'. $_SESSION['email'] .'/');
	}
	
    $fp = fopen('logs/'. $_SESSION['email'] .'/log.html', 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['email']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>
