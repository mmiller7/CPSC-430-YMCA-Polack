<div id="Navigation">
	<?php
	/*
	if(!isset($_SESSION["name"]))
	{
	?>
		<!--java script for redirect-->
		
	   <script language = 'javascript'>
	   <!--
		window.location = "login.php"
		//-->
	   </script>
	   
	<?php
	}
	else
	*/
	if(isset($_SESSION["name"]))
	{
	?>
	<a href="home.php">Home</a>
	|
	<a href="logout.php">Logout</a>
	|
	<a href="viewaccount.php">View Account</a>
	|
	<a href="viewcart.php">View Cart (<?php echo count($_SESSION['cart'])?>)</a>
	|
	<a href="browse.php">Order Giftcards</a>
	<?php
	}
	?>
</div>
