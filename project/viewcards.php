<?php
session_start();
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
			$category=mysqli_real_escape_string($db, $_GET['category']);
			$query="SELECT gc_id,store_name,card_value,fundraise_value FROM available_cards NATURAL JOIN card_type WHERE card_type = '".$category."'"; 
			$result=mysqli_query($db, $query) or die("Error Querying Database");
			//Print the results
			$foundAny=false;
			while($row=mysqli_fetch_array($result)){ 
				$foundAny=true; //so we know it found at least 1 thing
				echo $row['store_name']."<br>\n";
				echo "Value is $".$row['card_value']."<br>\n";
				echo "It'll raise $".$row['fundraise_value']."<br>\n";
				echo "Gift card ID is ".$row['gc_id']."<br>\n";
				echo "<br>\n"; 
			}
			if(!$foundAny){ //to display a message if there isn't any
				echo "Nothing found for ".$_GET['category']."<br>\n";
			}
			?>
			<?php include("footer.html"); ?>
		</div>
	</body>
</html>