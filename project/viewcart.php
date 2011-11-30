<?php
if(!isset($_SESSION)){session_start();} 
if(!isset($_SESSION["name"]))
{
  include("login.php");  
	exit(0);
}

if($_POST['emptyCartNow'] == "yes")
	unset($_SESSION['cart']);
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
			<?php //echo 'This is the view cart page';
			
		include("dbconnect.php");
    $totalDue=0;
    $totalRaised=0;
		$totalItems=0;
    if(isset($_SESSION['cart']))
      {
        echo "<br><center>Your Cart:</center>
				<table align=center border=1 cellpadding=15>
        <tr>
        <th>Store Name</th>
        <th>Card Value</th>
        <th>Card Fundraise Value</th>
        <th>Quantity</th>
        </tr>";
        $found=false;
        foreach($_SESSION['cart'] as $item)
        {
          $found=true;
          //echo $item['qty']." of card ".$item['gc_id']."<br>\n";



          //construct query
          $gc_id=mysqli_real_escape_string($db,$item['gc_id']);
          $query= "SELECT store_name,card_value,fundraise_value FROM available_cards WHERE gc_id='".$gc_id."'";
          //query database
          $result = mysqli_query($db, $query) or die("Error Querying Database");

          //print out results

          while($row = mysqli_fetch_array($result))
            {
              echo "<tr>\n";
              echo "<td>" . $row['store_name'] . "</td>\n";
              echo "<td>$" . $row['card_value'] . "</td>\n";
              echo "<td>$" . $row['fundraise_value'] . "</td>\n";
              echo "<td>" . $item['qty'] .  "</td>\n";
              echo "</tr>\n";

              //Increment Total Counter
              $totalDue+=($row['card_value']*$item['qty']);
              $totalRaised+=($row['fundraise_value']*$item['qty']);
							$totalItems+=$item['qty'];

              //declare variables for insert query
              $gc_id=$item['gc_id'];
              $fundraise_value=$row['fundraise_value'];
              $card_quantity=$item['qty'];



            }


        }
        echo "<tr bgcolor=\"#CCCCCC\"><td><b>Total:</b></td><td><b>$$totalDue</b></td><td><b>$$totalRaised</b></td><td>$totalItems</td></tr>
        </table>";
				if(!$found)
				{
					echo 'Your cart is empty.';
				}
				else
				{
				?>
					<table align=center><tr>
					<form name="emptyCart" action="viewcart.php" method="POST">
					<input type="hidden" name="emptyCartNow" value="yes">
					<td><input type="submit" name="confirmOrder" value="Empty Cart"></td>
					</form>	
					<td></td>
					<form name="orderConfirmation" action="confirmOrder.php" method="POST">
					<td><input type="submit" name="confirmOrder" value="Confirm Order"></td>
					</form>
					</tr>
					</table>
				<?php
				}
			}
			else
			{
				echo 'Your cart is empty.';
			}
			
			?>
			</br>
			<?php include("footer.html"); ?>
		</div>
	</body>
</html>
