<?php
if(!isset($_SESSION)){session_start();} 
include "dbconnect.php";
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
		<title>Gift Card Store</title>
	</head>
	<body>
		<div id="wrap">
			<?php include("loginheader.php"); ?>
			<p><center><b>Card Categories</b></center></p>
			<?php
			echo "<table align=center>\n";
			$query="SELECT card_type FROM card_type";
			$result=mysqli_query($db, $query) or die("Error Querying Database");
			while($row=mysqli_fetch_array($result)){
				$card = $row['card_type'];
				$cleanedUp = str_replace("_"," ",$row['card_type']);
				$cleanedUp = ucwords($cleanedUp);
				echo "<tr><td><a href=\"viewcards.php?category=$card\">$cleanedUp</a></td></tr>\n";
			}
			echo "</table>\n";
			?>
			<?php include("footer.html"); ?>
		</div>
	</body>
</html>
