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
			<p><center><b>Select a Card</b></center></p>
			<?php
			$category=mysqli_real_escape_string($db, $_GET['category']);
			$query="SELECT gc_id,store_name,card_value,fundraise_value FROM available_cards NATURAL JOIN card_type WHERE card_type = '".$category."'"; 
			$result=mysqli_query($db, $query) or die("Error Querying Database");
			//Print the results
			$foundAny=false;
			while($row=mysqli_fetch_array($result)){ 
				$foundAny=true; //so we know it found at least 1 thing
				$sname = $row['store_name'];
				$cvalue = $row['card_value'];
				$fvalue = $row['fundraise_value'];
				echo "<form name=\"ordercard\" action=\"addtocart.php\" method=\"POST\">";
					echo "<p><table align=center frame = border rules=all border=1>";
					echo "<tr><th colspan = 1>Store Name</th><th colspan = 1>Value</th><th colspan = 1>Raised</th><th colspan = 1>Quantity</th><th colspan = 1></th></tr>\n";
					echo "<tr><td>$sname</td><td>$$cvalue</td><td>$fvalue</td>";
						echo "<td><select name=qty>";
						for($i = 1; $i <=10; $i++){
							echo"<option value=$i>$i</option>";
						}
						echo "</select>";
					echo "</td><td><input type=\"submit\" name=\"submit\" value=\"Add to Cart\"></td></tr>";
					echo "</table></p>";
				echo "</form>";
			}
			if(!$foundAny){ //to display a message if there isn't any
				echo "Nothing found for ".$_GET['category']."<br>\n";
			}
			?>
			<?php include("footer.html"); ?>
		</div>
	</body>
</html>
