<?php include "base.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jTinder Touch Slider</title>
    <link rel="stylesheet" type="text/css" href="jTinder-master/css/jTinder.css">
</head>
<body>
    <!-- start padding container -->
    <div class="wrap">
        <!-- start jtinder container -->
        <div id="tinderslide">
            <ul>
<?php
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
		}*/
    
        echo'       <li class="'.$rowData[2].'" style = "background: url('.$main.'") ' /*no-repeat scroll center center; background-size: cover">*/ . '>
                    <div class="img"></div>
                    <div>'.$rowData[2].'</div>
                    <div class="like"></div>
                    <div class="dislike"></div>
					</li> ';
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
