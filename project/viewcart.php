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
			
			if(isset($_SESSION['cart']))
			{
				$found=false;
				foreach($_SESSION['cart'] as $item)
				{
					$found=true;
					echo $item['qty']." of card ".$item['gc_id']."<br>\n";
				}
				if(!$found)
				{
					echo 'Your cart is empty.';
				}
				else
				{
				?>
					<table><tr>
					<form name="emptyCart" action="viewcart.php" method="POST">
					<input type="hidden" name="emptyCartNow" value="yes">
					<td><input type="submit" name="confirmOrder" value="Empty Cart"></td>
					</form>	
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
