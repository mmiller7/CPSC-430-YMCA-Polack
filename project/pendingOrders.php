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
			<?php
					include("dbconnect.php");
					if($_SESSION['isAdmin']==true)
					{
						include("adminheader.php");
					}
					else
					{
						include("loginheader.php"); 
					}
					
					
					$query = "SELECT 
					family_name, email, order_id, gc_id, fund_raise_value, card_quantity, order_date 
					FROM pending_orders 
					NATURAL JOIN accounts_and_orders NATURAL JOIN user_account;";
					$result = mysqli_query($db, $query);
					
					echo
            					"<table align=center border=1 cellpadding=15>
								<tr>
								<th>Family Name</th>
								<th>Email Address</th>
								<th>Order Id</th>
								<th>Giftcard Id</th>
								<th>Card Fundraise Value</th>
								<th>Quantity</th>
								<th>Order Date</th>
								</tr>";
								
					while($row = mysqli_fetch_array($result))
            		{
            					
								echo "<tr>\n";
								echo "<td>" . $row['family_name'] . "</td>\n";
              					echo "<td>" . $row['email'] . "</td>\n";
             				 	echo "<td>" . $row['order_id'] . "</td>\n";
              					echo "<td>" . $row['gc_id'] .  "</td>\n";
              					echo "<td>" . $row['fund_raise_value'] .  "</td>\n";
              					echo "<td>" . $row['card_quantity'] .  "</td>\n";
              					echo "<td>" . $row['order_date'] .  "</td>\n";
              					echo "<tr>\n";
              				
            		}	
					echo "</table>"
					
			?>
		</div>
	</body>
</html>