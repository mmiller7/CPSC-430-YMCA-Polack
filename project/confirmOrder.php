<?php
session_start();
//connect to database
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
		<title>Confirm Order</title>
	</head>
	<body>
		<div id="wrap">
		<?php include("loginheader.php"); ?>
		
		<?php
		if(isset($_SESSION['cart']))
			{
				$found=false;
				foreach($_SESSION['cart'] as $item)
				{
					$found=true;
					echo $item['qty']." of card ".$item['gc_id']."<br>\n";
					
					
					
					//construct query
					$query= "SELECT store_name,card_value,fundraise_value,type_id
					FROM available_cards WHERE gc_id='".$item['gc_id']."'";
					//query database
					$result = mysqli_query($db, $query) or die("Error Querying Database");
					
					//print out results
					echo "<table border=1 cellpadding=15>
					<tr>
					<th>Store Name</th>
					<th>Card Value</th>
					<th>Card Fundraise Value</th>
					<th>Card Type</th>
					<th>Quantity</th>
					<!-- <th>Usage</th> -->
					</tr>";
					
					while($row = mysqli_fetch_array($result))
	   				{
	   				echo "<tr><td></td></tr>";
	  			    echo "<tr>";
					echo "<td>" . $row['store_name'] . "</td>";
	   				echo "<td>" . $row['card_value'] . "</td>";
	   				echo "<td>" . $row['fundraise_value'] . "</td>";
	   				echo "<td>" . $row['type_id'] . "</td>";
	   				echo "<td>" . $item['qty'] .	"</td>";
	  				echo "</tr>";
	   				echo "<tr>";
	   				echo "</tr>";
	   				//declare variables for insert query
	   				$gc_id=$item['gc_id'];
	   				$fundraise_value=$row['fundraise_value'];
	   				$card_quantity=$item['qty'];
	   				
	   				$query1= "INSERT INTO pending_orders
					(gc_id, fund_raise_value, card_quantity)
					VALUES('".$gc_id."','".$fundraise_value."','".$card_quantity."')";
					$result1 = mysqli_query($db, $query1) or die("Error Querying Database");
					
					
	  				}
	   				echo "</table>";
					
					
				}
				if(!$found)
				{
					echo 'Your cart is empty.';
				}
			}
			else
			{
				echo 'Your cart is empty.';
			}
			mysqli_close($db);
		?>
	
		<?php include("footer.html"); ?>
		</div>
	</body>
</html>