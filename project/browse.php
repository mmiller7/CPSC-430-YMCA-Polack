<?php
if(!isset($_SESSION["name"]))
{
  include("login.php");
	exit(0);
}
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<title>Stingray Welcome</title>
	</head>
	<body>
		<div id="wrap">
			<?php include("loginheader.php"); ?>
			<?php echo 'This is the order giftcard page'; ?>
			<?php include("footer.html"); ?>
		</div>
	</body>
</html>
