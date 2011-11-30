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
		$totalDue=0;
		$totalRaised=0;
		if(isset($_SESSION['cart']))
			{
				echo "<br><center>Your order has been placed.</center><br>
				<table align=center border=1 cellpadding=15>
				<tr>
				<th>Store Name</th>
				<th>Card Value</th>
				<th>Card Fundraise Value</th>
				<th>Card Type</th>
				<th>Quantity</th>
				</tr>";
				$found=false;
				foreach($_SESSION['cart'] as $item)
				{
					$found=true;
					//echo $item['qty']." of card ".$item['gc_id']."<br>\n";
					
					
					
					//construct query
					$gc_id=mysqli_real_escape_string($db,$item['gc_id']);
					$query= "SELECT store_name,card_value,fundraise_value,type_id
					FROM available_cards WHERE gc_id='".$gc_id."'";
					//query database
					$result = mysqli_query($db, $query) or die("Error Querying Database");
					
					//print out results
					
					while($row = mysqli_fetch_array($result))
	   				{
							echo "<tr>\n";
							echo "<td>" . $row['store_name'] . "</td>\n";
							echo "<td>$" . $row['card_value'] . "</td>\n";
							echo "<td>$" . $row['fundraise_value'] . "</td>\n";
							echo "<td>" . $row['type_id'] . "</td>\n";
							echo "<td>" . $item['qty'] .	"</td>\n";
							echo "</tr>\n";
							
							//Increment Total Counter
							$totalDue+=($row['card_value']*$item['qty']);
							$totalRaised+=($row['fundraise_value']*$item['qty']);
							
							//declare variables for insert query
							$gc_id=$item['gc_id'];
							$fundraise_value=$row['fundraise_value'];
							$card_quantity=$item['qty'];
							
							//insert into the junction table 
							$query1="INSERT INTO accounts_and_orders(account_id) VALUES 
							((SELECT account_id FROM user_account
							WHERE family_name='".$_SESSION['name']."'))";
							$result1=mysqli_query($db, $query1) or die("Error Querying Database");
							
			
							
							$query2= "INSERT INTO pending_orders
							(order_id, gc_id,fund_raise_value, card_quantity)
							VALUES((SELECT MAX(order_id) FROM accounts_and_orders 
							WHERE account_id='".$_SESSION['account_id']."'),'".$gc_id."','".$fundraise_value."','".$card_quantity."')";
							$result2 = mysqli_query($db, $query2) or die("Error Querying Database2");
							
							

					
	  				}
					
					
				}
				echo "
				<tr bgcolor=\"#CCCCCC\"><td><b>Total:</b></td><td><b>$$totalDue</b></td><td><b>$$totalRaised</b></td><td></td><td></td></tr>
				</table>
				<br><center>Please print this page for your records.</center>";
				unset($_SESSION['cart']);
				if(!$found)
				{
					echo 'Uh, this shouldn\'t happen, your cart was empty.';
				}
			}
			else
			{
				echo 'Uh, this shouldn\'t happen, your cart was empty.';
			}
			mysqli_close($db);
		?>
	
		<?php include("footer.html"); ?>
		</div>
	</body>
</html>
