<?php
if(!isset($_SESSION)){session_start();} 
if(!isset($_SESSION["name"]))
{
  include("login.php");
	exit(0);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<title>Stingray Home Page</title>
	</head>
	<body>
		<div id="wrap">
			<?php 	include("loginheader.php"); 
					if(isset($SESSION['name'])){ echo 'Welcome '; echo $SESSION["name"]; echo ' family!'; }
					else{ echo 'Welcome Home!'; }
					include("footer.html"); 
			?>
		</div>
	</body>
</html>
